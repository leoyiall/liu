<?php
/*后台登录*/
class LoginController extends Controller
{
	public function actionIndex()
	{
		$loginForm = new LoginForm();
		// var_dump(Yii::app()->db); //测试数据库联通
		if(isset($_POST['LoginForm'])){
			$loginForm->attributes =  $_POST['LoginForm'];

			if($loginForm->validate() && $loginForm->login()){
				yii::app()->session['logintime']=time();
				// yii::app()->user->name; //这样就直接是登录的用户名了
				$this->redirect(array("default/index"));
			}
		}
		$this->render('index',array('loginForm'=>$loginForm));
	}
	// 验证码
	public function actions()
	{
		return array(
			'captcha' => array(
				'class'=>'system.web.widgets.captcha.CCaptchaAction',
				'height'=>25,
				'width'=>80,
				'minLength'=>4,
				'maxLength'=>4
			),
		);
	}
	// 退出
	public function actionOut()
	{
		yii::app()->user->logout();
		$this->redirect(array("index"));
	}
}