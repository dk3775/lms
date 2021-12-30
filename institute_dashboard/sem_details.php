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
			<div class="header">
				<!-- HEADER -->
				<div class="header">
					<div class="container-fluid">
						<!-- Body -->
						<div class="header-body">
							<div class="row align-items-end">
								<div class="col">
									<!-- Pretitle -->
									<h6 class="header-pretitle">
										Branch
									</h6>
									<!-- Title -->
									<h1 class="header-title">
										Profile
									</h1>
								</div>
							</div>
							<!-- / .row -->
						</div>
						<!-- / .header-body -->
					</div>
				</div>
				<!-- / .header -->
				<?php
					include_once("../config.php");
					$studentenr = $_GET['brid'];
					$_SESSION["userrole"] = "Institute";
					if (isset($studentenr)) {
						$sql = "SELECT * FROM branchmaster WHERE BranchCode = '$studentenr'";
						$result = mysqli_query($conn, $sql);
						$row = mysqli_fetch_assoc($result);
					
					?>
				<br><br>
				<div class="container-fluid">
					<!-- Body -->
					<div class="header-body mt-n5 mt-md-n6">
						<div class="row align-items-center">
							<div class="col mb-3 ml-n3 ml-md-n2">
								<h1 class="header-title">
									<?php echo $row['BranchName']; ?>
								</h1>
								<h5 class="header-pretitle mt-2">
									<?php echo $row['BranchCode']; ?>
								</h5>
							</div>
							<div class="col-12 col-md-auto mt-2 mt-md-0 mb-md-3">
								<!-- Button -->
								<a href="edit_branch.php?brid=<?php echo $row['BranchId']; ?>" class="btn btn-primary d-block d-md-inline-block btn-md">
								Edit Details
								</a>
							</div>
						</div>
						<hr class="navbar-divider my-4">
						<!-- / .row -->
						<div class="row align-items-center">
							<div class="col col-md-10">
								<!-- Nav --> 
								<ul class="nav nav-tabs nav-overflow header-tabs">
									<?php 
										$a = 1; 
										while ($a <= $row['BranchSemesters']) { ?> 
									<li class="nav-item" > 
										<a href="sem_details.php?semid=<?php echo $row['BranchCode']."_".$a; ?>&brid=<?php echo $row['BranchCode']; ?>" class="nav-link h3 <?php if($_GET['semid'] == $row['BranchCode']."_".$a){echo "active";}?>"> 
										Sem <?php echo $a; ?> 
										</a> 
									</li>
									<?php $a++; 
										} 
										?> 
								</ul>
							</div>
							<div class=" col-md-auto mt-2 mt-md-0 mb-md-3">
								<!-- Nav --> 
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
								<a href="add_subject.php?brid=<?php echo $row['BranchID']; ?>" type="button" class="btn btn-primary"> 
								Add Subject 
								</a> 
							</div>
						</div>
					</div>
					<!-- / .header-body -->
				</div>
			</div>
			<!-- CONTENT -->
			<div class="container-fluid">
				<div class="row">
					<?php
						$C=$_GET['semid'];
						$ssql = "Select * from semestermaster where SemCode = '$C'";
						$subsql = "Select *, FacultyFirstName, FacultyLastname from subjectmaster INNER JOIN facultymaster on subjectmaster.SubjectFacultyId=facultymaster.FacultyId where SemCode = '$C'";
						$sresult = mysqli_query($conn, $ssql);
						$subresult = mysqli_query($conn, $subsql);
						$rowww=mysqli_fetch_assoc($sresult);
						$sac = 1;
						while($sac <= $rowww['SemSubjectCount'] and $roww=mysqli_fetch_assoc($subresult)){ ?>
					<div class="col-12 col-md-4 mb-md-5">
						<div class="card-group">
							<div class="card">
								<img src="../assets/img/files/file-3.jpg" class="card-img-top" alt="...">
								<div class="card-body">
									<h5 class="card-title"><?php echo $roww['SubjectName']; ?></h5>
									<p class="card-text"><?php echo $roww['SubjectCode']; ?></p>
									<p class="card-text"><?php echo $roww['FacultyFirstName']." ".$roww['FacultyLastName']; ?></p>
								</div>
							</div>
						</div>
					</div>
					<?php
						$sac++;
						}
						?>
				</div>
			</div>
			<?php
				} else {
					$er = $_GET['brid'];
					$qur = "SELECT * FROM branchmaster WHERE BranchCode = '$er';";
					$res = mysqli_query($conn, $qur);
					$row = mysqli_fetch_assoc($res);
					if (isset($row)) { ?>
			<div class="container-fluid">
				<hr class="navbar-divider my-4">
				<div class="card">
					<div class="card-body">
						<div class="row align-items-center">
							<div class="col ml-n2">
								<h4 class="mb-1">
									<a href="branch_profile.php"><?php echo $row['BranchName']; ?></a>
								</h4>
								<p class="small mb-1">
									<?php echo $row['BranchCode']; ?>
								</p>
							</div>
							<div class="col-auto">
								<a href="branch_profile.php?brid=<?php echo $row['BranchId']; ?>" class="btn btn-m btn-primary d-none d-md-inline-block">
								View
								</a>
							</div>
						</div>
						<!-- / .row -->
					</div>
					<!-- / .card-body -->
				</div>
			</div>
			<?php
				}
				}
				?>
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
<?php } ?>