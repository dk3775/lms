<?php
	session_start();
	if($_SESSION['role']!="Abuja"){
	  header("Location: ../default.php");
	}
	else{
	  include_once("../config.php");
	  $_SESSION["userrole"]="Faculty";
	  $qur="SELECT * FROM `studentmaster` WHERE ``='Abuja'";
	}
	?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc." />
		<!-- Favicon -->
		<link rel="shortcut icon" href="../assets/favicon/favicon.ico" type="image/x-icon"/>
		<!-- Map CSS -->
		<link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.css" />
		<!-- Libs CSS -->
		<link rel="stylesheet" href="../assets/css/libs.bundle.css" />
		<!-- Theme CSS -->
		<link rel="stylesheet" href="../assets/css/theme.bundle.css" />
		<!-- Title -->
		<title>LMS by Titanslab</title>
		<style>
		</style>
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
							<a href="../faculty_dashboard" class="nav-link ">
							<i class="fe fe-home"></i> Dashboard
							</a>
						</li>
						<li class="nav-item">
							<a href="#sidebarProfile" class="nav-link" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarProfile">
							<i class="fe fe-file"></i>Student
							</a>
							<div class="collapse " id="sidebarProfile">
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
							<a href="#" class="nav-link ">
							<i class="fe fe-percent"></i> Marksheet
							</a>
						</li>
						<li class="nav-item">
							<a href="update.php" class="nav-link active">
							<i class="fe fe-bell"></i>Updates 
							</a>
						</li>
						<li class="nav-item">
							<a href="attendance.php" class="nav-link ">
							<i class="fe fe-clipboard"></i>Attendance 
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
							<a href="account_related.php" class="nav-link ">
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
		<div class="main-content bg-fixed-bottom" style="background-image: url(../assets/img/illustrations/sticky.svg);">
			<div class="container-fluid">
				<div class="row justify-content-center">
					<div class="col-12 col-lg-10 col-xl-8">
						<!-- Header -->
						<div class="header mt-md-5">
							<div class="header-body">
								<!-- Pretitle -->
								<h6 class="header-pretitle">
									GTU
								</h6>
								<!-- Title -->
								<h1 class="header-title">
									Updates Feed
								</h1>
							</div>
						</div>
						<!-- Card -->
						<div class="card">
							<div class="card-body text-center">
								<div class="row justify-content-center">
									<div class="col-12 col-md-12 col-xl-8">
										<!-- Image -->
										<img src="../assets/img/illustrations/happiness.svg" alt="..." class="img-fluid mt-n5 mb-4" style="max-width: 272px;">
										<!-- Title -->
										<h2>
											We released 2008 new versions of our theme to make the world a better place.
										</h2>
										<!-- Content -->
										<p class="text-muted">
											This is a true story and totally not made up. This is going to be better in the long run but for now this is the way it is.
										</p>
										<!-- Button -->
										<a href="#!" class="btn btn-primary lift">
										Try it for free
										</a>
									</div>
								</div>
								<!-- / .row -->
							</div>
						</div>
					</div>
				</div>
				<!-- / .row -->
			</div>
		</div>
		<!-- / .main-content -->
		<!-- MAIN CONTENT -->
		<div class="main-content bg-fixed-bottom" style="background-image: url(../assets/img/illustrations/sticky.svg);">
			<div class="container-fluid">
				<div class="row justify-content-center">
					<div class="col-12 col-lg-10 col-xl-8">
						<!-- Header -->
						<div class="header mt-md-5">
							<div class="header-body">
								<!-- Pretitle -->
								<h6 class="header-pretitle">
									Campus 
								</h6>
								<!-- Title -->
								<h1 class="header-title">
									Updates Feed
								</h1>
							</div>
						</div>
						<!-- Card -->
						<div class="card">
							<div class="card-body text-center">
								<div class="row justify-content-center">
									<div class="col-12 col-md-12 col-xl-8">
										<!-- Image -->
										<img src="../assets/img/illustrations/happiness.svg" alt="..." class="img-fluid mt-n5 mb-4" style="max-width: 272px;">
										<!-- Title -->
										<h2>
											We released 2008 new versions of our theme to make the world a better place.
										</h2>
										<!-- Content -->
										<p class="text-muted">
											This is a true story and totally not made up. This is going to be better in the long run but for now this is the way it is.
										</p>
										<!-- Button -->
										<a href="#!" class="btn btn-primary lift">
										Try it for free
										</a>
									</div>
								</div>
								<!-- / .row -->
							</div>
						</div>
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