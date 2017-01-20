<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="leo">
  <meta name="Keywords" content="you柠檬商城">
  <meta name="Description" content="You柠檬电子商城快速购物">
  <title>You柠檬商城供应商订单处理</title> 
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
	<div class="Top_mid Top_ys">
		<div class="conWidth">
			<div class="Top_logo fl">
				<a href="__ROOT__/index.php"><img src="__PUBLIC__/Images/logo.png" alt="You柠檬商城"></a>
			</div>
			<span class="Top_biao fl"><a href="__APP__/Gong/index">供应商主页</a></span>
		<!-- 搜索部分 -->
			<div class="Top_sou fr">
			<form action="" method="get">
				<input type="text" class="Top_so" placeholder="商品搜索" name="soso">
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
		<div class="lookshop_list">
			<table >
			<tr class="hui_se look_height">
				<th>商品</th>
				<th>单价(元)</th>
				<th>数量</th>
				<th>商品操作</th>
				<th>付款</th>
				<th>交易状态</th>
				<th>交易操作</th>
			</tr>
			<tr class="lan_se list_ye">
				<td colspan="7"><span class="huoqu">购买时间:2015-11-13 </span><span class="huoqu">订单号:20153695316</span><span class="huoqu">买家：You柠檬</span><span class="huoqu">店家：You柠檬商店</span></td>
			</tr>
			<tr>
				<td>
					<div class="look_shang">
						<div class="look_img fl">
							<a href=""><img src="__PUBLIC__/Images/logo.png" width="80" height="80" alt="商品名"></a>
						</div>
						<div class="look_say fr">
					<a href="">美丽的超级好的一双无敌鞋子，我喜欢</a>
						</div>
					</div>
				</td>
				<td align="center"><s>199</s><br>150</td>
				<td align="center">2</td>
				<td align="center"><a href="">接收订单</a>
				</td>
				<td align="center">300.0<br>(运费0.0)</td>
				<td align="center"><a href="">发布物流</a><br></td>
				<td align="center"><a href="" class="next ys_ls">确认发货</a>
				</td>
			</tr>
			<tr class="list_ye">
				<td colspan="7" align="center"><a href="">第一页</a></td>
			</tr>
			</table>
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