<?php
error_reporting(E_ALL ^ E_WARNING);
session_start();
if ($_SESSION['role'] != "Abuja") {
	header("Location: ../index.php");
} else { ?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<?php include_once "../head.php"; ?>
		<script>
			function action() {
				<?php
				if (!isset($_GET['action'])) { ?>
					document.getElementById('btnsub').style.display = 'none';
				<?php
				}
				?>
			}
		</script>
	</head>

	<body onload="action();">
		<!-- NAVIGATION -->
		<?php 
		$nav_role ="Assignments";
		include_once 'nav.php'; ?>
		<!-- MAIN CONTENT -->
		<div class="main-content">
			<div class="container-fluid">
				<div class="row justify-content-center">
					<div class="col-12	">
						<br>
						<!-- Card -->
						<div class="card">
							<div class="card-body">
								<!-- Header -->
								<div class="mb-3">
									<div class="row align-items-center">
										<div class="col ml-n2">
											<!-- Title -->
											<h1 class="mb-1">
												Assignment
											</h1>
										</div>
									</div>
									<!-- / .row -->
								</div>
								<?php
								include_once "../config.php";
								$ttid = $_GET['updateid'];
								$_SESSION["userrole"] = "Student";
								if (isset($ttid)) {
									$sql = "SELECT * FROM assignmentmaster WHERE AssignmentId = '$ttid'";
									$result = mysqli_query($conn, $sql);
									$row = mysqli_fetch_assoc($result);
									$u = $_SESSION['id'];
									$sql1 = "SELECT * FROM studentmaster WHERE StudentUserName = '$u'";
									$srow = mysqli_fetch_assoc(mysqli_query($conn, $sql1));
									$stuid =  $srow['StudentId'];
									$enroll =  $srow['StudentEnrollmentNo'];
								?>
									<!-- CONTENT -->
									<div class="container-fluid">
										<div class="row">
											<div class="col-12">
												<!-- Files -->
												<div class="card" data-list='{"valueNames": ["name"]}'>
													<div class="card-body">
														<h3 class="header-title">
															<?php echo $row['AssignmentTitle']; ?> Info:
														</h3>
														<br>
														<div class="input-group">
															<span class="input-group-text col-3 text-dark">Title</span>
															<input type="text" value="<?php echo $row['AssignmentTitle']; ?>" aria-label="First name" class="form-control" disabled>
															<span class="input-group-text col-3 text-dark">Subject</span>
															<input type="text" value="<?php echo $row['AssignmentSubject']; ?>" aria-label="Last name" class="form-control disable" disabled>
														</div>
														<br>
														<div class="input-group">
															<span class="input-group-text col-3 text-dark">Upload date</span>
															<input type="text" value="<?php echo $row['AssignmentUploaddate']; ?>" aria-label="First name" class="form-control" disabled>
															<span class="input-group-text col-3 text-dark">Submission Date</span>
															<input type="text" value="<?php echo $row['AssignmentSubmissionDate']; ?>" aria-label="Last name" class="form-control disable" disabled>
														</div>
														<br>
														<div class="input-group">
															<span class="input-group-text col-3 text-dark">Description</span>
															<textarea aria-label="First name" class="form-control" disabled><?php echo $row['AssignmentDesc']; ?></textarea>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="d-flex justify">
											<!-- Button -->
											<a href="../src/uploads/assignments/<?php echo $row['AssignmentFile']; ?>" download="<?php echo $row['AssignmentFile']; ?>" class="btn btn-primary" name="Download">
												Download 
											</a>
											<form enctype="multipart/form-data" method="POST" style="display: none;">
												<input type="file" id="assignmentupload" name="upload" accept="application/pdf" onchange="clickSubmit();" />
												<input type="submit" id="submit" name="submit" />
											</form>
											<a class="btn btn-primary ml-5" name="btnsub" id="btnsub" onclick="assSubmit();">
												Submit
											</a>
										</div>
									</div>
									<hr>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


		<?php include("context.php"); ?>
		<!-- / .main-content -->
	<?php } ?>
	<!-- JAVASCRIPT -->
	<!-- Map JS -->
	<script src='https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.js'></script>
	<!-- Vendor JS -->
	<script src="../assets/js/vendor.bundle.js"></script>
	<!-- Theme JS -->
	<script src="../assets/js/theme.bundle.js"></script>
	<script>
		function assSubmit() {
			document.getElementById('assignmentupload').click();
		}

		function clickSubmit() {
			var file = document.getElementById('assignmentupload');
			if (file.files.length > 0) {
				document.getElementById('submit').click();
			}
		}
	</script>
	</body>

	</html>
<?php }
if (isset($_POST['submit'])) {

	$f_tmp_name = $_FILES['upload']['tmp_name'];
	$f_size = $_FILES['upload']['size'];
	$f_error = $_FILES['upload']['error'];

	$uploadsubmit = $_POST['id'];
	$submite = 1;

	#upload to database
	$filename = $enroll . "_" . $ttid . ".pdf";
	$date = gmdate("Y-m-d");

	$sql = "INSERT INTO studentassignment(SAssignmentUploaderId, AssignmentId, SAssignmentFile, SAssignmentUploadDate, SAssignmentStatus)
	 VALUES ('$stuid','$ttid','$filename','$date','$submite')";
	// echo $sql;
	$result = mysqli_query($conn, $sql);
	if ($result) {
		echo "<script>alert('Assignment Submitted Successfully .. !');</script>";
		if ($f_error === 0) {
			if ($f_size <= 10000000) {
				move_uploaded_file($f_tmp_name, "../src/uploads/studentAssignment/" . $filename); // Moving Uploaded File to Server ... to uploades folder by file name f_name ... 
			} else {
				echo "<script>alert(File size is to big .. !);</script>";
			}
		} else {
			echo "Something went wrong .. !";
		}
		echo "<script>window.open('assignment_list.php','_self')</script>";
	} else {
		echo "<script>alert('Something went wrong .. !');</script>";
		echo "<script>window.open('assignment_list.php','_self')</script>";
	}
}
?>