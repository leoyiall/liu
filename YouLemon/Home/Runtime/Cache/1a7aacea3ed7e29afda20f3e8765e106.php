<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="leo">
  <meta name="Keywords" content="you柠檬商城">
  <meta name="Description" content="You柠檬电子商城快速购物">
  <title>You柠檬商城提交订单</title> 
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
				<li><a href="__APP__/Index/index" class="ac  mive">首页</a></li>
				<li><a href="__APP__/Index/gys" >供应商</a></li>
			</ul>
		</div>
	</div>
</div>

<div class="shoppingCart comWidth">
	<div class="shopping_item">
		<h3 class="shopping_tit">收货地址<span class="ys_tiao">(如果为空白说明您未在个人资料中填写收货地址!)</span></h3>
		<div class="shopping_cont padding_shop">
			<ul class="shopping_list">
				<li><span class="shopping_list_text"><em>*</em>选择地区：</span>
					<div class="select">
						<h3>中国</h3><span></span>
						<ul class="show_select">
							<li></li>
						</ul>
					</div>
				</li>
				<li><span class="shopping_list_text"><em>*</em>详细地址：</span><input type="text" value="<?php echo ($zhe["xiangArea"]); ?>" class="input input_b"></li>
				<li><span class="shopping_list_text"><em>*</em>邮　编：</span><input type="text" value="<?php echo ($zhe["youBian"]); ?>" class="input input_s"></li>
				<li><span class="shopping_list_text"><em>*</em>收 货 人：</span><input type="text" value="<?php echo ($zhe["who"]); ?>" class="input"></li>
				<li><span class="shopping_list_text"><em>*</em>手	机：</span><input type="text" value="<?php echo ($zhe["phone"]); ?>" class="input"><span class="cart_tel">&nbsp;或固定电话：</span><input type="text" value="<?php echo ($zhe["guPhone"]); ?>" class="input input_s"><span class="jian"></li>
			</ul>
		</div>
	</div>
	<div class="hr_25"></div>
	<div class="shopping_item">
		<h3 class="shopping_tit">送货清单</h3>
		<div class="shopping_cont pb_10">
			<div class="cart_inner">
				<div class="cart_head clearfix">
					<div class="cart_item2 t_name2">商品名称</div>
					<div class="cart_item t_price">单价</div>
					<div class="cart_item t_return">返现</div>
					<div class="cart_item t_num">数量</div>
					<div class="cart_item t_subtotal">小计</div>
				</div>
				<div class="cart_cont clearfix">
					<div class="cart_item t_name">
						<div class="cart_shopInfo clearfix">
							<img src="__PUBLIC__/Images/shop/<?php echo ($arr["shopImage"]); ?>" alt="<?php echo ($arr["shopName"]); ?>">
							<div class="cart_shopInfo_cont">
								<p class="cart_link"><a href="__ROOT__/index.php/Index/shopIntroduce?shopId=<?php echo ($arr["shop_id"]); ?>&iup=<?php echo ($arr["is_up"]); ?>&shnum=<?php echo ($arr["shopNum"]); ?>&shname=<?php echo ($arr["shopName"]); ?>&shimg=<?php echo ($arr["shopImage"]); ?>&shname=<?php echo ($arr["shopName"]); ?>&lname=<?php echo ($arr["lei_name"]); ?>&ss=<?php echo ($arr["storeName"]); ?>" target="_blank"><?php echo ($arr["shopName"]); ?></a></p>
							</div>
						</div>
					</div>
					<div class="cart_item t_price">
						<?php echo ($arr["shopHuanjia"]); ?>
					</div>
					<div class="cart_item t_return">0</div>
					<div class="cart_item t_num">1</div>
					<div class="cart_item t_subtotal t_red"><?php echo ($arr["shopHuanjia"]); ?></div>
				</div>
				<form action="__APP__/Index/ok" method="post">
				<div class="cart_message">
					给卖家留言:<input type="text" name="liuyan" placeholder="我想对卖家说..." class="input input_b">
				</div>

				<div class="cart_cont cart_no_bor clearfix">
					<div class="cart_item t_name">
						<div class="cart_shopInfo clearfix">
							<img src="__PUBLIC__/Images/shop/<?php echo ($arr["shopImage"]); ?>" alt="<?php echo ($arr["shopName"]); ?>">
							<div class="cart_shopInfo_cont">
								<p class="cart_link" style="margin-left:10px;"><a href="https://www.alipay.com/">微信支付</a></p>
								<p class="cart_info" style="margin-left:10px;"><a href="https://www.alipay.com/">支付宝支付</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="hr_25"></div>
	<div class="shopping_item">
		<h3 class="shopping_tit" >订单结算</h3>
		<div class="shopping_cont padding_shop clearfix">
			<div class="cart_count fr">
				<div class="cart_rmb">
					<i>总计：</i><span>￥<?php echo ($arr["shopHuanjia"]); ?></span>
				</div>
				<div class="cart_btnBox">
					<a href="__APP__/Index/ok?uu=<?php echo ($uu); ?>&&sid=<?php echo ($arr["shop_id"]); ?>"><input type="button" class="cart_btn" value="提交订单" onclick="return confirm('您确定提交订单？');"></a>
				</div>
				</form>
				</div>
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