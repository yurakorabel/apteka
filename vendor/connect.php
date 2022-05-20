<?php
$servername = "localhost:8889";
$username = "root";
$database = "apteka_db";

// Create connection
$conn = mysqli_connect($servername, $username, "", $database);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>