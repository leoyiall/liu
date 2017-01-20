<?php
class AboutAction extends Action {
	// 构造函数
    public function __construct(){
        if(!session('idnumber')){
            $this->redirect("Common/login");
        }
    }
	// 获取是否在线的信息
	public function isLine(){
		$idnumber = session("idnumber");
		$this->assign("idnumber",$idnumber);
	}
	// 右侧的个人信息
	public function userintro(){
		$idnumber = session("idnumber");
		$i = M('user_lev');
		$l = $i->where("user_id='$idnumber'")->find();
		$this->assign("ll",$l);
	}
	public function index(){
		$id = session("idnumber");
		$this->userintro();//右侧用户信息
		$idnumber = session("idnumber");
		//获取用户的信息
		$mm = D('Person');
		$ss = $mm->getUser($idnumber);
		$this->assign("ss",$ss);
		// 这部分是博客中心的
		$bc = M('blog_cate');
		$blist = $bc->where("user_id='$id'")->order('sendTime desc')->limit(5)->select();
		$this->assign("blist",$blist);
		// 社区中心的
		$q = M('community_list');;
		$hlist = $q->where("user_id='$idnumber'")->order('sendTime desc')->limit(5)->select();
		$this->assign("hlist",$hlist);
		// 问题中心的
		$w = M('question_list');;
		$wlist = $w->where("user_id='$idnumber'")->order('sendTime desc')->limit(5)->select();
		$this->assign("wlist",$wlist);
		// 编程库列表
		$k = M('programme_list');;
		$klist = $k->order('sendTime desc')->limit(5)->select();
		$this->assign("klist",$klist);
		// 资讯中心
		$z = M('article_list');;
		$zlist = $z->order('id desc')->limit(5)->select();
		$this->assign("zlist",$zlist);
		// 源码中心
		$c = M('code_list');;
		$clist = $c->order('id desc')->limit(5)->select();
		$this->assign("clist",$clist);
		// 软件中心
		$r = M('soft_list');
		$rlist = $r->order('id desc')->limit(5)->select();
		$this->assign("rlist",$rlist);
		$this->assign("idnumber",$idnumber);
		$this->display();
	}
	// 密码页面
	public function mima(){
		$id = session("idnumber");
		$this->userintro();//右侧用户信息
		$idnumber = session("idnumber");
		$this->display();
	}
	// 修改密码
	public function doModifyPass(){
	    $id = session("idnumber");//用户id
	    $u = M('userlist');
	    $list = $u->where("idnumber='$id'")->getField("upass");
	    $old = md5(md5($_POST['oldpass']));//旧密码
	    $new = md5(md5($_POST['newpass']));//新密码
	    $renew = md5(md5($_POST['renewpass']));//确认密码
	    if($old != $list){
	        $this->error('旧密码不正确!');
	    }
	    if($new != $renew){
	      $this->error('两次密码不一致!');  
	    }
	    $data['upass'] = $new;
	    $l = $u->where("idnumber='$id'")->save($data);
	    if($l){
	        $this->success("修改密码成功!");
	    }else{
	        $this->error('系统禁止改密码!');
	    }
	}
}