<?php
class ProgrammeAction extends Action {
	// 获取是否在线的信息
	public function isLine(){
		$idnumber = session("idnumber");
		$this->assign("idnumber",$idnumber);
	}
	// 右侧的个人信息
	public function userintro(){
		$idnumber = session("idnumber");
		$i = M('user_lev');
		$l = $i->where("user_id='$idnumber'")->find();
		$this->assign("ll",$l);
	}
	// 编程库的首页
	public function index(){
		// 在线登录信息
		$this->isLine();
		// 获取登录用户的信息
		$this->userintro();
		// 获取编程库
		$b = D('Programme');
		$l = $b->getProgramme(4);
		$all = $b->getProgrammeAll();
		$this->assign("nav",$l);
		$this->assign("all",$all['list']);
		$this->assign("show",$all['show']);
		$this->display();
	}
	// 单个编程库的内容
	public function programme(){
		$id = $_GET['id'];
		// 在线登录信息
		$this->isLine();
		// 获取登录用户的信息
		$this->userintro();
		// 获取编程库
		$b = D('Programme');
		$l = $b->getProgramme(4);
		$p = $b->getProgrammeList($id);//获取对应的编程库信息
		$sl = $b->getShouLu($p['sort']);//获取对应的精彩收录
		$wt = $b->getQuestionList($p['sort']);//获取对应的相关问题
		$sp = $b->getVedioList($p['sort'],2,'sendTime');//获取对应的相关问题
		$learn = $b->getVedioList($p['sort'],10,'sight');//获取对应的10个教学资源
		$this->assign("nav",$l);//导航
		$this->assign("p",$p);//编程库信息
		$this->assign("sl",$sl);//收录
		$this->assign("wt",$wt);//问题
		$this->assign("sp",$sp);//视频列表
		$this->assign("learn",$learn);//视频列表10
		$this->display();
	}
	// 学习资源
	public function learnprogramme(){
		$id = $_GET['id'];
		$l = $_GET['l'];
		// 在线登录信息
		$this->isLine();
		// 获取登录用户的信息
		$this->userintro();
		// 获取编程库
		$b = D('Programme');
		$p = $b->getProgrammeList($id);//获取对应的编程库信息
		$this->assign("p",$p);//编程库信息
		$bb = $b->getProgramme(4);
		$this->assign("nav",$bb);//导航
		$this->assign("learn",$learn);//视频列表10
		$all = $b->getLearnVedio($id);
		$this->assign("list",$all['list']);
		$this->assign("show",$all['show']);
		$this->display();
	}
	// 精彩收录
	public function shouluList(){
		$id = $_GET['id'];
		$l = $_GET['l'];
		// 在线登录信息
		$this->isLine();
		// 获取登录用户的信息
		$this->userintro();
		// 获取编程库
		$b = D('Programme');
		$p = $b->getProgrammeList($id);//获取对应的编程库信息
		$this->assign("p",$p);//编程库信息
		$bb = $b->getProgramme(4);
		$this->assign("nav",$bb);//导航
		$l = $b->getShouLuList($l);
		$learn = $b->getVedioList($p['sort'],10,'sight');//获取对应的10个教学资源
		$this->assign("learn",$learn);//视频列表10
		$this->assign("list",$l['list']);
		$this->assign("show",$l['show']);
		$this->display("shoulu");
	}
	// 相关问答
	public function aboutQuestion(){
		$id = $_GET['id'];
		$l = $_GET['l'];
		// 在线登录信息
		$this->isLine();
		// 获取登录用户的信息
		$this->userintro();
		// 获取编程库
		$b = D('Programme');
		$p = $b->getProgrammeList($id);//获取对应的编程库信息
		$this->assign("p",$p);//编程库信息
		$l = $b->getQuestionAll($l);
		$learn = $b->getVedioList($p['sort'],10,'sight');//获取对应的10个教学资源
		$bb = $b->getProgramme(4);
		$this->assign("nav",$bb);//导航
		$this->assign("learn",$learn);//视频列表10
		$this->assign("list",$l['list']);
		$this->assign("show",$l['show']);
		$this->display("question");
	}
	// 学习图谱
	public function propit(){
		$id = $_GET['id'];
		$l = $_GET['l'];
		// 在线登录信息
		$this->isLine();
		// 获取登录用户的信息
		$this->userintro();
		// 获取编程库
		$b = D('Programme');
		$p = $b->getProgrammeList($id);//获取对应的编程库信息
		$this->assign("p",$p);//编程库信息
		$learn = $b->getVedioList($p['sort'],10,'sight');//获取对应的10个教学资源
		$bb = $b->getProgramme(4);
		$pro = $b->getPitList($id);//获取知识图谱
		$this->assign("nav",$bb);//导航
		$this->assign("pro",$pro);//图谱
		$this->assign("learn",$learn);//视频列表10
		$this->display();
	}
	// 编程教程页面
	public function teachProgramme(){
		$id = $_GET['id'];//编程库的id
		$kid = $_GET['kid'];//课程id
		$cid = $_GET['cid'];//第几节课id
		// 在线登录信息
		$this->isLine();
		// 获取登录用户的信息
		$this->userintro();
		// 获取编程库
		$b = D('Programme');
		$p = $b->getProgrammeList($id);//获取对应的编程库信息
		$this->assign("p",$p);//编程库信息
		$learn = $b->getVedioList($p['sort'],10,'sight');//获取对应的10个教学资源
		$bb = $b->getProgramme(4);
		$kc = $b->getCourseMessage($kid);
		$nkc = $b->getOneCourse($cid);//某一节课
		$this->assign("nav",$bb);//导航
		$this->assign("kc",$kc);//当前课程信息
// 分类压缩
		$l = M('course_list');
 		$bool = $l->where("pid='$kid'")->select();
 		$data=array(    
 		);
 		$dsort=null;
 		foreach($bool as $k){
 		  if(array_key_exists($k["zname"].":".$k['kname'],$data)){
 		    array_push($data[$k["zname"].":".$k['kname']],$k);
 		  }else{
 		    $dsort=$k["zname"].":".$k['kname'];
 		    $data[$dsort]=array();
 		    array_push($data[$dsort],$k);
 		  } 
 		}
 // 分类压缩结束
		$this->assign("klist",$data);//课程列表
		$this->assign("nkc",$nkc);//课程列表
		$this->assign("learn",$learn);//视频列表10
		$this->display();
	}
	// 编程库搜索
	public function search(){
		$key = $_GET['keyword'];
		// 在线登录信息
		$this->isLine();
		// 获取登录用户的信息
		$this->userintro();
		// 获取编程库
		$b = D('Programme');
		$l = $b->getProgramme(4);
		$all = $b->getProgrammeSearch($key);
		$this->assign("nav",$l);
		$this->assign("all",$all['list']);
		$this->assign("show",$all['show']);
		$this->display();
	}
}