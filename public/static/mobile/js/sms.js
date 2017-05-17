/**
 * 手机号  #phonenum
 * 发送按钮 .sendSmS
 * @param name
 * @returns {null}
 */
//获取cookie
$url = location.href;
function getCookie(name) {
    var arr = document.cookie.match(new RegExp("(^| )" + name + "=([^;]*)(;|$)"));
    if (arr != null) {
        return unescape(arr[2]);
    } else {
        return null;
    }
}
//设置cookie
function setCookie(name, value, expiresHours) {
    var cookieString = name + "=" + escape(value);
    if (expiresHours > 0) {
        var date = new Date();
        date.setTime(date.getTime() + expiresHours * 1000);
        cookieString = cookieString + ";path=/;expires=" + date.toGMTString()
    }
    document.cookie = cookieString;
}
//修改cookie的值
function editCookie(name, value, expiresHours) {
    var cookieString = name + "=" + escape(value);
    if (expiresHours > 0) {
        var date = new Date();
        date.setTime(date.getTime() + expiresHours * 1000); //单位是毫秒
        cookieString = cookieString + ";path=/;expires=" + date.toGMTString();
    }
    document.cookie = cookieString;
}
//    editCookie('name','22222',60);
//    console.log(getCookie('name'))

$(function () {
    $(".sendSmS").click(function () {
        sendCode($(".sendSmS"));
    });
    v = getCookie($url);//获取cookie值
    if (v > 0) {
        settime($(".sendSmS"));//开始倒计时
    }
})
//发送验证码
function sendCode(obj) {
    var phonenum = $("#phonenum").val();
    var result = isPhoneNum();
    if (result) {
        doPostBack('/sendSms', backFunc1, {"phone": phonenum});
        setCookie($url, 60, 60);//添加cookie记录,有效时间60s
        settime(obj);//开始倒计时
    }
}
//将手机利用ajax提交到后台的发短信接口
function doPostBack(url, backFunc, queryParam) {
    $.ajax({
        async: false,
        cache: false,
        type: 'POST',
        url: url,// 请求的action路径
        data: queryParam,
        error: function () {// 请求失败处理函数
        },
        success: backFunc
    });
}
function backFunc1(data) {
    console.log(data)
    if (!data.success) {
        layer.open({content: data.msg, skin: 'msg', time: 2});
    } else {
        layer.open({content: data.msg, skin: 'msg', time: 2});
    }
}
//开始倒计时
var countdown;
function settime(obj) {
    countdown = getCookie($url);
    console.log(countdown)
    if (countdown ==null) {
        obj.removeAttr("disabled");
        obj.html("点击发送");
        return;
    } else {
        obj.attr("disabled", true);
        // obj.css("font-size",13);
        obj.html("重新发送(" + countdown + ")");
        countdown--;
        editCookie($url, countdown, countdown + 1);
    }
    setTimeout(function () {
        settime(obj)
    }, 1000); //每1000毫秒执行一次
}
//校验手机号是否合法
function isPhoneNum() {
    var phonenum = $("#phonenum").val();
    var myreg = /^(((13[0-9]{1})|(14[0-9]{1})|(15[0-9]{1})|(18[0-9]{1})|(17[0-9]{1}))+\d{8})$/;
    if (!myreg.test(phonenum)) {
        layer.open({content: '请输入正确的手机号码', skin: 'msg', time: 2});
        return false;
    } else {
        return true;
    }

}