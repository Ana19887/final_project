<!DOCTYPE html>
<!-- Contains the commom HTML for all pages -->

<html lang="EN">
    <head>
        <meta charset="UTF-8">
        <link href="public/css/default.css" rel="stylesheet" type="text/css">
        <link href="public/css/header.css" rel="stylesheet" type="text/css">
        <link href="public/css/footer.css" rel="stylesheet" type="text/css">
        <link href="public/css/main.css" rel="stylesheet" type="text/css">
        <link href="public/css/forms.css" rel="stylesheet" type="text/css">
        <link href="public/css/register.css" rel="stylesheet" type="text/css">
        <link href="public/css/login.css" rel="stylesheet" type="text/css">
        <link href="public/css/buttom.css" rel="stylesheet" type="text/css">
        <link href="public/css/validation.css" rel="stylesheet" type="text/css">
        <link href="public/css/user_area.css" rel="stylesheet" type="text/css">
        <link href="public/css/new_service.css" rel="stylesheet" type="text/css">

        <title>GER'S Auto Service & Repair - <?php echo $page_title; ?></title>
    </head>

    <body>

        <header>
            <section id="header">
                <nav>
                    <a class="nav-logo" href="?pag=main"><img class="logo" src="public/images/logo.svg"></a>

                    <ul id="nav-bar">
                        <li><a href="?pag=main#services">Services</a></li>
                        <li><a href="?pag=main#about">About</a></li>
                        <li><a href="?pag=main#contact">Contact</a></li>

                        <?php
                            if (isset($_SESSION['login'])) {
                        ?>
                        <li><a class="logout" href="functions/php/func_logout.php">Logout</a></li>
                        <li><a class="user" href="?pag=user_area"><?php echo $_SESSION['login']['name']['0'] ?></a></li>
                        <?php
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


        
        <main>
            <!-- include the page passed via GET -->
            <?php
                include("$pag.php");
            ?>
        </main>

        <footer>
            <section id="footer">
                <div>
                    <a class="nav-logo" href="?pag=main"><img class="logo" src="public/images/logo.svg"></a>
                    <span>2020 | All Rights Reserved</span>
                </div>
            </section>
        </footer>

        </body>
</html>  
