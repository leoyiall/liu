<?php if (!defined('THINK_PATH')) exit();?> 
<!doctype html>
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
  .blogitem table{
    padding-top:30px;
    font-size:14px;
    margin-left:10px;
    padding-bottom: 200px;
  }
.blogitem table tr{
  height:30px;
  line-height: 30px;
}
.modifyAbout{
  padding-left:10px;
  padding-right:10px;
  height:35px;
  line-height: 35px;
  border-radius: 5px;
  display: inline-block;
  color:#ff4400;
  border:1px solid #ccc;
  margin-left: 50px;
  margin-top: 40px;
}
.modifyAbout:hover{
  background-color: #fafafa;
  color:#333;
}
</style>
</head>
<body onload="">
 
<!-- 这里是头部 -->
<header>
  <nav id="nav">
    <div style="float:left;">
      <a href="" style="float:left;"><img src="__PUBLIC__/images/ico.png" width="38" height="38"></a>
      <h1 id="blogo">博客</h1>
      <ul id="b-link">
        <li><a href="__ROOT__/index.php">Be程序员首页</a></li>
        <li><a href="<?php echo U('Blog/index');?>">博客首页</a></li>
        <li><a href=""></a></li>
      </ul>
    </div>
    <div id="right-box">
    <?php if($idnumber): ?><ul>
      <li>
      <?php if($list['nicheng']): ?><a href="<?php echo U('index');?>?id=<?php echo ($list['idnumber']); ?>"><?php echo ($list['nicheng']); ?></a>
      <?php else: ?>
  <a href="<?php echo U('index');?>?id=<?php echo ($idnumber); ?>"><?php echo ($idnumber); ?></a><?php endif; ?>
      </li>
      <li><a href="<?php echo U('Common/logout');?>">退出</a></li>
      <li><a href="<?php echo U('addarc');?>?id=<?php echo ($idnumber); ?>">发布博文</a></li>
      <li><a href="<?php echo U('xiaoxi');?>?id=<?php echo ($id); ?>">消息(<span class="color">0</span>)</a></li>
      <li><a href="<?php echo U('base');?>?id=<?php echo ($idnumber); ?>">修改博客</a></li>
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
<!-- 主体 -->
<div class="mainContent2">
    <aside>
            <div class="avatar">
      <?php if($ilist['arcimg']): ?><img src="__PUBLIC__/Uploads/<?php echo ($ilist['arcimg']); ?>" width="160" height="160"><?php endif; ?>
        <a href="<?php echo U('about');?>?id=<?php echo ($id); ?>"><span><?php echo ($li['nicheng']); ?></span></a>
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
      <?php if($care['tofans'] == 1): ?><p class="btns">
        <!-- <a href="<?php echo U('privateMessage');?>?id=<?php echo ($id); ?>" target="_blank" >私信</a> -->
        <span id="careHim">已关注</p>
      <?php else: ?>
        <?php if($idnubmer != $id): ?><p class="btns">
          <!-- <a href="<?php echo U('privateMessage');?>?id=<?php echo ($id); ?>" target="_blank" >私信</a> -->
          <span  id="careHim"><a href="JavaScript:void(0);" onclick="carehim()" >关注</a></span></p><?php endif; endif; ?>
      </div> 
      <section class="taglist">
         <h2>全部分类</h2>
         <ul>
         <?php if(is_array($cate)): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('arclist');?>?id=<?php echo ($id); ?>/cid/<?php echo ($vv["caid"]); ?>"><?php echo ($vv["category"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
      </section>
    </aside>
    <div class="blogitem">
    <h2 style="padding-top:10px;padding-left:10px;border-bottom:1px solid #ccc;text-align:center;">关于我</h2>
      <table>
      <tr>
        <th align="right" width="100">博客昵称:</th>
        <td>
        <?php if($plist['nicheng'] == ''): ?>这个人真懒,什么都不说
        <?php else: ?>
          <?php echo ($plist['nicheng']); endif; ?>
        </td>
      </tr>
        <tr>
          <th align="right">真实姓名:</th>
          <td><?php echo ($plist['real_name']); ?></td>
        </tr>
        <tr>
          <th align="right">性　　别:</th>
          <td>
          <?php if($plist['sex'] == 1): ?>男
          <?php else: ?>
            女<?php endif; ?>
          </td>
        </tr>
<!--         <tr>
            <th align="right">生　　日:</th>
            <td>
          <?php echo ($plist['birthday']); ?>
            </td>
          </tr> -->          
        <tr>
          <th align="right">现 居 地:</th>
          <td><?php echo ($plist['live']); ?></td>
        </tr> 
        <tr>
          <th align="right">自我介绍:</th>
          <td><?php echo ($plist['introduce']); ?></td>
        </tr>               
        <tr>
          <th align="right">Q Q:</th>
          <td><?php echo ($plist['qq']); ?></td>
        </tr>  
        <tr>
          <th align="right">邮　　箱:</th>
          <td><?php echo ($plist['email']); ?></td>
        </tr> 
        <tr>
          <th align="right">兴　　趣:</th>
          <td>
            <?php echo ($plist['intersting']); ?>
          </td>
        </tr> 
    <?php if(($idnubmer == $id) and $id!=''): ?><tr>
          <td colspan="2">
            <a href="<?php echo U('modifyAbout');?>?id=<?php echo ($id); ?>" class="modifyAbout">修改资料</a>
          </td>
        </tr><?php endif; ?>
      </table>
    </div>  
  </div>
  <!-- 这里是底部 -->
   
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
</body>
</html>