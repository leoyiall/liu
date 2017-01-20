<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<!-- saved from url=(0019)http://i.baidu.com/ -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Be程序员个人中心——您在Be程序员的家</title>
    <meta name="description" content="Be程序员个人中心是百度用户管理个性化信息的平台，在这里，您可以体验贴吧的交流、知道的解答、百科的全面、空间的个性、云盘的强大……感受百度为您带来的方便、快捷与乐趣。">
    <meta name="keywords" content="个人中心,个人主页,个人帐号,个人空间">

    <link rel="stylesheet" href="__PUBLIC__/styles/main.css">
<script type="text/javascript" src="__PUBLIC__/js/jquery-2.1.3.min.js"></script>
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
        <main class="ibx-container row">
            
<div data-scroll-reveal="" class="row user-panel" data-scroll-reveal-initialized="true" data-scroll-reveal-complete="true">
    <div class="col span_5_1">
        <div id="ibx-uc" data-click="{&quot;mod&quot;:&quot;uc&quot;}">
            <div class="ibx-inner">
                <div class="ibx-uc-uimg">
                    <div class="ibx-uc-uimg-mask">
                        <a data-click="{&quot;act&quot;:&quot;uc_set&quot;}" class="ibx-uc-ulink" target="_blank" href="<?php echo U('Question/modifyZiliao');?>?id=<?php echo ($ll['user_id']); ?>">更换头像</a>
                    </div>
                <img class="ibx-uc-img" src="__PUBLIC__/Uploads/head/<?php echo ($ll['headimg']); ?>">
                    
                </div>
                <div class="ibx-uc-unick">
                    <a  target="_blank" href="<?php echo U('Question/modifyZiliao');?>?id=<?php echo ($ll['user_id']); ?>" class="ibx-uc-nick"><?php echo ($ll['nicheng']); ?></a>
                </div> 
                <div class="ibx-uc-utool">
                    <span class="ibx-uc-utool-cover"></span>
                    <span class="ibx-uc-utool-cover ibx-uc-utool-cover-mask"></span>
                    <div class="ibx-uc-utool-title">
    等级:
    <center>
    <img src="__PUBLIC__/images/ico/<?php echo ($ll['limg']); ?>" width="30" height="30" alt="LV<?php echo ($ll['lev']); ?>" title="LV<?php echo ($ll['lev']); ?>" style="margin-left:60px;">
    <span style="margin-left:65px;">LV<?php echo ($ll['lev']); ?></span><br>
    <span  style="margin-left:50px;color:#ff4400;">[<?php echo ($ll['exp']); ?>/<?php echo ($ll['experience']); ?>]</span> 
    </center>
      <div class="progress">
        <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo ($ll['exp']); ?>" aria-valuemin="0" aria-valuemax="<?php echo ($ll['experience']); ?>" id="jindu">
          <script type="text/javascript">
            var count = parseInt((<?php echo ($ll['exp']); ?>/<?php echo ($ll['experience']); ?>)*100);
            $("#jindu").css("width",count+"%");
          </script>
        </div>
      </div>

     </div>
                   
                </div> 
            </div>
        </div>
    </div>
        <div class="col span_5_4">
            <div id="ibx-cal">
                <div class="ibx-inner">
                    <div class="tianqi_box">
                    <IFRAME id="tianqi8_wetherinfo" name="tianqi8_wetherinfo" src="http://www.uuuu.cc/weather/code/freeweather3.htm?id=101300102&fcolor=&imgurl=tb/tbb/tb2&bimg=&bcolor=&fsize=" frameBorder=0 width=420 height=60 ALIGN=CENTER MARGINWIDTH=0 MARGINHEIGHT=0 HSPACE=0 VSPACE=0 SCROLLING=NO allowtransparency=true></IFRAME>
                    </div>
                    <div class="link_box">
            今天是 <b style="color:#ff4400;"><?php echo date('Y年m月d日',time()); $weekarray=array("日","一","二","三","四","五","六"); echo "  星期".$weekarray[date("w")]; ?></b> 

                    </div>
                    <div class="link_box">
                        <a href="<?php echo U('Person/addarc');?>?id=<?php echo ($ll['user_id']); ?>" target="_blank">发布博文</a>
                        <a href="<?php echo U('community/addQuestion');?>?id=<?php echo ($ll['user_id']); ?>" target="_blank">发布话题</a>
                        <a href="<?php echo U('question/addQuestion');?>?id=<?php echo ($ll['user_id']); ?>" target="_blank">我要提问</a>
                        <a href="<?php echo U('Index/down');?>" target="_blank">下载软件</a>
                        <a href="<?php echo U('Code/index');?>" target="_blank">下载源码</a>
                        <a href="<?php echo U('Index/index');?>" target="_blank">要看新闻</a>
                    </div>
                </div>
            </div>
        </div>
</div>
<!-- 一个框开始 -->
        <div  class="row card-panel">
                <span class="rule-wrap"><a id="history" name="history" class="rule"></a></span>
                <div class="col span_4_4">
                    <div class="ibx-even">
                        <div class="ibx-inner" id="ibx-mod-history">
                        <div class="ibx-inner-title"><a href="<?php echo U('Person/index');?>?id=<?php echo ($idnumber); ?>" class="ibx-inner-title-ctx">博客中心</a>
                        <ul class="ibx-inner-title-tab"><li  class="ibx-inner-title-tabitem ibx-newhis-list OP_LOG_TITLE current"><a href="<?php echo U('Person/arclist');?>?id=<?php echo ($idnumber); ?>" style="color:#1796F9;text-decoration:none;" target="_blank">我的博文</a></li>
                        </ul>
                        </div>
                    <div class="ibx-inner-content" id="ibx-mod-history-box">
        <ul class="blogs">
    <?php $__FOR_START_17190__=1;$__FOR_END_17190__=count($blist);for($i=$__FOR_START_17190__;$i < $__FOR_END_17190__;$i+=1){ if(is_array($blist)): $i = 0; $__LIST__ = $blist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><li><a href=""><?php echo ($i); ?>.<?php echo ($vv['title']); ?></a><span class="time_quote">
            <?php echo date("Y-m-d",$vv['sendTime']);?></span><span class="time_quote"><a href="javascript:void(0);" link="<?php echo U('Person/modifyBlog');?>?id=<?php echo ($vv["user_id"]); ?>&bid=<?php echo ($vv["lid"]); ?>" onclick="modify(this)">编辑</a>|
            <a href="javascript:void(0);" link="<?php echo U('Person/deleteBlog');?>?idnum=<?php echo ($vv["user_id"]); ?>&bid=<?php echo ($vv["lid"]); ?>" onclick='del(this)'>删除</a>&nbsp;&nbsp;</span></li><?php endforeach; endif; else: echo "" ;endif; } ?>
        </ul>
                    </div>
            </div>
        </div>
    </div>
</div>

<!-- 一个框结束 -->
<!-- 社区内容开始 -->
        <div  class="row card-panel">
                <span class="rule-wrap"><a id="history" name="history" class="rule"></a></span>
                <div class="col span_4_4">
                    <div class="ibx-even">
                        <div class="ibx-inner" id="ibx-mod-history">
                        <div class="ibx-inner-title"><a href="<?php echo U('community/personCenter');?>?id=<?php echo ($idnumber); ?>" class="ibx-inner-title-ctx">社区中心</a>
                        <ul class="ibx-inner-title-tab"><li  class="ibx-inner-title-tabitem ibx-newhis-list OP_LOG_TITLE current"><a href="<?php echo U('community/personCenter');?>?id=<?php echo ($idnumber); ?>" style="color:#1796F9;text-decoration:none;" target="_blank">我的话题</a></li>
                        </ul>
                        </div>
                    <div class="ibx-inner-content" id="ibx-mod-history-box">
        <ul class="blogs">
    <?php $__FOR_START_23399__=1;$__FOR_END_23399__=count($hlist);for($i=$__FOR_START_23399__;$i < $__FOR_END_23399__;$i+=1){ if(is_array($hlist)): $i = 0; $__LIST__ = $hlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Community/wenti');?>?id=<?php echo ($vv["qid"]); ?>"><?php echo ($i); ?>.<?php echo ($vv['qtitle']); ?></a><span class="time_quote">
            <?php echo date("Y-m-d",$vv['sendTime']);?></span><span class="time_quote">
            <a class='last_time pull-right' href="<?php echo U('Community/modifyQuestion');?>?id=<?php echo ($vv["qid"]); ?>">修改</a> | 
            <a class='last_time pull-right' href="javascript:void(0);" link="<?php echo U('Community/delQuestion');?>?id=<?php echo ($vv["qid"]); ?>" onclick="delQuestion(this)">删除</a>
            &nbsp;&nbsp;</span></li><?php endforeach; endif; else: echo "" ;endif; } ?>
        </ul>
                    </div>
            </div>
        </div>
    </div>
</div>
<!-- 一个框结束 -->
<!-- 问答内容开始 -->
        <div  class="row card-panel">
                <span class="rule-wrap"><a id="history" name="history" class="rule"></a></span>
                <div class="col span_4_4">
                    <div class="ibx-even">
                        <div class="ibx-inner" id="ibx-mod-history">
                        <div class="ibx-inner-title"><a href="<?php echo U('Question/personCenter');?>?id=<?php echo ($idnumber); ?>" class="ibx-inner-title-ctx">问答中心</a>
                        <ul class="ibx-inner-title-tab"><li  class="ibx-inner-title-tabitem ibx-newhis-list OP_LOG_TITLE current"><a href="<?php echo U('Question/personCenter');?>?id=<?php echo ($idnumber); ?>" style="color:#1796F9;text-decoration:none;" target="_blank">我的提问</a></li>
                        </ul>
                        </div>
                    <div class="ibx-inner-content" id="ibx-mod-history-box">
        <ul class="blogs">
    <?php $__FOR_START_32020__=1;$__FOR_END_32020__=count($wlist);for($i=$__FOR_START_32020__;$i < $__FOR_END_32020__;$i+=1){ if(is_array($wlist)): $i = 0; $__LIST__ = $wlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Question/wenti');?>?id=<?php echo ($vv["qid"]); ?>"><?php echo ($i); ?>.
        <?php if($vv["state"] == 1): ?><span style="color:green;">(已解决)</span>
        <?php else: ?>
            <span style="color:red;">(未解决)</span><?php endif; ?>
            <?php echo ($vv['qtitle']); ?></a><span class="time_quote">
            <?php echo date("Y-m-d",$vv['sendTime']);?></span><span class="time_quote">
            <a class='last_time pull-right' href="<?php echo U('Question/modifyQuestion');?>?id=<?php echo ($vv["qid"]); ?>">修改</a> | 
            <a class='last_time pull-right' href="javascript:void(0);" link="<?php echo U('Question/delQuestion');?>?id=<?php echo ($vv["qid"]); ?>" onclick="delQuestion(this)">删除</a>
            &nbsp;&nbsp;</span></li><?php endforeach; endif; else: echo "" ;endif; } ?>
        </ul>
                    </div>
            </div>
        </div>
    </div>
</div>
<!-- 一个框结束 -->
<!-- 编程库内容开始 -->
        <div  class="row card-panel">
                <span class="rule-wrap"><a id="history" name="history" class="rule"></a></span>
                <div class="col span_4_4">
                    <div class="ibx-even">
                        <div class="ibx-inner" id="ibx-mod-history">
                        <div class="ibx-inner-title"><a href="<?php echo U('Programme/index');?>?id=<?php echo ($idnumber); ?>" class="ibx-inner-title-ctx">编程库</a>
                        <ul class="ibx-inner-title-tab"><li  class="ibx-inner-title-tabitem ibx-newhis-list OP_LOG_TITLE current"><a href="<?php echo U('Programme/index');?>" style="color:#1796F9;text-decoration:none;" target="_blank">编程学习库</a></li>
                        </ul>
                        </div>
                    <div class="ibx-inner-content" id="ibx-mod-history-box">
        <ul class="blogs">
        <?php if(is_array($klist)): $i = 0; $__LIST__ = $klist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Programme/programme');?>?id=<?php echo ($vv["id"]); ?>" target="_blank">
            <img src="__PUBLIC__/Uploads/programme/<?php echo ($vv["logo"]); ?>" width="20" height="20" alt="<?php echo ($vv['title']); ?>"> 
            <?php echo ($vv['title']); ?></a><span class="time_quote">
            <?php echo date("Y-m-d",$vv['sendTime']);?></span></li><?php endforeach; endif; else: echo "" ;endif; ?>

        </ul>
                    </div>
            </div>
        </div>
    </div>
</div>
<!-- 一个框结束 -->
<!-- 资讯内容开始 -->
        <div  class="row card-panel">
                <span class="rule-wrap"><a id="history" name="history" class="rule"></a></span>
                <div class="col span_4_4">
                    <div class="ibx-even">
                        <div class="ibx-inner" id="ibx-mod-history">
                        <div class="ibx-inner-title"><a href="<?php echo U('Index/index');?>" class="ibx-inner-title-ctx">资讯中心</a>
                        <ul class="ibx-inner-title-tab"><li  class="ibx-inner-title-tabitem ibx-newhis-list OP_LOG_TITLE current"><a href="<?php echo U('Index/index');?>" style="color:#1796F9;text-decoration:none;" target="_blank">最新资讯</a></li>
                        </ul>
                        </div>
                    <div class="ibx-inner-content" id="ibx-mod-history-box">
        <ul class="blogs">
    <?php $__FOR_START_2493__=1;$__FOR_END_2493__=count($zlist);for($i=$__FOR_START_2493__;$i < $__FOR_END_2493__;$i+=1){ if(is_array($zlist)): $i = 0; $__LIST__ = $zlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Index/article');?>?id=<?php echo ($vv["id"]); ?>" target="_blank">
            <?php echo ($i); ?>. <?php echo ($vv['title']); ?></a><span class="time_quote">
            <?php echo ($vv["date"]); ?></span></li><?php endforeach; endif; else: echo "" ;endif; } ?>
        </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 一个框结束 -->
<!-- 源码开始 -->
        <div  class="row card-panel">
                <span class="rule-wrap"><a id="history" name="history" class="rule"></a></span>
                <div class="col span_4_4">
                    <div class="ibx-even">
                        <div class="ibx-inner" id="ibx-mod-history">
                        <div class="ibx-inner-title"><a href="<?php echo U('Code/index');?>?id=<?php echo ($idnumber); ?>" class="ibx-inner-title-ctx">源码中心</a>
                        <ul class="ibx-inner-title-tab"><li  class="ibx-inner-title-tabitem ibx-newhis-list OP_LOG_TITLE current"><a href="<?php echo U('Code/index');?>" style="color:#1796F9;text-decoration:none;" target="_blank">最新源码</a></li>
                        </ul>
                        </div>
                    <div class="ibx-inner-content" id="ibx-mod-history-box">
        <ul class="blogs">
    <?php $__FOR_START_27570__=1;$__FOR_END_27570__=count($clist);for($i=$__FOR_START_27570__;$i < $__FOR_END_27570__;$i+=1){ if(is_array($clist)): $i = 0; $__LIST__ = $clist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Code/downpage');?>?id=<?php echo ($vv["id"]); ?>" target="_blank">
            <?php echo ($i); ?>.<?php echo ($vv['title']); ?></a><span class="time_quote">
            <?php echo date("Y-m-d",$vv['sendTime']);?></span></li><?php endforeach; endif; else: echo "" ;endif; } ?>
        </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 一个框结束 -->
<!-- 软件下载开始 -->
        <div  class="row card-panel">
                <span class="rule-wrap"><a id="history" name="history" class="rule"></a></span>
                <div class="col span_4_4">
                    <div class="ibx-even">
                        <div class="ibx-inner" id="ibx-mod-history">
                        <div class="ibx-inner-title"><a href="<?php echo U('Index/down');?>" class="ibx-inner-title-ctx">软件中心</a>
                        <ul class="ibx-inner-title-tab"><li  class="ibx-inner-title-tabitem ibx-newhis-list OP_LOG_TITLE current"><a href="<?php echo U('Index/down');?>" style="color:#1796F9;text-decoration:none;" target="_blank">最新软件</a></li>
                        </ul>
                        </div>
                    <div class="ibx-inner-content" id="ibx-mod-history-box">
        <ul class="blogs">
    <?php $__FOR_START_18179__=1;$__FOR_END_18179__=count($rlist);for($i=$__FOR_START_18179__;$i < $__FOR_END_18179__;$i+=1){ if(is_array($rlist)): $i = 0; $__LIST__ = $rlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Index/downpage');?>?id=<?php echo ($vv["id"]); ?>" target="_blank">
            <?php echo ($i); ?>.<?php echo ($vv['title']); ?></a><span class="time_quote">
            <?php echo ($vv["date"]); ?></span></li><?php endforeach; endif; else: echo "" ;endif; } ?>
        </ul>
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