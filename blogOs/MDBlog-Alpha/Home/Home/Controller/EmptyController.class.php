<?php
namespace Home\Controller;
use Think\Controller;
class EmptyController extends Controller{
    public function index(){
		$this->display("public:404");
    }
    //空方法访问		
	public function _empty($name){
		$this->display("public:404");
	}
}