<?php
session_start();
error_reporting(E_ALL ^ E_WARNING);
if ($_SESSION['role'] != "Texas") {
	header("Location: ../default.php");
} else {
	include_once("../config.php");
	$_SESSION["userrole"] = "Institute";
	$squr = "SELECT * FROM studentmaster";
	$sres = mysqli_query($conn, $squr);
	$fqur = "SELECT * FROM facultymaster ";
	$fres = mysqli_query($conn, $fqur);
	$bqur = "SELECT * FROM branchmaster";
	$bres = mysqli_query($conn, $bqur);
	$uqur = "SELECT * FROM updatemaster";
	$ures = mysqli_query($conn, $uqur);
	$qqur = "SELECT * FROM querymaster";
	$qres = mysqli_query($conn, $qqur);
}
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
		<!-- HEADER -->
		<div class="header">
			<div class="container-fluid">
				<div class="header-body">
					<div class="row align-items-end">
						<div class="col">
							<h6 class="header-pretitle">
								<?php echo $_SESSION['userrole']; ?>
							</h6>
							<h1 class="header-title">
								Dashboard
							</h1>
						</div>
						<div class="col-auto">
							<a href="../logout.php" class="btn btn-primary lift">
								logout
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<br><br>
		<div class="container-fluid">
			<div class="page-header min-height-100 border-radius-xl mt-4">
			</div>
			<div class="card card-body blur shadow-blur mx-1 mt-n6 overflow-hidden">
				<div class="row gx-4">
					<div class="col-auto">
						<div class="avatar avatar-xl position-relative">
							<img src="../assets/test1.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm" style="border-radius: 10px;">
						</div>
					</div>
					<div class="col-auto my-auto">
						<div class="h-100">
							<h3 class="mb-1 font-weight-bold text-sm">
								Computer
							</h3>
							<h1 class="mb-0 font-weight-bold text-sm">
								Alec Thompson
							</h1>
							<p class="mb-0 font-weight-bold text-sm">
								Sem - 5
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- CARDS -->
	</div>
	<!-- / .main-content -->
	<!-- MAIN CONTENT -->
	<div class="main-content ">
		<div class="container-fluid">
			<div class="row justify-content-center">
				<div class="col-12 col-lg-12">
					<!-- Card -->
					<div class="row">
						<div class="col-12 col-lg-6">
							<div class="row">
								<div class="col-12 col-lg-12">
									<!-- Card -->
									<div class="card card-fill">
										<div class="card-header">
											<!-- Title -->
											<h4 class="card-header-title">
												New Facultys
											</h4>
											<!-- Link -->
											<a href="faculty_list.php" class="small">View all</a>
										</div>
										<div class="card-body">
											<!-- List group -->
											<div class="list-group list-group-flush my-n3">
												<?php
												$c = 1;
												while ($frow = mysqli_fetch_assoc($fres) and $c <= 5) {
												?>
													<div class="list-group-item">
														<div class="row align-items-center">
															<div class="col-auto">
																<!-- Avatar -->
																<img src="../assets/uploads/facprofile/<?php echo $frow['FacultyProfilePic']; ?>" alt="..." class="avatar-img rounded">
															</div>
															<div class="col ml-n2">
																<!-- Title -->
																<h4 class="font-weight-normal mb-1">
																	<?php echo $frow['FacultyFirstName'] . " " . $frow['FacultyLastName']; ?>
																</h4>
																<!-- Text -->
																<small class="text-muted">
																	<?php echo $frow['FacultyCode']; ?>
																</small>
															</div>
															<div class="col-auto">
																<!-- Dropdown -->
																<a href="edit_faculty.php?facid=<?php echo $frow['FacultyId']; ?>" class="btn btn-sm btn-white">
																	Edit
																</a>
															</div>
														</div>
														<!-- / .row -->
													</div>
												<?php
													$c++;
												}
												?>
											</div>
										</div>
										<!-- / .card-body -->
									</div>
								</div>
							</div>
						</div>
						<div class="col-12 col-lg-6">
							<!-- Card -->
							<div class="card">
								<div class="card-body">
									<div class="row align-items-center">
										<div class="col">
											<!-- Title -->
											<h6 class="text-uppercase text-muted mb-2">
												Total Students
											</h6>
											<!-- Heading -->
											<span class="h2 mb-0">
												<?php echo mysqli_num_rows($sres); ?>
											</span>
										</div>
										<div class="col-auto">
											<!-- Icon -->
											<i class="h2 fe uil-user text-muted mb-0"></i>
										</div>
									</div>
									<!-- / .row -->
								</div>
							</div>
							<!-- Card -->
							<div class="card">
								<div class="card-body">
									<div class="row align-items-center">
										<div class="col">
											<!-- Title -->
											<h6 class="text-uppercase text-muted mb-2">
												Total Faculty
											</h6>
											<!-- Heading -->
											<span class="h2 mb-0">
												<?php echo mysqli_num_rows($fres); ?>
											</span>
										</div>
										<div class="col-auto">
											<!-- Icon -->
											<i class="h2 fe uil-user text-muted mb-0"></i>
										</div>
									</div>
									<!-- / .row -->
								</div>
							</div>
							<!-- Card -->
							<div class="card">
								<div class="card-body">
									<div class="row align-items-center">
										<div class="col">
											<!-- Title -->
											<h6 class="text-uppercase text-muted mb-2">
												Total Branch
											</h6>
											<div class="row align-items-center g-0">
												<div class="col-auto">
													<!-- Heading -->
													<span class="h2 mr-2 mb-0">
														<?php echo mysqli_num_rows($bres); ?>
													</span>
												</div>
											</div>
											<!-- / .row -->
										</div>
										<div class="col-auto">
											<!-- Icon -->
											<span class="h2 fe uil-code-branch text-muted mb-0"></span>
										</div>
									</div>
									<!-- / .row -->
								</div>
							</div>
							<!-- Card -->
							<div class="card">
								<div class="card-body">
									<div class="row align-items-center">
										<div class="col">
											<!-- Title -->
											<h6 class="text-uppercase text-muted mb-2">
												Total Querys
											</h6>
											<!-- Heading -->
											<span class="h2 mb-0">
												<?php echo mysqli_num_rows($qres); ?>
											</span>
										</div>
										<div class="col-auto">
											<!-- Icon -->
											<span class="h2 fe uil-graduation-cap text-muted mb-0"></span>
										</div>
									</div>
									<!-- / .row -->
								</div>
							</div>


						</div>
					</div>
				</div>
			</div>
			<!-- / .row -->
		</div>
		<!-- / .row -->
	</div>
	<!-- / .main-content -->
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">
			<div class="row justify-content-center">
				<!-- Table -->
				<div class="card">
					<div class="card-header">
						<!-- Title -->
						<h2 class="card-header-title ">
							Updates
						</h2>
						<!-- Link -->
						<a href="update.php" class="small">View all</a>
					</div>
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
													<input class="form-control list-search" type="search" placeholder="Search by Date">
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
									<table class="table table-sm table-hover table-nowrap card-table" id="myTable">
										<thead>
											<tr>
												<th>
													<a class="list-sort text-muted" data-sort="item-name">#</a>
												</th>
												<th>
													<a class="list-sort text-muted" data-sort="item-title" href="#">Date</a>
												</th>
												<th>
													<a class="list-sort text-muted" data-sort="item-email" href="#">Title</a>
												</th>
												<th>
													<a class="list-sort text-muted" data-sort="item-phone" href="#">Uploaded By</a>
												</th>
												<th>
													<a class="list-sort text-muted" data-sort="item-score" href="#">Info</a>
												</th>
												<th colspan="2">
													<a class="list-sort text-muted" data-sort="item-company" href="#">Download</a>
												</th>
											</tr>
										</thead>
										<tbody class="list font-size-base">
											<?php
											while ($urow = mysqli_fetch_assoc($ures)) { ?>
												<tr>
													<td>
														<?php echo $urow['UpdateId']; ?>
													</td>
													<td>
														<span class="item-title"><?php echo $urow['UpdateUploadDate']; ?></span>
													</td>
													<td>
														<!-- Text -->
														<span class="item-title"><?php echo $urow['UpdateTitle']; ?></span>
													</td>
													<td>
														<span class="item-title"><?php echo $urow['UpdateUploadedBy']; ?></span>
													</td>
													<td>
														<!-- Phone -->
														<button type="button" class="btn btn-sm btn-outline-primary" data-toggle="collapse" data-target="#demo1" data-parent="#myTable">View</button>
													</td>
													<td>
														<!-- Badge -->
														<a download="<?php echo $urow['UpdateFile']; ?>" href="../src/uploads/updates/<?php echo $urow['UpdateFile']; ?>" type="button" class="btn btn-sm btn-outline-primary">Download</a>
													</td>
												</tr>
											<?php } ?>
											<!--over-->
										</tbody>
									</table>
								</div>
								<div class="card-footer d-flex justify-content-between">
									<!-- Pagination (prev) -->
									<ul class="list-pagination-prev pagination pagination-tabs card-pagination">
										<li class="page-item">
											<a class="page-link pl-0 pr-4 border-right" href="#">
												<i class="fe fe-arrow-left mr-1"></i> Prev
											</a>
										</li>
									</ul>
									<!-- Pagination -->
									<ul class="list-pagination pagination pagination-tabs card-pagination">
										<li class="active"><a class="page" href="javascript:function Z(){Z=&quot;&quot;}Z()">1</a></li>
										<li><a class="page" href="javascript:function Z(){Z=&quot;&quot;}Z()">2</a></li>
										<li><a class="page" href="javascript:function Z(){Z=&quot;&quot;}Z()">3</a></li>
									</ul>
									<!-- Pagination (next) -->
									<ul class="list-pagination-next pagination pagination-tabs card-pagination">
										<li class="page-item">
											<a class="page-link pl-4 pr-0 border-left" href="#">
												Next <i class="fe fe-arrow-right ml-1"></i>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="contactsCardsPane" role="tabpanel" aria-labelledby="contactsCardsTab">
							<!-- Cards -->
							<div data-list="{&quot;valueNames&quot;: [&quot;item-name&quot;, &quot;item-title&quot;, &quot;item-email&quot;, &quot;item-phone&quot;, &quot;item-score&quot;, &quot;item-company&quot;], &quot;page&quot;: 9, &quot;pagination&quot;: {&quot;paginationClass&quot;: &quot;list-pagination&quot;}}" id="contactsCards">
								<!-- Header -->
								<div class="row align-items-center mb-4">
									<div class="col">
										<!-- Form -->
										<form>
											<div class="input-group input-group-lg input-group-merge input-group-reverse">
												<input class="form-control list-search" type="search" placeholder="Search">
												<span class="input-group-text">
													<i class="fe fe-search"></i>
												</span>
											</div>
										</form>
									</div>
									<div class="col-auto mr-n3">
										<!-- Select -->
										<form>
											<div class="choices" data-type="select-one" tabindex="0" role="listbox" aria-haspopup="true" aria-expanded="false">
												<div class="form-select form-select-sm form-control-flush">
													<select class="form-select form-select-sm form-control-flush form-control" data-choices="{&quot;searchEnabled&quot;: false}" hidden="" tabindex="-1" data-choice="active">
														<option value="9 per page">9 per page</option>
													</select>
													<div class="choices__list choices__list--single">
														<div class="choices__item choices__item--selectable" data-item="" data-id="1" data-value="9 per page" data-custom-properties="null" aria-selected="true">9 per
															page
														</div>
													</div>
												</div>
												<div class="choices__list dropdown-menu" aria-expanded="false">
													<div class="choices__list" role="listbox">
														<div class="choices__item dropdown-item choices__item--selectable is-highlighted" data-select-text="Press to select" data-choice="" data-choice-selectable="" data-id="1" data-value="9 per page" role="option" aria-selected="true">
															9 per page
														</div>
														<div class="choices__item dropdown-item choices__item--selectable" data-select-text="Press to select" data-choice="" data-choice-selectable="" data-id="2" data-value="All" role="option">
															All
														</div>
													</div>
												</div>
											</div>
										</form>
									</div>
								</div>
								<!-- / .row -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include_once("context.php"); ?>
	<!-- JAVASCRIPT -->
	<!-- Map JS -->
	<script src='https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.js'></script>
	<!-- Vendor JS -->
	<script src="../assets/js/vendor.bundle.js"></script>
	<!-- Theme JS -->
	<script src="../assets/js/theme.bundle.js"></script>
	<script>
		var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
		var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
			return new bootstrap.Tooltip(tooltipTriggerEl)
		})
	</script>
</body>

</html>