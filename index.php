<?php
session_start();
require_once "includes/config.php";
require "classes/statements.php";
require "classes/sanitizer.php";
require "classes/passwordhandler.php";

//Create new statements instance
$stmts = new Statements($servername, $username, $password, $dataBaseName);

//Create new sanitizer instance
$sanitize = new Sanitizer();

//Create new password handler instance
$passwordHandler = new Passwordhandler();

#1 HOMEPAGE
//Prepare variables for registration
$subGoal = isset($_POST["submit-subscription"]) ? $_POST["goal"] : "";
$subSex = isset($_POST["submit-subscription"]) ? $_POST["sex"] : "";
$subBirthDate = isset($_POST["submit-subscription"]) ? $_POST["birthdate"] : "";
$subHeight = isset($_POST["submit-subscription"]) ? $sanitize->sanitizeInt($_POST["height"]) : "";
$subWeight = isset($_POST["submit-subscription"]) ? $sanitize->sanitizeInt($_POST["weight"]) : "";
$subMail = isset($_POST["submit-subscription"]) ? $sanitize->sanitizeMail($_POST["email"]) : "";
$subPassword = isset($_POST["submit-subscription"]) ? $sanitize->sanitizeString($_POST["password"]) : "";
$confirmationCode = rand(0, 10000000);
$confirmationStatus = 0;
$subPassword = $sanitize->sanitizeString($subPassword);

//Convert birth date input
function convertToDate($dateString)
{
    if (isset($_POST["submit-subscription"])) {
        $dateArray = preg_split("[/]", $dateString);
        $day = $dateArray[0];
        $month = $dateArray[1];
        $year = $dateArray[2];
        $newDate = date("$day/$month/$year");
        return $newDate;
    } else {
        return false;
    }
}

//Variables that are going to be passed into the database
$subPassword = $passwordHandler->hashPassword($subPassword);
$subBirthDate = convertToDate($subBirthDate);

//Check if email is being already used
$usrData = $stmts->getAllUsers();
$countr = 0;

foreach ($usrData as $usr) {
    if ($subMail === $usr["email"]) {
        $countr++;
    }
}

//Registration and confirmation email
if (isset($_POST["submit-subscription"])) {

    if ($countr != 0) {
        $registrationSuccess = "<span class=\"err-message confirmation\"><i class=\"fas fa-times-circle\"></i>The email you choose is already being used. Please try to subscribe with another email.</span>";
    } else {
        $stmts->createNewUser($subMail, $subPassword, $subGoal, $subHeight, $subWeight, $subSex, $confirmationStatus, $confirmationCode, $subBirthDate);
        $to = $subMail;
        $from = "noreply@upfitness.com";
        $subject = "Your registration at Up Fitness";
        $message = "Thank you for your registration at Up Fitness. Please <a href=\"http://" . $_SERVER['HTTP_HOST'] . "/portfolio/upfitness/?page=login&user=" . $subMail . "&key=" . $confirmationCode . "\">click here</a> to complete your registration.";
        $headers = "From:" . $from;
        mail($to, $subject, $message, $headers);
        header("Location: ?page=thankyou");
    }
}

//Complete registration
$emailToVerify = isset($_GET["user"]) ? $_GET["user"] : "";
$codeToVerify = isset($_GET["key"]) ? $_GET["key"] : "";

$userReg = $stmts->getUser($emailToVerify);

if (isset($_GET["user"]) && isset($_GET["key"]) && !isset($_GET["action"])) {
    $registrationSuccess = "<span class=\"success-message success php\"><i class=\"far fa-check-circle\"></i>You have been successfully registered.</span>";
    if ($codeToVerify === $userReg["confirmation_code"]) {
        $stmts->completeRegistration($emailToVerify);
    } else {
        header("Location: ?page=expired");
    }
}

#2 LOGIN PAGE
//Prepare variables for login & login validation
$loginMail = isset($_POST["login-submit"]) ? $sanitize->sanitizeMail($_POST["login-email"]) : "";
$loginPassword = isset($_POST["login-submit"]) ? $sanitize->sanitizeString($_POST["login-password"]) : "";

//Declare variables to store some values later
$confirmationMessage = $emailStatus = $passStatus = $loginMailError = $loginPassError = $registrationSuccess = "";

//Login validation with error code
if (isset($_POST["login-submit"])) {
    if (empty($loginMail)) {
        $loginMailError = "<span class=\"err-message login-err\"><i class=\"fas fa-times-circle\"></i>Please enter your email.</span>";
        $emailStatus = false;
    } else {
        $loginMailError = "";
        $emailStatus = true;
    }

    if (!$loginMail) {
        $loginMailError = "<span class=\"err-message login-err\"><i class=\"fas fa-times-circle\"></i>Please enter a valid email.</span>";
        $emailStatus = false;
    } else {
        $emailStatus = true;
        $loginMailError = "";
    }

    if (empty($loginPassword)) {
        $loginPassError = "<span class=\"err-message login-err\"><i class=\"fas fa-times-circle\"></i>Please enter your password.</span>";
        $passStatus = false;
    } else {
        $passStatus = true;
    }

    $data = $stmts->login($loginMail);
    $confirmStatus = $stmts->getUser($loginMail);

    if ($emailStatus === true && $passStatus === true) {
        if (!$data) {
            $loginMailError = "<span class=\"err-message login-err\"><i class=\"fas fa-times-circle\"></i>This email isn't registered at Up Fitness.</span>";
        } else {
            if ($passwordHandler->verifyPass($loginPassword, $data["password"])) {
                $passStatus = true;
            } else {
                $passStatus = false;
                $loginPassError = "<span class=\"err-message login-err\"><i class=\"fas fa-times-circle\"></i>You have entered a wrong password.</span>";
            }
            if ($confirmStatus['confirmation_status'] == 1) {
                if ($emailStatus === true && $passStatus === true) {
                    $_SESSION["logged_in"] = true;
                    $_SESSION["user_email"] = $loginMail;
                    header("Location: dashboard/index.php");
                }
            } else {
                $confirmationMessage = "<span class=\"err-message login-err\"><i class=\"fas fa-times-circle\"></i>Please complete your registration by using our confirmation email, before you can login.</span>";
            }
        }
    }
}

#3 PASSWORD RESET PAGES
//Start password-reset
//Set some variables for later use
$resetEmail = isset($_POST["reset-email"]) ? $sanitize->sanitizeMail($_POST["reset-email"]) : "";
$startResetMessage = "";

if (isset($_POST["submit-reset"])) {
    $stmts->startPasswordReset($resetEmail);
    $to = $resetEmail;
    $from = "noreply@upfitness.com";
    $subject = "Up Fitness – Reset password";
    $message = "If you have requested to reset your password, please click <a href=\"http://" . $_SERVER['HTTP_HOST'] . "portfolio/upfitness/?page=reset&id=" . $resetEmail . "&key=" . $confirmationCode . "&action=reset>here</a> to  reset your password.";
    $headers = "From:" . $from;
    mail($to, $subject, $message, $headers);
    $startResetMessage = "<span id=\"reset-start\" class=\"success-message success\"><i class=\"fas fa-check-circle\"></i>We've sent you an email. Check your inbox.</span>";
}

//Define variables to use later in password update
$newPassword = isset($_POST["new-password"]) ? $sanitize->sanitizeString($_POST["new-password"]) : "";
$newPasswordRetype = isset($_POST["new-password-retype"]) ? $_POST["new-password-retype"] : "";
$newPassword = $passwordHandler->hashPassword($newPassword);

$resetEmail = isset($_GET["id"]) ? $_GET["id"] : "";
$resetKey = isset($_GET["key"]) ? $_GET["key"] : "";
$resetUser = $stmts->getUser($resetEmail);
$resetSuccess = "";
$currentPage = isset($_GET['page']) ? $_GET['page'] : "";

//Check if confirmation code is still valid
if ($currentPage == "reset" && isset($_GET["key"]) && isset($_GET["id"]) && isset($_GET["action"])) {
    if ($resetKey != $resetUser["reset_code"]) {
        header("Location: ?page=expired");
    }
}

//Redirect user to error page. User can only reach reset page if he has a proper reset URL
if (isset($_GET['page']) && $currentPage == "reset" && !isset($_GET["key"]) && !isset($_GET["id"]) && !isset($_GET["action"])) {
    header("Location: ?page=error");
}

//Update password
if (isset($_POST["submit-new-password"]) && isset($_POST["new-password"])) {
    if ($resetKey == $resetUser["reset_code"]) {
        $stmts->completePasswordReset($newPassword, $resetEmail);
        header("Location: ?page=login&reset=success");
    }
}

//Show success message on login page after resetting the password
$successVar = isset($_GET['reset']) ? $_GET['reset'] : "";
if ($successVar == 'success') {
    $resetSuccess = "<span id=\"reset-success\" class=\"success-message success\"><i class=\"fas fa-check-circle\"></i>Your password has been successfully resetted.</span>";
}

#5 GENERAL SETTING

//Define page name variable for page navigation
$pageName = isset($_GET["page"]) ? $_GET["page"] : "";

//IF ON HOMEPAGE USE BUTTON IF ANY OTHER PAGE USE A TAG
$startButton = $responsiveStartButton = "";

if ($pageName == "") {
    $startButton = "<button class=\"start home-button\" type=\"button\">Get started</button>";
    $responsiveStartButton = "<button class=\"start home-button\" type=\"button\">Get started</button>";
} else {
    $startButton = "<a class=\"start\" href=\"http://" . $_SERVER['HTTP_HOST'] . "/portfolio/upfitness\">Get started</a>";
    $responsiveStartButton = "<a class=\"start\" href=\"http://" . $_SERVER['HTTP_HOST'] . "/portfolio/upfitness\">Get started</a>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">
    <link rel="apple-touch-icon" sizes="57x57" href="favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <title>Up Fitness – Get fit easily</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" href="css/fontawesome/css/all.min.css">
    <!--[if IE]>
    <link rel="stylesheet" type="text/css" href="css/all-ie-only.css"/>
    <![endif]-->
</head>
<body>
<a class="skip-to-main" href="#main">Skip to main</a>
<div class="internet-explorer">
    <div class="ie-wrapper">
        <h1>This website is only accessible on modern browsers.</h1>
        <div class="links-wrapper">
            <a href="https://www.google.com/intl/de/chrome/">Download Google Chrome</a>
            <a href="https://www.mozilla.org/de/firefox/new/">Download Firefox</a>
            <a href="https://www.opera.com/de/download">Download Opera</a>
        </div>
        <img src="img/chrome-firefox-opera.jpg" alt="Modern Browsers">
    </div>
</div>
<nav class="responsive-menu">
    <div class="menu-wrapper">
        <div class="top-wrapper">
            <div class="responsive-menu-wrapper">
                <a class="logo-link" href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . "/portfolio/upfitness"; ?>">
                    <img class="logo" src="img/up.svg" alt="Up Logo">
                </a>
                <button class="close-menu-button" type="button"><img class="close-icon" src="img/close-icon.svg"
                                                                     alt="Close icon">
                </button>
            </div>
        </div>
    </div>
    <ul>
        <li>
            <?php
            //GET BUTTON THAT STARTS FORM OR A TAG THAT LINKS TO START PAGE
            echo $responsiveStartButton
            ?>
        </li>
        <li><a href="<?php echo "?page=login" ?>">Login</a></li>
    </ul>
</nav>
<header>
    <nav class="header-nav">
        <div class="nav-wrapper">
            <a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . "/portfolio/upfitness"; ?>"><img src="img/up.svg"
                                                                                           alt="Up Logo"/></a>
            <ul class="nav-list">
                <li>
                    <?php
                    //GET BUTTON THAT STARTS FORM OR A TAG THAT LINKS TO START PAGE
                    echo $startButton
                    ?>
                </li>
                <li>
                    <a href="<?php echo "?page=login" ?>">Login</a>
                </li>
            </ul>
            <button class="menu-bar" type="button" name="button"><i class="fas fa-bars"></i></button>
        </div>
    </nav>
</header>
<main id="main" class="main">
    <?php
    //DEFINE VARIABLE TO STORE JS SCRIPT PATH LATER
    $startResetScript = $endResetScript = $homeScript = "";

    //GETS CONTENT THAT NEEDS TO BE DISPLAYED
    if ($pageName == "") {
        include "includes/home.php";
        $homeScript = "<script src=\"js/main-form-script.js\"></script>";
        $homeScript .= "<script src=\"js/date-picker/pikaday.js\"></script>";
        $homeScript .= "<script src=\"js/calldatepicker.js\"></script>";
    } elseif ($pageName == "login") {
        include "includes/login.php";
    } elseif ($pageName == "password-reset") {
        include "includes/password-reset.php";
        $startResetScript = "<script src=\"js/password-reset.js\"></script>";
    } elseif ($pageName == "thankyou") {
        include "includes/thankyou.php";
    } elseif ($pageName == "delete") {
        include "includes/delete.php";
    } elseif ($pageName == "reset") {
        include "includes/reset.php";
        $endResetScript = "<script src=\"js/reset-validation.js\"></script>";
    } elseif ($pageName == "expired") {
        include "includes/expired.php";
    } elseif ($pageName == "policy") {
        include "includes/policy.php";
    } elseif ($pageName == 'about') {
        include 'includes/about.php';
    } elseif($pageName == 'contact'){
        include 'includes/contact.php';
    }else{
        include "includes/error.php";
    }
    ?>
</main>

<?php
//GET FOOTER
include "includes/footer.php";

//JS FILE PATH
print $startResetScript;
print $endResetScript;
print $homeScript;
?>
<script src="js/responsive-menu-script.js"></script>
</body>

</html>
