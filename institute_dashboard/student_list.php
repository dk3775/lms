<?php
session_start();
if ($_SESSION['role'] != "Texas") {
	header("Location: ../default.php");
} else {
	include_once("../config.php");
	$_SESSION["userrole"] = "Faculty";
	$qur = "SELECT * FROM studentmaster";
	$res = mysqli_query($conn, $qur);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php include_once("../head.php"); ?>
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
			<a class="navbar-brand" href="../institute_dashboard/">
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
						<a href="../institute_dashboard" class="nav-link ">
							<i class="fe fe-home"></i> Dashboard
						</a>
					</li>
					<li class="nav-item">
						<a href="#sidebarProfile" class="nav-link active" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarProfile">
							<i class="fe uil-user"></i>Student
						</a>
						<div class="" id="sidebarProfile">
							<ul class="nav nav-sm flex-column">
								<li class="nav-item">
									<a href="student_list.php" class="nav-link active">
										View Student List
									</a>
								</li>
								<li class="nav-item">
									<a href="add_student.php" class="nav-link">
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
						<a href="#sidebarPages" class="nav-link " data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarPages">
							<i class="fe uil-graduation-cap"></i>Faculty
						</a>
						<div class="collapse" id="sidebarPages">
							<ul class="nav nav-sm flex-column">
								<li class="nav-item">
									<a href="faculty_list.php" class="nav-link ">
										View Faculty List
									</a>
								</li>
								<li class="nav-item">
									<a href="add_faculty.php" class="nav-link ">
										Add New Faculty
									</a>
								</li>
								<li class="nav-item">
									<a href="edit_faculty.php" class="nav-link">
										Edit Faculty Details
									</a>
								</li>
								<li class="nav-item">
									<a href="faculty_profile.php" class="nav-link ">
										Faculty Profile
									</a>
								</li>
							</ul>
						</div>
					</li>
					<li class="nav-item">
						<a href="#sidebarCrm" class="nav-link" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarCrm">
							<i class="fe uil-book"></i>Branch/subject
						</a>
						<div class="collapse" id="sidebarCrm">
							<ul class="nav nav-sm flex-column">
								<li class="nav-item">
									<a href="branch_list.php" class="nav-link">
										View Branch List
									</a>
								</li>
								<li class="nav-item">
									<a href="add_branch.php" class="nav-link">
										Add New Branch
									</a>
								</li>
								<li class="nav-item">
									<a href="edit_branch.php" class="nav-link">
										Edit Branch
									</a>
								</li>
								<li class="nav-item">
									<a href="subject_list.php" class="nav-link">
										View Subject List
									</a>
								</li>
								<li class="nav-item">
									<a href="add_subject.php" class="nav-link">
										Add New Subject
									</a>
								</li>
								<li class="nav-item">
									<a href="edit_subject.php" class="nav-link">
										Edit Subject
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
						<a href="update.php" class="nav-link ">
							<i class="fe fe-bell"></i>Updates
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
										View
									</h6>
									<!-- Title -->
									<h1 class="header-title text-truncate">
										Student List
									</h1>
								</div>
								<div class="col-auto">
									<a href="add_student.php" class="btn btn-primary ml-2">
										Add Student
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
												All Students <span class="badge rounded-pill bg-soft-secondary"><?php echo mysqli_num_rows($res); ?></span>
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
													<a class="list-sort text-muted">Sem</a>
												</th>
												<th>
													<a class="list-sort text-muted justify-content-center">Action</a>
												</th>
												<th>
												</th>
											</tr>
										</thead>
										<tbody class="list font-size-base">
											<?php
											while ($row = mysqli_fetch_assoc($res)) { ?>
												<tr>
													<td>
														<!-- Avatar -->
														<div class="avatar avatar-xs align-middle mr-2">
															<img class="avatar-img rounded-circle" src="../src/uploads/stuprofile/<?php echo $row['StudentProfilePic']; ?>" alt="...">
														</div>
														<a class="item-name text-reset"><?php echo $row['StudentFirstName'] . " " . $row['StudentLastName']; ?></a>
													</td>
													<td>
														<!-- Email -->
														<span class="item-email text-reset"><?php echo $row['StudentEnrollmentNo']; ?></span>
													</td>
													<td>
														<!-- Phone -->
														<span class="item-phone text-reset"><?php echo $row['StudentContactNo']; ?></span>
													</td>
													<td>
														<!-- Badge -->
														<span class=""><?php echo $row['StudentSemester']; ?></span>
													</td>
													<td>
														<a href="edit_student.php?studentenr=<?php echo $row['StudentEnrollmentNo']; ?>" class="btn btn-sm btn-white">
															Edit
														</a>
														&nbsp;
														<a class="btn btn-sm btn-white" href="sdelete.php?studentenr=<?php echo $row['StudentEnrollmentNo']; ?>" onclick="if (! confirm('are you sure ?')) return false;">
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
											<?php } ?>
											<!--over-->
									</table>
								</div>
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
	<!-- Delete Popup -->

</body>

</html>