<?php
error_reporting(E_ALL ^ E_WARNING);
session_start();
if ($_SESSION['role'] != "Lagos") {
	header("Location: ../default.php");
} else {
?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<?php include_once "../head.php"; ?>
	</head>

	<body>
		<?php $nav_role = "Assignment"; ?>
		<!-- NAVIGATION -->
		<?php include_once 'nav.php'; ?>
		<!-- MAIN CONTENT -->
		<div class="main-content">
			<div class="container-fluid">
				<div class="row justify-content-center">
					<div class="col-12	">
						<br>
						<!-- Card -->
						<div class="card">
							<div class="card-body">
								<!-- Header -->
								<div class="mb-3">
									<div class="row align-items-center">
										<div class="col ml-n2">
											<!-- Title -->
											<h1 class="mb-1">
												Assignment
											</h1>
										</div>
									</div>
									<!-- / .row -->
								</div>
								<?php
								include_once "../config.php";
								$ttid = $_GET['updateid'];
								$_SESSION["userrole"] = "Faculty";
								if (isset($ttid)) {
									$sql = "SELECT * FROM assignmentmaster WHERE AssignmentId = '$ttid'";
									$result = mysqli_query($conn, $sql);
									$row = mysqli_fetch_assoc($result);

									$asql = "SELECT * FROM studentassignment INNER JOIN studentmaster ON studentassignment.SAssignmentUploaderId = studentmaster.StudentId WHERE AssignmentId = '$ttid';";
									$aresult = mysqli_query($conn, $asql);

								?>
									<!-- CONTENT -->
									<div class="container-fluid">
										<div class="row">
											<div class="col-12">
												<!-- Files -->
												<div class="card" data-list='{"valueNames": ["name"]}'>
													<div class="card-body">
														<h3 class="header-title">
															<?php echo $row['AssignmentTitle']; ?> Info:
														</h3>
														<br>
														<div class="input-group">
															<span class="input-group-text col-3 text-dark">Title</span>
															<input type="text" value="<?php echo $row['AssignmentTitle']; ?>" aria-label="First name" class="form-control" disabled>
															<span class="input-group-text col-3 text-dark">Subject</span>
															<input type="text" value="<?php echo $row['AssignmentSubject']; ?>" aria-label="Last name" class="form-control disable" disabled>
														</div>
														<br>
														<div class="input-group">
															<span class="input-group-text col-3 text-dark">Upload date</span>
															<input type="text" value="<?php echo $row['AssignmentUploaddate']; ?>" aria-label="First name" class="form-control" disabled>
															<span class="input-group-text col-3 text-dark">Submission Date</span>
															<input type="text" value="<?php echo $row['AssignmentSubmissionDate']; ?>" aria-label="Last name" class="form-control disable" disabled>
														</div>
														<br>
														<div class="input-group">
															<span class="input-group-text col-3 text-dark">Description</span>
															<textarea aria-label="First name" class="form-control" disabled><?php echo $row['AssignmentDesc']; ?></textarea>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="d-flex justify">
											<!-- Button -->
											<a href="../src/uploads/assignments/<?php echo $row['AssignmentFile']; ?>" download="<?php echo $row['AssignmentFile']; ?>" class="btn btn-primary" name="Download">
												Download
											</a>
										</div>
									</div>
									<hr>
									<!-- CONTENT -->
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
																	<a class="list-sort text-muted" data-sort="item-name">No</a>
																</th>
																<th>
																	<a class="list-sort text-muted" data-sort="item-name">Student Name</a>
																</th>
																<th>
																	<a class="list-sort text-muted" data-sort="item-score">Assignment Status</a>
																</th>
																<th>
																	<a class="list-sort text-muted" data-sort="item-phone">Upload Date</a>
																</th>
																<th>
																	<a class="list-sort text-muted justify-content-center">Action</a>
																</th>

															</tr>
														</thead>
														<tbody class="list font-size-base">
															<?php
															$a++;
															while ($row = mysqli_fetch_assoc($aresult)) { ?>
																<tr>
																	<td>
																		<span class="text-reset item-score"><?php echo $a++; ?></span>
																	</td>
																	<td>
																		<span type="text" class="text-reset item-name"><?php echo $row['StudentFirstName']; ?> <?php echo $row['StudentLastName']; ?></span>
																	</td>
																	<td>
																		<?php
																		$a = $row['SAssignmentStatus'];
																		if ($a == 0) {
																		?>
																			<span class="badge bg-soft-primary">New</span>
																		<?php
																		} else if ($a == 1) {
																		?>
																			<span class="badge bg-soft-success">Submited</span>
																		<?php
																		} else if ($a == 2) {
																		?>
																			<span class="badge bg-soft-warning">Rejected</span>
																		<?php
																		} else if ($a == 3) {
																		?>
																			<span class="badge bg-soft-warning">Completed</span>
																		<?php
																		}
																		?>
																	</td>
																	<td>
																		<!-- Email -->
																		<span type="text" class="text-reset item-phone" name="bsem" required><?php echo $row['SAssignmentUploadDate']; ?></span>
																	</td>
																	<td>
																		<a href="assign_status.php?upid=<?php echo $row['SAssignmentUploaderId']; ?>&asid=<?php echo $ttid; ?>&a=<?php echo 1; ?>" class="btn btn-sm btn-white">
																			Reject
																		</a>
																		&nbsp;
																		<a class="btn btn-sm btn-white" href="assign_status.php?upid=<?php echo $row['SAssignmentUploaderId']; ?>&asid=<?php echo $ttid; ?>&a=<?php echo 2; ?>">
																			Complete
																			<!--changes-->
																		</a>
																		&nbsp;
																		<a href="../src/uploads/studentAssignment/<?php echo $row['SAssignmentFile']; ?>" download="<?php echo $row['SAssignmentFile']; ?>" class="btn btn-sm btn-white" name="Download">
																			Download
																		</a>
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
						<?php } ?>
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
	</body>

	</html>
<?php } ?>