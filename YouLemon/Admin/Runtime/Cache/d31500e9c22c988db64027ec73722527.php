<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="leo">
  <meta name="Keywords" content="you柠檬商城">
  <meta name="Description" content="You柠檬电子商城快速购物">
  <title>You柠檬申请成为供应商</title> 
  <link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/admin.css">
  <link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/reset.css">
  <link rel="icon" type="image/png" href="__PUBLIC__/Images/logo.ico">
	<script type="text/javascript">
// 	window.onload=function(){
// 		var send=document.getElementById("send");
// 		var times=60;
// 		var timer=null;
// 	send.onclick=function(){
// 		send.value="申请成功";
// 		send.disabled=true;		
// 		send.style.background="#ccc";
// 	}
// }
function checkform(){
		var formYan = document.myform;
 	if (formYan.you.value==""){
  		formYan.you.focus();
		formYan.you.style.background="#F92659"
  		return false; 
 	  }
 	 }
</script>

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

<!-- 中间注册 -->	
	 <div class="conWidth">
		<div class="reg_biao">
			<form action="__ROOT__/admin.php/Gong/do_shen" method="post" name="myform" onsubmit="return checkform();">
				<table border="0">
					<tr>
						<td><span class="da_who"><?php echo ($who); ?></span>，您好：<p class="tishi">您还没申请成为供应商，需要申请管理员审核后才能成为供应商！申请后我们将会在24小时内给您开通。</p>
						<p class="tishi">感谢您对You柠檬商城的支持</p>
					</tr>
					<tr>
						<td>供应商名称:<input type="text"  name="you" class="person_wen" placeholder="请输入供应商名称"></td></td>
					</tr>
					<tr>
						<td><input type="submit" value="申请开通" id="send" class="next shen_qing next2"></td>
					</tr>
				</table>
			</form>
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