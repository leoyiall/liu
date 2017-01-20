<?php
class CommunityModel extends Model{
	// 自动添加这个用户的信息到表里
	public function getUserMessage($id){
		$u = M('userintro');
		$bool = $u->where("user_id = '$id'")->find();
		if($bool){
			return $bool;
		}else{
			$data['user_id'] = $id; 
			$bool = $u->add($data);
			return $bool;
		}
	}
	// 执行保存资料
	public function saveZiliao($id,$data){
		$u = M('userintro');
		$list = $u->where("usid='$id'")->save($data);
		return $list;
	}
	// 修改用户的等级
	public function modifyLev($id){
		$u = M('userintro');
		$list = $u->where("user_id='$id'")->find();
		// lv1
		if($list['exp']>=0 && $list['exp']<300){
			$data['lev'] = 1;
		}else if($list['exp']>=300 && $list['exp']<600){
		// lv2
			$data['lev'] = 2;
		}else if($list['exp']>=600 && $list['exp']<1000){
		// lv3
			$data['lev'] = 3;
		}else if($list['exp']>=1000 && $list['exp']<1500){
			$data['lev'] = 4;
		}else if($list['exp']>=1500 && $list['exp']<2000){
			$data['lev'] = 5;
		}else if($list['exp']>=2000 && $list['exp']<2500){
			$data['lev'] = 6;
		}else if($list['exp']>=2500 && $list['exp']<3000){
			$data['lev'] = 7;
		}else if($list['exp']>=3000 && $list['exp']<3500){
			$data['lev'] = 8;
		}else if($list['exp']>=3500 && $list['exp']<4000){
			$data['lev'] = 9;
		}else if($list['exp']>=4000 && $list['exp']<4500){
			$data['lev'] = 10;
		}else if($list['exp']>=4500 && $list['exp']<5000){
			$data['lev'] = 11;
		}else if($list['exp']>=5000 && $list['exp']<6000){
			$data['lev'] = 12;
		}else if($list['exp']>=6000 && $list['exp']<7000){
			$data['lev'] = 13;
		}else if($list['exp']>7000 && $list['exp']<8000){
			$data['lev'] = 14;
		}else if($list['exp']>=8000 && $list['exp']<9000){
			$data['lev'] = 15;
		}else if($list['exp']>=9000){
			$data['lev'] = 16;
		}
			$bool = $u->where("user_id='$id'")->save($data);
		return $bool;
	}
	// 获取问题类型
	public function getQuestionType(){
		$q = M('questiontype');
		$qlist = $q->select();
		return $qlist;
	}
	// 获取全部的悬赏
	public function getQuestionOffer(){
		$o = M('offer');
		$olist = $o->order("money asc")->select();
		return $olist;
	}
	// 发布问题
	public function sendQuestion($id,$data){
		$q = M('community');
		$u = M('userintro');
		$l = $u->where("user_id='$id'")->find();
		if($l){
			$ep['exp'] = $l['exp']+10;//每篇文章+10经验值
			$ep['jifen'] = $l['jifen']+50;//每篇文章+50积分
			$ep['bmoney'] = $l['bmoney']+5 - $data['oid'];//每篇文章+5金币
			// 如果传过来的金币数量少于官方给的，那么就是0金币的
			if($data['jinbi']<$data['oid']){
				$data['oid'] = 0;//默认金币为0
			}
			$ll = $u->where("user_id='$id'")->save($ep);
			$list = $q->add($data);
			return $list;
		}else{
			$list = 0;
			return $list;
		}
	}
	// 获取首页对应的问题
	public function getQuestionList($idnumber,$num){
		$q = M('community_list');
		import('ORG.Util.Page');// 导入分页类
		$count = $q->count();
		$Page   = new Page($count,30);// 实例化分页类 传入总记录数和每页显示的记录数
		$bool['show']       = $Page->show();// 分页显示输出
		switch($num){
			// 1为热门，2为最新
			case "1":
			$bool['list'] = $q->order("sight desc")->limit($Page->firstRow.','.$Page->listRows)->select();
			break;
			case "2":
			$bool['list'] = $q->order("sendTime desc")->order("sendTime desc")->limit($Page->firstRow.','.$Page->listRows)->select();
			break;
			default:
			$bool['list'] = $q->order("sendTime desc")->limit($Page->firstRow.','.$Page->listRows)->select();
			break;
		}
		return $bool;
	}
	// 获取个人中心对应的问题
	public function getQuestionIndex($idnumber){
		$q = M('community_list');
		import('ORG.Util.Page');// 导入分页类
		$count = $q->where("user_id='$idnumber'")->count();
		$Page   = new Page($count,30);// 实例化分页类 传入总记录数和每页显示的记录数
		$bool['show']       = $Page->show();// 分页显示输出
		$bool['list'] = $q->where("user_id='$idnumber'")->order("sendTime desc")->limit($Page->firstRow.','.$Page->listRows)->select();
		return $bool;
	}
	// 获取积分排行，金币排行，未解决问题，未回答的问题
	public function getList($limit){
		$ql = M("userintro");
		$ll = M('community_list');
		$bool = $ll->where("state = '1'")->order("sight desc")->limit($limit)->select();
		return $bool;
	}
	// 获取对应id的文章内容
	public function getOneQuestion($id){
		$q = M('community_list');
		$bool = $q->where("qid='$id'")->find();
		return $bool;
	}
	// 执行添加浏览量
	public function addSight($id,$sight){
		$q = M('community');
		$data['sight'] = $sight;
		$list = $q->where("qid='$id'")->save($data);
		return $list;
	}
	// 查看全部的领域出来
	public function selectArea(){
		$u = M('questiontype');
		$ly = $u->order("tid asc")->select();
		return $ly;
	}
	// 执行删除问题
	public function delQuestion($id,$idnumber){
		$question = M('community');
		$u = M('userintro');
		$data = $u->where("user_id='$idnumber'")->find();
		$data['jifen'] = $data['jifen'] - 100;//如果删除-100积分
		if($data<0){
			$data = 0;//减到积分为0时，就默认为0
		}
		$s = $u->where("user_id='$idnumber'")->save($data); 
		$l = $question->where("qid='$id'")->delete();
		return $l;
	}
	// 获取需要修改的question
	public function getQuestion($id){
		$q = M("community_list");
		$l = $q->where("qid='$id'")->find();
		return $l;
	}
	// 获取问答的全部回复
	public function getCommentList($id){
		$q = M('com_comment');
		$list = $q->where("ques_id='$id'")->select();
		return $list;
	}
	// 获取搜索的列表
	public function getSearchList($q){
		$l = M('community_list');
		import('ORG.Util.Page');// 导入分页类
		$count      = $l->where("qtitle like '%$q%' or qcontent like '%$q%' or nicheng like '%$q%'")->count();// 查询满足要求的总记录数
		$Page       = new Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数
		$bool['show']       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$bool['list'] = $l->where("qtitle like '%$q%' or qcontent like '%$q%' or nicheng like '%$q%'")->order('sendTime desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		return $bool;
	}
 // 个人中心获取未回答的问题10条
 public function getNoState($id){
 	$q = M('question_list');
 	$l = $q->where("user_id='$id' and state = '0' ")->limit(10)->select();
 	return $l;
 }	
}