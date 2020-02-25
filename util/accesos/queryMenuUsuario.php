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

    $usuario = '';

    if(
        isset($_POST['usuario']) && !empty($_POST['usuario'])
    ){
        $usuario = $_POST['usuario'];
    }

    if( empty($usuario) ){
        throw new Exception("El usuario esta vacio");
    }

    $resultado = $conexion->ejecutarConsulta("
        SELECT idmenu
        FROM usuarios_accesos
        WHERE usuario = '".$usuario."'
    ");

    foreach($resultado as $fila){
        $respuesta->data[] = $fila['idmenu'];
    }

}catch(Exception $e){
    $respuesta->estado = 2;
    $respuesta->mensaje = $e->getMessage();
}

print_r(json_encode($respuesta));