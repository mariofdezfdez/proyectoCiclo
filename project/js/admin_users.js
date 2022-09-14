$(document).ready( function () {
    
    var table = $('#tbUsers').DataTable({
        language: {
            autoWidth: true,
            url: "//cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
        }

    });


    var userModalEl = document.getElementById('userModal')
    userModalEl.addEventListener('show.bs.modal', function (event) {
        var btn = $(event.explicitOriginalTarget);
        $("#updateUserForm #update_u_id").val(btn.data("id"));
        $("#updateUserForm #update_u_email").val(btn.data("email"));
        $("#updateUserForm #update_u_type").val(btn.data("type"));
    })

} );