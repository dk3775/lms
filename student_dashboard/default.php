<?php
  session_start();
  if($_SESSION['role']!="Abuja"){
    header("Location: ../default.php");
  }
  else{
    include_once("../config.php");
    $_SESSION["userrole"]="Student";
    $qur="SELECT * FROM `studentmaster` WHERE ``='Abuja'";
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc." />
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="../assets/favicon/favicon.ico" type="image/x-icon"/>
    
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
    <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light" id="sidebar">
      <div class="container-fluid">
    
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    
        <!-- Brand -->
        <a class="navbar-brand" href="dashboard.html">
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
              <a href="./wizard.html" class="nav-link ">
                <i class="fe fe-home"></i> Dashboard
              </a>
            </li>

            <li class="nav-item">
              <a href="#sidebarProfile" class="nav-link" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarProfile">
                <i class="fe fe-file"></i>Assignment
              </a>
              <div class="collapse " id="sidebarProfile">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="#" class="nav-link ">
                      Mat
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link ">
                      C++
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link ">
                      java
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link ">
                      c
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link ">
                      cmt
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
                <a href="#" class="nav-link ">
                  <i class="fe fe-bell"></i>Updates 
                </a>
              </li>


              <li class="nav-item">
                <a href="#" class="nav-link ">
                  <i class="fe fe-clipboard"></i>Attendance 
                </a>
              </li>
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
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link ">
                <i class="fe fe-book"></i>Study related querys
                </a>
              </li>
                </ul>
              </div>
            </li>
            
          </ul>
      </div>
    </nav>

    <!-- MAIN CONTENT -->
    <div class="main-content">

      
      

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
              <div class="col-auto">

                <!-- Button -->
                <a href="#!" class="btn btn-primary lift">
                  logout 
                </a>

              </div>
            </div> <!-- / .row -->
          </div> <!-- / .header-body -->

        </div>
      </div> <!-- / .header -->
        <br><br>
      <div class="container-fluid">
        <div class="page-header min-height-100 border-radius-xl mt-4">
        </div>
        <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
          <div class="row gx-4">
            <div class="col-auto">
              <div class="avatar avatar-xl position-relative">
                <img src="../assets/test1.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
              </div>
            </div>
            <div class="col-auto my-auto">
              <div class="h-100">
                <h3 class="mb-1 font-weight-bold text-sm">
                  Computer
                </h3>
                <h1 class="mb-0 font-weight-bold text-sm">
                  Alec Thompson
                </h1>
                <p class="mb-0 font-weight-bold text-sm">
                  Sem - 5
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- CARDS -->
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-lg-6 col-xl">

            <!-- Value  -->
            <div class="card">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col">

                    <!-- Title -->
                    <h6 class="text-uppercase text-muted mb-2">
                      SPI
                    </h6>

                    <!-- Heading -->
                    <span class="h2 mb-0">
                      9.58
                    </span>

                  </div>
                  <div class="col-auto">

                    <!-- Icon -->
                    <span></span>

                  </div>
                </div> <!-- / .row -->
              </div>
            </div>

          </div>
          <div class="col-12 col-lg-6 col-xl">

            <!-- Hours -->
            <div class="card">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col">

                    <!-- Title -->
                    <h6 class="text-uppercase text-muted mb-2">
                      Attendance 
                    </h6>

                    <!-- Heading -->
                    <span class="h2 mb-0">
                      55%
                    </span>

                  </div>
                  <div class="col-auto">

                    <!-- Icon -->
                    <span class="h2 fe fe-briefcase text-muted mb-0"></span>

                  </div>
                </div> <!-- / .row -->
              </div>
            </div>

          </div>
          <div class="col-12 col-lg-6 col-xl">

            <!-- Exit -->
            <div class="card">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col">

                    <!-- Title -->
                    <h6 class="text-uppercase text-muted mb-2">
                      assignment
                    </h6>

                    <!-- Heading -->
                    <span class="h2 mb-0">
                      10/40
                    </span>

                  </div>
                  <div class="col-auto">



                  </div>
                </div> <!-- / .row -->
              </div>
            </div>

          </div>
          <div class="col-12 col-lg-6 col-xl">

            <!-- Time -->
            <div class="card">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col">

                    <!-- Title -->
                    <h6 class="text-uppercase text-muted mb-2">
                      Avg. Time
                    </h6>

                    <!-- Heading -->
                    <span class="h2 mb-0">
                      2:37
                    </span>

                  </div>
                  <div class="col-auto">

                    <!-- Icon -->
                    <span class="h2 fe fe-clock text-muted mb-0"></span>

                  </div>
                </div> <!-- / .row -->
              </div>
            </div>

          </div>
        </div> <!-- / .row -->
        
         
        <!-- / .row -->
              </div>
            </div>

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
