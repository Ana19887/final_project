<!--Select vehicles and bookings from de user -->
<?php
    $userId = $_SESSION['login']['id'];

    $sql = "SELECT * FROM `vehicles` WHERE `veh_USERS_usr_id` = '$userId'";
    $query = mysqli_query($conn, $sql);
    $numVehicle = mysqli_num_rows($query);
    
    $sql = "SELECT * FROM `bookings` WHERE `bkg_USERS_usr_id` = '$userId'";
    $query = mysqli_query($conn, $sql);
    $numBooking = mysqli_num_rows($query);
?>

<!-- shows the Customer's name-->
<section id="user_area">
    <div>
        <h2>
            
            <span>Welcome,</span>
            <?php echo ucfirst($_SESSION['login']['name']); ?>
        </h2>

        <?php include('validation.php'); ?>

       
        <?php
            if ( $numVehicle > 0 ) {
        ?>
            
            <?php
                if ( $numBooking > 0 ) {
            ?>

             <!-- SECTION LAST COMPLETED BOOKINGS -->
            <div class="wrapper last">
                <span>Last completed services</span>

                <div class="container">

                    <?php
                        $sql = "SELECT *
                        FROM `bookings`

                        INNER JOIN `service_type`
                        ON `bookings`.`bkg_SERVICE_TYPE_srv_id` = `service_type`.`srv_id`

                        INNER JOIN `vehicles`
                        ON `bookings`.`bkg_VEHICLES_veh_id` = `vehicles`.`veh_id`
                        
                        WHERE `bkg_USERS_usr_id` = '$userId' AND `bkg_STATUS_sta_id` = 5
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
                            <span><?php echo ucfirst($ln['srv_name']); ?></span> <!--first letter in capital-->  
                            <span><strong>License:</strong> <?php echo strtoupper($ln['veh_license_details']); ?></span>                     
                            <span><?php echo date('d/m/Y', strtotime($ln['bkg_date'])); ?></span><!--transform the string in a time-->
                        </div>
                    </div>
                    <?php
                            }
                        } else {
                    ?>
                    <div class="item">
                        <span>No service completed</span>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>

             <!-- SECTION MY BOOKINGS -->
            <div class="wrapper scheduled">
                <span>My bookings</span>

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
                        
                        WHERE `bkg_USERS_usr_id` = '$userId' AND `bkg_STATUS_sta_id` != '5' ORDER BY `bkg_date` DESC";
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
                            <span><strong>License:</strong> <?php echo strtoupper($ln['veh_license_details']); ?></span>
                            <span><?php echo ucfirst($ln['sta_name']); ?></span>
                        </div>
                    </div>

                    <?php
                            }
                        } else {
                    ?>

                    <div class="item">
                        <span>No service scheduled</span>
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
                   You don't have bookings
                </div>
            </div>

            <?php
                }
            ?>

            <!--Options to register a new vehicle or booking a service-->
            <div class="container-new">
                <a href="?pag=new_vehicle" class="new vehicle" title="New vehicle"><img src="public/images/new_vehicle.svg"></a>
                <a href="?pag=new_service" class="new service" title="New booking"><img src="public/images/new_booking.svg"></a>
            </div>
        <?php
            } else {
        ?>

        <!-- No vehicle registered, show just the option to register a vehicle -->
        <div class="wrapper">
            <div class="container empty">
                No registered vehicles. You need to register a vehicle
            </div>
        </div>
        
        <a href="?pag=new_vehicle" class="new vehicle"><img src="public/images/new_vehicle.svg"></a>

        <?php
            }
        ?>
    </div>
</section>
