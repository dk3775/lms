<?php
session_start();
if ($_SESSION['role'] != "Lagos") {
   header("Location: ../index.php");
} else {
   include_once("../config.php");
   $_SESSION["userrole"] = "Faculty";
   $u = $_SESSION["id"];
}
#fetching tables
$branchsel = "SELECT * FROM branchmaster";
$branchresult = mysqli_query($conn, $branchsel);
$brcode = $_GET['brcode'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <?php include_once("../head.php"); ?>
</head>

<body>
   <?php $nav_role = "Time Table"; ?>
   <!-- NAVIGATION -->
   <?php include_once("nav.php"); ?>
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
                           <h5 class="header-pretitle">
                              <a class="btn-link btn-outline" onclick="history.back()"><i class="fe uil-angle-double-left"></i>Back</a>
                           </h5>
                           <h6 class="header-pretitle">
                              Add New
                           </h6>
                           <!-- Title -->
                           <h1 class="header-title">
                              Timetable
                           </h1>
                        </div>
                     </div>
                     <!-- / .row -->
                  </div>
               </div>
               <!-- Form -->
               <form method="POST" enctype="multipart/form-data" class="row g-3 needs-validation" >
                  <div class="card">
                     <div class="card-body text-center">
                        <div class="row justify-content-center">
                           <div class="col-12 col-md-12 col-xl-5">
                              <!-- Image -->
                              <h2 class="mb-3">
                                 Time Table Image
                              </h2>
                              <img src="../assets/img/illustrations/happiness.svg?t" id="IMG-preview" alt="..." class="img-fluid mb-3 rounded" style="margin:auto; max-width: 80%;">
                              <!-- Title -->
                           </div>
                           <div class="row justify-content-center">
                              <div class="col-12 col-md-6 m-auto">
                                 <!-- Heading -->
                                 <!-- Text -->
                                 <small class="text-muted">
                                    Only allowed PNG or JPG less than 2MB
                                 </small>
                              </div>
                              <div class="col-12 col-md-6">
                                 <input type="file" id="img" name="tpic" class="btn btn-sm" onchange="showPreview(event);" accept="image/jpg, image/jpeg, image/png">
                              </div>
                           </div>
                        </div>
                        <!-- / .row -->
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
                  <!-- / .row -->
                  <!-- Divider -->
                  <hr class="mb-5">
                  <div class="row">
                     <div class="col-12 col-md-6">
                        <!-- Middle name -->
                        <div class="form-group">
                           <!-- Label -->
                           <label class="form-label">
                              Time Table Branch
                           </label>
                           <!-- Input -->
                           <select class="form-control" id="validationCustom01" name="tbranch" required>
                              <option value="" hidden="">Select Branch</option>
                              <?php
                              while ($brrow = mysqli_fetch_assoc($branchresult)) { ?>
                                 <option value="<?php echo $brrow['BranchCode']; ?>" <?php if ($brrow['BranchCode'] == $brcode) { ?> selected <?php } ?> disabled>
                                    <?php echo $brrow['BranchName']; ?>
                                 </option>
                              <?php
                              } ?>
                           </select>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">
                        <!-- Last name -->
                        <div class="form-group">
                           <!-- Label -->
                           <label class="form-label">
                              Time Table Semester
                           </label>
                           <!-- Input -->
                           <select class="form-control" aria-label="Default select example" name="tsem" required>
                              <option hidden>Select Semester</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                           </select>
                        </div>
                     </div>
                  </div>
                  <!-- / .row   Only For Faculty Profile-->
                  <!-- <div class="row">
                        <div class="col-12 col-md-6">
                        	
                        	<div class="form-group">
                        	
                        		<label class="form-label">
                        			Time Table Uploaded By
                        		</label>
                        		
                        		<input type="text" class="form-control" name="tuploaded" required>
                        	</div>
                        </div>
                        <div class="col-12 col-md-6">
                        	<label class="form-label">
                        		Time Table Upload Time
                        	</label>
                        	<input type="datetime-local" class="form-control" name="ttime" required>
                        </div>
                        </div> -->
                  <hr>
                  <div class="d-flex justify">
                     <!-- Button -->
                     <button class="btn btn-primary" type="submit" value="sub" name="subbed">
                        Add Time Table
                     </button>
                  </div>
                  <!-- / .row -->
               </form>
               <br>
            </div>
         </div>
         <!-- / .row -->
      </div>
   </div>

   <?php include("context.php"); ?>
   <!-- Map JS -->
   <script src='https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.js'></script>
   <!-- Vendor JS -->
   <script src="../assets/js/vendor.bundle.js"></script>
   <!-- Theme JS -->
   <script src="../assets/js/theme.bundle.js"></script>
   <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
         'use strict'

         // Fetch all the forms we want to apply custom Bootstrap validation styles to
         var forms = document.querySelectorAll('.needs-validation')

         // Loop over them and prevent submission
         Array.prototype.slice.call(forms)
            .forEach(function(form) {
               form.addEventListener('submit', function(event) {
                  if (!form.checkValidity()) {
                     event.preventDefault()
                     event.stopPropagation()
                  }

                  form.classList.add('was-validated')
               }, false)
            })
      })()
   </script>
</body>

</html>
<?php
if (isset($_POST['subbed'])) {

   $f_tmp_name = $_FILES['tpic']['tmp_name'];
   $f_size = $_FILES['tpic']['size'];
   $f_error = $_FILES['tpic']['error'];

   $tbranch = $brcode;
   // $tbranch = $_POST['tbranch'];
   $tsem = $_POST['tsem'];

   $updsql = "SELECT `FacultyFirstName`,`FacultyLastName` FROM `facultymaster` WHERE `FacultyUserName` = '$u'";
   $updqry = mysqli_fetch_assoc(mysqli_query($conn, $updsql));
   $tupd = $updqry['FacultyFirstName'] . " " . $updqry['FacultyLastName'];
   $tupdtime = date("Y-m-d H:i:s");

   $tt_name = $tbranch . "_" . $tsem . ".png";

   if ($f_error === 0) {
      if ($f_size <= 2000000) {
         move_uploaded_file($f_tmp_name, "../src/uploads/timetables/" . $tt_name); // Moving Uploaded File to Server ... to uploades folder by file name f_name ... 
      } else {
         echo "<script>alert(File size is to big .. !);</script>";
      }
   } else {
      echo "Something went wrong .. !";
   }
   $sql = "INSERT INTO timetablemaster(TimetableBranchCode, TimetableSemester, TimetableUploadedBy, TimetableUploadTime, TimetableImage) 
    VALUES ('$tbranch','$tsem','$tupd','$tupdtime','$tt_name')";
   $run = mysqli_query($conn, $sql);
   if ($run == true) {
      echo "<script>alert('Time Table Added Successfully')</script>";
      echo "<script>window.open('timetable_list.php','_self')</script>";
   } else {
      echo "<script>alert('Time Table Not Added')</script>";
      echo "<script>window.open('add_timetable.php','_self')</script>";
   }
}
?>