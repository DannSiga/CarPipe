<?php
include('../app/config.php');

$nombre = $_GET['nombre'];
$apellido = $_GET['apellido'];
$celular = $_GET['celular'];
$email = $_GET['correo'];
$password_user = $_GET['password_user'];
$id_user = $_GET['id_user'];
date_default_timezone_set("America/Mexico_City");
$fechaHora = date("Y-m_d h:i:s");

$sentencia = $pdo->prepare("UPDATE mecanico SET
nombre = :nombre,
apellido =:apellido,
celular = :celular,
correo = :correo,
password_user = :password_user,
fecha_actualizacion = :fecha_actualizacion
WHERE id_usua = :id_usua");

$sentencia->bindParam(':nombre',$nombre);
$sentencia->bindParam(':apellido',$apellido);
$sentencia->bindParam(':celular',$celular);
$sentencia->bindParam(':correo',$email);
$sentencia->bindParam(':password_user',$password_user);
$sentencia->bindParam(':fecha_actualizacion',$fechaHora);
$sentencia->bindParam(':id_usua',$id_user);

if($sentencia->execute()){
    echo "Actuailizacion exitosa";
    ?> <script>location.href = "index.php";</script>
    <?php

}else{
    echo "ERROR al Actualizar";
}