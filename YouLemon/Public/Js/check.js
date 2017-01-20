// 验证表单快速查找
function check(){
	var formYan = document.formYan;
	var form2 = document.form2;
 if (formYan.soso.value==""){
  alert("编号不能为空!");
  formYan.soso.focus();   
  return false; 
 }
 if (formYan.mima.value==""){
  alert("查询密码不能为空!");
  formYan.mima.focus();   
  return false;   
 }
 return true;   //输入符合要求后执行表单提交操作
}
// 验证标题查询
function check2(){
	 if (form2.bt.value==""){
  alert("标题不能为空!");
  form2.bt.focus();   //用户名输入框获得焦点
  return false;   //不提交表单
 }
 return true;   //输入符合要求后执行表单提交操作
}
