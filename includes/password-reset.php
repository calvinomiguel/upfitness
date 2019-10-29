
    <section class="main-section">
        <form id="reset-form" class="reset-form" name="reset"  method="post">
            <h1>Password reset</h1>
            <p>Enter your email address below and we'll send you password reset instructions.</p>
            <label class="subscribe-field" for="reset-email">
                Email
                <input id="reset-email" type="text" name="reset-email" >
            </label>
            <a class="forgot-password" href="?page=login">Have your password? Login here.</a>
            <span id="forgot-err" class="err-message"></span>
            <?php print $startResetMessage; ?>
            <div class="bottom">
                <button class="reset-btn" name="submit-reset" type="submit">Reset</button>
            </div>
        </form>
    </section>
