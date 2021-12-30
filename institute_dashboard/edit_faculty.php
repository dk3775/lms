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
											Faculty Details
										</h1>
									</div>
								</div>
								<!-- / .row -->
							</div>
						</div>
						<!-- Form -->
						<?php
						include_once("../config.php");
						$studentenr = $_GET['facid'];
						$_SESSION["userrole"] = "institute";
						if (isset($studentenr)) {
							$sql = "SELECT * FROM facultymaster WHERE FacultyCode = '$studentenr'";
							$result = mysqli_query($conn, $sql);
							$row = mysqli_fetch_assoc($result);

						?>
							<form method="POST" enctype="multipart/form-data">
								<div class="row justify-content-between align-items-center">
									<div class="col">
										<div class="row align-items-center">
											<div class="col-auto">
												<!-- Personal details -->
												<!-- Avatar -->
												<div class="avatar">
													<img class="avatar-img rounded-circle" id="IMG-preview" src="../src/uploads/facprofile/<?php echo $row['FacultyProfilePic']; ?>" alt="...">
												</div>
											</div>
											<div class="col ml-n2">
												<!-- Heading -->
												<h4 class="mb-1">
													Faculty Photo
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
                                <input type="file" id="img" name="stuprofile" class="btn btn-sm"
                                    onchange="showPreview(event);" accept="image/jpg, image/jpeg, image/png">
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
											<input type="text" class="form-control" name="fname" value="<?php echo $row['FacultyFirstName']; ?>" required>
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
											<input type="text" class="form-control" name="mname" value="<?php echo $row['FacultyMiddleName']; ?>" required>
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
											<input type="text" class="form-control" name="lname" value="<?php echo $row['FacultyLastName']; ?>" required>
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
											<input type="email" class="form-control" name="femail" value="<?php echo $row['FacultyEmail']; ?>" required>
										</div>
									</div>
									<div class="col-12 col-md-6">
										<label class="form-label">
											Faculty Contact Number
										</label>
										<input type="tel" pattern="[0-9]{10}" class="form-control" maxlength="10" name="fcontact" value="<?php echo $row['FacultyContactNo']; ?>" required>
									</div>
								</div>
								<?php
									$branchsel = "SELECT * FROM branchmaster";
									$branchresult = mysqli_query($conn, $branchsel);
								?>
								<div class="row">
									<div class="col-12 col-md-6">
										<!-- Email address -->
										<div class="form-group">
											<!-- Label -->
											<label class="form-label">
												Faculty Office
											</label>
											<!-- Input -->
											<input type="text" class="form-control" name="foffice" value="<?php echo $row['FacultyOffice']; ?>" required>
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
											<select id="validationCustom01" class="form-control" name="fbranch" required>
											<option value="" hidden="">Select Branch</option>
											<?php
												while($brrow = mysqli_fetch_assoc($branchresult)){ ?>
											<option <?php if($brrow['BranchCode'] == $row['FacultyBranchCode']){ ?> selected <?php } ?> value="<?php echo $brrow['BranchCode']; ?>">
												<?php echo $brrow['BranchName']; ?> 
											</option>
											<?php
												} ?>
										</select>
											<input type="text" class="form-control" name="fbranch" required value="<?php echo $row['FacultyBranch']; ?>" placeholder="YYYY-MM-DD">
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
											<input type="text" class="form-control" name="fqualification" value="<?php echo $row['FacultyQualification']; ?>" required>
										</div>
									</div>
									<div class="col-12 col-md-6">
										<div class="form-group">
											<label class="form-label">
												Faculty Code
											</label>
											<input type="text" id="myInput" oninput="cp()" class="form-control" value="<?php echo $row['FacultyCode']; ?>" name="fcode" required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-12 col-md-6">
										<label class="form-label">
											Faculty Subject
										</label>
										<input type="text" class="form-control" name="fsubject" value="<?php echo $row['FacultySubject']; ?>" required>
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
											<textarea id="demo" class="form-control fs-2" name="ec" readonly maxlength="4">ST<?php echo $row['FacultyUserName']; ?></textarea>
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
											<textarea type="text" class="form-control" name="fpassword" id="myInput2"><?php echo $row['FacultyPassword']; ?></textarea>
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
						<?php
						} else { ?>
							<form class="mb-4" method="post">
								<div class="row">
									<div class="col-md-10">
										<div class="input-group input-group-merge input-group-reverse">
											<input class="form-control list-search" type="text" name="enr" placeholder="Enter Faculty Id">
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
								$qur = "SELECT * FROM facultymaster WHERE FacultyId = '$er';";
								$res = mysqli_query($conn, $qur);
								$row = mysqli_fetch_assoc($res);
								if (isset($row)) { ?>
									<hr class="navbar-divider my-4">
									<div class="card">
										<div class="card-body">
											<div class="row align-items-center">
												<div class="col-auto">
													<a href="profile-posts.html" class="avatar avatar-lg">
														<img src="../src/uploads/facprofile/<?php echo $row['FacultyProfilePic']; ?>" alt="..." class="avatar-img rounded-circle">
													</a>
												</div>
												<div class="col ml-n2">
													<!-- Title -->
													<h4 class="mb-1">
														<a href="profile-posts.html"><?php echo $row['FacultyFirstName'] . " " . $row['FacultyLastName']; ?></a>
													</h4>
													<!-- Text -->
													<p class="small mb-1">
														<?php echo $row['FacultyCode']; ?>
													</p>
													<!-- Status -->
													<p class="small mb-1">
														<?php echo $row['FacultyBranch']; ?>
													</p>
												</div>
												<div class="col-auto">
													<!-- Button -->
													<a href="edit_faculty.php?facid=<?php echo $row['FacultyCode']; ?>" class="btn btn-m btn-primary d-none d-md-inline-block">
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
		$fid = $row['FacultyId'];

		$fs_name = $fcode . ".png";

		if ($f_error === 0) {
			if ($f_size <= 1000000) {
				move_uploaded_file($f_tmp_name, "../src/uploads/stuprofile/" . $fs_name); // Moving Uploaded File to Server ... to uploades folder by file name f_name ... 
			} else {
				echo "<script> alert(File size is to big .. !);</script>";
			}
		} else {
			echo "Something went wrong .. !";
		}
		$sqli = "UPDATE facultymaster SET FacultyFirstName='$fname', FacultyMiddleName='$mname',FacultyLastName='$lname', FacultyContactNo='$fcontact', FacultyEmail='$femail', FacultyOffice='$foffice', FacultyBranch='$fbranch', FacultyQualification='$fquali', FacultySubject='$fsubject', FacultyPassword='$fpassword', FacultyCode='$fcode'  WHERE FacultyId = '$fid';";
		$runed = mysqli_query($conn, $sqli);
		if ($runed == true) {
			echo "<script>alert('Faculty Details Edited Successfully')</script>";
			echo "<script>window.open('faculty_list.php','_self')</script>";
		} else {
			echo "<script>alert('Error Occured')</script>";
			echo "<script>window.open('edit_faculty.php','_self')</script>";
		}
	}
	?>