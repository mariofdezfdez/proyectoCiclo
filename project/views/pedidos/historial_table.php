<div class="wrap-tbHistorial table-responsive text-center mt-5 mb-5">
    <h2 class="m-3">HISTORIAL DE PEDIDOS</h2>
    <table id="tbHistorial" class="table table-striped ">
        <thead>
            <tr>
                <th title="Fecha de pedido" class="text-start">Fecha</th>
                <th title="Nombre de la empresa" class="text-start">Nombre</th>
                <th class="text-end">Teléfono</th>
                <th class="text-start">Email</th>
                <th title="Dirección de la empresa" class="text-start">Dirección</th>
                <th title="Metodo de pago" class="text-center">Metodo</th>
                <th class="text-start">Mi pedido</th>
                <th title="Precio total" class="text-end">Total</th>
                <th title="Estado del pedido" class="text-end">Estado</th>
            </tr>
        </thead>

        <tbody>
            <?php
                $order_query = mysqli_query($conn, "SELECT * FROM `orders` WHERE user_id = '$user_id'") or die('query failed');
                if(mysqli_num_rows($order_query) > 0){
                   while($fetch_orders = mysqli_fetch_assoc($order_query)){
                        echo "<tr>".
                                "<td class='text-start'>". $fetch_orders['placed_on'] ."</td>".
                                "<td class='text-start'>". $fetch_orders['name'] ."</td>".
                                "<td class='text-end'>". $fetch_orders['number'] ."</td>".
                                "<td class='text-start'>". $fetch_orders['email'] ."</td>".
                                "<td class='text-start'>". $fetch_orders['address'] ."</td>".
                                "<td class='text-center'>". $fetch_orders['method'] ."</td>".
                                "<td class='text-end'>". $fetch_orders['total_products'] ."</td>".
                                "<td class='text-end'>". $fetch_orders['total_price'] ."</td>".
                                "<td class='text-center'>". $fetch_orders['payment_status'] ."</td>".
                              "</tr>";
                    }
                }else{
                    echo '<tr><td colspan=3>No añadido!</td></tr>';
                }
            ?>
        </tbody>
    </table>
   
</div>