<?php 
    session_start();
    
   
    if ($_POST) {
        // connect to the database
        require('../../configs/server_connection.php');   

        // receive all input values from the form 
        $username = $_POST['username'];
        $pass     = $_POST['password'];

        
        $sql = "SELECT * FROM `users` WHERE `usr_username`='$username'";

      
        $query = mysqli_query($conn, $sql);

        
        if (mysqli_num_rows($query) > 0) {
            $ln = mysqli_fetch_assoc($query);
            $hash = $ln['usr_password'];

            //check if the passwords match and redirect the user to the customer page or admin page
            if (password_verify($pass, $hash)){
                $_SESSION['login'] = array(
                    'id'      => $ln['usr_id'],
                    'name'    => $ln['usr_name'],
                    'surname' => $ln['usr_surname'],
                    'phone'   => $ln['usr_phone'],
                    'level'   => $ln['usr_level']
                );

               //redirect the user according to its level 
                if ( $_SESSION['login']['level'] == 2 ) {
                    header('location:../../?pag=admin_area');
                } else {
                    header('location:../../?pag=user_area');
                }    
                
            } else {
                //error message if the passwords are different and redirect to the login page again
                $_SESSION['validate'] = array(
                    'type' => 'error',
                    'message' => 'Incorrect password.'
                );

                header('location:../../?pag=login');
            }
        } else {
            //error message if the user is not registered and redirect to login page again
            $_SESSION['validate'] = array(
                'type' => 'error',
                'message' => 'User not found.'
            );
            
            header('location:../../?pag=login');
        }
    } else {
        header('location:../../?pag=main');
    }
?>