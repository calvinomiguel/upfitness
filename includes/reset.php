<section class="main-section">
    <form id="reset-form" class="reset-form" name="reset-form"  action="<?php echo "?page=reset&id=".$resetEmail."&key=".$resetKey."&action=reset";?>" method="post">
        <h1>Password reset</h1>
        <p>Type your new password below.</p>
        <label class="subscribe-field" for="new-password">
            Password
            <input id="new-password" type="password" name="new-password">
        </label>
        <span class="err-message new-pass"></span>
        <label class="subscribe-field" for="new-password-retype">
            Retype your password
            <input id="new-password-retype" type="password" name="new-password-retype">
        </label>
        <span class="err-message new-pass-retype"></span>
        <div class="bottom">
            <button class="reset-btn" name="submit-new-password" type="submit">Reset Password</button>
        </div>
    </form>
</section>
