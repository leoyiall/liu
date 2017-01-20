<?php
 class AdminlistModel extends Model{
 	// 获取全部的管理员
 	public function getUserList(){
 		$User = M('user'); // 实例化User对象
 		import('ORG.Util.Page');// 导入分页类
 		$count      = $User->count();// 查询满足要求的总记录数
 		$Page       = new Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数
 		$bool['show']       = $Page->show();// 分页显示输出
 		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
 		$bool['list'] = $User->limit($Page->firstRow.','.$Page->listRows)->select();
 		return $bool;
 	}
 	// 获取全部的用户
 	public function getList(){
 		$User = M('about_user'); // 实例化User对象
 		import('ORG.Util.Page');// 导入分页类
 		$count      = $User->count();// 查询满足要求的总记录数
 		$Page       = new Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数
 		$bool['show']       = $Page->show();// 分页显示输出
 		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
 		$bool['list'] = $User->limit($Page->firstRow.','.$Page->listRows)->select();
 		return $bool;
 	}
 	// 按条件获取对应的
 	public function getSearchList($so){
 		$User = M('user'); // 实例化User对象
 		import('ORG.Util.Page');// 导入分页类
 		$count      = $User->where("user like '%$so%' or nicheng like '%$so%' ")->count();// 查询满足要求的总记录数
 		$Page       = new Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数
 		$bool['show']       = $Page->show();// 分页显示输出
 		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
 		$bool['list'] = $User->where("user like '%$so%' or nicheng like '%$so%' ")->limit($Page->firstRow.','.$Page->listRows)->select();
 		return $bool;
 	}
 	// 按条件获取对应的
 	public function getSearchYonghu($so){
 		$User = M('about_user'); // 实例化User对象
 		import('ORG.Util.Page');// 导入分页类
 		$count      = $User->where("user like '%$so%' or nicheng like '%$so%' ")->count();// 查询满足要求的总记录数
 		$Page       = new Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数
 		$bool['show']       = $Page->show();// 分页显示输出
 		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
 		$bool['list'] = $User->where("user like '%$so%' or nicheng like '%$so%' ")->limit($Page->firstRow.','.$Page->listRows)->select();
 		return $bool;
 	}
 	// 删除对应的管理员
 	public function deleteAdmin($id){
 		$l =  M('user');
 		$list = $l->where("id='$id'")->delete();
 		return $list;
 	}
 	// 删除对应的用户
 	public function deleteUser($id){
 		$l =  M('userlist');
 		$u =  M('userintro');
 		$ll = $l->where("idnumber='$id'")->delete();
 		$uu = $u->where("user_id='$id'")->delete();
 		if($ll && $uu){
 			$list = 1;
 		}else{
 			$list = 0;
 		}
 		return $list;
 	}
}