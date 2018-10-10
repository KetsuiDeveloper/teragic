<?php
session_start();
//login in db with your user
include("../db/db.php");
$username = $_POST["username-field"];
$password = $_POST["password-field"];
$checkThePassword = false;
$checkPassword = "SELECT password FROM users WHERE username = '".$username."' LIMIT 1";
foreach ($conn->query($checkPassword) as $row) {
    $DbPassword = $row['password'];
    $checkThePassword = password_verify($password, $DbPassword);
}
if($checkThePassword){
  $getDataOfUser = "SELECT * FROM users WHERE username = '".$username."' LIMIT 1";
  foreach ($conn->query($getDataOfUser) as $row) {
    if($row['isEmailVerified'] == "0"){
      header("Location: /RpgGame?email=false");
    } else{
      $_SESSION['id'] = $row['id'];
      $_SESSION['role'] = $row['account_role'];
      $_SESSION['hero'] = $row['hero'];
      header("Location: /RpgGame/");
    }
  }
} else{
  header("Location: /RpgGame/index.php?error=true");
}
 ?>
