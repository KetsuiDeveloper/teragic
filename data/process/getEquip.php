<?php if (session_status() == PHP_SESSION_NONE) { session_start();} ?>
<?php
if(isset($check) && $check == true){
  include("../data/db/db.php");
} else{
  include("../db/db.php");
}
?>
<?php
$getEquipedItems = "SELECT * FROM `user_equipment`
JOIN items ON items.id = user_equipment.equip_id_item
WHERE user_equipment.equip_id_user = '".$_SESSION["id"]."'";

$equiped_items = array();
foreach ($conn->query($getEquipedItems) as $equiped) {
  array_push($equiped_items, $equiped["equip_id_item"]);
}

$getUserItems = "SELECT * FROM `items_users`
JOIN items ON items.id = items_users.id_item
JOIN items_rarity ON items_rarity.id = items.item_rarity
WHERE items_users.id_user = '".$_SESSION["id"]."'";
foreach ($conn->query($getUserItems) as $item) {

  if(!in_array($item["id_item"], $equiped_items)):?>
  <li class="col-md-3 col-3">
    <div class="item" data-item="<?php echo $item["id_item"]; ?>">
      <img src="<?php echo $item["item_img"] ?>" alt="<?php echo $item["item_name"] ?>">
      <span class="item-lvl <?php echo $item["rarity_class"]; ?>"></span>
    </div>
  </li>
  <?php endif;
}
?>
