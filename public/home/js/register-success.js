/**
 * Created by Administrator on 2017/5/12.
 */
$(function () {
    var hash=location.hash;
    //console.log(hash);
    hash=hash.slice(8);
    //console.log(hash);
    $("#uuname").html(hash);
})