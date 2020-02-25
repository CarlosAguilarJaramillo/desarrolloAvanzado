<?php
include("../system/funciones.php");
include("../system/session.php");
include("../system/conexion.php");

require_once('../../lib/php/nusoap-master/src/nusoap.php');

$conexion = new Conexion('../logs/');
$conexion->conectar();

$session = new Session();

$respuesta = new stdClass();
$respuesta->estado = 1;
$respuesta->mensaje = "";

try{

    if( !$session->checkSession() ) throw new Exception("Debe iniciar una sesión");

    $idpedcab = 0;

    if(
        isset($_POST['idpedcab']) && !empty($_POST['idpedcab'])
    ){
        $idpedcab = $_POST['idpedcab'];
    }

    if( 
        empty($idpedcab) 
    ){
        throw new Exception("No envió el ID del pedido");
    }

    # Obtener la cabecera del pedido

    $cabecera = new stdClass();

    $resultado = $conexion->ejecutarConsulta("
        SELECT *, date(fecha_creacion) AS fecha FROM pedidos_cabecera
        WHERE idpedcab = ".$idpedcab."
        LIMIT 1
    ");

    foreach($resultado as $fila){
        $cabecera->IdPedCab = $fila['idpedcab'];
        $cabecera->Vendedor = $fila['vendedor'];
        $cabecera->Cliente = $fila['cliente'];
        $cabecera->Direccion = $fila['direccion'];
        $cabecera->Subtotal = number_format($fila['subtotal'],2,',','');
        $cabecera->Valor_impuesto = number_format($fila['valor_impuesto'],2,',','');
        $cabecera->Total = number_format($fila['total'],2,',','');
        $cabecera->Fecha = $fila['fecha'];
    }

    # Obtener el detalle del pedido

    $detalle = array();
    $detalle['FacturaDetalle'] = array();

    $resultado = $conexion->ejecutarConsulta("
        SELECT * FROM pedidos_detalle
        WHERE idpedcab = ".$idpedcab."
    ");

    foreach($resultado as $fila){
        $obj_detalle = new stdClass();
        $obj_detalle->Idproducto = $fila['idproducto'];
        $obj_detalle->Precio = number_format($fila['precio'],2,',','');
        $obj_detalle->Cantidad = $fila['cantidad'];
        $obj_detalle->Subtotal = number_format($fila['subtotal'],2,',','');
        $obj_detalle->Impuesto = $fila['impuesto'];
        $obj_detalle->Valor_impuesto = number_format($fila['valor_impuesto'],2,',','');
        $obj_detalle->Total = number_format($fila['total'],2,',','');

        $detalle['FacturaDetalle'][] = $obj_detalle;
    }

    if( count($detalle) == 0 ) throw new Exception("No se obtuvo la cabecera y detalle del pedido");

    # Conectar al servicio

    $cliente = new nusoap_client('http://localhost:8083/Servicios.asmx?WSDL','WSDL');
    $cliente->soap_defencoding = 'UTF-8';
    $cliente->response_timeout = 600;
    $err = $cliente->getError();

    if($err) throw new Exception("Error (1) SOAP: ".$err);

    $respuestaWs = $cliente->call('GenerarFactura', 
        array(
            'cabecera' => $cabecera,
            'detalle' => $detalle
        )
    );

    if($cliente->fault) throw new Exception("Error cuerpo SOAP: ".$respuestaWs);

    $err = $cliente->getError();

    if($err) throw new Exception("Error (2) SOAP: ".$err);

    # Guardar el log de respuesta

    Funciones::Logs("ws_facturar", "../logs/", print_r($respuestaWs, true));

    # Si salio bien, guardar el numero de factura y actualizar el campo error a null

    if( (int)$respuestaWs['GenerarFacturaResult']['Estado'] == 1 ){
        $update = $conexion->ejecutarConsulta("
            UPDATE pedidos_cabecera SET 
            estado='FACTURADO',
            numero_factura='".$respuestaWs['GenerarFacturaResult']['Numero_factura']."',
            error_servicio=NULL
            WHERE 
            idpedcab = '".$idpedcab."'
        ");

        if( !$update ) throw new Exception("Error al actualizar el pedido");

        $respuesta->mensaje = "Pedido # ".$idpedcab.", facturado con éxito";
    }else{
        $update = $conexion->ejecutarConsulta("
            UPDATE pedidos_cabecera SET 
            error_servicio='".addslashes($respuestaWs['GenerarFacturaResult']['Error'])."'
            WHERE 
            idpedcab = '".$idpedcab."'
        ");

        if( !$update ) throw new Exception("Error al actualizar el pedido");

        $respuesta->estado = 2;
        $respuesta->mensaje = $respuestaWs['GenerarFacturaResult']['Error'];
    }
        

}catch(Exception $e){
    $respuesta->estado = 2;
    $respuesta->mensaje = $e->getMessage();
}

print_r(json_encode($respuesta));