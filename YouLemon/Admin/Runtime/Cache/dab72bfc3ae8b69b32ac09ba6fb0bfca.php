<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="leo">
  <meta name="Keywords" content="you柠檬商城">
  <meta name="Description" content="You柠檬电子商城快速购物">
  <title>You柠檬商城供应商主页</title> 
  <link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/admin.css">
  <link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/reset.css">
  <link rel="icon" type="image/png" href="__PUBLIC__/Images/logo.ico">

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
	<div class="Top_mid Top_ys">
		<div class="conWidth">
			<div class="Top_logo fl">
				<a href="__ROOT__/index.php"><img src="__PUBLIC__/Images/logo.png" alt="You柠檬商城"></a>
			</div>
			<span class="Top_biao fl"><a href="__APP__/Gong/index">供应商主页</a></span>
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
					<div class="leftbgbt2"> </div>
				</div>
			</div>
			<div class="menuList">
				<div> <a href="__ROOT__/admin.php/Gong/index">供应商主页</a></div>
				<div> <a href="__ROOT__/admin.php/Index/person">个人资料</a></div>
			</div>
		</div>	
		<div class="menuParent">
			<div class="ListTitlePanel">
				<div class="ListTitle">
					<strong>供应商管理</strong>
					<div class="leftbgbt"> </div>
				</div>
			</div>
			<div class="menuList">
				<div> <a href="__APP__/Gong/gong">供应商资料</a></div>
				<div> <a href="__APP__/Gong/ding">订单处理</a></div>
				<div> <a href="__APP__/Gong/store">供应的店铺</a></div>
			</div>
		</div>
<div class="menuParent">
			<div class="ListTitlePanel">
				<div class="ListTitle">
					<strong>商品管理</strong>
					<div class="leftbgbt2"> </div>
				</div>
			</div>
			<div class="menuList">
				<div> <a href="__APP__/Gong/sendShopping">发布商品</a></div>
				<div> <a href="__APP__/Gong/sendShopping2">发布商品附图</a></div>
				<div> <a href="__APP__/Gong/shoppingList">商品仓库</a></div>
			</div>
		</div>

		
	</div>
		</div>
	</div>

	<!-- 首页右侧部分 -->
	<div class="main_right">
		<div class="store_tou">
				<div class="store_img fl">
					<a href="__APP__/Store/store" alt="编辑资料"><img src="__PUBLIC__/Images/tou/<?php echo ($gongImg); ?>" alt="商店图片" width="200" height="200"></a>
				</div>
				<div class="store_right fr">
					<table >
						<tr>
							<td align="right"><h4>供应商编号：</h4></td>
							<td align="left"><?php echo ($gong_id); ?></td>
						</tr>
						<tr>
							<td align="right"><h4>供应商名称：</h4></td>
							<td align="left"><?php echo ($gongName); ?></td>
						</tr>
						<tr>
							<td align="right"><h4>供应商名字：</h4></td>
							<td align="left"><?php echo ($nicheng); ?></td>
						</tr>
						<tr>
							<td align="right"><h4>供应商类型：</h4></td>
							<td align="left">
								<?php echo ($lei_gong); ?>
							</td>
						</tr>
						<tr>
							<td align="right"><h4>供应商地址：</h4></td>
							<td align="left"><?php echo ($gongAddress); ?></td>
						</tr>
						<tr>
							<td align="right"><h4>联 系 电话：</h4></td>
							<td align="left"><?php echo ($gongPhone); ?></td>
						</tr>
					</table>
				</div>
			</div>
			<!-- 消息部分的代码-->
			<div class="store_xiao">
				<div class="store_jie">
					<span class="store_xx fl">订单消息</span>
					<span class="store_more fr"><a href="">更多</a></span>				
				</div>
				<div class="store_list">
					<ul>
						<li><a href=""><span class=" fr">[2015-11-19 10:25:30]</span>海尔电冰箱被YouYou订购，注意处理订单</a></li>
						<li><a href=""><span class="fr">[2015-11-19 10:25:10]</span>海尔电冰箱被YouYou订购，注意处理订单</a></li>
						<li><a href=""><span class="fr">[2015-11-19 10:25:09]</span>海尔电冰箱被YouYou订购，注意处理订单</a></li>
						<li><a href=""><span class="fr">[2015-11-19 10:25:08]</span>海尔电冰箱被YouYou订购，注意处理订单</a></li>
						<li><a href=""><span class="fr">[2015-11-19 10:25:07]</span>海尔电冰箱被YouYou订购，注意处理订单</a></li>
						<li><a href=""><span class="fr">[2015-11-19 10:25:06]</span>海尔电冰箱被YouYou订购，注意处理订单</a></li>
						<li><a href=""><span class="fr">[2015-11-19 10:25:05]</span>海尔电冰箱被YouYou订购，注意处理订单</a></li>
						<li><a href=""><span class="fr">[2015-11-19 10:25:04]</span>海尔电冰箱被YouYou订购，注意处理订单</a></li>
					</ul>
				</div>
			</div>`
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