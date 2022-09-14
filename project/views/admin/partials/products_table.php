<div class="wrap-tbProductos text-center mt-5 mb-5">
    <h2 class="m-3">LISTA PRODUCTOS</h2>
    <table id="tbProductos" class="table table-striped">
        <thead>
            <tr>
                <th class="text-center">Tipo hilo</th>
                <th class="text-center">Precio €/kg</th>
                <th class="text-center">Acciones</th>
            </tr>
        </thead>

        <tbody>
            <?php
                $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
                if(mysqli_num_rows($select_products) > 0){
                    while($fetch_products = mysqli_fetch_assoc($select_products)){
                        echo "<tr>".
                                "<td class='text-center'>". $fetch_products['name'] ."</td>".
                                "<td class='text-center'>". $fetch_products['price'] ."</td>".
                                "<td class='text-center tb-actions'>".
                                    "<a href='javascript:;' data-id='". $fetch_products['id'] ."' data-hilo-name='". $fetch_products['name'] ."' data-precio='" . $fetch_products['price'] . "' data-bs-toggle='modal' data-bs-target='#productModal'>".
                                        "<i data-id='". $fetch_products['id'] ."' data-hilo-name='". $fetch_products['name'] ."' data-precio='" . $fetch_products['price'] . "' class='fa-regular fa-pen-to-square'></i> Editar".
                                    "</a>".
                                    " &nbsp; | &nbsp; <a href='admin_products.php?delete=". $fetch_products['id'] ."' class='delete-btn' onclick='return confirm('Borrar este producto?');'><i class='fas fa-times'></i> Eliminar</a></td>".
                              "</tr>";
                    }
                }else{
                    echo '<tr><td colspan=3>No añadido!</td></tr>';
                }
            ?>
        </tbody>
    </table>
   
</div>