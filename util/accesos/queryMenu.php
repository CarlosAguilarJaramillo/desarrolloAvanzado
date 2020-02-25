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
        SELECT idmenu, nombre FROM menu
        WHERE es_menu = 'SI'
        AND estado = 'ACTIVO'
        ORDER BY orden
    ");

    $cont = 0;

    foreach($resultado as $fila){
        $respuesta->data[$cont]['idmenu'] = $fila['idmenu'];
        $respuesta->data[$cont]['nombre'] = $fila['nombre'];
        $respuesta->data[$cont]['submenu'] = array();

        $resultadoInt = $conexion->ejecutarConsulta("
            SELECT idmenu, nombre FROM menu
            WHERE idpadre = '".$fila['idmenu']."'
            AND estado = 'ACTIVO'
            ORDER BY orden
        ");

        $contInt = 0;

        foreach($resultadoInt as $filaInt){
            $respuesta->data[$cont]['submenu'][$contInt]['idmenu'] = $filaInt['idmenu'];
            $respuesta->data[$cont]['submenu'][$contInt]['nombre'] = $filaInt['nombre'];

            $contInt++;
        }

        $cont++;
    }

}catch(Exception $e){
    $respuesta->estado = 2;
    $respuesta->mensaje = $e->getMessage();
}

print_r(json_encode($respuesta));