<?php
error_reporting(E_ALL ^ E_WARNING);
session_start();
if ($_SESSION['role'] != "Lagos") {
	header("Location: ../default.php");
} else {
	include_once("../config.php");
	$_SESSION["userrole"] = "Faculty";
	$user = $_SESSION['user'];
	$qur = "SELECT * FROM `studentmaster` WHERE ``='Abuja'";
	$squr = "SELECT * FROM facultymaster where FacultyUserName = ''";
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
<?php include("../head.php"); ?>

<body>
	<!-- NAVIGATION -->
	<?php include("nav.php"); ?>
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<!-- HEADER -->
		<div class="header">
			<div class="container-fluid">
				<!-- Body -->
				<div class="header-body">
					<div class="row align-items-end">
						<div class="col">
							<!-- Pretitle -->
							<h6 class="header-pretitle">
								<?php echo $_SESSION['userrole']; ?>
							</h6>
							<!-- Title -->
							<h1 class="header-title">
								Dashboard
							</h1>
						</div>
						<div class="col-auto">
							<!-- Button -->
							<form method="GET">
								<a href="logout.php" class="btn btn-primary lift" name="logout">
									logout
								</a>
							</form>
						</div>
					</div>
					<!-- / .row -->
				</div>
				<!-- / .header-body -->
			</div>
		</div>
		<!-- / .header -->
		<br><br>
		<div class="container-fluid">
			<div class="page-header min-height-100 border-radius-xl mt-4">
			</div>
			<div class="card card-body blur shadow-blur mx-1 mt-n6 overflow-hidden">
				<div class="row gx-4">
					<div class="col-auto">
						<div class="avatar avatar-xxl position-relative">
							<img src="../assets/test1.jpg" alt="profile_image" style="border-radius: 10px;" class="w-100 border-radius-lg shadow-sm">
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
				<br>

				<div class="row">
					<div class="col-sm-6">
						<div class="card  border-0">
							<div class="card-body">
								<div class="list-group list-group-flush my-n3">
									<div class="list-group-item">
										<div class="row align-items-center">
											<div class="col">

												<!-- Title -->
												<h5 class="mb-0">
													Joined
												</h5>

											</div>
											<div class="col-auto">

												<!-- Time -->
												<time class="small text-muted" datetime="2018-10-28">
													10/24/18
												</time>

											</div>
										</div> <!-- / .row -->
									</div>
									<div class="list-group-item">
										<div class="row align-items-center">
											<div class="col">

												<!-- Title -->
												<h5 class="mb-0">
													Location
												</h5>

											</div>
											<div class="col-auto">

												<!-- Text -->
												<small class="text-muted">
													Los Angeles, CA
												</small>

											</div>
										</div> <!-- / .row -->
									</div>
									<div class="list-group-item">
										<div class="row align-items-center">
											<div class="col">

												<!-- Title -->
												<h5 class="mb-0">
													Website
												</h5>

											</div>
											<div class="col-auto">

												<!-- Link -->
												<a href="#!" class="small">
													themes.getbootstrap.com
												</a>

											</div>
										</div> <!-- / .row -->
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="card  border-0">
							<div class="card-body">
								<div class="list-group list-group-flush my-n3">
									<div class="list-group-item">
										<div class="row align-items-center">
											<div class="col">

												<!-- Title -->
												<h5 class="mb-0">
													Joined
												</h5>

											</div>
											<div class="col-auto">

												<!-- Time -->
												<time class="small text-muted" datetime="2018-10-28">
													10/24/18
												</time>

											</div>
										</div> <!-- / .row -->
									</div>
									<div class="list-group-item">
										<div class="row align-items-center">
											<div class="col">

												<!-- Title -->
												<h5 class="mb-0">
													Location
												</h5>

											</div>
											<div class="col-auto">

												<!-- Text -->
												<small class="text-muted">
													Los Angeles, CA
												</small>

											</div>
										</div> <!-- / .row -->
									</div>
									<div class="list-group-item">
										<div class="row align-items-center">
											<div class="col">

												<!-- Title -->
												<h5 class="mb-0">
													Website
												</h5>

											</div>
											<div class="col-auto">

												<!-- Link -->
												<a href="#!" class="small">
													themes.getbootstrap.com
												</a>

											</div>
										</div> <!-- / .row -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- CARDS -->
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 col-lg-6 col-xl">
					<!-- Value  -->
					<div class="card">
						<div class="card-body">
							<div class="row align-items-center">
								<div class="col">
									<!-- Title -->
									<h6 class="text-uppercase text-muted mb-2">
										Total Query
									</h6>
									<!-- Heading -->
									<span class="h2 mb-0">
										9.58
									</span>
								</div>
								<div class="col-auto">
									<!-- Icon -->
									<span class="h1 fe uil-question-circle text-muted mb-0"></span>
								</div>
							</div>
							<!-- / .row -->
						</div>
					</div>
				</div>
				<div class="col-12 col-lg-6 col-xl">
					<!-- Hours -->
					<div class="card">
						<div class="card-body">
							<div class="row align-items-center">
								<div class="col">
									<!-- Title -->
									<h6 class="text-uppercase text-muted mb-2">
										Total Assignment
									</h6>
									<!-- Heading -->
									<span class="h2 mb-0">
										55%
									</span>
								</div>
								<div class="col-auto">
									<!-- Icon -->
									<span class="h2 fe fe-briefcase text-muted mb-0"></span>
								</div>
							</div>
							<!-- / .row -->
						</div>
					</div>
				</div>
				<div class="col-12 col-lg-6 col-xl">
					<!-- Exit -->
					<div class="card">
						<div class="card-body">
							<div class="row align-items-center">
								<div class="col">
									<!-- Title -->
									<h6 class="text-uppercase text-muted mb-2">
										Subject
									</h6>
									<!-- Heading -->
									<span class="h2 mb-0">
										MAT
										<!--- Subject name only -->
									</span>
								</div>
								<div class="col-auto">
									<span class="h2 fe uil-notebooks text-muted mb-0"></span>
								</div>
							</div>
							<!-- / .row -->
						</div>
					</div>
				</div>
				<div class="col-12 col-lg-6 col-xl">
					<!-- Time -->
					<div class="card">
						<div class="card-body">
							<div class="row align-items-center">
								<div class="col">
									<!-- Title -->
									<h6 class="text-uppercase text-muted mb-2">
										Branch
									</h6>
									<!-- Heading -->
									<span class="h2 mb-0">
										CE
									</span>
								</div>
								<div class="col-auto">
									<!-- Icon -->
									<span class="h1 fe uil-code-branch text-muted mb-0"></span>
								</div>
							</div>
							<!-- / .row -->
						</div>
					</div>
				</div>

			</div>

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
															<button type="button" class="btn btn-sm btn-outline-primary" data-toggle="collapse" data-target="#demo<?php echo $i++; ?>" data-parent="#myTable">View</button>
														</td>
														<td>
															<!-- Badge -->
															<a download="../uploads/facprofile/CEAJJ.png" href="../uploads/facprofile/CEAJJ.png" type="button" class="btn btn-sm btn-outline-primary">Download</a>
														</td>
													<tr id="demo<?php echo $j++; ?>" class="collapse">
														<td colspan="6" class="hiddenRow">
															<div><?php echo $urow['UpdateDescription']; ?></div>
														</td>
													</tr>
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
											<li><a class="page" href="javascript:function Z(){Z=&quot;&quot;}Z()">4</a></li>
											<li><a class="page" href="javascript:function Z(){Z=&quot;&quot;}Z()">5</a></li>
											<li><a class="page" href="javascript:function Z(){Z=&quot;&quot;}Z()">6</a></li>
											<li><a class="page" href="javascript:function Z(){Z=&quot;&quot;}Z()">7</a></li>
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
						</div>
					</div>
				</div>
			</div>
			<!-- JAVASCRIPT -->
			<!-- Map JS -->
			<script src='https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.js'></script>
			<!-- Vendor JS -->
			<script src="../assets/js/vendor.bundle.js"></script>
			<!-- Theme JS -->
			<script src="../assets/js/theme.bundle.js"></script>
</body>

</html>