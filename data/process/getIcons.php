<?php
session_start();
include("../db/db.php");
$userIconArray = array();

$getIcons = "SELECT * FROM `icons` WHERE icon_available = '1'";
foreach ($conn->query($getIcons) as $icons) {
  $userIconSelected = "SELECT icons.id, icons.icon_img FROM `users`
  JOIN icons ON users.icon = icons.id
  WHERE users.id = ".$_SESSION["id"];

  foreach ($conn->query($userIconSelected) as $userIcon) {
    array_push($userIconArray, $userIcon["id"]);
  }
  if ($icons["id"] == $userIconArray[0]):?>
    <div class="col-md-2 col-4">
      <img class='icon icon-selected noselect' src="<?php echo $icons["icon_img"] ?>" alt="icon" data-icon='<?php echo $icons["id"]; ?>'>
    </div>
  <?php else: ?>
    <div class="col-md-2 col-4">
      <img class='icon noselect' src="<?php echo $icons["icon_img"] ?>" alt="icon" data-icon='<?php echo $icons["id"]; ?>'>
    </div>
  <?php endif;
}
?>
