<?php 
    session_start();
    
    if ($_POST) {
        require('../../configs/server_connection.php');

        $user       = $_SESSION['login']['id'];  
        $type       = $_POST['type'];
        $model      = $_POST['model'];
        $engine     = $_POST['engine'];
        $licence    = $_POST['licence'];

        $sql = "INSERT INTO `vehicles` VALUES(NULL, '$user', '$type', '$model', '$engine', '$licence')";

        $query = mysqli_query($conn, $sql);
        
        if ($query){
            $_SESSION['validate'] = array(
                'type' => 'ok',
                'message' => 'Vehicle successfully added'
            );

            header('location:../../?pag=user_area');
        } else {
            $_SESSION['validate'] = array(
                'type' => 'error', 
                'message' => 'Problem adding vehicle'
            );
            
            header('location:../../?pag=user_area');
        }
    } else {
        header('location:../../?pag=main');
    }
 ?>	