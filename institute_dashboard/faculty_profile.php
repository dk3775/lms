<?php
error_reporting(E_ALL ^ E_WARNING);
session_start();
if ($_SESSION['role'] != "Texas") {
	header("Location: ../index.php");
} else {
?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<?php include_once("../head.php"); ?>
	</head>

	<body>
		<!-- NAVIGATION -->
		<?php 
		$nav_role = "Faculty";
		include_once("../nav.php"); ?>
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
									<h5 class="header-pretitle">
									<a class="btn-link btn-outline" onclick="history.back()"><i class="fe uil-angle-double-left"></i>Back</a>
								</h5>
									<h6 class="header-pretitle">
										Faculty
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
				$studentenr = $_GET['facultycode'];
				$_SESSION["userrole"] = "institute";
				if (isset($studentenr)) {
					$sql = "SELECT * FROM facultymaster WHERE FacultyId = '$studentenr'";
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
									<div class="../avatar avatar-xxl header-avatar-top">
										<img src="../src/uploads/facprofile/<?php echo $row['FacultyProfilePic']."?t"; ?>" alt="..." class="avatar-img rounded-circle border border-4 border-body">
									</div>
								</div>
								<div class="col mb-3 ml-n3 ml-md-n2">
									<h1 class="header-title">
										<?php echo $row['FacultyFirstName'] . " " . $row['FacultyLastName']; ?>
									</h1>
									<h5 class="header-pretitle mt-2">
										<?php echo $row['FacultyCode']; ?>
									</h5>
									<h5 class="header-pretitle text-lowercase mt-2">
										<?php echo $row['FacultyEmail']; ?>
									</h5>
								</div>
								<div class="col-12 col-md-auto mt-2 mt-md-0 mb-md-3">
									<!-- Button -->
									<a href="edit_faculty.php?facid=<?php echo $row['FacultyId']; ?>" class="btn btn-warning d-block d-md-inline-block btn-md">
										Edit Details
									</a>
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
									Faculty Info:
								</h1>
								<br>
								<div class="input-group">
									<span class="input-group-text col-2 ">Faculty Name</span>
									<input type="text" value="<?php echo $row['FacultyFirstName'] . " " . $row['FacultyMiddleName'] . " " . $row['FacultyLastName']; ?>" aria-label="First name" class="form-control" disabled>
								</div>
								<br>
								<div class="input-group">
									<span class="input-group-text col-2 ">Faculty Code</span>
									<input type="text" value="<?php echo $row['FacultyCode']; ?>" aria-label="First name" class="form-control" disabled>
									<span class="input-group-text col-2 ">Branch</span>
									<input type="text" value="<?php echo $row['FacultyBranchCode']; ?>" aria-label="Last name" class="form-control" disabled>
								</div>
								<br>
								<div class="input-group">
									<span class="input-group-text col-2 ">Phone No</span>
									<input type="text" value="<?php echo $row['FacultyContactNo']; ?>" aria-label="First name" class="form-control" disabled>
									<span class="input-group-text col-2 ">Email</span>
									<input type="text" value="<?php echo $row['FacultyEmail']; ?>" aria-label="Last name" class="form-control" disabled>
								</div>
								<br>
								<div class="input-group">
									<span class="input-group-text col-2 ">Faculty Qualification</span>
									<input type="text" value="<?php echo $row['FacultyQualification']; ?>" aria-label="First name" class="form-control" disabled>
									<span class="input-group-text col-2 ">Faculty Office</span>
									<input type="text" value="<?php echo $row['FacultyOffice']; ?>" aria-label="Last name" class="form-control" disabled>
								</div>
								<br>
								<?php
									$ffid = $row['FacultyId'];
									$xssql = "SELECT SubjectName FROM subjectmaster INNER JOIN facultymaster ON subjectmaster.SubjectFacultyId = facultymaster.FacultyId WHERE facultymaster.FacultyId = '$ffid';";
									$xssqlresult = mysqli_query($conn, $xssql);
								?>
								<div class="input-group  input-group-lg mb-3">
									<span class="input-group-text col-2 ">Subject</span>
									<input class="form-control" value="<?php while($roww=mysqli_fetch_assoc($xssqlresult)){echo $roww['SubjectName'].", " ;} ?>" aria-label="With textarea" disabled>
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
									<input class="form-control list-search" type="text" name="enr" placeholder="Enter Faculty Code">
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
						$qur = "SELECT * FROM facultymaster WHERE FacultyCode = '$er';";
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
											<img src="../src/uploads/facprofile/<?php echo $row['FacultyProfilePic']."?t"; ?>" alt="..." class="avatar-img rounded-circle">
										</a>
									</div>
									<div class="col ml-n2">
										<!-- Title -->
										<h4 class="mb-1">
											<span href="faculty_profile.php"><?php echo $row['FacultyFirstName'] . " " . $row['FacultyLastName']; ?></span>
										</h4>
										<!-- Text -->
										<p class="small mb-1">
											<?php echo $row['FacultyCode']; ?>
										</p>
										<!-- Status -->
										<p class="small mb-1">
											<?php echo "Branch : ".$row['FacultyBranchCode']; ?>
										</p>
									</div>
									<div class="col-auto">
										<!-- Button -->
										<a href="faculty_profile.php?facultycode=<?php echo $row['FacultyId']; ?>" class="btn btn-m btn-primary d-none d-md-inline-block">
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
		<?php //include_once("context.php"); ?>
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