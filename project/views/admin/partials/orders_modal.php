<!-- Modal -->
<div class="modal fade" id="orderModal" tabindex="-1" aria-labelledby="orderModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <form id="updateOrderForm" action="" method="post" enctype="multipart/form-data">
         <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="orderModalLabel">Editar orden</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <input type="hidden" id="update_o_id" name="update_o_id">
               Estado del pedido &nbsp;
               <select id="update_payment_status" name="update_payment_status">
                  <option value="pedido recibido">Pedido recibido</option>
                  <option value="proceso productivo">Proceso productivo</option>
                  <option value="acabado">Acabado</option>
                  <option value="enviado">enviado</option>
               </select>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <input type="submit" class="btn btn-primary" value="Modificar" name="update_order">
            </div>
         </div>
      </form>
  </div>
</div>