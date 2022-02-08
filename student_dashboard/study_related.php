<?php
	session_start();
	error_reporting(E_ALL ^ E_WARNING);
	if ($_SESSION['role'] != "Abuja") {
		header("Location: ../default.php");
	} else {
		include_once("../config.php");
		$_SESSION["userrole"] = "Student";
		
		$un = $_SESSION['id'];
		$ssql = "SELECT SubjectName,StudentId FROM studentmaster INNER JOIN subjectmaster ON studentmaster.StudentSemester = subjectmaster.SubjectSemester WHERE StudentUserName = '$un'";
		$sqry = mysqli_query($conn, $ssql);
	}
  ?>
  
  <!DOCTYPE html>
  <html lang="en">
    
    <head>
      <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc." />

  <!-- Favicon -->
  <link rel="shortcut icon" href="../assets/favicon/favicon.ico" type="image/x-icon" />
  
  <!-- Map CSS -->
  <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.css" />

  <!-- Libs CSS -->
  <link rel="stylesheet" href="../assets/css/libs.bundle.css" />

  <!-- Theme CSS -->
  <link rel="stylesheet" href="../assets/css/theme.bundle.css" />
  
  <!-- Title -->
  <title>LMS by Titanslab</title>
  
  <style>
    
    </style>

</head>

<body>
  
  <!-- NAVIGATION -->
  <?php include_once('nav.php'); ?> 
  <!-- MAIN CONTENT -->
  <div class="main-content">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-12 col-lg-10 col-xl-8">

          <!-- Header -->
          <div class="header mt-md-5">
            <div class="header-body">
              <div class="row align-items-center">
                <div class="col">
                  
                  <!-- Pretitle -->
                  <h6 class="header-pretitle">
                    New Request
                  </h6>
                  
                  <!-- Title -->
                  <h1 class="header-title">
                    Study Related Help
                  </h1>

                </div>
              </div> <!-- / .row -->
            </div>
          </div>

          <!-- select -->
          
          <form class="mb-4" method="POST">
            <div class="row">
              <div class="col-md-10">
                <select class="form-control form-select-lg mb-3" name="sec" aria-label=".form-select-lg example">
                  <option value="ABC" selected hidden>Select Subject</option>
                  <?php 
                 while ($sresult = mysqli_fetch_assoc($sqry)) { ?>
                   <option value="<?php echo $sresult['SubjectName']; ?>"><?php echo $sresult['SubjectName']; ?></option>
                   <?php } ?>
                  </select>
                </div>
                <div class="col-md-2">
                  <div class="col-auto">
                    <!-- Button -->
                    <button class="col-12 btn-lg btn btn-primary" type="submit" name="ser" value="2">
                      Select
                    </button>
                  </div>
                </div>
              </div>
          </form>

          <?php if (isset($_POST['ser']) AND $_POST['sec'] != 'ABC') { ?>
            <form class="mb-4" method="POST" enctype="multipart/form-data">

              <!-- Divider -->
              <hr class="mt-5 mb-5">
              <h1 class="header-title">

                
                <?php echo $_POST['sec']; ?>
                
              </h1>
              <br>
              <!-- Project name -->
              <div class="form-group">
                
                <!-- Label  -->
                <label class="form-label">
                  Topic
                </label>

                <!-- Input -->
                <input type="text" name="srtopic" class="form-control">
                
              </div>

              <div class="form-group">
                
                <!-- Label  -->
                <label class="form-label">
                  Subject 
                </label>
                
                <!-- Input -->
                <input type="text" name="srsub" class="form-control" Value="<?php echo $_POST['sec']; ?>" readonly>
                
              </div>  
              
              <!-- Project description -->
              <div class="form-group">

                <!-- Label -->
                <label class="form-label mb-1">
                  Detail
                </label>
                
                <!-- Textarea -->
                <div>
                  <div class="form-group shadow-textarea">
                    <textarea class="form-control z-depth-1" id="exampleFormControlTextarea6" rows="4" name="srdetail" placeholder="Write Something Here..."></textarea>
                  </div>
                </div>
                
              </div>
              
              <!-- Divider -->
              <hr class="mt-5">
            	<div class="row justify-content-between align-items-center">
                <div class="col">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <!-- Personal details -->
											<!-- Avatar -->
											<div class="avatar">
												<img name="StuIMG" class="avatar-img rounded-circle" src="../assets/img/avatars/products/product-1.jpg" alt="..." id="IMG-preview">
											</div>
										</div>
										<div class="col ml-n2">
                      <!-- Heading -->
											<h4 class="mb-1">
                        Query Document
											</h4>
											<!-- Text -->
											<small class="text-muted">
                        Only allowed PNG, JPG or PDF less than 2MB
											</small>
										</div>
									</div>
									<!-- / .row -->
								</div>
								<div class="col-auto">
                  <!-- Button -->
									<input type="file" id="img" name="srdoc" class="btn btn-sm"
                  onchange="showPreview(event);" accept="application/pdf,image/png,image/jpg,image/jpeg">
								</div>
							</div>
							<!-- Priview Profile pic  -->
							<script>
								function showPreview(event) {
								    var file = document.getElementById('img');
								    if (file.files.length > 0) {
								        // RUN A LOOP TO CHECK EACH SELECTED FILE.
								        for (var i = 0; i <= file.files.length - 1; i++) {
								            var fsize = file.files.item(i).size; // THE SIZE OF THE FILE.	
								        }
								        if (fsize <= 2000000) {
								            var src = URL.createObjectURL(event.target.files[0]);
								            var preview = document.getElementById("IMG-preview");
								            preview.src = src;
								            preview.style.display = "block";
								        } else {
								            alert("Only allowed less then 2MB.. !");
								            file.value = '';
								        }
								    }
								}
							</script>
              <!-- Divider -->
              <hr class="mb-5">
              
              <!-- Buttons -->
              <input class="btn btn-block btn-primary mb-5" type="submit" name="sub">
            </form>
            <?php }  ?>
        </div>
      </div> <!-- / .row -->
    </div>

  </div> <!-- / .main-content -->
  
  </div>
</div> <!-- / .row -->
</div>

</div><!-- / .main-content -->

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

if(isset($_POST['sub'])){

  $f_name = $_FILES['srdoc']['name'];
  $f_tmp_name = $_FILES['srdoc']['tmp_name'];
	$f_size = $_FILES['srdoc']['size'];
	$f_error = $_FILES['srdoc']['error'];
  $f_ext = explode(".",strtolower($f_name));
  $f_extension = end($f_ext);
  
  $stuqry = "SELECT * FROM studentmaster WHERE StudentUserName = '$un'";
	$sturesult = mysqli_fetch_assoc(mysqli_query($conn, $stuqry));
	$qrfrom = $sturesult['StudentId'];
  
	$srsub = $_POST['srsub'];
  $facqry = "SELECT SubjectFacultyId FROM `subjectmaster` WHERE SubjectName = '$srsub'";
	$facresult = mysqli_fetch_assoc(mysqli_query($conn, $facqry));
	$qrto = $facresult['SubjectFacultyId'];
  
	$srtopic = $_POST['srtopic'];
	$srdetail = $_POST['srdetail'];
	$qrstatus = 0;
	$dt = date('Y-m-d');
  
  $qrdoc = $qrfrom."_".time()."_".$f_name;
  
	$sql = "INSERT INTO `querymaster`(`QueryFromId`, `QueryToId`, `QueryTopic`, `QueryQuestion`, `Querystatus`, `QuerySubject`, `QueryDocument`, `QueryGenDate`) 
	VALUES ('$qrfrom','$qrto','$srtopic','$srdetail','$qrstatus','$srsub','$qrdoc','$dt')";
	$run = mysqli_query($conn, $sql);
  
	if ($run == true) {
    echo "<script>alert('Request Sent .. ')</script>";
    
    if ($f_error === 0) {
      if ($f_size <= 2000000) {
        move_uploaded_file($f_tmp_name, "../src/uploads/querydocument/" . $qrdoc); // Moving Uploaded File to Server ... to uploades folder by file name f_name ... 
			} else {
				echo "<script>alert(File size is to big .. !);</script>";
			}
		} else {
			echo "Something went wrong .. !";
		}
		echo "<script>window.open('study_related.php','_self')</script>";
	} else {
    echo "<script>alert('Error to Send Request .. ')</script>";
		echo "<script>window.open('study_related.php','_self')</script>";
	}
  
}
?>
