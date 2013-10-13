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
	<title>规范准则-多媒体信息服务平台</title>
	<link href="../../css/layout.css" rel="stylesheet" type="text/css" />
	<link href="../../css/screen.css" rel="stylesheet" type="text/css" />
	<script language=javascript src="../../js/md5.js"></script>
</head>


<body>
<?php
	require_once($topDir);
?>		
<div><center><image src="./topban.png"></center></div>
<div id="RuleMain">
	<?php
		$misdb_i = new misdb();
		$misdb_i->DbConnect();
		$sql='select ArteId,ArteName,left(Content,300) as ct from Article where CateId=4';
		$res=$misdb_i->DbQuery($sql);
		while ($row = $misdb_i->DbResult($res))
		{
			echo '<div class="RuleItem">
				<div class="RuleTitle"><a href="../../public/infoContent.php?ArteId='. $row['ArteId'] .'">'. $row['ArteName'] .'</a></div>
				<div class="RuleText">'.strip_tags($row['ct']).'......</div>
				</div>';
		}
		$misdb_i->DbFree($res);
		$misdb_i->DbClose();		
	?>
		
</div>
<?php
	require_once($bottomDir); 
?>

</body>
</html>