<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
  <head>
    <base href="<%=basePath%>">
    
    <title>博客相关统计</title>
    
	<meta http-equiv="pragma" content="no-cache">
	<meta http-equiv="cache-control" content="no-cache">
	<meta http-equiv="expires" content="0">    
	<meta http-equiv="keywords" content="keyword1,keyword2,keyword3">
	<meta http-equiv="description" content="This is my page">
	<!--
	<link rel="stylesheet" type="text/css" href="styles.css">
	-->
	<script type="text/javascript" src="__PUBLIC__/char/jquery-1.5.2.min.js"></script>
    <script type="text/javascript" src="__PUBLIC__/char/highcharts.js"></script>
    <!-- 
    <script type="text/javascript" src="__PUBLIC__/char/theme/gray.js"></script>
    <script type="text/javascript" src="__PUBLIC__/char/theme/dark-blue.js"></script>
    <script type="text/javascript" src="__PUBLIC__/char/theme/dark-green.js"></script>
    -->
    <script type="text/javascript" src="__PUBLIC__/char/theme/grid.js"></script>
    <link rel="stylesheet" href="__PUBLIC__/css/bootstrap.css" />
    <link rel="icon" href="__PUBLIC__/images/ico.png">
<style>
	body{
		background:url("__PUBLIC__/images/bg1.jpg");
	}
	.containers{
		min-height: 500px;
		width: 90%;
		margin: 30px auto;
	}
	.containers .title{
		width:100%;
		padding:20px;
		border:1px solid #ccc;
		background-color: rgba(255,255,255,0.8);
		border-radius: 5px;
		margin-bottom:30px;
	}
	.froms{
		margin:0 auto;
	}
	.forms select{
		margin-top:5px;
		line-height: 30px;
	}

</style>
<link rel="stylesheet" href="__PUBLIC__/css/question.css" media="all" />
  </head>
  
<body>
<div class='navbar'>
  <div class='navbar-inner'>
    <div class='container'>
      <a class='brand' href='/'>
          <img src="__PUBLIC__/images/logo.png" width="100" height="30"/>
      </a>

      <form id='search_form' class='navbar-search' action="<?php echo U('search');?>" style="margin-left:10px;">
  <input type='text' id='q' name='q' class='search-query span3' value='' style="height:26px;">
</form>
      <ul class='nav pull-right'>
        <li><a href='__ROOT__/index.php'>首页</a></li>
        
        <li><a href="<?php echo U('Blog/index');?>" target="_blank">博客</a></li>
        <li><a href='<?php echo U("question/index");?>'>问答</a></li>
        
        <li><a href="<?php echo U('Community/index');?>" target="_blank" target="_blank">社区</a></li>
        <li><a href="<?php echo U('Index/index');?>" target="_blank">资讯</a></li>
        <li><a href="<?php echo U('Programme/index');?>" target="_blank">编程库</a></li>
        <li><a href="<?php echo U('Code/index');?>" target="_blank">源码</a></li>
        <li><a href="<?php echo U('Index/down');?>" target="_blank">软件</a></li>
         <?php if($idnumber): ?><li>
            <?php if($ll['nicheng']): ?><a href="<?php echo U('personCenter');?>?id=<?php echo ($idnumber); ?>"><?php echo ($ll['nicheng']); ?></a>
            <?php else: ?>
        <a href="<?php echo U('personCenter');?>?id=<?php echo ($idnumber); ?>"><?php echo ($idnumber); ?></a><?php endif; ?>
            </li>
            <li><a href="<?php echo U('addQuestion');?>?id=<?php echo ($idnumber); ?>">发布问题</a></li>
            <li><a href="<?php echo U('Common/logout');?>">退出</a></li>
            <!-- <li><a href="<?php echo U('xiaoxi');?>?id=<?php echo ($idnumber); ?>">消息(<span class="color">0</span>)</a></li> -->
          <?php else: ?>
              <li><a href="<?php echo U('Common/login');?>?l=question">登录</a></li>
              <li><a href="<?php echo U('Common/reg');?>">注册</a></li><?php endif; ?>
         </ul>
      <a class="btn btn-navbar" id="responsive-sidebar-trigger">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
    </div>
  </div>
</div>

<!-- 直接一个外包宽起来 -->
<div class="containers">
	<div class="title form-group">

		<form  action="" method="post" class="forms">
			统计项:
			<select name="tj" id="tj" style="width:10%;">
			  <option value="perfect">赞</option>
			  <option value="sight">浏览</option>
			  <option value="znum">转载</option>
	<!-- 		  <option value="prev">技术前沿</option> -->
			</select>
			时间段选择:
	<input type="date" name="start" style="background:#fff;height:30px;line-height:30px;width:18%;" />
			—
	<input type="date" name="end" style="background:#fff;height:30px;line-height:30px;width:18%;" />
			类型:
			<select name="leixing" id="lx" style="width:10%;">
			  <option value=" ">曲线图</option>
			  <option value="2">柱状图</option>
			 <!--  <option value="3">饼状图</option>
			 <option value="4">增长图</option>
			 <option value="5">平滑曲线</option>
			 <option value="6">填充图</option>
			 <option value="7">点位图</option> -->
			</select>
			条数:
			<select name="tiaoshu" id="ts" style="width:10%;">
			  <option value="10">10条</option>
			  <option value="25">25条</option>
			  <option value="50">50条</option>
			  <option value="100">100条</option>
			</select>
			<input type="button" value="统计"  class="btn btn-default" id="tongji"/>
			<input type="button"  value="打印" class="btn btn-primary" onclick="window.print();"/>
		</form>
	</div>
    <div id="container" class="tubiao" style="display:none;">
    </div>
    <div id="container2" class="tubiao" style="display:none;">
    </div>
    <div id="container3" class="tubiao" style="display:none;">
    </div>
    <div id="container7" class="tubiao" style="display:none;">
    </div>
    <div id="container4" class="tubiao" style="display:none;">
    </div>
    <div id="container5" class="tubiao" style="display:none;">
    </div>
    <div id="container6" class="tubiao" style="display:none;">
    </div>
    <div id="container8" class="tubiao" style="display:none;">
    </div>
    <div id="container9" class="tubiao" style="display:none;">
    </div>
    <div id="container10" class="tubiao" style="display:none;">
    </div>
</div>
  </body>
</html>
<script type="text/javascript">
	$("#tongji").click(function(){
		var tj = $("#tj").val();

		if(tj == "sight"){
			var title = "博客浏览量统计";
		}else if(tj == "znum"){
			var title = "博客转发数量统计";
		}else if(tj == "prev"){
			var title = "技术前沿统计";
		}else{
			var title = "博客赞数量的统计";
		}
		var lx = $("#lx").val();
		var	ts = $("#ts").val();
		$.ajax({
			url:"<?php echo U('doOther');?>", 
			type:'post',
			data:{
				tj:tj,
				ts:ts,
				start:$("input[name='start']").val(),
				end:$("input[name='end']").val(),
			},
			success:function(e){
				console.log(e);
				$(".tubiao").hide();
				$("#container"+lx).css("display","block");
				var xAxisData=[];
				var znum = [];
				for(var i in e){
				    xAxisData.push(e[i].nicheng);
				    znum.push(e[i].sight);
				    znum.push(e[i].perfect);
				    znum.push(e[i].znum);
				    znum.push(e[i].prev);
				}
				var i = 0 ;
				var length = e.titles.length;
				var titles = [];
			for(;i<length;i++){
				titles[i] = e.titles[i].slice(0,6)+"...";
			}

var chart;

categories = titles;
//折线图示例
    chart = new Highcharts.Chart({
        chart: {
            renderTo: 'container',          //放置图表的容器
            plotBackgroundColor: null,
            plotBorderWidth: null,
            defaultSeriesType: 'line'   
        },
        title: {
            text: title
        },
        subtitle: {
            text: '统计量'
        },
        xAxis: {//X轴数据
            categories: titles,
            labels: {
                rotation: -45, //字体倾斜
                align: 'right',
                style: { font: 'normal 13px 宋体' }
            }
        },
        yAxis: {//Y轴显示文字
            title: {
                text: '点击/次'
            }
        },
        tooltip: {
            enabled: true,
            formatter: function() {
                return '<b>' + this.x + '</b><br/>' + this.series.name + ': ' + Highcharts.numberFormat(this.y, 1);
            }
        },
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: true//是否显示title
            }
        },
        series: [{
            name: '浏览',
            data: e.sight
        }, {
            name: '点赞',
            data: e.perfect
        }, {
            name: '转载',
            data: e.znum
        }]
    });
//柱状图图示例
chart = new Highcharts.Chart({
                chart: {
                    renderTo: 'container2',          //放置图表的容器
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    defaultSeriesType: 'column' //图表类型line, spline, area, areaspline, column, bar, pie , scatter 
                },
                title: {
                    text: title
                }, 
                xAxis: {//X轴数据
                    categories: categories,
                    labels: {
                        rotation: -45, //字体倾斜
                        align: 'right',
                        style: { font: 'normal 13px 宋体' }
                    }
                },
                yAxis: {//Y轴显示文字
                    title: {
                        text: '点击/次'
                    }
                },
                tooltip: {
                    enabled: true,
                    formatter: function() {
                        return '<b>' + this.x + '</b><br/>' + this.series.name + ': ' + Highcharts.numberFormat(this.y, 1) + "次";
                    }
                },
                plotOptions: {
                    column: {
                        dataLabels: {
                            enabled: true
                        },
                        enableMouseTracking: true//是否显示title
                    }
                },
                series: [{
                    name: '浏览',
                    data: e.sight
                }, {
                    name: '点赞',
                    data: e.perfect
                }, {
                    name: '转载',
                    data: e.znum
                }]
              });
		},
		error:function(e){
			console.log(e);
		}
	});
});
</script>


 <div id="footer">
 	<!-- 底部版权 -->
<div class="col-log-12 col-md-12 col-sm-12 col-xs-12 footer" style="background-color: #272822;">
	<div class="container">
		<div class="footer-intro text-center">
			<img src="__PUBLIC__/images/logo.png" alt=""><br>
			<a href="">关于我们</a> | 
			<a href="">广告合作</a> | 
			<a href="">免责声明</a> 
		</div>
		<hr/>
		<div class="col-log-12 col-md-12 col-sm-12 col-xs-12 footer-copyright text-center" style="color:#eee;">
			Copyright © 2015-2016 · All Rights Reserved · Be程序员 · 京ICP备18932151
		</div>
	</div>
</div>
 </div>
</body>
</html>