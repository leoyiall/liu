<?php if (!defined('THINK_PATH')) exit();?> 
 
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="title" content="Be程序员——一个置身于打造全民互联网资讯的资讯网。" />
	<meta name="keywords" content="准程序员，编程知识，编程，Javascript,html,css,html5,css3,极客，互联网新闻，编程软件，辅助软件，下载" />
	<meta name="description" content="一个集合多方面发展的一个社区。不只是可以了解到最新的互联网新闻，还可以在这里学习到编程知识和探讨未知的知识。" />
	<title>Be程序员——程序员身边的资讯</title>
	<link rel="icon" href="__PUBLIC__/images/ico.png">
	<script type="text/javascript" src="__PUBLIC__/js/jquery-2.1.3.min.js"></script>
	<script type="text/javascript" src="__PUBLIC__/js/collapse.js"></script>
	<link rel="stylesheet" href="__PUBLIC__/css/bootstrap.css">
	<link rel="stylesheet" href="__PUBLIC__/css/common.css">
  <link rel="stylesheet" href="__PUBLIC__/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="__PUBLIC__/css/head.css">
	<link rel="stylesheet" href="__PUBLIC__/css/news.css">
<!-- 返回顶部滚动效果 -->
	<script type="text/javascript" src="__PUBLIC__/js/returntop.js"></script>
<!-- 滚动效果相关文件 -->
  <script type="text/javascript" src="__PUBLIC__/js/sport.js"></script>
  </head>
  <body>
  	<!-- 头部图片和搜索 -->
  <div class="container top-box">
    <!-- <div class="navbar-header"> -->
  	<div class="row">
  		<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
  			<a href="__ROOT__/index.php" style="float:left;">
  				<img src="__PUBLIC__/images/logo.png" alt="logo">
  			</a>
  			<span class="logo-text" style="line-height:60px;margin-left:10px;">程序员身边的资讯</span>
  		</div>
  		<div class="col-log-5 col-md-5 col-sm-5 col-xs-0 " id="search_box">
  		<form action="<?php echo U('search');?>" method="get">
  			<input type="text" name="soso" class="search_bar" placeholder="搜索">
  			<input type="submit" value="搜索" class="search_btn">
  		</form>
  		</div>
  	</div>
  	<!-- </div> -->
  </div>

  <!-- 导航条部分 -->
  <nav class="navbar-default navbar">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="__ROOT__/index.php">Be程序员</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li><a href="<?php echo U('index');?>">资讯首页 <span class="sr-only">(current)</span></a></li>
          <?php if(is_array($clist)): $i = 0; $__LIST__ = $clist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('lists');?>?id=<?php echo ($vo["id"]); ?>"><?php echo ($vo["category"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
  			<li><a href="<?php echo U('down');?>">软件下载</a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>

<!-- 流程布局内容 -->
<div class="container">
<div class="row">	
<!-- 面包屑导航 -->
	<div class="col-log-12 col-md-12 col-sm-12 col-xs-12">
		<ol class="breadcrumb">
		  <li>当前位置: 
		  <a href="<?php echo U('index');?>">首页</a></li>
		  <li class="active"><?php echo ($list['category']); ?></li>
		</ol>
	</div>
</div>
	<div class="row">	
	<!-- 左侧部分 -->
	<div class="col-log-9 col-md-9 col-sm-12 col-xs-12">
		 <div class="pro_content">
            <h3><?php echo ($list['title']); ?></h3>
            <p class="pro_intro">发布时间：<?php echo ($list['date']); ?> / 分类：<a href="<?php echo U('lists');?>?id=<?php echo ($list['cid']); ?>" style="color:#2776B3"><?php echo ($list['category']); ?></a> / 来源:
            <a href="<?php echo ($list['from']); ?>" target="_blank" style="color:#2776B3"><?php echo ($list['from_title']); ?></a> /作者:<?php echo ($list['author']); ?></p>
            <hr/>
        <div class="pro-all">
            <?php echo ($list['content']); ?>
	    </div>
            <div class="pro_footer">
              <div class="pro_intro" style="float:right;">本文来源：<?php echo ($list['from_title']); ?> &nbsp;&nbsp;责任编辑：<?php echo ($list['author']); ?></div>
                  <!-- 赞一下 -->
              <div class="pro_share text-center">
              
                <a href="javascript:void(0);" class="btn btn-outline-inverse btn-lg btnin" style="border:1px solid #ccc;color:#000;" onclick="ajaxZan(1)"><span id="perfectOne">赞一个(<?php echo ($list['perfect']); ?>)</span></a>
                <a herf="javascript:void(0);" class="btn btn-outline-inverse btn-lg btnin" style="border:1px solid #ccc;color:#000;" onclick="ajaxZan(2)"><span id="lowOne">踩一个(<?php echo ($list['low']); ?>)</span></a>
              </div>              
                  <!-- 分享到 -->
              <div class="pro_share">
                <p class="pro_intro">
                <span>分享到:</span>
                  <span>
<div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_sqq" data-cmd="sqq" title="分享到QQ好友"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_douban" data-cmd="douban" title="分享到豆瓣网"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a></div>
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"32"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
                  </span>
                </p>
             <!-- 版权声明 -->
              <div class="col-log-12 col-md-12 col-sm-12 col-xs-12">
          <img src="__PUBLIC__/images/ewm.png" alt="Be程序员官方微信" >
          <p class="text-center">扫码关注<b>Be程序员</b>微信公众号，<b class="color-notice">第一时刻</b>看到<b class="color-notice">最新</b>的程序员资讯。</p>
              	<h4>版权声明：</h4>
             	<b class="color-notice">部分内容转自其他网站，并且有声明来源，若有侵权请联系我们，我们将第一时间删除，并感到抱歉。</b>
              </div>
              </div>
                  <!-- 上下篇文章 -->
              <div class="pro_share">
                <nav>
                  <ul class="pager">
    <?php if($pre): ?><li><?php echo ($pre[title]); ?><a href="<?php echo U('article');?>?id=<?php echo ($pre['id']); ?>" style="color:#337AB7">上一篇</a></li>
    <?php else: ?>
	    <li>没有上一篇文章了<a  style="color:#337AB7">上一篇</a></li><?php endif; ?>
    <?php if($next): ?><li><a href="<?php echo U('article');?>?id=<?php echo ($next['id']); ?>" style="color:#337AB7">下一篇</a><?php echo ($next[title]); ?></li>
    <?php else: ?>
	    <li><a href="#" style="color:#337AB7">下一篇</a>没有下一篇文章了</li><?php endif; ?>
                  </ul>
                </nav>
              </div>
              <hr>
              <div class="pro_adv">
                  <a href=""><img src="__PUBLIC__/images/1.jpg" alt="adv" class="img-responsive"></a>
              </div>
            </div>
          </div>
            <!-- 评论框 -->
            <div class="pro_pinglun">
             <div class="ds-thread" data-thread-key="www.searchbiji/index/article?id=<?php echo ($list['id']); ?>" data-title="<?php echo ($list['author']); ?>" data-url="www.searchbiji.com/searchbiji/index/article?id=<?php echo ($list['id']); ?>"></div>
				<!-- 多说评论框 end -->
				<!-- 多说公共JS代码 start (一个网页只需插入一次) -->
				<script type="text/javascript">
				var duoshuoQuery = {short_name:"leo2016"};
					(function() {
						var ds = document.createElement('script');
						ds.type = 'text/javascript';ds.async = true;
						ds.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//static.duoshuo.com/embed.js';
						ds.charset = 'UTF-8';
						(document.getElementsByTagName('head')[0] 
						 || document.getElementsByTagName('body')[0]).appendChild(ds);
					})();
					</script>
              <!-- 多说公共JS代码 end -->
            </div>
<!-- 左侧的滚动+热点新闻结束 -->
	</div>	
	
	<!-- 右侧推荐+广告 -->
		<div class="col-log-3 col-md-3 col-sm-3 col-xs-12 right-box">
		<div class="hot-news">
			<h4><span style="padding-bottom:13px;">推荐资讯</span></h4>
		</div>
			<ul class="news-list">
			<?php if(is_array($recommend)): $i = 0; $__LIST__ = $recommend;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
					<span class="number-list">▷</span>
					<a href="<?php echo U('article');?>?id=<?php echo ($vo["id"]); ?>"><?php echo ($vo["title"]); ?></a>
				</li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>	
			<!-- 广告 -->
		<div class="adv-list">
			<a href=""><img src="__PUBLIC__/images/1.jpg" alt="adv" class="img-thumbnail"></a>
			<a href=""><img src="__PUBLIC__/images/1.jpg" alt="adv" class="img-thumbnail"></a>
		</div>
		
		<!-- 关注我们 -->
		<div class="about-us">
			<h3>关注我们</h3>
			<div class="about-quote">
			<center>
			<img src="__PUBLIC__/images/ewm.png" alt="adv" class="img-responsive">
			</center>
			<h4>官方微信:<b>bechengxuyuan</b></h4>
				<ul>
					<li>
						<a href="">
							<img src="__PUBLIC__/images/wx.png" alt="微信订阅"><br>
							<span>微信订阅</span>
						</a>
					</li>
					<li>
						<a href="">
							<img src="__PUBLIC__/images/wb.png" alt="微博订阅"><br>
							<span>微博订阅</span>
						</a>
					</li>
					<li>
						<a href="">
							<img src="__PUBLIC__/images/yx.png" alt="邮箱订阅"><br>
							<span>邮箱订阅</span>
						</a>
					</li>
					<li>
						<a href="">
							<img src="__PUBLIC__/images/rss.png" alt="RSS订阅"><br>
							<span>RSS订阅</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
		</div>
	</div>

</div><!-- container结束 -->

<script type="text/javascript">
function ajaxZan(num){
	var id = "<?php echo ($list['id']); ?>";
	$.ajax({
		url:"<?php echo U('ajaxZan');?>",
		dataType:"json",
		type:"post",
		data:{
			'id':id,
			'num':num
		},
		success:function(e){
			if(num == 1){
			$("#perfectOne").html("赞一个("+e+")");
			}else if(num ==2){
			$("#lowOne").html("踩一个("+e+")");
			}
		}
	});
}

</script>

<!-- 底部 -->
	<!-- 友情链接 -->
	<div class="col-log-12 col-md-12 col-sm-12 col-xs-12 friend_link down_box">
		<div class="friend_title"><h3>——友情链接——</h3></div>
		<ul>
		<?php if(is_array($flist)): $i = 0; $__LIST__ = $flist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo["link"]); ?>" target="_blank"><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>
	</div>
</div><!-- container结束 -->
<!-- 底部版权 -->
<div class="col-log-12 col-md-12 col-sm-12 col-xs-12 footer">
	<div class="container">
		<div class="footer-intro text-center">
			<img src="__PUBLIC__/images/logo.png" alt=""><br>
			<a href="">关于我们</a> | 
			<a href="">广告合作</a> | 
			<a href="">免责声明</a> 
		</div>
		<hr />
		<div class="col-log-12 col-md-12 col-sm-12 col-xs-12 footer-copyright text-center">
			Copyright © 2015-2016 · All Rights Reserved · Be程序员 · 京ICP备18932151
		</div>
	</div>
</div>
<!-- 返回顶部 -->
<div class="returnTop" id="topbtn">
	Top
</div>