<?php

define('SERVIDOR','localhost');
define('USUARIO','root');
define('PASSWORD','');
define('BD','bd_carpi');

$servidor = "mysql:dbname=".BD."; host=".SERVIDOR;

try{
    $pdo = new PDO($servidor,USUARIO,PASSWORD,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
}catch(PDOException $e){
    echo"Error de Conexion";
    echo"<script> alert('ERROR'); </script>";
}


$URL = "http://localhost/www.carpipe.com";
$estadoRegistro = "1" ;


?>