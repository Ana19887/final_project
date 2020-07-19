<section id="new_service">
    <div>
        <h2>
            <span>Book a new</span>
            Service
        </h2>

        <?php include('validation.php'); ?>

        <!-- data is sent to be process in the func_new_vehicle-->
        <form action="functions/php/func_new_vehicle.php" method="POST">
            <div class="item label">
                <label>Type</label>
            </div>
            

            <!-- load informations from the database for types, brands, models and enginee-->

            <div class="container radios">
                <?php
                    $sql   = "SELECT * FROM `vehicle_type`";
                    $query = mysqli_query($conn, $sql);

                    while ( $ln = mysqli_fetch_assoc($query)) {
                        $vehicle = str_replace('', '', mb_strtolower($ln['vtp_name'])); //transforms the vehicle type into a single word
                ?>
                
                <div class="item">
                    <input id="<?php echo $vehicle; ?>" type="radio" value="<?php echo $ln['vtp_id']; ?>" name="type" required>
                    <label for="<?php echo $vehicle; ?>"><?php echo $ln['vtp_name']; ?></label>
                </div>

                <?php
                    }
                ?>
            </div>
            
           
            <div class="item">
                <label for="brand">Brand</label>
                <select id="brand" required>
                    <option value="">Choose</option>
                    <?php
                        $sql   = "SELECT * FROM `vehicle_brand`";
                        $query = mysqli_query($conn, $sql);

                        while ( $ln = mysqli_fetch_assoc($query)) {
                    ?>
                    
                    <option value="<?php echo $ln['vbd_id']; ?>"><?php echo $ln['vbd_name']; ?></option>

                    <?php
                        }
                    ?>
                    
                </select>
            </div>

            <div class="item">
                <label for="model">Model</label>
                <select id="model" name="model" required>
                    <option value="">Choose</option>

                    <?php
                        $sql   = "SELECT * FROM `vehicle_model`";
                        $query = mysqli_query($conn, $sql);

                        while ( $ln = mysqli_fetch_assoc($query)) {
                    ?>

                    <option value="<?php echo $ln['vmd_id']; ?>"><?php echo $ln['vmd_name']; ?></option>

                    <?php
                        }
                    ?>
                    
                </select>
            </div>

            <div class="item label">
                <label>Engine Type</label>
            </div>

            <div class="container radios">
                <?php
                    $sql   = "SELECT * FROM `vehicle_engine_type`";
                    $query = mysqli_query($conn, $sql);

                    while ( $ln = mysqli_fetch_assoc($query)) {
                       
                ?>

                <div class="item">
                    <input id="<?php echo $engine; ?>" type="radio" value="<?php echo $ln['vet_id']; ?>" name="engine" required>
                    <label for="<?php echo $engine; ?>"><?php echo $ln['vet_name']; ?></label>
                </div>

                <?php
                    }
                ?>

            </div>

            <div class="item">
                <label for="licence">Licence details</label>
                <input id="licence" type="text" name="licence" required>
            </div>

            <div>
                <button class="button green">Add vehicle</button>
            </div>
        </form>
    </div>
</section>