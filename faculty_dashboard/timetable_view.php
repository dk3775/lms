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
												Time Table
											</h1>
										</div>
									</div> <!-- / .row -->
								</div>
								<?php
								include_once("../config.php");
								$tbranch = $_GET['tbranch'];
								$_SESSION["userrole"] = "institute";
								if (isset($tbranch)) {
									$sql = "SELECT * FROM timetablemaster WHERE TimetableBranchCode = '$tbranch'";
									$result = mysqli_query($conn, $sql);
									$row = mysqli_fetch_assoc($result);

								?>
									<!-- CONTENT -->
									<div class="container-fluid">
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
															<span class="input-group-text col-3 text-dark">Time Table Branch Code</span>
															<input type="text" value="<?php echo $row['TimetableBranchCode']; ?>" aria-label="First name" class="form-control" disabled>
															<span class="input-group-text col-3 text-dark">Time Table Semester</span>
															<input type="text" value="<?php echo $row['TimetableSemester']; ?>" aria-label="Last name" class="form-control disable">
														</div>
														<br>
														<div class="input-group">
															<span class="input-group-text col-3 text-dark">Time Table Uploaded By</span>
															<input type="text" value="<?php echo $row['TimetableUploadedBy']; ?>" aria-label="First name" class="form-control" disabled>
															<span class="input-group-text col-3 text-dark">Time Table Upload Time</span>
															<input type="text" value="<?php echo $row['TimetableUploadTime']; ?>" aria-label="Last name" class="form-control disable">
														</div>

													</div>
												</div>
											</div>
										</div>
									</div>

								<?php
								} ?>

								<!-- Image -->
								<p class="text-center mb-3">
									<img src="../assets/img/posts/post-1.jpg" alt="..." class="img-fluid rounded">
								</p>

								<!-- Buttons -->
								
								<!-- Divider -->
								<hr>
							</div>
						</div>

					</div>
				</div> <!-- / .row -->
			</div>

		</div> <!-- / .main-content -->
		
	<?php include("context.php");?>
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