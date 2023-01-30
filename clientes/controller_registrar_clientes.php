<?php
include('../app/config.php');

$nombre_cliente = $_GET['nombre_cliente'];
$telefono = $_GET['telefono'];
$placa = $_GET['placa_auto'];

date_default_timezone_set("America/caracas");
$fechaHora = date("Y-m-d h:i:s");


//BUSCA SI EL CLIENTE YA ESTA REGISTRADO
$contador_cliente = 0;
$query_clientes = $pdo->prepare("SELECT * FROM clientes WHERE placa_auto = '$placa' AND estado = '1'  ");
$query_clientes->execute();
$datos_clientes = $query_clientes->fetchAll(PDO::FETCH_ASSOC);
foreach($datos_clientes as $datos_cliente){
    $contador_cliente = $contador_cliente + 1;
}
if($contador_cliente == "0"){
    echo "no hay ningun registro igual";
    $sentencia = $pdo->prepare('INSERT INTO tb_clientes (nombre_cliente,telefono,placa_auto, fyh_creacion, estado)
                                                 VALUES ( :nombre_cliente,:telefono,:placa_auto,:fyh_creacion,:estado)');

    $sentencia->bindParam(':nombre',$nombre_cliente);
    $sentencia->bindParam(':telefono',$telefono);
    $sentencia->bindParam(':placa_auto',$placa_auto);
    $sentencia->bindParam('fyh_creacion',$fechaHora);
    $sentencia->bindParam('estado',$estadoRegistro);

    if($sentencia->execute()){
        echo 'success';
//header('Location:' .$URL.'/');
    }else{
        echo 'error al registrar a la base de datos';
    }
}else{
     echo "este cliente ya es encuentra registrado";
}


