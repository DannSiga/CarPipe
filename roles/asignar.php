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
                    <h2>&nbsp Asignacion de Roles</h2>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-outline card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Listado de Usuarios</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                
                                <div class="card-body" style="display: block;">
                                    <table class="table table-Bordered table-sm table-striped">
                                        <th><center>No.</center></th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Correo Electronico</th>
                                        <th><center>Asignar ROL</center></th>
                                    
                                        <?php
                                        $contador = 0;
                                        $query_usuario = $pdo->prepare("SELECT * FROM mecanico WHERE estado = '1' ");
                                        $query_usuario->execute();
                                        $usuarios = $query_usuario->fetchAll(PDO::FETCH_ASSOC);
                                        foreach($usuarios as $usuario){
                                            $id = $usuario['id_usua'];
                                            $nombre = $usuario['nombre'];
                                            $apellido = $usuario['apellido'];
                                            $rol = $usuario['rol'];
                                            $correo = $usuario['correo'];
                                            $contador = $contador + 1;
                                            ?>
                                            <tr>
                                                <td><center><?php echo $contador;?></center></td>
                                                <td><?php echo $nombre;?></td>
                                                <td><?php echo $apellido;?></td>
                                                <td><?php echo $correo;?></td>
                                                <td>
                                                    <center>
                                                        <?php 
                                                        if($rol == ""){ ?>
                                                        <!-- Button trigger modal -->
                                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal<?php echo $id;?>">
                                                        Asignar
                                                        </button>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="exampleModal<?php echo $id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Asignar ROL</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                        <form action="controller_asignar.php" method="post">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <label for="">Nombre</label>
                                                                                        <input type="text" name="nombre" class="form-control" value="<?php echo $nombre;?>">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        
                                                                                <div class="row">
                                                                                    <div class="col-md-12">
                                                                                         <div class="form-group">
                                                                                            <label for="">Apellido</label>
                                                                                            <input type="text" name="apellido" class="form-control" value="<?php echo $apellido;?>">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>    
                                                                        
                                                                                <div class="row">
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group">
                                                                                            <label for="">Correo</label>
                                                                                            <input type="text" name="correo" class="form-control" value="<?php echo $correo;?>">
                                                                                            <input type="text" name="id_user" value="<?php echo $id;?>"hidden>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="row">
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group">
                                                                                            <label for="">Rol</label>
                                                                                            <select name="role" id="" class="form-control">
                                                                                                <?php
                                                                                                $query_roles = $pdo->prepare("SELECT * FROM tb_roles WHERE estado = '1' ");
                                                                                                $query_roles->execute();
                                                                                                $roles = $query_roles->fetchAll(PDO::FETCH_ASSOC);
                                                                                                foreach($roles as $role){
                                                                                                    $id_rol = $role['id_rol'];
                                                                                                    $rol = $role['rol'];
                                                                                                    ?>
                                                                                                    <option value="<?php echo $rol?>"><?php echo $rol?></option>
                                                                                                    <?php
                                                                                                }
                                                                                                ?>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar </button>
                                                                                <button type="submit" class="btn btn-primary">Asignar</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php
                                                        }else{
                                                            echo $rol;
                                                        }
                                                        ?>
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
                </div>
            </div>
            <?php include('../layout/admin/footer.php');?>
        </div>
        <?php include('../layout/admin/footer_link.php');?></body>
</html>