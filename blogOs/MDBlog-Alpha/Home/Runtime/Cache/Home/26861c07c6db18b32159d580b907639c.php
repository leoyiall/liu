<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="zh">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=0,maximum-scale=1,user-scalable=0">
        <!-- <meta name="apple-mobile-web-app-capable" content="yes" /> -->
        <meta name="apple-mobile-web-app-status-bar-style" content="black" />
        <meta name="apple-touch-fullscreen" content="yes"><!--"添加到主屏幕“后，全屏显示 -->
        <meta name="apple-mobile-web-app-capable" content="yes" /><!--这meta的作用就是删除默认的苹果工具栏和菜单栏。-->
        <title><?php echo C("BLOG_CONFIG.blog_name");?>的博客—<?php echo C("SYSTEM.app_name");?>个人博客</title>
        <script src="/lanyueOS/MDBlog-Alpha/Home/Common/Common/Js/jquery-2.1.3.min.js"></script>
        <link rel="stylesheet" href="/lanyueOS/MDBlog-Alpha/Home/Common/md.editor/css/editormd.preview.css" />
        <link rel="stylesheet" href="/lanyueOS/MDBlog-Alpha/Home/Common/Common/Css/md-ui.css" />
    </head>
    <body>
        <script>
	$(document).ready(function(){
		$(".navbar .navbar-header .nav-btn").click(function(){
			$(this).parent().parent().children(".nav-box").slideToggle(500);
			$(this).parent().parent().children(".menu").slideToggle(500);
		});
	});
</script>
<div class="navbar navbar-blue">
	<div class="navbar-header">
		<a href="<?php echo C('SYSTEM.app_link');?>" class="nav-title" target="_blank"><strong><?php echo C('SYSTEM.app_name');?>博客</strong></a>
		<a href="#" class="nav-btn"><i class="fa fa-list"></i></a>
	</div>
	<div class="nav-box">
		<ul class="nav-left-list">
			<li class="nav"><a href="<?php echo U('Index/index');?>"><i class="fa fa-home"></i>首页</a></li>
			<li class="nav"><a href="<?php echo U('Article/index');?>">编辑</a></li>
			<li class="nav"><a href="<?php echo U('Admin/index');?>">管理</a></li>
			<?php $sys_menu=C('SYSTEM.app_navs');$user_menu=C('BLOG_CONFIG');?>
			<?php if(is_array($sys_menu["menus"])): foreach($sys_menu["menus"] as $key=>$menu): ?><li class="nav"><a href="<?php echo ($menu); ?>" target="_blank"><?php echo ($key); ?></a></li><?php endforeach; endif; ?>
			<?php if(is_array($user_menu["blog_menus"])): foreach($user_menu["blog_menus"] as $key=>$menu): ?><li class="nav"><a href="<?php echo ($menu); ?>" target="_blank"><?php echo ($key); ?></a></li><?php endforeach; endif; ?>
			<li class="nav"><a href="#">关于</a></li>
		</ul>
	</div>
	
	<!-- <div class="menu">
		<ul class="nav-right-list">
			<li class="nav"><a href="#">登录</a></li>
			<li class="nav"><a href="#">关于</a></li>
		</ul>
	</div> -->
</div>
        <div class="container">
            <div class="row">
                <div class="12">
                    <ul class="crumbs">
                        <li>当前位置：</li>
                        <li><a href=""><i class="fa fa-home fa-lg"></i>Home</a></li>
                        <li class="separate">&frasl;</li>
                        <li><a href="">文章详情</a></li>
                    </ul>
                </div>
                <div class="col-9">
                    <div class="lump">
                        <div class="lump-content">
                            <div class="detail">
                                <div class="detail-title"><p class="title"><?php echo ($article['title']); ?></p></div>
                                <div class="detail-about">
                                    <span>时间：<?php echo date('Y-m-d H:i:s',$article['time']);?></span>
                                    <span>author：<?php echo C('BLOG_CONFIG.blog_name');?></span>
                                    <span class="fa fa-eye">浏览:0</span>
                                    <span>类型:<?php echo ($article['type']); ?></span>
                                </div>
                                <style type="text/css">
                                    .editormd-html-preview{
                                        background: none;
                                    }
                                    #custom-toc-container{
                                        background: #F9F9F9;;
                                    }
                                </style>
                                <div class="detaill-content">
                                    <div class="markdown-body editormd-preview-container" id="custom-toc-container">目录</div>
                                    <div id="preview_box">
                                        <div id="editormd-view">
                                           <textarea style="display:none;" name="test-editormd-markdown-doc"></textarea>   
                                        </div>
                                    </div>
                                </div>
                                <div class="detail-about">
                                    <span>时间：<?php echo date('Y-m-d H:i:s',$article['time']);?></span>
                                    <span>author：<?php echo C('BLOG_CONFIG.blog_name');?></span>
                                    <span class="fa fa-eye">浏览:0</span>
                                    <span>类型:<?php echo ($article['type']); ?></span>
                                </div>
                            </div>
                                
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="panel">
                        <div class="panel-title"><i class="fa fa-file-text-o"></i>&nbsp;<strong>文章分类</strong></div>
                        <div class="panel-content">
                            <!--目录-->
                            <ul class="catalogue">
                                <?php if(is_array($classify)): foreach($classify as $key=>$class): ?><li><a href="#"><strong><?php echo ($key); ?></strong></a>
                                    <ul class="catalogue">
                                        <?php if(is_array($class)): foreach($class as $key=>$arl): ?><li><a href="<?php echo U('Article/preview',array( 'aid'=>$arl["url"], ),'html');?>" target="_blank"><?php echo ($arl['title']); ?></a></li><?php endforeach; endif; ?>
                                    </ul>
                                </li><?php endforeach; endif; ?>
                            </ul>
                        </div>
                        <div class="panel-footer"></div>
                    </div>
                </div>
            </div>
        </div>
        <script src="/lanyueOS/MDBlog-Alpha/Home/Common/md.editor/lib/marked.min.js"></script>
        <script src="/lanyueOS/MDBlog-Alpha/Home/Common/md.editor/lib/prettify.min.js"></script>
        <script src="/lanyueOS/MDBlog-Alpha/Home/Common/md.editor/lib/raphael.min.js"></script>
        <script src="/lanyueOS/MDBlog-Alpha/Home/Common/md.editor/lib/underscore.min.js"></script>
        <script src="/lanyueOS/MDBlog-Alpha/Home/Common/md.editor/lib/sequence-diagram.min.js"></script>
        <script src="/lanyueOS/MDBlog-Alpha/Home/Common/md.editor/lib/flowchart.min.js"></script>
        <script src="/lanyueOS/MDBlog-Alpha/Home/Common/md.editor/lib/jquery.flowchart.min.js"></script>
        <script src="/lanyueOS/MDBlog-Alpha/Home/Common/md.editor/js/editormd.js"></script>
        <script type="text/javascript">
            $(function() {
                var EditormdView;
                $.get("<?php echo ($markdown_url); ?>",function(markdown){
                    //创建一个预览
				    EditormdView = editormd.markdownToHTML("editormd-view", {
                        markdown        : markdown,//+ "\r\n" + $("#append-test").text(),
                        //htmlDecode      : true,       // 开启 HTML 标签解析，为了安全性，默认不开启
                        htmlDecode      : "style,script,iframe",  // you can filter tags decode
                        //toc             : false, //关闭目录
                        tocm            : true,    // Using [TOCM]创建下拉目录
                        tocContainer    : "#custom-toc-container", // 自定义 ToC 容器层
                        //gfm             : false,
                        //tocDropdown     : true,
                        // markdownSourceCode : true, // 是否保留 Markdown 源码，即是否删除保存源码的 Textarea 标签
                        emoji           : true,
                        taskList        : true,
                        tex             : true,  // 默认不解析
                        flowChart       : true,  // 默认不解析
                        sequenceDiagram : true,  // 默认不解析
                    });
                });
            });
        </script>
        <div style="margin-top:100px;clear:both"></div>
<style type="text/css">
.footer{
	background: #212326;
	color:#838383;
}
</style>
<div class="container-full">
	<div class="row">
		<div class="col-12 footer">
			<div class="col-2"></div>
			<div class="col-8">
				<p align="center"><strong>友情链接：</strong>
					<?php $sys_menu=C('SYSTEM.app_navs'); ?>
					<?php if(is_array($sys_menu["blogroll"])): foreach($sys_menu["blogroll"] as $key=>$nav): ?><a href="<?php echo ($nav); ?>" target="_blank"><?php echo ($key); ?></a>&nbsp;<?php endforeach; endif; ?>
				</p>
				
				<p align="center">
					<strong>联系：</strong>
					QQ:1752295326&nbsp;
					GitHub:<a href="https://github.com/mengdu/" target="_blank">mengdu</a>
				</p>
			</div>
			<div class="col-2"></div>
		</div>
		<div class="col-12 footer">
			<p align="center">Copyright © 2014-2015 mdblog All Rights Reserved. <a href="<?php echo U('Admin/index');?>">管理</a></p>
		</div>
	</div>
</div>
    </body>
</html>