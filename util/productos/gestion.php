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
    $nombre = '';
    $estado = '';
    $impuesto = '';
    $descripcion = '';
    $precio = 0;
    $stock = 0;
    $imagen_subir = '';

    if(
        isset($_POST['idproducto']) && !empty($_POST['idproducto'])
    ){
        $idproducto = $_POST['idproducto'];
    }


    if(
        ( isset($_POST['nombre']) && !empty($_POST['nombre']) ) && 
        ( isset($_POST['estado']) && !empty($_POST['estado']) ) && 
        ( isset($_POST['impuesto']) && !empty($_POST['impuesto']) ) && 
        ( isset($_POST['descripcion']) && !empty($_POST['descripcion']) ) && 
        ( isset($_POST['precio']) && !empty($_POST['precio']) )
    ){
        $nombre = $_POST['nombre'];
        $estado = $_POST['estado'];
        $impuesto = $_POST['impuesto'];
        $descripcion = addslashes($_POST['descripcion']);
        $precio = $_POST['precio'];
    }

    if(
        isset($_POST['stock']) && !empty($_POST['stock'])
    ){
        $stock = $_POST['stock'];
    }

    if(
        isset($_FILES['imagen_subir']) && !empty($_FILES['imagen_subir'])
    ){
        $imagen_subir = $_FILES['imagen_subir'];
    }

    if( 
        empty($nombre) || 
        empty($estado) || 
        empty($impuesto) || 
        empty($descripcion) || 
        empty($precio) 
    ){
        throw new Exception("Algunos datos llegaron vacios");
    }

    if( $idproducto == 0 ){

        $insert = $conexion->ejecutarConsulta("
            INSERT INTO productos
            ( nombre, descripcion, estado, impuesto, precio, stock,  usuario_creacion, fecha_creacion) 
            VALUES 
            ('".$nombre."','".$descripcion."','".$estado."','".$impuesto."','".$precio."','".$stock."','".$_SESSION['usuario']."',NOW())
        ");

        if( !$insert ) throw new Exception("Error al crear el producto");

        $resultado = $conexion->ejecutarConsulta("
            SELECT idproducto FROM productos
            ORDER BY idproducto DESC
            LIMIT 1
        ");

        foreach($resultado as $fila){
            $idproducto = $fila['idproducto'];
        }

        if( $idproducto == 0 ) throw new Exception("El producto no ha sido creado");

        if( !empty($imagen_subir) ){
            if( !move_uploaded_file($imagen_subir['tmp_name'], '../../img/productos/'.$idproducto.'.png') ){
                throw new Exception("Error al subir la imagen del producto");
            }
        }

        $respuesta->mensaje = "Producto creado con éxito";        

    }else{

        if( !empty($imagen_subir) ){
            if( !move_uploaded_file($imagen_subir['tmp_name'], '../../img/productos/'.$idproducto.'.png') ){
                throw new Exception("Error al subir la imagen del producto");
            }
        }

        $update = $conexion->ejecutarConsulta("
            UPDATE productos SET 
            nombre='".$nombre."',
            descripcion='".$descripcion."',
            estado='".$estado."',
            impuesto='".$impuesto."',
            precio='".$precio."',
            stock='".$stock."',
            usuario_actualizacion='".$_SESSION['usuario']."',
            fecha_actualizacion=NOW()
            WHERE 
            idproducto = '".$idproducto."'
        ");

        if( !$update ) throw new Exception("Error al actualizar el producto");

        $respuesta->mensaje = "Producto actualizado con éxito";
        
    }

}catch(Exception $e){
    $respuesta->estado = 2;
    $respuesta->mensaje = $e->getMessage();
}

print_r(json_encode($respuesta));