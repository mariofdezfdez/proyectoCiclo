<?php
include '../../config.php';
session_start();
$user_id = $_SESSION['user_id'];
if(!isset($user_id)){
   header('location:../../index.php');
}

if(isset($_POST['add_to_cart'])){
   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_quantity = $_POST['product_quantity'];
   $product_color = $_POST['color'];
   $product_certified = $_POST['certified'];

   mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, color, certified) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_color', '$product_certified')") or die('query failed');
   $message[] = 'Añadido al carrito!';
 
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">  
   <title>Tipos de hilos</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="../../css/styles.css">

</head>
<body>
<!-- menu navegacion usuario -->
<?php include '../header/header.php'; ?>

<div class="wrap"></div>
<div class="container-fluid">
   <div class="row">
      <div class="col">
         <h2 class="text-center p-3">Realizar pedido</h2>
      </div>
   </div>

   <div class="d-flex flex-wrap justify-content-start p-3">

      <?php  
         $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
               include("card_hilo.php");
            }
         }else{
            echo '<p class="empty">Productos no añadidos</p>';
         }
      ?>
      
   </div>  
   
</div>

<script src="js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>