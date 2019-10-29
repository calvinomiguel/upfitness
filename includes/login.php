<section class="main-section">
    <form class="login-form" name="login" action="?page=login" method="post">
        <h1>Login</h1>
        <label class="subscribe-field" for="login-email">
            Email
            <input id="login-email" type="email" name="login-email" value="<?php print $loginMail?>">
        </label>
        <?php echo $loginMailError; ?>
        <label class="subscribe-field" for="login-password">
            Password
            <input id="login-password" type="password" name="login-password" value="">
        </label>
        <?php echo $loginPassError; ?>
        <?php echo $confirmationMessage; ?>
        <a class="forgot-password" href="?page=password-reset">Forgot password?</a>
        <?php echo $registrationSuccess; ?>
        <?php echo $resetSuccess; ?>
        <div class="bottom">
            <button class="login-btn" name="login-submit" type="submit">Login</button>
        </div>
    </form>
</section>

