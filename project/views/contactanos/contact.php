<?php
include '../../config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:../../index.php');
}

if(isset($_POST['send'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $number = $_POST['number'];
   $msg = mysqli_real_escape_string($conn, $_POST['message']);

   $select_message = mysqli_query($conn, "SELECT * FROM `message` WHERE name = '$name' AND email = '$email' AND number = '$number' AND message = '$msg'") or die('query failed');

   if(mysqli_num_rows($select_message) > 0){
      $message[] = 'El mensaje ya ha sido enviado!';
   }else{
      mysqli_query($conn, "INSERT INTO `message`(user_id, name, email, number, message) VALUES('$user_id', '$name', '$email', '$number', '$msg')") or die('query failed');
      $message[] = 'Mensaje enviado correctamente!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">  
   <title>contacto</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="../../css/styles.css">

</head>
<body>
<!-- menu navegacion usuario -->   
<?php include '../header/header.php'; ?>
<div class="wrap"></div>


<div class="container text-center">
   <div>
      <h2 class="m-3">CONTACTANOS</h2>
   </div>
   <form action="" method="post">
      <div class="row p-2">
         <div class="col-4">
            <input type="text" class="form-control" name="name" id="exampleFormControlInput1" placeholder="Nombre">
         </div>
         <div class="col-4">
            <input type="email" class="form-control" name="email" id="exampleFormControlInput1" placeholder="Email">
         </div>
         <div class="col-4">
            <input type="text" class="form-control" name="number" id="exampleFormControlInput1" placeholder="Teléfono">
         </div>
      </div>

      <div class="row p-2">
         <div class="col-12">
            <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="3" placeholder="Introduce el mensaje"></textarea>
         </div>
      </div>

      <div class="row p-2">
         <div class="col">
            <input type="submit" class="btn btn-primary" class="form-control" name="send"  id="exampleFormControlInput1" value="Enviar">
         </div>
      </div>
   </form>
</div>
   
<script src="js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>