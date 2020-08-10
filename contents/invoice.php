<?php
    session_start();

    if ( !isset($_SESSION['report']) ) {
        header('location:../?pag=main');
        
    } else {
        $report = $_SESSION['report'];
?>

<!DOCTYPE html>
<html lang="EN">
    <head>
        <meta charset="UTF-8">
        <link href="../public/css/reset.css" rel="stylesheet" type="text/css">
        <link href="../public/css/default.css" rel="stylesheet" type="text/css">
        <link href="../public/css/print.css" rel="stylesheet" type="text/css">
       
        <title>Invoice</title>
    </head>

    <body>
        <img src="../public/images/logo.svg">
        <p><strong>Client: </strong> <?php echo $report['user']; ?></p>
        <p><strong>Phone: </strong> <?php echo $report['phone']; ?></p>
        <p><strong>Vehicle License: </strong> <?php echo $report['license']; ?></p>

        <table>
            <thead>
                <tr>
                    <th>Services</th>
                    <th>Prices</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>
                        <strong>Service Type: </strong><?php echo $report['service']; ?>
                    </td>

                    <td class="right">
                                    <!--number, decimals, decimalpoint, separator)-->
                        <?php echo '€'.number_format($report['servicePrice'], 2, ',', '.'); ?>
                    </td>
                </tr>

                <!--loop to print all extra parts and prices-->
                <?php
                    if (!empty($report['parts'])) {
                        foreach ($report['parts'] as $val) {
                ?>
                <tr>
                    <td>
                        <?php echo '<strong>Extra Part: </strong>'.$val['name']; ?>
                    </td>

                    <td class="right">
                                     <!--number, decimals, decimalpoint, separator)-->
                        <?php echo '€'.number_format($val['price'], 2, ',', '.'); ?>
                    </td>
                </tr>
                <?php
                        }
                    }
                ?>
                <tr>
                    <td class="total"><strong>TOTAL</strong></td>
                    <td class="total right"><strong><?php echo '€'.number_format($report['total'], 2, ',', '.'); ?></strong></td>
                </tr>
            </tbody>
        </table>
    </body>
</html>

<?php
    }
?>