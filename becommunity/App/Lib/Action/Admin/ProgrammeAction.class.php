<?php
class ProgrammeAction extends Action {
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
        $m = D('AdminProgramme');
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
	// 添加章节
	public function addCate(){
		// 获取后台登录的用户的方法
		$model = D('Adminblog');
		$data = $model->getAdminUser();
		$this->assign("data",$data);
		// 获取章节
		$m = D('AdminProgramme');
		$c=$m->getProCate();
		$this->assign("list",$c['list']);
		$this->assign("show",$c['show']);
		$this->display();
	}
	// 执行添加
	public function doAddSort(){
		$data['zname'] = $_POST['state'];
		if($data['zname']==""){
		    return;
		}
		$s = M('procate');
		$list = $s->data($data)->add();
		if($list){
		    $data['info']="添加章节成功!";
		}else{
		    $data['info']="添加章节失败!";
		}
		$this->ajaxReturn($data);
	}
	// 修改章节
	public function modifyCategory(){
	    $id = $_GET['id'];
	    $state['zname'] = $_GET['con'];
	    $s = M('procate');
	    $list = $s->where("id='$id'")->save($state);
	    if($list){
	        $info = "修改分类成功";
	    }else{
	        $info = "修改分类失败";
	    }
	    $this->ajaxReturn($info);
	} 
	// 删除章节
	 public function delCategory(){
	    $id = $_GET['id'];
	    $s = M('procate');
	    $list = $s->where("id='$id'")->delete();
	    if($list){
	        $this->redirect("addCate");
	    }else{
	        $this->error("请刷新页面，再删除");
	    }
	 } 
	 // 添加编程库
	 public function addProgramme(){
	 	// 获取后台登录的用户的方法
	 	$model = D('Adminblog');
	 	$data = $model->getAdminUser();
	 	$this->assign("data",$data);
	 	$m = D('AdminQuestion');
	 	$code=$m->getAllTypeList();//分配分类
	 	$this->assign("list",$code);
	 	$this->display();
	 }
	 // 执行添加编程库
	 public function doAddProgramme(){
	 	$id = session("id");
	 	$data['title'] = $_POST['title'];//标题
	 	$data['introduce'] = $_POST['introduce'];//介绍
	 	$data['sort'] = $_POST['sort'];//分类
	 	$data['user_id'] = $id;//发布人的id
	 	$data['sendTime'] = time();//发布人的id
	 	import('ORG.Net.UploadFile');
	 	$upload = new UploadFile();// 实例化上传类
	 	$upload->maxSize  = 3145728 ;// 设置附件上传大小
	 	$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
	 	$upload->savePath =  './Public/Uploads/programme/';// 设置附件上传目录
	 	if(!$upload->upload()) {// 上传错误提示错误信息
	 		$this->error($upload->getErrorMsg());
	 	}else{// 上传成功 获取上传文件信息
	 		$info =  $upload->getUploadFileInfo();
	 	}
	 	$data['logo'] = $info[0]['savename']; //logo
	 	$data['bgimg'] = $info[1]['savename']; //背景图
	 	$l = M('programme');
	 	$list = $l->data($data)->add();
	 	if($list){
	 	    $this->redirect("index");
	 	}else{
	 	    $this->error("系统故障!");
	 	}
	 }
	 // 修改编程库
	 public function modifyProgramme(){
	     $id = $_GET['id'];
	     $l = M('programme_list');
	     $c = $l->where("id='$id'")->find();
	     $model = D('Adminblog');
	     $data = $model->getAdminUser();
	     $this->assign("data",$data);
	     $m = D('AdminQuestion');
	     $cc=$m->getAllTypeList();//分配分类
	     $this->assign("list",$cc);
	     $this->assign("c",$c);
	     $this->display();
	 }
	 // 执行修改编程库
	 public function doModifyProgramme(){
	 	$id = $_POST['ids'];
		$data['title'] = $_POST['title'];//标题
	 	$data['introduce'] = $_POST['introduce'];//介绍
	 	$data['sort'] = $_POST['sort'];//分类
	 	$data['sendTime'] = time();//发布人的id
	 	import('ORG.Net.UploadFile');
	 	$upload = new UploadFile();// 实例化上传类
	 	$upload->maxSize  = 3145728 ;// 设置附件上传大小
	 	$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
	 	$upload->savePath =  './Public/Uploads/programme/';// 设置附件上传目录
	 	if($upload->upload()) {
	 		$info =  $upload->getUploadFileInfo();
	 		$data['logo'] = $info[0]['savename']; //logo
	 		$data['bgimg'] = $info[1]['savename']; //背景图
	 	}else{
	 		$data['logo'] = $_POST['pho1'];//logo
	 		$data['bgimg'] = $_POST['pho2'];//背景图
	 	}
	 	$l = M('programme');
	 	$list = $l->where("id='$id'")->save($data);
	 	if($list){
	 	    $this->redirect("index");
	 	}else{
	 	    $this->error("系统故障!");
	 	}
	 }
	 // 删除编程库
	 public function doDelete(){
	 	$id = $_GET['id'];
	 	$model = D('AdminProgramme');
	 	$list = $model->deleteQuestion($id);
	 	if($list){
	 	    $info = "编程库删除成功!";
	 	}else{
	 	    $info = "编程库删除失败!";
	 	}
	 	$this->ajaxReturn($info);
	 }
	 // 添加课程
	 public function addCourse(){
	 	// 获取后台登录的用户的方法
	 	$model = D('Adminblog');
	 	$data = $model->getAdminUser();
	 	$this->assign("data",$data);
	 	$m = D('AdminProgramme');
	 	$code=$m->getProgrammelist();//获取全部编程库
	 	$this->assign("list",$code);
	 	$this->display();
	 }
	 // 执行添加课程
	 public function doAddCourse(){
	 	$id = session("id");
	 	$data['pid'] = $_POST['pid'];//编程库id
	 	$data['course'] = $_POST['title'];//编程库标题
	 	$data['teacher'] = $_POST['teacher'];//老师
	 	$data['introduce'] = $_POST['introduce'];//老师介绍
	 	$data['cintroduce'] = $_POST['cintroduce'];//课程介绍
	 	$data['plan'] = $_POST['plan'];//教学计划
	 	$data['target'] = $_POST['target'];//教学目标
	 	$data['who'] = $id;//发布人的id
	 	$data['sendTime'] = time();//发布人的id
	 	import('ORG.Net.UploadFile');
	 	$upload = new UploadFile();// 实例化上传类
	 	$upload->maxSize  = 3145728 ;// 设置附件上传大小
	 	$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
	 	$upload->savePath =  './Public/Uploads/learn/';// 设置附件上传目录
	 	if(!$upload->upload()) {// 上传错误提示错误信息
	 		$this->error($upload->getErrorMsg());
	 	}else{// 上传成功 获取上传文件信息
	 		$info =  $upload->getUploadFileInfo();
	 	}
	 	$data['logo'] = $info[0]['savename']; //logo
	 	$l = M('procourse');
	 	$list = $l->data($data)->add();
	 	if($list){
	 	    $this->redirect("courseList");
	 	}else{
	 	    $this->error("系统故障!");
	 	}
	 }
	 // 课程列表
	 public function courseList(){
	 	// 获取后台登录的用户的方法
	 	$model = D('Adminblog');
	 	$data = $model->getAdminUser();
	 	$this->assign("data",$data);
	 	$m = D('AdminProgramme');
	 	$so = $_POST['so'];
	 	if($so){
	 	    //查询对应的问题
	 	    $bl = $m->searchCourse($so);
	 	}else{
	 	    //获取全部问题
	 	    $bl = $m->courseAll();
	 	}   
	 	$this->assign("list",$bl['list']);
	 	$this->assign("show",$bl['show']);
	 	$this->display();
	 }
	 // 课程管理列表
	 public function toDoIt(){
	 	$id = $_GET['id'];
	 	$bs = $_GET['bs'];
	 	$model = D('AdminProgramme');
	 	switch($bs){
	 		case "del":
	 			$list = $model->deleteCourse($id);
	 		break;
	 		case "ov":
	 			$list = $model->overCourse($id);
	 		break;
	 		case "nov":
	 			$list = $model->nOverCourse($id);
	 		break;
	 	}
	 	if($list){
	 	    $info = "操作成功!";
	 	}else{
	 	    $info = "操作失败!";
	 	}
	 	$this->ajaxReturn($info);
	 }
	 // 修改课程
	 public function modifyCourse(){
	 	$id = $_GET['id'];
	 	$l = M('procourse_list');
	 	$c = $l->where("id='$id'")->find();
	 	$model = D('Adminblog');
	 	$data = $model->getAdminUser();
	 	$this->assign("data",$data);
	 	$m = D('AdminProgramme');
	 	$cc=$m->getProgrammelist();//获取全部编程库
	 	$this->assign("list",$cc);
	 	$this->assign("c",$c);
	 	$this->display();
	 }
	 // 执行修改课程
	 public function doModifyCourse(){
	 	 	$id = $_POST['ids'];
	 		$data['pid'] = $_POST['pid'];
	 		$data['course'] = $_POST['title'];
	 	 	$data['introduce'] = $_POST['introduce'];
	 	 	$data['cintroduce'] = $_POST['cintroduce'];
	 	 	$data['teacher'] = $_POST['teacher'];
	 	 	$data['target'] = $_POST['target'];
	 	 	$data['plan'] = $_POST['plan'];
	 	 	import('ORG.Net.UploadFile');
	 	 	$upload = new UploadFile();// 实例化上传类
	 	 	$upload->maxSize  = 3145728 ;// 设置附件上传大小
	 	 	$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
	 	 	$upload->savePath =  './Public/Uploads/programme/';// 设置附件上传目录
	 	 	if($upload->upload()) {
	 	 		$info =  $upload->getUploadFileInfo();
	 	 		$data['logo'] = $info[0]['savename']; //logo
	 	 	}else{
	 	 		$data['logo'] = $_POST['pho'];//logo
	 	 	}
	 	 	$l = M('procourse');
	 	 	$list = $l->where("id='$id'")->save($data);
	 	 	if($list){
	 	 	    $this->redirect("courseList");
	 	 	}else{
	 	 	    $this->error("系统故障!");
	 	 	}
	 }
	 // 执行章节名字添加
	 public function addCategory(){
	 	// 获取后台登录的用户的方法
	 	$model = D('Adminblog');
	 	$data = $model->getAdminUser();
	 	$this->assign("data",$data);
		$m = D('AdminProgramme');
		// 获取全部没有完结的课程
		$all = $m->getAllCourseList();
		$zj = $m->getAllZhangList();//获取章节
		$this->assign("list",$all);
		$this->assign("lz",$zj);
	 	$this->display();
	 }
	 // 添加章节名称
	 public function doAddChapter(){
	 	$id = session("id");
	 	$data['zid'] = $_POST['zid'];//第几章节
	 	$data['zname'] = $_POST['title'];//章节名称
	 	$data['pid'] = $_POST['pid'];//课程id
	 	$data['sendTime'] = time();//课程id
	 	$l = M('procategory');
	 	$list = $l->data($data)->add();
	 	if($list){
	 	    $this->redirect("chapterList");
	 	}else{
	 	    $this->error("系统故障!");
	 	}
	 }
	 // 章节管理列表
	 public function chapterList(){
		// 获取后台登录的用户的方法
		$model = D('Adminblog');
		$data = $model->getAdminUser();
		$this->assign("data",$data);
        $m = D('AdminProgramme');
        $so = $_POST['so'];
        if($so){
            //查询对应的问题
            $bl = $m->searchCategory($so);
        }else{
            //获取全部问题
            $bl = $m->categoryAll();
        }   
        $this->assign("list",$bl['list']);
        $this->assign("show",$bl['show']);
	 	$this->display();
	 }
	 // 执行修改章节名称
	 public function modifyChapter(){
	 	$id = $_GET['id'];
	 	$l = M('programme_list');
	 	$c = $l->where("id='$id'")->find();
	 	$model = D('Adminblog');
	 	$data = $model->getAdminUser();
	 	$this->assign("data",$data);
	 	$m = D('AdminProgramme');
	 	// 获取全部没有完结的课程
	 	$all = $m->getAllCourseList();
	 	$zj = $m->getAllZhangList();//获取章节
	 	$l = M('procategory_list');
	 	$c = $l->where("id='$id'")->find();
	 	$this->assign("c",$c);
	 	$this->assign("list",$all);
	 	$this->assign("lz",$zj);
	 	$this->display();
	 }
	 // 执行修改
	 public function doModifyChapter(){
 	 	$id = $_POST['ids'];
	 	$data['zid'] = $_POST['zid'];//第几章节
	 	$data['zname'] = $_POST['title'];//章节名称
	 	$data['pid'] = $_POST['pid'];//课程id
 	 	$l = M('procategory');
 	 	$list = $l->where("id='$id'")->save($data);
 	 	if($list){
 	 	    $this->redirect("chapterList");
 	 	}else{
 	 	    $this->error("系统故障!");
 	 	}
	 }
	 // 删除章节
	 public function deleteChapter(){
	 	$id = $_GET['id'];
	 	$model = D('AdminProgramme');
	 	$list = $model->deleteChapter($id);
	 	if($list){
	 	    $info = "删除成功!";
	 	}else{
	 	    $info = "删除失败!";
	 	}
	 	$this->ajaxReturn($info);
	 }
	 // 精彩收录审核
	 public function shoulu(){
		// 获取后台登录的用户的方法
		$model = D('Adminblog');
		$data = $model->getAdminUser();
		$this->assign("data",$data);
        $m = D('AdminProgramme');
        $so = $_POST['so'];
        if($so){
            //查询对应的问题
            $bl = $m->searchProgramme($so,0);
        }else{
            //获取全部问题
            $bl = $m->programmeAll(0);
        }   
        $this->assign("list",$bl['list']);
        $this->assign("show",$bl['show']);
	 	$this->display();
	 }
	 // 收录话题
	 public function getTitle(){
	 	$id = $_GET['id'];
	 	$model = D('AdminProgramme');
	 	$list = $model->getTitle($id);
	 	if($list){
	 	    $info = "收录成功!";
	 	}else{
	 	    $info = "收录失败!";
	 	}
	 	$this->ajaxReturn($info);
	 }
	 // 取消收录
	 public function cancleTitle(){
	 	$id = $_GET['id'];
	 	$model = D('AdminProgramme');
	 	$list = $model->cancleTitle($id);
	 	if($list){
	 	    $info = "取消成功!";
	 	}else{
	 	    $info = "取消失败!";
	 	}
	 	$this->ajaxReturn($info);
	 }
	 // 收录管理
 	 public function shouluList(){
 		// 获取后台登录的用户的方法
 		$model = D('Adminblog');
 		$data = $model->getAdminUser();
 		$this->assign("data",$data);
         $m = D('AdminProgramme');
         $so = $_POST['so'];
         if($so){
             //查询对应的问题
             $bl = $m->searchProgramme($so,1);
         }else{
             //获取全部问题
             $bl = $m->programmeAll(1);
         }   
         $this->assign("list",$bl['list']);
         $this->assign("show",$bl['show']);
 	 	$this->display();
 	 }
 	 // 添加知识导图
 	 public function addpit(){
 	 	// 获取后台登录的用户的方法
 	 	$model = D('Adminblog');
 	 	$data = $model->getAdminUser();
 	 	$this->assign("data",$data);
 	 	$m = D('AdminProgramme');
 	 	$code=$m->getProgrammelist();//分配分类
 	 	$this->assign("list",$code);
 	 	$this->display();
 	 }
 	 // 执行添加编程库
 	 public function doAddpit(){
 	 	$id = session("id");
 	 	$data['bid'] = $_POST['bid'];//编程库id
 	 	$data['who'] = $id;//发布人的id
 	 	$data['sendTime'] = time();//发布人的id
 	 	import('ORG.Net.UploadFile');
 	 	$upload = new UploadFile();// 实例化上传类
 	 	$upload->maxSize  = 3145728 ;// 设置附件上传大小
 	 	$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
 	 	$upload->savePath =  './Public/Uploads/learn/';// 设置附件上传目录
 	 	if(!$upload->upload()) {// 上传错误提示错误信息
 	 		$this->error($upload->getErrorMsg());
 	 	}else{// 上传成功 获取上传文件信息
 	 		$info =  $upload->getUploadFileInfo();
 	 	}
 	 	$data['pit'] = $info[0]['savename']; //logo
 	 	$l = M('propit');
 	 	$list = $l->data($data)->add();
 	 	if($list){
 	 	    $this->redirect("pitList");
 	 	}else{
 	 	    $this->error("系统故障!");
 	 	}
 	 }
 	 // 知识导图列表
 	 public function pitList(){
		// 获取后台登录的用户的方法
		$model = D('Adminblog');
		$data = $model->getAdminUser();
		$this->assign("data",$data);
        $m = D('AdminProgramme');
        $so = $_POST['so'];
        if($so){
            //查询对应的问题
            $bl = $m->searchLearn($so);
        }else{
            //获取全部问题
            $bl = $m->learnAll();
        }   
        $this->assign("list",$bl['list']);
        $this->assign("show",$bl['show']);
		$this->display();
 	 }
 	 // 删除导图
 	 public function deleteLearn(){
 	 	$id = $_GET['id'];
 	 	$model = D('AdminProgramme');
 	 	$list = $model->deleteLearn($id);
 	 	if($list){
 	 	    $info = "知识导图删除成功!";
 	 	}else{
 	 	    $info = "知识导图删除失败!";
 	 	}
 	 	$this->ajaxReturn($info);
 	 }
 	 // 发布视频课程
 	 public function sendVedio(){
		// 获取后台登录的用户的方法
		$model = D('Adminblog');
		$data = $model->getAdminUser();
		$this->assign("data",$data);
        $m = D('AdminProgramme');
        $bool = $m->getAllCourseList();
        $this->assign("list",$bool);
 	 	$this->display();
 	 }
 	 // 获取章节列表
 	 public function getChapterList(){
 	 	$id = $_GET['id'];
 	 	$l = M('procategory_list');
 	 	$info = $l->where("pid='$id'")->select();	
 	 	$this->ajaxReturn($info);
 	 }
 	 // 执行保存课程
 	 public function doAddVedio(){
 	 	$data['cname'] = $_POST['title'];//课程名
 	 	$data['zid'] = $_POST['zid'];//章节
 	 	$data['chose'] = $_POST['chose'];//选择
 	 	 if($_POST['chose'] == 1){
 	 	 	$data['content'] = $_POST['content'];//视频内容
 	 	 }else{
 	 	 	import('ORG.Net.UploadFile');
 	 	 	$upload = new UploadFile();// 实例化上传类
 	 	 	//$upload->maxSize  = 3145728 ;// 设置附件上传大小
 	 	 	$upload->allowExts  = array('avi', 'wma', 'rmvb','rm', 'flash','mp4','wmv','flv');// 设置附件上传类型
 	 	 	$upload->savePath =  './Public/Vedio/';// 设置附件上传目录
 	 	 	if(!$upload->upload()) {// 上传错误提示错误信息
 	 	 		$this->error($upload->getErrorMsg());
 	 	 	}else{// 上传成功 获取上传文件信息
 	 	 		$info =  $upload->getUploadFileInfo();
 	 	 		var_dump($info);
 	 	 	}
 	 	 	$data['content'] = $info[0]['savename'];
 	 	 }
 	 	$data['pid'] = $_POST['pid'];//课程Id
 	 	$data['sendTime'] = time();//发布人的id
 	 	$l = M('procourselist');
 	 	$s = $l->data($data)->add();
 	 	if($s){
 	 		$this->redirect("vedioList");
 	 	}else{
 	 		$this->error('系统故障!');
 	 	}
 	 }
 	 // 视频课程列表
 	 public function vedioList(){
 	 	// 获取后台登录的用户的方法
		$model = D('Adminblog');
		$data = $model->getAdminUser();
		$this->assign("data",$data);
		$m = D('AdminProgramme');
		$so = $_POST['so'];
		if($so){
		    //查询对应
		    $bool = $m->searchVedio($so);
		}else{
		    $bool = $m->getAllVedio();
		}   
		$this->assign("list",$bool['list']);
		$this->assign("show",$bool['show']);
 	 	$this->display();
 	 }
 	 // 删除视频
 	 public function deleteVedio(){
 	 	$id = $_GET['id'];
 	 	$model = D('AdminProgramme');
 	 	$list = $model->deleteVedio($id);
 	 	if($list){
 	 	    $info = "删除成功!";
 	 	}else{
 	 	    $info = "删除失败!";
 	 	}
 	 	$this->ajaxReturn($info);
 	 }
 	 // 修改课程
 	 public function modifyVedio(){
 	 	$id = $_GET['id'];
 	 	$l = M('course_list');
 	 	$c = $l->where("id='$id'")->find();
 	 	$model = D('Adminblog');
 	 	$data = $model->getAdminUser();
 	 	$this->assign("data",$data);
 	 	$m = D('AdminProgramme');
        $cc = $m->getAllCourseList();
 	 	$this->assign("list",$cc);
 	 	$this->assign("c",$c);
 	 	$this->display();
 	 }
 	 // 执行修改视频
 	 public function doModifyVedio(){
 	 	 	$id = $_POST['ids'];
 	 		$data['cname'] = $_POST['title'];//课程名
 	 		$data['zid'] = $_POST['zid'];//章节
 	 		$data['content'] = $_POST['content'];//视频内容
 	 		$data['pid'] = $_POST['pid'];//课程Id
 	 	 	$l = M('procourselist');
 	 	 	$list = $l->where("id='$id'")->save($data);
 	 	 	if($list){
 	 	 	    $this->redirect("vedioList");
 	 	 	}else{
 	 	 	    $this->error("系统故障!");
 	 	 	}
 	 }
 	 // 视频评论
 	 public function vedioCommentList(){
 	 	$model = D('Adminblog');
 	 	$data = $model->getAdminUser();
 	 	$this->assign("data",$data);
 	 	$this->display();
 	 }
}