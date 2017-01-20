<?php
 class ProgrammeModel extends Model{
 	// 获取全部的编程库
 	public function getProgramme($limit){
 		$l = M('programme_list');
 		$bool = $l->limit($limit)->select();
 		return $bool;
 	}
 	// 获取单个编程库
 	public function getProgrammeList($id){
 		$l = M('programme_list');
 		$bool = $l->where("id='$id'")->find();
 		return $bool;
 	}
 	// 获取分页的编程库
 	public function getProgrammeAll(){
 		$User = M('programme_list');
 		import('ORG.Util.Page');// 导入分页类
 		$count      = $User->count();// 查询满足要求的总记录数
 		$Page       = new Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数
 		$bool['show']       = $Page->show();// 分页显示输出
 		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
 		$bool['list'] = $User->order('sendTime desc')->limit($Page->firstRow.','.$Page->listRows)->select();
 		return $bool;
 	}
 	 // 获取10个精彩收录
 	public function getShouLu($id){
 		$l = M('community_list');
 		$bool = $l->where("qtype='$id' and state='1'")->order("sight desc")->limit(10)->select();
 		return $bool;
 	}
 	 // 获取10个问题收录
 	public function getQuestionList($id){
 		$l = M('question_list');
 		$bool = $l->where("qtype='$id'")->order("sight desc")->limit(10)->select();
 		return $bool;
 	}
 	 // 获取2个教学视频
 	public function getVedioList($id,$limit,$tj){
 		$l = M('pro_course');
 		$bool = $l->where("sort='$id'")->order("$tj desc")->limit($limit)->select();
 		return $bool;
 	}
 	// 获取收录列表
 	public function getShouLuList($id){
 		$User = M('community_list'); // 实例化User对象
 		import('ORG.Util.Page');// 导入分页类
 		$count      = $User->where("state=1 and qtype= '$id'")->count();// 查询满足要求的总记录数
 		$Page       = new Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数
 		$bool['show']       = $Page->show();// 分页显示输出
 		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
 		$bool['list'] = $User->where("state=1 and qtype= '$id'")->order('sendTime desc')->limit($Page->firstRow.','.$Page->listRows)->select();
 		return $bool;
 	}
	 	// 获取问题列表
 	public function getQuestionAll($id){
 		$User = M('question_list'); // 实例化User对象
 		import('ORG.Util.Page');// 导入分页类
 		$count      = $User->where("qtype= '$id'")->count();// 查询满足要求的总记录数
 		$Page       = new Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数
 		$bool['show']       = $Page->show();// 分页显示输出
 		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
 		$bool['list'] = $User->where("qtype= '$id'")->order('sendTime desc')->limit($Page->firstRow.','.$Page->listRows)->select();
 		return $bool;
 	}
 	// 获取图谱
 	public function getPitList($id){
 		$l = M('propit');
 		$bool = $l->where("bid='$id'")->select();
 		return $bool;
 	}
 	// 获取教学视频
 	public function getLearnVedio($id){
 		$User = M('pro_course'); // 实例化User对象
 		import('ORG.Util.Page');// 导入分页类
 		$count      = $User->where("pid='$id'")->count();// 查询满足要求的总记录数
 		$Page       = new Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数
 		$bool['show']       = $Page->show();// 分页显示输出
 		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
 		$bool['list'] = $User->where("pid='$id'")->order('sendTime desc')->limit($Page->firstRow.','.$Page->listRows)->select();
 		return $bool;
 	}
 	// 获取当前课堂的信息
 	public function getCourseMessage($id){
 		$l = M('pro_course');
 		$bool = $l->where("id='$id'")->find();
 		return $bool;
 	}
 	// 获取某一节课
 	public function getOneCourse($id){
 		$l = M('course_list');
 		$bool = $l->where("id='$id'")->find();
 		return $bool;
 	}
 	 	// 获取全部的课程2
 	public function getNowCourseTwo($id){
 		$l = M('course_list');
 		$bool = $l->where("pid='$id'")->select();
 		return $bool;
 	}
 	// 搜索编程库
 	public function getProgrammeSearch($so){
 		$User = M('programme_list');
 		import('ORG.Util.Page');// 导入分页类
 		$count      = $User->where("title like '%$so%' or introduce like '%$so%' or typename like '%$so%' ")->count();// 查询满足要求的总记录数
 		$Page       = new Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数
 		$bool['show']       = $Page->show();// 分页显示输出
 		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
 		$bool['list'] = $User->where("title like '%$so%' or introduce like '%$so%' or typename like '%$so%' ")->order('sendTime desc')->limit($Page->firstRow.','.$Page->listRows)->select();
 		return $bool;
 	}
 }