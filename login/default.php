<!doctype html>
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
  </head>
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

            <!-- Password -->
            <div class="form-group">

              <!-- Label -->
              <label class="form-label">
                Password
              </label>

              <!-- Input group -->
              <div class="input-group input-group-merge">

                <!-- Input -->
                <input class="form-control" type="password" placeholder="Enter your password" name="pass" required>

                <!-- Icon -->
                <span class="input-group-text">
                  <i class="fe fe-eye"></i>
                </span>

              </div>
            </div>

            <!-- Submit -->
              <input type="submit" class="btn btn-lg btn-block btn-primary mb-3" name="login" value="Login">

          </form>

        </div>
      </div> <!-- / .row -->
    </div> <!-- / .container -->

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
        $row=array("id"=>"\0","pass"=>"\0");
        $na = $_POST['name'];
        $pass = $_POST['pass'];
        $na2 = substr($na,0,2);
        $sql = "SELECT * FROM test_login WHERE id = '$na' AND pass = '$pass'";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
            $row = mysqli_fetch_assoc($result);
        }
        else{
            echo "<script>alert('Invalid Login ID or Password');</script>";
        }
        if($na2 == "IN"){
            if($row['id'] == $na && $row['pass'] == $pass){
                session_start();
                $_SESSION['id'] = $na;
                $_SESSION['password'] = $pass;
                $_SESSION['role'] = "Texas";
                header("location:../institute_dashboard/");
            }
        }
        elseif($na2 == "LE"){
            if($row['id'] == $na && $row['pass'] == $pass){
                session_start();
                $_SESSION['id'] = $na;
                $_SESSION['password'] = $pass;
                $_SESSION['role'] = "Lagos";
                header("location:../faculty_dashboard/");
            }
        }
        elseif($na2 == "ST"){
            if($row['id'] == $na && $row['pass'] == $pass){
                session_start();
                $_SESSION['id'] = $na;
                $_SESSION['password'] = $pass;
                $_SESSION['role'] = "Abuja";
                header("location:../student_dashboard/");
            }
        }
    }
?>
