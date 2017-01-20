<?php
class CodeAction extends Action {
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
        $m = D('AdminCode');
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
    // 发布源码
    public function commentManage(){
        // 获取后台登录的用户的方法
        $model = D('Adminblog');
        $data = $model->getAdminUser();
        $this->assign("data",$data);
        $m = D('AdminCode');
        $data=$m->getQuestionType();//分配分类
        $this->assign("list",$data['list']);
        $this->display();
    }
    // 发布源码信息
    public function doAddCode(){
        $id = session("id");
        $data['title'] = $_POST['title'];//源码标题
        $data['content'] = $_POST['content'];//软件说明
        $data['introduce'] = $_POST['introduce'];//软件介绍
        $data['link'] = $_POST['link'];//下载路径
        $data['keywords'] = $_POST['keywords'];//关键词
        $data['look'] = $_POST['look'];//演示链接
        $data['big'] = $_POST['softbig'];//软件大小
        $data['sort'] = $_POST['sort'];//分类
        $data['user_id'] = $id;//发布人的id
        $data['sendTime'] = time();//发布人的id
        $l = M('codelist');
        $list = $l->data($data)->add();
        if($list){
            $this->redirect("index");
        }else{
            $this->error("系统故障!");
        }
    }
    // 删除问题
    public function doDelete(){
    	$id = $_GET['id'];
    	$model = D('AdminCode');
    	$list = $model->deleteQuestion($id);
    	if($list){
    	    $info = "源码删除成功!";
    	}else{
    	    $info = "源码删除失败!";
    	}
    	$this->ajaxReturn($info);
    }

    // 添加分类
    public function addSort(){
        // 获取后台登录的用户的方法
        $model = D('Adminblog');
        $data = $model->getAdminUser();
        $this->assign("data",$data);
        $m = D('AdminCode');
        $data=$m->getQuestionType();
        $this->assign("list",$data['list']);
        $this->assign("show",$data['show']);
        $this->display();
    }
    // 添加分类
    public function doAddSort(){
        $data['sort'] = $_POST['state'];
        if($data['sort']==""){
            return;
        }
        $s = M('codesort');
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
        $s = M('codesort');
        $list = $s->where("cid='$id'")->delete();
        if($list){
            $this->redirect("addSort");
        }else{
            $this->error("请刷新页面，再删除");
        }
     }  
    // 修改分类
    public function modifyCategory(){
        $id = $_GET['id'];
        $state['sort'] = $_GET['con'];
        $s = M('codesort');
        $list = $s->where("cid='$id'")->save($state);
        if($list){
            $info = "修改分类成功";
        }else{
            $info = "修改分类失败";
        }
        $this->ajaxReturn($info);
    } 
    // 修改源码
    public function modifyCode(){
        $id = $_GET['id'];
        $l = M('code_list');
        $c = $l->where("id='$id'")->find();
        $model = D('Adminblog');
        $data = $model->getAdminUser();
        $this->assign("data",$data);
        $m = D('AdminCode');
        $data=$m->getQuestionType();//分配分类
        $this->assign("list",$data['list']);
        $this->assign("c",$c);
        $this->display();
    }
    // 执行修改源码
    public function doModifyCode(){
        $id = $_POST['ids'];
        $data['title'] = $_POST['title'];//源码标题
        $data['content'] = $_POST['content'];//软件说明
        $data['introduce'] = $_POST['introduce'];//软件介绍
        $data['link'] = $_POST['link'];//下载路径
        $data['keywords'] = $_POST['keywords'];//关键词
        $data['look'] = $_POST['look'];//演示链接
        $data['big'] = $_POST['softbig'];//软件大小
        $data['sort'] = $_POST['sort'];//分类
        $l = M('codelist');
        $list = $l->where("id='$id'")->save($data);
        if($list){
            $this->redirect("index");
        }else{
            $this->error("系统故障!");
        }
    }
}