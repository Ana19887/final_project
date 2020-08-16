<?php
    //start a session 
    session_start();

    //connect with db
    require('configs/server_connection.php');

    /*check if something is passed through URL
     Pages allowed to be loaded from URL */ 
    if (isset($_GET)) {
        if ( isset($_GET['pag']) ) {
            $allowed_pages = array(
                'main', 'login', 'register', 'user_area', 'new_vehicle', 'new_service', 'admin_area',
                'manage_bookings'
            
            );

            $pag = $_GET['pag'];

            /*RULES*/

            /*search the page in the array allowed_page,
             if page is not allowed, redirect to the main page 
             Give a specific name for this page*/
             
            //Homepage
            if ( in_array($pag, $allowed_pages )) {
                if ( $pag == 'main' ) {
                    $page_title = 'Welcome';
                }
                
                //Login page
                elseif ( $pag == 'login' ) {
                    if (!isset($_SESSION['login'])) {
                        $page_title = 'Login';
                    } else {
                        header('location:./?pag=main');
                    }
                }

                // Customer main page
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

                // Booking Service page
                elseif ( $pag == 'new_service' ) {
                    if (isset($_SESSION['login'])) {
                        if ( $_SESSION['login']['level'] == 1 ){
                        $page_title = 'Booking';
                    } else {
                        header('location:./?pag=main');
                    }    
                }else {
                    header('location:./?pag=main');
                    }
                }

                //Register a Vehicle page
                elseif ( $pag == 'new_vehicle' ) {
                    if (isset($_SESSION['login'])) {
                        if ( $_SESSION['login']['level'] == 1 ){
                        $page_title = 'New vehicle';
                    } else {
                        header('location:./?pag=main');
                        }
                    } else {
                        header('location:./?pag=main');
                        }    
                    }  
                
                //Register Page
                elseif ( $pag == 'register' ) {
                    if (!isset($_SESSION['login'])) {
                        $page_title = 'Register';
                    } else {
                        header('location:./?pag=main');
                    }
                }

               //Administrator main page
                elseif ( $pag == 'admin_area' ) {
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

                //Manage booking page 
                elseif ( $pag == 'manage_bookings' ) {
                    if (isset($_SESSION['login'])) {
                        if ( $_SESSION['login']['level'] == 2 ) {
                            $page_title = 'Manage Booking';
                        } else {
                            header('location:./?pag=main');
                        }
                    } else {
                        header('location:./?pag=main');
                    }
                }


                /* including the code */
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