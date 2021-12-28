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
											Edit
										</h6>
										<!-- Title -->
										<h1 class="header-title">
											Branch Details
										</h1>
									</div>
								</div>
								<!-- / .row -->
							</div>
						</div>
						<!-- Form -->
						<?php
						include_once("../config.php");
						$bid = $_GET['facid'];
						$_SESSION["userrole"] = "institute";
						if (isset($bid)) {
							$sql = "SELECT * FROM branchmaster WHERE BranchId = '$bid'";
							$result = mysqli_query($conn, $sql);
							$row = mysqli_fetch_assoc($result);

						?>
							<form method="POST" enctype="multipart/form-data">
								<div class="row">
									<div class="col-12 col-md-6">
										<div class="form-group">
											<label class="form-label">
												Branch Code
											</label>
											<input type="text" class="form-control" name="bcode" value="<?php echo $row['BranchCode']; ?>" required>
										</div>
									</div>
									<div class="col-12 col-md-6">
										<div class="form-group">
											<label class="form-label">
												Branch Name
											</label>
											<input type="text" class="form-control" name="bname" value="<?php echo $row['BranchName']; ?>" required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<label for="validationCustom01" class="form-label">No of Semesters</label>
										<input type="text" class="form-control" id="validationCustom01" name="bsem" value="<?php echo $row['BranchSemesters']; ?>" required><br>
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
											<input class="form-control list-search" type="text" name="enr" placeholder="Enter Branch ID">
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
								$qur = "SELECT * FROM branchmaster WHERE BranchId = '$er';";
								$res = mysqli_query($conn, $qur);
								$row = mysqli_fetch_assoc($res);
								if (isset($row)) { ?>
									<hr class="navbar-divider my-4">
									<div class="card">
										<div class="card-body">
											<div class="row align-items-center">
												<div class="col ml-n2">

													<!-- Title -->
													<h4 class="mb-1">
														<a href="profile-posts.html"><?php echo $row['BranchName']; ?></a>
													</h4>

													<!-- Text -->
													<p class="small mb-1">
														<?php echo $row['BranchCode']; ?>
													</p>

												</div>
												<div class="col-auto">

													<!-- Button -->
													<a href="edit_branch.php?facid=<?php echo $row['BranchId']; ?>" class="btn btn-m btn-primary d-none d-md-inline-block">
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

		extract($_POST);


		$sqli = "UPDATE branchmaster SET BranchName = '$bname', BranchCode = '$bcode', BranchSemesters = '$bsem' WHERE BranchId = '$bid';";
		$runed = mysqli_query($conn, $sqli);
		if ($runed == true) {
			echo "<script>alert('Branch Edited Successfully')</script>";
			echo "<script>window.open('edit_branch.php','_self') </script>";
		} else {
			echo "<script>alert('Error Occured')</script>";
			echo "<script>window.open('edit_branch.php','_self')</script>";
		}
	}
	?>