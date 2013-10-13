<?php
session_start();	
include_once dirname(__FILE__) . '/../../dbconn/DbConn.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/MCISP/config/globalconfig.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
		$sql_pre = 'insert into article(';
		$sql_suf = ') values (';
		foreach ($_POST as $key => $val) {
			$sql_pre .= $key . ',';
			$sql_suf .= '\'' . $val . '\',';
		}
		$misdb_i = new misdb();
		$misdb_i->DbConnect();
		$misdb_i->DbQuery("SET AUTOCOMMIT=0");	//事务开始，禁止自动提交
		$res=$misdb_i->DbQuery($sql_pre . 'PubTime' . $sql_suf . '\'' . date('Y-m-d H:i:s') . '\')');
		if($res) {	
			$ArteId = $misdb_i->DbInsId();
			$misdb_i->DbQuery("COMMIT");
		}else { 
			$misdb_i->DbQuery("ROLLBACK");
		}
		$misdb_i->DbQuery("SET AUTOCOMMIT=1");	//事务结束，自动提交
		if(!$res)
			exit;
		$ArteName = $_POST['ArteName'];
		$ArteName = html_2_string($ArteName);
		$Content = $_POST['Content'];
		$Content = html_2_string($Content);
		$misdb_i->DbQuery("insert into article_index values(" . $ArteId . ",'" . ch_word_segment($ArteName) . "','" . ch_word_segment($Content) . "')");
		$misdb_i->DbClose();
		
		echo <<<Eof
		<script language="javascript" type="text/javascript">
		var url="./articleManage.php";
		window.location.href=url;
		</script>; 
Eof;
		exit;
}

if(!isset($_SESSION['username'])) exit;

$misdb_i = new misdb();		//获取类别列表
$misdb_i->DbConnect();
$result_caty = $misdb_i->DbQuery('select * from category');
$catyHtml="";
while ($row_caty = $misdb_i->DbResult($result_caty))
{
	$catyHtml=$catyHtml.'<option value=' . $row_caty['CatyId'] . '>' . $row_caty['CatyName'] . '</option>';
}
$misdb_i->DbFree($result_caty);
$misdb_i->DbClose();


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>中山大学多媒体信息服务平台</title>
	<script language=javascript src="../../js/jquery-1.8.3.min.js"></script>
	<script language=javascript src='ckeditor/ckeditor.js'></script>
	<link href="../../css/iframelayout.css" rel="stylesheet" type="text/css" />
</head>
<!--

-->

<body>
<h2 class='head2'>添加文章</h2>

<form class='articleAddForm' method='post' action='articleAdd.php'  >
	<div class='formRow'>文章标题：<input class='ArteNameInput' type='text' name='ArteName'/></div>
	<div class='formRow'>
		文章分类：<select name='CateId' class="CateIdSel" >
					<?php
						echo $catyHtml;
					?>
				</select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		所属校区：<select name='Campus'>
						<option value=0>所有校区</option>
						<option value=20>南校区</option>
						<option value=10>东校区</option>
						<option value=40>珠海校区</option>
						<option value=30>北校区</option>
					</select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		发布方：<input class='PubInput' type='text'  name='Publisher'/>
	</div>
	文章内容：
	<textarea id='ckeditor' name='Content' style="height:700px;width:750px;" ></textarea>
	<script type="text/javascript">
		CKEDITOR.replace('ckeditor');
	</script>
	<input type='hidden' value=<?php echo $_SESSION['userid']; ?> name='PubId'/>
	<input class='addAriticleBtn' type='submit' value='发布文章' />
</form>

</body>



