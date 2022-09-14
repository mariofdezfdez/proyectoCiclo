<div class="wrap-tbOrders table-responsive text-center mt-5 mb-5">
    <h2 class="m-3">LISTA PEDIDOS</h2>
    <table id="tbOrders" class="table table-striped ">
        <thead>
            <tr>
                <th title="Fecha del pedido" class="text-start">Fecha</th> 
                <th class="text-start">Email</th>
                <th class="text-start">Pedidos</th>
                <th title="Precio total" class="text-end">Total</th>
                <th title="Estado del pedido" class="text-center">Estado</th>
                <th class="text-center">Acciones</th>
            </tr>
        </thead>

        <tbody>
            <?php
                 $select_orders = mysqli_query($conn, "SELECT * FROM `orders`") or die('query failed');
                 if(mysqli_num_rows($select_orders) > 0){
                    while($fetch_orders = mysqli_fetch_assoc($select_orders)){
                        echo "<tr>".
                                "<td class='text-start'>". $fetch_orders['placed_on'] ."</td>".
                                "<td class='text-start'>". $fetch_orders['email'] ."</td>".
                                "<td class='text-start'>". $fetch_orders['total_products'] ."</td>".
                                "<td class='text-end'>". $fetch_orders['total_price'] ."</td>".
                                "<td class='text-center'>". $fetch_orders['payment_status'] ."</td>".
                                "<td class='text-center tb-actions'>".
                                    "<a href='javascript:;' data-id='". $fetch_orders['id'] ."' data-status='". $fetch_orders['payment_status'] ."' class='option-btn' data-bs-toggle='modal' data-bs-target='#orderModal'>".
                                        "<i class='fa-regular fa-pen-to-square'></i> Editar".
                                    "</a>".
                                    " &nbsp; | &nbsp; <a href='admin_orders.php?delete=". $fetch_orders['id'] ."' class='delete-btn' onclick='return confirm('Eliminar este producto?');'><i class='fas fa-times'></i> Eliminar</a></td>".
                              "</tr>";
                    }
                }else{
                    echo '<tr><td colspan=3>No añadido!</td></tr>';
                }
            ?>
        </tbody>
    </table>
   
</div>