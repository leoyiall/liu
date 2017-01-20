JS代码：
```javascript
window.onload = function() {
	
	//可视区尺寸
	//alert( document.documentElement.clientHeight );
	
	document.onclick = function() {
		//滚动距离
		//alert( document.documentElement.scrollTop );
		
		//alert( document.body.scrollTop );
		
		//document.documentElement.scrollTop = 100
		
		//var scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
		
		//alert(scrollTop)
		
		var oDiv = document.getElementById('div1');
		
		//scrollHeight : 内容实际宽高
		
		alert(oDiv.scrollHeight);

	}
}
```
HTML代码：
```html
<div id="div1" style="width:100px;height:100px;border: 1px solid red; overflow: -auto; padding: 10px;">
    	<div style="height: 600px;width: 90px; background: red;"></div>
    </div>
```