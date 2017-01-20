<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>快搜首页——快速搜索你想要的</title>
  <link rel="shortcut icon" href="__PUBLIC__/images/so.ico" type="image/x-icon">
  <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/reset.css">
  <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/admin.css">
  <!-- 引用bootstrap -->
  <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/bootstrap.min.css">
  <script type="text/javascript" src="__PUBLIC__/js/jquery.min.js"></script>
  <script type="text/javascript" src="__PUBLIC__/js/bootstrap.min.js"></script>
  <!-- 文本编辑器引用 -->
  <link rel="stylesheet" type="text/css" href="__PUBLIC__/simditor/styles/font-awesome.css" />
  <link rel="stylesheet" type="text/css" href="__PUBLIC__/simditor/styles/simditor.css" />

  <script type="text/javascript" src="__PUBLIC__/simditor/scripts/js/jquery.min.js"></script>
  <script type="text/javascript" src="__PUBLIC__/simditor/scripts/js/module.js"></script>
  <script type="text/javascript" src="__PUBLIC__/simditor/scripts/js/uploader.js"></script>
  <script type="text/javascript" src="__PUBLIC__/simditor/scripts/js/simditor.js"></script>
 </head>
 <body>
  <!-- 头部导航 -->
  <!-- 头部导航 -->
  <nav class="navbar navbar-default" style="position:fixed;width:100%;overflow:hidden;*zoom:1;z-index:10;">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">
			<img src="__PUBLIC__/images/logo.png" alt="快搜" style="margin-top:-10px;">
        </a>
      </div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li><a href="__ROOT__/index.php">前台首页<span class="sr-only">(current)</span></a></li>
          <li><a href="<?php echo U('index');?>">后台首页</a></li>
        </ul>
        <!-- 右侧 -->
        <div class="nav navbar-nav navbar-right">
             <div class="head_img fl">
                <a href="" title="我"><img src="__PUBLIC__/images/333.jpg" width="40" height="40"  alt="xxx"></a>
                <div class="link_me fr">
                   <a href=""><?php echo ($otherName); ?></a>
                   <a href="<?php echo U('Login/logout');?>">退出</a>
                </div>
             </div>

         </div>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>  
	
	<!-- 主体 -->
	<div class="conWidth">
      <!-- 右边内容 -->
      <div class="right_con fr">
          <div class="right_intro">
 <h3 class="text-center">发布文章</h3>
  <form class="form-horizontal" action="<?php echo U('doModifyArticle');?>" method="post">
  <input type="text" name="id" value="<?php echo ($list[0]['id']); ?>" style="display:none;">
    <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">文章标题</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputEmail3" name="title" value="<?php echo ($list[0]['title']); ?>">
      </div>
    </div>
    <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">栏目选择</label>
    <div class="col-sm-10">
      <select name="cid" style="border:1px solid #333;">
    <?php if(is_array($cs)): foreach($cs as $key=>$vo): ?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["cName"]); ?></option><?php endforeach; endif; ?>
      </select>
    </div>
    </div>
    <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">状态选择</label>
    <div class="col-sm-10">
      <select name="sid" style="border:1px solid #333;">
      <option value="0"></option>
      <?php if(is_array($ss)): foreach($ss as $key=>$vv): ?><option value="<?php echo ($vv["id"]); ?>"><?php echo ($vv["state"]); ?></option><?php endforeach; endif; ?>
      </select>
    </div>
    </div>
    <div class="form-group">
      <label for="inputPassword3" class="col-sm-2 control-label">摘要</label>
      <div class="col-sm-10">
          <textarea name="summary" style="border:1px solid #ccc;" rows="5" cols="120"><?php echo ($list[0]['summary']); ?></textarea>
      </div>
    </div>
      <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">文章内容</label>
        <div class="col-sm-10">
            <textarea id="editor" name="content"  autofocus>
              <?php echo ($list[0]['content']); ?>
            </textarea>
        </div>
      </div>
    <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">发布时间</label>
    <div class="col-sm-10">
      <input type="text" name="date" value="<?php echo ($list[0]['date']); ?>">
    </div>
    </div>

    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">发布文章</button>
        <input type="reset" class="btn btn-default" value="重置">
      </div>
    </div>
  </form>
           </div>
      </div>  
      <!-- 左边导航 -->
      <div class="left_nav fl">
              <ul id='list_nav'> 
          <li>
            <dl>
              <dt>核心模块</dt>
              <dd><a href="<?php echo U('addList');?>">发布文章</a></dd>
              <dd><a href="<?php echo U('articleList');?>">文章列表</a></dd>
<!--               <dd><a href="">文章审核</a></dd> -->
            </dl>
          </li>          
          <li>
            <dl>
              <dt>栏目中心</dt>
              <dd><a href="<?php echo U('addCategory');?>">添加栏目</a></dd>
              <dd><a href="<?php echo U('addColumn');?>">添加文章分类</a></dd>
              <dd><a href="<?php echo U('category');?>">栏目分类管理</a></dd>
            </dl>
          </li>
          <li>
            <dl>
              <dt>状态中心</dt>
              <dd><a href="<?php echo U('state');?>">状态管理</a></dd>
            </dl>
          </li>

<!--           <li>
            <dl>
              <dt>导航中心</dt>
              <dd><a href="" title="">添加导航</a></dd>
              <dd><a href="" title="">导航分类</a></dd>
              <dd><a href="" title="">导航管理</a></dd>
            </dl>
          </li> -->
<!--           <li>
            <dl>
              <dt>快捷服务</dt>
              <dd><a href="" title="">添加服务</a></dd>
              <dd><a href="" title="">服务管理</a></dd>
              <dd><a href="" title="">添加公告</a></dd>
              <dd><a href="" title="">公告管理</a></dd>
            </dl>
          </li> -->
<!--           <li>
            <dl>
              <dt>广告中心</dt>
              <dd><a href="" title="">添加广告</a></dd>
              <dd><a href="" title="">广告管理</a></dd>
            </dl>
          </li> -->
<!--           <li>
            <dl>
              <dt>用户中心</dt>
              <dd><a href="" title="">添加管理员</a></dd>
              <dd><a href="" title="">用户管理</a></dd>
            </dl>
          </li>
          <li>
            <dl>
              <dt>资料修改</dt>
              <dd><a href="" title="">修改资料</a></dd>
              <dd><a href="" title="">修改密码</a></dd>
            </dl>
          </li>          
          <li>
            <dl>
              <dt>系统设置</dt>
              <dd><a href="" title="">文章审核开启</a></dd>
            </dl>
          </li>
 -->
        </ul>  
      </div>

    </div><!-- container -->
    <!-- 文本编辑器js -->
    <script type="text/javascript">
      var editor = new Simditor({
        textarea: $('#editor')
      });
    </script>

    <div class="footer div2_top">
      版权所有 © by leo
    </div>
   </body>
  </html>