<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="leo">
  <meta name="Keywords" content="you柠檬商城">
  <meta name="Description" content="You柠檬电子商城快速购物">
  <title>You柠檬商城<?php echo ($lei_name); ?>供应商列表</title> 
</head>

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
				<h3>全部商品分类&nbsp;&nbsp;<img src="__PUBLIC__/Images//icon/down.png"></h3>			
				</div>

			<ul class="nav fl">
				<li><a href="__APP__/Index" title="首页" class="ac  mive">首页</a></li>
				<li><a href="__APP__/Index/gys" title="供应商">供应商</a></li>
			</ul>
		</div>
	</div>
</div>

<div class="shoppingCart comWidth" >
<div class="shopping_item" style="border:none;">
		<h3 class="shopping_tit" style="background:#fff;margin-bottom:10px;font-size:14px;">当前位置:<a href="__APP__/Index/index">首页</a> &gt;&gt;<a href="__APP__/Index/gys">供应商</a> &gt;&gt;<?php echo ($lname); ?></h3>
</div>
	<div class="shopping_item" style="border:none;">
		<h3 class="shopping_tit" style="border:1px solid #ccc;">供应商列表<span class="ys_tiao">(请根据您的店铺类型进行选择供应商！)</span></h3>
	<?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="shopping_cont padding_shop2">
		<div class="leftdiv">
			<div class="shopLiebiao">
				<div class="shopGu shopRb fl">
				<div class="shop_tu fl">
					<a href="__APP__/Index/gysIntroduce?gid=<?php echo ($vo["gong_id"]); ?>&gname=<?php echo ($vo["gongName"]); ?>&glei=<?php echo ($vo["lei_gong"]); ?>&phone=<?php echo ($vo["gongPhone"]); ?>&add=<?php echo ($vo["gongAddress"]); ?>&pit=<?php echo ($vo["gongImg"]); ?>"><img src="__PUBLIC__/Images/tou/<?php echo ($vo["gongImg"]); ?>" width="200" height="205" title=""></a>
				</div>
					<div class="shop_xinxi fl">
						<ul>
							<li><h3><a href="__APP__/Index/gysIntroduce?gid=<?php echo ($vo["gong_id"]); ?>&gname=<?php echo ($vo["gongName"]); ?>&glei=<?php echo ($vo["lei_gong"]); ?>&phone=<?php echo ($vo["gongPhone"]); ?>&add=<?php echo ($vo["gongAddress"]); ?>&pit=<?php echo ($vo["gongImg"]); ?>"><?php echo ($vo["gongName"]); ?></a></h3></li>
							<li>供应商编号：<a href="__APP__/Index/gysIntroduce?gid=<?php echo ($vo["gong_id"]); ?>&gname=<?php echo ($vo["gongName"]); ?>&glei=<?php echo ($vo["lei_gong"]); ?>&phone=<?php echo ($vo["gongPhone"]); ?>&add=<?php echo ($vo["gongAddress"]); ?>&pit=<?php echo ($vo["gongImg"]); ?>"><?php echo ($vo["gong_id"]); ?></a></li>
							<li>供应商类型:<a href="__APP__/Index/gysIntroduce?gid=<?php echo ($vo["gong_id"]); ?>&gname=<?php echo ($vo["gongName"]); ?>&glei=<?php echo ($vo["lei_gong"]); ?>&phone=<?php echo ($vo["gongPhone"]); ?>&add=<?php echo ($vo["gongAddress"]); ?>&pit=<?php echo ($vo["gongImg"]); ?>"><?php echo ($vo["lei_gong"]); ?></a></li>
							<li>供应商地址:<a href="__APP__/Index/gysIntroduce?gid=<?php echo ($vo["gong_id"]); ?>&gname=<?php echo ($vo["gongName"]); ?>&glei=<?php echo ($vo["lei_gong"]); ?>&phone=<?php echo ($vo["gongPhone"]); ?>&add=<?php echo ($vo["gongAddress"]); ?>&pit=<?php echo ($vo["gongImg"]); ?>"><?php echo ($vo["gongAddress"]); ?></a></li>
							<li>联系号码:<a href="__APP__/Index/gysIntroduce?gid=<?php echo ($vo["gong_id"]); ?>&gname=<?php echo ($vo["gongName"]); ?>&glei=<?php echo ($vo["lei_gong"]); ?>&phone=<?php echo ($vo["gongPhone"]); ?>&add=<?php echo ($vo["gongAddress"]); ?>&pit=<?php echo ($vo["gongImg"]); ?>"><?php echo ($vo["gongPhone"]); ?></a></li>
						</ul>
					</div>
				</div>
				<!-- 供应商列表 -->
				<div class="shopGu_right fr">
				<?php if(is_array($shop)): $i = 0; $__LIST__ = $shop;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><div class="shopXiao fl">
						<a href="__ROOT__/index.php/Index/introduce?shopId=<?php echo ($vv["shop_id"]); ?>&number=<?php echo ($vv["shopNum"]); ?>&pname=<?php echo ($vv["shopName"]); ?>&ss=<?php echo ($vv["username"]); ?>&lname=<?php echo ($vv["lei_name"]); ?>" target="__blank"><img src="__PUBLIC__/Images/shop/<?php echo ($vv["shopImage"]); ?>"  title="<?php echo ($vv["shopName"]); ?>"></a>
						<p class="ys_hong">￥<?php echo ($vv["shopPrice"]); ?> <span class="te_name"><a href="__ROOT__/index.php/Index/introduce?shopId=<?php echo ($vv["shop_id"]); ?>" target="__blank"><?php echo ($vv["shopName"]); ?></a></span></p>
					</div><?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
			</div>
        </div>
	</div><?php endforeach; endif; else: echo "" ;endif; ?>	
		
		<div class="shoppingCart comWidth">
			<div class="shopping_item shopYe" style="border:none;text-align:center;">
				<?php echo ($page); ?>
			</div>
		</div>
</div>
</div>

<!-- 侧边栏 -->
<!-- 侧边栏css -->
<script type="text/javascript" src="__PUBLIC__/Js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/common.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/quick_links.js"></script>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/base.css" />

<!--右侧贴边导航quick_links.js控制-->
<div class="mui-mbar-tabs">
	<div class="quick_link_mian">
		<div class="quick_links_panel">
			<div id="quick_links" class="quick_links">
				<li>
					<a href="#" class="my_qlinks"><i class="setting"></i></a>
					<div class="ibar_login_box status_login">
						<div class="avatar_box">
							<p class="avatar_imgbox"><img src="__PUBLIC__/Images/no-img_mid_.jpg" /></p>
							<ul class="user_info">
								<li>用户名：sl19931003</li>
								<li>级&nbsp;别：普通会员</li>
							</ul>
						</div>
						<div class="login_btnbox">
							<a href="#" class="login_order">我的订单</a>
							<a href="#" class="login_favorite">我的收藏</a>
						</div>
						<i class="icon_arrow_white"></i>
					</div>
				</li>
				<li id="shopCart">
					<a href="#" class="message_list" ><i class="message"></i><div class="span">购物车</div><span class="cart_num">0</span></a>
				</li>
				<li>
					<a href="#" class="history_list"><i class="view"></i></a>
					<div class="mp_tooltip" style=" visibility:hidden;">我的资产<i class="icon_arrow_right_black"></i></div>
				</li>
				<li>
					<a href="#" class="mpbtn_histroy"><i class="zuji"></i></a>
					<div class="mp_tooltip">我的足迹<i class="icon_arrow_right_black"></i></div>
				</li>
				<li>
					<a href="#" class="mpbtn_wdsc"><i class="wdsc"></i></a>
					<div class="mp_tooltip">我的收藏<i class="icon_arrow_right_black"></i></div>
				</li>
				<li>
					<a href="#" class="mpbtn_recharge"><i class="chongzhi"></i></a>
					<div class="mp_tooltip">我要充值<i class="icon_arrow_right_black"></i></div>
				</li>
			</div>
			<div class="quick_toggle">
				<li>
					<a href="#"><i class="kfzx"></i></a>
					<div class="mp_tooltip">客服中心<i class="icon_arrow_right_black"></i></div>
				</li>
				<li>
					<a href="#none"><i class="mpbtn_qrcode"></i></a>
					<div class="mp_qrcode" style="display:none;"><img src="__PUBLIC__/Images/weixin_code_145.png" width="148" height="175" /><i class="icon_arrow_white"></i></div>
				</li>
				<li><a href="#top" class="return_top"><i class="top"></i></a></li>
			</div>
		</div>
		<div id="quick_links_pop" class="quick_links_pop hide"></div>
	</div>
</div>


<!--[if lte IE 8]>
<script src="js/ieBetter.js"></script>
<![endif]-->

<script type="text/javascript" src="__PUBLIC__/Js/parabola.js"></script>
<script type="text/javascript">
	$(".quick_links_panel li").mouseenter(function(){
		$(this).children(".mp_tooltip").animate({left:-92,queue:true});
		$(this).children(".mp_tooltip").css("visibility","visible");
		$(this).children(".ibar_login_box").css("display","block");
	});
	$(".quick_links_panel li").mouseleave(function(){
		$(this).children(".mp_tooltip").css("visibility","hidden");
		$(this).children(".mp_tooltip").animate({left:-121,queue:true});
		$(this).children(".ibar_login_box").css("display","none");
	});
	$(".quick_toggle li").mouseover(function(){
		$(this).children(".mp_qrcode").show();
	});
	$(".quick_toggle li").mouseleave(function(){
		$(this).children(".mp_qrcode").hide();
	});

// 元素以及其他一些变量
var eleFlyElement = document.querySelector("#flyItem"), eleShopCart = document.querySelector("#shopCart");
var numberItem = 0;
// 抛物线运动
var myParabola = funParabola(eleFlyElement, eleShopCart, {
	speed: 400, //抛物线速度
	curvature: 0.0008, //控制抛物线弧度
	complete: function() {
		eleFlyElement.style.visibility = "hidden";
		eleShopCart.querySelector("span").innerHTML = ++numberItem;
	}
});
// 绑定点击事件
if (eleFlyElement && eleShopCart) {
	
	[].slice.call(document.getElementsByClassName("btnCart")).forEach(function(button) {
		button.addEventListener("click", function(event) {
			// 滚动大小
			var scrollLeft = document.documentElement.scrollLeft || document.body.scrollLeft || 0,
			    scrollTop = document.documentElement.scrollTop || document.body.scrollTop || 0;
			eleFlyElement.style.left = event.clientX + scrollLeft + "px";
			eleFlyElement.style.top = event.clientY + scrollTop + "px";
			eleFlyElement.style.visibility = "visible";
			
			// 需要重定位
			myParabola.position().move();			
		});
	});
}
</script>
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