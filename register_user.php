<?php
  session_start();
  include"db.php";
  $pwd = md5($_POST['pwd']);
  $result = mysql_query("INSERT INTO `mpac`.`users` (`first_name`,`last_name`,`email`,`password`) VALUES ('".$_POST['fname']."', '".$_POST['lname']."', '".$_POST['email']."', '".$pwd."'  )");
  if ($result) {
    $row = mysql_fetch_object( mysql_query("SELECT * FROM `mpac`.`users` WHERE `email` LIKE '".$_POST['email']."'") );
    $_SESSION['id'] = $row->u_id;
    echo "1";
  }
  else echo "0";
?>
