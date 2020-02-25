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

    $usuario = '';
    $menuChekeado = array();

    if(
        isset($_POST['usuario']) && !empty($_POST['usuario'])
    ){
        $usuario = $_POST['usuario'];
    }

    if(
        isset($_POST['menuChekeado'])
    ){
        $menuChekeado = $_POST['menuChekeado'];
    }

    if( empty($usuario) ){
        throw new Exception("El usuario esta vacio");
    }

    $resultadoDelete = $conexion->ejecutarConsulta("
        DELETE FROM usuarios_accesos
        WHERE usuario = '".$usuario."'
    ");

    if( $resultadoDelete!= true ) throw new Exception("Error al realizar la eliminación");

    if( count($menuChekeado) > 0 ){

        for($f = 0; $f < count($menuChekeado); $f++){
            $conexion->ejecutarConsulta("
                INSERT INTO usuarios_accesos
                (idmenu, usuario, usuario_creacion, fecha_creacion) 
                VALUES 
                ('".$menuChekeado[$f]."','".$usuario."','".$_SESSION['usuario']."',NOW())
            ");
        }

        $respuesta->mensaje = "Accesos otorgados";
    }else{
        $respuesta->mensaje = "Accesos eliminados";
    }

}catch(Exception $e){
    $respuesta->estado = 2;
    $respuesta->mensaje = $e->getMessage();
}

print_r(json_encode($respuesta));