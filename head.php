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
	<script>
		// check for saved 'darkMode' in localStorage
		let darkMode = localStorage.getItem('darkMode');

		const darkModeToggle = document.querySelector('#btntheme');

		const enableDarkMode = () => {
			theme.setAttribute('href', '../assets/css/theme-dark.bundle.css');
			let btn = document.getElementById('btntheme');
			btn.className = 'btn btn-info btn-floating btn-lg btn-back-to-top';
			// 2. Update darkMode in localStorage
			localStorage.setItem('darkMode', 'enabled');
		}

		const disableDarkMode = () => {
			theme.setAttribute('href', '../assets/css/theme.bundle.css');
			let btn = document.getElementById('btntheme');
			btn.className = 'btn btn-dark btn-floating btn-lg btn-back-to-top';
			btn.innerHTML = '<i class="fe uil-moon"></i>';
			// 2. Update darkMode in localStorage 
			localStorage.setItem('darkMode', null);
		}

		// If the user already visited and enabled darkMode
		// start things off with it on
		if (darkMode === 'enabled') {
			enableDarkMode();
		}

		// When someone clicks the button
		btntheme.addEventListener('click', () => {
			// get their darkMode setting
			darkMode = localStorage.getItem('darkMode');

			// if it not current enabled, enable it
			if (darkMode != 'enabled') {
				enableDarkMode();
				// if it has been enabled, turn it off  
			} else {
				disableDarkMode();
				
			}
		});
	</script>
	<?php
	include_once 'context.php';
	?>