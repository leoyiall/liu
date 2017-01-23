<?php
/*文章*/
class ArticleController extends Controller
{
	// 用户认证方法：
	public function filters(){
		return array(
				'accessControl',
				// 'accessControl - index', 这样设置可以减去Index也可以访问
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
	public function actionIndex()
	{		
		$criteria = new CDbCriteria(); //AR的另一种写法
		$model = Article::model();
		$total = $model->count($criteria);//统计总条数
		$pager = new CPagination($total);//实例化分页类

		$pager->pageSize = 5;//每页显示多少条
		$pager->applyLimit($criteria);//进行limit截取
		$articleInfo = $model->findAll($criteria);//查询截取过的数据
		$data = array("articleInfo"=>$articleInfo,"pages"=>$pager);

		$this->render('index',$data);
	}
	// 执行添加
	public function actionAdd()
	{
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
		}
		$this->render('add',array("articleModel"=>$articleModel,"cateArr"=>$cateArr));
	}
	// 执行删除
	public function actionDel()
	{
		$aid = $_GET['aid'];
		$articleModel = Article::model();
		if($articleModel->deleteByPk($aid)){
			$this->redirect(array("index"));
		}

		$this->render('add');
	}
	// 执行编辑
	public function actionEdit()
	{
		$aid = $_GET['aid'];
		$articleModel = Article::model();
		$articleInfo = $articleModel->findByPk($aid);
		$category = Category::model();
		$categoryInfo = $category->findAll();
		$cateArr = array();
		foreach ($categoryInfo as $v) {
			$cateArr[$v->cid] = $v->cname;
		}
		// 如果存在就可以执行修改
		if(isset($_POST['Article'])){
			// 应该是去匹配后的数据去传参和执行修改
			$articleInfo->attributes = $_POST['Article'];
			if($articleInfo->save()){//执行修改
				$this->redirect(array("index"));
			}
		}

		$this->render('edit',array("articleModel"=>$articleInfo,"cateArr"=>$cateArr));
	}
}