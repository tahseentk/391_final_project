<?php
session_start();
require("dbconfig/config.php");
// get value of id that sent from address bar
$id=$_GET['id'];

// Retrieve data from database 
$query="INSERT INTO my_players(player_id,username) VALUES ($id,'".$_SESSION['username']."')";
$query_run = mysqli_query($con,$query);

// if successfully updated. 
if($query_run){
header("Location: player_transfer.php");;
}

else {
echo "ERROR";
}
?>