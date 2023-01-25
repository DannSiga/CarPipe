<?php
include('../app/config.php');

$rol = $_GET['rol'];
date_default_timezone_set("America/Mexico_City");
$fechaHora = date("Y-m-d h:i:s");

//echo $nombre."-".$apellido."-".$celular."-".$email."-".$password_user;

$sentencia = $pdo->prepare("INSERT INTO tb_roles(rol, fyh_creacion, estado)
                                         VALUES (:rol, :fyh_creacion, :estado)");

$sentencia->bindParam('rol',$rol);
$sentencia->bindParam('estado',$estadoRegistro);
$sentencia->bindParam('fyh_creacion',$fechaHora);


if($sentencia->execute()){
    echo "Registro Exitoso";   
    ?><script> location.href = "index.php";</script> <?php
   
}else{
    echo"NO se pudo conectar con la Base de Datos";
}
?>