<?php
	if(version_compare(PHP_VERSION,'5.3.0','<'))  die('需要PHP5.3.0以上版本');
	define('APP_DEBUG',TRUE); // 开启调试模式
	//确定应用名称
	define("APP_NAME","Home");
	//确定应用路径
	define("APP_PATH","./Home/");
	//引入核心
	require("../thinkphp3.2.3/ThinkPHP/ThinkPHP.php");//include遇到错误时会跳过继续执行，require遇到错误停止程序