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
body{
  font-family: "微软雅黑";
}
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
    width:400px;
    padding-top:30px;
    margin-left:60px;
    text-align: left;
    font-size:14px;
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
  background-color: #eee;
  display: inline-block;
  color:#ff4400;
  border:1px solid #ccc;
  margin-left: 50px;
  margin-top: 40px;
}
.modifyAbout:hover{
  background-color: #96CEB4;
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
#topintroduce{
  width:148px;
  height:30px;
  line-height: 30px;
  text-align: center;
  margin:0 auto;
}
#topintroduce a{
  display: block;
  padding-left: 10px;
  padding-right: 10px;
  color:#333;
  font-weight: bold;
  float: left;
}
#topintroduce a:hover{
  color:#ff4400;
}
#friendList{
  width:100%;
  overflow: hidden;
  *zoom:1;
}
#friendList #searchbox{
  width:100%;
  height:50px;
  line-height: 50px;
  border-top: 1px solid #ccc;
}
#friendList #searchbox form{
  float: right;
  margin-right: 10px;
}
#friendList #searchbox input[type='text']{
  height:25px;
  width: 140px;
  border-radius: 5px;
  outline: none;
  border:1px solid #ccc;
  line-height: 25px;
  font-size: 12px;
  padding-left: 2px;
}
#friendList #searchbox input[type='submit']{
  padding-left: 10px;
  padding-right: 10px;
  height:28px;
  background-color: #fff;
  color:#333;
  cursor:pointer;
  outline: none;
  border:1px solid #ccc;
  border-radius: 5px;
}
#friendList #searchbox input[type='submit']:hover{
  background-color: #fafafa;
}
#friendList ul{
  width:100%;
}
#friendList ul li{
  overflow: hidden;
  *zoom:1;
  padding:10px 20px 10px 20px;
  border-bottom: 1px solid #ccc;
}
#friendList ul li #left{
  float: left;
}
#friendList ul li #left img{
  border-radius: 50%;
  padding-right: 10px;
}
#friendList ul li #right{
  width:85%;
  float: left;
}
#friendList ul li #right a{
  color:#333;
}
#friendList ul li #right a:hover{
  color:#ff4400;
}
#friendList ul li #right .sex_boy{
  font-size: 14px;
  color:#96CEB4;
  font-weight: bolder;
}
#friendList ul li #right .sex_girl{
  font-size: 14px;
  color:#FF7481;
  font-weight: bolder;
}
#friendList ul li #right dl{
  width:85%;
}
#friendList ul li #right dd{
  font-size: 14px;
  height:25px;
  line-height: 25px;
  color:#808080;
}
#friendList ul li #right dl dd span{
  color:#333;
}
i{
  font-style: normal;
}
.fans_color{
  font-weight: bold;
  color:#FF71AD;
}
.your_color{
  font-weight: bold;
  color:#6CC6FC;
}
.relative{
  color:#ff4400
}
.seeHim{
  width:100px;
  height: 30px;
  line-height: 30px;
  background-color: #fff;
  border:1px solid #ccc;
  outline: none;
  border-radius: 3px;
  cursor: pointer;
}
.seeHim:hover{
  background-color: #fafafa;
}
</style>
</head>
<body>
<!-- 头部 -->
 
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
<div class="mainContent2">
    <aside>
    
      <section class="taglist">
         <h2>全部分类</h2>
         <ul>
         <?php if(is_array($cate)): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('arclist');?>?id=<?php echo ($id); ?>&cid=<?php echo ($vv["caid"]); ?>"><?php echo ($vv["category"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
      </section>
    </aside>
    <div class="blogitem" style="min-height:600px;">
      <div id="myfriend">
         <div class="avatar">
             <?php if($ilist['arcimg']): ?><img src="__PUBLIC__/Uploads/<?php echo ($ilist['arcimg']); ?>" width="160" height="160"><?php endif; ?>
        <a href="<?php echo U('about');?>?id=<?php echo ($id); ?>"><span><?php echo ($li['nicheng']); ?></span></a>
          </div>
      </div>
   
      <div id="topintroduce">
        <a href="<?php echo U('friend');?>?id=<?php echo ($id); ?>&fans=tofans">关注<span id="look"><?php if($cares): echo ($cares); ?>
          <?php else: ?>0<?php endif; ?>
          </span></a>
        <a href="<?php echo U('friend');?>?id=<?php echo ($id); ?>">粉丝<span id="look">
          <?php if($fans): echo ($fans); ?>
          <?php else: ?>0<?php endif; ?>
        </span></a>
      </div>
      <div id="friendList">
      <div id="searchbox">
      <h3 style="float:left;padding-left:15px;">
    <?php if($ff): ?>我关注的人
    <?php else: ?>
      我的粉丝<?php endif; ?>
      </h3>
     <!--  <form action="<?php echo U('searchFriend');?>" method="post">
        <input type="text" name="soso" placeholder="请按昵称进行搜索">
        <input type="hidden" name="ids" value="<?php echo ($id); ?>">
        <input type="submit" value="搜索">
      </form> -->
      </div>
        <ul>
        <?php if(!$see): ?><li><center>还没有发现Ta的博友哦!</center></li><?php endif; ?>
        <?php if(is_array($see)): $i = 0; $__LIST__ = $see;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><li>
            <div id="left">
              <a href=""><img src="__PUBLIC__/Uploads/<?php echo ($vv["arcimg"]); ?>" alt="<?php echo ($vv["nicheng"]); ?>" width="50" height="50"></a>
            </div>
            <div id="right">
              <h3><a href="<?php echo U('index');?>?id=<?php echo ($vv["fans_id"]); ?>"><?php echo ($vv["nicheng"]); ?></a>
            <?php if($vv['sex'] == 1): ?><span class="sex_boy">♂</span>
            <?php else: ?>
              <span class="sex_girl">♀</span><?php endif; ?>
              </h3>
              <div class="intro">
<!--                   <dl>
  <dd>关注:<a href="">852</a></dd>
  <dd>粉丝:<a href="">852</a></dd>
</dl>  -->
                  <dl>
                    <dd>常居住地:<span><?php echo ($vv["live"]); ?></span></dd>
                  </dl>
                  <dl>
                    <dd style="height:50px;">自我介绍:
                    <span><?php echo ($vv["introduce"]); ?></span></dd>
                  </dl>
                  <dl>
                    <dd>
                      关系:
                    <?php if($ff): ?><i class="your_color">您关注了Ta</i>
                      <?php else: ?>
                      <i class="fans_color">您的粉丝</i>
<!--                       <span>
                        <input type="button" class="seeHim" value="关注Ta">
                      </span> --><?php endif; ?>  
                      <!-- <i class="relative">互相关注</i> -->
                    </dd>
                  </dl>
              </div>
            </div>
          </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
      </div>
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
</body>
</html>