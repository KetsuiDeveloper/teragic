<?php include("../data/db/db.php"); ?>
<div class="adventure-box text-white">
  <div class="row">
    <div class="col-12">
      <div class="offset-md-3 col-md-6 col-12">
        <div class="woodbox">
          <h1 class="text-center mediFont">Tablón de misiones</h1>
          <strong class="mediFont text-center d-block">Aqui podrás ver todas las misiones</strong>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <ul class='zones zone-list mediFont zone-bg'>
        <?php
        $getZones = "SELECT * FROM zones";
        foreach ($conn->query($getZones) as $zones) {
          if (true):?>
            <li class="noselect" data-quest-zone='<?php echo $zones["id"]; ?>'>
              <div class="inner-quest-box">
                <?php echo $zones["zone_name"]; ?>
              </div>
            </li>
          <?php endif;
        }
        ?>
      </ul>
    </div>
    <div class="col-md-6">
      <ul class='zone-list mediFont zone-bg' id='load-quest-box'>
        <li>Elige una zona</li>
      </ul>
    </div>
    <div class="col-md-3" id="quest-info-loader">

    </div>
  </div>
</div>
<script>
loadAdventure();
</script>
