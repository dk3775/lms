<?php
error_reporting(E_ALL ^ E_WARNING);
session_start();
if ($_SESSION['role'] != "Abuja") {
	header("Location: ../index.php");
} else {
	require_once("../config.php");
	$sid = $_SESSION['id'];
	$sql = "SELECT * FROM timetablemaster INNER JOIN studentmaster ON timetablemaster.TimetableBranchCode = studentmaster.StudentBranchCode AND timetablemaster.TimetableSemester=studentmaster.StudentSemester INNER JOIN branchmaster ON branchmaster.BranchCode = studentmaster.StudentBranchCode WHERE studentmaster.StudentUserName = '$sid';";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<?php include_once("../head.php"); ?>
	</head>

	<body>
		<?php $nav_role = "Time Table"; ?>
		<!-- NAVIGATION -->
		<?php include_once("nav.php"); ?>
		<!-- MAIN CONTENT -->
		<div class="main-content">
			<div class="container-fluid">
				<div class="header">
					<div class="header-body">
						<div class="row align-items-end">
							<div class="col">
								<h5 class="header-pretitle">
									<a class="btn-link btn-outline" onclick="history.back()"><i class="fe uil-angle-double-left"></i>Back</a>
								</h5>
								<h6 class="header-pretitle">
									Time Table
								</h6>
								<h1 class="header-title">
									Profile
								</h1>
							</div>
						</div>
					</div>
				</div>
				<div class="row justify-content-center">
					<div class="col">
						<?php if (mysqli_num_rows($result) > 0) { ?>
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
												<span class="input-group-text col-3 ">Time Table Branch Code</span>
												<input type="text" value="<?php echo $row['BranchName']; ?>" aria-label="First name" class="form-control" disabled>
												<span class="input-group-text col-3 ">Time Table Semester</span>
												<input type="text" value="<?php echo $row['TimetableSemester']; ?>" aria-label="Last name" class="form-control disable" disabled>
											</div>
											<br>
											<div class="input-group">
												<span class="input-group-text col-3 ">Time Table Uploaded By</span>
												<input type="text" value="<?php echo $row['TimetableUploadedBy']; ?>" aria-label="First name" class="form-control" disabled>
												<span class="input-group-text col-3 ">Time Table Upload Time</span>
												<input type="text" value="<?php echo $row['TimetableUploadTime']; ?>" aria-label="Last name" class="form-control disable" disabled>
											</div>
										</div>
										<div class="input-group">
											<div class="col text-center m-4">
												<p class="text-center mb-3">
													<img src="../src/uploads/timetables/<?php echo $row['TimetableImage'] . "?t"; ?>" alt="..." class="img-fluid rounded">
												</p>
											</div>
										</div>
									</div>
								</div>
								<div class="d-flex justify mb-4">
									<!-- Button -->
									<a href="../src/uploads/timetables/<?php echo $row['TimetableImage']; ?>" download="../src/uploads/timetables/<?php echo $row['TimetableImage']; ?>" class="btn btn-success" name="Download">
										Download
									</a>
								</div>
							</div>
						<?php } else { ?>
							<div class="col-12">
								<h1 class="card header-title m-5 p-5">No Time-Table Available</h1>
							</div>
						<?php
						}
						?>
					</div>
					<!-- / .row -->
				</div>
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