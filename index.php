<?php include('app/config.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge">-->
    <meta nampe="viewport" content="width=device-width, initial-scale=1.0">
    <!--bootstrap-->
    <link href="public/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    
    <title>CarPipe</title>
</head>

<body style="background-image: url('public/imagenes/fondo.jpg')">
<nav class="navbar navbar-expand-lg" style="background-color: #7171FF ;">
 <!--<div class="container-fluid">-->
  <a class="navbar-brand" href="#">
      <img src="-" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
      Carpipe
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">INICIO</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">CONTACTO</a>
        </li>      
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      </form>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
          Ingresar
        </button>     
    </div>
</nav>
<br>

<div class="contrainer">
<div class="row">
                                  <?php
                                                  $query_mapeos = $pdo->prepare("SELECT * FROM mapeo WHERE estado = '1' ");
                                                  $query_mapeos->execute();
                                                  $mapeos = $query_mapeos->fetchAll(PDO::FETCH_ASSOC);
                                                  foreach($mapeos as $mapeo){
                                                    $id_map = $mapeo['id_mp'];
                                                    $no_espas = $mapeo['nomp'];
                                                    $estado_esp = $mapeo['estado_esp'];
                                                  
                                                  if($estado_esp == "LIBRE"){ ?>
                                                    <div class="col">
                                                      <center>
                                                        <h2><?php echo $no_espas?></h2>
                                                        <button class="btn btn-success" style="width: 50%; height: 115px">
                                                           <p><?php echo $estado_esp?></p>
                                                        </button>
                                                        
                                                      </center>
                                                    </div>
                                                    <?php
                                                    }
                                                    if($estado_esp == "OCUPADO"){ ?>
                                                      <div class="col">
                                                      <center>
                                                        <h2><?php echo $no_espas;?></h2>
                                                        <button class="btn btn-info">
                                                          <img src="<?php echo $URL;?>/public/imagenes/auto.png" width="100px" alt="">
                                                        </button>  
                                                        <p><?php echo $estado_esp; ?></p>
                                                      </center>
                                                    </div>
                                                      <?php
                                                    }
                                                    ?>
                                                    
                                                  <?php
                                                  }
                                  ?>
                                 
                                </div> 
</div>


  <script src="public/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script src="public/js/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="public/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
  <script src="public/js/jquery-3.6.3.min.js"></script>
</body>
</html>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">"
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Inicio de Sesión</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="">Usuario</label>
              <input type="email" id="usuario" class="form-control">
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label for="">Contraseña</label>
              <input type="password" id="password" class="form-control">
            </div>
          </div>
        </div>
        <div id="respuesta">
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" id="btn_ingresar">Ingresar</button>
      </div>
    </div>
  </div>
</div>

<script>
  $('#btn_ingresar').click(function(){
    login();
  });
  
  $('#password').keypress(function (e){
    if(e.which==13){
      login();
    }
  });

  function login(){
    var usuario = $('#usuario').val();
    var password_user = $('#password').val();

    if(usuario==""){
      alert('-> Debe introducir su Usuario');
      $('#usuario').focus();
    }else if(password_user==""){
      alert('-> Debe introducir su Contraseña');
      $('#password').focus();
    }else{
      var url = "login/controller_login.php"
      $.post(url, {usuario:usuario, password_user:password_user}, function(datos){
      $('#respuesta').html(datos);
    });
    }
  }
</script>