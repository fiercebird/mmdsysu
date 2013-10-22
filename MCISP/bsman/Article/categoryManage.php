<?php
session_start();	
include_once $_SERVER['DOCUMENT_ROOT'] . '/MCISP/config/globalconfig.php';
//include_once $dbConnDir;
include_once $_SERVER['DOCUMENT_ROOT'] . "/MCISP/dbconn/DbConn.php";	

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$data = $_POST['data'];
	$data = json_decode($data);
	$sql = '';
	$arr = array();
	$misdb_i = new misdb();
	$misdb_i->DbConnect();
	if(!isset($data->CatyName)){
		$befsql='update Article set CateId=0 where CateId=' . $data->CatyId;
		$misdb_i->DbQuery($befsql); //要删除的类别下的文章修改CateId=0,保证删除类别不会删除该类别下的文章
		$sql = 'delete from category where CatyId=' . $data->CatyId;
		$arr['result'] = 1;
	}
	else if(!isset($data->CatyId)){ //插入类别
		$sql = 'insert into category(CatyName) values("' . $data->CatyName . '")';
		$arr['result'] = 1;
	}
	else {
		$sql = 'update category set CatyName="' . $data->CatyName . '" where CatyId=' . $data->CatyId;
		$arr['result'] = 1;
	}

	$misdb_i->DbQuery($sql); 
	if(!isset($data->CatyId))
		$arr['CatyId'] = $misdb_i->DbInsId();
	$misdb_i->DbClose();
	echo json_encode($arr);
	exit;
}

	if(!isset($_SESSION['username'])) exit;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>类别管理</title>
	<script language=javascript src="../../js/jquery-1.8.3.min.js"></script>
	<link href="../../css/iframelayout.css" rel="stylesheet" type="text/css" />
</head>

<body>

<h2 class='head1'>类别列表</h2>
<?php
	$misdb_i = new misdb();
	$misdb_i->DbConnect();
	$result = $misdb_i->DbQuery('select * from category order by CatyId');
	
	echo '<table id="articlelist" class="spe"><tr><th>类别名称</th><th>编辑</th><th>删除</th></tr>';
	for($i=1;$i<=6;$i++)   //硬编码
	{
		$row = $misdb_i->DbResult($result);
		echo '<tr class="altrow" name=' . $row['CatyId'] . '><td>' . $row['CatyName'] . '</td><td><a>编辑</a></td><td>禁止</td></tr>';
	}
	while ($row = $misdb_i->DbResult($result))
	{
		echo '<tr name=' . $row['CatyId'] . '><td>' . $row['CatyName'] . '</td><td><a>编辑</a></td><td><a>删除</a></td></tr>';
	}
	echo '</table>';
	$misdb_i->DbFree($result);
	$misdb_i->DbClose();
?>

<h2 class='head1'>添加类别</h2>
<div id="divAddCaty">
	<span>请输入类别名称：</span>
	<input type='text' id='newCaty' />
	<input type='button' value='添加类别' id='addCaty' />
</div>
<script type="text/javascript" language="javascript" charset="utf-8">
	function bind(){
		$('table tr td a').click(function(){
			var txt = $(this).html();
			if(txt=='编辑')
			{
				var val = $(this).parent().parent().children(':first').html();
				$(this).parent().parent().children(':first').html('<input value="'+val+'" />');
				$(this).html('完成');
			}
			else if(txt=='完成')
			{
				if($(this).parent().parent().children(':first').children(':first').attr('value')!='')//如果编辑后的类别名称不为空串
				{
					var obj = $(this);
					$.ajax({
						url: './categoryManage.php',
						dataType: 'json',
						type: 'post',
						data: 'data={"CatyId":'+$(this).parent().parent().attr('name')+',"CatyName":"'+$(this).parent().parent().children(':first').children(':first').attr('value')+'"}',
						success: function(data) {
							if(data['result']===1) {
								var val = $(obj).parent().parent().children(':first').children(':first').attr('value');
								$(obj).parent().parent().children(':first').html(val);
								$(obj).html('编辑');
								
							}
						},
						error: function(jqXHR, textStatus, errorThrown) {
							alert("完成操作请求错误:"+textStatus+ " " + errorThrown);
						}
					});
				}else{
					alert("类别名不能为空！");
				}
			}
			else if(txt=='删除')
			{
				if(window.confirm("确定要删除此类别？")){
					var obj = $(this);
					$.ajax({
						url: './categoryManage.php',
						dataType: 'json',
						type: 'post',
						data: 'data={"CatyId":'+$(this).parent().parent().attr('name')+'}',
						success: function(data) {
							if(data['result']===1) {
								var val = $(obj).parent().parent().remove();
								//	window.location.href='./categoryManage.php';
							}
						
						},
						error: function(jqXHR, textStatus, errorThrown) {
							alert("删除操作请求错误:"+textStatus+ " " + errorThrown);
						}
					});
				}
			}
		});
	}
	
	bind();

	$('input#addCaty').click(function(){
		if($('input#newCaty').attr('value')){ //如果输入了类别名称
			$.ajax({
					url: './categoryManage.php',
					dataType: 'json',
					type: 'post',
					data: 'data={"CatyName":"'+$('input#newCaty').attr('value')+'"}',
					success: function(data) {
						if(data['result']===1) {
							//$('table').append('<tr name='+data['CatyId']+'><td>'+$('input#newCaty').attr('value')+'</td><td><a>编辑</a></td><td><a>删除</a></td></tr>');
							//$('input#newCaty').val('');
							//bind();
							window.location.href='./categoryManage.php';
						}
					},
					error: function(jqXHR, textStatus, errorThrown) {
						alert("添加类别请求错误:"+textStatus+ " " + errorThrown);
					}
				});
		}else{
			alert("请输入类别名称！");
		}	
	});
</script>

</body>

