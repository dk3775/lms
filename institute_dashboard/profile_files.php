<?php
session_start();
if ($_SESSION['role'] != "Texas") {
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
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light" id="sidebar">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand" href="../institute_dashboard/">
        <img src="../assets/img/logo.svg" class="navbar-brand-img mx-auto" alt="...">
      </a>
      <!-- User (xs) -->
      <div class="navbar-user d-md-none">
        <!-- Dropdown -->
        <div class="dropdown">
        </div>
      </div>
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidebarCollapse">
        <!-- Form -->
        <form class="mt-4 mb-3 d-md-none">
          <div class="input-group input-group-rounded input-group-merge input-group-reverse">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-text">
              <span class="fe fe-search"></span>
            </div>
          </div>
        </form>
        <!-- Navigation -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="../institute_dashboard" class="nav-link">
              <i class="fe fe-home"></i> Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a href="#sidebarProfile" class="nav-link" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarProfile">
              <i class="fe uil-user"></i>Student
            </a>
            <div class="collapse" id="sidebarProfile">
              <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                  <a href="student_list.php" class="nav-link ">
                    View Student List
                  </a>
                </li>
                <li class="nav-item">
                  <a href="add_student.php" class="nav-link">
                    Add New Student
                  </a>
                </li>
                <li class="nav-item">
                  <a href="edit_student.php" class="nav-link">
                    Edit Student Details
                  </a>
                </li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a href="#sidebarPages" class="nav-link " data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarPages">
              <i class="fe uil-graduation-cap"></i>Faculty
            </a>
            <div class="collapse" id="sidebarPages">
              <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                  <a href="faculty_list.php" class="nav-link ">
                    View Faculty List
                  </a>
                </li>
                <li class="nav-item">
                  <a href="add_faculty.php" class="nav-link ">
                    Add New Faculty
                  </a>
                </li>
                <li class="nav-item">
                  <a href="edit_faculty.php" class="nav-link">
                    Edit Faculty Details
                  </a>
                </li>
                <li class="nav-item">
                  <a href="faculty_profile.php" class="nav-link ">
                    Faculty Profile
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a href="#sidebarCrm" class="nav-link" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarCrm">
              <i class="fe uil-book"></i>Branch/subject
            </a>
            <div class="collapse" id="sidebarCrm">
              <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                  <a href="branch_list.php" class="nav-link">
                    View Branch List
                  </a>
                </li>
                <li class="nav-item">
                  <a href="add_branch.php" class="nav-link">
                    Add New Branch
                  </a>
                </li>
                <li class="nav-item">
                  <a href="edit_branch.php" class="nav-link">
                    Edit Branch
                  </a>
                </li>
                <li class="nav-item">
                  <a href="subject_list.php" class="nav-link">
                    View Subject List
                  </a>
                </li>
                <li class="nav-item">
                  <a href="add_subject.php" class="nav-link">
                    Add New Subject
                  </a>
                </li>
                <li class="nav-item">
                  <a href="edit_subject.php" class="nav-link">
                    Edit Subject
                  </a>
                </li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link ">
              <i class="fe fe-percent"></i> Marksheet
            </a>
          </li>
          <li class="nav-item">
            <a href="update.php" class="nav-link ">
              <i class="fe fe-bell"></i>Updates
            </a>
          </li>
          <li class="nav-item d-md-none">
            <a class="nav-link" href="#" data-toggle="modal">
              <span class="fe fe-bell"></span> Notifications
            </a>
          </li>
        </ul>
        <!-- Divider -->
        <hr class="navbar-divider my-3">
        <!-- Heading -->
        <h6 class="navbar-heading">
          Help Center
        </h6>
        <!-- Navigation -->
        <ul class="navbar-nav mb-md-4">
          <li class="nav-item">
            <a href="#" class="nav-link ">
              <i class="fe fe-user"></i>Account related Details
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link ">
              <i class="fe fe-book"></i>Study related querys
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

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

  <!-- JAVASCRIPT -->
  <!-- Map JS -->
  <script src='https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.js'></script>

  <!-- Vendor JS -->
  <script src="../assets/js/vendor.bundle.js"></script>

  <!-- Theme JS -->
  <script src="../assets/js/theme.bundle.js"></script>

</body>

</html>