<?php
session_start();
if ($_SESSION['role'] != "Texas") {
	header("Location: ../index.php");
} else {
	include_once("../config.php");
	$_SESSION["userrole"] = "Institute";
	$id = $_SESSION['name'];
	$sql = "SELECT * FROM institutemaster WHERE InstituteId = '$id'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
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
										Change
									</h6>
									<!-- Title -->
									<h1 class="header-title">
										Profile Pic
									</h1>
								</div>
							</div>
							<!-- / .row -->
						</div>
					</div>
					<!-- Form -->
					<form method="POST" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
						<div class="card">
							<div class="card-body text-center">
								<div class="row justify-content-center">
									<div class="col-12 col-md-12 col-xl-5">
										<!-- Image -->

										<img src="../src/uploads/inprofile/<?php echo $row['InstituteProfilePic'] . "?t=" . time(); ?>" id="IMG-preview" alt="..." class="img-fluid mb-3 rounded" style="margin:auto; max-width: 80%;">
										<!-- Title -->
									</div>
									<div class="row justify-content-center">
										<div class="col-12 col-md-6 m-auto">
											<!-- Heading -->
											<!-- Text -->
											<small class="text-muted">
												Only allowed SVG, PNG or JPG less than 4MB
											</small>
										</div>
										<div class="col-12 col-md-6">
											<input type="file" id="img" name="profilePic" class="btn btn-sm" onchange="showPreview(event);" accept="image/png, image/jpg, image/jpeg" required>
										</div>
									</div>
								</div>
								<!-- / .row -->
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

						<hr>
						<div class="d-flex justify">
							<!-- Button -->
							<button class="btn btn-primary" type="submit" value="sub" name="subbed">
								Change
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
</body>

</html>
<?php
if (isset($_POST['subbed'])) {

	$f_tmp_name = $_FILES['profilePic']['tmp_name'];
	$f_size = $_FILES['profilePic']['size'];
	$f_error = $_FILES['profilePic']['error'];

	$tt_name = $row['InstituteUserName'] . ".png";

	if ($f_error === 0) {
		if ($f_size <= 2000000) {
			if (move_uploaded_file($f_tmp_name, "../src/uploads/inprofile/" . $tt_name)) {
				echo "<script>alert('Profile Pic Changed SuccessFully');</script>";
				echo "<script>window.open('index.php','_self')</script>";
			} // Moving Uploaded File to Server ... to uploades folder by file name f_name ... 
		} else {
			echo "<script>alert('File size is to big .. !');</script>";
		}
	} else {
		echo "Something went wrong .. !";
	}
}
?>