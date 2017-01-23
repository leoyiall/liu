<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>后盾网文章管理系统</title>

<link href="<?php echo Yii::app()->request->baseUrl ?>/assets/index/css/common.css" rel="stylesheet" />
</head>	
<body>
	<div id="top">
	</div>
	<div id="header">
		<div class='logo'>
			<a href=""><img src="<?php echo Yii::app()->request->baseUrl ?>/assets/index/images/logo.jpg" alt=""></a>
		</div>
		<div class='navigation'>
			<a href="<?php echo $this->createUrl("/") ?>">首页</a>
			<?php 
				$artModel = Article::model(); //创建一个模型
				$common = $artModel->common(); //去找它的共同方法
			 ?>
			 <?php foreach($common['nav'] as $v): ?>
			<a href="<?php echo $this->createUrl("category/index",array('cid'=>$v->cid)) ?>"><?php echo $v->cname; ?></a>
			 <?php endforeach ?>
		</div>
	</div>

	<?php echo $content ?>
	
	<div class='sidebar'>
			<div class='item'>
			<!-- duration 指的是时间 s -->
			<?php if($this->beginCache('title',array('duration'=>5))): ?>
				<h2>文章标题</h2>
				<ul class='flink'>
					 <?php foreach($common['title'] as $v): ?>
					<li><a href="<?php echo $this->createUrl("article/index",array('aid'=>$v->aid)) ?>"><?php echo $v->title; ?></a></li>
					 <?php endforeach ?>
				</ul>
			<?php $this->endCache();endif; ?>
			</div>
			
		</div>
	</div>
	<div id="footer">
		<div class='bgbar'></div>
		<div class='bottom'>
			<div class='pos'>
				<div class='copyright'>
					© Copyright leo
				</div>
			</div>	
		</div>
	</div>
</body>
</html>
