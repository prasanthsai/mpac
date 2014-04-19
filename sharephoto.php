<?php
$title = "Share a photo on your timeline";
include "header.php";

$row = mysql_fetch_object( mysql_query("SELECT * FROM `mpac`.`attachments` WHERE `a_id` = ".$_GET['q']));

?>


	<style type="text/css">
		
		div.photo-column {
			float: left ; 
			margin-right: 10px ;
		}
		
		div.photo-container {
			border: 1px solid #333333 ;
			margin-bottom: 13px ;
		}
		
	</style>
	<script type="text/javascript" src="js/jquery-1.4.1.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.tokeninput.js"></script>

    <link rel="stylesheet" href="css/token-input.css" type="text/css" />
    <link rel="stylesheet" href="css/token-input-facebook.css" type="text/css" />
  <script>
// I am a method that cleans ColdFusion-based JSON responses. 
// By default, ColdFusion upper-cases all its keys. This method
// will lowercase the ColdFusion keys.
var cleanColdFusionJSONResponse = function( apiAction, response ){
	// Check to see if this it the load.
	if (apiAction == "load"){
		
		// Loop over response array.
		jQuery.each(
			response,
			function( index, tagData ){
				// Translate the ColdFusion keys 
				// to lowercase. This will create
				// dupliate keys, but it doesn't 
				// matter for our use-case.
				jQuery.each(
					tagData,
					function( key, value ){
						tagData[ key.toLowerCase() ] = value;
					}
				);
			
			}
		);
	
	}
	
	// Return cleaned response.
	return( response );
}
</script>
	<script type="text/javascript" src="js/phototagger.jquery.js"></script>
	<script type="text/javascript">
		
		// When the DOM is ready, initialize the scripts.
		jQuery(function( $ ){
        $("#submitall").click(function () {
          var shareo = $("#demo-input-facebook-theme-share").val();
          var tago = $("#demo-input-facebook-theme-tag").val();
          var commento = $("#demo-input-facebook-theme-comment").val();
          var share = $("#sharestatus").val();
          var tag = $("#tagstatus").val();
          var comment = $("#commentstatus").val();
          window.location.href= "publish.php?id=<?=$row->a_id?>&so="+shareo+"&to="+tago+"&co="+commento+"&s="+share+"&t="+tag+"&c="+comment ;
        });
        $("#demo-input-facebook-theme-share").tokenInput("friends_autocomplete.php", {
            theme: "facebook"
        });
        $("#demo-input-facebook-theme-tag").tokenInput("friends_autocomplete.php", {
            theme: "facebook"
        });
        $("#demo-input-facebook-theme-comment").tokenInput("friends_autocomplete.php", {
            theme: "facebook"
        });
			
			// Set up the photo tagger.
			$( "div.photo-container" ).photoTagger({
				
				// The API urls.
				loadURL: "load_tags.php",
				saveURL: "save_tag.php",
				deleteURL: "delete_tag.php",
				
				// Default to turned on.
				// isTagCreationEnabled: false,
				
				// This will allow us to clean the response from 
				// a ColdFusion server (it will convert the 
				// uppercase keys to lowercase keys expected by
				// the photoTagger plugin.
				cleanAJAXResponse: cleanColdFusionJSONResponse
			});
			
			
			// Hook up the enable create links.
			$( "#encreate" ).click(
				function( event ){
					// Prevent relocation.
					event.preventDefault();
					$chtml = $("#encreate").html();
          if( $chtml == "Disable Create Tag" ){
					  $( this ).prevAll( "div.photo-container" )
						  .photoTagger( "disableTagCreation" )
            ;
					  $("#encreate").html("Enable Create Tag");
          }
          else{
					  $( this ).prevAll( "div.photo-container" )
						  .photoTagger( "enableTagCreation" )
					  ;
					  $("#encreate").html("Disable Create Tag");
          }
				}
			);
			
			
			// Hook up the disabled create links.
			$( "#endelete" ).click(
				function( event ){
					// Prevent relocation.
					event.preventDefault();
					$chtml = $( "#endelete" ).html();
          if( $chtml == "Enable Delete Tag" ){
					  $( this ).prevAll( "div.photo-container" )
						  .photoTagger( "enableTagDeletion" )
					  ;
					  $( "#endelete" ).html("Disable Delete Tag");
          }
          else{
					  $( this ).prevAll( "div.photo-container" )
						  .photoTagger( "disableTagDeletion" )
					  ;
					  $( "#endelete" ).html("Enable Delete Tag");
          }
				}
			);
			
			// Hook up the enable delete links.
      $("#sharestatus").change(function(){
        if ( $("#sharestatus").val() == "4" ){
          $("#sharestatustext").attr('class', 'show');
        }
        else{
          $("#sharestatustext").attr('class', 'hide');
        }
      });
      $("#tagstatus").change(function(){
        if ( $("#tagstatus").val() == "4" ){
          $("#tagstatustext").attr('class', 'show');
        }
        else{
          $("#tagstatustext").attr('class', 'hide');
        }
      });
      $("#commentstatus").change(function(){
        if ( $("#commentstatus").val() == "4" ){
          $("#commentstatustext").attr('class', 'show');
        }
        else{
          $("#commentstatustext").attr('class', 'hide');
        }
      });
		
		});
		
	</script>
</head>
<body>

	
	<div class="photo-column">
	
		<div class="photo-container">
			<img 
        id="<?=$row->a_id?>" 
        src="images/<?=$row->a_link?>" 
				style="height:350px;"
				/>
		</div>
		
		<!-- These will toggle the tag ceation. -->
		<a href="#" class="enable-create button" id="encreate" style="height:40px;line-height:8px">Enable Create Tag</a> 
		&nbsp;|&nbsp;
		<a href="#" class="enable-create button" id="endelete" style="height:40px;line-height:8px">Enable Delete Tag</a> 
		
		<br />
		<br />
		
	
	</div>
	
<div class="row">
  <div class="large-12 columns">
    <div class="large-6 columns">
      <label>Share With :
        <select id="sharestatus"  >
          <option value="2">All Friends</option>
          <option value="4">Specific Friends</option>
          <option value="3">Only Me</option>
        </select>
      </label>
    </div>
    <div id="sharestatustext" class="hide">
      <div class="large-6 columns">
        <label>Specify Friends:
        <input type="text" id="demo-input-facebook-theme-share" name="blah2" />
        </label>
      </div>
    </div>
  </div> 
</div> 
<div class="row">
  <div class="large-12 columns">
    <div class="large-6 columns">
      <label>Who can see Tags :
        <select id="tagstatus"  >
          <option value="2">All Friends</option>
          <option value="4">Specific Friends</option>
          <option value="3">Only Me</option>
        </select>
      </label>
    </div>
    <div id="tagstatustext" class="hide">
      <div class="large-6 columns">
        <label>Specify Friends:
        <input type="text" id="demo-input-facebook-theme-tag" name="blah2" />
        </label>
      </div>
    </div>
  </div> 
</div> 
<div class="row">
  <div class="large-12 columns">
    <div class="large-6 columns">
      <label>Who can comment :
        <select id="commentstatus"  >
          <option value="2">All Friends</option>
          <option value="4">Specific Friends</option>
          <option value="3">Only Me</option>
        </select>
      </label>
    </div>
    <div id="commentstatustext" class="hide">
      <div class="large-6 columns">
        <label>Specify Friends:
        <input type="text" id="demo-input-facebook-theme-comment" name="blah2" />
        </label>
      </div>
    </div>
  </div> 
</div> 
<div class="row">
  </div>

    <div>
        <input class="button" id="submitall"  style="height:40px;line-height:8px;" value="Submit" />
    </div>

		<br />
		<br />
		<br />
		<br />
		<br />
		<br />
		<br />
		<br />
		<br />
		<br />
		<br />


<?php

include "footer.php";
?>
