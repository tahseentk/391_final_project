<?php
session_start();
require("dbconfig/config.php");
// get value of id that sent from address bar
$id=$_GET['id'];

// Retrieve data from database 
$query="DELETE FROM my_players WHERE my_players.player_id = $id AND my_players.username = '".$_SESSION['username']."'";
$query_run = mysqli_query($con,$query);

// if successfully updated. 
if($query_run){
header("Location: team_of_the_user.php");;
}

else {
echo "ERROR";
}
?>