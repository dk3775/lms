<?php
   session_start();
   if ($_SESSION['role'] != "Texas") {
   	header("Location: ../default.php");
   } else {
   	include_once("../config.php");
   	$_SESSION["userrole"] = "Faculty";
   }
   #fetching tables
   $branchsel = "SELECT * FROM branchmaster";
   $branchresult = mysqli_query($conn, $branchsel);
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <?php include_once("../head.php"); ?>
   </head>
   <body>
      <!-- NAVIGATION -->
      <?php include_once("../nav.php"); ?>
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
                                 Change
                              </h6>
                              <!-- Title -->
                              <h1 class="header-title">
                                 Logo
                              </h1>
                           </div>
                        </div>
                        <!-- / .row -->
                     </div>
                  </div>
                  <!-- Form -->
                  <form method="POST" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                     <div class="card">
                        <div class="card-body text-center">
                           <div class="row justify-content-center">
                              <div class="col-12 col-md-12 col-xl-5">
                                 <!-- Image -->
                                 
                                 <img src="../assets/img/logo.svg" id="IMG-preview" alt="..." class="img-fluid mb-3 rounded" style="margin:auto; max-width: 80%;">
                                 <!-- Title -->
                              </div>
                              <div class="row justify-content-center">
                                 <div class="col-12 col-md-6 m-auto">
                                    <!-- Heading -->
                                    <!-- Text -->
                                    <small class="text-muted">
                                    Only allowed SVG, PNG or JPG less than 4MB
                                    </small>
                                 </div>
                                 <div class="col-12 col-md-6">
                                    <input type="file" id="img" name="logo" class="btn btn-sm"
                                       onchange="showPreview(event);" accept="image/svg+xml application/svg+xml">
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
                                if (fsize <= 4000000) {
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
                   
                     <hr>
                     <div class="d-flex justify">
                        <!-- Button -->
                        <button class="btn btn-primary" type="submit" value="sub" name="subbed">
                            Change Logo
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
       
   	$f_tmp_name = $_FILES['logo']['tmp_name'];
   	$f_size = $_FILES['logo']['size'];
   	$f_error = $_FILES['logo']['error'];

   	$tt_name = "logo.svg";
   
   	if ($f_error === 0) {
   		if ($f_size <= 4000000) {
   			move_uploaded_file($f_tmp_name, "../assets/img/" . $tt_name); // Moving Uploaded File to Server ... to uploades folder by file name f_name ... 
   		} else {
   			echo "<script>alert(File size is to big .. !);</script>";
   		}
   	} else {
   		echo "Something went wrong .. !";
   	}
   }
   ?>