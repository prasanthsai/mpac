<?php include"subheader.php"; ?>	
<!-- ### Main Body Div - Begin -->
<div class="row">
    
<!-- ### Left Column Div - Begin -->

       <div class="large-3 medium-4 small-12 columns" id="">
        <div class="">
        <div class="leftColumn">
        <br>
        <img src="images/<?=$user->display_pic?>" style="height:180px;width:160px;" > 
            	
        	<ul class="side-nav">
        
            	<li></li>
		<li class="heading">Manage Account</li>  				
  		<li><a href="elections"><i class="fa fa-list-ul"></i> | News feed</a></li>  			
  		<li><a href="find_friends.php"><i class="fa fa-list-ul"></i> | Find friends</a></li>  			
  		<li><a href="http://students.iitm.ac.in/"><i class="fa fa-windows"></i> | View friend requests</a></li>
  		<li><a href="#"><i class="fa fa-envelope"></i> | Share photo</a></li>
  		<li><a href="#/student_search"><i class="fa fa-search"></i> | Post photo</a></li>
		<li><a href="http://students.iitm.ac.in/swiki/"><i class="fa fa-comments"></i> | Apps n Games</a></li>  				
  		<br>
  				<li class="heading">Mess Operations</li>  				
  				<li><a href="#/mess_registration"><i class="fa fa-cutlery"></i> | Mess Registration</a></li>
  				<li><a href="#/mess_rating"><i class="fa fa-star-half-o"></i> | Mess Rating</a></li>
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

