// 执行删除,修改状态
function treat(obj,data){
	if(confirm(data)){
		var a = $(obj).attr("data-link");
		window.location.href=a;
	}else{
		return false;
	}
}
