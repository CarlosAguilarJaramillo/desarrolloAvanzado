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
        WHERE estado = 'ACTIVO'
        AND stock > 0
    ");

    foreach($resultado as $fila){
        $fila['row'] = '';
        $fila['btn_gestion'] = '<button type="button" class="btn btn-success gestion_agregar_producto"><span class="glyphicon glyphicon-plus"></span></button>';

        $fila['tiene_imagen'] = 'NO';
        $fila['btn_img'] = '';

        if( file_exists('../../img/productos/'.$fila['idproducto'].'.png') ){
            $fila['tiene_imagen'] = 'SI';
            $fila['btn_img'] = '<button type="button" data-idproducto="'.$fila['idproducto'].'" class="btn btn-info gestion_mostrar_imagen"><span class="glyphicon glyphicon-picture"></span></button>';
        }

        $respuesta->data[] = $fila;
    }

}catch(Exception $e){
    $respuesta->estado = 2;
    $respuesta->mensaje = $e->getMessage();
}

//sleep(5);

print_r(json_encode($respuesta));