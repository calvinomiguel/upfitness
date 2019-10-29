<h1 class="dash-h1">My account</h1>
<section class="dash-content">
    <h5 class="dash-h5">My credentials</h5>
    <form class="change-email-form" name="change-email-form" method="post">
        <div class="input-wrapper">
            <div class="overview-wrapper account">
                <div class="data-wrapper">
                    <label for="email" class="dash-label">Email</label>
                    <span class="input-data email-data"><?php print $loginEmail?></span>
                </div>
                <button class="edit form-button" id="edit-email" type="button">EDIT</button>
            </div>
            <div class="mailfield field-choice text-field email">
                <input id="email" type="email" name="email" placeholder="e.g. doe@example.com" value="<?php print $loginEmail?>">
            </div>
            <span class="err-message email-change"></span>
            <div class="email-btns btns-wrapper">
                <button class="cancel-mail-edit cancel form-button" type="button">CANCEL</button>
                <button class="save form-button" name="change-email" type="submit">CHANGE</button>
            </div>
        </div>
    </form>
    <div class="divider"></div>
    <form class="change-pass-form" name="change-pass-form" method="post">
        <div class="input-wrapper">
            <div class="overview-wrapper account">
                <div class="data-wrapper">
                    <label for="password" class="dash-label">Password</label>
                    <span class="input-data pass-data">•••••••••</span>
                </div>
                <button class="edit form-button" id="edit-password" type="button">EDIT</button>
            </div>
            <div class="pass-choice">
                <div class="passfield field-choice text-field password">
                    <input id="password" type="password" name="password" placeholder="Type your new password" value="">
                </div>
                <span class="err-message pass-change"></span>
                <div class="passfield field-choice text-field password">
                    <input type="password" name="password-retype" placeholder="Retype your new password" value="">
                </div>
                <span class="err-message pass-retype-change"></span>
                <div class="pass-btns btns-wrapper">
                    <button class="cancel form-button cancel-pass-edit" name="cancel-change" type="button">CANCEL
                    </button>
                    <button class="save form-button" name="change-password" type="submit">CHANGE</button>
                </div>
            </div>
        </div>
    </form>
    <div class="divider"></div>
    <div class="input-wrapper">
        <label class="dash-label">Account deletion</label>
        <button class="delete-account" type="button">Delete my account</button>
    </div>
    <div class="divider"></div>
    </form>
</section>
