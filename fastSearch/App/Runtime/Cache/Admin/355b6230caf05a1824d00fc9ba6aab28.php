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
  <script type="text/javascript" src="__PUBLIC__/js/check1.js"></script>

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
           <table class="table table-hover">
    <tr>
      <th>id</th>
      <th>栏目名称</th>
      <!-- <th>说明</th> -->
      <th>操作</th>
    </tr>
    <?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
      <td><?php echo ($vo["id"]); ?></td>
      <td>
        <?php echo ($vo["_cName"]); ?>
      </td>
    <!--  <td>
         <?php echo ($vo["cIntroduce"]); ?> 
      </td>-->
      <td>
        <a href="javascript:void(0)" data-link="<?php echo U('doModify');?>?id=<?php echo ($vo["id"]); ?>&cid=<?php echo ($vo["cId"]); ?>" class="btn btn-default" onclick="treat(this,'是否修改栏目?')">修改</a>
        <a href="javascript:void(0)" data-link="<?php echo U('delColumn');?>?id=<?php echo ($vo["id"]); ?>" class="btn btn-default" onclick="treat(this,'是否删除栏目?')">删除</a>
      </td>
    </tr><?php endforeach; endif; ?>
  </table>
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

    <div class="footer div2_top">
      版权所有 © by leo
    </div>
   </body>
  </html>