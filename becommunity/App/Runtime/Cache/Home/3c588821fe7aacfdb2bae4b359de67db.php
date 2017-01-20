<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<meta http-equiv="X-UA-Compatible" content="IE=11,IE=10,IE=9,IE=8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
<meta http-equiv="Cache-Control" content="no-siteapp">
<title>Be程序员社区——为准程序员而建造的交流社区</title>
		<script type="text/javascript">
			window._wpemojiSettings = {"baseUrl":"http:\/\/s.w.org\/images\/core\/emoji\/72x72\/","ext":".png","source":{"concatemoji":"http:\/\/localhost\/wp\/wp-includes\/js\/wp-emoji-release.min.js?ver=4.3.6"}};
			!function(a,b,c){function d(a){var c=b.createElement("canvas"),d=c.getContext&&c.getContext("2d");return d&&d.fillText?(d.textBaseline="top",d.font="600 32px Arial","flag"===a?(d.fillText(String.fromCharCode(55356,56812,55356,56807),0,0),c.toDataURL().length>3e3):(d.fillText(String.fromCharCode(55357,56835),0,0),0!==d.getImageData(16,16,1,1).data[0])):!1}function e(a){var c=b.createElement("script");c.src=a,c.type="text/javascript",b.getElementsByTagName("head")[0].appendChild(c)}var f,g;c.supports={simple:d("simple"),flag:d("flag")},c.DOMReady=!1,c.readyCallback=function(){c.DOMReady=!0},c.supports.simple&&c.supports.flag||(g=function(){c.readyCallback()},b.addEventListener?(b.addEventListener("DOMContentLoaded",g,!1),a.addEventListener("load",g,!1)):(a.attachEvent("onload",g),b.attachEvent("onreadystatechange",function(){"complete"===b.readyState&&c.readyCallback()})),f=c.source||{},f.concatemoji?e(f.concatemoji):f.wpemoji&&f.twemoji&&(e(f.twemoji),e(f.wpemoji)))}(window,document,window._wpemojiSettings);
</script>
<script src="__PUBLIC__/styles/wp-emoji-release.min.js" type="text/javascript"></script>
<style type="text/css">
img.wp-smiley,
img.emoji {
	display: inline !important;
	border: none !important;
	box-shadow: none !important;
	height: 1em !important;
	width: 1em !important;
	margin: 0 .07em !important;
	vertical-align: -0.1em !important;
	background: none !important;
	padding: 0 !important;
}
.quote_li{
	display: inline-block;
	width:20px;
	height:20px;
	text-align: center;
	background-color: #fa374c;
	margin-right: 5px;
	color:#fff;
}
.more_box{
	width:100%;
	text-align: center;
	padding:30px 0;
}
.more_box a{
	display: inline-block;
	padding:5px;
	border:1px solid #ccc;
	border-radius: 3px;
	background-color: #f1f1f1;
}
.more_box .current{
	color:#fff;
	display: inline-block;
	padding:5px;
	border:1px solid #ccc;
	border-radius: 3px;
	background-color: #DD6764;
}
.more_box a:hover{
	color:#fff;
	background-color: #DD6764;
}
body{
	display: relative;
}
.rollto{
	position: fixed;
	right:10px;
	bottom: 30px;
	border:1px solid #ccc;
	border-radius: 5px;
	color:#333;
	background-color: rgba(200,200,200,0.5);
	text-align: center;
	line-height: 30px;
}
.rollto a{
	color:#fff;
	display:inline-block;
	width:100%;
	height:100%;
}
</style>
<link rel="stylesheet" id="main-css" href="__PUBLIC__/styles/style.css" type="text/css" media="all">
<script type="text/javascript" src="__PUBLIC__/styles/jquery.js"></script>
<script src="__PUBLIC__/styles/share.js"></script><link href="__PUBLIC__/styles/share.css" rel="styleSheet" type="text/css"></head>

<body class="home blog logged-in search_not ui-c3">
<div id="Top"></div>
<!-- 左边固定的 -->
<section class="container">
<header class="header">
	<h1 class="logo"><a href="__ROOT__/index.php" title="Be程序员社区">Be程序员社区</a></h1>	
	<ul class="nav">
	<li class="page_item page-item-2"><a href="__ROOT__/index.php" style="color:#444;background-color:#fff;">首页</a></li>
	<li><a href="<?php echo U('Blog/index');?>">博客</a></li>
	<li><a href="<?php echo U('Community/index');?>">社区</a></li>
	<li><a href="<?php echo U('Question/index');?>">问答</a></li>
	<li><a href="<?php echo U('Index/index');?>">资讯</a></li>
	<li><a href="<?php echo U('Programme/index');?>">编程库</a></li>
	<li><a href="<?php echo U('Code/index');?>">源码</a></li>
	<li><a href="<?php echo U('Index/down');?>">软件</a></li>
</ul>			
<div class="feeds">
	<a class="feed feed-rss" rel="external nofollow" href="" target="_blank"><i></i>RSS订阅</a>
</div>
<div>
	<form action="<?php echo U('Index/search');?>">
		<input type="text" name="soso" style="width:140px;float:left;margin-left:5px;margin-right:0px;border:1px solid #ccc;outline:none;height:27px;" placeholder="请输入搜索关键字">
		<input type="submit" value="搜索" style="background-color:#FE6054;color:#fff;outline:none;height:27px;outline:none;border:none;">	
	</form>
</div><br>
	<div style="text-align:center;">
				 <?php if($idnumber): if($ll['nicheng']): ?><a href="<?php echo U('About/index');?>?id=<?php echo ($ll['idnumber']); ?>"><?php echo ($ll['nicheng']); ?></a> |
				    <?php else: ?>
				<a href="<?php echo U('About/index');?>?id=<?php echo ($idnumber); ?>"><?php echo ($idnumber); ?></a> |<?php endif; ?>
				    <a href="<?php echo U('Common/logout');?>">退出</a>
				  <?php else: ?>
<a href="<?php echo U('Common/Login');?>?l=index" title="登录">登录</a> | <a href="<?php echo U('Common/Reg');?>" title="注册">注册</a><?php endif; ?>
			

	</div>

	</header>

<!-- 左边固定结束 -->

<!-- 右侧开始 -->
<div class="content-wrap">
	<div class="content">
		<div class="focusmo">
			<ul id="headUl">
		<?php if(is_array($headNews)): $i = 0; $__LIST__ = $headNews;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Index/article');?>?id=<?php echo ($vv["id"]); ?>"><span><img data-original="<?php echo U('Index/article');?>?id=<?php echo ($vv["id"]); ?>" class="thumb" src="<?php echo ($vv["arcimg"]); ?>" style="display: inline;"></span><h4><?php echo ($vv["title"]); ?></h4></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
<script type="text/javascript">
	$("#headUl li:eq(0)").addClass("large");
</script>				
			</ul>
				</div>
	<!-- 下面部分 -->
<div class="most-comment-posts">
		<!-- 热门部分 -->
 <h3 class="title"><strong>一周热门排行</strong></h3>
  <ul>
  	<?php $__FOR_START_15688__=1;$__FOR_END_15688__=count($hotNews);for($i=$__FOR_START_15688__;$i < $__FOR_END_15688__;$i+=1){ if(is_array($hotNews)): $i = 0; $__LIST__ = $hotNews;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><li><p class="text-muted"><span class="post-comments">浏览 (<?php echo ($vv["sight"]); ?>)</span>  赞 (<span><?php echo ($vv["perfect"]); ?></span>)</a></p><span class="label label-1"><?php echo ($i); ?></span><a href="<?php echo U('Index/article');?>?id=<?php echo ($vv["id"]); ?>" title="<?php echo ($vv["title"]); ?>"><?php echo ($vv["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; } ?>
   </ul>
        </div>
<!-- 热门推荐部分 -->
 <div class="sticky">
 	<h3 class="title"><strong>热门推荐</strong></h3>
 <ul>
 <?php if(is_array($tjNews)): $i = 0; $__LIST__ = $tjNews;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><li class="item"><a href="<?php echo U('Index/article');?>?id=<?php echo ($vv["id"]); ?>"><span><img data-original="" class="thumb" src="<?php echo ($vv["arcimg"]); ?>" style="display: block;"></span><?php echo ($vv["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
 </ul>
</div>		
 	<!-- 最新发布 -->
 <h3 class="title"><strong>最新发布</strong></h3>
 
 <?php if(is_array($ptNews)): $i = 0; $__LIST__ = $ptNews;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><article class="excerpt">
	<header><a class="cat label label-important" href="<?php echo U('Index/lists');?>?id=<?php echo ($vv["cid"]); ?>" data-original-title="" title="<?php echo ($vv["category"]); ?>"><?php echo ($vv["category"]); ?><i class="label-arrow"></i></a> <h2><a href="<?php echo U('Index/article');?>?id=<?php echo ($vv["id"]); ?>" title="<?php echo ($vv["title"]); ?>"><?php echo ($vv["title"]); ?></a></h2></header>
<p class="text-muted time"><?php echo ($vv["author"]); ?> 发布于 <?php echo ($vv["date"]); ?></p><p class="note"><?php echo ($vv["summary"]); ?></p>
<p class="text-muted views"><span class="post-views">阅读(<?php echo ($vv["sight"]); ?>)</span>赞 <span>(<?php echo ($vv["perfect"]); ?>)</span></p>

</article><?php endforeach; endif; else: echo "" ;endif; ?>
		<div class="more_box" >
			<?php echo ($show); ?>
		</div>
	</div>
</div>
<!-- 右边的栏目部分 -->
<aside class="sidebar">	

<div class="widget widget_recent_entries affix-top" style="top: 0px;">	
	<!-- 社区话题挑选 -->
<h3 class="title"><strong>精选文章</strong></h3>
		<ul>
	<?php $__FOR_START_14305__=1;$__FOR_END_14305__=count($nlist);for($i=$__FOR_START_14305__;$i < $__FOR_END_14305__;$i+=1){ if(is_array($nlist)): $i = 0; $__LIST__ = $nlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><li>
          <div><span class="quote_li"><?php echo ($i); ?></span><a class='dark topic_title' href="<?php echo U('Community/wenti');?>?id=<?php echo ($vv["qid"]); ?>" title="<?php echo ($vv["qtitle"]); ?>" style="font-size:12px;"><?php echo ($vv["qtitle"]); ?></a>
          </div>
        </li><?php endforeach; endif; else: echo "" ;endif; } ?>  
		</ul>
	</div>

<div class="widget widget_recent_entries affix-top" style="top: 0px;">	
	<!-- 博客挑选10个 -->
<h3 class="title"><strong>精选博文</strong></h3>
		<ul>
	<?php $__FOR_START_2310__=1;$__FOR_END_2310__=count($blist);for($i=$__FOR_START_2310__;$i < $__FOR_END_2310__;$i+=1){ if(is_array($blist)): $i = 0; $__LIST__ = $blist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><li>
          <div><span class="quote_li"><?php echo ($i); ?></span><a class='dark topic_title' href="<?php echo U('person/article');?>?id=<?php echo ($vv["user_id"]); ?>&lid=<?php echo ($vv["lid"]); ?>" title="<?php echo ($vv["qtitle"]); ?>" style="font-size:12px;"><?php echo ($vv["title"]); ?></a>
          </div>
        </li><?php endforeach; endif; else: echo "" ;endif; } ?>  
		</ul>
	</div>

<!-- 编程库列表 -->
	<div class="widget widget_archive" style="top: 0px;">
<h3 class="title"><strong>编程库</strong></h3>		
	<ul>
		<?php if(is_array($klist)): $i = 0; $__LIST__ = $klist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><li>
          <div><a href="<?php echo U('Programme/programme');?>?id=<?php echo ($vv["id"]); ?>" target="_blank">
            <img src="__PUBLIC__/Uploads/programme/<?php echo ($vv["logo"]); ?>" width="20" height="20" alt="<?php echo ($vv['title']); ?>"> 
            <?php echo ($vv['title']); ?></a>
          </div>
        </li><?php endforeach; endif; else: echo "" ;endif; ?> 
	</ul>
</div>
<div class="widget widget_recent_entries affix-top" style="top: 0px;">	
	<!-- 10个问题 -->
<h3 class="title"><strong>编程问答</strong></h3>
		<ul>
	<?php $__FOR_START_23495__=1;$__FOR_END_23495__=count($wlist);for($i=$__FOR_START_23495__;$i < $__FOR_END_23495__;$i+=1){ if(is_array($wlist)): $i = 0; $__LIST__ = $wlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><li>
          <div><span class="quote_li"><?php echo ($i); ?></span><a class='dark topic_title' href="<?php echo U('Question/wenti');?>?id=<?php echo ($vv["qid"]); ?>" title="<?php echo ($vv["qtitle"]); ?>" style="font-size:12px;"><?php echo ($vv["qtitle"]); ?></a>
          </div>
        </li><?php endforeach; endif; else: echo "" ;endif; } ?>  
		</ul>
	</div>
<div class="widget widget_categories"><h3 class="title"><strong>资讯分类</strong></h3>		
	<ul>
		<li class="cat-item cat-item-1"><a href="<?php echo U('Index/lists');?>?id=4">互联网新闻</a></li>
		<li class="cat-item cat-item-1"><a href="<?php echo U('Index/lists');?>?id=7">极客头条</a></li>
		<li class="cat-item cat-item-1"><a href="<?php echo U('Index/lists');?>?id=6">编程新闻</a></li>
		<li class="cat-item cat-item-1"><a href="<?php echo U('Index/lists');?>?id=10">软件教程</a></li>
		<li class="cat-item cat-item-1"><a href="<?php echo U('Index/lists');?>?id=11">软件安装</a></li>
	</ul>
</div>
<div class="widget widget_recent_entries affix-top" style="top: 0px;">	
	<!-- 10个软件下载 -->
<h3 class="title"><strong>推荐软件</strong></h3>
		<ul>
	<?php $__FOR_START_26100__=1;$__FOR_END_26100__=count($rlist);for($i=$__FOR_START_26100__;$i < $__FOR_END_26100__;$i+=1){ if(is_array($rlist)): $i = 0; $__LIST__ = $rlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><li>
          <div><span class="quote_li"><?php echo ($i); ?></span><a class='dark topic_title' href="<?php echo U('Index/downpage');?>?id=<?php echo ($vv["id"]); ?>" title="<?php echo ($vv["qtitle"]); ?>" style="font-size:12px;"><?php echo ($vv["title"]); ?></a>
          </div>
        </li><?php endforeach; endif; else: echo "" ;endif; } ?>  
		</ul>
	</div>
<div class="widget widget_recent_entries affix-top" style="top: 0px;">	
	<!-- 10个编程 -->
<h3 class="title"><strong>源码下载</strong></h3>
		<ul>
	<?php $__FOR_START_28957__=1;$__FOR_END_28957__=count($clist);for($i=$__FOR_START_28957__;$i < $__FOR_END_28957__;$i+=1){ if(is_array($clist)): $i = 0; $__LIST__ = $clist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><li>
          <div><span class="quote_li"><?php echo ($i); ?></span><a class='dark topic_title' href="<?php echo U('code/downpage');?>?id=<?php echo ($vv["id"]); ?>" title="<?php echo ($vv["title"]); ?>" style="font-size:12px;"><?php echo ($vv["title"]); ?></a>
          </div>
        </li><?php endforeach; endif; else: echo "" ;endif; } ?>  
		</ul>
	</div>
<div class="widget widget_meta">
<h3 class="title"><strong>网站服务</strong></h3>			<ul>
	<li><a href="<?php echo U('Index/down');?>">软件下载</a></li>			
	<li><a href="<?php echo U('code/index');?>">源码下载</a></li>
	<li><a href="<?php echo U('programme/index');?>">编程库教学</a></li>
	<li><a href="<?php echo U('question/index');?>">编程提问</a></li>
	<li><a href="<?php echo U('community/index');?>">内容共享</a></li>			
</ul>
</div>
</aside>

<footer class="footer">
     Copyright © 2015-2016 · All Rights Reserved · Be程序员 · 京ICP备18932151
</footer>

</section>

<script>
window.jui = {
	uri: 'http://localhost/wp/wp-content/themes/twentyten',
	roll: '1 2',
	ajaxpager: '0'
}
</script>
<script type="text/javascript" src="__PUBLIC__/styles/bootstrap.js"></script>
<script type="text/javascript" src="__PUBLIC__/styles/custom.js"></script>
<!-- 滚动 -->
<div class="rolltoss"><a href="javascript:void(0);" style="color:#fff;"></a></div>

</body></html>