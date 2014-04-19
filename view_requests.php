<?php
$title = "View Requests";
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

<h4>Friend requests:   </h4>

<?php
$query = "SELECT `u_id`,`first_name`,`last_name`,`display_pic` from `mpac`.`users` WHERE (`u_id` IN (SELECT `u_requester` FROM `mpac`.`relationships` WHERE `u_acceptor` = '".$_SESSION['id']."' AND `approval` = '0') OR `u_id` IN (SELECT `u_acceptor` FROM `mpac`.`relationships` WHERE `u_requester` = '".$_SESSION['id']."' AND `approval` = '0') ) ";
$res7 = mysql_query($query);
while( $row = mysql_fetch_object($res7) ){
?>
  <div class="small-12 columns ">
  <div class="small-2 columns">
  <a style="float:right" class="th"><img style="max-height:80px;" src="images/<?=$row->display_pic?>"></a> 
  </div>
  <div class="small-10 columns">
    <h4><a href="userprofile.php?u=<?=$row->u_id?>" ><?php echo $row->first_name." ".$row->last_name; ?></a></h4>
      <div id="fdiv<?=$row->u_id?>">
        <?=reqbutton($row)?>
      </div>
  </div>
</div>

<?php
}
?>
<h4>Other requests:   </h4>

<?php
$query = "SELECT u.u_id,u.first_name,u.last_name,a.a_id,a.a_link from `mpac`.`attachments` AS a LEFT JOIN `mpac`.`users` AS u ON a.a_owner = u.u_id WHERE a.a_wall = '".$_SESSION['id']."' AND a.a_wall != a.a_owner AND a.publish = 0 ORDER BY a.updated_at ";
$res7 = mysql_query($query) or die(mysql_error());
while( $row = mysql_fetch_object($res7) ){
?>
  <div class="small-12 columns ">
    <div class="row">
      <div class="small-10 columns">
      <h5> <?=$row->first_name?> Wants to post this picture on you timeline. </h5>
      </div>
    </div>
    <div class="row">
      <div class="small-10 columns">
        <a style="float:left" class="th"><img style="max-height:250px;" src="images/<?=$row->a_link?>"></a> 
      </div>
    </div><br>
    <div class="row">
      <div class="small-10 columns">
      <a href="approvephoto.php?q=<?=$row->a_id?>" style="height:40px;line-height:8px" class="button"  >Approve </a> &nbsp;| &nbsp; 
        <a href="approvephoto.php?q=<?=$row->a_id?>&d=1" style="height:40px;line-height:8px" class="button"> Decline</a> 
      </div>
    </div>
  </div>
<?php
}
include "footer.php";
?>

<br>
<br>
<br>
<br>
