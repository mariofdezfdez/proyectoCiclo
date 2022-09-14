<div class="text-center">
    <h2 class="m-3">RESUMEN PEDIDO</h2>
    <table class="tbDetallePedido table table-striped">
        <thead>
            <tr>
                <th class="text-center">Tipo hilo</th>
                <th class="text-end">Cantidad (kg)</th>
                <th class="text-end">Precio €/kg</th>
                <th class="text-end">Total (€)</th>
            </tr>
        </thead>

        <tbody>
            <?php  
                $grand_total = 0;
                $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
                if(mysqli_num_rows($select_cart) > 0){
                    while($fetch_cart = mysqli_fetch_assoc($select_cart)){
                        $total_price = ($fetch_cart['price'] * $fetch_cart['quantity']);
                        $grand_total += $total_price;
            
                        echo "<tr><td class='text-start'>".$fetch_cart['name']."</td>".
                            "<td class='text-end'>".$fetch_cart['quantity']."</td>".
                            "<td class='text-end'>".$fetch_cart['price']."</td>".
                            "<td class='text-end'>".$total_price."</td></tr>";

                    }

                    echo "<tr><td colspan=4 class='text-end'><strong>Total a pagar: ".$grand_total."€</strong></td></tr>";
                }else{
                    echo '<td colspan=4>Tu carrito esta vacio</td>';
                }
            ?>
        </tbody>
    </table>
   
</div>