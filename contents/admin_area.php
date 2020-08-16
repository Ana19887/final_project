
<!-- Select all bookings made by the customers -->
<?php
    $sql = "SELECT * FROM `bookings` WHERE `bkg_STATUS_sta_id`";
    $query = mysqli_query($conn, $sql);
    $numBooking = mysqli_num_rows($query);
?>

<section id="user_area">
    <div>
        <h2>
            <!-- shows the name of the admin-->
            <span>Welcome,</span>
            <?php echo $_SESSION['login']['name']; ?>
        </h2>

        
        <?php include('validation.php'); ?>

        <!--checks if there are bookings-->
        <?php
            if ( $numBooking > 0 ) {
        ?>

        <!-- section to show the cars ready to be collected-->
        <div class="wrapper scheduled">
            <span>Ready to collect</span>

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
                        <!-- redirects to the invoice -->
                        <a href="functions/php/func_complete_service.php?booking_id=<?php echo $ln['bkg_id']; ?>" target="_blank">
                            <img src="public/images/<?php echo $ln['srv_photo']; ?>.jpg">
                        </a>
                    </div>

                    <div class="container info">
                        <span><?php echo ucfirst($ln['srv_name']); ?></span>
                        <span><strong>License:</strong><?php echo strtoupper($ln['veh_license_details']); ?></span>
                        <span><?php echo date('d/m/Y H:i', strtotime($ln['bkg_date'])); ?></span>
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

        <!-- section to show the cars in service-->
        <div class="wrapper scheduled">
            <span>In Progress</span>

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
                    <a href="?pag=manage_bookings&booking_id=<?php echo $ln['bkg_id']; ?>">    
                    <img src="public/images/<?php echo $ln['srv_photo']; ?>.jpg"></a>
                    
                    </div>

                    <div class="container info">
                        <span><?php echo ucfirst($ln['srv_name']); ?></span>
                        <span><strong>License:</strong> <?php echo strtoupper($ln['veh_license_details']); ?></span>
                        <span><?php echo date('d/m/Y H:i', strtotime($ln['bkg_date'])); ?></span>
                        <span><?php echo ucfirst($ln['sta_name']); ?></span>
                    </div>
                </div>

                <?php
                        }
                    } else {
                ?>
                <div class="item">
                    <span>No services in progress</span>
                </div>
                <?php
                    }
                ?>

            </div>
        </div>
        
        <!-- section to show the services waiting for confirmation-->
        <div class="wrapper scheduled">
            <span>Booked</span>

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

                                       
                    WHERE `bkg_STATUS_sta_id` = 1
                     ORDER BY `bkg_date` DESC";
                    $query = mysqli_query($conn, $sql);

                    if ( mysqli_num_rows($query) > 0 ) {

                        while($ln = mysqli_fetch_assoc($query)) {
                ?>

                <div class="item">
                    <div class="container photo">
                    <a href="?pag=manage_bookings&booking_id=<?php echo $ln['bkg_id']; ?>">    
                    <img src="public/images/<?php echo $ln['srv_photo']; ?>.jpg"></a> 
                    </div>

                    <div class="container info">
                        <span><?php echo ucfirst($ln['srv_name']); ?></span>
                        <span><strong>License:</strong> <?php echo $ln['veh_license_details']; ?></span>
                        <span><?php echo date('d/m/Y H:i', strtotime($ln['bkg_date'])); ?></span>
                        <span><strong>Comment:</strong> <?php echo $ln['bkg_commentary']; ?></span>
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
        
        <!-- option to redirect to the week's schedule -->
        <div class="container-new">
            <a href="functions/php/func_schedule.php?schedule=weekly" target="_blank" class="new weekly" title="Weekly schedule">
                <img src="public/images/weekly_calendar.svg">
            </a>
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