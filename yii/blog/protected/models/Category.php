<?php 
/*
	分类模型
*/
class Category extends CActiveRecord{
	/*
	下面两个是必不可少的返回模型
	*/
	public static function model($classname=__CLASS__){
		return parent::model($classname);
	}
	/*必不可缺方法二*/
	public function tableName(){
		return "{{category}}"; //这个是返回数据库表名。
	}
	public function attributeLabels(){
		return array(
				"cname"=>"栏目名称",
			);
	}
	public function rules(){
		return array(
				array("cname","required","message"=>"栏目必填")
			);
	}

}

