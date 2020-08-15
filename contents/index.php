<!DOCTYPE html>
<!-- Contains the commom HTML for all pages -->

<html lang="EN">
    <head>
        <meta charset="UTF-8">
        <link href="public/css/sheets.css" rel="stylesheet" type="text/css">
       
        <!-- Get the titles for the pages-->
        <title>GER'S Auto Service & Repair - <?php echo $page_title; ?></title>
    </head>

    <body>
        <!--HEADER-->
        <header>
            <section id="header">
                <nav>
                    <a class="nav-logo" href="?pag=main"><img class="logo" src="public/images/logo.svg"></a>

                    <ul id="nav-bar">
                        <li><a href="?pag=main#services">Services</a></li>
                        <li><a href="?pag=main#about">About</a></li>
                        <li><a href="?pag=main#contact">Contact</a></li>

                        <!--check if the user is admin(level 2) or customer(level 1)-->
                        <?php
                            if (isset($_SESSION['login'])) {
                                if ( $_SESSION['login']['level'] == 2 ) {
                        ?>
                        <li><a class="logout" href="functions/php/func_logout.php">Logout</a></li>
                        <li><a class="user" href="?pag=admin_area"><?php echo ucfirst( $_SESSION['login']['name']['0']) ?></a></li>
                        <?php
                            } else {
                        ?>    
                        <li><a class="logout" href="functions/php/func_logout.php">Logout</a></li>
                        <li><a class="user" href="?pag=user_area"><?php echo ucfirst($_SESSION['login']['name']['0']) ?></a></li>
                            <?php  
                            }
                           } else { 
                        ?>          
                        <li><a class="login" href="?pag=login">Login</a></li>
                        <li><a href="?pag=register">Register</a></li>
                        <?php
                            }
                        ?>
                    </ul>
                </nav>
            </section>
        </header>


        <!-- include the content of the pages passed via GET -->
        <main>
            <?php
                include("$pag.php");
            ?>
        </main>

        <!--FOOTER-->
        <footer>
            <section id="footer">
                <div>
                    <a class="nav-logo" href="?pag=main"><img class="logo" src="public/images/logo.svg"></a>
                    <span>2020 | All Rights Reserved</span>
                </div>
            </section>
        </footer>

        
        <script src="public/js/libraries/jquery-3.5.1.min.js"></script>

        <!-- AIR DATEPICKER DEPENDENCES-->
        <link href="public/js/plugins/air_datepicker/datepicker.css" rel="stylesheet" type="text/css">
        <script src="public/js/plugins/air_datepicker/datepicker.js"></script>
        <!-- English language -->
        <script src="public/js/plugins/air_datepicker/datepicker.en.js"></script>

        <!-- JQUERY MASK PLUGIN DEPENDENCES-->
        <script src="public/js/plugins/jquery_mask_plugin/jquery.mask.min.js"></script>
        
        <!-- FUNCTIONS -->
        <!-- Air Datepicker -->
        <script src="functions/js/func_air_datepicker.js"></script>

        <!-- Jquery Mask Plugin -->
        <script src="functions/js/func_jquery_mask_plugin.js"></script>

    </body>
</html>
