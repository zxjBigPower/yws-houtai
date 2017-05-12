$(function(){
//标识
    var falg=false;
    var phone_val=false;
//表单用户名匹配
    var r_username = document.getElementById('r_username');
    r_username.oninput=function (){
//            console.log(222);
        this.value = this.value.replace(/\D/g,'');
        this.value =this.value.replace(/(\d{3})(?=\d)/g,'$1 ');
    };

    $('input[name=r_username]').keyup(function(){
        var val=$('input[name=r_username]').val();
        if(val.length=='14'){
            $('#login_mes').html('');
            var val=$('input[name=r_username]').val();
//                var p_name = 'p_name='+val;
            //请求ajax判断手机号是否已经存在
            $.ajax({
                type:'get',
                url:"{{url('user/checkregister')}}",
                //                dataType:'string',
                data:{p_name:val},
                success:function(data){
//                        console.log(data);
                    if(data=='1'){
//                            console.log(data);
                        $('#login_mes').html('');
                        $('.index_register_check').html('√');
                        $('.index_register_check').css('color','darkgreen');
                        falg=true;
                        phone_val=true;
                    }else if(data=='2'){
//                            console.log(data);
                        $('#login_mes').html('该手机号已经注册!!!');
                        falg=false;
                        phone_val=false;
                    }
                }
            });
        }else{
            $('.index_register_check').html('');
            $('#login_mes').html('请输入11位手机号!!!');
            falg=false;
            phone_val=false;
        }
    }).focus(function (){
        var val=$('input[name=r_username]').val();

        if(val.length=='14'){
            falg=true;
            $('#login_mes').html('');
        }else{
            $('#login_mes').html('请输入11位手机号!!!');
            falg=false;
        }
    });

//发送手机验证码
    var flag = true;
    $("#send_code").click(function () {
        if (flag == false) {
            return;
        }
        //获取电话号码
        var phone = $("input[name=r_username]").val();
        //判断是否为空
        if (!phone_val) {
            alert('请检查手机号是否符合要求');
            return;
        }
        flag = false;
        var num = 60;
        var timer = setInterval(function () {
            $("#send_code").val(num+'s后重新发送');
            $("#send_code").css('color', 'red');
            $("#send_code").css('font-size', '12px');
            if (num == 0) {
                flag = true;
                clearInterval(timer);
                $("#send_code").val('重新发送');
                $("#send_code").css('color', 'green');
            }
            num --;
        }, 1000);
        $.ajax({
            url:"{{url('user/register_send_code')}}",
            dataType:'json',
            data:{phone:phone},
            success:function (data) {
                if (data == null) {
                    alert('服务器繁忙');
                    return;
                }
                if (data.status != 0) {
                    alert(data.message);
                    return;
                }
                alert('发送成功');
            },
            error:function (xhr, status, error) {
                console.log(xhr);
                console.log(status);
                console.log(error);
            }
        })
    });

//        判断验证码是否正确
    $('input[name=index_checkcode]').keyup(function(){
        var code=$('input[name=index_checkcode]').val();
        var phone=$('input[name=r_username]').val();
        $.ajax({
            url:"{{url('user/checkcode')}}",
//                dataType:'json',
            type:'get',
            data:{code:code,phone:phone},
            success:function (data) {
//                    alert(data);
                if(data==1){
                    $('#login_mes_p3').html('通过');
                    falg=true;
                }else if(data==2){
                    $('#login_mes_p3').html('验证码已过期');
                    falg=false;
                }else{
                    $('#login_mes_p3').html('验证码错误');
                    falg=false;
                }
            },
            error:function (xhr, status, error) {
                console.log(xhr);
                console.log(status);
                console.log(error);
                falg=false;
            }
        });
    });

    //验证密码
    $('input[name=r_password]').focus(function(){
        var val=$('input[name=r_password]').val();
        if(!val.match(/^\w{6,18}$/)){
            $('.index_register_check1').html('')
            $('#login_mes_p1').html('请输入6-18位数字,字母,下划线!!!');
            falg=false;
        }
    }).keyup(function (){
        var val=$('input[name=r_password]').val();
        var val_r=$('input[name=re_password]').val();
        console.log(val,val_r);
        if(val_r!='' && val!=val_r){
            $('.index_register_check2').html('');
            $('#login_mes_p2').html('两次密码不一致!!!');
            falg=false;
        }else if(val==val_r){
            $('#login_mes_p2').html('');
            $('.index_register_check2').html('√');
            $('.index_register_check2').css('color','darkgreen');
            falg=true;
        }
        if(!val.match(/^\w{6,18}$/)){
            $('.index_register_check1').html('')
            $('#login_mes_p1').html('请输入6-18位数字,字母,下划线!!!');
            falg=false;
        }else{
            $('#login_mes_p1').html('');
            $('.index_register_check1').html('√');
            $('.index_register_check1').css('color','darkgreen');
            falg=true;
        }
    });
    //验证第二次密码
    $('input[name=re_password]').focus(function(){
        var val=$('input[name=re_password]').val();
        var rval=$('input[name=r_password]').val();
        if(val!=rval){
//                console.log(val,rval);
            $('.index_register_check2').html('');
            $('#login_mes_p2').html('两次密码不一致!!!');
            falg=false;
        }
    }).keyup(function (){
        var val=$('input[name=re_password]').val();
        var rval=$('input[name=r_password]').val();
        if(val!=rval){
//                console.log(val,rval);
            $('.index_register_check2').html('');
            $('#login_mes_p2').html('两次密码不一致!!!');
            falg=false;
        }else{
//                console.log(val,rval);
            $('#login_mes_p2').html('');
            $('.index_register_check2').html('√');
            $('.index_register_check2').css('color','darkgreen');
            falg=true;
        }

    });



    $('#user_register').submit(function(){
        console.log(falg);
        var n =$('#r_username').val();
        var p =$('input[name=r_password]').val();
        var c =$('input[name=index_checkcode]').val();
        if(n==''||p==''||c==''){
            return false;
        }
        return falg;
    });

});