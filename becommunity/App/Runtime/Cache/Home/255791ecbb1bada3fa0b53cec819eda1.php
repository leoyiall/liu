<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<!-- saved from url=(0019)http://i.baidu.com/ -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Be程序员个人中心——您在Be程序员的家</title>
    <meta name="description" content="Be程序员个人中心是百度用户管理个性化信息的平台，在这里，您可以体验贴吧的交流、知道的解答、百科的全面、空间的个性、云盘的强大……感受百度为您带来的方便、快捷与乐趣。">
    <meta name="keywords" content="个人中心,个人主页,个人帐号,个人空间">

    <link rel="stylesheet" href="__PUBLIC__/styles/main.css">

<script type="text/javascript" src="__PUBLIC__/js/jquery-2.1.3.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/MDtool.js"></script>
<script src="__PUBLIC__/js/question.js"></script>
<link rel="icon" href="__PUBLIC__/images/ico.png">

<style type="text/css">
    .nav-quote ul {
        margin-top:30px;
        margin-left:20px;
    }
    .nav-quote ul li a{
        text-decoration: none;
        color:#333;
    }
    .nav-quote ul li a:hover{
        text-decoration: underline;
    }
    .nav-quote ul li{
        list-style: none;
        float:left;
        padding:0 10px;
    }
    .tianqi_box{
        margin-top:50px;
        margin-left:50px;
    }
    .link_box{
        margin-top:30px;
        margin-left:20px;
    }
    .link_box a{
        text-decoration: none;
        padding:0 15px;
        border-radius: 5px;
        background-color: #448AFF;
        color:#fff;
        height:35px;
        display: block;
        float:left;
        margin:0 15px;
        line-height: 35px;
    }
    .link_box a:hover{
        background-color: #6CC1FC;
    }
    .blogs{
        overflow: hidden;
        *zoom:1;
        /*background-color: #fafafa;*/
    }
    .blogs li{
        width:95%;
        height:38px;
        line-height: 38px;
        padding-left:10px;
        border-bottom: 1px dashed #ccc;
    }
    .blogs li a{
        text-decoration: none;
        color:#337ab7;
    }
    .blogs li a:hover{
        color:#ff4400;
    }
    .time_quote{
        float: right;
        color:#999;
    }
    body{position: relative;}
    #returnTop{
        width:50px;
        height:50px;
        border:1px solid #ccc;
        position: fixed;
        background-color: #fff;
        color:#333;
        line-height: 50px;
        text-align: center;
        right:30px;
        border-radius: 5px;
        bottom:50px;
    }
    #returnTop a{
        display: block;
        width:100%;
        height:100%;
        text-decoration: none;
        color: #333;
    }
    #returnTop a:hover{
        background-color: #1796F9;
        color:#fff;
    }
</style>

</head>
<body class="result-op" style="padding-bottom:40px;">
    <div class="main-wrap">
        <header>
<div id="onTop"></div>
<div class="header-stackup" data-scroll-reveal="enter from the top over 0.66s" data-scroll-reveal-initialized="true" data-scroll-reveal-complete="true">
<div class="ibx-container row clr">
<div class="leftBox" style="float:left;">
    <a href="__ROOT__/index.php"><img src="__PUBLIC__/images/ico.png" height="38" width="38"></a>
    程序员社区 | <span style="color:#FB1D2D;"><b>个人中心</b></span>
</div>
<div class="header-tool header-tool-ps">
    <a href="<?php echo U('common/logout');?>">退出</a>
</div>
    <div class="header-tool header-tool-user">         
        <?php echo ($ll['nicheng']); ?>
    </div>
            
    <div class="header-tool header-tool-ps">
        <a href="__ROOT__/index.php" target="_blank">Be程序员首页</a>
    </div>

    </div>
</div>
    </header>
        <section data-scroll-reveal="enter from the top over 0.66s" class="header-app ibx-container nav-quote">
            <ul>
                <li><a href="__ROOT__/index.php" target="__blank">首页</a></li>
                <li><a href="<?php echo U('Blog/index');?>" target="__blank">博客</a></li>
                <li><a href="<?php echo U('Community/index');?>" target="__blank">社区</a></li>
                <li><a href="<?php echo U('Question/index');?>" target="__blank">问答</a></li>
                <li><a href="<?php echo U('Index/index');?>" target="__blank">资讯</a></li>
                <li><a href="<?php echo U('Programme/index');?>" target="__blank">编程库</a></li>
                <li><a href="<?php echo U('Index/down');?>" target="__blank">软件</a></li>
                <li><a href="<?php echo U('Code/index');?>" target="__blank">源码</a></li>
                <li><a href="<?php echo U('Question/modifyZiliao');?>?id=<?php echo ($ll['user_id']); ?>" target="__blank" style="display:block;border:1px solid #ccc;border-radius:5px;padding:5px;margin-top:-5px;">修改资料</a></li>
                <li><a href="<?php echo U('about/mima');?>?id=<?php echo ($ll['user_id']); ?>" target="__blank" style="display:block;border:1px solid #ccc;border-radius:5px;padding:5px;margin-top:-5px;">修改密码</a></li>
            </ul>
        </section>
 
        <div  class="row card-panel">
                <span class="rule-wrap"><a id="history" name="history" class="rule"></a></span>
                <div class="col span_4_4">
                    <div class="ibx-even">
                        <div class="ibx-inner" id="ibx-mod-history">
                        <div class="ibx-inner-title"><a href="<?php echo U('Person/index');?>?id=<?php echo ($idnumber); ?>" class="ibx-inner-title-ctx">安全中心</a>
                        <ul class="ibx-inner-title-tab"><li  class="ibx-inner-title-tabitem ibx-newhis-list OP_LOG_TITLE current"><a href="<?php echo U('Person/arclist');?>?id=<?php echo ($idnumber); ?>" style="color:#1796F9;text-decoration:none;" target="_blank">修改密码</a></li>
                        </ul>
                        </div>
                    <div class="ibx-inner-content" id="ibx-mod-history-box">
 <form action="<?php echo U('doModifyPass');?>" method="post" class="form-horizontal" enctype="multipart/form-data" id="tForm" style="width:200px;margin:0 auto;margin-top:10px;">
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">旧密码</label>
    <div class="col-sm-5">
<input type="password" class="form-control" id="inputEmail3" placeholder="旧密码" name="oldpass">
  </div>
  </div>
    <div class="form-group">
      <label for="inputPassword3" class="col-sm-2 control-label">新密码</label>
      <div class="col-sm-5">
  <input type="password" class="form-control" id="inputEmail3" placeholder="新密码" name="newpass">
    </div>
    </div>
      <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">确认密码</label>
        <div class="col-sm-5">
    <input type="password" class="form-control" id="inputEmail3" placeholder="确认密码" name="renewpass">
      </div>
      </div>
      <input type="button" class="btn btn-default" value="修改密码" id="sub" style="margin-top:10px;margin-left:50px;">
 </form>


</div>
</div>
<script type="text/javascript">
  var ms=mdtool.messager();
 
    $("#sub").click(function(){
        if($("input[name='oldpass']").val()==''){
            ms.send("旧密码不能为空!");
            return ;
        }
        if($("input[name='newpass']").val()==''){
            ms.send("新密码不能为空!");
            return ;
        }
        if($("input[name='renewpass']").val()==''){
            ms.send("确认密码不能为空!");
            return ;
        }
        if($("input[name='newpass']").val() != $("input[name='renewpass']").val()){
            ms.send("新密码和确认密码不一致!");
            return ;
        }
        $("#tForm").submit();
    });
</script>
                    </div>
            </div>
        </div>
    </div>
</div>

<!-- 一个框结束 -->

<div class="footer" style="color:#333;font-size:12px;">
    <center>
        Copyright © 2015-2016 · All Rights Reserved · Be程序员 · 京ICP备18932151
    </center>
</div>

</div><!-- 最外圈 -->
<!-- 返回顶部 -->
<div id="returnTop">
    <a href="#onTop">Top</a>
</div>     
    <script type="text/javascript">
  function del(obj){
    if(confirm("是否要删除该文章?")){
      var link = obj.getAttribute("link");
      window.location.href=link;
    }
  }
  function modify(obj){
    if(confirm("是否要编辑该文章?")){
      var link = obj.getAttribute("link");
      window.location.href=link;
    }
  }
</script>
</body>
</html>