<?php
session_start();
error_reporting(E_ALL ^ E_WARNING);
if ($_SESSION['role'] != "Abuja") {
   header("Location: ../index.php");
} else {
   include_once "../config.php";
   $_SESSION["userrole"] = "student";
   $id = $_SESSION["userid"];
   $uqur = "SELECT * FROM studyquerymaster INNER JOIN subjectmaster ON studyquerymaster.QuerySubject =  subjectmaster.SubjectCode WHERE QueryFromId = '$id'";
   $ures = mysqli_query($conn, $uqur);
   $acqur = "SELECT * FROM accountquerymaster WHERE QueryFromId = '$id'";
   $acres = mysqli_query($conn, $acqur);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <?php include_once "../head.php"; ?>
</head>

<body>
   <!-- NAVIGATION -->
   <?php
   $nav_role = "All querys";
   include_once "nav.php"; ?>
   <!-- MAIN CONTENT -->
   <div class="main-content">
      <div class="container-fluid">
         <div class="row justify-content-center">
            <div class="col-12">
               <!-- Header -->
               <div class="header">
                  <div class="header-body">
                     <div class="row align-items-center">
                        <div class="col">
                           <h5 class="header-pretitle">
                              <a class="btn-link btn-outline" onclick="history.back()"><i class="fe uil-angle-double-left"></i>Back</a>
                           </h5>
                           <h6 class="header-pretitle">
                              View
                           </h6>
                           <!-- Title -->
                           <h1 class="header-title text-truncate">
                              Query List
                           </h1>
                        </div>
                     </div>
                     <!-- / .row -->
                  </div>
               </div>
               <!-- MAIN CONTENT -->
               <?php if (mysqli_num_rows($ures) > 0) { ?>
                  <div class="main-content">

                     <div class="container-fluid">
                        <div class="row justify-content-center">
                           <!-- Table -->
                           <div class="card">
                              <div class="card-header">
                                 <!-- Title -->
                                 <h2 class="card-header-title ">
                                    Study Related Queries
                                 </h2>
                              </div>
                              <div class="container-fluid">
                                 <div class="row justify-content-center">
                                    <div class="tab-content">
                                       <div class="tab-pane fade show active" id="contactsListPane" role="tabpanel" aria-labelledby="contactsListTab">
                                          <!-- Card -->
                                          <div class="card" data-list='{"valueNames": ["item-name", "item-title", "item-email", "item-phone", "item-score", "item-company"], "page": 10, "pagination": {"paginationClass": "list-pagination"}}' id="contactsList">
                                             <div class="card-header">
                                                <div class="row align-items-center">
                                                   <div class="col">
                                                      <!-- Form -->
                                                      <form>
                                                         <div class="input-group input-group-flush input-group-merge input-group-reverse">
                                                            <input class="form-control list-search" type="search" placeholder="Search">
                                                            <span class="input-group-text">
                                                               <i class="fe fe-search"></i>
                                                            </span>
                                                         </div>
                                                      </form>
                                                   </div>
                                                   <div class="col-auto">
                                                   </div>
                                                </div>
                                                <!-- / .row -->
                                             </div>
                                             <div class="table-responsive">
                                                <table class="table table-sm table-hover table-nowrap card-table">
                                                   <thead>
                                                      <tr>
                                                         <th>
                                                            <a class="list-sort text-muted" data-sort="item-score">#</a>
                                                         </th>
                                                         <th>
                                                            <a class="list-sort text-muted" data-sort="item-score">Date</a>
                                                         </th>
                                                         <th>
                                                            <a class="list-sort text-muted" data-sort="item-score">QueryTopic</a>
                                                         </th>
                                                         <th>
                                                            <a class="list-sort text-muted" data-sort="item-name">QuerySubject</a>
                                                         </th>
                                                         <th>
                                                            <a class="list-sort text-muted">Querystatus</a>
                                                         </th>
                                                         <th>
                                                            <a class="text-muted justify-content-center">Action</a>
                                                         </th>
                                                         <th>
                                                         </th>
                                                      </tr>
                                                   </thead>
                                                   <tbody class="list font-size-base">
                                                      <?php
                                                      $x = 1;
                                                      while ($urow = mysqli_fetch_assoc($ures)) { ?>
                                                         <tr>
                                                            <td>
                                                               <?php echo $x++; ?>
                                                            </td>
                                                            <td>
                                                               <span class="item-score"><?php echo $urow['QueryGenDate']; ?></span>
                                                            </td>
                                                            <td>
                                                               <span class="item-score"><?php echo $urow['QueryTopic']; ?></span>
                                                            </td>
                                                            <td>
                                                               <!-- Text -->
                                                               <?php
                                                               $a = $urow['QuerySubject'];
                                                               if ($a == "") { ?>
                                                                  <center><span class="">-</span></center>
                                                               <?php
                                                               } else { ?>
                                                                  <span class="item-name"><?php echo $urow['SubjectName']; ?></span>
                                                               <?php
                                                               }
                                                               ?>
                                                            </td>
                                                            <td>
                                                               <?php
                                                               $a = $urow['Querystatus'];
                                                               if ($a == 1) { ?>
                                                                  <span class="badge bg-soft-primary">New</span>
                                                               <?php
                                                               } else if ($a == 2) { ?>
                                                                  <span class="badge bg-soft-success">Solved</span>
                                                               <?php
                                                               }
                                                               ?>
                                                            </td>
                                                            <td>
                                                               <a href="query_profile.php?qid=<?php echo $urow['QueryId']; ?>&type=1" type="button" class="btn btn-sm btn-info">View</a>&nbsp;
                                                               <?php if ($urow['QueryDocument'] != "") { ?>
                                                                  <a download="<?php echo $urow['QueryDocument']; ?>" href="../src/uploads/querydocument/<?php echo $urow['QueryDocument']; ?>" type="button" class="btn btn-sm btn-success">Download</a>
                                                               <?php } ?>
                                                            </td>
                                                            <td></td>
                                                         </tr>

                                                      <?php } ?>
                                                      <!--over-->
                                                   </tbody>
                                                </table>
                                             </div>
                                             <div class="card-footer d-flex justify-content-between">
                                                <!-- Pagination (prev) -->
                                                <ul class="list-pagination-prev pagination pagination-tabs card-pagination">
                                                   <li class="page-item">
                                                      <a class="page-link pl-0 pr-4 border-right" href="#">
                                                         <i class="fe fe-arrow-left mr-1"></i> Prev
                                                      </a>
                                                   </li>
                                                </ul>
                                                <!-- Pagination -->
                                                <ul class="list-pagination pagination pagination-tabs card-pagination">
                                                   <li class="active"><a class="page" href="javascript:function Z(){Z=&quot;&quot;}Z()">1</a></li>
                                                   <li><a class="page" href="javascript:function Z(){Z=&quot;&quot;}Z()">2</a></li>
                                                   <li><a class="page" href="javascript:function Z(){Z=&quot;&quot;}Z()">3</a></li>
                                                </ul>
                                                <!-- Pagination (next) -->
                                                <ul class="list-pagination-next pagination pagination-tabs card-pagination">
                                                   <li class="page-item">
                                                      <a class="page-link pl-4 pr-0 border-left" href="#">
                                                         Next <i class="fe fe-arrow-right ml-1"></i>
                                                      </a>
                                                   </li>
                                                </ul>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               <?php } else { ?>
                  <div class="col-12">
                     <h1 class="card header-title m-5 p-5"> Oops, No Study Queries To Show</h1>
                  </div>
               <?php
               }
               ?>
               <?php if (mysqli_num_rows($acres) > 0) { ?>
                  <div class="main-content">

                     <div class="container-fluid">
                        <div class="row justify-content-center">
                           <!-- Table -->
                           <div class="card">
                              <div class="card-header">
                                 <!-- Title -->
                                 <h2 class="card-header-title ">
                                    Account Related Queries
                                 </h2>
                              </div>
                              <div class="container-fluid">
                                 <div class="row justify-content-center">
                                    <div class="tab-content">
                                       <div class="tab-pane fade show active" id="contactsListPane" role="tabpanel" aria-labelledby="contactsListTab">
                                          <!-- Card -->
                                          <div class="card" data-list='{"valueNames": ["item-name", "item-title", "item-email", "item-phone", "item-score", "item-company"], "page": 10, "pagination": {"paginationClass": "list-pagination"}}' id="contactsList">
                                             <div class="card-header">
                                                <div class="row align-items-center">
                                                   <div class="col">
                                                      <!-- Form -->
                                                      <form>
                                                         <div class="input-group input-group-flush input-group-merge input-group-reverse">
                                                            <input class="form-control list-search" type="search" placeholder="Search">
                                                            <span class="input-group-text">
                                                               <i class="fe fe-search"></i>
                                                            </span>
                                                         </div>
                                                      </form>
                                                   </div>
                                                   <div class="col-auto">
                                                   </div>
                                                </div>
                                                <!-- / .row -->
                                             </div>
                                             <div class="table-responsive">
                                                <table class="table table-sm table-hover table-nowrap card-table">
                                                   <thead>
                                                      <tr>
                                                         <th>
                                                            <a class="list-sort text-muted" data-sort="item-score">#</a>
                                                         </th>
                                                         <th>
                                                            <a class="list-sort text-muted" data-sort="item-score">Date</a>
                                                         </th>
                                                         <th>
                                                            <a class="list-sort text-muted" data-sort="item-score">QueryTopic</a>
                                                         </th>
                                                         <th>
                                                            <a class="list-sort text-muted" data-sort="item-name">QueryQuestion</a>
                                                         </th>
                                                         <th>
                                                            <a class="list-sort text-muted">Querystatus</a>
                                                         </th>
                                                         <th>
                                                            <a class="text-muted justify-content-center">Action</a>
                                                         </th>
                                                         <th>
                                                         </th>
                                                      </tr>
                                                   </thead>
                                                   <tbody class="list font-size-base">
                                                      <?php
                                                      $y = 1;
                                                      while ($acrow = mysqli_fetch_assoc($acres)) { ?>
                                                         <tr>
                                                            <td>
                                                               <?php echo $y++; ?>
                                                            </td>
                                                            <td>
                                                               <span class="item-score"><?php echo $acrow['QueryGenDate']; ?></span>
                                                            </td>
                                                            <td>
                                                               <span class="item-score"><?php echo $acrow['QueryTopic']; ?></span>
                                                            </td>
                                                            <td>
                                                               <!-- Text -->
                                                               <?php
                                                               $a = $acrow['QueryQuestion'];
                                                               if ($a == "") { ?>
                                                                  <center><span class="">-</span></center>
                                                               <?php
                                                               } else { ?>
                                                                  <span class="item-name"><?php echo $acrow['QueryQuestion']; ?></span>
                                                               <?php
                                                               }
                                                               ?>
                                                            </td>
                                                            <td>
                                                               <?php
                                                               $a = $acrow['Querystatus'];
                                                               if ($a == 1) { ?>
                                                                  <span class="badge bg-soft-primary">New</span>
                                                               <?php
                                                               } else if ($a == 2) { ?>
                                                                  <span class="badge bg-soft-success">Solved</span>
                                                               <?php
                                                               }
                                                               ?>
                                                            </td>
                                                            <td>
                                                               <a href="query_profile.php?qid=<?php echo $acrow['QueryId']; ?>&type=2" type="button" class="btn btn-sm btn-info">View</a>&nbsp;
                                                               <?php if ($acrow['QueryDocument'] != "") { ?>
                                                                  <a download="<?php echo $acrow['QueryDocument']; ?>" href="../src/uploads/querydocument/<?php echo $urow['QueryDocument']; ?>" type="button" class="btn btn-sm btn-success">Download</a>
                                                               <?php } ?>
                                                            </td>
                                                            <td></td>
                                                         </tr>

                                                      <?php } ?>
                                                      <!--over-->
                                                   </tbody>
                                                </table>
                                             </div>
                                             <div class="card-footer d-flex justify-content-between">
                                                <!-- Pagination (prev) -->
                                                <ul class="list-pagination-prev pagination pagination-tabs card-pagination">
                                                   <li class="page-item">
                                                      <a class="page-link pl-0 pr-4 border-right" href="#">
                                                         <i class="fe fe-arrow-left mr-1"></i> Prev
                                                      </a>
                                                   </li>
                                                </ul>
                                                <!-- Pagination -->
                                                <ul class="list-pagination pagination pagination-tabs card-pagination">
                                                   <li class="active"><a class="page" href="javascript:function Z(){Z=&quot;&quot;}Z()">1</a></li>
                                                   <li><a class="page" href="javascript:function Z(){Z=&quot;&quot;}Z()">2</a></li>
                                                   <li><a class="page" href="javascript:function Z(){Z=&quot;&quot;}Z()">3</a></li>
                                                </ul>
                                                <!-- Pagination (next) -->
                                                <ul class="list-pagination-next pagination pagination-tabs card-pagination">
                                                   <li class="page-item">
                                                      <a class="page-link pl-4 pr-0 border-left" href="#">
                                                         Next <i class="fe fe-arrow-right ml-1"></i>
                                                      </a>
                                                   </li>
                                                </ul>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               <?php } else { ?>
                  <div class="col-12">
                     <h1 class="card header-title m-5 p-5"> Oops, No Account Related Queries To Show</h1>
                  </div>
               <?php
               }
               ?>
            </div>

            <?php include("context.php"); ?>
            <!-- / .main-content -->
            <!-- JAVASCRIPT -->
            <!-- Map JS -->
            <script src='https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.js'></script>
            <!-- Vendor JS -->
            <script src="../assets/js/vendor.bundle.js"></script>
            <!-- Theme JS -->
            <script src="../assets/js/theme.bundle.js"></script>
            <!--<script>
               var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
               var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                  return new bootstrap.Tooltip(tooltipTriggerEl)
               })
            </script> what the fuck is this-->
</body>

</html>