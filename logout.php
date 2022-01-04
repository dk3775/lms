<?php
    //file to logout
    session_start();
    session_destroy();
    header("Location: default.php");
?>