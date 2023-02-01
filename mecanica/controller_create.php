<?php
include('../app/config.php');

$nomp = $_GET['nomp'];
$estado_esp = $_GET['estado_esp'];


date_default_timezone_set("America/Mexico_City");
$fechaHora = date("Y-m-d h:i:s");

$sentencia = $pdo->prepare("INSERT INTO mapeo(nomp, estado_esp, fyh_crea,estado)
                                         VALUES (:nomp, :estado_esp, :fyh_crea, :estado)");

$sentencia->bindParam('nomp',$nomp);
$sentencia->bindParam('estado_esp',$estado_esp);
$sentencia->bindParam('fyh_crea',$fechaHora);
$sentencia->bindParam('estado',$estadoRegistro);

if($sentencia->execute()){
    echo "Registro Exitoso";   
    ?><script> location.href = "mapeo.php";</script> <?php
   
}else{
    echo"NO se pudo conectar con la Base de Datos";
}
?>