//Define variables to use later in validation
const resetForm = document.forms['reset-form'];
const newPassMessage = document.querySelector('.new-pass');
const newPassRetypeMessage = document.querySelector('.new-pass-retype');
const submitBtn = document.querySelector('.reset-btn');
const newPassword = document.forms['reset-form']['new-password'];
const newPasswordRetype = document.forms['reset-form']['new-password-retype'];
const passRegex = /(?=.*[_!@#$%^&*-])(?=.*\d)(?!.*[.\n])(?=.*[a-z])(?=.*[A-Z])^.{8,}$/;
let newPasswordStatus, newPasswordRetypeStatus;

submitBtn.addEventListener('click', function(e){
    if(passRegex.test(String(newPassword.value)) == true){
        newPassMessage.style.display = 'none';
        newPasswordStatus = true;
    }else{
        newPasswordStatus = false;
        newPassMessage.innerHTML = `<i class="fas fa-times-circle"></i>Please type a password with at least 8 characters, one uppercase letter, one lowercase letter, a number and a special character.`;
        newPassMessage.style.display = 'block';
    }

    if(newPassword.value === newPasswordRetype.value){
        newPasswordRetypeStatus = true;
        newPassRetypeMessage.style.display = 'none';
    }else{
        newPasswordRetypeStatus = false;
        newPassRetypeMessage.innerHTML = `<i class="fas fa-times-circle"></i>Your retyped password must be equal to your password.`;
        newPassRetypeMessage.style.display = 'block';
    }

    if(newPasswordStatus === true && newPasswordRetypeStatus === true){
        resetForm.submit();
    }else{
        e.preventDefault();
    }
}, false);