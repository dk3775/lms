<?php
session_start();
if ($_SESSION['role'] != "Abuja") {
    header("Location: ../default.php");
} else {
    include_once("../config.php");
    $u = $_SESSION["id"];
    $_SESSION["userrole"] = "Student";
    $qur = "SELECT * FROM `studentmaster` WHERE `StudentUserName`='$u'";
    $row = mysqli_fetch_assoc(mysqli_query($conn, $qur));
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once('../head.php'); ?>
</head>

<body>
    <!-- NAVIGATION -->
    <?php require_once('nav.php'); ?>
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <!-- HEADER -->
        <div class="header">
            <div class="container-fluid">
                <!-- Body -->
                <div class="header-body">
                    <div class="row align-items-end">
                        <div class="col">
                            <!-- Pretitle -->
                            <h6 class="header-pretitle">
                                Subject
                            </h6>
                            <!-- Title -->
                            <h1 class="header-title">
                                Details
                            </h1>
                        </div>
                    </div>
                    <!-- / .row -->
                </div>
                <!-- / .header-body -->
            </div>
        </div>
        <!-- CARDS -->
        <div class="container-fluid">
            <div class="row">
                <?php
                $C = $row['StudentBranchCode']."_".$row['StudentSemester'];
                $subsql = "SELECT *, FacultyFirstName, FacultyLastname FROM subjectmaster INNER JOIN facultymaster ON subjectmaster.SubjectFacultyId=facultymaster.FacultyId WHERE SemCode = '$C'";
                $subresult = mysqli_query($conn, $subsql);
                if(mysqli_num_rows($subresult)>0){
                    while ($roww = mysqli_fetch_assoc($subresult)) { ?>
                        <div class="col-12 col-md-4">
                            <div class="card-group">
                                <div class="card">
                                    <img src="../src/uploads/subprofile/<?php echo $roww['SubjectPic']; ?>" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $roww['SubjectName']; ?></h5>
                                        <p class="card-text"><?php echo $roww['SubjectCode']; ?></p>
                                        <p class="card-text"><?php echo $roww['FacultyFirstName'] . " " . $roww['FacultyLastName']; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                else{ ?>
                    <div class="col-12">
                        <h1 class="card header-title m-5 p-5"> Oops, No Subject To Show</h1>
                    </div>
                <?php
                }
                ?>  
            </div>
        </div>
    </div>
    <?php include("context.php"); ?>
    <!-- / .main-content -->
    <!-- JAVASCRIPT -->
    <!-- Map JS -->
    <script src='https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.js'></script>
    <!-- Vendor JS -->
    <script src="../assets/js/vendor.bundle.js"></script>
    <!-- Theme JS -->
    <script src="../assets/js/theme.bundle.js"></script>
</body>

</html>