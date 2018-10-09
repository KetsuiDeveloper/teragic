<?php
session_start();
include("../db/db.php");
$getIcon = "SELECT icon_img FROM `users` JOIN icons ON icons.id = users.icon WHERE users.id = '".$_SESSION["id"]."'";
foreach ($conn->query($getIcon) as $icon) {
  echo $icon["icon_img"];
}
?>
