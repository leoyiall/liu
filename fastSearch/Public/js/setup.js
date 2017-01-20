window.onload=function(){	
	var news = document.getElementById("newsbox");
	var liHeight = 20;
	news.innerHTML+=news.innerHTML;
	news.scrollTop = 0;

	var speed = 50;
	var delay = 1000;
	var myscroll;

	function moveStart(){
		news.scrollTop++;
		myscroll = setInterval(scrollup,speed);
	} 

	function scrollup(){
		if(news.scrollTop % liHeight == 0){
			clearInterval(myscroll);
			setTimeout(moveStart(),delay);
		}else{
			news.scrollTop++;
			if(news.scrollTop >= news.scrollHeight/2){
				news.scrollTop = 10;
			}
		}
	}

	setTimeout(moveStart(),delay);
}