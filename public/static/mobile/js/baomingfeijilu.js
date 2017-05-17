$(function(){


$(".jilu .jiluone li").click(function(){


$(this).addClass("cu").siblings().removeClass("cu");

var i=$(this).index();


$(".jilu .dingdan li").eq(i).show().siblings().hide();

})







})