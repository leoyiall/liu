/**
*	@name: 		MDtool javascript工具箱
*   @time: 		2015-09-07 19:27
*	@author: 	bluemoon
*	@QQ: 		1752295326
*	@gitHub: 	mengdu
*
**/
;(function(){
	var mthis=null;
	//插件对象
	var MDtool=function(){
		mdthis=this;
		//插件信息
		this.info={
			"name":"MDtool",
			"author":"bluemoon",
			"birthday":"2015-09-07 19:27",
			"info":"一个javascript工具箱",
			"versions":"1.0"
		};
	};
	var md=MDtool;
	//原型等价
	md.fn=MDtool.prototype;
	//-------------------------------
	md.fn.isReady=false;
	//onload函数
	md.fn.load=function(fun){
		if(!fun){
			throw("参数错误");
			return null;
		}
		function readyfun(fun){
			//fun();
			//alert("fun");
			return new Function(";("+fun+")();")();
		}
		function completed() {
			//console.log("completed");
			 //alert("completed");
		    if (document.all) {
		    	//低版本浏览器
		       	document.detachEvent( "onreadystatechange", completed );
		    	window.detachEvent( "onload", completed );
		    }else{
		    	document.removeEventListener( "DOMContentLoaded", completed, false );
		       	window.removeEventListener( "load",completed, false );
		    }
		    md.fn.isReady=true;
		    readyfun(fun);
		}
		if(document.readyState === "complete"||md.fn.isReady==true){
			//如果页面已经加载直接执行函数
			//console.log("readyState");
			readyfun(fun);
		}else if(document.all) {
			//低版本浏览器
			//alert("document.all");
		    document.attachEvent( "onreadystatechange", completed );
            window.attachEvent( "onload", completed);
		}else{
		    //console.log("addEventListener");
			document.addEventListener( "DOMContentLoaded",completed, false );
			window.addEventListener( "load",completed, false );
		}
	}
	//事件监听
	md.fn.on=function(target,eventstr,callback){
		//console.log(typeof target);
		if(typeof target !== "object"){
			return;
		}
		if(document.all){
			target.attachEvent(eventstr,callback);
		}else{
			target.addEventListener(eventstr,callback,false);
		}
	}
	//选择器
	md.fn.s=function(selectStr){
		return document.querySelector(selectStr);//返回第一个与匹配的对象
	}
	md.fn.sall=function(selectStr){
		return document.querySelectorAll(selectStr);//返回StaticNodeList
	}
	//插件方法扩展方法
    md.extend=md.fn.extend=function(obj){
    	//console.log(this);
    	var target=this;
    	for(var key in obj){
    		//防止循环调用
			if(target===obj[key]) continue;
			//防止附加未定义值
			if(typeof obj[key]==='undefined') continue;
    		target[key]=obj[key];
    	}
    	//返回到当前对象
    	return target;
    }
    //ajax object
    md.fn.ajax=function(data){
    	var ajax=function(data){
    		var form=new FormData();
			var xhr=new XMLHttpRequest();
			//初始参数
			var type="POST";
			var url=data["url"]||"";
			var dataType=data["dataType"]||"json";
			var async=data["async"]||true;
			var timeout=data["timeout"]||10000;
			if(url==""){
				throw("空的目标地址");
				return null;
			}
			if(data["data"]){
				//非文件数据
				for(var key in data["data"]){
					if(key!="files"&&key!="file"){
						form.append(key,data["data"][key]);
					}
				}
				//多文件上传(文件数组)
				for(var name in data["data"]["files"]){
					for(var f in data["data"]["files"][name]){
						form.append(name+"[]",data["data"]["files"][name][f]);
					}
				}
				//单文件上传
				for(var name in data["data"]["file"]){
					form.append(name,data["data"]["file"][name]);
				}
				//二进制上传
				for(var name in data["data"]["blob"]){
					if(data["data"]["blob"][name][1]){
						//如果存在名字
						form.append(name,data["data"]["blob"][name][0],data["data"]["blob"][name][1]);
					}else{
						form.append(name,data["data"]["blob"][name][0]);
					}
				}
			}
			xhr.open(type,url,async);
			var datatypelabel="";
			switch(dataType.toLowerCase()){
				case "blob":
					datatypelabel="blob";
				break;
				case "arraybuffer":
					datatypelabel="arraybuffer";
				break;
				default:
					datatypelabel="text";
				break;
			}
			xhr.responseType=datatypelabel;//blob/arraybuffer/text
			xhr.timeout=parseInt(timeout);
			//传输成功是触发事件
			xhr.onload=function(){
				if(data.onload){
					switch(dataType.toLowerCase()){
						case "json":
							data.onload(JSON.parse(xhr.responseText));
						break;
						case "text":
							data.onload(xhr.responseText);
						break;
						case "xml":
							data.onload(xhr.responseXML);
						break;
						case "blob":
							data.onload(xhr.response);
						break;
						case "arraybuffer":
							data.onload(xhr.response);
						break;
						default:
							data.onload(xhr.responseText);
						break;
					}
				}
			};
			//传输被用户取消触发事件
			xhr.onabort=function(){
				if(data.onabort)
					data.onabort(xhr);
			};
			//传输错误触发事件
			xhr.onerror=function(){
				if(data.onerror){
					var er={
						"readyState":xhr.readyState,
						"status":xhr.status
					};
					data.onerror(er);
				}
			};
			//传输时间到
			xhr.ontimeout=function(){
				if(data.ontimeout){
					data.ontimeout(xhr);
				}
			}
			//传输开始触发事件
			xhr.onloadstart=function(){
				if(data.onloadstart){
					data.onloadstart(xhr);
				}
			};
			//传输结束触发事件
			xhr.onloadend=function(){
				if(data.onloadend){
					data.onloadend(xhr);
				}
			};
			//上传进度监控函数
			xhr.upload.onprogress=function(e){
				if(data.onuploadprogress){
					data.onuploadprogress(e);
				}
				//e.loaded//目前已经上传大小
				//e.tota//总共要上传大小
			};
			//下载进度
			xhr.onprogress=function(e){
				if(data.ondownloadprogress){
					data.ondownloadprogress(e);
				}
			};
			//发送
			xhr.send(form);
			//取消上传
			this.abort=function(){
				xhr.abort();
			}
			this.xhr=xhr;//返回xhr对象(用于此对象不够完善的地方)

    	}
    	return new ajax(data);
    }
    //-------------------------------
    //拖拽文件对象
    md.fn.dorpFile=function(obj,callback){
    	/*
		*	拖拽文件对象 Object
		*	new dorp(obj,calbackfunction);
		*	copyright by bluemoon
		*	1752295326@qq.com
		*	2015-1-9 11:56
		*/
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
    //-------------------------------
    //鼠标右键菜单
    md.fn.mousemenu=function(obj){
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
				"textIndent":"5px"
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
				"fontFamily":"serif"
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
			this.menu.style.position="fixed";
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
		return new mousemenu(obj);
    }
    //-------------------------------
    //信息提示 Object
    md.fn.messager=function(){
    	/**
		*  信息提示 Object
		*  2015-05-23 15:25
		**/
		function messager(){
			var M_BG=null;
			var e=null;
			var e2=null;
			var data=new Array();//列队信息储存数组
			var ms=0;//自增信息索引下标
			var now=0;//当前显示信息下标
			var isshow=false;//显示状态
			_start();
			this.send=function(str){
				//信息列队
				data[ms]=str;
				ms++;
				//通知已经有信息列队
				_show();
			}
			function _show(){
				if(isshow){
					//正在显示信息时不能继续执行(防止一下子设置多个信息时出现被覆盖现象)
					return;
				}
				M_BG.style.display="block";
				M_BG.style.bottom="50px";
				M_BG.style.opacity=1;
				M_BG.innerHTML=data[now];
				M_BG.style.width=(data[now].replace(/<[^>]+>/g,"").length+1)*0.7+"em";
				isshow=true;//正在显示
				e=setTimeout(function(){
					M_BG.style.opacity=0;
					M_BG.style.bottom="0px";
					e2=setTimeout(function(){
						now++;
						M_BG.style.display="none";
						e=clearTimeout(e);
						//e2=clearTimeout(e2);
						if(now==ms){
							//信息列队显示完
							now=0;
							ms=0;
							data=new Array();//清空列队信息
							isshow=false;//防止再次列队时不执行问题
							return;
						}
						isshow=false;//显示完一条信息时改变状态
						_show();
					},500);
				},1500);
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
					"paddingRight":"3px",
					"paddingLeft":"3px",
					"bottom":"0px",
					"left":0,
					"right":0,
					"textAlign":"center",
					"fontSize":"0.6em",
					"lineHeight":"30px",
					"opacity":0,
					"display":"none",
					"zIndex":"2000"
				}
				for(var v in css){
					M_BG.style[v]=css[v];
				}
			}
		}
		return new messager();
    }
    //长按事件
    md.fn.onLclick=function(){
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
		return new onLclick();
    }
    //-------------------------------
    //图片编辑
    md.fn.ImageEditer=function(){
    	/**
		*	图片编辑对象
		*	ImageEditer
		*	2015-07-25
		**/
		function ImageEditer(){
			//原始图片信息
			var imgData={
				"img":null,
				"imgW":0,
				"imgH":0,
				"imgDataURL":null,
				"imgName":"",
				"imgType":""
			};
			var that=this;
			//刷新数据
			function _refresh(callback){
				var info={
					"bool":false,
					"info":""
				};
				var img=new Image();
				img.src=imgData["imgDataURL"];
				//存在线程堵塞
				img.onload=function(){
					imgData["imgW"]=img.width;
					imgData["imgH"]=img.height;
					info["bool"]=true;
					if(callback){
						callback(info);
					}
				}
				img.onerror=function(){
					info["info"]="初始化图片出错了！";
					if(callback){
						callback(info);
					}
				}
				imgData["img"]=img;
			}
			//创建canvas对象
			function createCanvas(w,h){
				var canvas=document.createElement("canvas");
				canvas.width=w;
				canvas.height=h;
				var cxt=canvas.getContext("2d");
				return cxt;
			}
			//裁剪图片
			function createImg(x,y,w,h,img){
				var cxt=createCanvas(w,h);
				cxt.drawImage(img,x,y,w,h,0,0,w,h);
				return cxt["canvas"].toDataURL(imgData["imgType"]);
			}
			//缩放图片
			function autoZoom(w,h,img){
				var cxt=createCanvas(w,h);
				cxt.drawImage(img,0,0,imgData["imgW"],imgData["imgH"],0,0,w,h);
				return cxt["canvas"].toDataURL(imgData["imgType"]);
			}
			//DataURL转为blob对象
			function dataURLtoBlob(dataURL){
				var data=dataURL.split(',');
				var mime=data[0].match(/:(.*?);/)[1]||'undefind';
				//创建blob对象
				var blob=new Blob([atob(data[1])],{"type":mime});
				return blob;
			}
			function getImgType(type){
				switch(type.toLowerCase()){
					case "jpg": return "image/jpeg";
						break;
					case "png": return "image/png";
						break;
					case "gif": return "image/gif";
						break;
					default: return "image/png";
						break;
				}
			}
			//设置图片DataURL
			this.setDataURL=function(DURL,callback){
				imgData["imgDataURL"]=DURL;
				_refresh(function(e){
					if (callback){
						callback(e);
					};
				});
			}
			//设置图片url
			this.setURL=function(url,callback){
				if(url){
					var n=url.replace(/\//g,"\\").split('\\');
					imgData["imgName"]=n[n.length-1];
					imgData["imgDataURL"]=url;
					var t=imgData["imgName"].split('\?')[0].split('\.');
					imgData["imgType"]=getImgType(t[t.length-1]);
					_refresh(function(e){
						if (callback){
							callback(e);
						};
					});
				}
			}
			//设置图片blob
			this.setBlob=function(blob,callback){
				var f=new FileReader();
				f.readAsDataURL(blob);
				f.onload=function(){
					imgData["imgDataURL"]=f.result;
					imgData["imgName"]=blob.name;
					imgData["imgType"]=blob.type||"image/png";
					_refresh(function(e){
						callback(e);
					});
				}
				f.onerror=function(e){
					_refresh(function(e){
						callback(e);
					});
				}
			}
			this.outImgMassege=function(){
				return imgData;
			}
			//裁剪图片
			this.clipping=function(x,y,w,h,callback){
				var m={
					"info":"",
					"bool":false,
					"result":[]
				}
				if(!callback){
					return false;
				}
				if(x<0||y<0||w<0||h<0){
					m.info="参数越界";
					callback(m);
					return;
				}
				if(x>imgData["imgW"]||y>imgData["imgH"]){
					m.info="参数越界";
					callback(m);
					return;
				}
				//等待_refresh()线程
				setTimeout(function(){
					w=w>imgData["imgW"] ? imgData["imgW"] : w;
					h=h>imgData["imgH"] ? imgData["imgH"] : h;
					w=(x+w)>imgData["imgW"] ? (imgData["imgW"]-x) : w;
					h=(y+h)>imgData["imgH"] ? (imgData["imgH"]-y) : h;
					m.result[0]=createImg(x,y,w,h,imgData["img"]);
					m.result[1]=dataURLtoBlob(m.result[0]);
					m["bool"]=true;
					callback(m);
					return true;
				},500);	
			}
			//缩放图片
			this.zoom=function(w,h,callback){

				if(!callback && typeof(h)=='number'){
					//console.log("未传回调函数");
					return false;
				}
				var m={
					"info":"",
					"bool":false,
					"result":[]
				}
				if(w && h && callback){
					//自定义缩放
					m["bool"]=true;
					m["result"][0]=autoZoom(w,h,imgData["img"]);
					m["result"][1]=dataURLtoBlob(m["result"][0]);
					callback(m);
					return true;
				}
				if(typeof(w)=='string' && typeof(h)=='function' && !callback){
					//按比例缩放
					var p=(parseInt(w)/100);
					var imgw=p*imgData["imgW"];
					var imgh=p*imgData["imgH"];
					m["bool"]=true;
					m["result"][0]=autoZoom(imgw,imgh,imgData["img"]);
					m["result"][1]=dataURLtoBlob(m["result"][0]);
					h(m);
					return true;
				}
			}
			//添加水印
			this.watermark=function(x,y,w,h,img){
				console.log(createCanvas(100,100));
			}
			this.blur=function(src,str){
					function createCanvas(w,h){
						var canvas=document.createElement("canvas");
						canvas.width=w;
						canvas.height=h;
						var cxt=canvas.getContext("2d");
						return cxt;
					}
					var img=new Image();
					img.src=src;
					img.onload=function(){
						var cxt=createCanvas(img.width,img.height);
						cxt.drawImage(img,0,0);
						cxt.globalAlpha=0.1;
						for(var y=-str;y<str;y+=2){
							for(var x=-str;x<str;x+=2){
								cxt.drawImage(cxt["canvas"],x,y);
								console.log(x+" "+y);
							}
						}
						cxt.globalAlpha=1;
						console.log(cxt["canvas"].toDataURL());
					}
					
				}
		}
		return new ImageEditer();
    }
    //-------------------------------
    //动画
    md.fn.animate=function(){
    	var animate=function(){
			/**
			 * 获取样式
			 * @param {Object} obj
			 * @param {Object} attr
			 */
			function getStyle(obj,attr){
				if(obj.currentStyle){
					return obj.currentStyle[attr];
				}else{
					return getComputedStyle(obj,false)[attr];
				}
			}
			/**
			 * 缓冲运动动画
			 * @param {Object} obj		对象
			 * @param {Object} json		运动目标值
			 * @param {Object} speed	速度
			 * @param {Object} fn		运动完成回调函数
			 */
			this.buffer=function(obj,json,speed,fn){
				 var speed = speed || 5;
			     clearInterval(obj.t)		//开始前关闭原有的定时器
			     obj.t=setInterval(function(){
					  var endMove=true;	   //设置运动停止初始值
					  for(var attr in json){
					  		// iCur 更新运动元素当前的属性值
			         		if(attr=='opacity'){	//对透明度单独处理
			              		var iCur = parseInt(parseFloat(getStyle(obj, attr))*100);
						 	}else{					//普通样式
			              		var iCur = parseInt(getStyle(obj, attr));
						 	}
						 	// 速度取整
					  	 	var iSpeed=(json[attr]-iCur)/speed>0?Math.ceil((json[attr]-iCur)/speed):Math.floor((json[attr]-iCur)/speed);
					  		//检测是否到目标点
					  		if(iCur!=json[attr]){
			              		endMove=false;		
					  		}
					  		//设置样式，对透明度单独处理
			             	if(attr=='opacity'){
			                   obj.style.filter='alpha(opacity='+(iCur+iSpeed)+')';
							   obj.style.opacity=(iCur+iSpeed)/100;
						 	}else{
			                   obj.style[attr]=iCur+iSpeed+'px';
						 	}
					  }
					  //运动完成，关闭定时器
					  if(endMove){
			             	clearInterval(obj.t)
							obj.t = null;
						 	if(fn){	//回调函数存在，调用回调函数，并把当前对象做为this
			                	fn.call(obj);
							}
					  }
				 },30);
			}
			/*
			 * 弹性运动动画 
			 * @param {Object} obj		对象
			 * @param {Object} json		运动目标值
			 * @param {Object} iSpeed	弹性强度
			 * @param {Object} centre	是否从中点开始运动
			 * @param {Object} fn		运动完成回调函数
			 */
			this.fiexible=function(obj,json,iSpeed,centre,fn){
				var iSpeed = (iSpeed && iSpeed<=7 && iSpeed >0)?iSpeed:5;
				/*** 按坐标运动  ***/
				if(centre === true){
					var x = Math.floor(parseInt(json.left) + parseInt(json.width/2));	//计算X轴中心点
					var y = Math.floor(parseInt(json.top) + parseInt(json.height/2));	//计算Y轴中心点
					//设置初始的left 和 top 值 并让元素显示
					obj.style.display = 'block';
					obj.style.left = x-(parseInt(getStyle(obj,'width'))/2) + 'px';  
					obj.style.top = y-(parseInt(getStyle(obj,'height'))/2) + 'px';
					//清除margin
					//obj.style.margin = 0 + 'px';
				}
				var newJson = {}
				/*** 往参数中添加位置属性 用于设置元素的运动初始点 ***/
				for(var arg in json){
					newJson[arg] = [json[arg], parseInt(getStyle(obj,arg))]
					//newJson[arg] = [运动目标点,运动初始点];
				}
				var oSite = {};
				/** 添加单独的属性值  **/
				for(var attr in newJson){
					oSite[attr] ={
						iSpeed:0,
						curSite:newJson[attr][1],
						bStop:false
					};
					//oSite[attr] = {运动初始速度,运动当前值,判断是否完成运动依据};
				} 
				/** 运动开始前关闭本身的定时器 **/
				clearInterval(obj.t);
				obj.t = setInterval(function(){
					
					/*** 循环运动属性  ***/
					for (var attr in newJson) {
						/** 运动状态  **/
						oSite[attr].bStop = false;
						// iCur 更新运动元素当前的属性值
			     		if(attr=='opacity'){	//对透明度单独处理
			          		var iCur = parseInt(parseFloat(getStyle(obj, attr))*100);
					 	}else{					//普通样式
			          		var iCur = parseInt(getStyle(obj, attr));
					 	}
						oSite[attr].iSpeed += (newJson[attr][0] - iCur) /iSpeed;		//加速	
						oSite[attr].iSpeed *= (iSpeed/10+0.25);							//磨擦
						oSite[attr].curSite += oSite[attr].iSpeed;				//更新运动的当前位置
						//运动停止条件 速度绝对值小于1 并且 当前值与目标值的差值的绝对值小于一
						if (Math.abs(oSite[attr].iSpeed) < 1 && Math.abs(iCur - newJson[attr][0]) < 1) {
							//设置样式，对透明度单独处理
			             	if(attr=='opacity'){
			                   obj.style.filter='alpha(opacity='+newJson[attr][0]+')';
							   obj.style.opacity=newJson[attr][0]/100;
							}else{
							   obj.style[attr] = newJson[attr][0] + 'px';	//设置到目标点
							}
							oSite[attr].bStop = true;					//设置当前属性运动是否完成
						} else {
							//更新运动对象的属性值
							if(attr=='opacity'){
			                   obj.style.filter='alpha(opacity='+oSite[attr].curSite+')';
							   obj.style.opacity=oSite[attr].curSite/100;
							}else{
							   obj.style[attr] = oSite[attr].curSite + 'px';	
							}
						}
					}
					// 校验定时器停止
					if(checkStop(oSite)){
						clearInterval(obj.t);
						if(fn){

							fn.call(obj);
						}
					}
				}, 30);
				/** 校验运动是否完成 **/
				function checkStop (oSite){
					//console.log(oSite);
					for(var i in oSite){
						if(oSite[i].bStop === false){
							return oSite[i].bStop;
						}
					}
					return true;
				}
			}
		}
		return new animate();
    }
    //数学函数集合
    md.fn.Math={
    		"random":function(num1,num2){
    			if(!num1&&!num2){
    				return Math.random();//随机小数
    			}
    			if(!num2&&num1){
    				return parseInt(Math.random()*(num1+1));//随机0~num1
    			}
    			return parseInt(Math.random()*(num2-num1+1)+num1);//随机num1~num2
    		}
    };
    //-------------------------------
    //编码类
    md.fn.code={
    	"base64EncodeChars":"ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/",
		"base64DecodeChars":[
	    -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
	    -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
	    -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, 62, -1, -1, -1, 63,
	    52, 53, 54, 55, 56, 57, 58, 59, 60, 61, -1, -1, -1, -1, -1, -1,
	    -1,  0,  1,  2,  3,  4,  5,  6,  7,  8,  9, 10, 11, 12, 13, 14,
	    15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, -1, -1, -1, -1, -1,
	    -1, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40,
	    41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, -1, -1, -1, -1, -1],
    	"base64encode":function(str){
    		str=this.utf16to8(str);
		    var out, i, len;
		    var c1, c2, c3;

		    len = str.length;
		    i = 0;
		    out = "";
		    while(i < len) {
		    c1 = str.charCodeAt(i++) & 0xff;
		    if(i == len)
		    {
		        out += this.base64EncodeChars.charAt(c1 >> 2);
		        out += this.base64EncodeChars.charAt((c1 & 0x3) << 4);
		        out += "==";
		        break;
		    }
		    c2 = str.charCodeAt(i++);
		    if(i == len)
		    {
		        out += this.base64EncodeChars.charAt(c1 >> 2);
		        out += this.base64EncodeChars.charAt(((c1 & 0x3)<< 4) | ((c2 & 0xF0) >> 4));
		        out += this.base64EncodeChars.charAt((c2 & 0xF) << 2);
		        out += "=";
		        break;
		    }
		    c3 = str.charCodeAt(i++);
		    out += this.base64EncodeChars.charAt(c1 >> 2);
		    out += this.base64EncodeChars.charAt(((c1 & 0x3)<< 4) | ((c2 & 0xF0) >> 4));
		    out += this.base64EncodeChars.charAt(((c2 & 0xF) << 2) | ((c3 & 0xC0) >>6));
		    out += this.base64EncodeChars.charAt(c3 & 0x3F);
		    }
		    return out;
		},

		"base64decode":function(str) {
		    var c1, c2, c3, c4;
		    var i, len, out;
		    len = str.length;
		    i = 0;
		    out = "";
		    while(i < len) {
		    /* c1 */
		    do {
		        c1 = this.base64DecodeChars[str.charCodeAt(i++) & 0xff];
		    } while(i < len && c1 == -1);
		    if(c1 == -1)
		        break;

		    /* c2 */
		    do {
		        c2 = this.base64DecodeChars[str.charCodeAt(i++) & 0xff];
		    } while(i < len && c2 == -1);
		    if(c2 == -1)
		        break;

		    out += String.fromCharCode((c1 << 2) | ((c2 & 0x30) >> 4));

		    /* c3 */
		    do {
		        c3 = str.charCodeAt(i++) & 0xff;
		        if(c3 == 61)
		        return  this.utf8to16(out);
		        c3 = this.base64DecodeChars[c3];
		    } while(i < len && c3 == -1);
		    if(c3 == -1)
		        break;

		    out += String.fromCharCode(((c2 & 0XF) << 4) | ((c3 & 0x3C) >> 2));

		    /* c4 */
		    do {
		        c4 = str.charCodeAt(i++) & 0xff;
		        if(c4 == 61)
		        return  this.utf8to16(out);
		        c4 = this.base64DecodeChars[c4];
		    } while(i < len && c4 == -1);
		    if(c4 == -1)
		        break;
		    out += String.fromCharCode(((c3 & 0x03) << 6) | c4);
		    }
		    return this.utf8to16(out);
		},

		"utf16to8":function(str) {
		    var out, i, len, c;

		    out = "";
		    len = str.length;
		    for(i = 0; i < len; i++) {
		    c = str.charCodeAt(i);
		    if ((c >= 0x0001) && (c <= 0x007F)) {
		        out += str.charAt(i);
		    } else if (c > 0x07FF) {
		        out += String.fromCharCode(0xE0 | ((c >> 12) & 0x0F));
		        out += String.fromCharCode(0x80 | ((c >>  6) & 0x3F));
		        out += String.fromCharCode(0x80 | ((c >>  0) & 0x3F));
		    } else {
		        out += String.fromCharCode(0xC0 | ((c >>  6) & 0x1F));
		        out += String.fromCharCode(0x80 | ((c >>  0) & 0x3F));
		    }
		    }
		    return out;
		},
		"utf8to16":function(str) {
		    var out, i, len, c;
		    var char2, char3;

		    out = "";
		    len = str.length;
		    i = 0;
		    while(i < len) {
		    c = str.charCodeAt(i++);
		    switch(c >> 4)
		    { 
		      case 0: case 1: case 2: case 3: case 4: case 5: case 6: case 7:
		        // 0xxxxxxx
		        out += str.charAt(i-1);
		        break;
		      case 12: case 13:
		        // 110x xxxx   10xx xxxx
		        char2 = str.charCodeAt(i++);
		        out += String.fromCharCode(((c & 0x1F) << 6) | (char2 & 0x3F));
		        break;
		      case 14:
		        // 1110 xxxx  10xx xxxx  10xx xxxx
		        char2 = str.charCodeAt(i++);
		        char3 = str.charCodeAt(i++);
		        out += String.fromCharCode(((c & 0x0F) << 12) |
		                       ((char2 & 0x3F) << 6) |
		                       ((char3 & 0x3F) << 0));
		        break;
		    }
		    }

		    return out;
		},
		"CharToHex":function(str) {
		    var out, i, len, c, h;
		    out = "";
		    len = str.length;
		    i = 0;
		    while(i < len) 
		    {
			    c = str.charCodeAt(i++);
			    h = c.toString(16);
			    if(h.length < 2)
			    	h = "0" + h;
			    
			    out += "\\x" + h + " ";
			    if(i > 0 && i % 8 == 0)
			    	out += "\r\n";
		    }

		    return out;
		},
		htmlEncode:function( str ) {
			var _str = '';
			if ( str.length == 0 ) return '';
				_str = str .replace(/\&/g, '&amp;');
				_str = _str.replace(/\</g, '&lt;');
				_str = _str.replace(/\>/g, '&gt;');
			return _str;
		},
		htmlDecode:function( str ) {
			  var _str = '';
			  if ( str.length == 0 ) return '';
				  _str = str .replace(/&amp;/g, '&');
				  _str = _str.replace(/&lt;/g, '<');	
				  _str = _str.replace(/&gt;/g, '>');
				  _str = _str .replace(/"/g, '"');
			  return _str;
		}
    }
    //-------------------------------
    md.fn.alert=function(config){
    	var alert=function(){
    		var that=this;
    		var shade,alertBox,alertTitle,alertClose,alertContent,alertFooter,alertNo,alertYes;
    		//配置
    		var configs={
    			"shade":true,//开启遮罩
    			"dynamic":true,//开启动效
    			"async":true,//是否异步 false同步 true异步
    			"htmlencode":false,//是否编码字符串成html实体
    			"speed":5,//弹性强度
    			"centre":false,//动画是否从结束点开始出现
    			"zoom":"50%",//隐藏是缩放比例
    			"top":"100px",//alertBox top值
    		};
    		//用于保存传参
    		var argument={
    			html:"",//要显示的内容
    			callback:null
    		}
    		//开始，结束点位置信息
    		var  points={
    			hwidth:null,//隐藏时 width
    			hheight:null,//隐藏时 height
    			htop:null,//隐藏时 top
    			swidth:null,//显示时 width
    			sheight:null,//显示时 height
    			stop:null,//
    		}
    		//执行初始化配置
    		initconfig(configs,config);
    		//初始化标签
    		_init();
    		//调用提示
    		this.send=function(str,call){
    			/*
    			call={
					"shade":true,//开启遮罩
	    			"dynamic":true,//开启动效
	    			"async":true,//是否异步 false同步 true异步
	    			"htmlencode":false,//是否编码字符串成html实体
	    			"speed":5,//弹性强度
	    			"centre":false,//动画是否从结束点开始出现
	    			"zoom":"50%",//隐藏是缩放比例
	    			"top":"100px",//alertBox top值
	    			"hide":function(){},//隐藏时触发
	    			"show":function(){},//隐藏时触发
	    			"close":function(){},//关闭时触发
	    			"yes":function(){},//确定时触发
	    			"no":function(){},//取消时触发
    			}
    			*/
    			var html=str;
    			//清空内容
    			argument["html"]=html;
	    		argument["callback"]=null;
    			if(call){
	    			if(getprior(configs,call,"htmlencode")){
	    				html=mdthis.code.htmlEncode(html);
	    			}
	    			//保存参数变量
	    			argument["html"]=html;
	    			argument["callback"]=call;
	    		}
	    		alertContent.innerHTML=html;
	    		//遮罩处理
    			if(getprior(configs,argument["callback"],"shade")==false){
    				setCss(shade,{
    					"width":"auto",
    					"height":"auto",
    					"left":"0",
    					"right":"0",
    				});
    			}else{
    				setCss(shade,{
    					"width":"100%",
    					"height":"100%"
    				});
    			}
    			show();//显示
    		}
    		//显示
    		function show(){
    			setCss(shade,{
    				display:"block"
    			});
    			setCss(alertBox,{
    				top:-(alertBox.offsetHeight+20)+"px"
    			});
    			var top=getprior(configs,argument["callback"],"top");//计算需要显时top
    			var onshow=void(0);
    			if(argument["callback"]){
    				onshow=argument["callback"]["show"]||void(0);
    			}
    			var zoom=parseInt(getprior(configs,argument["callback"],"zoom"))/100;
	    			points['hwidth']=(2*alertBox.offsetWidth*zoom==points['hwidth'])?points['hwidth']:(alertBox.offsetWidth*zoom);
	    			points['hheight']=(2*alertBox.offsetHeight*zoom==points['hheight'])?points['hheight']:(alertBox.offsetHeight*zoom);
	    			//console.log(points['hwidth']+"X"+points['hheight']);
    			//如果开启了动效
    			if(getprior(configs,argument["callback"],"dynamic")){
    				var an=mdthis.animate();
	    			//points['swidth']=alertBox.offsetWidth;
	    			//points['sheight']=alertBox.offsetHeight;

	    			setCss(alertBox,{
	    				width:points['hwidth']+"px",
	    				height:points["hheight"]+"px"
	    			});
	    			an.fiexible(alertBox,{
	    				"top":parseInt(top),
	    				"height":points['hheight']/zoom,
	    				"width":points['hwidth']/zoom
	    			},
	    			getprior(configs,argument["callback"],"speed"),
	    			getprior(configs,argument["callback"],"centre"),
	    			onshow);
    			}else{
    				///console.log(points['hheight']/zoom);
    				setCss(alertBox,{
    					top:top,
    					"height":points['hheight']/zoom+"px",
	    				"width":points['hwidth']/zoom+"px"
    				});
    				new Function(";("+onshow+")();")();
    			}
    		}
    		//关闭
    		function hide(){
    			var top=alertBox.offsetHeight+20;//计算隐藏时top
    			var onhide=function(){};
    			if(argument["callback"]){
    				onhide=argument["callback"]["hide"]||function(){};
    			}	
    			//如果开启了动效
    			if(getprior(configs,argument["callback"],"dynamic")){
    				var an=mdthis.animate();
	    			var zoom=parseInt(getprior(configs,argument["callback"],"zoom"))/100;
	    			an.fiexible(alertBox,{
	    				"top":-(top),
	    				"height":points["hheight"],
	    				"width":points["hwidth"]
	    			},
	    			getprior(configs,argument["callback"],"speed"),
	    			getprior(configs,argument["callback"],"centre"),
	    			function(){
	    				setCss(shade,{
		    				display:"none"
		    			});
		    			new Function(";("+onhide+")();")();
	    			});
    			}else{
    				setCss(alertBox,{
    					top:-top+"px",
    					"height":points['hheight']+"px",
	    				"width":points['hwidth']+"px"
    				});
    				setCss(shade,{
	    				display:"none"
	    			});
	    			new Function(";("+onhide+")();")();
    			}
    			
    		}
    		//获取对象优先级值
    		function getprior(oldvars,newvars,varstr){
    			if(typeof oldvars !== "object" || typeof newvars !== "object"){
    				return null;
    			}
    			if(typeof oldvars[varstr] === "undefined"){
    				return null;
    			}
    			if(newvars){
    				//如果存在call函数
    				if(typeof newvars[varstr] !== "undefined"){
    					return newvars[varstr];
    				}else{
    					return oldvars[varstr];
	    			}
    			}else{
    				return oldvars[varstr];
    			}
    		}
    		//初始化
    		function _init(){
    			var rand=mdthis.Math.random(1000);
    			shade=createElement(document.body,'div','shade',rand);
    			alertBox=createElement(shade,'div','alert',rand);
    			alertClose=createElement(alertBox,'span','close',rand);
    			alertClose.innerHTML="&times;";
    			alertTitle=createElement(alertBox,'div','alert-title',rand);
    			alertTitle.innerHTML="信息提示";
    			alertContent=createElement(alertBox,'div','alert-content',rand);
    			alertFooter=createElement(alertBox,'div','alert-footer',rand);
    			alertNo=createElement(alertFooter,'span','no',rand);
    			alertNo.innerHTML="取消";
    			alertYes=createElement(alertFooter,'span','yes',rand);
    			alertYes.innerHTML="确定";
    			//初始化css
    			initcss();
    			//初始化事件
    			initevent();
    		}
    		//config
    		function initconfig(config,newconfig){
    			if(typeof newconfig !== "object"){
    				return;
    			}
    			for(key in newconfig){
    				if(typeof config[key] !== "undefined"){
    					//滤掉多余值
		    			config[key]=newconfig[key];
    				}
    			}
    		}
    		//初始化css
    		function initcss(){
    			setCss(shade,{
    				width: "100%",
					height: "100%",
					position: "fixed",
					top:0,
					display:"none",
					background: "rgba(255,255,255,0.5)",
					zIndex:2000
    			});
    			setCss(alertBox,{
    				margin: "0 auto",
			 		width: "300px",
			 		height: "auto",
			 		position: "absolute",
			 		left: 0,
			 		right: 0,
			 		top:"-200px",
					overflow: "hidden",
			 		background: "#FFFFFF",
			 		color:"#2E3131",
			 		"boxShadow": "0 0 15px rgba(33, 35, 38, 0.19)"
    			});
    			setCss(alertClose,{
    				position: "absolute",
					right: "10px",
					top: "10px",
					"fontSize": "15px",
					"fontWeight": 700,
					color:"#B4B4B4",
					cursor: "pointer",
					"fontFamily": "sans-serif"
    			});
    			setCss(alertTitle,{
    				background: "#F2F2F2",
			 		"paddingLeft": "10px",
			 		"paddingRight": "10px",
			 		height: "30px",
			 		"lineHeight": "30px",
			 		"fontWeight": "bold",
					color:"#555555",
					"borderBottom":"solid 1px #EFEFEF",
					"whiteSpace": "nowrap",
					"textOverflow": "ellipsis",
					overflow: "hidden"
    			});
    			setCss(alertContent,{
    				overflow: "hidden",
			 		padding: "10px",
			 		color:"#484848"
    			});
    			setCss(alertFooter,{
    				borderTop:"solid 1px #EFEFEF",
			 		overflow: "hidden",
			 		padding: "5px"
    			});
    			setCss(alertNo,{
    				"fontSize": "14px",
			 		padding: "3px",
			 		float: "right",
			 		"marginRight": "10px",
			 		background: "#EDEDED",
			 		cursor: "pointer",
			 		"borderRadius": "3px",
			 		border:"solid 1px #DEDEDE"
    			});
    			setCss(alertYes,{
    				"fontSize": "14px",
			 		padding: "3px",
			 		float: "right",
			 		"marginRight": "10px",
			 		background: "#EDEDED",
			 		cursor: "pointer",
			 		"borderRadius": "3px",
			 		border:"solid 1px #DEDEDE"
    			});
    		};
    		//初始化事件
    		function initevent(){
    			mdthis.on(alertBox,"click",function(event){
    				event.preventDefault();
					event.stopPropagation();
					return false;
    			});   	
    			mdthis.on(alertClose,"click",function(event){
    				hide();
    				//如果绑定事件则执行事件
    				if(argument["callback"])
    				if(argument["callback"]["close"]){
    					new Function(";("+argument["callback"]["close"]+")();")();
    				}
    				event.preventDefault();
					event.stopPropagation();
					return false;
    			});
    			mdthis.on(shade,"click",function(event){
    				//console.log(getprior(configs,argument["callback"],"async"));
    				if(getprior(configs,argument["callback"],"async")){
    					//如果异步
    					hide();
    				}
    				event.preventDefault();
					event.stopPropagation();
					return false;
    			});
    			mdthis.on(alertYes,"click",function(event){
    				if(argument["callback"])
    				if(argument["callback"]["yes"]){
    					new Function(";("+argument["callback"]["yes"]+")();")();
    				}
    				hide();
    				event.preventDefault();
					event.stopPropagation();
					return false;
    			});
    			mdthis.on(alertNo,"click",function(event){
    				if(argument["callback"])
    				if(argument["callback"]["no"]){
    					new Function(";("+argument["callback"]["no"]+")();")();
    				}
    				hide();
    				event.preventDefault();
					event.stopPropagation();
					return false;
    			});
    		}
    		//创建标签
    		function createElement(parent,ele,id,rand){
    			elem=document.createElement(ele);
				elem.id=id+""+rand;
				parent.appendChild(elem);
				return elem;
    		}
    		//设置样式
    		function setCss(obj,css){
    			if(typeof css !== "object"||typeof obj !== 'object'){
    				return;
    			}
    			for(name in css){
    				obj.style[name]=css[name];
    			}
    		}
    		this.elem=[shade,alertBox,alertTitle,alertClose,alertContent,alertFooter,alertNo,alertYes];
    	}
    	return new alert();
    }
    //-------------------------------
    //监听长时间无操作
    md.fn.monitor=function(obj,time,callback){
    	var monitor=function(obj,time,callback){
    		var obj=obj,time=time,callback=callback;
    		if((typeof obj === "string" || typeof obj === "number") && typeof time === "function"){
    			callback=time;
    			time=obj;
    			obj=document;
    		}
    		//几时器(分)
    		this.clock=0;
    		var that=this;
    		var t=null;
    		var state=false;
    		//执行时钟
    		clk();
    		function clk(){
    			state=true;
    			t=setInterval(function(){
	    			that.clock+=1;
	    			if(typeof that.time === "function"){
	    				that.time(that.clock);
	    			}
	    			if(that.clock>=time){
	    				t=clearInterval(t);
	    				state=false;
	    				callback();
	    			}
	    		},1000);
    		}
    		//停止
    		this.stop=function(bool){
    			state=false;
    			if(bool){
    				//清零
    				that.clock=0;
    			}
    			t=clearInterval(t);
    		}
    		//开始
    		this.start=function(){
    			clk();
    		}
    		function setClock(){
    			if(state){
    				that.clock=0;
    			}
    		}
    		mdthis.on(obj,'click',function(){
    			setClock();
    		});
    		mdthis.on(obj,'mouseover',function(){
    			setClock();
    		});
    		mdthis.on(obj,'keydown',function(){
    			setClock();
    		});
    	}
    	return new monitor(obj,time,callback);
    }
    //-------------------------------













    //-------------------------------
    if(typeof define === "function"){
    	// 如果define已被定义，模块化代码(CMD规范适用)
		define(function(){
			return new MDtool;
		});
    }else{
    	//返回对象方便使用(mdtool.fun就可以使用)
		window.mdtool=window.MDtool=window.md=new MDtool;
    }
})();