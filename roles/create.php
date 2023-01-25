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
    <div class="contrainer">
      <h2>&nbsp Crear nuevo rol</h2>
      <br>
      <div class="contrainer">
        <div class="row">
          <div class="col-md-6">
           <div class="card" style="border: 1px solid #2C3E50">
            <div class="card-header" style="background-color: #5DADE2; color:azure;">
             <h4>Nuevo Rol</h4> 
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="">ROL </label>
                <input type="text" class="form-control" id="rol"> 
              </div>

              <div class="form-group">
                <button class="btn btn-primary" id="btn_guardar">Guardar</button>
                <a href="<?php echo $URL;?>/roles/" class="btn btn-default">Cancelar</a>
              </div>
              <div id="respuesta">
                
              </div>
            </div>
          </div>
          </div>
         <div class="col-md-6"></div>
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
    var rol = $('#rol').val();
  
    if(rol == ""){
      alert('--> Debe llenar este campo');
      $('#rol').focus();

    }else{
      var url = 'controller_create.php'; 
      $.get(url, {rol:rol}, function(datos){
        $('#respuesta').html(datos);
      }); 
    }
     
  });
</script>