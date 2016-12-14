$(window).scroll(function(){  
    if ($(window).scrollTop()>100){
        $("#back-to-top").fadeIn(1500);
    }
    else
    {
        $("#back-to-top").fadeOut(1500);
    }
});
$("#back-to-top").click(function(){
    $('body,html').animate({scrollTop:0},1000);
    return false;
});
$(function() {
    $(".btn").click(function(){
        $(this).button('提交中……').delay(1000).queue(function() {
        });
    });
});