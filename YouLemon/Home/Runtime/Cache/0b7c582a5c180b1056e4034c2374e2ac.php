<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="leo">
  <meta name="Keywords" content="you柠檬商城">
  <meta name="Description" content="You柠檬电子商城快速购物">
  <title>You柠檬商城商品</title> 
  <!-- 放大镜和评论商品介绍页的切换 -->
<link href="__PUBLIC__/Css/base.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="__PUBLIC__/Js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/jquery.jqzoom.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/base.js"></script>
<!-- 右侧的JS -->
<script type="text/javascript" src="__PUBLIC__/Js/jquery.js"></script>
<script type="text/javascript">
$(function(){
	$(".yListr ul li em").click(function(){
		$(this).addClass("yListrclickem").siblings().removeClass("yListrclickem");
	})
})
</script>
<style type="text/css">
	#content .tupian img{width:770px;height:500px;}
</style>

</head>

<body class="grey">
<!-- 商城头部 -->
	<link type="text/css" rel="stylesheet" href="__PUBLIC__/Style/reset.css">
<link type="text/css" rel="stylesheet" href="__PUBLIC__/Style/main.css">
  <link rel="icon" type="image/png" href="__PUBLIC__/Images/logo.ico">
<!-- 头部 -->
<div class="headerBar">
  <div class="topBar">
    <div class="comWidth">
      <div class="rightArea">
      <?php if($who != null): ?><a href="__ROOT__/admin.php/Index/index"><?php echo ($who); ?></a>&nbsp;&nbsp;<a href="__ROOT__/admin.php/Index/back">退出</a>
        <?php else: ?> 
          欢迎来到You柠檬商城！<a href="__ROOT__/admin.php/Index/login">[登录]</a><a href="__ROOT__/admin.php/Index/reg">[注册]</a><?php endif; ?>
        <a href="__ROOT__/index.php/Index/gouwuche?ww=<?php echo ($who); ?>" class="zhu_ys">购物车</a>|<a href="__ROOT__/admin.php/Store/index" class="zhu_ys">我的店铺</a>|<a href="__ROOT__/admin.php/Gong/index" class="zhu_ys">我是供应商</a>
      </div>
    </div>
  </div>
  <div class="logoBar">
    <div class="comWidth">
      <div class="logo fl">
        <a href="__ROOT__/index.php/Index"><img src="__PUBLIC__/Images/logo.png" alt="You柠檬商城" class="fl"></a><h3 class="logo_zi fl">You柠檬商城</h3>
      </div>
      <div class="search_box fl">
        <form action="__ROOT__/index.php/Index/search" method="post">
          <input type="text" class="search_text fl" name="shopName" placeholder="最新最时尚的商品尽在You柠檬">
          <input type="submit" value="搜 索" class="search_btn fr">
        </form>
      </div>
    </div>
  </div>
<div class="navBox">
		<div class="comWidth clearfix">
			<div class="shopClass fl">
				<h3>全部商品分类&nbsp;&nbsp;<img src="__PUBLIC__/Images//icon/down.png"></h3>			
				</div>
			<ul class="nav fl">
				<li><a href="__APP__/Index/index" class="ac  mive">首页</a></li>
				<li><a href="__APP__/Index/gys" >供应商</a></li>
			</ul>
		</div>
	</div>
</div>

<div class="userPosition comWidth">
	<strong><a href="__ROOT__/index.php/Index">首页</a></strong>
	<span>&nbsp;&gt;&nbsp;</span>
	<a href="#"><?php echo ($lei_name); ?></a>
	<span>&nbsp;&gt;&nbsp;</span>
	<em><?php echo ($arr['0']['shopName']); ?></em>
</div>
<div class="description_info2 comWidth" style="background:#fff;height:470px;">
<div class="fl" style="width:353px;">
  <div id="preview" class="spec-preview"> <span class="jqzoom"><img jqimg="__PUBLIC__/Images/shop/<?php echo ($shopimg); ?>" src="__PUBLIC__/Images/shop/<?php echo ($shopimg); ?>" width="353"height="350"/></span> </div>
    <!--缩图开始-->
    <div class="spec-scroll"> <a class="prev">&lt;</a> <a class="next">&gt;</a>
      <div class="items">
        <ul>
          <li><img alt="<?php echo ($arr['0']['shopName']); ?>" bimg="__PUBLIC__/Images/shop/<?php echo ($shopimg); ?>" src="__PUBLIC__/Images/shop/<?php echo ($shopimg); ?>" onmousemove="preview(this);"></li>
          <li><img alt="<?php echo ($arr['0']['shopName']); ?>" bimg="__PUBLIC__/Images/shop/<?php echo ($arr3['0']['shopImg']); ?>" src="__PUBLIC__/Images/shop/<?php echo ($arr3['0']['shopImg']); ?>" onmousemove="preview(this);"></li>
          <li><img alt="<?php echo ($arr['0']['shopName']); ?>" bimg="__PUBLIC__/Images/shop/<?php echo ($arr3['0']['shopImg2']); ?>" src="__PUBLIC__/Images/shop/<?php echo ($arr3['0']['shopImg2']); ?>" onmousemove="preview(this);"></li>
          <li><img alt="<?php echo ($arr['0']['shopName']); ?>" bimg="__PUBLIC__/Images/shop/<?php echo ($arr3['0']['shopImg3']); ?>" src="__PUBLIC__/Images/shop/<?php echo ($arr3['0']['shopImg3']); ?>" onmousemove="preview(this);"></li>
          <li><img alt="<?php echo ($arr['0']['shopName']); ?>" bimg="__PUBLIC__/Images/shop/<?php echo ($arr3['0']['shopImg4']); ?>" src="__PUBLIC__/Images/shop/<?php echo ($arr3['0']['shopImg4']); ?>" onmousemove="preview(this);"></li>
        </ul>
      </div>
    </div>
    <!--缩图结束-->
  </div>
  <div class="fr" >
  <div class="yListr">
	<form>
		<ul>
			<li>
				<h3 class="des_content_tit"><?php echo ($arr['0']['shopName']); ?></h3>
			</li>
			<li>
				<div class="dt fl"><h1>原　价</h1></div>
				<div class="fl des_money" style="line-height:18px;padding-left:10px;">￥<?php echo ($arr['0']['shopPrice']); ?></div>
			</li>
			<li>
				<div class="dt fl"><h1>会员价</h1></div>
				<div class="fl des_money" style="line-height:18px;padding-left:10px;">￥<?php echo ($arr['0']['shopHuanjia']); ?></div>
			<li>
				<span>类型</span>
				<em class="yListrclickem"><input type="text" value="<?php echo ($arr2['0']['type1']); ?>" name="type1" style="border:none;cursor:pointer;"><i></i></em>
				<em><input type="text" value="<?php echo ($arr2['0']['type2']); ?>" name="type1" style="border:none;cursor:pointer;"><i></i></em>
				<em><input type="text" value="<?php echo ($arr2['0']['type3']); ?>" name="type1" style="border:none;cursor:pointer;"><i></i></em>
				<em><input type="text" value="<?php echo ($arr2['0']['type4']); ?>" name="type1" style="border:none;cursor:pointer;"><i></i></em>
			</li>
			<li>
				<span>尺寸</span>
				<em class="yListrclickem"><input type="text" value="<?php echo ($arr2['0']['size1']); ?>" name="type1" style="border:none;cursor:pointer;"><i></i></em>
				<em><input type="text" value="<?php echo ($arr2['0']['size2']); ?>" name="type1" style="border:none;cursor:pointer;"><i></i></em>
				<em><input type="text" value="<?php echo ($arr2['0']['size3']); ?>" name="type1" style="border:none;cursor:pointer;"><i></i></em>
				<em><input type="text" value="<?php echo ($arr2['0']['size4']); ?>" name="type1" style="border:none;cursor:pointer;"><i></i></em>
			</li>
			<li>
				<span>颜色</span>
				<em class="yListrclickem"><input type="text" value="<?php echo ($arr2['0']['color1']); ?>" name="type1" style="border:none;cursor:pointer;"><i></i></em>
				<em><input type="text" value="<?php echo ($arr2['0']['color2']); ?>" name="type1" style="border:none;cursor:pointer;"><i></i></em>
				<em><input type="text" value="<?php echo ($arr2['0']['color3']); ?>" name="type1" style="border:none;cursor:pointer;"><i></i></em>
				<em><input type="text" value="<?php echo ($arr2['0']['color4']); ?>" name="type1" style="border:none;cursor:pointer;"><i></i></em>
			</li>
			<li>
				<span>数量</span>
				<span><input type="text" value="1" name="shuliang" style="width:40px;text-align:center;"></span>						
			</li>
		</ul>
					<div class="shop_buy">
					<a href="__APP__/Index/dingdan?sname=<?php echo ($arr['0']['shopName']); ?>&sid=<?php echo ($arr['0']['shop_id']); ?>" class="buy_zhi" style="color:#fff;">立即购买</a>
					<span class="line"></span>
					 	<a href="__APP__/Index/addcar?sid=<?php echo ($shop_id); ?>&who=<?php echo ($username); ?>" class="buy_btn" ></a>
				</div> 
				<div class="notes">
					注意：此商品可提供普通发票，不提供增值税发票。
				</div>
	</form>
</div>
	</div>
 </div>
</div>

<div class="hr_15"></div>
<div class="des_info comWidth clearfix">
	<div class="leftArea">
		<div class="recommend">
		<!-- 商店介绍 -->
			<h3 class="tit"><?php echo ($store['0']['storeName']); ?></h3>
			<div class="item">
				<div class="item_cont">
					<div class="img_item">
						<a href="__APP__/Index/storeIntroduce?sid=<?php echo ($store['0']['store_id']); ?>&sname=<?php echo ($store['0']['storeName']); ?>&lname=<?php echo ($store['0']['lei_store']); ?>&sadd=<?php echo ($store['0']['storeAddress']); ?>&img=<?php echo ($store['0']['storeImg']); ?>&phone=<?php echo ($store['0']['storePhone']); ?>&nn=<?php echo ($store['0']['username']); ?>" target="_blank"><img src="__PUBLIC__/Images/tou/<?php echo ($store['0']['storeImg']); ?>" width="159" height="170" alt="<?php echo ($store['0']['storeName']); ?>"></a>
					</div>
					<p><a href="__APP__/Index/storeIntroduce?sid=<?php echo ($store['0']['store_id']); ?>&sname=<?php echo ($store['0']['storeName']); ?>&lname=<?php echo ($store['0']['lei_store']); ?>&sadd=<?php echo ($store['0']['storeAddress']); ?>&img=<?php echo ($store['0']['storeImg']); ?>&phone=<?php echo ($store['0']['storePhone']); ?>&nn=<?php echo ($store['0']['username']); ?>" target="_blank"><?php echo ($store['0']['storeAddress']); ?></a></p>
					<p class="money shop_enter"><a href="__APP__/Index/storeIntroduce?sid=<?php echo ($store['0']['store_id']); ?>&sname=<?php echo ($store['0']['storeName']); ?>&lname=<?php echo ($store['0']['lei_store']); ?>&sadd=<?php echo ($store['0']['storeAddress']); ?>&img=<?php echo ($store['0']['storeImg']); ?>&phone=<?php echo ($store['0']['storePhone']); ?>&nn=<?php echo ($store['0']['username']); ?>" target="_blank">进入商店</a></p>
				</div>
			</div>
			<div class="lie">
				<ul>
					<li class="di_wen"><span class="lie_wen">经营范围:</span><?php echo ($store['0']['lei_store']); ?></li>
					<li class="di_wen"><span class="lie_wen">工作时间:</span></li>
					<li>09:00-23:00 (每周一至周日) </li>
					<li>下午17点前订单当天可以发出</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="rightArea">
<div id="Con">
	<!--按扭开始-->
	<div id="button2" class="des_tit">
		<a  class="ck active fl" style="display:block;width:390px;cousor:pointer;text-align:center;"><span>产品介绍</span></a>
		<a style="display:block;width:390px;float:left;cousor:pointer;background:#ccc;text-align:center;"><span >产品评价</span></a>
	</div>
	<!--按扭结束-->

	<!--内容区开始-->
	<div id="content" >
		<div class="txt_con tupian"  style="display:block;background:#fff;">
			<?php echo ($arr['0']['shopSay']); ?>
		</div>
		<div class="txt_con" style="background:#fff;">

			<div class="review_listBox">
				<div class="review_list clearfix">
					<div class="review_userHead fl">
						<div class="review_user">
							<img src="__PUBLIC__/Images/userhead.jpg" alt="">
							<p>61***42</p>
							<p>金色会员</p>
						</div>
					</div>
					<div class="review_cont">
						<div class="review_t clearfix">
							<div class="starsBox fl"><span class="stars"></span><span class="stars"></span><span class="stars"></span><span class="stars"></span><span class="stars"></span></div>
							<span class="stars_text fl">5分 满意</span>
						</div>
						<p>商品不错，值得信赖</p>
						<p><a href="#" class="ding">顶(0)</a><a href="#" class="cai">踩(0)</a></p>
					</div>
				</div>
			
			</div>
		</div>
	</div>
	<!--内容区结束-->
</div>
<script type="text/javascript">
$("#button2 a").hover(function(){
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
<!-- 侧边栏 -->
<!-- 侧边栏css -->
<script type="text/javascript" src="__PUBLIC__/Js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/common.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/quick_links.js"></script>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/base.css" />

<!--右侧贴边导航quick_links.js控制-->
<div class="mui-mbar-tabs">
	<div class="quick_link_mian">
		<div class="quick_links_panel">
			<div id="quick_links" class="quick_links">
				<li>
					<a href="#" class="my_qlinks"><i class="setting"></i></a>
					<div class="ibar_login_box status_login">
						<div class="avatar_box">
							<p class="avatar_imgbox"><img src="__PUBLIC__/Images/no-img_mid_.jpg" /></p>
							<ul class="user_info">
								<li>用户名：sl19931003</li>
								<li>级&nbsp;别：普通会员</li>
							</ul>
						</div>
						<div class="login_btnbox">
							<a href="#" class="login_order">我的订单</a>
							<a href="#" class="login_favorite">我的收藏</a>
						</div>
						<i class="icon_arrow_white"></i>
					</div>
				</li>
				<li id="shopCart">
					<a href="#" class="message_list" ><i class="message"></i><div class="span">购物车</div><span class="cart_num">0</span></a>
				</li>
				<li>
					<a href="#" class="history_list"><i class="view"></i></a>
					<div class="mp_tooltip" style=" visibility:hidden;">我的资产<i class="icon_arrow_right_black"></i></div>
				</li>
				<li>
					<a href="#" class="mpbtn_histroy"><i class="zuji"></i></a>
					<div class="mp_tooltip">我的足迹<i class="icon_arrow_right_black"></i></div>
				</li>
				<li>
					<a href="#" class="mpbtn_wdsc"><i class="wdsc"></i></a>
					<div class="mp_tooltip">我的收藏<i class="icon_arrow_right_black"></i></div>
				</li>
				<li>
					<a href="#" class="mpbtn_recharge"><i class="chongzhi"></i></a>
					<div class="mp_tooltip">我要充值<i class="icon_arrow_right_black"></i></div>
				</li>
			</div>
			<div class="quick_toggle">
				<li>
					<a href="#"><i class="kfzx"></i></a>
					<div class="mp_tooltip">客服中心<i class="icon_arrow_right_black"></i></div>
				</li>
				<li>
					<a href="#none"><i class="mpbtn_qrcode"></i></a>
					<div class="mp_qrcode" style="display:none;"><img src="__PUBLIC__/Images/weixin_code_145.png" width="148" height="175" /><i class="icon_arrow_white"></i></div>
				</li>
				<li><a href="#top" class="return_top"><i class="top"></i></a></li>
			</div>
		</div>
		<div id="quick_links_pop" class="quick_links_pop hide"></div>
	</div>
</div>


<!--[if lte IE 8]>
<script src="js/ieBetter.js"></script>
<![endif]-->

<script type="text/javascript" src="__PUBLIC__/Js/parabola.js"></script>
<script type="text/javascript">
	$(".quick_links_panel li").mouseenter(function(){
		$(this).children(".mp_tooltip").animate({left:-92,queue:true});
		$(this).children(".mp_tooltip").css("visibility","visible");
		$(this).children(".ibar_login_box").css("display","block");
	});
	$(".quick_links_panel li").mouseleave(function(){
		$(this).children(".mp_tooltip").css("visibility","hidden");
		$(this).children(".mp_tooltip").animate({left:-121,queue:true});
		$(this).children(".ibar_login_box").css("display","none");
	});
	$(".quick_toggle li").mouseover(function(){
		$(this).children(".mp_qrcode").show();
	});
	$(".quick_toggle li").mouseleave(function(){
		$(this).children(".mp_qrcode").hide();
	});

// 元素以及其他一些变量
var eleFlyElement = document.querySelector("#flyItem"), eleShopCart = document.querySelector("#shopCart");
var numberItem = 0;
// 抛物线运动
var myParabola = funParabola(eleFlyElement, eleShopCart, {
	speed: 400, //抛物线速度
	curvature: 0.0008, //控制抛物线弧度
	complete: function() {
		eleFlyElement.style.visibility = "hidden";
		eleShopCart.querySelector("span").innerHTML = ++numberItem;
	}
});
// 绑定点击事件
if (eleFlyElement && eleShopCart) {
	
	[].slice.call(document.getElementsByClassName("btnCart")).forEach(function(button) {
		button.addEventListener("click", function(event) {
			// 滚动大小
			var scrollLeft = document.documentElement.scrollLeft || document.body.scrollLeft || 0,
			    scrollTop = document.documentElement.scrollTop || document.body.scrollTop || 0;
			eleFlyElement.style.left = event.clientX + scrollLeft + "px";
			eleFlyElement.style.top = event.clientY + scrollTop + "px";
			eleFlyElement.style.visibility = "visible";
			
			// 需要重定位
			myParabola.position().move();			
		});
	});
}
</script>
<!-- 以下是底部 -->
<!-- [底部版权] -->
<div class="hr_25"></div>
<div class="footer">
	<p><a href="#">You柠檬简介</a><i>|</i><a href="#">You柠檬客服</a><i>|</i> <a href="#">招纳贤士</a><i>|</i><a href="#">联系我们</a><i>|</i>客服热线：400-675-1234</p>
	<p>Copyright &copy; 2013 - 2016 You柠檬版权所有&nbsp;&nbsp;&nbsp;桂ICP备09037834号&nbsp;&nbsp;&nbsp;桂ICP证B1034-8373号&nbsp;&nbsp;&nbsp;某市公安局XX分局备案编号：123456789123</p>
	<p class="web"><a href="#"><img src="__PUBLIC__/Images/webLogo.jpg" alt="logo"></a><a href="#"><img src="__PUBLIC__/Images/webLogo.jpg" alt="logo"></a><a href="#"><img src="__PUBLIC__/Images/webLogo.jpg" alt="logo"></a><a href="#"><img src="__PUBLIC__/Images/webLogo.jpg" alt="logo"></a></p>
</div>
</body>
</html>