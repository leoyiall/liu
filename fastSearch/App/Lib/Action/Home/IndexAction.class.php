<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public function index(){
    	$who = $_SESSION['otherName'];
    	$this->assign("who",$who);
    	$this->display("index");
    }
    // 文章搜索页
    public function search(){
    	$keys = $_POST['so'];
    	$a = M("article");
    	$c = M("category");
    	$cs = $c->select();
    	$this->assign("cs",$cs);
    	$where['summary']  = array('like', "%{$keys}%");
		$where['title']  = array('like',"%{$keys}%");
		$where['_logic'] = 'or';
		import('ORG.Util.Page');// 导入分页类
		$count      = $a->where($where)->count();// 查询满足要求的总记录数
		$Page       = new Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $a->field("id,summary,title,cid,date")->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
		for($i=0;$i<count($list);$i++){
			$list[$i]['title'] = str_ireplace("$keys","<font color='red'>".$keys."</font>",$list[$i]['title']);
			$list[$i]['summary'] = str_ireplace("$keys","<font color='red'>".$keys."</font>",$list[$i]['summary']);
		}
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
    	$who = $_SESSION['otherName'];
    	$this->assign("keys",$keys);
    	$this->assign("who",$who);
    	$this->display();
    }
    // 文章列表
    public function lists(){
    	$who = $_SESSION['otherName'];
    	$this->assign("who",$who);
    	$c = M('category');
    	$s = M('state');
    	$a = M('article');
    	import('ORG.Util.Page');// 导入分页类
    	$count      = $a->count();// 查询满足要求的总记录数
    	$Page       = new Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数
    	$show       = $Page->show();// 分页显示输出
    	// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
    	$list = $a->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
    	$this->assign('data',$list);// 赋值数据集
    	$this->assign('page',$show);// 赋值分页输出
    	$top = $a->where("sid=2")->order("id desc")->select();
    	$this->assign("top",$top);
    	$ccc = $c->select();
    	$ss = $s->select();
    	$this->assign("cs",$ccc);
    	$this->assign("ss",$ss);
    	$this->display("lists");
    }
   // 文章列表
    public function column(){
    	$id = $_GET['id'];
    	$who = $_SESSION['otherName'];
    	$this->assign("who",$who);
    	$c = M('category');
    	$s = M('state');
    	$a = M('article');
    	import('ORG.Util.Page');// 导入分页类
    	$count      = $a->where("cid='$id'")->count();// 查询满足要求的总记录数
    	$Page       = new Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数
    	$show       = $Page->show();// 分页显示输出
    	// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
    	$list = $a->where("cid='$id'")->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
    	$this->assign('data',$list);// 赋值数据集
    	$this->assign('page',$show);// 赋值分页输出
    	$top = $a->where("sid=2")->order("id desc")->select();
    	$this->assign("top",$top);
    	$ccc = $c->where("id='$id'")->select();
    	$ss = $s->select();
    	$this->assign("cs",$ccc);
    	$this->assign("ss",$ss);
    	$this->display();
    }
    //文章页
    public function article(){
        $who = $_SESSION['otherName'];
        $this->assign("who",$who);
    	$id = $_GET['id'];
		$a = M('article');
		$c = M('category');
		$data = $a->where("id='$id'")->find();
		$cs = $c->where("id='$data[cid]'")->find();
		$this->assign("cs",$cs);
		$this->assign("data",$data);
    	$this->display();
    }
    // ajax请求文章标题
    public function artList(){
    	$keys = trim($_POST['title']);
    	$a = M('article');
    	$where['title']  = array('like', "%{$keys}%");
    	$where['summary']  = array('like',"%{$keys}%");
    	$where['_logic'] = 'or';
    	$data = $a->where($where)->limit(10)->select();
    	if($data){
	    	$this->ajaxReturn($data,"",1);
	    }else{
	    	$this->ajaxReturn(0,"出错!",0);
	    }
    }
}	