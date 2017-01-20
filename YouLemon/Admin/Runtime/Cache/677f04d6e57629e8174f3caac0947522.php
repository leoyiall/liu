<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="leo">
  <meta name="Keywords" content="you柠檬商城">
  <meta name="Description" content="You柠檬电子商城快速购物">
  <title>用户后台安全设置</title> 
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
		<div class="main_xinxi">
			<div class="main_title">
				您的安全信息
			</div>
			<div class="main_list">
				<ul>
					<li>
						<div class="main_zj fl">登 录 密 码</div>
						<div class="main_say fl">安全性高的密码可以使账号更安全。建议您定期更换密码，且设置一个包含数字和字母，并长度超过6位以上的密码。</div>
						<div class="main_cao fr"><a href="__APP__/Index/update_mi">修改密码</a></div>
					</li>
					<li>
						<div class="main_zj fl">密 保 问 题</div>
						<div class="main_say fl">是您找回登录密码的方式之一。建议您设置一个容易记住，且最不容易被他人获取的问题及答案，更有效保障您的密码安全。</div>
						<div class="main_cao fr"><a href="__APP__/Index/update_mibao">修改密保</a></div>
					</li>
					<li>
						<div class="main_zj fl">邮　　箱</div>
						<div class="main_say fl">用于卖家当给你发货时，将会通过邮件提示你已经发货。请一定要保证邮箱的正确性，以确保能联系到你！</div>
						<div class="main_cao fr"><a href="__APP__/Index/update_email">修改邮箱</a></div>
					</li>
					<li>
						<div class="main_zj fl">手机号码</div>
						<div class="main_say fl">为了确保你账号的安全性，请输入正确的手机号码，并且绑定，后期账号忘记密码或被偷可以通过手机号码找回账号。</div>
						<div class="main_cao fr"><a href="__APP__/Index/update_phone">修改号码</a></div>
					</li>
				</ul>
			</div>
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