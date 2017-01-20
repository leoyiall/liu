<?php
namespace Home\Controller;
use Think\Controller;

class ArticleController extends Controller{
	public function index(){
		$this->redirect('Article/editor');
	}
	//编辑文章
	public function editor(){
		$blogdir=C("BLOG_DIR").'/'.C("BLOG_CONFIG.blog_dir");
		$v=new \Org\Md\varConfig($blogdir."/db","classify.json");
		//获取文章类型
		$types=$v->getvar();
		$db=new \Org\Md\varConfig($blogdir."/db",'article.json');
		$adb=$db->getvar();
		krsort($adb);
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
		//文章文类
    	$classify=array_regroup($adb);

    	if(!empty($_GET)){
    		$aid=$_GET['aid'];
    		$url=$_GET['url'];
    		if(!empty($aid)&&!empty($url)){
    			$adb=new \Org\Md\varConfig($blogdir."/db","article.json");
    			$als=$adb->getvar($aid);
    			
    			if(!empty($als)){
    				$this->assign("isAmend",'true');
    				$this->assign("article",$als);
    				$this->assign("markdown_url",U("Article/markdown",array("url"=>$url)));
    			}
    			
    		}
    	}
    	//开启验证
		if(session('mdblog_login')!=1){
			$note="<div class='note-warning'>账号未登录，不能进行编辑操作！编写文章请先<a href='".U('Public/login')."'>登录</a>后在操作。</div>";
			$this->assign("note",$note);
		}
		$this->assign("types",$types);
		$this->assign("classify",$classify);
		$this->display();
	}
	//预览文章
	public function preview(){
		$url=$_GET["aid"];
		if(empty($url)){
			//空的传值
			$this->display("Public.404");
			return;
		}
		$furl=$this->article_exists($url);
		if($furl==false){
			//不存在文章
			$this->display("Public.404");
			return;
		}else{
			$url2=preg_split("/\//",$furl);
			$blogdir=C("BLOG_DIR").'/'.C("BLOG_CONFIG.blog_dir");
			//获取文章信息
			$v=new \Org\Md\varConfig($blogdir."/Article/".$url2[0],$url2[1].".json");
			$db=new \Org\Md\varConfig($blogdir."/db",'article.json');
    		$adb=$db->getvar();
			krsort($adb);
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
			//文章文类
        	$classify=array_regroup($adb);


			$this->assign("markdown_url",U("Article/markdown",array("url"=>$_GET["aid"])));
			$this->assign("article",$v->getvar());
			$this->assign("classify",$classify);
		}

		$this->display();
	}
	public function markdown(){
		$url=base64_decode($_GET["url"]);
		if(empty($url)){
			$this->display("Public.404");
			return "";
		}
		$blogdir=C("BLOG_DIR").'/'.C("BLOG_CONFIG.blog_dir");
		$markdown=file_get_contents($blogdir."/Article/".$url.".md");
		$this->ajaxReturn($markdown);
	}
	public function articleJson($url){
		$this->ajaxReturn($v->tojson());
	}
	private function article_exists($url){
		$url=base64_decode($url);
		$blogdir=C("BLOG_DIR").'/'.C("BLOG_CONFIG.blog_dir");
		if(!file_exists($blogdir."/Article/".$url.".json")||!file_exists($blogdir."/Article/".$url.".md")){
			return false;
		}else{
			return $url;
		}
	}
	//增加文章
	public function pushArticle(){
		$data=$_POST['articleData'];
		$info=array(
			"bool"=>false,
			"info"=>"",
			"data"=>array()
		);
		//开启验证
		if(session('mdblog_login')!=1){
			$info["info"]="未登录账号无权编辑";
			$info['bool']=true;
			$info["data"]["url"]=U("Public/login");
			$this->ajaxReturn($info);
			return;
		}
		if(empty($data)){
			$info["info"]="非法操作";
			$this->ajaxReturn($info);
			exit;
		}
		foreach ($data["data"] as $key => $value) {
			if(empty($value)){
				$info["info"]="数据不完整";
				$this->ajaxReturn($info);
				break;
				exit;
			}
		}
		$blogdir=C("BLOG_DIR").'/'.C("BLOG_CONFIG.blog_dir");
		$f=new \Org\Md\fileSystem();
		$Article=$blogdir."/Article";
		$Draft=$blogdir."/Draft";
		$db=$blogdir."/db";
		$f->createDir($Article);
		$f->createDir($Draft);
		$f->createDir($db);

		$date=date("Y-m-d");

		if($data['issue']=="1"){
			//发表
			if(!file_exists($Article."/".$date)){
				mkdir($Article."/".$date);
			}
			/*
			article_title
			article_abstract
			article_type
			markdown
			PreviewedHTML
			*/

			$aid=time();
			$filename=md5($data["data"]["article_title"].$aid);
			$fileurl=base64_encode($date."/".$filename);
			$ajson=array(
				"filename"=>$filename,
				"time"=>$aid,
				"title"=>$data["data"]["article_title"],
				"type"=>$data["data"]["article_type"],
				"abstract"=>$data["data"]["article_abstract"],
				"visit"=>"0",
				"url"=>$fileurl
			);

			$v=new \Org\Md\varConfig($db,"article.json");
			$v2=new \Org\Md\varConfig($Article."/".$date,$filename.".json");
			$this->write($Article."/".$date."/".$filename.".md",$data["data"]["markdown"]);
			$ar=$v->getvar($aid);
			if(empty($ar)){
				$v->setvar($aid,$ajson);
				$v2->setvar($ajson);
				$info["info"]="发布成功";
				$info["bool"]=true;
				$info["data"]["url"]=U("Article/preview",array("aid"=>$fileurl));
			}
			//$info["demo"]=$v->getvar();
		}else if($data['issue']=="2"){
			//修改
			$url=base64_decode($data['url']);
			$urls=explode("/",$url);
			$a1=new \Org\Md\varConfig($blogdir."/Article/".$urls[0]."/",$urls[1].".json");
			$a2=new \Org\Md\varConfig($blogdir."/db/","article.json");
			$ajson=$a1->getvar();
			$ajson['title']=$data["data"]['article_title'];
			$ajson['type']=$data["data"]['article_type'];
			$ajson['abstract']=$data["data"]['article_abstract'];
			$a1->setvar($ajson);
			$a2->setvar($data['aid'],$ajson);
			$this->write($blogdir."/Article/".$url.".md",$data["data"]["markdown"]);
			$info["info"]="修改成功";
			$info["bool"]=true;
			$info["data"]["url"]=U("Article/preview",array("aid"=>$ajson['url']));
			$this->ajaxReturn($info);
		}else{
			//保存草稿

		}
		
		$this->ajaxReturn($info);
	}
	private function write($url,$markdown){
		file_put_contents($url,$markdown);
	}
	//空方法访问		
	public function _empty($name){
		$this->display("public:404");
	}
}