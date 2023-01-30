<?php
include('../app/config.php');

$cubiculo = $_GET['cubiculo'];
$estado_espacio = "OCUPADO";


date_default_timezone_set("America/caracas");
$fechaHora = date("Y-m-d h:i:s");
//echo $nombres."-".$email."-".$password_user;

$sentencia = $pdo->prepare("UPDATE mapeo SET
estado_esp = :estado_esp,
fyh_act = :fyh_act
WHERE id_mp = :id_mp");

$sentencia->bindParam(':estado_esp',$estado_espacio);
$sentencia->bindParam(':fyh_act',$fechaHora);
$sentencia->bindParam(':id_mp',$cubiculo);

if($sentencia->execute()){
    echo "se actualizo el registro de la manera correcta";
    ?>
   <!-- <script>location.href = "../usuarios/";</script> -->
    <?php
}else{
    echo "error al actualizar el registro";
}