$(function(){

            $(".fuwu .fuwuone li").click(function(){
                $(this).addClass("cu").siblings().removeClass("cu")


                    var i=$(this).index();

                    $(".fuwu .fuwutwo li").eq(i).show().siblings().hide();


            })








})