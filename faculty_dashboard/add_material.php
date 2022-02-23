<?php
session_start();
if ($_SESSION['role'] != "Lagos") {
    header("Location: ../default.php");
} else {
    include_once("../config.php");
    $_SESSION["userrole"] = "Faculty";
    $subcode = $_GET['subcode'];
    $subsql = "SELECT * FROM subjectmaster WHERE SubjectCode = '$subcode'";
    $subrow = mysqli_fetch_assoc(mysqli_query($conn, $subsql));
    $brid = $_GET['brid'];
    $brsql = "SELECT * FROM branchmaster WHERE BranchCode = '$brid'";
    $brrow = mysqli_fetch_assoc(mysqli_query($conn, $brsql));
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <?php include_once("../head.php"); ?>
    </head>
    <body>
    <?php $nav_role = "Branch"; ?>
        <!-- NAVIGATION -->
        <?php include_once("nav.php"); ?>
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
                                        <!-- Pretitle -->
                                        <h6 class="header-pretitle">
                                            Add New
                                        </h6>
                                        <!-- Title -->
                                        <h1 class="header-title">
                                            Study Material
                                        </h1>
                                    </div>
                                </div>
                                <!-- / .row -->
                            </div>
                        </div>
                        <!-- Form -->
                        <br>
                        <form method="POST" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>

                            <div class="row">
                                <div class="col-md-2">
                                    <label for="validationCustom01" class="form-label">Unit No.</label>
                                    <select class="form-control" aria-label="Default select example" name="uno" required>
                                        <option value="" hidden>Select</option>
                                        <?php
                                        for ($i = 1; $i <= 6; $i++) {
                                            echo "<option value='$i'>$i</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-10">
                                    <label for="validationCustom01" class="form-label">Unit Name</label>
                                    <input type="text" class="form-control" id="validationCustom01" name="uname" required><br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="validationCustom01" class="form-label">Subject Name</label>
                                    <input type="text" class="form-control" id="validationCustom01" value="<?php echo $subrow['SubjectName']; ?>" disabled><br>
                                </div>
                                <div class="col-md-6">
                                    <label for="validationCustom01" class="form-label">Branch Name</label>
                                    <input type="text" class="form-control" id="validationCustom01" value="<?php echo $brrow['BranchName']; ?>" disabled><br>
                                </div>
                            </div>
                            <hr class="my-3">
                            <div class="row justify-content-between align-items-center">
                                <div class="col">
                                    <div class="row align-items-center">
                                        <div class="col ml-n2">
                                            <!-- Heading -->
                                            <h4 class="mb-1">
                                                Study Material File (English)
                                            </h4>
                                            <!-- Text -->
                                            <small class="text-muted">
                                                Only allowed PDF less than 5MB
                                            </small>
                                        </div>
                                    </div>
                                    <!-- / .row -->
                                </div>
                                <div class="col-auto">
                                    <!-- Button -->
                                    <input type="file" name="engmaterial" class="btn btn-sm" accept="application/pdf">
                                </div>
                            </div>
                            <hr class="my-3">
                            <div class="row justify-content-between align-items-center">
                                <div class="col">
                                    <div class="row align-items-center">
                                        <div class="col ml-n2">
                                            <!-- Heading -->
                                            <h4 class="mb-1">
                                                Study Material File (Gujarati)
                                            </h4>
                                            <!-- Text -->
                                            <small class="text-muted">
                                                Only allowed PDF less than 5MB
                                            </small>
                                        </div>
                                    </div>
                                    <!-- / .row -->
                                </div>
                                <div class="col-auto">
                                    <!-- Button -->
                                    <input type="file" name="gujmaterial" class="btn btn-sm" accept="application/pdf">
                                </div>
                            </div>
                            <hr class="mt-4 mb-5">
                            <div class="d-flex justify">
                                <!-- Button -->
                                <button class="btn btn-primary" type="submit" value="sub" name="subbed">
                                    Add Material
                                </button>
                            </div>
                            <!-- / .row -->
                        </form>
                        <br>
                    </div>
                </div>
                <!-- / .row -->
            </div>
        </div>
        <?php include("context.php");
        ?>
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

        $fs_name_eng = $_FILES['engmaterial']['tmp_name'];
        $fs_size_eng = $_FILES['engmaterial']['size'];
        $fs_error_eng = $_FILES['engmaterial']['error'];

        $fs_name_guj = $_FILES['gujmaterial']['tmp_name'];
        $fs_size_guj = $_FILES['gujmaterial']['size'];
        $fs_error_guj = $_FILES['gujmaterial']['error'];

        $unitno = $_POST['uno'];
        $unitname = $_POST['uname'];
        $dt = date('Y-m-d');
        $materialcode = $subcode . "_" . $unitno;
        $engmaterial = $materialcode . "_" .  "ENG" . ".pdf";
        $gujmaterial = $materialcode . "_" .  "GUJ" . ".pdf";

        $sql = "INSERT INTO `studymaterialmaster`(`SubjectCode`, `SubjectUnitNo`, `MaterialCode`, `SubjectUnitName`, `EngMaterialFile`, `GujMaterialFile`, `MaterialUploadDate`) 
        VALUES ('$subcode','$unitno','$unitname','$materialcode','$engmaterial','$gujmaterial','$dt')";

        $run = mysqli_query($conn, $sql);
        if ($run == true) {
            // Eng Matrial
            if ($fs_error_eng === 0) {
                if ($fs_size_eng <= 5000000) {
                    move_uploaded_file($fs_name_eng, "../src/uploads/studymaterial/" . $engmaterial); // Moving Uploaded File to Server ... to uploades folder by file name f_name ... 
                } else {
                    echo "<script>alert('English Material size is to big .. !');</script>";
                }
            } else {
                echo "Something went wrong .. !";
            }
            // Guj Matrial
            if ($fs_error_guj === 0) {
                if ($fs_size_guj <= 5000000) {
                    move_uploaded_file($fs_name_guj, "../src/uploads/studymaterial/" . $gujmaterial); // Moving Uploaded File to Server ... to uploades folder by file name f_name ... 
                } else {
                    echo "<script>alert('Gujarati Material size is to big .. !');</script>";
                }
            } else {
                echo "Something went wrong .. !";
            }

            echo "<script>alert('Study Material Added Successfully');</script>";
            echo "<script>window.open('branch_profile.php','_self');</script>";
        } else {
            echo "<script>alert('Error Occured, Study Material Not Added');</script>";
            echo "<script>window.open('add_material.php','_self');</script>";
        }
    }
}
?>