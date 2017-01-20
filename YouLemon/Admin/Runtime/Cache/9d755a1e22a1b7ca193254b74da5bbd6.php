<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="leo">
  <meta name="Keywords" content="you柠檬商城">
  <meta name="Description" content="You柠檬电子商城快速购物">
  <title>You柠檬商城用户注册</title> 
  <link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/admin.css">
  <link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/reset.css">
<script>
	function checkform(){
		var formYan = document.myform;
 	if (formYan.user.value==""){
  		formYan.user.focus();
		formYan.user.style.background="#F92659"
  		return false; 
 	  }
 	if (formYan.pass.value==""){
  		formYan.pass.focus();   
  		formYan.pass.style.background="#F92659"
  		return false; 
 	  }
	}
</script>
 </head>
 <body>
 <!-- 头部 -->
	  <link rel="icon" type="image/png" href="__PUBLIC__/Images/logo.ico">
<div class="head">
  <div class="conWidth">
    <div class="head_logo fl">
        <a href="__ROOT__/index.php"><img src="__PUBLIC__/Images/logo.png" alt="you柠檬商城Logo"></a>You柠檬商城
    </div>
    <div class="head_right fr">
        <a href="__ROOT__/admin.php/Index/reg">注册</a>
        <a href="__ROOT__/admin.php/Index/login">登录</a>
    </div>
  </div>
</div>
<!-- 中间注册 -->	
	 <div class="conWidth">
		<div class="reg">
			<div class="reg_mid">
				<div class="reg_tu">
					<ul>
						<li>
							<i class="reg2 reg_1">1</i>
							创建用户
						</li>
						<li class="tiao">
							---------------
						</li>
						<li>
							<i class="reg_2 reg2">2</i>
							<span class="reg_se">设置身份</span>
						</li>
						<li class="tiao">
							---------------
						</li>
						<li>
							<i class="reg_2 reg2">3</i>
							<span class="reg_se">设置密保</span>
						</li>
						<li class="tiao">
							---------------
						</li>
						<li>
							<i class="reg_2 reg2">4</i>
							<span class="reg_se">注册成功</span>
						</li>
					</ul>
				</div>
			</div>

			<div class="reg_biao">
			<form action="__ROOT__/admin.php/Index/reg" method="post" name="myform" onsubmit="return checkform();">
				<table border="0">
					<tr>
						<td>用户名:</td>
						<td><input type="text" name="user" onfocus="this" placeholder="请输入用户名" class="person_wen"></td>
					</tr>
					<tr>
						<td>密　码:</td>
						<td><input type="password" name="pass"  placeholder="请输入密码" class="person_wen">
						<input type="text" name="number" value="1" hidden></td>
					</tr>
					<tr>
						<td colspan="2"><input type="submit" value="下一步" class="next next2"></td>
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