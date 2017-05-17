layui.use(["layer", "datatable", "datatableButton", "datatableFlash", "datatableHtml5", "datatablePrint", "datatableColVis", "datatableSelect"], function () {
    var t = layui.jquery, e = layui.layer;
    t.fn.dataTableExt.oSort["chinese-asc"] = function (t, e) {
        return t.localeCompare(e)
    }, t.fn.dataTableExt.oSort["chinese-desc"] = function (t, e) {
        return e.localeCompare(t)
    }, t.fn.dataTableExt.aTypes.push(function (t) {
        var e = /^[\u4e00-\u9fa5]{0,}$/;
        return e.test(t) ? "chinese" : null
    }), t(document).ready(function () {
        var e = t("#withdrawsTable").DataTable({
            processing: !0,
            stateSave: !0,
            scrollCollapse: !0,
            paginationType: "full_numbers",
            language: lang,
            autoWidth: !1,
            lengthMenu: [15, 30, 50],
            stripeClasses: ["odd", "even"],
            searching: !0,
            paging: !0,
            lengthChange: !0,
            info: !0,
            order: [1, "desc"],
            aoColumnDefs: [{orderable: !1, aTargets: [0, 10]}],
            deferRender: !0,
            ajax: "../admin/withdrawsList/ajax",//"../../../json/user.json
            select: {style: "multi"},
            columns: [{
                data: function (t) {
                    return '<input type="checkbox" class="fly-checkbox" name="sublist[]" data-id=' + t.id + ">"
                }, sTitle: "<input type='checkbox' class='btn-checkall fly-checkbox'>", sDefaultContent: ""
            },
                {data: "id", sTitle: "ID", sDefaultContent: ""},
                {data: function (t) {
                    // return '<u class="btn-showuser">' + t.has_one_user.nickname + "</u>"
                    return t.user!=null?t.user.nickname:'';
                }, sTitle: "昵称", sType: "chinese", sDefaultContent: ""
            },
                {data: "userinfo.realname", sTitle: "真实姓名", sType: "chinese", sDefaultContent: ""},
                {data: "user.email", sTitle: "邮箱", sDefaultContent: ""},
                {data: "userinfo.identification", sTitle: "身份证", sDefaultContent: ""},
                {data: function (t) {
                    // return "&nbsp;" + t.has_one_user.mobile!=null?t.has_one_user.mobile:'' + "&nbsp;"
                    return t.user.mobile!=null?t.user.mobile:'';
                }, sTitle: "手机号码", sDefaultContent: ""
            },
                {data: "userinfo.accounttype", sTitle: "提现账号类型", sDefaultContent: ""},
                {data: "userinfo.account", sTitle: "提现账号", sDefaultContent: ""},
                {data: function (t) {
                        if (t.status == '1') {
                            return '<span class="label label-success radius">申请</span>';
                        }
                        if (t.status == '2') {
                            return '<span class="label label-success radius">处理中</span>';
                        }

                        return '<span class="label label-default radius">'+t.status+'</span>';
                    }, className: "td-status", sTitle: "状态", sDefaultContent: ""
                },
                {data: function (t) {
                    var tmp = '';
                    return tmp+'<span title="提现" class="handle-btn handle-btn-edit"><i class="linyer icon-edit"></i></span><span title="删除" class="handle-btn handle-btn-delect"><i class="linyer icon-delect"></i></span>';
                }, className: "td-handle", sTitle: "操作", sDefaultContent: ""
            }]
        });
        t.fn.dataTable.Buttons.swfPath = "../../static/js/dataTables/extensions/Buttons/swf/flashExport.swf", t.fn.dataTable.Buttons.defaults.dom.container.className = "tableTools-box", new t.fn.dataTable.Buttons(e, {
            buttons: [{
                extend: "colvis",
                text: "<i class='linyer icon-search'></i> <span class='hidden'>显示/隐藏列</span>",
                className: "layui-btn table-tool",
                columns: ":not(:first):not(:last)"
            }, {
                extend: "copy",
                text: "<i class='linyer icon-copy'></i> <span class='hidden'>复制到剪贴板</span>",
                className: "layui-btn table-tool"
            }, {
                extend: "csv",
                text: "<i class='linyer icon-exports'></i> <span class='hidden'>导出csv</span>",
                className: "layui-btn table-tool"
            }, {
                extend: "excel",
                text: "<i class='linyer icon-excel'></i> <span class='hidden'>导出excel</span>",
                className: "layui-btn table-tool"
            }, {
                extend: "pdf",
                text: "<i class='linyer icon-pdf'></i> <span class=''>导出pdf</span>",
                className: "layui-btn table-tool"
            }, {
                extend: "print",
                text: "<i class='linyer icon-print'></i> <span class='hidden'>打印</span>",
                className: "layui-btn table-tool",
                autoPrint: !1,
                message: ""
            }]
        }), console.log(e), e.buttons().container().appendTo(t(".tableTools"));
        var n = e.button(0).action();
        e.button(0).action(function (e, a, s, l) {
            n(e, a, s, l), 0 == t(".dt-button-collection > .dropdown-menu").length && t(".dt-button-collection").wrapInner('<ul class="dropdown-menu" />').find("a").attr("href", "javascript:;").wrap("<li />"), t(".dt-button-collection").appendTo(".tableTools-box")
        });
        var a = e.button(1).action();
        e.button(1).action(function (t, e, n, s) {
            a(t, e, n, s)
        }), e.on("select", function (n, a, s, l) {
            "row" === s && t(e.row(l).node()).find("input:checkbox").prop("checked", !0)
        }), e.on("deselect", function (n, a, s, l) {
            "row" === s && t(e.row(l).node()).find("input:checkbox").prop("checked", !1)
        }), t(document).on("click", "#withdrawsTable > thead > tr > th input[type=checkbox],#withdrawsTable > tfoot > tr > th input[type=checkbox]", function () {
            var n = this.checked;
            t("#withdrawsTable").find("tbody > tr").each(function () {
                var t = this;
                n ? e.row(t).select() : e.row(t).deselect()
            })
        }), t(document).on("click", "#withdrawsTable tbody td input[type=checkbox]", function () {
            var n = t(this).closest("tr").get(0);
            this.checked ? e.row(n).select() : e.row(n).deselect()
        }), t(document).on("click", "#withdrawsTable tbody td", function () {
            t(this).closest("tr").get(0)
        })
    }), t("#withdrawsTable").on("click", ".btn-showuser", function () {
        var id = t(this).parent().parent().find('td:first-child').find('input:first-child').attr('data-id');
        var e = t(this).html(), n = "./withdrawsList/"+id;
        layer_show(e, n, "", "400", "500")
    }), t("#btn-adduser").on("click", function () {
        var e = t(this).html(), n = "./withdrawsList/create";
        layer_show(e, n, "", "800", "600")
    }), t(".table-sort").on("click", ".handle-btn-edit", function () {
        t(this);
        var id = t(this).parent().parent().find('td:first-child').find('input:first-child').attr('data-id');
        layer_show("提现", "./withdrawsList/"+id+'/edit', "", "800", "600")
    }),  t(".table-sort").on("click", ".handle-btn-delect", function () {
        var n = t(this);
        var csrf_token =t('meta[name=csrf-token]').attr('content');
        var id = t(this).parent().parent().find('td:first-child').find('input:first-child').attr('data-id');
        e.confirm("确认要删除吗？", {icon: 0, title: "警告", shade: !1}, function (a) {
            t.ajax({
                url:'./withdrawsList/'+id,
                data:{'csrf':csrf_token},
                type:'delete',
                success:function (data) {
                    console.log(data)
                }
            });
            t(n).parents("tr").remove(), e.msg("已删除!", {icon: 1, time: 1e3})
        })
    }), t("#btn-delect-all").on("click", function () {

        console.log(t(".table-sort tbody :checkbox:checked").length), 0 == t(".table-sort tbody :checkbox:checked").length ? e.msg("请选择需要删除的数据！", {icon: 0}) : e.confirm("确认要删除吗？", {
            icon: 0,
            title: "警告",
            shade: !1
        }, function (n) {
            var csrf_token =t('meta[name=csrf-token]').attr('content');
            t("input[type='checkbox']:checked").each(function (e) {
                var id = t(this).attr('data-id');
                if (id!=undefined) {
                    t(this).attr('data-id')
                    t.ajax({
                        url:'./withdrawsList/'+id,
                        data:{'csrf':csrf_token},
                        type:'delete',
                        success:function (data) {
                            console.log(data)
                        }
                    });
                    // console.log(t(this).attr('data-id'))
                }
            });
            t(".table-sort tbody :checkbox:checked").parents("tr").remove(), e.msg("已删除!", {icon: 1, time: 1e3})
        })
    })
});