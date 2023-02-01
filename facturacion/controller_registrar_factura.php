<?php
include('../app/config.php');
//include('literal.php');

$dia = date("d");
$mes = date('m');
if($mes=="1")$mes = "Enero";
if($mes=="2")$mes = "Febrero";
if($mes=="3")$mes = "Marzo";
if($mes=="4")$mes = "Abril";
if($mes=="5")$mes = "Mayo";
if($mes=="6")$mes = "Junio";
if($mes=="7")$mes = "Julio";
if($mes=="8")$mes = "Agosto";
if($mes=="9")$mes = "Septiembre";
if($mes=="10")$mes = "Octubre";
if($mes=="11")$mes = "Noviembre";
if($mes=="12")$mes = "Diciembre";
$ano = date('Y');


$id_informacion =  $_GET['id_inf'];
$no_factura = $_GET['no_fact'];
$id_cliente = $_GET['idCliente'];

$fecha_factura = $dia." de ".$mes." de ".$ano;

$fecha_ingreso = $_GET['fecha_ingreso'];
$hora_ingreso = $_GET['hora_ingreso'];
$usuario_sesion = $_GET['responsable'];
$cubiculo =  $_GET['cubiculo'];
$diagnostico = "Servicio de parqueo de ";




$fecha_salida = date('Y-m-d');
$hora_salida = date('H:i');



date_default_timezone_set("America/Mexico_City");
$fechaHora = date("Y-m_d h:i:s");


$sentencia = $pdo->prepare('INSERT INTO facturas
        (id_inf, no_fact, idCliente, fecha_fact, fecha_ingreso, hora_ingreso, responsable, cubiculo, diagnostico, total, monto_total, monto_lit, cantidad, fecha_salido, hora_salida, qr, fyh_crea, estado)
VALUES (:id_inf, :no_fact, :idCliente, :fecha_fact, :fecha_ingreso, :hora_ingreso, :responsable, :cubiculo, :diagnostico, :total, :monto_total, :monto_lit, :cantidad, :fecha_salida, :hora_salida, :qr, :fyh_crea, :estado');

$sentencia->bindParam(':id_inf',$id_informacion);
$sentencia->bindParam(':no_fact',$no_factura);
$sentencia->bindParam(':idCliente',$id_cliente);

$sentencia->bindParam(':fecha_fact',$fecha_factura);

$sentencia->bindParam(':fecha_ingreso',$fecha_ingreso);
$sentencia->bindParam(':hora_ingreso',$hora_ingreso);
$sentencia->bindParam(':responsable',$usuario_sesion);
$sentencia->bindParam(':cubiculo',$cubiculo);
$sentencia->bindParam(':diagnostico',$detalle);

$sentencia->bindParam(':total',$total);
$sentencia->bindParam(':monto_total',$monto_total);
$sentencia->bindParam(':monto_lit',$monto_literal);
$sentencia->bindParam(':cantidad',$cantidad);

$sentencia->bindParam(':fecha_salida',$fecha_salida);
$sentencia->bindParam(':hora_salida',$hora_salida);


$sentencia->bindParam(':qr',$qr);

$sentencia->bindParam('fyh_crea',$fechaHora);
$sentencia->bindParam('estado',$estado_del_registro);

if($sentencia->execute()){
    echo 'success';

    $estado_espacio = "LIBRE";
    date_default_timezone_set("America/Mexico_City");
    $fechaHora = date("Y-m_d h:i:s");
    $sentencia = $pdo->prepare("UPDATE tb_mapeos SET
    estado_espacio = :estado_espacio,
    fyh_actualizacion = :fyh_actualizacion 
    WHERE nro_espacio = :nro_espacio");
    $sentencia->bindParam(':estado_espacio',$estado_espacio);
    $sentencia->bindParam(':fyh_actualizacion',$fechaHora);
    $sentencia->bindParam(':nro_espacio',$cuviculo);
    $sentencia->execute();


    $estado_espacio_ticket = "LIBRE";
    $sentencia_ticket = $pdo->prepare("UPDATE tb_tickets SET
    estado_ticket = :estado_ticket WHERE fecha_ingreso = :fecha_ingreso AND hora_ingreso = :hora_ingreso");
    $sentencia_ticket->bindParam(':estado_ticket',$estado_espacio_ticket);
    $sentencia_ticket->bindParam(':fecha_ingreso',$fecha_ingreso);
    $sentencia_ticket->bindParam(':hora_ingreso',$hora_ingreso);
    $sentencia_ticket->execute();


    ?>
    <script>location.href = "facturacion/factura.php";</script>
    <?php
}else{
    echo 'error al registrar a la base de datos';
}







$precio_dia = 0;
$query_precios_dias = $pdo->prepare("SELECT * FROM tb_precios WHERE cantidad = '$diff->days' AND detalle = 'DIAS' AND estado = '1'  ");
$query_precios_dias->execute();
$datos_precios_dias = $query_precios_dias->fetchAll(PDO::FETCH_ASSOC);
foreach($datos_precios_dias as $datos_precios_dia){
    $precio_dia = $datos_precios_dia['precio'];
}
/////////////////////////////////////////////////////////

$precio_final = $precio_dia + $precio_hora;

$cantidad = "1";

$total = ($precio_final * $cantidad);

$monto_total = $total;

$monto_literal = numtoletras($monto_total);

$user_sesion = $_GET['user_sesion'];



/////////////////////// rescatando los datos del cliente//////////////////////////////////
$query_clientes = $pdo->prepare("SELECT * FROM tb_clientes WHERE id_cliente = '$id_cliente' AND estado = '1'  ");
$query_clientes->execute();
$datos_clientes = $query_clientes->fetchAll(PDO::FETCH_ASSOC);
foreach($datos_clientes as $datos_cliente){
    $id_cliente = $datos_cliente['id_cliente'];
    $nombre_cliente = $datos_cliente['nombre_cliente'];
    $nit_ci_cliente = $datos_cliente['nit_ci_cliente'];
    $placa_auto = $datos_cliente['placa_auto'];
}
/////////////////////////////////////////////////////////////////////////////////////////////

$qr = "Factura realizada para el al cliente ".$nombre_cliente." con CI/NIT:
 ".$nit_ci_cliente." con el vehiculo con número de placa ".$placa_auto." y esta factura se genero en
  ".$fecha_factura." a hr: ".$hora_salida;
