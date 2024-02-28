<?php
$conn = new mysqli("localhost", "root", "", "web_stnikolas");
if ($conn->connect_errno) {
    die("Failed to connect to MySQL: " . $conn->connect_error);
}


if($_SERVER['REQUEST_METHOD'] == "POST"){
  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM admins WHERE username='$username' AND password='$password'";
  $res = $conn->query($sql);
  
  if ($res->num_rows == 1){
    $_SESSION['username'] = $username;
    header("Location: index-admin.php");
    exit();
  }
  else{
    echo '<script>alert("Invalid username or password.");</script>';
  }
}
$conn->close();
?>