
<!-- Select all bookings made by the customers -->
<?php
    $sql = "SELECT * FROM `bookings` WHERE `bkg_STATUS_sta_id`";
    $query = mysqli_query($conn, $sql);
    $numBooking = mysqli_num_rows($query);
?>

<section id="user_area">
    <div>
        <h2>
            <span>Welcome,</span>
            <?php echo $_SESSION['login']['name']; ?>
        </h2>

        <?php include('validation.php'); ?>

        <?php
            if ( $numBooking > 0 ) {
        ?>

        <!-- section to show the completed services-->
        <div class="wrapper scheduled">
            <span>For Collection</span>

            <div class="container">

                <?php
                    $sql = "SELECT *
                    FROM `bookings`

                    INNER JOIN `service_type`
                    ON `bookings`.`bkg_SERVICE_TYPE_srv_id` = `service_type`.`srv_id`

                    INNER JOIN `status`
                    ON `bookings`.`bkg_STATUS_sta_id` = `status`.`sta_id`

                    INNER JOIN `vehicles`
                    ON `bookings`.`bkg_VEHICLES_veh_id` = `vehicles`.`veh_id`
                                    
                    WHERE `bkg_STATUS_sta_id` = 5 ORDER BY `bkg_date` DESC";
                    $query = mysqli_query($conn, $sql);

                    if ( mysqli_num_rows($query) > 0 ) {

                        while($ln = mysqli_fetch_assoc($query)) {
                ?>

                <div class="item">
                    <div class="container photo">                    
                            <img src="public/images/<?php echo $ln['srv_photo']; ?>.jpg">                        
                    </div>

                    <div class="container info">
                        <span><?php echo ucfirst($ln['srv_name']); ?></span>
                        <span><?php echo strtoupper($ln['veh_licence_details']); ?></span>
                        <span><?php echo ucfirst($ln['sta_name']); ?></span>
                    </div>
                </div>

                <?php
                        }
                    } else {
                ?>
                <div class="item">
                    <span>No services completed</span>
                </div>
                <?php
                    }
                ?>
            </div>
        </div>

        <!-- section to show the the services in process-->
        <div class="wrapper scheduled">
            <span>In Service</span>

            <div class="container">

                <?php
                    $sql = "SELECT *
                    FROM `bookings`

                    INNER JOIN `service_type`
                    ON `bookings`.`bkg_SERVICE_TYPE_srv_id` = `service_type`.`srv_id`

                    INNER JOIN `status`
                    ON `bookings`.`bkg_STATUS_sta_id` = `status`.`sta_id`

                    INNER JOIN `vehicles`
                    ON `bookings`.`bkg_VEHICLES_veh_id` = `vehicles`.`veh_id`
                    
                    WHERE `bkg_STATUS_sta_id` != 5 AND `bkg_STATUS_sta_id` != 1 ORDER BY `bkg_date` DESC";
                    $query = mysqli_query($conn, $sql);

                    if ( mysqli_num_rows($query) > 0 ) {

                        while($ln = mysqli_fetch_assoc($query)) {
                ?>

                <div class="item">
                    <div class="container photo">
                    <img src="public/images/<?php echo $ln['srv_photo']; ?>.jpg">   
                    </div>

                    <div class="container info">
                        <span><?php echo ucfirst($ln['srv_name']); ?></span>
                        <span><?php echo strtoupper($ln['veh_licence_details']); ?></span>
                        <span><?php echo date('d/m/Y H:i', strtotime($ln['bkg_date'])); ?></span>
                        <span><?php echo ucfirst($ln['sta_name']); ?></span>
                    </div>
                </div>

                <?php
                        }
                    } else {
                ?>
                <div class="item">
                    <span>No vehicle in service</span>
                </div>
                <?php
                    }
                ?>

            </div>
        </div>
        
        <!-- section to show the the services waiting for confirmation-->
        <div class="wrapper scheduled">
            <span>Waiting</span>

            <div class="container">

                <?php
                    $sql = "SELECT *
                    FROM `bookings`

                    INNER JOIN `service_type`
                    ON `bookings`.`bkg_SERVICE_TYPE_srv_id` = `service_type`.`srv_id`

                    INNER JOIN `status`
                    ON `bookings`.`bkg_STATUS_sta_id` = `status`.`sta_id`
                    
                    WHERE `bkg_STATUS_sta_id` = 1
                     ORDER BY `bkg_date` DESC";
                    $query = mysqli_query($conn, $sql);

                    if ( mysqli_num_rows($query) > 0 ) {

                        while($ln = mysqli_fetch_assoc($query)) {
                ?>

                <div class="item">
                    <div class="container photo">
                    <img src="public/images/<?php echo $ln['srv_photo']; ?>.jpg">  
                    </div>

                    <div class="container info">
                        <span><?php echo ucfirst($ln['srv_name']); ?></span>
                        <span><?php echo date('d/m/Y H:i', strtotime($ln['bkg_date'])); ?></span>
                        <span><?php echo ucfirst($ln['sta_name']); ?></span>
                    </div>
                </div>

                <?php
                        }
                    } else {
                ?>

                <div class="item">
                    <span>No services </span>
                </div>

                <?php
                    }
                ?>
            </div>
        </div>

        

        <?php
            } else {
        ?>

        <div class="wrapper">
            <div class="container empty">
                No scheduled services
            </div>
        </div>

        <?php
            }
        ?>
    </div>
</section>