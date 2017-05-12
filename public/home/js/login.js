/**
 * Created by Administrator on 2017/5/11.
 */
$(function () {
    var flag = false;
    $("#submit").click(function () {

        /*console.log($("#info").val());
        console.log($("#username").find("input").val());
        console.log($("#psw").find("input").val());
        console.log($("#login-checkbox").find("input").val());*/
        var uname=$("#username").find("input").val();
        var psw=$("#psw").find("input").val();
        var checking=$("#login-checkbox").find("input").val();
        var captcha =$("#checking").find("input").val();
        if(!uname||!psw){
            flag = false;
        }else{
            flag = true;
        }
        if(uname==""&&psw==""){
            $("#username,#psw").css("border-color",'red');
            $("#username>.login-alert").css("display","block").html("请输入账户名和密码");
            return ;
        }else{
            $("#username,#psw").css("border-color",'#ddd');
            $("#username>.login-alert").css("display","none").html("");
        }
        if(uname==""){
            $("#username").css("border-color",'red');
            $("#username>.login-alert").css("display","block").html("请输入账户名");
            return ;
        }else{
            $("#username").css("border-color",'#ddd');
            $("#username>.login-alert").css("display","none").html("");
        }
        if(psw==""){
            $("#psw").css("border-color",'red');
            $("#username>.login-alert").css("display","block").html("请输入密码");
            return ;
        }else{
            $("#psw").css("border-color",'#ddd');
            $("#username>.login-alert").css("display","none").html("");
        }

        if(flag){
            //var data = {'data':$('#info').serialize()};
            //var url = {{url('login')}};
            //console.log(data);
            $.ajax({
                url:'login',
                type:'post',
                //dataType:'json',
                data:$('#info').serialize(),
                success:function(data){
                    var data = JSON.parse(data);
                    $("#checking").css("border-color",'#ddd');
                    $("#username>.login-alert").css("display","none").html("");
                    if(data.status==400){
                        $("#username,#psw").css("border-color",'red');
                        $("#username>.login-alert").css("display","block").html(data.msg);
                        console.log(data.msg);
                    }else if(data.status==200){
                        $("#username,#psw").css("border-color",'#ddd');
                        $("#username>.login-alert").css("display","none").html('');
                        alert(data.msg);
                    }
                },
                error:function(msg,data){
                    var json = JSON.parse(msg.responseText);
                    if(msg.responseText){
                        $("#checking").css("border-color",'red');
                        $("#username>.login-alert").css("display","block").html(json['captcha'][0]);
                    }
                    console.log(json['captcha'][0]);
                }
            });
        }
    });
})