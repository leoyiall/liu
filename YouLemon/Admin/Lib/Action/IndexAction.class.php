<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public function index(){
    	$who=session("who");
    	$username=session("username");
    	$list=M('user');
      if($username==null){
        $this->redirect("login");
      }
    	$img=$list->where("username='$username'")->getField("img");
    	$this->assign("img",$img);
    	$this->assign("who",$who);
    	$this->display();
    }
    // 安全设置
     public function safe(){
     	$who=session("who");
     	$this->assign("who",$who);
      $username=session("username");
      if($username==null){
        $this->redirect("login");
      }
    	$this->display();
    }  
	//修改密码
     public function update(){
     	$who=session("who");
     	$this->assign("who",$who);
     	$jpass=$_POST['j_pass'];
     	$pass=$_POST['pass'];
   	 	$pass1=$_POST['pass1'];
   	 	$username=session("username");
      if($username==null){
        $this->redirect("login");
      }
		$list=M('user');
		$arr=$list->where("username='$username'")->getField("password");
		if($arr!=md5($jpass)){
			$this->error("原密码错误！");
		}
   	 	if($pass != $pass1){
   	 		$this->error("新密码不一致！");
   	 	}else{
   	 		
   	 		$data['password']=md5($pass);
   	 		$result=$list->where("username='$username'")->save($data);
   	 		if($result){
   	 			$this->redirect("safe");
   	 		}else{
   	 			$this->error("修改密码失败!");
   	 		}
   	 	}
    }  
	//修改密码
     public function update_mi(){
     	$who=session("who");
     	$this->assign("who",$who);
      $username=session("username");
      if($username==null){
        $this->redirect("login");
      }
 		$this->display();
     }
     public function update_mibao(){
     	$who=session("who");
     	$this->assign("who",$who);
      $username=session("username");
      if($username==null){
        $this->redirect("login");
      }
 		$this->display();
     }
     public function update_email(){
     	$who=session("who");
     	$this->assign("who",$who);
      $username=session("username");
      if($username==null){
        $this->redirect("login");
      }
 		$this->display();
     }
     public function update_phone(){
     	$who=session("who");
     	$this->assign("who",$who);
      $username=session("username");
      if($username==null){
        $this->redirect("login");
      }
 		$this->display();
     }
    //验证密保才能修改密保
    public function mibao_yan(){
     	$who=session("who");
     	$this->assign("who",$who);
      $username=session("username");
      if($username==null){
        $this->redirect("login");
      }
      $mibao1=$_POST['mibao1'];
   	 	$mibao2=$_POST['mibao2'];
   	 	$list=M('user');
   	 	$user=session("user");
   	 	$result=$list->where("username='$user'&& mibao1='$mibao1'&& mibao2='$mibao2'")->find();
   	 	if($result){
   	 		$this->redirect("update_mibao2");
   	 	}else{
   	 		$this->error("密保答案错误,请重新填写！");
   	 	} 	
    } 
    //修改密保
     public function update_yan2(){
     	$who=session("who");
     	$this->assign("who",$who);
      $username=session("username");
      if($username==null){
        $this->redirect("login");
      }
        $data['mibao1']=$_POST['mibao1'];
   	 	$data['mibao2']=$_POST['mibao2'];
   	 	$list=M('user');
   	 	$username=session("user");	
   	 	$result=$list->where("username='$username'")->save($data);
   	 	if($result){
   	 		$this->redirect("safe");
   	 	}else{
   	 		$this->error("修改密保失败！");
   	 	} 
     }
//修改邮箱
     public function update_youjian(){
     	$who=session("who");
     	$this->assign("who",$who);
     	$jemail=$_POST['j_email'];
     	$email=$_POST['email'];
   	 	      $username=session("username");
      if($username==null){
        $this->redirect("login");
      }
		$list=M('user');
		$arr=$list->where("username='$username'")->getField("email");
		if($arr!=$jemail){
			$this->error("原邮箱错误！");
		}   	 		
   	 		$data['email']=$email;
   	 		$result=$list->where("username='$username'")->save($data);
   	 		if($result){
   	 			$this->redirect("safe");
   	 		}else{
   	 			$this->error("修改邮箱失败!");
   	 		}
    }  
// 修改手机号
     public function update_dophone(){
     	$who=session("who");
     	$this->assign("who",$who);
     	$jphone=$_POST['jphone'];
     	$phone=$_POST['phone'];
   	 	      $username=session("username");
      if($username==null){
        $this->redirect("login");
      }
		$list=M('user');
		$arr=$list->where("username='$username'")->getField("phone");
		if($arr!=$jphone){
			$this->error("原手机号码错误！");
		}   	 		
   	 		$data['phone']=$phone;
   	 		$result=$list->where("username='$username'")->save($data);
   	 		if($result){
   	 			$this->redirect("safe");
   	 		}else{
   	 			$this->error("修改手机号码失败!");
   	 		}
    }    
    // 输出个人资料
     public function person(){
     	$who=session("who");
     	$this->assign("who",$who);
   	 	$username=session("username");
      if($username==null){
        $this->redirect("login");
      }
		$list=M('user');
		$arr=$list->where("username='$username'")->getField("user_id,img,nicheng,really_name,sex,year,month,day",1);
		$arr2=$list->where("username='$username'")->getField("user_id");
		$this->assign("img",$arr[$arr2]['img']);
		$this->assign("nicheng",$arr[$arr2]['nicheng']);
		$this->assign("really_name",$arr[$arr2]['really_name']);
		$this->assign("sex",$arr[$arr2]['sex']);
		$this->assign("year",$arr[$arr2]['year']);
		$this->assign("month",$arr[$arr2]['month']);
		$this->assign("day",$arr[$arr2]['day']);
    	$this->display();
    }   
    // 执行修改的资料
    public function do_person(){
    	$list=M('user');
    	      $username=session("username");
      if($username==null){
        $this->redirect("login");
      }
    	$data['nicheng']=$_POST['nicheng'];
    	$data['really_name']=$_POST['really_name'];
    	$data['sex']=$_POST['sex'];
    	$data['year']=$_POST['birthday'];
    	$data['month']=$_POST['monthday'];
    	$data['day']=$_POST['day'];
   // 文件上传
        import('ORG.Net.UploadFile');
        $upload = new UploadFile();// 实例化上传类
        $upload->maxSize  = 3145728 ;// 设置附件上传大小
        $upload->allowExts  = array('png','gif','jpg','jpeg');// 设置附件上传类型
        $upload->savePath =  './Public/Images/tou/';// 设置附件上传目录
        if(!$upload->upload()) {// 上传错误提示错误信息

        }else{// 上传成功 获取上传文件信息
            $f =  $upload->getUploadFileInfo();
            $data['img']=$f[0]["savename"];              
        } 
    	$arr=$list->where("username='$username'")->save($data);
    	if($arr){
    		$this->redirect("person");
    	}else{
    		$this->error("修改资料失败!");
    	}
    }
    // 地址
     public function address(){
     	$who=session("who");
     	$this->assign("who",$who);
     	      $username=session("username");
      if($username==null){
        $this->redirect("login");
      }
     	$list=M('address');
     	$arr=$list->where("username='$username'")->find();
     	$this->assign("address_id",$arr['address_id']);
     	$this->assign("shouWho",$arr['who']);
     	$this->assign("area",$arr['area']);
     	$this->assign("xiangArea",$arr['xiangArea']);
     	$this->assign("youBian",$arr['youBian']);
     	$this->assign("phone",$arr['phone']);
     	$this->assign("guPhone",$arr['guPhone']);
    	$this->display();
    } 
    // 保存地址
    public function save_address(){
     	      $username=session("username");
      if($username==null){
        $this->redirect("login");
      }
    	$data['who']=$_POST['shouhuoren'];
    	$data['area']=$_POST['sheng'];
    	$data['xiangArea']=$_POST['xiang'];
    	$data['youBian']=$_POST['stamp'];
    	$data['phone']=$_POST['phone'];
    	$data['guPhone']=$_POST['guPhone'];
    	$data['username']=$username;
    	$list=M('address');
    	$arr=$list->where("username='$username'")->getField("username");
    	if($arr==0){
			$result=$list->add($data);
    	}else{
    		$result=$list->where("username='$username'")->save($data);
    	}    	
    	if($result){
    		$this->redirect("address");
    	}else{
    		$this->error("保存地址失败！");
    	}
    } 
    // 地址删除
    public function del(){
        $username=session("username");
      if($username==null){
        $this->redirect("login");
      }
    	$address_id=$_GET['id'];
    	$list=M("address");
    	$result=$list->where("address_id='$address_id'")->delete();
    	if($result){
    		$this->redirect("address");
    	}else{
    		$this->error("删除失败!");
    	}
    }
    // 我的评价部分
    public function pingjia(){
     	$who=session("who");
     	$this->assign("who",$who);
      $username=session("username");
      if($username==null){
        $this->redirect("login");
      }
     	$this->display();
     }
    // 注册界面
      public function reg(){
      	if($_POST['number']==1){
      	session('[start]');
      	session('user',$_POST["user"]);
      	session('pass',$_POST["pass"]); 
      	$this->redirect("reg2");
    	  }
      	if($_POST['number']==2){
      	session('nicheng',$_POST["nicheng"]);
      	session('email',$_POST["email"]); 
	     	session('phone',$_POST["phone"]); 
      	$this->redirect("reg3");
     	 }
      	if($_POST['number']==3){
      	$data['username']=session('user');
		$data['password']=md5(session('pass'));
		$data['nicheng']=session('nicheng');
		$data['email']=session('email');
		$data['phone']=session('phone');
		$data['mibao1']=$_POST['mibao1'];
		$data['mibao2']=$_POST['mibao2'];
		$data['img']="logo.png";
		$data['gong']="0";
		$list=M('user');
		$result=$list->add($data);
		if($result){
			session('name',null);
			$this->redirect("reg4");
		}else{
			print_r($result);
			$this->error("注册失败!");
		}      	
     	 }
    	$this->display();
    } 

    // 登录界面
      public function login(){
        $username=session("username");
        if($username){
          $this->redirect("index");
        }
      	$this->display();   	
   	 }  
   	 // 验证码部分
Public function verify(){
    import("ORG.Util.Image");
    Image::buildImageVerify(4,1,png,40,30,'verify');
}
	//登录验证 
   	public function do_login(){
   	 	$username=$_POST['user'];
      	$password=md5($_POST['pass']);
		if(session('verify') != md5($_POST['yanzheng'])) {
  			 $this->error('验证码错误！');
		 }

      	if($username==null || $username=="" || $password==null || $password ==""){
      		$this->error("用户名密码不能为空！");
      	}else{
      	$list=M('user');
      	$user=$list->where("username='$username'")->find();
		$who=$list->where("username='$username'")->getField("nicheng");
      	if($user && $list->where("password='$password'")->find()){	
      		session("who",$who);
			session("username",$username);
      		$this->redirect("index");
      	}else{
      		$this->error("用户名密码错误!");
      	}
      }    	
   	 }   
   	 // 密码找回
   	 public function forget(){
   	 	$this->display();
   	 }
   	 public function yz(){
   	 	session("user",$_POST['user']);
   	 	$this->display();
   	 } 
   	 public function set(){
   	 	$mibao1=$_POST['mibao1'];
   	 	$mibao2=$_POST['mibao2'];
   	 	$list=M('user');
   	 	$user=session("user");
   	 	$result=$list->where("username='$user'&& mibao1='$mibao1'&& mibao2='$mibao2'")->find();
   	 	if($result){
   	 		$this->display();
   	 	}else{
   	 		$this->error("密保答案错误,请重新填写！");
   	 	}
   	 }
   	 public function suc(){
   	 	$pass=$_POST['pass'];
   	 	$pass1=$_POST['pass1'];
   	 	if($pass != $pass1){
   	 		$this->error("密码不一致！");
   	 	}else{
   	 		$list=M('user');
   	 		$data['password']=md5($pass);
   	 		$user=session("user");
   	 		$result=$list->where("username='$user'")->save($data);
   	 		if($result){
   	 			$this->display();
   	 		}else{
   	 			$this->error("修改密码失败!");
   	 		}
   	 		
   	 	}

   	 }
     public function buyShop(){
      $who=session("who");
      $this->assign("who",$who);
    $username=session("username");
      if($username==null){
        $this->redirect("login");
      }
      $this->display();
     }

   	 // 用户退出
   	 public function back(){
   	 	$a=session(null); 
   	 	if($a){
   	 		$this->error("退出错误！");
   	 	}else{
   	 		$this->redirect("login");
   	 	}
   	 }
     public function lookShop(){
      $who=session("who");
      $this->assign("who",$who);
      $username=session("username");
      $list=M('buy');
      // $shop=M('shop');
      // $shop_id=$arr['shop_id'];
      // $result=$shop->where("shop_id='$shop_id'")->select();
      // $this->assign("result",$result);
      import('ORG.Util.Page');// 导入分页类
        $count      = $list->where("username='$username' && yong_chu=1 ")->count();// 查询满足要求的总记录数
        $Page       = new Page($count,15);// 实例化分页类 传入总记录数和每页显示的记录数
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $arr = $list->where("username='$username' && yong_chu=1 ")->order('buy_id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('arr',$arr);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出   

      $this->display();
     }
}