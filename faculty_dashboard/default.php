<?php
error_reporting(E_ALL ^ E_WARNING);
session_start();
if ($_SESSION['role'] != "Lagos") {
	header("Location: ../default.php");
} else {
	include_once("../config.php");
	$_SESSION["userrole"] = "Faculty";
	$user = $_SESSION['id'];
	$fqur = "SELECT *,BranchName FROM facultymaster INNER JOIN branchmaster ON facultymaster.FacultyBranchCode = branchmaster.BranchCode WHERE FacultyUserName = '$user'";
	$fres = mysqli_query($conn, $fqur);
	$frow = mysqli_fetch_array($fres);
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
							<img src="../src/uploads/facprofile/<?php echo $frow['FacultyProfilePic']; ?>" alt="profile_image" style="border-radius: 10px;" class="w-100 border-radius-lg shadow-sm">
						</div>
					</div>
					<div class="col-auto my-auto">
						<div class="h-100">
							<h3 class="mb-1 text-sm">
								<?php echo $frow['BranchName']; ?>
							</h3>
							<h1 class="mb-0 font-weight-bold text-sm">
								<?php echo $frow['FacultyFirstName'] . " " . $frow['FacultyLastName']; ?>
							</h1>
							<p class="mb-0 font-weight-bold text-sm">
								<?php echo $frow['FacultyOffice']; ?>
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
												<h5 class="mb-0">
													Faculty Code
												</h5>
											</div>
											<div class="col-auto">
												<h5 class="mb-0 text-muted">
													<?php echo $frow['FacultyCode']; ?>
												</h5>
											</div>
										</div>
									</div>
									<div class="list-group-item">
										<div class="row align-items-center">
											<div class="col">
												<h5 class="mb-0">
													Faculty Qualification
												</h5>
											</div>
											<div class="col-auto">
												<h5 class="mb-0 text-muted">
													<?php echo $frow['FacultyQualification']; ?>
												</h5>
											</div>
										</div>
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
												<h5 class="mb-0">
													Faculty Contact No
												</h5>
											</div>
											<div class="col-auto">
												<h5 class="mb-0 text-muted">
													<?php echo $frow['FacultyContactNo']; ?>
												</h5>
											</div>
										</div>
									</div>
									<div class="list-group-item">
										<div class="row align-items-center">
											<div class="col">
												<h5 class="mb-0">
													Faculty Email Id
												</h5>
											</div>
											<div class="col-auto">
												<h5 class="mb-0 text-muted">
													<?php echo $frow['FacultyEmail']; ?>
												</h5>
											</div>
										</div>
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
								<div class="card" data-list="{&quot;valueNames&quot;: [&quot;item-name&quot;, &quot;item-title&quot;, &quot;item-email&quot;, &quot;item-phone&quot;, &quot;item-score&quot;, &quot;item-company&quot;], &quot;page&quot;: 10, &quot;pagination&quot;: {&quot;paginationClass&quot;: &quot;list-pagination&quot;}}" id="contactsList">
									<div class="card-header">
										<div class="row align-items-center">
											<div class="col">
												<!-- Form -->
											</div>
											<form>
												<div class="input-group input-group-flush input-group-merge input-group-reverse">
													<input class="form-control list-search" type="search" placeholder="Search">
													<span class="input-group-text">
													<i class="fe fe-search"></i>
													</span>
												</div>
											</form>
										</div>
									</div>
									<!-- / .row -->
								</div>
								<div class="table-responsive">
									<table class="table table-sm table-hover table-nowrap card-table" id="myTable">
										<thead>
											<tr>
												<th>
													<a class="list-sort text-muted" data-sort="item-name">Update Id</a>
												</th>
												<th>
													<a class="list-sort text-muted" data-sort="item-title" >Upload Date</a>
												</th>
												<th>
													<a class="list-sort text-muted" data-sort="item-email" >Title</a>
												</th>
												<th>
													<a class="list-sort text-muted" data-sort="item-phone" >Uploaded By</a>
												</th>
												<th>
													<a class=" text-muted">View</a>
												</th>
												<th colspan="2">
													<a class="text-muted" >Download Attachment</a>
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
													<a href="update_view.php?updateid=<?php echo $urow['UpdateId'];?>" class="btn btn-sm btn-outline-primary">View</a>
												</td>
												<td>
													<!-- Badge -->
													<a download="../uploads/facprofile/CEAJJ.png" href="../uploads/facprofile/CEAJJ.png" type="button" class="btn btn-sm btn-outline-primary">Download</a>
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