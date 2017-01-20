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
	.adminRight{width:82%;float:right;}
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
			<a href="<?php echo U('seeMe');?>/id=<?php echo ($data[0]['id']); ?>"><img src="<?php echo ($data[0]['headimg']); ?>" width="40" height="40" alt="" class="img-thumbnail" title="查看资料"></a>
			<a href="<?php echo U('seeMe');?>/id=<?php echo ($data[0]['id']); ?>"  title="查看资料">
<span class="glyphicon glyphicon-user"></span>
			<?php echo ($data[0]['nicheng']); ?></a>
			<a href="<?php echo U('modifyPass');?>/id=<?php echo ($data[0]['id']); ?>" class="admin-modify">修改密码</a>
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
				<li><a href="">社区</a></li>
				<li><a href="">博客</a></li>
				<li><a href="">问答</a></li>
				<li><a href="">编程库</a></li>
				<li><a href="">源码分享</a></li>
				<li><a href="">管理员中心</a></li>
				<li><a href="" style="border-right:none;">系统设置</a></li>
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
		<!-- 主要功能 -->
			<li class="left-title" style="margin:5px auto;">主要功能</li>
			<li class="left-li"><span class="li-quote">▶</span><a href="<?php echo U('Index/adminSendnews');?>" target="_self">发布资讯</a></li>
			<li class="left-li"><span class="li-quote">▶</span><a href="<?php echo U('Index/adminSendsoft');?>" target="_self">发布软件</a></li>
			<li class="left-li"><span class="li-quote">▶</span><a href="<?php echo U('Index/adminSendcategory');?>" target="_self">添加分类</a></li>
			<li class="left-li"><span class="li-quote">▶</span><a href="<?php echo U('Index/adminSendstate');?>" target="_self">添加状态</a></li>
				<!-- 功能管理 -->
			<li class="left-title" style="margin:5px auto;">功能管理</li>
			<li class="left-li"><span class="li-quote">▶</span><a href="<?php echo U('Index/adminArticlelist');?>" target="_self">资讯管理</a></li>
			<li class="left-li"><span class="li-quote">▶</span><a href="<?php echo U('Index/adminSoftlist');?>" target="_self">软件管理</a></li>
			<li class="left-li"><span class="li-quote">▶</span><a href="<?php echo U('Index/adminSendcategory');?>" target="_self">分类管理</a></li>
			<li class="left-li"><span class="li-quote">▶</span><a href="<?php echo U('Index/adminSendstate');?>" target="_self">状态管理</a></li>
			<li class="left-li"><span class="li-quote">▶</span><a href="<?php echo U('Index/adminLinkFriend');?>" target="_self">友情链接</a></li>
			<li class="left-title" style="margin:5px auto;">审核中心</li>
			<li class="left-li"><span class="li-quote">▶</span><a href="<?php echo U('Index/examineArticle');?>" target="_self">文章审核</a></li>
			<li class="left-li"><span class="li-quote">▶</span><a href="<?php echo U('Index/examineSoft');?>" target="_self">软件审核</a></li>
				<!-- 系统功能 -->
			<li class="left-title" style="margin:5px auto;">系统功能</li>
			<li class="left-li"><span class="li-quote">▶</span><a href="<?php echo U('Index/adminSet');?>" target="_self">系统管理</a></li>
			<li class="left-li"><span class="li-quote">▶</span><a href="<?php echo U('Index/adminSystem');?>" target="_self">系统信息</a></li>
		</ul>
	</div>	
	
</body>
</html>
	</aside>
	<aside class="adminRight">
		<script type="text/javascript">
  var ms=mdtool.messager();
<?php if($info): ?>ms.send("<?php echo ($info); ?>");<?php endif; ?> 
</script>
<div class="alert alert-info" role="alert"><b>注意:</b>点击文字即可进行修改，再点下表单外即可修改状态。</div>
<div class="container-fluid">
<div class="row">
<!-- 导航条 -->
<ol class="breadcrumb">
  <li><a href="<?php echo U('Index/index');?>">首页</a></li>
  <li class="active">友情链接管理</li>
</ol>
<table class="table table-hover">
  <tr>
    <th>条数</th>
    <th>友情链接名称</th>
  	<th>链接</th>
  	<th>操作</th>
  </tr>
   <tr>
   <td></td>
    <td><input type="text" name="title" class="form-control" placeholder="友情链接名称"  autofocus="autofocus"></td>
  	<td><input type="text" name="link" class="form-control" placeholder="链接"  autofocus="autofocus"></td>

  	<td>
  		<a href="javascript:void(0);" class="admin-modify" style="line-height:35px;"  id="addState">添加</a>
  	</td>
  </tr>
  <?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
    <td><?php echo ($vo["id"]); ?></td>
    <td class="caname" objId="<?php echo ($vo["id"]); ?>"><?php echo ($vo["title"]); ?></td>
    <td class="canames" objId="<?php echo ($vo["id"]); ?>"><?php echo ($vo["link"]); ?></td>
    <td><a href="<?php echo U('delLink');?>?id=<?php echo ($vo["id"]); ?>" class='admin-modify' objId='<?php echo ($vo["id"]); ?>' onclick="confirm('确定删除该友情链接吗?')">删除</a></td>
  </tr><?php endforeach; endif; ?>
</table>
  <nav class="pages">
    <?php echo ($show); ?>
  </nav>
</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
  var ms=mdtool.messager();
  $("#addState").click(function(){
    // 如果发布的信息为空
    if($("input[name='title']").val()==""){
      ms.send("友情链接名称不能为空!");
      return;
    }
    if($("input[name='link']").val()==""){
      ms.send("链接不能为空!");
      return;
    }

    $("#addState").disabled=true;  //发布成功后，禁止
     // 发布后的信息
    var title = $("input[name='title']").val();
    var link = $("input[name='link']").val();
    $.ajax({
      url : "<?php echo U('Index/addLink');?>",
      type:'post',
      datatype:'json',
      data:{
        'title':title,
        'link':link
      },
      success:function(e){
        console.log(e);
      ms.send(e);
  $("<tr class='xiaoguo'><td></td><td class='caname' objId='e.id'>"+title+"</td><td objId='e.id'>"+link+"</td><td><a href='<?php echo U('delLink');?>' class='admin-modify' objId='0' >删除</a></td></tr>").appendTo($(".table"));
        // 清空发表框
        $("input[name='title']").val('');
        $("input[name='link']").val('');
        setTimeout("window.location.reload()",1000);
      },
      error:function(e){
        console.log(e);
        ms.send(e);
      }
    });      
  }); 
      $(function() { 
  //获取class为caname的元素 
  $(".caname").click(function() { 
  var td = $(this); 
  var txt = td.text(); 
  var input = $("<input type='text'value='" + txt + "'/>"); 
  td.html(input); 
  input.click(function() { return false; }); 
  //获取焦点 
  input.trigger("focus"); 
  //文本框失去焦点后提交内容，重新变为文本 
  input.blur(function() { 
  var newtxt = $(this).val(); 
  //判断文本有没有修改 
  if (newtxt != txt) { 
  td.html(newtxt); 
  
  var id = td.attr("objId"); 
  //ajax异步更改数据库,加参数date是解决缓存问题 
  var url = "<?php echo U('modifyLink');?>?id="+id+"&con="+newtxt; 
  //使用get()方法打开一个一般处理程序，data接受返回的参数（在一般处理程序中返回参数的方法 context.Response.Write("要返回的参数");） 
  //数据库的修改就在一般处理程序中完成 
  $.get(url, function(data) { 

    ms.send(data); 
    td.html(newtxt); 
  }); 
 
  } 
  else 
  { 
    ms.send(data);
    td.html(newtxt); 
  } 
  }); 
  }); 
  }); 
      // 链接的
    $(function() { 
      //获取class为caname的元素 
      $(".canames").click(function() { 
      var td = $(this); 
      var txt = td.text(); 
      var input = $("<input type='text'value='" + txt + "'/>"); 
      td.html(input); 
      input.click(function() { return false; }); 
      //获取焦点 
      input.trigger("focus"); 
      //文本框失去焦点后提交内容，重新变为文本 
      input.blur(function() { 
      var newtxt = $(this).val(); 
      //判断文本有没有修改 
      if (newtxt != txt) { 
      td.html(newtxt); 
      
      var id = td.attr("objId"); 
      //ajax异步更改数据库,加参数date是解决缓存问题 
      var url = "<?php echo U('modifyLinks');?>?id="+id+"&con="+newtxt; 
      //使用get()方法打开一个一般处理程序，data接受返回的参数（在一般处理程序中返回参数的方法 context.Response.Write("要返回的参数");） 
      //数据库的修改就在一般处理程序中完成 
      $.get(url, function(data) { 

        ms.send(data); 
        td.html(newtxt); 
      }); 
      
      } 
      else 
      { 
        ms.send(data);
        td.html(newtxt); 
      } 
      }); 
      }); 
      }); 
}); 
</script>
	</aside>
</div>	 
</body>
</html>