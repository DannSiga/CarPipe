<?php
include('../app/config.php');

$nombre_inf = $_GET['nombre_inf'];
$actividad = $_GET['actividad'];
$direccion = $_GET['direccion'];
$telefono = $_GET['telefono'];

date_default_timezone_set("America/Mexico_City");
$fechaHora = date("Y-m-d h:i:s");


$sentencia = $pdo->prepare("INSERT INTO tb_informacion(nombre_inf, actividad, direccion, telefono, fecha_creacion, estado)
                                   VALUES (:nombre_inf, :actividad, :direccion, :telefono, :fecha_creacion, :estado)");

$sentencia->bindParam(':nombre_inf',$nombre_inf);
$sentencia->bindParam(':actividad',$actividad);
$sentencia->bindParam(':direccion',$direccion);
$sentencia->bindParam(':telefono',$telefono);
$sentencia->bindParam('fecha_creacion',$fechaHora);
$sentencia->bindParam('estado',$estadoRegistro);

if($sentencia->execute()){
    echo 'success';
    ?><script> location.href = "Informacion.php";</script> <?php
}else{
    echo 'error al registrar a la base de datos';
}

?>