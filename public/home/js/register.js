/**
 * Created by Administrator on 2017/5/12.
 */
$(function () {
    var txtUname,txtSet,txtMob,txtCon,txtMoc;

    focusBlur($("#uname"),txtUname);
    focusBlur($("#upsw"),txtSet);
    focusBlur($("#unum"),txtMob);
    focusBlur($("#ucon"),txtCon);
    focusBlur($("#umoc"),txtMoc);
/*    $("#submit").on("click",function () {
        //console.log($("#isAgree").attr("checked"));
        if($("#uname").val()!=" " && $("#uname").val() != "您的账户名或登录名" &&
            $("#upsw").val()!=" " && $("#upsw").val() != "建议使用至少两种字符组合" &&
            $("#unum").val()!=" " && $("#unum").val() != "建议使用常用手机" &&
            $("#ucon").val()!=" " && $("#ucon").val() != "请输入验证码" &&
            $("#umoc").val()!=" " && $("#umoc").val() != "请输入手机验证码" &&
            $("#isAgree").attr("checked")=="checked"){
            var uname=$("#uname").val();
            uname="register-success.html#uname=" + uname;
            //console.log(uname);
            $(this)[0].href=uname;
        }
    });*/

    /*
     * selector:控制对象 txt:存值变量
     * 功能：获得焦点显示，失去焦点隐藏
     * */
    function focusBlur(selector,txt) {
        selector.focus(function () {
            $(this).siblings("div").css("display","block");
            $(this).siblings("i").css("display" ,"block");
            txt=$(this).val();
            $(this).val("");
        }).blur(function () {
            $(this).siblings("div").css("display","none");
            $(this).siblings("i").css("display" ,"none");
            if($(this).val()==""){
                $(this).val(txt);
                txt="";
            }
        })
    }


    //标识
    var flag=false,flag_name=false,flag_phone=false,flag_pass=false,flag_code=false,send_code = false,flag_bcode=false,is_arrge=true;
    var _token = $('input[name=_token]').val();

    function ispass()
    {
        //console.log('nopass');
        if(flag_name && flag_phone && flag_pass && flag_code  && is_arrge && flag_bcode){
            $('#submit').css('background-color','green');
            //console.log('ispass');
            flag = true;
        }else{
            $('#submit').css('background-color','#AAAAAA');
            //console.log('ispass');
            flag = false;
        }
    }
// 阅读验证
    $('#isAgree').click(function(){
        //console.log(this.checked);
        if(!this.checked){
            is_arrge = false;
        }else{
            is_arrge = true;
        }
    });

//用户名验证

    $('#uname').bind('keyup blur',function(){
        var uname = $('#uname').val();
        if(uname.match(/((?=.*[a-z])|(?=.*\d)|(?=.*[#@!~%^&*]))[a-z\d#@!~%^&*]{4,20}/i)){
            $.ajax({
                type:'post',
                url:'register',
                data:{'username':uname,'_token':_token},
                dataType:'json',
                success:function(data){
                    //console.log(data);
                    if(data.status==200){
                        $('#zc-success').css('display','block');
                        $('#zc-filed').css('display','none');
                        $('#userName').css('border-color','#ddd')
                        flag_name = true;
                        ispass();
                    }else if(data.status==400){
                        $('#zc-filed').html('用户名已被注册');
                        $('#zc-filed').css('display','block');
                        $('#zc-success').css('display','none');
                        $('#userName').css('border-color','red')
                        flag_name = false;
                    }

                },
                error:function(msg){
                    console.log(msg);
                    flag_name = false;
                }
            });
        }else{
            $('#zc-filed').html('请输入正确的格式');
            $('#zc-filed').css('display','block');
            $('#zc-success').css('display','none');
            $('#userName').css('border-color','red');
            flag_name = false;
        }
        //console.log(uname);
    });

//验证密码
    $('#upsw').bind('keyup blur',function(){
        var psw = $('#upsw').val();
        if(psw.match(/((?=.*[a-z])(?=.*\d)|(?=[a-z])(?=.*[#@!~%^&*])|(?=.*\d)(?=.*[#@!~%^&*]))[a-z\d#@!~%^&*]{6,20}/i)){
            $('#psw-success').css('display','block');
            $('#psw-filed').css('display','none');
            $('#setPsw').css('border-color','#ddd');
            ispass();
            flag_pass = true;
        }else{
            $('#psw-filed').html('请输入正确的格式');
            $('#psw-filed').css('display','block');
            $('#psw-success').css('display','none');
            $('#setPsw').css('border-color','red');
            flag_pass = false;
        }
    });



//表单手机号匹配
    var unum = document.getElementById('unum');
    unum.oninput=function (){
        this.value = this.value.replace(/\D/g,'');
        //this.value =this.value.replace(/(\d{3})(?=\d)/g,'$1 ');
    };
//手机号普安段
    $('#unum').bind('blur keyup',function(){
        var sMobile=$('#unum').val();

        if((/^1(3|4|5|7|8)\d{9}$/.test(sMobile))){
            //请求ajax判断手机号是否已经存在
            $.ajax({
                type:'post',
                url:'register',
                data:{'phone':sMobile,'_token':_token},
                dataType:'json',
                success:function(data){
                    //console.log(data);
                    if(data.status==200){
                        $('#mobile-success').css('display','block');
                        $('#mobile-filed').css('display','none');
                        $('#mobNum').css('border-color','#ddd')
                        flag_phone = true;
                        ispass();
                    }else if(data.status==400){
                        $('#mobile-filed').html('该手机号被注册');
                        $('#mobile-filed').css('display','block');
                        $('#mobile-success').css('display','none');
                        $('#unum').css('border-color','red')
                        flag_phone = false;
                    }

                },
                error:function(msg){
                    console.log(msg);
                    flag_phone = false;
                }
            });
        }else{
            $('#mobile-filed').html('请输入正确手机号格式');
            $('#mobile-filed').css('display','block');
            $('#mobile-success').css('display','none');
            $('#mobNum').css('border-color','red');
            flag_phone = false;
            //console.log(sMobile);
        }
    });

// 验证图片验证码
    $('#ucon').bind('blur keyup',function(){
        var pcode = $('#ucon').val();
        if(pcode.match(/^\w{4}$/)){
            $.post('pcode',{'pcode':pcode,'_token':_token},function(data){
                if(data.status == 200){
                    $('#pcode-success').css('display','block');
                    $('#authCode').css('border-color','#ddd');
                    $('#pcode-filed').css('display','none');
                    flag_bcode = true;
                    ispass();
                }else if(data.status == 400){
                    $('#pcode-success').css('display','none');
                    $('#authCode').css('border-color','red');
                    $('#pcode-filed').html(data.msg);
                    $('#pcode-filed').css('display','block');
                    flag_bcode = false;
                }else{
                    console.log('error');
                }
                //console.log(data.status);
            },'json');
        }else{
            $('#pcode-success').css('display','none');
            $('#authCode').css('border-color','red');
            $('#pcode-filed').html('格式错误');
            $('#pcode-filed').css('display','block');
            flag_bcode = false;
        }
    });


//发送手机验证码
    var send_code = true,sum=1;
    $("#send_code").click(function () {
        var phone_val = $('#unum').val();
        if (send_code == false) {
            return;
        }
        //获取电话号码
        var phone_val = $('#unum').val();
        //判断是否为空
        if (!flag_phone) {
            alert('请确认手机号是否正确');
            return;
        }
        send_code = false;
        var num = 90;
        if(sum>2){
            num = 120;
        }
        var timer = setInterval(function () {
            $("#send_code").html(num+'s后重新发送');
            $("#send_code").css('color', 'red');
            $("#send_code").css('font-size', '12px');
            if (num == 0) {
                send_code = true;
                clearInterval(timer);
                ++sum;
                $("#send_code").html('重新发送');
                $("#send_code").css('color', 'green');
            }
            num --;
        }, 1000);
        $.ajax({
            url:'sendCode',
            dataType:'json',
            type:'get',
            data:{'phone':phone_val},
            success:function (data) {
                console.log(data);
                if (data.status == 200) {
                    alert('发送成功');
                    send_code = true;
                    return;
                }else if(data.msg=='Frequency limit reaches.'){
                    alert('发送已达上行限');
                    send_code = false;
                }else{
                    console.log(data.msg);
                    send_code = false;
                }
            },
            error:function (xhr, status, error) {
                console.log(xhr);
                console.log(status);
                console.log(error);
                send_code = false;
            }
        })
    });

//        判断验证码是否正确
    $('#umoc').keyup(function(){
        var code=$('#umoc').val();
        var phone=$('#unum').val();
        console.log(flag_phone);
        if(code.match(/^\d{4}$/) ){
            if(flag_phone){
                $('#mobAuth').css('border-color','#ddd');
                $('#getcode-filed').css('display','none');
                $.ajax({
                    url:'checkPhoneCode',
                    dataType:'json',
                    type:'get',
                    data:{code:code,phone:phone},
                    success:function (data) {
                        //console.log(data);
                        if(data.status == 200){
                            $('#getcode-success').css('display','block');
                            $('#mobAuth').css('border-color','#ddd');
                            flag_code = true;
                            ispass();
                        }else if(data.status == 401){
                            $('#getcode-success').css('display','none');
                            $('#mobAuth').css('border-color','red');
                            $('#getcode-filed').html(data.msg);
                            $('#getcode-filed').css('display','block');
                            flag_code = false;
                        }else if(data.status == 400){
                            $('#getcode-success').css('display','none');
                            $('#mobAuth').css('border-color','red');
                            $('#getcode-filed').html(data.msg);
                            $('#getcode-filed').css('display','block');
                            flag_code = false;
                        }else{
                            flag_code = false;
                            alert('请稍后再试')
                        }
                    },
                    error:function (xhr, status, error) {
                        console.log(xhr);
                        console.log(status);
                        console.log(error);
                        flag_code=false;
                    }
                });
            }else{
                $('#getcode-filed').html('请输入手机号');
                $('#getcode-filed').css('display','block');
                $('#getcode-success').css('display','none');
                $('#mobAuth').css('border-color','red')
                flag_code = false;
            }

        }else{
            $('#getcode-filed').html('格式不正确');
            $('#getcode-filed').css('display','block');
            $('#getcode-success').css('display','none');
            $('#mobAuth').css('border-color','red')
            flag_code = false;
        }

    });


    $('#registerForm').submit(function(){
        return flag;
    });

});