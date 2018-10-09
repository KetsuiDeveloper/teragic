<?php session_start(); ?>
<?php include("../data/db/db.php"); ?>
<div class="adventure-box text-white">
  <div class="row">
    <div class="col-12">
      <div class="offset-md-3 col-md-6 col-12">
        <div class="woodbox">
          <h1 class="text-center mediFont">Inventario</h1>
          <strong class="mediFont text-center d-block">Aqui podrás ver y configurar todo tu equipo</strong>
        </div>
      </div>
    </div>
    <div class="col-md-4 mediFont">

      <ul class='items zone-bg'>
        <span class="title-list">Inventario</span>
        <div class="row" id='equip_here'>
          <?php $check = true; ?>
          <?php include("../data/process/getEquip.php"); ?>
        </div>
      </ul>
    </div>
    <div class="col-md-4 mediFont">
      <div class="zone-list zone-bg">
        <span class="title-list">Información del objeto</span>
        <div id="item_load_box">

        </div>
      </div>
    </div>

    <div class="col-md-4 mediFont">
      <div class="zone-list zone-bg">
        <span class="title-list">Objetos equipados</span>
        <div id="items-in-user">



        </div>
      </div>
    </div>
  </div>
</div>
<script>
loadEquipment();
loadItems();

</script>
