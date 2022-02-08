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
					$studentenr = $_GET['brid'];
					$_SESSION["userrole"] = "Institute";
					if (isset($studentenr)) {
						$sql = "SELECT BranchName, BranchCode, BranchSemesters, StudentId FROM branchmaster INNER JOIN studentmaster ON branchmaster.BranchCode = studentmaster.StudentBranchCode WHERE BranchId = '$studentenr'";
						$ssql = "SELECT FacultyId FROM branchmaster INNER JOIN facultymaster ON branchmaster.BranchCode = facultymaster.FacultyBranchCode WHERE BranchId = '$studentenr'";
						$result = mysqli_query($conn, $sql);
						$reesult = mysqli_query($conn, $ssql);
						$row = mysqli_fetch_assoc($result);
						$c = isset($result)? mysqli_num_rows($result):0;
						$cc = isset($reesult)? mysqli_num_rows($reesult):0;
					
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
							<div class="col-12 col-md-auto mt-2 mt-md-0 mb-md-3">
								<!-- Button -->
								<a href="edit_branch.php?brid=<?php echo $row['BranchId']; ?>" class="btn btn-primary d-block d-md-inline-block btn-md">
								Edit Details
								</a>
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
							<li class="list-group-item col-7"><?php echo $c;?></li>
						</ul>
						<ul class="list-group list-group-horizontal col-4">
							<li class="list-group-item col-7">No of Faculties</li>
							<li class="list-group-item col-7"><?php echo $cc;?></li>
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
			<?php
				} else { ?>
			<div class="container-fluid">
				<form class="mb-4" method="post">
					<div class="col">
						<div class="row">
							<div class="col-md-4">
								<div class="input-group input-group-merge input-group-reverse">
									<input class="form-control list-search" type="text" name="enr" placeholder="Enter Branch Code">
									<div class="input-group-text">
										<span class="fe fe-search"></span>
									</div>
								</div>
							</div>
							<div class="col-md-2">
								<div class="col-auto">
									<!-- Button -->
									<button class="btn btn-primary" type="submit" name="ser" value="2">
									Search
									</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
			<?php
				if (isset($_POST['ser'])) {
					$er = $_POST['enr'];
					$qur = "SELECT * FROM branchmaster WHERE BranchCode = '$er';";
					$res = mysqli_query($conn, $qur);
					$row = mysqli_fetch_assoc($res);
					if (isset($row)) { ?>
			<div class="container-fluid">
				<hr class="navbar-divider my-4">
				<div class="card">
					<div class="card-body">
						<div class="row align-items-center">
							<div class="col ml-n2">
								<h4 class="mb-1">
									<a href="branch_profile.php"><?php echo $row['BranchName']; ?></a>
								</h4>
								<p class="small mb-1">
									<?php echo $row['BranchCode']; ?>
								</p>
							</div>
							<div class="col-auto">
								<a href="branch_profile.php?brid=<?php echo $row['BranchId']; ?>" class="btn btn-m btn-primary d-none d-md-inline-block">
								View
								</a>
							</div>
						</div>
						<!-- / .row -->
					</div>
					<!-- / .card-body -->
				</div>
			</div>
			<?php
				}
				}
				}
				?>
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
<?php } ?>