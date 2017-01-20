<?php
	// 检测PHP环境
	//if(version_compare(PHP_VERSION,'5.3.0','<'))  die('需要PHP5.3.0以上版本');
	define('APP_DEBUG',TRUE); // 开启调试模式
	//确定应用名称
	define("APP_NAME","Admin");
	//确定应用路径
	define("APP_PATH","./Admin/");
	//引入核心
	require("./ThinkPHP/ThinkPHP.php");//include遇到错误时会跳过继续执行，require遇到错误停止程序

	