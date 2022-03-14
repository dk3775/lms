<!doctype html>
<html lang="en">

<head>
	<?php include_once('../head.php'); ?>
	<?php
	if (isset($_POST['login'])) { ?>
		<style>
			input:invalid {
				border-color: red;
			}
		</style>

	<?php } ?>
</head>
<?php
error_reporting(E_ALL ^ E_WARNING);
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
				<h1 class="display-4 text-center mb-3">
					Sign in
				</h1>
				<!-- Subheading -->
				<p class="text-muted text-center mb-5">
					access to your dashboard.
				</p>
				<!-- Form -->
				<form method="post" name="myform">
					<!-- Email address -->
					<div class="form-group ">
						<!-- Label -->
						<label class="form-label">
							Username
						</label>
						<input type="text" class="form-control" placeholder="Username" id="ffname" name="name" value="<?php if (isset($_POST['name'])) echo $_POST['name']; ?>" required>
					</div>
					<label class="form-label">
						Password
					</label>
					<!-- Password -->
					<div class="col-12 logo_outer">
						<div class="input-group mb-3">
							<input name="password" type="password" value="" class="input form-control" id="password" placeholder="Password" required aria-label="password" aria-describedby="basic-addon1" />
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
				</form>


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
		<!-- / .row -->
	</div>
	<!-- / .container -->
	<!-- JAVASCRIPT -->
	<!-- Vendor JS -->
	<script src="../assets/js/vendor.bundle.js"></script>
	<!-- Theme JS -->
	<script src="../assets/js/theme.bundle.js"></script>
</body>

</html>
<?php
require_once("../config.php");
if (isset($_POST['login'])) {
	$na = $_POST['name'];
	$pass = $_POST['password'];
	//$hash_pass = password_hash($pass, PASSWORD_BCRYPT);
	$u = mysqli_real_escape_string($conn, trim($na));
	$hp = mysqli_real_escape_string($conn, trim($pass));
	$na2 = substr($u, 0, 2);
	if ($na2 == "IN") {
		$sql = "SELECT * FROM institutemaster WHERE InstituteUserName = '$u'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		if ($row['InstituteUserName'] == $u and $row['InstitutePassword'] === $hp) {
			session_start();
			$_SESSION['id'] = $u;
			$_SESSION['name'] = $row['InstituteId'];
			$_SESSION['role'] = "Texas";
			header("location:../institute_dashboard/");
		} else {
			echo "<script>document.getElementById('test').style.display = 'block';</script>";
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
			header("location:../faculty_dashboard/");
		} else {
			echo "<script>document.getElementById('test').style.display = 'block';</script>";
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
			header("location:../student_dashboard/");
		} else {
			echo "<script>document.getElementById('test').style.display = 'block';</script>";
		}
	} else {
		echo "<script>document.getElementById('test').style.display = 'block';</script>";
	}
}
?>
<?php include_once("context.php"); ?>