<?php
session_start();
if ($_SESSION['role'] != "Texas") {
   header("Location: ../index.php");
} else {
   include_once("../config.php");
   $_SESSION["userrole"] = "Institute";
}
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
                              Add New
                           </h6>
                           <!-- Title -->
                           <h1 class="header-title">
                              Institute User
                           </h1>
                        </div>
                     </div>
                     <!-- / .row -->
                  </div>
               </div>
               <!-- Form -->
               <form method="POST" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                  <div class="row justify-content-between align-items-center">
                     <div class="col">
                        <div class="row align-items-center">
                           <div class="col-auto">
                              <!-- Personal details -->
                              <!-- Avatar -->
                              <div class="avatar">
                                 <img name="inIMG" class="avatar-img rounded-circle" src="../assets/img/avatars/profiles/avatar-1.jpg" alt="..." id="IMG-preview">
                              </div>
                           </div>
                           <div class="col ml-n2">
                              <!-- Heading -->
                              <h4 class="mb-1">
                                 User Photo
                              </h4>
                              <!-- Text -->
                              <small class="text-muted">
                                 Only allowed PNG or JPG less than 2MB
                              </small>
                           </div>
                        </div>
                        <!-- / .row -->
                     </div>
                     <div class="col-auto">
                        <!-- Button -->
                        <input type="file" id="img" name="inprofile" class="btn btn-sm" onchange="showPreview(event);" accept="image/jpg, image/jpeg, image/png">
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
                  <hr class="my-5">
                  <div class="row">
                     <div class="col-12 col-md-6">
                        <div class="form-group">
                           <label for="validationCustom01" class="form-label">
                              Institute User Name <small class="text-muted"> ( For Login ) </small>
                           </label>
                           <input oninput="cp()" type="text" class="form-control" id="inusername" name="inusername" required>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">
                        <label for="validationCustom01" class="form-label">
                           Password
                        </label>
                        <input oninput="cp()" type="password" class="form-control" id="inpass" name="inpass" required>
                     </div>
                  </div>
                  <hr class="md-5">
                  <div class="row">
                     <div class="col-12 col-md-12">
                        <div class="form-group">
                           <label for="validationCustom01" class="form-label">
                              User Full Name
                           </label>
                           <input type="text" class="form-control" id="validationCustom01" name="inname" required>
                        </div>
                     </div>

                  </div>
                  <!-- / .row -->
                  <div class="row">
                     <div class="col-12 col-md-6">
                        <!-- Email address -->
                        <div class="form-group">
                           <!-- Label -->
                           <label for="validationCustom01" class="form-label">
                              User Email address
                           </label>
                           <!-- Input -->
                           <input type="email" class="form-control" id="validationCustom01" name="inemail" required>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">
                        <label for="validationCustom01" class="form-label">
                           User Contact Number
                        </label>
                        <input type="tel" pattern="[0-9]{10}" maxlength="10" id="validationCustom01" class="form-control" name="incontact" required>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-12 col-md-6">
                        <!-- Email address -->
                        <div class="form-group">
                           <!-- Label -->
                           <label for="validationCustom01" class="form-label">
                              User Role
                           </label>
                           <!-- Input -->
                           <input type="text" class="form-control" id="validationCustom01" name="inrole" required>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">
                        <label for="validationCustom01" class="form-label">
                           User Office
                        </label>
                        <input type="text" maxlength="10" id="validationCustom01" class="form-control" name="inoffice" required>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-12">
                        <!-- Email address -->
                        <div class="form-group">
                           <!-- Label -->
                           <label for="validationCustom01" class="form-label">
                              User Address
                           </label>
                           <!-- Input -->
                           <textarea id="validationCustom01" rows="2" maxlength="200" class="form-control" name="add" required></textarea>
                        </div>
                     </div>
                  </div>
                  <hr class="mt-4 mb-5">
                  <div class="row">
                     <div class="col-12 col-md-6">
                        <div class="form-group">
                           <p class="form-label">
                              Institute User Login ID
                           </p>
                        </div>
                     </div>
                     <div class="col-auto col-6">
                        <div class="input-group input-group-sm mb-3 ">
                           <textarea id="demo" class="form-control fs-2" name="ec" readonly maxlength="4"></textarea>
                           <button class="btn btn-primary" onclick="cp1()"><i class="fe fe-copy"></i></button>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-12 col-md-6">
                        <div class="form-group">
                           Institute User Password
                        </div>
                     </div>
                     <div class="col-auto col-6">
                        <div class="input-group input-group-sm mb-3">
                           <textarea type="text" class="form-control" readonly name="spassword" id="myInput2"></textarea>
                           <button class="btn btn-primary" onclick="cp2()"><i class="fe fe-copy"></i></button>
                        </div>
                     </div>
                  </div>
                  <hr class="mt-4 mb-5">
                  <div class="d-flex justify">
                     <!-- Button -->
                     <button class="btn btn-primary" type="submit" value="sub" name="subbed">
                        Add Institute User
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
      function cp() {
         var x = document.getElementById("inusername").value;
         document.getElementById("demo").innerHTML = "IN" + x;

         let num = document.getElementById("inpass").value;
         document.getElementById("myInput2").innerHTML = num;

      }

      function cp1() {
         /* Get the text field */
         var copyText = document.getElementById("demo");

         /* Select the text field */
         copyText.select();
         copyText.setSelectionRange(0, 99999); /* For mobile devices */

         /* Copy the text inside the text field */
         navigator.clipboard.writeText(copyText.value);

         /* Alert the copied text */
         alert("Copied the text: " + copyText.value);
      }

      function cp2() {
         /* Get the text field */
         var copyText = document.getElementById("myInput2");

         /* Select the text field */
         copyText.select();
         copyText.setSelectionRange(0, 99999); /* For mobile devices */

         /* Copy the text inside the text field */
         navigator.clipboard.writeText(copyText.value);

         /* Alert the copied text */
         alert("Copied the text: " + copyText.value);
      }
   </script>
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

   $f_tmp_name = $_FILES['inprofile']['tmp_name'];
   $f_size = $_FILES['inprofile']['size'];
   $f_error = $_FILES['inprofile']['error'];

   $inname = $_POST['inname'];
   $inemail = $_POST['inemail'];
   $incontact = $_POST['incontact'];
   $dob = $_POST['dob'];
   $add = $_POST['add'];
   $inusername = $_POST['inusername'];
   $inpass = $_POST['inpass'];
   // $spass = password_hash($spassword,PASSWORD_BCRYPT); //hashing the $spassword 
   $inrole = $_POST['inrole'];
   $inoffice = $_POST['inoffice'];

   $fs_name = $inusername . ".png";

   $sql = "INSERT INTO `institutemaster`(`InstituteUserName`, `InstitutePassword`, `InstituteName`, `InstituteRole`, `InstituteProfilePic`, `InstituteEmail`, `InstituteContactNo`, `InstituteAddress`, `InstituteOffice`) 
	   VALUES ('$inusername','$inpass','$inname','$inrole','$fs_name','$inemail','$incontact','$add','$inoffice')";
   $run = mysqli_query($conn, $sql);
   if ($run == true) {
      if ($f_error === 0) {
         if ($f_size <= 2000000) {
            move_uploaded_file($f_tmp_name, "../src/uploads/inprofile/" . $fs_name); // Moving Uploaded File to Server ... to uploades folder by file name f_name ... 
         } else {
            echo "<script>alert(File size is to big .. !);</script>";
         }
      } else {
         echo "Something went wrong .. !";
      }
      echo "<script>alert('Institute User Added Successfully')</script>";
      echo "<script>window.open('institute_list.php','_self')</script>";
   } else {
      echo "<script>alert('Institute User Not Added')</script>";
      echo "<script>window.open('add_student.php','_self')</script>";
   }
}
?>