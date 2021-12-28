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
											<img class="avatar-img rounded-circle" id="IMG-preview" alt="..." src="../assets/img/avatars/profiles/avatar-1.jpg">	
                                        </div>
									</div>
									<div class="col ml-n2">
										<!-- Heading -->
										<h4 class="mb-1">
											Faculty Photo
										</h4>
										<!-- Text -->
										<small class="text-muted">
											Only allowed PNG or JPG less than 2MB
										</small>
									</div>
								</div>
								<!-- / .row -->
							</div>
							<div class="col-auto">
								<!-- Button -->
								<input type="file" id="img" name="stuprofile" class="btn btn-sm" onchange="showPreview(event);" accept="image/png image/jpg image/jpeg">
							</div>
						</div>
						<!-- / .row -->
						 <!-- Priview Profile pic  -->
						 <script>
                        function showPreview(event) {
                            var file = document.getElementById('img');
                            if (file.files.length > 0) {
                                // RUN A LOOP TO CHECK EACH SELECTED FILE.
                                for (var i = 0; i <= file.files.length - 1; i++) {
                                    var fsize = file.files.item(i).size; // THE SIZE OF THE FILE.	
                                }
                                if (fsize <= 2000000) {
                                    var src = URL.createObjectURL(event.target.files[0]);
                                    var preview = document.getElementById("IMG-preview");
                                    preview.src = src;
                                    preview.style.display = "block";
                                } else {
                                    alert("Only allowed less then 2MB.. !");
                                    file.value = '';
                                }
                            }
                        }
                        </script>
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