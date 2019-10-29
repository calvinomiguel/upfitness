<?php
session_start();
session_destroy();
session_unset();

$redirectToLoginPage = "http://".$_SERVER['HTTP_HOST']."/upfitness/?page=login";
header("Location: $redirectToLoginPage");
?>