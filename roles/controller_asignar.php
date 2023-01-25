<?php
include('../app/config.php');

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['correo'];
$id_user = $_POST['id_user'];
$rol = $_POST['role'];

date_default_timezone_set("America/Mexico_City");
$fechaHora = date("Y-m-d h:i:s");

$sentencia = $pdo->prepare("UPDATE mecanico SET
rol = :rol
WHERE id_usua = :id_usua");

$sentencia->bindParam(':rol',$rol);
$sentencia->bindParam(':id_usua',$id_user);

if($sentencia->execute()){
    echo "Se a asignado el Rol exitosamente";
    ?> <script>location.href = "asignar.php";</script>
    <?php

}else{
    echo "ERROR al Asignar Rol alusuario";
}
