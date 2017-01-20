<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="leo">
  <meta name="Keywords" content="you柠檬商城">
  <meta name="Description" content="You柠檬电子商城快速购物">
  <title>You柠檬商城供应商资料</title> 
  <link rel="icon" type="image/png" href="__PUBLIC__/Images/logo.ico">
  <link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/admin.css">
  <link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/reset.css">

  <script type="text/javascript">
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
	<div class="main_right">
	<div class="person_main">
		<div class="person_title">
			供应商资料
		</div>
		<div class="person_list">
			<ul>
			<form action="__APP__/Gong/do_save" method="post" enctype="multipart/form-data">
				<li class="ling">
					<div class="person_left fl">供应商头像:</div>
					<div class="person_right fl">
					<input type="file" style="display:none;" id="file" name="img">
					<img src="__PUBLIC__/Images/tou/<?php echo ($gongImg); ?>" id="img">
			<label for="file">
				<div class="person_bian">编辑头像</div></a>
			</label>
					</div>
				</li>
				<li>
					<div class="person_left fl">供应商名称:</div>
					<div class="person_ww fl">
					<input type="text" class="person_wen"  name="storeName" placeholder="请输入商店名称" value="<?php echo ($gongName); ?>">
					</div>
				</li>
				<li>
					<div class="person_left fl">供应商地址:</div>
					<div class="person_ww fl">
					<input type="text" class="person_wen" placeholder="您还没输入商店地址" name="storeAddress" value="<?php echo ($gongAddress); ?>">
					</div>
				</li>
				<li>
					<div class="person_left fl">联系电话:</div>
					<div class="person_ww fl">
					<input type="text" class="person_wen" placeholder="您还没输入商店电话" name="storePhone" value="<?php echo ($gongPhone); ?>">
					</div>
				</li>
				<li>
					<div class="person_left fl">供应商类别:</div>
					<div class="person_sex fl">
					<select name="lei_store" class="xuan">
							<option value="<?php echo ($lei_gong); ?>"><?php echo ($lei_gong); ?></option>
							<?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vv["lei_name"]); ?>"><?php echo ($vv["lei_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
					</select>
					<span class="ti_shi ys_tiao">为了方便商店查找选择供应商，务必填写类别！</span>
					</div>
				</li>
				<li>
				<input type="submit" name="baocun" class="btn btn_se" style="margin-left:100px;" value="保存资料">
				</li>
				</form>
			</ul>
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