$(function(){

            $(".bangzhu .bang li").click(function(){

                    $(this).addClass("cu").siblings().removeClass("cu")


                var i=$(this).index();

                    $(".bangzhu .guize li").eq(i).show().siblings().hide();

            })








})