<?php 
	//echo dirname(__FILE__);
	$sysconf=new \Org\Md\varConfig(dirname(__FILE__)."/system",'origin.json');
	$myconf=new \Org\Md\varConfig(dirname(__FILE__)."/system",'myconf.php');
	$my=$myconf->getvar();
	if(empty($my)){
		$my=array();
	}
	return array_merge($sysconf->getvar(),$my);