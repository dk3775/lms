<?php
    //this is the main config file
    $server = "sql284.main-hosting.eu";
    $conn = mysqli_connect($server, "u877822597_lmsadmin", "#TitansDKALAJdedenge79", "u877822597_lms");
    if(!isset($conn)){
        die("Connection failed: " . mysqli_connect_error());
    }
?>