<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>
<!-- menu de navegacion usuario -->
<div class="container-fluid py-3 sticky-top bg-dark">
  <nav class="navbar navbar-expand-lg  navbar-dark ">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">MFF Yarns</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../home/home.php">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../pedidos/pedidos.php">Realizar pedido</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../pedidos/historial_pedidos.php">Historial de pedidos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../contactanos/contact.php">Contáctanos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../datos_usuario/datos_user.php">Datos del usuario</a>
          </li>
          <li class="nav-item" id="user-btn">
            <?php
                $select_cart_number = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
                $cart_rows_number = mysqli_num_rows($select_cart_number); 
            ?>
          <a class="nav-link" href="../carrito/cart.php"><i class="fas fa-shopping-cart"></i> <span>(<?php echo $cart_rows_number; ?>)</span> </a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn btn-primary" href="../../logout.php">Cerrar sesion</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</div>

</div>
