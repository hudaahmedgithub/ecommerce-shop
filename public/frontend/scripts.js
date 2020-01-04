$(document).ready(function(){

    $('.pro-cards .card').hover(function(){
        $(this).children('a').css("visibility", "visible");
    }, function(){
        $(this).children('a').css("visibility", "hidden");
    });

    $('.product-card .image-gallery img').click(function(){
        $('.main-img').attr('src', $(this).attr('src'))
    });

    /**show user account sections **/
    $('aside ul li').click(function(){
        $(this).addClass('active').siblings().removeClass('active');
        $($(this).children('a').data('value')).siblings('section').css('display', 'none');
        $($(this).children('a').data('value')).css('display', 'inline-block');
    });

});