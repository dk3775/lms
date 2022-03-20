<?php
session_start();
if ($_SESSION['role'] != "Lagos") {
	header("Location: ../index.php");
} else {
	include_once("../config.php");
	$_SESSION["userrole"] = "Faculty";
	$fid = $_SESSION['fid'];
	$qur = "SELECT * FROM assignmentmaster INNER JOIN facultymaster INNER JOIN subjectmaster ON assignmentmaster.AssignmentUploadedBy = facultymaster.FacultyId AND assignmentmaster.AssignmentSubject=subjectmaster.SubjectCode WHERE AssignmentUploadedBy = '$fid' ORDER BY AssignmentUploaddate DESC;";
	$res = mysqli_query($conn, $qur);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php include_once("../head.php"); ?>
</head>

<body>
	<?php $nav_role = "Assignment"; ?>
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
									<h5 class="header-pretitle">
										<a class="btn-link btn-outline" onclick="history.back()"><i class="fe uil-angle-double-left"></i>Back</a>
									</h5>
									<h6 class="header-pretitle">
										View
									</h6>
									<!-- Title -->

									<h1 class="header-title text-truncate">
										Assignment List
									</h1>
								</div>
								<div class="col-auto">
									<a href="add_assignment.php" class="btn btn-primary ml-2">
										Add Assignment
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
												All Assignment <span class="badge rounded-pill bg-soft-secondary"><?php echo mysqli_num_rows($res); ?></span>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<!-- Tab content -->
					<?php
					if (mysqli_num_rows($res) > 0) { ?>
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
														<a class="list-sort text-muted" data-sort="item-company">Subject</a>
													</th>
													<th>
														<a class="list-sort text-muted" data-sort="item-score">Sem</a>
													</th>
													<th>
														<a class="list-sort text-muted" data-sort="item-phone">Upload Date</a>
													</th>
													<th>
														<a class="list-sort text-muted" data-sort="item-phone">Submission Date</a>
													</th>
													<th>
														<a class="list-sort text-muted justify-content-center">Action</a>
													</th>
												</tr>
											</thead>
											<tbody class="list font-size-base">
												<?php
												while ($row = mysqli_fetch_assoc($res)) { ?>
													<tr>
														<td>
															<a class="item-name text-reset"><?php echo $row['AssignmentTitle']; ?></a>
														</td>
														<td>
															<!-- Email -->
															<span class="item-company text-reset"><?php echo $row['SubjectName']; ?></span>
														</td>
														<td>
															<!-- Badge -->
															<span class="item-score text-reset"><?php echo $row['AssignmentForSemester']; ?></span>
														</td>
														<td>
															<!-- Badge -->
															<span class="item-phone text-reset"><?php echo $row['AssignmentUploaddate']; ?></span>
														</td>
														<td>
															<!-- Badge -->
															<span class="item-phone text-reset"><?php echo $row['AssignmentSubmissionDate']; ?></span>
														</td>
														<td>
															<a href="edit_assignment.php?assid=<?php echo $row['AssignmentId']; ?>" class="btn btn-sm btn-warning">
																Edit
															</a>
															&nbsp;
															<a href="assdelete.php?assid=<?php echo $row['AssignmentId']; ?>" class="btn btn-sm btn-danger" onclick="if (! confirm('Are you sure to delete Assignment ?')) return false;">
																Delete
															</a>
															&nbsp;
															<a href="assignment_view.php?updateid=<?php echo $row['AssignmentId']; ?>" class="btn btn-sm btn-info">
																View
															</a>
														</td>
													</tr>
												<?php } ?>
												<!--over-->
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
						</div>
					<?php
					} else { ?>
						<div class="col-12">
							<h1 class="card header-title m-5 p-5"> Oops, No Assignment To Show</h1>
						</div>
					<?php
					}
					?>
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
	<!-- Delete Popup -->

</body>

</html>