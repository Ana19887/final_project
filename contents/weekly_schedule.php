<!--PAGE TO PRINT THE WEEK'S SCHEDULE-->

<!--Start a session-->
<?php
    session_start();

    //verify if the session is set
    if ( !isset($_SESSION['weekly_schedule']) ) {
        header('location:../?pag=main');
        
    } else {
        $schedule = $_SESSION['weekly_schedule'];
?>

<!DOCTYPE html>
<html lang="EN">
    <head>
        <meta charset="UTF-8">
        <link href="../public/css/reset.css" rel="stylesheet" type="text/css">
        <link href="../public/css/fonts.css" rel="stylesheet" type="text/css">
        <link href="../public/css/default.css" rel="stylesheet" type="text/css">
        <link href="../public/css/print.css" rel="stylesheet" type="text/css">
       
        <title>Weekly Schedule</title>
    </head>

    <!--SCHEDULE html -->
    <body>
        <img src="../public/images/logo.svg">
        <h1>Weekly Schedule</h1>

        <table>
            <thead>
                <tr>
                    <th colspan="6">Monday</th> <!--6 columns -->
                </tr>

                <tr>
                    <th>Nº</th>
                    <th>Hour</th>
                    <th>Mechanic</th>
                    <th>User</th>
                    <th>Licence</th>
                    <th>Service</th>
                </tr>
            </thead>

            <!--shows the bookings information separated per day-->
            <tbody>
                <?php
                    $count = 0;
                    
                    //loop through the schedule array 
                    foreach ( $schedule as $val ) {
                        $date = date( 'D', strtotime($val['date'] )); //3 letters of a day
                        $hour = date( 'h:i', strtotime($val['date']) );
                        
                        if ( $date == 'Mon' ) {
                ?>
                <tr>
                    <td><?php echo ++$count; ?></td>
                    <td><?php echo $hour; ?></td>
                    <td><?php echo $val['mechanic']; ?></td>
                    <td><?php echo $val['user']; ?></td>
                    <td><?php echo $val['license']; ?></td>
                    <td><?php echo $val['service']; ?></td>
                </tr>
                <?php
                        }
                    }
                ?>

                <?php
                    if ( $count == 0 ) {
                ?>
                <tr>
                    <td class="center" colspan="6">0</td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>

        <table>
            <thead>
                <tr>
                    <th colspan="6">Tuesday</th>
                </tr>

                <tr>
                    <th>Nº</th>
                    <th>Hour</th>
                    <th>Mechanic</th>
                    <th>User</th>
                    <th>License</th>
                    <th>Service</th>
                </tr>
            </thead>

            <tbody>
                <?php
                    $count = 0;
                    
                    foreach ( $schedule as $val ) {
                        $date = date( 'D', strtotime($val['date']) );
                        $hour = date( 'h:i', strtotime($val['date']) );
                        
                        if ( $date == 'Tue' ) {
                ?>
                <tr>
                    <td><?php echo ++$count; ?></td>
                    <td><?php echo $hour; ?></td>
                    <td><?php echo $val['mechanic']; ?></td>
                    <td><?php echo $val['user']; ?></td>
                    <td><?php echo $val['license']; ?></td>
                    <td><?php echo $val['service']; ?></td>
                </tr>
                <?php
                        }
                    }
                ?>

                <?php
                    if ( $count == 0 ) {
                ?>
                <tr>
                    <td class="center" colspan="6">0</td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>

        <table>
            <thead>
                <tr>
                    <th colspan="6">Wednesday</th>
                </tr>

                <tr>
                    <th>Nº</th>
                    <th>Hour</th>
                    <th>Mechanic</th>
                    <th>User</th>
                    <th>License</th>
                    <th>Service</th>
                </tr>
            </thead>

            <tbody>
                <?php
                    $count = 0;
                    
                    foreach ( $schedule as $val ) {
                        $date = date( 'D', strtotime($val['date']) );
                        $hour = date( 'h:i', strtotime($val['date']) );
                        
                        if ( $date == 'Wed' ) {
                ?>
                <tr>
                    <td><?php echo ++$count; ?></td>
                    <td><?php echo $hour; ?></td>
                    <td><?php echo $val['mechanic']; ?></td>
                    <td><?php echo $val['user']; ?></td>
                    <td><?php echo $val['license']; ?></td>
                    <td><?php echo $val['service']; ?></td>
                </tr>
                <?php
                        }
                    }
                ?>

                <?php
                    if ( $count == 0 ) {
                ?>
                <tr>
                    <td class="center" colspan="6">0</td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>

        <table>
            <thead>
                <tr>
                    <th colspan="6">Thursday</th>
                </tr>

                <tr>
                    <th>Nº</th>
                    <th>Hour</th>
                    <th>Mechanic</th>
                    <th>User</th>
                    <th>License</th>
                    <th>Service</th>
                </tr>
            </thead>

            <tbody>
                <?php
                    $count = 0;
                    
                    foreach ( $schedule as $val ) {
                        $date = date( 'D', strtotime($val['date']) );
                        $hour = date( 'h:i', strtotime($val['date']) );
                        
                        if ( $date == 'Thu' ) {
                ?>
                <tr>
                    <td><?php echo ++$count; ?></td>
                    <td><?php echo $hour; ?></td>
                    <td><?php echo $val['mechanic']; ?></td>
                    <td><?php echo $val['user']; ?></td>
                    <td><?php echo $val['license']; ?></td>
                    <td><?php echo $val['service']; ?></td>
                </tr>
                <?php
                        }
                    }
                ?>

                <?php
                    if ( $count == 0 ) {
                ?>
                <tr>
                    <td class="center" colspan="6">0</td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>

        <table>
            <thead>
                <tr>
                    <th colspan="6">Friday</th>
                </tr>

                <tr>
                    <th>Nº</th>
                    <th>Hour</th>
                    <th>Mechanic</th>
                    <th>User</th>
                    <th>License</th>
                    <th>Service</th>
                </tr>
            </thead>

            <tbody>
                <?php
                    $count = 0;
                    
                    foreach ( $schedule as $val ) {
                        $date = date( 'D', strtotime($val['date']) );
                        $hour = date( 'h:i', strtotime($val['date']) );
                        
                        if ( $date == 'Fri' ) {
                ?>
                <tr>
                    <td><?php echo ++$count; ?></td>
                    <td><?php echo $hour; ?></td>
                    <td><?php echo $val['mechanic']; ?></td>
                    <td><?php echo $val['user']; ?></td>
                    <td><?php echo $val['license']; ?></td>
                    <td><?php echo $val['service']; ?></td>
                </tr>
                <?php
                        }
                    }
                ?>

                <?php
                    if ( $count == 0 ) {
                ?>
                <tr>
                    <td class="center" colspan="6">0</td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>

        <table>
            <thead>
                <tr>
                    <th colspan="6">Saturday</th>
                </tr>

                <tr>
                    <th>Nº</th>
                    <th>Hour</th>
                    <th>Mechanic</th>
                    <th>User</th>
                    <th>License</th>
                    <th>Service</th>
                </tr>
            </thead>

            <tbody>
                <?php
                    $count = 0;
                    
                    foreach ( $schedule as $val ) {
                        $date = date( 'D', strtotime($val['date']) );
                        $hour = date( 'h:i', strtotime($val['date']) );
                        
                        if ( $date == 'Sat' ) {
                ?>
                <tr>
                    <td><?php echo ++$count; ?></td>
                    <td><?php echo $hour; ?></td>
                    <td><?php echo $val['mechanic']; ?></td>
                    <td><?php echo $val['user']; ?></td>
                    <td><?php echo $val['license']; ?></td>
                    <td><?php echo $val['service']; ?></td>
                </tr>
                <?php
                        }
                    }
                ?>

                <?php
                    if ( $count == 0 ) {
                ?>
                <tr>
                    <td class="center" colspan="6">0</td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </body>
</html>

<?php
    }
?>