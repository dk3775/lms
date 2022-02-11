<?php
	session_start();
	if ($_SESSION['role'] != "Abuja") {
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
		<?php include_once("nav.php"); ?>
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
		<?php include("context.php"); ?>
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