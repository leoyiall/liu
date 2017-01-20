<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>快搜登录页</title>
  <link rel="shortcut icon" href="__PUBLIC__/images/so.ico" type="image/x-icon">
  <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/reset.css">
  <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/index.css">
  <script type="text/javascript" src="__PUBLIC__/js/jquery.min.js"></script>
  <script type="text/javascript" src="__PUBLIC__/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="__PUBLIC__/js/check.js"></script>
  <?php if($_GET['msg']): ?><script type="text/javascript">
	    alert("<?php echo ($_GET['msg']); ?>");
	  </script><?php endif; ?>
 </head>
 <body style="background:url('__PUBLIC__/images/ss.jpg')top center;">
  	<div class="conWidth">
		<div class="logo_img">
			<a href="__ROOT__/index.php"><img src="__PUBLIC__/images/logo.png" alt="快搜"></a>
		</div>
  	</div>

  	<div class="login_box">
		<h2>登录</h2>
		<form action="<?php echo U('doLogin');?>" method="post" name="login">
	用户名:
		<input type="text" name="username" placeholder="用户名" class="form_focus"><br>
	密　码:
		<input type="password" name="password" placeholder="密码" class="form_focus"><br>
	验证码:
		<input type="text" name="yzm" placeholder="验证码" class="yzm form_focus">
		<img src="<?php echo U('Admin/Login/verify');?>" class="yzm_img" onclick="this.src=this.src+'?'+Math.random()" title="点击刷新" style="height:30px;margin-bottom:-10px;">
		<br>
	<div class="div_center">	
		<button type="submit" class="sub" id="enter">登录</button>
		<span class="span_left"><a href="<?php echo U('Admin/Login/regsiter');?>">注册</a></span>
	</div>
		</form>
	<div class="div_center div_top">
		©copyright  by leo <a href="__ROOT__/index.php">首页</a>
	</div>
  	</div>
 </body>
</html>