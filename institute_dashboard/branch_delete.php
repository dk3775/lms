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
        $_SESSION["userrole"] = "institute";
        $fid = $_GET['brid'];
        $qur = "DELETE FROM branchmaster WHERE BranchId = '$fid'";
        try{
            $res = mysqli_query($conn, $qur);
            if($res){
                echo "<script>alert('Branch Deleted Successfully');</script>";
                echo "<script>window.location.href='../institute_dashboard/branch_view.php';</script>";
            }
        } catch (Exception $e) {
            echo "<script>alert('Branch Deletion Failed, Because This Branch is Not Empty');</script>";
            echo "<script>window.open('branch_list.php','_self')</script>";
        }
    }
    ?>
</body>

</html>