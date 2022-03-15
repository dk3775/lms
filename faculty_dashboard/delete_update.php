<!DOCTYPE html>
<html lang="en">

<head>
     <?php include_once "../head.php";?>
</head>
<body>
<?php
session_start();
if ($_SESSION['role'] != "Lagos") {
    header("Location: ../index.php");
} else {
    include_once "../config.php";
    $_SESSION["userrole"] = "institute";
    $ttid = $_GET['updid'];
    $qur = "DELETE FROM updatemaster WHERE UpdateId = '$ttid'";
    $res = mysqli_query($conn, $qur);
    if ($res) {
        echo "<script>alert('Timetable Deleted Successfully');</script>";
        header("Location: update_list.php");
    } else {
        echo "<script>alert('Timetable Deletion Failed');</script>";
        header("Location: update_list.php");
    }
}
?>
</body>

</html>