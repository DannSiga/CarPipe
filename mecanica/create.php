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
                    <h2>&nbsp Espacios de trabajo</h2>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-outline card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Campos requeridos</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                
                                <div class="card-body" style="display: block;">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form group">
                                            <label for="">No.</label>
                                            <input type="number" id="nomp" class="form-control">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form group">
                                            <label for="">Estado</label>
                                            <select name="" id="estado_esp" class="form-control">
                                                <option value="LIBRE">LIBRE</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
<br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form group">
                                            <label for="">Observación</label>
                                            <textarea name="" id="obs" cols="" class="form-control" rows="5"></textarea>
                                        </div>
                                    </div>

                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <a href="" class="btn btn-default btn-block">Cancelar</a>
                                    </div>
                                    <div class="col-md-6">
                                        <button class="btn btn-primary btn-block" id= "btn_guardar">
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

$('#btn_guardar').click(function(){
     
    var nomp = $('#nomp').val();
    var estado_esp = $('#estado_esp').val();
    var obs = $('#obs').val();
  
    if(nomp == ""){
      alert('--> Debe llenar este campo');
      $('#nomp').focus();

    }else{
      var url = 'controller_create.php'; 
      $.get(url, {nomp:nomp, estado_esp:estado_esp, obs:obs}, function(datos){
        $('#respuesta').html(datos);
      }); 
    }
     
  });
</script>