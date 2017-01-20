<?php
class BlogAction extends Action {
	// 构造函数
    public function __construct(){
        if(!session('id')){
            $this->redirect("Login/index");
        }
    }
    // 博文列表
	public function index(){
		// 获取后台登录的用户的方法
		$model = D('Adminblog');
		$data = $model->getAdminUser();
		$this->assign("data",$data);
		// 获取博文列表
    	$so = $_POST['so'];
    	if($so){
    		$bl = $model->getBlogList($so);
    	}else{
    		// 获取留言列表
    		$bl = $model->getBlogList();
	    }
		$this->assign("list",$bl['list']);
		$this->assign("show",$bl['show']);
		$this->display();
    }
    // 删除博文
    public function doDelete(){
    	$id = $_GET['id'];
    	$model = D('Adminblog');
    	$list = $model->deleteBlog($id);
    	if($list){
    	    $info = "文章删除成功!";
    	}else{
    	    $info = "文章删除失败!";
    	}
    	$this->ajaxReturn($info);
    }
    // 留言管理列表
    public function messageManage(){
    	// 获取后台登录的用户的方法
    	$model = D('Adminblog');
    	$data = $model->getAdminUser();
    	$this->assign("data",$data);
    	// 搜索和列表共存
    	$so = $_POST['so'];
    	if($so){
    		$bl = $model->getBlogMessage($so);
    	}else{
    		// 获取留言列表
    		$bl = $model->getBlogMessage();
	    }
    	$this->assign("list",$bl['list']);
    	$this->assign("show",$bl['show']);
    	$this->display();
    }
    // 删除留言
    public function deleteMessage(){
    	$id = $_GET['id'];
    	$model = D('Adminblog');
    	$list = $model->deleteMessage($id);
    	if($list){
    	    $info = "留言删除成功!";
    	}else{
    	    $info = "留言删除失败!";
    	}
    	$this->ajaxReturn($info);
    }
    // 获取评论列表
    public function commentManage(){
    	// 获取后台登录的用户的方法
    	$model = D('Adminblog');
    	$data = $model->getAdminUser();
    	$this->assign("data",$data);
    	$so = $_POST['so'];
    	if($so){
    		$bl = $model->getBlogComment($so);
    	}else{
    	// 获取评论列表
	    	$bl = $model->getBlogComment();
	    }
    	$this->assign("list",$bl['list']);
    	$this->assign("show",$bl['show']);
    	$this->display();
    }
    // 通过审核
    public function passComment(){
        $id = $_GET['id'];
        $model = M('Comment');
        $data['pass'] = 1;
        $list = $model->where("cid='$id'")->save($data);
        if($list){
            $info = "审核成功!";
        }else{
            $info = "审核失败!";
        }
        $this->ajaxReturn($info); 
    }
    // 删除评论
    public function deleteComment(){
    	$id = $_GET['id'];
    	$model = D('Adminblog');
    	$list = $model->deleteCommet($id);
    	if($list){
    	    $info = "删除成功!";
    	}else{
    	    $info = "删除失败!";
    	}
    	$this->ajaxReturn($info);
    }
}