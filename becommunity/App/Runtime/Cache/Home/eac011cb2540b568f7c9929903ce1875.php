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
    <style type="text/css">
  .unstyled li a:hover{
    text-decoration: underline;
  }
</style>  
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
          <div><a class='dark topic_title' href="#" title="<?php echo ($vv["qtitle"]); ?>" style="font-size:12px;"><?php echo ($vv["qtitle"]); ?></a>
          </div>
        </li><?php endforeach; endif; else: echo "" ;endif; ?>          
      </ul>
      
    </div>
  </div> -->
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
          <li class='active'>发布问题</li>
        </ul>
    </div>
<!-- 问题列表 -->
    <div class="inner no-padding">
      <div id="topic_list" style="padding-left:125px;margin:0 auto;margin-top:20px;padding-bottom:50px;">
    <form action="<?php echo U('doModifyQuestion');?>" method="post" id="myForm">
          <table width="710">
            <tr>
              <td width="70">问题标题:</td>
              <td><input type="text" name="title" placeholder="请输入您的问题" style="height:35px;line-height:35px;margin-top:10px;width:300px;" value="<?php echo ($q["qtitle"]); ?>" autofocus>
            <input type="hidden" value="<?php echo ($q['qid']); ?>" name="ids">
              </td>
            </tr>   
            <tr>
              <td>问题领域:</td>
              <td>
                <select  name="qtype" style="margin-top:10px;">
                <option value="<?php echo ($q["qtype"]); ?>"><?php echo ($q["typename"]); ?></option>
                  <?php if(is_array($qlist)): $i = 0; $__LIST__ = $qlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vv["tid"]); ?>"><?php echo ($vv["typename"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
              </td>
            </tr>
            <!-- <tr>
              <td>悬　　赏:</td>
              <td>
                <select name="bmoney" style="margin-top:10px;" id="money">
                <option value="<?php echo ($q["money"]); ?>"><?php echo ($q["xname"]); ?></option> 
                  <?php if(is_array($olist)): $i = 0; $__LIST__ = $olist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vv["money"]); ?>"><?php echo ($vv["xname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
                <span class="color">您的金币数:<?php echo ($ll["bmoney"]); ?></span>
                <input type="hidden" name="jinbi" value="<?php echo ($ll["bmoney"]); ?>">
              </td>
            </tr> -->
            <tr>
              <td>问题描述:</td>
              <td></td>
            </tr>
            <tr>
              <td colspan="2">
      <textarea id="editor" name="content" style="width:699px;"><?php echo ($q["qcontent"]); ?></textarea>
      <script type="text/javascript">
        var editor = new Simditor({
          textarea: $('#editor')
        });
      </script>
              </td>
            </tr>
<!--             <tr>
              <td colspan="3">
      <span class="color">*一篇问答奖励10经验,50积分,5金币</span>
              </td>
            </tr> -->
            <tr>
              <td colspan="2">
              <center>
                <input type="button" class="btn btn-info" value="发布问题" style="margin-top:30px;" id="sub">
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
  if(confirm("是否要发布该问题?")){
    if($("input[name='title']").val()<1){
      ms.send("问题标题不能为空!");
      return;
    }
    if($("#editor").val()<1){
      ms.send("问题描述标题不能为空!");
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