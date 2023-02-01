<?php
include('../app/config.php');

$id_ticket = $_GET['id'];
$cubiculo = $_GET['cubiculo'];

$estado_inactivo = "0";
date_default_timezone_set("America/Mexico_City");
$fechaHora = date("Y-m_d h:i:s");

$sentencia = $pdo->prepare("UPDATE comprobante SET
estado = :estado,
fyh_eli = :fyh_eli
WHERE id_compr = :id_compr");

$sentencia->bindParam(':estado',$estado_inactivo);
$sentencia->bindParam(':fyh_eli',$fechaHora);
$sentencia->bindParam(':id_compr',$id_ticket);

if($sentencia->execute()){
    // CAMBIO DEOCUPADO A LIBRE
    $estado_esp = "LIBRE";
    $sentencias = $pdo->prepare("UPDATE mapeo SET
    estado_esp = :estado_esp,
    fyh_act = :fyh_act
    WHERE nomp = :nomp");
    
    $sentencias->bindParam(':estado_espa',$estado_esp);
    $sentencias->bindParam(':fyh_act',$fechaHora);
    $sentencias->bindParam(':nomp',$cubiculo);
    if($sentencias->execute()){
        echo "Se actualizo el estado del cubiculo";
        echo "se elimino el registro de la manera correcta";
            ?>
            <script>location.href = "../principal.php";</script>
            <?php
    }else{
        echo "ERRO al actualizar el no mapeo";
    }
}else{
    echo "error al eliminar el registro";
}