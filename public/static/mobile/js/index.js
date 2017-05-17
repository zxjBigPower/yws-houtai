$(function(){


$(".paimai .pai li").click(function(){


var i=$(this).index();

$(".paimai .mai li").eq(i).show().siblings().hide();


})




$(".paimai .pai li:nth-child(1)").click(function(){

   $(this).addClass("cur").siblings().removeClass("cur");
   $(this).find("i").css("background-image","url(./static/mobile/images/icon/j1.png)");
   $(".paimai .pai li:nth-child(2)").find("i").css("background-image","url(./static/mobile/images/icon/j22.png)");


})

$(".paimai .pai li:nth-child(2)").click(function(){

   $(this).addClass("cur").siblings().removeClass("cur");
   $(this).find("i").css("background-image","url(./static/mobile/images/icon/j2.png)");
  $(".paimai .pai li:nth-child(1)").find("i.one").css("background-image","url(./static/mobile/images/icon/j11.png)");
   // $(".paimai .pai li:nth-child(2)").find("i").css("background-image","url(images/icon/j2.png)");

})

$(".paimai .pai li:nth-child(3)").click(function(){

   $(this).addClass("cur").siblings().removeClass("cur");
   $(".paimai .pai li:nth-child(1)").find("i.one").css("background-image","url(./static/mobile/images/icon/j11.png)");
   $(".paimai .pai li:nth-child(2)").find("i").css("background-image","url(./static/mobile/images/icon/j22.png)");


})






            $("div.head .kefu .inkefu").click(function(){

                    $(".lianxi").show();

            })

             $(".lianxi ul li.last").click(function(){

                    $(".lianxi").hide();

            })



            $(".lianxi ul li.bangzhu").click(function(){

                    $(".lianxi").hide();
                    $(".rexian").show();


            })
            $(".rexian .boda .quxiao").click(function(){

                    $(".lianxi").hide();
                    $(".rexian").hide();


            })













})