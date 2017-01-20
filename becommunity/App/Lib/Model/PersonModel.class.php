<?php
class PersonModel extends Model{
	// 获取用户博客信息
	public function getUser($idnumber){	
		$user = M('userAbout');
		// 去获取用户的个人信息
		$list = $user->where("idnumber='$idnumber'")->find();
		return $list;	
	}
	// 根据用户的id号进行获取到对应关于我的数据
	public function getAbout($id){
		$a = M('aboutme');
		$list = $a->where("user_id='$id'")->find();
		return $list;
	}
	// 获取我的数据
	public function getMe($id){
		$a = M('aboutme');
		$bool = $a->where("user_id='$id'")->find();
		return $bool;
	}
	// 获取个人空间资料
	public function getBase($id){
		$i = M('introduce');
		$bool = $i->where("user_id='$id'")->find();
		return $bool;
	}
	// 获取全部分类
	public function getCate($id){
		$c = M('cate');
		$cli = $c->where("user_id='$id'")->select();
		return $cli;
	}
	// 保存博文
	public function saveArc($data){
		$b = M('blog');
		$bool = $b->add($data);
		return $bool;
	}
	// 获取文章内容
	public function getArticle($id,$lid){
		$bb = M('blog_cate');
		$bool = $bb->where("lid='$lid' and user_id='$id'")->find();
		return $bool;
	}
	// 增加浏览量
	public function modifySight($id,$lid,$num){
		$bb = M('blog');
		$b = $bb->where("lid='$lid' and user_id='$id'")->save($num);
		return $b;
	}

	// 获取全部的留言
	public function getMessage($id){
		$mi = M('message_intro');
		import('ORG.Util.Page');// 导入分页类
		// 如果存在分类，就只要这一类显示就可以了
		$count      = $mi->where("me_id ='$id'")->count();// 查询满足要求的总记录数
		$Page       = new Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数
		$data['show']       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$data['mlist'] = $mi->where("me_id ='$id'")->order('sendTime desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		return $data;
	}
	// 获取对应的留言
	public function getAnswer($id){
		$m = M("message_intro");
		$bool = $m->where("bo_id='$id'")->order("sendTime desc")->select();
		return $bool;
	}
	// 获取对应文章的评论
	public function getComment($lid){
		$m = M("blog_comment");
		$set = M('set');
		$bon = $set->where("id='1'")->getfield("b_on");
		if($bon){ // 为1需要审核的才能显示,不的话全部显示
			$bool = $m->where("arc_id='$lid' and pass='1'")->order("sendTime desc")->select();
		}else{
			$bool = $m->where("arc_id='$lid'")->order("sendTime desc")->select();
		}	
		return $bool;
	}
	// 是否已经关注某人
	public function getCare($id,$idnumber){
		$f = M('fans_user');
		$bool=$f->where("user_id='$idnumber' && fans_id='$id'")->find();
		return $bool;
	} 
	// 多少粉丝
	public function getFans($id){
		$f = M('fans_user');
		$bool=$f->where("fans_id='$id'")->count();
		return $bool;
	}
	// 获取这个人的粉丝列表
	public function getff($id,$idnumber){
		$f = M('fans_fans');
		$bool=$f->where("fans_id='$id'")->select();
		return $bool;
	}
	// 获取关注的列表
	public function getSee($id,$idnumber){
		$f = M('fans_user');
		$bool=$f->where("user_id='$id'")->select();
		return $bool;
	}
	// 获取关注多少人
	public function getCares($id,$idnumber){
		$f = M('fans_user');
		$bool=$f->where("user_id='$id'")->count();
		return $bool;
	}
	// 获取全部的评论
	public function getComments($id){
		$m = M("blog_xinxi");
		$bool = $m->where("user_id='$id'")->order("sendTime desc")->select();
		return $bool;
	}
}