<?php
session_start();
if ($_SESSION['role'] != "Texas") {
	header("Location: ../default.php");
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
	<?php include_once("../nav.php"); ?>
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
										Branch
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
							<div class="col-md-6">
								<label for="validationCustom01" class="form-label">Subject Code</label>
								<input type="number" class="form-control" id="validationCustom01" name="icode" placeholder="333070" required><br>
							</div>
							<div class="col-md-6">
								<label for="validationCustom01" class="form-label">Subject Name</label>
								<input type="text" class="form-control" id="validationCustom01" name="iname" placeholder="Computer Engg." required><br>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<label for="validationCustom01" class="form-label">Branch ID</label>
								<input type="text" class="form-control" id="validationCustom01" name="ibranch" placeholder="CE" required><br>
							</div>
							<div class="col-md-6">
								<label for="validationCustom01" class="form-label">Semester</label>
								<select class="form-select" aria-label="Default select example" name="isem" required>
									<option hidden>Select Semester</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>

								</select><br>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<label for="validationCustom01" class="form-label">Faculty</label>
								<select class="form-select" aria-label="Default select example" name="ifac" required>
									<option hidden>Select Faculty</option>
									<option value="">DK</option>
									<option value="">KD</option>
								</select>
							</div>
							<div class="col-md-6">
								<label for="validationCustom01" class="form-label">Syllabus</label>
								<input type="file" style="background-color : #F9FBFD;" class="form-control border-0" id="validationCustom01" name="isyllabus" accept="application/pdf" required><br>
							</div>
						</div>


						<!-- Divider -->
						<hr class="mt-4 mb-5">
						<div class="d-flex justify">
							<!-- Button -->
							<button class="btn btn-primary" type="submit" value="sub" name="subbed">
								Add Subject
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

	$icode = $_POST['icode'];
	$iname = $_POST['iname'];
	$ibanch = $_POST['ibranch'];
	$isme = $_POST['isem'];
	$ifac = $_POST['ifac'];
	$isyllabus = $_POST['isyllabus'];

	$sql = "INSERT INTO subjectmaster (SubjectCode, SubjectName, SubjectBranch, SubjectSemester, SubjectFacultyId, SubjectSyllabus) VALUES ('$icode', '$iname', '$ibanch', '$isme', '$ifac', '$isyllabus');";
	$run = mysqli_query($conn, $sql);
	if ($run == true) {
		echo "<script>alert('Subject Added Successfully')</script>";
		echo "<script>window.open('add_subject.php','_self')</script>";
	} else {
		echo "<script>alert('Subject Not Added')</script>";
		echo "<script>window.open('add_subject.php','_self')</script>";
	}
}
?>