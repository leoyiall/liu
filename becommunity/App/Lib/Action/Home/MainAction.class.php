<?php
class MainAction extends Action {
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
		$this->isLine();//在线信息
		$idnumber = session("idnumber");
		$i = M('user_lev');
		$l = $i->where("user_id='$idnumber'")->find();
		$this->assign("ll",$l);
		// 精华的话题10条取到手
		$model = D('Community');
		$nlist = $model->getList(6);//10条数,未解决问题
		$this->assign("nlist",$nlist);
		// 获取博文30个
		$b = M('blog_article');
		$blist = $b->order("perfect desc")->limit(20)->select();
		$this->assign("blist",$blist);
		// 获得10个编程库
		$k = M('programme_list');;
		$klist = $k->order('sendTime desc')->limit(6)->select();
		$this->assign("klist",$klist);
		// 10个软件下载
		$r = M('soft_list');
		$rlist = $r->order('id desc')->limit(10)->select();
		$this->assign("rlist",$rlist);
		// 获取热门资讯
		$a = M('article_list');
		$s = M('set');
		$aon=$s->where("id='1'")->getfield('a_on');
		$hotNews = $this->articleList($a,$aon,2,4);
		$this->assign("hotNews",$hotNews);
		// 获取头条
		$headNews = $a->where("sid = '19'")->limit(8)->order('id desc')->select(); 
    	$this->assign("headNews",$headNews);
		$touNews = $a->where("sid = '19'")->limit(2)->order('id asc')->select(); 
    	$this->assign("touNews",$touNews);
		// 获取滚动
		$condition['cid']= array('not in',array('10','11'));
		$playNews = $a->where($condition)->limit(4)->order('id desc')->select(); 
    	$this->assign("playNews",$playNews);
		// 获取推荐的4条
		$tjNews = $a->where("sid = '17'")->limit(4)->order('id desc')->select(); 
    	$this->assign("tjNews",$tjNews);
		// 获取最新的
		import('ORG.Util.Page');// 导入分页类
		$count      = $a->where("(sid = '18' or sid = '17' ) and (cid='4' or cid='6' or cid='7')")->count();// 查询满足要求的总记录数
		$Page       = new Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $a->where("(sid = '18' or sid = '17' ) and (cid='4' or cid='6' or cid='7')")->limit($Page->firstRow.','.$Page->listRows)->order("id desc")->select();

    	$this->assign("ptNews",$list);
    	$this->assign("show",$show);

    	// 获取10个问题
    	$w = M('question_list');;
    	$wlist = $w->order('sendTime desc')->limit(10)->select();
    	$this->assign("wlist",$wlist);
		// 获取10个源码下载
		$c = M('code_list');;
		$clist = $c->order('id desc')->limit(10)->select();
		$this->assign("clist",$clist);
		// 获取全部的友情链接
		$yq = M('friendlink');
		$ylist = $yq->select();
		$this->assign("ylist",$ylist);
		$this->display();
	}
		// 获取文章列表
		public function articleList($a,$aon,$sid,$num){
			$condition['sid'] = $sid;
	    	if($aon){
	    		$condition['check'] = 0;
	    		$condition['check'] = 1;
	    		$condition['_logic'] = 'OR';
	    		$list = $a->where($condition)->limit($num)->order('sight desc')->select();
		    }else{
		    	$list = $a->where($condition)->limit($num)->order('sight desc')->select();
		    } 
			return $list;
		}
			public function index2(){
				$this->isLine();//在线信息
				$idnumber = session("idnumber");
				$i = M('user_lev');
				$l = $i->where("user_id='$idnumber'")->find();
				$this->assign("ll",$l);
				// 精华的话题10条取到手
				$model = D('Community');
				$nlist = $model->getList(10);//10条数,未解决问题
				$this->assign("nlist",$nlist);
				// 获取博文10个
				$b = M('blog_article');
				$blist = $b->order("perfect desc")->limit(10)->select();
				$this->assign("blist",$blist);
				// 获得10个编程库
				$k = M('programme_list');;
				$klist = $k->order('sendTime desc')->limit(10)->select();
				$this->assign("klist",$klist);
				// 10个软件下载
				$r = M('soft_list');
				$rlist = $r->order('id desc')->limit(10)->select();
				$this->assign("rlist",$rlist);
				// 获取热门资讯
				$a = M('article_list');
				$s = M('set');
				$aon=$s->where("id='1'")->getfield('a_on');
				$hotNews = $this->articleList($a,$aon,2,3);
				$this->assign("hotNews",$hotNews);
				// 获取头条
				$headNews = $a->where("sid = '19'")->limit(5)->order('id desc')->select(); 
		    	$this->assign("headNews",$headNews);
				$touNews = $a->where("sid = '19'")->limit(2)->order('id asc')->select(); 
		    	$this->assign("touNews",$touNews);
				// 获取滚动
				$condition['cid']= array('not in',array('10','11'));
				$playNews = $a->where($condition)->limit(4)->order('id desc')->select(); 
		    	$this->assign("playNews",$playNews);
				// 获取推荐的4条
				$tjNews = $a->where("sid = '17'")->limit(4)->order('id desc')->select(); 
		    	$this->assign("tjNews",$tjNews);
				// 获取最新的
				import('ORG.Util.Page');// 导入分页类
				$count      = $a->where("(sid = '18' or sid = '17' ) and (cid='4' or cid='6' or cid='7')")->count();// 查询满足要求的总记录数
				$Page       = new Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
				$show       = $Page->show();// 分页显示输出
				// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
				$list = $a->where("(sid = '18' or sid = '17' ) and (cid='4' or cid='6' or cid='7')")->limit($Page->firstRow.','.$Page->listRows)->order("id desc")->select();

		    	$this->assign("ptNews",$list);
		    	$this->assign("show",$show);

		    	// 获取10个问题
		    	$w = M('question_list');;
		    	$wlist = $w->order('sendTime desc')->limit(11)->select();
		    	$this->assign("wlist",$wlist);
				// 获取10个源码下载
				$c = M('code_list');;
				$clist = $c->order('id desc')->limit(10)->select();
				$this->assign("clist",$clist);

				$this->display();
			}
}