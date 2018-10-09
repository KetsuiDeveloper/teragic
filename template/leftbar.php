<?php
$user = array();
$getUserInfo = "SELECT users.username, icons.icon_img, users.id_guild, users.game_money, users.account_state
FROM `users`
JOIN heros ON users.hero = heros.id
JOIN icons ON icons.id = users.icon
WHERE users.id = '".$_SESSION["id"]."'";
foreach ($conn->query($getUserInfo) as $userInfo) {
  $user["username"] = $userInfo["username"];
  $user["icon"] = $userInfo["icon_img"];
  $user["guild"] = $userInfo["id_guild"];
  $user["money"] = $userInfo["game_money"];
  $user["state"] = $userInfo["account_state"];}
?>
<div class="mobile-burger">
<svg viewBox="0 0 8 16" version="1.1" aria-hidden="true"><path fill-rule="evenodd" d="M8 4v1H0V4h8zM0 8h8V7H0v1zm0 3h8v-1H0v1z"></path></svg>
</div>
<div class="col-md-2 col-12 sidebar-background sidebar-position">
  <div class="profile-sidebar-display">
    <img src="<?php echo $user["icon"]; ?>" class="profile-img noselect" alt="profile-picture" id='profile-picture'>
    <span class="user-name-span"><?php echo $user["username"]; ?></span>
    <div class="money-box">
      <span class="money">
        <?php echo $user["money"]; ?>
        <img src="./assets/images/icons/billete.png" alt="">
      </span>
    </div>
  </div>
  <ul class='sidebar'>
    <li>
      <a href="" data-target='map-list' data-key='inicio'>Inicio</a>
    </li>
    <li>
      <a href="" data-target='map-list' data-key='perfil'>Perfil</a>
    </li>
    <li>
      <a href="" data-target='map-list' data-key='aventura'>Aventura</a>
    </li>
    <li>
      <a href="" data-target='map-list' data-key='equipo'>Inventario</a>
    </li>
    <li>
      <a href="" data-target='map-list' data-key='gremio'>Gremio</a>
    </li>
    <li>
      <a href="" data-target='map-list' data-key='tienda'>Tienda</a>
    </li>
  </ul>
</div>
