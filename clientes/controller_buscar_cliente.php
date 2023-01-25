<?php 
include('../app/config.php');

$placa = $_GET['placa'];
$placa = strtoupper($placa);

//echo "busncadon placa".$placa;

$idCliente='';
$nombre_cli='';
$nit_cliente='';

$query_buscars = $pdo->prepare("SELECT * FROM clientes WHERE estado = '1' AND placa_auto = '$placa' ");
$query_buscars->execute();
$buscars = $query_buscars->fetchAll(PDO::FETCH_ASSOC);
foreach($buscars as $buscar){
  $idCliente = $buscar['idCliente'];
  $nombre_cli = $buscar['nombre'];
  $nit_cliente = $buscar['nit_cliente'];
}
if($nombre_cli == "")
{
    //echo "Nuevo cliente";
    ?>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Nombre:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control">
        </div>
    </div>
    
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">NIT:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control">
        </div>
    </div>
    <?php
}else{
    //echo $nombre_cli."-".$nit_cliente;
    ?>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Nombre:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" value="<?php echo $nombre_cli; ?>"> 
        </div>
    </div>
    
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">NIT:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" value="<?php echo $nit_cliente; ?>;">
        </div>
    </div>
    <?php
    }
    ?>