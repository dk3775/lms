<?php
session_start();
error_reporting(E_ALL ^ E_WARNING);
if ($_SESSION['role'] != "Abuja") {
   header("Location: ../default.php");
} else {
   include_once "../config.php";
   $_SESSION["userrole"] = "Student";

   $uqur = "SELECT * FROM updatemaster";
   $ures = mysqli_query($conn, $uqur);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <?php
   $nav_role = "Updates";
   include_once "../head.php"; ?>
</head>

<body>
   <!-- NAVIGATION -->
   <?php include_once "nav.php"; ?>
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
                           <!-- Pretitle -->
                           <h6 class="header-pretitle">
                              View
                           </h6>
                           <!-- Title -->
                           <h1 class="header-title text-truncate">
                              Updates List
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
                                                   <a class="list-sort text-muted" data-sort="item-score">No.</a>
                                                </th>
                                                <th>
                                                   <a class="list-sort text-muted" data-sort="item-score">Date</a>
                                                </th>
                                                <th>
                                                   <a class="list-sort text-muted" data-sort="item-name">Title</a>
                                                </th>
                                                <th>
                                                   <a class="list-sort text-muted" data-sort="item-company">Uploaded By</a>
                                                </th>
                                                <th>
                                                   <a class="text-muted">Info</a>
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
                                             $i = 1;
                                             while ($urow = mysqli_fetch_assoc($ures)) { ?>
                                                <tr>
                                                   <td>
                                                      <?php echo $i;
                                                      $i++; ?>
                                                   </td>
                                                   <td>
                                                      <span class="item-score"><?php echo $urow['UpdateUploadDate']; ?></span>
                                                   </td>
                                                   <td>
                                                      <!-- Text -->
                                                      <span class="item-name"><?php echo $urow['UpdateTitle']; ?></span>
                                                   </td>
                                                   <td>
                                                      <span class="item-company"><?php echo $urow['UpdateUploadedBy']; ?></span>
                                                   </td>
                                                   <td>
                                                      <!-- Phone -->
                                                      <a href="update_view.php?updateid=<?php echo $urow['UpdateId']; ?>" type="button" class="btn btn-sm btn-white">View</a>
                                                   </td>
                                                   <td>

                                                      <!-- Badge -->
                                                      <a download="<?php echo $urow['UpdateFile']; ?>" href="../src/uploads/updates/<?php echo $urow['UpdateFile']; ?>" type="button" class="btn btn-sm btn-white">Download</a>
                                                   </td>
                                                   <td></td>
                                                <tr id="demo1" class="collapse">
                                                   <td colspan="6" class="hiddenRow">
                                                      <div>Demo1</div>
                                                   </td>
                                                </tr>
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
               <?php } else { ?>
                  <div class="col-12">
                     <h1 class="card header-title m-5 p-5"> Oops, No Updates To Show</h1>
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
            <script>
               var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
               var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                  return new bootstrap.Tooltip(tooltipTriggerEl)
               })
            </script>
</body>

</html>