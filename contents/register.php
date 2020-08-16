<section id="register">
    <div>
        <h2>Register</h2>

        <!-- Validation message -->
        <?php include('validation.php'); ?>

        <!--REGISTER FORM-->
        <form action="functions/php/func_register.php" method="POST">
            <div class="container">
                <div class="item">
                    <label for="name"> First Name</label>
                    <input id="name" type="text" name="name" required>
                </div>

                <div class="item">
                    <label for="surname">Last Name</label>
                    <input id="surname" type="text" name="surname" required>
                </div>
            </div>

            <div class="item">
                <label for="phone">Phone</label>
                <input id="phone" class="phone" type="tel" name="phone" required>
            </div>

            <div class="item">
                <label for="username">Username</label>
                <input id="username" type="text" name="username" required>
            </div>

            <div class="item">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required>
            </div>

            <div>
                <button class="button green">Register</button>
            </div>
        </form>
    </div>
</section>