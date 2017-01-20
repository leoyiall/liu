<?php
class BlogAction extends Action {
	public function index(){
		$model = D('Blog');
		// 获取用户博文排行榜
		$ulist = $model->getUserBlog();
		// 获取首页全部博文
		$slist = $model->getBlogAll(5);
		// 获取精华博文
		$jlist = $model->getBlogAll(1);
		// 获取热门博文
		$rlist = $model->getBlogAll(2);
		// 获取最新博文
		$zlist = $model->getBlogAll(3);
		// 分配是否在线的变量
		$idnumber = session("idnumber");
		$this->assign("idnumber",$idnumber);
		//获取用户的信息
		$mm = D('Person');
		$ss = $mm->getUser($idnumber);
		$this->assign("list",$ss);
		// 下面是分配变量
		$this->assign("ulist",$ulist);//用户博文排行
		$this->assign("jlist",$jlist['list']);//精华博文分配
		$this->assign("rlist",$rlist['list']);//热门博文分配
		$this->assign("zlist",$zlist['list']);//最新博文分配
		$this->assign("slist",$slist['list']);//全部博文分配
		$this->assign("show",$jlist['show']);//分页
		$this->assign("show",$rlist['show']);//分页
		$this->assign("show",$zlist['show']);//分页
		$this->assign("show",$slist['show']);//分页
		$this->display();
	}
	public function ajaxPerfect(){
		$idnumber = session("idnumber");
		if(!$idnumber){
			$this->redirect("Common/login");
		}
		$lid = $_GET['id'];//文章id
		$p = $_GET['p'];//赞的数量
		$model = D('Blog');
		$zan = $model->ajaxPerfect($lid,$p,$idnumber);
		// if($zan){
			$this->redirect("index");
/*		}else{
			$this->error('已赞!');
		}*/
	}
}