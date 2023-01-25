<?php
include('../app/config.php');

$nombre_inf = $_GET['nombre_inf'];
$actividad = $_GET['actividad'];
$direccion = $_GET['direccion'];
$telefono = $_GET['telefono'];
$id_informacion = $_GET['id_informacion'];

date_default_timezone_set("America/Mexico_City");
$fechaHora = date("Y-m_d h:i:s");
 
$sentencia = $pdo->prepare("UPDATE tb_informacion SET
nombre_inf = :nombre_inf,
actividad =:actividad,
direccion = :direccion,
telefono = :telefono,
fyh_actualizacion = :fyh_actualizacion
WHERE id_inf = :id_inf");

$sentencia->bindParam(':nombre_inf',$nombre_inf);
$sentencia->bindParam(':actividad',$actividad);
$sentencia->bindParam(':direccion',$direccion);
$sentencia->bindParam(':telefono',$telefono);
$sentencia->bindParam(':fyh_actualizacion',$fechaHora);
$sentencia->bindParam(':id_inf',$id_informacion);

if($sentencia->execute()){
    echo "Actualizacion Exitosa";
}else{
    echo "Error al actualizar";
}
