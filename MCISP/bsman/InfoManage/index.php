<?php
	session_start();
	include_once $_SERVER['DOCUMENT_ROOT'] . '/mmdsysu/MCISP/config/globalconfig.php';
	include_once $dbConnDir;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>中山大学多媒体信息服务平台</title>
	<meta name="Keywords" content="中山大学多媒体" />
	<meta name="Description" content="中山大学多媒体信息服务平台从周一到周日为老师和学生提供连续全方面的服务，
	通过多媒体设备提高了教学质量和教学效率，还提供大学英语四六级听力考试、开学毕业典礼等重大活动的技术保障工作，
	成为现代化教学中不可或缺的组成部分" />
	<link href="../../css/layout.css" rel="stylesheet" type="text/css" />
	<link href="../../css/screen.css" rel="stylesheet" type="text/css" />
	<link href="../../css/jquery-ui.css" rel="stylesheet" type="text/css" />
	<script language=javascript src="../../js/jquery-1.8.3.min.js"></script>
	<script language=javascript src="../../js/jquery-ui.js"></script>
	<script language=javascript src="../../js/util.js"></script>
</head>

<body>

<?php
	
	$misdb_i = new misdb();
	$misdb_i->DbConnect();
?>

<div id="navi">
	<a id="2basic">基本资料</a>
	<br>
	<a id="2payroll">工资资料</a>
</div>

<div id="basic">
<?php
	$result = $misdb_i->DbQuery('select * from Assistant where AsstId=' . $_SESSION['userid']);
	if ($row = $misdb_i->DbResult($result))
	{
		echo '<center>';
		echo '<table>';
		echo '<tr><th>学号：</th><td><input name=AsstNum value="' . $row['AsstNum'] . '" readonly="readonly"></td></tr>';
		echo '<tr><th>姓名：</th><td><input name=AsstName value="' . $row['AsstName'] . '" readonly="readonly"></td></tr>';
		echo '<tr><th>性别：</th><td><input name=AsstSex value="' . $row['AsstSex'] . '" readonly="readonly"></td></tr>';
		echo '<tr><th>校区：</th><td><input name=Campus value="' . $row['Campus'] . '" readonly="readonly"></td></tr>';
		echo '<tr><th>Id卡号：</th><td><input name=IdCardNum value="' . $row['IdCardNum'] . '" readonly="readonly"></td></tr>';
		echo '<tr><th>银行账户：</th><td><input name=BankAccount value="' . $row['BankAccount'] . '" readonly="readonly"></td></tr>';
		echo '<tr><th>电话：</th><td><input name=Phone value="' . $row['Phone'] . '" readonly="readonly"></td></tr>';
		echo '<tr><th>短号：</th><td><input name=PhoneSNum value="' . $row['PhoneSNum'] . '" readonly="readonly"></td></tr>';
		echo '<tr><th>专业：</th><td><input name=Major value="' . $row['Major'] . '" readonly="readonly"></td></tr>';
		echo '<tr><th>地址：</th><td><input name=Address value="' . $row['Address'] . '" readonly="readonly"></td></tr>';
		echo '<tr><th>出生日期：</th><td><input name=BirthDate value="' . $row['BirthDate'] . '" id=BirthDate readonly="readonly"></td></tr>';
		echo '<tr><th>进入日期：</th><td><input name=EnterDate value="' . $row['EnterDate'] . '" id=EnterDate readonly="readonly"></td></tr>';
		echo '<tr><th>离开日期：</th><td><input name=LeaveDate value="' . $row['LeaveDate'] . '" id=LeaveDate readonly="readonly"></td></tr>';
		echo '<tr><th>照片：</th><td><input name=Photo value="' . $row['Photo'] . '" readonly="readonly"><br>';
		echo '<tr><td><input type="button" id="modify" value="修改"></td></tr>';
		echo '</table>';
		echo '</center>';
	}
	
	$misdb_i->DbFree($result);
?>

<script>
	$('#modify').click(function() {
		if($(this)[0].value=='修改') {
			$('input').removeAttr("readonly");
			$('#BirthDate').datepicker({ dateFormat: "yy-mm-dd" });
			$('#EnterDate').datepicker({ dateFormat: "yy-mm-dd" });
			$('#LeaveDate').datepicker({ dateFormat: "yy-mm-dd" });
			$(this).attr("value","完成");
		}
		else if($(this)[0].value=='完成'){
			$.ajax({
					url: './modify.php',
					dataType: 'json',
					type: 'post',
					data: 'data={"AsstNum":"'+$('input[name=AsstNum]')[0].value+'",'
								+'"AsstName":"'+$('input[name=AsstName]')[0].value+'",'
								+'"AsstSex":"'+$('input[name=AsstSex]')[0].value+'",'
								+'"Campus":"'+$('input[name=Campus]')[0].value+'",'
								+'"IdCardNum":"'+$('input[name=IdCardNum]')[0].value+'",'
								+'"BankAccount":"'+$('input[name=BankAccount]')[0].value+'",'
								+'"Phone":"'+$('input[name=Phone]')[0].value+'",'
								+'"PhoneSNum":"'+$('input[name=PhoneSNum]')[0].value+'",'
								+'"Major":"'+$('input[name=Major]')[0].value+'",'
								+'"Address":"'+$('input[name=Address]')[0].value+'",'
								+'"BirthDate":"'+$('input[name=BirthDate]')[0].value+'",'
								+'"EnterDate":"'+$('input[name=EnterDate]')[0].value+'",'
								+'"LeaveDate":"'+$('input[name=LeaveDate]')[0].value+'",'
								+'"Photo":"'+$('input[name=Photo]')[0].value+'"}',
					success: function(data) {
						if(data['result']===1) {
							$('input').attr("readonly","readonly");
							$('#BirthDate').datepicker("destroy");
							$('#EnterDate').datepicker("destroy");
							$('#LeaveDate').datepicker("destroy");
							$(this).removeAttr("readonly");
							$(this).attr("value","修改");
						}
					},
					error: function(jqXHR, textStatus, errorThrown) {
						alert(textStatus);
					}
				});
		}
	});
</script>

</div>

<div id="payroll" style="display:none">
<?php
	$result = $misdb_i->DbQuery('select * from payroll where StuNum=' . substr($_SESSION['userid'],1));

	echo '<center>';
	echo '<table>';
	echo '<tr>';
	echo '<th>工资年份</th>';
	echo '<th>工资月份</th>';
	echo '<th>工作时数</th>';
	echo '<th>工作工资</th>';
	echo '</tr>';
	while ($row = $misdb_i->DbResult($result)){
		echo '<tr>';
		echo '<td>' . $row['PayYear'] . '</td>';
		echo '<td>' . $row['PayMonth'] . '</td>';
		echo '<td>' . $row['WorkHours'] . '</td>';
		echo '<td>' . $row['WorkPay'] . '</td>';
		echo '</tr>';
	}
	echo '</table>';
	echo '</center>';
	
	$misdb_i->DbFree($result);
?>
</div>

<?php
	$misdb_i->DbClose();
?>

<script>
	$('div#navi a#2basic').click(function() {
		$('div#basic').css('display', 'block');
		$('div#payroll').css('display', 'none');
	});
	
	$('div#navi a#2payroll').click(function() {
		$('div#basic').css('display', 'none');
		$('div#payroll').css('display', 'block');
	});
</script>

</body>