<?php
session_start();
error_reporting(E_ALL ^ E_WARNING);
if ($_SESSION['role'] != "Texas") {
    header("Location: ../index.php");
} else {
    include_once("../config.php");
    $_SESSION["userrole"] = "Faculty";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("../head.php"); ?>
</head>

<body>
    <!-- NAVIGATION -->
    <?php
    $nav_role = "Branch";
    include_once("../nav.php"); ?>
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12 col-xl-10">
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
                                        Branch
                                    </h1>
                                </div>
                            </div>
                            <!-- / .row -->
                        </div>
                    </div>
                    <!-- Form -->
                    <br>
                    <div class="form-group">
                        <form method="POST" autocomplete="off" enctype="multipart/form-data" class="row g-3 needs-validation" autocomplete="off" novalidate>
                            <div class="row justify-content-between align-items-center">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <!-- First name -->
                                        <label for="validationCustom01" class="form-label">
                                            Branch Code
                                        </label>
                                        <input type="text" placeholder="123" pattern="[0-9]{0-3}" onkeypress="return event.charCode>=48 && event.charCode<=57" maxlength="3" minlength="3" id="validationCustom01" class="form-control" name="icode" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            Incorrect Format or Field is Empty!
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label for="validationCustom01" class="form-label">
                                            Branch Name
                                        </label>
                                        <input id="validationCustom01" type="text" onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))' maxlength="20" class="form-control" name="iname" placeholder="Computer Engineering" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            Incorrect Format or Field is Empty!
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <label for="validationCustom01" class="form-label">
                                            No of Semesters
                                        </label>
                                        <select id="validationCustom01" class="form-control" name="isem" required>
                                            <option value="" hidden="">Select Semesters</option>
                                            <?php for ($count = 1; $count < 9; $count++) { ?>
                                                <option value="<?php echo $count; ?>"><?php echo $count; ?></option>
                                            <?php } ?>
                                        </select>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            Incorrect Format or Field is Empty!
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- / Personal details-->
                            <div class="d-flex justify">
                                <!-- Button -->
                                <button class="btn btn-primary" type="submit" value="sub" name="subbed">
                                    Add Branch
                                </button>
                            </div>
                    </div>
                    <!-- / .row -->
                    </form>
                </div>
                <br>
            </div>
        </div>
        <!-- / .row -->
    </div>
    </div>
    <?php include_once("context.php"); ?>
    <!-- Map JS -->
    <script src='https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.js'></script>
    <!-- Vendor JS -->
    <script src="../assets/js/vendor.bundle.js"></script>
    <!-- Theme JS -->
    <script src="../assets/js/theme.bundle.js"></script>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>
</body>

</html>

<?php
if (isset($_POST['subbed'])) {

    extract($_POST);

    $sql = "INSERT INTO branchmaster (BranchName,BranchCode,BranchSemesters) VALUES ('$iname', '$icode','$isem' );";
    try {
        $run = mysqli_query($conn, $sql);
        if ($run) {
            echo "<script>alert('Branch Added Successfully');</script>";
            echo "<script>window.open('branch_list.php','_self');</script>";
        } else {
            echo "<script>alert('Branch Not Added');</script>";
            echo "<script>window.open('add_branch.php','_self');</script>";
        }
    } catch (Exception $e) {
        echo "<script>alert('Branch Not Added');</script>";
        echo "<script>window.open('add_branch.php','_self');</script>";
    }
}
?>