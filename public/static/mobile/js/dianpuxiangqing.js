$(document).ready(function()
   
    {
    $('body').on("click",'.heart',function()
    {
        
        var A=$(this).attr("id");
        var B=A.split("like");
        var messageID=B[1];
        $(this).css("background-position","")
        var D=$(this).attr("rel");
        var msg = ['关注店铺','取消关注'];

        if(D === 'like') 
        {      
        $("#likeCount"+messageID).html(msg[1]);
        $(this).addClass("heartAnimation").attr("rel","unlike");
        $(this).addClass("hearts")
        
        }
        else
        {
        $("#likeCount"+messageID).html(msg[0]);
        $(this).removeClass("heartAnimation").attr("rel","like");
        $(this).removeClass("hearts")


        }


    });


        $(".fuwu .fuwutwo .lists div").click(function() {
                    
                $(this).addClass("current").siblings().removeClass("current")

            var i=$(this).index();


            $(".fuwu .fuwutwo .lun .pinglun").eq(i).show().siblings().hide();


        })


         $(".fuwu .fuwutwo .lists div").click(function() {
                    
                $(this).addClass("current").siblings().removeClass("current")

            var i=$(this).index();


            $(".fuwu .fuwutwo .pin .chanpin").eq(i).show().siblings().hide();


        })










    });

