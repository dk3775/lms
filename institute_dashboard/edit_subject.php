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
		<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light" id="sidebar">
			<div class="container-fluid">
				<!-- Toggler -->
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<!-- Brand -->
				<a class="navbar-brand" href="../institute_dashboard/">
					<img src="../assets/img/logo.svg" class="navbar-brand-img mx-auto" alt="...">
				</a>
				<!-- User (xs) -->
				<div class="navbar-user d-md-none">
					<!-- Dropdown -->
					<div class="dropdown">
					</div>
				</div>
				<!-- Collapse -->
				<div class="collapse navbar-collapse" id="sidebarCollapse">
					<!-- Form -->
					<form class="mt-4 mb-3 d-md-none">
						<div class="input-group input-group-rounded input-group-merge input-group-reverse">
							<input class="form-control" type="search" placeholder="Search" aria-label="Search">
							<div class="input-group-text">
								<span class="fe fe-search"></span>
							</div>
						</div>
					</form>
					<!-- Navigation -->
					<ul class="navbar-nav">
						<li class="nav-item">
							<a href="../institute_dashboard" class="nav-link ">
								<i class="fe fe-home"></i> Dashboard
							</a>
						</li>
						<li class="nav-item">
							<a href="#sidebarProfile" class="nav-link" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarProfile">
								<i class="fe uil-user"></i>Student
							</a>
							<div class="collapse" id="sidebarProfile">
								<ul class="nav nav-sm flex-column">
									<li class="nav-item">
										<a href="student_list.php" class="nav-link ">
											View Student List
										</a>
									</li>
									<li class="nav-item">
										<a href="add_student.php" class="nav-link">
											Add New Student
										</a>
									</li>
									<li class="nav-item">
										<a href="edit_student.php" class="nav-link">
											Edit Student Details
										</a>
									</li>
								</ul>
							</div>
						</li>

						<li class="nav-item">
							<a href="#sidebarPages" class="nav-link " data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarPages">
								<i class="fe uil-graduation-cap"></i>Faculty
							</a>
							<div class="collapse" id="sidebarPages">
								<ul class="nav nav-sm flex-column">
									<li class="nav-item">
										<a href="faculty_list.php" class="nav-link ">
											View Faculty List
										</a>
									</li>
									<li class="nav-item">
										<a href="add_faculty.php" class="nav-link ">
											Add New Faculty
										</a>
									</li>
									<li class="nav-item">
										<a href="edit_faculty.php" class="nav-link">
											Edit Faculty Details
										</a>
									</li>
									<li class="nav-item">
										<a href="faculty_profile.php" class="nav-link ">
											Faculty Profile
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a href="#sidebarCrm" class="nav-link active" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarCrm">
								<i class="fe uil-book"></i>Branch/subject
							</a>
							<div class="" id="sidebarCrm">
								<ul class="nav nav-sm flex-column">
									<li class="nav-item">
										<a href="branch_list.php" class="nav-link">
											View Branch List
										</a>
									</li>
									<li class="nav-item">
										<a href="add_branch.php" class="nav-link">
											Add New Branch
										</a>
									</li>
									<li class="nav-item">
										<a href="edit_branch.php" class="nav-link">
											Edit Branch
										</a>
									</li>
									<li class="nav-item">
										<a href="subject_list.php" class="nav-link">
											View Subject List
										</a>
									</li>
									<li class="nav-item">
										<a href="add_subject.php" class="nav-link">
											Add New Subject
										</a>
									</li>
									<li class="nav-item">
										<a href="edit_subject.php" class="nav-link active">
											Edit Subject
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link ">
								<i class="fe fe-percent"></i> Marksheet
							</a>
						</li>
						<li class="nav-item">
							<a href="update.php" class="nav-link ">
								<i class="fe fe-bell"></i>Updates
							</a>
						</li>
						<li class="nav-item d-md-none">
							<a class="nav-link" href="#" data-toggle="modal">
								<span class="fe fe-bell"></span> Notifications
							</a>
						</li>
					</ul>
					<!-- Divider -->
					<hr class="navbar-divider my-3">
					<!-- Heading -->
					<h6 class="navbar-heading">
						Help Center
					</h6>
					<!-- Navigation -->
					<ul class="navbar-nav mb-md-4">
						<li class="nav-item">
							<a href="#" class="nav-link ">
								<i class="fe fe-user"></i>Account related Details
							</a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link ">
								<i class="fe fe-book"></i>Study related querys
							</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
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