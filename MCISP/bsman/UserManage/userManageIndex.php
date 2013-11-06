<?php
session_start();
header("Content-Type:text/html; charset=UTF-8");
include_once $_SERVER['DOCUMENT_ROOT'] . '/MCISP/config/globalconfig.php';
//include_once $dbConnDir;
include_once $_SERVER['DOCUMENT_ROOT'] . "/MCISP/dbconn/DbConn.php";
	$misdb_i = new misdb();
	$misdb_i->DbConnect();
	
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	if (isset($_POST['UserName']))   //UserAut保存用户权限
	{	
		$sql='insert into Users(UserName,UserPwd,Campus,Authority) values("'.
		$_POST['UserName'] .'","'.$_POST['UserPwd'] .'",'. $_POST['Campus'].','. $_POST['UserAut'] .' )';
		$alertres=$misdb_i->DbQuery($sql);
	} 
	else if(isset($_POST['UpdData']))   //Authority保存用户权限
	{
		$data = $_POST['UpdData'];
		$data = json_decode($data);
		$arr = array();
		$sqlPwd="";
		if($data->UserPwd!="_NO_CHANGE_")
			$sqlPwd=" ,UserPwd='".$data->UserPwd . "'";
		$sql = "update Users set UserName=\"".$data->UserName ."\",Campus=". $data->Campus .$sqlPwd." ,Authority=". $data->Authority." where UserId=" . $data->UserId;	
		$res=$misdb_i->DbQuery($sql); 
		if($res)
			$arr['result'] = 1;
		else {
			$arr['result'] = 0;
			$arr['sql']=$sql; 
			}
		echo json_encode($arr);
		exit;
	}else if(isset($_POST['DelData']))	//提示：删除用户不会删除该用户发表的所有文章，该用户的文章挂载到root用户下
	{
		$data = $_POST['DelData'];
		$data = json_decode($data);
		$arr = array();
		$misdb_i->DbQuery("SET AUTOCOMMIT=0");	//事务开始，禁止自动提交
		$presql="update Article set PubId=0 where PubId=". $data->UserId;
		$res1=$misdb_i->DbQuery($presql); 
		$sql = 'delete from Users where UserId=' . $data->UserId;
		$res2=$misdb_i->DbQuery($sql); 		
		if($res1 && $res2) {	//如果两个sql结果为真，则提交事务
			$misdb_i->DbQuery("COMMIT");
			$arr['result'] = 1;
		}else { 
			$misdb_i->DbQuery("ROLLBACK");
			$arr['result'] = 0;
		}
		$misdb_i->DbQuery("SET AUTOCOMMIT=1");	//事务结束，自动提交
		echo json_encode($arr);
		exit;
	}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>用户管理-多媒体信息服务平台</title>
	<link href="../../css/layout.css" rel="stylesheet" type="text/css" />
	<link href="../../css/screen.css" rel="stylesheet" type="text/css" />
	<script language=javascript src="../../js/jquery-1.8.3.min.js"></script>
	<script language=javascript src="../../js/md5.js"></script>
	<script language=javascript src="../../js/util.js"></script>
	<script type="text/javascript" language="javascript" charset="utf-8">

	
		function userAddFromCheck()
		{
			if( userAddFrom.UserName.value=="")
			{
				alert("请输入用户名！");
				return false;
			}
			if(userAddFrom.UserPwd.value=="")
			{
				alert("请输入密码！");
				return false;
			}
	
			//if(userAddFrom.UserPwd.value.length!=32)//则用MD5加密
				userAddFrom.UserPwd.value=hex_md5(userAddFrom.UserPwd.value);
			
			var res=0;
			var AutSel=document.getElementsByName('Aut');
			for(var i=0;i<AutSel.length;i++){
				if(AutSel[i].checked){
						res=SetOne(res,AutSel[i].value);
						//res+=parseInt(AutSel[i].value);
				}
			}
			alert(res);
			userAddFrom.UserAut.value=res;
			return true;
		}
	</script>
</head>


<body>
<?php
	if(!isset($_SESSION['username'])) exit;
	//require_once($topDir);
?>


<div id="userManaMain">
<div id="userConAdd">
	<span id="selectCon">
		<form id="selectConFrom" name="selectConFrom" method="get" action="./userManageIndex.php"  >
		<fieldset>
		<legend><h6>用户查询</h6></legend>
		所属校区：<select name='CampusCon' >
							<option value=0>所有校区</option>
							<option value=20>南校区</option>
							<option value=10>东校区</option>
							<option value=40>珠海校区</option>
							<option value=30>北校区</option>
						</select>
						</br>
		用户名：<input name="NameCon"  type="text" class="InputTextLen"  value="" />	
		<span style="float:right;margin-right:10px"><input type='submit' value='确定'  /></span></fieldset>
		</form>
	</span>
	<span id="userAddDiv">
		<form id="userAddFrom" name="userAddFrom" method="post" action="./userManageIndex.php" onsubmit="return userAddFromCheck()" >
		<fieldset>
		<legend><h6>添加用户</h6></legend>
				用户名：<input name="UserName"  type="text" class="InputTextLen" value="" />&nbsp;
				密码：<input name="UserPwd"  type="text" class="InputTextLen"  value="" />&nbsp;
				所属校区：<select name='Campus' >
								<option value=0>所有校区</option>
								<option value=20>南校区</option>
								<option value=10>东校区</option>
								<option value=40>珠海校区</option>
								<option value=30>北校区</option>
							</select>&nbsp;&nbsp;&nbsp;&nbsp;
				<input type='submit' value='确定'  />
				<div>
				前台权限设置：
							<input type="checkbox" name="Aut" value=1 />用户管理&nbsp;
							<input type="checkbox" name="Aut" value=2 />助理管理&nbsp;
							<input type="checkbox" name="Aut" value=3 />首页管理&nbsp;
							<input type="checkbox" name="Aut" value=4 />文章管理&nbsp;
							<input type="checkbox" name="Aut" value=5 />失物招领&nbsp;
				<br />设备权限设置：	
							<input type="checkbox" name="Aut" value=16 />检查登记&nbsp;
							<input type="checkbox" name="Aut" value=17 />查询统计&nbsp;
							<input type="checkbox" name="Aut" value=18 />数据操作&nbsp;
							<input type="checkbox" name="Aut" value=19 />服务调查&nbsp;
							<input type="checkbox" name="Aut" value=0 />超级管理员&nbsp;
				</div>
				<input type='hidden' value=0 name='UserAut'/></fieldset>
		</form>
	</span>
</div>
<div id="userListDiv">
<?php 
	$sql='select * from Users where UserId>0';
	if (isset($_GET['CampusCon']) && $_GET['CampusCon']!=0 )	
		$sql.=' and Campus=' . $_GET['CampusCon'];
	if (isset($_GET['NameCon']) && $_GET['NameCon']!="") 
		$sql.=' and UserName like "%'. $_GET['NameCon'] .'%"';	
	$sql.=' order by UserId desc';
	$res=$misdb_i->DbQuery($sql);
	$RowNum = $misdb_i->DbRowNum($res);
	$PageNum = ceil($RowNum / UserManaSizes); //页面数
	if($PageNum==0){
		echo '<h6 style="padding:50px 0px 0px 50px;">没有用户</h6></div>';	
		require_once($bottomDir); 
		exit;
	}

?>
	<table id='userList' class='spe'><tr><th width=40>序号</th><th width=110>用户名</th><th width=110>密码</th><th width=520>权限</th><th width=80>所属校区</th><th width=50>修改</th><th width=50>删除</th></tr></table>
	<div id='page'>
		<span>共有<?php echo $RowNum ?>个用户</span>&nbsp;&nbsp;&nbsp;
		<span>每页显示<?php echo UserManaSizes ?>个</span>&nbsp;&nbsp;&nbsp;
		<a id='first'>首页</a>
		<a id='pre'>上一页</a>
		<span id='pageNumList'> </span>
		<a id='next'>下一页</a>
		<a id='last'>尾页</a>&nbsp;&nbsp;&nbsp;
		当前页：<input id='any' type='text'/>
		<input id="gotoBtn" type="button"  value="跳转" />
	</div>

</div>
</div>

<script type="text/javascript" language="javascript" charset="utf-8">
	var rows = []; //每页的记录集
	var curPage = 1; //当前页面
	var PageSizes=<?php echo UserManaSizes ?>; //每页记录数
	var PageNums=<?php echo $PageNum ?>; //页面数
<?php
	$i = 0; 
	while ($row = $misdb_i->DbResult($res))
	{
		if($i%2)
			echo 'rows[' . $i . '] = "<tr ><td>'.$row['UserId'] .'</td><td>'.$row['UserName']
			.'</td><td>**********</td><td name='.$row['Authority'].'>' .  GetAuthStr($row['Authority']) .
			'</td><td name='. $row['Campus'] .'>'. $GetCampus[ $row['Campus'] ] .'</td><td ><a>修改</a></td><td ><a>删除</a></td></tr>";' . "\n";
		else   
			echo 'rows[' . $i . '] = "<tr class=\'altrow\'><td>'.$row['UserId'] .'</td><td>'.$row['UserName']
			.'</td><td>**********</td><td name='.$row['Authority'].'>' . GetAuthStr($row['Authority']) . 
			'</td><td name='. $row['Campus'] .'>'. $GetCampus[ $row['Campus'] ] .'</td><td ><a>修改</a></td><td ><a>删除</a></td></tr>";' . "\n";
		$i++;
	}
?>

	$('div#page a#first').click(function(){
		if(curPage != 1)
		{
			curPage = 1;
			loadPage(curPage);
		}
	});
	
	$('div#page a#pre').click(function(){
		if(curPage > 1)
		{
			curPage--;
			loadPage(curPage);
		}
	});
	
	$('div#page a#next').click(function(){
		if(curPage <  PageNums)
		{
			curPage++;
			loadPage(curPage);
		}
	});
	
	$('div#page a#last').click(function(){
		if(curPage !=  PageNums)
		{
			curPage =  PageNums;
			loadPage(curPage);
		}
	});
	
	$('div#page input#gotoBtn').click(function(){
		var any=document.getElementById('any').value;
		if(any!=undefined){//只有在any有实际值的时候才会跳转
			if(any < 1) 
				any=1;
			else if (any > PageNums) 
				any=PageNums;		
			if(curPage !=  any)
			{
				curPage =  any;
				loadPage(curPage);
			}
			document.getElementById('any').value=any;	
		}
	});
	
	function bind()
	{
		$('#userList tr td a').click(function(){
			var txt = $(this).html();
			if(txt=='修改')
			{
				var TrPar=$(this).parent().parent();
				var val = TrPar.children(':nth-child(2)').html();
				TrPar.children(':nth-child(2)').html('<input style="width:100px" value="'+val+'" />');
				TrPar.children(':nth-child(3)').html('<input style="width:100px" value="**********" />');
				var val = TrPar.children(':nth-child(4)').attr('name');
				TrPar.children(':nth-child(4)').html(GetCheckboxFromAut(val));	
				var Cam=TrPar.children(':nth-child(5)').attr('name');
				TrPar.children(':nth-child(5)').html('<select name="Campus">'
								+'<option value=0>所有校区</option>'
								+'<option value=20>南校区</option>'
								+'<option value=10>东校区</option>'
								+'<option value=40>珠海校区</option>'
								+'<option value=30>北校区</option></select>');
				TrPar.children(':nth-child(5)').children().children().each(function (){
					if ($(this).val()==Cam) 
						$(this).attr('selected','selected');
				});
				$(this).html('完成');
			}
			else if(txt=='完成')
			{
				//css({"border-color":"#FF0000","backgruond":"#00FF00"})
				var TrPar=$(this).parent().parent();    //tr
				var UserName=TrPar.children(':nth-child(2)').children().attr('value');	
				if(UserName=="")
				{
					alert("用户名不能为空！");
					return ;
				}
				var key=TrPar.children(':nth-child(3)').children().attr('value');
				if($.trim(key)=="")
				{
					alert("密码不能为空！");
					return ;
				}	
				if(key!="**********")
				{
					key=hex_md5(key);
				}else{
					key="_NO_CHANGE_";
				}
				//var CurAut = TrPar.children(':nth-child(4)').attr('name');    //第四个td
				//CurAut=CurAut>>6;
			    //CurAut=CurAut<<6;
				var CurAut = 0;
				//alert(TrPar.children(':nth-child(4)').children().html());
				
				//alert(tmp);
				TrPar.children(':nth-child(4)').children().children(':checked').each(function(){
				     //alert($(this).attr('value'));
	                 CurAut=SetOne(CurAut,$(this).val());    //this表示children.children
				});
				
				var Campus=TrPar.children(':nth-child(5)').children().attr('value');
				var obj = $(this);
				$.ajax({
					url: './userManageIndex.php',
					dataType: 'json',
					type: 'post',
					data: 'UpdData={"UserId":'+$(obj).parent().parent().children(':nth-child(1)').html()+',"UserName":"'+UserName
					+'","UserPwd":"'+key+'","Authority":'+CurAut+',"Campus":'+Campus+'}',
					success: function(data) {
						if(data['result']===1) {
							var UserName=TrPar.children(':nth-child(2)').children().attr('value');
								TrPar.children(':nth-child(2)').html(UserName);
								TrPar.children(':nth-child(3)').html('**********');
								TrPar.children(':nth-child(4)').html(GetAuthStr(CurAut));	
								TrPar.children(':nth-child(4)').attr('name',CurAut);
								TrPar.children(':nth-child(5)').html(GetCampus(Campus));
								TrPar.children(':nth-child(5)').attr('name',Campus);
							$(obj).html('修改');
						}else{
							alert("修改操作失败！");
						}
					},
					error: function(jqXHR, textStatus, errorThrown) {
						alert("修改操作请求错误:"+textStatus+ " " + errorThrown);
					}
				});
				
			}
			else if(txt=='删除')
			{
				if(window.confirm("确定要删除此用户？")){
					var obj = $(this);
					$.ajax({
						url: './userManageIndex.php',
						dataType: 'json',
						type: 'post',
						data: 'DelData={"UserId":'+$(obj).parent().parent().children(':nth-child(1)').html()+'}',
						success: function(data) {
							if(data['result']===1) {
								var val = $(obj).parent().parent().remove();
							}else{
							alert("删除用户操作失败！");
							}
						},
						error: function(jqXHR, textStatus, errorThrown) {
							alert("删除请求错误:"+textStatus+ " " + errorThrown);
						}
					});
				}
			}
		});
	}
	
	
	function loadPage(p)
	{
		var str='';
		var left;
		if(p%10)
			left=p-p%10+1;
		else 
			left=p-9;
		var right=(left+9>PageNums)? PageNums:left+9;
		 for( i=left; i<=right; i++)
			str=str+'<a id="P'+i+'">'+i+'</a>&nbsp;';

			$('#pageNumList').html(str);
			$('div#page span#pageNumList a[id^=P]').click(function(){
				curPage = $(this).attr('id').substring(1);
				loadPage(curPage);
			});
		$('#userList').children().html('<tr><th width=40>编号</th><th width=110>用户名</th><th width=110>密码</th><th width=520>权限</th><th width=80>所属校区</th><th width=50>修改</th><th width=50>删除</th></tr>');
		for(var i=(p-1)*PageSizes; i<p*PageSizes; i++)
			$('#userList').append(rows[i]);
		document.getElementById('any').value=p;
		bind();
	}
	loadPage(1);
</script>

<?php
	if(isset($alertres)){
		if($alertres)
			echo "<script type='text/javascript'>alert('添加成功！')</script>";
		else
			echo "<script type='text/javascript'>alert('添加失败！')</script>";
	}

	//require_once($bottomDir); 
	$misdb_i->DbClose();
?>

</body>
</html>