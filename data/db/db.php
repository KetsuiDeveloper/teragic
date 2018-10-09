<?php
$user = "root";
$pass = "";
$conn = new PDO('mysql:host=localhost;dbname=RpgGame', $user, $pass);
$conn->exec("set names utf8");


?>
