<?php
include('../app/config.php');

$nombre_cli = $_GET['nombre'];
$telefono = $_GET['telefono'];
$cubibulo = $_GET['cubibulo'];
$fecha_ingreso = $_GET['fecha_ingreso'];
$hora_ingreso = $_GET['hora_ingreso'];
$usuario_sesion = $_GET['responsable'];
//$observacion = $_GET['observ'];

date_default_timezone_set("America/Mexico_City");
$fechaHora = date("Y-m_d h:i:s");

$sentencia = $pdo->prepare('INSERT INTO comprobante(nombre, telefono, cubibulo, fecha_ingreso, hora_ingreso, responsable, fyh_crea, estado)
                                             VALUES(:nombre, :telefono, :cubibulo,:fecha_ingreso, :hora_ingreso, :responsable, :fyh_crea, :estado)');


$sentencia->bindParam('nombre',$nombre);
$sentencia->bindParam('telefono',$telefono);
$sentencia->bindParam('cubibulo',$cubibulo);
$sentencia->bindParam('fecha_ingreso',$fecha_ingreso);
$sentencia->bindParam('hora_ingreso',$hora_ingreso);
$sentencia->bindParam('responsable',$usuario_sesion);
//$sentencia->bindParam('observ',$observacion);
$sentencia->bindParam('fyh_crea',$fechaHora);
$sentencia->bindParam('estado',$estadoRegistro);

if($sentencia->execute()){
    echo 'success';

}else{
    echo 'error al registrar a la base de datos';
}