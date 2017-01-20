window.onload=function(){	
	login.username.focus();

	var enter = document.getElementById("enter");
	enter.onclick=function(){
		if(login.username.value==""){
			alert("用户名不能为空");
			login.user.focus();
			return false;
		}
		if(login.password.value==""){
			alert("密码不能为空");
			login.pass.focus();
			return false;
		}
		if(login.repass.value==""){
			alert("确认密码不能为空");
			login.repass.focus();
			return false;
		}
		if(login.otherName.value==""){
			alert("昵称不能为空");
			login.nicheng.focus();
			return false;
		}
		if(login.verify.value==""){
			alert("验证码不能为空");
			login.verify.focus();
			return false;
		}
		enter.submit();
	}

}