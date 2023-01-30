<?php

session_start();

 if(isset($_SESSION['usuario_sesion'])){
  $usuario_sesion = $_SESSION['usuario_sesion'];

  $query_usuario_sesion = $pdo->prepare("SELECT * FROM mecanico WHERE correo = '$usuario_sesion' AND estado = '1' ");
  $query_usuario_sesion->execute();
  $usuarios_sesions = $query_usuario_sesion->fetchAll(PDO::FETCH_ASSOC);
  foreach($usuarios_sesions as $usuarios_sesion){
    $id_user_sesion = $usuarios_sesion['id_usua'];
    $nombre_sesion = $usuarios_sesion['nombre'];
    $apellido = $usuarios_sesion['apellido'];
      $rol_sesion = $usuarios_sesion['rol'];
      $celular = $usuarios_sesion['celular'];
    $correo_sesion = $usuarios_sesion['correo'];
  }
    
 }else{
    echo "Sesion NO iniciada";
    header('Location: '.$URL.'/login');
 }
?>