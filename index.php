<?php
    //start a session 
    session_start();

    //connecting with database
    require('configs/server_connection.php');

    /*checking if something is passed in the URL, if not redirect to the main page
     Declaring the pages is allowed to be loaded from URL */ 
    if (isset($_GET)) {
        if ( isset($_GET['pag']) ) {
            $allowed_pages = array(
                'main', 'login', 'register', 'user_area', 'new_vehicle', 'new_service', 'admin_area'
            
            );

            $pag = $_GET['pag'];

            /*searching the value passed in the URL in the array allowed_page, 
             so give a specific name for the page,
             if not, redirect to the main page*/
            if ( in_array($pag, $allowed_pages )) {
                if ( $pag == 'main' ) {
                    $page_title = 'Welcome';
                }
                
                /*if the user is not login redirect to main page*/
                elseif ( $pag == 'login' ) {
                    if (!isset($_SESSION['login'])) {
                        $page_title = 'Login';
                    } else {
                        header('location:./?pag=main');
                    }
                }
                /* if the user is a customer */
                elseif ( $pag == 'user_area' ) {
                    if (isset($_SESSION['login'])) {
                        if ( $_SESSION['login']['level'] == 1 ) {
                            $user_name = $_SESSION['login']['name'];
                            $page_title = "Customer Area";
                        } else {
                            header('location:./?pag=main');
                        }
                    } else {
                        header('location:./?pag=main');
                    }
                }

                elseif ( $pag == 'new_service' ) {
                    if (isset($_SESSION['login'])) {
                        $page_title = 'Booking';
                    } else {
                        header('location:./?pag=main');
                    }    
                }
                elseif ( $pag == 'new_vehicle' ) {
                    if (isset($_SESSION['login'])) {
                        $page_title = 'New vehicle';
                    } else {
                        header('location:./?pag=main');
                    }    
                }
                /*if the user is not login redirect to main page*/
                elseif ( $pag == 'register' ) {
                    if (!isset($_SESSION['login'])) {
                        $page_title = 'Register';
                    } else {
                        header('location:./?pag=main');
                    }
                }

                /* administrator */
                elseif ( $pag == 'admin' ) {
                    if (isset($_SESSION['login'])) {
                        if ( $_SESSION['login']['level'] == 2 ) {
                            $page_title = 'Administrator';
                        } else {
                            header('location:./?pag=main');
                        }
                    } else {
                        header('location:./?pag=main');
                    }
                }


                /* coping the code */
                include("contents/index.php");
            } else {
                header('location:./?pag=main');
            }
        } else {
            header('location:./?pag=main');
        }
    } else {
        header('location:./?pag=main');
    }    
?>