<?php
session_start();
error_reporting(E_ALL ^ E_WARNING);
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
	<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light" id="sidebar">
		<div class="container-fluid">
			<!-- Toggler -->
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<!-- Brand -->
			<a class="navbar-brand" href="../faculty_dashboard/">
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
						<a href="../faculty_dashboard" class="nav-link">
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
									<a href="add_branch.php" class="nav-link active">
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
									<a href="edit_subject.php" class="nav-link">
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
								<label for="validationCustom01" class="form-label">Branch code</label>
								<input type="text" class="form-control" id="validationCustom01" name="icode" placeholder="CE" required><br>
							</div>
							<div class="col-md-6">
								<label for="validationCustom01" class="form-label">Branch name</label>
								<input type="text" class="form-control" id="validationCustom01" name="iname" placeholder="Computer Engineering" required><br>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<label for="validationCustom01" class="form-label">Number of Semesters</label>
								<select class="form-control" id="validationCustom01" name="isem" required>
									<option value="" hidden>Select No of Semesters</option>
									<option value="4">4</option>
									<option value="6">6</option>
									<option value="8">8</option>
								</select>
							</div>
						</div>
						<!-- Divider -->
						<hr class="mt-4 mb-5">
						<div class="d-flex justify">
							<!-- Button -->
							<button class="btn btn-primary" type="submit" value="sub" name="subbed">
								Add Branch
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

	extract($_POST);

	$sql = "INSERT INTO branchmaster (BranchName,BranchCode,BranchSemesters) VALUES ('$iname', '$icode', '$isem' );";
	$run = mysqli_query($conn, $sql);
	if ($run == true) {
		echo "<script>alert('Branch Added Successfully')</script>";
		echo "<script>window.open('branch_list.php','_self')</script>";
	} else {
		echo "<script>alert('Branch Not Added')</script>";
		echo "<script>window.open('branch_list.php','_self')</script>";
	}
}
?>