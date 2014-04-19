<?php
include"db.php";
if ( $_GET['t'] != 4 ) $_GET['to'] = ",,";
if ( $_GET['s'] != 4 ) $_GET['so'] = ",,";
if ( $_GET['c'] != 4 ) $_GET['co'] = ",,";

$sel =mysql_fetch_object( mysql_query("SELECT * FROM `mpac`.`attachments` WHERE `a_id` = '".$_GET['id']."'"));
if( $sel->a_owner ==  $sel->a_wall ) $pub = 1;
else $pub = 0;
$query = "UPDATE `mpac`.`attachments` SET `tag` = '".$_GET['t']."', `share` = '".$_GET['s']."', `comment` = '".$_GET['c']."', `tago` = ',".$_GET['to'].",', `shareo` = ',".$_GET['so'].",', `commento` = ',".$_GET['co'].",', `publish` = '".$pub."' WHERE `a_id` = '".$_GET['id']."' LIMIT 1";
$res = mysql_query($query) or die(mysql_error());
if($res)  header("Location:home.php");
?>
