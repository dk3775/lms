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
		<!-- NAVIGATION -->
		<?php include_once('nav.php'); ?>
		<!-- MAIN CONTENT -->
		<div class="main-content">
			<div class="header ml-5 mr-5">
				<!-- HEADER -->
				<div class="header">
					<div class="container-fluid">
						<!-- Body -->
						<div class="header-body">
							<div class="row align-items-end">
								<div class="col">
									<!-- Pretitle -->
									<h6 class="header-pretitle">
										Student
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
				$studentenr = $_GET['studentenr'];
				$_SESSION["userrole"] = "institute";
				if (isset($studentenr)) {
					$sql = "SELECT * FROM studentmaster WHERE StudentEnrollmentNo = '$studentenr'";
					$result = mysqli_query($conn, $sql);
					$row = mysqli_fetch_assoc($result);

				?>
					<br><br>
					<div class="container-fluid">
						<!-- Body -->
						<div class="header-body mt-n5 mt-md-n6">
							<div class="row align-items-center">
								<div class="col-auto">
									<!-- Avatar -->
									<div class="../avatar avatar-xxl position-relative">
										<img src="../src/uploads/stuprofile/<?php echo $row['StudentProfilePic']; ?>" alt="..." style="border-radius: 10px;" class="w-100 h-100 border-radius-lg shadow-sm">
									</div>
								</div>
								<div class="col mb-3 ml-n3 ml-md-n2">
									<h1 class="header-title">
										<?php echo $row['StudentFirstName'] . " " . $row['StudentLastName']; ?>
									</h1>
									<h5 class="header-pretitle mt-2">
										<?php echo $row['StudentEnrollmentNo']; ?>
									</h5>
									<h5 class="header-pretitle mt-2">
										<?php echo "Sem : ".$row['StudentSemester']; ?>
									</h5>
								</div>
								
							</div>
							<!-- / .row -->
							<div class="row align-items-center">
								<div class="col">
									<!-- Nav -->
									<ul class="nav nav-tabs nav-overflow header-tabs">
										<li class="nav-item">
											<a href="profile_files.php" class="nav-link h3 active">
												Basic Details
											</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<!-- / .header-body -->
					</div>
			</div>
			<!-- CONTENT -->
			<div class="container-fluid">
				<div class="row">
					<div class="col-12">
						<!-- Files -->
						<div class="card" data-list='{"valueNames": ["name"]}'>
							<div class="card-body">
								<h1 class="header-title">
									Student Info:
								</h1>
								<br>
								<div class="input-group">
									<span class="input-group-text col-2 text-dark">Student Name</span>
									<input type="text" value="<?php echo $row['StudentFirstName'] . " " . $row['StudentMiddleName'] . " " . $row['StudentLastName']; ?>" aria-label="First name" class="form-control" disabled>
								</div>
								<br>
								<div class="input-group">
									<span class="input-group-text col-2 text-dark">Enrollment No.</span>
									<input type="text" value="<?php echo $row['StudentEnrollmentNo']; ?>" aria-label="First name" class="form-control" disabled>
									<span class="input-group-text col-2 text-dark">Branch</span>
									<input type="text" value="<?php echo $row['StudentBranchCode']; ?>" aria-label="Last name" class="form-control" disabled>
								</div>
								<br>
								<div class="input-group">
									<span class="input-group-text col-2 text-dark">Semester</span>
									<input type="text" value="<?php echo $row['StudentSemester']; ?>" aria-label="First name" class="form-control" disabled>
									<span class="input-group-text col-2 text-dark">Date Of Birth</span>
									<input type="text" value="<?php echo $row['StudentDOB']; ?>" aria-label="Last name" class="form-control" disabled>
								</div>
								<br>
								<div class="input-group">
									<span class="input-group-text col-2 text-dark">Roll No.</span>
									<input type="text" value="<?php echo $row['StudentRollNo']; ?>" aria-label="Last name" class="form-control" disabled>
									<span class="input-group-text col-2 text-dark">E-mail</span>
									<input type="text" value="<?php echo $row['StudentEmail']; ?>" aria-label="Last name" class="form-control" disabled>
								</div>
								<br>
								<div class="input-group">
									<span class="input-group-text col-2 text-dark">Contact No.</span>
									<input type="text" value="<?php echo $row['StudentContactNo']; ?>" aria-label="First name" class="form-control" disabled>
									<span class="input-group-text col-2 text-dark">Parent Contact No.</span>
									<input type="text" value="<?php echo $row['ParentContactNo']; ?>" aria-label="First name" class="form-control" disabled>
								</div>
								<br>
								<div class="input-group  input-group-lg mb-3">
									<span class="input-group-text col-2 text-dark">Address</span>
									<input type="text" value="<?php echo $row['StudentAddress']; ?>" aria-label="Last name" class="form-control" disabled>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php
				} else { ?>
			<div class="container-fluid">
				<form class="m-5" method="post">
					<div class="col ml-5 mr-5">
						<div class="row">

							<div class="col-md-10">
								<div class="input-group input-group-merge input-group-reverse">
									<input class="form-control list-search" type="text" name="enr" placeholder="Enter Student Enrollment">
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
						$qur = "SELECT * FROM studentmaster WHERE StudentEnrollmentNo = '$er'";
						$res = mysqli_query($conn, $qur);
						$row = mysqli_fetch_assoc($res);

						if (isset($row)) { ?>
					<div class="container-fluid">
						<hr class="navbar-divider m-5">
						<div class="card ml-5 mr-5">
							<div class="card-body">
								<div class="row align-items-center">
									<div class="col-auto">
										<a href="profile-posts.html" class="avatar avatar-lg">
											<img src="../src/uploads/stuprofile/<?php echo $row['StudentProfilePic']; ?>" alt="..." class="avatar-img rounded-circle">
										</a>
									</div>
									<div class="col" >
										<!-- Title -->
										<h3 class="ml-3 mb-2 header-title">
											 <?php echo $row['StudentFirstName'] . " " . $row['StudentLastName']; ?>
										</h3>
										<p class="small ml-3 mb-1">
											<?php echo $row['StudentEnrollmentNo']; ?>
										</p>
										<!-- Status -->
										<p class="small ml-3  mb-1">
											<?php echo "Sem : ".$row['StudentSemester']; ?>
										</p>
										<p class="small ml-3  mb-1">
											<?php echo "Branch : ".$row['StudentBranchCode']; ?>
										</p>
									</div>
									<div class="col-auto">
										<!-- Button -->
										<a href="student_profile.php?studentenr=<?php echo $row['StudentEnrollmentNo']; ?>" class="btn btn-m btn-primary d-none d-md-inline-block">
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
		<?php #include_once("context.php"); ?>
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
