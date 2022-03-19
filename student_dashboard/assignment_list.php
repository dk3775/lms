<?php
session_start();
if ($_SESSION['role'] != "Abuja") {
	header("Location: ../index.php");
} else {
	include_once("../config.php");
	$_SESSION["userrole"] = "Student";
	$qur = "SELECT * FROM studentmaster INNER JOIN branchmaster ON studentmaster.StudentBranchCode = branchmaster.BranchCode WHERE StudentID = '" . $_SESSION["userid"] . "'";
	$res = mysqli_query($conn, $qur);
	$srow = mysqli_fetch_assoc($res);
	$enroll = $srow["StudentEnrollmentNo"];
	$bid = $srow["BranchId"];
	$sem = $srow["StudentSemester"];
	$stuid = $_SESSION["userid"];
	// $xqur = "SELECT *,AssignmentUploadedBy FROM assignmentmaster INNER JOIN facultymaster ON assignmentmaster.AssignmentUploadedBy = facultymaster.FacultyId WHERE AssignmentBranch = '$bid' AND AssignmentForSemester = '$sem'";
	$xqur = "SELECT * FROM assignmentmaster WHERE AssignmentBranch = '$bid' AND AssignmentForSemester = '$sem'";

	$xres = mysqli_query($conn, $xqur);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php include_once("../head.php"); ?>
</head>

<body>
	<?php $nav_role = "Assignments"; ?>
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
							</div>
							<!-- / .row -->
							<div class="row align-items-center">
								<div class="col">
									<!-- Nav -->
									<ul class="nav nav-tabs nav-overflow header-tabs">
										<li class="nav-item">
											<a href="#!" class="nav-link text-nowrap active">
												All Assignment <span class="badge rounded-pill bg-soft-secondary"><?php echo mysqli_num_rows($xres); ?></span>
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
													<a class="list-sort text-muted" data-sort="item-name">Name</a>
												</th>
												<th>
													<a class="list-sort text-muted" data-sort="item-name">Subject</a>
												</th>
												<th>
													<a class="list-sort text-muted" data-sort="item-phone" href="#">Status</a>
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
											$a = 0;
											$submite = 0;
											$assid = 0;
											while ($row = mysqli_fetch_assoc($xres)) {
											?>

												<tr>
													<td>
														<a class="item-name text-reset"><?php echo $row['AssignmentTitle']; ?></a>
													</td>
													<td>
														<span class="item-email text-reset"><?php echo $row['AssignmentSubject']; ?></span>
													</td>
													<td>
														<?php
														$assid = $row['AssignmentId'];
														$squr = "SELECT * FROM studentassignment WHERE SAssignmentUploaderId = '$stuid' AND AssignmentId = '$assid'";
														$sres = mysqli_query($conn, $squr);
														$ssrow = mysqli_fetch_assoc($sres);
														$a = $ssrow['SAssignmentStatus'];
														// echo $assid;
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
														<!-- Badge -->
														<span class=""><?php echo $row['AssignmentUploaddate']; ?></span>
													</td>
													<td>
														<!-- Badge -->
														<span class=""><?php echo $row['AssignmentSubmissionDate']; ?>
															<?php
															if ($row['AssignmentSubmissionDate'] >= gmdate("Y-m-d")) { ?>
																<span class="badge bg-soft-primary">Open</span>
															<?php
															} else if ($row['AssignmentSubmissionDate'] < gmdate("Y-m-d")) { ?>
																<span class="badge bg-soft-success">Closed</span>
															<?php
															}
															?>
														</span>
													</td>
													<td>
														<a href="assignment_view.php?updateid=<?php echo $row['AssignmentId']; ?>" class=" btn btn-sm btn-info">
															View
														</a>
														&nbsp;
														<?php
														if ($ssrow['SAssignmentStatus'] == 1) { ?>
															<a href="../src/uploads/studentAssignment/<?php echo $ssrow['SAssignmentFile']; ?>" download="<?php echo $ssrow['SAssignmentFile']; ?>" class="btn btn-sm btn-outline-success" name="Download">
																Download
															</a>
															<?php
														} else if ($ssrow['SAssignmentStatus'] == 0 || $ssrow['SAssignmentStatus'] == 2) {
															if ($row['AssignmentSubmissionDate'] > gmdate("Y-m-d")) { ?>
																<a href="assignment_view.php?updateid=<?php echo $row['AssignmentId']; ?>&action=sub" class="btn btn-sm btn-primary" onclick="assSubmit();">
																	Submit
																</a>
														<?php
																$submite = 1;
															}
														}
														?>
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
				</div>
			</div>
		</div>
	</div>
	<?php include("context.php");
	?>
	<!-- / .main-content -->
	<!-- JAVASCRIPT -->
	<!-- Map JS -->
	<script src='https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.js'></script>
	<!-- Vendor JS -->
	<script src="../assets/js/vendor.bundle.js"></script>
	<!-- Theme JS -->
	<script src="../assets/js/theme.bundle.js"></script>
	<!-- Delete Popup -->
	<script>
		var myModal = document.getElementById('myModal')
		var myInput = document.getElementById('myInput')

		myModal.addEventListener('shown.bs.modal', function() {
			myInput.focus()
		})
	</script>
</body>

</html>
<?php
// if (isset($_GET['submit'])) {
// 	if (isset($_GET['id'])) {


// 		$f_tmp_name = $_FILES['upload']['tmp_name'];
// 		$f_size = $_FILES['upload']['size'];
// 		$f_error = $_FILES['upload']['error'];
// 		$fs_name = $_FILES['upload']['name'];

// 		$uploadsubmit = $_GET['id'];

// 		echo "<script>alert($uploadsubmit);</script>";
// 		if ($f_error === 0) {
// 			if ($f_size <= 10000000) {
// 				move_uploaded_file($f_tmp_name, "../src/uploads/studentAssignment/" . $fs_name); // Moving Uploaded File to Server ... to uploades folder by file name f_name ... 
// 			} else {
// 				echo "<script>alert(File size is to big .. !);</script>";
// 			}
// 		} else {
// 			echo "Something went wrong .. !";
// 		}
// 	}
// 	#upload to database
// 	$filename = $enroll . $assid . ".pdf";
// 	$date = gmdate("Y-m-d");

// 	// $sql = "INSERT INTO studentassignment(SAssignmentUploaderId, AssignmentId, SAssignmentFile, SAssignmentUploadDate, SAssignmentStatus)
// 	//  VALUES ('$stuid','$xy','$filename','$date','$submite')";
// 	// $result = mysqli_query($conn, $sql);
// 	// if ($result) {
// 	// 	echo "<script>alert('Assignment Submitted Successfully .. !');</script>";
// 	// 	echo '<script>showAlert();window.setTimeout(function () {HideAlert();},1000);</script>';
// 	// 	echo "<meta http-equiv='refresh' content='0;url=assignment_list.php'>";
// 	// } else {
// 	// 	echo "<script>alert('Something went wrong .. !');</script>";
// 	// 	echo '<script>showAlert();window.setTimeout(function () {HideAlert();},1000);</script>';
// 	// 	echo "<meta http-equiv='refresh' content='0;url=assignment_list.php'>";
// 	// }
// }
?>