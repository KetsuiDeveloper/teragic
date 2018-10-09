<?php
session_start();
include("../db/db.php");
$icon = $_GET["icon"];
$updateIcon = "UPDATE `users` SET `icon` = '".$icon."' WHERE id = '".$_SESSION["id"]."'";
$conn->query($updateIcon);

?>
