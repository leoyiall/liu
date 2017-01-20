<?php
namespace Home\Controller;
use Think\Controller;

class AdminController extends Controller{
	public function __construct(){
		//dump(session());
		//验证所有接口
		if(session('mdblog_login')!=1){
			$this->redirect('Public/login');
			//echo "<div class='note-warning'>账号未登录</div>";
		}
		//如果不存在这句，此控制器的方法$this指向会出问题
		parent::__construct();
	}
	//仪表盘
	public function index(){
		//dump(session());
		$this->display();
	}
	//用户管理
	public function user(){
		if(!empty($_GET['del'])){
			$blogdir=C("BLOG_DIR").'/'.C("BLOG_CONFIG.blog_dir");
			$user=new \Org\Md\varConfig($blogdir."/db","users.php");
			$user->clearvar($_GET['del']);
			$this->success("删除成功");
			return;
		}
		if(!empty($_GET['change'])){
			//修改
			$uid=$_GET['change'];
			$this->assign('change',$uid);
		}else{
			$blogdir=C("BLOG_DIR").'/'.C("BLOG_CONFIG.blog_dir");
			$user=new \Org\Md\varConfig($blogdir."/db","users.php");
			$users=$user->getvar();
			$this->assign("users",$users);
		}
		$this->display();
	}
	//增加用户
	public function adduser(){
		if(!empty($_POST)){
			if(!R("Public/check",array('code'=>$_POST['code']))){
				$this->error('验证码错误');
				return;
			}
			if(!empty($_POST['user'])&&!empty($_POST['pwd'])){
				if($_POST['pwd']!=$_POST['pwd1']){
					$this->error('两次输入的密码不一致');
					return;
				}
				$p=md5($_POST['pwd']);
				$pwd=md5(substr($p,16,32).$p.substr($p,0,16));
				$userdata=array(
					'user'=>$_POST['user'],
					'password'=>$pwd,
					'rtime'=>time()
					);
				$blogdir=C("BLOG_DIR").'/'.C("BLOG_CONFIG.blog_dir");
				$user=new \Org\Md\varConfig($blogdir."/db","users.php");
				$user->setvar($_POST['user'],$userdata);
				$this->success('添加用户成功...');
				return;
			}else{
				$this->error('用户名和密码均不能为空');
				return;
			}
		}else{
			$this->display('Public:404');
		}
	}
	//修改用户
	public function changeuser(){
		if(!empty($_POST)){
			if(!R("Public/check",array('code'=>$_POST['code']))){
				$this->error('验证码错误');
				return;
			}
			if(!empty($_POST['user'])&&!empty($_POST['pwd'])){
				if($_POST['pwd']!=$_POST['pwd1']){
					$this->error('两次输入的密码不一致');
					return;
				}
				$blogdir=C("BLOG_DIR").'/'.C("BLOG_CONFIG.blog_dir");
				$user=new \Org\Md\varConfig($blogdir."/db","users.php");
				$u=$user->getvar($_POST['user']);
				if(empty($u)){
					$this->error("不存在的用户");
					return;
				}
				$p=md5($_POST['pwd']);
				$pwd=md5(substr($p,16,32).$p.substr($p,0,16));
				$userdata=array(
					'user'=>$_POST['user'],
					'password'=>$pwd,
					'rtime'=>time()
					);
				
				$user->setvar($_POST['user'],$userdata);
				$this->success('修改用户成功...');
				return;
			}else{
				$this->error('用户名和密码均不能为空');
				return;
			}
		}
	}
	//文章管理
	public function article(){
		$blogdir=C("BLOG_DIR").'/'.C("BLOG_CONFIG.blog_dir");
    	$db=new \Org\Md\varConfig($blogdir."/db",'article.json');
    	$adb=$db->getvar();
    	$v=new \Org\Md\varConfig($blogdir."/db","classify.json");
		//获取文章类型
		$types=$v->getvar();
    	//降序排序数组
    	krsort($adb);
    	$alen=count($adb);
    	$Page=new \Think\Page($alen,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
    	$Page->rollPage=5;//分页显示页数
    	$pages=$Page->show();//分页显示输出
    	$articles=array_slice($adb,$Page->firstRow,$Page->listRows,true);

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
    	$this->assign("articles",$articles);
    	$this->assign("pages",$pages);
    	$this->assign("types",$types);
    	$this->assign("record",$record);
    	$this->assign("classify",$classify);

		$this->display();
	}
	public function changearticle(){
		$this->display();
	}
	//博客配置
	public function config(){
		$this->display();
	}
	//设置配置
	public function setconfig(){
		if(!empty($_POST)){
			$curl='./'.APP_NAME.'/'."Common/Conf/system";
			$bconf=new \Org\Md\varConfig($curl,"myconf.php");
			if($_POST['basis']=='1'){
				//博客基本配置
				$blog_name=$_POST['blog_name'];
				$blog_introduce=$_POST['blog_introduce'];
				if(!empty($blog_name)&&!empty($blog_introduce)){
					$bconf->setvar("blog_name",$blog_name);
					$bconf->setvar("blog_introduce",$blog_introduce);
					$this->success("修改成功");
				}else{
					$this->error("出错了");
					return;
				}
			}
			if($_POST['addtype']=='1'){
				//添加类型
				$type_id=$_POST['type_id'];
				$type_name=$_POST['type_name'];
				if(!empty($type_id)&&!empty($type_name)){
					$blogdir=C("BLOG_DIR").'/'.C("BLOG_CONFIG.blog_dir");
    				$db=new \Org\Md\varConfig($blogdir."/db",'classify.json');
					$db->setvar($type_id,$type_name);
					$this->success("添加类型成功");
				}else{
					$this->error("内容均不能为空");
				}
			}
			if($_POST['addlink']=="1"){
				//添加链接
				$link_name=$_POST['link_name'];
				$link=$_POST['link'];
				if(!empty($link_name)&&!empty($link)){
					$blog_menus=$bconf->getvar("blog_menus");
					if(empty($blog_menus)){
						//echo "还没有";
						$bconf->setvar("blog_menus",array($link_name=>$link));
					}else{
						//echo "已经有";
						$blog_menus[$link_name]=$link;
						$bconf->setvar("blog_menus",$blog_menus);
					}
					$this->success("添加链接成功");	
				}else{
					$this->error("内容不能为空");
					return;
				}
			}
		}
		if(!empty($_GET)){
			if($_GET['dellink']=="1"){
				//删除链接
				$link=$_GET['link'];
				if(!empty($link)){
					$curl='./'.APP_NAME.'/'."Common/Conf/system";
					$bconf=new \Org\Md\varConfig($curl,"myconf.php");
					$blog_menus=$bconf->getvar("blog_menus");
					unset($blog_menus[$link]);
					$bconf->setvar("blog_menus",$blog_menus);
					$this->success("删除链接成功");
				}else{
					$this->error("出错了");
				}
			}
			if($_GET['deltype']=='1'){
				//删除类型
				$type_id=$_GET['type_id'];
				if(!empty($type_id)){
					$blogdir=C("BLOG_DIR").'/'.C("BLOG_CONFIG.blog_dir");
    				$db=new \Org\Md\varConfig($blogdir."/db",'classify.json');
					$db->clearvar($type_id);
					$this->success("删除类型成功");
				}else{
					$this->error("内容均不能为空");
				}
			}
			if($_GET['delarticle']=='1'){
				//删除文章
				//dump($_GET);
				if(!empty($_GET['aid'])){
					$url=base64_decode($_GET['url']);
					//$urls=explode("/",$url);
					$blogdir=C("BLOG_DIR").'/'.C("BLOG_CONFIG.blog_dir");
	    			$db=new \Org\Md\varConfig($blogdir."/db",'article.json');
	    			$db->clearvar($_GET['aid']);
	    			$fileurl=$blogdir."/Article/".$url;
	    			if(unlink($fileurl.".md")&&unlink($fileurl.".json")){
						$this->success("删除文章成功");
	    			}else{
	    				$this->error("删除失败");
	    			}
	    		}else{
	    			$this->error("参数错误");
	    		}
			}
		}
	}
	//空方法访问		
	public function _empty($name){
		$this->display("public:404");
	}
}