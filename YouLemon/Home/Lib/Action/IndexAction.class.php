<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public function index(){
       $who=session("who");
        $this->assign("who",$who);
       
        $quan=M();
       // 全部取电视
        $ds=$quan->query("select * from shop  where lei_name = '平板电视' order by shop_id desc");
        $this->assign("ds",$ds);
      // 全部取服装鞋包
        $bb=$quan->query("select * from shop where lei_name = '羽绒服' order by shop_id desc ");
        $this->assign("bb",$bb);
      // 手机通讯部分
        $sj=$quan->query("select * from shop where lei_name = '手机' order by shop_id desc ");
        $this->assign("sj",$sj);  
      // 电脑部分
        $dn=$quan->query("select * from shop where lei_name = '笔记本' order by shop_id desc ");
        $this->assign("dn",$dn);
      // 个护美妆
        $mz=$quan->query("select * from shop where lei_name = '香水' order by shop_id desc ");
        $this->assign("mz",$mz);
      // 葡萄酒
        $pt=$quan->query("select * from shop where lei_name = '葡萄酒' order by shop_id desc ");
        $this->assign("pt",$pt);
     // 图书
        $ts=$quan->query("select * from shop where lei_name = '管理' order by shop_id desc ");
        $this->assign("ts",$ts);

	    $lei=M();
	    //1 取出大家电分类
        $so=$lei->query("select l1.lei_id,l1.lei_name,l2.l2_id,l2.lei2_name from leibie l1 join leibie2 l2 on l1.lei_id=l2.lei_id where l1.lei_id>='5' && l1.lei_id<='9'");
        $data=array(       );
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
        $this->assign('so',$data);
 
 	//2 取出手机分类
        $soo=$lei->query("select l1.lei_id,l1.lei_name,l2.l2_id,l2.lei2_name from leibie l1 join leibie2 l2 on l1.lei_id=l2.lei_id where l1.lei_id>='10' && l1.lei_id<='16'");
        $data1=array(     );
        $dsort1=null;
        foreach($soo as $k){
          if(array_key_exists($k["lei_name"],$data1)){
            array_push($data1[$k["lei_name"]],$k);
          }else{
            $dsort1=$k["lei_name"];
            $data1[$dsort1]=array();
            array_push($data1[$dsort1],$k);
          } 
        }
        $this->assign('soo',$data1);

     //3 取出电脑办公分类
        $sooo=$lei->query("select l1.lei_id,l1.lei_name,l2.l2_id,l2.lei2_name from leibie l1 join leibie2 l2 on l1.lei_id=l2.lei_id where l1.lei_id>='17' && l1.lei_id<='22'");
        $data2=array(  );
        $dsort2=null;
        foreach($sooo as $k){
          if(array_key_exists($k["lei_name"],$data2)){
            array_push($data2[$k["lei_name"]],$k);
          }else{
            $dsort2=$k["lei_name"];
            $data2[$dsort2]=array();
            array_push($data2[$dsort2],$k);
          } 
        }
        $this->assign('sooo',$data2);

//4 取出男装女装分类
        $ss=$lei->query("select l1.lei_id,l1.lei_name,l2.l2_id,l2.lei2_name from leibie l1 join leibie2 l2 on l1.lei_id=l2.lei_id where l1.lei_id='2' || (l1.lei_id>='23' && l1.lei_id<='24')");
        // echo "<pre>";
        // print_r($ss);
        $data3=array(  );
        $dsort3=null;
        foreach($ss as $k){
          if(array_key_exists($k["lei_name"],$data3)){
            array_push($data3[$k["lei_name"]],$k);
          }else{
            $dsort3=$k["lei_name"];
            $data3[$dsort3]=array();
            array_push($data3[$dsort3],$k);
          } 
        }
        // print_r($data3);
        // echo "</pre>";
        $this->assign('sasa',$data3);
//5 取出个护化妆分类
        $ses=$lei->query("select l1.lei_id,l1.lei_name,l2.l2_id,l2.lei2_name from leibie l1 join leibie2 l2 on l1.lei_id=l2.lei_id where l1.lei_id>='25' && l1.lei_id<='31' ");
        // echo "<pre>";
        // print_r($ss);
        $data4=array(  );
        $dsort4=null;
        foreach($ses as $k){
          if(array_key_exists($k["lei_name"],$data4)){
            array_push($data4[$k["lei_name"]],$k);
          }else{
            $dsort4=$k["lei_name"];
            $data4[$dsort4]=array();
            array_push($data4[$dsort4],$k);
          } 
        }
        // print_r($data3);
        // echo "</pre>";
        $this->assign('ses',$data4);
//6 取出食品分类
        $sesa=$lei->query("select l1.lei_id,l1.lei_name,l2.l2_id,l2.lei2_name from leibie l1 join leibie2 l2 on l1.lei_id=l2.lei_id where l1.lei_id>=32 && l1.lei_id<=38 ");
        // echo "<pre>";
        // print_r($ss);
        $data5=array(  );
        $dsort5=null;
        foreach($sesa as $k){
          if(array_key_exists($k["lei_name"],$data5)){
            array_push($data5[$k["lei_name"]],$k);
          }else{
            $dsort5=$k["lei_name"];
            $data5[$dsort5]=array();
            array_push($data5[$dsort5],$k);
          } 
        }
        // print_r($data3);
        // echo "</pre>";
        $this->assign('sesa',$data5);
//7 取出食品分类
        $sesaa=$lei->query("select l1.lei_id,l1.lei_name,l2.l2_id,l2.lei2_name from leibie l1 join leibie2 l2 on l1.lei_id=l2.lei_id where l1.lei_id>=39 && l1.lei_id<=45 ");
        // echo "<pre>";
        // print_r($ss);
        $data6=array(  );
        $dsort6=null;
        foreach($sesaa as $k){
          if(array_key_exists($k["lei_name"],$data6)){
            array_push($data6[$k["lei_name"]],$k);
          }else{
            $dsort6=$k["lei_name"];
            $data6[$dsort6]=array();
            array_push($data6[$dsort6],$k);
          } 
        }
        // print_r($data3);
        // echo "</pre>";
        $this->assign('sesaa',$data6);

    	$this->display();
    }
    // 供应商分类列表
    public function gys(){
       $who=session("who");
        $this->assign("who",$who);
   $lei=M();
      //取出全部分类
        $so=$lei->query("select l1.lei_id,l1.lei_name,l2.l2_id,l2.lei2_name from leibie l1 join leibie2 l2 on l1.lei_id=l2.lei_id");
        //        echo "<pre>";
        // print_r($so);
        $data=array(       );
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
        //   print_r($data);
        // echo "</pre>";
        $this->assign('so',$data);


      $this->display();
    }
    // 供应商对应分类详细供应商列表
    public function gys_list(){
        $who=session("who");
        $this->assign("who",$who);
        $lei_name=$_GET['lname'];
        $this->assign("lname",$lei_name);
        $lei_id=$_GET['lid'];
        $l2_id=$_GET['lid2'];
        $this->assign("lei_name",$lei_name);
        $list=M("leibie");
        $result=$list->where("lei_id='$lei_id'")->getField("lei_name");
        $this->assign("lei_name",$result);
        $gong=M('gongying');
        $user=$gong->where("lei_gong='$lei_name'")->getField("username");
        import('ORG.Util.Page');// 导入分页类
        $count      = $gong->where("lei_gong='$lei_name' || lei_gong='$result'")->count();// 查询满足要求的总记录数
        $Page       = new Page($count,15);// 实例化分页类 传入总记录数和每页显示的记录数
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $arr = $gong->where("lei_gong='$lei_name' || lei_gong='$result'")->order('gong_id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('arr',$arr);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出     

        $sh=M();
        $shop=$sh->query("select g.username,s.*  from gongying g join shop s on g.username=s.gongName where s.gongName='$user' order by s.shop_id desc limit 2");
        $this->assign("shop",$shop);
        $this->display();
    }

    // 供应商的商品介绍页面
    public function introduce(){
      $who=session("who");
      $this->assign("who",$who);
      $username=session("username");
      $shop_id=$_GET['shopId'];
      $all=M();
      $re=$all->query("select s.gongName,s.lei_name from user g join shop s on g.username=s.gongName where s.shop_id='$shop_id'");
      $list=M('shop');
      $res=$_GET['ss'];
      $lei_bie=$_GET['lname'];
      $shopNum=$_GET['number'];
      // print_r($_GET);
      $this->assign("lei_bie",$lei_bie);
      $result=$list->where(" gongName='$res' && shop_id='$shop_id' ")->find();
      // $shopNum=$result['shopNum'];
      $this->assign("result",$result);
      $li=M('product');
      $res=$li->where("shopNum='$shopNum'")->find();
      $this->assign("re",$res);
      $lei=M('gongying');
      $ree=$lei->where("username='$username'")->getField("lei_gong");
      $this->assign("lei",$ree);
      $img=M('shopimg');
      $shopImg=$img->where("shopNum='$shopNum'")->find();
      $this->assign("shopImg",$shopImg);

      $this->display();
    }
    // 供应商介绍页
      public function gysIntroduce(){
      $who=session("who");
      $this->assign("who",$who);
        $username=session("username");

        $shop_id=$_GET['gid'];
        $gongPhone=$_GET['phone'];
        $gongAddress=$_GET['add'];
        $shopImg=$_GET['pit'];
        $lei_name=$_GET['glei'];
        $gongName=$_GET['gname'];
        $this->assign("Phone",$gongPhone);
        $this->assign("add",$gongAddress);
        $this->assign("img",$shopImg);
        $this->assign("lei_name",$lei_name);
        $this->assign("gongName",$gongName);
        $list=M();
        $arr=$list->query('select g.really_name from user g join shop s on g.username=s.gongName');
        $this->assign("realy",$arr[0]['really_name']);
        $yy=M('gongying');
        $user=$yy->where("gong_id=$shop_id")->getField("username");
        $shop=$list->query("select s.* from user g join shop s on g.username=s.gongName where gongName='$user'");
        $this->assign('gongId',$shop_id);// 赋值数据集
        $this->assign("shop",$shop);
        $this->display();
      }

      // 店铺选择供应商
      public function xuanze(){
        $lname=$_GET['lname'];
        $username=session("username");
        if($username == null){
          $this->error("您未登录，不能选择!");
        }
        $gong=$_POST['xuangong'];
        $data['gong_id']=$gong;
        $list=M('store');
        $gid=$list->where("gong_id=$gong")->getField('gong_id');
        if($gid != 0 ){
          $this->error("您不能重复选择其他供应商!");
        }
        $gong_id=$list->where("gong_id=$gong")->find();
        if($gong_id){
          $this->error("您已选择该供应商!");
        }
        $arr=$list->where("username='$username' && lei_store='$lname'")->save($data);
        if($arr){
            $this->success("选择供应商成功!");
        }else{
          $this->error("您选择的供应商与您店铺类型不一致!");
        }
      }
      // 店铺商品介绍页
      public function shopIntroduce(){
        $who=session("who");
        $this->assign("who",$who);
        $username=session("username");
        $this->assign("username",$username);
        $shop_id=$_GET['shopId'];
        $is_up=$_GET['iup'];
        $shopNum=$_GET['shnum'];
        $shopName=$_GET['shname'];
        $shopImg=$_GET['shimg'];
        $this->assign("shopimg",$shopImg);
        $lei_name=$_GET['lname'];
        $username=$_GET['ss'];
        $this->assign("shop_id",$shop_id);
        $list=M();
        $list2=M("shop");
        $arr=$list2->where("shop_id=$shop_id && storeName='$username'")->select();
       // echo "<pre>";
       //  print_r($arr);
       //  echo "</pre>";
        $this->assign("arr",$arr);
        $arr2=$list->query("select * from product where shopNum=$shopNum");
        $this->assign("arr2",$arr2);
        $arr3=$list->query("select * from shopimg where shopnum=$shopNum");
        $this->assign("arr3",$arr3);
        $shop=$list->query("select * from store where username='$username'");
        $this->assign("lei_name",$lei_name);
        $this->assign("store",$shop);
        $this->display();
      }
      // 店铺介绍页
      public function storeIntroduce(){
        $who=session("who");
        $this->assign("who",$who);
        $store_id=$_GET['sid'];
        $storeName=$_GET['sname'];
        $lei_name=$_GET['lname'];
        $username=$_GET['nn'];
        $storeAddress=$_GET['sadd'];
        $storeImg=$_GET['img'];
        $storePhone=$_GET['phone'];
        $list=M('store');
        $arr=$list->where("store_id='$store_id'")->find();
        $this->assign("arr",$arr);
       $this->assign("lei_name",$lei_name);
       $uu=M('user');
       $jie=$uu->where("username='$username'")->getField("really_name");
       $this->assign("realy",$jie);
       $sh=M('shop');
       $shop=$sh->where("storeName='$username'")->order("shop_id desc")->select();
       $this->assign("shop",$shop);
        // $this->assign("store_id",$store_id);
        $this->display();
      }

      // 筛选页
      public function xuan(){
      $who=session("who");
      $this->assign("who",$who);
        $leiname=$_GET['leiname'];
        $lname=$_GET['lname'];
        $this->assign("lname",$lname);
        $list=M('shop');

        import('ORG.Util.Page');// 导入分页类
        $count      = $list->where("lei_name='$lname'")->count();// 查询满足要求的总记录数
        $Page       = new Page($count,15);// 实例化分页类 传入总记录数和每页显示的记录数
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $arr = $list->where("lei_name='$lname'")->order('shop_id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('shop',$arr);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出   
        $this->display();
      }
      // 搜索页
      public function search(){
        $who=session("who");
        $this->assign("who",$who);
        $shopName=$_POST['shopName'];
        $this->assign("shopName",$shopName);
        $list=M('shop');
        $result=$list->where("shopName like '%$shopName%'")->select();
        $this->assign("shop",$result);

        $this->display();
      }

      // 添加购物车
      public function addcar(){
        $username=$_GET['who'];
        if($username == null){
          $this->error("请先登录!");
        }
        $shop_id=$_GET['sid'];
        $list=M('shop');
        $arr=$list->where("shop_id='$shop_id'")->select();
        $car=M('shopping');
        $data['username']=$username;
        $data['storeName']=$arr['0']['storeName'];
        $data['number']=1;
        $data['shop_id']=$shop_id;
        $result=$car->add($data);
        if($result){
          $this->success("添加成功!");
        }else{
          $this->error("已添加过!");
        }
      }
      // 自己的购物车
      public function gouwuche(){
        $who=session("who");
        $this->assign("who",$who);
        if($who == null){
          $this->error("请先登录!");
        }
        $list=M('user');
        $arr=$list->where("nicheng='$who'")->getfield("username");
        $shop=M();
        $so=$shop->query("select s.* from shop s join shopping sh on s.shop_id=sh.shop_id where sh.username='$arr'");
        $this->assign("so",$so);

        $this->display();
      }
      // 删除购物车
      public function del(){
        $shop_id=$_GET['id'];
        $who=session("who");
        $this->assign("who",$who);
        if($who == null){
          $this->error("请先登录");
        }
        $list=M('shopping');
        $result=$list->where("shop_id=$shop_id")->delete();
        if($result){
          $this->success("删除成功！");
        }else{
          $this->error("删除失败!");
        }
      }
      // 订单列表
      public function dingdan(){
        $who=session("who");
        $this->assign("who",$who);
        $username=session("username");
        $this->assign("uu",$username);
        if($who == null){
          $this->error("请先登录");
        }
        $shop_id=$_GET['sid'];
        $shopName=$_GET['sname'];
        $list=M('shop');
        $arr=$list->where("shop_id='$shop_id'")->find();
        $this->assign("arr",$arr);
        $dizhi=M("address");
        $zhe=$dizhi->where("username='$username'")->find();
        $this->assign("zhe",$zhe);
        $this->display();
      }
      // 支付订单
      public function ok(){
        $who=session("who");
        $this->assign("who",$who);
        $liuyan=$_POST['liuyan'];
        $username=$_GET['uu'];
        $shop_id=$_GET['sid'];
        $list=M('shop');
        $result=$list->where("shop_id='$shop_id'")->find();
        $buy=M('buy');
        $data['username']=$username;
        $data['shopName']=$result['shopName'];
        $data['storeName']=$result['storeName'];
        $data['price']=$result['shopHuanjia'];
        $data['state']=$liuyan;
        $data['yong_chu']=1; //1意思是未付款 2为支付成功
        $data['shopNumber']=1;
        $data['shop_id']=$shop_id;
        $arr=$buy->add($data);
        if(!$arr){
          $this->error("提交订单出错!");
        }
        $this->display();
      }
}