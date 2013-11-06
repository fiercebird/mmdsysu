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
	<title>服务资讯-多媒体信息服务平台</title>
	<link href="../../css/layout.css" rel="stylesheet" type="text/css" />
	<link href="../../css/screen.css" rel="stylesheet" type="text/css" />
	<script language=javascript src="../../js/jquery-1.8.3.min.js"></script>
	<script language=javascript src="../../js/md5.js"></script>
	<script type="text/javascript" language="javascript" charset="utf-8">
	function BusDataCheck()
	{
		var src=0;
		var des=0;
		for(var i=0;i<BusSel.Origin.length;i++){
			if(BusSel.Origin[i].checked)
			{
				src=BusSel.Origin[i].value;
				break;
			}
		}
		for(var i=0;i<BusSel.Destin.length;i++){
			if(BusSel.Destin[i].checked)
			{
				des=BusSel.Destin[i].value;
				break;
			}
		}
		
		if(src==des)
		{
			alert("请选择不同校区!");
			return false;
		}
		
		if((src==30 && des==40) || (src==40 && des==30) ){
			alert("北校区和珠海校区之间没有往返班车！");
			return false;
		}else
			return true;
		
	}
	</script>
</head>


<body>
<?php
if(!isset($_GET['TypeId'])) exit; //访问此页面必须在URL中传递CateId参数，否则禁止访问
	require_once($topDir);
	
?>
<div id="ServiceMain">
<?php  
if($_GET['TypeId']==1)
{
?>
<!--
<div class="MapText">
东校区建筑清单：未完工
</div>
<div class="MapText">
珠海校区建筑清单：未完工
</div >
<div class="MapText">
南校区建筑清单：未完工
</div >
<div class="MapText">
北校区建筑清单：未完工
</div >
-->
<table cellpadding=10>
<tr>
<td><div id="east" >
	<a href='./CampusMap/east.jpg' title='东校区地图' target='_blank'>
	<img alt src="./CampusMap/east_s.jpg" width=490 height=350></a>
	<br>
	<div class="MapText">东校区</div>
</div></td>
<td><div id="zhuhai">
	<a href='./CampusMap/zhuhai.jpg' title='珠海校区地图' target='_blank'>
	<img alt src="./CampusMap/zhuhai_s.jpg" width=490 height=350></a>
	<br>
	<div class="MapText">珠海校区</div>
</div></td>
</tr>
<tr>
<td><div id="south" >
	<a href='./CampusMap/south.jpg' title='南校区地图' target='_blank'>
	<img alt src="./CampusMap/south_s.jpg" width=490 height=350></a>
	<br>
	<div class="MapText">南校区</div>
</div></td>
<td><div id="north" >
	<a href='./CampusMap/north.jpg' title='北校区地图' target='_blank'>
	<img alt src="./CampusMap/north_s.jpg" width=490 height=350>
	</a>
	<br>
	<div class="MapText">北校区</div>
</div></td>
</tr>
</table>
<?php 
}else  if($_GET['TypeId']==2)
{
?>
<div>
<div id="BusLeft">
<div id="BusL1">
<h6>校区班车查询</h6>
<form name="BusSel" method="post" action="" onsubmit="return BusDataCheck()">
<div>
<span id="BusSrc">
始发校区<br />
<input type="radio" name="Origin" checked=true value=10 >东校区<br />
<input type="radio" name="Origin" value=20 >南校区<br />
<input type="radio" name="Origin" value=30 >北校区<br />
<input type="radio" name="Origin" value=40 >珠海校区<br />						
</span>
<span id="BusDes">
到达校区<br />
<input type="radio" name="Destin" value=10 >东校区<br />
<input type="radio" name="Destin" checked=true value=20 >南校区<br />
<input type="radio" name="Destin" value=30 >北校区<br />
<input type="radio" name="Destin" value=40 >珠海校区<br />
</span>
</div>
<input style="margin:10px 0px 0px 100px;width:80px;height:40px;"  type="submit" value="查询">
</form>
</div>
<div id="BusL2">
<h6>咨询及投诉电话</h6>
<p>运输服务中心：84113992<br />
东校区后勤办：39332226<br />
北校区后勤办：87331212<br />
总务处：84113991 84110982<br /><br />
<span style="width:120px;height:15px; display:inline-block;"></span>总务处<br />
<div style="margin:0px 0px 0px 20px;">二零一二年九月十三日</div>
</p>
</div>
<div id="BusL3">
<h6>校车备注</h6>1.教职工专车如有空位，学生可到教师公寓对面（候车点）乘坐。<br />
2.票价3元/次，用校园卡进行缴费。
</div>
</div>

<div id="BusRight">
<h6>工作日校车时刻表</h6>
<table  id='BusTable' class='spe'>
<tr><th width='40px'>序号</th><th width='70px'>发车时间</th><th width='140px'>发车地点</th><th width='250px'>行车路线</th><th width='130px'>到达地点</th><th width='100px'>乘坐人员</th><th width='90px'>车型</th></tr>
<?php 
	if(isset($_POST['Origin']))
		$src=$_POST['Origin'];
	else
		$src=10;
	if(isset($_POST['Destin']))
		$des= $_POST['Destin'];
	else
		$des=20;
    $db = new misdb();
    $db->DbConnect();

    $select_sql = 'select * from CampusBus where Origin='.$src .' and Destin='. $des.' order by SeqeId asc';
    $res = $db->DbQuery($select_sql);
    while( $row = $db->DbResult($res) ) {
        echo "<tr>";
        if($row['BeginPlace']=='') {
            echo "<td></td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<td>" . $row['PathWay'] . "</td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<td></td>";
        } else {
            echo "<td style='text-align:center;'>" . $row['SeqeId'] . "</td>";
            echo "<td>" . $row['BeginTime'] . "</td>";
            echo "<td>" . $row['BeginPlace'] . "</td>";
            echo "<td>" . $row['PathWay'] . "</td>";
            echo "<td>" . $row['EndPlace'] . "</td>";
            echo "<td>" . $row['Passenger'] . "</td>";
            echo "<td>" . $row['BusTye'] . "</td>";
        }
        echo "</tr>";
    }
	$db->DbFree($res);
?>
</table>
<h6>周末校车时刻表  [节假日请另见通知]</h6>   
<table  id='BusTable' class='spe'>
<tr><th width='40px'>序号</th><th width='70px'>发车时间</th><th width='140px'>发车地点</th><th width='250px'>行车路线</th><th width='130px'>到达地点</th><th width='100px'>乘坐人员</th><th width='90px'>车型</th></tr>
<?php 
if (($src==10 && $des==20) || ($src==10 && $des==30) || ($src==20 && $des==10) || ($src==30 && $des==10)){
	$des=$des+1;
    $select_sql = 'select * from CampusBus where Origin='.$src .' and Destin='. $des .' order by SeqeId asc';
    $res = $db->DbQuery($select_sql);
    while( $row = $db->DbResult($res) ) {
        echo "<tr>";
		echo "<td style='text-align:center;'>" . $row['SeqeId'] . "</td>";
		echo "<td>" . $row['BeginTime'] . "</td>";
		echo "<td>" . $row['BeginPlace'] . "</td>";
		echo "<td>" . $row['PathWay'] . "</td>";
		echo "<td>" . $row['EndPlace'] . "</td>";
		echo "<td>" . $row['Passenger'] . "</td>";
		echo "<td>" . $row['BusTye'] . "</td>";
        echo "</tr>";
    }
	$db->DbFree($res);
}else if(($src==20 && $des==30) || ($src==30 && $des==20)){
	echo '<tr><td colspan="7"><h6 style="margin:auto 200px;">周末期间南校区和北校区之间没有校车</h6></td></tr>';  
}else{
	echo '<tr><td colspan="7"><h6 style="margin:auto 130px;">周末期间往返珠海校区的校车时刻表同工作日校车时刻表</h6></td></tr>'; 
}
	$db->DbClose();
?>
</table>
<h6>东校区内班车行车路线</h6> 
<div style="color:#000000;padding:0px 5px;"> 
（1）南、北校区==>东校区<br/>
北门广场（教学楼、行政楼停靠点==>北学院楼（北望路岗亭）【候车点】==><br/>教学实验中心（北望路岗亭）【候车点】==>教师公寓对面【候车点】==>生科院停车场西侧【终点】<br/>
（2）东校区==>南、北校区<br/>
生科院停车场西侧【起点】=>教学楼A座北侧【候车点】==>行政楼北侧桥头（仅限8:20、17:10班次车）【候车点】==><br/>北学院楼（北望路岗亭）【候车点】==>教学实验中心（北望路岗亭）【候车点】==>教师公寓对面【候车点】<br/>
</div>
</div>
</div>

<?php  
} else if($_GET['TypeId']==3)
{
?>
<div><image  width=1100px height=600px src='./class.jpg'></image></div>
<?php  
}
?>
</div>
<script type="text/javascript">
	document.getElementById(Tag3).onMouseOver=switchTag('Tag3','SubNav3');
</script>
<?php
	require_once($bottomDir); 
?>

</body>
</html>