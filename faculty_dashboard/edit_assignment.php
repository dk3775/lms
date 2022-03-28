<?php
session_start();
if ($_SESSION['role'] != "Lagos") {
	header("Location: ../index.php");
} else {
	include_once("../config.php");
	$_SESSION["userrole"] = "Faculty";
	$assid = $_GET['assid'];
	$username = $_SESSION['id'];
	$xxsql = "SELECT * FROM assignmentmaster WHERE AssignmentId='$assid'";
	$xxresult = mysqli_query($conn, $xxsql);
	$xxrow = mysqli_fetch_assoc($xxresult);
	$subsel = "SELECT * FROM subjectmaster INNER JOIN facultymaster ON `subjectmaster`.`SubjectFacultyId` = `facultymaster`.`FacultyId` WHERE `FacultyUserName` = '$username'";
	$subresult = mysqli_query($conn, $subsel);
?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<?php include_once("../head.php"); ?>
	</head>

	<body>
		<?php $nav_role = "Assignment"; ?>
		<!-- NAVIGATION -->
		<?php include_once("nav.php"); ?>
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
											Assignment
										</h1>
									</div>
								</div>
								<!-- / .row -->
							</div>
						</div>
						<!-- Form -->
						<br>
						<form method="POST" autocomplete="off" enctype="multipart/form-data" class="row g-3 needs-validation">
							<div class="row justify-content-between align-items-center">
								<div class="col">
									<div class="row align-items-center">
										<div class="col ml-n2">
											<!-- Heading -->
											<h4 class="mb-1">
												Assignment File
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
									<input type="file" id="img" name="assfile" class="btn btn-sm" onchange="showPreview(event);" accept="appliction/pdf">
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
										if (fsize <= 5000000) {
											var src = URL.createObjectURL(event.target.files[0]);
											var preview = document.getElementById("IMG-preview");
											preview.src = src;
											preview.style.display = "block";
										} else {
											alert("Only allowed less then 5MB.. !");
											file.value = '';
										}
									}
								}
							</script>
							<hr class="my-5">
							<div class="row">
								<div class="col-md-12">
									<label for="validationCustom01" class="form-label">Assignment Title</label>
									<input type="text" class="form-control" id="validationCustom01" name="asstitle" value="<?php echo $xxrow['AssignmentTitle']; ?>" required><br>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<label for="validationCustom01" class="form-label">Assignment Description</label>
									<textarea class="form-control" id="validationCustom01" name="assdesc" required><?php echo $xxrow['AssignmentDesc']; ?></textarea><br>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<label for="validationCustom01" class="form-label">Assignment Subject</label>
									<select class="form-control" aria-label="Default select example" name="asssubject" required>
										<?php
										while ($subrow = mysqli_fetch_assoc($subresult)) { ?>
											<option <?php if ($xxrow['AssignmentSubject'] == $subrow['SubjectCode']) { ?>selected<?php } ?> value="<?php echo $subrow['SubjectName']; ?>">
												<?php echo $subrow['SubjectName']; ?>
											</option>
										<?php
										}
										?>
									</select>
									<br>
								</div>
								<div class="col-md-6">
									<label for="validationCustom01" class="form-label">Assignment Submission Date</label>
									<input type="date" id="validationCustom01" class="form-control" name="assldate" required data-flatpickr placeholder="YYYY-MM-DD" value="<?php echo $xxrow['AssignmentSubmissionDate']; ?>"><br>
								</div>
							</div>
							<!-- Divider -->
							<hr class="mt-4 mb-5">
							<div class="d-flex justify">
								<!-- Button -->
								<button class="btn btn-primary" type="submit" value="sub" name="subbed">
									Save Changes
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
		<?php #include("context.php");
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

		$fs_name = $_FILES['assfile']['tmp_name'];
		$fs_size = $_FILES['assfile']['size'];
		$fs_error = $_FILES['assfile']['error'];
		$assname = $_POST['asstitle'];
		$assdesc = $_POST['assdesc'];
		$asssubject = $_POST['asssubject'];
		$assldate = $_POST['assldate'];
		$dt = date('Y-m-d');
		$xsql = "SELECT SubjectSemester,SubjectCode from subjectmaster where SubjectName='$asssubject'";
		$xresult = mysqli_query($conn, $xsql);
		$xrow = mysqli_fetch_assoc($xresult);
		$sem = $xrow['SubjectSemester'];
		$subcode = $xrow['SubjectCode'];
		$assfile = $assname . $dt . ".pdf";

		if ($fs_error === 0) {
			if ($fs_size <= 5000000) {
				move_uploaded_file($fs_name, "../src/uploads/assignments/" . $assfile); // Moving Uploaded File to Server ... to uploades folder by file name f_name ... 
			} else {
				echo "<script>alert('File size is to big .. !');</script>";
			}
		} else {
			echo "Something went wrong .. !";
		}

		$sql = "UPDATE
		assignmentmaster
		SET
		AssignmentTitle = '$assname',
		AssignmentDesc = '$assdesc',
		AssignmentSubject = '$subcode',
		AssignmentFile = '$assfile',
		AssignmentForSemester = '$sem',
		AssignmentSubmissionDate = '$assldate'
		WHERE 
		AssignmentId = '$assid';";
		$run = mysqli_query($conn, $sql);
		if ($run == true) {
			echo "<script>alert('Assignment Edited Successfully')</script>";
			echo "<script>window.open('assignment_list.php','_self')</script>";
		} else {
			echo "<script>alert('Error Occured, Assignment Not Added')</script>";
			echo "<script>window.open('add_assignment.php','_self')</script>";
		}
	} else {
		echo "<script>window.open('assignment_list.php','_self')";
	}
}
?>