<?php 
/*
	后台用户模型
*/
class User extends CActiveRecord{
	public $password1;
	public $password2;

	/*
	下面两个是必不可少的返回模型
	*/
	public static function model($classname=__CLASS__){
		return parent::model($classname);
	}
	/*必不可缺方法二*/
	public function tableName(){
		return "{{admin}}"; //这个是返回数据库表名。
	}

	// 新建标签
	public function attributeLabels(){
		return array(
			"password"=>"原始密码",
			"password1"=>"新密码",
			"password2"=>"确认密码",
			);
	} 
	// 验证规则
	public function rules(){
		return array(
			array("password","required","message"=>"原始密码不能为空"),
			array("password","check_passwd"),
			array("password1","required","message"=>"新密码密码不能为空"),
			array("password2","required","message"=>"确认密码不能为空"),
			array("password2","compare","compareAttribute"=>"password1","message"=>"两次密码不一致"),

			);
	} 
	// 验证用户名正确与否
	public function check_passwd(){
		$userInfo = $this->find("username = :name",array(":name"=>yii::app()->user->name));
		if($userInfo->password != md5($this->password)){
			$this->addError('password',"原始密码不正确");
	     }
	}
}

