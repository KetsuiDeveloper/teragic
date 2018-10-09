<?php
session_start();
include("../db/db.php");
$maxItemsPerUser = 6;
$getEquipment = "SELECT * FROM `user_equipment`
JOIN items ON items.id = user_equipment.equip_id_item
WHERE user_equipment.equip_id_user = '".$_SESSION["id"]."' ORDER BY user_equipment.id";

$numberOfItems = 0;
$numberOf = "SELECT COUNT(id) as num FROM `user_equipment` WHERE equip_id_user = '".$_SESSION["id"]."'";
foreach ($conn->query($numberOf) as $num) {
  $numberOfItems = $num["num"];
}

echo "<span class='numberOfItems'>".$numberOfItems."/".$maxItemsPerUser."</span>";

foreach ($conn->query($getEquipment) as $items) {

  $getRarity = "SELECT items_rarity.rarity_class FROM `items`
  JOIN items_rarity ON items.id = items_rarity.id
  WHERE items.id = ".$items["id"];
  foreach ($conn->query($getRarity) as $item_rarity) {
    $rarity_class = $item_rarity["rarity_class"];
  }

  if (true):?>
    <div class="slot" data-item="<?php echo $items["id"]; ?>">
      <img class="item" src="<?php echo $items["item_img"]; ?>">
      <span class="<?php echo $rarity_class; ?>" aria-hidden="true"></span>
      <p><?php echo $items["item_name"]; ?></p>
    </div>
  <?php endif;
}
?>
