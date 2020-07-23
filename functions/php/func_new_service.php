<?php 
    session_start();
    
    if ($_POST) {
        require('../../configs/server_connection.php');

        $user       = $_SESSION['login']['id'];
        $vehicle    = $_POST['vehicle'];
        $service    = $_POST['service'];
        $date       = $_POST['date'];
            $date = explode('/', $date);  //explode date and remove the forward slach
            $date = $date[0].'-'.$date[1].'-'.$date[2];  // create an array with 3 positions
            $date = date('Y-m-d', strtotime($date));    //standard to insert in db
           

            $sql   = "SELECT * FROM `bookings` WHERE DATE(`bkg_date`) = '$date'";
            $query = mysqli_query($conn, $sql);

            //first hours for a booking
            $hour = '08:00:00';

            if (mysqli_num_rows($query) > 0) {
                while ( $ln = mysqli_fetch_assoc($query ) ) {
                    $hours[] = date('H:i:s', strtotime($ln['bkg_date'])); 
                }

                
                $arr = array_count_values($hours); 
                
                //by default, does not advance to the next hour
                $next = FALSE;

                
                $check_hour = '08:00:00';

                /*check the availability time for a booking */
                if (in_array($check_hour, $hours)) {
                    if ($arr[$check_hour] >= 4) {    
                        $next = TRUE;
                    } else {
                        $next = FALSE;
                        $hour = $check_hour;
                    }
                } else {
                    $next = false;
                    $hour = $check_hour;
                }

                if ($next == TRUE) {
                    $check_hour = '11:00:00';
                    if (in_array($check_hour, $hours)) {
                        if ($arr[$check_hour] >= 4) {
                            $next = TRUE;
                        } else {
                            $next = FALSE;
                            $hour = $check_hour;
                        }
                    } else {
                        $next = FALSE;
                        $hour = $check_hour;
                    }
                }

                if ($next == TRUE) {
                    $check_hour = '14:00:00';
                    if (in_array($check_hour, $hours)) {
                        if ($arr[$check_hour] >= 4) {
                            // No available hours
                            $_SESSION['validate'] = array(
                                'type' => 'error',
                                'message' => "We don't have available times for this date"
                            );
        
                            header('location:../../?pag=new_vehicle');
                            die;
                        } else {
                            $next = FALSE;
                            $hour = $check_hour;
                        }
                    } else {
                        $next = FALSE;
                        $hour = $check_hour;
                    }
                }
            }

         
        $date = date('Y-m-d H:i:s', strtotime("$date $hour")); 

        $commentary = $_POST['commentary'];
        $status = 'waiting'; //needs to change

        //make a booking - insert date and time in the db  
        $sql = "INSERT INTO `bookings` VALUES(NULL, '$user', '$vehicle', '$service', '$date', '$commentary', '$status')";

        $query = mysqli_query($conn, $sql);
        
        if ($query){
            $_SESSION['validate'] = array(
                'type' => 'ok',
                'message' => 'Service successfully scheduled'
            );

            header('location:../../?pag=user_area');
        } else {
            $_SESSION['validate'] = array(
                'type' => 'error', 
                'message' => 'Problem in registering'
            );
            
            header('location:../../?pag=new_service');
            die;
        }
    } else {
        header('location:../../?pag=main');
        die;
    }
 ?>	