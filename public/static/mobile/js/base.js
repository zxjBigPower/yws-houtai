
        window.onload = function(){
                // 获取html标签
                var oHtml = document.documentElement;
                 getSize();
                function getSize(){
                        // 获取屏幕的宽度
                        var screenWidth = oHtml.clientWidth;
                        if(screenWidth <= 320){
                                oHtml.style.fontSize = '40px';
                         }else if(screenWidth >= 640){
                                oHtml.style.fontSize = '80px';
                         }
                         else{
                                oHtml.style.fontSize = screenWidth/8+'px';
                        
                       }
                   }
                // 当窗口发生改变的时候调用
                window.onresize = function(){
                        getSize();
                }
        }
