<?php
return array(
	//'配置项'=>'配置值'
		'APP_GROUP_LIST' => 'Home,Admin', //项目分组设定
		'DEFAULT_GROUP'  => 'Home', //默认分组
		//数据库配置信息
	   'DB_TYPE'   => 'mysql', // 数据库类型
	   'DB_HOST'   => 'localhost', // 服务器地址
	   'DB_NAME'   => 'search', // 数据库名
	   'DB_USER'   => 'root', // 用户名
	   'DB_PWD'    => '', // 密码
	   'DB_PORT'   => 3306, // 端口
	   'DB_PREFIX' => '', // 数据库表前缀 
	   //调试
	   // 'APP_STATUS' => 'debug',
	   // 'SHOW_PAGE_TRACE'=>true,//开启页面Trace
	   'TMPL_L_DELIM'=>'<{',//修改左定界符
	   'TMPL_R_DELIM'=>'}>',//修改右定界符
	   // 设置编码
	   'DB_CHARSET'=>'utf8',
	   'DEFAULT_CHARSET'=> 'utf8'
);
?>