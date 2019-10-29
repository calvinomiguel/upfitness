<?php
// DATABASE CONNECTION
$servername = $_SERVER['SERVER_NAME'];
$dataBaseName = "up_fitness";
$username = "ueli";
$password = "G2jmGVPe5Jm3!3SbH*";

try{
    $connection = new PDO("mysql:host=$servername;dbname=$dataBaseName", $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
} catch (PDOException $exception){
    echo "Connection failed: ". $exception->getMessage();
    die();
}