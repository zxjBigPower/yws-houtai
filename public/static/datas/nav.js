var navs = [{
	"title": "会员管理",
	"icon": "&#xe613;",
	"children": [{
		"title": "会员列表",
		"icon": "&#xe612;",
		"href": "/admin/userList"
	},{
		"title": "会员等级",
		"icon": "&#xe609;",
		"href": "/admin/userLevel"
	},{
		"title": "会员实名审核",
		"icon": "&#xe63c;",
		"href": "/admin/relList"
	}]
},{
	"title": "提现申请",
	"icon": "fa fa-id-card-o",
	"children": [{
		"title": "申请列表",
		"icon": "fa fa-id-card",
		"href": "javascript:;"
		///admin/withdrawsList
	}]
},{
	"title": "商品管理",
	"icon": "fa fa-asterisk",
	"children": [{
		"title": "目录管理",
		"icon": "fa fa-balance-scale",
		"href": "/admin/categoryList"
	},{
		"title": "商品",
		"icon": "fa fa-university",
		"href": "/admin/product"
	},{
		"title": "审核商品",
		"icon": "fa fa-binoculars",
		"href": "/admin/checkedProduct"
	}]
}, {
	"title": "广告管理",
	"icon": "fa fa-sun-o",
	"children": [{
		"title": "广告列表",
		"icon": "fa fa-sitemap",
		"href": "/admin/bannersList"
		}]
},{
	"title": "新闻管理",
	"icon": "fa fa-tasks",
	"children": [{
		"title": "新闻列表",
		"icon": "fa fa-window-restore",
		"href": "/admin/newsList"
	}]
},{
	"title": "系统用户",
	"icon": "fa fa-user-circle-o",
	"children": [{
        "title": "管理员列表",
        "icon": "fa fa-child",
        "href": "/admin/userAdmin"
    },{
		"title": "个人信息",
		"icon": "fa-user-circle",
		"href": "/admin/userAdmin/userInfo"
	},{
        "title": "修改密码",
        "icon": "&#xe642;",
        "href": "/admin/userAdmin/userUpPassword"
    }]
},{
		"title": "帮助中心",
		"icon": "&#xe614;",
		"children": [{
			"title": "拍卖概述",
			"icon": "fa fa-home",
			"href": "/admin/helpsList?parenttype=1"
		},{
			"title": "规则",
			"icon": "fa fa-gavel",
			"href": "/admin/helpsList?parenttype=2"
		},{
			"title": "名词解释",
			"icon": "fa fa-sticky-note-o",
			"href": "/admin/helpsList?parenttype=3"
		},{
			"title": "竞拍流程",
			"icon": "fa fa-sort-amount-asc",
			"href": "/admin/helpsList?parenttype=4"
		},{
			"title": "常见问题",
			"icon": "fa fa-keyboard-o",
			"href": "/admin/helpsList?parenttype=5"
		}]
	},{
		"title": "订单管理",
		"icon": "&#xe614;",
		"children": [{
			"title": "拍卖订单",
			"icon": "fa fa-home",
			"href": "/admin/order"
		},{
			"title": "一口价订单",
			"icon": "fa fa-balance-scale",
			"href": "/admin/yorder"
		}]
	},{
	"title": "系统配置",
	"icon": "fa fa-cogs",
	"children": [{
		"title": "网站参数",
		"icon": "fa fa-cubes",
		"href": "/admin/config/website"
	},{
		"title": "拍卖参数",
		"icon": "fa fa-cube",
		"href": "/admin/config/auction"
	}]
}];