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
	<title>新闻内容</title>
	<link href="../css/layout.css" rel="stylesheet" type="text/css" />
	<link href="../css/screen.css" rel="stylesheet" type="text/css" />
	<script language=javascript src="../js/jquery-1.8.3.min.js"></script>
	<script language=javascript src="../js/md5.js"></script>
</head>


<?php
if(isset($_GET['ArteId'])) //若没传参数进来，则不需要访问数据库
{
	$misdb_i = new misdb();
	$misdb_i->DbConnect();
	$sql='select * from Article where ArteId="' . urldecode($_GET['ArteId']). '"';
	$result = $misdb_i->DbQuery($sql);
	$row = $misdb_i->DbResult($result);
	$misdb_i->DbFree($result);
	
	$sql1='select CatyName from Category where CatyId=' . $row['CateId'] ;
	$result1 = $misdb_i->DbQuery($sql1);
	$row1 = $misdb_i->DbResult($result1);
	
	$misdb_i->DbFree($result1);
	$misdb_i->DbClose();
}
?>


<body>
<?php
	require_once($topDir);
	
	if(isset($_GET['ArteId']))
	{
?>
		<div Class="Article">
			<div Class="ArteName">
				<?php echo $row['ArteName']; ?>
			</div>
			</br>
			<div Class="ArteInfo">
				<span style="display:inline-block;width:250px;margin-left:50px;">发布时间：<?php echo $row['PubTime']; ?></span>
				<span style="display:inline-block;width:150px;">所属校区：<?php echo $GetCampus[$row['Campus']]; ?></span>
				<span style="display:inline-block;width:150px;">所属类别：<?php echo $row1['CatyName']; ?></span>
				<span style="display:inline-block;width:200px;">发布方：<?php echo $row['Publisher']; ?></span>
			</div>
			</br>
			</br>
			<div Class="ArteText" style="word-wrap:break-word;"> 
				<?php echo $row['Content'];?>
			</div>
		</div>

<?php
	}
	
	require_once($bottomDir); 
?>

</body>
</html>