<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

// Creating connection
$con = mysqli_connect($servername, $username, $password, $dbname);
// Checking connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>



