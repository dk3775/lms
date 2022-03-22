<?php
session_start();
error_reporting(E_ALL ^ E_WARNING);
if ($_SESSION['role'] != "Texas") {
    header("Location: ../index.php");
} else {
    include_once("../config.php");
    $_SESSION["userrole"] = "Institute";
    $branchsel = "SELECT * FROM branchmaster";
    $branchresult = mysqli_query($conn, $branchsel);

    // $un = $_SESSION['id'];
    // $sql = "SELECT branchId,StudentSemester FROM studentmaster INNER JOIN branchmaster ON branchmaster.BranchCode = studentmaster.StudentBranchCode  WHERE StudentUserName = '$un'";
    // // echo $sql;
    // $result = mysqli_fetch_assoc(mysqli_query($conn, $sql));

    // $branchId = $result['branchId'];
    // $semester = $result['StudentSemester'];
    // // $ssql = "SELECT SubjectName,StudentId FROM studentmaster INNER JOIN subjectmaster ON studentmaster.StudentSemester = subjectmaster.SubjectSemester WHERE SubjectBranch = '$branchId'";
    // $ssql = "SELECT * FROM subjectmaster WHERE SubjectBranch = '$branchId' AND SubjectSemester = '$semester'";
    // // echo $ssql;
    // $sqry = mysqli_query($conn, $ssql);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $nav_role = "Study related querys";
    require_once('../head.php'); ?>
</head>

<body>
    <!-- NAVIGATION -->
    <?php include_once('../nav.php'); ?>
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10 col-xl-8">
                    <!-- Header -->
                    <div class="header mt-md-5">
                        <div class="header-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h5 class="header-pretitle">
                                        <a class="btn-link btn-outline" onclick="history.back()"><i class="fe uil-angle-double-left"></i>Back</a>
                                    </h5>
                                    <h6 class="header-pretitle">
                                        Add New
                                    </h6>
                                    <!-- Title -->
                                    <h1 class="header-title">
                                        Timetable
                                    </h1>
                                </div>
                            </div>
                            <!-- / .row -->
                        </div>
                    </div>
                    <!-- select -->
                    <form class="mb-4" method="POST">
                        <div class="row">
                            <div class="col-md-10">
                                <select class="form-control" id="validationCustom01" name="tbranch" required>
                                    <option value="ABC" hidden="">Select Branch</option>
                                    <?php
                                    while ($brrow = mysqli_fetch_assoc($branchresult)) { ?>
                                        <option value="<?php echo $brrow['BranchName']; ?>">
                                            <?php echo $brrow['BranchName']; ?>
                                        </option>
                                    <?php
                                    } ?>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <div class="col-auto">
                                    <!-- Button -->
                                    <button class="col-12 btn-lg btn btn-primary" type="submit" name="ser" value="2">
                                        Select
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php if (isset($_POST['ser']) and $_POST['tbranch'] != 'ABC') {
                        $xyz = $_POST['tbranch'];

                        $br = "SELECT * FROM branchmaster WHERE BranchName = '" . $xyz . "'";
                        $brresult = mysqli_query($conn, $br);
                        $brow = mysqli_fetch_assoc($brresult);
                    ?>
                        <hr>
                        <form method="POST" enctype="multipart/form-data" class="row g-3 needs-validation">
                            <div class="card">
                                <div class="card-body text-center">
                                    <div class="row justify-content-center">
                                        <div class="col-12 col-md-12 col-xl-5">
                                            <!-- Image -->
                                            <h2 class="mb-3">
                                                Time Table Image
                                            </h2>
                                            <img src="../assets/img/illustrations/happiness.svg?t" id="IMG-preview" alt="..." class="img-fluid mb-3 rounded" style="margin:auto; max-width: 80%;">
                                            <!-- Title -->
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-12 col-md-6 m-auto">
                                                <!-- Heading -->
                                                <!-- Text -->
                                                <small class="text-muted">
                                                    Only allowed PNG or JPG less than 2MB
                                                </small>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <input type="file" id="img" name="tpic" required class="btn btn-sm" onchange="showPreview(event);" accept="image/jpg, image/jpeg, image/png">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- / .row -->
                                </div>
                            </div>
                            <!-- Priview Profile pic  -->
                            <script>
                                function showPreview(event) {
                                    var file = document.getElementById('img');
                                    if (file.files.length > 0) {
                                        // RUN A LOOP TO CHECK EACH SELECTED FILE.
                                        for (var i = 0; i <= file.files.length - 1; i++) {
                                            var fsize = file.files.item(i).size; // THE SIZE OF THE FILE.	
                                        }
                                        if (fsize <= 2000000) {
                                            var src = URL.createObjectURL(event.target.files[0]);
                                            var preview = document.getElementById("IMG-preview");
                                            preview.src = src;
                                            preview.style.display = "block";
                                        } else {
                                            alert("Only allowed less then 2MB.. !");
                                            file.value = '';
                                        }
                                    }
                                }
                            </script>
                            <!-- / .row -->
                            <!-- Divider -->
                            <hr class="mb-5">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <!-- Middle name -->
                                    <div class="form-group">
                                        <!-- Label -->
                                        <label class="form-label">
                                            Time Table Branch
                                        </label>
                                        <!-- Input -->
                                        <select class="form-control" id="validationCustom01" name="tbranch" required>
                                            <!-- <option value="" hidden="">Select Branch</option> -->
                                            <option value="<?php echo $brow['BranchCode']; ?>">
                                                <?php echo $brow['BranchName']; ?>
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <!-- Last name -->
                                    <div class="form-group">
                                        <!-- Label -->
                                        <label class="form-label">
                                            Time Table Semester
                                        </label>
                                        <!-- Input -->
                                        <select id="validationCustom01" class="form-control" name="tsem" required>
                                            <option value="" hidden="">Select Semesters</option>
                                            <?php for ($count = 1; $count <= $brow['BranchSemesters']; $count++) { ?>
                                                <option value="<?php echo $count; ?>"><?php echo $count; ?></option>
                                            <?php } ?>
                                        </select>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="d-flex justify">
                                <!-- Button -->
                                <button class="btn btn-primary" type="submit" value="sub" name="subbed">
                                    Add Time Table
                                </button>
                            </div>
                            <!-- / .row -->
                        </form>
                    <?php }  ?>
                </div>
            </div>
            <!-- / .row -->
        </div>
    </div>
    <?php include("context.php"); ?>
    <!-- JAVASCRIPT -->
    <!-- Map JS -->
    <script src='https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.js'></script>
    <!-- Vendor JS -->
    <script src="../assets/js/vendor.bundle.js"></script>
    <!-- Theme JS -->
    <script src="../assets/js/theme.bundle.js"></script>
</body>

</html>
<?php
if (isset($_POST['subbed'])) {
    // $f_name = $_FILES['tpic']['name'];
    $f_tmp_name = $_FILES['tpic']['tmp_name'];
    $f_size = $_FILES['tpic']['size'];
    $f_error = $_FILES['tpic']['error'];
    // $f_type = $_FILES['tpic']['type'];
    // $f_ext = explode('.', $f_name);
    // $f_ext = strtolower(end($f_ext));

    $tbranch = $_POST['tbranch'];
    $tsem = $_POST['tsem'];
    $tupd = "Institute";
    $tupdtime = date("Y-m-d H:i:s");

    $tt_name = $tbranch . "_" . $tsem . ".png";
    try {
        $sql = "INSERT INTO timetablemaster(TimetableBranchCode, TimetableSemester, TimetableUploadedBy, TimetableUploadTime, TimetableImage) 
    VALUES ('$tbranch','$tsem','$tupd','$tupdtime','$tt_name')";
        // echo $sql;
        $run = mysqli_query($conn, $sql);
        if ($run == true) {
            if ($f_error === 0) {
                if ($f_size <= 2000000) {
                    move_uploaded_file($f_tmp_name, "../src/uploads/timetables/" . $tt_name); // Moving Uploaded File to Server ... to uploades folder by file name f_name ... 
                } else {
                    echo "<script>alert('File size is to big .. !');</script>";
                }
            } else {
                echo "<script>alert('Error in uploading file .. !');</script>";
            }
            echo "<script>alert('Time Table Added Successfully')</script>";
            echo "<script>window.open('timetable_list.php','_self')</script>";
        } else {
            echo "<script>alert('Time Table Not Added')</script>";
            echo "<script>window.open('add_timetable.php','_self')</script>";
        }
    } catch (Exception $e) {
        echo "<script>alert('Time Table Not Added')</script>";
        echo "<script>window.open('add_timetable.php','_self')</script>";
    }
}
?>