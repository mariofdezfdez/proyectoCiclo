$(document).ready( function () {
    
    var table = $('#tbOrders').DataTable({
        language: {
            autoWidth: true,
            url: "//cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
        }

    });
    // table.columns.adjust().draw();

    var orderModalEl = document.getElementById('orderModal')
    orderModalEl.addEventListener('show.bs.modal', function (event) {
        var btn = $(event.explicitOriginalTarget);
        $("#updateOrderForm #update_o_id").val(btn.data("id"));
        $("#updateOrderForm #update_payment_status").val(btn.data("status"));
    })

} );