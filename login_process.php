<?php
session_start();
$conn = new mysqli("localhost", "root", "", "web_stnikolas");
if ($conn->connect_errno) {
  echo "Failed to connect to MySQL: " . $conn->connect_error;
}

if($_SERVER['REQUEST_METHOD'] == "POST"){

  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM admins WHERE username='$username' AND password='$password'";
  $res = $conn->query($sql);

  if (!$res) {
    echo"Login Failed: " . $conn->error;
  }

  if ($res->num_rows == 1){
    $_SESSION['username']= $username;
    header("Location: index-admin.php");
    exit();
  }
  else{
    header("Location: login.php?err");
    exit();
  }

}
$conn->close();
?>