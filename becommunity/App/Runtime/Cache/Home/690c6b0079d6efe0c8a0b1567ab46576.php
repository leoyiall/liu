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

	<script type="text/javascript">
	  var ms=mdtool.messager();
	</script>
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
    <?php if($ll['nicheng'] != ''): echo ($ll['nicheng']); ?>
      <?php else: ?>
          <?php echo ($idnumber); endif; ?>
    </span>
    <div class="board clearfix">
      <span class="big">
      等级:<img src="__PUBLIC__/images/ico/<?php echo ($ll['limg']); ?>" width="30" height="30" alt="LV<?php echo ($ll['lev']); ?>" title="LV<?php echo ($ll['lev']); ?>">LV<?php echo ($ll['lev']); ?> <span class="color" style="margin-left:10px;">[<?php echo ($ll['exp']); ?>/<?php echo ($ll['experience']); ?>]</span> 
      </span><br>
      <span class="big">
        <div class="progress">
          <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo ($ll['exp']); ?>" aria-valuemin="0" aria-valuemax="<?php echo ($ll['experience']); ?>" id="jindu">
            <script type="text/javascript">
              var count = parseInt((<?php echo ($ll['exp']); ?>/<?php echo ($ll['experience']); ?>)*100);
              $("#jindu").css("width",count+"%");
            </script>
          </div>
        </div>
      </span>
    </div>
    <div class='board clearfix'>
      <div class='floor'>
        <span class='big'>积分: <?php echo ($ll['jifen']); ?> </span>
        <span class='big'>金币: <?php echo ($ll['bmoney']); ?> </span>
      </div>
    </div>
    <div class="space clearfix"></div>
    <span class="signature" style="font-family:'微软雅黑';">
      <?php if($ll['about'] != ''): echo ($ll['about']); ?>
      <?php else: ?>
          “这家伙很懒，什么个性签名都没有留下。”<?php endif; ?>
    </span>
    <div style="padding-top:10px;"><a href="<?php echo U('modifyZiliao');?>?id=<?php echo ($idnumber); ?>" class="btn btn-info">修改资料</a></div>
  </div>
</div>

    </div>
  </div>
    
  <div class='panel'>
    <div class='header'>
      <span class='col_fade'>我的未解决问题</span>
    </div>
    <div class='inner'>
      <ul class="unstyled">
    <?php if(is_array($noList)): $i = 0; $__LIST__ = $noList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><li>
          <div><a class='dark topic_title' href="<?php echo U('wenti');?>?id=<?php echo ($vv["qid"]); ?>" title="<?php echo ($vv["qtitle"]); ?>" style="font-size:12px;"><?php echo ($vv["qtitle"]); ?></a>
          </div>
        </li><?php endforeach; endif; else: echo "" ;endif; ?>      
      </ul>
      
    </div>
  </div>
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
	

<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/personCenter.css">
<style type="text/css">
  input{outline: none;border:none;box-shadow: none;}
  input[name='know']{
    width:20px;
    height:20px;
  }
</style>

<!-- 主体内容 -->
  <div class="panel">
    <div class="header">
        <ul class='breadcrumb'>
          <li><a href='<?php echo U("personCenter");?>?id=<?php echo ($idnumber); ?>'>主页</a>
          <span class='divider'>&nbsp;</span></li>
          <li class='active'>我的统计</li>
        </ul>
    </div>
<!-- 问题列表 -->
    <div class="inner no-padding" >
          <div id="countMe" style="margin:20px auto;width: 900px;height:400px;"></div>
          <center><h1>我的提问统计</h1></center>
           <script src="__PUBLIC__/echarts/echarts.min.js"></script>
           <script type="text/javascript">
               // 基于准备好的dom，初始化echarts实例
               var myChart = echarts.init(document.getElementById('countMe'));

              $.get('getQuestions',{id:<?php echo ($idnumber); ?>}).done(function (data) {
                  console.log(data);
                  myChart.setOption({
                      series : [
                          {
                            name: '我的提问统计',
                            type: 'pie',
                            radius: '80%',
                            data:[
                                {value:5, name:'java开发'},
                                {value:4, name:'PHP开发'},
                                {value:1, name:'node.js开发'},
                                {value:2, name:'安卓开发'},
                                {value:1, name:'JavaScript开发'}
                            ]
                          }
                      ]
                  });
                });
                 /* option = {
                      series : [
                          {
                              name: '访问来源',
                              type: 'pie',
                              radius: '100%',
                              data:[
                                  {value:235, name:'视频广告'},
                                  {value:274, name:'联盟广告'},
                                  {value:310, name:'邮件营销'},
                                  {value:335, name:'直接访问'},
                                  {value:400, name:'搜索引擎'}
                              ]
                          }
                      ]
                  };
            // 使用刚指定的配置项和数据显示图表。
            myChart.setOption(option);*/
           </script>
       </div>
    </div>
    
  </div>
</div>

</div><!-- content结束 -->

<div id='backtotop'>回到顶部</div>
</div>

<!-- 底部代码开始 -->
 <div id="footer">
 <br>
<br>
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