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
      <h2>&nbsp Agregar nuevo Mecanico</h2>
      <br>
      <div class="contrainer">
        <div class="row">
          <div class="col-md-6">
           <div class="card" style="border: 1px solid #2C3E50">
            <div class="card-header" style="background-color: #5DADE2; color:azure;">
             <h4>Nuevo</h4> 
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="">Nombre</label>
                <input type="text" class="form-control" id="nombre"> 
              </div>

              <div class="form-group">
                <label for="">Apellido</label>
                <input type="text" class="form-control" id="apellido"> 
              </div>

              <div class="form-group">
                <label for="">Celular</label>
                <input type="text" class="form-control" id="celular"> 
              </div>

              <div class="form-group">
                <label for="">Correo</label>
                <input type="email" class="form-control" id="correo"> 
              </div>

              <div class="form-group">
                <label for="">Contraseña</label>
                <input type="text" class="form-control" id="password_user"> 
              </div>

              <div class="form-group">
                <button class="btn btn-primary" id="btn_guardar">Guardar</button>
                <a href="<?php echo $URL;?>/usuarios/" class="btn btn-default">Cancelar</a>
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

    var nombre = $('#nombre').val();
    var apellido = $('#apellido').val();
    var celular = $('#celular').val();
    var correo = $('#correo').val();
    var password_user = $('#password_user').val();

    if(nombre == ""){
      alert('--> Debe llenar este campo');
      $('#nombre').focus();

    }else if(apellido == ""){
      alert('--> Necesita indicar el Apellido');
      $('#apellido').focus();

    }else if(celular == ""){
      alert('--> Necesita indicar el Celular');
      $('#celular').focus();

    }else if(correo == ""){
      alert('--> Necesita indicar el Correo');
      $('#correo').focus();

    }else if(password_user == ""){
      alert('--> Necesita indicar la Contraseña');
      $('#password_user').focus();

    }else{
      var url = 'controller_create.php'; 
      $.get(url, {nombre:nombre, apellido:apellido, celular:celular, correo:correo, password_user:password_user}, function(datos){
        $('#respuesta').html(datos);
      });
      
    }
     
  });
</script>