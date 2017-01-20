<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo ($ilist['blogTitle']); ?>--Be程序员博客</title>
<meta name="keywords" content="Be程序员博客" />
<meta name="description" content="Be程序员博客" />
<link href="__PUBLIC__/1/css/styles.css" rel="stylesheet">
<link rel="shortcut icon" href="__PUBLIC__/images/ico.png" type="image/x-icon" />
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
  .userinfo form input[type='text']{
    border:1px solid #ccc;
    border-radius: 5px;
    height: 30px;
    line-height: 30px;
    padding-left: 10px;
    outline: none;
    width: 200px;
  }
  .userinfo form input[type='submit']{
    display: block;
    padding-left: 10px;
    padding-right: 10px;
    line-height: 30px;
    height: 30px;
    margin-top: 10px;
    margin-left: 60px;
    border:1px solid #ccc;
    border-radius: 5px;
    background-color: #fff;
    outline: none;
    cursor:pointer;
  }
  .rightBox a{
    float: right;
    border-radius: 3px;
    border:1px solid #ccc;
    margin-top:10px;
    margin-right: 30px;
    display: inline-block;
    height:30px;
    line-height: 30px;
    padding-left: 10px;
    padding-right: 10px;
    color:#333;
    background-color: #fff;
  }
  .rightBox a:hover{
    color:#ff4400;
  } 
.blogList{
  width:100%;
  position: relative;
  overflow: hidden;
  *zoom:1;
}
.blogList h2{
  float: left;
}
.blogList .rightTime{
  float: right;
  position: absolute;
  top:50px;
  right: 10px;
}
.blogList .rightTime span{
  color:#9c9c9c;
}
.blogList .rightTime a{
  color:#3AB3FF;
}
.blogList .rightTime a:hover{
  text-decoration: underline;
}
.cate_list li a{
  color:#598DD3;
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
        <li><a href="<?php echo U('Index/index');?>">Be程序员首页</a></li>
        <li><a href="<?php echo U('Blog/index');?>">博客首页</a></li>
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
      <li><a href="<?php echo U('xiaoxi');?>?id=<?php echo ($id); ?>">消息(<span class="color">0</span>)</a></li>
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
  <?php if($idnum == $id && $idnum!=''): ?><div class="userinfo"> 
        <h3 align="center">添加文章分类</h3>
      <form action="<?php echo U('addCategory');?>" method="post">
        <input type="text" placeholder="请输入文章分类" autofocus name="category">
        <input type="hidden" name="user_id" value="<?php echo ($idnum); ?>">
        <input type="submit" value="添加分类">
      </form>
      <ul class="cate_list">
        <?php if(is_array($cate)): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><li style="overflow:hidden;*zoom:1;color:#333;"><?php echo ($vv["category"]); ?>
            <a href="<?php echo U('delCategory');?>?id=<?php echo ($id); ?>&cid=<?php echo ($vv["caid"]); ?>" style="float:right;">删除</a>
           </li><?php endforeach; endif; else: echo "" ;endif; ?>
      </ul>
      </div><?php endif; ?>
      <section class="taglist">
    <?php if($idnum == $id && $idnum!=''): ?><h2>全部分类</h2><?php endif; ?>
         <ul>
         <?php if(is_array($cate)): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('arclist');?>?id=<?php echo ($id); ?>&cid=<?php echo ($vv["caid"]); ?>"><?php echo ($vv["category"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
      </section>
    </aside>
    <div class="blogitem">
    <div class="rightBox">
      <?php if($idnum == $id && $idnum!=''): ?><h3><a href="<?php echo U('addarc');?>/id/<?php echo ($idnum); ?>">发布博文</a></h3><?php endif; ?>
    </div>
      <?php if(is_array($bool)): $i = 0; $__LIST__ = $bool;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><div class="blogList">
        <h2 class="title"><a href="<?php echo U('article');?>?id=<?php echo ($id); ?>&lid=<?php echo ($vv["lid"]); ?>"><?php echo ($vv["title"]); ?></a></h2>
        <div class="rightTime">
          <span><?php echo date("Y-m-d",$vv['sendTime']); ?></span>
          <span>(<?php echo ($vv["sight"]); ?>)</span>
          <?php if($idnum == $id && $idnum!=''): ?><a href="javascript:void(0);" link="<?php echo U('modifyBlog');?>?id=<?php echo ($vv["user_id"]); ?>&bid=<?php echo ($vv["lid"]); ?>" onclick="modify(this)">编辑</a>
            <a href="javascript:void(0);" link="<?php echo U('deleteBlog');?>?idnum=<?php echo ($vv["user_id"]); ?>&bid=<?php echo ($vv["lid"]); ?>" onclick='del(this)'>删除</a><?php endif; ?>
        </div>
    </div><?php endforeach; endif; else: echo "" ;endif; ?>
      <div class="pages" style="padding-top:20px;">
        <?php echo ($show); ?>
      <!-- <span>1</span><a href="/" hidefocus="">2</a><a href="/" hidefocus="">3</a><a href="/" class="next">下一页&gt;&gt;</a> --></div>
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