<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Be程序员——问答社区</title>
<link rel="icon" href="__PUBLIC__/images/ico.png">
<script type="text/javascript" src="__PUBLIC__/js/jquery-2.1.3.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/MDtool.js"></script>
<link rel="stylesheet" href="__PUBLIC__/css/bootstrap.min.css">
<!-- 问答社区的样式 -->
<link rel="stylesheet" href="__PUBLIC__/css/question.css" media="all" />
<script src="__PUBLIC__/js/question.js"></script>

</head>
<body  style="background:#fafafa;">
<header class="adminDing">
	<div class='navbar'>
  <div class='navbar-inner'>
    <div class='container'>
      <a class='brand' href='/'>
          <img src="__PUBLIC__/images/logo.png" width="100" height="30"/>
      </a>

      <form id='search_form' class='navbar-search' action="<?php echo U('search');?>" style="margin-left:10px;">
        <input type='text' id='q' name='q' class='search-query span3' value='' style="height:26px;">
      </form>
      <ul class='nav pull-right'>
        <li><a href='<?php echo U("index");?>'>首页</a></li>
        
        <li><a href="<?php echo U('Blog/index');?>" target="_blank">博客</a></li>
        <li><a href='<?php echo U("question/index");?>'>问答</a></li>
        
        <li><a href="" target="_blank" target="_blank">社区</a></li>
        <li><a href="<?php echo U('Index/index');?>" target="_blank">资讯</a></li>
        <li><a href="/about" target="_blank">编程库</a></li>
        <li><a href="/about" target="_blank">源码</a></li>
        <li><a href="<?php echo U('Index/down');?>" target="_blank">软件</a></li>
         <?php if($idnumber): ?><li>
            <?php if($ll['nicheng']): ?><a href="<?php echo U('personCenter');?>?id=<?php echo ($idnumber); ?>"><?php echo ($ll['nicheng']); ?></a>
            <?php else: ?>
        <a href="<?php echo U('personCenter');?>?id=<?php echo ($idnumber); ?>"><?php echo ($idnumber); ?></a><?php endif; ?>
            </li>
            <li><a href="<?php echo U('Common/logout');?>">退出</a></li>
            <li><a href="<?php echo U('addQuestion');?>?id=<?php echo ($idnumber); ?>">发布问题</a></li>
            <li><a href="<?php echo U('xiaoxi');?>?id=<?php echo ($idnumber); ?>">消息(<span class="color">0</span>)</a></li>
          <?php else: ?>
              <li><a href="<?php echo U('Common/login');?>?l=question">登录</a></li>
              <li><a href="<?php echo U('Common/reg');?>">注册</a></li><?php endif; ?>
        
      </ul>
      <a class="btn btn-navbar" id="responsive-sidebar-trigger">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
    </div>
  </div>
</div>

</header>
<!-- 主体内容区域 -->
<div id='main'>
  <div id='sidebar'>
    <style type="text/css">
  .unstyled li a:hover{
    text-decoration: underline;
  }
</style>
  <div class='panel'>
    <div class='header'>
      <span class='col_fade'>积分排行榜>><a href="<?php echo U('statistic');?>?tab=jifen">前100名</a></span>
    </div>
    <div class='inner'>
      <ul class="unstyled">
    <?php if(is_array($jlist)): $i = 0; $__LIST__ = $jlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><li>
          <div><san style="margin-right:10px;"><?php echo ($vv["jifen"]); ?></san><a class='dark topic_title' href="#" title="<?php echo ($vv["nicheng"]); ?>" style="font-size:12px;">
          <?php echo ($vv["nicheng"]); ?></a>
          </div>
        </li><?php endforeach; endif; else: echo "" ;endif; ?>
      </ul>

    </div>
  </div>
  <div class='panel'>
    <div class='header'>
      <span class='col_fade'>金币排行榜>><a href="<?php echo U('statistic');?>?tab=money">前100名</a></span>
    </div>
    <div class='inner'>
      <ul class="unstyled">
  <?php if(is_array($mlist)): $i = 0; $__LIST__ = $mlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><li>
          <div><san style="margin-right:10px;"><?php echo ($vv["bmoney"]); ?></san><a class='dark topic_title' href="#" title="<?php echo ($vv["nicheng"]); ?>" style="font-size:12px;">
          <?php echo ($vv["nicheng"]); ?></a>
          </div>
        </li><?php endforeach; endif; else: echo "" ;endif; ?>
      </ul>

    </div>
  </div>    
  <div class='panel'>
    <div class='header'>
      <span class='col_fade'>未解决问题</span>
    </div>
    <div class='inner'>
      <ul class="unstyled">
    <?php if(is_array($nlist)): $i = 0; $__LIST__ = $nlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><li>
          <div><a class='dark topic_title' href="<?php echo U('wenti');?>?id=<?php echo ($vv["qid"]); ?>" title="<?php echo ($vv["qtitle"]); ?>" style="font-size:12px;"><?php echo ($vv["qtitle"]); ?></a>
          </div>
        </li><?php endforeach; endif; else: echo "" ;endif; ?>    
      </ul>
      
    </div>
  </div>
  <!-- 公告 -->
 <!--  <div class='panel'>
    <div class='header'>
      <span class='col_fade'>未回答的问题</span>
    </div>
    <div class='inner'>
      <ul class="unstyled">
    <?php if(is_array($alist)): $i = 0; $__LIST__ = $alist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><li>
          <div><a class='dark topic_title' href="<?php echo U('wenti');?>?id=<?php echo ($vv["qid"]); ?>" title="<?php echo ($vv["qtitle"]); ?>" style="font-size:12px;"><?php echo ($vv["qtitle"]); ?></a>
          </div>
        </li><?php endforeach; endif; else: echo "" ;endif; ?>          
      </ul>
      
    </div>
  </div> -->
  <!-- 公告 -->
  <div class='panel'>
    <div class='header'>
      <span class='col_fade'>公告</span>
    </div>
    <div class='inner'>
      <ul class="unstyled">
        <li>
          <div><a class='dark topic_title' href="" title="等级介绍" style="font-size:12px;">等级介绍</a>
          </div>
        </li>
        <li>
          <div><a class='dark topic_title' href="" title="积分介绍" style="font-size:12px;">积分介绍</a>
          </div>
        </li> 
        <li>
          <div><a class='dark topic_title' href="" title="金币介绍" style="font-size:12px;">金币介绍</a>
          </div>
        </li>                    
      </ul>
      
    </div>
  </div>
  </div><!-- slider结束 -->
<!-- 内容列表框 -->
<div id="content">
	

<style type="text/css">
  .color{
    color:#FDC73E;
  }
  #topic_list a{
    color:#333;
  }
</style>
<!-- 主体内容 -->
  <div class="panel">
    <div class="header" id="questionList">
       搜索<a href="<?php echo U('index');?>?tab=all" class="topic-tab"><?php echo ($q); ?></a>的结果
      <!--   <a href="<?php echo U('index');?>?tab=question" class="topic-tab">问答</a>
        <a href="<?php echo U('index');?>?tab=moneyquestion" class="topic-tab">悬赏问答</a>
        <a href="<?php echo U('index');?>?tab=solution"  class="topic-tab">已解决</a>
        <a href="<?php echo U('index');?>?tab=noanswer"  class="topic-tab">未回答</a> -->
    </div>
<!-- 问题列表 -->
    <div class="inner no-padding">
      <div id="topic_list">
<?php if(is_array($queslist)): $i = 0; $__LIST__ = $queslist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><div class='cell'>
    <a class="user_avatar pull-left" href="<?php echo U('wenti');?>?id=<?php echo ($vv["qid"]); ?>">
      <img src="__PUBLIC__/Uploads/head/<?php echo ($vv["headimg"]); ?>"  title="<?php echo ($vv["nicheng"]); ?>" />
    </a>

    <span class="reply_count pull-left">
      <span class="count_of_replies" title="回复数">
        0
      </span>
      <span class="count_seperator">/</span>
      <span class="count_of_visits" title='点击数'>
        <?php echo ($vv["sight"]); ?>
      </span>
    </span>

    <a class='last_time pull-right' href="">
      <span class="last_active_time">
      <?php echo date("Y-m-d H:i:s",$vv['sendTime']);?>
      </span>
    </a>

    <div class="topic_title_wrapper"> 
      <?php if($vv["state"] != 0): ?><span class="put_top"><?php echo ($vv["typename"]); ?></span>
      <?php else: ?>
        <span class="topiclist-tab"><?php echo ($vv["typename"]); ?></span><?php endif; ?>

      <a class='topic_title' href='<?php echo U("wenti");?>?id=<?php echo ($vv["qid"]); ?>' title='<?php echo ($vv["qtitle"]); ?>' style="color:#333;">
        <?php echo ($vv["qtitle"]); ?>
      </a>
    <?php if($vv["xid"] != 1): ?><a class='topic_title' style="text-decoration:none;"><span class="color" style="margin-left:10px;"><?php echo ($vv["xname"]); ?></span></a><?php endif; ?>
    </div>
  </div><?php endforeach; endif; else: echo "" ;endif; ?>

</div>
<div class='pagination' current_page='1'>
<ul>
  <li><?php echo ($show); ?></li>
</ul>

</div>
<script>
 $(document).ready(function () {
    var link = window.location.href;
    var arr= [];
    arr=link.split("?tab=");
    console.log(arr[1]);
    switch(arr[1]){
      case "all":
        $("#questionList a").eq(0).addClass("current-tab");
        break;
      case 'question':
        $("#questionList a").eq(1).addClass("current-tab");
        break;
      case 'moneyquestion':
        $("#questionList a").eq(2).addClass("current-tab");
        break;
      case 'solution':
          $("#questionList a").eq(3).addClass("current-tab");
            break;        
      case 'noanswer':
        $("#questionList a").eq(4).addClass("current-tab");
        break; 
      default:
        $("#questionList a").eq(0).addClass("current-tab");
        break;
    }
  });
 $("#questionList a").each(function(){
    $(this).click(function(){
      window.location.reload();
    })
 })
</script>

    </div>
    
  </div>
</div>

</div><!-- content结束 -->

<div id='backtotop'>回到顶部</div>
</div>

<!-- 底部代码开始 -->
 <div id="footer">
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
<!-- 底部代码结束 -->
</body>
</html>