<?php
  include"db.php";
$query = "SELECT * FROM `mpac`.`attachments` WHERE `tag_content` LIKE '%".$_GET['id']."%' LIMIT 1";
$row = mysql_fetch_object( mysql_query($query));
$tag_array = json_decode($row->tag_content, true);
foreach( $tag_array as $key => $tag_row ){
  if( $tag_row['id'] == $_GET['id'] ){
    unset($tag_array[$key]);
  }
}
$update = mysql_query("UPDATE `mpac`.`attachments` SET `tag_content` = '".json_encode($tag_array)."' WHERE `a_id` = '".$row->a_id."' LIMIT 1");
?>
