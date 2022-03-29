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
    $_SESSION["userrole"] = "Institute";
    $ttid = $_GET['ttid'];
    $ttid = mysqli_real_escape_string($conn, $ttid);
    $qur = "DELETE FROM timetablemaster WHERE TimetableId = '$ttid'";
    $res = mysqli_query($conn, $qur);
    if ($res) {
        echo "<script>alert('Timetable Deleted Successfully');</script>";
        header("Location: timetable_list.php");
    } else {
        echo "<script>alert('Timetable Deletion Failed');</script>";
        header("Location: timetable_list.php");
    }
}
?>
</body>

</html>