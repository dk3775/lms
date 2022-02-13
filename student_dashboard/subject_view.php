<?php
error_reporting(E_ALL ^ E_WARNING);
session_start();
if ($_SESSION['role'] != "Abuja") {
	header("Location: ../default.php");
} else {
	include_once("../config.php");
?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<?php include_once "../head.php"; ?>
	</head>

	<body>
		<!-- NAVIGATION -->
		<?php include_once 'nav.php'; ?>
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
												Subject
											</h1>
										</div>
									</div>
									<!-- / .row -->
								</div>
								<?php
								$ttid = $_GET['id'];
								$_SESSION["userrole"] = "Student";
								$sql = "SELECT * FROM subjectmaster WHERE SubjectId = '$ttid'";
								$result = mysqli_query($conn, $sql);
								$row = mysqli_fetch_assoc($result);
								$SubjectFacultyId = $row['SubjectFacultyId'];

								$fsql = "SELECT * FROM facultymaster WHERE FacultyId = '$SubjectFacultyId'";
								$fresult = mysqli_query($conn, $fsql);
								$frow = mysqli_fetch_assoc($fresult);
								?>
								<!-- CONTENT -->
								<div class="container-fluid">
									<div class="row">
										<div class="col-12">
											<!-- Files -->
											<div class="card" data-list='{"valueNames": ["name"]}'>
												<div class="card-body">
													<h3 class="header-title">
														<?php echo $row['SubjectName']; ?>:
													</h3>
													<br>
													<div class="input-group">
														<span class="input-group-text col-3 text-dark">Name</span>
														<input type="text" value="<?php echo $row['SubjectName']; ?>" aria-label="First name" class="form-control" disabled>
														<span class="input-group-text col-3 text-dark">Subject Code</span>
														<input type="text" value="<?php echo $row['SubjectCode']; ?>" aria-label="Last name" class="form-control disable" disabled>
													</div>
													<br>
													<div class="input-group">
														<span class="input-group-text col-3 text-dark">Faculty Name</span>
														<input type="text" value="<?php echo $frow['FacultyFirstName']; ?>&nbsp;<?php echo $frow['FacultyLastName']; ?>" aria-label="First name" class="form-control" disabled>
														<span class="input-group-text col-3 text-dark">Contact No</span>
														<input type="text" value="<?php echo $frow['FacultyContactNo']; ?>" aria-label="Last name" class="form-control disable" disabled>
													</div>
													<br>
													<div class="input-group">
														<span class="input-group-text col-3 text-dark">Subject Semester</span>
														<input type="text" value="<?php echo $row['SubjectSemester']; ?>" aria-label="First name" class="form-control" disabled>
													</div>
												</div>
											</div>
										</div>
									</div>
									<p class="text-center mb-3">
										<img src="../src/uploads/subprofile/<?php echo $row['SubjectPic']; ?>" alt="..." class="img-fluid rounded">
									</p>
									<div class="d-flex justify">
										<!-- Button -->

										<a href="../src/uploads/syllabus/<?php echo $row['SubjectSyllabus']; ?>" download="<?php echo $row['SubjectSyllabus']; ?>" class="btn btn-primary" name="Download">
											Material
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