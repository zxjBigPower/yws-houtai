/**
 * Created by Administrator on 2017/5/12.
 */
$(function () {
    var txtUname,txtCon,txtV,txtSetting,txtConfim,flag1=false,flag2=false,timer,timee=60;
    var _token = $('input[name=_token]').val();
    var flag_name = false,flag_bcode = false,phone='',send_code=false,flag_code= false,flag_pass = false;

    //值操作
    $("#uname").focus(function () {
        //先保存值
        txtUname= $(this).val();
        //console.log($(this));
        //置空
        $(this).val("");
        $("#u-alert").css("display","block");
        //console.log($(this).val());
    }).blur(function () {
        //如果为空则恢复原值
        if($(this).val()==""){
            $(this).val(txtUname);
        }
        $("#u-alert").css("display","none");
//检查用户名或号码
        $.post('/findpassworld',{'name':$(this).val(),'_token':_token},function(data){
            console.log(data);
            if(data.status==200){
                $("#u-alert").css("display","none");
                phone=data.phone;
                $('#showphone').html(data.msg);
                //console.log('name.gou');
                flag_name = true;
            }else{
                $("#u-alert").css("display","block");
                $("#u-alert").css("color","red");
                $("#u-alert").html(data.msg);
                flag_name = false;
            }
        },'json');

    }).on("keyup",function () {
        if($(this).val()==""){
            $("#u-alert").css("display","block");
        }else{
            $("#u-alert").css("display","none");
        }
    });
//点击换图
    $('#changecode').click(function(){
        console.log($('#imgcode').attr('src'));
        $('#imgcode').attr('src',$('#imgcode').attr('src')+'?'+(new Date()).getTime());
    });

    //验证码验证
    $('#info').bind('blur keyup',function(){
        var pcode = $('#info').val();
        if(pcode.match(/\w{4}/)){
            $.post('/pcode',{'pcode':pcode,'_token':_token},function(data){
                if(data.status == 200){

                    $('#confirmation').css('border-color','#ddd');

                    flag_bcode = true;
                }else if(data.status == 400){

                    $('#confirmation').css('border-color','red');
                    /*$('#pcode-filed').html(data.msg);
                    $('#pcode-filed').css('display','block');*/
                    flag_bcode = false;
                }else{
                    console.log('error');
                }
                //console.log(data.status);
            },'json');
        }else{
            /*$('#pcode-success').css('display','none');
            $('#authCode').css('border-color','red');
            $('#pcode-filed').html('格式错误');
            $('#pcode-filed').css('display','block');*/
            flag_bcode = false;
        }
    });
   /* $("#info").focus(function () {
        txtCon=$(this).val();
        $(this).val(" ");
    }).blur(function () {
        if($(this).val()==" "){
            $(this).val(txtCon);
        }
    })*/
   focusBlur($("#info"),txtCon);
    //切换到第二页
    $("#submit1").on("click",function () {
        if( flag_bcode && flag_name){
            $(".confim-1").css("display","none");
            $(".confim-2").css("display","block");
            $(".findpsw-line-2").addClass("finishc")
        }
    })
    //第二页判断
    focusBlur($("#v-number"),txtV);
    focusBlur($("#setting"),txtSetting);
    focusBlur($("#confim"),txtConfim);
    //重新获取按钮


//发送手机验证码
    var send_code = true,sum=1;
    $("#send_code,#submit1").click(function () {
        var phone_val = $('#unum').val();
        if (send_code == false) {
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
            url:'/sendCode',
            dataType:'json',
            type:'get',
            data:{'phone':phone},
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
    $('#v-number').keyup(function(){
        var code=$('#v-number').val();
        if(code.match(/\d{4}/) ){
                $.ajax({
                    url:'/checkPhoneCode',
                    dataType:'json',
                    type:'get',
                    data:{code:code,phone:phone},
                    success:function (data) {
                        //console.log(data);
                        if(data.status == 200){
                            $('.confim-2').css('border-color','#ddd');
                            flag_code = true;
                        }else if(data.status == 401){
                            alert(11);
                            $('.confim-2').css('border-color','red');
                            flag_code = false;
                            console.log(data.msg);
                        }else if(data.status == 400){
                            $('.confim-2').css('border-color','red');
                            console.log(data.msg);
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
            $('.confim-2').css('border-color','red');
            flag_code = false;
        }

    });
    //第二页切换点击
    $("#submit2").on("click",function () {
        if(!$("#confim").val()){
            flag_pass = false;
            console.log(flag_pass+11+'a');
            $('#setting-psw').css('border-color','red');
            return;
        }
        if($("#confim").val() !== $("#setting").val()){
            flag_pass = false;
            console.log(flag_pass+22+'b');
            $("#alert-un").css("display","block");
            return;
        }else {
            flag_pass = true;
            $('#setting-psw').css('border-color','#ddd');
            $("#alert-un").css("display","none");
        }
        if(flag_pass && flag_code){
            console.log(flag_pass);
            $.ajax({
                url:'changpass',
                data:{'_token':_token,'phone':phone,'password':$("#confim").val()},
                dataType:'json',
                type:'post',
                success:function(data){
                    console.log(data);
                    if(data.status==200){
                        $(".confim-2").css("display","none");
                        $(".confim-3").css("display","block");
                        $(".findpsw-line-3").addClass("finishc")
                    }else{
                        console.log(data);
                    }
                },
                error:function(msg){console.log(msg);}
            });
        }
    });


    /*
    * selector:控制对象 txt:存值变量
    * 功能：获得焦点显示，失去焦点隐藏
    * */
    function focusBlur(selector,txt) {
        selector.focus(function () {
            txt=$(this).val();
            $(this).val("");
        }).blur(function () {
            if($(this).val()==""){
                $(this).val(txt);
            }
        })
        txt="";
    }

})