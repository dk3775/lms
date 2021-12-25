<?php
error_reporting(E_ALL ^ E_WARNING);
session_start();
if ($_SESSION['role'] != "Texas") {
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
											Edit
										</h6>
										<!-- Title -->
										<h1 class="header-title">
											Subject Details
										</h1>
									</div>
								</div>
								<!-- / .row -->
							</div>
						</div>
						<!-- Form -->
						<?php
						include_once("../config.php");
						$sid = $_GET['facid'];
						$_SESSION["userrole"] = "institute";
						if (isset($sid)) {
							$sql = "SELECT * FROM subjectmaster WHERE SubjectCode = '$sid'";
							$result = mysqli_query($conn, $sql);
							$row = mysqli_fetch_assoc($result);
						?>
							<form method="POST" enctype="multipart/form-data">
								<div class="row">
									<div class="col-12 col-md-6">
										<!-- First name -->
										<div class="form-group">
											<!-- Label -->
											<label class="form-label">
												Subject Code
											</label>
											<!-- Input -->
											<input type="text" class="form-control" name="icode" value="<?php echo $row['SubjectCode']; ?>" required>
										</div>
									</div>
									<div class="col-12 col-md-6">
										<!-- Middle name -->
										<div class="form-group">
											<!-- Label -->
											<label class="form-label">
												Subject Name
											</label>
											<!-- Input -->
											<input type="text" class="form-control" name="iname" value="<?php echo $row['SubjectName']; ?>" required>
										</div>
									</div>
									<div class="col-12 col-md-6">
										<!-- Middle name -->
										<div class="form-group">
											<!-- Label -->
											<label class="form-label">
												Branch ID
											</label>
											<!-- Input -->
											<input type="text" class="form-control" name="ibranch" value="<?php echo $row['SubjectBranch']; ?>" required>
										</div>
									</div>
									<div class="col-12 col-md-6">
										<!-- Middle name -->
										<div class="form-group">
											<!-- Label -->
											<label class="form-label">
												Semester
											</label>
											<!-- Input -->
											<select class="form-select" aria-label="Default select example" name="isem" required>
												<option hidden><?php echo $row['SubjectSemester']; ?></option>
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5">5</option>
												<option value="6">6</option>

											</select><br>
										</div>
									</div>
									<div class="col-12 col-md-6">
										<!-- Middle name -->
										<div class="form-group">
											<!-- Label -->
											<label class="form-label">
												Faculty ID
											</label>
											<!-- Input -->
											<input type="text" class="form-control" name="ifac" value="<?php echo $row['SubjectFacultyId']; ?>" required>
										</div>
									</div>
									<div class="col-12 col-md-6">
										<!-- Middle name -->
										<div class="form-group">
											<!-- Label -->
											<label class="form-label">
												Syllabus
											</label>
											<!-- Input -->
											<input type="file" style="background-color : #F9FBFD;" class="form-control border-0" id="validationCustom01" name="isyllabus" accept="application/pdf" required><br>
										</div>
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
						} else { ?>
							<form class="mb-4" method="post">
								<div class="row">
									<div class="col-md-10">
										<div class="input-group input-group-merge input-group-reverse">
											<input class="form-control list-search" type="text" name="enr" placeholder="Enter Subject Code">
											<div class="input-group-text">
												<span class="fe fe-search"></span>
											</div>
										</div>
									</div>
									<div class="col-md-2">
										<div class="col-auto">
											<!-- Button -->
											<button class="btn btn-primary " type="submit" name="ser" value="2">
												Search
											</button>
										</div>
									</div>
								</div>
							</form>

							<?php
							if (isset($_POST['ser'])) {
								$er = $_POST['enr'];
								$qur = "SELECT * FROM subjectmaster WHERE SubjectCode = '$er';";
								$res = mysqli_query($conn, $qur);
								$row = mysqli_fetch_assoc($res);
								if (isset($row)) { ?>
									<hr class="navbar-divider my-4">
									<div class="card">
										<div class="card-body">
											<div class="row align-items-center">
												<div class="col ml-n2">

													<!-- Title -->
													<h4 class="mb-1">
														<a href="profile-posts.html"><?php echo $row['SubjectName']; ?></a>
													</h4>

													<!-- Text -->
													<p class="small mb-1">
														<?php echo $row['SubjectCode']; ?>
													</p>
													<p class="small mb-1">
														<?php echo $row['SubjectBranch']; ?>
													</p>

												</div>
												<div class="col-auto">

													<!-- Button -->
													<a href="edit_subject.php?facid=<?php echo $row['SubjectCode']; ?>" class="btn btn-m btn-primary d-none d-md-inline-block">
														Edit
													</a>

												</div>
											</div> <!-- / .row -->
										</div> <!-- / .card-body -->
									</div>
					<?php
								}
							}
						}
					}
					?>
					<br>
					</div>
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
	<?php
	if (isset($_POST['subbed'])) {

		$icode = $_POST['icode'];
		$iname = $_POST['iname'];
		$ibanch = $_POST['ibranch'];
		$isme = $_POST['isem'];
		$ifac = $_POST['ifac'];
		$isyllabus = $_POST['isyllabus'];

		$sqli = "UPDATE subjectmaster SET SubjectCode='$icode',SubjectName='$iname',SubjectBranch='$ibanch',SubjectSemester='$isme',SubjectFacultyId='$ifac',SubjectSyllabus='$isyllabus' WHERE SubjectCode='$sid';";
		$runed = mysqli_query($conn, $sqli);
		if ($runed == true) {
			echo "<script>alert('Branch Edited Successfully')</script>";
			echo "<script>window.open('edit_subject.php','_self')</script>";
		} else {
			echo "<script>alert('Error Occured')</script>";
			echo "<script>window.open('edit_subject.php','_self')</script>";
		}
	}
	?>