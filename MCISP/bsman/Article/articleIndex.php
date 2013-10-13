<?php
	session_start();	
	header("Content-Type:text/html; charset=UTF-8");
	include_once $_SERVER['DOCUMENT_ROOT'] . '/MCISP/config/globalconfig.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>文章管理-多媒体信息服务平台</title>
	<link href="../../css/layout.css" rel="stylesheet" type="text/css" />
	<link href="../../css/screen.css" rel="stylesheet" type="text/css" />
	<script language=javascript src="../../js/jquery-1.8.3.min.js"></script>
	<script language=javascript src="../../js/rotate3Di.js"></script>
</head>

<script type="text/javascript" language="javascript" charset="utf-8">
$(document).ready(function () {
    $('#ManageBtn li div.back').hide().css('left', 0);
    
    function mySideChange(front) {
        if (front) {
            $(this).parent().find('div.front').show();
            $(this).parent().find('div.back').hide();
            
        } else {
            $(this).parent().find('div.front').hide();
            $(this).parent().find('div.back').show();
        }
    }
    
    $('#ManageBtn li').hover(
        function () {
            $(this).find('div').stop().rotate3Di('flip', 250, {direction: 'clockwise', sideChange: mySideChange});
        },
        function () {
            $(this).find('div').stop().rotate3Di('unflip', 500, {sideChange: mySideChange});
        }
    );
});
</script>

<body>
<?php
	if(!isset($_SESSION['username'])) exit;
	require_once($topDir); 
?>

<div id="ArticleMain">
<div id="ArticleLeft">
	<span id="LeftHead">文章管理中心</span>
	<ul id="ManageBtn" >
		<li>
			<div class="front"><a >类别管理</a></div>
			<div class="back"><p><a onclick="$('div#ArticleRight iframe').attr('src','CategoryManage.php');">新增类别</br>修改类别</br>删除类别</a></p></div>
		</li>
		<li>
			<div class="front"><a >文章管理</a></div>
			<div class="back"><p><a onclick="$('div#ArticleRight iframe').attr('src','ArticleManage.php');">浏览文章</br>修改文章</br>删除文章</a></p></div>
		</li>
		<li>
			<div class="front"><a >新增文章</a></div>
			<div class="back"><p><a onclick="$('div#ArticleRight iframe').attr('src','ArticleAdd.php');">编辑文章</br>添加文章</a></p></div>
		</li>
	</ul>
</div>

<div id="ArticleRight">
	<iframe id="iframepage"   name="iframepage" src="ArticleManage.php" width="100%" frameborder="0"  scrolling="no"  onload="javascript:dyniframesize('iframepage');"  >
	</iframe>
</div>
</div>

<script type="text/javascript" language="javascript" charset="utf-8"> 
	function dyniframesize(down) { 
		var pTar = null; 
		if (document.getElementById){ 
			pTar = document.getElementById(down); 
		} 
		else{ 
			eval('pTar = ' + down + ';'); 
		} 
		if (pTar && !window.opera){ 
		//begin resizing iframe 
			pTar.style.display="block" 
			if (pTar.contentDocument && pTar.contentDocument.body.offsetHeight){ 
			//ns6 syntax 
				pTar.height = pTar.contentDocument.body.offsetHeight +20; 
				pTar.width = pTar.contentDocument.body.scrollWidth+20; 
			} 
			else if (pTar.Document && pTar.Document.body.scrollHeight){ 
			//ie5+ syntax 
				pTar.height = pTar.Document.body.scrollHeight; 
				pTar.width = pTar.Document.body.scrollWidth; 
			} 
		} 
	} 
</script> 

<?php
	require_once($bottomDir); 
?>
</body>