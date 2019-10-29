<!-- PART OF ACCOUNT.PHP – GETS DISPLAYED ON CLICK, CODE INCLUDED RIGHT BEFORE RESPONSIVE NAV-->
<div class="dark-layer">
    <form name="delete-form" class="account-delete" method="post">
        <h3>Account deletion</h3>
        <p class="deletion-text">Type DELETE to complete account deletion.</p>
        <input id="deletion-input" type="text" name="delete" value="">
        <span id="delete-err" class="err-message">Please enter a valid email address.</span>
        <button class="cancel-delete" type="button" name="button">Cancel</button>
        <button class="execute-delete" type="submit" name="delete-account">Delete</button>
    </form>
</div>