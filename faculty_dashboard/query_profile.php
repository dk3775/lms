<?php
error_reporting(E_ALL ^ E_WARNING);
session_start();
require_once("../config.php");
if ($_SESSION['role'] != "Lagos") {
    header("Location: ../default.php");
} else {
    $qid = $_GET['qid'];
    $qur = "SELECT * FROM querymaster INNER JOIN studentmaster ON querymaster.QueryFromId = studentmaster.StudentId WHERE QueryId = '$qid'";
    $res = mysqli_query($conn, $qur);
    $row = mysqli_fetch_assoc($res);

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php include_once("../head.php"); ?>
    </head>

    <body>
        <?php
        $nav_role = "Study related querys";
        include_once('nav.php'); ?>
        <div class="main-content">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-end">
                        <div class="col">
                            <h6 class="header-pretitle">
                                Query
                            </h6>
                            <h1 class="header-title">
                                Profile
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
            <br> <br>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- Files -->
                        <div class="card">
                            <div class="card-body">
                                <h2 class="header-title">
                                    Query Info :
                                </h2>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-text col-2 text-dark">Query Topic</span>
                                    <input type="text" value="<?php echo $row['QueryTopic']; ?>" aria-label="First name" class="form-control" disabled>
                                </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-text col-2 text-dark">Query Uploader</span>
                                    <input type="text" value="<?php echo $row['StudentFirstName'] . " " . $row['StudentLastName']; ?>" aria-label="First name" class="form-control" disabled>
                                    <span class="input-group-text col-2 text-dark">Query Subject</span>
                                    <input type="text" value="<?php echo $row['QuerySubject']; ?>" aria-label="Last name" class="form-control disable" disabled>
                                </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-text col-2 text-dark">Query Question</span>
                                    <textarea rows="2" aria-label="First name" class="form-control" disabled><?php echo $row['QueryQuestion']; ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include_once("context.php");
            ?>
            <script src='https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.js'></script>
            <script src="../assets/js/vendor.bundle.js"></script>
            <script src="../assets/js/theme.bundle.js"></script>
    </body>

    </html>
<?php } ?>