<?php include"subheader.php"; ?>	
<!-- ### Main Body Div - Begin -->
<div class="row">
    
<!-- ### Left Column Div - Begin -->

       <div class="large-3 medium-4 small-12 columns" id="">
        <div class="">
        <div class="leftColumn">
        <br>
        <a href="welcome.php?q=1&n=2"> <img src="images/<?=$user->display_pic?>" style="height:180px;width:160px;" > </a> 
            	
        	<ul class="side-nav">
        
            	<li></li>
		<li class="heading">Manage Account</li>  				
  		<li><a href="home.php"><i class="fa fa-list-ul"></i> | News feed</a></li>  			
  		<li><a href="find_friends.php"><i class="fa fa-search"></i> | Find friends</a></li>  			
  		<li><a href="view_friends.php"><i class="fa fa-users"></i> | View friends</a></li>  			
  		<li><a href="view_requests.php"><i class="fa fa-windows"></i> | View requests</a></li>
  		<li><a href="uploadphoto.php"><i class="fa fa-photo"></i> | Share photo</a></li>
  		<li><a href="uploadphoto.php?friend=1"><i class="fa fa-upload"></i> | Post photo</a></li>
		<li><a href="appsngames.php"><i class="fa fa-th"></i> | Apps n Games</a></li>  				
			</ul>
    
    	
        	</div>
        	</div>
        </div>


<!-- ### Left Column Div - End -->
        
<!-- ### Right Column Div - Begin -->

	<div class="large-9 medium-8 small-12 columns" style="">
<br><br>
<div class="row">
  <div class="small-7 columns">
     <h2><?php if($title == "custom") echo "Hello ".$user->first_name." ".$user->last_name; else echo $title; ?></h2>
  </div>
</div>
 
<hr>
  <div>

