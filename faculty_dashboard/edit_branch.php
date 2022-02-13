<?php
error_reporting(E_ALL ^ E_WARNING);
session_start();
if ($_SESSION['role'] != "Lagos") {
	header("Location: ../default.php");
} else {
?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<?php include_once("../head.php"); ?>
	</head>

	<body>
		<!-- NAVIGATION -->
		<?php include_once("nav.php"); ?>
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
											Edit
										</h6>
										<!-- Title -->
										<h1 class="header-title">
											Branch Details
										</h1>
									</div>
								</div>
								<!-- / .row -->
							</div>
						</div>
						<!-- Form -->
						<?php
						include_once("../config.php");
						$bid = $_GET['brid'];
						$_SESSION["userrole"] = "institute";

						$fqur = "SELECT * FROM facultymaster";
						$fres = mysqli_query($conn, $fqur);
						$frow = mysqli_fetch_assoc($fres);
						$bcode = $frow['FacultyBranchCode'];
						if (isset($bid)) {
							$sql = "SELECT * FROM branchmaster WHERE BranchCode = '$bcode'";
							$result = mysqli_query($conn, $sql);
							$row = mysqli_fetch_assoc($result);

						?>
							<form method="POST" enctype="multipart/form-data">
								<div class="row">
									<div class="col-12 col-md-6">
										<div class="form-group">
											<label class="form-label">
												Branch Code
											</label>
											<input type="text" class="form-control" name="bcode" value="<?php echo $row['BranchCode']; ?>" required>
										</div>
									</div>
									<div class="col-12 col-md-6">
										<div class="form-group">
											<label class="form-label">
												Branch Name
											</label>
											<input type="text" class="form-control" name="bname" value="<?php echo $row['BranchName']; ?>" required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<label for="validationCustom01" class="form-label">No of Semesters</label>
										<input type="text" class="form-control" id="validationCustom01" name="bsem" value="<?php echo $row['BranchSemesters']; ?>" required><br>
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
						} ?>
						<br>
					</div>
				</div>
				<!-- / .row -->
			</div>
		</div>
	<?php
} ?>
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
	<?php
	if (isset($_POST['subbed'])) {

		extract($_POST);


		$sqli = "UPDATE branchmaster SET BranchName = '$bname', BranchCode = '$bcode', BranchSemesters = '$bsem' WHERE BranchCode = '$bcode';";
		$runed = mysqli_query($conn, $sqli);
		if ($runed == true) {
			echo "<script>alert('Branch Edited Successfully')</script>";
			echo "<script>window.open('branch_profile.php','_self') </script>";
		} else {
			echo "<script>alert('Error Occured')</script>";
			echo "<script>window.open('edit_branch.php?brid=$bid','_self')</script>";
		}
	}
	?>