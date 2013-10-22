<?php
session_start();
header("Content-Type:text/html; charset=UTF-8");
include_once $_SERVER['DOCUMENT_ROOT'] . '/MCISP/config/globalconfig.php';
//include_once $dbConnDir;
include_once $_SERVER['DOCUMENT_ROOT'] . "/MCISP/dbconn/DbConn.php";


	if(isset($_POST['UpdData']))  //发送了ajax修改请求
	{
		$arr = array();
		$con = $_POST['UpdData'];
		$sql = 'update ContactWay set contact="'.$con.'" where contactid=1';	
		$misdb = new misdb();
		$misdb->DbConnect();
		$res=$misdb->DbQuery($sql);	
		if($res)
			$arr['result'] = 1;
		else
			$arr['result'] = 0 ;
		$misdb->DbClose();
		echo json_encode($arr);
		exit;
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>联系方式-多媒体信息服务平台</title>
	<link href="../css/layout.css" rel="stylesheet" type="text/css" />
	<link href="../css/screen.css" rel="stylesheet" type="text/css" />
	<script language=javascript src="../js/jquery-1.8.3.min.js"></script>
</head>


<body class="bsman">
<?php
	if(!isset($_SESSION['username'])) exit;
	$misdb_i = new misdb();
	$misdb_i->DbConnect();
	$ConRes=$misdb_i->DbQuery('select * from ContactWay');		//获取联系方式
	$row=$misdb_i->DbResult($ConRes);
	$contact=$row['contact'];
	$misdb_i->DbFree($ConRes);
	$misdb_i->DbClose();

//	require_once($topDir);
?>


	<div id="ConWayMain">
		<div><h6> 前台首页-修改联系人</h6></div>
		<textarea style="height:550px;width:90%;" id="txtarea">
		       <?php echo $contact;?>
		</textarea>
		<p><a>修改</a></p>
	</div>


<script type="text/javascript" language="javascript" charset="utf-8">
	var data=<?php	echo json_encode($contact); ?>;
	var tmp=<?php	echo json_encode($contact); ?>;
	function bind(){
		document.getElementById('txtarea').readOnly = true;    //只读
		$('a').live("click",function(){ //为现在以及将来的a链接绑定click函数
				var txt=$(this).html();   //a的值
				if(txt=='修改'){
					var contact=$(this).parent().prev().html();
					document.getElementById('txtarea').readOnly = false;   //点修改后变为可写
					$(this).parent().html('<a>完成</a> <a>取消</a>');
				}else if(txt=='完成'){
					var contact=$(this).parent().prev().val();   //文本框的值
					var obj = $(this);
					$.ajax({
						url:'./ContactWay.php',
						dataType:'json',
						type:'post',
						data: {"UpdData":contact},
						success:function(back){
							if(back['result']===1){
							    document.getElementById('txtarea').readOnly = true;   //点完成后变为只读
								$(obj).parent().prev().html(contact);
								$(obj).parent().html('<a>修改</a>');
								data = contact;
								alert("修改成功！");
							}else{
								alert("修改失败!");
							}
						},
						error: function(jqXHR, textStatus, errorThrown) {
							alert("修改操作请求错误:"+textStatus+ " " + errorThrown);
						}
					});
				}else if(txt=='取消'){
					document.getElementById('txtarea').readOnly = true;     //点取消后变为只读
					$(this).parent().prev().val(tmp);
					$(this).parent().html('<a>修改</a>');
				}
			}
		);
	}
	bind();
</script>

</body>
</html>