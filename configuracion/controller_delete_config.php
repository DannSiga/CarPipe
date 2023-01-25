<?php
include('../app/config.php');

$id_informacion = $_GET['id_informacion'];
$estado_inactivo = "0";

date_default_timezone_set("America/Mexico_City");
$fechaHora = date("Y-m-d h:i:s");

$sentencia = $pdo->prepare("UPDATE tb_informacion SET
estado = :estado,
fyh_eliminacion = :fyh_eliminacion
WHERE id_inf = :id_inf");

$sentencia->bindParam(':estado',$estado_inactivo);
$sentencia->bindParam(':fyh_eliminacion',$fechaHora);
$sentencia->bindParam(':id_inf',$id_informacion);

if($sentencia->execute()){
    echo "El registro fue eliminado";
    ?> <script>location.href = "Informacion.php";</script>
    <?php
}else{
    echo "ERROR al eliminar el registro";  
}
?>