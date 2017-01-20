<?php
class IndexAction extends Action {
	// 构造函数
    public function __construct(){
        if(!session('id')){
            $this->redirect("Login/index");
        }
    }
	// 共同的session值
	public function setMessage(){
        $id=session("id");
        $s = M('user');
        $list = $s->where("id='$id'")->select();
		if($list[0]['power']=="2"){
			$list['gly']="超级管理员";
		}else if($list[0]['power']=="1"){
			$list['gly']="管理员";
		}else if($list[0]['power']==0){
			$list['gly']="编辑员";
		}
		 session("who",$list);
		 $data = session("who");
		 return $data;
	}
	// 分页
	public function page($User){
        import('ORG.Util.Page');// 导入分页类
        $count      = $User->count();// 查询满足要求的总记录数
        $Page       = new Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $User->order('id')->limit($Page->firstRow.','.$Page->listRows)->select();
		$Page->setConfig('header','个数据');
		$Page->setConfig('first','1');
		$Page->setConfig('theme ','<li><a href="">%LINK_PAGE%</a></li>');
		$data['list'] = $list;
		$data['show'] = $show;
		return $data;
	}
    // 后台首页
    public function index(){
    	$data=$this->setMessage();
    	$this->assign("data",$data);
        $id = $data[0]['id'];
        $a = M('article');
        $alist = $a->where("user_id='$id'")->limit(7)->select();
        $s = M('soft');
        $slist = $s->where("user_id='$id'")->limit(7)->select();
        $this->assign("alist",$alist);
        $this->assign("slist",$slist);
    	$this->display();
    }
    // 添加分类
	public function adminSendcategory(){
        $data=$this->setMessage();
        $this->assign("data",$data);
		$s=M('category');
    	$data=$this->page($s);
    	$this->assign("list",$data['list']);
    	$this->assign("show",$data['show']);
		$this->display();
    }
    // 状态页面
	public function adminSendState(){	
        $data=$this->setMessage();
        $this->assign("data",$data);
		$s=M('state');
    	$data=$this->page($s);
    	$this->assign("list",$data['list']);
    	$this->assign("show",$data['show']);
		$this->display();
    }
     // 执行添加状态
    public function addCategory(){
    	$data['category'] = $_POST['state'];
    	if($data['category']==""){
    		return;
    	}
    	$s=M('category');
    	$list=$s->data($data)->add();
    	if($list){
    		$data['info']="添加分类成功!";
    	}else{
    		$data['info']="添加分类失败!";
    	}
		$this->ajaxReturn($data);
    }
    // 执行删除状态
    public function delCategory(){
        $data=$this->setMessage();
        $this->assign("data",$data);
    	$id = $_GET['id'];
    	$s = M('category');
    	$list = $s->where("id='$id'")->delete();
    	if($list){
    		$info="删除成功";
    	}else{
			$info="请刷新页面，再删除";
    	}
    	$this->assign("info",$info);
    	$this->success("删除成功!");
    }
    // 执行修改
    public function modifyCategory(){
    	$state['id'] = $_GET['id'];
    	$state['category'] = $_GET['con'];
    	$s = M('category');
    	$list = $s->save($state);
    	if($list){
    		$info = "修改分类成功";
    	}else{
    		$info = "修改分类失败";
    	}
    	$this->ajaxReturn($info);
    }

    // 执行添加状态
    public function addState(){
    	$data['state'] = $_POST['state'];
    	if($data['state']==""){
    		return;
    	}
    	$s=M('state');
    	$list=$s->data($data)->add($data);
    	if($list){
    		$data['info']="添加状态成功!";
    	}else{
    		$data['info']="添加状态失败!";
    	}
		$this->ajaxReturn($data);
    }
    // 执行删除状态
    public function delState(){
        $data=$this->setMessage();
        $this->assign("data",$data);
    	$id = $_GET['id'];
    	$s = M('state');
    	$list = $s->where("id='$id'")->delete();
    	if($list){
    		$info="删除状态成功";
    	}else{
			$info="请刷新页面，再删除";
    	}
    	$this->assign("info",$info);
    	$this->success("删除成功!");
    }
    // 执行修改
    public function modifyState(){
    	$state['id'] = $_GET['id'];
    	$state['state'] = $_GET['con'];
    	$s = M('state');
    	$list = $s->save($state);
    	if($list){
    		$info = "修改状态成功";
    	}else{
    		$info = "修改状态失败";
    	}
    	$this->ajaxReturn($info);
    }
    // 系统设置
     public function adminSet(){
        $data=$this->setMessage();
        $this->assign("data",$data);
        $set = M('set');
        $list = $set->select();
        $this->assign("list",$list);
        $this->display();
    }
    // 执行修改设置
    public function modifyAdminSet(){
        $id = $_POST['id'];
        $b = $_POST['b']; //修改博客
        if($_POST['aon']!=""){
            $data['a_on'] = $_POST['aon'];
        }else{
            if($b == 1){
               $data['b_on'] = $_POST['bon'];   
            }else{
               $data['s_on'] = $_POST['son'];  
            }
        }
        $set = M('set');
        $list = $set->where("id='$id'")->save($data);
        if($list){
           $info = "修改成功"; 
        }else{
           $info = "修改失败";
        }
        $this->ajaxReturn($info);
    }
    // 发布文章
    public function adminSendnews(){
        $data=$this->setMessage();
        $this->assign("data",$data);
        // 获取文章分类
        $c = M('category');
        $clist = $c->select();
        $this->assign("clist",$clist);
        // 获取文章状态
        $s = M('state');
        $slist = $s->select();
        $this->assign("slist",$slist);
        $this->display("adminSendnews");        
    }
    // 添加文章
    public function addNews(){
        $data=$this->setMessage();
        $msg['title'] = $_POST['title'];//文章标题
        $msg['cid'] = $_POST['category'];//分类
        $msg['sid'] = $_POST['state'];//状态
        $msg['original'] = $_POST['original'];//是否原创
        // 1为原创 2为非原创
        if($msg['original']==1){
            $msg['from_title'] ="Be程序员所有";
            $msg['from'] = "/becommunity/index.php";
        }else{
            $msg['from_title'] = $_POST['from'];//文章来自标题
            $msg['from'] = $_POST['link'];//来自链接
        }
        $msg['content'] = $_POST['content'];//文章内容
        // 自动从摘要中获取
        if($_POST['summary']==""){
           $msg['summary'] = strip_tags(mb_substr($_POST['content'],0,149,'utf-8'));
        }else{        
            $msg['summary'] = $_POST['summary'];//文章内容
        }
        $msg['date'] = date("Y-m-d H:i:s");//发布时间
        $msg['user_id'] = $data[0]['id'];;//作者id
        $msg['author'] = $data[0]['nicheng'];;//作者昵称
        $set = M('set');
        $slist = $set->where("id='1'")->getField("a_on");
        if($slist == 1){
            $msg['check']=2;//待审为2
        }else{
            $msg['check']=0;//不用审为0
        }
        // 获取文章图片
        preg_match('/<img.*?src="(.*?)".*?>/is',$msg['content'],$match); 
        if($match[1]){
            // 存在照片就存
            $msg['arcimg'] = $match[1];
        }else{
            // 不存在照片就使用默认的照片
            $msg['arcimg'] = "__PUBLIC__/images/definexx.png";
        }
        $a = M('article');
        $list = $a->add($msg);
        if($list){
            if($msg['check']==0){
                $this->success("发布资讯成功!");
            }else{
                $this->success("文章需审核，审核后即可发布!");
            }
        }else{
            $this->error("发布文章失败!");
        }
    }
    // 文章分页列表
    public function adminArticlelist(){
         $data=$this->setMessage();
         $this->assign("data",$data);
         $id = $data[0]['id'];
        $a = M('articleList');
        import('ORG.Util.Page');// 导入分页类
        $count      = $a->where("user_id='$id'")->count();// 查询满足要求的总记录数
        $Page       = new Page($count,14);// 实例化分页类 传入总记录数和每页显示的记录数
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $a->where("user_id='$id'")->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $Page->setConfig('header','个数据');
        $Page->setConfig('first','1');
        $Page->setConfig('next','>>');
        $Page->setConfig('prev','<<');
        $Page->setConfig('theme ','<li><a href="">%LINK_PAGE%</a></li>');
        // 是否开启审核
        $s = M('set');
         if($list){
            $this->assign("list",$list);
            $this->assign("show",$show);
         }
         $this->display();
    }
    // 删除文章
    public function doDelete(){
        $id = $_GET['id'];
        $a = M('article');
        $list = $a->where("id='$id'")->delete();
        if($list){
            $info = "文章删除成功!";
        }else{
            $info = "文章删除失败!";
        }
        $this->ajaxReturn($info);
    }
    // 发布软件页面
    public function adminSendsoft(){
        $data=$this->setMessage();
        $this->assign("data",$data);
        $s = M('state');
        $slist = $s->select();
        $this->assign("slist",$slist);
        $this->display();
    }
    public function doAddSoft(){
        $data=$this->setMessage();
        $this->assign("data",$data);
        $data['user_id']=$data[0]['id'];//发布软件人的id
        $data['title'] = $_POST['title'];//软件名
        $data['sort'] = $_POST['sort'];//软件分类
        $data['language'] = $_POST['language'];//软件语言
        $data['give'] = $_POST['give'];//软件授权
        $data['sid'] = $_POST['sid'];//软件状态
        $data['sort_id'] = $_POST['soft_id'];//软件来自的地方
        // if($data['sort_id'] == 2){
        //     import('ORG.Net.UploadFile');
        //     $upload = new UploadFile();// 实例化上传类
        //     $upload->maxSize  = 3145728 ;// 设置附件上传大小
        //     $upload->allowExts  = array();// 设置附件上传类型
        //     $upload->savePath =  './Public/Uploads/';// 设置附件上传目录
        //     if($upload->upload()) {// 上传错误提示错误信息
        //        $info =  $upload->getUploadFileInfo();
        //     }
        //     $data['link'] = $info[0]['savepath'].$info[0]['name'];
        //     $data['softbig'] = $info['size'];
        // }else{
            $data['link'] = $_POST['link'];//软件链接
            $data['softbig'] = $_POST['softbig'];//软件大小
        // }
        $data['introduce'] = $_POST['introduce'];//软件介绍
        $data['keywords'] = $_POST['keywords'];//软件关键字
        $data['from'] = $_POST['from'];//出版公司
        $data['date'] = date("Y-m-d H:i:s");//日期
        // 检查是否需要审核
        $s = M('set');
        $slist = $s->where("id='1'")->getField('s_on');
        if($slist == 1){
            $data['check'] = 2;//要审
        }else{
            $data['check'] = 0;//不用审
        }
        $soft = M('soft');
        $list= $soft->add($data);
        if($list){
            $this->success('发布软件成功!');
        }else{
            $this->error("发布软件失败!");
        }
    }
    // 软件列表
    public function adminSoftlist(){
        $data=$this->setMessage();
        $this->assign("data",$data);
         $id = $data[0]['id'];
        $a = M('soft');
        import('ORG.Util.Page');// 导入分页类
        $count      = $a->where("user_id='$id'")->count();// 查询满足要求的总记录数
        $Page       = new Page($count,14);// 实例化分页类 传入总记录数和每页显示的记录数
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $a->where("user_id='$id'")->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $Page->setConfig('header','个数据');
        $Page->setConfig('first','1');
        $Page->setConfig('next','>>');
        $Page->setConfig('prev','<<');
        $Page->setConfig('theme ','<li><a href="">%LINK_PAGE%</a></li>');
        // 是否开启审核
        $s = M('set');
        $son = $s->where("id='1'")->getField('s_on');
        $this->assign("aon",$son);
         if($list){
            $this->assign("list",$list);
            $this->assign("show",$show);
         }
         $zt = M('state');
         $ztlist = $zt->select();
         $this->assign("ztlist",$ztlist);
        $this->display();
    }
    // 删除软件
    public function deleteSoft(){
        $id = $_GET['id'];
        $s = M('soft');
        $list = $s->where("id='$id'")->delete();
        if($list){
            $info = "删除成功!";
        }else{
           $info = "删除失败!";
        }
        $this->ajaxReturn($info);
    }
    // 友情链接管理
    public function adminLinkFriend(){
        $data=$this->setMessage();
        $this->assign("data",$data);  
        $l = M('friendlink');
        $list = $l->select();
        $this->assign("list",$list);     
        $this->display();
    }
    // 实行添加友情链接
    public function addLink(){
        $data['title'] = $_POST['title'];
        $data['link'] = $_POST['link'];
        $l = M('friendlink');
        $list = $l->add($data);
        if($list){
            $info="发表友情链接成功!";
        }else{
            $info="发表友情链接失败!";
        }
        $this->ajaxReturn($info);
    }
    // 删除友情链接
    public function delLink(){
        $id = $_GET['id'];
        $l = M('friendlink');
        $list = $l->where("id='$id'")->delete();
        if($list){
           $this->success("删除友情链接成功!");
        }else{
           $this->error("删除友情链接失败!");
        }
    }
    // 修改友情链接名称
    public function modifyLink(){
        $id = $_GET['id'];
        $data['title'] = $_GET['con'];
        $l = M('friendlink');
        $list = $l->where("id='$id'")->save($data);
        if($list){
            $info="修改成功!";
        }else{
            $info="修改失败!";
        }
        $this->ajaxReturn($info);
    }
    // 修改友情链接链接
    public function modifyLinks(){
        $id = $_GET['id'];
        $data['link'] = $_GET['con'];
        $l = M('friendlink');
        $list = $l->where("id='$id'")->save($data);
        if($list){
            $info="修改成功!";
        }else{
            $info="修改失败!";
        }
        $this->ajaxReturn($info);
    }
    // 文章审核列表
    public function examineArticle(){
         $data=$this->setMessage();
         $this->assign("data",$data);
         $id = $data[0]['id'];
         $map['user_id'] = array('eq',$id); 
         $map['_query'] = 'check=2';
        $a = M('articleList');
        import('ORG.Util.Page');// 导入分页类
        $count      = $a->where($map)->count();// 查询满足要求的总记录数
        $Page       = new Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $a->where($map)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $Page->setConfig('header','个数据');
        $Page->setConfig('first','1');
        $Page->setConfig('theme ','<li><a href="">%LINK_PAGE%</a></li>');
        // 是否开启审核
        $s = M('set');
         if($list){
            $this->assign("list",$list);
            $this->assign("show",$show);
         }
         $this->display();
    }
    // 软件审核列表
    public function examineSoft(){
        $data=$this->setMessage();
        $this->assign("data",$data);
         $id = $data[0]['id'];
          $map['user_id'] = array('eq',$id); 
         $map['_query'] = 'check=2';
        $a = M('soft');
        import('ORG.Util.Page');// 导入分页类
        $count      = $a->where($map)->count();// 查询满足要求的总记录数
        $Page       = new Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $a->where($map)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $Page->setConfig('header','个数据');
        $Page->setConfig('first','1');
        $Page->setConfig('theme ','<li><a href="">%LINK_PAGE%</a></li>');
        // 是否开启审核
        $s = M('set');
        $son = $s->where("id='1'")->getField('s_on');
        $this->assign("aon",$son);
         if($list){
            $this->assign("list",$list);
            $this->assign("show",$show);
         }
         $zt = M('state');
         $ztlist = $zt->select();
         $this->assign("ztlist",$ztlist);
        $this->display();
    }
    // 软件审核操作 
    public function passExamine(){
        $id = $_GET['id'];
        // check==1时为审核通过，check==3时没有通过
        $check = $_GET['check'];
        $s = M('soft');
        $data['check']= $check;
        $list = $s->where("id='$id'")->save($data);
        if($list){
            $this->success("审核完成!");
        }else{
            $this->error("系统问题!");
        }
    }
    // 文章审核操作 
    public function doExamine(){
        $id = $_GET['id'];
        // check==1时为审核通过，check==3时没有通过
        $check = $_GET['check'];
        $s = M('article');
        $data['check']= $check;
        $list = $s->where("id='$id'")->save($data);
        if($list){
            $this->success("审核完成!");
        }else{
            $this->error("系统问题!");
        }
    }
    //修改文章
    public function modifyNews(){
        $data=$this->setMessage();
        $this->assign("data",$data);
        // 获取文章分类
        $c = M('category');
        $clist = $c->select();
        $this->assign("clist",$clist);
        // 获取文章状态
        $s = M('state');
        $slist = $s->select();
        $this->assign("slist",$slist);
        $id = $_GET['id'];
        $a = M('article');
        $list = $a->where("id='$id'")->select();
        $this->assign("list",$list);
        $this->display();
    }
    // 执行修改文章
    public function domodifyNews(){
        $data=$this->setMessage();
        $this->assign("data",$data);
        $msg['title'] = $_POST['title'];//文章标题
        $msg['cid'] = $_POST['category'];//分类
        $msg['sid'] = $_POST['state'];//状态
        $msg['original'] = $_POST['original'];//是否原创
        // 1为原创 2为非原创
        // if($msg['original']==1){
        //     $msg['from_title'] ="Be程序员所有";
        //     $msg['from'] = "/becommunity/index.php";
        // }else{
            $msg['from_title'] = $_POST['from'];//文章来自标题
            $msg['from'] = $_POST['link'];//来自链接
        // }
        $msg['content'] = $_POST['content'];//文章内容
        // 自动从摘要中获取
        if($_POST['summary']==""){
           $msg['summary'] = strip_tags(mb_substr($_POST['content'],0,149,'utf-8'));
        }else{        
            $msg['summary'] = $_POST['summary'];//文章内容
        }
        $msg['date'] = date("Y-m-d H:i:s");//发布时间
        $set = M('set');
        $slist = $set->where("id='1'")->getField("a_on");

        if($slist == 1){
            $msg['check']=2;//待审为2
        }else{
            $msg['check']=0;//不用审为0
        }
        // 获取文章图片
        $str = strip_tags($msg['content'], '<img>');
        preg_match_all('/\<img\s+src\=\"([\w:\/\.]+)\"/', $str, $matches);
        //var_dump($matches[1]);
        $match = $matches[0];
        if($match[0]){
            // 存在照片就存
            $msg['arcimg'] = $match[0];
        }else{
            // 不存在照片就使用默认的照片
            $msg['arcimg'] = "/Public/images/definexx.png";
        }
        $a = M('article');
        $id = $_POST['arc_id'];
        // echo "HEllo".$id;
        $list = $a->where("id='$id'")->save($msg);
        if($list){
            if($msg['check']==0){
                $this->success("发布资讯成功!");
            }else{
                $this->success("文章需审核，审核后即可发布!");
            }
        }else{
            $this->error("发布文章失败!");
        }
    }
    // 修改软件
    public function doModify(){
        $data=$this->setMessage();
        $this->assign("data",$data);
        // 获取文章分类
        $c = M('category');
        $clist = $c->select();
        $this->assign("clist",$clist);
        // 获取文章状态
        $s = M('state');
        $slist = $s->select();
        $this->assign("slist",$slist);
        $id = $_GET['id'];
        $a = M('soft');
        $list = $a->where("id='$id'")->select();
        $this->assign("list",$list);
        $this->display();
    }
    // 执行修改软件
    public function modifySoft(){
       $data=$this->setMessage();
       $this->assign("data",$data);
       $msg['user_id']=$data[0]['id'];//发布软件人的id
       $msg['title'] = $_POST['title'];//软件名
       $msg['sort'] = $_POST['sort'];//软件分类
       $msg['language'] = $_POST['language'];//软件语言
       $msg['give'] = $_POST['give'];//软件授权
       $msg['sid'] = $_POST['sid'];//软件状态
       $msg['sort_id'] = $_POST['soft_id'];//软件来自的地方
       $msg['link'] = $_POST['link'];//软件链接
       $msg['softbig'] = $_POST['softbig'];//软件大小
       $msg['introduce'] = $_POST['introduce'];//软件介绍
       $msg['keywords'] = $_POST['keywords'];//软件关键字
       $msg['from'] = $_POST['from'];//出版公司
       $msg['date'] = date("Y-m-d H:i:s");//日期
       // 检查是否需要审核
       $s = M('set');
       $slist = $s->where("id='1'")->getField('s_on');
       if($slist == 1){
           $msg['check'] = 2;//要审
       }else{
           $msg['check'] = 0;//不用审
       }
       $id = $_POST['id'];
       $soft = M('soft');
       $list= $soft->where("id='$id'")->save($msg);
       if($list){
           $this->success('发布软件成功!');
       }else{
           $this->error("发布软件失败!");
       } 
    }
    // 系统信息
    public function adminSystem(){
        $data=$this->setMessage();
        $this->assign("data",$data);
        $this->display();
    }
    // 修改密码
    public function modifyPass(){
        $id = session("id");//用户id
        $data=$this->setMessage();
        $this->assign("data",$data);
        $this->display();
    }
    // 修改密码
    public function doModifyPass(){
        $id = session("id");//用户id
        $u = M('user');
        $list = $u->where("id='$id'")->getField("pass");
        $old = md5($_POST['oldpass']);//旧密码
        $new = md5($_POST['newpass']);//新密码
        $renew = md5($_POST['renewpass']);//确认密码
        if($old != $list){
            $this->error('旧密码不正确!');
        }
        if($new != $renew){
          $this->error('两次密码不一致!');  
        }
        $data['pass'] = $new;
        $l = $u->where("id='$id'")->save($data);
        if($l){
            $this->success("修改密码成功!");
        }else{
            $this->error('系统禁止改密码!');
        }
    }
    // 关于我
    public function seeMe(){
        $id = session("id");//用户id
        $data=$this->setMessage();
        $this->assign("data",$data);
        $this->display();
    }
    // 保存关于我的信息
    public function saveMe(){
        $id = $_POST['ids'];
        $data['nicheng'] = $_POST['nicheng'];
        $data['introduce'] = $_POST['introduce'];

        import('ORG.Net.UploadFile');
        $upload = new UploadFile();// 实例化上传类
        $upload->maxSize  = 3145728 ;// 设置附件上传大小
        $upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->savePath =  './Public/Uploads/';// 设置附件上传目录
        if($upload->upload()) {// 上传错误提示错误信息
            // $this->error($upload->getErrorMsg());
            
        // }else{// 上传成功 获取上传文件信息
            $info =  $upload->getUploadFileInfo();
            $data['headimg'] = "__PUBLIC__/Uploads/".$info[0]['savename']; 
        }
        $u = M('user');
        $l = $u->where("id='$id'")->save($data);
        if($l){
            $this->success("修改资料成功!");
        }else{
           $this->error("请不要重复操作!");
        }
    }
    // 评论管理列表
    public function commentList(){
        $this->display();
    }
}