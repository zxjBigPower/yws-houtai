$(function(){


        $(".weikuan .zhifu li").click(function(){
            $(this).addClass("cu").siblings().removeClass("cu");


            var i=$(this).index();

            $(".weikuan .contant li").eq(i).show().siblings().hide()

        })



        $(".weikuan .contant .kuaisu .fu").click(function(){

            $(this).addClass("cur").siblings().removeClass("cur");

            var b=$(this).index();

                $(".weikuan .contant li .jin p").eq(b).show().siblings().hide()


        })



        $(".inzhaopian div.right i").click(function(){

            $(this).parents(".inzhaopian").hide();


        })






})