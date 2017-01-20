<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo ($ilist['blogTitle']); ?>--Be程序员博客</title>
<meta name="keywords" content="Be程序员博客" />
<meta name="description" content="Be程序员博客" />
<link href="__PUBLIC__/1/css/styles.css" rel="stylesheet">
<link rel="shortcut icon" href="__PUBLIC__/images/ico.png" type="image/x-icon" />
<!-- 文本编辑器 -->
<link rel="stylesheet" type="text/css" href="__PUBLIC__/simditor/styles/font-awesome.css" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/simditor/styles/simditor.css" />

<script type="text/javascript" src="__PUBLIC__/simditor/scripts/js/jquery.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/simditor/scripts/js/module.js"></script>
<script type="text/javascript" src="__PUBLIC__/simditor/scripts/js/uploader.js"></script>
<script type="text/javascript" src="__PUBLIC__/simditor/scripts/js/simditor.js"></script>

<!--[if lt IE 9]>
<script src="js/modernizr.js"></script>
<![endif]-->
<style type="text/css">
  #blogo{
    float:left;line-height:45px;margin-left:5px;font-size:22px;font-family:'幼圆';color:#ff4400;
  }
  #b-link{
    float:left;
  }
  #b-link li{float:left;}
  #right-box{float:right;}
  #right-box li{float:left;}
  .color{color:#ff4400;font-weight: bold;}
  .blogitem table{
    padding-top:30px;
    margin-left:10px;
    text-align: left;
    font-size:14px;
  }
  .blogitem table tr{
    height:40px;
  }
.modifyAbout{
  padding-left:10px;
  padding-right:10px;
  height:35px;
  line-height: 35px;
  border-radius: 5px;
  background-color: #fff;
  display: inline-block;
  color:#333;
  border:1px solid #ccc;
  margin-top: 25px;
  margin-bottom: 25px;
  margin-left:310px;
}
.modifyAbout:hover{
  background-color: #fafafa;
  color:#333;
}
.input_style{
	width:200px;
	height:25px;
	line-height: 25px;
	outline: none;
	border:1px solid #ccc;
	padding-left:2px;
}
.content{
  padding:0 10px;
}
</style>
</head>
<body>
<!-- 头部 -->
<!-- 这里是头部 -->
<header>
  <nav id="nav">
    <div style="float:left;">
      <a href="" style="float:left;"><img src="__PUBLIC__/images/blogo.png"></a>
      <h1 id="blogo">博客</h1>
      <ul id="b-link">
        <li><a href="/">Be程序员首页</a></li>
        <li><a href="/">博客首页</a></li>
        <li><a href=""></a></li>
      </ul>
    </div>
    <div id="right-box">
    <?php if($idnumber): ?><ul>
      <li>
      <?php if($list['nicheng']): ?><a href="<?php echo U('index');?>/id/<?php echo ($list['idnumber']); ?>"><?php echo ($list['nicheng']); ?></a>
      <?php else: ?>
  <a href="<?php echo U('index');?>/id/<?php echo ($idnumber); ?>"><?php echo ($idnumber); ?></a><?php endif; ?>
      </li>
      <li><a href="<?php echo U('Common/logout');?>">退出</a></li>
      <li><a href="<?php echo U('addarc');?>/id/<?php echo ($idnumber); ?>">发布博文</a></li>
      <li><a href="">消息(<span class="color">10</span>)</a></li>
      <li><a href="<?php echo U('base');?>/id/<?php echo ($idnumber); ?>">修改博客</a></li>
      <li><a href=""></a></li>
    </ul>
    <?php else: ?>
      <ul>
        <li><a href="<?php echo U('Common/login');?>?l=blog">登录</a></li>
        <li><a href="<?php echo U('Common/reg');?>">注册</a></li>
      </ul><?php endif; ?>
    </div>
  </nav>
</header>
<div class="mainContent">
  <div class="ulist">
      <ul>
        <h2 style="font-weight:normal;font-family='微软雅黑'"><a href="#">
      <?php if(!$ilist['blogTitle']): ?>Be程序员博客</a>
      <?php else: ?>
        <?php echo ($ilist['blogTitle']); ?></a><?php endif; ?>
      </h2>
        <p><?php echo ($ilist['blogIntroduce']); ?></p>
      </ul>
  </div>
</div>
<div class="mainContent2">
  <header>
    <nav id="nav">
      <ul>
        <li><a href="<?php echo U('index');?>?id=<?php echo ($id); ?>" target="_self">博客首页</a></li>
        <li><a href="<?php echo U('arclist');?>?id=<?php echo ($id); ?>" target="_self">博文</a></li>
        <li><a href="<?php echo U('message');?>?id=<?php echo ($id); ?>"  target="_self">留言板</a></li>
        <li><a href="<?php echo U('friend');?>?id=<?php echo ($id); ?>"  target="_self">我的博友</a></li>
        <li><a href="<?php echo U('about');?>?id=<?php echo ($id); ?>" target="_self">关于我</a></li>
      </ul>
      <script src="__PUBLIC__/1/js/silder.js"></script><!--获取当前页导航 高亮显示标题--> 
    </nav>
  </header>
</div>
<!-- 头部结束 -->
<div class="mainContent2">
        <aside>
      <div class="avatar">
      <?php if($ilist['arcimg']): ?><img src="__PUBLIC__/Uploads/<?php echo ($ilist['arcimg']); ?>" width="160" height="160"><?php endif; ?>
        <a href="<?php echo U('about');?>/id/<?php echo ($id); ?>"><span><?php echo ($li['nicheng']); ?></span></a>
      </div>
      <section class="topspaceinfo">
      <!-- 昵称 -->
        <h1>
          <?php if($li['nicheng']): echo ($li['nicheng']); ?>
          <?php else: ?>
            <?php echo ($id); endif; ?>
        </h1>
        <p><?php echo ($li['introduce']); ?></p>
      </section>
      <div class="userinfo"> 
        <p class="q-fans"> 粉丝：<a href="<?php echo U('friend');?>?id=<?php echo ($id); ?>" target="_blank">
      <?php if($fans): echo ($fans); ?>
      <?php else: ?>0<?php endif; ?>
        </a></p> 
      <?php if($care['tofans'] == 1): ?><p class="btns"><a href="<?php echo U('privateMessage');?>?id=<?php echo ($id); ?>" target="_blank" >私信</a><span id="careHim">已关注</p>
      <?php else: ?>
        <?php if($idnumber != $id): ?><p class="btns"><a href="<?php echo U('privateMessage');?>?id=<?php echo ($id); ?>" target="_blank" >私信</a><span  id="careHim"><a href="JavaScript:void(0);" onclick="carehim()" >关注</a></span></p><?php endif; endif; ?>
      </div> 
      <section class="taglist">
         <h2>全部分类</h2>
         <ul>
           <?php if(is_array($cate)): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('arclist');?>/id/<?php echo ($id); ?>/cid/<?php echo ($vv["caid"]); ?>"><?php echo ($vv["category"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
      </section>
    </aside>
    <div class="blogitem">
    <h2 style="padding-left:20px;margin-top:20px;border-bottom:1px solid #ccc;">发布博文</h2>
   <form action="<?php echo U('saveBlog');?>" method="post">
      <table>
      <tr>
        <th>博文标题:</th>
        <td>
          <input type="text" name="title" autofocus class="input_style">
        	<input type="hidden" name="user_id" value="<?php echo ($id); ?>" class="input_style">
        </td>
      </tr>
      <tr>
        <th>文章分类:</th>
        <td>
          <select name="cate_id">
       <?php if(is_array($cate)): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vv["caid"]); ?>"><?php echo ($vv["category"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
          </select>
        </td>
      </tr>      
        <tr>
          <th colspan="2">博文:</th>
        </tr>
        </table>
        <div class="content">
          <textarea id="editor" name="content" placeholder="这里输入内容"></textarea>
          <input type="submit" class="modifyAbout" value="发布博文" style="cursor:pointer;">
        </div> 
    </form>
    </div>  
  </div>
<!-- 底部 -->
<footer>
  <!-- <section class="visitor">
    <h2>最近访客</h2>
     <ul>
       <li><a href="/"><img src="__PUBLIC__/1/images/s0.jpg"></a></li>
       <li><a href="/"><img src="__PUBLIC__/1/images/s1.jpg"></a></li>
       <li><a href="/"><img src="__PUBLIC__/1/images/s2.jpg"></a></li>
       <li><a href="/"><img src="__PUBLIC__/1/images/s3.jpg"></a></li>
       <li><a href="/"><img src="__PUBLIC__/1/images/s5.jpg"></a></li>
       <li><a href="/"><img src="__PUBLIC__/1/images/s6.jpg"></a></li>
       <li><a href="/"><img src="__PUBLIC__/1/images/s7.jpg"></a></li>
       <li><a href="/"><img src="__PUBLIC__/1/images/s8.jpg"></a></li>
     </ul>
  </section> -->
  <div class="Copyright">
    <ul>
      <a href="/">帮助中心</a><a href="/">博客客服</a><a href="/">投诉中心</a><a href="/">博客协议</a>
    </ul>
    <p>Design by leo</p>
  </div>
</footer>
<script type="text/javascript" src="__PUBLIC__/js/jquery-2.1.3.min.js"></script>
 <script type="text/javascript">
  function carehim(){
    $.get("<?php echo U('careHim');?>?id=<?php echo ($id); ?>",'',function(e){
      alert(e.info);
      $("#careHim").html("已关注");
    });
  }
 </script>
 <script type="text/javascript">
   var editor = new Simditor({
     textarea: $('#editor')
   });
 </script>
</body>
</html>