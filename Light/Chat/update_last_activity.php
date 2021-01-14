<?php

include('../database_connection/database_connection.php');

session_start();

$query = "UPDATE login_details SET lastactivity = now() WHERE logindetailsid = '".$_SESSION["logindetailsid"]."' ";
$statement = $db->prepare($query);
$statement->execute();

?>