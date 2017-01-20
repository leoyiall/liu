<?php
class AdminQuestionModel extends Model{
	// 获取全部问题
	public function questionAll(){
		$l = M('question_list');
		import('ORG.Util.Page');// 导入分页类
		$count      = $l->count();// 查询满足要求的总记录数
		$Page       = new Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
		$bool['show']       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$bool['list'] = $l->limit($Page->firstRow.','.$Page->listRows)->select();
		return $bool;
	}
	// 删除对应的问题
	public function deleteQuestion($id){
		$l =  M('question');
		$list = $l->where("qid='$id'")->delete();
		return $list;
	}
	// 搜索对应的问题
	public function searchQuestion($q){
		$l = M('question_list');
		import('ORG.Util.Page');// 导入分页类
		$count      = $l->where("qtitle like '%$q%' or qcontent like '%$q%' or nicheng like '%$q%'")->count();// 查询满足要求的总记录数
		$Page       = new Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
		$bool['show']       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$bool['list'] = $l->where("qtitle like '%$q%' or qcontent like '%$q%' or nicheng like '%$q%'")->limit($Page->firstRow.','.$Page->listRows)->select();
		return $bool;
	}
	// 获取评论列表
	public function getQuestionComment($q){
		$l = M('ques_comlist');
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
		$l = M('ques_comlist');
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
		$l =  M('quescoment');
		$list = $l->where("qid='$id'")->delete();
		return $list;
	}
	// 获取分类列表
	public function getQuestionType(){
		 $s=M('questiontype');
		 import('ORG.Util.Page');// 导入分页类
		 $count      = $s->count();// 查询满足要求的总记录数
		 $Page       = new Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
		 $bool['show']       = $Page->show();// 分页显示输出
		 // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		 $bool['list'] = $s->limit($Page->firstRow.','.$Page->listRows)->select();
		 return $bool;
	}
	// 获取分类列表
	public function getAllTypeList(){
		 $s=M('questiontype');
		 $bool = $s->select();
		 return $bool;
	}
}