<?php
// Connect to server and select database.
session_start();
require("dbconfig/config.php");

// updates data in mysql database 
$query = "updates players SET Name='".$_POST['Name']."', Age='".$_POST['Age']."', Position='".$_POST['Position']."', Nationality='".$_POST['Nationality']."', Club='".$_POST['Club']."', Goals_Scored='".$_POST['Goals_Scored']."' , Assist='".$_POST['Assist']."' , Red_Cards='".$_POST['Red_Cards']."' , Yellow_Cards='".$_POST['Yellow_Cards']."' , Clean_Sheets='".$_POST['Clean_Sheets']."' , Goals_Conceded='".$_POST['Goals_Conceded']."'   WHERE player_id='".$_POST['id']."'";

$query_run = mysqli_query($con,$query);

if($query_run){
header("Location: list_of_players.php");
}

else {
echo "ERROR";
}

?>