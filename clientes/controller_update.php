<?php
include('../app/config.php');

$nombre_cliente = $_GET['nombre_cliente'];
$telefono = $_GET['telefono'];
$placa_auto = $_GET['placa_auto'];
$id_cliente = $_GET['id_cliente'];


date_default_timezone_set("America/caracas");
$fechaHora = date("Y-m-d h:i:s");
//echo $nombres."-".$email."-".$password_user;

$sentencia = $pdo->prepare("UPDATE clientes SET
nombre = :nombre,
telefono = :telefono,
placa_auto = :placa_auto,
fyh_actualizacion = :fyh_actualizacion 
WHERE idCliente = :idCliente");

$sentencia->bindParam(':nombre',$nombre_cliente);
$sentencia->bindParam(':telefono',$telefono);
$sentencia->bindParam(':placa_auto',$placa_auto);
$sentencia->bindParam(':fyh_actualizacion',$fechaHora);
$sentencia->bindParam(':idCliente',$id_cliente);

if($sentencia->execute()){
    echo "se actualizo el registro de la manera correcta";
    ?>
    <script>location.href = "index.php";</script>
    <?php
}else{
    echo "error al actualizar el registro";
}