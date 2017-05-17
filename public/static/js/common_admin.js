function layerMsg(t, e) {
    layer.msg(t, {icon: e, time: 1e3})
}
function layer_show(t, e, a, n, s) {
    null != t && "" != t || (t = !1), null != n && "" != n || (n = 800), null != s && "" != s || (s = $(window).height() - 300), layer.open({
        type: 2,
        area: [n + "px", s + "px"],
        fix: !1,
        maxmin: !0,
        shade: !1,
        title: t,
        content: e
    })
}
function layer_close() {
    var t = parent.layer.getFrameIndex(window.name);
    parent.layer.close(t)
}
function addClass(t, e) {
    var a = noRepeat(trim(t.className).split("s+"));
    return inArray(a, e) || a.push(e), t.className = a.join(" "), t
}
function removeClass(t, e) {
    var a = noRepeat(trim(t.className).split("s+")), n = indexOf(a, e);
    return n != -1 && (e.splice(n, 1), t.className = e.join(" ")), t
}
function toggleClass(t, e) {
    var a = noRepeat(trim(t.className).split("s+"));
    inArray(a, e) ? removeClass(t, e) : addClass(t, e)
}
function replaceTime(t) {
    return new Date(1e3 * parseInt(t)).toLocaleString().replace(/:\d{1,2}$/, " ")
}
function sortBy(t) {
    return function (e, a) {
        var n, s;
        if ("object" == typeof e && "object" == typeof a && e && a)return n = e[t], s = a[t], n === s ? 0 : typeof n == typeof s ? n < s ? -1 : 1 : typeof n < typeof s ? -1 : 1;
        throw"error"
    }
}
function timeDiff(t) {
    var e = new Date(t), a = new Date - e, n = a / 1e3 / 60 / 60 / 24;
    return Math.floor(n)
}
function getNowDate() {
    var t = new Date;
    return t.getFullYear() + "-" + (t.getMonth() + 1) + "-" + t.getDate()
}
function getWeek() {
    return (new Date).getDay()
}
function indexOf(t, e, a) {
    if (2 == arguments.length && (a = 0), t.indexOf)return t.indexOf(e, a);
    for (var n = 0; n < t.length; n++)if (t[n] === e)return n;
    return -1
}
function noRepeat(t) {
    for (var e = [], a = 0; a < t.length; a++)indexOf(e, t[a]) == -1 && e.push(t[a]);
    return e
}
function inArray(t, e) {
    for (var a = 0; a < t.length; a++)if (t[a] === e)return !0;
    return !1
}
function trim(t) {
    var e = t.replace(/^\s+|\s+$/g, "");
    return e
}
layui.config({base: "../static/js/"}).extend({
    datatable: "datatable",
    datatableButton: "dataTables/extensions/Buttons/js/dataTables.buttons",
    datatableFlash: "dataTables/extensions/Buttons/js/buttons.flash",
    datatableHtml5: "dataTables/extensions/Buttons/js/buttons.html5",
    datatablePrint: "dataTables/extensions/Buttons/js/buttons.print",
    datatableColVis: "dataTables/extensions/Buttons/js/buttons.colVis",
    datatableSelect: "dataTables/extensions/Select/js/dataTables.select",
    datatableEditer: "dataTables/extensions/Editor/js/dataTables.editor.min"
}), layui.use(["layer", "util", "element"], function () {
    var t = layui.jquery, e = (layui.layer, layui.element(), layui.util);
    e.fixbar(), t(function () {
        t(".table-sort").on("click", ".btn-checkall", function () {
            t(".btn-checkall").prop("checked", this.checked), t('[type="checkbox"][name="sublist"]').prop("checked", this.checked)
        }), t(".table-sort").on("click", '[type="checkbox"][name="sublist"]', function () {
            t(".btn-checkall").prop("checked", t('[type="checkbox"][name="sublist"]').length == t('[type="checkbox"][name="sublist"]:checked').length)
        }), t(".tips-icon,.tips-obj").hover(function () {
            t(this).find(".dialog-warp").show(), t(this).find(".dialog-warp").stop(), t(this).find(".dialog-warp").animate({opacity: 1}, 300)
        }, function () {
            t(this).find(".dialog-warp").stop(), t(this).find(".dialog-warp").animate({opacity: 0}, 300), t(this).find(".dialog-warp").hide()
        }), t(".dialog-warp").each(function () {
            var e = t(this).height();
            t(this).css("margin-top", -e / 2)
        });
        var e = t(".fly-numberAdd");
        e.each(function () {
            var e = t(this), a = e.data("value"), n = Math.ceil(a / 99), s = 0, i = setInterval(function () {
                s += n, s > a ? (e.html(a), clearInterval(i)) : e.text(s)
            }, 10)
        }), t(".fly-number").each(function (e, a) {
            var n = +t(a).data("number");
            n > 1e4 && t(a).text((n / 1e4).toFixed(2) + "万")
        }), t("#refresh").on("click", function () {
            window.location.reload()
        })
    })
});
var lang = {
    sProcessing: "<div class='loader'>加载中...</div>",
    sLengthMenu: "每页 _MENU_ 项",
    sZeroRecords: "换个搜索词试试呢？暂无数据",
    sInfo: "当前页显示第 _START_ 至 _END_ 项，全部 _TOTAL_ 项。",
    sInfoEmpty: "当前页显示第 0 至 0 项，全部 0 项",
    sInfoFiltered: "(由 _MAX_ 项结果过滤)",
    sInfoPostFix: "",
    sSearch: "本地搜索：",
    sUrl: "",
    sEmptyTable: "暂无数据",
    sLoadingRecords: "载入中...",
    sInfoThousands: ",",
    oPaginate: {sFirst: "首页", sPrevious: "上一页", sNext: "下一页", sLast: "最后页", sJump: "跳转至"},
    oAria: {sSortAscending: ": 以升序排列此列", sSortDescending: ": 以降序排列此列"}
};
Array.prototype.max = function () {
    return Math.max.apply(null, this)
}, Array.prototype.min = function () {
    return Math.min.apply(null, this)
}, getWeek();

function GetQueryString(name)
{
    var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)");
    var r = window.location.search.substr(1).match(reg);
    if(r!=null) {
        return decodeURI(r[2]);
    }
    return null;
}