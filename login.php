<?php
  session_start();
  include"db.php";
  $pwd = md5($_POST['pwd']);
  $res = mysql_query("SELECT * FROM `mpac`.`users` WHERE `email` LIKE '".$_POST['email']."' AND `password` LIKE '".$pwd."'");
  
  if (  mysql_num_rows($res) == 1 ){
    $row = mysql_fetch_object($res);
    $_SESSION['id'] = $row->u_id; 
    echo "1";
  }
  else echo "0";
?>
