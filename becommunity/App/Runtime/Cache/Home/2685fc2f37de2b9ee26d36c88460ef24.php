<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>博客文章浏览量统计</title>
    <!-- 引入 echarts.js -->
<script type="text/javascript" src="__PUBLIC__/js/jquery-2.1.3.min.js"></script>
    <script src="__PUBLIC__/echarts/echarts.min.js"></script>
</head>
<body>
    <!-- 为ECharts准备一个具备大小（宽高）的Dom -->
    <div id="main" style="width: 100%;height:600px;"></div>
    <script type="text/javascript">
        // 基于准备好的dom，初始化echarts实例
        var myChart = echarts.init(document.getElementById('main'));

        $.get('doSight').done(function (data) {
            console.log(data);
            var xAxisData=[];
            var znum = [];
            for(var i in data){
                xAxisData.push(data[i].title);
                znum.push(data[i].sight);
            }
            myChart.setOption({
                title: {
                    text: '前30浏览最多的文章统计'
                },
                tooltip: {},
                legend: {
                    data:['浏览最多的文章统计']
                },
                xAxis: {
                    data: xAxisData
                },
                yAxis: {},
                series: [{
                    name: '浏览数',
                    type: 'bar',
                    data: znum
                }]
            });
        });
    </script>
</body>
</html>