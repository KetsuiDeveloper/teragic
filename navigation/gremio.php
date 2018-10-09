<?php if (session_status() == PHP_SESSION_NONE) { session_start();} ?>
<?php include("../data/db/db.php"); ?>
<?php
$guild = array();
$getGuildInfo = "SELECT guilds.id, guilds.guild_name, guilds.guild_points, guilds.guild_admin, guild_icons.guild_icon_img FROM `guilds`
JOIN guilds_member ON guilds.id = guilds_member.id_guild
JOIN guild_icons ON guilds.guild_icon = guild_icons.id
WHERE guilds_member.id_user = '".$_SESSION["id"]."'";

foreach ($conn->query($getGuildInfo) as $guildInfo) {
  $guild["id"] = $guildInfo["id"];
  $guild["username"] = $guildInfo["guild_name"];
  $guild["img"] = $guildInfo["guild_icon_img"];
  $guild["username"] = $guildInfo["guild_name"];
  $guild["admin"] = $guildInfo["guild_admin"];
}
?>

<div class="row">
  <div class="col-12">
    <div class="offset-md-3 col-md-6 col-12 text-white">
      <div class="woodbox">
        <h1 class="text-center mediFont">Gremio</h1>
        <strong class="mediFont text-center d-block">Subtitulo</strong>
      </div>
    </div>
  </div>
  <div class="col-12">
    <div class="zone-bg mediFont">
      <div class="guild-title">
        <img class="guild-icon" src="<?php echo $guild["img"]; ?>" alt="">
        <span><?php echo $guild["username"]; ?></span>
      </div>
      <div class="guild-body">
        <div class="row">
          <div class="col-md-6">
            <div class="guild-box guild-box-separator">
              <strong>Información</strong>
              <div class="guild-members">
                <div class="zones zone-list text-white">
                  <p class="description-box">Este es una descripción del gremio, aqui estarán todos los miembros y sus cosillas jeje</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="guild-box">
              <strong>Miembros</strong>
              <div class="guild-members">
                <ul class="zones zone-list text-white">
                  <?php
                  $guildMembers = "SELECT users.id, users.username, icons.icon_img, users.user_xp FROM `guilds_member`
                  JOIN users ON users.id = guilds_member.id_user
                  JOIN icons ON users.icon = icons.id
                  WHERE guilds_member.id_guild = '".$guild["id"]."'
                  ORDER BY users.user_xp DESC";

                  foreach ($conn->query($guildMembers) as $members) {
                    if($members["id"] == $guild["admin"]):?>
                      <li>
                        <div class="inner-quest-box" title='Administrador del Gremio'>
                          <img src="./assets/images/icons/crown.png">
                          <img class='guild-user-img' src="<?php echo $members["icon_img"] ?>">
                          <?php echo $members["username"]; ?>
                          <span class='score score-red'><?php echo $members["user_xp"] ?></span>
                        </div>
                      </li>
                    <?php else: ?>

                      <li>
                        <div class="inner-quest-box">
                          <img class='guild-user-img' src="<?php echo $members["icon_img"] ?>">
                          <?php echo $members["username"]; ?>
                          <span class='score score-red'><?php echo $members["user_xp"] ?></span>
                        </div>
                      </li>
                    <?php endif;
                  }
                  ?>
                </ul>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
