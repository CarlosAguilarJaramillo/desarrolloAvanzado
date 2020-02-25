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

try{

    if( !$session->checkSession() ) throw new Exception("Debe iniciar una sesión");

    $existe = 0;
    $usuario = '';
    $nombre = '';
    $email = '';
    $tipo_usuario = '';
    $clave_cifrada = hash('sha512', 'm7x'.$parametro['claveusuario']);
    

    if(
        ( isset($_POST['usuario']) && !empty($_POST['usuario']) ) && 
        ( isset($_POST['nombre']) && !empty($_POST['nombre']) ) && 
        ( isset($_POST['tipo_usuario']) && !empty($_POST['tipo_usuario']) ) && 
        ( isset($_POST['email']) && !empty($_POST['email']) )
    ){
        $usuario = $_POST['usuario'];
        $nombre = $_POST['nombre'];
        $tipo_usuario = $_POST['tipo_usuario'];
        $email = strtolower(trim($_POST['email']));
    }

    if(
        isset($_POST['existe']) && !empty($_POST['existe'])
    ){
        $existe = $_POST['existe'];
    }

    if( empty($usuario) || empty($nombre) || empty($tipo_usuario) || empty($email) ){
        throw new Exception("Algunos datos llegaron vacios");
    }

    $resultado = $conexion->ejecutarConsulta("
        SELECT COUNT(*) AS total 
        FROM usuarios
        WHERE usuario != '".$usuario."'
        AND email = '".$email."'
    ");

    $total_email = 0;

    foreach($resultado as $fila){
        $total_email = $fila['total'];
    }

    if( $total_email > 0 ) throw new Exception("El email (".$email."), ya esta siendo usado por otro usuario en la aplicación");

    if( $existe == 1 ){

        $update = $conexion->ejecutarConsulta("
            UPDATE usuarios SET 
            nombre='".$nombre."',
            email='".$email."',
            tipo_usuario='".$tipo_usuario."',
            usuario_actualizacion='".$_SESSION['usuario']."',
            fecha_actualizacion=NOW()
            WHERE 
            usuario = '".$usuario."'
        ");

        if( !$update ) throw new Exception("Error al actualizar el usuario");

        $respuesta->mensaje = "Usuario actualizado con éxito";

    }else{
        $resultado = $conexion->ejecutarConsulta("
            SELECT COUNT(*) AS total 
            FROM usuarios
            WHERE usuario = '".$usuario."'
        ");

        $total = 0;

        foreach($resultado as $fila){
            $total = $fila['total'];
        }

        if( $total > 0 ) throw new Exception("El usuario (".$usuario."), ya existe en la aplicación");

        $insert = $conexion->ejecutarConsulta("
            INSERT INTO usuarios
            (usuario, nombre, email, clave, tipo_usuario, usuario_creacion, fecha_creacion)
            VALUES 
            ('".$usuario."','".$nombre."','".$email."','".$clave_cifrada."','".$tipo_usuario."','".$_SESSION['usuario']."',NOW())
        ");

        if( !$insert ) throw new Exception("Error al crear el usuario");

        $respuesta->mensaje = "Usuario creado con éxito";
    }

}catch(Exception $e){
    $respuesta->estado = 2;
    $respuesta->mensaje = $e->getMessage();
}

print_r(json_encode($respuesta));