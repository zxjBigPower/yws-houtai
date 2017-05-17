$(document).ready(function()
    {
    
    $('body').on("click",'.heart',function()
    {
        
        var A=$(this).attr("id");
        var B=A.split("like");
        var messageID=B[1];
        $(this).css("background-position","")
        var D=$(this).attr("rel");
        var msg = ['关注','取关'];

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


    });

