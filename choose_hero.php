<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>¡Elige a tu heroe! | Téragic</title>
    <?php include("template/meta-imports.php"); ?>
    <?php include("template/js-imports.php"); ?>
  </head>
  <body class='background-medieval nopadding'>
    <div class="select-hero-tutorial-box">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6 offset-lg-3">
                    <div class="select-hero-tutorial mediFont">
                        <p>A continuación podrás elegir a tu <strong>héroe</strong></p>
                        <p><strong>Solo podrás hacerlo una vez</strong>, asi que elige sabiamente</p>
                        <a id="close-this" class="btn-aceptar noselect text-white" >Aceptar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="choose_msg" class="select-hero-tutorial-box d-none">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6 offset-lg-3">
                    <div class="select-hero-tutorial mediFont">
                        <p>¿Quieres elegir a <strong id="name"></strong>?</p>
                        <div class="select-hero-tutorial-stats" id="char_data">
                            <span class="stat-item item-bg text-white" id="char_atck"></span>
                            <span class="stat-item item-bg text-white" id="char_def"></span>
                            <span class="stat-item item-bg text-white" id="char_mgc"></span>
                        </div>
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <a id="choose-this" class="btn-aceptar noselect text-white" >Aceptar</a>
                            </div>
                            <div class="col-12 col-lg-6">
                                <a id="close-this-msg" class="btn-close noselect text-white" >Cancelar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="all-heros">
        <?php
        $all_heros = "SELECT * FROM `heros` WHERE available = 1";
        foreach ($conn->query($all_heros) as $hero) {
            if(true): ?>
                <div class="each-hero text-center" data-hero="<?php echo $hero["id"]; ?>" data-atck="<?php echo $hero["base_damage"]; ?>" data-def="<?php echo $hero["base_defense"]; ?>" data-mgc="<?php echo $hero["base_magic"]; ?>" data-name="<?php echo $hero["name"]; ?>" style="background-image: url(<?php echo $hero["main_img"] ?>)">
                    <span class="mediFont text-white"><?php echo $hero["name"]; ?></span>
                </div>
            <?php endif;
        }
        ?>
    </div>
    <script src="./assets/js/heros.js"></script>
  </body>
</html>
