<?php
include"db.php";

if ( isset($_GET['q']) )
$qu = mysql_query("UPDATE `mpac`.`attachments` SET `publish` = 1 WHERE `a_id` = ".$_GET['q']);

if (  isset($_GET['d']))
  $qu = mysql_query("DELETE FROM `mpac`.`attachments` WHERE `a_id` = '".$_GET['q']."' LIMIT 1");


header("Location:view_requests.php");
?>
