<?php
include('../app/config.php');

$nombre = $_GET['nombre'];
$apellido = $_GET['apellido'];
$celular = $_GET['celular'];
$email= $_GET['correo'];
$password_user = $_GET['password_user'];

date_default_timezone_set("America/Mexico_City");
$fechaHora = date("Y-m_d h:i:s");


//echo $nombre."-".$apellido."-".$celular."-".$email."-".$password_user;

$sentencia = $pdo->prepare("INSERT INTO mecanico(nombre, apellido, celular, correo, password_user, fecha_creacion)
                                         VALUES (:nombre, :apellido,:celular,:correo,:password_user,:fecha_creacion)");
$sentencia->bindParam('nombre',$nombre);
$sentencia->bindParam('apellido',$apellido);
$sentencia->bindParam('celular',$celular);
$sentencia->bindParam('correo',$email);
$sentencia->bindParam('password_user',$password_user);
//$sentencia->bindParam('estado',$estadoRegistro);
$sentencia->bindParam('fecha_creacion',$fechaHora);


if($sentencia->execute()){
    echo "Registro Exitoso";   
    ?><script> location.href = "../roles/asignar.php ";</script> <?php
   
}else{
    echo"NO se pudo conectar con la Base de Datos";
}
?>