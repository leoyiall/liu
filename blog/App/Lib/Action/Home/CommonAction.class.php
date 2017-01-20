<?php
class CommonAction extends Action {
	public function login(){
		$this->display();
	}	
	// 验证码
	Public function verify(){
	    import('ORG.Util.Image');
	    Image::buildImageVerify();
	}
	// 执行登录
	public function dologin(){
		$l = $_GET['l'];
		// 如果传送过来没有数据就提示没有数据
		if(empty($_POST)){
			$data["info"]="没有数据，请刷新后重试！";
			$this->ajaxreturn($data);
			return;
		}
	    $pass = $_POST['pass'];

	    // 验证码验证
	    if($_SESSION['verify'] != md5($_POST['yzm'])) {
	       $data['bool']=false;
	        $data['info']='验证码错误!';
	        $this->ajaxreturn($data);
	        return;
	    }
	    $user = $_POST['user'];
	    $u = M('userlist');
	    $list=$u->where("user='$user'")->find();
	    // 验证用户名
	   if(!$list){
	        $data['info']="用户名不正确!";
	        $data['bool']= 0;
	        $this->ajaxreturn($data);
	        return;
	   }
	   // 判断密码是否正确
	   if($list['upass'] == md5(md5($pass))){
		   	session("uid",$list['uid']);//用户id
		   	session("idnumber",$list['idnumber']);//用户id编号
	        $data["bool"]= true;
	        $data["info"]= "登录成功,正在跳转";
	        $data['link']= U('Person/index')."?id=".$list['idnumber'];
	        $this->ajaxreturn($data);
	   }else{
		   	$data["bool"]= 0;
		   	$data["info"]= "密码错误!";
	        $this->ajaxreturn($data);
	   }

	}
	// 注册页面
	public function reg(){
		$this->display();
	}	
	// 执行注册
	public function doreg(){
		$model = D("Common");//Model文件名
		$data['user'] = $_POST['user'];//用户名
		$data['upass'] = md5(md5($_POST['pass']));//密码
		$data['idnumber'] = time();//注册id
		$data['email'] = $_POST['email'];//邮箱，用于找回密码
		$msg = $model->addUser($data);//获取返回的信息
		$this->ajaxReturn($msg);
	}
	// 退出
	public function logout(){
		$id = session("idnumber");
		session("id",null);
		session("idnumber",null);
		session(null);
		$this->redirect("Person/index?id=$id");
	}
}