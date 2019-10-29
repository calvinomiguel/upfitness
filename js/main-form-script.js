//DEFINE VARIABLES FOR FORM NAVIGATION
const formPage = document.getElementsByClassName('page');
const startForm = document.querySelector('.in-cta');
const startView = document.querySelector('.main-wrapper');
const form = document.querySelector('.form-wrapper');
const nextButton = document.getElementsByClassName('next-btn');
const previousButton = document.getElementsByClassName('previous-btn');
const getStartedButton = document.getElementsByClassName('start');

//DEFINE VARIABLES FOR FORM VALIDATION
const goalErrMessage = document.getElementById('goal-err');
const sexErrMessage = document.getElementById('sex-err');
const heightErrMessage = document.getElementById('height-err');
const weightErrMessage = document.getElementById('weight-err');
const emailErrMessage = document.getElementById('email-err');
const birthDateErrMessage = document.getElementById('date-err');
const subscriptionForm = document.forms['subscription-form'];
const passwordErrMessage = document.getElementById('password-err');
const passwordRetypeErrMessage = document.getElementById('password-retype-err');
const goalValue = document.forms['subscription-form']['goal'];
const sexValue = document.forms['subscription-form']['sex'];
const birthDateValue = document.getElementById('datepicker');
const heightValue = document.forms['subscription-form']['height'];
const weightValue = document.forms['subscription-form']['weight'];
const emailValue = document.getElementById('email');
const passwordValue = document.forms['subscription-form']['password'];
const passwordRetypeValue = document.forms['subscription-form']['password-retype'];
const emailRegex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*])(?=.{8,})/;

//VARIABLES TO STORE BOOLEANS
let emailStatus;
let passwordStatus;
let passwordRetypeStatus;
let subscriptionStatus;

//VARIABLES FOR RESPONSIVE MENU ON HOMEPAGE
const dcBody = document.querySelector('body');
const homeButton = document.getElementsByClassName('home-button');

//STARTING FORM
for (let x = 0; x < getStartedButton.length; x++) {
    getStartedButton[x].addEventListener('click', function () {
        startView.style.display = 'none';
        form.style.display = 'block';
    }, false);
}

startForm.addEventListener('click', function () {
    startView.style.display = 'none';
    form.style.display = 'block';
});

//SET BOOLEANS FOR FOR LATER USE IN FORM VALIDATION
function setSubscriptionBooleans() {
    if (emailValue.value === "" || emailRegex.test(String(emailValue.value)) === false) {
        emailErrMessage.innerHTML = `<i class="fas fa-times-circle"></i>Please enter a valid email address`;
        emailStatus = false;
    } else {
        emailStatus = true;
    }

    if (passwordValue.value === "" || passwordRegex.test(String(passwordValue.value)) === false) {
        passwordErrMessage.innerHTML = `<i class="fas fa-times-circle"></i>Your password must have at least 8 characters, one uppercase letter, one lowercase letter, one number and one special character.`;
        passwordStatus = false;
    } else {
        passwordErrMessage.innerHTML = "";
        passwordStatus = true;
    }

    if (passwordRetypeValue.value !== passwordValue.value) {
        passwordRetypeErrMessage.innerHTML = `<i class="fas fa-times-circle"></i>Make sure your retyped password and your password are equal.`;
        passwordRetypeStatus = false;
    } else {
        passwordRetypeErrMessage.innerHTML = "";
        passwordRetypeStatus = true;
    }

    if (emailStatus === false || passwordStatus === false || passwordRetypeStatus === false) {
        subscriptionStatus = false;
    } else if (emailStatus === true && passwordStatus === true && passwordRetypeStatus === true) {
        subscriptionStatus = true;
    }
}

//PRESSING NEXT BUTTON IN THE FORM & FORM VALIDATION
for (let a = 0; a < nextButton.length; a++) {
    nextButton[a].addEventListener('click', function () {

        //SET BOOLEANS FOR FORM VALIDATION
        setSubscriptionBooleans();

        //FORM VALIDATION
        if (a === 1 && goalValue.value === "") {
            goalErrMessage.style.display = "block";
        } else if (a === 2 && sexValue.value === "") {
            sexErrMessage.style.display = "block";
        } else if (a === 3 && birthDateValue.value === "") {
            birthDateErrMessage.style.display = "block";
        } else if (a === 4 && heightValue.value === "") {
            heightErrMessage.style.display = "block";
        } else if (a === 5 && weightValue.value === "") {
            weightErrMessage.style.display = "block";
        } else if (a === 6 && subscriptionStatus === false) {

            subscriptionForm.addEventListener('submit', function (e) {
                e.preventDefault();
            }, false);

            if (emailStatus === false) {
                emailErrMessage.style.display = "block";
            } else {
                emailErrMessage.style.display = "none";
            }

            if (passwordStatus === false) {
                passwordErrMessage.style.display = "block";
            } else {
                passwordErrMessage.style.display = "none";
            }

            if (passwordRetypeStatus === false) {
                passwordRetypeErrMessage.style.display = "block";
            } else {
                passwordRetypeErrMessage.style.display = "none";
            }

        } else {
            //REMOVE ERROR MESSAGE
            goalErrMessage.style.display = "none";
            sexErrMessage.style.display = "none";
            birthDateErrMessage.style.display = "none";
            heightErrMessage.style.display = "none";
            weightErrMessage.style.display = "none";

            if (a === 6) {
                console.log('DOne');
                subscriptionForm.submit();
            } else {
                //HIDE CURRENT FORM PAGE DISPLAY THE FOLLOWING
                formPage[a].style.display = "none";
                formPage[a + 1].style.display = "flex";
            }
        }
    }, false);
}

//PRESSING THE PREVIOUS BUTTON IN THE FORM
for (let b = 0; b < previousButton.length; b++) {

    previousButton[b].addEventListener('click', function () {
        for (let c = 0; c < previousButton.length; c++) {
            formPage[c + 1].style.display = "none";
        }

        formPage[b].style.display = "flex";

    }, false);
}

//Home button doesn't just closes the navigation, it also starts the form
for (let i = 0; i < homeButton.length; i++) {
    homeButton[i].addEventListener('click', function () {
        dcBody.style.overflowY = 'initial';
        startView.style.display = 'none';
        form.style.display = 'block';
        responsiveNavigation.style.display = 'none';
    }, false);
}