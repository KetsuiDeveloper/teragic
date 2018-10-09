<?php session_start(); ?>
<?php include("../db/db.php"); ?>
<?php
$item_id = $_GET["id"];
$checkItemUser = "SELECT * FROM `user_equipment` WHERE `equip_id_item` = '".$item_id."' AND `equip_id_user` = '".$_SESSION["id"]."'";
$userHaveItemEquiped = array();
foreach ($conn->query($checkItemUser) as $item) {
  array_push($userHaveItemEquiped, $item["equip_id_item"]);
}

if(!in_array($item_id, $userHaveItemEquiped)){
  //hay que equiparlo
  $action = "INSERT INTO `user_equipment`(`equip_id_item`, `equip_id_user`) VALUES ('".$item_id."', '".$_SESSION["id"]."')";
  $conn->query($action);
} else{
  //hay que desequiparlo
  $action = "DELETE FROM `user_equipment` WHERE `equip_id_item` = '".$item_id."' AND `equip_id_user` = '".$_SESSION["id"]."'";
  $conn->query($action);
}
?>
