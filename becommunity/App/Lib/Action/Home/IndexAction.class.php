<?php
class IndexAction extends Action {
	public function __construct(){
		$c = M('category');
		$clist = $c->limit(3)->select();
		$this->assign("clist",$clist);
		$f = M('friendlink');
		$flist = $f->select();
		$this->assign("flist",$flist);
	}
	public function page($a,$map=''){
		import('ORG.Util.Page');// 导入分页类
        $count      = $a->where($map)->count();// 查询满足要求的总记录数
        $Page       = new Page($count,8);// 实例化分页类 传入总记录数和每页显示的记录数
        $Page->setConfig('header','条资讯');
        $Page->setConfig('first','<<');
        $Page->setConfig('next','>>');
        $Page->setConfig('total','');
        $data['show']       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $data['lists'] = $a->where($map)->order('paixu desc,id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        return $data;
	}
	public function softPage($a,$map='',$count){
		import('ORG.Util.Page');// 导入分页类
        $count      = $a->where($map)->count();// 查询满足要求的总记录数
        $Page       = new Page($count,$count);// 实例化分页类 传入总记录数和每页显示的记录数
        $Page->setConfig('header','条下载');
        $Page->setConfig('first','<<');
        $Page->setConfig('next','>>');
        $Page->setConfig('total','');
        $data['show']       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $data['lists'] = $a->where($map)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        return $data;
	}
	// 获取文章列表
	public function articleList($a,$aon,$sid,$num){
		$condition['sid'] = $sid;
    	if($aon){
    		$condition['check'] = 0;
    		$condition['check'] = 1;
    		$condition['_logic'] = 'OR';
    		$list = $a->where($condition)->limit($num)->order('id desc')->select();
	    }else{
	    	$list = $a->where($condition)->limit($num)->order('id desc')->select();
	    }
		// 获取对应状态文章
		// $list = $a->where("sid='$sid'")->limit($num)->select(); 
		return $list;
	}
	// 获取软件文章列表
	public function softList($a,$aon,$cid,$num){
		$condition['cid'] = $cid;
    	if($aon){
    		$condition['check'] = 0;
    		$condition['check'] = 1;
    		$condition['_logic'] = 'OR';
    		$list = $a->where($condition)->limit($num)->order('id desc')->select();
	    }else{
	    	$list = $a->where($condition)->limit($num)->order('id desc')->select();
	    }
		// 获取对应状态文章
		// $list = $a->where("sid='$sid'")->limit($num)->select(); 
		return $list;
	}
	// 获取对应软件列别
	public function softSort($s,$sort,$check){
	if($check == 1){	
		$data = $s->where("sort='$sort' and (check='1' or check='0')")->field('id,sort,link,title')->limit(10)->order('id desc')->select();
	}else{
		$data = $s->where("sort='$sort'")->field('id,sort,link,title')->limit(10)->order('id desc')->select();
	}	
		return $data;
	}
    public function index(){
    	$s = M('set');
    	$a = M('article_list');
    	$aon=$s->where("id='1'")->getfield('a_on');
    	// 获取头条
    	$headNews = $this->articleList($a,$aon,19,2);  
    	$condition['cid']= array('not in',array('10','11'));
    	// 获取滚动
    	if($aon){
    		$condition['check'] = 0;
    		$condition['check'] = 1;
    		$condition['_logic'] = 'OR';
    		$playNews = $a->where($condition)->limit(4)->order('id desc')->select();
	    }else{
	    	$playNews = $a->where($condition)->limit(4)->order('id desc')->select();
	    }
    	// 获取热门
    	$hotNews = $this->articleList($a,$aon,2,13);
    	// 获取推荐
    	$recommendNews = $this->articleList($a,$aon,17,5);
    	// 获取列表
    	$this->assign("headNews",$headNews);
    	$this->assign("playNews",$playNews);
    	$this->assign("hotNews",$hotNews);
    	$this->assign("recommendNews",$recommendNews);
    	// 分页
    	$map['sid'] = array(array('eq',1),array('eq',18), 'or') ;
    	$data = $this->page($a,$map);
		$this->assign("lists",$data['lists']);
		$this->assign("show",$data['show']);
	    $this->display();
    }
    // 资讯列表
    public function lists(){
    	$a = M('article_list');
    	$id = $_GET['id'];
    	$map['cid']= array("eq",$id);
    	$data = $this->page($a,$map);
    	$this->assign("lists",$data['lists']);
    	$this->assign("show",$data['show']);
    	$this->display("list");
    }
    // 软件下载页面
    public function down(){
    	$a = M('article_list');
    	// $this->assign("lists",$data['lists']);
    	// $this->assign("show",$data['show']);
    	// 查看是否检查
    	$s = M('check');
    	$son = $s->where("id='1'")->getfield('s_on');
    	$playTech = $a->where("(sid='20') and (cid = '11' or cid = '10')")->limit(4)->select();
    	$this->assign("playTech",$playTech);    	
    	// 软件教程
    	$softTech = $this->softList($a,$son,10,9);
    	$this->assign("softTech",$softTech);
    	// 软件安装
    	$softInstall = $this->softList($a,$son,11,9);
    	$this->assign("softInstall",$softInstall);
    	// 获取开发工具
    	$soft = M('soft');
    	$kfgj = $this->softSort($soft,"开发工具",$son);
    	$this->assign("kfgj",$kfgj);
    	// 获取编辑器
    	$bjq = $this->softSort($soft,"编辑器",$son);
    	$this->assign("bjq",$bjq);
    	// 获取辅助工具
    	$fzgj = $this->softSort($soft,"辅助工具",$son);
    	$this->assign("fzgj",$fzgj);
    	$this->display();
    }
    // 文章页
    public function article(){
    	$a = M('article_list');
    	// 获取推荐
    	$recommendNews = $this->articleList($a,$aon,17,5);
    	$this->assign("recommend",$recommendNews);
    	$id = $_GET['id'];
    	$list = $a->where("id='$id'")->find();
    	$sj['sight'] = $list['sight']+1;
    	$xg = $a->where("id='$id'")->save($sj);
    	// 获取上一篇文章
    	$cid = $list['cid'];
    	$pre = $a->where("(cid='$cid') and (id<$id)")->field("id,title")->limit(1)->find();
    	if($pre){
    		$this->assign("pre",$pre);
    	}
    	// 获取下一篇文章
    	$next = $a->where("(cid='$cid') and (id>$id)")->field("id,title")->limit(1)->find();
    	if($next){
    		$this->assign("next",$next);
    	}

    	if($list){
	    	$this->assign("list",$list);
	    }else{
	    	$this->error('不存在该页面');
	    }
    	$this->display();
    }
    // 文章赞
    public function ajaxZan(){
    	$id = $_POST['id'];
    	$num = $_POST['num'];
    	$a = M('article_list');
    	$z = $a->where("id='$id'")->field('perfect,low')->find();
    	if($num == 1){
    		$data['perfect'] = $z['perfect']+1;
    		$list = $a->where("id='$id'")->save($data);
    		if($list){
    			$info = $data['perfect'];
    		}
    	}else if($num ==2){
    		$data['low'] = $z['low']+1;
    		$list = $a->where("id='$id'")->save($data);
    		if($list){
    			$info = $data['low'];
    		}
    	}
    	$this->ajaxReturn($info);
    }
    public function recommendSoft($soft){
    	$con['sid'] = "17";
    	$tj = $soft->where("sid='17'")->field("id,title")->limit(10)->select();
    	return $tj;
    }
    // 软件下载列表
    public function downlist(){
    	$id = $_GET['id'];
    	$soft = M('soft_list');
    	if($id==1){
    		$info = "开发工具";
    		$map['sort'] = "开发工具";
    		$data = $this->softPage($soft,$map,20);
    	}else if($id == 2){
			$info = "编辑器";
    		$map['sort'] = "编辑器";
    		$data = $this->softPage($soft,$map,20);
    	}else{
			$info = "辅助工具";
    		$map['sort'] = "辅助工具";
    		$data = $this->softPage($soft,$map,20);
    	}
    	$tj = $this->recommendSoft($soft);
    	$this->assign("tj",$tj);
    	$this->assign("info",$info);
    	$this->assign("lists",$data['lists']);
    	$this->assign("show",$data['show']);
    	$this->display();
    }
    //下载页
    public function downpage(){
    	$id = $_GET['id'];
    	$soft = M('soft_list');
    	$list = $soft->where("id='$id'")->find();
    	$tj = $this->recommendSoft($soft);
    	$this->assign("tj",$tj);
    	$this->assign("list",$list);
    	$this->display();
    }
    // 文章赞
    public function ajaxPerfect(){
    	$id = $_POST['id'];
    	$num = $_POST['num'];
    	$a = M('soft_list');
    	$z = $a->where("id='$id'")->field('perfect,low')->find();
    	if($num == 1){
    		$data['perfect'] = $z['perfect']+1;
    		$list = $a->where("id='$id'")->save($data);
    		if($list){
    			$info = $data['perfect'];
    		}
    	}else if($num ==2){
    		$data['low'] = $z['low']+1;
    		$list = $a->where("id='$id'")->save($data);
    		if($list){
    			$info = $data['low'];
    		}
    	}
    	$this->ajaxReturn($info);
    }
    // 搜索
    public function search(){
    	$keywords = $_GET['soso'];
    	$a = M('article_list');
    	$map['title']  = array('like', "%$keywords%");
		$map['content']  = array('like',"%$keywords%");
		$map['summary']  = array('like',"%$keywords%");
		$map['author']  = array('like',"%$keywords%");
		$map['category']  = array('like',"%$keywords%");
		$map['_logic'] = 'or';
    	$list = $a->where($map)->select();
    	if($list){
    		$this->assign("list",$list);
    	}
    	// print_r($list);
    	// die;
    	$this->assign("keywords",$keywords);
    	$this->display();
    }
    
}