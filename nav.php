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
						<a href="../institute_dashboard" class="nav-link <?php if($nav_role == "Dashboard"){echo "active";} ?>">
							<i class="fe fe-home"></i> Dashboard
						</a>
					</li>
					<li class="nav-item">
						<a href="student_list.php" class="nav-link <?php if($nav_role == "Student"){echo "active";} ?>">
						<i class="fe uil-user"></i> Student
						</a>
					</li>
					<li class="nav-item">
						<a href="faculty_list.php" class="nav-link <?php if($nav_role == "Faculty"){echo "active";} ?>">
						<i class="fe uil-graduation-cap"></i> Faculty
						</a>
					</li>
					<li class="nav-item">
						<a href="branch_list.php" class="nav-link <?php if($nav_role == "Branch"){echo "active";} ?>">
						<i class="fe uil-code-branch"></i> Branch
						</a>
					</li>
					<li class="nav-item">
						<a href="update_list.php" class="nav-link <?php if($nav_role == "Updates"){echo "active";} ?>">
						<i class="fe fe-bell"></i>Updates
						</a>
					</li>
					<li class="nav-item">
						<a href="timetable_list.php" class="nav-link <?php if($nav_role == "Time Table"){echo "active";} ?>">
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
						<a href="acc_related.php" class="nav-link <?php if($nav_role == "Student Queries"){echo "active";} ?>">
							<i class="fe fe-user"></i>Student Queries
						</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>