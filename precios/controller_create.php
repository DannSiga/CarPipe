<?php
include('../app/config.php');

$cantidad = $_GET['cantidad'];
$diagnostico = $_GET['diagnostico'];
$precio = $_GET['precio'];

date_default_timezone_set("America/Mexico_City");
$fechaHora = date("Y-m_d h:i:s");

$sentencia = $pdo->prepare('INSERT INTO precios(cantidad, diagnostico, precio, fyh_crea, estado)
                                        VALUES ( :cantidad,:diagnostico, :precio, :fyh_crea, :estado)');

$sentencia->bindParam(':cantidad',$cantidad);
$sentencia->bindParam(':diagnostico',$diagnostico);
$sentencia->bindParam(':precio',$precio);
$sentencia->bindParam('fyh_crea',$fechaHora);
$sentencia->bindParam('estado',$estadoRegistro);

if($sentencia->execute()){
    echo 'success';
//header('Location:' .$URL.'/');
    ?>
    <script>location.href = "index.php";</script>
<?php
}else{
    echo 'error al registrar a la base de datos';
}