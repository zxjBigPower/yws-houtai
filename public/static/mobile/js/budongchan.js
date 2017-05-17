$(function(){

    $(".tiaojian .tiao li").click(function(){


            $(this).children(".tiao li .xuan").show().parent().siblings("li").children(".tiao li .xuan").hide()
     



    })






$(".chengshi .sheng li").click(function(){

    $(this).addClass("qian").siblings().removeClass("qian")

    var i=$(this).index();
    $(".chengshi .shi li").eq(i).show().siblings().hide();


})

$(".chengshi .sheng li").click(function(){

    $(this).addClass("qian").siblings().removeClass("qian")

    var i=$(this).index();
    $(".chengshi .jiage li").eq(i).show().siblings().hide();


})


$(".chengshi .sheng li").click(function(){

    $(this).addClass("qian").siblings().removeClass("qian")

    var i=$(this).index();
    $(".chengshi .jian li").eq(i).show().siblings().hide();


})

$(".chengshi .sheng li").click(function(){

    $(this).addClass("qian").siblings().removeClass("qian")

    var i=$(this).index();
    $(".chengshi .zhuangtai li").eq(i).show().siblings().hide();


})


$(".chengshi .shouqi").click(function(){


    $(".tiaojian .tiao li .xuan").hide(1)


})






$(".tiaojian .tiao li.saixuan").click(function(){


    $(".shaixuan").animate({
                    left:"50%",
                    marginLeft:"-4rem"});

})


$(".shaixuan .left").click(function(){


    $(".shaixuan").animate({
                    left:"100%",
                    marginLeft:"0rem"});

})


$(".shaixuan .right li").click(function(){

    $(this).addClass("cu").siblings().removeClass("cu")





})

$(".wancheng div.cheng").click(function(){


    $(".shaixuan").animate({
                    left:"100%",
                    marginLeft:"0rem"});

})

$(".wancheng div.zhi").click(function(){

    $(".shaixuan .right li").removeClass("cu")





})




})