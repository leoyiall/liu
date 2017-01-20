<?php
class AdminlistAction extends Action {
	// 构造函数
    public function __construct(){
        if(!session('id')){
            $this->redirect("Login/index");
        }
    }
    // 用户列表
	public function index(){
		$id = session("id");
		// 获取后台登录的用户的方法
		$model = D('Adminblog');
		$data = $model->getAdminUser();
		$this->assign("data",$data);
        $m = D('Adminlist');
        $so = $_POST['so'];
        if($so){
        	$l = $m->getSearchList($so);//搜索管理员
        }else{
        	$l = $m->getUserList();//全部管理员列表
        }
        $this->assign("list",$l['list']);
        $this->assign("show",$l['show']);
        $this->assign("id",$id);
        $this->display();
	}
	// 删除管理员
	public function doDelete(){
		$id = $_GET['id'];
		$model = D('Adminlist');
		$list = $model->deleteAdmin($id);
		if($list){
		    $info = "管理员删除成功!";
		}else{
		    $info = "管理员删除失败!";
		}
		$this->ajaxReturn($info);
	}
		// 删除用户
	public function doDeleteUser(){
		$id = $_GET['id'];
		$model = D('Adminlist');
		$list = $model->deleteUser($id);
		if($list){
		    $info = "用户删除成功!";
		}else{
		    $info = "用户删除失败!";
		}
		$this->ajaxReturn($info);
	}
	// 添加管理员
	public function addAdmin(){
		// 获取后台登录的用户的方法
		$model = D('Adminblog');
		$data = $model->getAdminUser();
		$this->assign("data",$data);
		$this->display();
	}
	// 添加管理员
	public function doAddAdmin(){
		$data['user'] = $_POST['user'];
		$data['pass'] = md5($_POST['password']);
		$data['nicheng'] = "Be程序员".time();
		$data['introduce'] = "Be程序员专员";
		$data['power'] = $_POST['power'];
		$u = M('user');
		$l = $u->data($data)->add();
		if($l){
			$this->redirect("index");
		}else{
			$this->error("用户名重复!");
		}
	}
	// 用户列表
		public function userlist(){
			$id = session("id");
			// 获取后台登录的用户的方法
			$model = D('Adminblog');
			$data = $model->getAdminUser();
			$this->assign("data",$data);
	        $m = D('Adminlist');
	        $so = $_POST['so'];
	        if($so){
	        	$l = $m->getSearchYonghu($so);//搜索管理员
	        }else{
	        	$l = $m->getList();//全部管理员列表
	        }
	        $this->assign("list",$l['list']);
	        $this->assign("show",$l['show']);
	        $this->assign("id",$id);
	        $this->display();
		}
		// 修改管理员
	public function modifyAdmin(){
		// 获取后台登录的用户的方法
		$model = D('Adminblog');
		$data = $model->getAdminUser();
		$this->assign("data",$data);
		$id = $_GET['id'];
		$u = M('user');
		$l = $u->where("id='$id'")->find();
		$this->assign("l",$l);
		$this->display();
	}
		// 修改管理员列表 
	public function doModifyAdmin(){
		$id = $_POST['ids'];
		if($_POST['password'] == ''){
			$data['pass'] = $_POST['pass'];
		}else{
			$data['pass'] = md5($_POST['password']);
		}
		$data['power'] = $_POST['power'];//权限
		$m = M('user');
		$l = $m->where("id='$id'")->save($data);
		if($l){
			$this->success("修改成功!");
		}else{
			$this->error('修改失败!');
		}
	}
}