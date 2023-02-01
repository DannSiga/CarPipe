<?php 
include('../app/config.php');

$placa = $_GET['placa'];
$placa = strtoupper($placa);
$id_map = $_GET['id_map'];

//echo "busncadon placa".$placa;

$idCliente='';
$nombre_cli='';
$telefono='';
//$obser='';

$query_buscars = $pdo->prepare("SELECT * FROM clientes WHERE estado = '1' AND placa_auto = '$placa' ");
$query_buscars->execute();
$buscars = $query_buscars->fetchAll(PDO::FETCH_ASSOC);
foreach($buscars as $buscar)
{
  $idCliente = $buscar['idCliente'];
  $nombre_cli = $buscar['nombre'];
  $telefono = $buscar['telefono'];
  //$observ = $buscar['observ'];
}if($nombre_cli == "")
{
    //echo "Nuevo cliente";
    ?>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-4 col-form-label">Nombre:<samp><b style="color: red;">*</b></samp></label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="nombre_cliente<?php echo $id_map;?>">
        </div>
    </div>
    
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-4 col-form-label">Teléfono:<samp><b style="color: red;">*</b></samp></label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="telefono<?php echo $id_map;?>">
        </div>
    </div>
<!--
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-4 col-form-label">Observaciones:</label>
        <div class="col-sm-8">
            <textarea name="" cols="" class="form-control" id="observ<?php echo $id_map;?>" rows="5"></textarea>
        </div>
    </div>
-->
    <?php
}else
{
    //echo $nombre_cli."-".$nit_cliente;
    ?>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-4 col-form-label">Nombre: </label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="nombre_cliente<?php echo $id_map;?>" value="<?php echo $nombre_cli; ?>" > 
        </div>
    </div>

    <div class="form-group row">
        <label for="staticEmail" class="col-sm-4 col-form-label">Telefono:</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="telefono<?php echo $id_map;?>" value="<?php echo $telefono;?>">
        </div>
    </div>
    <!--
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-4 col-form-label">Observaciones:</label>
        <div class="col-sm-8">
            <textarea name="" cols="" class="form-control" id="obser<?php echo $id_map;?>" rows="5" value="<?php echo $obser;?>"></textarea>
        </div>
    </div>
-->
    <?php
}
//Busca en clientes 
$contador_compro = 0;
$query_compro = $pdo->prepare("SELECT * FROM comrpobantes WHERE placa_auto = '$placa' AND estado_compr = 'OCUPADO' AND estado = '1' ");
$query_compro->execute();
$dtos_compro = $query_compro->fetchAll(PDO::FETCH_ASSOC);
foreach($buscars as $buscar)
{
 $contador_compro = $contador_compro + 1;
}if($contador_compro == "0")
{
    echo "No hay Ningún Registro Duplicado";
    ?>
    <script>
        $('#btn_registrar_compro<?php echo $id_map;?>').removeAttr('disabled');
    </script>
    <?php
}else
{
  //  echo "Vehiculo se encuentra dentro";
    ?>
    <div class="alert alert-danger">
        Este vehiculo ya se encuentra registrado
    </div>

    <script>
        $('#btn_registrar_compro<?php echo $id_map;?>').attr('disabled','disabled');
    </script>

    <?php
}
?>