<?php
	//1.确定应用名称 App
	define('APP_NAME','App');
	//2.确定应用路径
	define('APP_PATH','./App/');
	//3.开启调试模式
	define('APP_DEBUG',true);
	//4.应用核心文件  //require是有错就不会执行后面的了 而include有错也还会继续执行下去
	require './ThinkPHP/ThinkPHP.php';
?>