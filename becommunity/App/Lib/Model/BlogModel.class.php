<?php
 class BlogModel extends Model{
 	// 获取用户博文排行榜
 	public function getUserBlog(){
 		$c = M('user_list');
 		$bool = $c->limit(10)->select();
 		return $bool;
 	}
 	// 获取全部的博文，精华，热门，最新
 	public function getBlogAll($num=''){
 		$b = M('blog_article');
 		import('ORG.Util.Page');// 导入分页类
 		if($num==1){
 			$count = $b->where('perfect > 0')->count();// 查询满足要求的总记录数
 		}else if($num==2){
 			$count = $b->where('sight > 0')->count();
 		}else{
 			$count = $b->count();
 		}
 		$Page       = new Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
 		$bool['show']   = $Page->show();// 分页显示输出
 		// 1是精华，2是热门，3是最新，其他都是全部
 		if($num == 1){
 			$bool['list'] = $b->where("perfect > 0")->order("perfect desc")->limit($Page->firstRow.','.$Page->listRows)->select();
 		}else if($num==2){
			$bool['list'] = $b->where("prev = '1'")->order("sight desc")->limit($Page->firstRow.','.$Page->listRows)->select();
 		}else if($num==3){
 			$bool['list'] = $b->order("sendTime desc")->limit($Page->firstRow.','.$Page->listRows)->select();
 		}else{
 			$bool['list'] = $b->order("lid desc")->limit($Page->firstRow.','.$Page->listRows)->select();
 		}
 		return $bool;
 	}
 	public function ajaxPerfect($lid,$pp,$idnumber){
 		$p = M('blog_zan');
 		$bool=$p->where("who='$idnumber' && lid='$lid'")->find();
 		// 是否已经赞过了
 		if($bool){
 			$bool = 0;
 			return $bool;
 		}else{
 			$data['perfect'] = $pp+1;
 			$s = M('blog');
 			// 如果当它去点赞了，那么就保存这个进去
			$bb = $s->where("lid='$lid'")->save($data);
			if($bb){
	 			$z = M('perfect');
	 			$zs['zan'] = 1;
	 			$zs['lid'] = $lid;
	 			$zs['who'] = $idnumber;
	 			$zl = $z->add($zs);
	 			return $bb;
 			}
 		}
 	}
 }