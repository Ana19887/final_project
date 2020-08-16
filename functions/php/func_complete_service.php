<!-- function to print the invoice-->
<?php
    session_start();

    if ( $_GET['booking_id'] ) {
        require('../../configs/server_connection.php');

 
        $bookingId = $_GET['booking_id'];

        $sql = "SELECT *
        FROM `bookings`

        INNER JOIN `users`
        ON `bookings`.`bkg_USERS_usr_id` = `users`.`usr_id`

        INNER JOIN `vehicles`
        ON `bookings`.`bkg_VEHICLES_veh_id` = `vehicles`.`veh_id`
        
        INNER JOIN `service_type`
        ON `bookings`.`bkg_SERVICE_TYPE_srv_id` = `service_type`.`srv_id`

        WHERE `bkg_id` = '$bookingId' AND `bkg_STATUS_sta_id` = 5";
        $query = mysqli_query($conn, $sql);

        $ln = mysqli_fetch_assoc($query);

        $userName       = $ln['usr_name'].' '.$ln['usr_surname'];
        $userPhone      = $ln['usr_phone'];
        $vehicleLicense = $ln['veh_license_details'];
        $serviceName    = $ln['srv_name'];
        $servicePrice   = $ln['srv_price'];

        $partsId = array();  //id extras parts
        $parts = array();   //name and price of extra parts
        $partsTotal = 0;    //total cost of extra parts

        // check if extras part were used in the service
        $sql = "SELECT *
        FROM `bookings_extra_parts`
        WHERE `bep_BOOKINGS_bkg_id` = '$bookingId'";
        $query = mysqli_query($conn, $sql);
        
        if ( mysqli_num_rows($query) > 0 ) {
            while ( $ln = mysqli_fetch_assoc($query) ) {
                $val = $ln['bep_EXTRA_PARTS_exp_id'];

                array_push($partsId, $val); //armazena os id das partes extras//inserindo num array existente novas informações
            }
            
            
            $partsId = implode(',', $partsId); //transfoma o array em string
        
            //retrive extra parts and price
            $sql = "SELECT *
            FROM `extra_parts`
            
            WHERE `exp_id` IN ($partsId)";
            $query = mysqli_query($conn, $sql);

            while ( $ln = mysqli_fetch_assoc($query) ) {
                $arr = array(
                    'name'  => $ln['exp_name'],
                    'price' => $ln['exp_price']
                );
                array_push($parts, $arr);
            }
            
            // sum the price of the extra parts
            foreach ( $parts as $val )  {
                $partsTotal += $val['price'];
            }
        }

        //cost total of booking
        $total = $servicePrice + $partsTotal;

        $_SESSION['report'] = array(
            'user'         => $userName,
            'phone'        => $userPhone,
            'license'      => $vehicleLicense,
            'service'      => $serviceName,
            'servicePrice' => $servicePrice,
            'parts'        => $parts,
            'partsTotal'   => $partsTotal,
            'total'        => $total
        );

        header('location:../../contents/invoice.php');

    } else {
        header('location:../../?pag=main');
    }
?>