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
						<a href="../institute_dashboard" class="nav-link">
							<i class="fe fe-home"></i> Dashboard
						</a>
					</li>
					<li class="nav-item">
						<a href="#sidebarProfile" class="nav-link" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarProfile">
							<i class="fe uil-user"></i>Student
						</a>
						<div class="collapse" id="sidebarProfile">
							<ul class="nav nav-sm flex-column">
								<li class="nav-item">
									<a href="student_list.php" class="nav-link ">
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
							</ul>
						</div>
					</li>
					<li class="nav-item">
						<a href="#timetable" class="nav-link" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="timetable">
						<i class="fe uil-calendar-alt"></i>Time Table
						</a>
						<div class="collapse" id="timetable">
							<ul class="nav nav-sm flex-column">
								<li class="nav-item">
									<a href="timetable_list.php" class="nav-link">
										View Time Table List
									</a>
								</li>
								<li class="nav-item">
									<a href="add_timetable.php" class="nav-link">
										Add Time Table
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
						<a href="#update" class="nav-link" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="update">
						<i class="fe fe-bell"></i>Update
						</a>
						<div class="collapse" id="update">
							<ul class="nav nav-sm flex-column">
								<li class="nav-item">
									<a href="update_list.php" class="nav-link">
										View Updates List
									</a>
								</li>
								<li class="nav-item">
									<a href="add_update.php" class="nav-link">
										Add Update
									</a>
								</li>
							</ul>
						</div>
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
