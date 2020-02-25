<?php

require_once('../lib/php/nusoap-master/src/nusoap.php');

/*
$clave_cifrada = hash("sha512", "m7x"."12345");

echo $clave_cifrada;

<cabecera>
    <IdPedCab>string</IdPedCab>
    <Vendedor>string</Vendedor>
    <Cliente>string</Cliente>
    <Direccion>string</Direccion>
    <Subtotal>string</Subtotal>
    <Valor_impuesto>string</Valor_impuesto>
    <Total>string</Total>
    <Fecha>string</Fecha>
</cabecera>
<detalle>
<FacturaDetalle>
    <Idproducto>string</Idproducto>
    <Precio>string</Precio>
    <Cantidad>string</Cantidad>
    <Subtotal>string</Subtotal>
    <Impuesto>string</Impuesto>
    <Valor_impuesto>string</Valor_impuesto>
    <Total>string</Total>
</FacturaDetalle>
</detalle>
*/

// Crear la cabecera

$obj_cabecera = new stdClass();
$obj_cabecera->IdPedCab = "1001";
$obj_cabecera->Vendedor = "admin";
$obj_cabecera->Cliente = "maria";
$obj_cabecera->Direccion = "Norte de la ciudad";
$obj_cabecera->Subtotal = number_format("14.12",2,',','');
$obj_cabecera->Valor_impuesto = number_format("15.32",2,',','');
$obj_cabecera->Total = number_format("34.00",2,',','');
$obj_cabecera->Fecha = date('Y-m-d');

// Crear el detalle

$detalle = array();
$detalle['FacturaDetalle'] = array();

$obj_detalle = new stdClass();
$obj_detalle->Idproducto = "1003";
$obj_detalle->Precio = number_format("1.02",2,',','');
$obj_detalle->Cantidad = "8";
$obj_detalle->Subtotal = number_format("7.89",2,',','');
$obj_detalle->Impuesto = "12";
$obj_detalle->Valor_impuesto = number_format("12.23",2,',','');
$obj_detalle->Total = number_format("24.38",2,',','');

$detalle['FacturaDetalle'][] = $obj_detalle;

$obj_detalle = new stdClass();
$obj_detalle->Idproducto = "1004";
$obj_detalle->Precio = number_format("3.02",2,',','');
$obj_detalle->Cantidad = "2";
$obj_detalle->Subtotal = number_format("5.89",2,',','');
$obj_detalle->Impuesto = "0";
$obj_detalle->Valor_impuesto = number_format("34.23",2,',','');
$obj_detalle->Total = number_format("14.38",2,',','');

$detalle['FacturaDetalle'][] = $obj_detalle;

/////////////////////////////////////////////////////////

$cliente = new nusoap_client('http://localhost:8083/Servicios.asmx?WSDL','WSDL');
$cliente->soap_defencoding = 'UTF-8';
$cliente->response_timeout = 600;
$err = $cliente->getError();

if($err) echo "Error (1) SOAP: ".$err;

//$respuestaWs = $cliente->call('HelloWorld', array());
$respuestaWs = $cliente->call('GenerarFactura', 
    array(
        'cabecera' => $obj_cabecera,
        'detalle' => $detalle
    )
);

if($cliente->fault) echo "Error cuerpo SOAP: ".$respuestaWs;

$err = $cliente->getError();

if($err) echo "Error (2) SOAP: ".$err;

echo "<pre>";
print_r($respuestaWs);
echo "</pre>";