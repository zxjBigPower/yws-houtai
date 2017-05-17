/*
* 云服务
* */
// var WEB_SOCKET_SWF_LOCATIOIN = "/static/wm/default/WebSocketMain.swf";
var WEB_SOCKET_DEBUG = true;
var WEB_SOCKET_SUPPRESS_CROSS_DOMAIN_SWF_ERROR = true;

var wm = {
    appName:'wm',
    initUrl:'/wm/init',
    sendMessageUrl:'/wm/sendMsg',
    bindUrl:'/wm/bindUrl',
    address:'ws://'+document.domain+':8282',
    inited:false,
    socket:null,
    productId:null,
    jq:null,
    open : function() {
        if(!this.jq) this.jq = jQuery;
        this.connectWorkerman();
    },
    connectWorkerman:function () {
        wm.socket = new WebSocket(wm.address);
        wm.socket.onopen = function () {
            wm.socket.send(JSON.stringify({type:'init'}));
        };
        wm.socket.onmessage = function (e) {
            var msg = JSON.parse(e.data);
            console.log(msg)
            switch (msg.message_type){
                case 'init':
                    wm.jq.ajax({
                        type:'POST',
                        url:wm.bindUrl,
                        cache:false,
                        data:{client_id:msg.client_id,pid:wm.productId},
                        dataType:"json",
                        success:function (data) {
                            console.log(data)
                            if (data.code ==0) {
                                wm.initWM();
                            }else{
                                console.log('wm 服务端返回失败：' + data.msg);
                            }
                        }
                    });
                    return;
                case 'changeList'://刷新出价列表
                    var d = wm.jq('.dynamic .zhuangtai');
                    d.next().children('.cj').removeClass('cj').addClass('sb').text('出局')
                    var status = msg.status?'cj':'sb';
                    d.after("<dl><dd class="+status+">领先</dd><dd>"+msg.bh+"</dd><dd style='width: 150px;margin-right: 0px'>"+msg.price+"</dd><dd>"+msg.time+"</dd></dl>");
                    layer.msg('编号:'+msg.bh+"出价"+msg.price+"元");
                    wm.jq('meta[name="curprice"]').attr('content',msg.curprice);
                    return;
                case 'changeTake':
                    $('.seach.take').after("<div class='jiaoliu'><p>"+msg.content+"</p>" +
                        "<div class='riqi'><strong>"+msg.nickname+"</strong><br/>" +
                        "<span>"+msg.time+"</span><br/></div>");
                    return;
            }
        }
    },sendHeartbeat : function() {
        if(this.socket && this.socket.readyState == 1) {
            this.socket.send(JSON.stringify({type :'ping'}));
        }
    },
    initWM:function () {
        if(this.inited) {
            return;
        }
        this.inited = true;
        setInterval('wm.sendHeartbeat()', 20000);
    },
    chujia:function (v) {
        var price = $("input[name=price]").val();
        data = {price:price}
        wm.jq.ajax({
            url:v,
            type:'post',
            dataType:'json',
            data:data,
            cache:false,
            success:function (result) {
                if (!result.code) {
                    layer.msg(result.message);
                    return;
                }
            }
        })
    },callback:function(url,data,isNotify,rqType){
        wm.jq.ajax({url:url, type:rqType, dataType:'json', data:data, cache:false,
            success:function (result) {
                if (!result.code && isNotify) {
                    layer.msg(result.message);
                    return;
                }
            }
        })
    }
};





