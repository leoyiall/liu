<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="leo">
  <meta name="Keywords" content="you柠檬商城">
  <meta name="Description" content="You柠檬电子商城快速购物">
  <title>You柠檬商城供应商商品发布</title> 
  <link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/admin.css">
  <link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/reset.css">
  <script type="text/javascript"  src="__PUBLIC__/Js/jquery-1.5.1.js"></script>
  <!-- 引用fceditor编辑器的配置 -->
  <link rel="stylesheet" href="__PUBLIC__/ckeditor/themes/default/default.css" />
  <link rel="stylesheet" href="__PUBLIC__/ckeditor/plugins/code/prettify.css" />
  <script charset="utf-8" src="__PUBLIC__/ckeditor/kindeditor.js"></script>
  <script charset="utf-8" src="__PUBLIC__/ckeditor/lang/zh_CN.js"></script>
  <script charset="utf-8" src="__PUBLIC__/ckeditor/plugins/code/prettify.js"></script>
  <script>
    KindEditor.ready(function(K) {
      var editor1 = K.create('textarea[name="content"]', {
        cssPath : '__PUBLIC__/ckeditor/plugins/code/prettify.css',
        uploadJson : '__PUBLIC__/ckeditor/php/upload_json.php',
        fileManagerJson : '__PUBLIC__/ckeditor/php/file_manager_json.php',
        allowFileManager : true,
        afterCreate : function() {
          var self = this;
          K.ctrl(document, 13, function() {
            self.sync();
            K('form[name=example]')[0].submit();
          });
          K.ctrl(self.edit.doc, 13, function() {
            self.sync();
            K('form[name=example]')[0].submit();
          });
        }
      });
      prettyPrint();
    });
		onload=function(){

			// var ms=mdtool.messager();
			// 	ms.send("修改成功");
			var im=mdtool.ImageEditer();//使用父窗口变量
			var file=document.getElementById("file");
			var img=document.getElementById("img");
			file.onchange=function(e){
				if(file.files.length<=0){
					return;
				}
				im.setBlob(file.files[0],function(data){
					console.log(data);
					if(data.bool){
						im.zoom(80,80,function(e){
							//console.log(e["result"][0]);
							img.src=e["result"][0];

						});
					}
				});
			}
		}
    
  </script>

 </head>
 <body>
 <!-- 头部 -->
	   <link rel="icon" type="image/png" href="__PUBLIC__/Images/logo.ico">
 <script type="text/javascript" src="__PUBLIC__/Js/MDtool.js"></script>
 <!-- 顶部介绍 -->
  	<div class="Top_Jie">
  	  <div class="conWidth">
  		<div class="Top_left fl ">
			<a href="__ROOT__/index.php/Index" class="active" style="color:#EE0A3B">You柠檬商城首页</a>
  		</div>
  		<div class="Top_right fr">
			<div class="Top_me">
				<?php if($who == null): ?><a href="__APP__/Index/login">登录</a><a href="__APP__/Index/reg">注册</a>
				<?php else: ?>
					<a href="__APP__/Index/index"><?php echo ($who); ?></a><a href="__APP__/Index/back">退出</a><?php endif; ?>
			</div>
			<a href="__APP__/Store/index">我的店铺</a><span class="Top_gou"><a href="">购物车</a></span>
  		</div>
  	  </div>
  	</div>
<!-- 顶部个人信息 -->
	<div class="Top_mid Top_ys">
		<div class="conWidth">
			<div class="Top_logo fl">
				<a href="__ROOT__/index.php"><img src="__PUBLIC__/Images/logo.png" alt="You柠檬商城"></a>
			</div>
			<span class="Top_biao fl"><a href="__APP__/Gong/index">供应商主页</a></span>
		<!-- 搜索部分 -->
			<div class="Top_sou fr">
			<form action="__ROOT__/index.php/Index/search" method="post">
				<input type="text" class="Top_so" placeholder="最新最时尚的商品尽在You柠檬" name="shopName">
				<input type="submit" class="Top_btn" value="搜索">
			</form>
			</div>
		</div>
	</div>

	 	<div class="conWidth">
<!-- 左侧导航 -->
	    <link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/dao_js.css">

  <script type="text/javascript" src="__PUBLIC__/Js/jquery-1.5.1.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	var menuParent = $('.menu > .ListTitlePanel > div');//获取menu下的父层的DIV
	var menuList = $('.menuList');
	$('.menu > .menuParent > .ListTitlePanel > .ListTitle').each(function(i) {//获取列表的大标题并遍历
		$(this).click(function(){
			if($(menuList[i]).css('display') == 'none'){
				$(menuList[i]).slideDown(300);
			}
			else{
				$(menuList[i]).slideUp(300);
			}
		});
	});
});
</script>
 <!-- 左侧导航 -->
 	<div class="conWidth">
  		<div class="Dao_left fl">
	<div class="menu">
		<div class="menuParent">
			<div class="ListTitlePanel">
				<div class="ListTitle">
					<strong>个人中心</strong>
					<div class="leftbgbt2"> </div>
				</div>
			</div>
			<div class="menuList">
				<div> <a href="__ROOT__/admin.php/Gong/index">供应商主页</a></div>
				<div> <a href="__ROOT__/admin.php/Index/person">个人资料</a></div>
			</div>
		</div>	
		<div class="menuParent">
			<div class="ListTitlePanel">
				<div class="ListTitle">
					<strong>供应商管理</strong>
					<div class="leftbgbt"> </div>
				</div>
			</div>
			<div class="menuList">
				<div> <a href="__APP__/Gong/gong">供应商资料</a></div>
				<div> <a href="__APP__/Gong/ding">订单处理</a></div>
				<div> <a href="__APP__/Gong/store">供应的店铺</a></div>
			</div>
		</div>
<div class="menuParent">
			<div class="ListTitlePanel">
				<div class="ListTitle">
					<strong>商品管理</strong>
					<div class="leftbgbt2"> </div>
				</div>
			</div>
			<div class="menuList">
				<div> <a href="__APP__/Gong/sendShopping">发布商品</a></div>
				<div> <a href="__APP__/Gong/sendShopping2">发布商品附图</a></div>
				<div> <a href="__APP__/Gong/shoppingList">商品仓库</a></div>
			</div>
		</div>

		
	</div>
		</div>
	</div>

	<!-- 首页右侧部分 -->
	<div class="main_right main_height">
		<div class="person_list">
<div id="Con2">
	<!--按扭开始-->
	<div id="button" >
		<a  class="ys_tiao"><h1>发布商品</h1></a>
	</div>
	<!--按扭结束-->

	<!-- 发布自己的商品开始-->
	<div id="content2">
		<div class="txt_con"  style="display:block;">
			<form action="__APP__/Gong/do_send2" method="post" enctype="multipart/form-data">
			<table>
				<tr class="te_gao">
					<td  align="right"><h3>商品编号:</h3></td>
					<td><input type="text" name="shopNumber" class="person_wen"  placeholder="请输入商品编号"></td>
				</tr>
				<tr>
					<td  align="right"><h3>商品附加图上传:</h3></td>
					<td>	
					<p class="ti_shi ys_tiao">最多只能上传5张附加图！</p>
					<p><input type="file"  id="file" name="img1"></p>
					<p><input type="file"  id="file" name="img2"></p>
					<p><input type="file"  id="file" name="img3"></p>
					<p><input type="file"  id="file" name="img4"></p>
					<p><input type="file"  id="file" name="img5"></p>
			</td>
				</tr>		
				<tr>
					<td  colspan="2"><input type="submit" value="添加附图" class="ys_lan btn"></td>
				</tr>		
			</table>
			</form>
		</div>
		
	</div>
	<!--内容区结束-->
</div>
			
	</div>
	</div>
</div>


		<!-- 底部版权 -->
	<!-- 底部版权 -->
	<div class="footer">
	<div class="conWidth">
		<div class="footer_jie">
			<a href="" target="__blank">关于我们</a><a href="" target="__blank">招贤纳士</a><a href="" target="__blank">联系客服</a><a href="" target="__blank">廉政举报</a>
		</div>
		<div class="footer_ban">© 2013-2015 版权由You柠檬 所有</div>
	</div>
	</div>
 </body>
</html>