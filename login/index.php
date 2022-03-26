<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!-- Favicon -->
	<link rel="shortcut icon" href="../assets/favicon/favicon.ico" type="image/x-icon" />
	<!-- Map CSS -->
	<!--	<link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.css" />-->
	<!-- Libs CSS -->
	<link rel="stylesheet" href="../assets/css/libs.bundle.css" />
	<!-- Theme CSS -->
	<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
	<link rel="stylesheet" href="../assets/css/theme-dark.bundle.css" />
	<!-- Title -->
	<title>LMS by Titanslab</title>
	<?php
	error_reporting(E_ALL ^ E_ALL);
	if (isset($_POST['login'])) { ?>
		<style>
			input:invalid {
				border-color: red;
			}
		</style>

	<?php } ?>
</head>
<?php
require_once("../config.php");
if (isset($_POST['login'])) {
	$na = $_POST['name'];
	$pass = $_POST['password'];
	$na2 = $_POST['loginSelectedType'];
	$u = $na2 . mysqli_real_escape_string($conn, trim($na));
	$hp = mysqli_real_escape_string($conn, trim($pass));
	// echo "<script>alert('$u');</script>";
	if ($na2 == "IN") {
		$sql = "SELECT * FROM institutemaster WHERE InstituteUserName = '$u'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		// echo "<pre>";
		// echo $u . " " . $hp . "HELLLO JO " . $sql;
		// echo "</pre>";
		if ($row['InstituteUserName'] == $u and $row['InstitutePassword'] === $hp) {
			session_start();
			$_SESSION['id'] = $u;
			$_SESSION['name'] = $row['InstituteId'];
			$_SESSION['role'] = "Texas";
			echo "<script>window.location.href='../institute_dashboard/';</script>";
			// header("location:../institute_dashboard/");
		} else {
			echo "<script>document.getElementById('test').style.display = 'block';</script>";
			echo "<script>display(); log();</script>";
		}
	} else if ($na2 == "FA") {
		$sql = "SELECT * FROM facultymaster WHERE FacultyUserName = '$u'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		if ($row['FacultyUserName'] == $u and $row['FacultyPassword'] == $hp) {
			session_start();
			$_SESSION['fid'] = $row['FacultyId'];
			$_SESSION['id'] = $u;
			$_SESSION['role'] = "Lagos";
			echo "<script>window.location.href='../faculty_dashboard/';</script>";
			// header("location:../faculty_dashboard/");
		} else {
			echo "<script>document.getElementById('test').style.display = 'block';</script>";
			echo "<script>display(); log1();</script>";
		}
	} else if ($na2 == "ST") {
		$sql = "SELECT * FROM studentmaster WHERE StudentUserName = '$u'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		if ($row['StudentUserName'] == $u and $row['StudentPassword'] === $hp) {
			session_start();
			$_SESSION['cred'] = $u . "_" . $pass;
			//echo $_SESSION['cred'];
			$_SESSION['id'] = $u;
			$_SESSION['role'] = "Abuja";
			echo "<script>window.location.href='../student_dashboard/';</script>";
			// header("location:../student_dashboard/");
		} else {
			echo "<script>document.getElementById('test').style.display = 'block';</script>";
			echo "<script>display(); log2();</script>";
		}
	} else {
		echo "<script>document.getElementById('test').style.display = 'block';</>";
	}
}
include_once("context.php");
?>

<body class="d-flex align-items-center bg-auth border-top border-top-2 border-primary">
	<!-- CONTENT
			================================================== -->
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12 col-md-6 offset-xl-2 offset-md-1 order-md-2 mb-5 mb-md-0">

				<!-- Image -->
				<div class="text-center">
					<img src="../assets/img/illustrations/login.png" alt="..." class="img-fluid">
				</div>

			</div>
			<div class="col-12 col-md-5 col-xl-4 my-5">
				<!-- Heading -->
				<h1 class="display-3 text-center mb-3">
					Sign in
				</h1>
				<!-- Subheading -->
				<p class="text-muted text-center mb-5">
					access to
					<span id="selectedType">your</span> dashboard.
				</p>
				<form method="POST" autocomplete="off">
					<div id="loginType" class="row row-cols-1 row-cols-md-3 g-2">
						<div class="col-sm-6 justify-content-center">
							<div class="card border shadow bg-body rounded" id="IN_Login" onclick="display(); log();">
								<img id="imgcard" src="../assets/img/admin.png" style="width: 100px;" class="card-img rounded mx-auto d-block">
								<!-- <i class="fe fe-home" style="width: 100px;"></i> -->
								<div class="card-body">
									<h5 class="card-title">INSTITUTE</h3>
										<input type="hidden" id="type" value="IN">
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="card border shadow bg-body rounded" id="FA_Login" onclick="display(); log1();">
								<img id="imgcard2" src="../assets/img/faculty.png" style="width: 108px;" class="card-img rounded mx-auto d-block">
								<!-- <i class="fe fe-user"></i> -->
								<div class="card-body">
									<h5 class="card-title">FACULTY</h3>
										<input type="hidden" id="type1" value="FA">
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="card border shadow bg-body rounded" onclick="display(); log2();">
								<img id="imgcard3" src="../assets/img/student.png" style="width: 100px;" class="card-img rounded mx-auto d-block">
								<!-- <i class="fe uil-graduation-cap"></i> -->
								<div class="card-body">
									<h5 class="card-title">STUDENT</h3>
										<input type="hidden" id="type2" value="ST">
								</div>
							</div>
						</div>
					</div>
					<div id="loginForm" class="d-none">
						<div class="form-group">
							<!-- Label -->
							<label class="form-label">
								Username
							</label>
							<input type="hidden" id="loginSelectedType" name="loginSelectedType">
							<input type="text" class="form-control" placeholder="Username" id="ffname" name="name" value="<?php if (isset($_POST['name'])) echo $_POST['name']; ?>" required>
						</div>
						<label class="form-label">
							Password
						</label>
						<!-- Password -->
						<div class="col-12 logo_outer">
							<div class="input-group mb-4">
								<input name="password" type="password" value="" class="input form-control" id="password" placeholder="Password" required aria-label="password" value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>" aria-describedby="basic-addon1" />
								<div class="input-group-append ">
									<span class="input-group-text" style="border-radius: 1px 5px 5px 1px;" onclick="password_show_hide();">
										<i class="fe uil-eye-slash" id="show_eye"></i>
										<i class="fe uil-eye d-none" id="hide_eye"></i>
									</span>
								</div>
							</div>
						</div>
						<div class="alert alert-danger" id="test" role="alert" style="display: none;">
							Incorrect username or password!!
						</div>
						<!-- Submit -->
						<input type="submit" class="btn btn-lg btn-block btn-primary mb-3" name="login" value="Login">
					</div>
				</form>
				<script>
					function display() {
						var type = document.getElementById("loginType");
						if (type.classList.contains("d-none")) {
							type.classList.remove("d-none");
						} else {
							type.classList.add("d-none");
						}
						// type.classList.add("d-none");
						var form = document.getElementById("loginForm");
						if (form.classList.contains("d-none")) {
							form.classList.remove("d-none");
						} else {
							form.classList.add("d-none");
						}
						// form.classList.remove("d-none");
					}

					function log() {
						var loginType = document.getElementById("type").value;
						document.getElementById("selectedType").innerHTML = "INSTITUTE";
						document.getElementById("loginSelectedType").value = loginType;
						// alert(loginType);
					}

					function log1() {
						var loginType = document.getElementById("type1").value;
						document.getElementById("selectedType").innerHTML = "FACULTY";
						document.getElementById("loginSelectedType").value = loginType;
						// alert(loginType);
					}

					function log2() {
						var loginType = document.getElementById("type2").value;
						document.getElementById("selectedType").innerHTML = "STUDENT";
						document.getElementById("loginSelectedType").value = loginType;
						// alert(loginType);
					}
				</script>
				<script>
					function password_show_hide() {
						const x = document.getElementById("password");
						var show_eye = document.getElementById("show_eye");
						var hide_eye = document.getElementById("hide_eye");
						hide_eye.classList.remove("d-none");
						if (x.type === "password") {
							x.type = "text";
							show_eye.style.display = "none";
							hide_eye.style.display = "block";
						} else {
							x.type = "password";
							show_eye.style.display = "block";
							hide_eye.style.display = "none";
						}
					}
				</script>
			</div>
		</div>
	</div>

	<script src="../assets/js/vendor.bundle.js"></script>
	<!-- Theme JS -->
	<script src="../assets/js/theme.bundle.js"></script>
</body>

</html>