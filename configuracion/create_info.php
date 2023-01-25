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
                    <h2>&nbsp Creación de </h2>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-outline card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Registre la información cuidadosamente</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body" style="display: blocks;">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Nombre <samp style="color: red;"><b>*</b></samp></label>
                                            <input type="text" class="form-control" id="nombre_inf">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Actividad <samp style="color: red;"><b>*</b></samp></label>
                                            <input type="" class="form-control" id="actividad">
                                    </div>
                                </div>
                            
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Dirección<samp style="color: red;"><b>*</b></samp></label>
                                            <input type="text" class="form-control" id="direccion">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Teléfono</label>
                                            <input type="" class="form-control" id="telefono">
                                    </div>
                                </div>

                                                           
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <a href="Informacion.php" class="btn btn-default btn-block">Cancelar</a>
                                    </div>
                                    <div class="col-md-6">
                                        <button class="btn btn-primary btn-block" id= "btn_regis_info">
                                            Registrar
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
    $('#btn_regis_info').click(function(){
     
        var nombre_inf = $('#nombre_inf').val();
        var actividad = $('#actividad').val();
        var direccion = $('#direccion').val();
        var telefono = $('#telefono').val();

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
            var url = 'controller_create_info.php';
            $.get(url,{nombre_inf:nombre_inf,actividad:actividad,direccion:direccion,telefono:telefono}, function(datos){
                $('#respuesta').html(datos);
            });
        }
    });
</script>