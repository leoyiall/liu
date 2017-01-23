<?php
/*后台登录*/
class UserController extends Controller
{
	public function actionPasswd()
	{
		$userModel = User::model(); //需要先引用一个model类
		$userInfo = $userModel->find("username = :name",array(":name"=>yii::app()->user->name));

		if(isset($_POST['User'])){
			$userModel->attributes=$_POST['User'];
			if($userModel->validate()){ //验证成功返回的是true
				$password = md5($_POST['User']['password1']);

				if($userModel->updateByPk($userInfo->uid,array("password"=>$password))){
					yii::app()->user->setFlash("success","修改密码成功!");
				}

			}
		}
		// p($_POST);
		$this->render("index",array("userModel"=>$userModel));
	}

}