<?php if (session_status() == PHP_SESSION_NONE) { session_start();} ?>
<?php include("../data/db/db.php"); ?>

<?php
$user = array();
$getUserInfo = "SELECT users.username, users.icon, users.user_xp, users.user_hp, users.user_mana, users.id_guild, users.game_money, users.account_role, users.account_state, heros.main_img, heros.base_damage, heros.base_defense, heros.base_magic
FROM `users` JOIN heros ON users.hero = heros.id WHERE users.id = '".$_SESSION["id"]."'";
foreach ($conn->query($getUserInfo) as $userInfo) {
  $user["username"] = $userInfo["username"];
  $user["icon"] = $userInfo["icon"];
  $user["xp"] = $userInfo["user_xp"];
  $user["hp"] = $userInfo["user_hp"];
  $user["mana"] = $userInfo["user_mana"];
  $user["guild"] = $userInfo["id_guild"];
  $user["money"] = $userInfo["game_money"];
  $user["role"] = $userInfo["account_role"];
  $user["state"] = $userInfo["account_state"];
  $user["hero_img"] = $userInfo["main_img"];
  $user["damage"] = $userInfo["base_damage"];
  $user["defense"] = $userInfo["base_defense"];
  $user["magic"] = $userInfo["base_magic"];

  $max_user_hp = 100;
  $max_user_mana = 100;
  $hp_porc = $user["hp"]*100/$max_user_hp;
  $mana_porc = $user["mana"]*100/$max_user_mana;
}
?>
<?php
//suma de ATRIBUTOS objetos
$getItemsValue = "SELECT items.item_add_damage, items.item_add_defense, items.item_add_magic FROM `user_equipment`
JOIN items ON items.id = user_equipment.equip_id_item
WHERE user_equipment.equip_id_user = '".$_SESSION["id"]."'";

foreach ($conn->query($getItemsValue) as $values) {
  $user["damage"] += $values["item_add_damage"];
  $user["defense"] += $values["item_add_defense"];
  $user["magic"] += $values["item_add_magic"];
}
?>
<div class="row">
  <div class="col-md-6">
    <div class="main-char-box">
      <img src="<?php echo $user["hero_img"]; ?>" alt="hero-img">
    </div>
  </div>
  <div class="col-md-5">
    <div class="info-user-bars">
      <div class='col-12'>
        <span class="mainUserDisplay mediFont text-black text-right"> <?php echo $user["username"]; ?><span class="actual-lvl">7</span> </span>
        <div class="bar">
          <div class="health-bar inner-shadow" style="width:<?php echo $hp_porc; ?>%">
            <span class="actual-bar-value"><?php echo $user["hp"]; ?></span>
          </div>
          <span class="max-bar-value"><?php echo $max_user_hp; ?></span>
        </div>
        <div class="bar">
          <div class="mana-bar inner-shadow" style="width:<?php echo $mana_porc; ?>%">
            <span class="actual-bar-value"><?php echo $user["mana"]; ?></span>
          </div>
          <span class="max-bar-value"><?php echo $max_user_mana; ?></span>
        </div>
      </div>
      <div class="col-12 nopadding">
        <div class="col-md-6 col-12">
          <div class="row mediFont">
            <div class="col-6">
              <div class="stat stat-type-box ">Daño</div>
            </div>
            <div class="col-6">
              <div class="stat-item item-bg text-white"><?php echo $user["damage"] ?></div>
            </div>
            <hr>
            <div class="col-6">
              <div class="stat stat-type-box">Defensa</div>
            </div>
            <div class="col-6">
              <div class="stat-item item-bg text-white"><?php echo $user["defense"] ?></div>
            </div>
            <hr>
            <div class="col-6">
              <div class="stat stat-type-box">Magia</div>
            </div>
            <div class="col-6">
              <div class="stat-item item-bg text-white"><?php echo $user["magic"] ?></div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-12">

        </div>
      </div>

    </div>
  </div>
</div>
