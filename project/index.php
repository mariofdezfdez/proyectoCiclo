<?php
include 'config.php';
session_start();

if(isset($_POST['submit'])){

  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

  $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

  if(mysqli_num_rows($select_users) > 0){

     $row = mysqli_fetch_assoc($select_users);

     if($row['user_type'] == 'admin'){

        $_SESSION['admin_name'] = $row['name'];
        $_SESSION['admin_email'] = $row['email'];
        $_SESSION['admin_id'] = $row['id'];
        header('location:views/admin/admin_page.php');

     }elseif($row['user_type'] == 'user'){

        $_SESSION['user_name'] = $row['name'];
        $_SESSION['user_email'] = $row['email'];
        $_SESSION['user_id'] = $row['id'];
        header('location: views/home/home.php');

     }

  }else{
     $message[] = 'incorrect email or password!';
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
    <link rel="stylesheet" href="css/index.css" />

    <title>index</title>
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
                <h1 class="font-weight-bold mb-4">Iniciar sesion</h1>
                <form class="mb-5" method="post">
                    <div class="mb-4">
                      <label class="form-label font-weight-bold">Email</label>
                      <input type="email" class="form-control bg-dark-x border-0" name='email' placeholder="Ingresa tu email">
                    </div>
                    <div class="mb-4">
                      <label class="form-label font-weight-bold">Contraseña</label>
                      <input type="password" class="form-control bg-dark-x border-0 mb-2" placeholder="Ingresa tu contraseña" name="password">
                      <div class="text-danger">
                          <?php
                          include 'views/messages/message.php';
                          ?>
                      </div>
                      <a href="" id="emailHelp" class="form-text text-muted text-decoration-none">¿Has olvidado tu contraseña?</a>
                    </div>
                    <input type="submit" name="submit" value="Iniciar sesion" class="btn btn-primary w-100">
                  </form>
                </div>
                <div class="text-center px-lg-5 pt-lg-3 pb-lg-4 p-4 mt-auto w-100">
                    <p class="d-inline-block mb-0">¿Todavia no tienes una cuenta?</p> <a href="views/registro/registro.php" class="text-light font-weight-bold text-decoration-none">Crea una ahora</a>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
  </body>
</html>

