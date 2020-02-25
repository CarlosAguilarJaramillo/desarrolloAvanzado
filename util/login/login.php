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

    $usuario = "";
    $clave = "";

    if(
        ( isset($_POST['usuario']) && !empty($_POST['usuario']) ) && 
        ( isset($_POST['clave']) && !empty($_POST['clave']) )
    ){
        $usuario = $_POST['usuario'];
        $clave = $_POST['clave'];
    }

    if(
        empty($usuario) || empty($clave)
    ){
        throw new Exception("El usuario o la clave estan vacios");
    }

    $datos_usuario = array();

    $clave_cifrada = hash("sha512", "m7x".$clave);

    $resultado = $conexion->ejecutarConsulta("
        SELECT * FROM usuarios
        WHERE usuario = '".$usuario."'
        AND clave = '".$clave_cifrada."'
        LIMIT 1
    ");

    foreach($resultado as $fila){
        $datos_usuario = $fila;
    }

    //$datos_usuario['tipo_usuario'];

    if(
        count($datos_usuario) == 0
    ){
        throw new Exception("El usuario no existe en la aplicación, o la clave es incorrecta");
    }

    $session->createSession($datos_usuario);

}catch(Exception $e){
    $respuesta->estado = 2;
    $respuesta->mensaje = $e->getMessage();
}

print_r(json_encode($respuesta));