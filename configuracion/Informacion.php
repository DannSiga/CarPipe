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
      
      <h2>&nbsp Listado de información</h2>
      <br>
      <a href="create_info.php" class="btn btn-primary">Registrar nueva</a>
      <br>
      <table class="table table-Bordered">
        <th><center>No.</center></th>
        <th>Nombre</th>
        <th><center>Actividad</center></th>
        <th><center>Dirección</center></th>
        <th>Teléfono</th>
        <th><center>Acción</center></th>
        
        <?php
        $contador = 0;
        $query_informacions = $pdo->prepare("SELECT * FROM tb_informacion WHERE estado = '1' ");
        $query_informacions->execute();
        $informacions = $query_informacions->fetchAll(PDO::FETCH_ASSOC);
        foreach($informacions as $informacion){
          $id = $informacion['id_inf'];
          $nombre = $informacion['nombre_inf'];
          $actividad = $informacion['actividad'];
          $direccion = $informacion['direccion'];
          $telefono = $informacion['telefono'];
          $contador = $contador + 1;
          ?>
          <tr>
            <td><center><?php echo $contador;?></center></td>
            <td><?php echo $nombre;?></td>
            <td><?php echo $actividad;?></td>
            <td><?php echo $direccion;?></td>
            <td><?php echo $telefono;?></td>
            <td>
              <center>
                <a href="update_config.php?id=<?php echo $id;?>" class="btn btn-success">Editar</a>
                <a href="delete_config.php?id=<?php echo $id?>"class="btn btn-danger">Eliminar</a>
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