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
							<a href="#sidebarProfile" class="nav-link active" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarProfile">
								<i class="fe uil-user"></i>Student
							</a>
							<div class="" id="sidebarProfile">
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
										<a href="edit_student.php" class="nav-link active">
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
											Student Details
										</h1>
									</div>
								</div>
								<!-- / .row -->
							</div>
						</div>
						<!-- Form -->
						<?php
						include_once("../config.php");
						$studentenr = $_GET['studentenr'];
						$_SESSION["userrole"] = "Faculty";
						if (isset($studentenr)) {
							$sql = "SELECT * FROM studentmaster WHERE StudentEnrollmentNo = '$studentenr'";
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
													<img class="avatar-img rounded-circle" src="../src/uploads/stuprofile/<?php echo $row['StudentProfilePic']; ?>" alt="...">
												</div>
											</div>
											<div class="col ml-n2">
												<!-- Heading -->
												<h4 class="mb-1">
													Student Photo
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
											<input type="text" class="form-control" name="fname" value="<?php echo $row['StudentFirstName']; ?>" required>
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
											<input type="text" class="form-control" name="mname" value="<?php echo $row['StudentMiddleName']; ?>" required>
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
											<input type="text" class="form-control" name="lname" value="<?php echo $row['StudentLastName']; ?>" required>
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
												Student Email address
											</label>
											<!-- Input -->
											<input type="email" class="form-control" name="semail" value="<?php echo $row['StudentEmail']; ?>" required>
										</div>
									</div>
									<div class="col-12 col-md-6">
										<label class="form-label">
											Student Contact Number
										</label>
										<input type="tel" pattern="[0-9]{10}" class="form-control" maxlength="10" name="scontact" value="<?php echo $row['StudentContactNo']; ?>" required>
									</div>
								</div>
								<div class="row">
									<div class="col-12 col-md-6">
										<!-- Email address -->
										<div class="form-group">
											<!-- Label -->
											<label class="form-label">
												Student Address
											</label>
											<!-- Input -->
											<input type="text" class="form-control" name="add" value="<?php echo $row['StudentAddress']; ?>" required>
										</div>
									</div>
									<div class="col-12 col-md-6">
										<!-- Email address -->
										<div class="form-group">
											<!-- Label -->
											<label class="form-label">
												Date of Birth
											</label>
											<!-- Input -->
											<input type="date" class="form-control" name="dob" required data-flatpickr value="<?php echo $row['StudentDOB']; ?>" placeholder="YYYY-MM-DD">
										</div>
									</div>
								</div>
								<!-- / Personal details-->
								<hr class="my-5">
								<div class="row">
									<div class="col-12 col-md-6">
										<div class="form-group">
											<label class="form-label">
												Parent's Contact Number
											</label>
											<input type="tel" class="form-control" pattern="[0-9]{10}" maxlength="10" name="pcontact" value="<?php echo $row['ParentContactNo']; ?>" required>
										</div>
									</div>
									<div class="col-12 col-md-6">
										<label class="form-label">
											Parent's Email
										</label>
										<input type="email" class="form-control" name="pmail" value="<?php echo $row['ParentEmail']; ?>" required>
									</div>
								</div>
								<hr class="my-5">
								<!-- / .row -->
								<div class="row">
									<div class="col-12 col-md-6">
										<div class="form-group">
											<label class="form-label">
												Student Enrollment No
											</label>
											<input type="tel" pattern="[0-9]{12}" class="form-control" name="senr" value="<?php echo $row['StudentEnrollmentNo']; ?>" required>
										</div>
									</div>
									<div class="col-12 col-md-6">
										<div class="form-group">
											<label class="form-label">
												Student Roll No
											</label>
											<input type="text" maxlength="3" class="form-control" name="sroll" value="<?php echo $row['StudentRollNo']; ?>" required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-12 col-md-6">
										<div class="form-group">
											<label class="form-label">
												Student Branch
											</label>
											<input type="text" class="form-control" name="sbranch" value="<?php echo $row['StudentBranch']; ?>" required>
										</div>
									</div>
									<div class="col-12 col-md-6">
										<div class="form-group">
											<label class="form-label">
												Student Semester
											</label>
											<select class="form-control" name="ssem" required>
												<option hidden value="<?php echo $row['StudentSemester']; ?>"><?php echo $row['StudentSemester']; ?></option>
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5">5</option>
												<option value="6">6</option>
											</select>
										</div>
									</div>
								</div>


								<!-- Divider -->
								<hr class="mt-4 mb-5">
								<div class="row">
									<div class="col-12 col-md-6">
										<div class="form-group">
											<p class="form-label">
												Student Login ID
											</p>
										</div>
									</div>
									<div class="col-auto col-6">
										<div class="input-group input-group-sm mb-3 ">
											<textarea id="demo" class="form-control fs-2" name="ec" readonly maxlength="4">ST<?php echo $row['StudentEnrollmentNo']; ?></textarea>
											<button class="btn btn-primary" onclick="cp1()"><i class="fe fe-copy"></i></button>
										</div>
									</div>
								</div>


								<div class="row">
									<div class="col-12 col-md-6">
										<div class="form-group">
											Student Password
										</div>
									</div>
									<div class="col-auto col-6">
										<div class="input-group input-group-sm mb-3">
											<textarea type="text" class="form-control" name="spassword" id="myInput2"><?php echo $row['StudentPassword']; ?></textarea>
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
											<input class="form-control list-search" type="text" name="enr" placeholder="Enter Student Enrollment Number">
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
								$qur = "SELECT * FROM studentmaster WHERE StudentEnrollmentNo = '$er';";
								$res = mysqli_query($conn, $qur);
								$row = mysqli_fetch_assoc($res);
								if (isset($row)) { ?>
									<hr class="navbar-divider my-4">
									<div class="card">
										<div class="card-body">
											<div class="row align-items-center">
												<div class="col-auto">
													<a href="profile-posts.html" class="avatar avatar-lg">
														<img src="../src/uploads/stuprofile/<?php echo $row['StudentProfilePic']; ?>" alt="..." class="avatar-img rounded-circle">
													</a>

												</div>
												<div class="col ml-n2">

													<!-- Title -->
													<h4 class="mb-1">
														<a href="profile-posts.html"><?php echo $row['StudentFirstName'] . " " . $row['StudentLastName']; ?></a>
													</h4>

													<!-- Text -->
													<p class="small mb-1">
														<?php echo $row['StudentEnrollmentNo']; ?>
													</p>

													<!-- Status -->
													<p class="small mb-1">
														<?php echo $row['StudentRollNo']; ?>
													</p>

												</div>
												<div class="col-auto">

													<!-- Button -->
													<a href="edit_student.php?studentenr=<?php echo $row['StudentEnrollmentNo']; ?>" class="btn btn-m btn-primary d-none d-md-inline-block">
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
		$scontact = $_POST['scontact'];
		$semail = $_POST['semail'];
		$dob = $_POST['dob'];
		$pcontact = $_POST['pcontact'];
		$pmail = $_POST['pmail'];
		$ssem = $_POST['ssem'];
		$senr = $_POST['senr'];
		$sroll = $_POST['sroll'];
		$sbranch = $_POST['sbranch'];
		$spassword = $_POST['spassword'];
		$slid = $_POST['slid'];
		$add = $_POST['add'];
		$dob = $_POST['dob'];
		$stid = $row['StudentId'];

		$fs_name = $sroll . "." . $f_ext;

		if ($f_error === 0) {
			if ($f_size <= 1000000) {
				move_uploaded_file($f_tmp_name, "../src/uploads/stuprofile/" . $fs_name); // Moving Uploaded File to Server ... to uploades folder by file name f_name ... 
			} else {
				echo "<script>alert(File size is to big .. !);</script>";
			}
		} else {
			echo "Something went wrong .. !";
		}
		$sqli = "UPDATE studentmaster SET StudentEnrollmentNo='$senr',StudentPassword='$spassword',StudentFirstName='$fname',StudentMiddleName='$mname',StudentLastName='$lname',StudentProfilePic='$fs_name',StudentBranch='$sbranch',StudentSemester='$ssem',StudentEmail='$semail',StudentContactNo='$scontact',StudentAddress='$add',ParentEmail='$pmail',ParentContactNo='$pcontact',StudentRollNo='$sroll',StudentDOB='$dob' WHERE StudentId = '$stid';";
		$runed = mysqli_query($conn, $sqli);
		if ($runed == true) {
			echo "<script>alert('Student Details Edited Successfully')</script>";
			echo "<script>window.open('edit_student.php','_self')</script>";
		} else {
			echo "<script>alert('Error Occured')</script>";
			echo "<script>window.open('edit_student.php','_self')</script>";
		}
	}
	?>