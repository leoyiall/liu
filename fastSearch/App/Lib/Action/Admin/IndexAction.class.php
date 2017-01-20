<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
	public function __construct(){
		// 没有登录就强制跳出
		if(!session("user")){
			$this->redirect("Login/index");
			exit();
		}
		$this->assign("otherName",session('otherName'));
	}
    public function index(){
        $a = M('article');
        import('ORG.Util.Page');// 导入分页类
        $count      = $a->count();// 查询满足要求的总记录数
        $Page       = new Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $a->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
    	$this->assign("otherName",session('otherName'));
    	$this->display('index');
    }
    // 顶部
    public function top(){
    	$this->display("top");
    }
    // 左边
    public function left(){
    	if(session("power") == 1){
	    	$this->display("left");
	    }
    }
    // 添加栏目
    public function addCategory(){
    	$this->display();
    }
    // 执行添加栏目
    public function addLanmu(){
    	$c = M('category');
    	$c->create();
    	$cName = $_POST['cName'];
    	$cIntroduce = $_POST['cIntroduce'];
    	if($cName == null){
    		$this->redirect("addCategory",array("msg"=>"栏目名不能为空"));
    	}
    	if($cIntroduce == null){
    		$this->redirect("addCategory",array("msg"=>"栏目说明不能为空"));
    	}
    	$list=$c->add();
    	if($list){
    		$this->success("添加栏目成功!");
    	}else{
    		$this->error("添加栏目失败!");
    	}
    }
    // 添加文章分类
    public function addColumn(){
    	$c = M('category');
    	$category = $c->where("cId = '0'")->select();
    	$this->assign("cc",$category);
    	$this->display("addColumn");
    }
    public function doAddCate(){
        $data['cName'] = $_POST['cName'];
        $data['cId'] = $_POST['cid'];
        $data['cIntroduce'] = $_POST['cIntroduce'];
        $c = M('category');
        $list = $c->add($data);
        if($list){
            $this->success("添加文章分类成功");
        }else{
            $this->error("添加文章分类失败!");
        }
    }
    // 分类页面
    public function category(){  
        $c = M('category');
        $data = $c->select();      
        $arr = array();
        // 第一层遍历，判断是否是第一层级
        foreach($data as $k=>$v){
            if($v['cId'] == 0){
                $data[$k]['_cName'] = "<b>".$data[$k]['cName']."</b>";
                // $k其实是键值,$v是数组对应的值
                $arr[] = $data[$k];
                // 第二次遍历，判断子栏目的pid是否等于第一层级的id
                foreach($data as $m=>$n){
                    if($n['cId'] == $v['id']){
                        $data[$m]['_cName'] = "├──".$data[$m]['cName'];
                        $arr[] = $data[$m];
                    }   
                }
            }
        }
        $this->assign("list",$arr);
        $this->display("category");
    }
    // 判断栏目类型
    public function doModify(){
        $cid = $_GET['cid'];
        $id = $_GET['id'];
        if($cid == 0){
            $this->redirect("doModifyList",array('id' => $id));
        }else{
            $this->redirect("doModifyColumn",array('id' => $id,'cid' => $cid));
        }
    }
    // 执行修改栏目
    public function doModifyList(){
        $c = M('category');
        $id = $_GET['id'];
        $list = $c->where("id='$id'")->select();
        $this->assign("arr",$list);
        $this->display("doModifyList");
    }
    // 执行修改栏目
    public function doModifyLanmu(){
        $id = $_POST['id'];
        $c = M("category");
        $c->create();
        $list = $c->where("id='$id'")->save();
        if($list){
            $this->redirect("category");
        }else{
            $this->redirect("category");
        }
    }
    // 执行栏目文章分类
    public function doModifyColumn(){
        $c = M('category');
        $id = $_GET['id'];
        $cid = $_GET['cid'];
        $clist = $c->where("cid = '0'")->select();
        $list = $c->where("id='$id'")->select();
        $this->assign("arr",$list);
        $this->assign("cc",$clist);
        $this->display("doModifyColumn");
    }
    // 执行修改栏目文章分类
    public function doModifyCate(){
        $id = $_POST['id'];
        $c = M("category");
        $c->create();
        $list = $c->where("id='$id'")->save();
        if($list){
            $this->success("修改成功!");
            // $this->redirect("category");
        }else{
            $this->error("修改失败!");
            // $this->redirect("category");
        }
    }
    // 删除栏目
    public function delColumn(){
        $id = $_GET['id'];
        $c = M('category');
        $list = $c->where("id='$id'")->delete();
        if($list){
            $this->success("删除成功！");
        }else{
            $this->error("删除失败!");
        }
    }
    // 展示状态
    public function state(){
        $s = M('state');
        $list = $s->select();
        $this->assign("list",$list);
        $this->display("state");
    }
    // 添加状态
    public function addstate(){
        $s = M("state");
        $s->create();
        $list = $s->add();
        if($list){
            $this->success("添加成功!");
        }else{
            $this->error("添加失败!");
        }
    }
    // 修改状态
    public function modifyState(){
        $id = $_POST['id'];
        $data['state'] = $_POST['state'];
        $s = M('state');
        $list = $s->where("id='$id'")->save($data);
        if($list){
            $this->ajaxReturn($list,"修改成功！",1);
        }else{
            $this->ajaxReturn($list,"修改栏目成功！",0);
        }
    }
    // 删除状态
    public function delstate(){
       $id = $_GET['id'];
       $c = M('state');
       $list = $c->where("id='$id'")->delete();
       if($list){
           $this->success("删除状态成功！");
       }else{
           $this->error("删除状态失败!");
       } 
    }
    // 发布栏目
    public function addList(){
        $c = M('category');
        $s = M('state');
        $cs = $c->select();
        $ss = $s->select();
        $this->assign("cs",$cs);
        $this->assign("ss",$ss);
        $this->display("addList");
    }
    // 发布文章
    public function addSend(){
        $a = M('article');
        $a->create();
        $list = $a->add();
        if($list){
            $this->success("发布文章成功!");
        }else{
            $this->error("发布文章失败!");
        }
    }
    // 文章列表
    public function articleList(){
        $a = M('article');
        $c = M('category');
        $s = M('state');
                $a = M('article');
        import('ORG.Util.Page');// 导入分页类
        $count      = $a->count();// 查询满足要求的总记录数
        $Page       = new Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $a->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $cs = $c->select();
        $ss = $s->select();
        $this->assign("cs",$cs);
        $this->assign("ss",$ss);
        $this->display();
    }
    // 删除文章
    public function delArticle(){
        $id = $_GET['id'];
        $a = M('article');
        $list = $a->where("id='$id'")->delete();
        if($list){
            $this->success("删除成功!");
        }else{
            echo $id;
            $this->error("删除失败!");
        }
    }
    // 修改文章
    public function modifyArticle(){
        $id = $_GET['id'];
        $a  = M('article');
        $s  = M('state');
        $c  = M('category');
        $list = $a->where("id='$id'")->select();
        $cs = $c->select();
        $ss = $s->select();
        $this->assign("list",$list);
        $this->assign("cs",$cs);
        $this->assign("ss",$ss);
        $this->display("modifyArticle");
    }
    // 执行修改文章
    public function doModifyArticle(){
        $id = $_POST['id'];
        $a = M('article');
        $a->create();
        $list = $a->save();
        if($list){
            $this->success("修改成功!");
        }else{
            $this->error("修改失败!");
        }
    }
}