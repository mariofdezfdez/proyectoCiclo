$(document).ready( function () {
    $('#tbProductos').DataTable({
        language: {
            url: "//cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
        }

    });

    var productModalEl = document.getElementById('productModal')
    productModalEl.addEventListener('show.bs.modal', function (event) {
        var btn = $(event.explicitOriginalTarget);
        $("#updateProductForm #update_p_id").val(btn.data("id"));
        $("#updateProductForm #update_name").val(btn.data("hiloName"));
        $("#updateProductForm #update_price").val(btn.data("precio"));
    })

} );