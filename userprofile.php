<?php

  include"db.php";
  $xyz_query = "SELECT * FROM `mpac`.`users` WHERE `u_id` = '".$_GET['u']."'";
  $req_det = mysql_fetch_object(mysql_query($xyz_query));


  $title = $req_det->first_name." ". $req_det->last_name ."'s Profile";
  include "header.php";

function sendreq( $id ){
  return "<a href='#' onclick=\"sendrequest('".$id."')\" class='button' id='freq".$id."'  style='height:20px;line-height:0px' >  Send friend request </a>";
}

function delreq( $id ){
  return "<a href='#' onclick=\"delrequest('".$id."')\" class='button' id='dreq".$id."'  style='height:20px;line-height:0px' >  Cancel friend request </a>";
}
function aprovereq( $id ){
  return "<a href='#' onclick=\"aproverequest('".$id."')\" class='button' id='dreq".$id."'  style='height:20px;line-height:0px' >  Aprove friend request </a>&nbsp;<a href='#' onclick=\"ignorerequest('".$id."')\" class='button' id='dreq".$id."'  style='height:20px;line-height:0px' >  Ignore friend request </a>";
}
function unfriend( $id ){
  return "<a href='#' onclick=\"unfriend('".$id."')\" class='button' id='dreq".$id."'  style='height:20px;line-height:0px' >  Unfriend </a>";
}

function reqbutton( $row ){
  $res8 = mysql_query("SELECT * FROM `mpac`.`relationships` WHERE `u_requester` = '".$_SESSION['id']."' AND `u_acceptor` = '".$row->u_id."'");
  if ( mysql_num_rows($res8) ) $reqtex = delreq( $row->u_id );
  else $reqtex = sendreq( $row->u_id ); 

  $res9 = mysql_query("SELECT * FROM `mpac`.`relationships` WHERE `u_requester` = '".$row->u_id."' AND `u_acceptor` = '".$_SESSION['id']."'");
  if ( mysql_num_rows($res9) ) $reqtex = aprovereq( $row->u_id );

  if( mysql_num_rows( mysql_query("SELECT * FROM `mpac`.`relationships` WHERE ( `u_requester` = '".$row->u_id."' AND `u_acceptor` = '".$_SESSION['id']."' AND `approval` = '1' ) OR (`u_requester` = '".$_SESSION['id']."' AND `u_acceptor` = '".$row->u_id."' AND `approval` = '1' ) ") ) ) $reqtex = unfriend( $row->u_id );
  return $reqtex;
}
?>

<script>

  function addfrndform( id ){
    return "<a href='#' onclick=\"sendrequest('"+id+"')\" class='button' id='freq"+id+"'  style='height:20px;line-height:0px' >  Send friend request </a>";
  }
  function delfrndform( id ){
    return "<a href='#' onclick=\"delrequest('"+id+"')\" class='button' id='dreq"+id+"'  style='height:20px;line-height:0px' >  Cancel friend request </a>";
  }
  function aprovefrndform( id ){
    return "<a href='#' onclick=\"aproverequest('"+id+"')\" class='button' id='dreq"+id+"'  style='height:20px;line-height:0px' >  Cancel friend request </a>&nbsp;<a href='#' onclick=\"ignorerequest('"+id+"')\" class='button' id='dreq"+id+"'  style='height:20px;line-height:0px' >  Ignore friend request </a>";
  }
  function unfrndform( id ){
    return "<a href='#' onclick=\"unfriend('"+id+"')\" class='button' id='dreq"+id+"'  style='height:20px;line-height:0px' >  Unfriend </a>";
  }

  function sendrequest( id ){
    $.ajax({url:"sendreq.php?t="+id+"&f=<?=md5($user->u_id)?>",success:function(result){
        if( result == "0" )
          $("#fdiv"+id).html("Something Went wrong!, Try again!"+addfrndform(id));
        else
          $("#fdiv"+id).html(delfrndform(id));
      }});
  }
  function delrequest( id ){
    $.ajax({url:"delreq.php?t="+id+"&f=<?=md5($user->u_id)?>",success:function(result){
        if( result == "0" )
          $("#fdiv"+id).html("Something Went wrong!, Try again!"+delfrndform(id));
        else
          $("#fdiv"+id).html(addfrndform(id));
      }});
  }
  function aproverequest( id ){
    $.ajax({url:"aprovereq.php?t="+id+"&f=<?=md5($user->u_id)?>",success:function(result){
        if( result == "0" )
          $("#fdiv"+id).html("Something Went wrong!, Try again!"+aprovefrndform(id));
        else
          $("#fdiv"+id).html(unfrndform(id));
      }});
  }
  function ignorerequest( id ){
    $.ajax({url:"ignorereq.php?t="+id+"&f=<?=md5($user->u_id)?>",success:function(result){
        if( result == "0" )
          $("#fdiv"+id).html("Something Went wrong!, Try again!"+aprovefrndform(id));
        else
          $("#fdiv"+id).html(addfrndform(id));
      }});
  }
  function unfriend( id ){
    $.ajax({url:"unfriend.php?t="+id+"&f=<?=md5($user->u_id)?>",success:function(result){
        if( result == "0" )
          $("#fdiv"+id).html("Something Went wrong!, Try again!"+unfrndform(id));
        else
          $("#fdiv"+id).html(addfrndform(id));
      }});
  }

  </script>


<?php


if( mysql_num_rows( mysql_query("SELECT * FROM `mpac`.`relationships` WHERE ( `u_requester` = '".$req_det->u_id."' AND `u_acceptor` = '".$_SESSION['id']."' AND `approval` = '1' ) OR (`u_requester` = '".$_SESSION['id']."' AND `u_acceptor` = '".$req_det->u_id."' AND `approval` = '1' ) ") ) ) 
  $pre_f = 1;
else
  $pre_f = 0;
if ( $req_det->u_id != $_SESSION['id'] ){
?>

  <div class="small-12 columns ">
  <div class="small-2 columns">
  <a style="float:right" class="th"><img style="max-height:80px;" src="images/<?=$req_det->display_pic?>"></a> 
  </div>
  <div class="small-10 columns">
    <h4><a href="userprofile.php?u=<?=$req_det->u_id?>" ><?php echo $req_det->first_name." ".$req_det->last_name; ?></a></h4>
      <div id="fdiv<?=$req_det->u_id?>">
        <?=reqbutton($req_det)?>
      </div>
  </div>
</div>

<?}?>
  <div class="small-12 columns ">
<h5>
<br>

<strong style="font-weight:500">Basic Information</strong></h5>
</div>
<div class="small-12 columns ">
  <div class="small-2 columns">
    <h5>
      Birth Date 
    </h5>
  </div>
  <div class="small-10 columns">
    <h5>
      :&nbsp;&nbsp;<?=$req_det->date_of_birth?>
    </h5>
  </div>
</div>
<div class="small-12 columns ">
  <div class="small-2 columns">
    <h5>
      Gender  
    </h5>
  </div>
  <div class="small-10 columns">
    <h5>
<?php
  $gen = $req_det->gender == 'M' ? 'Male' : 'Female';
?>
      :&nbsp;&nbsp;<?=$gen?>
    </h5>
  </div>
</div>


<div class="small-12 columns ">
  <div class="small-2 columns">
    <h5>
      Email  
    </h5>
  </div>
  <div class="small-10 columns">
    <h5>
      :&nbsp;&nbsp;<?=$req_det->email?>
    </h5>
  </div>
</div>

<?php

  if ( $req_det->school_name_o == 1 or ( $req_det->school_name_o == 2 and $pre_f == 1 ) or ( $req_det->school_name_o == 3 and $req_det->u_id == $_SESSION['id'] ) ){
 

?>
<div class="small-12 columns ">
  <div class="small-2 columns">
    <h5>
      School Name  
    </h5>
  </div>
  <div class="small-10 columns">
    <h5>
      :&nbsp;&nbsp; <?=$req_det->school_name?>
    </h5>
  </div>
</div>

<?php } 
  if ( $req_det->college_name_o == 1 or ( $req_det->college_name_o == 2 and $pre_f == 1 ) or ( $req_det->college_name_o == 3 and $req_det->u_id == $_SESSION['id'] ) ){

?>
<div class="small-12 columns ">
  <div class="small-2 columns">
    <h5>
      College name  
    </h5>
  </div>
  <div class="small-10 columns">
    <h5>
      :&nbsp;&nbsp;<?=$req_det->college_name?>
    </h5>
  </div>
</div>

<?php } 
  if ( $req_det->works_at_o == 1 or ( $req_det->works_at_o == 2 and $pre_f == 1 ) or ( $req_det->works_at_o == 3 and $req_det->u_id == $_SESSION['id'] ) ){

?>

<div class="small-12 columns ">
  <div class="small-2 columns">
    <h5>
      Works at  
    </h5>
  </div>
  <div class="small-10 columns">
    <h5>
      :&nbsp;&nbsp;<?=$req_det->works_at?>
    </h5>
  </div>
</div>

<?php } 
  if ( $req_det->lives_at_o == 1 or ( $req_det->lives_at_o == 2 and $pre_f == 1 ) or ( $req_det->lives_at_o == 3 and $req_det->u_id == $_SESSION['id'] ) ){

?>

<div class="small-12 columns ">
  <div class="small-2 columns">
    <h5>
      Lives at  
    </h5>
  </div>
  <div class="small-10 columns">
    <h5>
      :&nbsp;&nbsp;<?=$req_det->lives_at?>
    </h5>
  </div>
</div>



<?php
  }
include "footer.php";
?>
