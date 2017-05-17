$(function(){


        $(".paimai .pai li").click(function(){


                $(this).addClass("cur").siblings().removeClass("cur")


                var i=$(this).index();

                $(".paimai .mai li").eq(i).show().siblings().hide();


        })
















})