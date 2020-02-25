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
        SELECT * FROM usuarios
    ");

    foreach($resultado as $fila){
        $respuesta->data[] = array(
            'usuario' => $fila['usuario'],
            'nombre' => $fila['nombre']
        );
    }

}catch(Exception $e){
    $respuesta->estado = 2;
    $respuesta->mensaje = $e->getMessage();
}

print_r(json_encode($respuesta));