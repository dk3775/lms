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
            <a href="../faculty_dashboard" class="nav-link ">
              <i class="fe fe-home"></i> Dashboard
            </a>
          </li>

          <li class="nav-item">
            <a href="#sidebarProfile" class="nav-link" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarProfile">
              <i class="fe fe-file"></i>Student
            </a>
            <div class="collapse " id="sidebarProfile">
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
            <a href="#" class="nav-link ">
              <i class="fe fe-percent"></i> Marksheet
            </a>
          </li>


          <li class="nav-item">
            <a href="update.php" class="nav-link ">
              <i class="fe fe-bell"></i>Updates
            </a>
          </li>


          <li class="nav-item">
            <a href="attendance.php" class="nav-link ">
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
            <a href="account_related.php" class="nav-link">
              <i class="fe fe-user"></i>Account related Details
            </a>
          </li>
          </li>

          <li class="nav-item">
            <a href="study_related.php" class="nav-link active">
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
                    Study related help
                  </h1>

                </div>
              </div> <!-- / .row -->
            </div>
          </div>

          <!-- select -->

          <form class="mb-4" method="post">
            <div class="row">
              <div class="col-md-10">
                <select class="form-select form-select-lg mb-3" name="sec" aria-label=".form-select-lg example">
                  <option selected hidden>Open this select menu</option>
                  <option value="1">MAT</option>
                  <option value="2">CMT</option>
                </select>
              </div>
              <div class="col-md-2">
                <div class="col-auto">
                  <!-- Button -->
                  <button class="col-12 btn-lg btn btn-primary " type="submit" name="ser" value="2">
                    Select
                  </button>
                </div>
              </div>
            </div>
          </form>


          <?php
          error_reporting(E_ALL ^ E_WARNING);
          if ($_POST['sec'] === '1') {
          ?>

            <form class="mb-4">

              <!-- Divider -->
              <hr class="mt-5 mb-5">
              <h1 class="header-title">
                MAT
              </h1>
              <br>
              <!-- Project name -->
              <div class="form-group">

                <!-- Label  -->
                <label class="form-label">
                  Topic
                </label>

                <!-- Input -->
                <input type="text" class="form-control">

              </div>

              <div class="form-group">

                <!-- Label  -->
                <label class="form-label">
                  Subject 
                </label>

                <!-- Input -->
                <input type="text" class="form-control" Value="CMT" readonly>

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
                    <textarea class="form-control z-depth-1" id="exampleFormControlTextarea6" rows="3" placeholder="Write something here..."></textarea>
                  </div>
                </div>

              </div>

              <!-- Divider -->
              <hr class="mt-5 mb-5">

              <!-- Starting files -->
              <div class="form-group">

                <!-- Label -->
                <label class="mb-1">
                  Upload files
                </label>
                <small class="form-text text-muted">
                  Upload jpeg,png,pdf only
                </small>

                <!-- Card -->
                <div class="card">
                  <div class="card-body">

                    <!-- Dropzone -->
                    <div class="dropzone dropzone-multiple" data-dropzone='{"url": "https://"}'>

                      <!-- Fallback -->
                      <div class="fallback">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="customFileUpload" accept="image/jpeg,image/png,application/pdf" multiple>
                          <label class="custom-file-label" for="customFileUpload">Choose file</label>
                        </div>
                      </div>

                      <!-- Preview -->
                      <ul class="dz-preview dz-preview-multiple list-group list-group-lg list-group-flush">
                        <li class="list-group-item">
                          <div class="row align-items-center">
                            <div class="col-auto">

                              <!-- Image -->
                              <div class="avatar">
                                <img class="avatar-img rounded" src="data:image/svg+xml,%3csvg3c/svg%3e" alt="..." data-dz-thumbnail>
                              </div>

                            </div>
                            <div class="col ml-n3">

                              <!-- Heading -->
                              <h4 class="mb-1" data-dz-name>...</h4>

                              <!-- Text -->
                              <p class="small text-muted mb-0" data-dz-size></p>

                            </div>
                            <div class="col-auto">

                              <!-- Dropdown -->
                              <div class="dropdown">

                                <!-- Toggle -->
                                <a href="#" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <i class="fe fe-more-vertical"></i>
                                </a>

                                <!-- Menu -->
                                <div class="dropdown-menu dropdown-menu-right">
                                  <a href="#" class="dropdown-item" data-dz-remove>
                                    Remove
                                  </a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Divider -->
              <hr class="mt-5 mb-5">

              <!-- Buttons -->
              <input class="btn btn-block btn-primary" type="submit" name="submit">
            </form>
          <?php
          } elseif ($_POST['sec'] === '2') {
          ?>

            <form class="mb-4">

              <!-- Divider -->
              <hr class="mt-5 mb-5">
              <h1 class="header-title">
                CMT
              </h1>
              <br>
              <!-- Project name -->
              <div class="form-group">

                <!-- Label  -->
                <label class="form-label">
                  Topic
                </label>

                <!-- Input -->
                <input type="text" class="form-control">

              </div>

              <div class="form-group">

                <!-- Label  -->
                <label class="form-label">
                  Subject 
                </label>

                <!-- Input -->
                <input type="text" class="form-control" Value="CMT" readonly>

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
                    <textarea class="form-control z-depth-1" id="exampleFormControlTextarea6" rows="3" placeholder="Write something here..."></textarea>
                  </div>
                </div>

              </div>

              <!-- Divider -->
              <hr class="mt-5 mb-5">

              <!-- Starting files -->
              <div class="form-group">

                <!-- Label -->
                <label class="mb-1">
                  Upload files
                </label>
                <small class="form-text text-muted">
                  Upload jpeg,png,pdf only
                </small>

                <!-- Card -->
                <div class="card">
                  <div class="card-body">

                    <!-- Dropzone -->
                    <div class="dropzone dropzone-multiple" data-dropzone='{"url": "https://"}'>

                      <!-- Fallback -->
                      <div class="fallback">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="customFileUpload" accept="image/jpeg,image/png,application/pdf" multiple>
                          <label class="custom-file-label" for="customFileUpload">Choose file</label>
                        </div>
                      </div>

                      <!-- Preview -->
                      <ul class="dz-preview dz-preview-multiple list-group list-group-lg list-group-flush">
                        <li class="list-group-item">
                          <div class="row align-items-center">
                            <div class="col-auto">

                              <!-- Image -->
                              <div class="avatar">
                                <img class="avatar-img rounded" src="data:image/svg+xml,%3csvg3c/svg%3e" alt="..." data-dz-thumbnail>
                              </div>

                            </div>
                            <div class="col ml-n3">

                              <!-- Heading -->
                              <h4 class="mb-1" data-dz-name>...</h4>

                              <!-- Text -->
                              <p class="small text-muted mb-0" data-dz-size></p>

                            </div>
                            <div class="col-auto">

                              <!-- Dropdown -->
                              <div class="dropdown">

                                <!-- Toggle -->
                                <a href="#" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <i class="fe fe-more-vertical"></i>
                                </a>

                                <!-- Menu -->
                                <div class="dropdown-menu dropdown-menu-right">
                                  <a href="#" class="dropdown-item" data-dz-remove>
                                    Remove
                                  </a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Divider -->
              <hr class="mt-5 mb-5">

              <!-- Buttons -->
              <input class="btn btn-block btn-primary" type="submit" name="submit">
            </form>
          <?php
          }
          ?>



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