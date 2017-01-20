<?php
// 本类由系统自动生成，仅供测试用途
class HoushopAction extends Action {
    public function index(){
    	$who=session("who");
    $username=session("username");
    $list=M('user');
    	$img=$list->where("username='$username'")->getField("img");
    	$this->assign("img",$img);
    	$this->assign("who",$who);
    	$this->display();
    }

     // 验证码部分
Public function verify(){
    import("ORG.Util.Image");
    Image::buildImageVerify(4,1,png,40,30,'verify');
}
  //登录验证 
    public function do_login(){
      $username=$_POST['username'];
        $password=md5($_POST['password']);
    if(session('verify') != md5($_POST['yanzheng'])) {
         $this->error('验证码错误！');
     }
        $list=M('user');
        $result=$list->where("username='$username'")->getField("power");
        if($result==0){
          $this->error("账号用户名错误，请确认您的用户身份。");
        }
        if($username==null || $username=="" || $password==null || $password ==""){
          $this->error("用户名密码不能为空！");
        }else{
        $user=$list->where("username='$username'")->find();
    $who=$list->where("username='$username'")->getField("nicheng");
        if($user && $list->where("password='$password'")->find()){  
          session("who",$who);
      session("username",$username);
          $this->redirect("ht_index");
        }else{
          $this->error("用户名密码错误!");
        }
      }    
     } 
     // 后台系统首页
     public function ht_index(){
        $who=session("who");
       $this->assign("who",$who);
    $username=session("username");
    $list=M('user');
    $power=$list->where("username='$username'")->getfield("power");
        if($username==null || $power==0){
          $this->error("路径不对!");
        }
       $result=$list->where("username='$username'")->getField("power");
       $arr=$list->where("username='$username'")->getField("img");
       if($result==1){
          $this->assign("result",$result);
          $this->assign("shenfen","超级管理员");
          $this->assign("img",$arr);
       }else{
        $this->assign("result",$result);
        $this->assign("shenfen","管理员");
        $this->assign("img",$arr);
       }
        $this->display();
     }  
 // 后台系统首页
     public function ht_person(){
        $who=session("who");
       $this->assign("who",$who);
       $username=session("username");
    $username=session("username");
    $uu=M('user');
    $power=$uu->where("username='$username'")->getfield("power");
        if($username==null || $power==0){
          $this->error("路径不对!");
        }
       $list=M('user');
       $result=$list->where("username='$username'")->getField("power");
       if($result==1){
          $this->assign("result",$result);
          $this->assign("shenfen","超级管理员");
       }else{
        $this->assign("result",$result);
        $this->assign("shenfen","管理员");
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
 // 输出个人资料
     public function person(){
      $who=session("who");
      $this->assign("who",$who);
      $username=session("username");
    $username=session("username");
    $uu=M('user');
    $power=$uu->where("username='$username'")->getfield("power");
        if($username==null || $power==0){
          $this->error("路径不对!");
        }
    }   
    // 执行修改的资料
    public function do_person(){
      $list=M('user');
             $username=session("username");
    $username=session("username");
    $uu=M('user');
    $power=$uu->where("username='$username'")->getfield("power");
        if($username==null || $power==0){
          $this->error("路径不对!");
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
        $this->redirect("ht_person");
      }else{
        $this->error("修改资料失败!");
      }
    }
    // 添加管理员页面
    public function ht_addgl(){
      $who=session("who");
      $this->assign("who",$who);
             $username=session("username");
    $username=session("username");
    $uu=M('user');
    $power=$uu->where("username='$username'")->getfield("power");
        if($username==null || $power==0){
          $this->error("路径不对!");
        }
       $list=M('user');
       $result=$list->where("username='$username'")->getField("power");
       if($result==1){
          $this->assign("result",$result);
          $this->assign("shenfen","超级管理员");
       }else{
        $this->assign("result",$result);
        $this->assign("shenfen","管理员");
       }
      $this->display();
    }
    // 实行注册管理员
    public function addgl(){
       $username=session("username");
    $username=session("username");
    $uu=M('user');
    $power=$uu->where("username='$username'")->getfield("power");
        if($username==null || $power==0){
          $this->error("路径不对!");
        }
    $data['username']=$_POST['user'];
    $data['password']=md5($_POST['pass']);
    $data['nicheng']=$_POST['nicheng'];
    $data['email']=$_POST['email'];
    $data['phone']=$_POST['phone'];
    $data['mibao1']=$_POST['mibao1'];
    $data['mibao2']=$_POST['mibao2'];
    $data['img']="logo.png";
    $data['power']=2;
    $data['gong']="0";
    $list=M('user');
    $result=$list->add($data);
    if($result){
      $this->redirect("ht_gllist");
    }else{
      $this->error("注册失败!");
    }       
    }
     	 // 用户退出
   	 public function tui(){
   	 	$a=session(null); 
   	 	if($a){
   	 		$this->error("退出错误！");
   	 	}else{
   	 		$this->redirect("index");
   	 	}
   	 }

     //管理员列表
     public function ht_gllist(){
      $who=session("who");
      $this->assign("who",$who);
       $username=session("username");
    $username=session("username");
    $uu=M('user');
    $power=$uu->where("username='$username'")->getfield("power");
        if($username==null || $power==0){
          $this->error("路径不对!");
        }      
       $list=M('user');
       $result=$list->where("username='$username'")->getField("power");
       if($result==1){
          $this->assign("result",$result);
          $this->assign("shenfen","超级管理员");
          $count=$list->where("power='2'")->count();
          $this->assign("count",$count);
          import('ORG.Util.Page');// 导入分页类
          $count      = $list->where("power='2'")->count();// 查询满足要求的总记录数
          $Page       = new Page($count,4);// 实例化分页类 传入总记录数和每页显示的记录数
          $show       = $Page->show();// 分页显示输出
          // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
          $all = $list->where("power='2'")->order('user_id')->limit($Page->firstRow.','.$Page->listRows)->select();
          $this->assign('all',$all);// 赋值数据集
          $this->assign('page',$show);// 赋值分页输出
          $this->display(); // 输出模板
       }else{
        $this->assign("result",$result);
        $this->assign("shenfen","管理员");
       }
      $this->display(); 
     }
     // 修改管理员
     public function modify(){
      $who=session("who");
      $this->assign("who",$who);
       $username=session("username");
    $username=session("username");
    $uu=M('user');
    $power=$uu->where("username='$username'")->getfield("power");
        if($username==null || $power==0){
          $this->error("路径不对!");
        }     
       $list=M('user');
       $result=$list->where("username='$username'")->getField("power");
       if($result==1){
          $this->assign("result",$result);
          $this->assign("shenfen","超级管理员");
       }else{
        $this->assign("result",$result);
        $this->assign("shenfen","管理员");
       }
        $id=$_GET['id'];
        $list=M("user");
        $result=$list->where("user_id=$id")->find();
        $this->assign("username",$result['username']);
        $this->assign("password",$result['password']);
        $this->assign("nicheng",$result['nicheng']);
        $this->assign("email",$result['email']);
        $this->assign("phone",$result['phone']);
        $this->display();
     }
     // 执行修改管理员
     public function do_modify(){
    $data['username']=$_POST['user'];
    $data['password']=md5($_POST['pass']);
    $data['nicheng']=$_POST['nicheng'];
    $data['email']=$_POST['email'];
    $data['phone']=$_POST['phone'];
       $username=session("username");
    $username=session("username");
    $uu=M('user');
    $power=$uu->where("username='$username'")->getfield("power");
        if($username==null || $power==0){
          $this->error("路径不对!");
        }
    $list=M('user');
    $result=$list->save($data);
    if($result){
         $this->redirect("ht_gllist");
    }else{
         $this->error("修改失败!");
    }       
     } 
     // 删除管理员
     public function del(){
       $who=session("who");
      $this->assign("who",$who);
       $username=session("username");
    $username=session("username");
    $uu=M('user');
    $power=$uu->where("username='$username'")->getfield("power");
        if($username==null || $power==0){
          $this->error("路径不对!");
        }   
       $list=M('user');
        $id=$_GET['id'];
        $list=M("user");
        $result=$list->where("user_id=$id")->delete();
        if($result){
          $this->redirect("ht_gllist");
        }else{
          $this->error("删除失败!");
        }
     }
// 以下部分是用户列表的删改
        //用户列表
     public function ht_yhlist(){
      $who=session("who");
      $this->assign("who",$who);
       $username=session("username");
    $username=session("username");
    $uu=M('user');
    $power=$uu->where("username='$username'")->getfield("power");
        if($username==null || $power==0){
          $this->error("路径不对!");
        }      
       $list=M('user');
       $result=$list->where("username='$username'")->getField("power");
       if($result==1){
          $this->assign("result",$result);
          $this->assign("shenfen","超级管理员");
          $count=$list->where("power='0'")->count();
          $this->assign("count",$count);
          import('ORG.Util.Page');// 导入分页类
          $count      = $list->where("power='0'")->count();// 查询满足要求的总记录数
          $Page       = new Page($count,7);// 实例化分页类 传入总记录数和每页显示的记录数
          $show       = $Page->show();// 分页显示输出
          // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
          $all = $list->where("power='0'")->order('user_id')->limit($Page->firstRow.','.$Page->listRows)->select();
          $this->assign('all',$all);// 赋值数据集
          $this->assign('page',$show);// 赋值分页输出
          $this->display(); // 输出模板
       }else{
        $this->assign("result",$result);
        $this->assign("shenfen","管理员");
       }
      $this->display(); 
     }
     // 修改用户
     public function yhmodify(){
      $who=session("who");
      $this->assign("who",$who);
       $username=session("username");
    $username=session("username");
    $uu=M('user');
    $power=$uu->where("username='$username'")->getfield("power");
        if($username==null || $power==0){
          $this->error("路径不对!");
        }     
       $list=M('user');
       $result=$list->where("username='$username'")->getField("power");
       if($result==1){
          $this->assign("result",$result);
          $this->assign("shenfen","超级管理员");
       }else{
        $this->assign("result",$result);
        $this->assign("shenfen","管理员");
       }
        $id=$_GET['id'];
        $list=M("user");
        $result=$list->where("user_id=$id")->find();
        $this->assign("username",$result['username']);
        $this->assign("password",$result['password']);
        $this->assign("nicheng",$result['nicheng']);
        $this->assign("email",$result['email']);
        $this->assign("phone",$result['phone']);
        $this->display();
     }
     // 执行修改用户
     public function domodify(){
       $username=session("username");
    $username=session("username");
    $uu=M('user');
    $power=$uu->where("username='$username'")->getfield("power");
        if($username==null || $power==0){
          $this->error("路径不对!");
        }
    $data['username']=$_POST['user'];
    $data['password']=md5($_POST['pass']);
    $data['nicheng']=$_POST['nicheng'];
    $data['email']=$_POST['email'];
    $data['phone']=$_POST['phone'];
    $list=M('user');
    $result=$list->save($data);
    if($result){
         $this->redirect("ht_yhlist");
    }else{
      $this->error("修改失败!");
    }       
     }  
     // 删除用户
     public function yhdel(){
       $who=session("who");
      $this->assign("who",$who);
       $username=session("username");
    $username=session("username");
    $uu=M('user');
    $power=$uu->where("username='$username'")->getfield("power");
        if($username==null || $power==0){
          $this->error("路径不对!");
        }      
       $list=M('user');
        $id=$_GET['id'];
        $list=M("user");
        $result=$list->where("user_id=$id")->delete();
        if($result){
          $this->redirect("ht_yhlist");
        }else{
          $this->error("删除失败!");
        }
     }

  // 店铺列表
     public function ht_storelist(){
        $who=session("who");
        $this->assign("who",$who);
    $username=session("username");
    $uu=M('user');
    $power=$uu->where("username='$username'")->getfield("power");
        if($username==null || $power==0){
          $this->error("路径不对!");
        }
       $list=M('user');
       $result=$list->where("username='$username'")->getField("power");
       if($result==1){
          $this->assign("result",$result);
          $this->assign("shenfen","超级管理员");
       }else{
        $this->assign("result",$result);
        $this->assign("shenfen","管理员");
       }
       $store=M('store');
          import('ORG.Util.Page');// 导入分页类
          $count      = $store->count();// 查询满足要求的总记录数
          $Page       = new Page($count,8);// 实例化分页类 传入总记录数和每页显示的记录数
          $show       = $Page->show();// 分页显示输出
          // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
          $all = $store->order('store_id')->limit($Page->firstRow.','.$Page->listRows)->select();
          $this->assign('all',$all);// 赋值数据集
          $this->assign('page',$show);// 赋值分页输出
          $this->display(); // 输出模板
     }

     // 店铺操作部分(获取的id号为:若为1就是申请（等待审批）,若为2就是开通成功,若为3就是店被封了)
     public function shenhe(){
    $user=session("username");
    // $uu=M('user');
    // $power=$uu->where("username='$user'")->getfield("power");
    //     if($username==null || $power==0){
    //       $this->error("路径不对!");
    //     }
        $username=$_GET['name'];
        $list=M('store');
        $data['is_kai']=$_GET['id'];
        $result=$list->where("username=$username")->save($data);
        if($result){
          $this->redirect("ht_storelist");
        }else{
          $this->error("操作出错!");
        }
     }
// 供应商列表
     public function ht_gonglist(){
        $who=session("who");
        $this->assign("who",$who);
    $username=session("username");
    $uu=M('user');
    $power=$uu->where("username='$username'")->getfield("power");
        if($username==null || $power==0){
          $this->error("路径不对!");
        }
       $list=M('user');
       $result=$list->where("username='$username'")->getField("power");
       if($result==1){
          $this->assign("result",$result);
          $this->assign("shenfen","超级管理员");
       }else{
        $this->assign("result",$result);
        $this->assign("shenfen","管理员");
       }
       $store=M('gongying');
          import('ORG.Util.Page');// 导入分页类
          $count      = $store->count();// 查询满足要求的总记录数
          $Page       = new Page($count,8);// 实例化分页类 传入总记录数和每页显示的记录数
          $show       = $Page->show();// 分页显示输出
          // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
          $all = $store->order('gong_id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
          $this->assign('all',$all);// 赋值数据集
          $this->assign('page',$show);// 赋值分页输出
          $this->display(); // 输出模板
     }

     // 供应商操作部分(获取的id号为:若为1就是申请（等待审批）,若为2就是开通成功,若为3就是店被封了)
     public function gongshen(){
        $user=$_GET['name'];
        $list=M('gongying');
        $data['is_kai']=$_GET['id'];
    $username=session("username");
    $uu=M('user');
   // $power=$uu->where("username='$username'")->getfield("power");
     //   if($username==null || $power==0){
       //   $this->error("路径不对!");
        //}
        $result=$list->where("username=$user")->save($data);
        if($result){
          $this->redirect("ht_gonglist");
        }else{
          $this->error("操作出错!");
        }
     }
     // 添加一级分类
     public function ht_set1(){
        $who=session("who");
        $this->assign("who",$who);
    $username=session("username");
    $uu=M('user');
    $power=$uu->where("username='$username'")->getfield("power");
        if($username==null || $power==0){
          $this->error("路径不对!");
        }
        $list=M('user');
       $result=$list->where("username='$username'")->getField("power");
       if($result==1){
          $this->assign("result",$result);
          $this->assign("shenfen","超级管理员");
       }else{
        $this->assign("result",$result);
        $this->assign("shenfen","管理员");
       }
       $this->display();
     }
     // 执行添加一级分类
     public function add_one(){
    $username=session("username");
    $uu=M('user');
    $power=$uu->where("username='$username'")->getfield("power");
        if($username==null || $power==0){
          $this->error("路径不对!");
        }
        $sort1=$_POST['sort1'];
        $data['lei_name']=$sort1;
       $sort=M('leibie');
       $arr=$sort->add($data);
       if($arr){
        $this->redirect("ht_set1");
       }else{
        $this->error("添加一级分类失败!");
       }
     }
     // 添加一级分类
     public function ht_set2(){
        $who=session("who");
        $this->assign("who",$who);
    $username=session("username");
    $uu=M('user');
    $power=$uu->where("username='$username'")->getfield("power");
        if($username==null || $power==0){
          $this->error("路径不对!");
        }
        $list=M('user');
       $result=$list->where("username='$username'")->getField("power");
       if($result==1){
          $this->assign("result",$result);
          $this->assign("shenfen","超级管理员");
       }else{
        $this->assign("result",$result);
        $this->assign("shenfen","管理员");
       }
       $tian=M('leibie');
       $arr=$tian->select();
       $this->assign("arr",$arr);
       $this->display();
     }
     // 执行添加二级分类
     public function add_two(){
    $username=session("username");
    $uu=M('user');
    $power=$uu->where("username='$username'")->getfield("power");
        if($username==null || $power==0){
          $this->error("路径不对!");
        }
      $fenlei=$_POST['fenlei'];
      $sort2=$_POST['sort2'];
      $data['lei2_name']=$sort2;
      $data['lei_id']=$fenlei;
       $sort=M('leibie2');
       $arr=$sort->add($data);
       if($arr){
        $this->redirect("ht_set2");
       }else{
        $this->error("添加二级分类失败!");
       }
     }

     // 查询出一二级类别的分类
     public function ht_setall(){
       $who=session("who");
        $this->assign("who",$who);
    $username=session("username");
    $uu=M('user');
    $power=$uu->where("username='$username'")->getfield("power");
        if($username==null || $power==0){
          $this->error("路径不对!");
        }
        $list=M('user');
       $result=$list->where("username='$username'")->getField("power");
       if($result==1){
          $this->assign("result",$result);
          $this->assign("shenfen","超级管理员");
       }else{
        $this->assign("result",$result);
        $this->assign("shenfen","管理员");
       }

        $this->assign("arr",$arr);
        $lei2=M();
        $so=$lei2->query("select l1.lei_id,l1.lei_name,l2.l2_id,l2.lei2_name from leibie l1 join leibie2 l2 on l1.lei_id=l2.lei_id");
        // echo "<pre>";
        // print_r($so);
        
        $data=array(    

        );
        $dsort=null;
        foreach($so as $k){
          if(array_key_exists($k["lei_name"],$data)){
            array_push($data[$k["lei_name"]],$k);
          }else{
            $dsort=$k["lei_name"];
            $data[$dsort]=array();
            array_push($data[$dsort],$k);
          } 
        }
        // print_r($data);
        // echo "</pre>";
        $this->assign('so',$data);

      $this->display();
     }
     // 修改二级分类
     public function lm2_xiu(){
   $who=session("who");
        $this->assign("who",$who);
    $username=session("username");
    $uu=M('user');
    $power=$uu->where("username='$username'")->getfield("power");
        if($username==null || $power==0){
          $this->error("路径不对!");
        }
        $list=M('user');
       $result=$list->where("username='$username'")->getField("power");
       if($result==1){
          $this->assign("result",$result);
          $this->assign("shenfen","超级管理员");
       }else{
        $this->assign("result",$result);
        $this->assign("shenfen","管理员");
       }

      $lid=$_GET['lid'];
      $list=M('leibie2');
      $result=$list->where("l2_id='$lid'")->find();
      $lei_id=$result['lei_id'];
      $list2=M("leibie");
      $result2=$list2->where("lei_id=$lei_id")->getField("lei_name");
      $arr=$list2->select();
      $this->assign("lei_id",$lei_id);
      $this->assign("lei_name",$result2);
      $this->assign("lm2_name",$result['lei2_name']);
      $this->assign("arr",$arr);
      $this->display();
     }

     // 执行修改二级分类
     public function modify_two(){
    $username=session("username");
    $uu=M('user');
    $power=$uu->where("username='$username'")->getfield("power");
        if($username==null || $power==0){
          $this->error("路径不对!");
        }
       $lm2_name=$_GET['lm2_name'];
       $fenlei=$_POST['fenlei'];
       $sort2=$_POST['sort2'];
       $data['lei2_name']=$sort2;
       $data['lei_id']=$fenlei;
       $sort=M('leibie2');
       $arr=$sort->where("lei2_name='$lm2_name'")->save($data);
       if($arr){
        $this->redirect("ht_setall");
       }else{
        $this->error("修改二级分类失败!");
       }
     }
     // 删除二级分类
     public function lm2_shan(){
    $username=session("username");
    $uu=M('user');
    $power=$uu->where("username='$username'")->getfield("power");
        if($username==null || $power==0){
          $this->error("路径不对!");
        }
        $lid=$_GET['lid'];
      $list=M('leibie2');
      $result=$list->where("l2_id='$lid'")->delete();
      if($result){
        $this->redirect("ht_setall");
      }else{
        $this->error("删除二级分类失败!");
      }
     }
     // 修改一级分类
     public function lm_xiu(){
   $who=session("who");
        $this->assign("who",$who);
    $username=session("username");
    $uu=M('user');
    $power=$uu->where("username='$username'")->getfield("power");
        if($username==null || $power==0){
          $this->error("路径不对!");
        }
        $list=M('user');
       $result=$list->where("username='$username'")->getField("power");
       if($result==1){
          $this->assign("result",$result);
          $this->assign("shenfen","超级管理员");
       }else{
        $this->assign("result",$result);
        $this->assign("shenfen","管理员");
       }

      $lid=$_GET['lid'];
      $list=M('leibie');
      $result=$list->where("lei_id='$lid'")->find();
      $this->assign("lei_id",$result['lei_id']);
      $this->assign("lei_name",$result['lei_name']);
      $this->display();
     }

     // 执行修改一级分类
     public function modify_one(){
    $username=session("username");
    $uu=M('user');
    $power=$uu->where("username='$username'")->getfield("power");
        if($username==null || $power==0){
          $this->error("路径不对!");
        }
       $lid=$_GET['lid'];
       $sort2=$_POST['sort1'];
       $data['lei_name']=$sort2;
       $sort=M('leibie');
       $arr=$sort->where("lei_id=$lid")->save($data);
       if($arr){
        $this->redirect("ht_setall");
       }else{
        $this->error("修改一级分类失败!");
       }
     }
     // 删除一级分类
     public function lm_shan(){
    $username=session("username");
    $uu=M('user');
    $power=$uu->where("username='$username'")->getfield("power");
        if($username==null || $power==0){
          $this->error("路径不对!");
        }
        $lid=$_GET['lid'];
      $list=M('leibie2');
      $arr=$list->where("lei_id='$lid'")->find();
      if($arr){
        $list2=M('leibie');
        $result2=$list2->where("lei_id='$lid'")->delete();
        if($result){
        $this->redirect("ht_setall");
        }else{
          $this->error("删除一级分类失败!");
        }
      }else{
        $this->error("请先删除所属二级分类才能删除一级分类！");
      }
     }
}           
