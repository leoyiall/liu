<?php
class QuestionAction extends Action {
	// 构造函数
    public function __construct(){
        if(!session('id')){
            $this->redirect("Login/index");
        }
    }
    // 问题列表
	public function index(){
		// 获取后台登录的用户的方法
		$model = D('Adminblog');
		$data = $model->getAdminUser();
		$this->assign("data",$data);
        $m = D('AdminQuestion');
        $so = $_POST['so'];
        if($so){
            //查询对应的问题
            $bl = $m->searchQuestion($so);
        }else{
            //获取全部问题
            $bl = $m->questionAll();
        }   
        $this->assign("list",$bl['list']);
        $this->assign("show",$bl['show']);
		$this->display();
    }
    // 删除问题
    public function doDelete(){
    	$id = $_GET['id'];
    	$model = D('AdminQuestion');
    	$list = $model->deleteQuestion($id);
    	if($list){
    	    $info = "问题删除成功!";
    	}else{
    	    $info = "问题删除失败!";
    	}
    	$this->ajaxReturn($info);
    }
    // 获取评论列表
    public function commentManage(){
    	// 获取后台登录的用户的方法
    	$model = D('Adminblog');
    	$data = $model->getAdminUser();
    	$this->assign("data",$data);
        $m = D('AdminQuestion');
    	$so = $_POST['so'];
    	if($so){
    		$bl = $m->searchQuestionComment($so);
    	}else{
    	// 获取评论列表
	    	$bl = $m->getQuestionComment();
	    }
    	$this->assign("list",$bl['list']);
    	$this->assign("show",$bl['show']);
    	$this->display();
    }
    // 删除评论
    public function deleteComment(){
    	$id = $_GET['id'];
    	$model = D('AdminQuestion');
    	$list = $model->deleteCommet($id);
    	if($list){
    	    $info = "删除成功!";
    	}else{
    	    $info = "删除失败!";
    	}
    	$this->ajaxReturn($info);
    }
    // 添加分类
    public function addSort(){
        // 获取后台登录的用户的方法
        $model = D('Adminblog');
        $data = $model->getAdminUser();
        $this->assign("data",$data);
        $m = D('AdminQuestion');
        $data=$m->getQuestionType();
        $this->assign("list",$data['list']);
        $this->assign("show",$data['show']);
        $this->display();
    }
    // 添加分类
    public function doAddSort(){
        $data['typename'] = $_POST['state'];
        if($data['typename']==""){
            return;
        }
        $s = M('questiontype');
        $list = $s->data($data)->add();
        if($list){
            $data['info']="添加分类成功!";
        }else{
            $data['info']="添加分类失败!";
        }
        $this->ajaxReturn($data);
    }
    // 删除分类
     public function delCategory(){
        $id = $_GET['id'];
        $s = M('questiontype');
        $list = $s->where("tid='$id'")->delete();
        if($list){
            $this->redirect("addSort");
        }else{
            $this->error("请刷新页面，再删除");
        }
     }  
    // 修改分类
    public function modifyCategory(){
        $id = $_GET['id'];
        $state['typename'] = $_GET['con'];
        $s = M('questiontype');
        $list = $s->where("tid='$id'")->save($state);
        if($list){
            $info = "修改分类成功";
        }else{
            $info = "修改分类失败";
        }
        $this->ajaxReturn($info);
    } 
}