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
                <?php 
                $id_get = $_GET['id'];
                $query_usuario = $pdo->prepare("SELECT * FROM mecanico WHERE id_usua= '$id_get' AND estado = '1' ");
                $query_usuario->execute();
                $usuarios = $query_usuario->fetchAll(PDO::FETCH_ASSOC);
                foreach($usuarios as $usuario){
                    $id = $usuario['id_usua'];
                    $nombre = $usuario['nombre'];
                    $apellido = $usuario['apellido'];
                    $celular = $usuario['celular'];
                    $correo = $usuario['correo'];
                    $password_user = $usuario['password_user'];
                }
                ?>
                
                <h2>&nbsp Actualización del Mecanico</h2>
                <div class="contrainer">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-success" style="border: 1px solid #777777;">
                            <div class="card-header">
                                <h3 class="card-title">Edición del Mecanico</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Nombre</label>
                                    <input type="text" class="form-control" id = 'nombre' value="<?php echo $nombre;?>"> 
                                </div>
                                
                                <div class="form-group">
                                    <label for="">Apellido</label>
                                    <input type="text" class="form-control" id ='apellido' value="<?php echo $apellido;?>" > 
                                </div>
                                
                                <div class="form-group">
                                    <label for="">Celular</label>
                                    <input type="text" class="form-control" id="celular" value="<?php echo $celular;?>">
                                </div>
                                
                                <div class="form-group">
                                    <label for="">Correo</label>
                                    <input type="email" class="form-control" id="correo" value="<?php echo $correo;?>">
                                </div>
                    
                                <div class="form-group">
                                    <label for="">Contraseña</label>
                                    <input type="text" class="form-control" id="password_user" value="<?php echo $password_user;?>"> 
                                </div>
                                
                                <div class="form-group">
                                    <button class="btn btn-success" id="btn_editar">Actualizar</button>
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
  $('#btn_editar').click(function(){
    var nombre = $('#nombre').val();
    var apellido = $('#apellido').val();
    var celular = $('#celular').val();
    var correo = $('#correo').val();
    var password_user = $('#password_user').val();
    var id_user = '<?php echo $id_get = $_GET['id'];?>';
  
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
      var url = 'controller_update.php'; 
      $.get(url, {nombre:nombre, apellido:apellido, celular:celular, correo:correo, password_user:password_user, id_user:id_user}, function(datos){
        $('#respuesta').html(datos);
      });
    }

  });
</script>