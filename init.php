<?php

	// Error Reporting

	
	include 'connx.php';

	$sessionUser = '';
	
	if (isset($_SESSION['user'])) {
		$sessionUser = $_SESSION['user'];
	}

	// Routes

//	$tpl 	= 'includes/templates/'; // Template Directory
//	$lang 	= 'includes/languages/'; // Language Directory
//	$func	= 'includes/functions/'; // Functions Directory
//	$css 	= 'layout/css/'; // Css Directory
//	$js 	= 'layout/js/'; // Js Directory

	// Include The Important Files

//	include $func . 'functions.php';
//	include $lang . 'english.php';
	include  'header.php';
	

	