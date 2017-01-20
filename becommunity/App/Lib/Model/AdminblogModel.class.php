<?php
class AdminblogModel extends Model{
	// 获取登录的后台用户
	public function getAdminUser(){
        $id=session("id");
        $s = M('user');
        $list = $s->where("id='$id'")->select();
		if($list[0]['power']=="2"){
			$list['gly']="超级管理员";
		}else if($list[0]['power']=="1"){
			$list['gly']="管理员";
		}else if($list[0]['power']==0){
			$list['gly']="编辑员";
		}
		 session("who",$list);
		 $data = session("who");
		 return $data;
	}
	// 获取文章列表
	public function getBlogList($so=''){
		$b = M('blog_article');
		import('ORG.Util.Page');// 导入分页类
		if($so){
			$count  = $b->where("title like '%{$so}%' or content like '%{$so}%'")->count();// 查询满足要求的总记录数
			$Page   = new Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
			$data['show']       = $Page->show();// 分页显示输出
			// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
			$data['list'] = $b->where("title like '%{$so}%' or content like '%{$so}%'")->order('sendTime desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		}else{
			$count      = $b->count();// 查询满足要求的总记录数
			$Page       = new Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
			$data['show']       = $Page->show();// 分页显示输出
			// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
			$data['list'] = $b->order('sendTime desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		}
		return $data;
	}
	// 删除对应的博文
	public function deleteBlog($id){
		$a = M('blog');
		$list = $a->where("lid='$id'")->delete();
		return $list;
	}
	// 获取留言列表
	public function getBlogMessage($so=''){
		$b = M('message_intro');
		import('ORG.Util.Page');// 导入分页类
		if($so){
			$count  = $b->where("message like '%{$so}%'")->count();// 查询满足要求的总记录数
			$Page   = new Page($count,15);// 实例化分页类 传入总记录数和每页显示的记录数
			$data['show']       = $Page->show();// 分页显示输出
			// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
			$data['list'] = $b->where("message like '%{$so}%'")->order('sendTime desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		}else{
			$count      = $b->count();// 查询满足要求的总记录数
			$Page       = new Page($count,15);// 实例化分页类 传入总记录数和每页显示的记录数
			$data['show']       = $Page->show();// 分页显示输出
			// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
			$data['list'] = $b->order('sendTime desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		}	
		return $data;
	}
	// 删除留言
	public function deleteMessage($id){
		$a = M('messageboard');
		$list = $a->where("mid='$id'")->delete();
		return $list;
	}
	// 获取评论列表
	public function getBlogComment($so=''){
		$b = M('blog_xinxi');
		import('ORG.Util.Page');// 导入分页类
		if($so){
			$count  = $b->where("comment like '%{$so}%'")->count();// 查询满足要求的总记录数
			$Page   = new Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
			$data['show']       = $Page->show();// 分页显示输出
			// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
			$data['list'] = $b->where("comment like '%{$so}%'")->order('sendTime desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		}else{
		$count      = $b->count();// 查询满足要求的总记录数
		$Page       = new Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
		$data['show']       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$data['list'] = $b->order('sendTime desc')->limit($Page->firstRow.','.$Page->listRows)->select();
	}	
		return $data;
	}
	// 删除评论
	public function deleteCommet($id){
		$a = M('comment');
		$list = $a->where("cid='$id'")->delete();
		return $list;
	}
}