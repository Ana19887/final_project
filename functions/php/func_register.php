<?php 
    session_start();
    
    // connecting to the database
    if ($_POST) {
        require('../../configs/server_connection.php');

        // receive all input values from the form 
        $name     = $_POST['name'];
        $surname  = $_POST['surname'];
        $phone    = $_POST['phone'];
        $username = $_POST['username'];
        $pass     = $_POST['password'];
        $level    = '1'; //setting level for the custumers=1

        //creating a password hash using the algorithm PASSWORD_BCRYPT beforesaving in the database
        $pass = password_hash($pass, PASSWORD_BCRYPT);

        //sql query
        $sql = "INSERT INTO `users` VALUES(NULL, '$name', '$surname', '$phone', '$username', '$pass', '$level')";

        //executing sql query
        $query = mysqli_query($conn, $sql);
        
       
        if ($query){
            $id = mysqli_insert_id($conn);        //return the last ID generate by the query (auto_increment)

            $_SESSION['login'] = array(
                'id'      => $id,
                'name'    => $name,
                'surname' => $surname,
                'phone'   => $phone,
                'level'   => $level
            );
            //redirecting to the user_area
            header('location:../../?pag=user_area');

            //checking error in the register
        } else {
            if (mysqli_errno($conn) == 1062){ //1062 is a error when mysql find a duplicate row that is trying to insert
                $_SESSION['validate'] = array(
                    'type' => 'error', 
                    'message' => 'User already registered'
                );
                
                header('location:../../?pag=register');
            } else {
                $_SESSION['validate'] = array(
                    'type' => 'error', 
                    'message' => 'Problem in registering'
                );
                
                header('location:../../?pag=register');
            }
        }
    } else {
        header('location:../../?pag=main');
    }
 ?>	