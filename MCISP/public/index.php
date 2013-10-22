<?php
	session_start();
	header("Content-Type:text/html; charset=UTF-8");
	include_once '../config/globalconfig.php';
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
	<link rel="shortcut icon" type="image/x-icon" href="./images/favicon.ico" />
	<link href="../css/layout.css" rel="stylesheet" type="text/css" />
	<link href="../css/screen.css" rel="stylesheet" type="text/css" />
	<script language=javascript src="../js/jquery-1.8.3.min.js"></script>
	<script language=javascript src="../js/slider.js"></script>
	<script language=javascript src="../js/md5.js"></script>
</head>

<body >

<!-- nav begin-->
<?php 
	require_once($topDir); 
	$misdb_i = new misdb();
	$misdb_i->DbConnect();
	$ConRes=$misdb_i->DbQuery('select * from ContactWay');		//获取联系方式
	$row=$misdb_i->DbResult($ConRes);
	$ConArr=$row['contact'];
	$misdb_i->DbFree($ConRes);
?>
<!-- nav end-->

<!-- main begin -->
<div id="Main"  >
	<!-- up begin -->
	<div id="Up" >
		<!-- News begin-->
		<div id="News">
		<div style="height:50px;"><a style="width:50px;float:right;" href="<?php echo $InfoNoticeHP. '?CateId=1&CatyName=信息公告' ?>">更多...</a></div>
		<?php 
			$result = $misdb_i->DbQuery('select ArteId,ArteName,CateId,Campus,PubTime from Article order by PubTime desc limit 0,' . NewNums );
            while ($row = $misdb_i->DbResult($result))
			{
				echo 
				'<div class="Item">
				<a title="' . $row['ArteName']  . '" href="./infoContent.php?ArteId='. urlencode($row['ArteId']) .  '">
				<span class="Campus">[' . $GetCampus[$row['Campus']] .']</span>' 
				. $row['ArteName'] 
				. '</a>
				<span class="PubTime">'. substr($row["PubTime"],0,10) .'</span>
				</div>';
			}
			$misdb_i->DbFree($result);
		?>
		</div>
		<!-- News end -->
		<!-- Pics begin -->
		<div id="Pics" >
			<script type="text/javascript" language="javascript">AddPic();</script>
		</div>
		<!-- Pics end -->
	</div> 
	<!-- up end -->
	<!-- down begin -->
	<div id="Down" >
		<!-- Notice begin -->
		<div id="Notice">
			 <div id="Calender" >
				<a  href="http://home.sysu.edu.cn/zdnl/2012/"  target="_blank"><img src="./images/calender.jpg"  border="none" ></a>
			 </div>
			 <div id="BBS" >
				<a href="http://bbs.sysu.edu.cn/"  target="_blank"><img src="./images/bbs.jpg" border="none" ></a>
			 </div>
			 <div id="BoJi" >
				<a href="http://202.116.100.1/"  target="_blank"><img src="./images/boji.jpg" border="none"></a>
			 </div>
			 <div id="Yxdjt" >
				<a href="http://lecture.sysu.edu.cn/index.php"  target="_blank"><img src="./images/yxdjt.png" border="none"></a>
			 </div>
		</div>
		<!-- Notice end -->
		<!-- services begin -->
		<div id="Services">
		<div style="height:50px;"><a style="width:50px;float:right;" href="<?php echo $InfoNoticeHP. '?CateId=2&CatyName=服务信息' ?>">更多...</a></div>
			<?php 
				$result = $misdb_i->DbQuery('select ArteId,ArteName,CateId,Campus,PubTime from Article where CateId="2" order by PubTime desc limit 0,' . ServiceNums );
				while ($row = $misdb_i->DbResult($result))
				{
					echo 
					'<div class="Item">
					<a title="' . $row['ArteName']  . '" href="./infoContent.php?ArteId='. urlencode($row['ArteId']) .  '">
					<span class="Campus">[' . $GetCampus[$row['Campus']] .']</span>' 
					. $row['ArteName'] 
					. '</a>
					<span class="PubTime">'. substr($row["PubTime"],0,10) .'</span>
					</div>';
				}
				$misdb_i->DbFree($result);
			?>
		</div>
		<!-- services end -->
		<!-- contact begin 	-->
		<div id="Contact">
                    <div id="colee">
                        <div id="colee1" style="margin-top: 20px;">
                            <p style="line-height: 150%;"><?php echo str_replace("\n", "<br />", str_replace(" ", "&nbsp;", $ConArr)); ?>  </p>     							
                        </div>
                        <!--
						<div id="colee2">
						     
						</div>
                         <script type="text/javascript" language="javascript">setMarquee();</script>
                         -->
                    </div>
                    <!--四校区联系方式的结束 -->
		</div>
		<!-- contact end -->
	</div>
	<!-- down end -->
</div>
<!-- main end -->

<!-- bottom begin-->
<?php 	
	$misdb_i->DbClose();
	require_once($bottomDir); 
	
?>
<!-- bottom end-->

</body>
</html>