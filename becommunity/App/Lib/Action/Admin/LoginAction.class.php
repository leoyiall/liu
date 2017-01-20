<?php
class LoginAction extends Action {
	public function index(){
		$this->display();
    }
    // 验证码
    Public function verify(){
        import('ORG.Util.Image');
        Image::buildImageVerify();
    }
    // 执行登录
    public function dologin(){
    	// 如果传送过来没有数据就提示没有数据
    	if(empty($_POST)){
            $data['bool']=false;
    		$data["info"]="没有数据，请刷新后重试！";
    		$this->ajaxreturn($data);
    		return;
    	}
        $pass = $_POST['pass'];
    	$code = $_POST['yzm'];
        // 验证码验证
        if($_SESSION['verify'] != md5($_POST['yzm'])) {
            $data['bool']=false;
            $data['info']='验证码错误!';
            $this->ajaxreturn($data);
            return;
        }
        $user = $_POST['user'];
        $u = M('user');
        $list=$u->where("user='$user'")->find();
        // 验证用户名
       if(!$list){
            $data['info']="用户名不正确!";
            $this->ajaxreturn($data);
            return;
       }
       // 判断密码是否正确
       if($list['pass'] == md5($pass)){
            $data["bool"]=true;
            $data["info"]="登录成功,正在跳转";
            $data['link']=U('Index/index');
            session("id",$list['id']);
            $this->ajaxreturn($data);
       }else{
            $data['bool']=false;
            $data['info'] = "登录失败,密码错误!";
            $this->ajaxreturn($data);
            return; 
       }

    }
    // 退出
    function logout(){
        session("id",null);
        session("gly",null);
        session(null);
        $this->redirect("Login/index");
    }
}