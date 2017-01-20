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
.blogitem h1{
  font-family: "微软雅黑";
  padding:10px;
  font-size: 16px;
  border-bottom: 1px solid #ccc;
  margin-bottom: 5px;
}
.blogitem textarea{
  font-size: 16px;
  padding-left: 3px;
}
#sub{
  padding-left: 20px;
  padding-right: 20px;
  height:35px;
  line-height:35px;
  background-color: #fafafa;
  outline: none;
  border:1px solid #ccc;
  cursor:pointer;
  border-radius: 5px;
}
#messageList{
  width:100%;
  padding:10px;
  overflow: hidden;
  *zoom:1;
}
#messageList .left{
  float:left;
}
#messageList .right_say{
  width:87%;
  padding:10px;
  font-size:12px;
  float:left;
}
#messageList ul{
  border-top: 1px solid #ccc;
}
#messageList ul li{
  margin-top:10px;
  overflow: hidden;
  *zoom:1;
  border-bottom: 1px solid #ccc;
}
#messageList .right_say h3{
  margin-top: 0px;
}
.times{
  font-size: 12px;
  color:#666;
  float: right;
  margin-right: 10px;
  margin-top:20px;
}
.times a{
  color:#7190FF;
}
.times a:hover{
  color:#333;
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
.reForm .subOn{
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
      <?php if($care['tofans'] == 1): ?><p class="btns">
        <!-- <a href="<?php echo U('privateMessage');?>?id=<?php echo ($id); ?>" target="_blank" >私信</a> -->
        <span id="careHim">已关注</p>
      <?php else: ?>
        <?php if($idnumber != $id): ?><p class="btns">
          <!-- <a href="<?php echo U('privateMessage');?>?id=<?php echo ($id); ?>" target="_blank" >私信</a> -->
          <span  id="careHim"><a href="JavaScript:void(0);" onclick="carehim()" >关注</a></span></p><?php endif; endif; ?>
      </div> 
      <section class="taglist">
         <h2>全部分类</h2>
         <ul>
         <?php if(is_array($cate)): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('arclist');?>?id=<?php echo ($id); ?>&cid=<?php echo ($vv["caid"]); ?>"><?php echo ($vv["category"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
      </section>
    </aside>
    <div class="blogitem">
    <h1>留言板</h1>
      <form action="<?php echo U('saveMessage');?>" id="myForm" method="post">
        <textarea rows="8" cols="84" style="margin-left:20px;" name="message" id="message" placeholder="请输入您想对我说的话..." autofocus></textarea>
      <center>
        <input type="hidden" name="ids" value="<?php echo ($id); ?>">
        <input type="button" id="sub" value="留言" align="right">
      </center>
      </form>
  <div id="messageList">
    <ul>
    <?php if(!$mlist): ?><li style="text-align:center;">还没有留言,快来坐沙发吧。</li><?php endif; ?>
    <?php if(is_array($mlist)): $i = 0; $__LIST__ = $mlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><li>
        <div class="left">
          <a href="<?php echo U('index');?>?id=<?php echo ($vv["person_id"]); ?>"><img src="__PUBLIC__/Uploads/<?php echo ($vv['arcimg']); ?>" width="50" height="50" alt="xx"></a>
        </div>
        <div class="right_say">
          <h3>
          <!-- 如果不存在昵称就显示它的id号 -->
        <?php if($vv['nicheng']): ?><a href="<?php echo U('index');?>?id=<?php echo ($vv["person_id"]); ?>" style="color:#333;"><?php echo ($vv['nicheng']); ?></a>
          <?php else: ?>
          <a href="<?php echo U('index');?>?id=<?php echo ($vv["person_id"]); ?>" style="color:#333;"><?php echo ($vv['person_id']); ?></a><?php endif; ?>
          说:</h3>
          <p>
            <?php echo ($vv['message']); ?>
          </p>
          <span class="times">
            <?php echo date("Y-m-d H:i:s",$vv['sendTime']);?>
          </span>
          <span class="times">
          <?php if($idnum == $id && $idnum!=''): ?><a href="javascript:void(0);" link="<?php echo U('delMessage');?>?id=<?php echo ($idnum); ?>&mid=<?php echo ($vv["mid"]); ?>" onclick="delMessage(this)">删除</a><?php endif; ?>
         </span> 
         </div>
          <!-- <div class="reAnswer">
          <form action="<?php echo U('saveAnswer');?>" method="post" class="reForm" id="answerForm"> 
            <input type="text" class="reAnswerBox" name="respone" placeholder="您想对我也说点什么?" id="answer">
            <input type="hidden" name="mwho" value="<?php echo ($vv["person_id"]); ?>">
            <input type="hidden" name="bm_id" value="<?php echo ($vv["mid"]); ?>">
            <input type="hidden" name="id" value="<?php echo ($id); ?>">
            <input type="button" value="回复" onclick="saveAnswer(this)" class="subOn">
          </form> 
          </div> -->
        <?php if(is_array($answer)): $i = 0; $__LIST__ = $answer;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo['bm_id'] == $vv['mid']): ?><div class="reAnswer">
              <div class="left">
                <b><a href="<?php echo U('index');?>?id=<?php echo ($vo["person_id"]); ?>" style="color:#333;"><?php echo ($vo["nicheng"]); ?></a></b>回复说:
              </div>
              <div class="right_say">
                <?php echo ($vo["message"]); ?>
              <span class="times">
          <?php if($idnum == $id && $idnum!=''): ?><a href="javascript:void(0);" link="<?php echo U('delMessage');?>?id=<?php echo ($idnum); ?>&mid=<?php echo ($vo["mid"]); ?>" onclick="delMessage(this)">删除</a><?php endif; ?>
          <?php echo date("Y-m-d H:i:s",$vo['sendTime']);?>
              </span>
              </div>
           </div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
      </li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
  </div>
    <div class="pages"><?php echo ($show); ?></div>
    </div>  
  </div>
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
  $("#sub").on("click",function(){
    if($("#message").val()==''){
      alert("留言内容不能为空!");
      return;
    }
    <?php if(!$idnum): ?>alert('请登录!');
      window.location.href="<?php echo U('Common/login');?>";
      return;<?php endif; ?>
    $("#myForm").submit();
  });
  // 执行删除留言
  function delMessage(obj){
    if(confirm("是否删除该留言?")){
      var link = obj.getAttribute("link");
      window.location.href=link;
    }    
  }
  </script>
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