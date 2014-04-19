<?php
include"db.php";

$row = mysql_fetch_object(mysql_query("SELECT * FROM `mpac`.`attachments` WHERE `a_id` = '".$_GET['photoID']."' LIMIT 1"));

$tag_array = json_decode($row->tag_content, true);
$new_tag = array("id" => $_GET['photoID'].substr(md5(time()),1,10),
                  "x" => $_GET['x'],
                  "y" => $_GET['y'],
                  "width" => $_GET['width'],
                  "height" => $_GET['height'],
                  "message" => $_GET['message'],
                  "photoID" => $_GET['photoID']
                );
if( $row->tag_content == "" ) $tag_array = array($new_tag);
else array_push($tag_array,$new_tag );

$update = mysql_query("UPDATE `mpac`.`attachments` SET `tag_content` = '".json_encode($tag_array)."' WHERE `a_id` = '".$_GET['photoID']."' LIMIT 1");
?>
