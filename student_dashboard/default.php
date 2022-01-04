<?php
	session_start();
	if($_SESSION['role']!="Abuja"){
	  header("Location: ../default.php");
	}
	else{
	  include_once("../config.php");
	  $_SESSION["userrole"]="Student";
	  $qur="SELECT * FROM `studentmaster` WHERE ``='Abuja'";
	}
	?>
<!DOCTYPE html>
<html lang="en">
	<head>
	<?php require_once('../head.php');?>
	</head>
	<body>
		<!-- NAVIGATION -->
		<?php require_once('nav.php');?>
		<!-- MAIN CONTENT -->
		<div class="main-content">
			<!-- HEADER -->
			<div class="header">
				<div class="container-fluid">
					<!-- Body -->
					<div class="header-body">
						<div class="row align-items-end">
							<div class="col">
								<!-- Pretitle -->
								<h6 class="header-pretitle">
									<?php echo $_SESSION['userrole']; ?>
								</h6>
								<!-- Title -->
								<h1 class="header-title">
									Dashboard
								</h1>
							</div>
							<div class="col-auto">
								<!-- Button -->
								<a href="../logout.php" class="btn btn-primary lift">
								logout 
								</a>
							</div>
						</div>
						<!-- / .row -->
					</div>
					<!-- / .header-body -->
				</div>
			</div>
			<!-- / .header -->
			<br><br>
			<div class="container-fluid">
				<div class="page-header min-height-100 border-radius-xl mt-4">
				</div>
				<div class="card card-body blur shadow-blur mx-1 mt-n6 overflow-hidden">
					<div class="row gx-4">
						<div class="col-auto">
							<div class="avatar avatar-xl position-relative">
								<img src="../assets/test1.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
							</div>
						</div>
						<div class="col-auto my-auto">
							<div class="h-100">
								<h3 class="mb-1 font-weight-bold text-sm">
									Computer
								</h3>
								<h1 class="mb-0 font-weight-bold text-sm">
									Alec Thompson
								</h1>
								<p class="mb-0 font-weight-bold text-sm">
									Sem - 5
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- CARDS -->
			<div class="container-fluid">
				<div class="row">
					<div class="col-12 col-lg-6 col-xl">
						<!-- Value  -->
						<div class="card">
							<div class="card-body">
								<div class="row align-items-center">
									<div class="col">
										<!-- Title -->
										<h6 class="text-uppercase text-muted mb-2">
											SPI
										</h6>
										<!-- Heading -->
										<span class="h2 mb-0">
										9.58
										</span>
									</div>
									<div class="col-auto">
										<!-- Icon -->
										<span></span>
									</div>
								</div>
								<!-- / .row -->
							</div>
						</div>
					</div>
					<div class="col-12 col-lg-6 col-xl">
						<!-- Hours -->
						<div class="card">
							<div class="card-body">
								<div class="row align-items-center">
									<div class="col">
										<!-- Title -->
										<h6 class="text-uppercase text-muted mb-2">
											Attendance 
										</h6>
										<!-- Heading -->
										<span class="h2 mb-0">
										55%
										</span>
									</div>
									<div class="col-auto">
										<!-- Icon -->
										<span class="h2 fe fe-briefcase text-muted mb-0"></span>
									</div>
								</div>
								<!-- / .row -->
							</div>
						</div>
					</div>
					<div class="col-12 col-lg-6 col-xl">
						<!-- Exit -->
						<div class="card">
							<div class="card-body">
								<div class="row align-items-center">
									<div class="col">
										<!-- Title -->
										<h6 class="text-uppercase text-muted mb-2">
											assignment
										</h6>
										<!-- Heading -->
										<span class="h2 mb-0">
										10/40
										</span>
									</div>
									<div class="col-auto">
									</div>
								</div>
								<!-- / .row -->
							</div>
						</div>
					</div>
					<div class="col-12 col-lg-6 col-xl">
						<!-- Time -->
						<div class="card">
							<div class="card-body">
								<div class="row align-items-center">
									<div class="col">
										<!-- Title -->
										<h6 class="text-uppercase text-muted mb-2">
											Avg. Time
										</h6>
										<!-- Heading -->
										<span class="h2 mb-0">
										2:37
										</span>
									</div>
									<div class="col-auto">
										<!-- Icon -->
										<span class="h2 fe fe-clock text-muted mb-0"></span>
									</div>
								</div>
								<!-- / .row -->
							</div>
						</div>
					</div>
				</div>
				<!-- / .row -->
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