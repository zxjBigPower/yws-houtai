/**
 * Created by Administrator on 2017/5/2.
 */
$(function () {
    Caroursel.init($('#caroursel'));
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
        $("#nav-ul>li:eq(0)").children("a").addClass("hover");
    })
})