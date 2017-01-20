<?php
class AdminProgrammeModel extends Model{
	// 获取全部编程库
	public function questionAll(){
		$l = M('programme_list');
		import('ORG.Util.Page');// 导入分页类
		$count      = $l->count();// 查询满足要求的总记录数
		$Page       = new Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
		$bool['show']       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$bool['list'] = $l->order("sendTime desc")->limit($Page->firstRow.','.$Page->listRows)->select();
		return $bool;
	}
	// 删除对应的编程库
	public function deleteQuestion($id){
		$l =  M('programme');
		$list = $l->where("id='$id'")->delete();
		return $list;
	}
	// 搜索对应的编程库
	public function searchQuestion($q){
		$l = M('programme_list');
		import('ORG.Util.Page');// 导入分页类
		$count      = $l->where("title like '%$q%' or  introduce '%$q%' or nicheng like '%$q%'")->count();// 查询满足要求的总记录数
		$Page       = new Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
		$bool['show']       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$bool['list'] = $l->where("title like '%$q%' or introduce like '%$q%' or nicheng like '%$q%'")->limit($Page->firstRow.','.$Page->listRows)->select();
		return $bool;
	}
	// 获取评论列表
	public function getQuestionComment($q){
		$l = M('com_comlist');
		import('ORG.Util.Page');// 导入分页类
		$count      = $l->count();// 查询满足要求的总记录数
		$Page       = new Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
		$bool['show']       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$bool['list'] = $l->limit($Page->firstRow.','.$Page->listRows)->select();
		return $bool;
	}
	// 获取搜索的评论
	public function searchQuestionComment($q){
		$l = M('com_comlist');
		import('ORG.Util.Page');// 导入分页类
		$count      = $l->where("qtitle like '%$q%' or comment like '%$q%' or qcontent like '%$q%'  or nicheng like '%$q%'")->count();// 查询满足要求的总记录数
		$Page       = new Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
		$bool['show']       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$bool['list'] = $l->where("qtitle like '%$q%' or comment like '%$q%' or qcontent like '%$q%' or nicheng like '%$q%'")->limit($Page->firstRow.','.$Page->listRows)->select();
		return $bool;
	}
	// 删除评论
	public function deleteCommet($id){
		$l =  M('comcoment');
		$list = $l->where("qid='$id'")->delete();
		return $list;
	}
	// 获取分类列表
	public function getProCate(){
		 $s=M('procate');
		 import('ORG.Util.Page');// 导入分页类
		 $count      = $s->count();// 查询满足要求的总记录数
		 $Page       = new Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
		 $bool['show']       = $Page->show();// 分页显示输出
		 // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		 $bool['list'] = $s->limit($Page->firstRow.','.$Page->listRows)->select();
		 return $bool;
	}
	// 获取全部的文章
	public function programmeAll($state){
		$l = M('community_list');
		import('ORG.Util.Page');// 导入分页类
		$count      = $l->where("state='$state'")->count();// 查询满足要求的总记录数
		$Page       = new Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
		$bool['show']       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$bool['list'] = $l->where("state='$state'")->order("sendTime desc")->limit($Page->firstRow.','.$Page->listRows)->select();
		return $bool;
	}
	// 搜索对应的文章
	public function searchProgramme($q,$state){
		$l = M('community_list');
		import('ORG.Util.Page');// 导入分页类
		$count      = $l->where("(qtitle like '%$q%' or qcontent like '%$q%' or nicheng like '%$q%') and state = '$state'")->count();// 查询满足要求的总记录数
		$Page       = new Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
		$bool['show']       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$bool['list'] = $l->where("(qtitle like '%$q%' or qcontent like '%$q%' or nicheng like '%$q%') and state = '$state'")->limit($Page->firstRow.','.$Page->listRows)->select();
		return $bool;
	}
	// 收录话题
	public function getTitle($id){
		$l =  M('community');
		$data['state'] = 1;
		$list = $l->where("qid='$id'")->save($data);
		return $list;
	}
	// 收录话题
	public function cancleTitle($id){
		$l =  M('community');
		$data['state'] = 0;
		$list = $l->where("qid='$id'")->save($data);
		return $list;
	}
	// 获取全部编程库
	public function getProgrammelist(){
		$p = M('programme');
		$l = $p->select();
		return $l;
	}
	// 获取全部的知识导图
	public function learnAll(){
		$l = M('propit_list');
		import('ORG.Util.Page');// 导入分页类
		$count      = $l->count();// 查询满足要求的总记录数
		$Page       = new Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
		$bool['show']       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$bool['list'] = $l->order("sendTime desc")->limit($Page->firstRow.','.$Page->listRows)->select();
		return $bool;
	}
	// 搜索知识导图
	public function searchLearn($so){
		$l = M('propit_list');
		import('ORG.Util.Page');// 导入分页类
		$count      = $l->where("title like '%$q%' or typename like '%$q%' or user like '%$q%'  or nicheng like '%$q%'")->count();// 查询满足要求的总记录数
		$Page       = new Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
		$bool['show']       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$bool['list'] = $l->where("title like '%$q%' or typename like '%$q%' or user like '%$q%' or nicheng like '%$q%'")->limit($Page->firstRow.','.$Page->listRows)->select();
		return $bool;
	}
	// 删除导图
	public function deleteLearn($id){
		$l =  M('propit');
		$list = $l->where("id='$id'")->delete();
		return $list;
	}
	// 搜索课程列表
	public function searchCourse($q){
		$l = M('procourse_list');
		import('ORG.Util.Page');// 导入分页类
		$count      = $l->where("title like '%$q%' or typename like '%$q%' or course like '%$q%'  or introduce like '%$q%'")->count();// 查询满足要求的总记录数
		$Page       = new Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
		$bool['show']       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$bool['list'] = $l->where("title like '%$q%' or typename like '%$q%' or course like '%$q%' or introduce like '%$q%'")->limit($Page->firstRow.','.$Page->listRows)->select();
		return $bool;
	}
	// 课程列表
	public function courseAll(){
		$l = M('procourse_list');
		import('ORG.Util.Page');// 导入分页类
		$count      = $l->count();// 查询满足要求的总记录数
		$Page       = new Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
		$bool['show']       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$bool['list'] = $l->order("sendTime desc")->limit($Page->firstRow.','.$Page->listRows)->select();
		return $bool;
	}
	// 删除课程
	public function deleteCourse($id){
		$l =  M('procourse');
		$list = $l->where("id='$id'")->delete();
		return $list;
	}
	// 结课操作
	public function overCourse($id){
		$l =  M('procourse');
		$data['isOver'] = 1;//结课
		$list = $l->where("id='$id'")->save($data);
		return $list;
	}
	// 未结课操作
	public function nOverCourse($id){
		$l =  M('procourse');
		$data['isOver'] = 0;//取消结课
		$list = $l->where("id='$id'")->save($data);
		return $list;
	}
	// 获取全部没有完结的课程
	public function getAllCourseList(){
		$l = M('procourse');
		$bool = $l->where("isOver = '0'")->select();
		return $bool;
	}
		// 获取全部章节课程
	public function getAllZhangList(){
		$l = M('procate');
		$bool = $l->select();
		return $bool;
	}
	// 获取搜索的章节名称
	public function searchCategory($q){
		$l = M('procategory_list');
		import('ORG.Util.Page');// 导入分页类
		$count      = $l->where("course like '%$q%' or zname like '%$q%' or kname like '%$q%' ")->count();// 查询满足要求的总记录数
		$Page       = new Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
		$bool['show']       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$bool['list'] = $l->where("course like '%$q%' or zname like '%$q%' or kname like '%$q%' ")->limit($Page->firstRow.','.$Page->listRows)->select();
		return $bool;
	}
	// 全部章节名称列表
	public function categoryAll(){
		$l = M('procategory_list');
		import('ORG.Util.Page');// 导入分页类
		$count      = $l->count();// 查询满足要求的总记录数
		$Page       = new Page($count,15);// 实例化分页类 传入总记录数和每页显示的记录数
		$bool['show']       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$bool['list'] = $l->order("sendTime desc")->limit($Page->firstRow.','.$Page->listRows)->select();
		return $bool;
	}
	// 删除章节名称
	public function deleteChapter($id){
		$l =  M('procategory');
		$list = $l->where("id='$id'")->delete();
		return $list;
	}
		// 搜索课程列表
	public function searchVedio($q){
		$l = M('course_list');
		import('ORG.Util.Page');// 导入分页类
		$count      = $l->where("(cname like '%$q%' or zname like '%$q%' or content like '%$q%' or course like '%$q%'  or kname like '%$q%') and isOver='0'")->count();// 查询满足要求的总记录数
		$Page       = new Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
		$bool['show']       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$bool['list'] = $l->where("(cname like '%$q%' or zname like '%$q%' or content like '%$q%' or course like '%$q%' or kname like '%$q%') and isOver='0'")->limit($Page->firstRow.','.$Page->listRows)->select();
		return $bool;
	}

	// 获取全部的vedio
	public function getAllVedio(){
		$l = M('course_list');
		import('ORG.Util.Page');// 导入分页类
		$count      = $l->where("isOver='0'")->count();// 查询满足要求的总记录数
		$Page       = new Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
		$bool['show']       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$bool['list'] = $l->where("isOver='0'")->order("sendTime desc")->limit($Page->firstRow.','.$Page->listRows)->select();
		return $bool;
	}
	// 删除视频
	public function deleteVedio($id){
		$l =  M('procourselist');
		$list = $l->where("id='$id'")->delete();
		return $list;
	}
}