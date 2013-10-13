<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/MCISP/config/globalconfig.php';
//include_once $dbConnDir;
include_once $_SERVER['DOCUMENT_ROOT'] . "/MCISP/dbconn/DbConn.php";
	usleep(400000);//其实可以去掉，睡眠0.6秒显示动画效果

	$suffix=$_POST['CampusId'];
	$start=$_POST['Begin'];

	$misdb=new misdb();
	$misdb->DbConnect();
	$sql="select * from Lost ".$suffix." order by NewState,FindTime desc limit ".$start.",".LostListNums;
	$res=$misdb->DbQuery($sql);
	$TableCon="";
	$LostList='';
	$wherein='';
	$Claim=array();//认领信息数组
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
	$misdb->DbClose();
	$reponse=array("LList"=>$LostList,"ClaimArr"=>$Claim);
	//$reponse=array("LList" => $LostList);

	echo json_encode($reponse);


?>