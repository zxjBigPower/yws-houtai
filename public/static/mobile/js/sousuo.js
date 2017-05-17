$(function(){

        $(".seach .seachone li").click(function(){


                    $(this).addClass("cu").siblings().removeClass("cu");

                    var i=$(this).index();


                    $(".seach .seachtwo li").eq(i).show().siblings().hide();




        })


        $(".seach .seachtwo .qingkong").click(function(){


                $(".seach .seachtwo .jilus").hide()




        })









})