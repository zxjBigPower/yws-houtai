// 当前资源URL目录
var baseUrl = (function () {
    var scripts = document.scripts, src = scripts[scripts.length - 1].src;
    return src.substring(0, src.lastIndexOf("/") + 1);
})();
// RequireJs 配置参数
require.config({
    baseUrl: baseUrl+'js/',
    waitSeconds: 0,
    paths: {
        // 开源插件 CDN
        'pace': ['//cdn.bootcss.com/pace/1.0.2/pace.min'],
         // 自定义插件
        'TouchSlide': ['./TouchSlide.1.1'],
        'base': ['./base'],
        'login': ['./login'],
        'jquery': ['./jquery.2.1.4'],
        'jquery.validate': ['./jquery.validate'],
        'layer': ['../layer_mobile/layer'],
        'jquery.serializeJson': ['./jquery.serializeJson'],
        'sms': ['./sms']
    },
    shim: {
        'jquery.validate': {deps: ['jquery']},
        'login': {deps: ['jquery']},
        'jquery.serializeJson': {deps: ['jquery']},
        'sms': {deps: ['jquery']}
    }
});
// UI框架初始化
require(['pace','jquery'], function (pace) {

});