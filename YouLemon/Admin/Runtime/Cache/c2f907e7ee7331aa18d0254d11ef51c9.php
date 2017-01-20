<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>校园信箱管理后台</title>
	<link rel="icon" type="image/png" href="images/mylogo-24x24.ico">
<link href="css/public.css" rel="stylesheet" type="text/css">
<link href="css/gllist.css" rel="stylesheet" type="text/css">
<head>
<body>
	<!-- 引用后台头部 -->
	<?php
 include "ht_top.php"; ?>
	<!-- 引用后台左边 -->
	<div id="ht_left">
	<?php
 include "ht_left.php"; ?>	
	</div>
	<!-- 管理员管理右边代码 -->
	<div id="ht_list">
			<!-- 头部开始 -->
		<div id="list_tou">
			<div id="list_add">
				<!-- 头部人员数 -->
				<div class="list_kuai">
					<img src="images/user.png">
					<span class="wen">8</span>
					<p>部门人数</p>
					</div>
				<!-- 添加管理员 -->
			<a href="ht_addbm.php">
				<div class="list_yy">
					<img src="images/adduser.png">
					<span class="wz">添加部门</span>
					</div>
				</a>
				</div>
			</div>
				<!-- 管理员列表开始 -->
					<div id="gl_list">
						<table cellpadding="0" cellspacing="0">
							<tr>
						<td colspan="6" class="gl_tou">部门列表</td>
							</tr>
							<tr>
								<th>部门ID</th>
								<th>部门账号</th>
								<th>部门名称</th>
								<th>子部门名</th>								
								<th>部门头像</th>
								<th width="200">操作</th>
							</tr>
							<tr>
								<td>1</td>
								<td>admin</td>
								<td>党政部</td>
								<td>团委</td>
								<td><img src="images/user.png" width="30" height="30"></td>
								<td>
								<ul>
									<a href="" ><li class="xg">修改</li></a>
									<a href="" ><li class="del">删除</li></a>
								</ul>
								</td>
							</tr>
							<tr>
								<td>1</td>
								<td>admin</td>
								<td>党政部</td>
								<td>团委</td>
								<td><img src="images/user.png" width="30" height="30"></td>
								<td>
								<ul>
									<a href="" ><li class="xg">修改</li></a>
									<a href="" ><li class="del">删除</li></a>
								</ul>
								</td>
							</tr>
								<tr>
								<td>1</td>
								<td>admin</td>
								<td>党政部</td>
								<td>团委</td>
								<td><img src="images/user.png" width="30" height="30"></td>
								<td>
								<ul>
									<a href="" ><li class="xg">修改</li></a>
									<a href="" ><li class="del">删除</li></a>
								</ul>
								</td>
							</tr>
							<tr>
								<td>1</td>
								<td>admin</td>
								<td>党政部</td>
								<td>团委</td>
								<td><img src="images/user.png" width="30" height="30"></td>
								<td>
								<ul>
									<a href="" ><li class="xg">修改</li></a>
									<a href="" ><li class="del">删除</li></a>
								</ul>
								</td>
							</tr>
								<tr>
								<td>1</td>
								<td>admin</td>
								<td>党政部</td>
								<td>团委</td>
								<td><img src="images/user.png" width="30" height="30"></td>
								<td>
								<ul>
									<a href="" ><li class="xg">修改</li></a>
									<a href="" ><li class="del">删除</li></a>
								</ul>
								</td>
							</tr>
								<tr>
								<td>1</td>
								<td>admin</td>
								<td>党政部</td>
								<td>团委</td>
								<td><img src="images/user.png" width="30" height="30"></td>
								<td>
								<ul>
									<a href="" ><li class="xg">修改</li></a>
									<a href="" ><li class="del">删除</li></a>
								</ul>
								</td>
							</tr>	
							<tr>
								<td colspan="6">
									<a href="">首页</a>
									<a href="">上一页</a>
									<a href="">下一页</a>
									<a href="">尾页</a>
								</td>
							</tr>					
						</table>
					</div>
		</div>
	</div>
</body>
</html>