<?php
session_start();
if ($_SESSION['role'] != "Lagos") {
	header("Location: ../default.php");
} else {
	include_once("../config.php");
	$_SESSION["userrole"] = "institute";
	$qur = "SELECT * FROM timetablemaster ";
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
										View
									</h6>
									<!-- Title -->
									<h1 class="header-title text-truncate">
										Time Table List
									</h1>
								</div>
								<div class="col-auto">
									<a href="add_timetable.php" class="btn btn-primary ml-2">
										Add Time Table
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
												All Time Table <span class="badge rounded-pill bg-soft-secondary"><?php echo mysqli_num_rows($res); ?></span>
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
													<a class="list-sort text-muted" data-sort="item-name">Time Table Branch</a>
												</th>
												<th>
													<a class="list-sort text-muted" data-sort="item-phone">Time Table Semester</a>
												</th>
												<th>
													<a class="list-sort text-muted" data-sort="item-name">Time Table Uploaded By</a>
												</th>
												<th>
													<a class="list-sort text-muted" data-sort="item-phone">Time Table Upload Time</a>
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
														<!-- Email -->
														<span class="item-email text-reset"><?php echo $row['TimetableBranchCode']; ?></span>
													</td>
													<td>
														<!-- Email -->
														<span class="item-email text-reset"><?php echo $row['TimetableSemester']; ?></span>
													</td>
													<td>
														<!-- Phone -->
														<span class="item-phone text-reset"><?php echo $row['TimetableUploadedBy']; ?></span>
													</td>
													<td>
														<!-- Badge -->
														<span class="item-phone text-reset"><?php echo $row['TimetableUploadTime']; ?></span>
													</td>
													<td>
														<a href="edit_faculty.php?facid=<?php echo $row['TimetableId']; ?>" class="btn btn-sm btn-white">
															Edit
														</a>
														&nbsp;
														<a class="btn btn-sm btn-white" href="fdelete.php?facid=<?php echo $row['TimetableId']; ?>" onclick="if (! confirm('are you sure ?')) return false;">
															Delete
															<!--changes-->
														</a>
														&nbsp;
														<a href="timetable_view.php?tbranch=<?php echo $row['TimetableBranchCode']; ?>" class="btn btn-sm btn-white">
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