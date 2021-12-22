<?php
	session_start();
	if ($_SESSION['role'] != "Lagos") {
	  header("Location: ../default.php");
	} else {
	  include_once("../config.php");
	  $_SESSION["userrole"] = "Faculty";
	  $qur = "SELECT * FROM `studentmaster` WHERE ``='Abuja'";
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
		<style>
		</style>
	</head>
	<body>
		<!-- NAVIGATION -->
		<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light" id="sidebar">
			<div class="container-fluid">
				<!-- Toggler -->
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>
				<!-- Brand -->
				<a class="navbar-brand" href="../faculty_dashboard/">
				<img src="../assets/img/logo.svg" class="navbar-brand-img mx-auto" alt="...">
				</a>
				<!-- User (xs) -->
				<div class="navbar-user d-md-none">
					<!-- Dropdown -->
					<div class="dropdown">
					</div>
				</div>
				<!-- Collapse -->
				<div class="collapse navbar-collapse" id="sidebarCollapse">
					<!-- Form -->
					<form class="mt-4 mb-3 d-md-none">
						<div class="input-group input-group-rounded input-group-merge input-group-reverse">
							<input class="form-control" type="search" placeholder="Search" aria-label="Search">
							<div class="input-group-text">
								<span class="fe fe-search"></span>
							</div>
						</div>
					</form>
					<!-- Navigation -->
					<ul class="navbar-nav">
						<li class="nav-item">
							<a href="../faculty_dashboard" class="nav-link ">
							<i class="fe fe-home"></i> Dashboard
							</a>
						</li>
						<li class="nav-item">
							<a href="#sidebarProfile" class="nav-link" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarProfile">
							<i class="fe fe-file"></i>Student
							</a>
							<div class="collapse " id="sidebarProfile">
								<ul class="nav nav-sm flex-column">
									<li class="nav-item">
										<a href="student_list.php" class="nav-link ">
										View Student List
										</a>
									</li>
									<li class="nav-item">
										<a href="add_student.php" class="nav-link ">
										Add New Student
										</a>
									</li>
									<li class="nav-item">
										<a href="edit_student.php" class="nav-link">
										Edit Student Details
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link ">
							<i class="fe fe-percent"></i> Marksheet
							</a>
						</li>
						<li class="nav-item">
							<a href="update.php" class="nav-link">
							<i class="fe fe-bell"></i>Updates
							</a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link active">
							<i class="fe fe-clipboard"></i>Attendance
							</a>
						</li>
						<li class="nav-item d-md-none">
							<a class="nav-link" href="#" data-toggle="modal">
							<span class="fe fe-bell"></span> Notifications
							</a>
						</li>
					</ul>
					<!-- Divider -->
					<hr class="navbar-divider my-3">
					<!-- Heading -->
					<h6 class="navbar-heading">
						Help Center
					</h6>
					<!-- Navigation -->
					<ul class="navbar-nav mb-md-4">
						<li class="nav-item">
							<a href="#" class="nav-link ">
							<i class="fe fe-user"></i>Account related Details
							</a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link ">
							<i class="fe fe-book"></i>Study related querys
							</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- MAIN CONTENT -->
		<div class="main-content">
			<div class="container-fluid">
				<div class="row justify-content-center">
					<div class="col-12">
						<!-- Header -->
						<div class="header">
							<div class="header-body">
								<div class="row align-items-center">
									<div class="col">
										<!-- Pretitle -->
										<h6 class="header-pretitle">
											List
										</h6>
										<!-- Title -->
										<h1 class="header-title text-truncate">
											Students
										</h1>
									</div>
									<div class="col-auto">
										<a href="#!" class="btn btn-primary ml-2">
										Add contact
										</a>
									</div>
								</div>
								<!-- / .row -->
								<div class="row align-items-center">
									<div class="col">
										<!-- Nav -->
										<ul class="nav nav-tabs nav-overflow header-tabs">
											<li class="nav-item">
												<a href="#!" class="nav-link text-nowrap active">
												All contacts <span class="badge rounded-pill bg-soft-secondary">2</span>
												</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<!-- Tab content -->
						<div class="tab-content">
							<div class="tab-pane fade show active" id="contactsListPane" role="tabpanel" aria-labelledby="contactsListTab">
								<!-- Card -->
								<div class="card" data-list='{"valueNames": ["item-name", "item-title", "item-email", "item-phone", "item-score", "item-company"], "page": 10, "pagination": {"paginationClass": "list-pagination"}}' id="contactsList">
									<div class="card-header">
										<div class="row align-items-center">
											<div class="col">
												<!-- Form -->
												<form>
													<div class="input-group input-group-flush input-group-merge input-group-reverse">
														<input class="form-control list-search" type="search" placeholder="Search">
														<span class="input-group-text">
														<i class="fe fe-search"></i>
														</span>
													</div>
												</form>
											</div>
											<div class="col-auto">
											</div>
										</div>
										<!-- / .row -->
									</div>
									<div class="table-responsive">
										<table class="table table-sm table-hover table-nowrap card-table">
											<thead>
												<tr>
													<th>
														<a class="list-sort text-muted" data-sort="item-name">Name</a>
													</th>
													<th>
														<a class="list-sort text-muted" data-sort="item-email">Enrollment No.</a>
													</th>
													<th>
														<a class="list-sort text-muted" data-sort="item-phone">Phone</a>
													</th>
													<th>
														<a class="list-sort text-muted" data-sort="item-score">Sem</a>
													</th>
													<th>
														<a class="list-sort text-muted justify-content-center" data-sort="item-score">Action</a>
													</th>
													<th>
													</th>
													<th>
													</th>
												</tr>
											</thead>
											<tbody class="list font-size-base">
												<tr>
													<td>
														<!-- Avatar -->
														<div class="avatar avatar-xs align-middle mr-2">
															<img class="avatar-img rounded-circle" src="../assets/img/avatars/profiles/avatar-1.jpg" alt="...">
														</div>
														<a class="item-name text-reset" href="profile-posts.html">Dianna Smiley</a>
													</td>
													<td>
														<!-- Email -->
														<a class="item-email text-reset" href="mailto:john.doe@company.com">diana.smiley@company.com</a>
													</td>
													<td>
														<!-- Phone -->
														<a class="item-phone text-reset" href="tel:1-123-456-4890">(988) 568-3568</a>
													</td>
													<td>
														<!-- Badge -->
														<span class="item-score badge bg-soft-success">1/6</span>
													</td>
													<td>
														<a href="#!" class="btn btn-sm btn-white">
														Edit
														</a>
														&nbsp
														<a href="#!" class="btn btn-sm btn-white">
														Delete
														</a>
														&nbsp;
														<a href="#!" class="btn btn-sm btn-white">
														View
														</a>
													</td>
													<td class="text-right">
													</td>
												</tr>
												<!--over-->
												<tr>
													<td>
														<!-- Avatar -->
														<div class="avatar avatar-xs align-middle mr-2">
															<img class="avatar-img rounded-circle" src="../assets/img/avatars/profiles/avatar-2.jpg" alt="...">
														</div>
														<a class="item-name text-reset" href="profile-posts.html">Ab Hadley</a>
													</td>
													<td>
														<!-- Email -->
														<a class="item-email text-reset" href="mailto:john.doe@company.com">ab.hadley@company.com</a>
													</td>
													<td>
														<!-- Phone -->
														<a class="item-phone text-reset" href="tel:1-123-456-7890">(650) 430-9876</a>
													</td>
													<td>
														<!-- Badge -->
														<span class="item-score badge bg-soft-success">5/6</span>
													</td>
													<td>
														<a href="#!" class="btn btn-sm btn-white">
														Edit
														</a>
														&nbsp
														<a href="#!" class="btn btn-sm btn-white">
														Delete
														</a>
														&nbsp;
														<a href="#!" class="btn btn-sm btn-white">
														View
														</a>
													</td>
													<td class="text-right">
													</td>
													<td class="text-right">
													</td>
												</tr>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
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