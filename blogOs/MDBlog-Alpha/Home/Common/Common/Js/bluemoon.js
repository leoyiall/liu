/*
*---------------------------------------
*	蓝月萧枫javascrpt开源插件集合
*	copyright by bluemoon
*	1752295326@qq.com
*	
*---------------------------------------
*/

/*
*	拖拽文件对象 Object
*	new dorp(obj,calbackfunction);
*	copyright by bluemoon
*	1752295326@qq.com
*	2015-1-9 11:56
*/
function dorpFile(obj,callback){
		this.obj=obj;
		this.obj.addEventListener("dragover",function(event){//
		event.stopPropagation();
		event.preventDefault();
		event.dataTransfer.dropEffect = 'copy';
		/*
		*preventDefault()	通知浏览器不要执行与事件关联的默认动作。
		*stopPropagation()	不再派发事件。
		*/
		},false);
		
		this.obj.addEventListener("drop",function(event){//释放拖拽触发事件
			event.stopPropagation();
			event.preventDefault();
			callback(event.dataTransfer.files);//回调函数，返回FileList
		},false);
}

/*
/*
*	拖拽文件对象 Object
*	var drop=new dorp(obj);drop.onhas=function(e){};//存在文件时会调用onhas事件
*	copyright by bluemoon
*	1752295326@qq.com
*	2015-1-9 11:56
*/
/*function dorpFile(obj){
		var that=this;
		this.obj=obj;
		this.obj.addEventListener("dragover",function(event){//
		event.stopPropagation();
		event.preventDefault();
		event.dataTransfer.dropEffect = 'copy';
		/*
		*preventDefault()	通知浏览器不要执行与事件关联的默认动作。
		*stopPropagation()	不再派发事件。
		*/
		/*},false);
		
		this.obj.addEventListener("drop",function(event){//释放拖拽触发事件
			event.stopPropagation();
			event.preventDefault();
			that.onhas(event.dataTransfer.files);//回调函数，返回FileList
		},false);
}
*/

/*
*	文件大小单位换算 function
*	tosize(value);
*	copyright by bluemoon
*	1752295326@qq.com
*	2015-1-9 11:56
*/
function toSize(data){
	var size=data;
	var dw="Byte";
	if(data>Math.pow(2,30)){
		size=data/Math.pow(2,30);
		dw="GB";
	}else if(data>Math.pow(2,20)){
		size=data/Math.pow(2,20);
		dw="MB";
	}else if(data>Math.pow(2,10)){
		size=data/Math.pow(2,10);
		dw="KB";
	}
	return size.toFixed(2)+dw;
}

/*
*	获取文件md5 function
*	fileMd5(fileobj,callbackFunction);
*	copyright by bluemoon
*	1752295326@qq.com
*	2015-1-9 11:56
*/
function fileMd5(fileObj,callback){
	var blobSlice=File.prototype.slice||File.prototype.mozSlice||File.prototype.webkitSlice;
	var spark=new SparkMD5.ArrayBuffer();//创建计算文件MD5对象 需要spark-md5.min.js插件
	var start=0;
	var end=fileObj.size;
	var md5="";
	var fileReader=new FileReader();//fileAPI
	fileReader.readAsArrayBuffer(blobSlice.call(fileObj,start,end));//
	fileReader.onload= function(e){//计算完成自动调用函数
		spark.append(e.target.result);
		md5=spark.end();//返回计算结果
		callback(md5);//调用回调函数
	}
	fileReader.onerror=function(){
		console.warn('oops, something went wrong.');
	};
}

/*
*	等待提示 Object
*	var w=new whitting();w.start(str,obj);w.end();对于jquery对象在后面接"[0]"即可
*	copyright by bluemoon
*	1752295326@qq.com
*	2015-2-20 11:34
*/
function whitting(){
	var whittingEfface=null;
	var jishu=3;
	var len=null;
	this.start=function(str,obj){
		len=str.length;
		whittingEfface=setInterval(function(){
			if(jishu<=-1){
				jishu=3;
			}
			//console.log(jishu);
			
			obj.title=str.substring(0,len-jishu);
			obj.innerHTML=str.substring(0,len-jishu);
			jishu--;
		},300)
	};
	this.end=function(){
		whittingEfface=clearInterval(whittingEfface);
	}
}

/*
*	右键菜单对象 Object
*	var r=new mousemenu(obj);
*	r.addOption(str,callback);添加一个菜单项 
	r.addLine();//创建一条分隔线
	r.addSecondOption("OptionStr",{SecondOptions},callback(this));//创建二级菜单
	r.setOptionCss({css});//设置菜单选项样式
	r.setOptionHoverCss({css});//设置菜单选项伪类样式
	r.setMenuCss({css});//设置菜单背景样式
*	copyright by bluemoon
*	1752295326@qq.com
*	2015-2-24 22:10
*/


function mousemenu(obj){
	var that=this;
	var effect1=null;
	var effect2=null;
	this.optionCss={
		"color":"#989B9B",
		"background":"#313131",
		"height":"20px",
		"fontFamily":"serif",
		"lineHeight":"20px",
		"fontSize":"13px",
		"textAlign":"left",
		"textIndent":"5px",
	};
	this.optionHoverCss={
		"color":"#F7F5F2",
		"background":"#171717",
		"height":"30px",
		"fontSize":"13px",
		"textIndent":"5px",
		"textAlign":"left",
		"lineHeight":"20px"
	};
	this.menuCss={
		"background":"#212326",
		"boxShadow":"2px 2px 3px #1A1A1A",
		"fontFamily":"serif",
	};
	this.x="";
	this.y="";
	this.maxX="";
	this.maxY="";
	this.menu=document.createElement("div");
	this.menu.id="menu"+Math.random();
	this.menu.style.display="none";
	this.menu.style.width="180px";
	this.menu.style.height="auto";
	this.menu.style.opacity="1";
	this.menu.style.background=that.menuCss["background"];
	this.menu.style.padding="5px";
	this.menu.style.position="absolute";
	this.menu.style.boxShadow="2px 2px 3px #1A1A1A";
	this.menu.style.zIndex="4000";
	this.menu.style.fontFamily="serif";
	document.body.appendChild(this.menu);
	//菜单显示界面禁用系统右键菜单
	this.menu.onmousedown=function(){
		that.menu.oncontextmenu=function(){return false};//禁用系统右键菜单
	}
	obj.onmousedown=function(e){
		e.stopPropagation();//阻止事件冒泡(函数里返回假也可以达到效果)
		if(e.button==2){
			effect1=clearTimeout(effect1);
			effect2=clearInterval(effect2);
			obj.oncontextmenu=function(){return false};//禁用系统右键菜单
			that.x=e.clientX;
			that.y=e.clientY;
			that.maxX=document.documentElement.clientWidth;//
			that.maxY=document.documentElement.clientHeight;
			//显示位置计算
			if(parseInt(that.menu.style.width)+2*parseInt(that.menu.style.padding)+2+that.x<=that.maxX){
				that.menu.style.left=e.clientX+2+"px";
			}else{
				that.menu.style.left=that.x-parseInt(that.menu.style.width)-2-2*parseInt(that.menu.style.padding)+"px";
			}
			that.menu.style.top=e.clientY+2+"px";
			that.menu.style.opacity="1";
			that.menu.style.display="block";
			//1500ms内不操作菜单时 执行自动隐藏
			effect1=setTimeout(function(){
				effect2=setInterval(function(){
					that.menu.style.opacity-=0.01;
					if(that.menu.style.opacity<0.01){
						effect2=clearInterval(effect2);
						that.menu.style.display="none";
					}
				},10);
			},1500);
		}
	}
	this.menu.onmouseover=function(){
		effect1=clearTimeout(effect1);
		effect2=clearInterval(effect2);
		that.menu.style.opacity=1;
	}
	this.menu.onmouseout=function(){
		effect1=setTimeout(function(){
				effect2=setInterval(function(){
					that.menu.style.opacity-=0.01;
					if(that.menu.style.opacity<0.01){
						effect2=clearInterval(effect2);
						that.menu.style.display="none";
					}
				},10);
		},1500);
	}
	//创建一级菜单
	this.addOption=function(OptionStr,callback){
		var option=document.createElement("div");
		that.menu.appendChild(option);
		option.className="one_option";
		option.innerHTML=OptionStr;
		that._setOptionCss(option);
		option.onclick=function(){
			callback(this);//单击后出发函数
			effect1=clearTimeout(effect1);
			effect2=clearInterval(effect2);
			that.menu.style.display="none";
		}
	}
	//创建一个有二级菜单的选项
	this.addSecondOption=function(oneOptionStr,twoOptionStrs,callback){
		var oneoption=document.createElement("div");
		that.menu.appendChild(oneoption);
		oneoption.className="one_option";
		oneoption.innerHTML=oneOptionStr;
		that._setOptionCss(oneoption);
		//存在二级菜单时修改样式为
		oneoption.style.overflow="visible";//
		oneoption.style.position="relative";//
		//创建一个box放置二级菜单选项
		var twooptionBox=document.createElement("div");
		oneoption.appendChild(twooptionBox);
		twooptionBox.className="menu2";
		twooptionBox.style.width="150px";
		twooptionBox.style.padding="5px";
		twooptionBox.style.height="auto";
		twooptionBox.style.boxShadow=that.menuCss["boxShadow"];
		twooptionBox.style.left=parseInt(that.menu.style.width)+"px";
		twooptionBox.style.top="-5px";
		twooptionBox.style.background=that.menuCss["background"];
		twooptionBox.style.position="absolute";
		twooptionBox.style.display="none";
		oneoption.onmouseover=function(e){
			e.preventDefault();
			twooptionBox.style.display="block";
			this.style.background=that.optionHoverCss["background"];
			this.style.color=that.optionHoverCss["color"];
			this.style.height=that.optionHoverCss["height"];
			//二级菜单位置处理
			var topOver=that.maxY-(e.clientY+twooptionBox.offsetHeight);
			var top=((e.clientY+twooptionBox.offsetHeight-parseInt(twooptionBox.style.padding))>that.maxY)?topOver:-5;
			twooptionBox.style.top=top+"px";
			var leftOver=-twooptionBox.offsetWidth;
			var left=((that.x+that.menu.offsetWidth+twooptionBox.offsetWidth)>that.maxX)?leftOver:parseInt(that.menu.style.width);
			twooptionBox.style.left=left+"px";
		}

		oneoption.onmouseout=function(){
			twooptionBox.style.display="none";
			this.style.background=that.optionCss["background"];
			this.style.color=that.optionCss["color"];
			this.style.height=that.optionCss["height"];
		}
		twooptionBox.onmouseover=function(){
			twooptionBox.style.display="block";
		}
		for(var i=0;i<twoOptionStrs.length;i++){
			var twooption=document.createElement("div");
			twooptionBox.appendChild(twooption);
			twooption.className="two_option";
			twooption.innerHTML=twoOptionStrs[i];
			that._setOptionCss(twooption);//创建二级菜单
			twooption.onclick=function(){
				callback(this);
				that.menu.style.display="none";
			}
		}

	}
	//创建一条分隔线
	this.addLine=function(){
		line=document.createElement("p");
		line.className="line";
		that.menu.appendChild(line);
		line.style.width="100%";
		line.style.height="1px";
		line.style.background="#3E4043";
		line.style.marginTop="5px";
		line.style.marginBottom="5px";
	}
	this.setOptionCss=function(data){
		for(var v in data){
			that.optionCss[v]=data[v];
		}
	}
	this.setOptionHoverCss=function(data){
		for(var v in data){
			that.optionHoverCss[v]=data[v];
		}
	}
	this.setMenuCss=function(data){
		for(var v in data){
			that.menuCss[v]=data[v];
			that.menu.style[v]=data[v];
		}
	}
	//选项样式
	this._setOptionCss=function(option){
		option.style.width="100%";
		option.style.height="20px";
		option.style.color=that.optionCss["color"];
		option.style.marginTop="1px";
		option.style.clear="both";
		option.style.fontFamily=that.optionCss["fontFamily"];
		option.style.textIndent=that.optionCss["textIndent"];
		option.style.lineHeight=that.optionCss["lineHeight"];
		option.style.fontSize=that.optionCss["fontSize"];
		option.style.background=that.optionCss["background"];
		option.style.cursor="pointer";
		option.style.whiteSpace="nowrap";
		option.style.textOverflow="ellipsis";
		option.style.overflow="hidden";
		option.style.transition="all 0.5s linear";
		option.style.webkitTransition="all 0.5s linear";/* Safari and Chrome or liebao*/
		option.style.mozTransition="all 0.5s linear";/*Firefox */
		option.style.oTransition="all 0.5s linear";/*Opera */
		option.style.msTransition="all 0.5s linear";/*for ie*/
		//每个菜单选项都添加伪类
		option.onmouseover=function(){
			this.style.background=that.optionHoverCss["background"];
			this.style.color=that.optionHoverCss["color"];
			this.style.height=that.optionHoverCss["height"];
			this.style.textAlign=that.optionHoverCss["textAlign"];
			this.style.textIndent=that.optionHoverCss["textIndent"];
			this.style.lineHeight=that.optionHoverCss["lineHeight"];
		}
		option.onmouseout=function(){
			this.style.background=that.optionCss["background"];
			this.style.color=that.optionCss["color"];
			this.style.height=that.optionCss["height"];
			this.style.textAlign=that.optionCss["textAlign"];
			this.style.textIndent=that.optionCss["textIndent"];
			this.style.lineHeight=that.optionCss["lineHeight"];
		}

	}
	this._setCopyright=function(){
		//创建版权信息
		that.about=document.createElement("div");
		that.about.className="about";
		that.about.innerHTML="迷你右键菜单";
		that.about.style.width="100%";
		that.about.style.height="40px";
		that.about.style.background="#212326";
		that.about.style.textAlign="center";
		that.about.style.lineHeight="40px";
		that.about.style.float="left";
		that.about.style.marginBottom="0";
		that.menu.appendChild(that.about);
	}
	//this._setCopyright();
	/*this.addOption("关于右键菜单",function(){
			window.open("http://hao123.com/","_blank");
	});*/
}


/*
*	监控粘贴 function
*   getpaste(obj,callbackfunction});
*	copyright by bluemoon
*	1752295326@qq.com
*	2015-2-24 22:10
*/
function getpaste(obj,callback){
	var psdteData=null;
	if(document.all){//for ie
		psdteData=window.clipboardData.getData("Text");
	}else{
		psdteData=e.clipboardData.getData("Text");
		//e.clipboardData.setData("Text","test");
	}
	if(!psdteData)
	callback(psdteData);
}

/**
*  信息提示 Object
*  2015-05-23 15:25
**/
function messager(){
	var M_BG=null;
	var e=null;
	var e2=null;
	_start();
	this.send=function(str){
		e=clearTimeout(e);
		e2=clearTimeout(e2);
		M_BG.style.display="block";
		M_BG.style.bottom="50px";
		M_BG.style.opacity=1;
		M_BG.innerHTML=str;
		M_BG.style.width=(str.length+1)+"em";
		e=setTimeout(function(){
			M_BG.style.opacity=0;
			M_BG.style.bottom="0px";
			e2=setTimeout(function(){
				M_BG.style.display="none";
			},1000);
			
		},2000);
	}
	function _start(){
		M_BG=document.createElement("div");
		M_BG.id="messager_bg";
		M_BG.innerHTML="";
		document.body.appendChild(M_BG);
		_setCss();
	}
	function _setCss(){
		var css={
			"margin":"0 auto",
			"minWidth":'100px',
			"width":'100px',
			"height":'30px',
			"color":"rgba(255, 255, 255, 0.72)",
			"background": 'linear-gradient(rgba(11, 11, 11, 0.882353), rgba(11, 11, 11, 0.93))',
			"boxShadow":"rgba(0, 0, 0, 1) 1px 0px 9px",
			"transition": "all 0.5s ease",
			"borderRadius":"5px",
			"position":"fixed",
			"bottom":"0px",
			"left":0,
			"right":0,
			"textAlign":"center",
			"fontSize":"0.6em",
			"lineHeight":"30px",
			"opacity":0,
			"display":"none",
			"zIndex":"2000",
		}
		for(var v in css){
			M_BG.style[v]=css[v];
		}
	}
}
/*
* 长按事件 Object
* 
*/
function onLclick(){
	var TIME=0;
	var E=null;
	var times=0;
	var progress_bg=null;
	var progress=null;
	_start();
	//calll1等到指定时间 call2没有等到指定时间
	this.Lclick=function(obj,time,call1,call2){
		var t=time||1000;
		times=time/(time/10);
		var w=parseInt(progress_bg.style.width)/(time/10);
		obj.onmousedown=function(e){
			E=clearInterval(E);
			TIME=0;
			var pw=0;
			progress_bg.style.display="block";
			if(e.button==0){
				E=setInterval(function(){
					TIME+=times;
					pw+=w;
					progress.style.width=pw+"px";
					//console.log(pw);
					if(TIME>=t){
					//到达时间时调用
						//console.log(TIME+"触发事件");
						E=clearInterval(E);
						progress_bg.style.display="none";
						if(call1){call1();}
					}
				//console.log(pw);
				},10);
			}
		}
		obj.onmouseup=function(e){
			E=clearInterval(E);
			progress_bg.style.display="none";
			//未到达时间时调用
			if(TIME<t){
				if(call2)
					call2();
			}
		}
	}
	function _start(){
		progress_bg=document.createElement("div");
		progress_bg.id="Lclick_progress_bg";
		document.body.appendChild(progress_bg);
		progress=document.createElement("div");
		progress.id="Lclick_progress";
		progress_bg.appendChild(progress);
		progress_bg.style.margin="0 auto";
		progress_bg.style.width="200px";
		progress_bg.style.height="5px";
		progress_bg.style.border="solid 1px rgba(255, 255, 255, 0.46)";
		progress_bg.style.background="rgba(33, 35, 38, 0.04)";
		progress_bg.style.position="absolute";
		progress_bg.style.top="50%";
		progress_bg.style.left="0";
		progress_bg.style.right="0";
		progress_bg.style.display="none";

		progress.style.width="auto";
		progress.style.height="100%";
		progress.style.float="left";
		progress.style.background='linear-gradient(rgba(0, 255, 42, 0.93), rgba(7, 181, 108, 0.93))';
	}
}
