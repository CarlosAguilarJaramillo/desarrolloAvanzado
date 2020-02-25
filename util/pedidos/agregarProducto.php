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

    $idproducto = 0;
    $cliente = '';
    $cantidad = 0;
    

    if(
        ( isset($_POST['idproducto']) && !empty($_POST['idproducto']) ) && 
        ( isset($_POST['cliente']) && !empty($_POST['cliente']) ) && 
        ( isset($_POST['cantidad']) && !empty($_POST['cantidad']) )
    ){
        $idproducto = $_POST['idproducto'];
        $cliente = $_POST['cliente'];
        $cantidad = $_POST['cantidad'];
    }

    if( empty($idproducto) || empty($cliente) || empty($cantidad) ){
        throw new Exception("Algunos datos llegaron vacios");
    }

    # Eliminar el producto del carrito

    $delete = $conexion->ejecutarConsulta("
        DELETE FROM carrito
        WHERE vendedor = '".$_SESSION['usuario']."'
        AND cliente = '".$cliente."' 
        AND idproducto = '".$idproducto."'
    ");

    if( !$delete ) throw new Exception("Error al eliminar el producto");

    # Agregar el producto al carrito

    $insert = $conexion->ejecutarConsulta("
        INSERT INTO carrito 
        (vendedor, cliente, idproducto, cantidad, usuario_creacion, fecha_creacion) 
        VALUES 
        ('".$_SESSION['usuario']."','".$cliente."','".$idproducto."','".$cantidad."','".$_SESSION['usuario']."',NOW())
    ");

    if( !$insert ) throw new Exception("Error al agregar el producto");

    $respuesta->mensaje = "Producto agregado con éxito";

}catch(Exception $e){
    $respuesta->estado = 2;
    $respuesta->mensaje = $e->getMessage();
}

print_r(json_encode($respuesta));