<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="leo">
  <meta name="Keywords" content="you柠檬商城">
  <meta name="Description" content="You柠檬电子商城快速购物">
  <title>You柠檬商城首页</title> 
<!-- 头部js部分banner引用 -->
<script type="text/javascript" src="__PUBLIC__/Js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/jquery.SuperSlide.2.1.1.js"></script>
<link href="__PUBLIC__/Css/style.css" rel="stylesheet" type="text/css">

<!-- 选项卡 -->
<link rel="stylesheet" href="__PUBLIC__/Css/zzsc.css" type="text/css">
<script type="text/javascript" src="__PUBLIC__/Js/zzsc.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/gunup.js"></script>
</head>
<style type="text/css">
body{background:#fff;}
	/*returnTop*/
p#back-to-top{
    position:fixed;
    display:none;
    bottom:100px;
    right:80px;
	background:#1E90CA;
}
p#back-to-top a{
    text-align:center;
    text-decoration:none;
    color:#d1d1d1;
    display:block;
    width:54px;
}
p#back-to-top a:hover{
    color:#979797;
}
p#back-to-top a span{
    background:transparent url(/static/imgs/sprite.png?1202) no-repeat -25px -290px;
    border-radius:6px;
    display:block;
    height:64px;
    width:56px;
    margin-bottom:5px;

}
#back-to-top a:hover span{
    background:transparent url(/static/imgs/sprite.png?1202) no-repeat -25px -290px;
}
</style>
<body>
<!-- 商城头部 -->
	<link type="text/css" rel="stylesheet" href="__PUBLIC__/Style/reset.css">
<link type="text/css" rel="stylesheet" href="__PUBLIC__/Style/main.css">
  <link rel="icon" type="image/png" href="__PUBLIC__/Images/logo.ico">
<!-- 头部 -->
<div class="headerBar">
  <div class="topBar">
    <div class="comWidth">
      <div class="rightArea">
      <?php if($who != null): ?><a href="__ROOT__/admin.php/Index/index"><?php echo ($who); ?></a>&nbsp;&nbsp;<a href="__ROOT__/admin.php/Index/back">退出</a>
        <?php else: ?> 
          欢迎来到You柠檬商城！<a href="__ROOT__/admin.php/Index/login">[登录]</a><a href="__ROOT__/admin.php/Index/reg">[注册]</a><?php endif; ?>
        <a href="__ROOT__/index.php/Index/gouwuche?ww=<?php echo ($who); ?>" class="zhu_ys">购物车</a>|<a href="__ROOT__/admin.php/Store/index" class="zhu_ys">我的店铺</a>|<a href="__ROOT__/admin.php/Gong/index" class="zhu_ys">我是供应商</a>
      </div>
    </div>
  </div>
  <div class="logoBar">
    <div class="comWidth">
      <div class="logo fl">
        <a href="__ROOT__/index.php/Index"><img src="__PUBLIC__/Images/logo.png" alt="You柠檬商城" class="fl"></a><h3 class="logo_zi fl">You柠檬商城</h3>
      </div>
      <div class="search_box fl">
        <form action="__ROOT__/index.php/Index/search" method="post">
          <input type="text" class="search_text fl" name="shopName" placeholder="最新最时尚的商品尽在You柠檬">
          <input type="submit" value="搜 索" class="search_btn fr">
        </form>
      </div>
    </div>
  </div>
	<div class="navBox">
		<div class="comWidth clearfix">
			<div class="shopClass fl">
				<h3>全部商品分类&nbsp;&nbsp;<img src="__PUBLIC__/Images/icon/down.png"></h3>
				<div class="shopClass_show">
					<dl class="shopClass_item ">
						<dt>家用电器</dt>
		<div class="shop_right">
 			<div class="leftdiv">
 				<?php if(is_array($so)): $i = 0; $__LIST__ = $so;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dl>
                        <dt><a href="__APP__/Index/xuan?leiname=<?php echo ($key); ?>"><?php echo ($key); ?></a></dt>
                        <dd>
                        <?php if(is_array($vo)): $i = 0; $__LIST__ = $vo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ss): $mod = ($i % 2 );++$i;?><a href="__APP__/Index/xuan?lname=<?php echo ($ss["lei2_name"]); ?>"><?php echo ($ss["lei2_name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>  	  
                        </dd>
                    </dl><?php endforeach; endif; else: echo "" ;endif; ?>         
			 </div>

				</div>
					</dl>
					<!-- 右侧相关导航内容 -->
				
					<dl class="shopClass_item">
						<dt>手机、数码</dt>
<div class="shop_right">
 			<div class="leftdiv">
                    <?php if(is_array($soo)): $i = 0; $__LIST__ = $soo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><dl>
                        <dt><a href="__APP__/Index/xuan?leiname=<?php echo ($key); ?>"><?php echo ($key); ?></a></dt>
                        <dd>
                        <?php if(is_array($vv)): $i = 0; $__LIST__ = $vv;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sss): $mod = ($i % 2 );++$i;?><a href="__APP__/Index/xuan?lname=<?php echo ($sss["lei2_name"]); ?>"><?php echo ($sss["lei2_name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>  	  
                        </dd>
                    </dl><?php endforeach; endif; else: echo "" ;endif; ?>  
                                                 
			 </div>

			</div>
					</dl>
					<dl class="shopClass_item">
						<dt>电脑、办公</dt>
					<div class="shop_right">
				 			<div class="leftdiv">
				                    <?php if(is_array($sooo)): $i = 0; $__LIST__ = $sooo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vvv): $mod = ($i % 2 );++$i;?><dl>
				                        <dt><a href="__APP__/Index/xuan?leiname=<?php echo ($key); ?>"><?php echo ($key); ?></a></dt>
				                        <dd>
				                        <?php if(is_array($vvv)): $i = 0; $__LIST__ = $vvv;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ssss): $mod = ($i % 2 );++$i;?><a href="__APP__/Index/xuan?lname=<?php echo ($ssss["lei2_name"]); ?>"><?php echo ($ssss["lei2_name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>  	  
				                        </dd>
				                    </dl><?php endforeach; endif; else: echo "" ;endif; ?>  
				                                                 
							 </div>
					</div>
					</dl>
					<dl class="shopClass_item">
						<dt>男装、女装、内衣</dt>
						<div class="shop_right">
					 			<div class="leftdiv">
					                    <?php if(is_array($sasa)): $i = 0; $__LIST__ = $sasa;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vs): $mod = ($i % 2 );++$i;?><dl>
					                        <dt><a href="__APP__/Index/xuan?leiname=<?php echo ($key); ?>"><?php echo ($key); ?></a></dt>
					                        <dd>
					                        <?php if(is_array($vs)): $i = 0; $__LIST__ = $vs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sa): $mod = ($i % 2 );++$i;?><a href="__APP__/Index/xuan?lname=<?php echo ($sa["lei2_name"]); ?>"><?php echo ($sa["lei2_name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>  	  
					                        </dd>
					                    </dl><?php endforeach; endif; else: echo "" ;endif; ?>                          
								 </div>
						</div>
					</dl>
					<dl class="shopClass_item">
						<dt>个护化妆、清洁用品</dt>
						<div class="shop_right">
					 			<div class="leftdiv">
					                    <?php if(is_array($ses)): $i = 0; $__LIST__ = $ses;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vis): $mod = ($i % 2 );++$i;?><dl>
					                        <dt><a href="__APP__/Index/xuan?leiname=<?php echo ($key); ?>"><?php echo ($key); ?></a></dt>
					                        <dd>
					                        <?php if(is_array($vis)): $i = 0; $__LIST__ = $vis;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sae): $mod = ($i % 2 );++$i;?><a href="__APP__/Index/xuan?lname=<?php echo ($sae["lei2_name"]); ?>"><?php echo ($sae["lei2_name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>  	  
					                        </dd>
					                    </dl><?php endforeach; endif; else: echo "" ;endif; ?>                          
								 </div>
						</div>
					</dl>
					<dl class="shopClass_item">
						<dt>食品、酒类、特产</dt>
						<div class="shop_right">
					 			<div class="leftdiv">
					                    <?php if(is_array($sesa)): $i = 0; $__LIST__ = $sesa;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$visa): $mod = ($i % 2 );++$i;?><dl>
					                        <dt><a href="__APP__/Index/xuan?leiname=<?php echo ($key); ?>"><?php echo ($key); ?></a></dt>
					                        <dd>
					                        <?php if(is_array($visa)): $i = 0; $__LIST__ = $visa;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$saea): $mod = ($i % 2 );++$i;?><a href="__APP__/Index/xuan?lname=<?php echo ($saea["lei2_name"]); ?>"><?php echo ($saea["lei2_name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>  	  
					                        </dd>
					                    </dl><?php endforeach; endif; else: echo "" ;endif; ?>                          
								 </div>
						</div>
					</dl>
					<dl class="shopClass_item">
						<dt>图书、音箱、电子书</dt>
						<div class="shop_right">
					 			<div class="leftdiv">
					                    <?php if(is_array($sesaa)): $i = 0; $__LIST__ = $sesaa;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vissa): $mod = ($i % 2 );++$i;?><dl>
					                        <dt><a href="__APP__/Index/xuan?leiname=<?php echo ($key); ?>"><?php echo ($key); ?></a></dt>
					                        <dd>
					                        <?php if(is_array($vissa)): $i = 0; $__LIST__ = $vissa;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ssaea): $mod = ($i % 2 );++$i;?><a href="__APP__/Index/xuan?lname=<?php echo ($ssaea["lei2_name"]); ?>"><?php echo ($ssaea["lei2_name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>  	  
					                        </dd>
					                    </dl><?php endforeach; endif; else: echo "" ;endif; ?>                          
								 </div>
						</div>
					</dl>					
				</div>
			</div>
			<ul class="nav fl">
				<li><a href="__APP__/Index" title="首页" class="ac  mive">首页</a></li>
				<li><a href="__APP__/Index/gys" title="供应商">供应商</a></li>
			</ul>
		</div>
	</div>
</div>
<!-- 焦点切换图 -->
<div class="banner-box">
	<div class="bd">
        <ul>          	    
            <li style="background:#F3E5D8;">
                <div class="m-width">
                <a href="javascript:void(0);"><img src="__PUBLIC__/Images/img1.jpg" /></a>
                </div>
            </li>
            <li style="background:#B01415">
                <div class="m-width">
                <a href="javascript:void(0);"><img src="__PUBLIC__/Images/img2.jpg" /></a>
                </div>
            </li>
            <li style="background:#C49803;">
                <div class="m-width">
                <a href="javascript:void(0);"><img src="__PUBLIC__/Images/img3.jpg" /></a>
                </div>
            </li>
            <li style="background:#FDFDF5">
                <div class="m-width">
                <a href="javascript:void(0);"><img src="__PUBLIC__/Images/img4.jpg" /></a>
                </div>
            </li>  
         
        </ul>
    </div>
    <div class="banner-btn">
        <a class="prev" href="javascript:void(0);"></a>
        <a class="next" href="javascript:void(0);"></a>
        <div class="hd"><ul></ul></div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function(){

	$(".prev,.next").hover(function(){
		$(this).stop(true,false).fadeTo("show",0.9);
	},function(){
		$(this).stop(true,false).fadeTo("show",0.4);
	});
	
	$(".banner-box").slide({
		titCell:".hd ul",
		mainCell:".bd ul",
		effect:"fold",
		interTime:3000,
		delayTime:500,
		autoPlay:true,
		autoPage:true, 
		trigger:"click" 
	});

});
</script>
<!-- 家用电器部分 -->
  <div class="case">
    <div class="title cf">
	<h2 class="fl" id="1">家用电器</h2>
      <ul class="title-list fr cf ">
        <li class="on">液晶电视</li>
        <li>电冰箱</li>
        <li>洗衣机</li>
        <li>空调</li>
        <li>热水器</li>
        <p><b></b></p>
      </ul>
    </div>
    <div class="product-wrap">
     <!--案例1-->
      <div class="product show">
      	<div class="product_left fl">
			<h3 name="jiadian">家用电器专场</h3>
		<a href="" title="家用电器"><img src="__PUBLIC__/Images/jyy.png" width="210" height="123" alt="家用电器"></a>
			<div class="product_xia">
					<a href="">电视频道</a>
					<a href="">冰箱频道</a>
					<a href="">空调频道</a>
					<a href="">洗衣机频道</a>
			</div>
					<a href="">海尔电视</a>
					<a href="">海尔冰箱</a>
					<a href="">海尔洗衣机</a>
					<a href="">格力空调</a>
					<a href="">美的空调</a>
					<a href="">三星电视</a>
					<a href="">长虹电视</a>
					<a href="">乐视超级电视</a>
      	</div>
      	<div class="product_right fl">
			<ul>
					<?php if(is_array($ds)): $i = 0; $__LIST__ = $ds;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ds): $mod = ($i % 2 );++$i;?><li>
					<a href="__ROOT__/index.php/Index/shopIntroduce?shopId=<?php echo ($ds["shop_id"]); ?>&iup=<?php echo ($ds["is_up"]); ?>&shnum=<?php echo ($ds["shopNum"]); ?>&shname=<?php echo ($ds["shopName"]); ?>&shimg=<?php echo ($ds["shopImage"]); ?>&shname=<?php echo ($ds["shopName"]); ?>&lname=<?php echo ($ds["lei_name"]); ?>&ss=<?php echo ($ds["storeName"]); ?>" target="_blank" title="<?php echo ($ds["shopName"]); ?>">
						<div class="product_top">
							<h3><?php echo ($ds["shopName"]); ?></h3>
							<img src="__PUBLIC__/Images/shop/<?php echo ($ds["shopImage"]); ?>" width="145" height="131" alt="<?php echo ($ds["shopName"]); ?>">
							<p class="product_price">价格￥<?php echo ($ds["shopHuanjia"]); ?></p>
						</div>
					</a>
				

				<a href="__ROOT__/index.php/Index/shopIntroduce?shopId=<?php echo ($ds["shop_id"]); ?>&iup=<?php echo ($ds["is_up"]); ?>&shnum=<?php echo ($ds["shopNum"]); ?>&shname=<?php echo ($ds["shopName"]); ?>&shimg=<?php echo ($ds["shopImage"]); ?>&shname=<?php echo ($ds["shopName"]); ?>&lname=<?php echo ($ds["lei_name"]); ?>&ss=<?php echo ($ds["storeName"]); ?>" target="_blank" title="<?php echo ($ds["shopName"]); ?>">
						<div class="product_top">
							<h3><?php echo ($ds["shopName"]); ?></h3>
							<img src="__PUBLIC__/Images/shop/<?php echo ($ds["shopImage"]); ?>" width="145" height="131" alt="<?php echo ($ds["shopName"]); ?>">
							<p class="product_price">价格￥<?php echo ($ds["shopHuanjia"]); ?></p>
						</div>
					</a>
				</li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
      	</div>
      </div>

      <!--案例2-->
      <div class="product">
       	<div class="product_left  fl">
			<h3>电冰箱专场</h3>
		<a href="" title="家用电器">
		<img src="__PUBLIC__/Images/xxxxx.jpg" width="210" height="350" alt="家用电器"></a>
			
      	</div>
      	<div class="product_right fl">
			<ul>
				<li>
				<a href="" title="电冰箱">
					<div class="product_top">
						<h3>美的冰箱</h3>
						<img src="__PUBLIC__/Images/bx.png" width="145" height="131" alt="美的冰箱">
						<p class="product_price">价格￥1999</p>
					</div>
				</a>
				<a href="" title="电冰箱">
					<div class="product_top">
						<h3>美的冰箱</h3>
						<img src="__PUBLIC__/Images/bx.png" width="145" height="131" alt="美的冰箱">
						<p class="product_price">价格￥1999</p>
					</div>
				</a>
				</li>
				<li>
				<a href="" title="电冰箱">
					<div class="product_top">
						<h3>美的冰箱</h3>
						<img src="__PUBLIC__/Images/bx.png" width="145" height="131" alt="美的冰箱">
						<p class="product_price">价格￥1999</p>
					</div>
				</a>
				<a href="" title="电冰箱">
					<div class="product_top">
						<h3>美的冰箱</h3>
						<img src="__PUBLIC__/Images/bx.png" width="145" height="131" alt="美的冰箱">
						<p class="product_price">价格￥1999</p>
					</div>
				</a>
				</li>
				<li>
				<a href="" title="电冰箱">
					<div class="product_top">
						<h3>美的冰箱</h3>
						<img src="__PUBLIC__/Images/bx.png" width="145" height="131" alt="美的冰箱">
						<p class="product_price">价格￥1999</p>
					</div>
				</a>
				<a href="" title="电冰箱">
					<div class="product_top">
						<h3>美的冰箱</h3>
						<img src="__PUBLIC__/Images/bx.png" width="145" height="131" alt="美的冰箱">
						<p class="product_price">价格￥1999</p>
					</div>
				</a>
				</li>
				<li>
				<a href="" title="电冰箱">
					<div class="product_top">
						<h3>美的冰箱</h3>
						<img src="__PUBLIC__/Images/bx.png" width="145" height="131" alt="美的冰箱">
						<p class="product_price">价格￥1999</p>
					</div>
				</a>
				<a href="" title="电冰箱">
					<div class="product_top">
						<h3>美的冰箱</h3>
						<img src="__PUBLIC__/Images/bx.png" width="145" height="131" alt="美的冰箱">
						<p class="product_price">价格￥1999</p>
					</div>
				</a>
				</li>
			</ul>
      	</div>       
      </div>
      <!--案例3-->
      <div class="product">
        
      </div>
      <!--案例4-->
      <div class="product">
       
      </div>
	
    <!--案例5-->
      <div class="product">
        
      </div>      
    </div>
  </div>

<!-- 服装鞋包部分 -->
  <div class="case">
    <div class="title cf">
	<h2 class="fl" id="2">服装鞋包</h2>
    </div>
    <div class="product-wrap">
     <!--案例1-->
      <div class="product show">
      	<div class="product_left fl">
			<h3>服装鞋包专场</h3>
		<a href="" title="家用电器"><img src="__PUBLIC__/Images/fff.png" width="210" height="123" alt="家用电器"></a>
			<div class="product_xia">
					<a href="">服装频道</a>
					<a href="">鞋子频道</a>
					<a href="">皮包频道</a>
					<a href="">内衣频道</a>
			</div>
					<a href="">羽绒服</a>
					<a href="">棉服</a>
					<a href="">毛呢大衣</a>
					<a href="">牛仔裤</a>
					<a href="">女性内衣</a>
					<a href="">卫衣</a>
					<a href="">男士内裤</a>
					<a href="">袜子</a>
      	</div>
      	<div class="product_right fl">
			<ul>
					<?php if(is_array($bb)): $i = 0; $__LIST__ = $bb;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$bb): $mod = ($i % 2 );++$i;?><li>
					<a href="__ROOT__/index.php/Index/shopIntroduce?shopId=<?php echo ($bb["shop_id"]); ?>&iup=<?php echo ($bb["is_up"]); ?>&shnum=<?php echo ($bb["shopNum"]); ?>&shname=<?php echo ($bb["shopName"]); ?>&shimg=<?php echo ($bb["shopImage"]); ?>&shname=<?php echo ($bb["shopName"]); ?>&lname=<?php echo ($bb["lei_name"]); ?>&ss=<?php echo ($bb["storeName"]); ?>" target="_blank" title="<?php echo ($bb["shopName"]); ?>">
						<div class="product_top">
							<h3><?php echo ($bb["shopName"]); ?></h3>
							<img src="__PUBLIC__/Images/shop/<?php echo ($bb["shopImage"]); ?>" width="145" height="131" alt="<?php echo ($bb["shopName"]); ?>">
							<p class="product_price">价格￥<?php echo ($bb["shopHuanjia"]); ?></p>
						</div>
					</a>
				

				<a href="__ROOT__/index.php/Index/shopIntroduce?shopId=<?php echo ($bb["shop_id"]); ?>&iup=<?php echo ($bb["is_up"]); ?>&shnum=<?php echo ($bb["shopNum"]); ?>&shname=<?php echo ($bb["shopName"]); ?>&shimg=<?php echo ($bb["shopImage"]); ?>&shname=<?php echo ($bb["shopName"]); ?>&lname=<?php echo ($bb["lei_name"]); ?>&ss=<?php echo ($bb["storeName"]); ?>" target="_blank" title="<?php echo ($bb["shopName"]); ?>">
						<div class="product_top">
							<h3><?php echo ($bb["shopName"]); ?></h3>
							<img src="__PUBLIC__/Images/shop/<?php echo ($bb["shopImage"]); ?>" width="145" height="131" alt="<?php echo ($bb["shopName"]); ?>">
							<p class="product_price">价格￥<?php echo ($bb["shopHuanjia"]); ?></p>
						</div>
					</a>
				</li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
      	</div>
      </div>
	</div>
</div>

<!-- 手机通讯部分 -->
  <div class="case">
    <div class="title cf">
	<h2 class="fl" id="3">手机数码</h2>
    </div>
    <div class="product-wrap">
     <!--案例1-->
      <div class="product show">
      	<div class="product_left fl">
			<h3>手机通讯专场</h3>
		<a href="" title="家用电器"><img src="__PUBLIC__/Images/sji.png" width="210" height="123" alt="家用电器"></a>
			<div class="product_xia">
					<a href="">手机通讯频道</a>
					<a href="">数码相机频道</a>
					<a href="">智能设备频道</a>
					<a href="">各种配件频道</a>
			</div>
					<a href="">苹果手机</a>
					<a href="">华为手机</a>
					<a href="">三星手机</a>
					<a href="">小米手机</a>
					<a href="">魅族手机</a>
					<a href="">锤子手机</a>
					<a href="">佳能单反</a>
					<a href="">索尼单反</a>		
      	</div>
      	<div class="product_right fl">
			<ul>
				<?php if(is_array($sj)): $i = 0; $__LIST__ = $sj;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sj): $mod = ($i % 2 );++$i;?><li>
					<a href="__ROOT__/index.php/Index/shopIntroduce?shopId=<?php echo ($sj["shop_id"]); ?>&iup=<?php echo ($sj["is_up"]); ?>&shnum=<?php echo ($sj["shopNum"]); ?>&shname=<?php echo ($sj["shopName"]); ?>&shimg=<?php echo ($sj["shopImage"]); ?>&shname=<?php echo ($sj["shopName"]); ?>&lname=<?php echo ($sj["lei_name"]); ?>&ss=<?php echo ($sj["storeName"]); ?>" target="_blank" title="<?php echo ($sj["shopName"]); ?>">
						<div class="product_top">
							<h3><?php echo ($sj["shopName"]); ?></h3>
							<img src="__PUBLIC__/Images/shop/<?php echo ($sj["shopImage"]); ?>" width="145" height="131" alt="<?php echo ($sj["shopName"]); ?>">
							<p class="product_price">价格￥<?php echo ($sj["shopHuanjia"]); ?></p>
						</div>
					</a>
				

				<a href="__ROOT__/index.php/Index/shopIntroduce?shopId=<?php echo ($sj["shop_id"]); ?>&iup=<?php echo ($sj["is_up"]); ?>&shnum=<?php echo ($sj["shopNum"]); ?>&shname=<?php echo ($sj["shopName"]); ?>&shimg=<?php echo ($sj["shopImage"]); ?>&shname=<?php echo ($sj["shopName"]); ?>&lname=<?php echo ($sj["lei_name"]); ?>&ss=<?php echo ($sj["storeName"]); ?>" target="_blank" title="<?php echo ($sj["shopName"]); ?>">
						<div class="product_top">
							<h3><?php echo ($sj["shopName"]); ?></h3>
							<img src="__PUBLIC__/Images/shop/<?php echo ($sj["shopImage"]); ?>" width="145" height="131" alt="<?php echo ($sj["shopName"]); ?>">
							<p class="product_price">价格￥<?php echo ($sj["shopHuanjia"]); ?></p>
						</div>
					</a>
				</li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
      	</div>
      </div>
	</div>
</div>

<!-- 电脑数码部分 -->
  <div class="case">
    <div class="title cf">
	<h2 class="fl" id="4">电脑</h2>
    </div>
    <div class="product-wrap">
     <!--案例1-->
      <div class="product show">
      	<div class="product_left fl">
			<h3>电脑专场</h3>
		<a href="" title="电脑"><img src="__PUBLIC__/Images/ddnn.png" width="210" height="123" alt="电脑"></a>
			<div class="product_xia">
					<a href="">电脑整机</a>
					<a href="">电脑配件</a>
					<a href="">外设产品</a>
					<a href="">网络产品</a>
			</div>
					<a href="">笔记本</a>
					<a href="">超极本</a>
					<a href="">CPU</a>
					<a href="">主板</a>
					<a href="">游戏机</a>
					<a href="">路由器</a>
					<a href="">投影机</a>
					<a href="">打印机</a>
      	</div>
      	<div class="product_right fl">
			<ul>
				<?php if(is_array($dn)): $i = 0; $__LIST__ = $dn;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$dn): $mod = ($i % 2 );++$i;?><li>
					<a href="__ROOT__/index.php/Index/shopIntroduce?shopId=<?php echo ($dn["shop_id"]); ?>&iup=<?php echo ($dn["is_up"]); ?>&shnum=<?php echo ($dn["shopNum"]); ?>&shname=<?php echo ($dn["shopName"]); ?>&shimg=<?php echo ($dn["shopImage"]); ?>&shname=<?php echo ($dn["shopName"]); ?>&lname=<?php echo ($dn["lei_name"]); ?>&ss=<?php echo ($dn["storeName"]); ?>" target="_blank" title="<?php echo ($dn["shopName"]); ?>">
						<div class="product_top">
							<h3><?php echo ($dn["shopName"]); ?></h3>
							<img src="__PUBLIC__/Images/shop/<?php echo ($dn["shopImage"]); ?>" width="145" height="131" alt="<?php echo ($dn["shopName"]); ?>">
							<p class="product_price">价格￥<?php echo ($dn["shopHuanjia"]); ?></p>
						</div>
					</a>
				

				<a href="__ROOT__/index.php/Index/shopIntroduce?shopId=<?php echo ($dn["shop_id"]); ?>&iup=<?php echo ($dn["is_up"]); ?>&shnum=<?php echo ($dn["shopNum"]); ?>&shname=<?php echo ($dn["shopName"]); ?>&shimg=<?php echo ($dn["shopImage"]); ?>&shname=<?php echo ($dn["shopName"]); ?>&lname=<?php echo ($dn["lei_name"]); ?>&ss=<?php echo ($dn["storeName"]); ?>" target="_blank" title="<?php echo ($dn["shopName"]); ?>">
						<div class="product_top">
							<h3><?php echo ($dn["shopName"]); ?></h3>
							<img src="__PUBLIC__/Images/shop/<?php echo ($dn["shopImage"]); ?>" width="145" height="131" alt="<?php echo ($dn["shopName"]); ?>">
							<p class="product_price">价格￥<?php echo ($dn["shopHuanjia"]); ?></p>
						</div>
					</a>
				</li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
      	</div>
      </div>
	</div>
</div>

<!-- 个护美妆部分 -->
  <div class="case">
    <div class="title cf">
	<h2 class="fl" id="5">个护美妆</h2>
    </div>
    <div class="product-wrap">
     <!--案例1-->
      <div class="product show">
      	<div class="product_left fl">
			<h3>个护美妆专场</h3>
		<a href="" title="个性美妆"><img src="__PUBLIC__/Images/gexing.png" width="210" height="123" alt="个性美妆"></a>
			<div class="product_xia">
					<a href="">个护美妆</a>
					<a href="">清洁用品</a>
					<a href="">身体护肤</a>
					<a href="">清洁用品</a>
			</div>
					<a href="">帽子</a>
					<a href="">清洁</a>
					<a href="">洗发</a>
					<a href="">沐浴</a>
					<a href="">牙膏</a>
					<a href="">香水</a>
					<a href="">衣服清洁</a>
					<a href="">底妆</a>
      	</div>
      	<div class="product_right fl">
			<ul>
					<?php if(is_array($mz)): $i = 0; $__LIST__ = $mz;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$mz): $mod = ($i % 2 );++$i;?><li>
					<a href="__ROOT__/index.php/Index/shopIntroduce?shopId=<?php echo ($mz["shop_id"]); ?>&iup=<?php echo ($mz["is_up"]); ?>&shnum=<?php echo ($mz["shopNum"]); ?>&shname=<?php echo ($mz["shopName"]); ?>&shimg=<?php echo ($mz["shopImage"]); ?>&shname=<?php echo ($mz["shopName"]); ?>&lname=<?php echo ($mz["lei_name"]); ?>&ss=<?php echo ($mz["storeName"]); ?>" target="_blank" title="<?php echo ($mz["shopName"]); ?>">
						<div class="product_top">
							<h3><?php echo ($mz["shopName"]); ?></h3>
							<img src="__PUBLIC__/Images/shop/<?php echo ($mz["shopImage"]); ?>" width="145" height="131" alt="<?php echo ($mz["shopName"]); ?>">
							<p class="product_price">价格￥<?php echo ($mz["shopHuanjia"]); ?></p>
						</div>
					</a>
				

				<a href="__ROOT__/index.php/Index/shopIntroduce?shopId=<?php echo ($mz["shop_id"]); ?>&iup=<?php echo ($mz["is_up"]); ?>&shnum=<?php echo ($mz["shopNum"]); ?>&shname=<?php echo ($mz["shopName"]); ?>&shimg=<?php echo ($mz["shopImage"]); ?>&shname=<?php echo ($mz["shopName"]); ?>&lname=<?php echo ($mz["lei_name"]); ?>&ss=<?php echo ($mz["storeName"]); ?>" target="_blank" title="<?php echo ($mz["shopName"]); ?>">
						<div class="product_top">
							<h3><?php echo ($mz["shopName"]); ?></h3>
							<img src="__PUBLIC__/Images/shop/<?php echo ($mz["shopImage"]); ?>" width="145" height="131" alt="<?php echo ($mz["shopName"]); ?>">
							<p class="product_price">价格￥<?php echo ($mz["shopHuanjia"]); ?></p>
						</div>
					</a>
				</li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
      	</div>
      </div>
	</div>
</div>

<!-- 食品酒类部分 -->
  <div class="case">
    <div class="title cf">
	<h2 class="fl" id="6">食品酒类</h2>
    </div>
    <div class="product-wrap">
     <!--案例1-->
      <div class="product show">
      	<div class="product_left fl">
			<h3>食品酒类专场</h3>
		<a href="" title="食品酒类"><img src="__PUBLIC__/Images/hejiu.png" width="210" height="123" alt="食品酒类"></a>
			<div class="product_xia">
					<a href="">中外名酒</a>
					<a href="">进口食品</a>
					<a href="">休闲食品</a>
					<a href="">茗茶</a>
			</div>
					<a href="">白酒</a>
					<a href="">葡萄酒</a>
					<a href="">牛奶</a>
					<a href="">休闲零食</a>
					<a href="">云南特产</a>
					<a href="">铁观音</a>
					<a href="">饮料</a>
					<a href="">食用油</a>
      	</div>
      	<div class="product_right fl">
			<ul>
			<?php if(is_array($pt)): $i = 0; $__LIST__ = $pt;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pt): $mod = ($i % 2 );++$i;?><li>
					<a href="__ROOT__/index.php/Index/shopIntroduce?shopId=<?php echo ($pt["shop_id"]); ?>&iup=<?php echo ($pt["is_up"]); ?>&shnum=<?php echo ($pt["shopNum"]); ?>&shname=<?php echo ($pt["shopName"]); ?>&shimg=<?php echo ($pt["shopImage"]); ?>&shname=<?php echo ($pt["shopName"]); ?>&lname=<?php echo ($pt["lei_name"]); ?>&ss=<?php echo ($pt["storeName"]); ?>" target="_blank" title="<?php echo ($pt["shopName"]); ?>">
						<div class="product_top">
							<h3><?php echo ($pt["shopName"]); ?></h3>
							<img src="__PUBLIC__/Images/shop/<?php echo ($pt["shopImage"]); ?>" width="145" height="131" alt="<?php echo ($pt["shopName"]); ?>">
							<p class="product_price">价格￥<?php echo ($pt["shopHuanjia"]); ?></p>
						</div>
					</a>
				

				<a href="__ROOT__/index.php/Index/shopIntroduce?shopId=<?php echo ($pt["shop_id"]); ?>&iup=<?php echo ($pt["is_up"]); ?>&shnum=<?php echo ($pt["shopNum"]); ?>&shname=<?php echo ($pt["shopName"]); ?>&shimg=<?php echo ($pt["shopImage"]); ?>&shname=<?php echo ($pt["shopName"]); ?>&lname=<?php echo ($pt["lei_name"]); ?>&ss=<?php echo ($pt["storeName"]); ?>" target="_blank" title="<?php echo ($pt["shopName"]); ?>">
						<div class="product_top">
							<h3><?php echo ($pt["shopName"]); ?></h3>
							<img src="__PUBLIC__/Images/shop/<?php echo ($pt["shopImage"]); ?>" width="145" height="131" alt="<?php echo ($pt["shopName"]); ?>">
							<p class="product_price">价格￥<?php echo ($pt["shopHuanjia"]); ?></p>
						</div>
					</a>
				</li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
      	</div>
      </div>
	</div>
</div>

<!-- 图书音像部分 -->
  <div class="case">
    <div class="title cf">
	<h2 class="fl" id="7">图书音像</h2>
    </div>
    <div class="product-wrap">
     <!--案例1-->
      <div class="product show">
      	<div class="product_left fl">
			<h3>图书音像专场</h3>
		<a href="" title="图书音像"><img src="__PUBLIC__/Images/tss.png" width="210" height="123" alt="图书音像"></a>
			<div class="product_xia">
					<a href="">教育频道</a>
					<a href="">文艺频道</a>
					<a href="">经管励志</a>
					<a href="">人文社科</a>
			</div>
					<a href="">教材</a>
					<a href="">考试</a>
					<a href="">小说</a>
					<a href="">文学</a>
					<a href="">管理</a>
					<a href="">历史</a>
					<a href="">计算机与互联网</a>
					<a href="">杂志报刊</a>
      	</div>
      	<div class="product_right fl">
			<ul>
				<?php if(is_array($ts)): $i = 0; $__LIST__ = $ts;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ts): $mod = ($i % 2 );++$i;?><li>
					<a href="__ROOT__/index.php/Index/shopIntroduce?shopId=<?php echo ($ts["shop_id"]); ?>&iup=<?php echo ($ts["is_up"]); ?>&shnum=<?php echo ($ts["shopNum"]); ?>&shname=<?php echo ($ts["shopName"]); ?>&shimg=<?php echo ($ts["shopImage"]); ?>&shname=<?php echo ($ts["shopName"]); ?>&lname=<?php echo ($ts["lei_name"]); ?>&ss=<?php echo ($ts["storeName"]); ?>" target="_blank" title="<?php echo ($ts["shopName"]); ?>">
						<div class="product_top">
							<h3><?php echo ($ts["shopName"]); ?></h3>
							<img src="__PUBLIC__/Images/shop/<?php echo ($ts["shopImage"]); ?>" width="145" height="131" alt="<?php echo ($ts["shopName"]); ?>">
							<p class="product_price">价格￥<?php echo ($ts["shopHuanjia"]); ?></p>
						</div>
					</a>
				

				<a href="__ROOT__/index.php/Index/shopIntroduce?shopId=<?php echo ($ts["shop_id"]); ?>&iup=<?php echo ($ts["is_up"]); ?>&shnum=<?php echo ($ts["shopNum"]); ?>&shname=<?php echo ($ts["shopName"]); ?>&shimg=<?php echo ($ts["shopImage"]); ?>&shname=<?php echo ($ts["shopName"]); ?>&lname=<?php echo ($ts["lei_name"]); ?>&ss=<?php echo ($ts["storeName"]); ?>" target="_blank" title="<?php echo ($ts["shopName"]); ?>">
						<div class="product_top">
							<h3><?php echo ($ts["shopName"]); ?></h3>
							<img src="__PUBLIC__/Images/shop/<?php echo ($ts["shopImage"]); ?>" width="145" height="131" alt="<?php echo ($ts["shopName"]); ?>">
							<p class="product_price">价格￥<?php echo ($ts["shopHuanjia"]); ?></p>
						</div>
					</a>
				</li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
      	</div>
      </div>
	</div>
</div>
<script type="text/javascript">
	$(function(){
        //当滚动条的位置处于距顶部100像素以下时，跳转链接出现，否则消失
        $(function () {
            $(window).scroll(function(){
                if ($(window).scrollTop()>300){
                    $("#box").fadeIn(500);
                }
                else
                {
                    $("#box").fadeOut(500);
                }
            });
        });
    });
</script>
<div id="box">
	<ul >
		<li>
			<a class="num" href="#1">电器</a>
		</li>
		<li>
			<a class="num" href="#2">服装</a>
			</li>
		<li>
			<a class="num" href="#3">手机</a>
			
		</li>
		<li>
			<a class="num" href="#4">电脑</a>
			</li>
		<li>
			<a class="num" href="#5">美妆</a>
		</li>
		<li>
			<a class="num" href="#6">食品</a>
			 
			</li>
		<li  class="last">
			<a class="num" href="#7">图书</a>
		</li>
	</ul>
</div>
	<!-- 返回头部 -->
  	<p id="back-to-top"><a href="#top"><img src="__PUBLIC__/Images/back.jpg" title="返回顶部"></a></p>
<!-- 以下是底部 -->
<!-- [底部版权] -->
<div class="hr_25"></div>
<div class="footer">
	<p><a href="#">You柠檬简介</a><i>|</i><a href="#">You柠檬客服</a><i>|</i> <a href="#">招纳贤士</a><i>|</i><a href="#">联系我们</a><i>|</i>客服热线：400-675-1234</p>
	<p>Copyright &copy; 2013 - 2016 You柠檬版权所有&nbsp;&nbsp;&nbsp;桂ICP备09037834号&nbsp;&nbsp;&nbsp;桂ICP证B1034-8373号&nbsp;&nbsp;&nbsp;某市公安局XX分局备案编号：123456789123</p>
	<p class="web"><a href="#"><img src="__PUBLIC__/Images/webLogo.jpg" alt="logo"></a><a href="#"><img src="__PUBLIC__/Images/webLogo.jpg" alt="logo"></a><a href="#"><img src="__PUBLIC__/Images/webLogo.jpg" alt="logo"></a><a href="#"><img src="__PUBLIC__/Images/webLogo.jpg" alt="logo"></a></p>
</div>
</body>
</html>