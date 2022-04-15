<?php
session_start();
// error_reporting(E_ALL ^ E_WARNING);
if ($_SESSION['role'] != "Abuja") {
    header("Location: ../index.php");
} else {
    include_once("../config.php");
    require_once "../mail.php";
    $_SESSION["userrole"] = "Student";

    $un = $_SESSION['id'];
    $sql = "SELECT branchId,StudentSemester FROM studentmaster INNER JOIN branchmaster ON branchmaster.BranchCode = studentmaster.StudentBranchCode  WHERE StudentUserName = '$un'";
    // echo $sql;
    $result = mysqli_fetch_assoc(mysqli_query($conn, $sql));

    $branchId = $result['branchId'];
    $semester = $result['StudentSemester'];
    // $ssql = "SELECT SubjectName,StudentId FROM studentmaster INNER JOIN subjectmaster ON studentmaster.StudentSemester = subjectmaster.SubjectSemester WHERE SubjectBranch = '$branchId'";
    $ssql = "SELECT * FROM subjectmaster WHERE SubjectBranch = '$branchId' AND SubjectSemester = '$semester'";
    // echo $ssql;
    $sqry = mysqli_query($conn, $ssql);
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
    <?php include_once('nav.php'); ?>
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
                                        New Request
                                    </h6>
                                    <!-- Title -->
                                    <h1 class="header-title">
                                        Study Query
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
                                <select class="form-control form-select-lg mb-3" name="sec" aria-label=".form-select-lg example">
                                    <option value="ABC" selected hidden>Select Subject</option>
                                    <?php
                                    while ($sresult = mysqli_fetch_assoc($sqry)) { ?>
                                        <option value="<?php echo $sresult['SubjectCode']; ?>"><?php echo $sresult['SubjectName']; ?></option>
                                    <?php } ?>
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
                    <?php if (isset($_POST['ser']) and $_POST['sec'] != 'ABC') {
                        $subsql = "SELECT * FROM subjectmaster WHERE SubjectCode = '$_POST[sec]'";
                        $subqry = mysqli_fetch_assoc(mysqli_query($conn, $subsql));
                        $subname = $subqry['SubjectName'];
                    ?>
                        <form class="mb-4" method="POST" enctype="multipart/form-data">
                            <!-- Divider -->
                            <hr class="mt-5 mb-5">
                            <h1 class="header-title">
                                <?php echo $subname; ?>
                            </h1>
                            <br>
                            <!-- Project name -->
                            <div class="form-group">
                                <!-- Label  -->
                                <label class="form-label">
                                    Topic
                                </label>
                                <!-- Input -->
                                <input type="text" name="srtopic" class="form-control">
                            </div>
                            <div class="form-group">
                                <!-- Label  -->
                                <label class="form-label">
                                    Subject
                                </label>
                                <!-- Input -->
                                <input type="text" class="form-control" Value="<?php echo $subname; ?>" readonly>
                                <input type="hidden" name="srsub" class="form-control" Value="<?php echo $_POST['sec']; ?>" readonly>
                            </div>
                            <!-- Project description -->
                            <div class="form-group">
                                <!-- Label -->
                                <label class="form-label mb-1">
                                    Detail
                                </label>
                                <!-- Textarea -->
                                <div>
                                    <div class="form-group shadow-textarea">
                                        <textarea class="form-control z-depth-1" id="exampleFormControlTextarea6" rows="4" name="srdetail" placeholder="Write Something Here..."></textarea>
                                    </div>
                                </div>
                            </div>
                            <!-- Divider -->
                            <hr class="mt-5">
                            <div class="row justify-content-between align-items-center">
                                <div class="col">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <!-- Personal details -->
                                            <!-- Avatar -->
                                            <div class="avatar">
                                                <img name="StuIMG" class="avatar-img rounded-circle" src="../assets/img/avatars/products/product-1.jpg" alt="..." id="IMG-preview">
                                            </div>
                                        </div>
                                        <div class="col ml-n2">
                                            <!-- Heading -->
                                            <h4 class="mb-1">
                                                Query Document
                                            </h4>
                                            <!-- Text -->
                                            <small class="text-muted">
                                                Only allowed PNG, JPG or PDF less than 2MB
                                            </small>
                                        </div>
                                    </div>
                                    <!-- / .row -->
                                </div>
                                <div class="col-auto">
                                    <!-- Button -->
                                    <input type="file" id="img" name="srdoc" class="btn btn-sm" onchange="showPreview(event);" accept="application/pdf,image/png,image/jpg,image/jpeg">
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
                            <!-- Divider -->
                            <hr class="mb-5">
                            <!-- Buttons -->
                            <input class="btn btn-block btn-primary mb-5" type="submit" name="sub">
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
if (isset($_POST['sub'])) {

    $f_name = $_FILES['srdoc']['name'];
    $f_tmp_name = $_FILES['srdoc']['tmp_name'];
    $f_size = $_FILES['srdoc']['size'];
    $f_error = $_FILES['srdoc']['error'];

    $stuqry = "SELECT * FROM studentmaster WHERE StudentUserName = '$un'";
    $sturesult = mysqli_fetch_assoc(mysqli_query($conn, $stuqry));
    $qrfrom = $sturesult['StudentId'];

    $srsub = $_POST['srsub'];
    $facqry = "SELECT * FROM `subjectmaster` INNER JOIN facultymaster ON subjectmaster.SubjectFacultyID = facultymaster.FacultyID WHERE SubjectCode = '$srsub'";
    $facresult = mysqli_fetch_assoc(mysqli_query($conn, $facqry));
    $qrto = $facresult['SubjectFacultyId'];

    $srtopic = $_POST['srtopic'];
    $srdetail = $_POST['srdetail'];
    $qrstatus = 1;
    $dt = date('Y-m-d');

    if ($f_name != '') {
        $f_ext = explode(".", strtolower($f_name));
        $f_extension = end($f_ext);
        $qrdoc = $qrfrom . "_" . time() . "." . $f_extension;
    }
    $f_path = "../src/uploads/querydocument/" . $qrdoc;

    $sql = "INSERT INTO `studyquerymaster`(`QueryFromId`, `QueryToId`, `QueryTopic`, `QueryQuestion`, `Querystatus`, `QuerySubject`, `QueryDocument`, `QueryGenDate`) 
		VALUES ('$qrfrom','$qrto','$srtopic','$srdetail','$qrstatus','$srsub','$qrdoc','$dt')";
    // echo $sql;
    $run = mysqli_query($conn, $sql);
    $flag = false;
    if ($run == true) {
        echo "<script>alert('Request Sent .. ')</script>";

        if ($f_error === 0) {
            if ($f_size <= 2000000) {
                if (move_uploaded_file($f_tmp_name, $f_path)) { // Moving Uploaded File to Server ... to uploades folder by file name f_name ...
                    $flag = true;
                } else {
                    echo "<script>alert('Error in uploading file .. !');</script>";
                }
            } else {
                echo "<script>alert('File size is to big .. !');</script>";
            }
            if ($flag == true) {
                domail($facresult['FacultyEmail'], $facresult['FacultyFirstName'] . " " . $facresult['FacultyLastName'], "New query from " . $sturesult['StudentFirstName'] . " " . $sturesult['StudentLastName'] . ", For topic -> " . $srtopic, $srdetail, $f_path);
            }
        }
        if ($flag == false) {
            domail($facresult['FacultyEmail'], $facresult['FacultyFirstName'] . " " . $facresult['FacultyLastName'], "New query from " . $sturesult['StudentFirstName'] . " " . $sturesult['StudentLastName'] . ", For topic -> " . $srtopic, $srdetail, '');
        }
        echo "<script>window.open('query_list.php','_self')</script>";
    } else {
        echo "<script>alert('Error to Send Request .. ')</script>";
        echo "<script>window.open('study_related.php','_self')</script>";
    }
}
?>