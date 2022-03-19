<?php
session_start();
if ($_SESSION['role'] != "Lagos") {
   header("Location: ../index.php");
} else {
   include_once "../config.php";
   $_SESSION["userrole"] = "Faculty";
}

$updid = $_GET['updid'];
$updatesel = "SELECT * FROM updatemaster WHERE UpdateId='$updid'";
$updateresult = mysqli_query($conn, $updatesel);
$row = mysqli_fetch_assoc($updateresult);
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <?php include_once "../head.php"; ?>
</head>

<body>
   <?php $nav_role = "Updates"; ?>
   <!-- NAVIGATION -->
   <?php include_once "../nav.php"; ?>
   <!-- MAIN CONTENT -->
   <div class="main-content">
      <div class="container-fluid">
         <div class="row justify-content-center">
            <div class="col-12 col-xl-10">
               <!-- Header -->
               <div class="header mt-md-5">
                  <div class="header-body">
                     <div class="row align-items-center">
                        <div class="col">
                           <h5 class="header-pretitle">
									<a class="btn-link btn-outline" onclick="history.back()"><i class="fe uil-angle-double-left"></i>Back</a>
								</h5>
                           <h6 class="header-pretitle">
                              Edit
                           </h6>
                           <!-- Title -->
                           <h1 class="header-title">
                              Update
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
                              <h2 class="mb-3">
                                 Update Image
                              </h2>
                              <img src="../src/uploads/updates/<?php echo $row['UpdateFile'] . "?t"; ?>" id="IMG-preview" alt="..." class="img-fluid mb-3 rounded" style="margin:auto; max-width: 80%;">
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
                                 <input type="file" id="img" name="updpic" class="btn btn-sm" onchange="showPreview(event);" accept="image/jpg, image/jpeg, image/png">
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
                        <!-- Last name -->
                        <div class="form-group">
                           <!-- Label -->
                           <label class="form-label">
                              Update Title
                           </label>
                           <!-- Input -->
                           <input type="text" class="form-control" id="validationCustom01" value="<?php echo $row['UpdateTitle']; ?>" name="updtitle" required>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">
                        <!-- Middle name -->
                        <div class="form-group">
                           <!-- Label -->
                           <label class="form-label">
                              Update Type
                           </label>
                           <!-- Input -->
                           <select class="form-control" id="validationCustom01" name="updtype" required>
                              <option value="" hidden="">Select Type</option>
                              <option <?php if ($row['UpdateType'] == 'GTU') { ?> selected <?php } ?> value="GTU">GTU</option>
                              <option <?php if ($row['UpdateType'] == 'Campus') { ?> selected <?php } ?>value="Campus">Campus</option>

                           </select>
                        </div>
                     </div>

                  </div>
                  <div class="row">
                     <div class="form-group">
                        <!-- Label -->
                        <label class="form-label">
                           Update Description
                        </label>
                        <div class="col-12 col-md-12">
                           <div class="input-group input-group-sm mb-3 ">
                              <textarea id="demo" rows="4" class="form-control fs-2" name="upddescription"><?php echo $row['UpdateDescription'] ?></textarea>
                           </div>
                        </div>
                     </div>
                  </div>
                  <hr>
                  <div class="d-flex justify">
                     <!-- Button -->
                     <button class="btn btn-primary" type="submit" value="sub" name="subbed">
                        Save Changes
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
   <?php include_once("context.php"); ?>
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
   // $f_name = $_FILES['updpic']['name'];
   $f_tmp_name = $_FILES['updpic']['tmp_name'];
   $f_size = $_FILES['updpic']['size'];
   $f_error = $_FILES['updpic']['error'];
   // $f_type = $_FILES['updpic']['type'];
   // $f_ext = explode('.', $f_name);
   // $f_ext = strtolower(end($f_ext));

   $updtitle = $_POST['updtitle'];
   $updtype = $_POST['updtype'];
   $upddescription = $_POST['upddescription'];
   $updloadby = "Institute";
   $updtime = date("Y-m-d");

   $upd_file = $updtitle . ".png";

   if ($f_error === 0) {
      if ($f_size <= 2000000) {
         move_uploaded_file($f_tmp_name, "../src/uploads/updates/" . $upd_file); // Moving Uploaded File to Server ... to uploades folder by file name f_name ...
      } else {
         echo "<script>alert(File size is to big .. !);</script>";
      }
   } else {
      echo "Something went wrong .. !";
   }
   $sql = "UPDATE `updatemaster` SET `UpdateTitle`='$updtitle',
    `UpdateDescription`='$upddescription',
    `UpdateFile`='$upd_file',
    `UpdateUploadedBy`='$updloadby',
    `UpdateType`='$updtype' WHERE `UpdateId`='$updid'";
   $run = mysqli_query($conn, $sql);

   if ($run == true) {
      echo "<script>alert('Update Edited Successfully')</script>";
      echo "<script>window.open('update_list.php','_self')</script>";
   } else {
      echo "<script>alert('Update Not Edited')</script>";
      echo "<script>window.open('edit_update.php?updid=$updid','_self')</script>";
   }
}

?>