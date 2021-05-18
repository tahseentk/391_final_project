<?php
session_start();
require("dbconfig/config.php");
// get value of id that sent from address bar
$id=$_GET['id'];

// Retrieve data from database 
$query="DELETE FROM players WHERE player_id = $id";
$query_run = mysqli_query($con,$query);

// if successfully updatesd. 
if($query_run){
header("Location: list_of_players.php");;
}

else {
echo "ERROR";
}
?>