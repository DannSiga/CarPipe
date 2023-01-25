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
      <h2>&nbsp Listado de Mecanicos</h2>
      <br>
      <table class="table table-Bordered">
        <th><center>No.</center></th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Celular</th>
        <th>Correo Electronico</th><th><center>Acción</center></th>
        
        <?php
        $contador = 0;
        $query_usuario = $pdo->prepare("SELECT * FROM mecanico WHERE estado = '1' ");
        $query_usuario->execute();
        $usuarios = $query_usuario->fetchAll(PDO::FETCH_ASSOC);
        foreach($usuarios as $usuario){
          $id = $usuario['id_usua'];
          $nombre = $usuario['nombre'];
          $apellido = $usuario['apellido'];
          $celular = $usuario['celular'];
          $correo = $usuario['correo'];
          $contador = $contador + 1;
          ?>
          <tr>
            <td><center><?php echo $contador;?></center></td>
            <td><?php echo $nombre;?></td>
            <td><?php echo $apellido;?></td>
            <td><?php echo $celular;?></td>
            <td><?php echo $correo;?></td>
            <td>
              <center>
                <a href="update.php?id=<?php echo $id;?>" class="btn btn-success">Editar</a>
                <a href="delete.php?id=<?php echo $id?>"class="btn btn-danger">Eliminar</a>
              </center>
            </td>
          </tr>
          <?php
          }
          ?>
          </table>
        </div>
      </div>
    </div>
    <?php include('../layout/admin/footer.php');?>
  </div>
  <?php include('../layout/admin/footer_link.php');?>
</body>
</html>