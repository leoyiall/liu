#Ŀ¼
[TOC]
#.�����༭
#####.��ʽ�ļ�
```javascript
<link rel="stylesheet" href="./css/editormd.css" />
```
#####.HTML
```javascript
<div id="editor"></div>
```
#####.��Ҫ���
```javascript
<script src="./js/jquery-2.1.3.min.js"></script>
<script src="./js/editormd.js"></script> 
```
#####.�����༭��������
```javascript
<script type="text/javascript">
	$(function() {
	var testEditor = editormd("editor", {
		width: "90%",
		height: 740,
		path : './lib/',					//lib�ļ�·��
		//theme : "dark",					//toobar����
		//previewTheme : "dark",			//Ԥ��������
		//editorTheme : "pastel-on-dark",	//�༭������
		//markdown : "hello",				//����markdown����
		codeFold : true,					//�����༭�������۵�
		//syncScrolling : false,
		saveHTMLToTextarea : true,			//���� HTML �� Textarea
		searchReplace : true,				//��������
		//readOnly : true,					//����ֻ�� Ĭ�Ϲر�
		//watch : false,					//�ر�ʵʱԤ��
		htmlDecode : "style,script,iframe|on*",//���� HTML ��ǩ����(����)��Ϊ�˰�ȫ�ԣ�Ĭ�ϲ�������trueʱ������ ���ã�    
		//toolbar  : false,					//�رչ�����
		//previewCodeHighlight : false,		// �ر�Ԥ���Ĵ���������Ĭ�Ͽ���
		emoji : true,						//�������� Ĭ�Ϲر�
		taskList : true,
		//toc : false,						//�ر��Զ�Ŀ¼ Ĭ�Ͽ���
		tocm : true,						// Using [TOCM] ��������Ŀ¼
		tex : true,							// ������ѧ��ʽTeX����֧�֣�Ĭ�Ϲر�
		flowChart : true,					// ��������ͼ֧�֣�Ĭ�Ϲر�
		sequenceDiagram : true,				// ����ʱ��/����ͼ֧�֣�Ĭ�Ϲر�,
		//dialogLockScreen : false,   // ���õ�����Ի���������ȫ��ͨ�ã�Ĭ��Ϊtrue
		//dialogShowMask : false,     // ���õ�����Ի�����ʾ͸�����ֲ㣬ȫ��ͨ�ã�Ĭ��Ϊtrue
		//dialogDraggable : false,    // ���õ�����Ի��򲻿��϶���ȫ��ͨ�ã�Ĭ��Ϊtrue
		//dialogMaskOpacity : 0.4,    // ����͸�����ֲ��͸���ȣ�ȫ��ͨ�ã�Ĭ��ֵΪ0.1
		//dialogMaskBgColor : "#000", // ����͸�����ֲ�ı�����ɫ��ȫ��ͨ�ã�Ĭ��Ϊ#fff
		imageUpload : true,
		imageFormats : ["jpg", "jpeg", "gif", "png", "bmp", "webp"],
		imageUploadURL : "./php/upload.php",
		//�¼�
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
#.����Ԥ��
#####.��ʽ�ļ���
```html
<link rel="stylesheet" href="./css/editormd.preview.css" />
```
#####.��Ҫ�����
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
#####.HTML����
```html
<div id="test-editormd-view">
	<textarea style="display:none;" name="test-editormd-markdown-doc">
	</textarea>               
</div>
```
#####.����Ԥ��������
```javascript
<script type="text/javascript">
	$(function() {
		var testEditormdView;

		$.get("test.md", function(markdown) {
			//����һ��Ԥ��
			testEditormdView = editormd.markdownToHTML("test-editormd-view", {
				markdown        : markdown ,//+ "\r\n" + $("#append-test").text(),
				//htmlDecode      : true,       // ���� HTML ��ǩ������Ϊ�˰�ȫ�ԣ�Ĭ�ϲ�����
				htmlDecode      : "style,script,iframe",  // you can filter tags decode
				//toc             : false, //�ر�Ŀ¼
				tocm            : true,    // Using [TOCM]��������Ŀ¼
				tocContainer    : "#custom-toc-container", //�Զ��� ToC��ָ��������
				//gfm             : false,
				//tocDropdown     : true,
				// markdownSourceCode : true, // �Ƿ��� Markdown Դ�룬���Ƿ�ɾ������Դ��� Textarea ��ǩ
				emoji           : true,		//�����������
				taskList        : true,		//
				tex             : true,		// Ĭ�ϲ�����
				flowChart       : true,		// Ĭ�ϲ�����
				sequenceDiagram : true,		// Ĭ�ϲ�����
			});

		});
	});
</script>
```

[========]

