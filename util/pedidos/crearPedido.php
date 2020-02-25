<?php
include("../system/funciones.php");
include("../system/session.php");
include("../system/conexion.php");

$conexion = new Conexion('../logs/');
$conexion->conectar();

# Obtener los parametros del sistema

$resultado_parametros = $conexion->ejecutarConsulta("
    SELECT * FROM parametros
");

$parametro = array();

foreach($resultado_parametros as $fila){
    $parametro[trim($fila['parametro'])] = trim($fila['valor']);
}

#######################################

$session = new Session();

$respuesta = new stdClass();
$respuesta->estado = 1;
$respuesta->mensaje = "";

try{

    if( !$session->checkSession() ) throw new Exception("Debe iniciar una sesión");

    $cliente = '';
    $direccion = '';    

    if(
        ( isset($_POST['cliente']) && !empty($_POST['cliente']) ) && 
        ( isset($_POST['direccion']) && !empty($_POST['direccion']) )
    ){
        $cliente = $_POST['cliente'];
        $direccion = addslashes($_POST['direccion']);
    }

    if( empty($cliente) || empty($direccion) ){
        throw new Exception("No envio el cliente o la dirección");
    }

    # Validar que tenga productos el carrito

    $detalle = array();

    $resultado = $conexion->ejecutarConsulta("
        SELECT a.idproducto, a.cantidad, b.nombre, b.impuesto, b.precio,
        b.estado, b.stock
        FROM carrito AS a 
        INNER JOIN productos AS b ON (a.idproducto = b.idproducto)
        WHERE a.cliente = '".$cliente."'
        AND a.vendedor = '".$_SESSION['usuario']."'
        ORDER BY a.idproducto
    ");

    foreach($resultado as $fila){

        $impuesto = ( $fila['impuesto'] == 'SI' ? $parametro['impuesto'] : 0 );
        $fila['valor_impuesto'] = $impuesto;
        $fila['subtotal'] = ( $fila['precio'] * $fila['cantidad'] );
        $valor_impuesto = 0;

        $total = $fila['subtotal'];

        if( (int)$impuesto > 0 ){
            $valor_impuesto = ( $fila['subtotal'] * (int)$impuesto) / 100;
            $total = ( $fila['subtotal'] + $valor_impuesto);
        }

        $fila['nuevo_stock'] = ( (int)$fila['stock'] - (int)$fila['cantidad'] );
        $fila['impuesto'] = $impuesto;
        $fila['valor_impuesto'] = $valor_impuesto;
        $fila['total'] = $total;

        ########################

        $detalle[] = $fila;
    }

    if( count($detalle) == 0 ) throw new Exception("El carrito no tiene productos");

    # Validar el estado de cada producto

    $flag_estado = false;

    for($f = 0; $f < count($detalle); $f++){
        if($detalle[$f]['estado'] == 'INACTIVO'){
            $flag_estado = true;
            break;
        }
    }

    if( $flag_estado ) throw new Exception("Algunos productos estan inactivos en el sistema, favor eliminarlos del pedido");

    # Validar el stock de cada producto

    $flag_stock = false;

    for($f = 0; $f < count($detalle); $f++){
        if(
            (int)$detalle[$f]['stock'] == 0 || 
            (int)$detalle[$f]['cantidad'] > (int)$detalle[$f]['stock']
        ){
            $flag_stock = true;
            break;
        }
    }

    if( $flag_stock ) throw new Exception("Algunos productos tienen menos stock que la cantidad solicitada, favor eliminarlos del pedido");

    # Insertar la cabecera del pedido

    $insert = $conexion->ejecutarConsulta("
        INSERT INTO pedidos_cabecera (
        vendedor, cliente, direccion, 
        subtotal, valor_impuesto, total, estado, 
        usuario_creacion, fecha_creacion) 
        VALUES 
        ('".$_SESSION['usuario']."','".$cliente."','".$direccion."',
        0,0,0,'CREADO',
        '".$_SESSION['usuario']."',NOW())
    ");

    if( !$insert ) throw new Exception("Error al crear el pedido");

    # Obtener el ID del pedido

    $resultado = $conexion->ejecutarConsulta("
        SELECT idpedcab FROM pedidos_cabecera
        WHERE vendedor = '".$_SESSION['usuario']."'
        AND cliente = '".$cliente."'
        ORDER BY idpedcab DESC
        LIMIT 1
    ");

    $idpedcab = 0;

    foreach($resultado as $fila){
        $idpedcab = $fila['idpedcab'];
    }

    if( $idpedcab == 0 ) throw new Exception("El pedido no ha sido creado");

    # Insertar el detalle del pedido

    for($f = 0; $f < count($detalle); $f++){
        $conexion->ejecutarConsulta("
            INSERT INTO pedidos_detalle (
            idpedcab, idproducto, precio, 
            cantidad, subtotal, impuesto, 
            valor_impuesto, total, 
            usuario_creacion, fecha_creacion) 
            VALUES 
            ('".$idpedcab."','".$detalle[$f]['idproducto']."','".$detalle[$f]['precio']."',
            '".$detalle[$f]['cantidad']."','".$detalle[$f]['subtotal']."','".$detalle[$f]['impuesto']."',
            '".$detalle[$f]['valor_impuesto']."','".$detalle[$f]['total']."',
            '".$_SESSION['usuario']."',NOW())
        ");
    }

    # Actualizar los totales de la cabecera del pedido

    $update = $conexion->ejecutarConsulta("
        UPDATE pedidos_cabecera SET 
        subtotal = ( SELECT SUM(subtotal) FROM pedidos_detalle WHERE idpedcab = ".$idpedcab." ),
        valor_impuesto = ( SELECT SUM(valor_impuesto) FROM pedidos_detalle WHERE idpedcab = ".$idpedcab." ),
        total = ( SELECT SUM(total) FROM pedidos_detalle WHERE idpedcab = ".$idpedcab." ) 
        WHERE 
        idpedcab = ".$idpedcab."
    ");

    if( !$update ) throw new Exception("Error al actualizar el pedido");

    # Bajar el stock del producto

    for($f = 0; $f < count($detalle); $f++){
        $conexion->ejecutarConsulta("
            UPDATE productos SET 
            stock = '".$detalle[$f]['nuevo_stock']."',
            usuario_actualizacion = '".$_SESSION['usuario']."', 
            fecha_actualizacion = NOW()
            WHERE 
            idproducto = '".$detalle[$f]['idproducto']."'
        ");
    }

    # Vaciar el carrito del cliente

    $delete = $conexion->ejecutarConsulta("
        DELETE FROM carrito
        WHERE vendedor = '".$_SESSION['usuario']."'
        AND cliente = '".$cliente."'
    ");

    if( !$delete ) throw new Exception("Error al vaciar el carrito del cliente");

    ###################

    $respuesta->mensaje = "Pedido # ".$idpedcab.", creado con éxito";

}catch(Exception $e){
    $respuesta->estado = 2;
    $respuesta->mensaje = $e->getMessage();
}

print_r(json_encode($respuesta));