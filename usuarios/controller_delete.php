<?php

include('../app/config.php');

$id_user = $_GET['id_user'];
$estado_inactivo = "0";

date_default_timezone_set("America/Mexico_City");
$fechaHora = date("Y-m_d h:i:s");

//$sentencia = $pdo->prepare("DELETE FROM mecanico WHERE id_usua = '$id_user';");

$sentencia = $pdo->prepare("UPDATE mecanico SET
estado = :estado,
fecha_eliminacion = :fecha_eliminacion
WHERE id_usua = :id_usua");

$sentencia->bindParam(':estado',$estado_inactivo);
$sentencia->bindParam(':fecha_eliminacion',$fechaHora);
$sentencia->bindParam(':id_usua',$id_user);

if($sentencia->execute()){
    echo "El registro fue eliminado";
    ?> <script>location.href = "index.php";</script>
    <?php

}else{
    echo "ERROR al eliminar el registro";  
}


?>