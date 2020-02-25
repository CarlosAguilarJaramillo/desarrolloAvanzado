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
$respuesta->data = array();

try{

    if( !$session->checkSession() ) throw new Exception("Debe iniciar una sesión");

    $resultado = $conexion->ejecutarConsulta("
        SELECT a.*, b.nombre
        FROM pedidos_cabecera AS a 
        INNER JOIN usuarios AS b ON (a.cliente = b.usuario)
        WHERE a.vendedor = '".$_SESSION['usuario']."'
        ORDER BY a.idpedcab DESC
    ");

    foreach($resultado as $fila){
        $fila['row'] = '';
        $fila['btn_visualizar'] = '<button type="button" class="btn btn-info visualizar_pedido"><span class="glyphicon glyphicon-search"></span></button>';
        $fila['btn_facturar'] = '';
        $fila['btn_cancelar'] = '';

        if( $fila['estado'] == 'CREADO' && empty($fila['numero_factura']) ){
            $fila['btn_facturar'] = '<button type="button" class="btn btn-warning facturar_pedido"><span class="glyphicon glyphicon-cloud"></span></button>';
            $fila['btn_cancelar'] = '<button type="button" class="btn btn-danger cancelar_pedido"><span class="glyphicon glyphicon-trash"></span></button>';
        }        

        $respuesta->data[] = $fila;
    }

}catch(Exception $e){
    $respuesta->estado = 2;
    $respuesta->mensaje = $e->getMessage();
}

//sleep(5);

print_r(json_encode($respuesta));