<?php
session_start();
include"db.php";
if( mysql_query("DELETE FROM `mpac`.`relationships` WHERE ( `u_requester` = '".$_GET['t']."' AND `u_acceptor` = '".$_SESSION['id']."' ) OR (`u_requester` = '".$_SESSION['id']."' AND `u_acceptor` = '".$_GET['t']."' AND `approval` = '1' ) ") )  echo "1";
else echo "0";
