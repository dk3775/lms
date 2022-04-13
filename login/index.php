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
	<script>
		function display() {
			var type = document.getElementById("loginType");
			if (type.classList.contains("d-none")) {
				type.classList.remove("d-none");
			} else {
				type.classList.add("d-none");
			}
			var form = document.getElementById("loginForm");
			if (form.classList.contains("d-none")) {
				form.classList.remove("d-none");
			} else {
				form.classList.add("d-none");
			}
		}

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
</head>
<?php
require_once("../config.php");
if (isset($_POST['login'])) {
	$na = strtoupper($_POST['name']);
	$pass = $_POST['password'];
	$na2 = $_POST['SelectedType'];
	$u = $na2 . mysqli_real_escape_string($conn, trim($na));
	$hp = mysqli_real_escape_string($conn, trim($pass));

	$html =
		'<div class="alert alert-danger alert-dismissible fade show mt-3 mx-5" role="alert">
			<strong>Incorrect Username or Password !!</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>';

	if ($na2 == "IN") {
		$sql = "SELECT * FROM institutemaster WHERE InstituteUserName = '$u'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		if ($row['InstituteUserName'] == $u and $row['InstitutePassword'] === $hp) {
			session_start();
			$_SESSION['id'] = $u;
			$_SESSION['name'] = $row['InstituteId'];
			$_SESSION['role'] = "Texas";
			echo "<script>window.location.href='../institute_dashboard/';</script>";
		} else {
			$_POST['SelectedLoginType'] = "INSTITUTE";
			echo $html;
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
		} else {
			$_POST['SelectedLoginType'] = "FACULTY";
			echo $html;
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
		} else {
			$_POST['SelectedLoginType'] = "STUDENT";
			echo $html;
		}
	} else {
		echo $html;
	}
}
?>

<body class="border-top border-top-2 border-primary bg-auth" style="overflow: hidden;">
	<div class="d-flex align-items-center my-auto" style="height: 100vh;">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12 col-md-6 offset-xl-2 offset-md-1 order-md-2 mb-5 mb-md-0">
					<div class="text-center">
						<img src="../assets/img/illustrations/login.png" alt="..." class="img-fluid">
					</div>
				</div>
				<div class="col-12 col-md-5 col-xl-4 my-5">
					<h1 class="display-3 text-center mb-3">
						Sign in
					</h1>
					<p class="text-muted text-center mb-5">
						access to
						<span <?php
								if (isset($_POST['SelectedLoginType'])) { ?> class="font-weight-bold text-secondary">
							<?php echo $_POST['SelectedLoginType']; ?></span>
					<?php } else { ?>
						<span>your</span>
					<?php } ?> dashboard.
					</p>
					<?php if (!isset($_POST['SelectedLoginType'])) { ?>
						<form method="POST">
							<div id="loginType" class="d-flex justify-content-between">
								<div class="mx-2">
									<button type="submit" class="card border shadow bg-body rounded text-secondary" value="INSTITUTE" name="SelectedLoginType">
										<img id="imgcard3" src="../assets/img/admin.png" class="card-img rounded mx-auto d-block avatar avatar-xl">
										<div class="card-body">
											<h5 class="card-title">INSTITUTE</h3>
										</div>
									</button>
								</div>
								<div class="mx-2">
									<button type="submit" class="card border shadow bg-body rounded text-secondary" value="FACULTY" name="SelectedLoginType">
										<img id="imgcard3" src="../assets/img/faculty.png" class="card-img rounded mx-auto d-block avatar avatar-xl">
										<div class="card-body">
											<h5 class="card-title">FACULTY</h3>
										</div>
									</button>
								</div>
								<div class="mx-2">
									<button type="submit" class="card border shadow bg-body rounded text-secondary" value="STUDENT" name="SelectedLoginType">
										<img id="imgcard3" src="../assets/img/student.png" class="card-img rounded mx-auto d-block avatar avatar-xl">
										<div class="card-body">
											<h5 class="card-title">STUDENT</h3>
										</div>
									</button>
								</div>
							</div>
						</form>
					<?php
					} else {
					?>
						<form method="POST" autocomplete="off" id="loginForm">
							<div class="form-group">
								<label class="form-label">
									Username
								</label>
								<input type="hidden" name="SelectedType" value="<?php echo substr($_POST['SelectedLoginType'], 0, 2); ?>">
								<input type="text" class="form-control" placeholder="Username" name="name" value="<?php if (isset($_POST['name'])) {
																														echo $_POST['name'];
																													} ?>" required>
							</div>
							<label class="form-label">
								Password
							</label>
							<div class="col-12 logo_outer">
								<div class="input-group mb-4">
									<input name="password" id="password" type="password" class="input form-control" placeholder="Password" required aria-label="password" aria-describedby="basic-addon1" />
									<div class="input-group-append ">
										<span class="input-group-text" style="border-radius: 1px 5px 5px 1px;" onclick="password_show_hide();">
											<i class="fe uil-eye-slash" id="show_eye"></i>
											<i class="fe uil-eye d-none" id="hide_eye"></i>
										</span>
									</div>
								</div>
							</div>
							<input type="submit" class="btn btn-lg btn-block btn-primary mb-3" name="login" value="Login">
						</form>
					<?php } ?>
				</div>
			</div>
		</div>

		<script src="../assets/js/vendor.bundle.js"></script>
		<script src="../assets/js/theme.bundle.js"></script>
	</div>
</body>

</html>
<?php
include_once 'context.php';
?>