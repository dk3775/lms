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
		<?php $nav_role = "Branch"; ?>
		<!-- NAVIGATION -->
		<?php include_once("nav.php"); ?>
		<!-- MAIN CONTENT -->
		<div class="main-content">
			<div class="header">
				<!-- HEADER -->
				<div class="header">
					<div class="container-fluid">
						<!-- Body -->
						<div class="header-body">
							<div class="row align-items-end">
								<div class="col">
									<!-- Pretitle -->
									<h6 class="header-pretitle">
										Branch
									</h6>
									<!-- Title -->
									<h1 class="header-title">
										Profile
									</h1>
								</div>
							</div>
							<!-- / .row -->
						</div>
						<!-- / .header-body -->
					</div>
				</div>
				<!-- / .header -->
				<?php
				include_once("../config.php");
				$_SESSION["userrole"] = "Faculty";
				$studentenr = $_SESSION['fid'];
				$fqur = "SELECT * FROM facultymaster where FacultyID = '$studentenr'";
				$fres = mysqli_query($conn, $fqur);
				$frow = mysqli_fetch_assoc($fres);
				$bcode = $frow['FacultyBranchCode'];
				$sql = "SELECT BranchName, BranchCode, BranchSemesters FROM branchmaster WHERE BranchCode = '$bcode'";
				$ssql = "SELECT FacultyId FROM branchmaster INNER JOIN facultymaster ON branchmaster.BranchCode = facultymaster.FacultyBranchCode WHERE BranchCode = '$bcode'";
				$result = mysqli_query($conn, $sql);
				$reesult = mysqli_query($conn, $ssql);
				$row = mysqli_fetch_assoc($result);
				$c = isset($result) ? mysqli_num_rows($result) : 0;
				$cc = isset($reesult) ? mysqli_num_rows($reesult) : 0;
				
				$squr = "SELECT * FROM studentmaster WHERE StudentBranchCode = '$bcode'";
				$sres = mysqli_query($conn, $squr);
				$srow = mysqli_num_rows($sres);
				?>
				<br><br>
				<div class="container-fluid">
					<!-- Body -->
					<div class="header-body mt-n5 mt-md-n6">
						<div class="row align-items-center">
							<div class="col mb-3 ml-n3 ml-md-n2">
								<h1 class="header-title">
									<?php echo $row['BranchName']; ?>
								</h1>
								<h5 class="header-pretitle mt-2">
									<?php echo $row['BranchCode']; ?>
								</h5>
							</div>
						</div>
						<hr class="navbar-divider my-4">
						<!-- details -->
						<div class="col mb-3 ml-n3 ml-md-n2">
							<h3 class="header-title">
								Branch Details
							</h3>
						</div>
						<ul class="list-group list-group-horizontal col-4">
							<li class="list-group-item col-7">Total Students Enrolled </li>
							<li class="list-group-item col-7"><?php echo $srow; ?></li>
						</ul>
						<ul class="list-group list-group-horizontal col-4">
							<li class="list-group-item col-7">No of Faculties</li>
							<li class="list-group-item col-7"><?php echo $cc; ?></li>
						</ul>
						<!-- over -->
						<hr class="navbar-divider my-4">
						<!-- / .row -->
						<div class="col mb-3 ml-n3 ml-md-n2">
							<h3 class="header-title">
								Semester Details
							</h3>
						</div>
						<div class="row align-items-center">
							<div class="col">
								<!-- Nav -->
								<ul class="nav nav-tabs nav-overflow header-tabs">
									<?php
									$a = 1;
									while ($a <= $row['BranchSemesters']) { ?>
										<li class="nav-item" <?php echo $a ? "active" : ""; ?>>
											<a href="sem_details.php?semid=<?php echo $row['BranchCode'] . "_" . $a; ?>&brid=<?php echo $row['BranchCode']; ?>" class="nav-link h3">
												Sem <?php echo $a; ?>
											</a>
										</li>
									<?php $a++;
									}
									?>
								</ul>
							</div>
						</div>
					</div>
					<!-- / .header-body -->
				</div>
			</div>
		</div>

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
<?php } ?>