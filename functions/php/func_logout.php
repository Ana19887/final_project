<!--LOGOUT-->
<?php
    session_start();

    if (isset($_SESSION['login'])) {
        session_destroy();

        header('location:../../?pag=main');
    } else {
        header('location:../../?pag=main');
    }
?>