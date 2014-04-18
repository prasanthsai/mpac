<?php
$title = "custom";
include "header.php";

if( $user->gender == NULL or $user->display_pic == "default.jpg" ){
  if( $user->gender == NULL )  header("Location:welcome.php");
  else header("Location:welcome.php?q=1");
}



include "footer.php";
?>
