<?php
session_start();
include"db.php";
if(isset($_GET['t']) and isset($_GET['f']) ){
  $que = mysql_query("SELECT * FROM `mpac`.`relationships` WHERE `u_acceptor` = '".$_SESSION['id']."' AND `u_requester` = '".$_GET['t']."'");
  if ( mysql_num_rows($que) == 1 ){
    $que5 = mysql_query("DELETE FROM `mpac`.`relationships` WHERE `u_acceptor` = '".$_SESSION['id']."' AND `u_requester` = '".$_GET['t']."'");
    if( $que5 ) echo "1";
    else echo "0";
  }
  else echo "0";
}
?>
