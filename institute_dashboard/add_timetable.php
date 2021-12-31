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
	<?php include_once("../nav.php"); ?>
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
										Timetable
									</h1>
								</div>
							</div>
							<!-- / .row -->
						</div>
					</div>
					<!-- Form -->
					<form method="POST" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
						<div class="row">
							<div class="col-12 col-md-6">
								<!-- Middle name -->
								<div class="form-group">
									<!-- Label -->
									<label class="form-label">
										Time Table Branch
									</label>
									<!-- Input -->
									<input type="text" class="form-control" name="tbranch" required>
								</div>
							</div>
							<div class="col-12 col-md-6">
								<!-- Last name -->
								<div class="form-group">
									<!-- Label -->
									<label class="form-label">
										Time Table Semester
									</label>
									<!-- Input -->
									<input type="text" class="form-control" name="tsemester" required>
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
										Time Table Uploaded By
									</label>
									<!-- Input -->
									<input type="text" class="form-control" name="tuploaded" required>
								</div>
							</div>
							<div class="col-12 col-md-6">
								<label class="form-label">
									Time Table Upload Time
								</label>
								<input type="datetime" class="form-control" name="ttime" required>
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
	// $f_name = $_FILES['stuprofile']['name'];
	$f_tmp_name = $_FILES['stuprofile']['tmp_name'];
	$f_size = $_FILES['stuprofile']['size'];
	$f_error = $_FILES['stuprofile']['error'];
	// $f_type = $_FILES['stuprofile']['type'];
	// $f_ext = explode('.', $f_name);
	// $f_ext = strtolower(end($f_ext));

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
	$fs_name = $fcode . ".png";

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