<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta name="baidu-site-verification" content="CyXbt8rKBI" />
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <title> 编程库 - 为程序员量身打造的百科全书 - Be程序员</title>
        <meta name="Keywords" content="编程库,微信开发,机器学习,swift,Android,Python,Java,大数据,云计算,PHP,Ruby,C++,JavaScript">
        <meta name="Description" content="Be程序员知识库，为程序员开发量身打造。为程序员提供一个平台自我去创造，一起参与到其中的学习。结合大家的智慧到一起，共同的学习和进步。创造一个良好的编程环境。">       
 </head>
<!-- 核心 -->
<link rel="stylesheet" href="__PUBLIC__/styles/common.css">
<link rel="stylesheet" href="__PUBLIC__/styles/kn_index.css">
<link rel="icon" href="__PUBLIC__/images/ico.png">
<script type="text/javascript" src="__PUBLIC__/js/jquery-2.1.3.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/MDtool.js"></script>
<link rel="stylesheet" href="__PUBLIC__/styles/kn_knowledge_newindex.min.css">
<!-- <link rel="stylesheet" href="styles/kn_index.min.css"> -->
  <style>

      .addcolor .c13 .banner_div,
      .addcolor .c13 .nav {
          background-color: #437b99 !important;
          border-top: 1px solid #326a88
      }
      .addcolor .c13 .gzdiv a {
          border: 1px solid #326a88
      }

      .addcolor .c13 .gzdiv a b {
          color: #f8beaf
      }
      .addcolor .c13 .gzdiv a:hover i,
      .addcolor .c13 .gzdiv a:hover em,
      .addcolor .c13 .gzdiv a:hover span {
          color: #fff !important;
      }
      .addcolor .c13 .nav .root{
          background-color: #326a88;
          color: #fff !important;
          position: relative;
      }
      .addcolor .c13 .nav a:hover {
          /*-background-color: < %=base.hover% > */
          color: #fff !important;
          position: relative;
      }
      .addcolor .c13 .itabs:hover {
        background-color: #437b99;
        color: #fff;
        border-color: #fff;
      }

      .addcolor .c13 .title_top .title{
          color: #437b99 !important;
      }
      .addcolor .c13 .title:hover,
      .addcolor .c13 .tabtn:hover {
        color: #326a88 !important;
      }
      .addcolor .c13 .tabtn:hover {
        border-color: #326a88;
      }
      .addcolor .c13 .divbottom .title a,
      .addcolor .c13 .kn_title .title,
      .addcolor .c13 .kn_title .title a,
      .addcolor .c13 .divbottom .title {
        color: #437b99 !important;
      }
      .addcolor .c13 .divbottom .title a:hover,
      .addcolor .c13 .kn_title .title:hover,
      .addcolor .c13 .kn_title .title a:hover,
      .addcolor .c13 .divbottom .title:hover {
          color: #326a88 !important;
      }
      .addcolor .c13 .kn_title .root,
      .addcolor .c13 .divbottom .root {
        border-bottom: 2px solid #437b99;
      }
      .addcolor .c13 .number,
      .addcolor .c13 .color {
        color: #437b99 !important;
      }
      .addcolor .c13 .color:hover {
          color: #326a88 !important;
      }
      .addcolor .c13 .backcolor {
          background-color: #437b99 !important;
          color: #fff !important;
      }

      .addcolor .c13 .backgroundcolor {
          background-color: #437b99 !important;
          color: #fff !important;
      }
      .addcolor .c13 .backgroundcolor:hover {
          background-color: #326a88 !important;
          color: #fff !important;
      }
      .topNav{
      	width:100%;
      	height:40px;
      	line-height: 40px;
      	overflow: hidden;
      	*zoom:1;
      	background-color: #F6F6F6;
      }
      .topNav a{
      	font-size: 14px;
      	line-height: 40px;
      }

      .pull_left{
      	float: left;
      }
      .pull_left ul li{
      	padding:0 10px;
      	float: left;
      }
      .pull_right{
      	float: right;
      }
      .center-block{
      	width:1140px;
      	margin:0 auto;
      }
      .learnMore li{
      	width:380px;
      	border:1px solid #ccc;
      	overflow: hidden;
      	*zoom:1;
      	height:125px;
      	float:left;
      	margin-right: 5px;
      	padding:10px;
      }
      .learnMore li a{
      	font-size: 16px;
      	color:#333;
      	font-family: "微软雅黑";
      }
      .learnMore li  a:hover{
      	color:#ff4400;
      }
  </style> 
<style type="text/css">
a:hover{
	text-decoration: none;
}
	.topNav{
		width:100%;
		height:40px;
		line-height: 40px;
		overflow: hidden;
		*zoom:1;
		background-color: #F6F6F6;
	}
	.topNav a{
		font-size: 14px;
		line-height: 40px;
	}

	.pull_left{
		float: left;
	}
	.pull_left ul li{
		padding:0 10px;
		float: left;
	}
	.pull_right{
		float: right;
	}
	.center-block{
		width:1140px;
		margin:0 auto;
	}
	.list01 li:hover{
		box-shadow: 0 0 10px #ccc;
	}
	.footer-intro a{
		color:#fff;
	}
	.footer-intro a:hover{
		color:blue;
	}
</style>

<body>

<!-- 头部 -->
<div class="topNav">
	<div class="container center-block ">
	<div class="pull_left">
		<ul>
			<li><a href=""><img src="__PUBLIC__/images/ico.png" alt="Be程序员" width="38" height="38"></a></li>
			<li><a href="__ROOT__/index.php">首页</a></li>
			<li><a href="<?php echo U('becommunity/index');?>">社区</a></li>
			<li><a href="<?php echo U('blog/index');?>">博客</a></li>
			<li><a href="<?php echo U('question/index');?>">问答</a></li>
			<li><a href="<?php echo U('Index/index');?>">资讯</a></li>
			<li><a href="<?php echo U('Index/down');?>">软件</a></li>
			<li><a href="<?php echo U('code/index');?>">源码</a></li>
			<li><a href="<?php echo U('programme/index');?>">编程库</a></li>
		</ul>
	</div>
	<div class="pull_right">
		<ul>
		<?php if($idnumber): ?><li>
           <?php if($ll['nicheng']): ?><a href="<?php echo U('Community/personCenter');?>?id=<?php echo ($idnumber); ?>" style="color:#333;"><?php echo ($ll['nicheng']); ?></a> | <a href="<?php echo U('Common/logout');?>" style="color:#333;">退出</a>
           <?php else: ?>
       <a href="<?php echo U('Community/personCenter');?>?id=<?php echo ($idnumber); ?>" style="color:#333;"><?php echo ($idnumber); ?></a> | <a href="<?php echo U('Common/logout');?>" style="color:#333;">退出</a><?php endif; ?>
           </li>
         <?php else: ?>
             <li><a href="<?php echo U('Common/login');?>?l=programme" style="color:#333;">登录</a> | <a href="<?php echo U('Common/reg');?>" style="color:#333;">注册</a></li><?php endif; ?>
		</ul>
	</div>
	</div>
</div>
<!-- 主体 -->
<div class="main clearfix" >
<div class="ernav mainindex">
	<div class="mainCol clearfix padding15px">
		<a href="http://lib.csdn.net" class="logo"></a>
		<ul class="navs clearfix">
			<li><a href="<?php echo U('index');?>">首页</a></li>
		<?php if(is_array($nav)): $i = 0; $__LIST__ = $nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('programme');?>?id=<?php echo ($vv["id"]); ?>"><?php echo ($vv["title"]); ?>编程库</a></li><?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>
		<div class="allicons">
			<div id="nav_search_top" class="nav_search">
				<div action="http://lib.csdn.net/search" method="post" class="search" id="search-form">
					<input type="hidden" id="base_name" value="">
					<input type="hidden" id="base_id" value="">
					<label>
						<input type="text" value="" name="keyword" class=" search-inp" autocomplete="off" maxlength="50" placeholder="搜索知识..">
					</label>

					<div class="searchbtn" style="cursor: pointer">
		<i class="fa fa-search">
			<button style="margin-top:-2px;width:50px;height:35px;line-height:35px;cursor:pointer;background:#fff;border:1px solid #ccc;border-radius:5px;">搜索</button>
		</i>
					</div>

				</div>
			</div>
			<!--<a href="" class="tj_btn" target="_blank">推荐知识</a>-->
		</div>
	</div>
</div>
</div>


<style type="text/css">
  #page a{
	padding:3px 10px;
  }
</style>
<!-- 主体内容 -->
			<div class="header_top addcolor">
		<div class="module_div c13">
			<div class="banner_div curindex">
				<div class="mainCol padding15px clearfix">
					<div class="banner_top_img">
					</div>
					<div class="banner_middle" style="cursor:default">
						<div class="banner_log" style="margin-top:80px;">
							<span><img src="__PUBLIC__/Uploads/programme/<?php echo ($p['logo']); ?>" width="80" height="80" alt="" data-bd-imgshare-binded="1"></span><em><?php echo ($p['title']); ?> </em>
						</div>
					</div>
				</div>
			</div>
			<div id="nav" class="nav" style="position: static; opacity: 1; top: 0px; left: 0px; z-index: 4;margin-top:-20px;">
				<div class="mainCol padding15px clearfix">
					
					<div class="navtabs">
						<a href="<?php echo U('programme');?>?id=<?php echo ($p['id']); ?>">主页</a>
						<a href="<?php echo U('learnProgramme');?>?id=<?php echo ($p['id']); ?>&l=<?php echo ($p['sort']); ?>">学习资源</a>
						<a href="<?php echo U('shouluList');?>?id=<?php echo ($p['id']); ?>&l=<?php echo ($p['sort']); ?>" class="root">精彩收录</a>
						<a href="<?php echo U('aboutQuestion');?>?id=<?php echo ($p['id']); ?>&l=<?php echo ($p['sort']); ?>">相关问答</a>
						<a href="<?php echo U('propit');?>?id=<?php echo ($p['id']); ?>&l=<?php echo ($p['sort']); ?>">知识图谱</a>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- 主体结束 -->
	<div class="mainCol padding15px addcolor">
		<div class="kn_left w850px c13">

<!-- 精彩收录 -->
	<div class="kn_column01 clearfix whitebk">
			<div class="kn_column kn_title">
				<span class="title"><i class="fa fa-bookmark"></i>&nbsp;&nbsp;精彩收录</span>
			</div>
			<div class="kn_column_content clearfix">
				<ul class="listul">
					<!-- 一个收录 -->
					<?php if(!$list): ?><li align="center">还没有精彩收录,快来<br>
					<center><a href="<?php echo U('Community/addQuestion');?>" class="layerbtn getstructorimgbtn backgroundcolor" target="_blank">发布精彩收录</a></center></li>
				<?php else: ?>
				<!-- 一个收录 -->
				<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><li class="clearfix">
						<span class="tu">
							<a href="<?php echo U('community/wenti');?>?id=<?php echo ($vv["qid"]); ?>" target="_blank"><img src="__PUBLIC__/Uploads/head/<?php echo ($vv["headimg"]); ?>" width="35" height="35" data-bd-imgshare-binded="1"></a>
						</span>
						<div class="csdn-tracking-statistics" data-mod="popu_229_lib_13">
							<a knid="271" contentid="8610" href="<?php echo U('community/wenti');?>?id=<?php echo ($vv["qid"]); ?>" title="<?php echo ($vv["qtitle"]); ?>" class="title" target="_blank"><?php echo ($vv["qtitle"]); ?></a>
							<span class="ding number">
								<i class="fa fa-eye"></i><?php echo ($vv["sight"]); ?>
							</span>
						</div>
					</li><?php endforeach; endif; else: echo "" ;endif; endif; ?>
					<!-- 一个收录结束 -->
					
				</ul>
				<div class="csdn-pagination hide-set page1" id="page">
				    <span class="page-nav">
					    <?php echo ($show); ?>
				    </span>
				</div>
			</div>
		</div>
</div>

		<div class="blank_10px"></div>

<!-- 这里开始是右边的 -->
<style>
    .bd_weixin_popup {
        height: 260px !important;
    }
    .bd_weixin_popup_foot {
        display: none;
    }
</style>
<script>
	clMenuOn = "type_on";
	eleMenus = $("#tab_title a");
	parentTab = $("#tab_title");
	pageMenus = $("#page a");
</script>
				

		<div class="kn_right w270px c13">
			<style>
	.sr-bdimgshare{
		display:none !important;
	}
</style>
<div class="kn_column01 clearfix whitebk">
	<div class="kn_column_content">
		<div class="divtop csdn-tracking-statistics" data-mod="popu_234">
			<a href="http://lib.csdn.net/base/java/structure" target="_blank">
				<img src="__PUBLIC__/Uploads/programme/<?php echo ($p['bgimg']); ?>" width="231" height="106" alt="" data-bd-imgshare-binded="1">
			</a>
		</div>
		<div class="divbottom">
			<div class="title">
				<a href="<?php echo U('propit');?>?id=<?php echo ($p['id']); ?>" target="_blank"><?php echo ($p['title']); ?> 知识图谱</a>
			</div>
		</div>
	</div>
</div>
			<div class="blank_10px"></div>
			<div class="kn_column01 clearfix whitebk c13 knlayer">
    <div class="kn_column_content addgetstructor">
        <p class="layerptext" style="cursor: default;">一起为编程库增加内容吧!</p>
        <div class="blank_20px"></div>
        <a href="<?php echo U('Community/addQuestion');?>" class="layerbtn getstructorimgbtn backgroundcolor" target="_blank">发布精彩收录</a>
    </div>
</div>
	<div class="blank_10px"></div>
		<div class="kn_column01 clearfix whitebk c13 knlayer">
    <div class="kn_column_content addgetstructor">
        <p class="layerptext" style="cursor: default;">我有相关问题怎么办?快来编程库求救!</p>
        <div class="blank_20px"></div>
        <a href="<?php echo U('Question/addQuestion');?>" class="layerbtn getstructorimgbtn backgroundcolor" target="_blank">发布相关问题</a>
    </div>
</div>
			<div class="blank_10px"></div>
			<div class="kn_column01 clearfix whitebk">
	<div class="kn_column kn_title">
		<span class="title" style="cursor: default;"><i class="fa fa-bookmark"></i>&nbsp;&nbsp;热门知识</span>
	</div>
	<div class="kn_column_content">
		<div class="alltabs csdn-tracking-statistics" data-mod="popu_233_lib_13">
			<?php if(is_array($learn)): $i = 0; $__LIST__ = $learn;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><a target="_blank" href="http://lib.csdn.net/java/knowledge/218" class="tabtn"><?php echo ($vv["course"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
		</div>
	</div>
</div>

</div>
</div>

<div id="footer" style="text-align:center;">
	<!-- 底部版权 -->
<div class="col-log-12 col-md-12 col-sm-12 col-xs-12 footer" style="background-color: #272822;">
	<div class="container">
		<div class="footer-intro text-center">
			<img src="__PUBLIC__/images/logo.png" alt=""><br>
			<a href="">关于我们</a> | 
			<a href="">广告合作</a> | 
			<a href="">免责声明</a> 
		</div>
		<hr/>
		<div class="col-log-12 col-md-12 col-sm-12 col-xs-12 footer-copyright text-center" style="color:#eee;">
			Copyright © 2015-2016 · All Rights Reserved · Be程序员 · 京ICP备18932151
		</div>
	</div>
</div>
</div>

</body>
</html>