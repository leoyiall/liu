<?php
class PublicAction extends Action {
	public function left(){
		$this->display();
    }
	public function head(){
        $id=session("id");
        $s = M('user');
        $list = $s->where("id='$id'")->select();
		if($power==2){
			$list['gly']="超级管理员";
		}else if($power==1){
			$list['gly']="管理员";
		}else{
			$list['gly']="编辑员";
		}
		 session("who",$list);
		 $data = session("who");
		 $this->assign("data",$data);
		$this->display();
    }

}