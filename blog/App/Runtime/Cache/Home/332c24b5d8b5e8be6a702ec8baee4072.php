<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Be程序员社区——用户注册</title>

<link rel="stylesheet" href="__PUBLIC__/blog/css/style.css">

<script type="text/javascript" src="__PUBLIC__/blog/js/jquery-2.1.0.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/blog/js/easyform.js"></script>
<script type="text/javascript" src="__PUBLIC__/blog/js/MDtool.js"></script>
<link rel="shortcut icon" href="__PUBLIC__/images/ico.png" type="image/x-icon" />

</head>
<body>
<br>
<div class="form-div">
    <form id="reg-form" action="" method="post">
        <table>
            <tr>
              <td colspan="2">
              <center>
      <a href=""><img src="__PUBLIC__/images/ico.png" alt=""></a><h1 style="font-size:24px;font-weight:bold;font-family:'幼圆';">Be程序员社区注册</h1>
              </center>
              </td>  
            </tr>
            <tr>
                <td>用户名</td>
                <td><input name="uid" type="text" id="uid" easyform="length:4-16;char-normal;real-time;" message="用户名必须为6—16位的英文字母或数字" easytip="disappear:lost-focus;theme:blue;" ajax-message="用户名已存在!">
                </td>
            </tr>
            <tr>
                <td>密码</td>
                <td><input name="psw1" type="password" id="psw1" easyform="length:6-16;" message="密码必须为6—16位" easytip="disappear:lost-focus;theme:blue;"></td>
            </tr>
            <tr>
                <td>email</td>
                <td><input name="email" type="email" id="email" easyform="email;real-time;" message="Email格式要正确" easytip="disappear:lost-focus;theme:blue;" ajax-message="这个Email地址已经被注册过，请换一个吧!"></td>
            </tr>           
        </table>

		<div class="buttons">
			<input value="注 册" type="button" style="margin-right:20px; margin-top:20px;" id="sub">
			<input value="我有账号，我要登录" type="button" style="margin-right:45px; margin-top:20px;" onclick='jump()'>
        </div>
        <br class="clear">
    </form>
</div>

<script type="text/javascript">
$(document).ready(function(){
	$('#reg-form').easyform();
});
// 实例化弹出框
var ms=mdtool.messager();
function jump(){
    window.location.href="<?php echo U('Common/login');?>";
}
$("#sub").on("click",function(){    
    // 判断不能为空
    var email = $("#email").val();
    if(email.length <=0 ){
        ms.send("邮件不能为空");
        return;
    }
    var user=$('#uid').val();
    if(user.length <=0 ){
        ms.send("用户名不能为空");
        return;
    }else if(user.length <6 || user.length >16){
       ms.send("用户名必须6位到16位");
       return; 
    }
    var pass=$('#psw1').val();
    if(pass.length <=0 ){
        ms.send("密码不能为空");
        return;
    }else if(pass.length <6){
       ms.send("密码不能大于6位");
       return; 
    }
    $.ajax({
            url : "<?php echo U('doreg');?>",
            type:'post',
            datatype:'json',
            data:{
                'user':user,
                'pass':pass,
                'email':email
            },
            success:function(e){
                console.log(e);
                if(e['bool']){
                    ms.send(e['info']);
                    setTimeout(function(){
                        window.location.href=e['link'];
                    },3000);
                }else{
                    ms.send(e['info']);
                }
            }
        });
    });

</script>
</body>
</html>