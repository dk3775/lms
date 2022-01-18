<?php
error_reporting(E_ALL ^ E_WARNING);
session_start();
if ($_SESSION['role'] != "Lagos") {
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
		<?php include_once("nav.php"); ?>
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
											Assignment Details
										</h1>
									</div>
								</div>
								<!-- / .row -->
							</div>
						</div>
						<!-- Form -->
						<?php
						include_once("../config.php");
						$assid = $_GET['assid'];
						$_SESSION["userrole"] = "institute";
						if (isset($assid)) {
							$sql = "SELECT * FROM assignmentmaster WHERE AssignmentId = '$assid'";
							$result = mysqli_query($conn, $sql);
							$row = mysqli_fetch_assoc($result);

                            $username = $_SESSION['id'];
                            $subsel = "SELECT * FROM subjectmaster INNER JOIN facultymaster ON `subjectmaster`.`SubjectFacultyId` = `facultymaster`.`FacultyId` WHERE `FacultyUserName` = '$username'";
                            $subresult = mysqli_query($conn, $subsel);
						?>
							<form method="POST" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
							<div class="row justify-content-between align-items-center">
								<div class="col">
									<div class="row align-items-center">
									
										<div class="col ml-n2">
											<!-- Heading -->
											<h4 class="mb-1">
												Assignment File
											</h4>
											<!-- Text -->
											<small class="text-muted">
												Only allowed PDF less than 5MB
											</small>
										</div>
									</div>
									<!-- / .row -->
								</div>
								<div class="col-auto">
									<!-- Button -->
									<input type="file" id="img" name="assfile" class="btn btn-sm" onchange="showPreview(event);" accept="appliction/pdf">
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
										if (fsize <= 5000000) {
											var src = URL.createObjectURL(event.target.files[0]);
											var preview = document.getElementById("IMG-preview");
											preview.src = src;
											preview.style.display = "block";
										} else {
											alert("Only allowed less then 5MB.. !");
											file.value = '';
										}
									}
								}
							</script>
							<hr class="my-5">
							<div class="row">
								<div class="col-md-12">
									<label for="validationCustom01" class="form-label">Assignment Name</label>
									<input type="text" class="form-control" id="validationCustom01" name="assname" value="<?php echo $row['AssignmentName']; ?>" required><br>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-6">
									<label for="validationCustom01" class="form-label">Assignment Subject</label>
									<select class="form-control" aria-label="Default select example" name="asssubject" required>
										<option hidden>Select Subject</option>
										<?php
											while($subrow = mysqli_fetch_assoc($subresult)){ ?>
										<option <?php if ($row['AssignmentSubject'] == $subrow['SubjectName']) {?> selected <?php }?> value="<?php echo $subrow['SubjectName']; ?>">
											<?php echo $subrow['SubjectName']; ?> 
										</option>
										<?php
										$assupd = $subrow['SubjectFacultyId'];
											} 
											?>
									</select>
									<br>
								</div>
								<div class="col-md-6">
									<label for="validationCustom01" class="form-label">Assignment Last Date</label>
									<input type="date" id="validationCustom01" class="form-control" name="assldate" value="<?php echo $row['AssignmentSubmissionDate']; ?>" required data-flatpickr placeholder="YYYY-MM-DD"><br>
								</div>
							</div>
							
							<!-- Divider -->
							<hr class="mt-4 mb-5">
						
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
											<input class="form-control list-search" type="text" name="enr" placeholder="Enter Assignment Name">
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
								$qur = "SELECT * FROM assignmentmaster WHERE AssignmentName = '$er';";
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
														<a href="profile-posts.html"><?php echo $row['AssignmentName']; ?></a>
													</h4>

													<!-- Text -->
													<p class="small mb-1">
														<?php echo $row['AssignmentSubject']; ?>
													</p>
													<p class="small mb-1">
														<?php echo $row['AssignmentUploadeTime']." -- ".$row['AssignmentSubmissionDate']; ?>
													</p>

												</div>
												<div class="col-auto">

													<!-- Button -->
													<a href="edit_assignment.php?assid=<?php echo $row['AssignmentId']; ?>" class="btn btn-m btn-primary d-none d-md-inline-block">
														Edit
													</a>

												</div>
											</div> 
										</div>
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
			</div>
		</div>
		
	<?php include("context.php");?>
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
		
		$fs_name = $_FILES['assfile']['tmp_name'];
		$fs_size = $_FILES['assfile']['size'];
		$fs_error = $_FILES['assfile']['error'];

		$assname = $_POST['assname'];
		$asssubject = $_POST['asssubject'];
		$assldate = $_POST['assldate'];
		$dt = date('Y-m-d');
		
		$asssem = "SELECT SubjectSemester FROM subjectmaster WHERE SubjectName = '$asssubject'";
		$semres = mysqli_fetch_assoc(mysqli_query($conn, $asssem));
		$sem = $semres['SubjectSemester'];
		$assfile = $assname . ".pdf";

		$sqli = "UPDATE `assignmentmaster` SET 
        `AssignmentName`='$assname',
        `AssignmentSubject`='$asssubject',
        `AssignmentUploadedBy`='$assupd',
        `AssignmentFile`='$assfile',
        `AssignmentForSemester`='$sem',
        `AssignmentSubmissionDate`='$assldate' 
        WHERE `AssignmentId` = '$assid';";
        
		$runed = mysqli_query($conn, $sqli);
		if ($runed == true) {
			echo "<script>alert('Assignment Edited Successfully')</script>";
			echo "<script>window.open('assignment_list.php','_self') </script>";
		} else {
			echo "<script>alert('Error Occured')</script>";
			echo "<script>window.open('edit_assignment.php','_self')</script>";
		}
	}
	?>