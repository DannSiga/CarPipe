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
          <h2>&nbsp Espacios activos</h2>
          <br>
          <div class="row">
            <div class="col-md-4">
              <table class="table table-Bordered">
                <th><center>No.</center></th>
                <th><center>Cubiculo</center></th>
                <th><center>Acción</center></th>

                <?php
                $contador = 0;
                $query_mapeos = $pdo->prepare("SELECT * FROM mapeo WHERE estado = '1' ");
                $query_mapeos->execute();
                $mapeos = $query_mapeos->fetchAll(PDO::FETCH_ASSOC);
                foreach($mapeos as $mapeo){
                  $id_map = $mapeo['id_mp'];
                  $no_espas = $mapeo['nomp'];
                  $contador = $contador + 1;
                  ?>
                  <tr>
                    <td><center><?php echo $contador;?></center></td>
                    <td><?php echo $no_espas;?></td>
                    <td>
                      <center>
                        <a href="" class="btn btn-danger">Eliminar</a>
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
      </div>
      <?php include('../layout/admin/footer.php');?>
    </div>
    <?php include('../layout/admin/footer_link.php');?>
  </body>
</html>

