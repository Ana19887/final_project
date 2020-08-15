<?php 
    session_start();
    
    if ($_POST) {
        require('../../configs/server_connection.php');

        $bookingId = $_SESSION['booking_id'];

        /* rules to allow the status*/

        /* verification for the status 1=booked */
        if ( isset($_POST['mechanic']) && ( isset($_POST['status']) ) ) {
            $mechanic     = $_POST['mechanic'];
            $status       = $_POST['status'];

            /* does not allow him to change to status 5 or remain in the same status = 1*/
            if ( $status == 1 || $status == 5 ) {
                $_SESSION['validate'] = array(
                    'type' => 'error', 
                    'message' => 'Status not accepted'
                );

                header("location:../../?pag=manage_bookings&booking_id=$bookingId");
                die;
            }

           
            $sql = "UPDATE `bookings`
            SET `bkg_MECHANICS_mch_id` = '$mechanic',`bkg_STATUS_sta_id` = '$status'
            WHERE `bkg_id` = '$bookingId'";
        }
        
        /* verification for the status 4=booked */
        else if ( isset($_POST['parts']) && ( isset($_POST['status']) ) ) {
            // remove empty values in the array
            $extras_parts = array_filter($_POST['parts']);
                
            $status = $_POST['status'];

            /*accept just to change for the status 5*/
            if ( $status != 5 ) {
                $_SESSION['validate'] = array(
                    'type' => 'error', 
                    'message' => 'Status not accepted'
                );

                header("location:../../?pag=manage_bookings&booking_id=$bookingId");
                die;
            }
            /* for the empty array, update just the table booking */
            if ( empty($extras_parts) ) {
                $sql = "UPDATE `bookings`
                SET `bkg_STATUS_sta_id` = '$status'
                WHERE `bkg_id` = '$bookingId'";

                /* for the array not empty, update the table booking and extra-parts */
            } else {
                $sql = "UPDATE `bookings`
                SET `bkg_STATUS_sta_id` = '$status'
                WHERE `bkg_id` = '$bookingId'";
                
                $query = mysqli_query($conn, $sql);

                // SQL partes extras
                foreach ( $extras_parts as $val ) {
                    $sqlEp = "INSERT INTO `bookings_extra_parts` VALUES(NULL, '$bookingId', '$val')";
                
                    // Query partes extras
                    $queryEp = mysqli_query($conn, $sqlEp);
                }

                $extras_parts = TRUE;
            }
        }

        /* verification for the others status */
        else if ( !isset($_POST['parts']) && ( !isset($_POST['mechanic']) ) && ( isset($_POST['status']) ) ) {
            $status       = $_POST['status'];

            if ( $status == 1 || $status == 5 ) {
                $_SESSION['validate'] = array(
                    'type' => 'error', 
                    'message' => 'Status not accepted'
                );

                header("location:../../?pag=manage_bookings&booking_id=$bookingId");
                die;
            }

            $sql = "UPDATE `bookings`
            SET `bkg_STATUS_sta_id` = '$status'
            WHERE `bkg_id` = '$bookingId'";
        }     
        
       
        // if does not have extra parts 
        if ($extras_parts != TRUE ) {
            $query = mysqli_query($conn, $sql);
            
            //Validations
            if ($query){
                $_SESSION['validate'] = array(
                    'type' => 'ok',
                    'message' => 'Status successfully updated'
                );

                header('location:../../?pag=admin_area');
            } else {
                $_SESSION['validate'] = array(
                    'type' => 'error', 
                    'message' => 'Problem in updated'
                );
                
                header("'location:../../?pag=manage_bookings&booking_id=$bookingId");
                die;
            }
        } else {
            $_SESSION['validate'] = array(
                'type' => 'ok',
                'message' => 'Status successfully updated'
            );

            header('location:../../?pag=admin_area');
        }
    } else {
        header('location:../../?pag=main');
        die;
    }
 ?>	