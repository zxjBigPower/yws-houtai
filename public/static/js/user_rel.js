layui.use(["laypage","form","layer", "datatable", "datatableButton", "datatableFlash", "datatableHtml5", "datatablePrint", "datatableColVis", "datatableSelect"], function () {
    var t = layui.jquery, e = layui.layer,laypage = layui.laypage,form = layui.form(),csrf_token =t('meta[name=csrf-token]').attr('content');
    t.fn.dataTableExt.oSort["chinese-asc"] = function (t, e) {
        return t.localeCompare(e)
    }, t.fn.dataTableExt.oSort["chinese-desc"] = function (t, e) {
        return e.localeCompare(t)
    }, t.fn.dataTableExt.aTypes.push(function (t) {
        var e = /^[\u4e00-\u9fa5]{0,}$/;
        return e.test(t) ? "chinese" : null
    }),t.fn.check = function check(url,data,n) {
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
                if (data.active == '1') {
                    t(n).parents("tr").find(".td-handle").prepend('<span class="handle-btn handle-btn-stop" title="驳回"><i class="linyer icon-zanting"></i></span>'), t(n).parents("tr").find(".td-status").html('<span class="label label-success radius">已通过</span>'), t(n).remove()
                }
                if (data.active == '5') {
                    t(n).parents("tr").find(".td-handle").prepend('<span class="handle-btn handle-btn-run" title="通过"><i class="linyer icon-qiyong"></i></span>'), t(n).parents("tr").find(".td-status").html('<span class="label label-danger radius">已驳回</span>'), t(n).remove()
                }

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
            lengthMenu: [15, 30, 50],
            stripeClasses: ["odd", "even"],
            searching: 0,
            paging: 0,
            lengthChange: !0,
            info: !0,
            order: [1, "desc"],
            aoColumnDefs: [{orderable: !1, aTargets: [0, 8]}],
            deferRender: !0,
            sAjaxSource: "../admin/relList/ajax",//"../../../json/user.json
            select: {style: "multi"},
            fnServerData:function ( sSource, aoData, fnCallback ) {
                t.ajax({
                    dataType:'json',
                    type:'get',
                    data: {
                        page:GetQueryString('page')!=null?GetQueryString('page').toString():1,
                        search:GetQueryString('search'), level:GetQueryString('level'),status:GetQueryString('status'),
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
                                    window.location.href='/admin/relList?page='+obj.curr;
                                    // layer.msg('第 '+ obj.curr +' 页');
                                }
                            },curr:result.current_page
                        });
                    }
                })
            },
            columns: [{
                data: function (t) {
                    return '<input type="checkbox" class="fly-checkbox" name="sublist[]" data-id=' + t.id + ">"
                }, sTitle: "<input type='checkbox' class='btn-checkall fly-checkbox'>", sDefaultContent: ""
            },{data: "id", sTitle: "ID", sDefaultContent: ""}, {
                data: function (t) {
                    return '<u class="btn-showuser">' + t.belongs_to_user.username + "</u>"
                }, sTitle: "用户名", sType: "chinese", sDefaultContent: ""
            }, {data: "belongs_to_user.nickname", sTitle: "昵称", sType: "chinese", sDefaultContent: ""
            }, {data: "realname", sTitle: "真实姓名", sType: "chinese", sDefaultContent: ""},
                {data: "account", sTitle: "提现账号", sType: "chinese", sDefaultContent: ""},
                {
                    data: function (t) {
                        switch(t.accounttype) {
                            case "1":
                                return "汇付天下";
                            case "2":
                                return "汇付天下";
                        }
                    },sTitle: "账号类型", sDefaultContent: ""
                },
                {data: "created_at", sTitle: "申请时间", sType: "chinese", sDefaultContent: ""},
                {data: "check_at", sTitle: "审核通过时间", sType: "chinese", sDefaultContent: ""},{
                data: function (t) {
                    switch(t.belongs_to_user.status){
                        case 1:
                            return '<span class="label label-success radius">已通过</span>';
                        case 2:
                            return '<span class="label badge-default radius">匿名</span>';
                        case 3:
                            return '<span class="label badge-running radius">审核中</span>';
                        case 4:
                            return '<span class="label badge-danger radius">冻结</span>';
                        case 5:
                            return '<span class="label badge-danger radius">驳回</span>';
                        default :
                            return '<span class="label badge-default radius">匿名</span>';
                    }
                }, className: "td-status", sTitle: "状态", sDefaultContent: ""
            }, {
                data: function (t) {
                    var tmp = t.belongs_to_user.status == '1'?'<span title="驳回" class="handle-btn handle-btn-stop"><i class="linyer icon-zanting"></i></span>':'<span title="通过" class="handle-btn handle-btn-run"><i class="linyer icon-qiyong"></i></span>';
                    return tmp;
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
        var id = t(this).parent().parent().find('td:first-child').find('input:first-child').attr('data-id');
        var e = t(this).html(), n = "./userList/"+id;
        layer_show(e, n, "", "800", "600")
    }), t("#btn-adduser").on("click", function () {
        var e = t(this).html(), n = "./userList/create";
        layer_show(e, n, "", "800", "600")
    }),  t(".table-sort").on("click", ".handle-btn-updatepwd", function () {
        t(this);
        var id = t(this).parent().parent().find('td:first-child').find('input:first-child').attr('data-id');
        layer_show("修改密码", "./userList/getUpdatePassword/"+id, "", "600", "500")
    }), t(".table-sort").on("click", ".handle-btn-stop", function () {
        var n = t(this);
        var id = t(this).parent().parent().find('td:first-child').find('input:first-child').attr('data-id');
        e.confirm("确认要驳回吗？", {icon: 0, title: "警告", shade: !1}, function (a) {
            /*审核封装函数*/
            t.fn.check('./relList/check/'+id,{status:'5'},n);
        })
    }), t(".table-sort").on("click", ".handle-btn-run", function () {
        var n = t(this);
        var id = t(this).parent().parent().find('td:first-child').find('input:first-child').attr('data-id');
        e.confirm("确认要通过吗？", {icon: 0, title: "警告", shade: !1}, function (a) {
            t.fn.check('./relList/check/'+id,{status:'1'},n);
        })
    });
});