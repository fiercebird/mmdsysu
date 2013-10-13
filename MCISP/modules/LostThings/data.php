<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/mmdsysu/MCISP/config/globalconfig.php';
include_once $dbConnDir;
	usleep(600000);//其实可以去掉，睡眠0.6秒显示动画效果
	$suffix=$_GET['CampusId'];
	$start=$_GET['Begin'];
	$misdb=new misdb();
	$misdb->DbConnect();
	$sql="select Thing,Detail,FindTime,FindPlace,NewState from Lost ".$suffix." order by NewState,FindTime desc limit ".$start.",".LostListNums;
	$res=$misdb->DbQuery($sql);
	$TableCon="";
	$i = 0;
	while($row=$misdb->DbResult($res)){
		if($i%2)
			$TableCon=$TableCon.'<tr class="altrow"><td>'.$row['Thing'].'</td><td>'.$row['Detail'].'</td><td>'.$row['FindTime'].'</td><td>'.$row['FindPlace'].'</td><td>'.$LostState[$row['NewState']].'</td></tr>';
		else
			$TableCon=$TableCon.'<tr ><td>'.$row['Thing'].'</td><td>'.$row['Detail'].'</td><td>'.$row['FindTime'].'</td><td>'.$row['FindPlace'].'</td><td>'.$LostState[$row['NewState']].'</td></tr>';
		$i++;
	}
	$misdb->DbClose();
	echo $TableCon;

?>