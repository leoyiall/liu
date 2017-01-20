(function(){var APC_r_url="http://jqmt.qq.com/rpt.png?plf=3&";var APC_count=0,APC_idx=[],APC_task=[];function apc_CallBack(data){var idx=0;for(var i in data){if(i=="rCount"){APC_count=data[i];}else if(!isNaN(i)){APC_idx[idx]=i;APC_task[i]=data[i];idx++;}}
APC_count=idx;APC_r_url+="cnt="+APC_count;if(APC_count<=0)
return;else{APC_st(0,0);return;}}
function APC_st(i,t){var p=new Image();p.idx=i;p.st=new Date();p.t=t;p.onload=function(){p.onload=null;APC_r_ok(this.idx,this.st,this.t)};p.onerror=function(){p.onerror=null;APC_r_err(this.idx,this.st,this.t)};p.src=APC_task[APC_idx[i]]+"?"+Math.random();}
function APC_r_ok(i,st,t){var data=new Date(),tm=data.getTime()-st.getTime();APC_r_url+="&r"+i+"="+APC_idx[i]+","+tm+",0";if(i<APC_count-1)
APC_st(i+1,0);else{APC_Rpt(APC_r_url);}}
function APC_r_err(i,st,t){var data=new Date();var tm=data.getTime()-st.getTime();APC_r_url+="&r"+i+"="+APC_idx[i]+","+tm+",1";if(i<APC_count-1)
APC_st(i+1,0);else
{APC_Rpt(APC_r_url);}}
function APC_Rpt(s){var p=new Image();p.src=s;}
try{apc_CallBack({"rCount":4,'1827':'http://mmbiz.qpic.cn/mmbiz/7lG1x2vpicdicW1icCTiatfvqAh6sMhsibmYyWHbeeGQA458HIHKyNKWo2yVWSFERtleQlWbLiao6I9yEx5vRqWVaHHg/0','1518':'http://tdd.myapp.com/17421/e8475fe7-7418-43bf-9be7-c6b116730cac.gif','2067':'http://qzs.qzone.qq.com/zljk/bz.gif','1018':'http://hz.yun.ftn.qq.com/ftn_handler/47F442D416C02C6CF45E68F8037E169B515B286F54AA466AEE5521F9CEFEA80C689D0BA003B92556C20B5C51DBEC2E1C654C7DE01F10C46384973AF199977622/33acf92a72c9a7e96d34ad5674f1881eaf444d30/qzone.jpg'});}catch(e){}})();

