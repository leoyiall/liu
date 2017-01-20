<?php
// 本类由系统自动生成，仅供测试用途
class LoginAction extends Action {
    public function index(){
    	$this->display("login");
    }
    public function regsiter(){
    	$this->display("regsiter");
    } 
    // 执行注册
    public function doRegsiter(){
    	$password = $_POST['password'];
    	$repass = $_POST['repass'];
    	if($password != $repass){
    		$this->redirect("regsiter",array('msg'=>'两次密码不一致!'));
    		return false;
    	}
    	$u = M('user');
    	$data['username']=$_POST['username'];
    	$data['password']=md5($_POST['password']);
    	$data['otherName']=$_POST['otherName'];
    	$data['sex']=$_POST['sex'];
    	$list = $u->add($data);
    	if($list){
    		$this->redirect("login",array('msg'=>'注册成功!'));
    	}else{
    		$this->redirect("regsiter",array('msg'=>'注册失败!'));
    	}
    }
    // 验证码
    Public function verify(){
        import('ORG.Util.Image');
        Image::buildImageVerify();
    }
    public function doLogin(){
    	$user = $_POST['username'];
    	$pass = $_POST['password'];
    	$yzm = $_POST['yzm'];
    	if($_SESSION['verify'] != md5($_POST['yzm'])) {
    	   $this->redirect("login",array('msg'=>'验证码错误!'));
		   return false;
		}
		$lis=M('user');
		$list = $lis->where("username='$user'")->find();
		if(!$list){
    	   $this->redirect("login",array('msg'=>'用户名错误!'));
		   return false;
		}
		if($list['password'] != md5($pass)){
    	   $this->redirect("login",array('msg'=>'密码错误!'));
		   return false;
		}
		session("user",$user);
		session("id",$list['id']);
		session("power",$list['power']);
		session("otherName",$list['otherName']);
		$this->redirect("Admin/Index/index");
    }
    public function logout(){
    	session("user",null);
    	session(null);
    	$this->redirect("Login/index");
    }

}