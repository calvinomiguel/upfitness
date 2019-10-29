//ACCOUNT DELETION FORM VARIABLES
const deleteAccountButton = document.querySelector('.delete-account');
const deleteAccountForm = document.querySelector('.dark-layer');
const deleteCancelButton = document.querySelector('.cancel-delete');
const deletionForm = document.querySelector('.account-delete');
let formInput = document.getElementById('deletion-input');
const errorMessage = document.getElementById('delete-err');
const inputField = document.getElementById('deletion-input');

//VARIABLES FOR ACCOUNT EMAIL FORM
const editMailBtn = document.getElementById('edit-email');
const emailField = document.querySelector('.mailfield');
const displayedMail = document.querySelector('.email-data');
const mailEditBtns = document.querySelector('.email-btns');
const cancelMailEdit = document.querySelector('.cancel-mail-edit');
const mailValue = document.forms['change-email-form']['email'];
const emailRegex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
const changeMailBtn = document.forms['change-email-form']['change-email'];
const emailForm = document.forms['change-email-form'];
const validationMailMessage = document.querySelector('.email-change');

//VARIABLES FOR ACCOUNT PASSWORD FORM
const editPassBtn = document.getElementById('edit-password');
const passField = document.getElementsByClassName('passfield');
const displayedPass = document.querySelector('.pass-data');
const passEditBtns = document.querySelector('.pass-btns');
const cancelPassEdit = document.querySelector('.cancel-pass-edit');
const passValue = document.forms['change-pass-form']['password'];
const passRetypeValue = document.forms['change-pass-form']['password-retype'];
const passRegex = /(?=.*[_!@#$%^&*-])(?=.*\d)(?!.*[.\n])(?=.*[a-z])(?=.*[A-Z])^.{8,}$/;
const changePassBtn = document.forms['change-pass-form']['change-password'];
const validationPassMessage = document.querySelector('.pass-change');
const validationRetypeMessage = document.querySelector('.pass-retype-change');
const passForm = document.forms['change-pass-form'];

//OTHER VARIABLES
const body = document.querySelector('body'); //Will be used on account deletion form, to stop page from scrolling

function openMailForm() {
    emailField.style.display = "block";
    editMailBtn.style.display = "none";
    displayedMail.style.display = "none";
    mailEditBtns.style.display = "flex";
}

function closeMailForm() {
    emailField.style.display = "none";
    editMailBtn.style.display = "block";
    displayedMail.style.display = "block";
    mailEditBtns.style.display = "none";
    validationMailMessage.style.display = "none";
}

function openPassForm() {
    for (let i = 0; i < passField.length; i++) {
        passField[i].style.display = "block";
    }
    editPassBtn.style.display = "none";
    displayedPass.style.display = "none";
    passEditBtns.style.display = "flex";
}

function closePassForm() {
    for (let i = 0; i < passField.length; i++) {
        passField[i].style.display = "none";
    }
    editPassBtn.style.display = "block";
    displayedPass.style.display = "block";
    passEditBtns.style.display = "none";
    validationPassMessage.style.display = "none";
}

//CLICK TO MAKE EMAIL FORM APPEAR
editMailBtn.addEventListener('click', function () {
    openMailForm();
    closePassForm();
}, false);

//CLICK TO MAKE EMAIL FORM DISAPPEAR
cancelMailEdit.addEventListener('click', function () {
    closeMailForm();
}, false);

//EMAIL FORM VALIDATION
changeMailBtn.addEventListener('click', function () {
    if (!emailRegex.test(mailValue.value)) {
        emailForm.addEventListener('submit', function (e) {
            validationMailMessage.innerHTML = `<i class="fas fa-times-circle"></i>Please type a valid email address.`;
            validationMailMessage.style.display = "block";
            e.preventDefault();
        }, false);
    } else {
        emailForm.submit();
    }
}, false);

//CLICK TO MAKE PASSWORD FORM APPEAR
editPassBtn.addEventListener('click', function () {
    openPassForm();
    closeMailForm();
}, false);

//FORM VALIDATION BEFORE SUBMITTING
changePassBtn.addEventListener('click', function () {
    let passBoolean, retypePassBoolean;

    if (passRegex.test(passValue.value) == true) {
        passBoolean = true;
        validationPassMessage.style.display = "none";
    } else {
        passBoolean = false;
        validationPassMessage.innerHTML = `<i class="fas fa-times-circle"></i>Please type a password with at least 8 characters, one uppercase letter, one lowercase letter, a number and a special character.`;
        validationPassMessage.style.display = "block";
    }

    if (passValue.value === passRetypeValue.value) {
        retypePassBoolean = true;
    } else {
        validationRetypeMessage.innerHTML = `<i class="fas fa-times-circle"></i>Your retyped password isn't equal to your password.`;
        validationRetypeMessage.style.display = "block";
    }

    if (passBoolean === true && retypePassBoolean === true) {
        passForm.submit();
    } else {
        passForm.addEventListener('submit', function (e) {
            e.preventDefault();
        }, false);
    }
}, false);

//CLICK TO MAKE PASSWORD FORM DISAPPEAR
cancelPassEdit.addEventListener('click', function () {
    closePassForm();
}, false);

//MAKES ACCOUNT DELETION FORM APPEAR
deleteAccountButton.addEventListener('click', function () {
    deleteAccountForm.style.display = 'flex';
    body.style.overflowY = 'hidden';
}, false);

//MAKES ACCOUNT DELETION FORM DISAPPEAR
deleteCancelButton.addEventListener('click', function () {
    deleteAccountForm.style.display = 'none';
    deleteAccountForm.style.position = 'fixed';
    inputField.style.margin = "18px 0 45px 0";
    errorMessage.style.display = "none";
    body.style.overflowY = 'initial';
}, false);

//DELETION FORM VALIDATION
deletionForm.addEventListener('submit', function (e) {

    //PREVENT FORM FROM BEING SUBMITED IF THE INPUT VALUE IS NOT EQUAL TO DELETE IN UPPERCASE
    if (formInput.value != 'DELETE') {
        e.preventDefault();
        errorMessage.innerHTML = `<i class="fas fa-times-circle"></i>Make sure you type DELETE in uppercase letters.`;
        inputField.style.margin = "18px 0 3.6px 0";
        errorMessage.style.display = "block";
        return false;
    }
}, false);