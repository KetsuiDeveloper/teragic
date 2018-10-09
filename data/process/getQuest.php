<?php
session_start();
include("../db/db.php");
?>

<?php
$quests_completed = array();
$quests_not_completed = array();
$number_quests = 0;
$max_quests = 0;
$quests_printed = 0;
if(!isset($_GET["id"])){
  $quest_zone_id = 1;
} else{
  $quest_zone_id = $_GET["id"];
}

$getQuests = "SELECT * FROM quests WHERE quest_zone = ".$quest_zone_id;
foreach ($conn->query($getQuests) as $quests) {
  $quest_id = $quests["id"];
  $number_quests++;
  $max_quests++;

  $checkQuests = "SELECT * FROM `quests_completed_users` WHERE id_user = '".$_SESSION["id"]."' AND id_quest = '".$quest_id."'";
  foreach ($conn->query($checkQuests) as $check_quests) {
    array_push($quests_completed, $quest_id);

    //mision DONE
    if (true):?>
      <li class="noselect" data-quest="<?php echo $quests["id"]; ?>">
        <div class="inner-quest-box">
          <span><?php echo $quests["quest_name"] ?></span>
          <img src="./assets/images/icons/tick.png">
          <div class="energy-box">
            <strong><?php echo $quests["quest_mana_need"] ?></strong>
            <img src="./assets/images/icons/blue-mana.png">
          </div>
        </div>
      </li>
    <?php endif;
    $quests_printed++;
    $number_quests--;
  }
    //mision NO DONE DISPONIBLE
    array_push($quests_not_completed, $quest_id);
    if (!in_array($quest_id, $quests_completed) && in_array(($quest_id-1), $quests_completed) || $number_quests == 1):?>
      <li class="noselect" data-quest="<?php echo $quests["id"]; ?>">
        <div class="inner-quest-box">
          <span><?php echo $quests["quest_name"]; ?></span>
          <div class="energy-box">
            <strong><?php echo $quests["quest_mana_need"]; ?></strong>
            <img src="./assets/images/icons/blue-mana.png">
          </div>
        </div>
      </li>
      <?php $quests_printed++; ?>
    <?php endif;



}
//misiones NO DESBLOQUEADAS
$not_available_to_print = $max_quests-$quests_printed;
for ($i=0; $i < $not_available_to_print; $i++) {
  if (true):?>
    <li class="quest-disabled noselect">
      <div class="inner-quest-box">
        <span>No desbloqueado</span>
        <div class="energy-box">
          <img src="./assets/images/icons/lock.png">
        </div>
      </div>
    </li>
  <?php endif;
}
?>
