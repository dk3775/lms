<html>

<head></head>

</html>

<body>
    <?php
    session_start();
    if ($_SESSION['role'] != "Lagos") {
        header("Location: ../index.php");
    } else {
        include_once("../config.php");
        $_SESSION["userrole"] = "Faculty";
        $id = $_GET['asid'];
        $id = mysqli_real_escape_string($conn, $id);
        $upid = $_GET['upid'];
        $upid = mysqli_real_escape_string($conn, $upid);
        $a = $_GET['a'];
        $a = mysqli_real_escape_string($conn, $a);
        if ($a == 1) {
            $qur = "UPDATE studentassignment SET SAssignmentStatus = '2' WHERE SAssignmentUploaderId = '$upid'";
            $res = mysqli_query($conn, $qur);
            if ($res) {
                echo "<script>alert('Successfully');</script>";
                header("Location: assignment_view.php?updateid=$id");
            } else {
                echo "<script>alert('Failed');</script>";
                header("Location: assignment_view.php?updateid=$id");
            }
        }
        else if ($a == 2)
        {
            $qur = "UPDATE studentassignment SET SAssignmentStatus = '3' WHERE SAssignmentUploaderId = '$upid'";
            $res = mysqli_query($conn, $qur);
            if ($res) {
                echo "<script>alert('Successfully');</script>";
                header("Location: assignment_view.php?updateid=$id");
            } else {
                echo "<script>alert('Failed');</script>";
                header("Location: assignment_view.php?updateid=$id");
            }
        }
    }
    ?>

</body>

</html>