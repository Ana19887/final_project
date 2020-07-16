<?php
    $userId = $_SESSION['login']['id'];

    $sql = "SELECT * FROM `vehicles` WHERE `veh_USERS_usr_id` = '$userId'";
    $query = mysqli_query($conn, $sql);
    $numVehicle = mysqli_num_rows($query);
    
    $sql = "SELECT * FROM `bookings` WHERE `bkg_USERS_usr_id` = '$userId'";
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
            if ( $numVehicle > 0 ) {
        ?>

            <?php
                if ( $numBooking > 0 ) {
            ?>

            <div class="wrapper last">
                <span>Last completed services</span>

                <div class="container">

                    <?php
                        $sql = "SELECT *
                        FROM `bookings`

                        INNER JOIN `service_type`
                        ON `bookings`.`bkg_SERVICE_TYPE_srv_id` = `service_type`.`srv_id`
                        
                        WHERE `bkg_USERS_usr_id` = '$userId' AND `bkg_status` = 'complete'";
                        $query = mysqli_query($conn, $sql);

                        if ( mysqli_num_rows($query) > 0 ) {

                            while($ln = mysqli_fetch_assoc($query)) {
                    ?>
                    
                        <div class="container info">
                            <span><?php echo ucfirst($ln['srv_name']); ?></span>
                            <span><?php echo date('d/m/Y', strtotime($ln['bkg_date'])); ?></span>
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

            <div class="wrapper scheduled">
                <span>Scheduled</span>

                <div class="container">

                    <?php
                        $sql = "SELECT *
                        FROM `bookings`

                        INNER JOIN `service_type`
                        ON `bookings`.`bkg_SERVICE_TYPE_srv_id` = `service_type`.`srv_id`
                        
                        WHERE `bkg_USERS_usr_id` = '$userId' AND `bkg_status` != 'complete' ORDER BY `bkg_date` DESC";
                        $query = mysqli_query($conn, $sql);

                        if ( mysqli_num_rows($query) > 0 ) {

                            while($ln = mysqli_fetch_assoc($query)) {
                    ?>

                    
                        <div class="container info">
                            <span><?php echo ucfirst($ln['srv_name']); ?></span>
                            <span><?php echo date('d/m/Y H:i', strtotime($ln['bkg_date'])); ?></span>
                            <span><?php echo ucfirst($ln['bkg_status']); ?></span>
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

            <div class="container-new">
                <a href="?pag=new_vehicle" class="new vehicle" title="New vehicle"><img src="public/images/new_vehicle.svg"></a>

                <a href="?pag=new_service" class="new service" title="New booking"><img src="public/images/new_booking.svg"></a>
            </div>
        <?php
            } else {
        ?>

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
