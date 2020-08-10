<?php
    session_start();

    if ( $_GET['schedule'] ) {
        require('../../configs/server_connection.php');

        //defines the first and last day of the week based on today's date
        $date = date('Y-m-d');  //(now)
        $dateMin = date('Y-m-d', strtotime('monday this week', strtotime($date)));//first day of the week
        $dateMax = date('Y-m-d', strtotime('saturday this week', strtotime($date)));//last day of the week

        //retrive the informations for the schedule
        $sql = "SELECT *
        FROM `bookings`

        INNER JOIN `users`
        ON `bookings`.`bkg_USERS_usr_id` = `users`.`usr_id`

        INNER JOIN `vehicles`
        ON `bookings`.`bkg_VEHICLES_veh_id` = `vehicles`.`veh_id`
        
        INNER JOIN `service_type`
        ON `bookings`.`bkg_SERVICE_TYPE_srv_id` = `service_type`.`srv_id`

        INNER JOIN `mechanics`
        ON `bookings`.`bkg_MECHANICS_mch_id` = `mechanics`.`mch_id`

        WHERE DATE(`bkg_date`) >= '$dateMin' AND DATE(`bkg_date`) <= '$dateMax'
        
        ORDER BY `bkg_date` ASC";
        $query = mysqli_query($conn, $sql);
        
        //create an array to store the informations
        $schedule = array();

        //loop through the SELECT results
        while ( $ln = mysqli_fetch_assoc($query) ) {
            $arr = array(
                'user'       => $ln['usr_name'].' '.$ln['usr_surname'],
                'mechanic' => $ln['mch_name'],
                'license'    => $ln['veh_license_details'],
                'service'    => $ln['srv_name'],
                'date'       => $ln['bkg_date']
            );

         //inserts elements from the arr array to the end of the schedule array 
            array_push($schedule, $arr);
        }

        //set session name
        $_SESSION['weekly_schedule'] = $schedule;

        header('location:../../contents/weekly_schedule.php');

    } else {
        header('location:../../?pag=main');
    }
?>