<?php
session_start();
if ($_SESSION['role'] != "Texas") {
	header("Location: ../index.php");
} else {
	include_once("../config.php");
	$_SESSION["userrole"] = "Institute";
}

$branchsel = "SELECT * FROM branchmaster";
$branchresult = mysqli_query($conn, $branchsel);
$sqlsem = "SELECT * FROM branchmaster WHERE BranchCode = ";
$sqldata = "";
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php include_once("../head.php"); ?>
</head>

<body>
	<!-- NAVIGATION -->
	<?php
	$nav_role = "Student";
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
                                    <h5 class="header-pretitle mb-5">
                                        <a class="btn btn-sm btn-outline-info" onclick="history.back()"><i class="fe uil-angle-double-left"></i>Back</a>
                                    </h5>
									<!-- Pretitle -->
									<h6 class="header-pretitle">
										Add New
									</h6>
									<!-- Title -->
									<h1 class="header-title">
										Student
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
											<img name="StuIMG" class="avatar-img rounded-circle" src="../assets/img/avatars/profiles/avatar-1.jpg" alt="..." id="IMG-preview">
										</div>
									</div>
									<div class="col ml-n2">
										<!-- Heading -->
										<h4 class="mb-1">
											Student Photo
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
								<input type="file" id="img" name="stuprofile" class="btn btn-sm" onchange="showPreview(event);" accept="image/jpg, image/jpeg, image/png">
							</div>
						</div>
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
						<!-- / .row -->
						<!-- Divider -->
						<hr class="my-5">
						<div class="row">
							<div class="col-md-4">
								<label for="validationCustom01" class="form-label">First name</label>
								<input type="text" class="form-control" id="validationCustom01" name="fname" required>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="validationCustom01" class="form-label">Middle name</label>
									<input type="text" class="form-control" id="validationCustom01" name="mname" required>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="validationCustom01" class="form-label">Last name</label>
									<input type="text" class="form-control" id="validationCustom01" name="lname" required>
								</div>
							</div>
						</div>
						<!-- / .row -->
						<div class="row">
							<div class="col-12 col-md-6">
								<!-- Email address -->
								<div class="form-group">
									<!-- Label -->
									<label for="validationCustom01" class="form-label">
										Student Email address
									</label>
									<!-- Input -->
									<input type="email" class="form-control" id="validationCustom01" name="semail" required>
								</div>
							</div>
							<div class="col-12 col-md-6">
								<label for="validationCustom01" class="form-label">
									Student Contact Number
								</label>
								<input type="number" pattern="[0-9]{10}" maxlength="10" id="validationCustom01" class="form-control" name="scontact" required>
							</div>
						</div>
						<div class="row">
							<div class="col-12 col-md-6">
								<!-- Email address -->
								<div class="form-group">
									<!-- Label -->
									<label for="validationCustom01" class="form-label">
										Student Address
									</label>
									<!-- Input -->
									<input type="text" id="validationCustom01" class="form-control" name="add" required>
								</div>
							</div>
							<div class="col-12 col-md-6">
								<!-- Email address -->
								<div class="form-group">
									<!-- Label -->
									<label for="validationCustom01" class="form-label">
										Date of Birth
									</label>
									<!-- Input -->
									<input type="date" id="validationCustom01" class="form-control" name="dob" required data-flatpickr placeholder="YYYY-MM-DD">
								</div>
							</div>
						</div>
						<!-- / Personal details-->
						<hr class="my-5">
						<div class="row">
							<div class="col-12 col-md-6">
								<div class="form-group">
									<label for="validationCustom01" class="form-label">
										Parent's Contact Number
									</label>
									<input type="number" id="validationCustom01" maxlength="10" class="form-control" pattern="[0-9]{10}" name="pcontact" required>
								</div>
							</div>
							<div class="col-12 col-md-6">
								<label for="validationCustom01" class="form-label">
									Parent's Email
								</label>
								<input type="email" id="validationCustom01" class="form-control" name="pmail" required>
							</div>
						</div>
						<hr class="my-5">
						<!-- / .row -->
						<div class="row">
							<div class="col-12 col-md-6">
								<div class="form-group">
									<label for="validationCustom01" class="form-label">
										Student Enrollment No
									</label>
									<input id="myInput" oninput="cp()" type="number" pattern="[0-9]{12}" id="validationCustom01" class="form-control" name="senr" required>
								</div>
							</div>
							<div class="col-12 col-md-6">
								<div class="form-group">
									<label class="form-label">
										Student Roll No
									</label>
									<input type="number" maxlength="3" id="validationCustom01" class="form-control" name="sroll" required>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-12 col-md-6">
								<div class="form-group">
									<label for="validationCustom01" class="form-label">
										Student Branch
									</label>
									<select id="validationCustom01" class="form-control" name="sbranch" required>
										<option value="" hidden>Select Branch</option>
										<?php
										while ($brrow = mysqli_fetch_assoc($branchresult)) { ?>
											<option value="<?php echo $brrow['BranchCode']; ?>">
												<?php echo $brrow['BranchName']; ?>
											</option>
										<?php
										} ?>
									</select>
								</div>
							</div>

							<div class="col-12 col-md-6">
								<div class="form-group">
									<label for="validationCustom01" class="form-label">
										Student Semester
									</label>

									<select class="form-control" id="validationCustom01" name="ssem" required>
										<option value="" hidden>Select Semester</option>
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
									<textarea id="demo" class="form-control fs-2" name="ec" readonly maxlength="4"></textarea>
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
									<textarea type="text" class="form-control" readonly name="spassword" id="myInput2"></textarea>
									<button class="btn btn-primary" onclick="cp2()"><i class="fe fe-copy"></i></button>
								</div>
							</div>
						</div>
						<!-- Divider -->
						<hr class="mt-4 mb-5">
						<div class="d-flex justify">
							<!-- Button -->
							<button class="btn btn-primary" type="submit" value="sub" name="subbed">
								Add Student
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
			document.getElementById("demo").innerHTML = "ST" + x;

			let num = document.getElementById("myInput").value;
			let s = num.toString();
			let str = s.toString().split('').reverse().join('');
			let rev = str.substr(0, 4);

			document.getElementById("myInput2").innerHTML = rev;

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

	$spass = password_hash($spassword, PASSWORD_BCRYPT); //hashing the $spassword 
	// $slid = $_POST['slid'];
	$add = $_POST['add'];
	$dob = $_POST['dob'];
	$ec = $_POST['ec'];

	$fs_name = $senr . ".png";

	if ($f_error === 0) {
		if ($f_size <= 2000000) {
			move_uploaded_file($f_tmp_name, "../src/uploads/stuprofile/" . $fs_name); // Moving Uploaded File to Server ... to uploades folder by file name f_name ... 
		} else {
			echo "<script>alert(File size is to big .. !);</script>";
		}
	} else {
		echo "Something went wrong .. !";
	}
	$sql = "INSERT INTO studentmaster (StudentUserName, StudentDOB, StudentEnrollmentNo, StudentPassword, StudentFirstName, StudentMiddleName, StudentLastName, StudentProfilePic, StudentBranchCode, StudentSemester, StudentEmail, StudentContactNo, StudentAddress, ParentEmail, ParentContactNo, StudentRollNo) 
		VALUES ('$ec','$dob','$senr','$spassword','$fname','$mname','$lname','$fs_name','$sbranch','$ssem','$semail','$scontact','$add','$pmail','$pcontact','$sroll');";
	$run = mysqli_query($conn, $sql);
	if ($run == true) {
		echo "<script>alert('Student Added Successfully')</script>";
		echo "<script>window.open('student_list.php','_self')</script>";
	} else {
		echo "<script>alert('Student Not Added')</script>";
		echo "<script>window.open('add_student.php','_self')</script>";
	}
}
?>