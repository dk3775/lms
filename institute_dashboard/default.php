<?php
session_start();
if ($_SESSION['role'] != "Texas") {
	header("Location: ../default.php");
} else {
	include_once("../config.php");
	$_SESSION["userrole"] = "Institute";
	$qur = "SELECT * FROM institutemaster WHERE ``='Abuja'";
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
					</div>
					<!-- / .row -->
				</div>
				<!-- / .header-body -->
			</div>
		</div>
		<!-- / .header -->
		<br><br>
		<div class="container-fluid">
			<div class="page-header min-height-100 border-radius-xl mt-4">
			</div>
			<div class="card card-body blur shadow-blur mx-1 mt-n6 overflow-hidden">
				<!--width-->
				<div class="row gx-4">
					<div class="col-auto">
						<div class="avatar avatar-xl position-relative">
							<img src="../assets/test1.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm" style="border-radius: 10px;">
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
	</div>
	<!-- / .main-content -->

	<!-- MAIN CONTENT -->
	<div class="main-content ">
		<div class="container-fluid">
			<div class="row justify-content-center">
				<div class="col-12 col-lg-12">
					<!-- Card -->

					<div class="row">
						<div class="col-12 col-lg-6">

							<!-- Card -->
							<div class="card card-fill">
								<div class="card-header">

									<!-- Title -->
									<h4 class="card-header-title">
										Traffic Channels
									</h4>

									<!-- Tabs -->
									<ul class="nav nav-tabs nav-tabs-sm card-header-tabs">
										<li class="nav-item" data-toggle="chart" data-target="#trafficChart" data-trigger="click" data-action="toggle" data-dataset="0">
											<a href="#" class="nav-link active" data-toggle="tab">
												All
											</a>
										</li>
										<li class="nav-item" data-toggle="chart" data-target="#trafficChart" data-trigger="click" data-action="toggle" data-dataset="1">
											<a href="#" class="nav-link" data-toggle="tab">
												Direct
											</a>
										</li>
									</ul>

								</div>
								<div class="card-body">

									<!-- Chart -->
									<div class="chart chart-appended">
										<canvas id="trafficChart" class="chart-canvas" data-toggle="legend" data-target="#trafficChartLegend"></canvas>
									</div>

									<!-- Legend -->
									<div id="trafficChartLegend" class="chart-legend"></div>

								</div>
							</div>

						</div>
						<div class="col-12 col-lg-6">

							<!-- Card -->
							<div class="card">
								<div class="card-body">
									<div class="row align-items-center">
										<div class="col">

											<!-- Title -->
											<h6 class="text-uppercase text-muted mb-2">
												Total Students
											</h6>

											<!-- Heading -->
											<span class="h2 mb-0">
												$24,500
											</span>
										</div>
										<div class="col-auto">

											<!-- Icon -->
											<i class="h2 fe uil-user text-muted mb-0"></i>

										</div>
									</div> <!-- / .row -->

								</div>
							</div>

							<!-- Card -->
							<div class="card">
								<div class="card-body">
									<div class="row align-items-center">
										<div class="col">

											<!-- Title -->
											<h6 class="text-uppercase text-muted mb-2">
												Total Faculty
											</h6>

											<!-- Heading -->
											<span class="h2 mb-0">
												763.5
											</span>

										</div>
										<div class="col-auto">

											<!-- Icon -->
											<span class="h2 fe uil-graduation-cap text-muted mb-0"></span>

										</div>
									</div> <!-- / .row -->

								</div>
							</div>

							<!-- Card -->
							<div class="card">
								<div class="card-body">
									<div class="row align-items-center">
										<div class="col">

											<!-- Title -->
											<h6 class="text-uppercase text-muted mb-2">
												Total Branch
											</h6>

											<div class="row align-items-center g-0">
												<div class="col-auto">

													<!-- Heading -->
													<span class="h2 mr-2 mb-0">
														84.5%
													</span>

												</div>
											</div> <!-- / .row -->

										</div>
										<div class="col-auto">

											<!-- Icon -->
											<span class="h2 fe uil-code-branch text-muted mb-0"></span>

										</div>
									</div> <!-- / .row -->

								</div>
							</div>

							<!-- Card -->
							<div class="card">
								<div class="card-body">
									<div class="row align-items-center">
										<div class="col">

											<!-- Title -->
											<h6 class="text-uppercase text-muted mb-2">
												Avg. Order VaLue
											</h6>

											<!-- Heading -->
											<span class="h2 mb-0">
												$85.50
											</span>

										</div>
										<div class="col-auto">

											<!-- Chart -->
											<span class="h2 fe fe-briefcase text-muted mb-0"></span>

										</div>
									</div> <!-- / .row -->

								</div>
							</div>

						</div>
					</div>


					<!-- Card -->
					<div class="card">
						<div class="card-header">

							<!-- Title -->
							<h4 class="card-header-title">
								Updates
							</h4>
						</div>
						<div class="table-responsive mb-0">
							<table class="table table-sm table-nowrap card-table">
								<thead>
									<tr>
										<th>
											Date
										</th>
										<th>
											Title
										</th>
										<th>
											Uploaded By
										</th>
										<th>
											Infos
										</th>
										<th>
											Download
										</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											<!-- Title -->
											<span>19/12/2021</span>

										</td>
										<td>
											<span class="text-success"></span> GTU Updates
										</td>
										<td>
											<div class="row align-items-center g-0">
												<div class="col-auto">

													<!-- Value -->
													<span class="mr-2">Aarshit</span>

												</div>
											</div> <!-- / .row -->
										</td>

										<td>
											<p>
												<button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
													Button with data-bs-target
												</button>
											</p>
											<div class="collapse" id="collapseExample">
												<div class="card card-body">
													Some placeholder content for the collapse component. This panel is hidden by default but revealed when the user activates the relevant trigger.
												</div>
											</div>
										</td>

										<td>
											$55.25%
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>

					<div class="card">
						<div class="card-header">

							<!-- Title -->
							<h4 class="card-header-title">
								Conversions
							</h4>

							<!-- Caption -->
							<span class="text-muted mr-3">
								Last year comparision:
							</span>

							<!-- Switch -->
							<div class="form-check form-switch">
								<input class="form-check-input" type="checkbox" id="cardToggle" data-toggle="chart" data-target="#conversionsChart" data-trigger="change" data-action="add" data-dataset="1" />
								<label class="form-check-label" for="cardToggle"></label>
							</div>

						</div>
						<div class="card-body">

							<!-- Chart -->
							<div class="chart">
								<div class="chartjs-size-monitor">
									<div class="chartjs-size-monitor-expand">
										<div class=""></div>
									</div>
									<div class="chartjs-size-monitor-shrink">
										<div class=""></div>
									</div>
								</div>
								<canvas id="conversionsChart" class="chart-canvas chartjs-render-monitor" style="display: block; height: 300px; width: 580px;" width="725" height="375"></canvas>
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
	<script>
		var collapseElementList = [].slice.call(document.querySelectorAll('.collapse'))
		var collapseList = collapseElementList.map(function(collapseEl) {
			return new bootstrap.Collapse(collapseEl)
		})
	</script>
</body>

</html>