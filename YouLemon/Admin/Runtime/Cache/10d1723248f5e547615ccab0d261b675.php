<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="leo">
  <meta name="Keywords" content="you柠檬商城">
  <meta name="Description" content="You柠檬电子商城快速购物">
<title>You柠檬商城管理员列表</title>
	<link rel="icon" type="image/png" href="__PUBLIC__/__PUBLIC__/Images/logo.ico">
<link href="__PUBLIC__/Css/reset.css" rel="stylesheet" type="text/css">
<link href="__PUBLIC__/Css/gllist.css" rel="stylesheet" type="text/css">
<link href="__PUBLIC__/Css/public.css" rel="stylesheet" type="text/css">
<head>
<body>
<!-- 引用后台头部 -->
	
	<link rel="icon" type="image/png" href="__PUBLIC__/Images/logo.ico">
	<style type="text/css">
	body,div,p,ul,li{
		margin:0;
		padding:0;
	}
	#index_top{
		width:100%;
		height:76px;
		background:#4DB7EB;
		position: fixed;
	}
	#index_logo{
		width:auto;
		height:76px;
		float:left;
		margin:0 auto;
		line-height: 85px;
		font-size:25px;
		color:#fff;
		/*font-weight: bold;*/
		font-family: "微软雅黑";
		margin-left:50px;
	}
	#index_logo img{
		float:left;
		margin-top:15px;
		margin-right: 8px;
	}
	#index_logout{
		width:350px;
		height:76px;
		float:right;
	}
	#index_logout .index_login{
		width:auto;
		height:76px;
		margin-left:10px;
		line-height: 76px;
		font-size:13px;
		color:#fff;
		float:left;
		font-family: "宋体";
	}
	#index_logout img{
		margin-top:15px;
		margin-left:10px;
	}
	.yuan{width:50px;height:50px;overflow: hidden;border:1px solid #fff;border-radius: 50%;line-height: 50px;text-align: center;}
	.yuan:hover{border:1px solid blue;}
	</style>
<body>
	<!-- 后台头部开始 -->
	<div id="index_top">
		<!-- 中间logo开始 -->
		<div id="index_logo">
			<a href="__APP__/Houshop/ht_index"><img src="__PUBLIC__/Images/logo.png"></a>You柠檬商城后台
		</div>
		<!-- 右边身份和退出部分开始 -->
		<div id="index_logout">
		<span class="index_login fl">用户:<?php echo ($who); ?></span>
		<span class="index_login fl">身份:<?php echo ($shenfen); ?></span>
		<a href="__APP__/Houshop/tui" alt="退出"><img src="__PUBLIC__/Images/logout.png" title="退出"></a>
		</div>
	</div>
</body>
</html>
	<!-- 引用后台左边 -->
	<div id="ht_left">
	<style type="text/css">
	body{margin:0;padding:0;overflow-x:hidden;}
html, body{height:100%;}
img{border:none;}
dl,dt,dd{display:block;margin:0;font-family:'微软雅黑';font-size:14px;color:#626262;}
dl{	border-bottom:1px inset #abcdef;}
a{text-decoration:none;}

.container{width:160px;height:auto;margin-top:76px;position:fixed;}

/*left*/
.leftsidebar_box{width:160px;height:auto !important;overflow:visible !important;height:100% !important;background-color:#3992d0;position: fixed;}
.line{height:2px;width:100%;background-image:url(__PUBLIC__/Images/left/line_bg.png);background-repeat:repeat-x;}
.leftsidebar_box dt{padding-left:50px;height:50px;line-height:60px;padding-right:10px;background-repeat:no-repeat;background-position:20px center;color:#f5f5f5;font-size:14px;position:relative;line-height:48px;cursor:pointer;padding-top: 5px;padding-bottom: 5px;}
.leftsidebar_box dd{background-color:#317eb4;padding-left:40px;}
.leftsidebar_box dd a{color:#f5f5f5;line-height:30px;}
.leftsidebar_box dd a:hover{color:#000;}
.leftsidebar_box dt img{position:absolute;right:10px;top:27px;}
.system_log dt{background-image:url(__PUBLIC__/Images/left/system.png)}
.custom dt{background-image:url(__PUBLIC__/Images/left/custom.png)}
.channel dt{background-image:url(__PUBLIC__/Images/left/channel.png)}
.app dt{background-image:url(__PUBLIC__/Images/left/app.png)}
.cloud dt{background-image:url(__PUBLIC__/Images/left/cloud.png)}
.syetem_management dt{background-image:url(__PUBLIC__/Images/left/syetem_management.png)}
.source dt{background-image:url(__PUBLIC__/Images/left/source.png)}
.statistics dt{background-image:url(__PUBLIC__/Images/left/statistics.png)}
.leftsidebar_box dl dd:last-child{padding-bottom:10px;}
	</style>
<head>
<body id="bg">
	
<div class="container">

	<div class="leftsidebar_box">
		<div class="line"></div>
		<!-- 系统首页部分开始 -->
		<dl class="system_log">
			<dt >系统首页<img src="__PUBLIC__/Images/left/select_xl01.png"></dt>
			<dd class="first_dd"><a href="__APP__/Houshop/ht_index">系统首页</a></dd>
		</dl>
	<!-- 管理员信息部分开始 -->
		<dl class="custom">
			<dt >个人中心<img src="__PUBLIC__/Images/left/select_xl01.png"></dt>
			<dd class="first_dd"><a href="__APP__/Houshop/ht_person">个人资料</a></dd>
		</dl>
	<!-- 用户管理部分开始 -->
	<?php if($result == 1): ?><dl class="custom">
			<dt >管理员管理<img src="__PUBLIC__/Images/left/select_xl01.png"></dt>
			<dd class="first_dd"><a href="__APP__/Houshop/ht_addgl">增加管理员</a></dd>
			<dd class="first_dd"><a href="__APP__/Houshop/ht_gllist">管理员列表</a></dd>
		</dl><?php endif; ?>
	<!-- 系统管理部分开始 -->
		<dl class="custom">
			<dt>分类管理<img src="__PUBLIC__/Images/left/select_xl01.png"></dt>
			<dd class="first_dd"><a href="__APP__/Houshop/ht_set1.php">添加一级分类</a></dd>
			<dd class="first_dd"><a href="__APP__/Houshop/ht_set2.php">添加二级分类</a></dd>
			<dd class="first_dd"><a href="__APP__/Houshop/ht_setall.php">分类管理</a></dd>
		</dl>
	<!-- 用户管理部分开始 -->
		<dl class="custom">
			<dt>用户管理<img src="__PUBLIC__/Images/left/select_xl01.png"></dt>
			<dd class="first_dd"><a href="__APP__/Houshop/ht_yhlist">用户列表</a></dd>
		</dl>	
	<!-- 店铺管理部分开始 -->
		<dl class="custom">
			<dt>店铺管理<img src="__PUBLIC__/Images/left/select_xl01.png"></dt>
			<dd class="first_dd"><a href="__APP__/Houshop/ht_storelist">店铺列表</a></dd>
		</dl>
	<!-- 供应商部分开始 -->
		<dl class="custom">
			<dt >供应商管理<img src="__PUBLIC__/Images/left/select_xl01.png"></dt>
			<dd class="first_dd"><a href="__APP__/Houshop/ht_gonglist">供应商列表</a></dd>
		</dl>
	</div>

</div>

<script type="text/javascript" src="__PUBLIC__/Js/jquery.js"></script>
<script type="text/javascript">
$(".leftsidebar_box dt").css({"background-color":"#3992d0"});
$(".leftsidebar_box dt img").attr("src","__PUBLIC__/Images/left/select_xl01.png");
$(function(){
	$(".leftsidebar_box dd").hide();
	$(".leftsidebar_box dt").click(function(){
		$(".leftsidebar_box dt").css({"background-color":"#3992d0"})
		$(this).css({"background-color": "#317eb4"});
		$(this).parent().find('dd').removeClass("menu_chioce");
		$(".leftsidebar_box dt img").attr("src","__PUBLIC__/Images/left/select_xl01.png");
		$(this).parent().find('img').attr("src","__PUBLIC__/Images/left/select_xl.png");
		$(".menu_chioce").slideUp(); 
		$(this).parent().find('dd').slideToggle();
		$(this).parent().find('dd').addClass("menu_chioce");
	});
})
</script>
</body>
</html>
	</div>
	<!-- 管理员管理右边代码 -->
	<div id="ht_list">
			<!-- 头部开始 -->
		<div id="list_tou">
			<div id="list_add">
				<!-- 头部人员数 -->
				<div class="list_kuai">
					<img src="__PUBLIC__/Images/user.png">
					<span class="wen"><?php echo ($count); ?></span>
					<p>管理员人数</p>
					</div>
				<!-- 添加管理员 -->
			<a href="ht_addgl.php">
				<div class="list_yy">
					<img src="__PUBLIC__/Images/adduser.png">
					<span class="wz">添加管理员</span>
					</div>
				</a>
				</div>
			</div>
				<!-- 管理员列表开始 -->
					<div id="gl_list">
						<table cellpadding="0" cellspacing="0">
							<tr>
						<td colspan="7" class="gl_tou">管理员列表</td>
							</tr>
							<tr>
								<th>ID</th>
								<th>管理员账号</th>
								<th>管理员类型</th>
								<th>管理员邮箱</th>
								<th>管理员手机</th>
								<th>管理员头像</th>
								<th width="200">操作</th>
							</tr>
							<?php if(is_array($all)): $i = 0; $__LIST__ = $all;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><tr>
								<td><?php echo ($vv["user_id"]); ?></td>
								<td><?php echo ($vv["username"]); ?></td>
								<td>管理员</td>
								<td><?php echo ($vv["email"]); ?></td>
								<td><?php echo ($vv["phone"]); ?></td>
								<td><img src="__PUBLIC__/Images/tou/<?php echo ($vv["img"]); ?>" width="30" height="30"></td>
								<td>
								<ul>
									<a href="__APP__/Houshop/modify?id='<?php echo ($vv["user_id"]); ?>'" ><li class="xg">修改</li></a>
									<a href="__APP__/Houshop/del?id='<?php echo ($vv["user_id"]); ?>'" onclick="return confirm('确认删除吗?');"><li class="del">删除</li></a>
								</ul>
								</td>
							</tr><?php endforeach; endif; else: echo "" ;endif; ?>
							<tr>
								<td colspan="7">
									<?php echo ($page); ?>
								</td>
							</tr>					
						</table>
					</div>
		</div>
	</div>
</body>
</html>