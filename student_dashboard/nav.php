<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light" id="sidebar">
	<div class="container-fluid">
		<!-- Toggler -->
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<!-- Brand -->
		<a class="navbar-brand" href="../faculty_dashboard/">
			<img src="../assets/img/logo.svg?t" class="navbar-brand-img mx-auto" alt="...">
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
					<a href="../student_dashboard" class="nav-link <?php if ($nav_role == "Dashboard") {
																		echo "active";
																	} ?>">
						<i class="fe fe-home"></i> Dashboard
					</a>
				</li>
				<li class="nav-item">
					<a href="subjects.php" class="nav-link <?php if ($nav_role == "Subjects") {
																echo "active";
															} ?>">
						<i class="fe fe-file"></i>Subjects
					</a>
				</li>
				<li class="nav-item">
					<a href="assignment_list.php" class="nav-link <?php if ($nav_role == "Assignments") {
																		echo "active";
																	} ?>">
						<i class="fe uil-book"></i></i> Assignments
					</a>
				</li>
				<li class="nav-item">
					<a href="update_list.php" class="nav-link <?php if ($nav_role == "Updates") {
																	echo "active";
																} ?>">
						<i class="fe fe-bell"></i>Updates
					</a>
				</li>
				<li class="nav-item">
					<a href="timetable_view.php" class="nav-link <?php if ($nav_role == "Time Table") {
																		echo "active";
																	} ?>">
						<i class="fe uil-calendar-alt"></i>Time Table
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
					<a href="account_related.php" class="nav-link <?php if ($nav_role == "Account related Details") {
																		echo "active";
																	} ?>">
						<i class="fe fe-user"></i>Account related Details
					</a>
				</li>
				<li class="nav-item">
					<a href="study_related.php" class="nav-link <?php if ($nav_role == "Study related querys") {
																	echo "active";
																} ?>">
						<i class="fe fe-book"></i>Study related querys
					</a>
				</li>
				<li class="nav-item">
					<a href="query_list.php" class="nav-link <?php if ($nav_role == "All querys") {
																	echo "active";
																} ?>">
						<i class="fe uil-file-question-alt"></i>All querys
					</a>
				</li>
			</ul>
			<div class="mt-auto"></div>
			<!-- User (md) -->
			<div class="navbar-user d-md-flex" style="overflow: hidden;" id="sidebarUser">

				<hgroup class="text-center navbar-heading " style="margin: -30px;">
					<a href="logout.php"><button class="btn btn-link">Logout</button></a>
					<h6 style="margin: -1px;">
						Version 1.0.0
					</h6>
					<h6 class="">
						Developed By <a style="color: #1A68D1;" href="titanslab.in" target="_blank">Titanslab</a>
					</h6>
				</hgroup>
			</div>
		</div>
	</div>
</nav>