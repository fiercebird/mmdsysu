<?php
session_start();
header("Content-Type:text/html; charset=UTF-8");
include_once $_SERVER['DOCUMENT_ROOT'] . '/MCISP/config/globalconfig.php';
//include_once $dbConnDir;
include_once $_SERVER['DOCUMENT_ROOT'] . "/MCISP/dbconn/DbConn.php";

if(!isset($_SESSION['authority'])) exit;
else {
	$Au=$_SESSION['authority'];
	if(!IsOne($Au,5)) exit;  // 权限不足，则拒绝访问，还需指向Not Founded页面
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>失物管理-多媒体信息服务平台</title>
	<link href="../../css/layout.css" rel="stylesheet" type="text/css" />
	<link href="../../css/screen.css" rel="stylesheet" type="text/css" />
	<script language=javascript src="../../js/jquery-1.8.3.min.js"></script>
	<script language=javascript src="../../js/spin.min.js"></script>
	<script language=javascript src="../../js/Calendar3.js"></script>
</head>
<script type="text/javascript">


	$(document).ready(function(){	
		function bind(){
			$('#LostList div.LostItem span.btnspan a.asty1').live('click', function(){
				var text=$(this).children('label').html();
				if(text=="修改"){
				
					$(this).html("<img src='../../images/btnpic/save.png' /><label>完成</label>");
					$(this).next().html("<img src='../../images/btnpic/back.png' /><label>取消</label>");
				}else if(text=="完成"){
				
					//$(this).children('label').html("修改");
					$(this).html("<img src='../../images/btnpic/change.png'  /><label>修改</label>");
					$(this).next().html("<img src='../../images/btnpic/delete.png'  /><label>删除</label>");
				}else if(text=="取消"){
				
					$(this).html("<img src='../../images/btnpic/delete.png' alt=''/><label>删除</label>");
					$(this).prev().html("<img src='../../images/btnpic/change.png'  /><label>修改</label>");
				}else if(text=="删除"){
				
				}
			});
			$('#LostList div.LostItem span a.asty2').live('click',function(){	
				var text=$(this).html();
				if(text=="修改"){
				
					$(this).html("完成");
					$(this).next().html("取消");
				}else if(text=="完成"){
				
					$(this).html("修改");
					$(this).next().html("删除");
				}else if(text=="取消"){
				
					
					$(this).html("删除");
					$(this).prev().html("修改");
				}else if(text=="删除"){
				
				
				}
			});
			
		};
		bind();
	});
	
	function AddLostFromCheck(){
		if($.trim(AddLostFrom.FindTime.value)=="")
		{
			alert("请输入拾获时间！");
			return false;
		}
		if($.trim(AddLostFrom.Finder.value)=="")
		{
			alert("请输入拾获人！");
			return false;
		}
		if($.trim(AddLostFrom.Thing.value)=="")
		{
			alert("请输入物品名称！");
			return false;
		}
		if($.trim(AddLostFrom.Detail.value)=="")
		{
			alert("请输入详细特征！");
			return false;
		}
		if($.trim(AddLostFrom.FindPlace.value)=="")
		{
			alert("请输入拾获地点！");
			return false;
		}
		if($.trim(AddLostFrom.FinderTel.value)=="")
		{
			alert("请输入联系电话！");
			return false;
		}
		return true;
	}

</script>

<body  class="bsman" >
<?php
	$misdb=new misdb();
	$misdb->DbConnect();
	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		if (isset($_POST['CampusCon'])) //添加失物信息
		{
			$addsql="insert into Lost(Thing,Detail,Campus,Finder,FinderTel,FindTime,FindPlace) values('".$_POST['Thing']."','".$_POST['Detail']."',".$_POST['CampusCon'].",'".$_POST['Finder']."','".$_POST['FinderTel']."','".$_POST['FindTime']."','".$_POST['FindPlace']."')";
			$alertres=$misdb->DbQuery($addsql);
		}
	}


	//require_once($topDir);

	$suffix=" where Campus>=0 ";
	if(isset($_GET['CampusCon']) &&  $_GET['CampusCon']!=0){
		$suffix.=" and  Campus=".$_GET['CampusCon'];
	}
	if(isset($_GET['LostNameCon']) && trim($_GET['LostNameCon'])!="" ){
		$suffix.=" and  Thing like '%". $_GET['LostNameCon'] ."%'";	
	}
	$sql="select count(*) as nums from lost ".$suffix;
	
	//echo $sql;
	

	$res=$misdb->DbQuery($sql);
	$row=$misdb->DbResult($res);	 
	$misdb->DbFree($res);
	$resNums=$row['nums']; 		//统计符合记录数目
	$LostList='';
	$wherein='';
	$Claim=array();//认领信息数组
	if($resNums!=0) { //若有记录
		$sql="select * from Lost".$suffix." order by NewState,FindTime desc limit 0,115";
		
		//echo $sql;
		
		$res=$misdb->DbQuery($sql);
		while($row=$misdb->DbResult($res)){
			$LostList=$LostList."<div class='LostItem'><div>所属校区：<span class='infospan' style='width:200px;'>".$GetCampus[$row['Campus']]."</span>联系电话：<span class='infospan' style='width:180px;'>".$row['FinderTel']."</span>拾获时间：<span class='infospan' >".$row['FindTime']."</span></div><div>物品名称：<span class='infospan'  style='width:200px;'>".$row['Thing']."</span>拾获人：<span class='infospan'  style='width:200px;'>".$row['Finder']."</span></div><div>拾获地点：<span class='infospan' >".$row['FindPlace']."</span></div><div class='LostItemBtm' style='width:700px;height:60px;' ><label  style='vertical-align:top;float:left;'>详细特征：</label><span class='textspan' value='状态特征'>".$row['Detail']."</span><span class='btnspan'><a class='asty1'><img src='../../images/btnpic/change.png'/><label>修改</label></a><a class='asty1'><img src='../../images/btnpic/delete.png' /><label>删除</label></a></span></div><div>最新状态：<span class='infospan'  style='width:480px;'>".$LostState[$row['NewState']]."</span></div><div class='CliamInfo' name=". $row['FoundId']." ></div></div>";
			if($row["NewState"]==2){
				$wherein.=$row["FoundId"].",";
			}
		}
		$misdb->DbFree($res);
		if($wherein!=''){ //存在已经被认领的失物
			$wherein=substr($wherein,0,-1); //剔除末尾的,
			$sql="select * from LostClaim where ClaimId in (".$wherein.")";
			$res=$misdb->DbQuery($sql);
			
			while($row=$misdb->DbResult($res)){
				$Claim[$row['ClaimId']]=array("ClaimName"=>$row['ClaimName'],"CardType"=>$row['CardType'],"CardId"=>$row['CardId'],"ClaimTel"=>$row['ClaimTel'],"ClaimTime"=>$row['ClaimTime']);
			}
		}
		// echo "<br/>";
		// print_r($Claim);	
		// if(empty($Claim)) echo "<br/>null";	
		// else		
		// echo "<br/>NOT null";	
			// echo "<br/>";
	}else{
		$LostList='<center><h6>当前没有失物清单！</h6></center>';
	}
	$misdb->DbClose();
	 
	
	
?>

<!--  模版样例
		<div class='LostItem'>
			<div>所属校区：<span class="infospan" style="width:200px;">珠海校区珠海校区</span>联系电话：<span class="infospan" style="width:180px;">SSSSS</span>拾获时间：<span class="infospan" >XXX</span></div>
			<div>物品名称：<span class="infospan"  style="width:200px;">SSSSS</span>拾获人：<span class="infospan"  style="width:200px;">我吃的啥珠海校区</span></div>
			<div>拾获地点：<span class="infospan" >SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS</span></div>
			<div class="LostItemBtm" style="width:700px;height:60px;" ><label  style="vertical-align:top;float:left;">详细特征：</label><textarea class="textsty1" value="状态特征"></textarea><span class="btnspan"><a class="asty1"><img src="../../images/btnpic/change.png" alt=""/><label>修改</label></a><a class="asty1"><img src="../../images/btnpic/delete.png" alt=""/><label>删除</label></a></span></div>
			<div>最新状态：<span class="infospan"  style="width:480px;">未认领</span></div>
			<div class='CliamInfo' ></div>
		</div>
		
		<div class='LostItem'>
			<div>所属校区：<span class="infospan" style="width:200px;">珠海校区珠海校区</span>联系电话：<span class="infospan" style="width:180px;">SSSSS</span>拾获时间：<span class="infospan" >XXX</span></div>
			<div>物品名称：<span class="infospan"  style="width:200px;">SSSSS</span>拾获人：<span class="infospan"  style="width:200px;">我吃的啥珠海校区</span></div>
			<div>拾获地点：<span class="infospan" >SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS</span></div>
			<div style="width:700px;height:60px;" ><label  style="vertical-align:top;float:left;">详细特征：</label><textarea class="textsty1" value="状态特征"></textarea><span class="btnspan"><a class="asty1"><img src="../../images/btnpic/change.png" alt=""/><label>修改</label></a><a class="asty1"><img src="../../images/btnpic/delete.png" alt=""/><label>删除</label></a></span></div>
			<div>最新状态：<span class="infospan"  style="width:480px;">未认领</span></div>
			
			<div class='CliamInfo' >
			<div>失主姓名：<span class="infospan" style="width:150px;">XXX</span>证件类型：<span class="infospan" style="width:130px;">XXX</span></span>证件号码：<span class="infospan" style="width:200px;d">XXX</span></div>
			
			<div>联系电话：<span class="infospan" style="width:150px;">12343435135423</span>认领时间：<span class="infospan" style="width:250px;">XXXX-XX-XX</span><span ><a class="asty2">修改</a><a class="asty2">删除</a></span></div>
			</div>
		</div>

-->

<div id='LostMain'>
	<div id='AddLost'>
		<h6>添加失物</h6>
		<div style="margin:0px 0px 0px 30px;">
		<form id="AddLostFrom" name="AddLostFrom" method="post" action=""  onsubmit="return AddLostFromCheck()"  >
			<div>所属校区：<span class="infospan" style="width:200px;"><select name='CampusCon' >
									<option value=0>所有校区</option>
									<option value=20>南校区</option>
									<option value=10>东校区</option>
									<option value=40>珠海校区</option>
									<option value=30>北校区</option>
								</select></span>拾获时间：<span class="infospan"  style="width:185px;"><input  type="text" name="FindTime" onclick="new Calendar().show(this);" readonly="readonly" /></span>拾 获 人： <input type="text" name="Finder" class="InputTextLen" value="" />
			</div>
			<div>物品名称：<span class="infospan"  style="width:200px;"><input type="text" name="Thing" class="InputTextLen" value="" /></span>拾获地点：<span class="infospan" style="width:185px;"><input type="text" name="FindPlace" value="" /></span>联系电话：<input type="text" name="FinderTel" class="InputTextLen" value="" /></div>
			<div style="width:750px;height:60px;"><label  style="vertical-align:top;">详细特征：</label><textarea name="Detail" style="width:400px;height:50px;font-size:13px;resize: none;" ></textarea> 	<input type='submit' style="float:right;margin:10px 140px 0px 0px;width:60px;height:30px;" value='添加'  /></div>
		</form>
		</div>
	</div>
	<div id='LostSerCon'>
		<h6>失物查询</h6>
				<form id="LostSerConFrom" name="LostSerConFrom" method="get" action=""  >
				<span class="infospan" style="width:200px;">
				所属校区：<select name='CampusCon' >
									<option value=0>所有校区</option>
									<option value=20>南校区</option>
									<option value=10>东校区</option>
									<option value=40>珠海校区</option>
									<option value=30>北校区</option>
								</select></span>
				物品名称：<input name="LostNameCon"  type="text"  value="" />	
				<input type='submit' style="margin:0px 0px 0px 60px;width:60px;height:30px;"  value='搜索'  />
				</form>
	</div>	
	<h6>失物清单</h6>
	<div id='LostList'>
		<?php echo $LostList;?>
	</div>
	<div  id='loading'>
	<div id='foo'  style="height:5px;width:550px;"></div>
	<h4>正在加载更多物品清单...</h4>
	</div>

</div>

<script type="text/javascript" language="javascript" charset="utf-8">

	function ClaimInfoShow( ClaimInfo ) {
		$('#LostList div.LostItem div.CliamInfo').each(function(){
				var ClaimId=$(this).attr('name');
				if(ClaimId!=0 && ClaimId!=undefined){
					$(this).css({"display":"block", "background-color":"#C1FFC1"});					
					$(this).html("<div>失主姓名：<span class='infospan' style='width:130px;'>"+ClaimInfo[ClaimId]['ClaimName']+"</span>证件类型：<span class='infospan' style='width:150px;'>"+ClaimInfo[ClaimId]['CardType']+"</span>认领时间：<span class='infospan' style='width:200px;'>"+ClaimInfo[ClaimId]['ClaimTime']+"</span></div><div>联系电话：<span class='infospan' style='width:130px;'>"+ClaimInfo[ClaimId]['ClaimTel']+"</span>证件号码：<span class='infospan' style='width:320px;d'>"+ClaimInfo[ClaimId]['CardId']+"</span><span ><a class='asty2'>修改</a><a class='asty2'>删除</a></span></div>");
				}
			
		});
	}

	var ClaimInf=<?php if(empty($Claim)) echo "null"; else echo json_encode($Claim); ?>;
	ClaimInfoShow(ClaimInf); //页面第一次加载失主信息

	var suffix=<?php echo json_encode($suffix); ?>;	
	var opts = {			//ajax加载动画
		  lines: 11, // The number of lines to draw
		  length: 8, // The length of each line
		  width: 4, // The line thickness
		  radius: 5, // The radius of the inner circle
		  corners: 1, // Corner roundness (0..1)
		  rotate: 0, // The rotation offset
		  direction: 1, // 1: clockwise, -1: counterclockwise
		  color: '#000', // #rgb or #rrggbb
		  speed: 1, // Rounds per second
		  trail: 60, // Afterglow percentage
		  shadow: false, // Whether to render a shadow
		  hwaccel: false, // Whether to use hardware acceleration
		  className: 'spinner', // The CSS class to assign to the spinner
		  zIndex: 2e9, // The z-index (defaults to 2000000000)
		  top: 10 , // Top position relative to parent in px
		  left: 'auto' // Left position relative to parent in px
	};
	var target = document.getElementById('foo');
	var spinner = new Spinner(opts).spin(target);
		

	var counter=0;
	var start=115;
	var delta=<?php echo LostListNums;?>;
	var maxNum=<?php echo $resNums;?>;
	$('#loading').hide();
	$(document).ready(function(){	//瀑布流效果
		if(start>=maxNum ){
			spinner.stop();
			$('#loading').hide();
		}else
			$(window).scroll(loadData);
	
	});
	function loadData(){		
		if( start<maxNum && IsUserAtBottom()){
			getData();
		}
	}
	function IsUserAtBottom(){
		var  threshold=170+300*counter;
		return  ((($(document).height()-$(window).height())-$(window).scrollTop())<threshold)?true:false ;
	}
	
	function getData(){
		$(window).unbind('scroll');
		$('#loading').show();
		$.ajax({
			url: './getdata.php',
			dataType: 'json',
			type: 'post',
			data: {"CampusId":suffix,"Begin":start},
			success: function(response){
				counter=counter++;
				start=start+delta;
				$('#loading').hide();
				$('#LostList').append(response['LList']);
				if(response["ClaimArr"]!=""){
						var ClaimInfo=response["ClaimArr"]; 
						ClaimInfoShow(ClaimInfo); //再次绑定加载失主信息
						//alert(ClaimInfo[1]['ClaimName']);
					}
				$(window).scroll(loadData);
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert("修改操作请求错误:"+textStatus+ " " + errorThrown);
			}
		});
	}
	

</script>



<?php

	if(isset($alertres)){
		if($alertres)
			echo "<script type='text/javascript'>alert('添加成功！')</script>";
		else
			echo "<script type='text/javascript'>alert('添加失败！')</script>";
	}
	//require_once($bottomDir); 
	require_once($_SERVER['DOCUMENT_ROOT'] . "/MCISP/public/bottom.php");
?>

</body>
</html>