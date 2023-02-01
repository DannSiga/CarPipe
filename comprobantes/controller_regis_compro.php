<?php
include('../app/config.php');

$placa = $_GET['placa_buscar'];
$placa =strtoupper('placa_buscar');

$nombre_cli = $_GET['nombre_cliente'];
$telefono = $_GET['telefono'];
$cubibulo = $_GET['cubibulo'];
$fecha_ingreso = $_GET['fecha_ingreso'];
$hora_ingreso = $_GET['hora_ingreso'];
$usuario_sesion = $_GET['usuario sesion'];
$estado_compr = "OCUPADO";
//$observacion = $_GET['observ'];

date_default_timezone_set("America/Mexico_City");
$fechaHora = date("Y-m_d h:i:s");

$sentencia = $pdo->prepare('INSERT INTO comprobante(placa_auto, nombre, telefono, cubibulo, fecha_ingreso, hora_ingreso, estado_compr, responsable, fyh_crea, estado)
                                             VALUES(:placa_auto, :nombre, :telefono, :cubibulo,:fecha_ingreso, :hora_ingreso, ;estado_compr,:responsable, :fyh_crea, :estado)');

$sentencia->bindParam('placa_auto',$placa);
$sentencia->bindParam('nombre',$nombre);
$sentencia->bindParam('telefono',$telefono);
$sentencia->bindParam('cubibulo',$cubibulo);
$sentencia->bindParam('fecha_ingreso',$fecha_ingreso);
$sentencia->bindParam('hora_ingreso',$hora_ingreso);
$sentencia->bindParam('estado_compr',$estado_compr);
$sentencia->bindParam('responsable',$usuario_sesion);
//$sentencia->bindParam('observ',$observacion);
$sentencia->bindParam('fyh_crea',$fechaHora);
$sentencia->bindParam('estado',$estadoRegistro);

if($sentencia->execute()){
    echo 'success';

}else{
    echo 'error al registrar a la base de datos';
}