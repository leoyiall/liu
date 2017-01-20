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
        <li><a href='__ROOT__/index.php'>首页</a></li>
        
        <li><a href="<?php echo U('Blog/index');?>" target="_blank">博客</a></li>
        <li><a href='<?php echo U("question/index");?>'>问答</a></li>
        
        <li><a href="<?php echo U('Community/index');?>" target="_blank" target="_blank">社区</a></li>
        <li><a href="<?php echo U('Index/index');?>" target="_blank">资讯</a></li>
        <li><a href="<?php echo U('Programme/index');?>" target="_blank">编程库</a></li>
        <li><a href="<?php echo U('Code/index');?>" target="_blank">源码</a></li>
        <li><a href="<?php echo U('Index/down');?>" target="_blank">软件</a></li>
         <?php if($idnumber): ?><li>
            <?php if($ll['nicheng']): ?><a href="<?php echo U('personCenter');?>?id=<?php echo ($idnumber); ?>"><?php echo ($ll['nicheng']); ?></a>
            <?php else: ?>
        <a href="<?php echo U('personCenter');?>?id=<?php echo ($idnumber); ?>"><?php echo ($idnumber); ?></a><?php endif; ?>
            </li>
            <li><a href="<?php echo U('addQuestion');?>?id=<?php echo ($idnumber); ?>">发布问题</a></li>
            <li><a href="<?php echo U('Common/logout');?>">退出</a></li>
            <!-- <li><a href="<?php echo U('xiaoxi');?>?id=<?php echo ($idnumber); ?>">消息(<span class="color">0</span>)</a></li> -->
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
      <div class='panel'>
    <div class='header'>
      <span class='col_fade'>我的信息</span>
    </div>
    <div class='inner'>
      <div class='user_card'>
  <div>
   
    <span class='user_name'>
      <img src="__PUBLIC__/Uploads/head/<?php echo ($qlist['headimg']); ?>" width="50" height="50"  title="<?php echo ($qlist['nicheng']); ?>">
    <?php if($qlist['nicheng'] != ''): echo ($qlist['nicheng']); ?>
      <?php else: ?>
          <?php echo ($qlist['user_id']); endif; ?>
    </span>
    <div class="board clearfix">
      <span class="big">
      等级:LV<?php echo ($qlist['lev']); ?><br>
     
    </div>
    <div class='board clearfix'>
      <div class='floor'>
        <span class='big'>积分: <?php echo ($qlist['jifen']); ?> </span>
        <span class='big'>金币: <?php echo ($qlist['bmoney']); ?> </span>
      </div>
    </div>
    <div class="space clearfix"></div>
    <span class="signature" style="font-family:'微软雅黑';">
      <?php if($qlist['about'] != ''): echo ($qlist['about']); ?>
      <?php else: ?>
          “这家伙很懒，什么个性签名都没有留下。”<?php endif; ?>
    </span>
  
  </div>
</div>

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
          <div><a class='dark topic_title' href="/topic/57e287a43af3942a3aa3b959" title="等级介绍" style="font-size:12px;">等级介绍</a>
          </div>
        </li>  
        <li>
          <div><a class='dark topic_title' href="/topic/57e287a43af3942a3aa3b959" title="积分介绍" style="font-size:12px;">积分介绍</a>
          </div>
        </li>  
       <li>
         <div><a class='dark topic_title' href="/topic/57e287a43af3942a3aa3b959" title="金币介绍" style="font-size:12px;">金币介绍</a>
         </div>
       </li>                
      </ul>
      
    </div>
  </div>
  </div><!-- slider结束 -->
<!-- 内容列表框 -->
<div id="content">
	

<style type="text/css">
  .markdown-text img{
    width:100%;
    height:100%;
  }
</style>
<meta charset="UTF-8">
<!-- 编辑器的引用 -->
 <link rel="stylesheet" type="text/css" href="__PUBLIC__/simditor/styles/font-awesome.css" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/simditor/styles/simditor.css" />

<script type="text/javascript" src="__PUBLIC__/simditor/scripts/js/jquery.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/simditor/scripts/js/module.js"></script>
<script type="text/javascript" src="__PUBLIC__/simditor/scripts/js/uploader.js"></script>
<script type="text/javascript" src="__PUBLIC__/simditor/scripts/js/simditor.js"></script>
<style type="text/css">
  #comment{
    width:100%;
    padding:20px 10px;
  }
.left{
    float:left;
    padding:10px 0;
  }
.right_say{
    width:85%;
    padding:10px;
    font-size:12px;
    float:left;
  }
  #comment li{
    border-bottom: 1px solid #ccc;
    overflow: hidden;
    *zoom:1;
  }
  #comment li a{
    color:#333;
  }
  #comment li a:hover{
    color:#3BB5FF;
  }
  #comment h1{
    text-align: center;
    border-bottom: 1px solid #ccc;
    font-family: "微软雅黑";
    color:#333;
    font-size:16px;
    padding-bottom: 10px;
  }
  .times{
    font-size: 12px;
    color:#666;
    float: right;
    margin-right: 10px;
    margin-top:20px;
  }
  .reAnswer{
    width:100%;
    overflow: hidden;
    *zoom:1;
    color:#666;
    padding:5px;
  }
  .reForm input[type='text']{
    width:80%;
    margin:0 auto;
    height:30px;
    line-height: 30px;
    padding-left: 10px;
    border:1px solid #eee;
    outline: none;
   border-radius: 3px;
  }
  .subOn{
    padding:0 10px;
    outline: none;
    border:1px solid #ccc;
    background-color: #fff;
    height:30px;
    line-height: 30px;
    border-radius: 5px;
    cursor: pointer;
  }
  .reForm .subOn:hover{
    background-color: #fafafa;
  }
  #myForm{
    margin-top:20px;
  }
  #myForm textarea{
    font-size:14px;
    padding-left: 5px;
  }
  #pl{
    width:200px;
  }
  .color{
    font-size:16px;
    font-weight: bold;
    color:#ff4400;
  }
</style>
<!-- 主体内容 -->
  <div class="panel">
<div class='header topic_header'>
<div class="header">
  位置导航: <a href="__ROOT__/index.php">首页</a> >>
  <a href="<?php echo U('Question/index');?>">问答</a> >>
</div>
      <span class="topic_full_title">
        <?php echo ($qlist['qtitle']); ?>
    </if>
      </span>
      <div class="changes">
        <span>
          发布于 <?php echo date("Y-m-d",$qlist['sendTime']); ?>
        </span>
        <span>
          作者 <a href="">
            <?php if($qlist['nicheng']): echo ($qlist['nicheng']); ?>
              <?php else: ?>
              <?php echo ($qlist['user_id']); endif; ?>
          </a>
        </span>
        <span>
          <?php echo ($qlist['sight']); ?> 次浏览
        </span> 
 <!--          <span>
   最后一次编辑是 9 天前
 </span>
 <span> 来自 分享</span> -->
      </div>
    </div>
    <div class='inner topic'>

      <div class='topic_content'>
    <div class="markdown-text">
      <?php echo ($qlist['qcontent']); ?>
    
    <!-- 如果这个问题是我的，那我可以选择关闭 -->
    <?php if($qlist["user_id"] == $idnumber): ?><!-- 0意思是没有解决 -->
      <?php if($qlist["state"] == 0): ?><br>
  <a href="javascript:void(0);"  link="<?php echo U('shutQuestion');?>?id=<?php echo ($qlist['qid']); ?>" onclick="shutQuestion()" id="links" class="btn">关闭该问题</a><?php endif; endif; ?>
    </div>
</div>
</div>
<script>
  $(document).ready(function () {
    var $nav = $('.pagination');
    var current_page = $nav.attr('current_page');
    if (current_page) {
      $nav.find('li').each(function () {
        var $li = $(this);
        var $a = $li.find('a');
        if ($a.html() == current_page) {
          $li.addClass('active');
          $a.removeAttr('href');
        }
      });
    }
  });
</script>

    </div>
    <!-- 同类问题列表 -->
      <div class="panel">
          <div class='header'>
                <span class='col_fade'>回复列表</span>
          </div>
          <div class='inner'>
        <div id="comment">
            <ul class="commentList" style="list-style:none;">
            <?php if(!$com): ?><li style="text-align:center;padding:20px 0;">还没有回答,快登陆帮TA解决吧。</li><?php endif; ?>
        <?php if(is_array($com)): $i = 0; $__LIST__ = $com;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                <div class="quote">
                  <div class="left">
<!--                     <a href="<?php echo U('index');?>?id=<?php echo ($vo["user_id"]); ?>" style="color:#333;"></a> -->
          <img src="__PUBLIC__/Uploads/head/<?php echo ($vo["headimg"]); ?>" width="60" height="60" alt="<?php echo ($vo["user_id"]); ?>">
          <br>
          <center><b><?php echo ($vo["nicheng"]); ?></b></center>
                  </div>
                  <div class="right_say">
          
                    <?php echo ($vo["comment"]); ?>
                  <span class="times">
            <?php if($qlist['caina'] == $vo['user_id']): ?><span class="color">该回复已被采纳为最佳答案</span><?php endif; ?>
    <?php if($qlist['user_id'] == $idnumber && $idnumber!=''): if($qlist['state'] == 0): ?><a href="javascript:void(0);" link="<?php echo U('caina');?>?id=<?php echo ($vo["qid"]); ?>&cid=<?php echo ($qlist['qid']); ?>&uid=<?php echo ($vo["user_id"]); ?>&mid=<?php echo ($qlist['user_id']); ?>&uu=<?php echo ($qlist['money']); ?>" onclick="caina(this)"  class="btn">采纳</a>
        
                      <a href="javascript:void(0);" link="<?php echo U('delComment');?>?id=<?php echo ($vo["qid"]); ?>&cid=<?php echo ($qlist['qid']); ?>" onclick="delMessage(this)" class="btn">删除</a><?php endif; endif; ?>
                     <?php echo ($vo['sendTime']); ?>
                  </span>
                  </div>
                    
                </div>
              </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
              </div>
          </div>
      </div>

<!-- 如果不登录就不显示 -->
    <?php if($idnumber !=''): ?><!-- 0意思是没有解决 -->
      <?php if($qlist["state"] == 0): ?><!-- 回答 -->
    <div class="panel">
        <div class='header'>
              <span class='col_fade'>回答区</span>
        </div>
        <div class='inner'>
      <form action="<?php echo U('sendAnswer');?>" method="post" id="reForm">
            <textarea id="editor" name="content" style="width:699px;"></textarea>
            <input type="hidden" name="user_id" value="<?php echo ($qlist['user_id']); ?>" >
            <input type="hidden" value="<?php echo ($qlist['qid']); ?>" name="ques_id">
            <script type="text/javascript">
              var editor = new Simditor({
                textarea: $('#editor')
              });
            </script>
          <center>
            <input type="submit" value="发表" class="btn" style="margin:20px; 0">
          </center>
      </form>
        </div>
    </div>
  </div><?php endif; endif; ?>

</div>

<script type="text/javascript">
  function shutQuestion(){
    if(confirm("是否关闭该问题?金币将不会退回!")){
      var link = $("#links").attr("link");
      window.location.href = link;
    }
  }
  // 删除对应的回复哦
  function delMessage(obj){
    if(confirm("是否删除该回复")){
      var link = $(obj).attr("link");
      window.location.href = link;
    }
  } 
  // 采纳对应的回复哦
  function caina(obj){
    if(confirm("是否采纳该答案？[不可采纳自己的回复]")){
      var link = $(obj).attr("link");
      window.location.href = link;
    }
  }   
</script>
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