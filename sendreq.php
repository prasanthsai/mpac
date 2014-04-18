<?php
session_start();
include"db.php";
if(isset($_GET['t']) and isset($_GET['f']) ){
  $que = mysql_query("SELECT * FROM `mpac`.`relationships` WHERE `u_requester` = '".$_SESSION['id']."' AND `u_acceptor` = '".$_GET['t']."'");
  if ( mysql_num_rows($que) == 0 ){
    $que5 = mysql_query("INSERT INTO `mpac`.`relationships` (`u_requester`, `u_acceptor`, `approval`) VALUES ('".$_SESSION['id']."','".$_GET['t']."','0')");
    if( $que5 ) echo "1";
    else echo "0";
  }
  else echo "0";
}
?>
