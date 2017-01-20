<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>校园信箱管理后台</title>
	<link rel="icon" type="image/png" href="images/mylogo-24x24.ico">
<link href="css/public.css" rel="stylesheet" type="text/css">
<link href="css/addgl.css" rel="stylesheet" type="text/css">
<head>
<body>
	<!-- 引用后台头部 -->
	<?php
 include "ht_top.php"; ?>
	<!-- 引用后台左边 -->
	<div id="ht_left">
	<?php
 include "ht_left.php"; ?>	
	</div>
	<!-- 后台首页右边代码 -->
	<div id="ht_addld">
		<div id="ht_gl">
			<div class="ht_biaoti">
				<img src="images/fly-b-48x48.png" ><span class="tj">添加领导</span>
			</div>
			<div id="ht_lie">
			<form action="" method="">
				<p>用 户 名:<input type="text" name="username" /></p>
				<p>密　　码:<input type="password" name="psw" /></p>
				<p>确认密码:<input type="password" name="repsw" /></p>
				<p>领导名字:<input type="text" name="ldname" /></p>
				<p>领导职务:<input type="text" name="ldzhiwu" /></p>
				<p>领导头像:<input type="file" name="ldpit" /></p>
				<p><span class="ww">主要职责:</span><textarea name="ldcontent" rows="5" cols="26"> </textarea>  </p>
				<input type="submit" value="添加职务" class="anniu" name="sub" />
				<input type="reset"  class="anniu" value="重置" />
			</form>
			</div>
		</div>
	</div>
</body>
</html>