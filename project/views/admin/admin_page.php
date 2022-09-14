<?php
include '../../config.php';
session_start();
$admin_id = $_SESSION['admin_id'];
if(!isset($admin_id)){
   header('location:../../index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">  
   <title>admin panel</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="../../css/admin_styles.css">
   <link rel="stylesheet" href="../../css/styles.css">

</head>
<body>
<!-- Menú navegacion administrador    -->
<?php include 'admin_header.php'; ?>

<div class="container">
   <h1 class="text-center mt-5 mb-5">DASHBOARD</h1>
   <div class="d-flex flex-wrap justify-content-start p-3">
      
      <div>
         <?php 
            $select_orders = mysqli_query($conn, "SELECT * FROM `orders`") or die('query failed');
            $number_of_orders = mysqli_num_rows($select_orders);
            $data = ["TOTAL PEDIDOS", $number_of_orders];
         ?>
         <h3><?php include("partials/card_page_summary.php"); ?></h3>
      </div>

      <div>
         <?php 
            $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
            $number_of_products = mysqli_num_rows($select_products);
            $data = ["TOTAL PRODUCTOS", $number_of_products];
         ?>
         <h3><?php include("partials/card_page_summary.php"); ?></h3>
      </div>

      <div>
         <?php 
            $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE user_type = 'user'") or die('query failed');
            $number_of_users = mysqli_num_rows($select_users);
            $data = ["TOTAL USUARIOS", $number_of_users];
         ?>
         <h3><?php include("partials/card_page_summary.php"); ?></h3>
      </div>

      <div>
         <?php 
            $select_admins = mysqli_query($conn, "SELECT * FROM `users` WHERE user_type = 'admin'") or die('query failed');
            $number_of_admins = mysqli_num_rows($select_admins);
            $data = ["TOTAL ADMINS", $number_of_admins];
         ?>
         <h3><?php include("partials/card_page_summary.php"); ?></h3>
      </div>

      <div>
         <?php 
            $select_account = mysqli_query($conn, "SELECT * FROM `users`") or die('query failed');
            $number_of_account = mysqli_num_rows($select_account);
            $data = ["TOTAL CUENTAS", $number_of_account];
         ?>
         <h3><?php include("partials/card_page_summary.php"); ?></h3>
      </div>

      <div>
         <?php 
            $select_messages = mysqli_query($conn, "SELECT * FROM `message`") or die('query failed');
            $number_of_messages = mysqli_num_rows($select_messages);
            $data = ["TOTAL MENSAJES", $number_of_messages];
         ?>
         <h3><?php include("partials/card_page_summary.php"); ?></h3>
      </div>

   </div>
</div>

<script src="js/admin_script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
