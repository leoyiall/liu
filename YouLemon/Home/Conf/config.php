<?php
$conf=array(
	//'配置项'=>'配置值'
);
$publicConf=include './Public/Conf/config.php';
return array_merge($publicConf,$conf);
?>