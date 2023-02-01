<?php
include('../app/config.php');

$cantidad = $_GET['cantidad'];
$diagnostico = $_GET['diagnostico'];
$precio = $_GET['precio'];
$id_precio = $_GET['id_precio'];

date_default_timezone_set("America/Mexico_City");
$fechaHora = date("Y-m_d h:i:s");

$sentencia = $pdo->prepare("UPDATE precios SET
cantidad = :cantidad,
diagnostico = :diagnostico,
precio = :precio,
fyh_actua = :fyh_actua 
WHERE id_precio = :id_precio");


$sentencia->bindParam(':cantidad',$cantidad);
$sentencia->bindParam(':diagnostico',$diagnostico);
$sentencia->bindParam(':precio',$precio);
$sentencia->bindParam('fyh_actua',$fechaHora);
$sentencia->bindParam('id_precio',$id_precio);

if($sentencia->execute()){
    echo 'ACTUALIZACION EXITOSA';
//header('Location:' .$URL.'/');
    ?>
    <script>location.href = "index.php";</script>
    <?php
}else{
    echo 'error al registrar a la base de datos';
}