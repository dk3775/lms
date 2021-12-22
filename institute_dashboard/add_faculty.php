<?php
session_start();
if ($_SESSION['role'] != "Texas") {
	header("Location: ../default.php");
} else {
	include_once("../config.php");
	$_SESSION["userrole"] = "Faculty";
}
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
									<a href="add_faculty.php" class="nav-link active">
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
										Add New
									</h6>
									<!-- Title -->
									<h1 class="header-title">
										Faculty
									</h1>
								</div>
							</div>
							<!-- / .row -->
						</div>
					</div>
					<!-- Form -->
					<form method="POST" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
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
											PNG format is only supported.
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
									<input type="text" class="form-control" name="fname" required>
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
									<input type="text" class="form-control" name="mname" required>
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
									<input type="text" class="form-control" name="lname" required>
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
									<input type="email" class="form-control" name="femail" required>
								</div>
							</div>
							<div class="col-12 col-md-6">
								<label class="form-label">
									Faculty Contact Number
								</label>
								<input type="tel" pattern="[0-9]{10}" class="form-control" maxlength="10" name="fcontact" required>
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
									<input type="text" class="form-control" name="foffice" required>
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
									<input type="text" class="form-control" name="fbranch" required>
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
									<input type="text" class="form-control" name="fqualification" required>
								</div>
							</div>
							<div class="col-12 col-md-6">
								<div class="form-group">
									<label class="form-label">
										Faculty Code
									</label>
									<input type="text" id="myInput" oninput="cp()" class="form-control" name="fcode" required>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-12 col-md-6">
								<label class="form-label">
									Faculty Subject
								</label>
								<input type="text" class="form-control" name="fsubject" required>
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
									<textarea id="demo" class="form-control fs-2" name="fid" readonly maxlength="4"></textarea>
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
									<textarea type="text" class="form-control" readonly name="fpass" id="myInput2"><?php echo (rand(11111, 99999)); ?></textarea>
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
					<br>
				</div>
			</div>
			<!-- / .row -->
		</div>
	</div>
	<!-- Map JS -->
	<script src='https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.js'></script>
	<!-- Vendor JS -->
	<script src="../assets/js/vendor.bundle.js"></script>
	<!-- Theme JS -->
	<script src="../assets/js/theme.bundle.js"></script>
	<script>
		function cp1() {
			/* Get the text field */
			var copyText = document.getElementById("demo");

			/* Select the text field */
			copyText.select();
			copyText.setSelectionRange(0, 99999); /* For mobile devices */

			/* Copy the text inside the text field */
			navigator.clipboard.writeText(copyText.value);

			/* Alert the copied text */
			alert("Copied the text: " + copyText.value);
		}

		function cp2() {
			/* Get the text field */
			var copyText = document.getElementById("myInput2");

			/* Select the text field */
			copyText.select();
			copyText.setSelectionRange(0, 99999); /* For mobile devices */

			/* Copy the text inside the text field */
			navigator.clipboard.writeText(copyText.value);

			/* Alert the copied text */
			alert("Copied the text: " + copyText.value);
		}
	</script>
	<script>
		// Example starter JavaScript for disabling form submissions if there are invalid fields
		(function() {
			'use strict'

			// Fetch all the forms we want to apply custom Bootstrap validation styles to
			var forms = document.querySelectorAll('.needs-validation')

			// Loop over them and prevent submission
			Array.prototype.slice.call(forms)
				.forEach(function(form) {
					form.addEventListener('submit', function(event) {
						if (!form.checkValidity()) {
							event.preventDefault()
							event.stopPropagation()
						}

						form.classList.add('was-validated')
					}, false)
				})
		})()
	</script>
	<script>
		function cp() {
			var x = document.getElementById("myInput").value;
			document.getElementById("demo").innerHTML = "FA" + x;
		}
	</script>

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
	$fid = $_POST['fid'];
	$fpass = $_POST['fpass'];
	$fs_name = $fcode . "." . $f_ext;

	if ($f_error === 0) {
		if ($f_size <= 1000000) {
			move_uploaded_file($f_tmp_name, "../src/uploads/facprofile/" . $fs_name); // Moving Uploaded File to Server ... to uploades folder by file name f_name ... 
		} else {
			echo "<script>alert(File size is to big .. !);</script>";
		}
	} else {
		echo "Something went wrong .. !";
	}
	$sql = "INSERT INTO facultymaster(
		FacultyUserName,
		FacultyPassword,
		FacultyPassword,
		FacultyFirstName,
		FacultyMiddleName,
		FacultyLastName,
		FacultyProfilePic,
		FacultyBranch,
		FacultyEmail,
		FacultyContactNo,
		FacultyQualification,
		FacultySubject,
		FacultyOffice,
		FacultyCode
	)
	VALUES(
		'$fid',
		'$fpass',
		'$fpassword',
		'$fname',
		'$mname',
		'$lname',
		'$fs_name',
		'$fbranch',
		'$femail',
		'$fcontact',
		'$fquali',
		'$fsubject',
		'$foffice',
		'$fcode'
);";
	$run = mysqli_query($conn, $sql);
	if ($run == true) {
		echo "<script>alert('Faculty Added Successfully')</script>";
		echo "<script>window.open('add_faculty.php','_self')</script>";
	} else {
		echo "<script>alert('Faculty Not Added')</script>";
		echo "<script>window.open('add_faculty.php','_self')</script>";
	}
}
?>