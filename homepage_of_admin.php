<?php
  session_start();
  require_once('dbconfig/config.php');
  //phpinfo();
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
          <li class="selected"><a href="homepage_of_admin.php">Home</a></li>
          <li style="background: #3e5fc1"><a href="adding_player.php">Add Player</a></li>
          <li><a href="list_of_players.php">All Players</a></li>
          <li><a href="logout.php"><button type="button" class="back_btn"> Log Out </button></a></li>
        </ul>
      </div>
    </div>
    <div id="content_header"></div>
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
        
      </div>
    </div>
    <div id="footer">
      <p>Copyright &copy; 391_final_project </p>
    </div>
  </div>
</body>
</html>