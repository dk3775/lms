<!doctype html>
<html lang="en">
	<head>
		<?php include_once('../head.php');?>
	</head>
	<?php
		error_reporting(E_ALL ^ E_WARNING);
		?>
	<body class="d-flex align-items-center bg-auth border-top border-top-2 border-primary">
		<!-- CONTENT
			================================================== -->
		<div class="container">
			<div class="row justify-content-center">
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
					<form method="post">
						<!-- Email address -->
						<div class="form-group">
							<!-- Label -->
							<label class="form-label">
							Username
							</label>
							<!-- Input -->
							<input type="text" class="form-control" placeholder="Username" name="name" required>
						</div>
						<label class="form-label">
						Password
						</label>
						<!-- Password -->
						<div class="col-12 logo_outer">
							<div class="input-group mb-3">
								<input name="password" type="password" value="" class="input form-control" id="password" placeholder="password" required="true" aria-label="password" aria-describedby="basic-addon1"  />
								<div class="input-group-append ">
									<span class="input-group-text" style="border-radius: 1px 5px 5px 1px;" onclick="password_show_hide();">
									<i class="fe uil-eye-slash" id="show_eye" ></i>
									<i class="fe uil-eye d-none" id="hide_eye"></i>
									</span>
								</div>
							</div>
						</div>
						<!-- Submit -->
						<input type="submit" class="btn btn-lg btn-block btn-primary mb-3" name="login" value="Login">
					</form>
					<script>
						function password_show_hide() {
						  var x = document.getElementById("password");
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
		<!-- Map JS -->
		<script src='https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.js'></script>
		<!-- Vendor JS -->
		<script src="../assets/js/vendor.bundle.js"></script>
		<!-- Theme JS -->
		<script src="../assets/js/theme.bundle.js"></script>
	</body>
</html>
<?php
	include_once("../config.php");
	if(isset($_POST['login'])){
	    $na = $_POST['name'];
	    $pass = $_POST['password'];
	    $hash_pass = password_hash($pass, PASSWORD_BCRYPT);
	    $u = mysqli_real_escape_string($conn,trim($na));
	    $hp = mysqli_real_escape_string($conn,$hash_pass);
	
	    /*$sql="SELECT * FROM test_login WHERE id='$na'";
	    $result=mysqli_query($conn,$sql);
	    $row=mysqli_fetch_array($result);*/
	    
	    // insert start
	    
	    //  $ins = "INSERT INTO test_login(id, pass, h_pass) VALUES ('$u','$pass','$hash_pass')";
	    // $qry = mysqli_query($conn,$ins);
	    
	    // if ($qry) {
	    //     echo "<script>alert('User Added .. !');</script>";
	    // } else {
	    //       echo "<script>alert('Nikal .. !');</script>"; 
	    //   }
	      
	// insert over
	    $na2 = substr($u,0,2);
	    $sql = "SELECT * FROM test_login WHERE id = '$u'";
	    $res = mysqli_query($conn,$sql);
	    if(mysqli_num_rows($res)>0){
	      $row = mysqli_fetch_assoc($res);
	    }
	    if (password_verify($pass,$row['h_pass'])) {
	      if($na2 == "IN"){
	        if($row['id'] == $u){
	          session_start();
	              $_SESSION['id'] = $u;
	              $_SESSION['role'] = "Texas";
	              header("location:../institute_dashboard/");
	          }
	      }
	      elseif($na2 == "LE"){
	          if($row['id'] == $u){
	              session_start();
	              $_SESSION['id'] = $u;
	              $_SESSION['role'] = "Lagos";
	              header("location:../faculty_dashboard/");
	          }
	      }
	      elseif($na2 == "ST"){
	          if($row['id'] == $u){
	              session_start();
	              $_SESSION['id'] = $u;
	              $_SESSION['role'] = "Abuja";
	              header("location:../student_dashboard/");
	          }
	      }
	    }
	    
	    else{
	      echo "<script>alert('Invalid Login ID or Password');</script>";
	    }
	}
	?>