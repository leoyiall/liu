window.onload=function(){  //进来先加载
		var obtn=document.getElementById("topbtn");
// 获取有效高度
		var cleiHeight=document.documentElement.clientHeight;
		timer=null;
		var isTop=true;

		// 在滚动过程中执行
		window.onscroll=function(){
			var ostop=document.documentElement.scrollTop || document.body.scrollTop;
			if(ostop>=cleiHeight){
				obtn.style.display="block";
			}else{
				obtn.style.display="none";
			}
			if(!isTop){
				clearInterval(timer);
			}
			isTop=false; //在滚动的时候为假
		}

	obtn.onclick=function(){
		// 定时滚动上去		
		timer=setInterval(function(){
			var ostop=document.documentElement.scrollTop || document.body.scrollTop //获取当前的高度
			var ospeed=Math.floor(- ostop /6);  // 滚动速度
			document.documentElement.scrollTop=document.body.scrollTop=ostop+ospeed;

			isTop=true;//在向上滚动的过程中都是真
			if(ostop == 0){
				clearInterval(timer);
			}
		},30);
	};	

};

