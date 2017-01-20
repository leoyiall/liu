<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>快搜注册页</title>
  <link rel="shortcut icon" href="__PUBLIC__/images/so.ico" type="image/x-icon">
  <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/reset.css">
  <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/index.css">
  <script type="text/javascript" src="__PUBLIC__/js/check.js"></script>
  <?php if($_GET['msg']): ?><script type="text/javascript">
      alert("<?php echo ($_GET['msg']); ?>");
    </script><?php endif; ?>
 </head>
 <body style="background:url('__PUBLIC__/images/re.jpg')no-repeat top center;">
  	<div class="conWidth">
		<div class="logo_img">
			<a href="__ROOT__/index.php"><img src="__PUBLIC__/images/logo.png" alt="快搜"></a>
		</div>
  	</div>

  	<div class="login_box">
		<h2>注册</h2>
		<form action="<?php echo U('doRegsiter');?>" method="post" name="login">
	用 户 名 :
		<input type="text" name="username" placeholder="用户名" class="form_focus"><br>
	密　　码:
		<input type="password" name="password" placeholder="密码" class="form_focus"><br>
	确认密码:
		<input type="password" name="repass" placeholder="确认密码" class="form_focus"><br>
	性　　别:
		<input type="radio" name="sex" value="1" checked="true" class="radio"><span class="radio_sex" style="color:#036FF5">♂</span>
		<input type="radio" name="sex" value="0" class="radio"><span class="radio_sex" style="color:red">♀</span>
		<br>
	昵　　称:
		<input type="text" name="otherName" placeholder="昵称" class="form_focus"><br>
	<div class="div_center">	
		<button class="sub" id="enter">注册</button>
		<span class="span_left"><a href="<?php echo U('Admin/Login/index');?>">登录</a></span>
	</div>
		</form>
	<div class="div_center div_top">
		©copyright  by leo <a href="__ROOT__/index.php">首页</a>
	</div>
  	</div>
 </body>
</html>