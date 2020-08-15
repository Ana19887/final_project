<?php
    $userId = $_SESSION['login']['id'];
?>

<!-- BOOK A SERVICE -->
<section id="new_service">
    <div>
        <h2>
            <span>Book a  </span>
                    Service
        </h2>

        <?php include('validation.php'); ?>

        <form action="functions/php/func_new_service.php" method="POST">
            <!-- CHOOSE VEHICLE -->
            <div class="item">
                <label for="vehicle">Vehicle</label>
                <select id="vehicle" name="vehicle" required>
                    <option value="">Choose</option>

                    <?php
                        $sql   = "SELECT * FROM `vehicles`
                        
                        INNER JOIN `vehicle_model`
                        ON `vehicles`.`veh_model` = `vehicle_model`.`vmd_id`

                        INNER JOIN `vehicle_brand`
                        ON `vehicle_model`.`vmd_V_BRAND_vbd_id` = `vehicle_brand`.`vbd_id`
                        
                        WHERE `veh_USERS_usr_id` = '$userId'";
                        $query = mysqli_query($conn, $sql);

                        while ( $ln = mysqli_fetch_assoc($query) ) {
                    ?>
                    <!-- shows the model, brand and license number of the registered vehicles by the user -->
                    <option value="<?php echo $ln['veh_id']; ?>"><?php echo $ln['vbd_name'].' - '.$ln['vmd_name'].' - '.$ln['veh_license_details']; ?></option>
                    
                    <?php
                        }
                    ?>
                </select>
            </div>

               <!-- CHOOSE SERVICE -->
            <div class="item label">
                <label>Service type</label>
            </div>

            <div class="container radios">
                <?php
                    $sql   = "SELECT * FROM `service_type`";
                    $query = mysqli_query($conn, $sql);

                    while ( $ln = mysqli_fetch_assoc($query) ) {
                        //$service_type = mb_strtolower($ln['srv_name']);
                ?>

                 <!-- shows the services to be choosen by the user -->
                <div class="item">
                    <input id="<?php echo $service_type; ?>" type="radio" value="<?php echo $ln['srv_id']; ?>" name="service" required>
                    <label for="<?php echo $service_type; ?>"><?php echo $ln['srv_name']; ?></label>
                </div>


                <?php
                    }
                ?>
            </div>

            <!-- CHOOSE DATE -->
            <div class="item">
                <label for="date">Choose a date</label>
                <input id="date" type="text" name="date" readonly required>
            </div>

            <div class="item">
             
            <!-- WRITE COMMENTARY -->
            <label for="commentary">Commentary</label>
                <textarea id="commentary" name="commentary"></textarea>
            </div>

            <div>
                <button class="button green">Booking</button>
            </div>
        </form>
    </div>
</section>