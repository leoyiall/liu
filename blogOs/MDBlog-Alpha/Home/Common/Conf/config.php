<?php
return array(
	//'配置项'=>'配置值'
	//模板配置
	'TMPL_FILE_DEPR'=>'.',//
	'TMPL_PARSE_STRING'  =>array(
			//'__PUBLIC__'=>'Common',//更改默认的/Public 替换规则
			//'__COMMON__'=>__ROOT__.'/Common',//新增
			'__COMMON__'=>__ROOT__.'/'.APP_NAME.'/'."Common",// Home/Common/
		),
	'URL_CASE_INSENSITIVE' =>true,//开启URL不区分大小写
	'URL_MODEL'=>0,//url普通模式
	'SHOW_PAGE_TRACE'=>true,//开启页面Trace
	//系统设置
	"SYSTEM"=>array(
		//应用名
		"app_name"=>"MDblog",
		//应用源
		"app_link"=>"https://github.com/mengdu/mdblog",
		//应用版本
		"app_versions"=>"1.0",
		//404提示语
		"app_404"=>"吖的，页面没找到！",
		//应用导航
		"app_navs"=>array(
			//系统导航链接
			'menus'=>array(
					//"链接文字"=>"链接地址",
				),
			//系统友情链接
			'blogroll'=>array(
					"github"=>"https://github.com/mengdu/",
					"osc@china"=>"https://git.oschina.net/lanyue",
					"MD-UI框架"=>"https://github.com/md-ui",
					"thinkPHP框架"=>"http://www.thinkphp.cn/",
				)
			)
	),
	//博客配置
	"BLOG_CONFIG"=>include dirname(__FILE__).'/myconfig.php',
	"BLOG_DIR"=>'./'.APP_NAME
	
);