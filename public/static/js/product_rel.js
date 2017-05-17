layui.use(["laypage","form","layer", "datatable", "datatableButton", "datatableFlash", "datatableHtml5", "datatablePrint", "datatableColVis", "datatableSelect"], function () {
    var t = layui.jquery, e = layui.layer, laypage = layui.laypage,form = layui.form(),csrf_token =t('meta[name=csrf-token]').attr('content');
    t.fn.dataTableExt.oSort["chinese-asc"] = function (t, e) {
        return t.localeCompare(e)
    }, t.fn.dataTableExt.oSort["chinese-desc"] = function (t, e) {
        return e.localeCompare(t)
    }, t.fn.dataTableExt.aTypes.push(function (t) {
        var e = /^[\u4e00-\u9fa5]{0,}$/;
        return e.test(t) ? "chinese" : null
    }), t.fn.check = function check(url,data,n) {
        data._token = csrf_token;
        t.ajax({
            url:url,
            data:data,
            type:'post',
            success:function (data) {
                console.log(data)
                if (data == null) {
                    layer.msg('服务端错误', {icon: 2, time: 2000});
                    return;
                }
                if (data.status != 0) {
                    layer.msg(data.message, {icon: 2, time: 2000});
                    return;
                }
                layer.msg(data.message, {icon: 1, time: 2000});
                t(n).parents("tr").remove();
            }
        });
    }, t(document).ready(function () {
        var e = t("#userTable").DataTable({
            processing: !0,
            stateSave: !0,
            scrollCollapse: !0,
            paginationType: "full_numbers",
            language: lang,
            autoWidth: !1,
            lengthMenu: [20],
            stripeClasses: ["odd", "even"],
            searching: 0,
            paging: 0,
            lengthChange: !0,
            info: !0,
            order: [1, "desc"],
            aoColumnDefs: [{orderable: !1, aTargets: [0, 9]}],
            deferRender: !0,
            sAjaxSource: "../admin/checkedProduct/ajax",//"../../../json/user.json
            select: {style: "multi"},
            fnServerData:function ( sSource, aoData, fnCallback ) {
                console.log(aoData);
                t.ajax({
                    dataType:'json',
                    type:'get',
                    data: {
                        page:GetQueryString('page')!=null?GetQueryString('page').toString():1,
                        search:GetQueryString('search'), category:GetQueryString('category'),isaucation:GetQueryString('isaucation'),
                    },//{"aoData":JSON.stringify(aoData)}
                    url:sSource,
                    success:function (result) {
                        console.log(result);
                        fnCallback(result);//把返回的数据传给这个方法就可以了,datatable会自动绑定数据的
                        laypage({
                            cont: 'demo1'
                            ,pages: result.last_page //总页数
                            ,groups: 5 //连续显示分页数
                            ,jump:function(obj, first){
                                if(!first){
                                    window.location.href='/admin/checkedProduct?page='+obj.curr;
                                    // layer.msg('第 '+ obj.curr +' 页');
                                }
                            },curr:result.current_page
                        });
                    }
                })
            },
            columns: [{
                data: function (t) {
                    return '<input type="checkbox" class="fly-checkbox" name="sublist[]" data-id=' + t.pid + ">"
                }, sTitle: "<input type='checkbox' class='btn-checkall fly-checkbox'>", sDefaultContent: ""
            }, {data: "pid", sTitle: "ID", sDefaultContent: ""},
                {
                    data: function (t) {
                        return '<u class="btn-showproduct" data-productId="'+t.pid+'">' + t.pname + "</u>"
                    }, sTitle: "商品名称", sType: "chinese", sDefaultContent: ""
                },
                {
                data: function (t) {
                    return '<u class="btn-showuser" data-userId="'+t.userid+'">' + t.username + "</u>"
                }, sTitle: "卖家账号", sType: "chinese", sDefaultContent: ""
            },{data: "catname", sTitle: "目录", sType: "chinese", sDefaultContent: ""},
                {data: "baseprice", sTitle: "价格", sDefaultContent: ""},
                {
                    data: function (t) {
                        switch (t.isaucation){
                            case 1:
                                return '一口价';
                            case 2:
                                return '拍卖';
                        }
                    }, className: "td-handle", sTitle: "类型", sDefaultContent: ""
                },
                {data: "deposit", sTitle: "保证金额", sDefaultContent: "0"},{data: "curprice", sTitle: "当前价格(元)", sDefaultContent: "0"},
                {
                    data: function (t) {
                        switch (t.pstatus){
                            case 0:
                                return '<span class="label label-stop radius">审核中....</span>';
                            default:
                                return t.pstatus;
                        }
                    }, sTitle: "状态", sDefaultContent: ""
                },{
                data: function (t) {
                    return '<span title="通过" data-productId='+t.pid+' class="handle-btn handle-btn-run"><i class="linyer icon-qiyong"></i></span>';
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
                message: "此打印是使用DataTable的打印按钮生成的!"
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
        }), t(document).on("click", "#userTable > thead > tr > th input[type=checkbox],#userTable > tfoot > tr > th input[type=checkbox]", function () {
            var n = this.checked;
            t("#userTable").find("tbody > tr").each(function () {
                var t = this;
                n ? e.row(t).select() : e.row(t).deselect()
            })
        }), t(document).on("click", "#userTable tbody td input[type=checkbox]", function () {
            var n = t(this).closest("tr").get(0);
            this.checked ? e.row(n).select() : e.row(n).deselect()
        }), t(document).on("click", "#userTable tbody td", function () {
            t(this).closest("tr").get(0)
        })
    }), t("#userTable").on("click", ".btn-showuser", function () {
        //显示用户
        var id = t(this).attr('data-userId');
        var e = t(this).html(), n = "./userList/"+id;
        layer_show(e, n, "", "800", "600")
    }),t("#userTable").on("click", ".btn-showproduct", function () {
        //显示商品
        var id = t(this).attr('data-productId');
        var e = t(this).html(), n = "./product/"+id;
        layer_show(e, n, "", "800", "600")
    }), t("#btn-adduser").on("click", function () {
        var e = t(this).html(), n = "./userList/create";
        layer_show(e, n, "", "800", "600")
    }), t(".table-sort").on("click", ".handle-btn-stop", function () {
        var n = t(this);
        e.confirm("确认要停用吗？", {icon: 0, title: "警告", shade: !1}, function (a) {
            t(n).parents("tr").find(".td-handle").prepend('<span class="handle-btn handle-btn-run" title="启用"><i class="linyer icon-qiyong"></i></span>'), t(n).parents("tr").find(".td-status").html('<span class="label label-default radius">已停用</span>'), t(n).remove(), e.msg("已停用!", {
                icon: 5,
                time: 1e3
            })
        })
    }),  t("#btn-delect-all").on("click", function () {

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
                        url:'./userList/'+id,
                        data:{'_token':csrf_token},
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
    }),t(".table-sort").on("click", ".handle-btn-run", function () {
        var n = t(this);
        var id = t(this).parent().parent().find('td:first-child').find('input:first-child').attr('data-id');
        e.confirm("确认要通过吗？", {icon: 0, title: "警告", shade: !1}, function (a) {
            t.fn.check('./checkedProduct/check/'+id,{status:'1'},n);
        })
    })
});