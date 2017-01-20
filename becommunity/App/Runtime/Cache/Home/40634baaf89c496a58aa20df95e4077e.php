<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Be程序员——社区</title>
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
	<div class='navbar' style="background:#0663C0;border-bottom:1px solid #044E97;">
  <div class='navbar-inner'>
    <div class='container'>
      <a class='brand' href="__ROOT__/index.php">
          <img src="__PUBLIC__/images/logo.png" width="100" height="30"/>
      </a>

<!--       <form id='search_form' class='navbar-search' action="<?php echo U('search');?>" style="margin-left:10px;">
  <input type='text' id='q' name='q' class='search-query span3' value='' style="height:26px;">
</form> -->
      <ul class='nav pull-left'>
        <li><a href='__ROOT__/index.php' style="color:#fff;">首页</a></li>
        
        <li><a href="<?php echo U('Blog/index');?>" style="color:#fff;">博客</a></li>
        <li><a href='<?php echo U("question/index");?>' style="color:#fff;">问答</a></li>
        
        <li><a href="<?php echo U('Community/index');?>" style="color:#fff;">社区</a></li>
        <li><a href="<?php echo U('Index/index');?>"  style="color:#fff;">资讯</a></li>
        <li><a href="<?php echo U('Programme/index');?>" style="color:#fff;">编程库</a></li>
        <li><a href="<?php echo U('Code/index');?>"  style="color:#fff;">源码</a></li>
        <li><a href="<?php echo U('Index/down');?>"  style="color:#fff;">软件</a></li>
         </ul>
         <ul class='nav pull-right'>
            <?php if($idnumber): ?><li>
               <?php if($ll['nicheng']): ?><a href="<?php echo U('personCenter');?>?id=<?php echo ($idnumber); ?>" style="color:#fff;"><?php echo ($ll['nicheng']); ?></a>
               <?php else: ?>
           <a href="<?php echo U('personCenter');?>?id=<?php echo ($idnumber); ?>" style="color:#fff;"><?php echo ($idnumber); ?></a><?php endif; ?>
               </li>
               <li><a href="<?php echo U('addQuestion');?>?id=<?php echo ($idnumber); ?>" style="color:#fff;">发布话题</a></li>
               <li><a href="<?php echo U('Common/logout');?>" style="color:#fff;">退出</a></li>
               <!-- <li><a href="<?php echo U('xiaoxi');?>?id=<?php echo ($idnumber); ?>">消息(<span class="color">0</span>)</a></li> -->
             <?php else: ?>
                 <li><a href="<?php echo U('Common/login');?>?l=community" style="color:#fff;">登录</a></li>
                 <li><a href="<?php echo U('Common/reg');?>" style="color:#fff;">注册</a></li><?php endif; ?>
           
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
       参与社区
    </div>
    <div class='inner'>
        Together to join us:<a href="<?php echo U('addQuestion');?>?id=<?php echo ($idnumber); ?>" class="btn btn-info">发布话题</a>
    </div>
  </div>
 <div class='panel'>
   <div class='header'>
      话题搜索
   </div>
   <div class='inner' style="height:60px;">
      <form id='search_form' class='navbar-search' action="<?php echo U('search');?>" style="margin-left:10px;">
        <input type='text' id='q' name='q' class='search-query span3' value='' style="height:26px;">
      </form>
   </div>
 </div>   
  <div class='panel'>
    <div class='header'>
      <span class='col_fade'>热门文章Top 10</span>
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
  <div class='panel'>
    <div class='header'>
      <span class='col_fade'>社区活动</span>
    </div>
    <div class='inner'>
      <ul class="unstyled">
        <li>
          <div><a class='dark topic_title' href="" title="在线编程大赛" style="font-size:12px;">在线编程大赛</a>
          </div>
        </li>
        <li>
          <div><a class='dark topic_title' href="" title="金币赚翻天" style="font-size:12px;">金币赚翻天</a>
          </div>
        </li> 
        <li>
          <div><a class='dark topic_title' href="" title="猜猜乐" style="font-size:12px;">猜猜乐</a>
          <div><a class='dark topic_title' href="" title="每日抽奖" style="font-size:12px;">每日抽奖</a>
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
<!-- 编辑器的引用 -->
 <link rel="stylesheet" type="text/css" href="__PUBLIC__/simditor/styles/font-awesome.css" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/simditor/styles/simditor.css" />

<script type="text/javascript" src="__PUBLIC__/simditor/scripts/js/jquery.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/simditor/scripts/js/module.js"></script>
<script type="text/javascript" src="__PUBLIC__/simditor/scripts/js/uploader.js"></script>
<script type="text/javascript" src="__PUBLIC__/simditor/scripts/js/simditor.js"></script>
<script type="text/javascript">
  var ms = mdtool.messager();
</script>

<!-- 主体内容 -->
  <div class="panel">
    <div class="header">
        <ul class='breadcrumb'>
          <li><a href='<?php echo U("index");?>'>主页</a>
          <span class='divider'>&nbsp;</span></li>
          <li class='active'>发布话题</li>
        </ul>
    </div>
<!-- 话题列表 -->
    <div class="inner no-padding">
      <div id="topic_list" style="padding-left:125px;margin:0 auto;margin-top:20px;padding-bottom:50px;">
    <form action="<?php echo U('sendQuestion');?>" method="post" id="myForm">
          <table width="710">
            <tr>
              <td width="70">话题标题:</td>
              <td><input type="text" name="title" placeholder="请输入您的话题" style="height:35px;line-height:35px;margin-top:10px;width:300px;" autofocus></td>
            </tr>   
            <tr>
              <td>话题领域:</td>
              <td>
                <select  name="qtype" style="margin-top:10px;">
                  <?php if(is_array($qlist)): $i = 0; $__LIST__ = $qlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vv["tid"]); ?>"><?php echo ($vv["typename"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
              </td>
            </tr>
            <tr>
              <td>话题描述:</td>
              <td></td>
            </tr>
            <tr>
              <td colspan="2">
      <textarea id="editor" name="content" style="width:699px;"></textarea>
      <script type="text/javascript">
        var editor = new Simditor({
          textarea: $('#editor')
        });
      </script>
              </td>
            </tr>
            <tr>
              <td colspan="3">
      <span class="color">*一篇文章奖励10经验,50积分,5金币</span>
              </td>
            </tr>
            <tr>
              <td colspan="2">
              <center>
                <input type="button" class="btn btn-info" value="发布话题" style="margin-top:30px;" id="sub">
              </center>
              </td>
            </tr>
          </table>
    </form>
       </div>
    </div>

    </div>
    
  </div>
</div>
<script type="text/javascript">
$("#sub").click(function(){
  if(confirm("是否要发布该话题?")){
    if($("input[name='title']").val()<1){
      ms.send("话题标题不能为空!");
      return;
    }
    if($("#editor").val()<1){
      ms.send("话题描述标题不能为空!");
      return;
    }
    var money = $("#money option:selected").val();
    if( money > <?php echo ($ll["bmoney"]); ?>){
      ms.send("您的金币不足!");
      return;
    }
    $("#myForm").submit();
  }
});
$("#money").change(function(){
  var money = $("#money option:selected").val();
  if( money > <?php echo ($ll["bmoney"]); ?>){
    alert("您的金币不足!");
  }
});
</script>

</div><!-- content结束 -->

<div id='backtotop'>回到顶部</div>
</div>

<!-- 底部代码开始 -->
 <div id="footer">
 	<!-- <!-- 底部版权 -->
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
</div> -->
 </div>
<!-- 底部代码结束 -->
</body>
</html>