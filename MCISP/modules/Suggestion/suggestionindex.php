<?php
session_start();
header("Content-Type:text/html; charset=UTF-8");
include_once $_SERVER['DOCUMENT_ROOT'] . '/config/globalconfig.php';
include_once $dbConnDir;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>多媒体信息服务平台</title>
	<link href="../../css/layout.css" rel="stylesheet" type="text/css" />
	<link href="../../css/screen.css" rel="stylesheet" type="text/css" />
	<link href="../../css/pic_slide.css" rel="stylesheet" type="text/css" />
	<script language=javascript src="../../js/jquery-1.8.3.min.js"></script>
	<script language=javascript src="../../js/md5.js"></script>
	<script language=javascript src="../../js/slides.min.jquery.js"></script>
</head>


<body>

<?php
	require_once($topDir);
?>
<center style="margin-top:160px;margin-bottom:160px;font-size:20px;">即将上线……</center>

<?php
	require_once($bottomDir); 
?>

</body>
</html>