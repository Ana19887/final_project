<?php 
    session_start();
       
    if ($_POST) {
        require('../../configs/server_connection.php');

        // Receive all input values from the form 
        $name     = $_POST['name'];
        $surname  = $_POST['surname'];
        $phone    = $_POST['phone'];
        $username = $_POST['username'];
        $pass     = $_POST['password'];
        $level    = '1'; //set level for the custumers=1

        //Hash password using the algorithm PASSWORD_BCRYPT before saving in the database
        $pass = password_hash($pass, PASSWORD_BCRYPT);

        
        $sql = "INSERT INTO `users` VALUES(NULL, '$name', '$surname', '$phone', '$username', '$pass', '$level')";

        
        $query = mysqli_query($conn, $sql);
        
       //login user after the register and redirect to the user_area
        if ($query){
            $id = mysqli_insert_id($conn);        //return the last ID generate by the query (auto_increment)

            $_SESSION['login'] = array(
                'id'      => $id,
                'name'    => $name,
                'surname' => $surname,
                'phone'   => $phone,
                'level'   => $level
            );
          
            header('location:../../?pag=user_area');

            //Validations 
        } else {
            if (mysqli_errno($conn) == 1062){ //1062 is a error when mysql find a duplicate row, in this case username
                $_SESSION['validate'] = array(
                    'type' => 'error', 
                    'message' => 'Username already registered'
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