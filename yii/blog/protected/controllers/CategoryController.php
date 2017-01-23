<?php 
	class categoryController extends Controller{

		public function actionIndex($cid){
			// 数据缓存方法：
			$articleInfo = yii::app()->cache->get("cate");

			if($articleInfo == false){
				$sql = "select aid,title,info,thumb from {{article}} where cid = '$cid'";
				$articleInfo=article::model()->findAllBySql($sql);
				yii::app()->cache->set("cate",$articleInfo,10);  //定义一个名字，然后是缓存数据，10秒
			}

			$this->render("index",array("articleInfo"=>$articleInfo));
		}

	}

 ?>