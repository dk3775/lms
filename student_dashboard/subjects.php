<?php
session_start();
if ($_SESSION['role'] != "Abuja") {
    header("Location: ../default.php");
} else {
    include_once("../config.php");
    $_SESSION["userrole"] = "Student";
    $qur = "SELECT * FROM `studentmaster` WHERE ``='Abuja'";
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
                        <div class="col-auto">
                            <!-- Button -->
                            <a href="../logout.php" class="btn btn-primary lift">
                                logout
                            </a>
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
                $C = $_GET['semid'];
                $subsql = "Select *, FacultyFirstName, FacultyLastname from subjectmaster INNER JOIN facultymaster on subjectmaster.SubjectFacultyId=facultymaster.FacultyId where SemCode = '$C'";
                $subresult = mysqli_query($conn, $subsql);
                $sac = 1;
                while ($roww = mysqli_fetch_assoc($subresult)) { ?>
                    <div class="col-12 col-md-4 mb-md-5">
                        <div class="card-group">
                            <div class="card">
                                <img src="../src/uploads/subprofile/<?php echo $roww['SubjectPic']; ?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $roww['SubjectName']; ?></h5>
                                    <p class="card-text"><?php echo $roww['SubjectCode']; ?></p>
                                    <p class="card-text"><?php echo $roww['FacultyFirstName'] . " " . $roww['FacultyLastName']; ?></p>
                                    <a href="edit_subject.php?semid=<?php echo $semid; ?>&brid=<?php echo $xbrid; ?>&subid=<?php echo $roww['SubjectCode']; ?>" class="">Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                    $sac++;
                }
                ?>
            </div>
        </div>
    </div>
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