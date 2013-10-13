<?php
session_start();
header("Content-Type:text/html; charset=UTF-8");
include_once $_SERVER['DOCUMENT_ROOT'] . '/mmdsysu/MCISP/config/globalconfig.php';
include_once $dbConnDir;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>后台管理-多媒体信息服务平台</title>
	<link href="../css/layout.css" rel="stylesheet" type="text/css" />
	<link href="../css/screen.css" rel="stylesheet" type="text/css" />
	<script language=javascript src="../js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="../js/rotate3di.js"></script>
	<script type="text/javascript" language="javascript" charset="utf-8">
	$(document).ready(function () {
		$('#navbtn li div.back').hide().css('left', 0);
		
		function mySideChange(front) {
			if (front) {
				$(this).parent().find('div.front').show();
				$(this).parent().find('div.back').hide();
				
			} else {
				$(this).parent().find('div.front').hide();
				$(this).parent().find('div.back').show();
			}
		}
		
		$('#navbtn li').hover(
			function () {
				$(this).find('div').stop().rotate3Di('flip', 250, {direction: 'clockwise', sideChange: mySideChange});
			},
			function () {
				$(this).find('div').stop().rotate3Di('unflip', 500, {sideChange: mySideChange});
			}
		);
	});
	</script>
</head>
<body>

<?php
	if(!isset($_SESSION['username'])) exit;
	require_once($topDir);

		$UserId = $_SESSION['userid'];
		$Authority = $_SESSION['authority'];
		$IdLen= Strlen(trim($UserId));					
?>
	<ul id="navbtn">
	<div>
			<?php  	
			if(IsOne($Authority ,1)){ //加载 联系方式 用户管理
				echo <<<Eof
					<li>
						<div class="front"><img src="./images/user.jpg"  ></img><span>用户管理</span></div>
						<div class="back"><a href="./UserManage/userManageIndex.php">修改密码</br>添加用户</br>设置权限</a></div>
					</li>
					<li>
						<div class="front"><img src="./images/worktime.jpg"  ></img><span>联系方式</span></div>
						<div class="back"><a href="./contactWay.php">前台首页</br>教学楼</br>修改联系人</a></div>
					</li>
Eof;
			}	

			if(IsOne($Authority ,4)){ //加载 文章管理
                echo <<<Eof
			        <li>
						<div class="front"><img src="./images/article.jpg"  ></img><span>文章管理</span></div>
						<div class="back"><a href="./Article/articleIndex.php">类别管理</br>发布文章</br>修改文章</br>删除文章</a></div>
					</li>
Eof;
			}
			if(IsOne($Authority ,5)){ //加载 失物管理
                echo <<<Eof
					<li>
						<div class="front"><img src="./images/lostthing.jpg"  ></img><span>失物管理</span></div>
						<div class="back"><a href="./LostManage/lostIndex.php">失物信息</br>认领信息</br>物品清单</a></div>
					</li>
Eof;
			}
?>
</div><div>
<?php
			
			if(IsOne($Authority ,2)){ //加载 助理管理
				echo <<<Eof
					<li>
						<div class="front"><img src="./images/assistant.jpg"  ></img><span>助理管理</span></div>
						<div class="back"><a href="./AssistantManage/assistindex.php">助理清单</br>岗位工时</br>详细资料</a></div>
					</li>	
Eof;
			}
			
			if(IsOne($Authority ,3)){ //加载  设备管理
				echo <<<Eof
					<li>
						<div class="front"><img src="./images/device.jpg"  ></img><span>设备管理</span></div>
						<div class="back"><a href="#">设备状态</br>维护日志</br>设备清单</a></div>
					</li>
Eof;
			}
			if(IsOne($Authority ,8)){ //Assistant类别的User	,加载个人资料和周检常检
				echo <<<Eof
					<li>
						<div class="front"><img src="./images/assisinfo.jpg"  ></img><span>个人资料</span></div>
						<div class="back"><a href="#">查看信息</br>修改资料</br>修改密码</br>工资查询</a></div>
					</li>
					<li>
						<div class="front"><img src="./images/check.jpg"  ></img><span>周检常检</span></div>
						<div class="back"><a href="#">周检登记</br>常检登记</br></a></div>
					</li>
Eof;
			} 
			?>
	</div></ul>
<?php

	require_once($bottomDir); 
?>

</body>
</html>
