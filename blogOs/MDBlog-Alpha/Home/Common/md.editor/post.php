<!doctype html>
<html>
	<head>
		<title>网页标题</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<!--<link type="text/css" rel="stylesheet" href="./lib/codemirror/codemirror.min.css">
		<link type="text/css" rel="stylesheet" href="./lib/codemirror/addon/dialog/dialog.css">
		<link type="text/css" rel="stylesheet" href="./lib/codemirror/addon/search/matchesonscrollbar.css">
		<link type="text/css" rel="stylesheet" href="./lib/codemirror/addon/fold/foldgutter.css">
		<script id="-lib-codemirror-codemirror-min" type="text/javascript" src="./lib/codemirror/codemirror.min.js"></script>
		<script id="-lib-codemirror-modes-min" type="text/javascript" src="./lib/codemirror/modes.min.js"></script>
		<script id="-lib-codemirror-addons-min" type="text/javascript" src="./lib/codemirror/addons.min.js"></script>
		-->
		<script type="text/javascript" src=""></script>
		<link rel="stylesheet" href="./css/editormd.css" />
		<style type="text/css">
		 *{margin:0 auto}
		#box{
			width:90%;
			height:auto;
			overflow:hidden;
		}
		</style>
	</head>
	<body>
		<!--class必须是markdown-body editormd-preview-container editormd-preview-active-->
		<div id="box" class="markdown-body editormd-preview-container editormd-preview-active">
			<?php
				//编辑器id为：Markdown
				if (isset($_POST['submit'])) {
					//echo "<pre>";
					//输出Markdown编辑器内容
					//echo htmlspecialchars($_POST["Markdown-markdown-doc"]);
					//输出编译后html
					echo ($_POST["Markdown-html-code"]);
					//echo "</pre>";
				}
			?>
		</div>
	</body>
</html>