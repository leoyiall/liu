<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="leo">
  <meta name="Keywords" content="you柠檬商城">
  <meta name="Description" content="You柠檬电子商城快速购物">
  <title>You柠檬商城供应商介绍</title> 
  <link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/public.css">
  <link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/reset.css">

 </head>
 <body>
 <!-- 头部 -->
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
<div class="shopping_item" style="border:none;width:1000px;margin:0 auto;">
		<h3 class="shopping_tit" style="background:#fff;margin-bottom:10px;font-size:14px;">当前位置:<a href="__APP__/Index/index">首页</a> &gt;&gt;<a href="__APP__/Index/gys">供应商</a> &gt;&gt;<a href="__APP__/Index/gys_list?lname=<?php echo ($lei_name); ?>"><?php echo ($lname); echo ($lei_name); ?></a>&gt;&gt;<?php echo ($gongName); ?></h3>
</div>
	<!-- 供应商介绍页 -->
	<div class="main_right">
		<div class="store_tou">
				<div class="store_img fl">
					<img src="__PUBLIC__/Images/tou/<?php echo ($img); ?>" title="<?php echo ($gongName); ?>" width="200" height="200">
				</div>
				<div class="store_right fl">
					<table >
						<tr>
							<td align="right"><h4>店铺名称：</h4></td>
							<td align="left"><?php echo ($gongName); ?></td>
						</tr>
						<tr>
							<td align="right"><h4>店主名字：</h4></td>
							<td align="left"><?php echo ($realy); ?></td>
						</tr>
						<tr>
							<td align="right"><h4>商店类型：</h4></td>
							<td align="left">
								<?php echo ($lei_name); ?>
							</td>
						</tr>
						<tr>
							<td align="right"><h4>商店地址：</h4></td>
							<td align="left"><?php echo ($add); ?></td>
						</tr>
						<tr>
							<td align="right"><h4>联系电话：</h4></td>
							<td align="left"><?php echo ($Phone); ?></td>
						</tr>
							<form action="__APP__/Index/xuanze?lname=<?php echo ($lei_name); ?>" method="post">
						<tr>
							<td><input type="text" value="<?php echo ($gongId); ?>" name="xuangong" style="display:none;"></td>
							<td align="left">
								<input type="submit" value="选择该供应商" class="btn_se" >
							</td>
						</tr>
							</form>
					</table>
				</div>
			</div>

			<!-- 消息部分的代码-->
			<div class="store_xiao">
				<div class="store_jie">
					<span class="store_xx fl">供应商商品列表</span>			
				</div>
				<div class="store_list">
					<ul>
					<?php if(is_array($shop)): $i = 0; $__LIST__ = $shop;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vs): $mod = ($i % 2 );++$i;?><a href="__ROOT__/index.php/Index/introduce?shopId=<?php echo ($vs["shop_id"]); ?>&number=<?php echo ($vs["shopNum"]); ?>&pname=<?php echo ($vs["shopName"]); ?>&ss=<?php echo ($vs["gongName"]); ?>&lname=<?php echo ($vs["lei_name"]); ?>" target="__blank">
						<li>
							<div class="shopping_top">
		<img src="__PUBLIC__/Images/shop/<?php echo ($vs["shopImage"]); ?>" width="220" height="161">
							</div>	
						<p class="ys_hong">￥<?php echo ($vs["shopPrice"]); ?>&nbsp;<span class="te_name"><a href="__ROOT__/index.php/Index/introduce?shopId=<?php echo ($vs["shop_id"]); ?>&number=<?php echo ($vs["shopNum"]); ?>&pname=<?php echo ($vs["shopName"]); ?>&ss=<?php echo ($vs["gongName"]); ?>&lname=<?php echo ($vs["lei_name"]); ?>" title="<?php echo ($vs["shopName"]); ?>" target="_blank"><?php echo ($vs["shopName"]); ?></a></span></p>
						</li></a><?php endforeach; endif; else: echo "" ;endif; ?>				
					</ul>
				</div>
		<div class="shoppingCart comWidth">
			<div class="shopping_item shopYe" style="border:none;text-align:center;clear:both;padding-top:20px;">
				<!-- <?php echo ($page); ?> -->
			</div>
		</div>
			</div>
	</div>
		<!-- 底部版权 -->
<!-- [底部版权] -->
<div class="hr_25"></div>
<div class="footer">
	<p><a href="#">You柠檬简介</a><i>|</i><a href="#">You柠檬客服</a><i>|</i> <a href="#">招纳贤士</a><i>|</i><a href="#">联系我们</a><i>|</i>客服热线：400-675-1234</p>
	<p>Copyright &copy; 2013 - 2016 You柠檬版权所有&nbsp;&nbsp;&nbsp;桂ICP备09037834号&nbsp;&nbsp;&nbsp;桂ICP证B1034-8373号&nbsp;&nbsp;&nbsp;某市公安局XX分局备案编号：123456789123</p>
	<p class="web"><a href="#"><img src="__PUBLIC__/Images/webLogo.jpg" alt="logo"></a><a href="#"><img src="__PUBLIC__/Images/webLogo.jpg" alt="logo"></a><a href="#"><img src="__PUBLIC__/Images/webLogo.jpg" alt="logo"></a><a href="#"><img src="__PUBLIC__/Images/webLogo.jpg" alt="logo"></a></p>
</div>
 </body>
</html>