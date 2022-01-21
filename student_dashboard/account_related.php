<?php
	session_start();
	error_reporting(E_ALL ^ E_WARNING);
	if ($_SESSION['role'] != "Abuja") {
		header("Location: ../default.php");
	} else {
		include_once("../config.php");
		$_SESSION["userrole"] = "Student";
		
		$un = $_SESSION['id'];
		$stuqry = "SELECT * FROM studentmaster WHERE StudentUserName = '$un'";
		$sturesult = mysqli_fetch_assoc(mysqli_query($conn, $stuqry));
	}
	?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc." />
		<!-- Favicon -->
		<link rel="shortcut icon" href="../assets/favicon/favicon.ico" type="image/x-icon" />
		<!-- Map CSS -->
		<link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.css" />
		<!-- Libs CSS -->
		<link rel="stylesheet" href="../assets/css/libs.bundle.css" />
		<!-- Theme CSS -->
		<link rel="stylesheet" href="../assets/css/theme.bundle.css" />
		<!-- Title -->
		<title>LMS by Titanslab</title>
	</head>
	<body>
		<!-- NAVIGATION -->
		<?php include_once('nav.php'); ?> 
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
											New Request
										</h6>
										<!-- Title -->
										<h1 class="header-title">
											Account Related Help
										</h1>
									</div>
								</div>
								<!-- / .row -->
							</div>
						</div>
						<!-- select -->
						<form class="mb-4" method="post">
							<div class="row">
								<div class="col-md-10">
									<select class="form-control form-select-lg mb-3" name="sec" aria-label=".form-select-lg example">
										<option selected hidden>Select Request Type </option>
										<option value="1">Student Related Request</option>
										<option value="2">Parent Related Request</option>
									</select>
								</div>
								<div class="col-md-2">
									<div class="col-auto">
										<!-- Button -->
										<button class="col-12 btn-lg btn btn-primary " type="submit" name="ser" value="2">
										Select
										</button>
									</div>
								</div>
							</div>
						</form>
						<?php
							if (isset($_POST['sec'])) {
								if ($_POST['sec'] === '1') {
									$qrsub = "Student";
							    ?>
                    <hr class="mt-5 mb-5">
                    <h1 class="header-title">
                      Student Information Related Request
                    </h1>
                    <br>
					<?php
							} elseif ($_POST['sec'] === '2') {
								$qrsub = "Parent";
							?>
                    <hr class="mt-5 mb-5">
                    <h1 class="header-title">
                      Parent Information Related Request
                    </h1>
                    <br>
						<?php
							}
							?>
						<form method="POST" class="row g-3 needs-validation" novalidate>
							<div class="form-group">
								<!-- Label  -->
								<label class="form-label">
								Your Name
								</label>
								<!-- Input -->
								<input type="text" value="<?php echo $sturesult['StudentFirstName']." ".$sturesult['StudentLastName'];?>" name="arname" class="form-control" readonly>
								<input type="hidden" value="<?php echo $qrsub;?>" name="qrsub">
							</div>
							<!-- Project description -->
							<div class="form-group">
								<!-- Label -->
								<label class="form-label">
								Detail
								<small class="form-text text-muted">
								Enter details you want to edit
								</small>
								</label>
								<textarea id="demo" rows="4" class="form-control fs-2" name="ardetails" required></textarea>
							</div>
							<hr class="mt-3">
							<!-- Buttons -->
							<input class="btn btn-block btn-primary mb-5" type="submit" name="sub">
						</form>
						<?php
							}
							?>
					</div>
				</div>
				<!-- / .row -->
			</div>
		</div>
		<!-- / .main-content -->
		</div>
		</div> <!-- / .row -->
		</div>
		</div><!-- / .main-content -->
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

if(isset($_POST['sub'])){

	$qrdetails = $_POST['ardetails'];
	$qrsub = $_POST['qrsub'];
	$qrfrom = $sturesult['StudentId'];
	$qrto = 0;
	$qrstatus = 0;
	$dt = date('Y-m-d');

	$sql = "INSERT INTO `querymaster`(`QueryFromId`, `QueryToId`, `QueryQuestion`, `Querystatus`, `QuerySubject`, `QueryGenDate`) 
	VALUES ('$qrfrom','$qrto','$qrdetails','$qrstatus','$qrsub','$dt')";
	$run = mysqli_query($conn, $sql);
	if ($run == true) {
		echo "<script>alert('Request Sent .. ')</script>";
		echo "<script>window.open('account_related.php','_self')</script>";
	} else {
		echo "<script>alert('Error to Send Request .. ')</script>";
		echo "<script>window.open('account_related.php','_self')</script>";
	}

}
?>


  <!-- old File -->
<!-- <html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc." />
		 Favicon 
		<link rel="shortcut icon" href="../assets/favicon/favicon.ico" type="image/x-icon" />
		 Map CSS 
		<link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.css" />
		 Libs CSS 
		<link rel="stylesheet" href="../assets/css/libs.bundle.css" />
		 Theme CSS 
		<link rel="stylesheet" href="../assets/css/theme.bundle.css" />
		 Title 
		<title>LMS by Titanslab</title>
	</head>
	<body>
		 NAVIGATION 
      <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light" id="sidebar">
			<div class="container-fluid">

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>

				<a class="navbar-brand" href="../faculty_dashboard/">
				<img src="../assets/img/logo.svg" class="navbar-brand-img mx-auto" alt="...">
				</a>

				<div class="navbar-user d-md-none">

					<div class="dropdown">
					</div>
				</div>

				<div class="collapse navbar-collapse" id="sidebarCollapse">

					<form class="mt-4 mb-3 d-md-none">
						<div class="input-group input-group-rounded input-group-merge input-group-reverse">
							<input class="form-control" type="search" placeholder="Search" aria-label="Search">
							<div class="input-group-text">
								<span class="fe fe-search"></span>
							</div>
						</div>
					</form>

					<ul class="navbar-nav">
						<li class="nav-item">
							<a href="../student_dashboard" class="nav-link">
							<i class="fe fe-home"></i> Dashboard
							</a>
						</li>
						<li class="nav-item">
							<a href="subjects.php" class="nav-link">
							<i class="fe fe-file"></i>Subjects
							</a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link ">
							<i class="fe fe-percent"></i> Marksheet
							</a>
						</li>
						<li class="nav-item">
							<a href="update.php" class="nav-link ">
							<i class="fe fe-bell"></i>Updates 
							</a>
						</li>
						<li class="nav-item">
							<a href="attendance.php" class="nav-link ">
							<i class="fe fe-clipboard"></i>Attendance 
							</a>
						</li>
						<li class="nav-item d-md-none">
							<a class="nav-link" href="#" data-toggle="modal">
							<span class="fe fe-bell"></span> Notifications
							</a>
						</li>
					</ul>
				
					<hr class="navbar-divider my-3">

					<h6 class="navbar-heading">
						Help Center
					</h6>
					<ul class="navbar-nav mb-md-4">
						<li class="nav-item">
							<a href="account_related.php" class="nav-link ">
							<i class="fe fe-user"></i>Account related Details
							</a>
						</li>
						<li class="nav-item">
							<a href="study_related.php" class="nav-link ">
							<i class="fe fe-book"></i>Study related querys
							</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>


		 MAIN CONTENT 
		<div class="main-content">
			<div class="container-fluid">
				<div class="row justify-content-center">
					<div class="col-12 col-lg-10 col-xl-8">
						 Header 
						<div class="header mt-md-5">
							<div class="header-body">
								<div class="row align-items-center">
									<div class="col">
										 Pretitle 
										<h6 class="header-pretitle">
											New Request
										</h6>
										 Title 
										<h1 class="header-title">
											Account Related Help
										</h1>
									</div>
								</div>
								 / .row 
							</div>
						</div>
						 select 
						<form class="mb-4" method="post">
							<div class="row">
								<div class="col-md-10">
									<select class="form-control form-select-lg mb-3" name="sec" aria-label=".form-select-lg example">
										<option selected hidden>Select Request Type </option>
										<option value="1">Student related request</option>
										<option value="2">Parent related request</option>
									</select>
								</div>
								<div class="col-md-2">
									<div class="col-auto">
										 Button 
										<button class="col-12 btn-lg btn btn-primary " type="submit" name="ser" value="2">
										Select
										</button>
									</div>
								</div>
							</div>
						</form>
						<?php
							// if (isset($_POST['sec'])) {
							//   if ($_POST['sec'] === '1') {
							    ?>
                    <hr class="mt-5 mb-5">
                    <h1 class="header-title">
                      Student Related Info Request
                    </h1>
                    <br>
						<?php
							// } elseif ($_POST['sec'] === '2') {
							?>
                    <hr class="mt-5 mb-5">
                    <h1 class="header-title">
                      Parent info Request
                    </h1>
                    <br>
						<?php
							#}
							?>
						<form method="POST" class="mb-4">
							<div class="form-group">
								 Label  
								<label class="form-label">
								Your Name
								</label>
								 Input 
								<input type="text" value="" name="arname" class="form-control">
							</div>
							 Project description 
							<div class="form-group">
								 Label 
								<label class="form-label mb-1">
								Detail
								</label>
								<small class="form-text text-muted">
								Enter details you want to edit
								</small>
								 Textarea 
								<div id="ardetails" data-quill></div>
							</div>



							 Divider 
							<hr class="mt-5 mb-5">
							 Starting files 
							<div class="form-group">
								 Label 
								<label class="mb-1">
								Upload files
								</label>
								 Card 
								<div class="card">
									<div class="card-body">
										 Dropzone 
										<div class="dropzone dropzone-multiple" data-dropzone='{"url": "https://"}'>
											 Fallback 
											<div class="fallback">
												<div class="custom-file">
													<input type="file" class="custom-file-input" id="customFileUpload" multiple>
													<label class="custom-file-label" for="customFileUpload">Choose file</label>
												</div>
											</div>
											 Preview 
											<ul class="dz-preview dz-preview-multiple list-group list-group-lg list-group-flush">
												<li class="list-group-item">
													<div class="row align-items-center">
														<div class="col-auto">
															 Image 
															<div class="avatar">
																<img class="avatar-img rounded" src="data:image/svg+xml,%3csvg3c/svg%3e" alt="..." data-dz-thumbnail>
															</div>
														</div>
														<div class="col ml-n3">
															 Heading 
															<h4 class="mb-1" data-dz-name>...</h4>
															 Text 
															<p class="small text-muted mb-0" data-dz-size></p>
														</div>
														<div class="col-auto">
															 Dropdown 
															<div class="dropdown">
																 Toggle 
																<a href="#" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																<i class="fe fe-more-vertical"></i>
																</a>
																 Menu 
																<div class="dropdown-menu dropdown-menu-right">
																	<a href="#" class="dropdown-item" data-dz-remove>
																	Remove
																	</a>
																</div>
															</div>
														</div>
													</div>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							 Divider 
							<hr class="mt-5 mb-5">
							 Buttons 
							<input class="btn btn-block btn-primary" type="submit" name="submit">
						</form>
						<?php
							 #}
							?>
					</div>
				</div>
				 / .row 
			</div>
		</div>
		 / .main-content 
		</div>
		</div>  / .row 
		</div>
		</div> / .main-content 
		 JAVASCRIPT 
		 Map JS 
		<script src='https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.js'></script>
		 Vendor JS 
		<script src="../assets/js/vendor.bundle.js"></script>
		 Theme JS 
		<script src="../assets/js/theme.bundle.js"></script>
	</body>
</html> -->



