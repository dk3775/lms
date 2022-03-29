<?php
error_reporting(E_ALL ^ E_WARNING);
session_start();
require_once("../mail.php");
require_once("../config.php");
if ($_SESSION['role'] != "Lagos") {
    header("Location: ../index.php");
} else {
    $qid = $_GET['qid'];
    $qid = mysqli_real_escape_string($conn, $qid);
    $query = "SELECT * FROM studentmaster INNER JOIN studyquerymaster INNER JOIN facultymaster INNER JOIN subjectmaster ON studyquerymaster.QueryToId = facultymaster.FacultyId AND studyquerymaster.QueryFromId = studentmaster.StudentId AND subjectmaster.SubjectCode = studyquerymaster.QuerySubject WHERE QueryId = '$qid'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

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
                            <h5 class="header-pretitle">
                                <a class="btn-link btn-outline" onclick="history.back()"><i class="fe uil-angle-double-left"></i>Back</a>
                            </h5>
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
                                    <span class="input-group-text col-2 ">Query Topic</span>
                                    <input type="text" value="<?php echo $row['QueryTopic']; ?>" aria-label="First name" class="form-control" disabled>
                                </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-text col-2 ">Query Uploader</span>
                                    <input type="text" value="<?php echo $row['StudentFirstName'] . " " . $row['StudentLastName']; ?>" aria-label="First name" class="form-control" disabled>
                                    <span class="input-group-text col-2 ">Query Subject</span>
                                    <input type="text" value="<?php echo $row['SubjectName']; ?>" aria-label="Last name" class="form-control disable" disabled>
                                </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-text col-2 ">Query Question</span>
                                    <textarea rows="2" aria-label="First name" class="form-control" disabled><?php echo $row['QueryQuestion']; ?></textarea>
                                </div>
                                <?php if ($row['QueryReply'] != "") { ?>
                                    <br>
                                    <div class="input-group">
                                        <span class="input-group-text col-2 ">Query Reply</span>
                                        <textarea rows="2" aria-label="First name" class="form-control" disabled><?php echo $row['QueryReply']; ?></textarea>
                                    </div>
                                <?php } else { ?>
                                    <div class="d-flex justify mt-5">
                                        <a class="btn btn-primary" id="btnreply">
                                            Reply
                                        </a>
                                    </div>
                                    <form id="replyform" class="d-none" method="POST">
                                        <hr class="md-5">
                                        <h2 class="header-title my-5">
                                            Query Reply :
                                        </h2>
                                        <div class="input-group">
                                            <span class="input-group-text col-2 ">Query Reply</span>
                                            <textarea rows="2" name="queryreply" aria-label="First name" class="form-control" required></textarea>
                                        </div>
                                        <div class="d-flex justify mt-5">
                                            <input type="submit" class="btn btn-primary" value="Submit Reply" name="subreply">
                                        </div>
                                    </form>
                                <?php } ?>
                                <?php if ($row['QueryDocument'] != "") { ?>
                                    <br>
                                    <a download="<?php echo $row['QueryDocument']; ?>" href="../src/uploads/querydocument/<?php echo $row['QueryDocument']; ?>" type="button" class="btn btn-sm btn-success">Download Attachment</a>&nbsp;
                                <?php } ?>
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
            <script>
                const btnreply = document.getElementById('btnreply');
                const replyform = document.getElementById('replyform');

                btnreply.onclick = () => {
                    btnreply.classList.add('d-none');
                    replyform.classList.remove('d-none');
                }
            </script>
    </body>

    </html>
<?php }
if (isset($_POST['subreply'])) {
    $reply = $_POST['queryreply'];
    $qrstatus = 2;
    $dt = date('Y-m-d');
    $qur = "UPDATE `studyquerymaster` SET `QueryReply`='$reply',`Querystatus`='$qrstatus',`QueryRepDate`='$dt'WHERE QueryId = '$qid'";
    $res = mysqli_query($conn, $qur);
    if ($res) {
        domail($row['StudentEmail'], $row['StudentFirstName'] . " " . $row['StudentLastName'], "You have a reply from " . $row['FacultyFirstName'] . " " . $row['FacultyLastName'] . " for your query -> " . $row['QueryTopic'], "<h5>Reply -></h5><br>" . $reply);
        echo "<script>alert('Reply Successfully Sent .. !');</script>";
        echo "<script>window.location.href='query_profile.php?qid=$qid';</script>";
    } else {
        echo "<script>alert('Reply not Sent .. !');</script>";
        echo "<script>window.location.href='query_profile.php?qid=$qid';</script>";
    }
}
?>