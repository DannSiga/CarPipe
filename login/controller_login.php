<?php
 include('../app/config.php');
 session_start();

 $usuario_user = $_POST['usuario'];
 $password_user = $_POST['password_user'];

 $form_login = "";
 if($_POST['form_login']){
   $form_login = 'true';
 }

 //echo $usuario." - ".$password_user;
 $email_table ='';
 $password_table='';

 $query_login = $pdo->prepare("SELECT * FROM mecanico WHERE correo = '$usuario_user' AND password_user = '$password_user' AND estado = '1' ");
 $query_login->execute();
 $usuario = $query_login->fetchAll(PDO::FETCH_ASSOC);
 foreach($usuario as $usuario){
    $email_table = $usuario['correo'];
    $password_table = $usuario['password_user'];
 }
 if(($usuario_user ==$email_table)&&($password_user==$password_table)){
   if($form_login==""){?>
      <div class="alert alert-success"role="alert">
      Usuario Correcto
      </div>
      <script>location.href = "principal.php";</script>  
      <?php
   }else{
    ?>
    <div class="alert alert-success"role="alert">
      Usuario Correcto
      </div>
      <script>location.href = "../principal.php";</script>  
      <?php
   }
   ?>
   <?php
    $_SESSION['usuario_sesion']=$email_table;
 }else{
    ?>
    <div class="alert alert-danger" role="alert">
        Dato Erroneo
    </div>
    <script>$('#password').val("");$('#password').focus();    </script>
    <?php
 }


?>