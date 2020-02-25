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
$respuesta->cabecera = array();
$respuesta->detalle = array();

try{

    if( !$session->checkSession() ) throw new Exception("Debe iniciar una sesión");

    $idpedcab = '';    

    if(
        isset($_POST['idpedcab']) && !empty($_POST['idpedcab'])
    ){
        $idpedcab = $_POST['idpedcab'];
    }

    if( empty($idpedcab) ){
        throw new Exception("No envió el ID del pedido");
    }

    $resultado = $conexion->ejecutarConsulta("
        SELECT a.*, b.nombre
        FROM pedidos_cabecera AS a 
        INNER JOIN usuarios AS b ON (a.cliente = b.usuario)
        WHERE a.idpedcab = ".$idpedcab."
        LIMIT 1
    ");

    foreach($resultado as $fila){
        $fila['numero_factura'] = ( empty($fila['numero_factura']) ? '' : $fila['numero_factura']);

        $respuesta->cabecera = $fila;
    }

    if( count($respuesta->cabecera) == 0 ) throw new Exception("El pedido no tiene cabecera");

    $resultado = $conexion->ejecutarConsulta("
        SELECT a.*, b.nombre
        FROM pedidos_detalle AS a 
        INNER JOIN productos AS b ON (a.idproducto = b.idproducto)
        WHERE a.idpedcab = ".$idpedcab."
    ");

    foreach($resultado as $fila){
        $fila['row'] = '';

        #################################

        $fila['tiene_imagen'] = 'NO';
        $fila['btn_img'] = '';

        if( file_exists('../../img/productos/'.$fila['idproducto'].'.png') ){
            $fila['tiene_imagen'] = 'SI';
            $fila['btn_img'] = '<button type="button" data-idproducto="'.$fila['idproducto'].'" class="btn btn-info gestion_mostrar_imagen"><span class="glyphicon glyphicon-picture"></span></button>';
        }

        #################################

        $respuesta->detalle[] = $fila;
    }

}catch(Exception $e){
    $respuesta->estado = 2;
    $respuesta->mensaje = $e->getMessage();
}

print_r(json_encode($respuesta));