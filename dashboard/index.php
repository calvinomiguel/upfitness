<?php
session_start();
require_once '../includes/config.php';
require '../classes/athlete.php';
require '../classes/bmi.php';
require '../classes/sanitizer.php';
require '../classes/statements.php';
require '../classes/passwordhandler.php';

#GENERAL SETTINGS
//If user is not logged in redirects him to login page
$redirectToLogin = "http://".$_SERVER['HTTP_HOST']."/upfitness/?page=login";
if($_SESSION['logged_in'] != true){
    header("Location: $redirectToLogin");
}

$loginEmail = $_SESSION['user_email'];

#1 – MY DATA PAGE
//Declare variables to store user's database data later
$goal = $sex = $age = $weight = $height = "";

//Create a new instance in order to get the user's data
$statements = new Statements($servername, $username, $password, $dataBaseName);
$user = $statements->getUser($loginEmail);

//Create a new sanitizer instance
$sanitize = new Sanitizer();

//Create a new passwordhandler instance to later hash passwords
$passwordHandler = new Passwordhandler();

//Set the user's data into variables
$goal = $user['goal'];
$sex = $user['sex'];
$age = $statements->calculateAge($user['birthdate']);
$weight = $user['weight'];
$height = $user['height'];

//Store data into an array to use later in statement execution
$data = [
    'goal' => isset($_POST['goal']) ? $_POST['goal'] : '',
    'sex' => isset($_POST['sex']) ? $_POST['sex'] : '',
    'weight' => isset($_POST['sex']) ? $sanitize->sanitizeInt($_POST['weight']) : '',
    'height' => isset($_POST['height']) ? $sanitize->sanitizeInt($_POST['height']) : '',
    'email' => $loginEmail
];

if (isset($_POST['submit-mydata'])) {
    $statements->updateUser($data);
    header('Location: ?page=mydata');
}

#2 – ROUTINES PAGE
//To fetch all video data to create video thumbnails on routines' page
$allVideos = $statements->getAllVideos();

//Get JSON object from class method and store it into a variable to use later
//JSON gets used in the videofilter.js through a function that filters content by category
$json = $statements->getJSONVideos();

#2.1 – VIDEO PAGE
//When clicking on video thumbnail, check if GET is set and then get the right video
$videoID = isset($_GET['workout']) ? $_GET['workout'] : "";
$video = $statements->getVideo($videoID);

#3 NUTRITION PAGE
//To fetch all posts data to create post thumbnails on nutrition' page
$allPosts = $statements->getAllPosts();

//Get JSON object from class method and store it into a variable to use later
//JSON gets used in the nutritionfilter.js through a function that filters content by category
$jsonPost = $statements->getJSONPosts();

#3.1 POST PAGE
//When clicking on post thumbnail, check if GET is set and then get the right post
$postID = isset($_GET['recipe']) ? $_GET['recipe'] : "";
$post = $statements->getPost($postID);

#4 ACCOUNT PAGE
//Define variables to send later into database
$newEmail = isset($_POST['email']) ? $sanitize->sanitizeMail($_POST['email']) : "";
$newPassword = isset($_POST['password']) ? $sanitize->sanitizeString($_POST['password']) : "";
$newPassword = $passwordHandler->hashPassword($newPassword);

//Change Email
if (isset($_POST['change-email']) && isset($_POST['email'])) {
    $statements->changeEmail($newEmail, $loginEmail);
    $_SESSION['user_email'] = $newEmail;
    $loginEmail = $_SESSION['user_email'];
    header("Location: ?page=account");
}

//Change Password
if (isset($_POST['change-password']) && isset($_POST['password-retype'])) {
    $statements->changePassword($newPassword, $loginEmail);
    header("Location: ?page=account");
}

//Delete user account
$deleteMessage = isset($_POST['delete']) ? $_POST['delete'] : "";

//Create dynamic path to sorry to see you go page
$host = $_SERVER['HTTP_HOST'];
$redirect = "http://".$host."/upfitness/?page=delete";

if(isset($_POST['delete-account'])){
    $statements->deleteUser($loginEmail);
    header("Location: $redirect");
}

//Store GET into a variable to use later
$pageName = isset($_GET['page']) ? $_GET['page'] : '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="57x57" href="../favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="../favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="../favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="../favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="../favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="../favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="../favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="../favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="../favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="../favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="../favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../favicon/favicon-16x16.png">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="../favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <title>Up Fitness – Get fit easily</title>
    <link rel="stylesheet" type="text/css" title="Cool stylesheet" href="../css/main-dashboard.css">
    <link rel="stylesheet" href="../css/fontawesome/css/all.min.css">
</head>
<body>
<a class="skip-to-main" href="#main">Skip to main</a>
<nav class="responsive-menu">
    <div class="menu-wrapper">
        <div class="top-wrapper">
            <div class="responsive-menu-wrapper">
                <a class="logo-link" href="<?php echo "http://".$_SERVER['HTTP_HOST']."/upfitness/dashboard";?>">
                    <img class="logo" src="../img/up.svg" alt="Up Logo">
                </a>
                <button class="close-menu-button" type="button"><img class="close-icon"
                                                                     src="../img/close-icon.svg" alt="Close icon">
                </button>
            </div>
        </div>
    </div>
    <ul>
        <li><a href="?page=mydata">My data</a></li>
        <li><a href="?page=routines">Routines</a></li>
        <li><a href="?page=nutrition">Nutrition</a></li>
        <li><a href="?page=account">Account</a></li>
        <li id="log-out" ><button class="log-out" type="button">Log out</button></li>
    </ul>
</nav>
<?php
//Add deletion pop-up form for account page
if ($pageName == 'account') {
    include 'includes/deletion_form.php';
}
?>
<nav class="responsive-nav">
    <div class="nav-wrapper">
        <a class="logo-link" href="<?php echo "http://".$_SERVER['HTTP_HOST']."/upfitness/dashboard";?>"><img class="logo" src="../img/up.svg" alt="Up Logo"/></a>
        <ul class="nav-list">
            <li><a href="?page=mydata">My data</a></li>
            <li><a href="?page=routines">Routines</a></li>
            <li><a href="?page=nutrition">Nutrition</a></li>
            <li><a href="?page=account">Account</a></li>
            <li><button class="log-out" type="button">Log out</button></li>
        </ul>
        <button class="menu-bar" type="button" name="button"><i class="fas fa-bars"></i></button>
    </div>
</nav>
<aside>
    <nav class="header-nav">
        <div class="nav-wrapper">
            <a class="logo-link" href="<?php echo "http://".$_SERVER['HTTP_HOST']."/upfitness/dashboard";?>"><img class="logo" src="../img/up.svg" alt="Up Logo"/></a>
            <ul class="nav-list">
                <li><a href="?page=mydata">My data</a></li>
                <li><a href="?page=routines">Routines</a></li>
                <li><a href="?page=nutrition">Nutrition</a></li>
                <li><a href="?page=account">Account</a></li>
            </ul>
        </div>
        <button class="log-out" type="button">Log out</button>
    </nav>
</aside>
<main class="main">
    <?php
    //Define variable to store JS script paths for laterDEFINE VARIABLES TO STORE JS SCRIPT PATHS FOR LATER
    $routinesScript = $nutritionScript = $accountScript = $myDataScript = "";

    //Gets content and JS Script path that needs to be displayed and used
    if ($pageName == "mydata" || $pageName == "") {
        include 'includes/mydata.php';
        $myDataScript = "<script src=\"../js/mydata-script.js\"></script>";
    } elseif ($pageName == 'routines') {
        include 'includes/routines.php';
        $routinesScript = "<script src=\"../js/routine-script.js\"></script>";
        $routinesScript .= "<script>const json =" . $json . "</script>";
        $routinesScript .= "<script src=\"../js/videofilter.js\"></script>";
    } elseif ($pageName == 'nutrition') {
        include 'includes/nutrition.php';
        $nutritionScript = "<script>const jsonPost =" . $jsonPost . "</script>";
        $nutritionScript .= "<script src=\"../js/nutritionfilter.js\"></script>";
    } elseif ($pageName == 'account') {
        include 'includes/account.php';
        $accountScript = "<script src=\"../js/myaccount-script.js\"></script>";
    } elseif ($pageName == 'post') {
        include 'includes/post.php';
    } elseif ($pageName == 'video') {
        include 'includes/video.php';
    } else {
        include 'includes/error.php';
    }
    ?>
</main>
<script src="../js/responsive-menu-script.js"></script>
<?php
//Prints path to JS script file for My Data page
print $myDataScript;

//Prints path to JS script file for Routines page
print $routinesScript;

//Prints path to JS script file for Nutrition page
print $nutritionScript;

//Prints path to JS script file for Account page
print $accountScript;
?>
<script src="../js/logout.js"></script>
</body>
</html>
