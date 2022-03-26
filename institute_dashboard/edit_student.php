<?php
error_reporting(E_ALL ^ E_WARNING);
session_start();
if ($_SESSION['role'] != "Texas") {
    header("Location: ../index.php");
} else {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php include_once("../head.php"); ?>
    </head>

    <body>
        <!-- NAVIGATION -->
        <?php
        $nav_role = "Student";
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
                                            Edit
                                        </h6>
                                        <!-- Title -->
                                        <h1 class="header-title">
                                            Student Details
                                        </h1>
                                    </div>
                                </div>
                                <!-- / .row -->
                            </div>
                        </div>
                        <!-- Form -->
                        <?php
                        include_once("../config.php");
                        $studentenr = $_GET['studentenr'];
                        $_SESSION["userrole"] = "Faculty";
                        if (isset($studentenr)) {
                            $sql = "SELECT * FROM studentmaster WHERE StudentEnrollmentNo = '$studentenr'";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($result);

                        ?>
                            <form method="POST" autocomplete="off" enctype="multipart/form-data">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <!-- Personal details -->
                                                <!-- Avatar -->
                                                <div class="avatar">
                                                    <img id="IMG-preview" class="avatar-img rounded-circle" src="../src/uploads/stuprofile/<?php echo $row['StudentProfilePic'] . "?t"; ?>" alt="...">
                                                </div>
                                            </div>
                                            <div class="col ml-n2">
                                                <!-- Heading -->
                                                <h4 class="mb-1">
                                                    Student Photo
                                                </h4>
                                                <!-- Text -->
                                                <small class="text-muted">
                                                    Only allowed PNG or JPG less than 2MB
                                                </small>
                                            </div>
                                        </div>
                                        <!-- / .row -->
                                    </div>
                                    <div class="col-auto">
                                        <!-- Button -->
                                        <input type="file" id="img" name="stuprofile" class="btn btn-sm" onchange="showPreview(event);" accept="image/jpg, image/jpeg, image/png">
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
                                <hr class="my-5">
                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <!-- First name -->
                                        <div class="form-group">
                                            <!-- Label -->
                                            <label class="form-label">
                                                First name
                                            </label>
                                            <!-- Input -->
                                            <input type="text" class="form-control" name="fname" value="<?php echo $row['StudentFirstName']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <!-- Middle name -->
                                        <div class="form-group">
                                            <!-- Label -->
                                            <label class="form-label">
                                                Middle name
                                            </label>
                                            <!-- Input -->
                                            <input type="text" class="form-control" name="mname" value="<?php echo $row['StudentMiddleName']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <!-- Last name -->
                                        <div class="form-group">
                                            <!-- Label -->
                                            <label class="form-label">
                                                Last name
                                            </label>
                                            <!-- Input -->
                                            <input type="text" class="form-control" name="lname" value="<?php echo $row['StudentLastName']; ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <!-- / .row -->
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <!-- Email address -->
                                        <div class="form-group">
                                            <!-- Label -->
                                            <label class="form-label">
                                                Student Email address
                                            </label>
                                            <!-- Input -->
                                            <input type="email" class="form-control" name="semail" value="<?php echo $row['StudentEmail']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label class="form-label">
                                            Student Contact Number
                                        </label>
                                        <input type="tel" pattern="[0-9]{10}" class="form-control" maxlength="10" name="scontact" value="<?php echo $row['StudentContactNo']; ?>" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <!-- Email address -->
                                        <div class="form-group">
                                            <!-- Label -->
                                            <label class="form-label">
                                                Student Address
                                            </label>
                                            <!-- Input -->
                                            <input type="text" class="form-control" name="add" value="<?php echo $row['StudentAddress']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <!-- Email address -->
                                        <div class="form-group">
                                            <!-- Label -->
                                            <label class="form-label">
                                                Date of Birth
                                            </label>
                                            <!-- Input -->
                                            <input type="date" class="form-control" name="dob" required data-flatpickr value="<?php echo $row['StudentDOB']; ?>" placeholder="YYYY-MM-DD">
                                        </div>
                                    </div>
                                </div>
                                <!-- / Personal details-->
                                <hr class="my-5">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">
                                                Parent's Contact Number
                                            </label>
                                            <input type="tel" class="form-control" pattern="[0-9]{10}" maxlength="10" name="pcontact" value="<?php echo $row['ParentContactNo']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label class="form-label">
                                            Parent's Email
                                        </label>
                                        <input type="email" class="form-control" name="pmail" value="<?php echo $row['ParentEmail']; ?>" required>
                                    </div>
                                </div>
                                <hr class="my-5">
                                <!-- / .row -->
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">
                                                Student Enrollment No
                                            </label>
                                            <input type="tel" pattern="[0-9]{12}" id="myInput" onchange="cp()" on oninput="cp()" class="form-control" name="senr" value="<?php echo $row['StudentEnrollmentNo']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">
                                                Student Roll No
                                            </label>
                                            <input type="text" maxlength="3" class="form-control" name="sroll" value="<?php echo $row['StudentRollNo']; ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $branchsel = "SELECT * FROM branchmaster";
                                $branchresult = mysqli_query($conn, $branchsel);
                                ?>
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">
                                                Student Branch
                                            </label>
                                            <select id="validationCustom01" class="form-control" name="sbranch" required>
                                                <option value="" hidden="">Select Branch</option>
                                                <?php
                                                while ($brrow = mysqli_fetch_assoc($branchresult)) { ?>
                                                    <option <?php if ($brrow['BranchCode'] == $row['StudentBranchCode']) { ?> selected <?php } ?> value="<?php echo $brrow['BranchCode']; ?>">
                                                        <?php echo $brrow['BranchName']; ?>
                                                    </option>
                                                <?php
                                                } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">
                                                Student Semester
                                            </label>
                                            <select class="form-control" name="ssem" required>
                                                <option hidden value="<?php echo $row['StudentSemester']; ?>"><?php echo $row['StudentSemester']; ?></option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <hr class="mt-4 mb-5">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <p class="form-label">
                                                Student Login ID
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-auto col-6">
                                        <div class="input-group input-group-sm mb-3 ">
                                            <textarea id="demo" class="form-control fs-2" name="slogin" readonly maxlength="4">ST<?php echo $row['StudentEnrollmentNo']; ?></textarea>
                                            <button class="btn btn-primary" onclick="cp1()"><i class="fe fe-copy"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            Student Password
                                        </div>
                                    </div>
                                    <div class="col-auto col-6">
                                        <div class="input-group input-group-sm mb-3">
                                            <textarea id="myInput2" type="text" class="form-control" name="spassword" id="myInput2"><?php echo $row['StudentPassword']; ?></textarea>
                                            <button class="btn btn-primary" onclick="cp2()"><i class="fe fe-copy"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify">
                                    <!-- Button -->
                                    <button class="btn btn-primary" type="submit" value="sub" name="subbed">
                                        Save Changes
                                    </button>
                                </div>
                                <!-- / .row -->
                            </form>
                        <?php
                        } else { ?>
                            <form class="mb-4" method="post">
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="input-group input-group-merge input-group-reverse">
                                            <input class="form-control list-search" type="text" name="enr" placeholder="Enter Student Enrollment Number">
                                            <div class="input-group-text">
                                                <span class="fe fe-search"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="col-auto">
                                            <!-- Button -->
                                            <button class="btn btn-primary" type="submit" name="ser" value="2">
                                                Search
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <?php
                            if (isset($_POST['ser'])) {
                                $er = $_POST['enr'];
                                $qur = "SELECT * FROM studentmaster WHERE StudentEnrollmentNo = '$er';";
                                $res = mysqli_query($conn, $qur);
                                $row = mysqli_fetch_assoc($res);
                                if (isset($row)) { ?>
                                    <hr class="navbar-divider my-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <a href="profile-posts.html" class="avatar avatar-lg">
                                                        <img src="../src/uploads/stuprofile/<?php echo $row['StudentProfilePic'] . "?t"; ?>" alt="..." class="avatar-img rounded-circle">
                                                    </a>
                                                </div>
                                                <div class="col ml-n2">
                                                    <!-- Title -->
                                                    <h4 class="mb-1">
                                                        <a href="profile-posts.html"><?php echo $row['StudentFirstName'] . " " . $row['StudentLastName']; ?></a>
                                                    </h4>
                                                    <!-- Text -->
                                                    <p class="small mb-1">
                                                        <?php echo $row['StudentEnrollmentNo']; ?>
                                                    </p>
                                                    <!-- Status -->
                                                    <p class="small mb-1">
                                                        <?php echo $row['StudentRollNo']; ?>
                                                    </p>
                                                </div>
                                                <div class="col-auto">
                                                    <!-- Button -->
                                                    <a href="edit_student.php?studentenr=<?php echo $row['StudentEnrollmentNo']; ?>" class="btn btn-m btn-primary d-none d-md-inline-block">
                                                        Edit
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- / .row -->
                                        </div>
                                        <!-- / .card-body -->
                                    </div>
                    <?php
                                }
                            }
                        }
                    }
                    ?>
                    <br>
                    </div>
                </div>
                <!-- / .row -->
            </div>
        </div>
        <script>
            function cp() {
                var xx = document.getElementById("myInput").value;
                document.getElementById("demo").innerHTML = "ST" + xx;

                let nnum = document.getElementById("myInput").value;
                let ss = nnum.toString();
                let sstr = ss.toString().split('').reverse().join('');
                let rrev = sstr.substr(0, 4);

                document.getElementById("myInput2").innerHTML = rrev;

            }
        </script>

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
    <?php
    if (isset($_POST['subbed'])) {

        $f_tmp_name = $_FILES['stuprofile']['tmp_name'];
        $f_size = $_FILES['stuprofile']['size'];
        $f_error = $_FILES['stuprofile']['error'];
        $ec = $_POST['slogin'];
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $lname = $_POST['lname'];
        $scontact = $_POST['scontact'];
        $semail = $_POST['semail'];
        $dob = $_POST['dob'];

        $pcontact = $_POST['pcontact'];
        $pmail = $_POST['pmail'];
        $ssem = $_POST['ssem'];
        $senr = $_POST['senr'];
        $sroll = $_POST['sroll'];
        $sbranch = $_POST['sbranch'];
        $spassword = $_POST['spassword'];
        $slid = $_POST['slid'];
        $add = $_POST['add'];
        $dob = $_POST['dob'];
        $stid = $row['StudentId'];
        $fs_name = $senr . ".png";
        $sqli = "UPDATE studentmaster SET StudentUserName='$ec',StudentEnrollmentNo='$senr',StudentPassword='$spassword',StudentFirstName='$fname',StudentMiddleName='$mname',StudentLastName='$lname',StudentProfilePic='$fs_name',StudentBranchCode='$sbranch',StudentSemester='$ssem',StudentEmail='$semail',StudentContactNo='$scontact',StudentAddress='$add',ParentEmail='$pmail',ParentContactNo='$pcontact',StudentRollNo='$sroll',StudentDOB='$dob' WHERE StudentId = '$stid';";
        $runed = mysqli_query($conn, $sqli);
        if ($runed == true) {
            echo "<script>alert('Student Details Edited Successfully')</script>";
            if ($f_error === 0) {
                if ($f_size <= 1000000) {
                    move_uploaded_file($f_tmp_name, "../src/uploads/stuprofile/" . $fs_name); // Moving Uploaded File to Server ... to uploades folder by file name f_name ...
                } else {
                    echo "<script>alert(File size is to big .. !);</script>";
                }
            } else {
                echo "Something went wrong .. !";
            }
            echo "<script>window.open('student_list.php','_self')</script>";
        } else {
            echo "<script>alert('Error Occured')</script>";
            echo "<script>window.open('edit_student.php','_self')</script>";
        }
    }
    ?>