<!--REGISTER VEHICLE FUNCTION-->

<?php 
    session_start();
    
    if ($_POST) {
        require('../../configs/server_connection.php');

        // receive input values from the form 
        $user       = $_SESSION['login']['id'];  
        $type       = $_POST['type'];
        $model      = $_POST['model'];
        $engine     = $_POST['engine'];
        $license    = $_POST['license'];

        $sql = "INSERT INTO `vehicles` VALUES(NULL, '$user', '$type', '$model', '$engine', '$license')";

        $query = mysqli_query($conn, $sql);
        
        //validation 
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
            
            header('location:../../?pag=new_vehicle');
        }
    } else {
        header('location:../../?pag=main');
    }
 ?>	