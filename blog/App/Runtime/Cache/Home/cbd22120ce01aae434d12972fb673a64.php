<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Be程序员社区登录</title>

<link href="__PUBLIC__/blog/css/bootstrap.min.css" rel="stylesheet">
<link href="__PUBLIC__/blog/css/signin.css" rel="stylesheet">
<script type="text/javascript" src="__PUBLIC__/blog/js/jquery-2.1.0.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/blog/js/MDtool.js"></script>
<link rel="shortcut icon" href="__PUBLIC__/images/ico.png" type="image/x-icon" />

</head>

<body>

<div class="signin">
	<div class="signin-head"><img src="__PUBLIC__/images/ico.png" alt="">
	<br>
	</div>
	<h1 class="login_box" style="font-family:'幼圆';">Be程序员社区登录</h1>
	<form class="form-signin" role="form" method="post">
		<input type="text" class="form-control" placeholder="用户名" name="user" required autofocus id="user"/>
		<input type="password" class="form-control" placeholder="密码" name="pass" required id="pass"/>
		<input type="text" class="form-control" placeholder="验证码" style="float:left;position:relative;width:150px;" id="yzm">
		<img src="<?php echo U('verify');?>" style="float:right;position:absolute;right:145px;bottom:220px;height:40px;cursor:pointer;"onclick="this.src=this.src+'?'+Math.random()">
		<input type="button" value="登录" class="btn btn-lg btn-warning btn-block" id="sub">
		<label class="checkbox">
		<a href="" style="float:left;">忘记密码?</a>
		<a href="<?php echo U('Common/reg');?>" style="float:right;margin-right:10px;">注册</a>
		</label>
	</form>
	<div id="footer_box">
		copyright by <a href="" style="color:#000;">Be程序员社区</a>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
		var ms=mdtool.messager();
	$('#sub').click(function(){
		var yzm=$('#yzm').val();
		if(yzm.length <=0 ){
			ms.send("验证码不能为空");
			return;
		}
		var user=$('#user').val();
		if(user.length <=0 ){
			ms.send("用户名不能为空");
			return;
		}
		var pass=$('#pass').val();
		if(pass.length <=0 ){
			ms.send("密码不能为空");
			return;
		}
		$.ajax({
			url : "<?php echo U('dologin');?>",
			type:'post',
			datatype:'json',
			data:{
				'user':user,
				'pass':pass,
				'yzm':yzm
			},
			success:function(e){
				// console.log(e);
				if(e.bool){
					ms.send(e['info']);
					setTimeout(function(){
						window.location.href=e.link;
					},1000);
				}else{
					ms.send(e['info']);
				}
			},
			error:function(e){
				// console.log(e);
				if(e){
					ms.send("系统出现故障");
				}
			}
		});
	});
	
});

</script>
</body>
</html>