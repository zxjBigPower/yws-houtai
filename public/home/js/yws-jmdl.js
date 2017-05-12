/**
 * Created by Administrator on 2017/5/10.
 */
$(function () {
    /*nav 鼠标经过有滑动效果*/
    $("#nav-ul>li").mousemove(function () {
        for(var i=0; i< $("#nav-ul>li").length;i++ ){
            $("#nav-ul>li").children("a").removeClass("hover");
        }
        $(this).children("a").addClass("hover");
    }).mouseout(function () {
        for(var i=0; i< $("#nav-ul>li").length;i++ ){
            $("#nav-ul>li").children("a").removeClass("hover");
        }
        $("#nav-ul>li:eq(3)").children("a").addClass("hover");
    })
    /*轮播图部分*/
    $('.flexslider').flexslider({
        directionNav: true,
        pauseOnAction: false
    });
})