/**
 图片上传并且预览插件
 使用方法
layfile.use({
    id:'uploadImage', //input  type=file  组件的id
    img:{
        id:'uploadPreview', //预览地址的id
    }
});
layfile.upload();
 */
;!(function(e){
    var t = function(){
        this.v = '0.0.1';
    };
    var o = document;
    t.fn = t.prototype;
    t.fn.use = function(e){
        t.fn.f = e;
    },
    t.fn.upload = function(){
        var el = o.getElementById(t.fn.f.id);
        var img = o.getElementById(t.fn.f.img.id);
        var fileReader = new FileReader(), rFilter = /^(?:image\/bmp|image\/cis\-cod|image\/gif|image\/ief|image\/jpeg|image\/jpeg|image\/jpeg|image\/pipeg|image\/png|image\/svg\+xml|image\/tiff|image\/x\-cmu\-raster|image\/x\-cmx|image\/x\-icon|image\/x\-portable\-anymap|image\/x\-portable\-bitmap|image\/x\-portable\-graymap|image\/x\-portable\-pixmap|image\/x\-rgb|image\/x\-xbitmap|image\/x\-xpixmap|image\/x\-xwindowdump)$/i;

        fileReader.onload = function(oFREvent) {
           img.src = oFREvent.target.result;
        };

        if (el.files.length === 0) {
            return;
        }
        var oFile = el.files[0];
        if (!rFilter.test(oFile.type)) {
            console.log("You must select a valid image file!");
            return;
        }
        fileReader.readAsDataURL(oFile);
    }
    e.layfile = new t;
})(window);