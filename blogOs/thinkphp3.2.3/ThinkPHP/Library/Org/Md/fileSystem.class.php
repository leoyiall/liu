<?php
/**
 * 
 * @authors lanyue
 * @QQ 		1752295326
 * @date    2015-12-13 13:32:01
 * @version 1.0
 * @info 	文件管理对象
 */
namespace Org\Md;
class fileSystem {
	//读取文件
	public function read($url){
		if(empty($url)){
			return "";
		}
		return file_get_contents($url);
	}
	//写文件
	public function write($url,$str,$bool=false){
		return file_put_contents($url,$str,$bool);
	}
	//创建目录(支持三级以上目录创建)含有转义字时需要转义\n\r\t\f\d\D\s\S\w\W
	public function createDir($dir){
		if(strlen($dir)<=0){
			return;
		}
		$dir=preg_replace('/\\\/',"/",$dir);//把\换成/
		$dir=rtrim($dir,"\/");//去掉右边/

		$dir=preg_split("/\:/",$dir);
		$absolute=false;//是否是绝对路径
		$pan=$dir[0].":";//盘符
		$url=$dir[0];//路径部分
		if(count($dir)>1){
			$absolute=true;
			$url=$dir[1];
		}else{
			$pan="";
		}
		$urls=preg_split('/\//',$url);
		for($i=0;$i<count($urls);$i++){
			$pan.=$urls[$i].'/';
			if(!file_exists($pan)){
				mkdir($pan);
			}
		}
	}
	//获取目录树结构
	public function dirTree($dir){
		$dir=rtrim($dir,"\/");//去掉右边/
		$json=rtrim(dirSize($dir),",");
		$json=preg_replace('/\,\}/',"}",$json);
		return $json;
	}
	//获取文件信息
	public function fileInfo($url){
		return pathinfo($url);
	}
}
function dirSize($dirName){
	$json='{';
	$key=0;
	$dir=opendir($dirName);
	while($fileName=readdir($dir)){
		$file=$dirName."/".$fileName;//得到文件url
		if($fileName!="." && $fileName!=".."){
			//echo $file."<br>";
			if(is_dir($file)){//判断是否是目录
				$json.='"'.$fileName.'":';
				$json.=dirSize($file);
			}else{
				$json.='"'.$key.'":"'.$fileName.'",';
				$key++;
			}
			
		}
		
	}
	closedir($dir);
	$json.='},';
	//print_r($dirarr);
	return $json;
}