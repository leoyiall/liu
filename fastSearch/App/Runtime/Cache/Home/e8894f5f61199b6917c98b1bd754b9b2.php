<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>快搜栏目——快速搜索你想要的</title>
  <link rel="shortcut icon" href="__PUBLIC__/images/so.ico" type="image/x-icon">
  <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/reset.css">
  <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/index.css">
  <!-- 引用bootstrap -->
  <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/bootstrap.min.css">
  <script type="text/javascript" src="__PUBLIC__/js/jquery.min.js"></script>
  <script type="text/javascript" src="__PUBLIC__/js/bootstrap.min.js"></script>
  <script type="text/javascript">
  window.onload=function(){  //进来先加载
      var obtn=document.getElementById("newsbox");
  // 获取有效高度
      var cleiHeight=document.documentElement.clientHeight;
      timer=null;
      var isTop=true;

      // 在滚动过程中执行
      window.onscroll=function(){
        var ostop=document.documentElement.scrollTop || document.body.scrollTop;
        if(ostop>=cleiHeight){
          obtn.style.display="block";
        }else{
          obtn.style.display="none";
        }
        if(!isTop){
          clearInterval(timer);
        }
        isTop=false; //在滚动的时候为假
      }

    obtn.onclick=function(){
      // 定时滚动上去   
      timer=setInterval(function(){
        var ostop=document.documentElement.scrollTop || document.body.scrollTop //获取当前的高度
        var ospeed=Math.floor(- ostop /6);  // 滚动速度
        document.documentElement.scrollTop=document.body.scrollTop=ostop+ospeed;

        isTop=true;//在向上滚动的过程中都是真
        if(ostop == 0){
          clearInterval(timer);
        }
      },30);
    };  

  };
  </script>

  <style type="text/css">
    body{font-size:16px;}
  	.highlight{
  		border:solid 1px #E5E5E5;
  		border-radius: 3px;
  		padding: 0px;
  		line-height: 20px;
  	}
  pre{
      font-size: 18px;
      line-height: 25px;
      color: inherit;
      white-space: pre-wrap;
      font-family: Menlo,Monaco,Consolas,"Andale Mono","lucida console","Courier New",monospace;
  }
  #newsbox{position:fixed;right:30px;bottom:30px;width:40px;height:45px;background-color: #269EE4;cursor:pointer;
  color:#fff;text-align: center;
  }
 #newsbox:hover{background-color:#39ACF1; }
  </style>
 </head>
 <body>
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
          <li class="active"><a href="<?php echo U('index');?>">首页<span class="sr-only">(current)</span></a></li>
          <li><a href="<?php echo U('lists');?>">文章</a></li>
        </ul>
        <form class="navbar-form navbar-left" role="search" style="margin-left:50px;" action="<?php echo U('search');?>" method="post">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="快速搜索您需要的内容" name="so" style="width:300px;">
          </div>
          <button type="submit" class="btn btn-default">快搜</button>
        </form>
        <!-- 右侧 -->
        <ul class="nav navbar-nav navbar-right">

        <?php if($who): ?><a href="__ROOT__/index.php/admin" style="line-height:50px;"><img src="__PUBLIC__/images/333.jpg"  width="30" height="30" style="border-radius:50%;margin-right:5px;border:1px solid #ccc;"><b><?php echo ($who); ?></b></a>
          <?php else: ?>
           <li><a href="<?php echo U('Admin/Login/index');?>">登录</a></li><?php endif; ?>

         </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
	
	<!-- 主体 -->
	<div class="container">
	<div class="inPosition div2_top">
		当前位置：<a href="<?php echo U('index');?>">首页</a> >><a href="<?php echo U('lists');?>">栏目列表</a> >> <a href="<?php echo U('column');?>/id/<?php echo ($cs[id]); ?>"><?php echo ($cs['cName']); ?> >></a>
	</div>
	<!-- 内容页 -->
	<div class="col-lg-12 col-md-12 col-xs-12">
		<h2 class="text-center"><?php echo ($data['title']); ?></h2>
		<hr />	
    <!-- 摘要 -->
    <div class="bg-info" style="padding-top:10px;padding:10px;margin-bottom:10px;text-indent:2em;font-size:16px;">
      <?php echo ($data['summary']); ?>
    </div>
  
		<!-- 这里就是文章内容 -->
    	<?php echo ($data['content']); ?>
	</div>
	</div><!-- container -->
    <div class="bg-danger container">
      <h4>全部的文件<font color="red"><b>笔记</b></font>统一放在<font color="red"><b>E盘/笔记/</b></font>相对应的栏目下</h4>
      <h4>在<font color="red"><b>E盘/笔记/下</b></font>还存放的对应的<font color="red"><b>功能代码</b></font>，用于查找和需要</h4>  
    </div>
	<div class="footer div2_top">
		版权所有 © by leo
	</div>
  <!-- 返回顶部 -->
  <div id="newsbox">
    返回顶部
  </div>
 </body>
</html>