一、yii的安装
在命令行进入到framework目录
执行: php yiic.php webapp ../cms 
 (这个php 需要到系统属性高级环境路径里面设置指向php文件)


二、yii的结构
1.控制器
在文件夹下的protected的全部操作都在里面，controller里面进行创建控制器。
然后要求名字开头字母必须大写，并且里面：
class 文件名 extends Controller{

		public function 方法名(){
			echo "111";

		}

	}

控制器路径访问方法： index.php?r=控制器/方法名

2.配置文件
config/main.php是主要配置文件
在里面随便哪个位置加设置控制器名：
'defaultController'=>'Index', //默认控制器名

3.载入视图
根据控制器名字，在views文件夹下面创建对应的控制器名文件夹，再创建方法名模板。
控制器载入模板两种方法：
①$this->render(); //这种加载会直接配置布局一起加载进来
①$this->renderPartial(); //这种不加载布局直接出来

注意:renderPartial()  不加载布局的同时也不加载框架自带的jquery库

4.布局
修改布局步骤:
1.views/layouts 新建一个布局文件
2.修改布局文件
	在 components/Controller.php--->public $layout='//layouts/column1';
	 进行修改

5.外部文件引用
Css与Js等一些文件放到assets里面，按照前后台分开放。
Yii::app()->request->baseUrl 

例如：<?php echo Yii::app()->request->baseUrl ?>/assets/index/
Yii::app() 主要负责一些全局性的功能模块

6.如何给视图分配数据
$data = array(
	"name"=>111,
	"age"=>2
	);
$this->render("index",$data);

前台直接:echo $name ==>获取111

7.如何在视图中处理分配的数据
在yii框架中，数据以对象的形式存在：
<?php foreach($articleNew as $v): ?>
	<?php echo $v->info ?>
<?php  endforeach ?>


8.扩展自定义函数
在protected下面建立functions.php
首先在protected里面创建一个functions.php文件，自定义函数文件。
然后在外面的index.php里面引用这个函数文件：
include_once "./protected/functions.php"; //引用自定义函数

再去控制器里面的方法使用这个函数就可以了。


三、gii模块自动创立
1.gii的使用
(1)打开gii模块 //为了安全考虑是注释掉的
(2)config/main.php -->进行开启

	'gii'=>array(
		'class'=>'system.gii.GiiModule',
		'password'=>'Enter Your Password Here', 
		// If removed, Gii defaults to localhost only. Edit carefully to taste.
		'ipFilters'=>array('127.0.0.1','::1'),
	),


gii主要有以下几个模块创建：
		Controller Generator //生成控制器
		Crud Generator  //数据库操作控制器
		Form Generator //生成表单
		Model Generator  //生成模型
		Module Generator  //生成模块，这个最重要，建议手动建立

(3)通过index.php?r=gii/default/index  进行输入设置的密码访问
//开发完后建议关闭掉
(4)需要在main.php下的gii数组下面写一个 模块名，才能被访问到
   "gii"=>array(
   		.....
   	);
   'admin' //模块名 创建id名
(5)访问创建的模块(modules)：index.php?r=模块/控制器/方法


2. widget的使用
shCActiveForm类里面拥有对应的表单验证方法。
<?php $form = $this->beginWidget('CActiveForm') ?>
<?php echo $form->textField('模型','表单名',html属性)) ?>
<?php $this->endWidget() ?>
控制器：
	$loginForm = new loginForm();
	$this->renderPartial('index',array('loginForm'=>$loginForm));
widget使用：
<?php $form = $this->beginWidget('CActiveForm') ?>
	<?php echo $form->textField($loginForm, 'username', array('id'=>'userName')) ?>
	<?php echo $form->passwordField($loginForm, 'password', array('id'=>'psd')) ?>
	<?php echo $form->textField($loginForm, 'captcha', array('id'=>'verify')) ?>
	<input type="submit" id="sub" value=""/>
<?php $this->endWidget() ?>

表单验证错误：
	<ul id="peo">
		<li class="error"><?php echo $form->error($loginForm,'username') ?></li>
	</ul>


3.验证码生成：
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

点击切换验证码：
<div class="captcha">
	<?php $this->widget(
		'CCaptcha',
		array(
			'showRefreshButton'=>false,
			'clickableImage'=>true,
			'imageOptions'=>array('alt'=>'点击换图','title'=>'点击换图','style'=>'cursor:pointer'))
		); ?>
</div>

验证码使用：
	修改核心类：在framework/web/widgets/captcha/CCaptchaAction.php

修改run方法里面:
	$this->renderImage($this->getVerifyCode(TRUE));

验证规则:
在 LoginForm.php里面的rules()方法里面设置表单验证规则：
array('captcha', 'captcha','message'=>'验证码错误'),
	if(isset($_POST['LoginForm'])){
		$loginForm->attributes =  $_POST['LoginForm'];

		if($loginForm->validate()){
			
		}
	}

视图提示错误信息：
<?php echo $form->error($loginForm,'username') ?>

四、数据库操作
数据库配置连接：
	数据库配置: config/main.php里面:
	'db'=>array(
		'connectionString' => 'mysql:host=localhost;dbname=yii',
		'emulatePrepare' => true,
		'username' => 'root',
		'password' => '',
		'charset' => 'utf8',
		'tablePrefix' => 'ht_', //表前缀
		'enableParamLogging' => true, //开启调试信息的sql语句具体值信息
	),

	测试联通：
		var_dump(Yii::app()->db);

五、定义模型
	位置：protected/models/
	名称:user.php
	内容:必须要两个方法model与tableName

写模型时，下面两个是必不可少的：
class User extends CActiveRecord{
	public static function model($classname=__CLASS__){
		return parent::model($classname);
	}
	/*返回对应的数据库表名*/
	public function tableName(){
		return "{{admin}}"; //这个是数据库表名，关键在于定义模板之后找这个
	}
}


六、登录验证
关键主要用到的文件是 components/models/LoginForm.php,设置错误提示。
然后是 components/UserIdentity.php 里面的authenticate()方法进行表单验证。

public function authenticate()
{
	$userInfo = User::model()->find('username=:name',array(":name"=>$this->username));
	//关键的是 User::model()->find(...); 去查找匹配一条数据库的信息返回。User模型找数据表
	if($userInfo == NULL){
		$this->errorCode=self::ERROR_USERNAME_INVALID;
		return false;
	}
	if($userInfo->password != md5($this->password)){
		$this->errorCode=self::ERROR_PASSWORD_INVALID;
		return false;
	}

	$this->errorCode=self::ERROR_NONE; //没有错误
	return true;
}


然后控制器那里：
	if($loginForm->validate() && $loginForm->login()){
		// 没错就提交
	}


七、session的使用
可以在modules/AdminModule.php里面设置没有登录的时候是Guest用户名，或者是admin区分
加下面这句进行设置：
	// 下面这个是初始化方法，前后台区分
	yii::app()->setComponents(array(
		'user' => array('stateKeyPrefix' => 'admin'),
	));

用session的方法：
	yii::app()->session['logintime']=time();
	$this->redirect(array("default/index")); //路径跳转

当你通过前面的验证方法登录进入到后台，可以这样得到用户名：
	yii::app()->user->name; //这样就直接是登录的用户名了

路径跳转：
	$this->redirect(array("控制器/方法"));// 可以这样设置路径的跳转

退出消除session:
	yii::app()->session()->clear();
	yii::app()->session()->destroy();
退出登录：
	yii::app()->user->logout(); //这样可以直接退出并且消除session

路由设置：
<?php echo $this->createUrl('article/add') ?>
可以这样写：
	$this->createUrl('控制器/方法')


获取参数的对应方法：
	登录后的用户名：Yii::app()->user->name
	客户端IP：Yii::app()->request->userHostAddress
	服务器环境：echo $_SERVER['SERVER_SOFTWARE']
	PHP版本：PHP_VERSION
	服务器IP：$_SERVER['SERVER_ADDR']
	数据库信息：mysql_get_client_info()


八、模型规则和标签设置
需要在模型：user.php里面进行设置：
// 下面两个变量是在数据库没有这两个字段就需要另外定义
public $password1;
public $password2;
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



在需要验证的表单里面需要这样写：
 注意：$form->labelEx($userModel, 'password2') 和 
 $form->label($userModel, 'password2') 区别为：多Ex会多个 "*"符号表示必填，

// 下面这段是多出来的表单验证功能，如果没有就不会有表单验证了。
	<?php $form=$this->beginWidget('CActiveForm', array(
		'enableClientValidation'=>true, //开启表单验证
		'clientOptions'=>array(
			'validateOnSubmit'=>true, //在客户端提交时候验证
		),
	)); ?>
	<?php 
	// 下面这段是表单验证成功提示
		if(Yii::app()->user->hasFlash('success')){
			echo Yii::app()->user->getFlash('success');
		}

	 ?>
	<table class="table">
		<tr>
			<td class="th" colspan="10">修改密码</td>
		</tr>
		<tr>
			<td>用户</td>
			<td><?php echo Yii::app()->user->name ?></td>
		</tr>
		<tr>
			<td><?php echo $form->labelEx($userModel, 'password') ?></td>
			<td>
				<?php echo $form->passwordField($userModel, 'password') ?>
				<?php echo $form->error($userModel, 'password') ?>
			</td>
		</tr>
		<tr>
			<td><?php echo $form->labelEx($userModel, 'password1') ?></td>
			<td>
				<?php echo $form->passwordField($userModel, 'password1') ?>
				<?php echo $form->error($userModel, 'password1') ?>
			</td>
		</tr>
		<tr>
			<td><?php echo $form->labelEx($userModel, 'password2') ?></td>
			<td>
				<?php echo $form->passwordField($userModel, 'password2') ?>
				<?php echo $form->error($userModel, 'password2') ?> 
			</td>
		</tr>
		<tr>
			<td colspan="10">
				<input type="submit" class="input_button" value="修改" />
			</td>
		</tr>
	</table>
	<?php $this->endWidget() ?>

关于控制器需要这样写：你要用到哪个模型就一定要去引用，不的话就只能直接写User::model()->这样去引用了
	$userModel = User::model(); //需要先引用一个model类
	if(isset($_POST['User'])){
		$userModel->attributes=$_POST['User'];//传数据到属性里面进行验证
		$userModel->validate(); //表单验证 
	}
	$this->render("index",array("userModel"=>$userModel)); //传参到前台


九、修改动作和设置成功提示信息
修改密码操作：
if($userModel->validate()){ //验证成功返回的是true
	$password = md5($_POST['User']['password1']);

	if($userModel->updateByPk($userInfo->uid,array("password"=>$password))){
		yii::app()->user->setFlash("success","修改密码成功!"); //匹配id进行修改密码
	}

}

前台的成功信息：
	<?php 
		if(Yii::app()->user->hasFlash('success')){
			echo Yii::app()->user->getFlash('success');
		}
	 ?>

激活模式的开启：在config/main.php里面进行配置：
array(
		'class'=>'CWebLogRoute',
	),


十、yii的AR类增删改查
1.增
	只有“增”的情况需要new模型
	$model=new Model();
	$model->attributes = $_POST['user'];
	$model->save();

save方法，在new Model的时候是增加，在$model::model()的时候是修改

实例代码：
$categoryModel = new Category(); //实例化一个模型
if(isset($_POST['Category'])){
	$categoryModel->attributes = $_POST['Category'];//这里给的是全部的分类数组
	if($categoryModel->save()){	 //通过模型去操作save()是添加
		 $this->redirect(array("index")); //跳转
	}
}

$this->render('add',array("categoryModel"=>$categoryModel)); //跳转传参

2.查询
	find()查询一条信息
例:find("username=:name",array(":name"=>"admin"))
	findByPk()通过主键查询
例：findByPk(1)
	findBySql()通过sql来查询出一条
例：findBySql("select * from {{admin}}")

多条查询：
	findAll() 查询多条信息
例：findAll("color=:color",array(":color"=>'red'))
	findAllByPk()通过主键来查询，可以多个主键
例：findAllByPk(array(1,2))
	findAllBySql()通过sql来查询出多条
例:findAllBySql("select * from {{admin}}")


实例代码：	
	$cid = $_GET['cid']; //获取传参的id
	$categoryModel = category::model();
	// 修改的时候是通过查找到的这个对象进行修改，而不是通过模型去修改
	$categoryInfo = $categoryModel->findByPk($cid); //获取到的数据给到前台

3.改
	$model = Model::model();
	$info = $model->findByPk($id);
	if(isset($_POST['user'])){
		$info->attributes = $_POST['user'];
		$info->save() //此时save是修改
	}
	$this->render("edit",array("model"=>$info)); //跳转


代码实例：
	$cid = $_GET['cid'];
	$categoryModel = category::model();
	// 修改的时候是通过查找到的这个对象进行修改，而不是通过模型去修改
	$categoryInfo = $categoryModel->findByPk($cid); //获取到的数据给到前台
	if(isset($_POST['Category'])){
		$categoryInfo->attributes = $_POST['Category']; //传参过去
		if($categoryInfo->save()){ //执行修改
			yii::app()->user->setFlash("hasArt","栏目修改成功"); //提示信息
			$this->redirect(array("index")); //跳转
		}
	}
	$this->render('edit',array("categoryModel"=>$categoryInfo)); //跳转

4.删除
	model::model()->deleteByPk($id);

实例代码：
		$cid = $_GET['cid'];
		$categoryModel = category::model();
		$articleModel = article::model();//去文章模型里面去执行匹配查找文章
		$obj = $articleModel->findBySql("select aid from {{article}} where cid='$cid'");//查询全部
		if(is_object($obj)){ //判断是否存在对象
		  yii::app()->user->setFlash("hasArt","该栏目下有文章不能删除!");//提示信息
		}else{
			if($categoryModel->deleteByPk($cid)){ //否则就去删除这个栏目
				yii::app()->user->setFlash("hasArt","栏目删除成功");
				$this->redirect(array("index")); //跳转
			}
		}

十一、上传类的使用和缩略图的使用
1.文件上传类的使用
	$model = new model();
	$model->thumb=CUploadedFile::getInstance($model,"thumb");
	if($model->thumb){
		$name = "img_".time().mt_rand(0,999);//文件取名
		$img = $name.".".$model->thumb->extensionName; //文件名+扩展名
		$model->thumb->saveAs("uploads/".$img); //上传到的路径
		$model->thumb=$img; //文件名保存到数据库的thumb字段
	}

实例代码：
	$articleModel = new Article();
	$categoryModel = Category::model();
	$categoryInfo = $categoryModel->findAllBySql("select cid,cname from {{category}}");//查找全部分类过去
	$cateArr = array();
	foreach ($categoryInfo as $v) {
		$cateArr[$v->cid] = $v->cname;
	}
	if(isset($_POST['Article'])){
		$articleModel->thumb = CUploadedFile::getInstance($articleModel,"thumb");

		if($articleModel->thumb){
			$preRand = 'img_'.time().mt_rand(0,999);
			$imgName = $preRand.".".$articleModel->thumb->extensionName;
			$articleModel->thumb->saveAs("uploads/".$imgName);
			$articleModel->thumb = $imgName; //把图片名字存到数据库
			
			// 把上传的照片变成缩略图
			这里放缩略图代码
	}
	$this->render('add',array("articleModel"=>$articleModel,"cateArr"=>$cateArr));


2.缩略图的上传（可以拓展的类存放地并且使用）
	①在extensions中建立CThumb/CThumb.php文件
	②在main.php里面配置
	'components'=>array(
		'thumb'=>array(
			'class'=>'ext.CThumb.CThumb', //路径别名
		),
	),
	ext代表protected/extensions //这个扩展类的存放文件的位置

这里是接着上面的上传类来使用的：
	$path = dirname(yii::app()->BasePath)."/uploads/"; //上传到的位置

	$thumb = yii::app()->thumb; //调取缩略图对象
	$thumb->image = $path.$img; //传递完整路径图片
	$thumb->width = 130; //宽
	$thumb->height = 95;//高
	$thumb->mode = 4;//第四种模式，不裁剪
	$thumb->directory = $path;//保存路径
	$thumb->defaultName = $name;//默认名字

	$thumb->createThumb();//创建缩略图
	$thumb->save();//保存缩略图


实例代码：
			$path = dirname(yii::app()->BasePath)."/uploads/";

			$thumb = yii::app()->thumb;
			$thumb->image = $path.$imgName;
			$thumb->width = 130;
			$thumb->height = 95;
			$thumb->mode = 4;
			$thumb->directory = $path;
			$thumb->defaultName = $preRand;

			$thumb->createThumb();
			$thumb->save();
		}
		$articleModel->time = time();
		$articleModel->attributes = $_POST['Article'];
		if($articleModel->save()){//执行保存
			$this->redirect(array("index"));
		}


十二、前台表单radio、textarea等表单的创建
radio标签：
	<?php 
		echo $form->radioButtonList(
			$articleModel,
			'type',
			array(0=>'普通',1=>'热门'),
			array('separator'=>'&nbsp') //分隔符，排成一行
			)
	 ?>

textarea标签：
<?php echo $form->textArea($articleModel, 'info', array('cols'=>50,'rows'=>10,'maxlength'=>100)) ?>

select下拉标签：
<?php echo $form->dropDownList($articleModel,'cid', $cateArr) ?>


十三、分页类的使用

分页类的代码：（实例）

$criteria = new CDbCriteria(); //AR的另一种写法
$model = Article::model();
$total = $model->count($criteria);//统计总条数
$pager = new CPagination($total);//实例化分页类

$pager->pageSize = 5;//每页显示多少条
$pager->applyLimit($criteria);//进行limit截取
$articleInfo = $model->findAll($criteria);//查询截取过的数据
$data = array("articleInfo"=>$articleInfo,"pages"=>$pager);

$this->render('index',$data);


十四、后台权限验证限制

在控制器里面写：

// 用户认证方法：
public function filters(){
	return array(
			'accessControl',
	// 'accessControl - index', 这样设置可以减去Index也可以访问，如果是+index就是对index进行设置
		);
}
// 用户认证限制规则
public function accessRules(){
	return array(
		array(
			"allow",
			"actions"=>array("index","del","add","edit"),
			"users"=>array("@") //登录过的用户
			),
		array(
			"deny",
			"users"=>array("*") //所有用户
			),
	);
}

在main.php中还需要设置没有登录的用户跳转：
	在'conponents'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
			'loginUrl' =>array("admin/login/index"), //这个是设置跳转的路径
		),
	  )

十五、yii的伪静态
在main.php中设置：
在'conponents'=>array() 里面添加(conponents是主件)
'urlManager'=>array(
	'urlFormat'=>'path',
	//'showScriptName'=>false,//可以直接隐藏掉index.php
	'rules'=>array(
		'index.html'=>array("index"), //设置index方法
		'a/<aid:\d+>'=>array("article/index",'urlSuffix'=>".html"), //设置匹配生成Html
		'c/<cid:\d+>'=>array("category/index",'urlSuffix'=>".html"), //设置正则匹配生成html
		// 没有下面的规则之后，就不用直接r=action/method 这样写了
	/*	'<controller:\w+>/<id:\d+>'=>'<controller>/view',
		'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
		'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',*/
	),
),


十六、yii的缓存功能
在'conponents'=>array() 里面添加(conponents是主件)：
开启缓存：
'cache'=>array(
	'class'=>'system.caching.CFileCache'
),

1.片段缓存

在视图中使用：对某一块栏目进行缓存，其他部分可以改变

<!-- duration 指的是时间 秒，title是这个缓存的名  -->
<?php if($this->beginCache('title',array('duration'=>5))): ?>
	<h2>文章标题</h2>
	<ul class='flink'>
		 <?php foreach($common['title'] as $v): ?>
		<li><a href="<?php echo $this->createUrl("article/index",array('aid'=>$v->aid)) ?>"><?php echo $v->title; ?></a></li>
		 <?php endforeach ?>
	</ul>
<?php $this->endCache();endif; ?>

2.整页缓存
	// 整页缓存
		public function filters(){
			return array(
				array(
					'system.web.widgets.COutputCache + index',
					//+,-都行，意思是对index方法进行缓存
					'duration'=>30, //缓存多久
					'varyByParam'=>array("aid") //变量可变，存文章的时候用
				),
			);
		}

3.数据缓存
// 数据缓存方法：
$articleInfo = yii::app()->cache->get("cate"); //去获取是否存在cate缓存

if($articleInfo == false){
	$sql = "select aid,title,info,thumb from {{article}} where cid = '$cid'";
	$articleInfo=article::model()->findAllBySql($sql);
	yii::app()->cache->set("cate",$articleInfo,10);  //定义一个名字，然后是缓存数据，10秒
}

$this->render("index",array("articleInfo"=>$articleInfo));

