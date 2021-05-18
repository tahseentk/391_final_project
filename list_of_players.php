<?php
session_start();
require("dbconfig/config.php");

if (isset($_GET['order'])) 
{
  $order = $_GET['order'];
}
else
{
  $order = 'position';
}

if (isset($_GET['sort'])) 
{
  $sort = $_GET['sort'];
}
else
{
  $sort = 'ASC';
}

$query = "SELECT players.player_id,players.Name,players.Age, players.Position, players.Nationality, players.Club, players.Goals_Scored, players.Assist, players.Red_Cards, players.Yellow_Cards, players.Clean_Sheets, players.Goals_Conceded FROM  players ORDER BY $order $sort";

$query_run = mysqli_query($con,$query);

$id = $_GET['search'];
    $query1 = "SELECT * FROM players WHERE Name ='$id'";


$query_run1 = mysqli_query($con,$query1);

?>

<!DOCTYPE HTML>
<html>

<head>
  <title>Admin Panel</title>
  <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>

<body>
  <div id="main">
    <div id="header" style="background: #3e5fc1">
      <div id="logo">
        <div id="logo_text">
          <h1><a href="homepage_of_admin.php">Admin Panel</a></h1>
          <h2>Here We Control Everything</h2>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <li><a href="homepage_of_admin.php">Home</a></li>
          <li><a href="adding_player.php">Add Player</a></li>
          <li class="selected"><a href="list_of_players.php">All Players</a></li>
          <li><a href="logout.php"><button type="button" class="back_btn"> Log Out </button></a></li>
        </ul>
      </div>
    </div>
    <div id="site_content">
      <div id="banner">
          <img src="imgs/Logo.jpg">
        </div>

        <div id="sidebar_container">
        <label>Search</label>
<form action="" method="GET">
<input type="text" placeholder="Type Player's Name here" name="search">&nbsp;
<input type="submit" value="Search" name="btn" class="btn btn-sm btn-primary">
</form>
<h2>Search Result</h2>
<table>
  <?php
while($row1 = mysqli_fetch_assoc($query_run1))
{
    ?>
<tr>
<th>Name</th>
<td><?php echo $row1['Name']; ?></td>
</tr>

<tr>
<th>Age</th>
<td><?php echo $row1['Age']; ?></td>
</tr>

<tr>
<th>Position</th>
<td><?php echo $row1['Position']; ?></td>
</tr>

<tr>
<th>Nationality</th>
<td><?php echo $row1['Nationality']; ?></td>
</tr>

<tr>
<th>Club</th>
 <td><?php echo $row1['Club']; ?></td>
 </tr>

 <tr>
<th>Goals_Scored</th>
<td><?php echo $row1['Goals_Scored']; ?></td>
</tr>

<tr>
<th>Assist</th>
<td><?php echo $row1['Assist']; ?></td>
</tr>
<tr>
<th>Red_Cards</th>
<td><?php echo $row1['Red_Cards']; ?></td>
</tr>

<tr>
<th>Yellow_Cards</th>
<td><?php echo $row1['Yellow_Cards']; ?></td>
</tr>

<tr>
<th>Clean_Sheets</th>
<td><?php echo $row1['Clean_Sheets']; ?></td>
</tr>

<tr>
<th>Goals_Conceded</th>
<td><?php echo $row1['Goals_Conceded']; ?></td>
</tr>

<tr>
<th>updates</th>
<td><a href="updates.php?id=<?php echo $row1['player_id']; ?>">updates</a></td>
</tr>

    <?php
}
?>
</table> 
      </div>
      
      <div id="content">
        <h1 text align="center">All Players List</h1>
        
        <?php $sort == 'DESC' ? $sort = 'ASC' : $sort = 'DESC'; ?>

  <table border = "1">
    <tr>
      <th><a href="?order=name&&sort=<?=$sort?>">Name</th>
      <th><a href="?order=age&&sort=<?=$sort?>">Age</th>
      <th><a href="?order=position&&sort=<?=$sort?>">Position</th>
      <th><a href="?order=nationality&&sort=<?=$sort?>">Nationality</th>
      <th><a href="?order=club&&sort=<?=$sort?>">Club</th>
      <th><a href="?order=goals_scored&&sort=<?=$sort?>">Goals Scored</th>
      <th><a href="?order=assist&&sort=<?=$sort?>">Assist</th>
      <th><a href="?order=red_cards&&sort=<?=$sort?>">Red Cards</th>
      <th><a href="?order=yellow_cards&&sort=<?=$sort?>">Yellow Cards</th>
      <th><a href="?order=clean_sheets&&sort=<?=$sort?>">Clean Sheets</th>
      <th><a href="?order=goals_conceded&&sort=<?=$sort?>">Goals Conceded</th>
      <th><a>updates</a></th>
    </tr>

        <?php  
        while ($row = mysqli_fetch_assoc($query_run)) 
          { 
            
            ?>
            <tr>
              <td> <?php echo $row["Name"]; ?></td>
              <td> <?php echo $row["Age"]; ?></td>
              <td> <?php echo $row["Position"]; ?></td>
              <td> <?php echo $row["Nationality"]; ?></td>
              <td> <?php echo $row["Club"]; ?></td>
              <td> <?php echo $row["Goals_Scored"]; ?></td>
              <td> <?php echo $row["Assist"]; ?></td>
              <td> <?php echo $row["Red_Cards"]; ?></td>
              <td> <?php echo $row["Yellow_Cards"]; ?></td>
              <td> <?php echo $row["Clean_Sheets"]; ?></td>
              <td> <?php echo $row["Goals_Conceded"]; ?></td>
              <td><a href="updates.php?id=<?php echo $row['player_id']; ?>">updates</a></td>
            </tr>
          
          <?php 
          } ?>


  </table>
      </div>
    </div>
    <div id="footer">
      <p>Copyright &copy; 391_final_project </p>
    </div>
</body>
</html>
