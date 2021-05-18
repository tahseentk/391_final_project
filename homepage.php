<?php
  session_start();
  require_once('dbconfig/config.php');
  //phpinfo();
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
          <li><a href="team_of_the_user.php">My Team</a></li>
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
      </div>
    </div>
    <div id="footer">
      <p>Copyright &copy; 391_final_project </p>
    </div>
  </div>
</body>
</html>
