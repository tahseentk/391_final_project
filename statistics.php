<?php
  session_start();
  require_once('dbconfig/config.php');
  //phpinfo();
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

  // get value of id that sent from address bar
$id=$_GET['id'];

// Retrieve data from database 
$query="SELECT stat.player_id, stat.Goals_Scored, stat.Assist, stat.Red_Cards, stat.Yellow_Cards, stat.Clean_Sheets, stat.Goals_Conceded FROM stat WHERE stat.player_id = $id";
$query_run = mysqli_query($con,$query);
?>

<!DOCTYPE HTML>
<html>

<head>
  <title>Football Manager 2021</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>

<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <h1><a href="homepage_of_user.php">Football Manager 2021</a></h1>
          <h2>Become The Manager of Your Own Team</h2>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li class="selected"><a href="homepage.php">Home</a></li>
          <li><a href="my_team.php">My Team</a></li>
          <li><a href="transfer_player.php">Transfer Player</a></li>
          <li><a href="../logout.php"><button type="button" class="back_btn"> Log Out </button></a></li>
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
            
            <h3>Latest News</h3>
            <h4>Edinson Cavani has signed a one-year contract extension with Manchester United, it has been confirmed.</h4>
            <h5>10th May 2021</h5>
            <p>The 34-year-old has rejected offers from his native South America to stay at United for another year.<br /><a href="#">Read more</a></p>

          </div>
        </div>
      </div>
      <div id="content">
        <h1>Welcome <?php echo $_SESSION['username']; ?></h1>
        <p></p>
        <h1 text align="center">This Is Your Team</h1>
        
        <?php $sort == 'DESC' ? $sort = 'ASC' : $sort = 'DESC'; ?>

  <table border = "1">
    <tr>
      <th><a href="?order=goals_scored&&sort=<?=$sort?>">Goals Scored</th>
      <th><a href="?order=assist&&sort=<?=$sort?>">Assist</th>
      <th><a href="?order=red_cards&&sort=<?=$sort?>">Red Cards</th>
      <th><a href="?order=yellow_cards&&sort=<?=$sort?>">Yellow Cards</th>
      <th><a href="?order=clean_sheets&&sort=<?=$sort?>">Clean Sheets</th>
      <th><a href="?order=goals_conceded&&sort=<?=$sort?>">Goals Conceded</th>
        <th><a>Add</a></th>
    </tr>

        <?php  
        while ($row = mysqli_fetch_assoc($query_run)) 
          { 
            
            ?>
            <tr>
              <td> <?php echo $row["Goals_Scored"]; ?></td>
              <td> <?php echo $row["Assist"]; ?></td>
              <td> <?php echo $row["Red_Cards"]; ?></td>
              <td> <?php echo $row["Yellow_Cards"]; ?></td>
              <td> <?php echo $row["Clean_Sheets"]; ?></td>
              <td> <?php echo $row["Goals_Conceded"]; ?></td>
              <td><a href="add.php?id=<?php echo $row['player_id'] ?>">Add</a></td>
            </tr>
          
          <?php 
          } ?>


  </table>
      </div>
    </div>
    <div id="footer">
      <p>Copyright &copy; 391_final_project </p>
    </div>
  </div>
</body>
</html>
