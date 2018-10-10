$(function(){
    $('.each-hero').click(function(){
        var $this = $(this),
        $id = $this.data('hero');

    });
    $('#close-this').click(function(){
        $('.select-hero-tutorial-box').addClass('d-none');
    });
});