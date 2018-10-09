$(function(){
  $('.mobile-burger').click(function(){
    $menu = $( ".sidebar-background" );
    if($menu.is(":hidden")){
      $menu.slideDown(500, function() {
        $('body').addClass('stop-scrolling')
      });
    } else{
      $menu.slideUp(500, function() {
        $('body').removeClass('stop-scrolling')
      });
    }
    
  });
  $('#profile-picture').click(function(){
    var $icons_open_modal = $("#icons_modal");
    var $icons_content_modal = $('#allIconsModal');
    //get html of all icons
    $.ajax({
     type: "GET",
     url: "./data/process/getIcons.php",
     dataType: "text",
     success: function(resp) {
       $icons_content_modal.html(resp);
       $icons_open_modal.modal();
       setIconListener();
     }
    });
  });
  function setIconListener(){
    $('.icon').click(function(){
      $('.icon-selected').removeClass('icon-selected');
      $(this).addClass('icon-selected');
      var $icon = $(this).data('icon');

      $.ajax({
       type: "GET",
       url: "./data/process/updateIcon.php?icon="+$icon,
       dataType: "text",
       success: function(resp) {
         updateDomIcon();
       }
      });
    });
  }
  function updateDomIcon(){
    $.ajax({
     type: "GET",
     url: "./data/process/getUserIcon.php",
     dataType: "text",
     success: function(resp) {
       $('#profile-picture').attr('src', resp);
     }
    });
  }
});
