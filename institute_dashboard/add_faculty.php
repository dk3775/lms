<?php
session_start();
if ($_SESSION['role'] != "Texas") {
	header("Location: ../index.php");
} else {
	include_once("../config.php");
	$_SESSION["userrole"] = "Faculty";
}
$branchsel = "SELECT * FROM branchmaster";
$branchresult = mysqli_query($conn, $branchsel);
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
		<div class="container-fluid">
			<div class="row justify-content-center">
				<div class="col-12 col-xl-10">
					<!-- Header -->
					<div class="header mt-md-5">
						<div class="header-body">
							<div class="row align-items-center">
								<div class="col">
									<h5 class="header-pretitle">
										<a class="btn-link btn-outline" onclick="history.back()"><i class="fe uil-angle-double-left"></i>Back</a>
									</h5>
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
					<form method="POST" autocomplete="off" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
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
									<label class="form-label" for="validationCustom01">
										First name
									</label>
									<!-- Input -->
									<input type="text" onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122))' maxlength="20" class="form-control" id="validationCustom01" name="fname" required>
									<div class="valid-feedback">
										Looks good!
									</div>
									<div class="invalid-feedback">
										Incorrect Format or Field is Empty!
									</div>
								</div>
							</div>
							<div class="col-12 col-md-4">
								<!-- Middle name -->
								<div class="form-group">
									<!-- Label -->
									<label class="form-label" for="validationCustom01">
										Middle name
									</label>
									<!-- Input -->
									<input type="text" onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122))' maxlength="20" class="form-control" id="validationCustom01" name="mname" required>
									<div class="valid-feedback">
										Looks good!
									</div>
									<div class="invalid-feedback">
										Incorrect Format or Field is Empty!
									</div>
								</div>
							</div>
							<div class="col-12 col-md-4">
								<!-- Last name -->
								<div class="form-group">
									<!-- Label -->
									<label class="form-label" for="validationCustom01">
										Last name
									</label>
									<!-- Input -->
									<input type="text" onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122))' maxlength="20" class="form-control" id="validationCustom01" name="lname" required>
									<div class="valid-feedback">
										Looks good!
									</div>
									<div class="invalid-feedback">
										Incorrect Format or Field is Empty!
									</div>
								</div>
							</div>
						</div>
						<!-- / .row -->
						<div class="row">
							<div class="col-12 col-md-6">
								<!-- Email address -->
								<div class="form-group">
									<!-- Label -->
									<label class="form-label" for="validationCustom01">
										Faculty Email address
									</label>
									<!-- Input -->
									<input type="email" class="form-control" maxlength="25" id="validationCustom01" name="femail" required>
									<div class="valid-feedback">
										Looks good!
									</div>
									<div class="invalid-feedback">
										Incorrect Format or Field is Empty!
									</div>
								</div>
							</div>
							<div class="col-12 col-md-6">
								<label class="form-label" for="validationCustom01">
									Faculty Contact Number
								</label>
								<input type="text" pattern="[0-9]{10}" onkeypress="return event.charCode>=48 && event.charCode<=57" maxlength="10" id="validationCustom01" class="form-control" name="fcontact" required>
								<div class="valid-feedback">
									Looks good!
								</div>
								<div class="invalid-feedback">
									Incorrect Format or Field is Empty!
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-12 col-md-6">
								<!-- Email address -->
								<div class="form-group">
									<!-- Label -->
									<label class="form-label" for="validationCustom01">
										Faculty Office
									</label>
									<!-- Input -->
									<input type="text" class="form-control" id="validationCustom01" name="foffice" required>
									<div class="valid-feedback">
										Looks good!
									</div>
									<div class="invalid-feedback">
										Incorrect Format or Field is Empty!
									</div>
								</div>
							</div>
							<div class="col-12 col-md-6">
								<!-- Email address -->
								<div class="form-group">
									<!-- Label -->
									<label class="form-label" for="validationCustom01">
										Branch
									</label>
									<!-- Input -->
									<select id="validationCustom01" class="form-control" id="validationCustom01" name="fbranch" required>
										<option value="" hidden="">Select Branch</option>
										<?php
										while ($brrow = mysqli_fetch_assoc($branchresult)) { ?>
											<option value="<?php echo $brrow['BranchCode']; ?>">
												<?php echo $brrow['BranchName']; ?>
											</option>
										<?php
										} ?>
									</select>
									<div class="valid-feedback">
										Looks good!
									</div>
									<div class="invalid-feedback">
										Select Option!
									</div>
								</div>
							</div>
						</div>
						<!-- / Personal details-->
						<hr class="my-5">
						<div class="row">
							<div class="col-12 col-md-6">
								<div class="form-group">
									<label class="form-label" for="validationCustom01">
										Faculty Qualification
									</label>
									<input type="text" class="form-control" id="validationCustom01" name="fqualification" required>
									<div class="valid-feedback">
										Looks good!
									</div>
									<div class="invalid-feedback">
										Incorrect Format or Field is Empty!
									</div>
								</div>
							</div>
							<div class="col-12 col-md-6">
								<div class="form-group">
									<label class="form-label" for="validationCustom01">
										Faculty Code
									</label>
									<input type="text" id="myInput" oninput="cp()" class="form-control" id="validationCustom01" name="fcode" required>
									<div class="valid-feedback">
										Looks good!
									</div>
									<div class="invalid-feedback">
										Incorrect Format or Field is Empty!
									</div>
								</div>
							</div>
						</div>
						<hr class="my-5">
						<!-- / .row -->
						<div class="row">
							<div class="col-12 col-md-6">
								<div class="form-group">
									<p class="form-label" for="validationCustom01">
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
									<textarea type="text" class="form-control" id="validationCustom01" name="fpass" id="myInput2"></textarea>
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
	<?php include_once("context.php"); ?>
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
			document.getElementById("demo").innerHTML = x;
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
	$fpassword = $_POST['fpassword'];
	$fcode = $_POST['fcode'];
	$fid = $_POST['fid'];
	$fpass = $_POST['fpass'];
	// $fpass = password_hash($fpass, PASSWORD_BCRYPT);
	$fs_name = $fcode . ".png";

	$sql = "INSERT INTO facultymaster(
			FacultyUserName,
			FacultyPassword,
			FacultyFirstName,
			FacultyMiddleName,
			FacultyLastName,
			FacultyProfilePic,
			FacultyBranchCode,
			FacultyEmail,
			FacultyContactNo,
			FacultyQualification,
			FacultyOffice,
			FacultyCode
		)
		VALUES(
			'$fid',
			'$fpass',
			'$fname',
			'$mname',
			'$lname',
			'$fs_name',
			'$fbranch',
			'$femail',
			'$fcontact',
			'$fquali',
			'$foffice',
			'$fcode'
	);";
	try {
		$run = mysqli_query($conn, $sql);
		if ($run == true) {
			if ($f_error === 0) {
				if ($f_size <= 1000000) {
					move_uploaded_file($f_tmp_name, "../src/uploads/facprofile/" . $fs_name); // Moving Uploaded File to Server ... to uploades folder by file name f_name ... 
				} else {
					echo "<script>alert(File size is to big .. !);</script>";
				}
			} else {
				echo "Something went wrong .. !";
			}
			echo "<script>alert('Faculty Added Successfully')</script>";
			echo "<script>window.open('faculty_list.php','_self')</script>";
		} else {
			echo "<script>alert('Faculty Not Added')</script>";
			echo "<script>window.open('add_faculty.php','_self')</script>";
		}
	} catch (Exception $e) {
		echo "<script>alert('Faculty Not Added')</script>";
		echo "<script>window.open('add_faculty.php','_self')</script>";
	}
}
?>