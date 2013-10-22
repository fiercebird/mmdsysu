<?php
session_start();
header("Content-Type:text/html; charset=UTF-8");
include_once $_SERVER['DOCUMENT_ROOT'] . '/mmdsysu/MCISP/config/globalconfig.php';
include_once $dbConnDir;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>文章索引转换-多媒体信息服务平台</title>
	<link href="../css/layout.css" rel="stylesheet" type="text/css" />
	<link href="../css/screen.css" rel="stylesheet" type="text/css" />
	<script language=javascript src="js/jquery-1.8.3.min.js"></script>
</head>


<body>
<?php
	require_once($topDir);
	 $misdb = new misdb();
	 $misdb->DbConnect();
	 $sql='select ArteId,ArteName,Content from Article';	
	 $res=$misdb->DbQuery($sql);
	 while($row=$misdb->DbResult($res)){
	 	$ArteName = html_2_string($row['ArteName']);
		$Content = html_2_string($row['Content']);
		 $Insql='Insert into Article_index(ArteId,ArteName,Content) values('.$row['ArteId'] .',"'. ch_word_segment($ArteName).'","'. ch_word_segment($Content).'")';
		 $Inres=$misdb->DbQuery($Insql);
		 if(!$Inres){
			 echo "文章全文索引转换失败:".$row['ArteId'] .',"'. $row['ArteName'];
		 }
	}
	$misdb->DbFree($res);
	$misdb->DbClose();
?>
	

 

<?php
	 echo "文章全文索引转换成功";
	require_once($bottomDir); 
?>

</body>
</html>