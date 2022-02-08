<?php
session_start();
if ($_SESSION['role'] != "Lagos") {
  header("Location: ../default.php");
} else {
  include_once("../config.php");
  $_SESSION["userrole"] = "Faculty";
  $qur = "SELECT * FROM `studentmaster` WHERE ``='Abuja'";
}
?>
<!doctype html>
<html lang="en">

<head>
  <?php include_once("../head.php"); ?>
</head>

<body>
  <!-- NAVIGATION -->
  <?php include_once("../nav.php"); ?>
  <!-- MAIN CONTENT -->
  <div class="main-content">

    <div class="header">
      <!-- Image -->
      <!-- HEADER -->
      <div class="header">
        <div class="container-fluid">
          <!-- Body -->
          <div class="header-body">
            <div class="row align-items-end">
              <div class="col">
                <!-- Pretitle -->
                <h6 class="header-pretitle">
                  <?php echo $_SESSION['userrole']; ?>
                </h6>
                <!-- Title -->
                <h1 class="header-title">
                  Dashboard
                </h1>
              </div>
            </div>
            <!-- / .row -->
          </div>
          <!-- / .header-body -->
        </div>
      </div>
      <!-- / .header -->

      <br><br>

      <div class="container-fluid">

        <!-- Body -->
        <div class="header-body mt-n5 mt-md-n6">
          <div class="row align-items-center">
            <div class="col-auto">

              <!-- Avatar -->
              <div class="../avatar avatar-xxl header-avatar-top">
                <img src="../assets/img/avatars/profiles/avatar-1.jpg" alt="..." class="avatar-img rounded-circle border border-4 border-body">
              </div>

            </div>
            <div class="col mb-3 ml-n3 ml-md-n2">

              <!-- Pretitle -->
              <h6 class="header-pretitle">
                Student
              </h6>

              <!-- Title -->
              <h1 class="header-title">
                Dianna Smiley
              </h1>

            </div>
            <div class="col-12 col-md-auto mt-2 mt-md-0 mb-md-3">

              <!-- Button -->
              <a href="#!" class="btn btn-primary d-block d-md-inline-block lift">
                Edit
              </a>

            </div>
          </div> <!-- / .row -->
          <div class="row align-items-center">
            <div class="col">

              <!-- Nav -->
              <ul class="nav nav-tabs nav-overflow header-tabs">
                <li class="nav-item">
                  <a href="profile_files.php" class="nav-link h3 active">
                    Basic Details
                  </a>
                </li>
              </ul>

            </div>
          </div>
        </div> <!-- / .header-body -->

      </div>
    </div>

    <!-- CONTENT -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

          <!-- Files -->
          <div class="card" data-list='{"valueNames": ["name"]}'>
            <div class="card-body">
              <h1 class="header-title">
                Personal Info :
              </h1>
              <br>
              <div class="input-group">
                <span class="input-group-text col-2 text-dark">First name</span>
                <input type="text" value="Arshit Jolapara" aria-label="First name" class="form-control" disabled>
              </div>
              <br>
              <div class="input-group">
                <span class="input-group-text col-2 text-dark">Sem</span>
                <input type="text" value="5" aria-label="First name" class="form-control" disabled>
                <span class="input-group-text col-2 text-dark">Branch</span>
                <input type="text" value="VI-DCX" aria-label="Last name" class="form-control disable">
              </div>
              <br>
              <div class="input-group">
                <span class="input-group-text col-2 text-dark">Phone no.</span>
                <input type="text" value="9638684082" aria-label="First name" class="form-control" disabled>
                <span class="input-group-text col-2 text-dark">Email</span>
                <input type="text" value="aarshitjolapara11@gmail.com" aria-label="Last name" class="form-control disable">
              </div>
              <br>
              <div class="input-group">
                <span class="input-group-text col-2 text-dark">Enrollment No.</span>
                <input type="text" value="Jolapara" aria-label="First name" class="form-control" disabled>
                <span class="input-group-text col-2 text-dark">Roll No.</span>
                <input type="text" value="Arshit" aria-label="Last name" class="form-control disable">
              </div>
              <br>
              <div class="input-group  input-group-lg mb-3">
                <span class="input-group-text col-2 text-dark">Address</span>
                <textarea class="form-control" aria-label="With textarea" disabled>abc hello nubs</textarea>
              </div>
              <div class="card-body">
                <h1 class="header-title">
                  Parent Info :
                </h1>
                <br>
                <div class="input-group">
                  <span class="input-group-text col-2 text-dark">Father name</span>
                  <input type="text" value="123" aria-label="First name" class="form-control" disabled>
                  <span class="input-group-text col-2 text-dark">Phone No.</span>
                  <input type="text" value="123" aria-label="First name" class="form-control" disabled>
                </div>
                <br>
                <div class="input-group">
                  <span class="input-group-text col-2 text-dark">Mother name</span>
                  <input type="text" value="123" aria-label="First name" class="form-control" disabled>
                  <span class="input-group-text col-2 text-dark">Phone No.</span>
                  <input type="text" value="123" aria-label="Last name" class="form-control disable">
                </div>
                <br>
              </div>
            </div>

          </div>
        </div>
      </div> <!-- / .row -->
    </div>

  </div> <!-- / .main-content -->

	<?php include("context.php");?>
  <!-- JAVASCRIPT -->
  <!-- Map JS -->
  <script src='https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.js'></script>

  <!-- Vendor JS -->
  <script src="../assets/js/vendor.bundle.js"></script>

  <!-- Theme JS -->
  <script src="../assets/js/theme.bundle.js"></script>

</body>

</html>