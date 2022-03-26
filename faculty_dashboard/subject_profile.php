<?php
error_reporting(E_ALL ^ E_WARNING);
session_start();
require_once("../config.php");
if ($_SESSION['role'] != "Lagos" or !isset($_GET['subid'])) {
	header("Location: ../index.php");
} else {
	$xbrid = $_GET['subid'];
	$qur = "SELECT *,BranchName,FacultyFirstName,FacultyLastName FROM ((subjectmaster INNER JOIN branchmaster ON subjectmaster.SubjectBranch = branchmaster.BranchId) INNER JOIN facultymaster ON subjectmaster.SubjectFacultyId = facultymaster.FacultyId) WHERE SubjectId = '$xbrid'";
	$res = mysqli_query($conn, $qur);
	$row = mysqli_fetch_assoc($res);
?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<?php include_once("../head.php"); ?>
	</head>

	<body>
		<?php
		$nav_role = "Branch";
		include_once('nav.php'); ?>
		<div class="main-content">
			<div class="container-fluid">
				<div class="header-body">
					<div class="row align-items-end">
						<div class="col">
							<h5 class="header-pretitle">
								<a class="btn-link btn-outline" onclick="history.back()"><i class="fe uil-angle-double-left"></i>Back</a>
							</h5>
							<h6 class="header-pretitle">
								Subject
							</h6>
							<h1 class="header-title">
								Profile
							</h1>
						</div>
						<?php
						if ($row['SubjectFacultyId'] == $_SESSION['fid']) { ?>
							<div class="col-auto">
								<a href="add_material.php?subcode=<?php echo $row['SubjectCode']; ?>" class="btn btn-primary ml-2">
									Add Material
								</a>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
			<br> <br>
			<div class="container-fluid">
				<div class="row">
					<div class="col-12">
						<!-- Files -->
						<div class="card">
							<div class="card-body">
								<h2 class="header-title">
									Subject Info :
								</h2>
								<br>
								<div class="input-group">
									<span class="input-group-text col-2 ">Subject name</span>
									<input type="text" value="<?php echo $row['SubjectName']; ?>" aria-label="First name" class="form-control" disabled>
								</div>
								<br>
								<div class="input-group">
									<span class="input-group-text col-2 ">Subject Sem</span>
									<input type="text" value="<?php echo $row['SubjectSemester']; ?>" aria-label="First name" class="form-control" disabled>
									<span class="input-group-text col-2 ">Subject Branch</span>
									<input type="text" value="<?php echo $row['BranchName']; ?>" aria-label="Last name" class="form-control" disabled>
								</div>
								<br>
								<div class="input-group">
									<span class="input-group-text col-2 ">Subject Faculty</span>
									<input type="text" value="<?php echo $row['FacultyFirstName'] . " " . $row['FacultyLastName']; ?>" aria-label="First name" class="form-control" disabled>
									<span class="input-group-text col-2 ">Subject Code</span>
									<input type="text" value="<?php echo $row['SubjectCode']; ?>" aria-label="Last name" class="form-control" disabled>
								</div>
							</div>
						</div>
					</div>
				</div>
				<hr class="navbar-divider my-4">
			</div>
			<?php
			$xsubid = $row['SubjectCode'];
			$qurr = "SELECT * FROM studymaterialmaster WHERE SubjectCode = '$xsubid' Order by SubjectUnitNo ASC";
			$ress = mysqli_query($conn, $qurr);
			?>
			<div class="container-fluid">
				<div class="row justify-content-center">
					<div class="col-12">
						<div class="header">
							<div class="header-body">
								<div class="row align-items-center">
									<div class="col">
										<ul class="nav nav-tabs nav-overflow header-tabs">
											<li class="nav-item">
												<a href="#" class="nav-link text-nowrap active">
													Subject Materials <span class="badge rounded-pill bg-soft-secondary"><?php echo mysqli_num_rows($ress); ?></span>
												</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<!-- Tab content -->
						<?php

						if (mysqli_num_rows($ress) > 0) { ?>
							<div class="tab-content">
								<div class="tab-pane fade show active" id="contactsListPane" role="tabpanel" aria-labelledby="contactsListTab">
									<!-- Card -->
									<div class="card" data-list='{"valueNames": ["item-name", "item-title", "item-email", "item-phone", "item-score", "item-company"], "page": 10, "pagination": {"paginationClass": "list-pagination"}}' id="contactsList">
										<div class="card-header">
											<div class="row align-items-center">
												<div class="col">
													<!-- Form -->
													<form  autocomplete="off">
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
															<a class="list-sort text-muted" data-sort="item-name">Unit No</a>
														</th>
														<th colspan="3">
															<a class="list-sort text-muted" data-sort="item-company">Unit Name</a>
														</th>
														<th></th>
														<th>
															<a class="list-sort text-muted justify-content-center">Action</a>
														</th>
														<th>
															<a class="list-sort text-muted justify-content-center">Download</a>
														</th>
													</tr>
												</thead>
												<tbody class="list font-size-base">
													<?php
													while ($roww = mysqli_fetch_assoc($ress)) { ?>
														<tr>
															<td>
																<a class="item-name text-reset"><?php echo $roww['SubjectUnitNo']; ?></a>
															</td>
															<td colspan="3">
																<!-- Email -->
																<span class="item-company text-reset"><?php echo $roww['SubjectUnitName']; ?></span>
															</td>
															<td></td>
															<td>
																<a href="edit_material.php?subcode=<?php echo $row['SubjectCode']; ?>&matid=<?php echo $roww['MaterialCode']; ?>" class="btn btn-sm btn-warning">
																	Edit
																</a>
															</td>
															<td>
																<a href="../src/uploads/studymaterial/<?php echo $roww['EngMaterialFile']; ?>" download="<?php echo $roww['EngMaterialFile']; ?>" class="btn btn-sm btn-success">
																	English
																</a>
																&nbsp;
																<a href="../src/uploads/studymaterial/<?php echo $roww['GujMaterialFile']; ?>" download="<?php echo $roww['GujMaterialFile']; ?>" class="btn btn-sm btn-success">
																	Gujarati
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
								<h1 class="card header-title m-5 p-5"> Oops, No Materials To Show</h1>
							</div>
						<?php
						}
						?>
					</div>
				</div>
			</div>
			<?php include_once("context.php");
			?>
			<script src='https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.js'></script>
			<script src="../assets/js/vendor.bundle.js"></script>
			<script src="../assets/js/theme.bundle.js"></script>
	</body>

	</html>
<?php } ?>