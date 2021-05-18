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

$query = "SELECT players.player_id, players.Name,players.Age, players.Position, players.Nationality, players.Club, players.Goals_Scored, players.Assist, players.Red_Cards, players.Yellow_Cards, players.Clean_Sheets, players.Goals_Conceded FROM users, players, my_players WHERE my_players.username = '".$_SESSION['username']."' and users.username= '".$_SESSION['username']."' AND players.player_id = my_players.player_id ORDER BY $order $sort";

$query_run = mysqli_query($con,$query);

$id = $_GET['search'];
    $query1 = "SELECT * FROM players WHERE Name ='$id'";


$query_run1 = mysqli_query($con,$query1);

?>

<!DOCTYPE HTML>
<html>

<head>
  <title>My Team</title>
  <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>

<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <h1><a href="homepage.php">Football Manager 2021</a></h1>
          <h2>Become The Manager of Your Own Team</h2>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <li><a href="homepage.php">Home</a></li>
          <li class="selected"><a href="team_of_the_user.php">My Team</a></li>
          <li><a href="player_transfer.php">Transfer Player</a></li>
          <li><a href="logout.php"><button type="button" class="back_btn"> Log Out </button></a></li>
        </ul>
      </div>
    </div>
    <div id="site_content">
      <div id="banner">
          <img src="imgs/Logo.jpg">

      </div>
      <div id="sidebar_container">
        <div class="sidebar">
          
          <div class="sidebar_item">
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
<th>Remove</th>
<td><a href="updates.php?id=<?php echo $row1['player_id']; ?>">Update</a></td>
</tr>

    <?php
}
?>
</table> 
          </div>
          
        </div>
        
      </div>
      <div id="content">
        <h1 text align="center">This Is Your Team</h1>
        
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
        <th><a>Remove</a></th>
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
              <td><a href="remove.php?id=<?php echo $row['player_id'] ?>">Remove</a></td>
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
