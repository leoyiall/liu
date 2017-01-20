<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="leo">
  <meta name="Keywords" content="you柠檬商城">
  <meta name="Description" content="You柠檬电子商城快速购物">
  <title>You柠檬商城个人主页</title> 
  <link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/admin.css">
  <link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/reset.css">

 </head>
 <body>
 <!-- 头部 -->
	   <link rel="icon" type="image/png" href="__PUBLIC__/Images/logo.ico">
 <script type="text/javascript" src="__PUBLIC__/Js/MDtool.js"></script>
 <!-- 顶部介绍 -->
  	<div class="Top_Jie">
  	  <div class="conWidth">
  		<div class="Top_left fl ">
			<a href="__ROOT__/index.php/Index" class="active" style="color:#EE0A3B">You柠檬商城首页</a>
  		</div>
  		<div class="Top_right fr">
			<div class="Top_me">
				<?php if($who == null): ?><a href="__APP__/Index/login">登录</a><a href="__APP__/Index/reg">注册</a>
				<?php else: ?>
					<a href="__APP__/Index/index"><?php echo ($who); ?></a><a href="__APP__/Index/back">退出</a><?php endif; ?>
			</div>
			<a href="__APP__/Store/index">我的店铺</a><span class="Top_gou"><a href="">购物车</a></span>
  		</div>
  	  </div>
  	</div>
<!-- 顶部个人信息 -->
	<div class="Top_mid">
		<div class="conWidth">
			<div class="Top_logo fl">
				<a href="__ROOT__/index.php/Index"><img src="__PUBLIC__/Images/logo.png" alt="You柠檬商城"></a>
			</div>
			<span class="Top_biao fl"><a href="__APP__/Index/">个人主页</a></span>
		<!-- 搜索部分 -->
			<div class="Top_sou fr">
			<form action="__ROOT__/index.php/Index/search" method="post">
				<input type="text" class="Top_so" placeholder="最新最时尚的商品尽在You柠檬" name="shopName">
				<input type="submit" class="Top_btn" value="搜索">
			</form>
			</div>
		</div>
	</div>

	 	<div class="conWidth">
<!-- 左侧导航 -->
	    <link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/dao_js.css">

  <script type="text/javascript" src="__PUBLIC__/Js/jquery-1.5.1.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	var menuParent = $('.menu > .ListTitlePanel > div');//获取menu下的父层的DIV
	var menuList = $('.menuList');
	$('.menu > .menuParent > .ListTitlePanel > .ListTitle').each(function(i) {//获取列表的大标题并遍历
		$(this).click(function(){
			if($(menuList[i]).css('display') == 'none'){
				$(menuList[i]).slideDown(300);
			}
			else{
				$(menuList[i]).slideUp(300);
			}
		});
	});
});
</script>
 <!-- 左侧导航 -->
 	<div class="conWidth">
  		<div class="Dao_left fl">
	<div class="menu">
		<div class="menuParent">
			<div class="ListTitlePanel">
				<div class="ListTitle">
					<strong>个人中心</strong>
					<div class="leftbgbt"> </div>
				</div>
			</div>
			<div class="menuList">
				<div> <a href="__APP__/Index/index">个人主页</a> </div>
				<div> <a href="__APP__/Index/safe">安全设置</a></div>
				<div> <a href="__APP__/Index/person">个人资料 </a> </div>
				<div> <a href="__APP__/Index/address">收货地址</a></div>
				<div> <a href="__APP__/Index/pingjia">我的评价 </a> </div>	
			</div>
		</div>
<div class="menuParent">
			<div class="ListTitlePanel">
				<div class="ListTitle">
					<strong>相关开通</strong>
					<div class="leftbgbt2"> </div>
				</div>
			</div>
			<div class="menuList">
				<div> <a href="__APP__/Store/index">我的店铺</a></div>
				<div> <a href="__APP__/Gong/index">我是供应商</a></div>
			</div>
		</div>
		<div class="menuParent">
			<div class="ListTitlePanel">
				<div class="ListTitle">
					<strong>货物查询</strong>
					<div class="leftbgbt2"> </div>
				</div>
			</div>
			<div class="menuList">
				<div> <a href="__APP__/Index/lookShop">待付款</a></div>
				<div> <a href="__APP__/Index/lookShop">待发货</a></div>
				<div> <a href="__APP__/Index/lookShop">待收货</a></div>
				<div> <a href="__APP__/Index/lookShop">待评价</a></div>
			</div>
		</div>
		<div class="menuParent">
			<div class="ListTitlePanel">
				<div class="ListTitle">
					<strong>购物历史</strong>
					<div class="leftbgbt2"> </div>
				</div>
			</div>
			<div class="menuList">
				<div> <a href="__APP__/Index/buyShop">购物记录</a></div>
			</div>
		</div>
		
	</div>
		</div>
	</div>

	<!-- 首页右侧部分 -->
	<div class="main_right">
		<div class="main_Jie">
			<div class="main_ren">
				<div class="main_zuo fl">
					<div class="main_pit fl">
					<a href="__APP__/Index/person">
						<img src="__PUBLIC__/Images/tou/<?php echo ($img); ?>" width="60" height="60" alt="">
					</a>
					</div>
					<div class="main_name fl"><a href="__APP__/Index/person"><?php echo ($who); ?></a></div>
<!-- 					<div class="main_qian fl">柠檬的味道~</div> -->
				</div>
				<div class="main_you fr">
					<a href="__APP__/Index/address">消息<span class="ys_tiao">1000</span></a>
					<a href="__APP__/Index/address">我的收货地址</a>
					<a href="__APP__/Index/store">我的店铺</a>
					<a href="__APP__/Index/gongying">我是供应商</a>
				</div>
			</div>
			<div class="main_shoufa">
					<a href="">待付款</a>
					<a href="">待发货</a>
					<a href="">待收货</a>
					<a href="">待评价</a>
					<a href="" style="border-right:none;">退款</a>
			</div>			
		</div>

		<!-- 欢迎界面 -->
			<div class="welcome">
				You柠檬商城欢迎您<span class="wel_y"><?php echo ($who); ?></span>,今天的你记得微笑哦!:)  >>><span class="wel_y"><a href="__ROOT__/index.php">GO</a></span>
			</div>
	</div>
	</div>
		<!-- 底部版权 -->
	<!-- 底部版权 -->
	<div class="footer">
	<div class="conWidth">
		<div class="footer_jie">
			<a href="" target="__blank">关于我们</a><a href="" target="__blank">招贤纳士</a><a href="" target="__blank">联系客服</a><a href="" target="__blank">廉政举报</a>
		</div>
		<div class="footer_ban">© 2013-2015 版权由You柠檬 所有</div>
	</div>
	</div>
 </body>
</html>