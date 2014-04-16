<?php
  include"db.php";
  
$result = mysql_query("SELECT * FROM `mpac`.`users` WHERE `email` LIKE '".$_GET['mail']."'");
$num = mysql_num_rows($result);
echo $num;
?>
