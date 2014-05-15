<?php
$title = "custom";
include "header.php";

if( $user->gender == NULL or $user->display_pic == "default.jpg" ){
  if( $user->gender == NULL )  header("Location:welcome.php");
  else header("Location:welcome.php?q=1");
}
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
		
    function showCommentBox ( id){
        $("#commentbox"+id).attr('class', 'show');
    }
    function publishComment ( id){
          var comnmess = $("#mcomn"+id).val();
          $.post( "post_comment.php", { comment: comnmess, id: id })
            .done(function( data ) {
                $("#allcomments"+id).html(data);
                $("#mcomn"+id).val("");
          });
    }
	</script>






<?php

function getName($id){
  $r =  mysql_fetch_object(mysql_query("SELECT * FROM `mpac`.`users` WHERE `u_id` = ".$id));
  return $r->first_name. " ". $r->last_name; 
}

$query = "SELECT * FROM `mpac`.`attachments` WHERE ( `a_owner` = '".$_SESSION['id']."' or `a_wall` = '".$_SESSION['id']."' or `shareo` LIKE '%".$_SESSION['id']."%' or (`share` = 2 AND (`a_owner` IN (SELECT `u_requester` FROM `mpac`.`relationships` WHERE `u_acceptor` = '".$_SESSION['id']."' AND `approval` = '1') OR `a_owner` IN (SELECT `u_acceptor` FROM `mpac`.`relationships` WHERE `u_requester` = '".$_SESSION['id']."' AND `approval` = '1')))) AND `publish` = 1 ORDER BY `updated_at` DESC";
$res = mysql_query($query) or die( mysql_error() );
while ( $rs = mysql_fetch_object($res) ){
  $us = mysql_fetch_object(mysql_query("SELECT * FROM `mpac`.`users` WHERE `u_id` LIKE '".$rs->a_owner."'"));
  if( $_SESSION['id'] == $us->u_id ){
    $name = "You";
    $comment = true;
    $share = false;
    $tag = true;
  }
  else{
    $name = $us->first_name. "  ". $us->last_name;
    if (strpos( $rs->tago, ','.$_SESSION['id'].',') !== false or $rs->tag == '2' ) $tag = true; else $tag = false;
    if (strpos( $rs->shareo, ','.$_SESSION['id'].',') !== false or $rs->share == '2' ) $share = true; else $share = false;
    if (strpos( $rs->commento, ','.$_SESSION['id'].',') !== false or $rs->comment == '2' ) $comment = true; else $comment = false;
  }
  if( $rs->a_owner == $rs->a_wall ){
    $imghead = $name." Shared a photo";
  }
  else {
    $imghead = getName($rs->a_owner)." Posted a photo on ".getName($rs->a_wall)."'s timeline";
  }
?>

<div class="row">
  <div class="small-8 columns">
  <h4><?=$imghead ?></h4>
<?php if( $tag == true ) { ?>
	  <div class="photo-column">
	  	<div class="photo-container">
<?php }?>
		  	<img 
          id="<?=$rs->a_id?>" 
          src="images/<?=$rs->a_link?>" 
				  style="height:280px;"
				/>
<?php if( $tag == true ) { ?>
		  </div>
	  </div>
<?php }?>
  </div>
</div>

<div class="row">
  <div class="small-8 columns">
<?php if( $share == true ) { ?>
<a href="uploadphoto.php?share=<?=$rs->a_id?>" class="" style="height:40px;line-height:8px;" > Share This Photo </a> 
<?php }?>
<?php if( $comment == true ) { ?>
&nbsp;<a href="#" id="commentbt<?=$rs->a_id?>" onclick="showCommentBox(<?=$rs->a_id?>)" class="" style="height:40px;line-height:8px;" > Comment </a> 
<?php }?>
		  </div>
	  </div>
<br>
<div id="allcomments<?=$rs->a_id?>">
<?php
$a_id = $rs->a_id;
include "post_comment.php";
?>
</div>
<div class="hide" id="commentbox<?=$rs->a_id?>">
<div class="row">
    <div class="large-6 columns">
      <div class="row collapse">
        <div class="small-10 columns">
          <input type="text" id="mcomn<?=$rs->a_id?>" placeholder="Write your comment">
        </div>
        <div class="small-2 columns">
        <a href="#" id="fcomn<?=$rs->a_id?>" onclick="publishComment(<?=$rs->a_id?>)" class="button postfix">Go</a>
        </div>
      </div>
    </div>
</div>
</div>









<br>
<?php
}


include "footer.php";
?>
