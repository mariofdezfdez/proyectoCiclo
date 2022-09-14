<div class="wrap-tbOrders table-responsive text-center mt-5 mb-5">
    <h2 class="m-3">LISTA MENSAJES</h2>
    <table id="tbMsg" class="table table-striped ">
        <thead>
            <tr>
                <th class="text-start">Nombre</th>
                <th class="text-end">Teléfono</th>
                <th class="text-start">Email</th>
                <th class="text-start">Mensaje</th>
                <th class="text-center">Acciones</th>
            </tr>
        </thead>

        <tbody>
            <?php
                 $select_msg = mysqli_query($conn, "SELECT * FROM `message`") or die('query failed');
                 if(mysqli_num_rows($select_msg) > 0){
                    while($fetch_msg = mysqli_fetch_assoc($select_msg)){
                        echo "<tr>".
                                "<td class='text-start'>". $fetch_msg['name'] ."</td>".
                                "<td class='text-end'>". $fetch_msg['number'] ."</td>".
                                "<td class='text-start'>". $fetch_msg['email'] ."</td>".
                                "<td class='text-start'>". $fetch_msg['message'] ."</td>".
                                "<td class='text-center tb-actions'>".
                                " <a href='admin_contacts.php?delete=". $fetch_msg['id'] ."' class='delete-btn' onclick='return confirm('Eliminar mensaje?');'><i class='fas fa-times'></i> Eliminar</a></td>".
                              "</tr>";
                    }
                }else{
                    echo '<tr><td colspan=3>No hay mensajes!</td></tr>';
                }
            ?>
        </tbody>
    </table>
   
</div>