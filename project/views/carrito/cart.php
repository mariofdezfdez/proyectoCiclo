<?php
include '../../config.php';
session_start();
$user_id = $_SESSION['user_id'];
if(!isset($user_id)){
   header('location:../../index.php');
}

if(isset($_POST['update_cart'])){
   $cart_id = $_POST['cart_id'];
   $cart_quantity = $_POST['cart_quantity'];
   mysqli_query($conn, "UPDATE `cart` SET quantity = '$cart_quantity' WHERE id = '$cart_id'") or die('query failed');
   $message[] = 'Actualizado!';
}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$delete_id'") or die('query failed');
   header('location:cart.php');
}

if(isset($_GET['delete_all'])){
   mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
   header('location:cart.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">  
   <title>cart</title>
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
         <h2 class="text-center p-3">Datos del pedido</h2>
      </div>
   </div>

   <div class="d-flex flex-wrap justify-content-start p-3">
         <?php
            $grand_total = 0;
            $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
            if(mysqli_num_rows($select_cart) > 0){
               while($fetch_cart = mysqli_fetch_assoc($select_cart)){   
         ?>

         <div class="card mb-5 flex-grow-2 mx-3" style="width: 18rem;">
            <div class="card-body">
               <h5 class="card-title text-center">
                  <a href="cart.php?delete=<?php echo $fetch_cart['id']; ?>" class="fas fa-times x-icon" onclick="return confirm('Eliminar del carro?');"></a>
                  <?php echo $fetch_cart['name']; ?> &nbsp;
                  <?php echo $fetch_cart['price']; ?>€/kg
               </h5>
                  <div class="color">Color: <?php echo $fetch_cart['color']; ?></div>
                  <div class="certified">Certificado: <?php echo $fetch_cart['certified']; ?></div>
                  <form action="" method="post">
                     <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id']; ?>">
                     <input type="text"  name="cart_quantity" value="<?php echo $fetch_cart['quantity']; ?>">
                     <input type="submit" name="update_cart" value="Modificar" class="option-btn">
                  </form>
                  <div class="sub-total"> Total: <span><?php echo $sub_total = ($fetch_cart['quantity'] * $fetch_cart['price']); ?>€</span></div>                             
            </div>
         </div>
            <?php
               $grand_total += $sub_total;
               }
               }else{
                  echo '<p class="empty">Tu carro esta vacio</p>';
               }
            ?>         
   </div>
  

   <div class="container deleteAll text-center">
      <a href="cart.php?delete_all" class="delete-btn <?php echo ($grand_total > 1)?'':'disabled'; ?>" onclick="return confirm('Eliminar todo del carro?');">Eliminar todo</a>
   </div>

   <div class="container text-center">
      <p><strong>Total a pagar : <span><?php echo $grand_total; ?>€</span></strong></p>
      <div class="">
         <a href="checkout.php" class="mb-4 btn btn-primary<?php echo ($grand_total > 1)?'':'disabled'; ?>">Pagar</a>
      </div>
   </div>
   
 
</div>
<script src="js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>