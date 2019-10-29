//DEFINE VARIABLES FOR FORM VALIDATION
const errMessage = document.getElementById('forgot-err');
let resetEmail = document.getElementById('reset-email');
const emailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
const resetForm = document.getElementById('reset-form');
const successMessage = document.getElementById('reset-start');

//VALIDATION
resetForm.addEventListener('submit', function (e) {
    if (emailRegex.test(resetEmail.value)) {
        return true;
    } else{
        console.log(resetEmail.value);
        e.preventDefault();
        errMessage.innerHTML = `<i class="fas fa-times-circle"></i>The email address ${resetEmail.value} is not valid.`;
        errMessage.style.display = "block";
        successMessage.parentNode.removeChild(successMessage);
        return false;
    }
});


