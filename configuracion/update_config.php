<?php
include('../app/config.php');
include('../layout/admin/datos_usuario_sesion.php');
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <?php include('../layout/admin/head.php');?>
    </head>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            <?php include('../layout/admin/menu.php');?>
            <div class="content-wrapper">
                <br>
                <div class="container">
                    <h2>&nbsp Actualizacion de Información</h2>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-outline card-success">
                                <div class="card-header">
                                    <h3 class="card-title">Registre la información cuidadosamente</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>

                                <?php
                                $id_info_get = $_GET['id'];
                                $query_informacions = $pdo->prepare("SELECT * FROM tb_informacion WHERE estado = '1' AND id_inf = $id_info_get");
                                $query_informacions->execute();
                                $informacions = $query_informacions->fetchAll(PDO::FETCH_ASSOC);
                                foreach($informacions as $informacion){
                                    $id_informacion = $informacion['id_inf'];
                                    $nombre = $informacion['nombre_inf'];
                                    $actividad = $informacion['actividad'];
                                    $direccion = $informacion['direccion'];
                                    $telefono = $informacion['telefono'];
                                }
                                ?>

                                <div class="card-body" style="display: blocks;">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Nombre <samp style="color: red;"><b>*</b></samp></label>
                                            <input type="text" class="form-control" id="nombre_inf" value="<?php echo $nombre;?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Actividad <samp style="color: red;"><b>*</b></samp></label>
                                            <input type="" class="form-control" id="actividad" value="<?php echo $actividad;?>">
                                    </div>
                                </div>
                            
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Dirección<samp style="color: red;"><b>*</b></samp></label>
                                            <input type="text" class="form-control" id="direccion"value="<?php echo $direccion;?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Teléfono</label>
                                            <input type="" class="form-control" id="telefono"value="<?php echo $telefono;?>">
                                    </div>
                                </div>

                                                           
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <a href="Informacion.php" class="btn btn-default btn-block">Cancelar</a>
                                    </div>
                                    <div class="col-md-6">
                                        <button class="btn btn-success btn-block" id= "btn_actualizar_info">
                                            Actualizar
                                        </button><br>          
                                    </div>
                                </div>
                                <div id="respuesta"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <?php include('../layout/admin/footer.php');?>
        </div>
        <?php include('../layout/admin/footer_link.php');?>
    </body>
</html>


<script>
    $('#btn_actualizar_info').click(function(){
     
        var nombre_inf = $('#nombre_inf').val();
        var actividad = $('#actividad').val();
        var direccion = $('#direccion').val();
        var telefono = $('#telefono').val();
        var id_informacion = '<?php echo $id_info_get;?>';

        if(nombre_inf == ""){
            alert('---> Debe llenar los campos');
            $('#nombre_inf').focus();
        }else if(actividad == ""){
            alert('---> Debe llenar la actividad');
            $('#actividad').focus();
        }else if(direccion == ""){
            alert('---> Debe llenar la direccion');
            $('#direccion').focus();
        }else if(telefono == ""){
            alert('---> Debe llenar el teléfono');
            $('#telefono').focus();  
        }else{
            var url = 'controller_update_info.php';
            $.get(url,{nombre_inf:nombre_inf,actividad:actividad,direccion:direccion,telefono:telefono,id_informacion:id_informacion}, function(datos){
                $('#respuesta').html(datos);
            });
        }
    });
</script>