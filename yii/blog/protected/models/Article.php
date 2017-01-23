<?php 
/*
	文章模型
*/
class Article extends CActiveRecord{
	/*
	下面两个是必不可少的返回模型
	*/
	public static function model($classname=__CLASS__){
		return parent::model($classname);
	}
	/*必不可缺方法二*/
	public function tableName(){
		return "{{Article}}"; //这个是返回数据库表名。
	}
	public function attributeLabels(){
		return array(
				"title"=>"标题",
				"type"=>"文章类型",
				"cid"=>"文章分类",
				"thumb"=>"缩略图",
				"info"=>"摘要",
				"content"=>"文章内容",
			);
	} 
	// 验证规则
	public function rules(){
		return array(
			array("title","required","message"=>"标题必填"),
			array("type","in","range"=>array(0,1),"message"=>"请选择类型"),
			array("cid","check_cate"),
			array("info","required","message"=>"摘要必填"),
			array("thumb","file","types"=>'jpg,gif,png,jpeg',"message"=>"没有上传文件或类型"),
			array("content","required","message"=>"内容必填")
			// array("num","match","pattern"=>"/^13\d{9}/"), //可以用正则匹配
			// array("info","safe","message"=>"摘要必填"), //安全的话可以不填
		);
	} 
	// 自定义检测函数
	public function check_cate(){
		if($this->cid <=0){
			$this->addError("cid","请选择栏目");
		}
	}

	// 设置关联
	public function relations(){
		return array(
			'cate'=>array(self::BELONGS_TO,"Category","cid")
			);
	}

	// 共同的方法
	public function common(){
		$category = Category::model();
		$article = Article::model();
		$common['nav'] = $category->findAllBySql("select cid,cname from {{category}} limit 5");
		$common['title'] = $article->findAllBySql("select aid,title from {{article}} limit 10");
		return $common;
	}
}