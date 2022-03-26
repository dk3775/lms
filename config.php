<?php
    declare(strict_types=1);
    error_reporting(E_STRICT);
    require_once('vendor/autoload.php');
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    //this is the main config file
    // $server = "localhost";
    try{
    $dotenv->load();
    $dotenv->required(['DB_HOST', 'DB_NAME', 'DB_USER', 'DB_PASS']);
    $conn = mysqli_connect($_ENV['DB_HOST'], $_ENV['DB_USER'], $_ENV['DB_PASS'], $_ENV['DB_NAME']);
    if(!isset($conn)){
        die("Connection failed: " . mysqli_connect_error());
    }
    } catch (Exception $e) {
        echo "Database connection error, Please retry later.<br> ";
    }
?>