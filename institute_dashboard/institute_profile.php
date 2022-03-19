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
    <?php include_once('../nav.php'); ?>
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="header">
            <!-- HEADER -->
            <div class="header">
                <div class="container-fluid">
                    <!-- Body -->
                    <div class="header-body">
                        <div class="row align-items-end">
                            <div class="col">
                                <h5 class="header-pretitle mb-5">
                                    <a class="btn btn-sm btn-outline-info" onclick="history.back()"><i
                                                class="fe uil-angle-double-left"></i>Back</a>
                                </h5>
                                <!-- Pretitle -->
                                <h6 class="header-pretitle">
                                    Institute
                                </h6>
                                <!-- Title -->
                                <h1 class="header-title">
                                    Profile
                                </h1>
                            </div>
                        </div>
                        <!-- / .row -->
                    </div>
                    <!-- / .header-body -->
                </div>
            </div>
            <!-- / .header -->
            <?php
            include_once("../config.php");
            $insid = $_GET['insid'];
            $_SESSION["userrole"] = "institute";
            if (isset($insid)) {
            $sql = "SELECT * FROM institutemaster WHERE InstituteId = '$insid'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);

            ?>
            <br><br>
            <div class="container-fluid">
                <!-- Body -->
                <div class="header-body mt-n5 mt-md-n6">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <!-- Avatar -->
                            <div class="../avatar avatar-xxl header-avatar-top">
                                <img src="../src/uploads/inprofile/<?php echo $row['InstituteProfilePic'] . "?t"; ?>"
                                     alt="..." class="avatar-img rounded-circle border border-4 border-body">
                            </div>
                        </div>
                        <div class="col mb-3 ml-n3 ml-md-n2">
                            <h1 class="header-title">
                                <?php echo $row['InstituteName']; ?>
                            </h1>
                            <h5 class="header-pretitle mt-2">
                                <?php echo $row['InstituteRole']; ?>
                            </h5>
                        </div>
                        <div class="col-12 col-md-auto mt-2 mt-md-0 mb-md-3">
                            <!-- Button -->
                            <a href="edit_institute.php?insid=<?php echo $row['InstituteId']; ?>"
                               class="btn btn-warning d-block d-md-inline-block btn-md">
                                Edit Details
                            </a>
                        </div>
                    </div>
                    <!-- / .row -->
                    <div class="row align-items-center">
                        <div class="col">
                            <!-- Nav -->
                            <ul class="nav nav-tabs nav-overflow header-tabs">
                                <li class="nav-item">
                                    <a href="profile_files.php" class="nav-link h3 active">
                                        Basic Details
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- / .header-body -->
            </div>
        </div>
        <!-- CONTENT -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Files -->
                    <div class="card" data-list='{"valueNames": ["name"]}'>
                        <div class="card-body">
                            <h1 class="header-title">
                                User Info:
                            </h1>
                            <br>
                            <div class="input-group">
                                <span class="input-group-text col-2 ">User Name</span>
                                <input type="text" value="<?php echo $row['InstituteName']; ?>" aria-label="First name"
                                       class="form-control" disabled>
                            </div>
                            <br>
                            <div class="input-group">
                                <span class="input-group-text col-2 ">User Role</span>
                                <input type="text" value="<?php echo $row['InstituteRole']; ?>" aria-label="First name"
                                       class="form-control" disabled>
                                <span class="input-group-text col-2 ">Institute Office</span>
                                <input type="text" value="<?php echo $row['InstituteOffice']; ?>" aria-label="Last name"
                                       class="form-control disable" disabled>
                            </div>

                            <br>
                            <div class="input-group">
                                <span class="input-group-text col-2 ">E-mail</span>
                                <input type="text" value="<?php echo $row['InstituteEmail']; ?>" aria-label="Last name"
                                       class="form-control disable" disabled>
                                <span class="input-group-text col-2 ">Contact No.</span>
                                <input type="text" value="<?php echo $row['InstituteContactNo']; ?>"
                                       aria-label="First name" class="form-control" disabled>
                            </div>

                            <br>
                            <div class="input-group  input-group-lg mb-3">
                                <span class="input-group-text col-2 ">Address</span>
                                <input type="text" value="<?php echo $row['InstituteAddress']; ?>"
                                       aria-label="Last name" class="form-control disable" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        } else { ?>
            <div class="container-fluid">
                <form class="mb-4" method="post">
                    <div class="col">
                        <div class="row">

                            <div class="col-md-4">
                                <div class="input-group input-group-merge input-group-reverse">
                                    <input class="form-control list-search" type="text" name="enr"
                                           placeholder="Enter Name">
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
                    </div>
                </form>
            </div>
            <?php
            if (isset($_POST['ser'])) {
                $er = $_POST['enr'];
                $qur = "SELECT * FROM institutemaster WHERE InstituteName = '$er'";
                $res = mysqli_query($conn, $qur);
                $row = mysqli_fetch_assoc($res);

                if (isset($row)) { ?>
                    <div class="container-fluid">
                        <hr class="navbar-divider my-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <a href="profile-posts.html" class="avatar avatar-lg">
                                            <img src="../src/uploads/inprofile/<?php echo $row['InstituteProfilePic'] . "?t"; ?>"
                                                 alt="..." class="avatar-img rounded-circle">
                                        </a>
                                    </div>
                                    <div class="col ml-n2">
                                        <!-- Title -->
                                        <h4 class="mb-1">
                                            <a href="profile-posts.html"><?php echo $row['InstituteName']; ?></a>
                                        </h4>
                                        <!-- Text -->
                                        <p class="small mb-1">
                                            <?php echo $row['InstituteEmail']; ?>
                                        </p>
                                        <!-- Status -->
                                        <p class="small mb-1">
                                            <?php echo $row['InstituteRole']; ?>
                                        </p>
                                    </div>
                                    <div class="col-auto">
                                        <!-- Button -->
                                        <a href="institute_profile.php?insid=<?php echo $row['InstituteId']; ?>"
                                           class="btn btn-m btn-primary d-none d-md-inline-block">
                                            View
                                        </a>
                                    </div>
                                </div>
                                <!-- / .row -->
                            </div>
                            <!-- / .card-body -->
                        </div>
                    </div>
                    <?php
                }
            }
        }
        ?>
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
<?php } ?>
