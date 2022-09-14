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
<!-- menu navegacion -->
<div class="container-fluid py-3 sticky-top bg-dark">
  <nav class="navbar navbar-expand-lg  navbar-dark ">
    <div class="container-fluid">
         <a class="navbar-brand" href="#">AdminPlanel</a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
               <li class="nav-item">
                  <a class="nav-link active" href="admin_page.php">Inicio</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link active" href="admin_products.php">Precios de hilos</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link active" href="admin_orders.php">Pedidos</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link active" href="admin_users.php">Usuarios</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link active" href="admin_contacts.php">Mensajes</a> 
               </li>
               <li class="nav-item">
                  <a class="nav-link active" href="admin_datos_user.php">Datos del administrador</a> 
               </li>
               <li class="nav-item">
                  <a class="nav-link btn btn-primary" href="../../logout.php">Cerrar sesion</a>
               </li>
            </ul>
         </div>  
      </div>
  </nav>
</div>