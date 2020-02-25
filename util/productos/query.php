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
        SELECT * FROM productos
    ");

    foreach($resultado as $fila){
        $fila['row'] = '';
        $fila['btn_gestion'] = '<button type="button" class="btn btn-warning gestion_update"><span class="glyphicon glyphicon-pencil"></span></button>';

        $fila['tiene_imagen'] = 'NO';

        if( file_exists('../../img/productos/'.$fila['idproducto'].'.png') ){
            $fila['tiene_imagen'] = 'SI';
        }

        $respuesta->data[] = $fila;
    }

}catch(Exception $e){
    $respuesta->estado = 2;
    $respuesta->mensaje = $e->getMessage();
}

//sleep(5);

print_r(json_encode($respuesta));