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
$respuesta->data = array();
$respuesta->total_pedido = 0;

try{

    if( !$session->checkSession() ) throw new Exception("Debe iniciar una sesión");

    $cliente = '';    

    if(
        isset($_POST['cliente']) && !empty($_POST['cliente'])
    ){
        $cliente = $_POST['cliente'];
    }

    if( empty($cliente) ){
        throw new Exception("No envio el cliente");
    }

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
        $fila['row'] = '';
        $fila['btn_gestion'] = '<button type="button" data-idproducto="'.$fila['idproducto'].'" class="btn btn-danger eliminar_producto"><span class="glyphicon glyphicon-trash"></span></button>';

        $impuesto = ( $fila['impuesto'] == 'SI' ? $parametro['impuesto'] : 0 );
        $fila['valor_impuesto'] = $impuesto;
        $fila['subtotal'] = ( $fila['precio'] * $fila['cantidad'] );
        $valor_impuesto = 0;

        $total = $fila['subtotal'];

        if( (int)$impuesto > 0 ){
            $valor_impuesto = ( $fila['subtotal'] * (int)$impuesto) / 100;
            $total = ( $fila['subtotal'] + $valor_impuesto);
        }

        $fila['impuesto'] = $impuesto;
        $fila['valor_impuesto'] = number_format($valor_impuesto, 2,'.','');
        $fila['precio'] = number_format($fila['precio'], 2,'.','');
        $fila['subtotal'] = number_format($fila['subtotal'], 2,'.','');
        $fila['total'] = number_format($total, 2,'.','');

        #################################

        $fila['tiene_imagen'] = 'NO';
        $fila['btn_img'] = '';

        if( file_exists('../../img/productos/'.$fila['idproducto'].'.png') ){
            $fila['tiene_imagen'] = 'SI';
            $fila['btn_img'] = '<button type="button" data-idproducto="'.$fila['idproducto'].'" class="btn btn-info gestion_mostrar_imagen"><span class="glyphicon glyphicon-picture"></span></button>';
        }

        #################################

        $respuesta->total_pedido += $total;
        $respuesta->data[] = $fila;

    }

    $respuesta->total_pedido = number_format($respuesta->total_pedido, 2,'.','');

}catch(Exception $e){
    $respuesta->estado = 2;
    $respuesta->mensaje = $e->getMessage();
}

print_r(json_encode($respuesta));