<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="leo">
  <meta name="Keywords" content="you柠檬商城">
  <meta name="Description" content="You柠檬电子商城快速购物">
  <title>You柠檬店铺商品列表</title> 
  <link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/admin.css">
  <link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/reset.css">
  <script type="text/javascript"  src="__PUBLIC__/Js/jquery-1.5.1.js"></script>
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
	<div class="Top_mid Top_yanse">
		<div class="conWidth">
			<div class="Top_logo fl">
				<a href="__ROOT__/index.php"><img src="__PUBLIC__/Images/logo.png" alt="You柠檬商城"></a>
			</div>
			<span class="Top_biao fl"><a href="__APP__/Store/">店铺主页</a></span>
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
				<div> <a href="__ROOT__/admin.php/Store/index">店铺主页</a></div>
				<div> <a href="__ROOT__/admin.php/Index/person">个人资料</a></div>
			</div>
		</div>	
		<div class="menuParent">
			<div class="ListTitlePanel">
				<div class="ListTitle">
					<strong>店铺管理</strong>
					<div class="leftbgbt"> </div>
				</div>
			</div>
			<div class="menuList">
				<div> <a href="__APP__/Store/store">店铺资料</a></div>
				<div> <a href="__APP__/Store/ding">订单处理</a></div>
				<div> <a href="__ROOT__/index.php/Index/gys">我的供应商</a></div>
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
				<div> <a href="__APP__/Store/sendShopping">发布商品</a></div>
				<div> <a href="__APP__/Store/sendShopping2">发布商品附图</a></div>
				<div> <a href="__APP__/Store/sendGong">发布供应商商品</a></div>
				<div> <a href="__APP__/Store/shoppingList">商品列表</a></div>
				<div> <a href="__APP__/Store/shoppingPing">商品评价</a></div>
				<div> <a href="__APP__/Store/shoppingTong">销售统计</a></div>
			</div>
		</div>

		
	</div>
		</div>
	</div>

	<!-- 首页右侧部分 -->
	<div class="main_right">
		<div class="store_jie">
			<h3 class="huoqu">商品列表</h3>
		</div>
		<div class="shopping_list">
		<table >
						<tr>
				<th width="78" class="shop_left">商 品 图</th>
				<th width="83">商品编号</th>
				<th width="84">商品名称</th>
				<th width="75">商品售价</th>
				<th width="75">销售数量</th>
				<th width="92">商品分类</th>
				<th width="84">是否上架</th>
				<th width="76">操作</th>
			</tr>
			<?php if(is_array($result)): $i = 0; $__LIST__ = $result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><tr>
				<td class="shop_left"><a href="__ROOT__/index.php/Index/shopIntroduce?shopId=<?php echo ($vv["shop_id"]); ?>&iup=<?php echo ($vv["is_up"]); ?>&shnum=<?php echo ($vv["shopNum"]); ?>&shname=<?php echo ($vv["shopName"]); ?>&shimg=<?php echo ($vv["shopImage"]); ?>&shname=<?php echo ($vv["shopName"]); ?>&lname=<?php echo ($vv["lei_name"]); ?>&ss=<?php echo ($vv["storeName"]); ?>" target="_blank"><img src="__PUBLIC__/Images/shop/<?php echo ($vv["shopImage"]); ?>" width="50" height="50"></a></td>
				<td><?php echo ($vv["shopNum"]); ?></td>
				<td align="left"><a href="__ROOT__/index.php/Index/shopIntroduce?shopId=<?php echo ($vv["shop_id"]); ?>&iup=<?php echo ($vv["is_up"]); ?>&shnum=<?php echo ($vv["shopNum"]); ?>&shname=<?php echo ($vv["shopName"]); ?>&shimg=<?php echo ($vv["shopImage"]); ?>&shname=<?php echo ($vv["shopName"]); ?>&lname=<?php echo ($vv["lei_name"]); ?>&ss=<?php echo ($vv["storeName"]); ?>" target="_blank"><?php echo ($vv["shopName"]); ?></a></td>
				<td><?php echo ($vv["shopPrice"]); ?></td>
				<td><?php echo ($vv["shopShu"]); ?></td>
				<td><?php echo ($vv["lei_name"]); ?></td>
				<td>
					<?php if($vv["is_up"] == 1): ?>是
					<?php else: ?>
						否<?php endif; ?>
				</td>
				<td><a href="__APP__/Store/shopModify?shopId=<?php echo ($vv["shop_id"]); ?>" onclick="return confirm('确定要修改商品吗?');">修改</a>|<a href="__APP__/Store/shopDel?shopId=<?php echo ($vv["shop_id"]); ?>" onclick="return confirm('您真的要删除吗?');">删除</a></td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			<tr>
				<td class="shop_left" colspan="10"><?php echo ($page); ?></td>
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