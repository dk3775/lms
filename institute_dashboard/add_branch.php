<?php
session_start();
error_reporting(E_ALL ^ E_WARNING);
if ($_SESSION['role'] != "Texas") {
	header("Location: ../index.php");
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
	<?php
	$nav_role = "Branch";
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
										Branch
									</h1>
								</div>
							</div>
							<!-- / .row -->
						</div>
					</div>
					<!-- Form -->
					<br>
					<form method="POST" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>

						<div class="row">
							<div class="col-md-6">
								<label for="validationCustom01" class="form-label">Branch code</label>
								<input type="text" class="form-control" id="validationCustom01" name="icode" placeholder="001" required><br>
							</div>
							<div class="col-md-6">
								<label for="validationCustom01" class="form-label">Branch name</label>
								<input type="text" class="form-control" id="validationCustom01" name="iname" placeholder="Computer Engineering" required><br>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<label for="validationCustom01" class="form-label">No of Semesters</label>
								<select id="validationCustom01" class="form-control" name="isem" required>
									<option value="" hidden="">Select Semesters</option>
									<?php for ($count = 1; $count < 9; $count++) { ?>
										<option value="<?php echo $count; ?>"><?php echo $count; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<!-- Divider -->
						<hr class="mt-4 mb-5">
						<div class="d-flex justify">
							<!-- Button -->
							<button class="btn btn-primary" type="submit" value="sub" name="subbed">
								Add Branch
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

</body>

</html>

<?php
if (isset($_POST['subbed'])) {

	extract($_POST);

	$sql = "INSERT INTO branchmaster (BranchName,BranchCode,BranchSemesters) VALUES ('$iname', '$icode','$isem' );";
	$run = mysqli_query($conn, $sql);
	if ($run == true) {
		echo "<script>alert('Branch Added Successfully')</script>";
		echo "<script>window.open('branch_list.php','_self')</script>";
	} else {
		echo "<script>alert('Branch Not Added')</script>";
		echo "<script>window.open('add_branch.php','_self')</script>";
	}
}
?>