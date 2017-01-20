<?php
/**
 * 
 * @authors lanyue
 * @QQ 		1752295326
 * @date    2015-12-07 16:51:01
 * @version 1.0
 * @info 	配置文件对象
 */
namespace Org\Md;
class varConfig {
	private $conf=null;//保存变量
	private $confFileUrl="";//变量文件路径
	private $filename="config.php";//防止被前台直接访问(用php后缀)
    function __construct($confFile="",$filename=""){
    	$dir=dirname(__FILE__);
    	if($confFile!=""){
    		if($confFile=="/"){
    			$dir="";
    		}else{
    			$dir=trim($confFile);
    		}
    	}
    	if($filename&&is_string($filename)){
    		$this->filename=$filename;
    	}
        $this->confFileUrl=str_replace('\\',"/",$dir).'/'.$this->filename;
        $this->init();  
    }
    //获取
    public function getvar($varName=""){
    	if(!$this->conf){
    		return null;
    	}else{
    		if($varName){
    			return $this->conf[$varName];
    		}else{
    			return $this->conf;
    		}
    	}
    }
    //设置变量
    public function setvar($vars,$val=null){
    	if(!is_array($vars)){
    		$this->conf[$vars]=$val;
    	}else{
    		foreach ($vars as $key => $value) {
	    		$this->conf[$key]=$value;
	    	}
    	}
    	//执行写入文件
    	$this->write();
    }
    //直接设置json
    public function setjson($json){
        file_put_contents($this->confFileUrl,'<?php //'.$json);
        //刷新
        $this->read();
    }
	public function clearvar($key=""){
        if(empty($key)){
            unset($this->conf);  
        }else{
            //释放指定键的变量
            unset($this->conf[$key]);
        }
        $this->write();
	}
    private function init(){
    	if(file_exists($this->confFileUrl)){
    		//如果存在则读取
    		$this->read();
    	}else{
    		$dirs=preg_split("/\//",$this->confFileUrl);
    		$d="";
    		for($i=0;$i<count($dirs)-1;$i++){
    			$d.=$dirs[$i].'/';
    			if(!file_exists($d)){
    				@mkdir($d);
    			}
    		}
    		@touch($this->confFileUrl);
    	}
    }
    //返回json
    public function tojson(){
        return $this->read(true);
    }
    private function read($isjson=false){
    	$varstr=file_get_contents($this->confFileUrl);
    	$varstr=preg_replace('/\<\?php \/\//',"",$varstr,1);//去掉自定义头
        $varstr=preg_replace('/((?<!:)\/\/.*)|((?<![\w])\/\*(\n|.)*?\*\/)/','',$varstr);//去掉单行注释和多行注释
        //((?<!:)\/\/.*) //匹配单行注释 过滤http://情况
        //((?<![\w])\/\*(\n|.)*?\*\/) //匹配多行注释 （(?<![\w])过滤“abce/*fgh*/ijkl”情况）
        $varstr=preg_replace('/\,\s*\}/',"}",$varstr);//去掉json里不合语法的部分 {key:value,} 后面“,”不能有
        if($isjson==false){
            $this->conf=@json_decode($varstr,true);
        }else{
            return $varstr;//用于返回json
        }
        
    }
    private function write(){
    	file_put_contents($this->confFileUrl,'<?php //'.@json_encode($this->conf));
    }
    /*function __destruct(){

    }*/
}