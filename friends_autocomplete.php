<?php
session_start();
include"db.php";

# Perform the query
$query = "SELECT `u_id` AS id,`first_name` AS name from `mpac`.`users` WHERE `first_name` LIKE '%".$_GET['q']."%' AND (`u_id` IN (SELECT `u_requester` FROM `mpac`.`relationships` WHERE `u_acceptor` = '".$_SESSION['id']."' AND `approval` = '1') OR `u_id` IN (SELECT `u_acceptor` FROM `mpac`.`relationships` WHERE `u_requester` = '".$_SESSION['id']."' AND `approval` = '1') ) LIMIT 10";
$arr = array();
$rs = mysql_query($query);

# Collect the results
while($obj = mysql_fetch_object($rs)) {
    $arr[] = $obj;
}

# JSON-encode the response
$json_response = json_encode($arr);

# Optionally: Wrap the response in a callback function for JSONP cross-domain support
if(isset($_GET["callback"])) {
    $json_response = $_GET["callback"] . "(" . $json_response . ")";
}

# Return the response
echo $json_response;

?>
