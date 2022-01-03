<?php
	error_reporting(E_ALL ^ E_WARNING);
	session_start();
	if ($_SESSION['role'] != "Texas") {
		header("Location: ../default.php");
	} else {
		include_once("../config.php");
		$_SESSION["userrole"] = "Institute";
		if(isset($_GET['brid']) && isset($_GET['semid'])){
		$brcode = $_GET['brid'];
		$facsel = "SELECT * FROM facultymaster WHERE FacultyBranchCode = '$brcode'";
		$facresult = mysqli_query($conn, $facsel);
		$branchsel = "SELECT * FROM branchmaster where BranchCode = '$brcode'";
		$branchresult = mysqli_query($conn, $branchsel);
		$brow = mysqli_fetch_assoc($branchresult);
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
											Subject Details
										</h1>
									</div>
								</div>
								<!-- / .row -->
							</div>
						</div>
						<!-- Form -->
						<?php
							include_once("../config.php");
							$sid = $_GET['subid'];
							$_SESSION["userrole"] = "institute";
							if (isset($sid)) {
								$sql = "SELECT * FROM subjectmaster WHERE SubjectCode = '$sid'";
								$result = mysqli_query($conn, $sql);
								$row = mysqli_fetch_assoc($result);
							?>
						<form method="POST" enctype="multipart/form-data">
							<div class="row justify-content-between align-items-center">
								<div class="col">
									<div class="row align-items-center">
										<div class="col-auto">
											<div class="avatar">
												<img name="simg" class="w-100 border-radius-lg shadow-sm rounded" src="../src/uploads/subprofile/<?php echo $row['SubjectPic']; ?>" alt	="..." id="IMG-preview">
											</div>
										</div>
										<div class="col ml-n2">
											<h4 class="mb-1">
												Subject Photo
											</h4>
											<small class="text-muted">
											Only allowed PNG or JPG less than 2MB
											</small>
										</div>
									</div>
									<!-- / .row -->
								</div>
								<div class="col-auto">
									<!-- Button -->
									<input type="file" id="img" name="subprofile" class="btn btn-sm" onchange="showPreview(event);" accept="image/jpg, image/jpeg, image/png">
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
							<hr class="my-5">
							<div class="row">
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label class="form-label">
										Subject Code
										</label>
										<input type="text" class="form-control" name="icode" value="<?php echo $row['SubjectCode']; ?>" required>
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label class="form-label">
										Subject Name
										</label>
										<input type="text" class="form-control" name="iname" value="<?php echo $row['SubjectName']; ?>" required>
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label class="form-label">
										Branch ID
										</label>
										<input type="text" class="form-control" name="ibranch" value="<?php echo $row['SubjectBranch']; ?>" required>
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label class="form-label">
										Semester
										</label>
										<select class="form-select" aria-label="Default select example" name="isem" required>
											<option hidden><?php echo $row['SubjectSemester']; ?></option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">6</option>
										</select>
										<br>
									</div>
								</div>
								<div class="col-12 col-md-6">
									<!-- Middle name -->
									<div class="form-group">
										<!-- Label -->
										<label class="form-label">
										Faculty ID
										</label>
										<!-- Input -->
										<input type="text" class="form-control" name="ifac" value="<?php echo $row['SubjectFacultyId']; ?>" required>
									</div>
								</div>
								<div class="col-12 col-md-6">
									<!-- Middle name -->
									<div class="form-group">
										<!-- Label -->
										<label class="form-label">
										Syllabus
										</label>
										<!-- Input -->
										<input type="file" style="background-color : #F9FBFD;" class="form-control border-0" id="validationCustom01" name="isyllabus" accept="application/pdf" required><br>
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
										<input class="form-control list-search" type="text" name="enr" placeholder="Enter Subject Code">
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
								$qur = "SELECT * FROM subjectmaster WHERE SubjectCode = '$er';";
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
											<a href="profile-posts.html"><?php echo $row['SubjectName']; ?></a>
										</h4>
										<!-- Text -->
										<p class="small mb-1">
											<?php echo $row['SubjectCode']; ?>
										</p>
										<p class="small mb-1">
											<?php echo $row['SubjectBranch']; ?>
										</p>
									</div>
									<div class="col-auto">
										<a href="edit_subject.php?subid=<?php echo $row['SubjectCode']; ?>" class="btn btn-m btn-primary d-none d-md-inline-block">
										Edit
										</a>
									</div>
								</div>
								<!-- / .row -->
							</div>
							<!-- / .card-body -->
						</div>
						<?php
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
	
		$fs_name = $_FILES['subprofile']['tmp_name'];
		$f_size = $_FILES['subprofile']['size'];
		$f_error = $_FILES['subprofile']['error'];
		extract($_POST);
		$temo = $brow['BranchId'];
		$temo2 = $brow['BranchCode']."_".$isem;
		$iimg = $icode.".png";
	
		if ($f_error === 0) {
			if ($f_size <= 2000000) {
				move_uploaded_file($fs_name, "../src/uploads/subprofile/" . $iimg); // Moving Uploaded File to Server ... to uploades folder by file name f_name ... 
			} else {
				echo "<script>alert(File size is to big .. !);</script>";
			}
		} else {
			echo "Something went wrong .. !";
		}
	
		$sqli = "UPDATE subjectmaster SET SubjectCode='$icode',SubjectName='$iname',SubjectBranch='$ibranch',SubjectSemester='$isem',SubjectFacultyId='$ifac',SubjectSyllabus='$isyllabus',SemCode='$temo2',SubjectPic='$iimg' WHERE SubjectCode='$sid';";
		$runed = mysqli_query($conn, $sqli);
		if ($runed == true) {
			echo "<script>alert('Subject Edited Successfully')</script>";
			echo "<script>window.open('edit_subject.php','_self')</script>";
		} else {
			echo "<script>alert('Error Occured')</script>";
			echo "<script>window.open('edit_subject.php','_self')</script>";
		}
	}
	}else{
		header("location: branch_profile.php");
	}
	}
	?>