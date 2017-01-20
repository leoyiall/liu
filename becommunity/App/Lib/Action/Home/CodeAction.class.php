<?php
class CodeAction extends Action{
	public function __construct(){
		$f = M('friendlink');
		$flist = $f->select();
		$this->assign("flist",$flist);
	}
	// 是否在线
	public function onLine(){
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
		$u = D('Question');
		// 获取登录用户的信息
		$ll = $this->userintro();
		$this->assign("ll",$ll);
	}
	// 全部源码
	public function index(){
		$this->onLine();//是否在线的信息分配过去
		$model = D('Code');
		$l = $model->getAllNav();
		$id = $_GET['id'];
		if($id){
			$bool = $model->getSortCode($id);//分类匹配
		}else{
			$bool = $model->getCodeList();//全部
		}
		$idnum = session("idnumber");
		$list = $model->getUser($idnum);
		$this->assign("clist",$l);
		$this->assign("list",$list);
		$this->assign("id",$id);
		$this->assign("lists",$bool['list']);
		$this->assign("show",$bool['show']);
		$this->display();
	}
	// 源码下载页
	public function downPage(){
		$this->onLine();//是否在线的信息分配过去
		$id = $_GET['id'];
		$model = D('Code');
		$l = $model->getAllNav();
		$list = $model->getOneCode($id);
		$this->assign("clist",$l);
		$this->assign("list",$list);
		$this->display();
	}
	// 搜索
	public function search(){
		$this->onLine();//是否在线的信息分配过去
		$model = D('Code');
		$l = $model->getAllNav();
		$idnum = session("idnumber");
		$list = $model->getUser($idnum);
		$this->assign("clist",$l);
		$this->assign("list",$list);
		$this->assign("id",$id);
		$so = $_GET['soso'];
		$bool = $model->getSearchCode($so);
		$this->assign("lists",$bool['list']);
		$this->assign("show",$bool['show']);
		$this->display();
	}
}