<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/mmdsysu/MCISP/config/globalconfig.php';
include_once $dbConnDir;
	usleep(600000);//��ʵ����ȥ����˯��0.6����ʾ����Ч��
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