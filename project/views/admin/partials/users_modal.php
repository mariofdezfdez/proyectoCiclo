<!-- Modal -->
<div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <form id="updateUserForm" action="" method="post" enctype="multipart/form-data">
         <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="userModalLabel">Editar usuario</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <input type="hidden" id="update_u_id" name="update_u_id">
               <div>
                  Email &nbsp; <input type="text" id="update_u_email" name="update_u_email" style="width: 70%">
               </div>
               <div class="mt-1">
                  Tipo usuario &nbsp;
                  <select id="update_u_type" name="update_u_type">
                     <option value="admin">Admin</option>
                     <option value="user">User</option>
                  </select>
               </div>
               
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <input type="submit" class="btn btn-primary" value="Modificar" name="update_user">
            </div>
         </div>
      </form>
  </div>
</div>