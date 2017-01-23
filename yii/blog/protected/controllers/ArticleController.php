<?php 
	class ArticleController extends Controller{
		// 整页缓存
		public function filters(){
			return array(
				array(
					'system.web.widgets.COutputCache + index',//对index进行缓存
					'duration'=>30, //缓存多久
					'varyByParam'=>array("aid")
				),
			);
		}
		public function actionIndex(){
			$aid = $_GET['aid'];
			$arc = Article::model();
			$articleInfo = $arc->findByPk($aid);
			$data=array(
					"articleInfo"=>$articleInfo,
				);
			$this->render("index",$data);
		}

	}

 ?>