<?php
error_reporting(E_ALL ^ E_WARNING);
session_start();
if ($_SESSION['role'] != "Lagos") {
	header("Location: ../index.php");
} else {
?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<?php include_once("../head.php"); ?>
	</head>

	<body>
		<?php $nav_role = "Branch"; ?>
		<?php include_once("nav.php"); ?>
		<?php
		include_once("../config.php");
		$_SESSION["userrole"] = "Faculty";
		$studentenr = $_SESSION['fid'];
		$fqur = "SELECT * FROM facultymaster where FacultyID = '$studentenr'";
		$fres = mysqli_query($conn, $fqur);
		$frow = mysqli_fetch_assoc($fres);
		$bcode = $frow['FacultyBranchCode'];
		$sql = "SELECT BranchName, BranchCode, BranchSemesters FROM branchmaster WHERE BranchCode = '$bcode'";
		$ssql = "SELECT FacultyId FROM branchmaster INNER JOIN facultymaster ON branchmaster.BranchCode = facultymaster.FacultyBranchCode WHERE BranchCode = '$bcode'";
		$result = mysqli_query($conn, $sql);
		$reesult = mysqli_query($conn, $ssql);
		$row = mysqli_fetch_assoc($result);
		$c = isset($result) ? mysqli_num_rows($result) : 0;
		$cc = isset($reesult) ? mysqli_num_rows($reesult) : 0;

		$squr = "SELECT * FROM studentmaster WHERE StudentBranchCode = '$bcode'";
		$sres = mysqli_query($conn, $squr);
		$srow = mysqli_num_rows($sres);
		$a = 1;
		$x = $row['BranchCode'] . "_" . $a;
		$b = $row['BranchCode'];
		echo "<script>window.open('sem_details.php?semid=$x&brid=$b', '_self')</script>";
		?>
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