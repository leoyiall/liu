<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="leo">
  <meta name="Keywords" content="you柠檬商城">
  <meta name="Description" content="You柠檬电子商城快速购物">
  <title>You柠檬商城下订单成功</title> 
  <link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/admin.css">
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
				<li><a href="__APP__/Index/index" class="ac  mive">首页</a></li>
				<li><a href="__APP__/Index/gys" >供应商</a></li>
			</ul>
		</div>
	</div>
</div>
<!-- 中间注册 -->	
	 <div class="conWidth">
		<div class="reg">
			
			<div class="reg_biao">
				<div class="reg_zhu">
					<img src="__PUBLIC__/Images/gou.png">恭喜您，商品已下单，但是未支付!
					<p class="tishi ys_tiao">店家将会进行接单并且会告诉您.</p>
					<p>感谢您对You柠檬商城的支持.</p>
				</div>
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