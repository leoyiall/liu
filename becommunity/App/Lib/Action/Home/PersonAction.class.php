<?php
class PersonAction extends Action {
	public function __construct(){
		$idnumber = session("idnumber");
		$this->assign("idnumber",$idnumber);
	}
	// 个人博客的首页
	public function index(){
		$id = $_GET['id'];
		$this->assign("id",$id);
		$idnumber = session("idnumber");
		$this->assign("idnumber",$idnumber);
		$model = D('Person');
		$ss = $model->getUser($idnumber);//获取用户的信息
		$this->assign("list",$ss);
		$li = $model->getMe($id);//获取关于我
		$this->assign("li",$li);
		//获取博客信息
		$ilist = $model->getBase($id);
		$this->assign("ilist",$ilist);	
		// 获取分类
		$cate = $model->getCate($id);
		$this->assign("cate",$cate);
		// 文章列表
		$bc = M('blog_cate');
		import('ORG.Util.Page');// 导入分页类
		// 如果存在分类，就只要这一类显示就可以了
		$count      = $bc->where("user_id='$id'")->count();// 查询满足要求的总记录数
		$Page       = new Page($count,2);// 实例化分页类 传入总记录数和每页显示的记录数
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$blist = $bc->where("user_id='$id'")->order('sendTime desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign("bool",$blist);
		$this->assign("show",$show);
		//关于是否关注该人
		$care = $model->getCare($id,$idnumber);
		$this->assign("care",$care);		
		//获取多少的粉丝
		$fans = $model->getFans($id,$idnumber);
		$this->assign("fans",$fans);
		$this->display();
	}
	// 关于页面
	public function about(){
		$idnumber = session("idnumber");//登录后的用户id号
		$this->assign("idnubmer",$idnumber);//把id传过去
		$id = $_GET['id'];//获取当前的id号
		$this->assign("id",$id);
		$model = D('Person');
		$list = $model->getUser($idnumber);//获取用户的信息
		$this->assign("list",$list);
		$plist = $model->getAbout($id);
		$this->assign("plist",$plist);
		//获取博客信息
		$ilist = $model->getBase($id);
		$this->assign("ilist",$ilist);
		// 获取分类
		$cate = $model->getCate($id);
		$this->assign("cate",$cate);
		//获取关于我
		$li = $model->getMe($id);
		$this->assign("li",$li);
		//关于是否关注该人
		$care = $model->getCare($id,$idnumber);
		$this->assign("care",$care);		
		//获取多少的粉丝
		$fans = $model->getFans($id,$idnumber);
		$this->assign("fans",$fans);	
		$this->display();
	}
	// 执行修改页面
	public function modifyAbout(){
		$id = $_GET['id'];
		// 如果不是本用户登录，是不允许修改资料的
		if($id != session("idnumber")){
			$this->redirect("about?id=$id");
		}
		$idnum = session("idnumber");
		$model = D('Person');
		$ss = $model->getUser($idnum);//获取用户的信息
		$this->assign("list",$ss);
		$ab = $model->getMe($idnum);
		if($ab){
			$this->assign("ab",$ab);
		}
		// 获取分类
		$cate = $model->getCate($id);
		$this->assign("cate",$cate);
		//获取博客信息
		$ilist = $model->getBase($id);
		$this->assign("ilist",$ilist);	
		//获取关于我
		$li = $model->getMe($id);
		$this->assign("li",$li);
		$this->assign("id",$id);
		//关于是否关注该人
		$care = $model->getCare($id,$idnumber);
		$this->assign("care",$care);		
		//获取多少的粉丝
		$fans = $model->getFans($id,$idnumber);
		$this->assign("fans",$fans);	
		$this->display();
	}
	// 执行保存资料
	public function saveAbout(){
		$id = $_POST['user_id'];
		// 如果没有对应的用户id也是不得添加用户的
		if($id == ''){
			$this->redirect("Person/about/id/$id");
		}
		$model = D('Person');
		$idnum = session("idnumber");//登录的人id
		$bool = $model->getMe($idnum);
		$a = M('aboutme');
		// 如果已经存在了纪录就只是修改而已，不的话就是保存
		if($bool){
			$li = $a->where("user_id='$id'")->save($_POST);
			if($li){
				$this->success("修改成功!");
			}else{
				$this->error("系统出现故障!");
			}
		}else{
			$a->create();
			$li=$a->add();
			if($li){
				$this->success("保存成功!","about?id=$id");
			}else{
				$this->error("系统出现错误!");
			}
		}
	}
	// 我的朋友
	public function friend(){
		$id = $_GET['id'];//获取当前的id号
		$model = D('Person');
		$idnum = session("idnumber");
		$ss = $model->getUser($idnum);//获取用户的信息
		$this->assign("list",$ss);
		$this->assign("id",$id);
		//获取博客信息
		$ilist = $model->getBase($id);
		$this->assign("ilist",$ilist);
		// 获取分类
		$cate = $model->getCate($id);
		$this->assign("cate",$cate);
		//获取关于我
		$li = $model->getMe($id);
		$this->assign("li",$li);			
		//获取多少的粉丝
		$fans = $model->getFans($id,$idnumber);
		$this->assign("fans",$fans);
		// 获取关注人的数量
		$cares = $model->getCares($id,$idnumber);
		$this->assign("cares",$cares);
		if($_GET['fans'] == 'tofans'){
			// 获取关注的人列表
			$see = $model->getSee($id,$idnumber);
			$this->assign("see",$see);
		}else{
			//获取粉丝列表
			$see = $model->getff($id,$idnumber);
			$this->assign("see",$see);
		}
		$this->assign("ff",$_GET['fans']);
		$this->display();
	}
	// 搜索好友
	public function searchFriend(){
		$so = $_POST['soso'];//昵称
		$id = $_POST['ids'];//博主的id
		$f = M('fans_user');
		$fl = $f->where("nicheng like '%{$so}%'")->select();
		return $fl;
	}
	// 留言板
	public function message(){
		$id = $_GET['id'];//获取当前的id号
		$model = D('Person');
		$idnum = session("idnumber");
		$ss = $model->getUser($idnum);//获取用户的信息
		$this->assign("list",$ss);
		$this->assign("id",$id);
		//获取博客信息
		$ilist = $model->getBase($id);
		$this->assign("ilist",$ilist);
		// 获取分类
		$cate = $model->getCate($id);
		$this->assign("cate",$cate);
		//获取关于我
		$li = $model->getMe($id);
		$this->assign("li",$li);
		//看看是不是有登录
		$idnum = session("idnumber");
		$this->assign("idnum",$idnum); 
		// 遍历对应博主的所有的留言
		$data = $model->getMessage($id);
		$this->assign("mlist",$data['mlist']);
		$this->assign("show",$data['show']);
		// // 回复留言
		$answer = $model->getAnswer($id);
		$this->assign("answer",$answer);
		//关于是否关注该人
		$care = $model->getCare($id,$idnumber);
		$this->assign("care",$care);		
		//获取多少的粉丝
		$fans = $model->getFans($id,$idnumber);
		$this->assign("fans",$fans);
		$this->display();
	}
	 //保存留言
	 public function saveMessage(){
	 	$id = $_POST['ids'];
	 	// 如果没有博客的id,是不允许留言的
	 	if(!$id){
	 		$this->redirect("Blog/index");
	 	}
	 	$data['message'] = $_POST['message'];//留言内容
	 	$data['sendTime'] = time();//发表时间
	 	$data['person_id'] = session("idnumber");//留言人id
	 	$data['me_id'] = $id;//博主的id
	 	$mi = M('message_intro');
	 	$mlist = $mi->add($data);
	 	$this->redirect("message?id=$id");
/*	 	if($mlist){
	 		$this->success("发表留言成功!");
	 	}else{
	 		$this->error('发表留言失败!');
	 	}*/
	 } 
	 // 保存回复内容
	 public function saveAnswer(){
	 	$id = $_POST['id'];
	 	$data['message'] = $_POST['respone'];//留言内容
	 	$data['sendTime'] = time();//发表时间
	 	$data['mwho'] = $_POST['mwho'];//回复对应的某人的id
	 	$data['person_id'] = session("idnumber");//留言人id
	 	$data['bm_id'] = $_POST['bm_id'];//回复到那条留言的id
	 	$data['bo_id'] = $_POST['id'];//回复到那条留言的id
	 	$mi = M('message_intro');
	 	$mlist = $mi->add($data);
	 	$this->redirect("message?id=$id");
	 }
	 // 删除留言
	 public function delMessage(){
	 	$id = $_GET['id'];
	 	$mid = $_GET['mid'];
	 	$m = M('messageboard');
	 	$mlist = $m->where("me_id='$id' && mid='$mid'")->delete();
	 	if($mlist){
	 		$this->success("删除成功!");
	 	}else{
	 		$this->error("删除失败!");
	 	}
	 }
	//文章列表
	public function arclist(){
		$id = $_GET['id'];//获取当前的id号
		$cid = $_GET['cid'];//获取分类
		$model = D('Person');
		$idnum = session("idnumber");
		$ss = $model->getUser($idnum);//获取用户的信息
		$this->assign("list",$ss);
		$this->assign("id",$id);
		//获取博客信息
		$ilist = $model->getBase($id);
		$this->assign("ilist",$ilist);	
		$li = $model->getMe($id);//获取关于我
		$this->assign("li",$li);
		// 判断是否登录了
		$idnum = session("idnumber");
		$this->assign("idnum",$idnum);
		// 获取分类
		$cate = $model->getCate($id);
		$this->assign("cate",$cate);
		// 文章列表
		$bc = M('blog_cate');
		import('ORG.Util.Page');// 导入分页类
		// 如果存在分类，就只要这一类显示就可以了
		if($cid){
			$count      = $bc->where("user_id='$id' and cate_id='$cid'")->count();// 查询满足要求的总记录数
			$Page       = new Page($count,15);// 实例化分页类 传入总记录数和每页显示的记录数
			$show       = $Page->show();// 分页显示输出
			// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
			$blist = $bc->where("user_id='$id' and cate_id='$cid'")->order('sendTime desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		}else{
			$count      = $bc->where("user_id='$id'")->count();// 查询满足要求的总记录数
			$Page       = new Page($count,15);// 实例化分页类 传入总记录数和每页显示的记录数
			$show       = $Page->show();// 分页显示输出
			// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
			$blist = $bc->where("user_id='$id'")->order('sendTime desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		}
		$this->assign("bool",$blist);
		$this->assign("show",$show);
		$this->display("list");
	} 
	// 执行添加分类
	public function addCategory(){
		$c = M('cate');
		$c->create();
		$clist = $c->add();
		if($clist){
			$this->success("添加分类成功!");
		}else{
			$this->error("添加分类失败!");
		}
	}
	// 发布文章
	public function addarc(){
		$id = $_GET['id'];//获取当前的id号
		$model = D('Person');
		$idnum = session('idnum');
		$ss = $model->getUser($idnum);//获取用户的信息
		$this->assign("list",$ss);
		$this->assign("id",$id);
		//获取博客信息
		$ilist = $model->getBase($id);
		$this->assign("ilist",$ilist);	
		$li = $model->getMe($id);//获取关于我
		$this->assign("li",$li);
		// 获取分类
		$cate = $model->getCate($id);
		$this->assign("cate",$cate);
		//关于是否关注该人
		$care = $model->getCare($id,$idnumber);
		$this->assign("care",$care);
		// 如果没有登录就进不来这里
		if(!session('idnumber')){
			$this->redirect("index?id=$id");
		}
		$this->display();
	}
	// 保存博文
	public function saveBlog(){
		$id = $_POST['user_id'];//id;
		$data['user_id'] = $_POST['user_id'];//用户id
		$data['title'] = $_POST['title'];//标题
		$data['cate_id'] = $_POST['cate_id'];//分类id
		$data['content'] = $_POST['content'];//内容
		$data['prev'] = $_POST['prev'];//是否是前沿
		$data['sendTime'] = time();//发表时间
		$model = D('Person');
		$bool = $model->saveArc($data);
		if($bool){
			$this->success("发表博文成功!","arclist?id=$id");
		}else{
			$this->error("系统出错,请重新操作!");
		}
	}
	// 删除博文
	public function deleteBlog(){
		$idnum = $_GET['idnum'];
		$bid = $_GET['bid'];
		$b = M('blog');
		$list = $b->where("user_id='$idnum' && lid='$bid'")->delete();
		if($list){
			$this->success("删除博文成功!","arclist?id=$idnum");
		}else{
			$this->error("系统出现错误!");	
		}
	}
	// 修改博文
	public function modifyBlog(){
		$id = $_GET['id'];//获取当前的id号
		$model = D('Person');
		$idnum = session("idnumber");
		$ss = $model->getUser($idnum);//获取用户的信息
		$this->assign("list",$ss);
		$this->assign("id",$id);
		//获取博客信息
		$ilist = $model->getBase($id);
		$this->assign("ilist",$ilist);	
		$li = $model->getMe($id);//获取关于我
		$this->assign("li",$li);
		// 获取分类
		$cate = $model->getCate($id);
		$this->assign("cate",$cate);
		//关于是否关注该人
		$care = $model->getCare($id,$idnumber);
		$this->assign("care",$care);
		// 如果没有登录就进不来这里
		if(!session('idnumber')){
			$this->redirect("index?id=$id");
		}
		$bid = $_GET['bid'];
		$b = M('blog_cate');
		$bli = $b->where("user_id='$id' && lid='$bid'")->find();
		$this->assign("bli",$bli);
		$this->display();
	}
	// 执行修改博文
	public function doModifyBlog(){
		$id = $_POST['user_id'];//id;
		$lid = $_POST['lid'];//文章lid;
		$data['user_id'] = $_POST['user_id'];//用户id
		$data['title'] = $_POST['title'];//标题
		$data['cate_id'] = $_POST['cate_id'];//分类id
		$data['content'] = $_POST['content'];//内容
		$data['sendTime'] = time();//发表时间
		$b = M('blog');
		$bool = $b->where("user_id='$id' && lid='$lid'")->save($data);
		if($bool){
			$this->success("修改博文成功!","arclist?id=$id");
		}else{
			$this->error("系统出错,请重新操作!");
		}
	}
	// 博文页
	public function article(){
		$id = $_GET['id'];//获取当前的id号
		$lid = $_GET['lid'];//获取对应文章
		$model = D('Person');
		$idnum = session("idnumber");
		$ss = $model->getUser($idnum);//获取用户的信息
		$this->assign("list",$ss);
		$this->assign("id",$id);
		$this->assign("lid",$lid);//文章id
		//获取博客信息
		$ilist = $model->getBase($id);
		$this->assign("ilist",$ilist);	
		$li = $model->getMe($id);//获取关于我
		$this->assign("li",$li);
		$this->assign("idnum",$idnum);
		// 获取分类
		$cate = $model->getCate($id);
		$this->assign("cate",$cate);
		// 获取文章内容
		$bb = $model->getArticle($id,$lid);
		$this->assign("bb",$bb);
		// 点击一次就当做是浏览一次
		$num['sight'] = $bb['sight']+1;
		$suc = $model->modifySight($id,$lid,$num);
		// 查看文章的评论
		$cc = $model->getComment($lid);
		$this->assign("cc",$cc);
		//关于是否关注该人
		$care = $model->getCare($id,$idnumber);
		$this->assign("care",$care);
		$this->display();
	}
	// 保存评论
	public function saveComment(){
		$id = $_POST['ids'];
		$arc_id = $_POST['arc_id'];
		$data['arc_id'] = $arc_id;
		$data['comment'] = $_POST['comment'];
		$data['cwho'] = session("idnumber");
		$data['sendTime'] = time();
		$set = M('set');
		$bon = $set->where("id='1'")->getField("b_on");
		if($bon){ //是1就是要审核
			$data['pass'] = 0; //pass=0需要审核
		}else{
			$data['pass'] = 1; //pass=1不需要审核
		}
		$c = M('comment');
		$bli = $c->add($data);
		// $this->redirect("article?id=$id&lid=$arc_id","等待审核");
		if($bon){ //b_on = 1就是要审核
			$this->success("发表留言成功,等待审核");
		}else{
			// 0 就是不用审核
			$this->redirect("article?id=$id&lid=$arc_id");
		}
	}
	// 删除文章评论
	public function delComment(){
		$id = $_GET['id'];//博客id
		$cid = $_GET['cid'];//评论id
		$lid = $_GET['lid'];//文章id
		if($id != session("idnumber")){
			$this->redirect("article?id=$id&lid=$lid");
		}
		$m = M('comment');
		$mlist = $m->where("cid='$cid'")->delete();
		if($mlist){
			$this->success("删除成功!");
		}else{
			$this->error("删除失败!");
		}
	}
	// 删除分类
	public function delCategory(){
		$id = $_GET['id'];
		$cid = $_GET['cid'];
		$c = M('cate');
		$ll = $c->where("user_id='$id' and caid='$cid'")->delete();
		if($ll){
			$this->success("删除成功!");
		}else{
			$this->error("删除失败!");
		}
	}
	// 空间基本资料
	public function base(){
		$id = $_GET['id'];//获取当前的id号
		$model = D('Person');
		$idnumber = session("idnumber");//登录人的idnumber
		$ss = $model->getUser($idnumber);//获取用户的信息
		$this->assign("list",$ss);
		$this->assign("id",$id);
		// 如果没有登录就不给你进来修改
		if(!$idnumber){
			$this->redirect("index?id=$id");
		}
		$bool = $model->getBase($idnumber);
		// 获取分类
		$cate = $model->getCate($id);
		$this->assign("cate",$cate);
		$this->assign("ili",$bool);//获取对应的用户信息
		$this->assign("idnumber",$idnumber);
		//获取博客信息
		$ilist = $model->getBase($id);
		$this->assign("ilist",$ilist);	
		$li = $model->getMe($id);//获取关于我
		$this->assign("li",$li);
		//关于是否关注该人
		$care = $model->getCare($id,$idnumber);
		$this->assign("care",$care);		
		//获取多少的粉丝
		$fans = $model->getFans($id,$idnumber);
		$this->assign("fans",$fans);
		$this->display();
	}
	// 存储空间资料
	public function saveBase(){
		import('ORG.Net.UploadFile');
		$upload = new UploadFile();// 实例化上传类
		$upload->maxSize  = 3145728 ;// 设置附件上传大小
		$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->savePath =  './Public/Uploads/';// 设置附件上传目录
		if(!$upload->upload()) {// 上传错误提示错误信息
			// 是否第一次上传照片
			if($_POST['arcimg']){
				$data['arcimg'] = $_POST['arcimg'];
			}else{
				$this->error($upload->getErrorMsg());
			}
		}else{// 上传成功 获取上传文件信息
		  $info =  $upload->getUploadFileInfo();
		  $data['arcimg'] = $info[0]['savename']; //文件名
		}

		$i = M('introduce');
		$data['user_id'] = $_POST['idnumber'];//用户id号
		$data['blogTitle'] = $_POST['blogTitle'];//博客标题
		$data['blogIntroduce'] = $_POST['blogIntroduce'];//博客介绍
		$idnum = session("idnumber");//必须是当前个人的id号
		// 存在session的id编号才去存
		if($idnum){
			 if($_POST['arcimg']==''){
				$ilist = $i->add($data);
			 }else{
			 	$ilist = $i->where("user_id='$idnum'")->save($data);
			 }
			if($ilist){
				$this->success("保存成功","base/id/$idnum");
			}
		}else{
			$this->redirect("index?id=1221");
		}
	}
	// 导入共同的头部
	public function head(){
		$id = $_GET['id'];
		$idnum=session("idnumber");
		$model = D('Person');
		$ss = $model->getUser($idnum);//获取用户的信息
		$this->assign("list",$ss);
		if($id == ''){
			$id = session("idnumber");
		}
		$this->assign("id",$id);//传送获取到的id
		//获取博客信息
		$ilist = $model->getBase($id);
		$this->assign("ilist",$ilist);	
		$this->display();
	}
	// 导入共同的头部
	public function footer(){
		$id = $_GET['id'];
		$idnum=session("idnumber");
		$model = D('Person');
		$ss = $model->getUser($idnum);//获取用户的信息
		$this->assign("list",$ss);
		if($id == ''){
			$id = session("idnumber");
		}
		$this->assign("id",$id);//传送获取到的id
		$this->display();
	}
	// 关注Ta
	public function careHim(){
		$idnum = session("idnumber");
		if(!$idnum){
			$this->redirect("Common/login");
		}else{
			$data['user_id'] = session("idnumber");//我的id
			$data['fans_id'] = $_GET['id'];//它的id
			$data['tofans'] = 1;
			$f = M("fans_user");
			$l = $f->add($data);
			if($l){
				$msg['info'] = "关注成功!";
				$msg['bool'] = 1;
			}else{
				$msg['info'] = "系统故障!";
				$msg['bool'] = 0;
			}
			$this->ajaxReturn($msg);
		}
	}
	// 消息提示
	public function xiaoxi(){
		$id = $_GET['id'];
		$this->assign("id",$id);
		$idnumber = session("idnumber");
		$this->assign("idnumber",$idnumber);
		$model = D('Person');
		$ss = $model->getUser($idnumber);//获取用户的信息
		$this->assign("list",$ss);
		$li = $model->getMe($id);//获取关于我
		$this->assign("li",$li);
		//获取博客信息
		$ilist = $model->getBase($id);
		$this->assign("ilist",$ilist);	
		// 获取分类
		$cate = $model->getCate($id);
		$this->assign("cate",$cate);
		//关于是否关注该人
		$care = $model->getCare($id,$idnumber);
		$this->assign("care",$care);		
		//获取多少的粉丝
		$fans = $model->getFans($id,$idnumber);
		$this->assign("fans",$fans);
		// 获取全部的消息
		// 遍历对应博主的所有的留言
		$data = $model->getMessage($id);
		$this->assign("mlist",$data['mlist']);
		// 查看文章的评论
		$cc = $model->getComments($idnumber);
		$this->assign("cc",$cc);
		$this->assign("show",$data['show']);
		$this->display();
	}
	// 关于博文的转载
	public function saveOther(){
		$idnumber = session("idnumber");
		if(!$idnumber){
			$this->redirect("common/login");
		}
		$id = $_GET['id'];//所属文章人的id
		$lid = $_GET['lid'];//博文的id
		// 然后将所得到的博文进行对应的保存
		$model = D('Person');
		$blog = $model->getArticle($id,$lid);
		// print_r($blog);
		$data['user_id'] = $idnumber;//用户id
		$data['title'] = "[转载]".$blog['title'];//标题
		$data['cate_id'] = $blog['cate_id'];//分类id
		$data['content'] = $blog['content'];//内容
		$data['sendTime'] = time();//发表时间
		$model = D('Person');
		$bool = $model->saveArc($data);
		// 修改转载数字
		$num['znum'] = $blog['znum']+1;
		$suc = $model->modifySight($id,$lid,$num);
		if($bool){
			$this->success("转发博文成功!","arclist?id=$idnumber");
		}else{
			$this->error("系统出错,请重新操作!");
		}
	}
}