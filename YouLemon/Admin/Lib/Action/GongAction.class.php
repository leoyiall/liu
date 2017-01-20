<?php
class GongAction extends Action {
	// 供应商首页
	public function index(){
		$who=session("who");
		$this->assign("who",$who);
    	    $username=session("username");
      if($username==null){
        $this->error("路径不对!");
      }
		$list=M('user');
		$result3=$list->where("username='$username'")->getField("really_name");
		$this->assign("nicheng",$result3);
		$gong=M('gongying');
		$result=$gong->where("username='$username'")->find();
		$result2=$gong->where("username='$username'")->getField("is_kai");
		if($result2==2){
			if($result){
			$this->assign("gong_id",$result['gong_id']);
			$this->assign("gongName",$result['gongName']);
			$this->assign("lei_gong",$result['lei_gong']);
			$this->assign("gongAddress",$result['gongAddress']);
			$this->assign("gongPhone",$result['gongPhone']);
			$this->assign("gongImg",$result['gongImg']);
			}else{
				$this->error("首页出错！");
			}
			$this->display();			
		}else if($result2==1){
			$this->redirect("success2");
		}else{
			$this->redirect("shenqing");	
		}
		
	}	
	// 是否申请开通供应商
	public function shenqing(){
		$who=session("who");
		$this->assign("who",$who);
    	    $username=session("username");
      if($username==null){
        $this->error("路径不对!");
      }
		$user=M('gongying');
		// 判断开店选项是否已经开店，0为未申请，1为申请成功（但没审批）,2是审批了并且成功开通,其他数字是开店失败!
		$all=$user->where("username='$username'")->getField("is_kai");
		if($all==2){
			$this->redirect("index");
		}else if($all==1){
			$this->redirect("success2");
		}else{
			$this->display();
		}
		
	}
	// 执行申请开通
	public function do_shen(){
		    	    $username=session("username");
      if($username==null){
        $this->error("路径不对!");
      }
		$data['gongName']=$_POST['you'];
		$data['is_kai']=1;
		$data['gongImg']="logo.png";
		$data['username']=$username;
		$list=M('gongying');
		$result=$list->add($data);
		if($result){
			$this->redirect("success2");
		}else{
			$this->error("申请失败!请重新申请！");
		}
	}
	// 供应商申请成功
	public function success2(){
		$who=session("who");
		$this->assign("who",$who);
		    	    $username=session("username");
      if($username==null){
        $this->error("路径不对!");
      }
		$user=M('gongying');
		// 判断开店选项是否已经开店，0为未申请，1为申请成功（但没审批）,2是审批了并且成功开通,其他数字是开店失败!
		$all=$user->where("username='$username'")->getField("is_kai");
		if($all==1 ){
			$this->display();
		}else if($all==2){
			$this->redirect("index");
		}
	}
	// 供应商资料
	public function Gong(){
		$who=session("who");
		$this->assign("who",$who);
		    	    $username=session("username");
      if($username==null){
        $this->error("路径不对!");
      }
		$user=M('gongying');
		$result=$user->where("username='$username'")->find();
		$sort=M('leibie');
		$arr=$sort->field("lei_name")->select();
		$this->assign("arr",$arr);
		if($result){
			$this->assign("gongName",$result['gongName']);
			$this->assign("lei_gong",$result['lei_gong']);
			$this->assign("gongAddress",$result['gongAddress']);
			$this->assign("gongPhone",$result['gongPhone']);
			$this->assign("gongImg",$result['gongImg']);
		}else{
			$this->error("供应商信息输出有错！");
		}
		$this->display();
	}
	// 保存资料
	public function do_save(){
		$list=M('gongying');
    	    	    $username=session("username");
      if($username==null){
        $this->error("路径不对!");
      }
    	$data['gongName']=$_POST['storeName'];
    	$data['gongAddress']=$_POST['storeAddress'];
    	$data['gongPhone']=$_POST['storePhone'];
    	$data['lei_gong']=$_POST['lei_store'];
   // 文件上传
        import('ORG.Net.UploadFile');
        $upload = new UploadFile();// 实例化上传类
        $upload->maxSize  = 3145728 ;// 设置附件上传大小
        $upload->allowExts  = array('png','gif','jpg','jpeg');// 设置附件上传类型
        $upload->savePath =  './Public/Images/tou/';// 设置附件上传目录
        if(!$upload->upload()) {// 上传错误提示错误信息

        }else{// 上传成功 获取上传文件信息
            $f =  $upload->getUploadFileInfo();
            $data['gongImg']=$f[0]["savename"];              
        } 
    	$arr=$list->where("username='$username'")->save($data);
    	if($arr){
    		$this->redirect("gong");
    	}else{
    		$this->error("您的资料没有变化!");
    	}
	}
	public function ding(){
		$who=session("who");
		$this->assign("who",$who);
    	    $username=session("username");
      if($username==null){
        $this->error("路径不对!");
      }
		$this->display();
	}
	// 发布商品
	public function sendShopping(){
		$who=session("who");
		$this->assign("who",$who);
		$gong=M('gongying');
		    	    $username=session("username");
      if($username==null){
        $this->error("路径不对!");
      }
		$result=$gong->where("username='$username'")->getfield("lei_gong");

		$list=M('leibie');
		$arr=$list->where("lei_name='$result'")->getField("lei_id");
		$this->assign("lei_name",$result);
		$ll=M("leibie2");
		$soso=$ll->where("lei_id='$arr'")->select();
        $this->assign("lei",$soso);
		$this->display();
	}
	// 发布商品附图
	public function sendShopping2(){
		$who=session("who");
		$this->assign("who",$who);
    	    $username=session("username");
      if($username==null){
        $this->error("路径不对!");
      }
		$this->display();
	}
	// 发布自己的商品
	public function do_send(){
		    	    $username=session("username");
      if($username==null){
        $this->error("路径不对!");
      }
		 // 文件上传
        import('ORG.Net.UploadFile');
        $upload = new UploadFile();// 实例化上传类
        $upload->maxSize  = 3145728 ;// 设置附件上传大小
        $upload->allowExts  = array('png','gif','jpg','jpeg');// 设置附件上传类型
        $upload->savePath =  './Public/Images/shop/';// 设置附件上传目录
        if(!$upload->upload()) {// 上传错误提示错误信息

        }else{// 上传成功 获取上传文件信息
            $f =  $upload->getUploadFileInfo();
            $data['shopImage']=$f[0]["savename"];              
        } 
		$data['shopNum']=$_POST['shopNumber'];
		$data['shopName']=$_POST['shopName'];
		$data['shopPrice']=$_POST['shopYuan'];
		$data['shopHuanjia']=$_POST['shopHui'];
		$data['shopYun']=$_POST['shopYun'];
		$data['shopSay']=$_POST['content'];
		// $data['shopArea']=$_POST['']; //商品地区
		$data['shopShu']=$_POST['shopShu'];
		$data['lei_name']=$_POST['lei2'];
		$data['is_up']=$_POST['is_up'];
		$data['gongName']=$username;
		$data['shopTime']=time();
		// print_r($data);

		$shop=M('shop');
		$result=$shop->add($data);
		if($result){
		$shu['type1']=$_POST['shopType1'];
		$shu['type2']=$_POST['shopType2'];
		$shu['type3']=$_POST['shopType3'];
		$shu['type4']=$_POST['shopType4'];
		$shu['size1']=$_POST['shopSize1'];
		$shu['size2']=$_POST['shopSize2'];
		$shu['size3']=$_POST['shopSize3'];
		$shu['size4']=$_POST['shopSize4'];
		$shu['color1']=$_POST['shopColor1'];
		$shu['color2']=$_POST['shopColor2'];
		$shu['color3']=$_POST['shopColor3'];
		$shu['color4']=$_POST['shopColor4'];
		$shu['shopNum']=$_POST['shopNumber'];
		$product=M('product');
		$arr=$product->add($shu);
		if($arr){
			$this->success("发布商品成功!");
		}else{
			$this->error("发布商品失败!");
		}			
		}else{
			$this->error("插入主信息有错!");
		}
	}

	public function do_send2(){
		    	    $username=session("username");
      if($username==null){
        $this->error("路径不对!");
      }
		$shopNumber=$_POST['shopNumber'];
		$list=M('product');
		$re=$list->where("shopNum='$shopNumber'")->find();
		if(!$re){
			$this->error("无此商品编码!");
		}

				 // 文件上传
        import('ORG.Net.UploadFile');
        $upload = new UploadFile();// 实例化上传类
        $upload->maxSize  = 3145728 ;// 设置附件上传大小
        $upload->allowExts  = array('png','gif','jpg','jpeg');// 设置附件上传类型
        $upload->savePath =  './Public/Images/shop/';// 设置附件上传目录
        if(!$upload->upload()) {// 上传错误提示错误信息
        	  $this->error($upload->getErrorMsg());
        }else{// 上传成功 获取上传文件信息
            $f =  $upload->getUploadFileInfo();
            $data['shopImg']=$f[0]["savename"];
            $data['shopImg2']=$f[1]["savename"];
            $data['shopImg3']=$f[2]["savename"];
            $data['shopImg4']=$f[3]["savename"];            
        } 
        $data['shopNum']=$shopNumber;
        $ha=M('shopimg');
        $jieguo=$ha->add($data);
        if($jieguo){
        	$this->success("发布商品成功!");
        }else{
        	$this->error("上传附图失败!商品已经上传过附图！");
        }
	}
	// 商品列表
	public function shoppingList(){
		$who=session("who");
		$this->assign("who",$who);	
		    	    $username=session("username");
      if($username==null){
        $this->error("路径不对!");
      }
		$list=M('shop');
		$result=$list->select();
		import('ORG.Util.Page');// 导入分页类
		$count      = $list->where("gongName='$username'")->count();// 查询满足要求的总记录数
		$Page       = new Page($count,15);// 实例化分页类 传入总记录数和每页显示的记录数
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$result = $list->where("gongName='$username'")->order('shop_id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('result',$result);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display(); // 输出模板
	}
	// 修改商品
	public function shopModify(){
		$who=session("who");
		$this->assign("who",$who);
		    	    $username=session("username");
      if($username==null){
        $this->error("路径不对!");
      }
		$lei=M('gongying');
		$ree=$lei->where("username='$username'")->getField("lei_gong");
		$this->assign("ll",$ree);
		$sort=M();
		$soso=$sort->query("select l1.lei_id,l1.lei_name,l2.l2_id,l2.lei2_name from leibie l1 join leibie2 l2 on l1.lei_id=l2.lei_id where l1.lei_name='$ree'");
		$this->assign("lei",$soso);
		$shop_id=$_GET['shopId'];	
		$list=M('shop');
		$result=$list->where("shop_id='$shop_id'")->select();
		$shopNum=$result['0']['shopNum'];
		$this->assign("result",$result);
		// 取出商品信息
		$pro=M("product");
		$product=$pro->where("shopNum='$shopNum'")->find();
		$this->assign("pro",$product);
		$this->display();
	}
	// 执行商品修改
	public function do_gai(){
		    	    $username=session("username");
      if($username==null){
        $this->error("路径不对!");
      }
		$shop_id=$_POST['shop_id'];
		 // 文件上传
        import('ORG.Net.UploadFile');
        $upload = new UploadFile();// 实例化上传类
        $upload->maxSize  = 3145728 ;// 设置附件上传大小
        $upload->allowExts  = array('png','gif','jpg','jpeg');// 设置附件上传类型
        $upload->savePath =  './Public/Images/shop/';// 设置附件上传目录
        if(!$upload->upload()) {// 上传错误提示错误信息

        }else{// 上传成功 获取上传文件信息
            $f =  $upload->getUploadFileInfo();
            $data['shopImage']=$f[0]["savename"];              
        } 
		$data['shopNum']=$_POST['shopNumber'];
		$data['shopName']=$_POST['shopName'];
		$data['shopPrice']=$_POST['shopYuan'];
		$data['shopHuanjia']=$_POST['shopHui'];
		$data['shopYun']=$_POST['shopYun'];
		$data['shopSay']=$_POST['content'];
		// $data['shopArea']=$_POST['']; //商品地区
		$data['shopShu']=$_POST['shopShu'];
		$data['lei_name']=$_POST['lei2'];
		$data['is_up']=$_POST['is_up'];
		$data['gongName']=$username;
		$data['shopTime']=time();
		// print_r($data);

		$shop=M('shop');
		$result=$shop->where("shop_id='$shop_id'")->save($data);
		if($result){
		$shu['type1']=$_POST['shopType1'];
		$shu['type2']=$_POST['shopType2'];
		$shu['type3']=$_POST['shopType3'];
		$shu['type4']=$_POST['shopType4'];
		$shu['size1']=$_POST['shopSize1'];
		$shu['size2']=$_POST['shopSize2'];
		$shu['size3']=$_POST['shopSize3'];
		$shu['size4']=$_POST['shopSize4'];
		$shu['color1']=$_POST['shopColor1'];
		$shu['color2']=$_POST['shopColor2'];
		$shu['color3']=$_POST['shopColor3'];
		$shu['color4']=$_POST['shopColor4'];
		$shu['shopNum']=$_POST['shopNumber'];
		$product=M('product');
		$arr=$product->save($shu);
		if($arr){
			$this->success("修改商品成功!");
		}else{
			$this->error("修改商品失败!");
		}			
		}else{
			$this->error("修改主信息有错!");
		}
	}

	// 商品删除
	public function shopDel(){
		$shop_id=$_GET['shopId'];	
		$list=M('shop');
		$shopNum=$list->where("shop_id=$shop_id")->getField('shopNum');
		$del=$list->where("shop_id=$shop_id")->delete();
		$pro=M('product');
		$delpro=$pro->where("shopNum='$shopNum'")->delete();
		$shopimg=M('shopimg');
		$shopdel=$shopimg->where("shopNum='$shopNum'")->delete();
		$this->redirect("shoppingList");
	}

}