<?php
class CommonModel extends Model{
	// 执行添加用户
	public function addUser($data){	
		$user = M('userlist');
		$bool = $this->searchUser($data['user']);//判断用户是否存在
		if($bool){
			$msg['info'] = '用户名已存在!';
			$msg['bool'] = 0;
			return $msg;
			die;
		}
		$list = $user->add($data);
		if($list){
			$msg['info'] = "注册成功,将转到登录!";	
			$msg['bool'] = 1;	
			$msg['link'] = "login";//博客登录
		}else{
			$msg['info'] = "系统出现故障!注册失败.";
			$msg['bool'] = 0;
		}
		return $msg;
	}
	// 查找是否存在该用户
	public function searchUser($data){
		$user = M('userlist');
		$list=$user->where("user='$data'")->find();
		if($list){
			$bool = 1;
		}else{
			$bool = 0;
		}
		return $bool;
	}
}