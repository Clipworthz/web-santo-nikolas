<?php
session_start();
$conn = new mysqli("localhost", "root", "", "web_stnikolas");
if ($conn->connect_errno) {
  echo "Failed to connect to MySQL: " . $conn->connect_errno;
}
if($_SESSION['username']){
  $_SESSION = array();
  session_destroy();
  header("Location: login.php");
  exit();
} else{
  echo "Logout Failed: " . $conn->error;
}
$conn->close();
?>
