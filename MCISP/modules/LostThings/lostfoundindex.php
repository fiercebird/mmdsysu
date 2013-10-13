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
	<title>失物招领-多媒体信息服务平台</title>
	<link href="../../css/layout.css" rel="stylesheet" type="text/css" />
	<link href="../../css/screen.css" rel="stylesheet" type="text/css" />
	<script language=javascript src="../../js/jquery-1.8.3.min.js"></script>
	<script language=javascript src="../../js/md5.js"></script>
	<script language=javascript src="../../js/spin.min.js"></script>
</head>


<body>
<?php
	require_once($topDir);
	$suffix="";
	$campus="四校区物品拾获清单";
	if(isset($_GET['CampusId'])){
		$suffix=' where Campus='.$_GET['CampusId'];
		$campus=$GetCampus[$_GET['CampusId']].'物品拾获清单';
	}
	
	$misdb=new misdb();
	$misdb->DbConnect();
	$sql="select count(*) as nums from Lost".$suffix;
	$res=$misdb->DbQuery($sql);
	$row=$misdb->DbResult($res);
	$resNums=$row['nums']; 		//统计符合记录数目
	$TableCon='';
	if($resNums!=0) { //若有记录
		$sql="select Thing,Detail,FindTime,FindPlace,NewState from Lost".$suffix." order by NewState,FindTime desc limit 0,115";
		$res=$misdb->DbQuery($sql);
		$i = 0;
		while($row=$misdb->DbResult($res)){
			if($i%2)
				$TableCon=$TableCon.'<tr><td>'.$row['Thing'].'</td><td>'.$row['Detail'].'</td><td>'.$row['FindTime'].'</td><td>'.$row['FindPlace'].'</td><td>'.$LostState[$row['NewState']].'</td></tr>';
			else
				$TableCon=$TableCon.'<tr class="altrow"><td>'.$row['Thing'].'</td><td>'.$row['Detail'].'</td><td>'.$row['FindTime'].'</td><td>'.$row['FindPlace'].'</td><td>'.$LostState[$row['NewState']].'</td></tr>';
			$i++;
		}
	}else{
		$TableCon='<tr><td colspan=5><center><h6>当前没有物品拾获清单！</h6></center></td></tr>';
	}
	$misdb->DbClose();
?>
	
	<div id='LostFoundMain'>
		<center><h6><?php echo $campus;?></h6></center>
		<table class='spe' id='LostFoundList'><tr><th width=150>物品名称</th><th width=300>物品特征</th><th width=150>拾获时间</th><th width=200>拾获地点</th><th width=150>最新状态</th></tr>
		<?php echo $TableCon; ?>
		</table>
		<div  id='loading'>
		<div id='foo'  style="height:5px;width:750px;"></div>
		<h4>正在加载更多物品清单...</h4>
		</div>
	</div>
<?php

	require_once($bottomDir); 
?>

<script type="text/javascript" language="javascript" charset="utf-8">

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
		$.get(
		'./data.php',
		{CampusId:suffix,Begin:start},
		function(response){
			counter=counter++;
			start=start+delta;
			$('#loading').hide();
			$('#LostFoundList').append(response);
			$(window).scroll(loadData);
		}
		);
	}
	
	document.getElementById('Tag7').onMouseOver=switchTag('Tag7','SubNav7');
</script>

</body>
</html>