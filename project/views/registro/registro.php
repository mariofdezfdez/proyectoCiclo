<?php
include '../../config.php';
session_start();

if(isset($_POST['submit'])){

  // validaciones
  $validations = true;
  if (empty($_POST['name'])){
    $message[] = 'Error al obtener el nombre de usuario!';
    $validations = false;
  } 
  if (empty($_POST['email'])){
    $message[] = 'Error al obtener el email!';
    $validations = false;
  } 

  if ($validations){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
    $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));

    $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

    if(mysqli_num_rows($select_users) > 0){
      $message[] = 'El usuario ya existe!';
    }else{
      if($pass != $cpass){
          $message[] = 'Las contraseñas deben coincidir!';
      }else{
          mysqli_query($conn, "INSERT INTO `users`(name, email, password, user_type) VALUES('$name', '$email', '$cpass', 'user')") or die('query failed');
          $message[] = 'Registrado correctamente!';
          header('location: ../../index.php');
      }
    }
  }
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Spartan:wght@300;600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/ffec4ec2ed.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../css/registro.css" />

    <title>Registro</title>
  </head>

  <body class="bg-dark text-light">
    <section>
        <div class="row g-0">
            <div class="col-lg-7 d-none d-lg-block">
                <div id="imagenes" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                      <li data-target="#imagenes" data-slide-to="0" class="active"></li>
                      <li data-target="#imagenes" data-slide-to="1"></li>
                    </ol>
                    <div class="carousel-inner">
                      <div class="carousel-item img-3 min-vh-100 active">
                        <div class="carousel-caption d-none d-md-block">
                        </div>
                      </div>
                      <div class="carousel-item img-2 min-vh-100">
                        <div class="carousel-caption d-none d-md-block">
                        </div>
                      </div>
                    </div>
                    <a class="carousel-control-prev" href="#imagenes" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#imagenes" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
            </div>

            <div class="col-lg-5 bg-dark d-flex flex-column align-items-end min-vh-100">
                <div class="px-lg-5 pt-lg-3 pb-lg-3 p-3 mb-auto w-100">
                    <h4>MFF Yarns</h4>
                </div>
                <div class="align-self-center w-100 px-lg-4 py-lg-3 p-3">
                <h1 class="font-weight-bold mb-3">Nuevo usuario</h1>
                <form class="mb-5" method="post">
                    <div class="mb-3">
                      <label class="form-label font-weight-bold">Nombre</label>
                      <input type="text" class="form-control bg-dark-x border-0" id="name" name='name' placeholder="Ingresa tu nombre" required>
                    </div>
                    <div class="mb-3">
                      <label class="form-label font-weight-bold">Email</label>
                      <input type="email" class="form-control bg-dark-x border-0" id="email" name='email' placeholder="Ingresa tu email" required>
                    </div>
                    <div class="mb-3">
                      <label class="form-label font-weight-bold">Contraseña</label>
                      <input type="password" class="form-control bg-dark-x border-0 mb-2" 
                             placeholder="Ingresa tu contraseña (1ª letra mayúscula, min 8 carácteres)" 
                             id="password" name="password" minlength="8" 
                             pattern="[A-Z]+[a-zA-Z0-9]*"
                             title="Primera letra mayúscula, minimo 8 carácteres"
                             required>
                    </div>
                    <div class="mb-3">
                      <label class="form-label font-weight-bold">Confirmar contraseña</label>
                      <input type="password" class="form-control bg-dark-x border-0 mb-2" placeholder="Confirma tu contraseña" id="cpassword" name="cpassword" required>
                      <div class="text-danger">
                        <span id='message'></span>
                          <?php
                          include '../messages/message.php';
                          ?>
                      </div>
                    </div>
                    <input type="submit" id="registroUser" name="submit" value="Registrarse" class="btn btn-primary w-100">
                    <div class="text-center px-lg-5 pt-lg-3 pb-lg-4 p-4 mt-auto w-100">
                      <p class="d-inline-block mb-0">¿Tienes cuenta?</p> <a href="../../index.php" class="text-light font-weight-bold text-decoration-none">Iniciar sesión</a>
                   </div>
                  </form>
                  
                </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="../../js/validaciones.js"></script>
  </body>
</html>

