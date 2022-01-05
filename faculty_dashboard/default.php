<?php
error_reporting(E_ALL ^ E_WARNING);
session_start();
if ($_SESSION['role'] != "Lagos") {
	header("Location: ../default.php");
} else {
	include_once("../config.php");
	$_SESSION["userrole"] = "Faculty";
	$user = $_SESSION['user'];
	$qur = "SELECT * FROM `studentmaster` WHERE ``='Abuja'";
	$squr = "SELECT * FROM facultymaster where FacultyUserName = ''";
	$sres = mysqli_query($conn, $squr);
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include("../head.php"); ?>

<body>
	<!-- NAVIGATION -->
	<?php include("nav.php"); ?>
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
							<form method="GET">
							<a href="logout.php" class="btn btn-primary lift" name="logout">
								logout
							</a>
							</form>
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
							<img src="../assets/test1.jpg" alt="profile_image" style="border-radius: 10px;" class="w-100 border-radius-lg shadow-sm">
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
			<div class="col-12 col-lg-6">

<!-- Card -->
<div class="card">
  <div class="card-body">

	<!-- List group -->
	<div class="list-group list-group-flush my-n3">
	  <div class="list-group-item">
		<div class="row align-items-center">
		  <div class="col">

			<!-- Title -->
			<h5 class="mb-0">
			  Email
			</h5>

		  </div>
		  <div class="col-auto">

			<!-- Time -->
			<h5 class="text-muted">
			</h5>

		  </div>
		</div> <!-- / .row -->
	  </div>
	  <div class="list-group-item">
		<div class="row align-items-center">
		  <div class="col">

			<!-- Title -->
			<h5 class="mb-0">
			  Joined
			</h5>

		  </div>
		  <div class="col-auto">

			<!-- Time -->
			<time class="small text-muted" datetime="2018-10-28">
			</time>

		  </div>
		</div> <!-- / .row -->
	  </div>
	  <div class="list-group-item">
		<div class="row align-items-center">
		  <div class="col">

			<!-- Title -->
			<h5 class="mb-0">
			  Contact No
			</h5>

		  </div>
		  <div class="col-auto">

			<!-- Text -->
			<small class="text-muted">
			</small>

		  </div>
		</div> <!-- / .row -->
	  </div>
	  <div class="list-group-item">
		<div class="row align-items-center">
		  <div class="col">

			<!-- Title -->
			<h5 class="mb-0">
			  Office 
			</h5>

		  </div>
		  <div class="col-auto">

			<!-- Link -->
			<a href="#!" class="small">
			</a>

		  </div>
		</div> <!-- / .row -->
	  </div>
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