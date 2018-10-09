<?php session_start(); ?>
<?php include("../db/db.php"); ?>
<?php
  $item_id = $_GET["id"];
  $itemInfo = "SELECT * FROM `items`
  JOIN items_rarity ON items.item_rarity = items_rarity.id
  WHERE items.id = '".$item_id."'";

  foreach ($conn->query($itemInfo) as $item) {
    $item_damage = $item["item_add_damage"];
    $item_defense = $item["item_add_defense"];
    $item_magic = $item["item_add_magic"];

    if(true):?>
      <div class="item">
        <span class="item-name-title"><?php echo $item["item_name"] ?></span>
        <div class="row">
          <div class="col-6">
            <img class="fit imgnohover" src="<?php echo $item["item_img"]; ?>">
          </div>
          <div class="col-6">
            <span class="item-rarity <?php echo $item["rarity_class"]; ?>"><?php echo $item["rarity_name"]; ?></span>
            <!-- <span>Atributos</span> -->

              <?php
                if($item_damage > 0):?>
                  <div class="item-box">
                    <div class="stat-item-title">
                      Daño:
                    </div>
                    <div class="stat-item item-bg">
                      <?php echo $item_damage; ?>
                    </div>
                  </div>
                <?php endif;

                if($item_defense > 0):?>
                  <div class="item-box">
                    <div class="stat-item-title">
                      Defensa:
                    </div>
                    <div class="stat-item item-bg">
                      <?php echo $item_defense; ?>
                    </div>
                  </div>
                <?php endif;

                if($item_magic > 0):?>
                  <div class="item-box">
                    <div class="stat-item-title">
                      Magia:
                    </div>
                    <div class="stat-item item-bg">
                      <?php echo $item_magic; ?>
                    </div>
                  </div>
                <?php endif;
              ?>



              <?php
              $getEquipment = "SELECT * FROM `user_equipment`
              JOIN items ON items.id = user_equipment.equip_id_item
              WHERE user_equipment.equip_id_item = '".$item["id"]."'";
              $equipment = array();
              foreach ($conn->query($getEquipment) as $equiped_items) {
                array_push($equipment, $equiped_items["equip_id_item"]);
              }

              if (!in_array($item["id"], $equipment)):?>
                <button class="fit equip-button" type="button" name="equip-item" id='action-equip-item' data-item="<?php echo $item["id"]; ?>">Equipar</button>
              <?php else: ?>
                <button class="fit discard-button" type="button" name="equip-item" id='action-equip-item' data-item="<?php echo $item["id"]; ?>">Desequipar</button>
              <?php endif;
              ?>
          </div>
        </div>
      </div>
    <?php endif;
  }


?>
