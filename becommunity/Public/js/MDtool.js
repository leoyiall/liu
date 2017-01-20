/**
*	@name: 		MDtool javascript工具箱
*   @time: 		2015-09-07 19:27
*	@author: 	bluemoon
*	@QQ: 		1752295326
*	@gitHub: 	mengdu
*
**/
;(function(){
	//插件对象
	var MDtool=function(){
		//插件信息
		this.info={
			"name":"MDtool",
			"author":"bluemoon",
			"birthday":"2015-09-07 19:27",
			"info":"一个javascript工具箱",
			"versions":"1.0",
		}
	};
	var md=MDtool;
	//原型等价
	md.fn=MDtool.prototype;
	//-------------------------------
	//ajax文件上传 object
	md.fn.uploadFile=function(data){
			var uploadFile=function(data){
			var form=new FormData();
			var xhr=XHR();
			//初始参数
			var type="POST";
			var url=data["url"]||"";
			var dataType=data["dataType"]||"json";
			var async=data["async"]||true;
			var timeout=data["timeout"]||10000;
			//非文件数据
			for(var key in data["data"]){
				if(key!="files"&&key!="file"){
					form.append(key,data["data"][key]);
				}
			}
			//多文件上传
			for(var name in data["data"]["files"]){
				for(var f in data["data"]["files"][name]){
					form.append(name+"[]",data["data"]["files"][name][f]);
				}
			}
			//单文件上传
			for(var name in data["data"]["file"]){
				form.append(name,data["data"]["file"][name]);
			}
			xhr.open(type,url,async);
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
						"status":xhr.status,
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
				if(data.onprogress){
					data.onprogress(e);
				}
				//e.loaded//目前已经上传大小
				//e.totalSize//总共要上传大小
			}
			//发送
			xhr.send(form);
			//取消上传
			this.abort=function(){
				xhr.abort();
			}

			function XHR(){
				var request=false;
				//window对象中有XMLHttpRequest存在就是非IE
				if(window.XMLHttpRequest){
					request=new XMLHttpRequest();
					if(request.overrideMimeType){
						request.overrideMimeType("text/xml");
					}
				//window对象中有ActiveXObject存在就是IE低版本5 6 
				}else if(window.ActiveXObject){
					var versions=['Microsoft.XMLHTTP', 'MSXML.XMLHTTP', 'Msxml2.XMLHTTP.7.0','Msxml2.XMLHTTP.6.0','Msxml2.XMLHTTP.5.0', 'Msxml2.XMLHTTP.4.0', 'MSXML2.XMLHTTP.3.0', 'MSXML2.XMLHTTP'];
					for(var i=0; i<versions.length; i++){
						try{
							request=new ActiveXObject(versions[i]);
							if(request){
								return request;
							}
							}catch(e){
								request=false;
							}
						}
					}
					return request;
			}
		}
		//可以省去new操作(MDtool)
		return new uploadFile(data);
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
				M_BG.style.width=(data[now].replace(/<[^>]+>/g,"").length+1)*12+"px";
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
					"paddingRight":"3px",
					"paddingLeft":"3px",
					"bottom":"0px",
					"left":0,
					"right":0,
					"textAlign":"center",
					"fontSize":"12px",
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
				"imgType":"",
			};
			var that=this;
			//刷新数据
			function _refresh(callback){
				var info={
					"bool":false,
					"info":"",
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
					"result":[],
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
					"result":[],
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
    }
    //-------------------------------
    //插件方法扩展方法
    md.extend=md.fn.extend=function(obj){
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
    //-------------------------------
	//返回对象方便使用(mdtool.fun就可以使用)
	window.mdtool=window.MDtool=new MDtool;
})();