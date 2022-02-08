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
		<?php include_once("nav.php"); ?>
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