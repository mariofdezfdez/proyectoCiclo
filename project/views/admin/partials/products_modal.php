<!-- Modal -->
<div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <form id="updateProductForm" action="" method="post" enctype="multipart/form-data">
         <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="productModalLabel">Editar producto</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <input type="hidden" id="update_p_id" name="update_p_id">
               <input type="text" id="update_name" name="update_name" required>
               <input type="text" id="update_price" name="update_price" required>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <input type="submit" class="btn btn-primary" value="Modificar" name="update_product">
            </div>
         </div>
      </form>
  </div>
</div>