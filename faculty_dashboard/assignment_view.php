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
												Assignment
											</h1>
										</div>
									</div>
									<!-- / .row -->
								</div>
								<?php
									include_once "../config.php";
									$ttid = $_GET['updateid'];
									$_SESSION["userrole"] = "Faculty";
									if (isset($ttid)) {
										$sql = "SELECT * FROM assignmentmaster WHERE AssignmentId = '$ttid'";
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
									</div>
								</div>
								<hr>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	<?php include("context.php");?>
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