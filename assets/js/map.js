var map = {};
map["inicio"] = "navigation/inicio.php";
map["aventura"] = "navigation/aventura.php";
map["perfil"] = "navigation/perfil.php";
map["equipo"] = "navigation/equipo.php";
map["gremio"] = "navigation/gremio.php";
map["tienda"] = "navigation/tienda.php";

$(function(){
  $("li").find(`[data-target='map-list']`).click(function(e){
    e.preventDefault();
    var $this = $(this);
    var $key = $this.data("key");
    var $url = map[$key];
    if($key == "close"){
      window.location = "./data/db/close.php";
      return;
    }
    $.ajax({
      type: "GET",
      url: "/RpgGame/"+$url,
      dataType: "text",
      success: function(resp) {
      $('#map-injection').html(resp);
      if(window.innerWidth <= 1000){
        $menu.slideUp(500, function() {
          $('body').removeClass('stop-scrolling');
        });
      }
        //changeUrl($key);
      }
    });
  });
  function changeUrl(path){
    window.history.pushState("", "", '/'+path);
  }
});
