<?php
namespace Home\Controller;
use Think\Controller;
class PublicController extends Controller{

	public function index(){
		$this->show("没有内容");
	}
	public function login(){
		/*echo "<pre>";
		echo md5("")."<br>";
		echo md5('')."<br>";
		$s="1752295326";
		$m=md5($s);
		echo "1752295326:".$m."<br>";
		echo "1752295326:".substr($m,0,16)."<br>";
		echo "1752295326:".substr($m,16,32)."<br>";
		echo "1752295326:".md5(substr($m,16,32).$m.substr($m,0,16))."<br>";
		echo "</pre>";*/

		//$user=C("BLOG_CONFIG.admin");
		if(!empty($_POST)){
			if(!$this->check($_POST['checkcode'])){
				$this->error("验证码不正确");
				return;
			}
			$blogdir=C("BLOG_DIR").'/'.C("BLOG_CONFIG.blog_dir");
			$user=new \Org\Md\varConfig($blogdir."/db","users.php");
			$u=$user->getvar();
			if(empty($u)){
				//第一次登陆
				//echo "第一次登陆";
				$this->redirect('Public/adduser',array('isfirst'=>0));//重定向
			}else{
				if(array_key_exists($_POST['uid'],$u)){
					$p=md5($_POST['pwd']);
					$pwd=md5(md5(substr($p,16,32).$p.substr($p,0,16)));
					echo $pwd;
					if(md5($u[$_POST['uid']]['password'])==$pwd){
						//echo "登录成功";
						session("mdblog_login",'1');
						session("mdblog_user",$_POST['uid']);
						session("mdblog_login_time",time());
						session("mdblog_login_ip",get_client_ip());
						$this->redirect('Admin/index');//重定向
					}else{
						$this->error("密码与账号不匹配");
						//echo "登录失败";
					}
				}else{
					$this->error("账号不存在");
					//echo "账号不存在";
				}
			}
		}
		$this->display();
	}
	//初始化增加用户
	public function adduser(){
		$blogdir=C("BLOG_DIR").'/'.C("BLOG_CONFIG.blog_dir");
		$user=new \Org\Md\varConfig($blogdir."/db","users.php");
		$u=$user->getvar();
		if(!empty($u)){
			$this->display('Public:404');
			return;
		}
		if(!empty($_POST)){
			if(!$this->check($_POST['code'])){
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
				$user->setvar($_POST['user'],$userdata);
				$this->redirect('Public/login',array(),"2",'<!DOCTYPE html><html><head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head><body>添加用户成功，正在跳到登录...</body></html>');
				return;
			}else{
				$this->error('用户名和密码均不能为空');
				return;
			}
		}
		$this->display();
	}
	//输出验证码
	public function Verify(){
    	$config = array(
    		//"imageW"=>80,
    		//"imageH"=>30,    
    		'fontSize'=>30,// 验证码字体大小
    		'length'=>5, // 验证码位数
    		'useNoise'=>false,// 关闭验证码杂点
            "useCurve"=>false,//是否使用混淆曲线 默认为true 
            //"useNoise"=>false,//是否添加杂点 默认为true 
    		);
    	$Verify = new \Think\Verify($config);
		$Verify->entry();
    }
    //检验验证码
    public function check($code){
        $config = array(
            'reset' => false//验证成功后是不重置,不成功则重置
        );
        $verify =new \Think\Verify($config);
        return $verify->check($code);
    }
    public function logout(){
    	session("mdblog_login",null);
		session("mdblog_user",null);
		session("mdblog_login_time",null);
		session("mdblog_login_ip",null);
    	$this->redirect('Public/login',array(),'2','<!DOCTYPE html><html><head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head><body>退出账号，正在跳到登录...</body></html>');
    }
	//空方法访问		
	public function _empty($name){
		$this->display("public:404");
	}
}