$(function(){


        $(".yikoujia .yikou li").click(function(){


                $(this).addClass("cu").siblings().removeClass("cu")


                var i=$(this).index();

                $(".yikoujia .jia li").eq(i).show().siblings().hide();


        })
















})