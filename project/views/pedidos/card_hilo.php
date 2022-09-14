   <div class="card mb-5 flex-grow-2 mx-3" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title text-center">
                <?php echo $fetch_products['name']; ?> &nbsp;
                <?php echo $fetch_products['price']; ?>€/kg
            </h5>
            
            <form action="" method="post" class="m-2 text-center">
                <div class="row mb-1">
                    <div class="col-6" style="text-align: right !important;">Cantidad</div>
                    <div class="col-6" style="text-align: left !important;">
                        <input type="text" name="product_quantity" placeholder="Kg">
                    </div>
                </div>

                <div class="row mb-1">
                    <div class="col-6" style="text-align: right !important;">Color</div>
                    <div class="col-6" style="text-align: left !important;">
                        <select name="color" id="" >
                            <option value="azul">Azul</option>
                            <option value="negro">Negro</option>
                            <option value="verde">Verde</option>
                            <option value="amarillo">Amarillo</option>
                            <option value="rojo">Rojo</option>
                            <option value="rosa">Rosa</option>
                            <option value="naranja">Naranja</option>
                            <option value="violeta">Violeta</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-1">
                    <div class="col-6" style="text-align: right !important;">Certificado</div>
                    <div class="col-6" style="text-align: left !important;">
                    <select name="certified" id="" >
                        <option value="sin certificado">Sin certificado</option>
                        <option value="ocs">BCI</option>
                        <option value="ngs">EOKOTEX-100</option>
                        <option value="ngs">GOTS</option>
                        <option value="ngs">GRS</option>
                        <option value="ngs">OCS</option>
                        <option value="ngs">RCS</option>
                    </select>
                    </div>
                </div>
                
                
                <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
                <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
                <input type="submit" value= "Añadir" name="add_to_cart" class="btn btn-primary">
            
            </form>
        </div>
    </div>
