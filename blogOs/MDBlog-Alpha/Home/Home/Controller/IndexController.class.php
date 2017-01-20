<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
	public function demo(){
		echo "<pre>";
	}
	//http://localhost/MDblog/index.php/Home/Index/index
    public function index(){
    	$blogdir=C("BLOG_DIR").'/'.C("BLOG_CONFIG.blog_dir");
    	$db=new \Org\Md\varConfig($blogdir."/db",'article.json');
    	$adb=$db->getvar();
    	//降序排序数组
    	krsort($adb);

    	//print_r($adb);
    	//获取最新的10条数据
    	$top=array_slice($adb,0,10,true);
    	//print_r($top);
    	function array_regroup($arr){
        	$newarr=array();
        	foreach ($arr as $key => $value) {
        		$k=$value["type"];
        		if(!array_key_exists($k,$newarr)){
        			$newarr[$k]=array();
        		}
        		array_push($newarr[$k],$value);
        	}
        	return $newarr;
        }
        function array_classify($arr){
        	$newarr=array();
        	foreach ($arr as $key => $value) {
        		$k=date("Y-m-d",$key);
				if(!array_key_exists($k,$newarr)){
					$newarr[$k]=array();
				}
				array_push($newarr[$k],$value);
			}
			return $newarr;
        }
        //转为记录
        $record=array_classify($adb);
        //print_r($record);
        //文章文类
        $classify=array_regroup($adb);
        //print_r($classify);
    	$alen=count($adb);
    	$Page=new \Think\Page($alen,6);// 实例化分页类 传入总记录数和每页显示的记录数(25)
    	$Page->rollPage=5;//分页显示页数
    	$pages=$Page->show();//分页显示输出
    	$articles=array_slice($adb,$Page->firstRow,$Page->listRows,true);
    	$this->assign("articles",$articles);
    	$this->assign("classify",$classify);
    	$this->assign("record",$record);
    	$this->assign("top",$top);
    	$this->assign("pages",$pages);
		$this->display();
    }
	//空方法访问		
	public function _empty($name){
		$this->display("public:404");
	}
}