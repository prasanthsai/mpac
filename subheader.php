<?php
	session_start();
	if( !$_SESSION['id'] ) header("Location:index.php");
?>

<!DOCTYPE html>
<!--[if IE 9]><html class="lt-ie10" lang="en" > <![endif]-->
<html class="no-js" lang="en" >

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MPAC-OSNs</title>
	<link rel="shortcut icon" href="images/IITM_Color_Logo_30px.png" type="image/png">
  <!-- If you are using CSS version, only link these 2 files, you may add app.css to use for your overrides if you like. -->
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/foundation.css">

  <!-- If you are using the gem version, you need this only -->
  <link rel="stylesheet" href="css/app.css">

  <script src="js/vendor/modernizr.js"></script>

</head>
<body >
  <!-- body content begins -->
       
    <!-- ### Top Nav - Begin -->
	<nav class="top-bar" data-topbar>
  		<ul class="title-area">
    		<li class="name">
      		<h1><a href="#">Virtual Academy | Prototype</a></h1>
    		</li>
    		<li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
  		</ul>

  		<section class="top-bar-section">
    	<!-- Left Nav Section -->
    	<ul class="right">           
        	
            <li><a href="./index.php">Home</a></li>
            <li><a href="courses.php">Courses</a></li>
            <li><a href="topstudents.php">Top Students</a></li>
            <li><a href="dashboard.php">Dash Board</a></li>
            <li class="has-form"><a href="logout.php" class="button">Sign Out</a></li>
        </ul>        
 		</section>
	</nav>
	<!--### Top Nav - End -->

