<!DOCTYPE html>
<!--[if IE 9]><html ng-app="spApp" ng-controller = "AppCtrl as app" class="lt-ie10" lang="en" > <![endif]-->

<html class="no-js" lang="en" >

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title > MAC-OSNs </title>
	<link rel="shortcut icon" href="<?=IMG_ROOT?>/IITM_Color_Logo_30px.png" type="image/png">
	<!-- If you are using CSS version, only link these 2 files, you may add app.css to use for your overrides if you like. -->
	<link rel="stylesheet" href="<?=CSS_ROOT?>/normalize.css">
	<link rel="stylesheet" href="<?=CSS_ROOT?>/foundation.css">
 	<link rel="stylesheet" href="<?=CSS_ROOT?>/font-awesome/css/font-awesome.min.css">
 

</head>
<body>

<!-- ### Top Nav - Begin -->
<div class="fixed" >
	<nav class="top-bar" data-topbar>
		<ul class="title-area">
			<li class="name">
				<h1><a href="#"><i class="fa fa-home"></i> </a></h1>
			</li>
			<li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
		</ul>

	</nav>
</div>
<!--### Top Nav - End -->


<!-- ### Main Body Div - Begin -->
<div class="row">
    
<!-- ### Left Column Div - Begin -->

	<?php require_once"left-sidebar.php"; ?>

<!-- ### Left Column Div - End -->
        
<!-- ### Right Column Div - Begin -->

	<div class="large-9 medium-8 small-12 columns" style="">
<br><br>
<div class="row">
  <div class="small-7 columns">
     <h2 > Title</h2>
  </div>
</div>
<hr>
  <div >

	</div>   
    	
	</div>

<!-- ### Right Column Div - End -->

</div>
<!-- ### Main Body Div - End -->
<!-- ### Left Column Div - Begin -->

	<?php require_once"footer.php"; ?>

<!-- ### Left Column Div - End -->



<!--
<ng-progress> </ng-progress>
-->
<script src="<?=JS_ROOT?>/vendor/jquery.js"></script>
<script src="<?=JS_ROOT?>/foundation.min.js"></script>
<script>
	$(document).foundation();
</script>

</html>
