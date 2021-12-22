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
						<a href="#sidebarPages" class="nav-link active" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarPages">
						<i class="fe uil-graduation-cap"></i>Faculty
						</a>
						<div class="" id="sidebarPages">
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
									<a href="edit_faculty.php" class="nav-link active">
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
						<a href="#sidebarCrm" class="nav-link" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarCrm">
						<i class="fe uil-book"></i>Branch/subject
						</a>
						<div class="collapse" id="sidebarCrm">
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
											Edit
										</h6>
										<!-- Title -->
										<h1 class="header-title">
											Faculty Details
										</h1>
									</div>
								</div>
								<!-- / .row -->
							</div>
						</div>
						<!-- Form -->
						<?php
						include_once("../config.php");
						$studentenr = $_GET['facid'];
						$_SESSION["userrole"] = "institute";
						if (isset($studentenr)) {
							$sql = "SELECT * FROM facultymaster WHERE FacultyCode = '$studentenr'";
							$result = mysqli_query($conn, $sql);
							$row = mysqli_fetch_assoc($result);

						?>
							<form method="POST" enctype="multipart/form-data">
								<div class="row justify-content-between align-items-center">
									<div class="col">
										<div class="row align-items-center">
											<div class="col-auto">
												<!-- Personal details -->
												<!-- Avatar -->
												<div class="avatar">
													<img class="avatar-img rounded-circle" src="../src/uploads/facprofile/<?php echo $row['FacultyProfilePic']; ?>" alt="...">
												</div>
											</div>
											<div class="col ml-n2">
												<!-- Heading -->
												<h4 class="mb-1">
													Faculty Photo
												</h4>
												<!-- Text -->
												<small class="text-muted">
													PNG no bigger than 1000px wide and tall.
												</small>
											</div>
										</div>
										<!-- / .row -->
									</div>
									<div class="col-auto">
										<!-- Button -->
										<input type="file" name="stuprofile" class="btn btn-sm" accept="image/png">
									</div>
								</div>
								<!-- / .row -->
								<!-- Divider -->
								<hr class="my-5">
								<div class="row">
									<div class="col-12 col-md-4">
										<!-- First name -->
										<div class="form-group">
											<!-- Label -->
											<label class="form-label">
												First name
											</label>
											<!-- Input -->
											<input type="text" class="form-control" name="fname" value="<?php echo $row['FacultyFirstName']; ?>" required>
										</div>
									</div>
									<div class="col-12 col-md-4">
										<!-- Middle name -->
										<div class="form-group">
											<!-- Label -->
											<label class="form-label">
												Middle name
											</label>
											<!-- Input -->
											<input type="text" class="form-control" name="mname" value="<?php echo $row['FacultyMiddleName']; ?>" required>
										</div>
									</div>
									<div class="col-12 col-md-4">
										<!-- Last name -->
										<div class="form-group">
											<!-- Label -->
											<label class="form-label">
												Last name
											</label>
											<!-- Input -->
											<input type="text" class="form-control" name="lname" value="<?php echo $row['FacultyLastName']; ?>" required>
										</div>
									</div>
								</div>
								<!-- / .row -->
								<div class="row">
									<div class="col-12 col-md-6">
										<!-- Email address -->
										<div class="form-group">
											<!-- Label -->
											<label class="form-label">
												Faculty Email address
											</label>
											<!-- Input -->
											<input type="email" class="form-control" name="femail" value="<?php echo $row['FacultyEmail']; ?>" required>
										</div>
									</div>
									<div class="col-12 col-md-6">
										<label class="form-label">
											Faculty Contact Number
										</label>
										<input type="tel" pattern="[0-9]{10}" class="form-control" maxlength="10" name="fcontact" value="<?php echo $row['FacultyContactNo']; ?>" required>
									</div>
								</div>
								<div class="row">
									<div class="col-12 col-md-6">
										<!-- Email address -->
										<div class="form-group">
											<!-- Label -->
											<label class="form-label">
												Faculty Office
											</label>
											<!-- Input -->
											<input type="text" class="form-control" name="foffice" value="<?php echo $row['FacultyOffice']; ?>" required>
										</div>
									</div>
									<div class="col-12 col-md-6">
										<!-- Email address -->
										<div class="form-group">
											<!-- Label -->
											<label class="form-label">
												Branch
											</label>
											<!-- Input -->
											<input type="text" class="form-control" name="fbranch" required value="<?php echo $row['FacultyBranch']; ?>" placeholder="YYYY-MM-DD">
										</div>
									</div>
								</div>
								<!-- / Personal details-->
								<hr class="my-5">
								<div class="row">
									<div class="col-12 col-md-6">
										<div class="form-group">
											<label class="form-label">
												Faculty Qualification
											</label>
											<input type="text" class="form-control" name="fqualification" value="<?php echo $row['FacultyQualification']; ?>" required>
										</div>
									</div>
									<div class="col-12 col-md-6">
										<div class="form-group">
											<label class="form-label">
												Faculty Code
											</label>
											<input type="text" id="myInput" oninput="cp()" class="form-control" value="<?php echo $row['FacultyCode']; ?>" name="fcode" required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-12 col-md-6">
										<label class="form-label">
											Faculty Subject
										</label>
										<input type="text" class="form-control" name="fsubject" value="<?php echo $row['FacultySubject']; ?>" required>
									</div>
								</div>
								<hr class="my-5">
								<!-- / .row -->
								<div class="row">
									<div class="col-12 col-md-6">
										<div class="form-group">
											<p class="form-label">
												Faculty Login ID
											</p>
										</div>
									</div>
									<div class="col-auto col-6">
										<div class="input-group input-group-sm mb-3 ">
											<textarea id="demo" class="form-control fs-2" name="ec" readonly maxlength="4">ST<?php echo $row['FacultyUserName']; ?></textarea>
											<button class="btn btn-primary" onclick="cp1()"><i class="fe fe-copy"></i></button>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-12 col-md-6">
										<div class="form-group">
											Faculty Password
										</div>
									</div>
									<div class="col-auto col-6">
										<div class="input-group input-group-sm mb-3">
											<textarea type="text" class="form-control" name="fpassword" id="myInput2"><?php echo $row['FacultyPassword']; ?></textarea>
											<button class="btn btn-primary" onclick="cp2()"><i class="fe fe-copy"></i></button>
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
											<input class="form-control list-search" type="text" name="enr" placeholder="Enter Faculty Id">
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
								$qur = "SELECT * FROM facultymaster WHERE FacultyId = '$er';";
								$res = mysqli_query($conn, $qur);
								$row = mysqli_fetch_assoc($res);
								if (isset($row)) { ?>
									<hr class="navbar-divider my-4">
									<div class="card">
										<div class="card-body">
											<div class="row align-items-center">
												<div class="col-auto">
													<a href="profile-posts.html" class="avatar avatar-lg">
														<img src="../src/uploads/facprofile/<?php echo $row['FacultyProfilePic']; ?>" alt="..." class="avatar-img rounded-circle">
													</a>
												</div>
												<div class="col ml-n2">
													<!-- Title -->
													<h4 class="mb-1">
														<a href="profile-posts.html"><?php echo $row['FacultyFirstName'] . " " . $row['FacultyLastName']; ?></a>
													</h4>
													<!-- Text -->
													<p class="small mb-1">
														<?php echo $row['FacultyCode']; ?>
													</p>
													<!-- Status -->
													<p class="small mb-1">
														<?php echo $row['FacultyBranch']; ?>
													</p>
												</div>
												<div class="col-auto">
													<!-- Button -->
													<a href="edit_faculty.php?facid=<?php echo $row['FacultyCode']; ?>" class="btn btn-m btn-primary d-none d-md-inline-block">
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
		$f_name = $_FILES['stuprofile']['name'];
		$f_tmp_name = $_FILES['stuprofile']['tmp_name'];
		$f_size = $_FILES['stuprofile']['size'];
		$f_error = $_FILES['stuprofile']['error'];
		$f_type = $_FILES['stuprofile']['type'];
		$f_ext = explode('.', $f_name);
		$f_ext = strtolower(end($f_ext));

		$fname = $_POST['fname'];
		$mname = $_POST['mname'];
		$lname = $_POST['lname'];
		$fcontact = $_POST['fcontact'];
		$femail = $_POST['femail'];
		$foffice = $_POST['foffice'];
		$fbranch = $_POST['fbranch'];
		$fquali = $_POST['fqualification'];
		$fsubject = $_POST['fsubject'];
		$fpassword = $_POST['fpassword'];
		$fcode = $_POST['fcode'];
		$fid = $row['FacultyId'];

		$fs_name = $fcode . "." . $f_ext;

		if ($f_error === 0) {
			if ($f_size <= 1000000) {
				move_uploaded_file($f_tmp_name, "../src/uploads/stuprofile/" . $fs_name); // Moving Uploaded File to Server ... to uploades folder by file name f_name ... 
			} else {
				echo "<script> alert(File size is to big .. !);</script>";
			}
		} else {
			echo "Something went wrong .. !";
		}
		$sqli = "UPDATE facultymaster SET FacultyFirstName='$fname', FacultyMiddleName='$mname',FacultyLastName='$lname', FacultyContactNo='$fcontact', FacultyEmail='$femail', FacultyOffice='$foffice', FacultyBranch='$fbranch', FacultyQualification='$fquali', FacultySubject='$fsubject', FacultyPassword='$fpassword', FacultyCode='$fcode'  WHERE FacultyId = '$fid';";
		$runed = mysqli_query($conn, $sqli);
		if ($runed == true) {
			echo "<script>alert('Faculty Details Edited Successfully')</script>";
			echo "<script>window.open('faculty_list.php','_self')</script>";
		} else {
			echo "<script>alert('Error Occured')</script>";
			echo "<script>window.open('edit_faculty.php','_self')</script>";
		}
	}
	?>