<?php
class StoreAction extends Action {
	// 店铺首页
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
		$store=M('store');
		// $result2=$store->where("username='$username'")->getField("storeName");
		$result=$store->where("username='$username'")->find();
		// 判断开店选项是否已经开店，0为未申请，1为申请成功（但没审批）,2是审批了并且成功开通,（3）其他数字是开店失败!
		$all=$store->where("username='$username'")->getField("is_kai");
//		print_r($all);
		if($all==1){
			$this->redirect("ok");
		}else if($all==3){
			$this->redirect("false");
		}else if($all==2){	
			$this->assign("storeName",$result['storeName']);
			$this->assign("storeImg",$result['storeImg']);
			$this->assign("lei_store",$result['lei_store']);
			$this->assign("storeAddress",$result['storeAddress']);
			$this->assign("storePhone",$result['storePhone']);
			$this->assign("storeImg",$result['storeImg']);
			$gong_id=$result['gong_id'];
			// print_r($result);
			$li=M('gongying');
			$jie=$li->where("gong_id='$gong_id'")->getField("gongName");
			$this->assign("gongName",$jie);
			$this->display();
		}else{
			$this->redirect("shen");
		}

	}	
	// 是否申请开通店铺
	public function shen(){
		$who=session("who");
		$this->assign("who",$who);
		$username=session("username");
		$user=M('store');
		// 判断开店选项是否已经开店，0为未申请，1为申请成功（但没审批）,2是审批了并且成功开通,（3）其他数字是开店失败!
		$all=$user->where("username='$username'")->getField("is_kai");
		if($all==0 ){
			$this->display();
		}else if($all==1){
			$this->redirect("ok");
		}else if($all==2){
			$this->redirect("index");
		}else if($all==3){
			$this->redirect("false");
		}
		
	}
	// 执行申请开通
	public function do_shen(){
		$username=session("username");
		$data['storeName']=$_POST['you'];
		$data['is_kai']=1;
		$data['storeImg']="logo.png";
		$data['username']=$username;
		$list=M('store');
		$result=$list->add($data);
		if($result){
			$this->redirect("ok");
		}else{
			$this->error("申请失败!请重新申请！");
		}
	}
	// 申请成功
	public function ok(){
		$who=session("who");
		$this->assign("who",$who);
		$username=session("username");
		$user=M('store');
		// 判断开店选项是否已经开店，0为未申请，1为申请成功（但没审批）,2是审批了并且成功开通,其他数字是开店失败!
		$all=$user->where("username='$username'")->getField("is_kai");
		if($all==1 ){
			$this->display();
		}else if($all==2){
			$this->redirect("index");
		}
	}
// 申请成功
	public function false(){
		$who=session("who");
		$this->assign("who",$who);
		$username=session("username");
		$user=M('store');
		$this->display();
	}
	// 商店资料
	public function store(){
		$who=session("who");
		$this->assign("who",$who);
		$username=session("username");
		$user=M('store');
		$sort=M('leibie');
		$sall=$sort->field("lei_name")->select();
		$this->assign("sall",$sall);
		$result=$user->where("username='$username'")->find();
		$gong_id=$result['gong_id'];
		if($result){
			$this->assign("storeName",$result['storeName']);
			$this->assign("lei_store",$result['lei_store']);
			$this->assign("storeAddress",$result['storeAddress']);
			$this->assign("storePhone",$result['storePhone']);
			$this->assign("storeImg",$result['storeImg']);
			$li=M('gongying');
			$jie=$li->where("gong_id='$gong_id'")->getField("gongName");
			$this->assign("gongName",$jie);
		}else{
			$this->error("店铺信息输出有错！");
		}
		$this->display();
	}
	// 保存资料
	public function do_save(){
		$list=M('store');
    	$username=session("username");
    	$data['storeName']=$_POST['storeName'];
    	$data['storeAddress']=$_POST['storeAddress'];
    	$data['storePhone']=$_POST['storePhone'];
    	$data['lei_store']=$_POST['lei_store'];
   // 文件上传
        import('ORG.Net.UploadFile');
        $upload = new UploadFile();// 实例化上传类
        $upload->maxSize  = 3145728 ;// 设置附件上传大小
        $upload->allowExts  = array('png','gif','jpg','jpeg');// 设置附件上传类型
        $upload->savePath =  './Public/Images/tou/';// 设置附件上传目录
        if(!$upload->upload()) {// 上传错误提示错误信息

        }else{// 上传成功 获取上传文件信息
            $f =  $upload->getUploadFileInfo();
            $data['storeImg']=$f[0]["savename"];              
        } 
        // 关于供应商类型的问题（就是选择供应商后需要取消供应商才能更换类型）
        // $gong_id=$list->where("username='$username'")->getField("gong_id");
        // if($gong_id == 0){
        // 	$this->error("您需要取消供应商后才能更换类型!");
        // }
    	$arr=$list->where("username='$username'")->save($data);
    	if($arr){
    		$this->redirect("store");
    	}else{
    		$this->error("修改资料失败!");
    	}
	}
	// 发布商品
	public function sendShopping(){
		$who=session("who");
		$this->assign("who",$who);
		$gong=M('store');
		$username=session("username");
		$result=$gong->where("username='$username'")->getfield("lei_store");

		$list=M('leibie');
		$arr=$list->where("lei_name='$result'")->getField("lei_id");
		$this->assign("lei_name",$result);
		$ll=M("leibie2");
		$soso=$ll->where("lei_id='$arr'")->select();
        $this->assign("lei",$soso);
		$this->display();
	}
      //发布商品附加图
      public function sendShopping2(){
         $who=session("who");
        $this->assign("who",$who);
        $username=session("username");
        $this->display();
      }
      //发布供应商商品
      public function sendGong(){
         $who=session("who");
        $this->assign("who",$who);
        $username=session("username");
        $this->display();
      }      
	// 发布自己的商品
	public function do_send(){
$username=session("username");
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
		$data['storeName']=$username;
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
	// 执行商品上传附图
	public function do_send2(){
		$username=session('username');
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
	// 商品订单
	public function ding(){
		$who=session("who");
		$this->assign("who",$who);
		$username=session('username');
		$list=M('buy');
		import('ORG.Util.Page');// 导入分页类
		$count      = $list->where("storeName='$username'")->count();// 查询满足要求的总记录数
		$Page       = new Page($count,15);// 实例化分页类 传入总记录数和每页显示的记录数
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$result = $list->where("storeName='$username'")->order('buy_id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('result',$result);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display();
	}
	// 接受订单
	public function doding(){
		$bid=$_GET['bid'];
		$data['is_chu']=1;
		$list=M('buy');
		$result=$list->where("buy_id='$bid'")->save($data);
		if($result){
			$this->success("接受订单成功!");
		}else{
			$this->error("接受订单失败!");
		}
	}
	// 拒收订单
	public function dodel(){
		$bid=$_GET['bid'];
		$list=M('buy');
		$result=$list->where("buy_id='$bid'")->delete();
		if($result){
			$this->success("拒收订单成功!");
		}else{
			$this->error("拒收订单失败!");
		}
	}
	// 商品列表
	public function shoppingList(){
		$who=session("who");
		$this->assign("who",$who);	
		$username=session("username");
		$list=M('shop');
		$result=$list->select();
		import('ORG.Util.Page');// 导入分页类
		$count      = $list->where("gongName='$username'")->count();// 查询满足要求的总记录数
		$Page       = new Page($count,15);// 实例化分页类 传入总记录数和每页显示的记录数
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$result = $list->where("storeName='$username'")->order('shop_id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('result',$result);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display(); // 输出模板
	}
// 修改商品
	public function shopModify(){
		$who=session("who");
		$this->assign("who",$who);
		$username=session("username");
		$lei=M('gongying');
		$ree=$lei->where("username='$username'")->getField("lei_store");
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
		$data['storeName']=$username;
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
	// 商品评价
	public function shoppingPing(){
		$who=session("who");
		$this->assign("who",$who);
		$this->display();
	}
	// 商品销售统计
	public function shoppingTong(){
				$who=session("who");
		$this->assign("who",$who);
		$this->display();
	}
	// 发布供应商商品
	public function shopAll(){
		$username=session("username");
		$list=M('store');
		$result=$list->where("username='$username'")->getField("gong_id");
		if($result == 0){
			$this->error("您未选择供应商!不能发布商品！");
		}
		$shopNum=$_POST['shopNumber'];
		$shopName=$_POST['shopName'];
		$list=M('shop');
		$all=$list->where("shopNum=$shopNum && shop_id=$shopName")->find();
		$data['shopName']=$all['shopName'];
		$data['shopNum']=$all['shopNum']+1;
		$data['shopSay']=$all['shopSay'];
		$data['shopPrice']=$all['shopPrice'];
		$data['shopHuanjia']=$all['shopHuanjia'];
		$data['shopYun']=$all['shopYun'];
		$data['shopImage']=$all['shopImage'];
		$data['shopShu']=$all['shopShu'];
		$data['lei_name']=$all['lei_name'];
		$data['shopTime']=$all['shopTime'];
		$data['is_up']=$all['is_up'];
		$data['storeName']=$username;
		$re=$list->add($data);
		if($re){
			$this->success("发布成功!");
		}else{
			$this->error("发布失败！");
		}
	}		

}
