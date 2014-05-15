<?php
	session_start();
  if( isset( $_SESSION['id']) )
    if( $_SESSION['id'] )
      header("Location:home.php");
?>

<!DOCTYPE html>
<!--[if IE 9]><html class="lt-ie10" lang="en" > <![endif]-->
<html class="no-js" lang="en" >

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>  Multiparty Access Control for OSNs   </title>
	<link rel="shortcut icon" href="images/smiley1.jpeg" type="image/jpeg">
  <!-- If you are using CSS version, only link these 2 files, you may add app.css to use for your overrides if you like. -->
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/foundation.css">
  <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">

  <!-- If you are using the gem version, you need this only -->
  <link rel="stylesheet" href="css/app.css">

  <script src="js/vendor/modernizr.js"></script>

</head>
<body >
  <!-- body content begins -->
  	<!-- ### Sign In Modal - Begin -->
    <div id="signInModal" class="reveal-modal" data-reveal>
  		<h3 class="text-center"><italic>  Please Sign In  </italic></h3><br>
  	<form >
    	<div class="row">
        <div class="small-4 small-centered columns">
          <div class="row">
            <div class="small-12 columns">
              <input type="text" name="username" id="l_email" placeholder="E-mail">
            </div>
          </div>
          <div class="row">
            <div class="small-12 columns">
              <input type="password" name="password" id="l_pwd" placeholder="Password">
              <h4><small style='color:#C40505;' id="signinformerror" ></small></h4>
            </div>
          </div>
          <div class="row">
      	    <div class="small-12 columns ">
      	      <a href="#" id="signinform" class="button expand"  > Sign In </a>
            </div>
          </div>
        </div>
  	  </div>
	</form>

  		<a class="close-reveal-modal">&#215;</a>
	</div>
	<!--### Sign In Modal - End -->
    
    <!-- ### Sign Up Modal - Begin -->
    <div id="signUpModal" class="reveal-modal" data-reveal>
  		<h2 class="text-center">Need Help ?</h2>
  	<form>
  	<div class="row">
    <div class="small-12 medium-9">
      <div class="row">
        <div class="small-3 medium-6 columns">
          <h3> Please enter the correct details
        </div>
        <div class="small-9 medium-6 columns">
          <input type="text" id="right-label" placeholder="Username">
          <!--<small class="error">Invalid Username</small>-->
        </div>
      </div>
      <div class="row">
        <div class="small-3 medium-6 columns">
          <label for="right-label" class="right inline">E-Mail</label>
        </div>
        <div class="small-9 medium-6 columns">
          <input type="text" id="right-label" placeholder="Email ID">
          <!--<small class="error">Invalid Username</small>-->
        </div>
      </div>
      <div class="row">
        <div class="small-3 medium-6 columns">
          <label for="right-label" class="right inline">Password</label>
        </div>
        <div class="small-9 medium-6 columns">
          <input type="text" id="right-label" placeholder="Password">
          <!--<small class="error">Invalid Password</small>-->
        </div>
      </div>
      <div class="row">
        <div class="small-3 medium-6 columns">
          <label for="right-label" class="right inline">Password</label>
        </div>
        <div class="small-9 medium-6 columns">
          <input type="text" id="right-label" placeholder="Retype Password">
          <!--<small class="error">Invalid Password</small>-->
        </div>
      </div>
      <div class="row">
      	<div class="small-offset-3 medium-offset-6">
      	<a href="#" class="button">Sign Up</a>
        </div>
      </div>
    </div>
  	</div>
	</form>

  		<a class="close-reveal-modal">&#215;</a>
	</div>
	<!--### Sign Up Modal - End -->
    
	<!-- ### Need Help Modal - Begin -->
    <div id="help" class="reveal-modal" data-reveal>
  		<h3 class="text-center"><italic>  You Need Help.. Right ??  </italic></h3><br>
  	<form >
    	<div class="row">
        <div class="small-5 small-centered columns">
          <div class="row">
            <div class="small-12 columns">
              <h6>Please enter valid details in order to proceed further !!<h6>
            </div>
          </div>
		  <div class="row">
            <div class="small-12 columns">
              <h6>Fill all the details without leaving them blank !!<h6>
            </div>
          </div>
          <div class="row">
            <div class="small-12 columns">
              <h6> Password Length must be atleast 4 characters !!</h6>
            </div>
          </div>
        </div>
  	  </div>
	</form>

  		<a class="close-reveal-modal">&#215;</a>
	</div>
	<!--### Need Help Modal End -->
    	    
    <!-- ### Top Nav - Begin -->
	<nav class="top-bar" data-topbar>
  		<ul class="title-area">
    		<li class="name">
 <h1><a href="#"><i class="fa fa-home" style="color:white;"></i> | BuddysHome</a></h1>
    		</li>
    		<li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
  		</ul>

  		<section class="top-bar-section">
    	<!-- Left Nav Section -->
    	<ul class="right">           
        	
<!--            <li><a href="./index.php">Home</a></li>
            <li><a href="courses.php">Courses</a></li>
            <li><a href="topstudents.php">Top Students</a></li>
            <li><a href="dashboard.php">Dash Board</a></li>
-->            <li class="has-form"><a href="#" data-reveal-id="signInModal" class="button">Sign In</a></li>
        </ul>        
 		</section>
	</nav>
	<!--### Top Nav - End -->
	
	<!-- ### Main Body Div - Begin -->
	
    
        
        
        <!-- ### Middle-Body Div - Begin -->
  <div id="Middle-Body" class="small-12 columns" >
    <div class="row text-center">
      <div class="small-12 columns"><br>
        <h3 style="font-size:1.8rem;"> Multiparty Access Control for Online Social Networks: Model and Mechanisms </h3><h5>G Prasanth, N Sudheer Kumar</h5><br><br>
        <!-- <h4 class="subheader">Choose whether you wish to be a teacher or a student</h4> -->
      </div>
    </div>
    <div class="row text-center">            	
      <div class="small-6 columns ">
        <a href="#">
          <img src="./images/social1.jpg"/>
                </a>
<br>
<br>
        <p>Connect with friends all over the world !! <br>

                        <br> Online Social Networks are Inherently designed to make Social Connections with Friends,Colleagues, Family and even with the Strangers...</p>
      </div>
      <div class="small-6 columns ">
        <div class="row">            	
          <div class="small-3 columns"></div>
            <div class="small-9 columns">
          <br><br>
            <h4 class="text-left"> Sign Up  </h4>
          <form class="" >
            <div class="row">
              <div class="small-8 columns">
                <input type="text" id="r_fname" placeholder="FirstName">
              </div>
              <div class="small-4 columns">
                <label for="r_fname" id="r_fnameerror" class="left inline" > </label>
              </div>
            </div>
            <div class="row">
              <div class="small-8 columns">
                <input type="text" id="r_lname" placeholder="LastName">
              </div>
              <div class="small-4 columns">
                <label for="r_lname" id="r_lnameerror" class="left inline" > </label>
              </div>
            </div>
            <div class="row">
              <div class="small-8 columns">
                <input type="text" id="r_email" placeholder="EMail">
              </div>
              <div class="small-4 columns">
                <label for="r_email" id="r_emailerror" class="left inline" > </label>
              </div>
            </div>
            <div class="row">
              <div class="small-8 columns">
                <input type="password" id="r_pwd" placeholder="Password">
              </div>
              <div class="small-4 columns">
                <label for="r_pwd" id="r_pwderror" class="left inline" > </label>
              </div>
            </div>
            <div class="row">
              <div class="small-8 columns">
              <h4 class="text-left" id="form_error_msg" style="margin-top:-0.9rem;"></h4>
<a href="#" id="registerform" class="button expand" style="height:40px; line-height:8px">Sign Up</a>
              <h4 class="text-left" style="margin-top:-1.5rem;"><small><a href="#" data-reveal-id="signInModal"> Login</a> </small></h4>
              <h4 class="text-right" style="margin-top:-2.5rem;"><small><a href="#" data-reveal-id="help"> Need Help?</a> </small></h4>
              </div>
            </div>
            <div class="row" style="margin-top:-5rem;" >
              <div class="small-8 columns">
              </div>
            </div>
          </form>
            </div>
        </div>
      </div>        		
    </div>
            <hr>
            <div class="row text-center">
            	<div class="small-12 columns">
        			<h2>Web Technologies used</h2>
        		<!--	<h4 class="subheader">Learn about the Technology that powers us! 	</h4> -->
        		</div>
            </div>
            <div class="row text-center">            	
        		<div class="small-4 columns ">
        				<a href="#">
         				<img src="./img/customizable.svg">
         				<h4>HTML , CSS</h4></a>
         				<p>
                        <br> HTML lets you to create Web Pages and it describes the structure of WebPages ; CSS is used for describing the presentation of WebPages, including colors,layouts,fonts,etc </p>
      			</div>
                <div class="small-4 columns ">
        				<a href="#">
         				<img src="./img/semantic.svg">
         				<h4>JavaScript</h4></a>
         				<p>
                        <br>  JavaScript is a Client-Side Scripting Language used in conjunction with HTML to create interactive Web pages .. It is one of the most Simple,Versatile and Effective Scripting Languages used to extend the Functionality in WebSites</p>
      			</div>     
                <div class="small-4 columns ">
        				<a href="#">
         				<img src="./img/training.svg">
         				<h4>PHP</h4></a>
         				<p>
                        <br> PHP is a Widely used,Open-Source Server-Side Scripting Languages used for making Web pages more Dynamic and Interactive..   </p>
      			</div>     
                <hr>                  
            </div>
            
		</div>
        <!-- ### Middle-Body Div - End -->
        
        <!-- ### Footer-Body Div - End -->
        <div class="small-12 columns" id="Footer-Body">
                <div class="row">
                	<div class="small-7 small-offset-1 columns">
                    	<h4>BuddysHome @ AITS RAJAMPET</h4>
                	</div>
                </div>
        </div>
    	<!-- ### Footer-Body Div - End -->
   
	<!-- ### Main Body Div - End -->


 <!-- body content ends -->

  <script src="js/vendor/jquery.js"></script>
  <script src="js/foundation.min.js"></script>
  <script>
    $(document).foundation();
  </script>

  <script>

  var G_fname = 0;
  var G_lname = 0;
  var G_email = 0;
  var G_pwd = 0;

  function verifyName(id){
    var valee = $("#"+id).val();
    var nameexp = new RegExp(/^[a-zA-Z]+$/);
    return valee.match(nameexp);
  }
 
  function verifyPwd(id){
    var valpwd = $("#"+id).val();
    if( valpwd.length <= 4 ) return false;
    else return true;
  }

  function verifyMail(id){
    var valmail = $("#"+id).val();
    var mailexp = new RegExp(/(?!\.)[\w.-]+@[a-z0-9.-]+\.[a-z]{2,4}/i);
    return valmail.match(mailexp);
  }

  $("#r_fname").focusout(function(){
    if ( !verifyName("r_fname") ){
      $("#r_fnameerror").html("<span data-tooltip class='has-tip' title='Name You entered has special characters in it. Please check it again.'><img src='images/error.png' style='height:19px'></span>");
      G_fname = 0;
    }
    else{
      $("#r_fnameerror").html("<img src='images/success.png' style='height:19px'>");
      G_fname = 1;
    }
    console.log(G_fname);
  });

  $("#r_lname").focusout(function(){
    if ( !verifyName("r_lname") ){
      $("#r_lnameerror").html("<span data-tooltip class='has-tip' title='Name You entered has special characters in it. Please check it again.'><img src='images/error.png' style='height:19px'></span>");
      G_lname = 0;
    }
    else{
      $("#r_lnameerror").html("<img src='images/success.png' style='height:19px'>");
      G_lname = 1;
    }
  });


  $("#r_email").focusout(function(){
    if ( !verifyMail("r_email") ){
      $("#r_emailerror").html("<span data-tooltip class='has-tip' title='Email You entered has special characters in it or already registered with us. Please check it again.'><img src='images/error.png' style='height:19px'></span>");
      G_email = 0;
    }
    else{
      
      var valmail = $("#r_email").val();
      $("#r_emailerror").html("<img src='images/loading.gif' style='height:19px'>");
      $.ajax({url:"checkmail.php?mail="+valmail,success:function(result){
        if( result == "0" ){
          $("#r_emailerror").html("<img src='images/success.png' style='height:19px'>");
          G_email = 1;
        }
        else{
          $("#r_emailerror").html("<span data-tooltip class='has-tip' title='Email You entered has special characters in it or already registered with us. Please check it again.'><img src='images/error.png' style='height:19px'></span>");
          G_email = 0;
        }
      }});



    }
  });

  $("#r_pwd").focusout(function(){
    if ( !verifyPwd("r_pwd") ){
      $("#r_pwderror").html("<span data-tooltip class='has-tip' title='Password should have atleast four characters.'><img src='images/error.png' style='height:19px'></span>");
      G_pwd = 0;
    }
    else{
      $("#r_pwderror").html("<img src='images/success.png' style='height:19px'>");
      G_pwd = 1;
    }
  });

  $("#registerform").click(function(){
    $("#form_error_msg").html(" ");
    if ( G_fname == 0 || G_lname == 0 || G_email == 0 || G_pwd == 0 ){
      $("#form_error_msg").html("<small style='color:#C40505;'  > Invalid form submission. Try again!  </small>"); 
      $("#r_pwd").val("");
      $("#r_pwderror").html("");
      return true;
    }
    $("#registerform").html("<img src='images/loader.gif'>&nbsp;&nbsp;Registering..");
    var fr_fname = $("#r_fname").val();
    var fr_lname = $("#r_lname").val();
    var fr_email = $("#r_email").val();
    var fr_pwd = $("#r_pwd").val();
    $.post( "register_user.php", { fname: fr_fname, lname: fr_lname, email: fr_email, pwd: fr_pwd })
        .done(function( data ) {
          if ( data == '1' ){
              $("#registerform").html("Successfully Registered!");
              window.location.href = "home.php";
          }
          else{
            $("#r_pwd").val("");
            $("#registerform").html("Register");
            $("#form_error_msg").html("<small style='color:#C40505;'  > Invalid form submission. Try again!  </small>"); 
          }
    });
  });



  $("#signinform").click(function(){
    $("#signinformerror").html("");
    var lr_email = $("#l_email").val();
    var lr_pwd = $("#l_pwd").val();
    if ( !lr_email || !lr_pwd ) {
      $("#signinformerror").html("Invalid Email or Password!");
      return true;
    }
    $("#signinform").html("<img src='images/loader.gif'>&nbsp;&nbsp;Signing In..");
    $.post( "login.php", { email: lr_email, pwd: lr_pwd })
        .done(function( data ) {
          if ( data == '1' ){
              $("#signinform").html("Successfully Logged In!");
              window.location.href = "home.php";
          }
          else{
            $("#l_pwd").val("");
            $("#signinform").html("Sign In");
            $("#signinformerror").html("Invalid Email or Password!");
          }
    });

  });



  </script>









</body>
</html>
