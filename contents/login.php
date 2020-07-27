<section id="login">
    <div>
        <h2>Login</h2>

        <!-- Validation message -->
        <?php include('validation.php'); ?>

         <!--LOGIN FORM-->
        <form action="functions/php/func_login.php" method="POST">
            <div class="item">
                <label for="username">Username</label>
                <input id="username" type="text" name="username" required>
            </div>

            <div class="item">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required>
            </div>

            <div>
                <button class="button green">Login</button>
            </div>
        </form>
    </div>
</section>