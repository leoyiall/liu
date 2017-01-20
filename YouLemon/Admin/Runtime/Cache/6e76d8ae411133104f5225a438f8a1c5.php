<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="leo">
  <meta name="Keywords" content="you柠檬商城">
  <meta name="Description" content="You柠檬电子商城快速购物">
  <title>You柠檬店铺店家评价回复管理</title> 
  <link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/admin.css">
  <link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/reset.css">
  <script type="text/javascript"  src="__PUBLIC__/Js/jquery-1.5.1.js"></script>
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
	<div class="Top_mid Top_yanse">
		<div class="conWidth">
			<div class="Top_logo fl">
				<a href="__ROOT__/index.php"><img src="__PUBLIC__/Images/logo.png" alt="You柠檬商城"></a>
			</div>
			<span class="Top_biao fl"><a href="__APP__/Store/">店铺主页</a></span>
		<!-- 搜索部分 -->
			<div class="Top_sou fr">
			<form action="" method="get">
				<input type="text" class="Top_so" placeholder="商品搜索" name="soso">
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
				<div> <a href="__ROOT__/admin.php/Store/index">店铺主页</a></div>
				<div> <a href="__ROOT__/admin.php/Index/person">个人资料</a></div>
			</div>
		</div>	
		<div class="menuParent">
			<div class="ListTitlePanel">
				<div class="ListTitle">
					<strong>店铺管理</strong>
					<div class="leftbgbt"> </div>
				</div>
			</div>
			<div class="menuList">
				<div> <a href="__APP__/Store/store">店铺资料</a></div>
				<div> <a href="__APP__/Store/ding">订单处理</a></div>
				<div> <a href="__ROOT__/index.php/Index/gys">我的供应商</a></div>
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
				<div> <a href="__APP__/Store/sendShopping">发布商品</a></div>
				<div> <a href="__APP__/Store/sendShopping2">发布商品附图</a></div>
				<div> <a href="__APP__/Store/sendGong">发布供应商商品</a></div>
				<div> <a href="__APP__/Store/shoppingList">商品列表</a></div>
				<div> <a href="__APP__/Store/shoppingPing">商品评价</a></div>
				<div> <a href="__APP__/Store/shoppingTong">销售统计</a></div>
			</div>
		</div>

		
	</div>
		</div>
	</div>

	<!-- 首页右侧部分 -->
	<div class="main_right">
		<div class="person_list">
<div id="Con">
	<!--按扭开始-->
	<div id="button2">
		<a  class="ck">我的回复</a>
		<a>买家的评价</a>
	</div>
	<!--按扭结束-->

	<!-- 我的评价内容区开始-->
	<div id="content">
	<!-- 我的评价 -->
		<div class="txt_con"  style="display:block;">
		<table>
			<tr>
				<th width="350">回复内容</th>
				<th width="105">回复时间</th>
				<th width="165">回复人</th>
				<th width="165">宝贝信息</th>
				<th width="65">操作</th>
			</tr>
			<tr>
				<td>
				<div class="ping_nei">服务器很好，很值的范德萨拉法基了多少积分了的时间了发动机是了福建省的拉法基上当了及分离的世界发了圣诞节发了多少家乐福卡圣诞节啊了房价单身了快放假上当了放假了的设计费了的设计费克林顿睡觉啊了房价单身了
				</div>
				</td>
				<td>
					<p class="ping_time">[2015-10-31 22:55:01]</p>
				</td>
				<td>
					<div class="ping_mai">
					卖家：<a href="">2012You</a>
					</div>
				</td>
				<td>
				<div class="ping_baby">
					<a href="">高品质 香港 美国 免备案网站空间 虚拟主机全年仅此...</a>
				</div>
				</td>
				<td>
					<div class="ping_cao">
				<a href="">删除评价</a>
					</div>
				</td>
			</tr>
			<tr>
				<td>
				<div class="ping_nei">服务器很好，很值的范德萨拉法基了多少积分了的时间了发动机是了福建省的拉法基上当了及分离的世界发了圣诞节发了多少家乐福卡圣诞节啊了房价单身了快放假上当了放假了的设计费了的设计费克林顿睡觉啊了房价单身了
				</div>
				</td>
				<td>
					<p class="ping_time">[2015-10-31 22:55:01]</p>
				</td>
				<td>
					<div class="ping_mai">
					卖家：<a href="">2012You</a>
					</div>
				</td>
				<td>
				<div class="ping_baby">
					<a href="">高品质 香港 美国 免备案网站空间 虚拟主机全年仅此...</a>
				</div>
				</td>
				<td>
					<div class="ping_cao">
				<a href="">删除评价</a>
					</div>
				</td>
			</tr>
			<tr>
				<td>
				<div class="ping_nei">服务器很好，很值的范德萨拉法基了多少积分了的时间了发动机是了福建省的拉法基上当了及分离的世界发了圣诞节发了多少家乐福卡圣诞节啊了房价单身了快放假上当了放假了的设计费了的设计费克林顿睡觉啊了房价单身了
				</div>
				</td>
				<td>
					<p class="ping_time">[2015-10-31 22:55:01]</p>
				</td>
				<td>
					<div class="ping_mai">
					卖家：<a href="">2012You</a>
					</div>
				</td>
				<td>
				<div class="ping_baby">
					<a href="">高品质 香港 美国 免备案网站空间 虚拟主机全年仅此...</a>
				</div>
				</td>
				<td>
					<div class="ping_cao">
				<a href="">删除评价</a>
					</div>
				</td>
			</tr>
		</table>
			<div class="ping_ye">
					<a href="">第一页</a>
					<a href="">1 2 3</a>
					<a href="">尾页</a>
			</div>
		</div>
		<!-- 买家评论 -->
		<div class="txt_con">
		<table>
			<tr>
				<th width="350">买家评论内容</th>
				<th width="105">买家评论时间</th>
				<th width="165">评论人</th>
				<th width="165">宝贝信息</th>
			</tr>
			<tr>
				<td>
				<div class="ping_nei">服务器很好，很值的范德萨拉法基了多少积分了的时间了发动机是了福建省的拉法基上当了及分离的世界发了圣诞节发了多少家乐福卡圣诞节啊了房价单身了快放假上当了放假了的设计费了的设计费克林顿睡觉啊了房价单身了
				</div>
				</td>
				<td>
					<p class="ping_time">[2015-10-31 22:55:01]</p>
				</td>
				<td>
					<div class="ping_mai">
					卖家：<a href="">2012You</a>
					</div>
				</td>
				<td>
				<div class="ping_baby">
					<a href="">高品质 香港 美国 免备案网站空间 虚拟主机全年仅此...</a>
				</div>
				</td>

			</tr>
			<tr>
				<td>
				<div class="ping_nei">服务器很好，很值的范德萨拉法基了多少积分了的时间了发动机是了福建省的拉法基上当了及分离的世界发了圣诞节发了多少家乐福卡圣诞节啊了房价单身了快放假上当了放假了的设计费了的设计费克林顿睡觉啊了房价单身了
				</div>
				</td>
				<td>
					<p class="ping_time">[2015-10-31 22:55:01]</p>
				</td>
				<td>
					<div class="ping_mai">
					卖家：<a href="">2012You</a>
					</div>
				</td>
				<td>
				<div class="ping_baby">
					<a href="">高品质 香港 美国 免备案网站空间 虚拟主机全年仅此...</a>
				</div>
				</td>
			</tr>
			<tr>
				<td>
				<div class="ping_nei">服务器很好，很值的范德萨拉法基了多少积分了的时间了发动机是了福建省的拉法基上当了及分离的世界发了圣诞节发了多少家乐福卡圣诞节啊了房价单身了快放假上当了放假了的设计费了的设计费克林顿睡觉啊了房价单身了
				</div>
				</td>
				<td>
					<p class="ping_time">[2015-10-31 22:55:01]</p>
				</td>
				<td>
					<div class="ping_mai">
					卖家：<a href="">2012You</a>
					</div>
				</td>
				<td>
				<div class="ping_baby">
					<a href="">高品质 香港 美国 免备案网站空间 虚拟主机全年仅此...</a>
				</div>
				</td>
			</tr>
		</table>
			<div class="ping_ye">
					<a href="">第一页</a>
					<a href="">1 2 3</a>
					<a href="">尾页</a>
			</div>
		</div>
	</div>
	<!--内容区结束-->
</div>

<script type="text/javascript">
$("#button2 a").click(function(){
	$("#button2 a").removeClass("ck");
	$(this).addClass("ck");

	var div={};
	div=$("#content .txt_con");
	for(var i=0;i<2;i++){
		if(i==$(this).index()){
		div.eq(i).show();
		}else{
		div.eq(i).hide();}
	}
	
});

</script>					
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