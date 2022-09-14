<div class="wrap-tbUsers text-center mt-5 mb-5">
    <h2 class="m-3">Cuentas de usuario</h2>
    <table id="tbUsers" class="table table-striped">
        <thead>
            <tr>
                <th class="text-center">id</th>
                <th class="text-start">Nombre</th>
                <th class="text-start">Email</th>
                <th class="text-center">Tipo</th>
                <th class="text-center">Acciones</th>
            </tr>
        </thead>

        <tbody>
            <?php
                $select_users = mysqli_query($conn, "SELECT * FROM `users`") or die('query failed');
                if(mysqli_num_rows($select_users) > 0){
                    while($fetch_users = mysqli_fetch_assoc($select_users)){
                        echo "<tr>".
                                "<td class='text-center'>". $fetch_users['id'] ."</td>".
                                "<td class='text-start'>". $fetch_users['name'] ."</td>".
                                "<td class='text-start'>". $fetch_users['email'] ."</td>".
                                "<td class='text-center'>". $fetch_users['user_type'] ."</td>".
                                "<td class='text-center tb-actions'>".
                                    "<a href='javascript:;' data-id='". $fetch_users['id'] .
                                        "' data-email='". $fetch_users['email'] .
                                        "' data-type='" . $fetch_users['user_type'] . 
                                        "' data-bs-toggle='modal' data-bs-target='#userModal'>".
                                            "<i data-id='". $fetch_users['id'] .
                                                "' data-email='". $fetch_users['email'] .
                                                "' data-type='" . $fetch_users['user_type'] .
                                                "' class='fa-regular fa-pen-to-square'></i>". 
                                            "Editar".
                                    "</a>".
                                    " &nbsp; | &nbsp; <a href='admin_users.php?delete=". $fetch_users['id'] ."' class='delete-btn' onclick='return confirm('Borrar este usuario?');'><i class='fas fa-times'></i> Eliminar</a></td>".
                              "</tr>";
                    }
                }else{
                    echo '<tr><td colspan=4>No añadido!</td></tr>';
                }
            ?>
        </tbody>
    </table>
   
</div>