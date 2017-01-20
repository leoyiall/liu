<?php
class CommunityAction extends Action{
	// 获取是否在线的信息
	public function isLine(){
		$idnumber = session("idnumber");
		$this->assign("idnumber",$idnumber);
	}
	// 共同的都放在这里
	public function commonAction(){
		$id = $_GET['id'];
		$idnumber = session("idnumber");
		if(!$idnumber){
			$this->redirect("index");
		}
		$u = D('Community');
		// 获取登录用户的信息
		$ll = $this->userintro();
		$this->assign("ll",$ll);
	}
	// 问题首页
	public function index(){
		// 在线登录信息
		$this->isLine();
		// 获取登录用户的信息
		$ll = $this->userintro();
		// 获取对应的问题
		$model = D('Community');
		$idnumber = session("idnumber");
		// 1为热门，2为最新
		if($_GET['tab'] == "hot"){
			$bool = $model->getQuestionList($idnumber,1);//热门
		}else if($_GET['tab'] == "new"){
			// 最新
			$bool = $model->getQuestionList($idnumber,2);
		}else{
			// 默认全部
			$bool = $model->getQuestionList($idnumber,5);
		}
		$this->commonRight();
		$this->assign("queslist",$bool['list']);//取到的数据
		$this->assign("show",$bool['show']);//分页
		$this->assign("ll",$ll);
		$this->display();
	}
	// 右侧的个人信息
	public function userintro(){
		$idnumber = session("idnumber");
		$i = M('user_lev');
		$l = $i->where("user_id='$idnumber'")->find();
		return $l;
	}
	// 发布问题
	public function addQuestion(){
		if(!session("idnumber")){
			$this->redirect("Common/login");
		}
		$this->commonRight();
		$this->assign("idnumber",session("idnumber"));
		// 获取登录用户的信息
		$ll = $this->userintro();
		$this->assign("ll",$ll);
		// 获取分类列表
		$model = D('Question');
		$qlist = $model->getQuestionType();//问题类型
		// $olist = $model->getQuestionOffer();//提供的钱
		$this->assign("qlist",$qlist);
		// $this->assign("olist",$olist);
		$this->display();
	}
	// 保存发布的问题
	public function sendQuestion(){
		$idnumber = session('idnumber');
		$data['qtitle'] = $_POST['title'];//标题
		$data['qtype'] = $_POST['qtype'];//类型
		$data['user_id'] = session("idnumber");//问题所属人id
		$data['oid'] = 0;//悬赏
		$data['jinbi'] = $_POST['jinbi'];//自己多少个金币
		$data['qcontent'] = $_POST['content'];//问题描述
		$data['sendTime'] = time();//发布时间
		$model = D('Community');
		$bool = $model->sendQuestion($idnumber,$data);
		if(!$bool){
			$this->error('系统出现故障!');
		}else{
			$this->redirect("index");
		}
	}
	/*
	*个人中心
	*/
	public function personCenter(){
		$idnumber = session("idnumber");
		// 在线登录信息
		$this->isLine();
		$this->commonAction();
		$this->commonRight();//右侧的共有
	// 判断用户表里面是否有这个人的信息，不的话就直接存一个进去
		$model = D('Community');
		$bb = $model->getUserMessage($idnumber);
		// 是否升级了
		$bool = $model->modifyLev($idnumber);
		// 获取对应的话题
		$bool = $model->getQuestionIndex($idnumber);
		$b = $model->getNoState($idnumber);//未解决的10条
		$this->assign("noList",$b);
		$this->assign("queslist",$bool['list']);//取到的数据
		$this->assign("show",$bool['show']);//分页
		$this->display();
	}
	// 我的右侧的栏目列表
	public function commonRight(){
		$idnumber = session("idnumber");
		$model = D('Community');
		$nlist = $model->getList(10);//10条数,未解决问题
		$this->assign("nlist",$nlist);
	}
	// 修改资料
	public function modifyZiliao(){
		$id = $_GET['id'];
		$this->isLine();
		$this->commonAction();//右侧的共有
		$usid = $_POST['usid'];
		$u = D('Question');
		if($usid){
			import('ORG.Net.UploadFile');
			$upload = new UploadFile();// 实例化上传类
			$upload->maxSize  = 3145728 ;// 设置附件上传大小
			$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
			$upload->savePath =  './Public/Uploads/head/';// 设置附件上传目录
			$upload->uploadReplace = true;
			if($upload->upload()) {// 上传错误提示错误信息
				// 如果头像已经有了不上传也可以，第一次都需要上传头像
				$info =  $upload->getUploadFileInfo();
				$data['headimg'] = $info[0]['savename'];//图片名称
			}else{
				// 如果存在头像就直接把原来的名字覆盖
				$data['headimg'] = $_POST['headimg'];	
			}
			$data['nicheng'] = $_POST['nicheng'];//昵称
			$data['about'] = $_POST['about'];//自我介绍
			$data['know'] = $_POST['know'];//擅长领域
			$u = D('Question');
			$bool = $u->saveZiliao($usid,$data);
			if($bool){
				$this->redirect("personCenter?id=$id");	
			}else{
				$this->error('系统出现故障');
			}
		}
		$ly = $u->selectArea();//获取对应的领域
		$this->assign("ly",$ly);
		$this->display("modifyziliao");
	}
	// 问题详情页
	public function wenti(){
		$id = $_GET['id'];
		$this->isLine();
		// 获取登录用户的信息
		$ll = $this->userintro();
		$this->commonRight();//共同的右侧部分
		// 如果不存在对应的id文章就跳错
		if(!$id){
			$this->redirect("该页面丢失!");
		}
		// 获取对应id的文章的内容
		$model = D('Community');
		$bool = $model->getOneQuestion($id);
		$commentList = $model->getCommentList($id);
		$this->assign("com",$commentList);//分配回复过去
		$sight = $bool['sight']+1;//实现浏览加1
		$model->addSight($id,$sight);//执行添加一个浏览量
		$this->assign("qlist",$bool);
		$this->assign("idnumber",session("idnumber"));
		$this->assign("ll",$ll);
		$this->display("question");
	}
	// 执行删除文章，扣100积分
	public function delQuestion(){
		$id = $_GET['id'];
		$idnumber = session("idnumber");
		$model = D("Community");
		$list = $model->delQuestion($id,$idnumber);
		if($list){
			$this->redirect("personCenter?id=$idnumber");
		}else{
			$this->error('系统错误!');
		}
	}
	// 执行修改问题
	public function modifyQuestion(){
		$this->isLine();
		$ll = $this->userintro();
		$this->commonRight();
		$id = $_GET['id'];
		$model = D('Community');
		$qlist = $model->getQuestionType();//问题类型
		// $olist = $model->getQuestionOffer();//提供的钱
		$bool = $model->getQuestion($id);
		$this->assign("ll",$ll);
		$this->assign("q",$bool);
		$this->assign("qlist",$qlist);
		// $this->assign("olist",$olist);
		$this->display();
	}
	// 修改问题
	public function doModifyQuestion(){
		$id = $_POST['ids'];
		$data['qtitle'] = $_POST['title'];//标题
		$data['qtype'] = $_POST['qtype'];//类型
		$data['qcontent'] = $_POST['content'];//内容
		$m = M('Community');
		$l = $m->where("qid='$id'")->save($data);
		if($l){
			$this->redirect("wenti?id=$id");
		}else{
			$this->error("禁止修改问题!");
		}
	}
	// 发表问题回复
	public function sendAnswer(){
		$id = $_POST['ques_id'];
		$idnumber = session("idnumber");
		$data['user_id'] = $_POST['user_id'];//文章人的Id
		$data['comment'] = $_POST['content'];//评论的内容
		$data['ques_id'] = $_POST['ques_id'];//对应问题的id
		$data['send_id'] = $idnumber;//发表评论的人
		$data['sendTime'] = date("Y-m-d H:i:s");//发表评论的人
		if(!$idnumber){
			$this->redirect("Common/login");
		}
		if(!$_POST['content']){
			$this->error("内容不能为空!");
		}
		$l = M('comcoment');//添加评论
		$list = $l->add($data);
		$this->redirect("wenti?id=$id");
	}
	// 删除回复的答案
	public function delComment(){
		$id = $_GET['id'];
		$cid = $_GET['cid'];
		$q = M('comcoment');
		$l = $q->where("qid='$id'")->delete();
		if($l){
			$this->redirect("wenti?id=$cid");
		}else{
			$this->error('禁止删除回复!');
		}
	}

	// 问题的搜索
	public function search(){
		$q = $_GET['q'];//关键词
		// 在线登录信息
		$this->isLine();
		// 获取登录用户的信息
		$ll = $this->userintro();
		// 获取对应的问题
		$model = D('Community');
		$idnumber = session("idnumber");
		$this->commonRight();
		// 直接根据标题和作者进行搜索
		$bool = $model->getSearchList($q);
		$this->assign("queslist",$bool['list']);//取到的数据
		$this->assign("show",$bool['show']);//分页
		$this->assign("q",$q);//分页
		$this->assign("ll",$ll);
		$this->display();
	}

}