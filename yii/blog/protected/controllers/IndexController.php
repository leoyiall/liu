<?php 
	class IndexController extends Controller{

		public function actionIndex(){
			$articleModel = Article::model();//article模型
			$sql1 = "select aid,title,thumb,info from {{article}} where type='0' order by time desc limit 5";
			$sql2 = "select aid,title,thumb,info from {{article}} where type='1' order by time desc limit 5";
			$new = $articleModel->findAllBySql($sql1);
			$hot = $articleModel->findAllBySql($sql2);
			$data = array(
				"articleNew"=>$new,
				"articleHot"=>$hot,
				);
			$this->render("index",$data);

		}

	}

 ?>