<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
	<head>
		<title><?php echo C("BLOG_CONFIG.blog_name");?>的博客—<?php echo C("SYSTEM.app_name");?>个人博客</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="icon" type="image/png" href="/lanyueOS/MDBlog-Alpha/Home/Common/Common/Images/mylogo-24x24.ico">
		<script type="text/javascript" src="/lanyueOS/MDBlog-Alpha/Home/Common/md.editor/js/jquery-2.1.3.min.js"></script>
		<script type="text/javascript" src="/lanyueOS/MDBlog-Alpha/Home/Common/md.editor/js/editormd.js"></script>
		<script type="text/javascript" src="/lanyueOS/MDBlog-Alpha/Home/Common/Common/Js/mdtool.js"></script>
		<script type="text/javascript" src='/lanyueOS/MDBlog-Alpha/Home/Common/Common/Js/form-ui.js'></script>
		<!-- <script type="text/javascript" src=<?php echo ((isset($blogUrl) && ($blogUrl !== ""))?($blogUrl):""); ?>></script> -->
		<script  type="text/javascript">
		$(document).ready(function(){
			var isAmend=<?php echo ((isset($isAmend) && ($isAmend !== ""))?($isAmend):"false"); ?>;///是否是修改
			//创建编辑器
			var testEditor = editormd("editor", {

								width: "100%",
								height: 600,
								path : '/lanyueOS/MDBlog-Alpha/Home/Common/md.editor/lib/',	//lib文件路径
								//theme : "dark",					//toobar主题
								//previewTheme : "dark",			//预览框主题
								//editorTheme : "pastel-on-dark",	//编辑框主题
								//markdown : markdown,				//设置markdown内容
								codeFold : true,					//开启编辑区代码折叠
								//syncScrolling : false,
								saveHTMLToTextarea : true,			//保存 HTML 到 Textarea
								searchReplace : true,				//开启搜索
								//readOnly : true,					//开启只读 默认关闭
								//watch : false,					//关闭实时预览
								htmlDecode : "style,script,iframe|on*",//开启 HTML 标签解析(过滤)，为了安全性，默认不开启（true时不过滤 慎用）    
								//toolbar  : false,					//关闭工具栏
								//previewCodeHighlight : false,		// 关闭预览的代码块高亮，默认开启
								emoji : true,						//开启表情 默认关闭
								taskList : true,
								//toc : false,						//关闭自动目录 默认开启
								tocm : true,						// Using [TOCM] 
								tex : true,							// 开启科学公式TeX语言支持，默认关闭
								flowChart : true,					// 开启流程图支持，默认关闭
								sequenceDiagram : true,				// 开启时序/序列图支持，默认关闭,
								//dialogLockScreen : false,   // 设置弹出层对话框不锁屏，全局通用，默认为true
								//dialogShowMask : false,     // 设置弹出层对话框显示透明遮罩层，全局通用，默认为true
								//dialogDraggable : false,    // 设置弹出层对话框不可拖动，全局通用，默认为true
								//dialogMaskOpacity : 0.4,    // 设置透明遮罩层的透明度，全局通用，默认值为0.1
								//dialogMaskBgColor : "#000", // 设置透明遮罩层的背景颜色，全局通用，默认为#fff
								imageUpload : true,
								imageFormats : ["jpg", "jpeg", "gif", "png", "bmp", "webp"],
								imageUploadURL : "/lanyueOS/MDBlog-Alpha/Home/Common/md.editor/php/upload.php",
								//事件
								onload : function() {
									//console.log('onload', this);
									//this.fullscreen();
									//this.unwatch();
									//this.watch().fullscreen();
									//this.setMarkdown("#PHP");
									//this.width("100%");
									//this.height(480);
									//this.resize("100%", 640);
									if(isAmend){
										$.get("<?php echo ($markdown_url); ?>",function(md){
											testEditor.setMarkdown(md);
										})
									}
								}
							});
			
			var ajaxData;
            //创建信息对象
            var m=md.messager();
			//右键菜单
			var mmeun=md.mousemenu($("#editor_box")[0]);
			mmeun.addOption("新建",function(){
				console.log(testEditor);
			});
			mmeun.addOption("打开",function(){

			});
			mmeun.addOption("保存",function(){
				submit(0);
			});
			mmeun.addOption("发布",function(){
				submit(1);
			});
			mmeun.addLine();
			var down=new Array("保存md文件","保存HTML");
			mmeun.addSecondOption("下载",down,function(e){
				switch(e.innerHTML){
					case down[0]:
						/*submit(0);
						m.send("正在处理");
						setTimeout(function(){
							if(ajaxData["bool"]){
								console.log(ajaxData);
								window.open(ajaxData["url"]+".md","_brank");
							}
						},500);*/
						break;
					case down[1]:
						m.send("待实现");
						break;
				}
			});
			mmeun.addLine();
			var second=new Array("关于右键菜单","关于本站","关于作者");
			mmeun.addSecondOption("关于",second,function(e){
				console.log(e.innerHTML);
			});
			mmeun.addOption("取消",function(){});
			function submit(bool){
				if(isAmend){
					//修改
					bool=2;
				}
				var data={
					"issue":bool,//1发表 0保存草稿
					"data":getArticle(),
					"formerName":"",//原文件名
					"isAmend":isAmend,
					"aid":"<?php echo ($article['time']); ?>",
					"url":"<?php echo ($article['url']); ?>"
				}
				return publish(data);
			}
			//发表文章
			$("#publish_article").click(function(){
				submit(1);
			});
			//保存草稿
			$("#save_article").click(function(){
				m.send("功能不可用");
				//submit(0);
			});
			function getArticle(){
				var article={
					"article_title":$("#article_title").val(),
					"article_abstract":$("#article_abstract").val(),
					//"article_file_name":$("#article_file_name").val(),
					"article_type":$("#article_type").val(),
					"markdown":testEditor.getMarkdown(),
					"PreviewedHTML":testEditor.getPreviewedHTML()
					
				}
				return article;
			}
			function publish(data){
				$.ajax({
					url:"<?php echo U('Article/pushArticle');?>",
					type:"POST",
					data:{
						"articleData":data
					},
					async:true,//false是否异步
					dataType:"json",//返回数据类型
					success:function(e){
						m.send(e["info"]);
						if(e["bool"]){
							setTimeout(function(){
								window.location.href=e["data"]["url"];
							},1000);	
						}
						console.log(e);
						ajaxData=e;
					},//成功时调用
					error:function(err){
						m.send("出错了");
						console.log("err:");
						console.log(err);
					},
					timeout:"15000",//请求超时
				});
			}
			
		});
		</script>

		<link rel="stylesheet" type="text/css" href="/lanyueOS/MDBlog-Alpha/Home/Common/md.editor/css/editormd.css" />
		<link rel="stylesheet" type="text/css" href="/lanyueOS/MDBlog-Alpha/Home/Common/Common/Css/form-ui.css"/>
		<link rel="stylesheet" type="text/css" href="/lanyueOS/MDBlog-Alpha/Home/Common/Common/Css/header.css"/>
		<link rel="stylesheet" type="text/css" href="/lanyueOS/MDBlog-Alpha/Home/Common/Common/Css/md-ui.css"/>
		<style type="text/css">
			.editormd-menu > li > a{
				font-size:0.9em;
			}
			#editor_box{
				width:100%;
				height: auto;
				overflow: visible;
				z-index:100;
			}
			#editor{
				z-index:100;	
			}
			#article_header{
				width: 100%;
				height: auto;
				overflow: visible;
				border: solid 1px #E8E8E8;
				border-bottom: none;
				box-sizing:border-box;
				-moz-box-sizing:border-box;

			}
			#title{
				width: 100%;
				height: 50px;
				border-bottom: solid 1px #DDDDDD;
				line-height: 50px;
				margin-bottom: 5px;
			}
			#title h3{
				color:#434343;
				border-left: solid 5px #2196F3; 
			}
			#article_header .xiang{
				width: 100%;
				height: auto;
				overflow: visible;
			}
			.form-text-ui{

				width: 70%;
				min-width:200px; 
				height: 30px;
			}
			#editor{
				box-sizing:border-box;
				-moz-box-sizing:border-box;
			}
			.form-select-ui{
				float: left;
			}
			.form-ui-button{
				height: 30px;
				float: right;
				margin-right: 10px;
			}
			#botton{
				width:100%;
				height: auto;
				overflow: hidden;
			}
			.btns{
				display: none;
			}
			.select-ui-selected{
				padding-left: 5px;
			}
		</style>
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
					<?php echo ($note); ?>
                    <ul class="crumbs">
                        <li>当前位置：</li>
                        <li><a href=""><i class="fa fa-home fa-lg"></i>Home</a></li>
                        <li class="separate">&frasl;</li>
                        <li><a href="">编写文章</a></li>
                    </ul>
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
				<div class="col-9">
					<div id="editor_box">
						<div class="panel">
							<div class="panel-title">编写文章&nbsp;<i class="fa fa-pencil"></i></div>
							<div class="panel-content">
								<!-- <div id="title"><h3>编写文章</h3></div> -->
								<div id="article_header">
									<div class="xiang">
									<input type="text" class="form-ui-text" id="article_title" name="c3" title="文章标题:" value="<?php echo ($article['title']); ?>" placeholder="文章标题">
									</div>
									<div class="xiang">
										<input type="text" class="form-ui-text" id="article_abstract" name="c4" title="文章摘要:" value="<?php echo ($article['abstract']); ?>" placeholder="文章摘要">
									</div>
									<!-- <div class="xiang">
										<input type="text" class="form-ui-text" id="article_file_name" name="c3" title="文件名:" value="" placeholder="文件名(不需要写后缀)">
									</div> -->
									<div class="xiang">
										<div class="form-text-ui">
											<div class="form-ui-text">
												<select class="form-ui-select" id="article_type">
													<?php if(is_array($types)): foreach($types as $key=>$c): ?><option value="<?php echo ($c); ?>"><?php echo ($c); ?></option><?php endforeach; endif; ?>
												</select>
											</div>
											<div class="text-title">分类:</div>
										</div>
									</div>
								</div>
								<div id="editor"></div>
								<div id="botton">
									<input type="button" class="form-ui-button" id="save_article" name="c5" data-type="square" value="保存草稿">
									<input type="button" class="form-ui-button" id="publish_article" name="c6" data-type="square" value="发布博文">
								</div>
							</div>
							<div class="panel-footer"></div>
						</div>
					</div>
				</div>


			</div>
		</div>
		

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