<?php
session_start();
include("../db/db.php");
?>

<?php
$quests_completed = array();
$quests_not_completed = array();
$number_quests = 0;

$quest_zone_id = $_GET["id"];


$getQuests = "SELECT * FROM `quests`
JOIN enemys ON quests.quest_enemy = enemys.id
WHERE quests.id =".$quest_zone_id;

foreach ($conn->query($getQuests) as $quest) {
  if (true):?>
  <div class="mediFont zone-bg">
    <div class="col-12">
      <img class="fit" src="<?php echo $quest["enemy_main_img"] ?>">
    </div>
    <div class="col-12">
      <span class="description-dark-box"><?php echo $quest["quest_description"]?></span>
    </div>
    <div class="col-12">
      <div class="go-quest" data-go="<?php echo $quest["id"]; ?>">
        <strong>Empezar</strong>
      </div>
    </div>
  </div>
  <?php endif;
}

?>
