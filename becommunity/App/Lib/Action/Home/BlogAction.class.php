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
		// 获取技术前沿
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
	// 转载量统计
	public function countOther(){
		$this->display();
	}
		// 转载量统计
	public function countPerfect(){
		$this->display();
	}
			// 转载量统计
	public function countSight(){
		$this->display();
	}
	// 获取转载图表数据
	public function doOther(){
		$tj = $_POST['tj']; //统计类型
		$ts = $_POST['ts']; //显示条数
		$start = strtotime($_POST['start']); //开始时间
		$end = strtotime($_POST['end']); //结束时间
		$blog = M('blog_article');
		if($start || $end){
			$where = "(sendTime >= $start and sendTime <= $end) || (sendTime >= $start || sendTime <= $end)";
			$article= $blog
			->field("title,lid,sendTime,user_id,perfect,other,cate_id,category,sight,prev,znum,nicheng")
			->where($where)
			->order($tj." desc")
			->limit($ts)
			->select();
		}else{
			$article= $blog
			->field("title,lid,sendTime,user_id,perfect,other,cate_id,category,sight,prev,znum,nicheng")
			->order($tj." desc")
			->limit($ts)
			->select();
		}
		 $arr = array();
		// echo "<pre>";
		$data = array(
			'titles' => array(),
			"perfect" => array(),
			"sight" => array(),
			"znum" => array(),
			);
		foreach($article as $val){
			//print_r($v);
			array_push( $data['titles'] , $val['title']);
			array_push( $data['perfect'] , $val['perfect']);
			array_push( $data['sight'] , $val['sight']);
			array_push( $data['znum'] , $val['znum']);
		}
		//dump($data);
		// $this->ajaxReturn($s);
		//$json = json_encode($data);

		$this->ajaxReturn( $data );
	}
		// 获取赞图表数据
	public function doPerfect(){
		$c = M('blog_article');
		$l = $c->order("perfect desc")->limit(20)->select();
		$this->ajaxReturn($l);
	}
			// 获取赞图表数据
	public function doSight(){
		$c = M('blog_article');
		$l = $c->order("sight desc")->limit(30)->select();
		$this->ajaxReturn($l);
	}
}