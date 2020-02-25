<?php
include("../system/funciones.php");
include("../system/session.php");
include("../system/conexion.php");

$conexion = new Conexion('../logs/');
$conexion->conectar();

$session = new Session();

$respuesta = new stdClass();
$respuesta->estado = 1;
$respuesta->mensaje = "";

try{

    if( !$session->checkSession() ) throw new Exception("Debe iniciar una sesión");

    $idpedcab = 0;

    if(
        isset($_POST['idpedcab']) && !empty($_POST['idpedcab'])
    ){
        $idpedcab = $_POST['idpedcab'];
    }

    if( 
        empty($idpedcab) 
    ){
        throw new Exception("No envió el ID del pedido");
    }

    # Validar el estado del pedido
    
    $resultado = $conexion->ejecutarConsulta("
        SELECT COUNT(*) AS total
        FROM pedidos_cabecera
        WHERE idpedcab = ".$idpedcab."
        AND estado != 'CREADO'
    ");

    $total = 0;

    foreach($resultado as $fila){
        $total = $fila['total'];
    }

    if( $total > 0 ) throw new Exception("El pedido tiene un estado diferente de CREADO, por lo cual no puede ser cancelado");

    # Obtener la cantidad y el stock actual para proceder a sumarlo

    $detalle = array();

    $resultado = $conexion->ejecutarConsulta("
        SELECT a.idproducto, ( a.cantidad + b.stock ) AS nuevo_stock
        FROM pedidos_detalle AS a 
        INNER JOIN productos AS b ON (a.idproducto = b.idproducto)
        WHERE 
        a.idpedcab = ".$idpedcab."
    ");

    foreach($resultado as $fila){
        $detalle[] = $fila;
    }

    if( count($detalle) == 0 ) throw new Exception("El pedido no tiene detalle");

    # Actualizar el estado del pedido a cancelado

    $update = $conexion->ejecutarConsulta("
        UPDATE pedidos_cabecera SET 
        estado='CANCELADO'
        WHERE 
        idpedcab = '".$idpedcab."'
    ");

    if( !$update ) throw new Exception("Error al actualizar el pedido");

    # Retornar el stock de los productos

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

    ###################

    $respuesta->mensaje = "Pedido # ".$idpedcab.", cancelado con éxito";
        

}catch(Exception $e){
    $respuesta->estado = 2;
    $respuesta->mensaje = $e->getMessage();
}

print_r(json_encode($respuesta));