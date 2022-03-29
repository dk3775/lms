<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc." />
    <!-- Favicon -->
    <link rel="shortcut icon" href="../assets/favicon/favicon.ico" type="image/x-icon" />
    <title>LMS by Titanslab</title>
    <style>
        body {
            background-color: #f9fbfd;
        }
    </style>
</head>
<body>
    <?php
    session_start();
    if ($_SESSION['role'] != "Texas") {
        header("Location: ../index.php");
    } else {
        include_once("../config.php");
        $_SESSION["userrole"] = "Institute";
        $enr = $_GET['studentenr'];
        $enr = mysqli_real_escape_string($conn, $enr);
        $qur = "DELETE FROM studentmaster WHERE StudentEnrollmentNo = '$enr'";
        $res = mysqli_query($conn, $qur);
        if ($res) {
            echo "<script>alert('Student Deleted Successfully');</script>";
            header("Location: ../institute_dashboard/student_list.php");
        }
    }
    ?>
</body>

</html>