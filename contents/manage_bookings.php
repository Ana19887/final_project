<?php
   
   //Getting the booking_id passed  
   $bookingId = $_GET['booking_id'];

   $_SESSION['booking_id'] = $bookingId;

   //retrive data, time and status based in the booking_id
    $sql   = "SELECT *
    FROM `bookings`
    
    INNER JOIN `users`
    ON `bookings`.`bkg_USERS_usr_id` = `users`.`usr_id`

    WHERE `bkg_id` = '$bookingId'";
    $query = mysqli_query($conn, $sql);
    
    $ln1 = mysqli_fetch_assoc($query);
    
    $dateTime = date('Y-m-d H:i:s', strtotime($ln1['bkg_date'])); 
    $statusId = $ln1['bkg_STATUS_sta_id'];
?>

<!--display user's name -->
<section id="new_service">
    <div>
        <h2>         
            <span>Customer:</span>
            <?php echo $ln1['usr_name']; ?>
        </h2>

        <!-- Include validation-->
        <?php include('validation.php'); ?>

        <!-- MANAGE BOOKINGS-->
        <form action="functions/php/func_update_booking.php" method="POST">

        <!-- if the status = 1(booked), admin can allocate a mechanic available and update the status-->
            <?php
                if ( $ln1['bkg_STATUS_sta_id'] == 1 ) {
            ?>
            <div class="item">
                <label for="mechanic">Mechanic</label>
                <select id="mechanic" name="mechanic" required>
                    <option value="">Choose</option>
                    
                    <?php
                     /*retrieve all booking for this date and time with a mechanic allocated */
                        $sql = "SELECT *
                        FROM `bookings`
                        WHERE `bkg_date` = '$dateTime'  
                        AND `bkg_MECHANICS_mch_id` != 'NULL'";

                        $query = mysqli_query($conn, $sql);

                        if ( mysqli_num_rows($query) > 0 ) {
                            $mechanicBlock = array(); 
                            // save mechanics that are not available in an array
                            while ( $ln = mysqli_fetch_assoc($query) ) {
                                $mechanicBlock[] = $ln['bkg_MECHANICS_mch_id'];
                            }
                
                            $mechanicBlock = implode(',',$mechanicBlock); //transform an array in string, separated by coma
                        } else {
                            $mechanicBlock = 0;
                        }
                    ?>

                    <?php
                    /* retrieve mechanics that are not in the array mechanicBlock */
                        $sql = "SELECT * 
                        FROM `mechanics` 
                        WHERE `mch_id` NOT IN ($mechanicBlock)";
                        
                        $query = mysqli_query($conn, $sql);

                        while ( $ln = mysqli_fetch_assoc($query) ) {
                    ?>
                    
                    <!-- show the mechanics availables -->
                    <option value="<?php echo $ln['mch_id']; ?>"><?php echo $ln['mch_name']; ?></option>
                    
                    <?php
                        }
                    ?>
                </select>
            </div>
            <?php
                }
            ?>

         <!-- if the status=4(finished), admin can add extra parts used in the service and update the status-->
            <?php
                if ( $ln1['bkg_STATUS_sta_id'] == 4 ) {
            ?>
            <div class="item">
                <label for="parts1">Extra parts</label>
                <select id="parts1" name="parts[]">
                    <option value="">Choose</option>
                    
                    <?php
                        $sql = "SELECT * 
                        FROM `extra_parts`";
                        
                        $query = mysqli_query($conn, $sql);

                        while ( $ln = mysqli_fetch_assoc($query) ) {
                    ?>
                    
                    <option value="<?php echo $ln['exp_id']; ?>"><?php echo $ln['exp_name']; ?></option>
                    
                    <?php
                        }
                    ?>
                </select>
            </div>

            <div class="item">
                <label for="parts2">Extra parts</label>
                <select id="parts2" name="parts[]">
                    <option value="">Choose</option>
                    
                    <?php
                        $sql = "SELECT * 
                        FROM `extra_parts`";
                        
                        $query = mysqli_query($conn, $sql);

                        while ( $ln = mysqli_fetch_assoc($query) ) {
                    ?>
                    
                    <option value="<?php echo $ln['exp_id']; ?>"><?php echo $ln['exp_name']; ?></option>
                    
                    <?php
                        }
                    ?>
                </select>
            </div>

            <div class="item">
                <label for="parts3">Extra parts</label>
                <select id="parts3" name="parts[]">
                    <option value="">Choose</option>
                    
                    <?php
                        $sql = "SELECT * 
                        FROM `extra_parts`";
                        
                        $query = mysqli_query($conn, $sql);

                        while ( $ln = mysqli_fetch_assoc($query) ) {
                    ?>
                    
                    <option value="<?php echo $ln['exp_id']; ?>"><?php echo $ln['exp_name']; ?></option>
                    
                    <?php
                        }
                    ?>
                </select>
            </div>

            <div class="item">
                <label for="parts4">Extra parts</label>
                <select id="parts4" name="parts[]">
                    <option value="">Choose</option>
                    
                    <?php
                        $sql = "SELECT * 
                        FROM `extra_parts`";
                        
                        $query = mysqli_query($conn, $sql);

                        while ( $ln = mysqli_fetch_assoc($query) ) {
                    ?>
                    
                    <option value="<?php echo $ln['exp_id']; ?>"><?php echo $ln['exp_name']; ?></option>
                    
                    <?php
                        }
                    ?>
                </select>
            </div>
            <?php
                }
            ?>
             <!-- Update status -- display it for all cases-->
            <div class="item">
                <label for="status">Status</label>
                <select id="status" name="status" required>
                    <option value="">Choose</option>
                    
                    <?php
                        $sql = "SELECT * 
                        FROM `status`";
                        
                        $query = mysqli_query($conn, $sql);

                        while ( $ln = mysqli_fetch_assoc($query) ) {
                    ?>
                    
                    <option value="<?php echo $ln['sta_id']; ?>"><?php echo $ln['sta_name']; ?></option>
                    
                    <?php
                        }
                    ?>
                </select>
            </div>

            <div>
                <button class="button green">Update</button>
            </div>
        </form>
    </div>
</section>