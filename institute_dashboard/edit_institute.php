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
											Institute Details
										</h1>
									</div>
								</div>
								<!-- / .row -->
							</div>
						</div>
						<!-- Form -->
						<?php
							include_once("../config.php");
							$insid = $_GET['insid'];
							$_SESSION["userrole"] = "Faculty";
							if (isset($insid)) {
								$sql = "SELECT * FROM institutemaster WHERE InstituteId = '$insid'";
								$result = mysqli_query($conn, $sql);
								$row = mysqli_fetch_assoc($result);
							
							?>
						 <form method="POST" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                     <div class="row justify-content-between align-items-center">
                        <div class="col">
                           <div class="row align-items-center">
                              <div class="col-auto">
                                 <!-- Personal details -->
                                 <!-- Avatar -->
                                 <div class="avatar">
                                    <img name="inIMG" class="avatar-img rounded-circle"
                                       src="../src/uploads/inprofile/<?php echo $row['InstituteProfilePic'] ?>" alt="..."
                                       id="IMG-preview">
                                 </div>
                              </div>
                              <div class="col ml-n2">
                                 <!-- Heading -->
                                 <h4 class="mb-1">
                                    User Photo
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
                           <input type="file" id="img" name="inprofile" class="btn btn-sm"
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

                     <!-- / .row -->
                     <hr class="my-5">
                     <div class="row">
                        <div class="col-12 col-md-6">
                           <div class="form-group">
                              <label for="validationCustom01" class="form-label">
                              Institute User Name <small class="text-muted"> ( For Login ) </small>
                              </label>
							  <input type="text" class="form-control" id="validationCustom01" name="inusername" value="<?php echo $row['InstituteUserName']; ?>"
                                 required> </div>
                        </div>
                        <div class="col-12 col-md-6">
                           <label for="validationCustom01" class="form-label">
                           Password
                           </label>
                             <input type="password" class="form-control" id="validationCustom01" name="inpass" value="<?php echo $row['InstitutePassword']; ?>"
                                 required>
                        </div>
                     </div>
                     <hr class="md-5">
                     <div class="row">
                        <div class="col-12 col-md-12">
							<div class="form-group">
                           <label for="validationCustom01" class="form-label">
							   User Full Name
							</label>
                           <input type="text" class="form-control" id="validationCustom01" name="inname" value="<?php echo $row['InstituteName']; ?>" required>
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
                              User Email address
                              </label>
                              <!-- Input -->
                              <input type="email" class="form-control" id="validationCustom01" value="<?php echo $row['InstituteEmail']; ?>" name="inemail"
                                 required>
                           </div>
                        </div>
                        <div class="col-12 col-md-6">
                           <label for="validationCustom01" class="form-label">
                           User Contact Number
                           </label>
                           <input type="tel" pattern="[0-9]{10}" maxlength="10" id="validationCustom01" value="<?php echo $row['InstituteContactNo']; ?>" class="form-control" name="incontact" required>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-12 col-md-6">
                           <!-- Email address -->
                           <div class="form-group">
                              <!-- Label -->
                              <label for="validationCustom01" class="form-label">
                              User Role
                              </label>
                              <!-- Input -->
                              <input type="text" class="form-control" value="<?php echo $row['InstituteRole']; ?>" id="validationCustom01" name="inrole"
                                 required>
                           </div>
                        </div>
                        <div class="col-12 col-md-6">
                           <label for="validationCustom01" class="form-label">
                           User Office
                           </label>
                           <input type="text" maxlength="10" id="validationCustom01" value="<?php echo $row['InstituteOffice']; ?>" class="form-control" name="inoffice" required>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-12">
                           <!-- Email address -->
                           <div class="form-group">
                              <!-- Label -->
                              <label for="validationCustom01" class="form-label">
                              User Address
                              </label>
                              <!-- Input -->
                              <textarea id="validationCustom01" rows="2" maxlength="200" class="form-control" name="add" required><?php echo $row['InstituteAddress']; ?></textarea>
                           </div>
                        </div>
                        
                     </div>
                     <hr class="mt-4 mb-5">
                     <div class="d-flex justify">
                        <!-- Button -->
                        <button class="btn btn-primary" type="submit" value="sub" name="subbed">
                        Edit Institute User
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
										<input class="form-control list-search" type="text" name="enr" placeholder="Enter Name">
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
								$name = $_POST['enr'];
								$qur = "SELECT * FROM institutemaster WHERE InstituteName = '$name';";
								$res = mysqli_query($conn, $qur);
								$row = mysqli_fetch_assoc($res);
								if (isset($row)) { ?>
						<hr class="navbar-divider my-4">
						<div class="card">
							<div class="card-body">
								<div class="row align-items-center">
									<div class="col-auto">
										<a href="profile-posts.html" class="avatar avatar-lg">
										<img src="../src/uploads/inprofile/<?php echo $row['InstituteProfilePic']; ?>" alt="..." class="avatar-img rounded-circle">
										</a>
									</div>
									<div class="col ml-n2">
										<!-- Title -->
										<h4 class="mb-1">
											<a href="profile-posts.html"><?php echo $row['InstituteName']; ?></a>
										</h4>   
										<!-- Text -->
										<p class="small mb-1">
											<?php echo $row['InstituteEmail']; ?>
										</p>
										<!-- Status -->
										<p class="small mb-1">
											<?php echo $row['InstituteRole']; ?>
										</p>
									</div>
									<div class="col-auto">
										<!-- Button -->
										<a href="edit_institute.php?insid=<?php echo $row['InstituteId']; ?>" class="btn btn-m btn-primary d-none d-md-inline-block">
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
							}
							?>
						<br>
					</div>
				</div>
				<!-- / .row -->
			</div>
		</div>
      <?php include_once("context.php"); ?>
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
        $f_tmp_name = $_FILES['inprofile']['tmp_name'];
        $f_size = $_FILES['inprofile']['size'];
        $f_error = $_FILES['inprofile']['error'];
    
        $inname = $_POST['inname'];
        $inemail = $_POST['inemail'];
        $incontact = $_POST['incontact'];
        
        $add = $_POST['add'];
        $inusername = $_POST['inusername'];
        $inpass = $_POST['inpass'];
        // $spass = password_hash($spassword,PASSWORD_BCRYPT); //hashing the $spassword 
        $inrole = $_POST['inrole'];
        $inoffice = $_POST['inoffice'];
        
        $fs_name = $inusername.".png";
    
        if ($f_error === 0) {
            if ($f_size <= 2000000) {
                move_uploaded_file($f_tmp_name, "../src/uploads/inprofile/" . $fs_name); // Moving Uploaded File to Server ... to uploades folder by file name f_name ... 
            } else {
                echo "<script>alert(File size is to big .. !);</script>";
            }
        } else {
            echo "Something went wrong .. !";
        }
        $sql = "UPDATE `institutemaster` SET `InstituteUserName`='$inusername',
        `InstitutePassword`='$inpass',
        `InstituteName`='$inname',
        `InstituteRole`='$inrole',
        `InstituteProfilePic`='$fs_name',
        `InstituteEmail`='$inemail',
        `InstituteOffice`='$inoffice',
        `InstituteContactNo`='$incontact',
        `InstituteAddress`='$add' WHERE `InstituteId`='$insid'";
        $run = mysqli_query($conn, $sql);
        if ($run == true) {
            echo "<script>alert('Institute User Edited Successfully')</script>";
            echo "<script>window.open(institute_list.php','_self')</script>";
        } else {
            echo "<script>alert('Institute User Not Edited')</script>";
            // echo "<script>window.open('add_student.php','_self')</script>";
        }

	}
?>