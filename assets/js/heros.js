$(function(){
    var $hero_name = "",
    $id = 0;
    $('#close-this').click(function(){
        $('.select-hero-tutorial-box').addClass('d-none');
    });

    $('.each-hero').click(function(){
        var $this = $(this);
        $id = $this.data('hero');
        $hero_name = $this.data('name');
        $('#name').html($hero_name);
        $('#choose_msg').removeClass('d-none');
    });
    $('#close-this-msg').click(function(){
        $('#choose_msg').addClass('d-none');
    });
    $('#choose-this').click(function(){
        chooseHero();
    });

    function chooseHero(){
        $.ajax({
            type: "GET",
            url: "data/process/select_hero.php?h="+$id,
            dataType: "json",
            success: function(resp) {
               if(resp){
                //redirect
                window.location.reload();
               }
            }
          });
    }
    
});