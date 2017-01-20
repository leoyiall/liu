#目录
[TOC]
#.创建编辑
#####.样式文件
```javascript
<link rel="stylesheet" href="./css/editormd.css" />
```
#####.HTML
```javascript
<div id="editor"></div>
```
#####.主要插件
```javascript
<script src="./js/jquery-2.1.3.min.js"></script>
<script src="./js/editormd.js"></script> 
```
#####.创建编辑器并配置
```javascript
<script type="text/javascript">
	$(function() {
	var testEditor = editormd("editor", {
		width: "90%",
		height: 740,
		path : './lib/',					//lib文件路径
		//theme : "dark",					//toobar主题
		//previewTheme : "dark",			//预览框主题
		//editorTheme : "pastel-on-dark",	//编辑框主题
		//markdown : "hello",				//设置markdown内容
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
		tocm : true,						// Using [TOCM] 开启拉伸目录
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
		imageUploadURL : "./php/upload.php",
		//事件
		/*onload : function() {
									console.log('onload', this);
									//this.fullscreen();
									//this.unwatch();
									//this.watch().fullscreen();

									//this.setMarkdown("#PHP");
									//this.width("100%");
									//this.height(480);
									//this.resize("100%", 640);
								}*/
	});
});
```
[========]
#.发布预览
#####.样式文件：
```html
<link rel="stylesheet" href="./css/editormd.preview.css" />
```
#####.需要插件：
```javascript
<script src="js/jquery-2.1.3.min.js"></script>
<script src="./lib/marked.min.js"></script>
<script src="./lib/prettify.min.js"></script>
<script src="./lib/raphael.min.js"></script>
<script src="./lib/underscore.min.js"></script>
<script src="./lib/sequence-diagram.min.js"></script>
<script src="./lib/flowchart.min.js"></script>
<script src="./lib/jquery.flowchart.min.js"></script>
<script src="./js/editormd.js"></script>
```
#####.HTML容器
```html
<div id="test-editormd-view">
	<textarea style="display:none;" name="test-editormd-markdown-doc">
	</textarea>               
</div>
```
#####.创建预览并配置
```javascript
<script type="text/javascript">
	$(function() {
		var testEditormdView;

		$.get("test.md", function(markdown) {
			//创建一个预览
			testEditormdView = editormd.markdownToHTML("test-editormd-view", {
				markdown        : markdown ,//+ "\r\n" + $("#append-test").text(),
				//htmlDecode      : true,       // 开启 HTML 标签解析，为了安全性，默认不开启
				htmlDecode      : "style,script,iframe",  // you can filter tags decode
				//toc             : false, //关闭目录
				tocm            : true,    // Using [TOCM]创建下拉目录
				tocContainer    : "#custom-toc-container", //自定义 ToC到指定容器层
				//gfm             : false,
				//tocDropdown     : true,
				// markdownSourceCode : true, // 是否保留 Markdown 源码，即是否删除保存源码的 Textarea 标签
				emoji           : true,		//开启表情解析
				taskList        : true,		//
				tex             : true,		// 默认不解析
				flowChart       : true,		// 默认不解析
				sequenceDiagram : true,		// 默认不解析
			});

		});
	});
</script>
```

[========]

