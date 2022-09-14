<?php

include '../../config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:../../index.php');
};

if(isset($_POST['add_product'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $price = $_POST['price'];

   $select_product_name = mysqli_query($conn, "SELECT name FROM `products` WHERE name = '$name'") or die('query failed');

   if(mysqli_num_rows($select_product_name) > 0){
      $message[] = 'El producto ya existe';
   }else{
      $add_product_query = mysqli_query($conn, "INSERT INTO `products`(name, price) VALUES('$name', '$price')") or die('query failed');

      if($add_product_query){
         $message[] = 'Añadido satisfactoriamente!';
         
      }else{
         $message[] = 'No añadido!';
      }
   }
}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM `products` WHERE id = '$delete_id'") or die('query failed');
   header('location:admin_products.php');
}

if(isset($_POST['update_product'])){

   $update_p_id = $_POST['update_p_id'];
   $update_name = $_POST['update_name'];
   $update_price = $_POST['update_price'];

   mysqli_query($conn, "UPDATE `products` SET name = '$update_name', price = '$update_price' WHERE id = '$update_p_id'") or die('query failed');
   header('location:admin_products.php');

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> 
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css"> 
   <title>hilos</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="../../css/admin_style.css">

</head>
<body>
<!-- Menú navegacion administrador    -->
<?php include 'admin_header.php'; ?>

<div class="container-fluid">
   <div class="row">
      <div class="col text-center">
         <h2 class="p-3">AÑADIR PRODUCTO</h2>
         <form action="" method="post" enctype="multipart/form-data">
            <input type="text" name="name" class="box" placeholder="Tipo de hilo" required>
            <input type="text" min="0" name="price" class="box" placeholder="Precio" required>
            <input type="submit" value="Añadir" name="add_product" class="btn btn-primary">
         </form>
      </div>
   </div>

   <div class="row">
      <div class="col">
         <?php include 'partials/products_table.php'; ?>
      </div>
   </div>
</div>

<!-- Modal editar productos -->
<?php include 'partials/products_modal.php'; ?>

<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<script src="../../js/admin_products.js"></script>
</body>
</html>