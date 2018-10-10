$(function(){
    $('.each-hero').click(function(){
        var $this = $(this),
        $id = $this.data('hero');
        $.ajax({
            type: "GET",
            url: "data/process/select_hero.php?h="+$id,
            dataType: "json",
            success: function(resp) {
               
            }
          });

    });
    $('#close-this').click(function(){
        $('.select-hero-tutorial-box').addClass('d-none');
    });
});