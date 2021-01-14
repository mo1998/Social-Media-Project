<?php 
include('../database_connection/database_connection.php');

session_start();

$query = "UPDATE login_details SET istype = '".$_POST["istype"]."' WHERE logindetailsid = '".$_SESSION["logindetailsid"]."' ";
$statement = $db->prepare($query);

$statement->execute();

?>