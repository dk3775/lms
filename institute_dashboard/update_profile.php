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
        <?php include_once "../head.php"; ?>
    </head>
    <body>
    <!-- NAVIGATION -->
    <?php
    $nav_role = "Updates";
    include_once '../nav.php'; ?>
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="header">
                <div class="header-body">
                    <div class="row align-items-end">
                        <div class="col">
                            <!-- Pretitle -->
                            <h5 class="header-pretitle mb-5">
                                <a class="btn btn-sm btn-outline-info" onclick="history.back()"><i
                                            class="fe uil-angle-double-left"></i>Back</a>
                            </h5>
                            <h6 class="header-pretitle">
                                Update
                            </h6>
                            <h1 class="header-title">
                                Profile
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mb-auto">
                <div class="col">
                    <?php
                    include_once "../config.php";
                    $ttid = $_GET['updateid'];
                    $_SESSION["userrole"] = "institute";
                    if (isset($ttid)) {
                    $sql = "SELECT * FROM updatemaster WHERE UpdateId = '$ttid'";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);

                    ?>
                    <!-- CONTENT -->

                    <div class="row">
                        <div class="col-12">
                            <!-- Files -->
                            <div class="card" data-list='{"valueNames": ["name"]}'>
                                <div class="card-body">
                                    <h3 class="header-title">
                                        Name Info:
                                    </h3>
                                    <br>
                                    <div class="input-group">
                                        <span class="input-group-text col-3 text-dark">Title</span>
                                        <input type="text" value="<?php echo $row['UpdateTitle']; ?>"
                                               aria-label="First name" class="form-control" disabled>
                                    </div>
                                    <br>
                                    <div class="input-group"><span
                                                class="input-group-text col-3 text-dark">Description</span>
                                        <textarea class="form-control disable" rows="3"
                                                  disabled><?php echo $row['UpdateDescription']; ?></textarea>
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <span class="input-group-text col-3 text-dark">Uploaded By</span>
                                        <input type="text" value="<?php echo $row['UpdateUploadedBy']; ?>"
                                               aria-label="First name" class="form-control" disabled>
                                        <span class="input-group-text col-3 text-dark">Update Type</span>
                                        <input type="text" value="<?php echo $row['UpdateType']; ?>"
                                               aria-label="Last name" class="form-control disable" disabled>
                                    </div>
                                    <div class="input-group">
                                        <div class="col col-md-10 text-center mt-4 ">
                                            <p class="text-center mb-3">
                                                <img src="../src/uploads/updates/<?php echo $row['UpdateFile'] . "?t"; ?>"
                                                     alt="..."
                                                     class="img-fluid rounded">
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Image -->

                        <div class="d-flex justify mb-4">
                            <!-- Button -->
                            <a href="../src/uploads/updates/<?php echo $row['UpdateFile']; ?>"
                               download="<?php echo $row['UpdateFile']; ?>" class="btn btn-success"
                               name="Download">
                                Download
                            </a>
                        </div>
                    </div>
                </div>
                <!-- / .row -->
            </div>
        </div>
        <!-- / .main-content -->
        <?php } ?>
        
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