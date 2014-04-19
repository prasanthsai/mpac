<?php
if( !isset($_SESSION['id']) ) session_start();
include"db.php";

if( isset($_POST['id']) ){
  $a_id = $_POST['id'];
  $resdfs = mysql_query("INSERT INTO `mpac`.`comments` (`a_id`,`u_id`,`content` ) VALUES('".$_POST['id']."', '".$_SESSION['id']."', '".$_POST['comment']."')");
}

if(isset($_GET['id'])  ) $a_id = $_GET['id'];

$res46 = mysql_query("SELECT c.u_id, c.content,u.first_name,u.last_name,u.display_pic FROM `mpac`.`comments` AS c LEFT JOIN `mpac`.`users` AS u ON u.u_id = c.u_id WHERE c.a_id = '".$a_id."' ORDER BY c.updated_at");
while( $ro46 = mysql_fetch_object($res46) ){
?>

<div class="row collapse">
    <div class="large-6 columns">
      <div class="small-3 large-2 columns">
        <span data-tooltip class="has-tip prefix" title="<?=$ro46->first_name?>"><img src = "images/<?=$ro46->display_pic?>"></span>
      </div>
      <div class="small-9 large-10 columns">
        <h4><small> <?=$ro46->content?></small></h4> 
      </div>
    </div>
  </div>

<?php
}
?>
