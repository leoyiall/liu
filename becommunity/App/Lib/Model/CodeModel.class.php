<?php
 class CodeModel extends Model{
 	// 获取导航
 	public function getAllNav(){
 		$c = M('codesort');
 		$bool = $c->order("'order' desc")->select();
 		return $bool;
 	}
 	// 获取全部的源码
 	public function getCodeList(){
 		$User = M('code_list'); // 实例化User对象
 		import('ORG.Util.Page');// 导入分页类
 		$count      = $User->count();// 查询满足要求的总记录数
 		$Page       = new Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数
 		$bool['show']       = $Page->show();// 分页显示输出
 		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
 		$bool['list'] = $User->order('sendTime desc')->limit($Page->firstRow.','.$Page->listRows)->select();
 		return $bool;
 	}
 	// 按条件获取对应的
 	public function getSortCode($id){
 		$User = M('code_list'); // 实例化User对象
 		import('ORG.Util.Page');// 导入分页类
 		$count      = $User->where("sort='$id'")->count();// 查询满足要求的总记录数
 		$Page       = new Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数
 		$bool['show']       = $Page->show();// 分页显示输出
 		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
 		$bool['list'] = $User->where("sort='$id'")->order('sendTime desc')->limit($Page->firstRow.','.$Page->listRows)->select();
 		return $bool;
 	}
 	// 获取单个下载页面
 	public function getOneCode($id){
 		$c = M('code_list');
 		$bool = $c->where("id='$id'")->find();
 		return $bool;
 	}
 	// 获取用户的信息
 	public function getUser($id){
 		$u = M('user_list');
 		$l = $u->where("user_id='$id'")->find();
 		return $l;
 	}
 	// 获取全部的源码
 	public function getSearchCode($so){
 		$User = M('code_list'); // 实例化User对象
 		import('ORG.Util.Page');// 导入分页类
 		$count      = $User->where("title like '%$so%' or content like '%$so%' or introduce like '%$so%' or keywords like '%$so%' ")->count();// 查询满足要求的总记录数
 		$Page       = new Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数
 		$bool['show']       = $Page->show();// 分页显示输出
 		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
 		$bool['list'] = $User->where("title like '%$so%' or content like '%$so%' or introduce like '%$so%' or keywords like '%$so%' ")->order('sendTime desc')->limit($Page->firstRow.','.$Page->listRows)->select();
 		return $bool;
 	}
}