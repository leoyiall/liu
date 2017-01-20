<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="title" content="优酷-中国领先视频网站,提供视频播放,视频发布,视频搜索 - 优酷视频" />
	<meta name="keywords" content="视频,视频分享,视频搜索,视频播放,优酷视频" />
	<meta name="description" content="视频服务平台,提供视频播放,视频发布,视频搜索,视频分享" />
	<title>Be程序员——后台管理员登录</title>
	<link rel="icon" href="__PUBLIC__/images/ico.png">
	<script type="text/javascript" src="__PUBLIC__/js/jquery-2.1.3.min.js"></script>
	<script type="text/javascript" src="__PUBLIC__/js/collapse.js"></script>
	<script type="text/javascript" src="__PUBLIC__/js/MDtool.js"></script>
	<link rel="stylesheet" href="__PUBLIC__/css/bootstrap.css">
	<link rel="stylesheet" href="__PUBLIC__/css/login.css">
  <link rel="stylesheet" href="__PUBLIC__/css/bootstrap-theme.min.css">
<script type="text/javascript">
$(document).ready(function(){
		var ms=mdtool.messager();
	$('#sub').click(function(){
		var yzm=$('#verify').val();
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
			url : "<?php echo U('Login/dologin');?>",
			type:'post',
			datatype:'json',
			data:{
				'user':user,
				'pass':pass,
				'yzm':yzm
			},
			success:function(e){
				console.log(e);
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
				console.log(e);
				if(e['info']){
					ms.send(e['info']);
				}
				// if(!e.bool){
				// 	$("#codeimg").attr("src",'__ROOT__/index.php/admin/Login/verify/'+Math.random());
				// }
			}
		});
	});
	
});

</script>
</head>
<body>
<div class="top-box">
<center>
	<a href=""><img src="__PUBLIC__/images/logo.png" class="" alt="logo" class="img-responsive"></a>
</center>
</div>
<div class="login-box text-center">
	<h1>登录</h1>
<form action="" method="post">
<p class="login-quote">
	<span>用户名:</span>
	<input type="text" class="login-input form-control" name="user" id="user"><span class="notice"></span>
</p>
<p class="login-quote">
	<span>密　码:</span>
	<input type="password" class="login-input form-control" name="pass" id="pass"><span class="notice"></span>
</p>
<p>
	<span>验证码:</span>
	<input type="text" class="login-yzm form-control" name="yzm" id='verify'>
	<img src="__APP__/admin/Login/verify/" width="80" height="35" alt="yzm" style="float:left;cursor:pointer;" onclick="this.src=this.src+'?'+Math.random()" title="点击更新" id="codeimg"><span class="notice"></span>
</p>
<p>
	<input type="button" id="sub" value="登录" class="btn login-btn">
</p>
</form>

	<p class="copyright">版权:©copyright by <a href="<?php echo U('Index/index');?>">Be程序员</a></p>
</div>
	
</body>
</html>