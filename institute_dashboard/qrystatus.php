<html>
    <head></head>
</html>
<body>
    <?php
    session_start();
    if ($_SESSION['role'] != "Texas") {
        header("Location: ../index.php");
    } else {
        include_once("../config.php");
        $_SESSION["userrole"] = "Faculty";
        $id= $_GET['qid'];
        $qur = "UPDATE querymaster SET Querystatus = '2' WHERE QueryId = '$id'";
        $res = mysqli_query($conn, $qur);
        if ($res) {
            echo "<script>alert('Successfully');</script>";
            header("Location: student_queries.php");
        } else {
            echo "<script>alert('Failed');</script>";
            header("Location: student_queries.php");
        }
    }
    ?>
    
</body>
</html>