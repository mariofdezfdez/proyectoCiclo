<div class="container text-center">
   <form action="" method="post">
      <div>
         <h2 class="m-3">DATOS DE ENVÍO</h2>
      </div>

      <div class="row formDetalle">
         <div class="form-floating mb-2">
         <input type="text" class="form-control" name="name"  id="floatingInput" placeholder="">
         <label for="floatingInput">Nombre de empresa</label>
         </div>
         <div class="form-floating mb-2">
         <input type="text" class="form-control" name="number"  id="floatingInput" placeholder="">
         <label for="floatingInput">Teléfono</label>
         </div>
         <div class="form-floating mb-2">
         <input type="text" class="form-control" name="email"  id="floatingInput" placeholder="">
         <label for="floatingInput">Email</label>
         </div>
         <div class="form-floating mb-2">
         <select name="method">
               <option value="credit card">credit card</option>
               <option value="paypal">paypal</option>
            </select>
         </div>
         <div class="form-floating mb-2">
         <input type="text" class="form-control" name="address"  id="floatingInput" placeholder="">
         <label for="floatingInput">Dirección de la empresa</label>
         </div>
         <div class="form-floating mb-2">
         <input type="text" class="form-control" name="cif"  id="floatingInput" placeholder="">
         <label for="floatingInput">Cif</label>
         </div>
         <div class="form-floating mb-2">
         <input type="submit" value="Confirmar pedido" class="btn btn-primary" name="order_btn">
         </div>
      </div>
   </form>
</div>