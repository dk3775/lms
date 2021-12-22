<?php
    //this is the main config file
    $conn = mysqli_connect("sql284.main-hosting.eu", "u877822597_lmsadmin", "#TitansDKALAJdedenge79", "u877822597_lms");
    if(!isset($conn)){
        die("Connection failed: " . mysqli_connect_error());
    }

?>