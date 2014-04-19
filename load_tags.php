<?php
include"db.php";

$row = mysql_fetch_object(mysql_query("SELECT * FROM `mpac`.`attachments` WHERE `a_id` = ".$_GET['photoID']));
echo $row->tag_content;
?>
