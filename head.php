	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!-- Favicon -->
	<link rel="shortcut icon" href="../assets/favicon/favicon.ico" type="image/x-icon" />
	<!-- Map CSS -->
	<!--	<link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.css" />-->
	<!-- Libs CSS -->
	<link rel="stylesheet" href="../assets/css/libs.bundle.css" />
	<!-- Theme CSS -->
	<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
	<link rel="stylesheet" id="theme" href="../assets/css/theme.bundle.css" />
	<!-- Title -->
	<title>LMS by Titanslab</title>
	<style>
		.card-img-top {
			width: 100%;
			height: 15vw;
			object-fit: cover;
		}

		body {
			scrollbar-width: thin;
			/* "auto" or "thin" */
			scrollbar-color: blue orange;
			/* scroll thumb and track */
		}

		/* Works on Firefox */
		* {
			scrollbar-width: thin;
			scrollbar-color: blue orange;
		}

		/* Works on Chrome, Edge, and Safari */
		*::-webkit-scrollbar {
			width: 8px;
			background-color: #F5F5F5;
		}

		*::-webkit-scrollbar-track {
			-webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
			background-color: #F5F5F5;


		}

		*::-webkit-scrollbar-thumb {
			border-radius: 10px;
			-webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, .3);
			background-color: blueviolet;
		}

		.vertical {
			border-left: 5px solid black;
			height: 200px;
		}

		.btn-back-to-top {
			position: fixed;
			bottom: 20px;
			right: 20px;
			display: block;
			z-index: 999;
		}
	</style>
	<?php
	error_reporting(E_ALL ^ E_ALL);
	?>
	<button id="btntheme" onclick=" toggleTheme()" type="button" class="btn btn-dark btn-floating btn-lg btn-back-to-top">
		<i class="fe uil-moon"></i>
	</button>