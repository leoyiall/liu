<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="leo">
  <meta name="Keywords" content="you柠檬商城">
  <meta name="Description" content="You柠檬电子商城快速购物">
  <title>用户后台收货地址</title> 
  <link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/admin.css">
  <link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/reset.css">
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
	<div class="Top_mid">
		<div class="conWidth">
			<div class="Top_logo fl">
				<a href="__ROOT__/index.php/Index"><img src="__PUBLIC__/Images/logo.png" alt="You柠檬商城"></a>
			</div>
			<span class="Top_biao fl"><a href="__APP__/Index/">个人主页</a></span>
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
					<div class="leftbgbt"> </div>
				</div>
			</div>
			<div class="menuList">
				<div> <a href="__APP__/Index/index">个人主页</a> </div>
				<div> <a href="__APP__/Index/safe">安全设置</a></div>
				<div> <a href="__APP__/Index/person">个人资料 </a> </div>
				<div> <a href="__APP__/Index/address">收货地址</a></div>
				<div> <a href="__APP__/Index/pingjia">我的评价 </a> </div>	
			</div>
		</div>
<div class="menuParent">
			<div class="ListTitlePanel">
				<div class="ListTitle">
					<strong>相关开通</strong>
					<div class="leftbgbt2"> </div>
				</div>
			</div>
			<div class="menuList">
				<div> <a href="__APP__/Store/index">我的店铺</a></div>
				<div> <a href="__APP__/Gong/index">我是供应商</a></div>
			</div>
		</div>
		<div class="menuParent">
			<div class="ListTitlePanel">
				<div class="ListTitle">
					<strong>货物查询</strong>
					<div class="leftbgbt2"> </div>
				</div>
			</div>
			<div class="menuList">
				<div> <a href="__APP__/Index/lookShop">待付款</a></div>
				<div> <a href="__APP__/Index/lookShop">待发货</a></div>
				<div> <a href="__APP__/Index/lookShop">待收货</a></div>
				<div> <a href="__APP__/Index/lookShop">待评价</a></div>
			</div>
		</div>
		<div class="menuParent">
			<div class="ListTitlePanel">
				<div class="ListTitle">
					<strong>购物历史</strong>
					<div class="leftbgbt2"> </div>
				</div>
			</div>
			<div class="menuList">
				<div> <a href="__APP__/Index/buyShop">购物记录</a></div>
			</div>
		</div>
		
	</div>
		</div>
	</div>

	<!-- 首页右侧部分 -->
	<div class="main_right">
		<div class="person_main">
			<div class="person_title">
				收货地址
			</div>
		<div class="address_list">
		<form action="__APP__/Index/save_address" method="post">
			<table>
			<tr><td colspan="2" class="add_zhong">以下信息均是必填项,为了您能收到快件,请正确填写！</td></tr>
				<tr>
					<td align="right">收货人&nbsp;</td>
					<td>
						<input type="text" placeholder="请填写正确的收货人姓名" name="shouhuoren" class="address_you" value="<?php echo ($shouWho); ?>">
					</td>
				</tr>		
				<tr>
					<td align="right">所在地区&nbsp;</td>
					<td><select name="area" class="xuan">
						<option value="中国大陆">中国大陆</option>
						</select>
					<select name="sheng" class="xuan">
						<option value="<?php echo ($area); ?>"><?php echo ($area); ?></option>
						<option value="北京市">北京市</option>
						<option value="天津市">天津市</option>
						<option value="上海市">上海市</option>
						<option value="重庆市">重庆市</option>
						<option value="河北省">河北省</option>
						<option value="河南省">河南省</option>
						<option value="云南省">云南省</option>
						<option value="辽宁省">辽宁省</option>
						<option value="黑龙江省">黑龙江省</option>
						<option value="湖南省">湖南省</option>
						<option value="安徽省">安徽省</option>
						<option value="山东省">山东省</option>
						<option value="新疆维吾尔">新疆维吾尔</option>
						<option value="江苏省">江苏省</option>
						<option value="浙江省">浙江省</option>
						<option value="江西省">江西省</option>
						<option value="湖北省">湖北省</option>
						<option value="广西壮族">广西壮族</option>
						<option value="甘肃省">甘肃省</option>
						<option value="山西省">山西省</option>
						<option value="内蒙古">内蒙古</option>
						<option value="陕西省">陕西省</option>
						<option value="福建省">福建省</option>
						<option value="贵州省">贵州省</option>
						<option value="广东省">广东省</option>
						<option value="青海省">青海省</option>
						<option value="西藏">西藏</option>
						<option value="四川省">四川省</option>
						<option value="宁夏回族">宁夏回族</option>
						<option value="海南省">海南省</option>
						<option value="台湾省">台湾省</option>
						<option value="香港特别行政区">香港特别行政区</option>
						<option value="澳门特别行政区">澳门特别行政区</option>
						</select>
					</td>
				</tr>
				<tr>
					<td align="right">详细地址&nbsp;</td>
					<td>
						<textarea name="xiang" class="xuan address_text"  placeholder="建议您如实填写详细收货地址，如城市,街道名称，门牌号码，楼层和房间号等信息。" rows="3" cols="40"><?php echo ($xiangArea); ?></textarea>
					</td>
				</tr>
				<tr>
					<td align="right">邮政编码&nbsp;</td>
					<td>
						<input type="text" value="<?php echo ($youBian); ?>" placeholder="请填写正确的邮政编号" name="stamp" class="address_you">
					</td>
				</tr>
				<tr>
					<td align="right">手机号码&nbsp;</td>
					<td>
						<input type="text" placeholder="请填写正确的手机号码" value="<?php echo ($phone); ?>" name="phone" class="address_you">
					</td>
				</tr>	
				<tr>
					<td align="right">固定电话&nbsp;</td>
					<td>
						<input type="text" value="<?php echo ($guPhone); ?>" placeholder="请填写正确的固定电话" name="guphone" class="address_you"><span class="add_zhong">(手机和固定电话必填其一)</span>
					</td>
				</tr>	
			</table>
			<div class="address_gao">
				<input type="submit"  class="btn" value="保存地址">
			</div>
		</form>

		<!-- 地址列表 -->
			<div class="address_title add_zhong">
				您保存的收货地址列表（只可以保存1个地址）
			</div>
		<div class="address_lie">

			<table>
				<tr>
					<th width="50">收货人</th>
					<th width="100">所在地区</th>
					<th width="300">详细地址</th>
					<th width="50">邮编</th>
					<th width="100">手机号码</th>
					<th width="100">固定电话</th>
					<th width="100">操作</th>
				</tr>
				<tr>
					<td><?php echo ($shouWho); ?></td>
					<td><?php echo ($area); ?></td>
					<td><?php echo ($xiangArea); ?></td>
					<td><?php echo ($youBian); ?></td>
					<td><?php echo ($phone); ?></td>
					<td><?php echo ($guPhone); ?></td>
					<td>
				<a href="__APP__/Index/del?id=<?php echo ($address_id); ?>" onclick="return confirm('真的要删除吗？');">删除</a>
					</td>
				</tr>
			</table>
		</div>

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