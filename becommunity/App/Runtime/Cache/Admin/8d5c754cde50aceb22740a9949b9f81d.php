<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Be程序员——后台首页</title>
<link rel="icon" href="__PUBLIC__/images/ico.png">
<script type="text/javascript" src="__PUBLIC__/js/jquery-2.1.3.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/MDtool.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/collapse.js"></script>
<link rel="stylesheet" href="__PUBLIC__/css/bootstrap.css">
<link rel="stylesheet" href="__PUBLIC__/css/admin.css">
<link rel="stylesheet" href="__PUBLIC__/css/bootstrap-theme.min.css">
<style type="text/css">
	.adminDing{width:100%;}
	.adminMain{overflow: hidden;*zoom:1;}
	.adminLeft{width:210px;float:left;}
	.adminRight{width:84%;float:right;}
</style>
</head>
<body  style="background:#fafafa;">
<header class="adminDing">
	<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Be程序员——后台首页</title>
<link rel="icon" href="__PUBLIC__/images/ico.png">
<script type="text/javascript" src="__PUBLIC__/js/jquery-2.1.3.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/collapse.js"></script>
<link rel="stylesheet" href="__PUBLIC__/css/bootstrap.css">
<link rel="stylesheet" href="__PUBLIC__/css/admin.css">
<link rel="stylesheet" href="__PUBLIC__/css/bootstrap-theme.min.css">

</head>
<body>
<div class="admin-top">
	<div class="admin-xx">
		<a href="__ROOT__/index.php" target="__parent"><img src="__PUBLIC__/images/logo.png" alt="logo" class="fl"></a>
		<div class="admin-about">
			<a href="<?php echo U('Index/seeMe');?>?id=<?php echo ($data[0]['id']); ?>"><img src="<?php echo ($data[0]['headimg']); ?>" width="40" height="40" alt="" class="img-thumbnail" title="查看资料"></a>
			<a href="<?php echo U('Index/seeMe');?>?id=<?php echo ($data[0]['id']); ?>"  title="查看资料">
<span class="glyphicon glyphicon-user"></span>
			<?php echo ($data[0]['nicheng']); ?></a>
			<a href="<?php echo U('Index/modifyPass');?>?id=<?php echo ($data[0]['id']); ?>" class="admin-modify">修改密码</a>
			<a href="<?php echo U('Login/logout');?>" title="退出" class="admin-out">
				<span class="glyphicon glyphicon-off"></span>
			</a>
		</div>
	</div>
<div class="admin-nav">
	<div style="width:1000px;margin:0 auto;">
			<ul>
				<li class="link-active"><a href="<?php echo U('Index/index');?>" target="_self">后台首页</a></li>
				<li><a href="<?php echo U('Index/index');?>" target="_self">编程资讯</a></li>
				<li><a href="<?php echo U('Index/index');?>" target="_self">软件下载</a></li>
			<?php if($data[0]['power'] != 0): ?><li><a href="<?php echo U('Community/index');?>">社区</a></li>
				<li><a href="<?php echo U('Blog/index');?>">博客</a></li>
				<li><a href="<?php echo U('Question/index');?>">问答</a></li><?php endif; ?>
				<li><a href="<?php echo U('Programme/index');?>">编程库</a></li>
				<li><a href="<?php echo U('Code/index');?>">源码分享</a></li>
			<?php if($data[0]['power'] == 2): ?><li><a href="<?php echo U('Adminlist/index');?>">管理员中心</a></li>
				<li><a href="<?php echo U('Index/adminSet');?>" style="border-right:none;">系统设置</a></li><?php endif; ?>
			</ul>
	</div><!-- container-fluid结束 -->
</div>
</div>

</body>
</html>
</header>
<div class="adminMain">
	<aside class="adminLeft">
		<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Be程序员——后台首页</title>
<link rel="icon" href="__PUBLIC__/images/ico.png">
<script type="text/javascript" src="__PUBLIC__/js/jquery-2.1.3.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/collapse.js"></script>
<link rel="stylesheet" href="__PUBLIC__/css/bootstrap.css">
<link rel="stylesheet" href="__PUBLIC__/css/admin.css">
<link rel="stylesheet" href="__PUBLIC__/css/bootstrap-theme.min.css">

</head>
<!-- 左侧导航 -->
	<div class="admin-left">
		<ul class=''>
				<!-- 功能管理 -->
			<li class="left-title" style="margin:5px auto;">管理员管理</li>
			<li class="left-li"><span class="li-quote">▶</span><a href="<?php echo U('Adminlist/index');?>" target="_self">管理员管理</a></li>
			<li class="left-li"><span class="li-quote">▶</span><a href="<?php echo U('Adminlist/addAdmin');?>" target="_self">添加管理员</a></li>
				<!-- 功能管理 -->
			<li class="left-title" style="margin:5px auto;">用户管理</li>
			<li class="left-li"><span class="li-quote">▶</span><a href="<?php echo U('Adminlist/userList');?>" target="_self">用户管理</a></li>
		</ul>
	</div>	
	
</body>
</html>
	</aside>
	<aside class="adminRight">
		


<div class="container-fluid">
<div class="row">
<!-- 导航条 -->
<ol class="breadcrumb">
  <li><a href="<?php echo U('index');?>">首页</a></li>
  <li class="active">用户管理</li>
</ol>
<table class="table table-hover">
<tr>
  <th colspan="6">
<form action="<?php echo U('userlist');?>" method="post">
    <input type="submit" value="搜索" class="btn btn-default" style="float:right;margin-left:5px;">
    <input type="text" name="so" class="form-control" placeholder="对用户进行搜索..." style="width:200px;float:right;">
  </form>  
  </th>
</tr>
  <tr>
    <!-- <th>用户名</th> -->
    <th>用户</th>
    <th>头像</th>
    <th>昵称</th>
    <th>邮箱</th>
  	<th>操作</th>
  </tr>
<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
  	<td><?php echo ($vo["user"]); ?></td>
    <td><img src="__PUBLIC__/Uploads/head/<?php echo ($vo["headimg"]); ?>" width="30" height="30"></a></td>
    <td><?php echo ($vo["nicheng"]); ?></td>
    <td><?php echo ($vo["email"]); ?></td>
  	<td>
  		<a href="javascript:void(0);" delId="<?php echo ($vo["idnumber"]); ?>" class="admin-modify admin-del" >删除</a>
  	</td>
  </tr><?php endforeach; endif; else: echo "" ;endif; ?>

</table>
  <nav class="pages">
    <?php echo ($show); ?>
  </nav>
</div>
</div>
<script type="text/javascript">
$(".admin-del").on("click",function(){
    if(confirm("是否进行该操作?")){
      var del = $(this);
      var ms=mdtool.messager();
      var aid = del.attr("delId");
       $.ajax({
        url : "<?php echo U('doDeleteUser');?>?id="+aid,
        type:'get',
        datatype:'json',
        success:function(e){
          console.log(e);
          ms.send(e);
        },
        error:function(){
          ms.send(e);
        }
      });
       setTimeout("window.location.reload()",1000);
    }
});
</script>

	</aside>
</div>	 
</body>
</html>