<?php
/*分类*/
class CategoryController extends Controller
{
	public function actionIndex()
	{
		$categoryModel = category::model();
		$categoryInfo = $categoryModel->findAllBySql("select * from {{category}}");
		$this->render('index',array("categoryInfo"=>$categoryInfo));
	}
	public function actionAdd()
	{
		$categoryModel = new Category();
		if(isset($_POST['Category'])){
			$categoryModel->attributes = $_POST['Category'];//这里给的是全部的分类数组
			if($categoryModel->save()){	 //通过模型去操作save()是添加
				 $this->redirect(array("index"));
			}
		}
		// p($_POST);
		$this->render('add',array("categoryModel"=>$categoryModel));
	}
	public function actionEdit()
	{
		$cid = $_GET['cid'];
		$categoryModel = category::model();
		// 修改的时候是通过查找到的这个对象进行修改，而不是通过模型去修改
		$categoryInfo = $categoryModel->findByPk($cid); //获取到的数据给到前台
		if(isset($_POST['Category'])){
			$categoryInfo->attributes = $_POST['Category'];
			if($categoryInfo->save()){ //执行修改
				yii::app()->user->setFlash("hasArt","栏目修改成功");
				$this->redirect(array("index"));
			}
		}
		$this->render('edit',array("categoryModel"=>$categoryInfo));
	}
	public function actionDel(){
		$cid = $_GET['cid'];
		$categoryModel = category::model();
		$articleModel = article::model();//去文章模型里面去执行匹配查找文章
		$obj = $articleModel->findBySql("select aid from {{article}} where cid='$cid'");
		if(is_object($obj)){
		  yii::app()->user->setFlash("hasArt","该栏目下有文章不能删除!");
		}else{
			if($categoryModel->deleteByPk($cid)){ //否则就去删除这个栏目
				yii::app()->user->setFlash("hasArt","栏目删除成功");
				$this->redirect(array("index"));
			}
		}
	}
}