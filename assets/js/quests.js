function loadAdventure(){
  $('.zones li').click(function(){
    $('.selected-quest-box').removeClass('selected-quest-box');
    $(this).children('.inner-quest-box').addClass('selected-quest-box');
    var $questLoadBox = $('#load-quest-box');
    var $quest_id = $(this).data('quest-zone');
    $.ajax({
     type: "GET",
     url: "./data/process/getQuest.php?id="+$quest_id,
     dataType: "text",
     success: function(resp) {
       $questLoadBox.html(resp);
       $('#quest-info-loader').empty();
       questInfo();
     }
    });
  });
}
function questInfo(){
  $('#load-quest-box li').not('.quest-disabled').click(function(){
    var $this = $(this),
    $data = $this.data('quest'),
    $questInfoLoadBox = $('#quest-info-loader');
    $('#load-quest-box li .inner-quest-box').removeClass('selected-quest-box');
    $this.children('.inner-quest-box').addClass('selected-quest-box');
    $.ajax({
     type: "GET",
     url: "./data/process/getQuestInfo.php?id="+$data,
     dataType: "text",
     success: function(resp) {
       $questInfoLoadBox.html(resp);
     }
    });
  });
}

function loadItems(){
  $('li .item').click(function(){
    var $this = $(this),
    $data = $this.data('item'),
    $itemInfoLoadBox = $('#item_load_box');
    $.ajax({
     type: "GET",
     url: "./data/process/getItemInfo.php?id="+$data,
     dataType: "text",
     success: function(resp) {
       $itemInfoLoadBox.html(resp);
       buttonActionListener();
     }
    });
  });



}
function loadEquipment(){
  var $this = $(this),
  $data = $this.data('item'),
  $itemInUser = $('#items-in-user');
  $.ajax({
   type: "GET",
   url: "./data/process/getEquipment.php",
   dataType: "text",
   success: function(resp) {
     $itemInUser.html(resp);
     loadItemsEvents();
   }
  });
}
function loadEquip(){
  var $this = $(this),
  $data = $this.data('item'),
  $itemInfoLoadBox = $('#equip_here');
  $.ajax({
   type: "GET",
   url: "./data/process/getEquip.php",
   dataType: "text",
   success: function(resp) {
     $itemInfoLoadBox.html(resp);
     loadItems();
   }
  });
}
function loadItemsEvents(){
  $('#items-in-user .slot').click(function(){
    var $this = $(this),
    $data = $this.data('item'),
    $itemInfoLoadBox = $('#item_load_box');
    $.ajax({
     type: "GET",
     url: "./data/process/getItemInfo.php?id="+$data,
     dataType: "text",
     success: function(resp) {
       $itemInfoLoadBox.html(resp);
       buttonActionListener();
     }
    });
  });
}
function buttonActionListener(){
  $('#action-equip-item').click(function(){
    var $data = $(this).data('item');
    $.ajax({
     type: "GET",
     url: "./data/process/changeEquipItemStatus.php?id="+$data,
     dataType: "text",
     success: function(resp) {
       loadEquipment();
       loadEquip();
       if($('#action-equip-item').hasClass('discard-button')){
         $('#action-equip-item').removeClass('discard-button');
         $('#action-equip-item').addClass('equip-button');
         $('#action-equip-item').html('Equipar');
       }
       else if($('#action-equip-item').hasClass('equip-button')){
         $('#action-equip-item').removeClass('equip-button');
         $('#action-equip-item').addClass('discard-button');
         $('#action-equip-item').html('Desequipar');

       }
     }
    });
  });
}
