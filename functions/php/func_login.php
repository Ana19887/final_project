<?php 
    session_start();
    
    //check if algo esta sendo enviado via post
    if ($_POST) {
        require('../../configs/server_connection.php');   // connecting to the database

        // receive all input values from the form 
        $username = $_POST['username'];
        $pass     = $_POST['password'];

        //sql query
        $sql = "SELECT * FROM `users` WHERE `usr_username`='$username'";

        //execute sql query
        $query = mysqli_query($conn, $sql);

        
        if (mysqli_num_rows($query) > 0) {
            $ln = mysqli_fetch_assoc($query);
            $hash = $ln['usr_password'];

            //check the passwords
            if (password_verify($pass, $hash)){
                $_SESSION['login'] = array(
                    'id'      => $ln['usr_id'],
                    'name'    => $ln['usr_name'],
                    'surname' => $ln['usr_surname'],
                    'phone'   => $ln['usr_phone'],
                    'level'   => $ln['usr_level']
                );

                header('location:../../?pag=user_area');
            } else {
                //error message
                $_SESSION['validate'] = array(
                    'type' => 'error',
                    'message' => 'Wrong password.'
                );

                header('location:../../?pag=login');
            }
        } else {
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