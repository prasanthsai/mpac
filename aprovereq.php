<?php
session_start();
include"db.php";
if(isset($_GET['t']) and isset($_GET['f']) ){
  $que = mysql_query("UPDATE `mpac`.`relationships` SET `approval` = '1' WHERE `u_acceptor` = '".$_SESSION['id']."' AND `u_requester` = '".$_GET['t']."' LIMIT 1");
    if( $que ) echo "1";
    else echo "0";
}
  else echo "0";
?>
