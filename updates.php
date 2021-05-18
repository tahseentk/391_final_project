<?php
session_start();
require("dbconfig/config.php");
// get value of id that sent from address bar
$id=$_GET['id'];



// Retrieve data from database 
$query="SELECT * FROM players WHERE player_id = '$id'";
$query_run = mysqli_query($con,$query);
$row = mysqli_fetch_assoc($query_run)
?>

<!DOCTYPE HTML>
<html>

<head>
  <title>Admin Panel</title>
  
  <link rel="stylesheet" type="text/css" href="css/style.css">

  
</head>

<body>
  <div id="main">
    <div id="header" style="background: #3e5fc1">
      <div id="logo">
        <div id="logo_text">
          <h1><a href="homepage_of_user.php">Admin Panel</a></h1>
          <h2>Here We Control Everything</h2>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <li><a href="homepage_of_admin.php">Home</a></li>
          <li style="background: #3e5fc1"><a href="adding_player.php">Add Player</a></li>
          <li  class="selected"><a href="list_of_players.php">All Players</a></li>
          <li><a href="logout.php"><button type="button" class="back_btn"> Log Out </button></a></li>
        </ul>
      </div>
    </div>
    <div id="content_header"></div>
    <div id="site_content">
      <div id="banner">
        <img src="imgs/Logo.jpg">
        
      </div>
	  
      <div id="content">
        <h1>Welcome <?php echo $_SESSION['username']; ?></h1>
        <h1 text align="center">updates Member Details</h1>
        
        <table width="500px" border="0" cellspacing="1" cellpadding="0">
<tr>
<form name="form1" method="post" action="updates_ac.php">
<td>
<table width="90%" border="0" cellspacing="1" cellpadding="0">
<tr>
<td align="center">&nbsp;</td>
<td align="center">&nbsp;</td>
<td align="center">&nbsp;</td>
<td align="center">&nbsp;</td>
</tr>
<tr>
<td align="center"><strong>Name</strong></td>
<td align="center"><strong>Age</strong></td>
<td align="center"><strong>Position</strong></td>
<td align="center"><strong>Nationality</strong></td>
<td align="center"><strong>Club</strong></td>

</tr>
<tr>
<td align="center">
<input name="Name" type="text" id="Name" value="<?php echo $row['Name']; ?>" size="15"/>
</td>
<td align="center">
<input name="Age" type="text" id="Age" value="<?php echo $row['Age']; ?>" size="15"/>
</td>
<td align="center">
<input name="Position" type="text" id="Position" value="<?php echo $row['Position']; ?>" size="15"/>
</td>
<td align="center">
<input name="Nationality" type="text" id="Nationality" value="<?php echo $row['Nationality']; ?>" size="15"/>
</td>
<td align="center">
<input name="Club" type="text" id="Club" value="<?php echo $row['Club']; ?>" size="15"/>
</td>
</tr>
<tr>
<td align="center"><strong>Goals Scored</strong></td>
<td align="center"><strong>Assist</strong></td>
<td align="center"><strong>Red Cards</strong></td>
<td align="center"><strong>Yellow Cards</strong></td>
<td align="center"><strong>Clean Sheets</strong></td>
<td align="center"><strong>Goals Conceded</strong></td>
</tr>

<tr>
  <td align="center">
<input name="Goals_Scored" type="text" id="Goals_Scored" value="<?php echo $row['Goals_Scored']; ?>" size="15"/>
</td>
<td align="center">
<input name="Assist" type="text" id="Assist" value="<?php echo $row['Assist']; ?>" size="15"/>
</td>
<td align="center">
<input name="Red_Cards" type="text" id="Red_Cards" value="<?php echo $row['Red_Cards']; ?>" size="15"/>
</td>
<td align="center">
<input name="Yellow_Cards" type="text" id="Yellow_Cards" value="<?php echo $row['Yellow_Cards']; ?>" size="15"/>
</td>
<td align="center">
<input name="Clean_Sheets" type="text" id="Clean_Sheets" value="<?php echo $row['Clean_Sheets']; ?>" size="15"/>
</td>
<td align="center">
<input name="Goals_Conceded" type="text" id="Goals_Conceded" value="<?php echo $row['Goals_Conceded']; ?>" size="15"/>
</td>

<tr>
</table>
<input name="id" type="hidden" id="id" value="<?php echo $row['player_id']; ?>"/>
<input type="submit" name="Submit" value="Submit" />
<a href="remove_ad.php?id=<?php echo $row['player_id']; ?>"><button type="button"> Remove </button></a>


</td>
</form>
</tr>
</table>
      </div>
    </div>
    <div id="footer">
      <p>Copyright &copy; 391_final_project </p>
    </div>
  </div>
</body>
</html>