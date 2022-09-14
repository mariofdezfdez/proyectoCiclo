<?php
include '../../config.php';
session_start();
$user_id = $_SESSION['user_id'];
if(!isset($user_id)){
   header('location: ../index.php');
}

?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="../../css/home.css">
   <title>Document</title>
 </head>
 <body>
 <!-- menu navegacion usuario -->   
 <?php include '../header/header.php'; ?>
 

 <div class="home vh-100 d-flex align-items-center"id="inicio">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 mx-auto text-center">
                    <h1 class="text-white">Teñido del hilo</h1>
                    <p class="lead text-white">Realizamos tintado de hilo crudo con las
                        últimas máquinas innovadoras.
                    </p>
                </div>
            </div>
        </div>
    </div>
<script src="js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

 </html>  




