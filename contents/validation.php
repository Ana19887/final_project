<!-- VALIDATION OF THE FORMS-->
<?php
    if (isset($_SESSION['validate'])) {
?>

<div class="validate 
<?php echo $_SESSION['validate']['type']; ?>">
    <?php echo $_SESSION['validate']['message']; ?>
</div>

<?php
        unset($_SESSION['validate']);
    }
?>