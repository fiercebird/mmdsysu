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
	<title>教室情况-多媒体信息服务平台</title>
	<link href="../../css/layout.css" rel="stylesheet" type="text/css" />
	<link href="../../css/screen.css" rel="stylesheet" type="text/css" />
	<script language=javascript  src="../../js/slider.js"></script>
	<script language=javascript src="../../js/md5.js"></script>
</head>

<body>
<?php
	require_once($topDir);
	$bid = $_GET['bid'];                         //教学楼编号
	$className = $_GET['className'];             //教室名字
	$db = new misdb();                           //数据库实例
    $db->DbConnect();                            //数据库实例连接
	
	$classroom_sql = "select * from classroom where bid='".$bid."' and className='".$className."'";       //classroom查询
	$classroom_res = $db->DbQuery($classroom_sql);            //classroom查询结果
	$classroom_arr = $db->DbFetchAssoc($classroom_res);    //classroom查询结果的关联数组
    $classId = $classroom_arr['classId'];	             //教室编号
	$seatNum = $classroom_arr['seatNum'];	             //教室座位数
	$examNum = $classroom_arr['examNum'];	             //教室考位数
	
	$computer_sql = "select * from computer where classId='".$classId."'";       //computer查询
    $computer_res = $db->DbQuery($computer_sql);            //computer查询结果
	$computer_arr = $db->DbFetchAssoc($computer_res);      //computer查询结果的关联数组
	$cpu = $computer_arr['cpu'];                                //CPU
	$memory = $computer_arr['memory'];                          //memory
	$hardDisk = $computer_arr['hardDisk'];                      //hardDisk
	
	$building_sql = "select * from building where bid='".$bid."'";       //building查询
	$building_res = $db->DbQuery($building_sql);            //building查询结果
	$building_arr = $db->DbFetchAssoc($building_res);    //building查询结果的关联数组
	$cid = $building_arr['cid'];                         //校区编号
	
	/*
	$projector_sql = "select * from projector where classId='".$classId."'";       //projector查询
    $projector_res = $db->DbQuery($projector_sql);            //projector查询结果
	
	$midcontrol_sql = "select * from midcontrol where classId='".$classId."'";       //midcontrol查询
    $midcontrol_res = $db->DbQuery($midcontrol_sql);            //midcontrol查询结果
	*/
	
	if($cid==1) $dir = "/../../images/classroom/east/";
	if($cid==2) $dir = "/../../images/classroom/south/";
	if($cid==3) $dir = "/../../images/classroom/north/";
	if($cid==4) $dir = "/../../images/classroom/zhuhai/";
	
	$db->DbClose();
?>
<div id="ClassMain">
        <center><h6>教室情况说明</h6></center>
        <div id="ClassUp" >
			<div id="classroomPic" >
            <div id="imgPlayer">
			<script type="text/javascript">
				var cid=<?php echo $cid ?>;
				var PicStr=new Array();
				PicStr[0]="多媒体中控面板";
				PicStr[1]="教室讲台";
				PicStr[2]="教室讲台";
				PicStr[3]="教室全景";
				PicStr[4]="教室全景";
				if(cid==4)
				{
					PicStr[0]="教室门牌";
				}else if(cid==3 || cid==2)
				{
					PicStr[0]="教室讲台";
					PicStr[1]="中控面板";
					PicStr[2]="教室全景";
					PicStr[3]="教室全景";
					PicStr[4]="投影设备";
				}
				PImgPlayer.addItem("<a href=# target=_blank style=color:#000;text-decoration:none;>"+PicStr[0]+"</a>", "#", "<?php echo $dir.$className.'_01.jpg';?>");
				PImgPlayer.addItem("<a href=# target=_blank style=color:#000;text-decoration:none;>"+PicStr[1]+"</a>", "#", "<?php echo $dir.$className.'_02.jpg';?>");
				PImgPlayer.addItem("<a href=# target=_blank style=color:#000;text-decoration:none;>"+PicStr[2]+"</a>", "#", "<?php echo $dir.$className.'_03.jpg';?>");
				PImgPlayer.addItem("<a href=# target=_blank style=color:#000;text-decoration:none;>"+PicStr[3]+"</a>", "#", "<?php echo $dir.$className.'_04.jpg';?>");
				PImgPlayer.addItem("<a href=# target=_blank style=color:#000;text-decoration:none;>"+PicStr[4]+"</a>", "#", "<?php echo $dir.$className.'_05.jpg';?>");
				PImgPlayer.init("imgPlayer", 500, 350);   
				document.getElementById('Tag2').onMouseOver=switchTag('Tag2','SubNav2');
			</script>
			</div>
			</div>
			<div><dl>
				<dt><h4>教室说明:</h4></dt>
				<dd><ul>
				<li>教室类型：<?php if(isset($className)) echo $className; else echo "暂无信息";?> </li>
				<li>教室座位数：<?php if(isset($seatNum)) echo $seatNum; else echo "暂无信息";?></li>
				<li>教室考位：<?php if(isset($examNum)) echo $examNum; else echo "暂无信息";?></li>
				</ul><dd>
				<dt><h4>课室设配清单：</h4></dt>
				<dd><table   class="spe2">
				<tbody>
				<tr>
					<td>计算机</td><td><img src="./check.png"></td>
					<td>投影机</td><td><img src="./check.png"></td>
					<td>影碟机</td><td><img src="./check.png"></td>
				</tr>
				<tr>
					<td>中&nbsp;&nbsp;控</td><td ><img src="./check.png"></td>
					<td>展&nbsp;&nbsp;台</td><td><img src="./check.png"></td>
					<td style="FONT-SIZE: 12px">扩音/话筒</td><td><img src="./check.png"></td>
				</tr></tbody></table>
				<div style="color:#666666;font-size:13px;">
				<span >图例：(</span><img src="./check.png"/><span >:已配备的设备&nbsp;</span><img  src="./alert.png"/><span>:值班室可借用设备&nbsp;</span><img src="./close.png"><span >:暂未配备的设备)</span></div>
				</dd>
				<dt><h4>计算机配置:</h4><dt>
				<dd><p> CPU:<?php  if(isset($cpu)) echo  $cpu; else echo "暂无信息";?>， 内存:<?php if(isset($memory)) echo $memory." GB"; else echo "暂无信息";?>， 硬盘:<?php if(isset($hardDisk)) echo $hardDisk." GB"; else echo "暂无信息";?>， OS:win 7<br />
				预装软件: Office 2007， 射手播放器， 360安全卫士</p></dd>
			</dl></div>
        </div>
    <div id="ClassDown"> 
        <dl>    
        <dt><h4>多媒体教室操作说明</h4></dt>
        <dd>
            <p>1、 教室采用集中电话管理，老师可拨打内线电话801 or 802联系多媒体办公室<br />
            2、 考虑到空气对流换气，教室中走廊一侧上窗口应开启，减少闷热。</p>
        </dd>  
        <dt><h4>教室基本设备</h4></dt>
        <dd>
			<ol>
			<li>高分辨率投影机，可以播放讲课讲义和视频</li>
			<li>嵌入讲台的设备控制台</li>
			<li>每个多媒体教室配备了移频扩音设备，无线及有线话筒可同步使用</li>
			<li>教室桌面提供网络接口，可通过网络接口连接校园网（IP应设置为自动获取），也可通过无线网连接校园网。</li>
			</ol>
		</dd>   
		<dt><h4>可借用设备设备</h4></dt> 
		<dd>
			 <ul>
			 <li>200人以上教室可借用无线麦克风</li>
			 <li>录像机、DVD机、实物展示台</li>
			 <li>PPT遥控器（激光笔）</li>
			 <li>VAG线，音频线</li>
			 <li>80人以下教室没有扩音设备，如确实有需要，可与主控室联系。</li>
			 </ul>
		</dd>
		<dt><h4>教室投影操作说明</h4></dt>
		<dd>
            <ol >
				<li>1、 按“开关”按键，系统开，5秒后给投影机发出开机代码，打开投影机，降下电动幕。</li>
				<li>2、 等待投影机及电脑启动正常后，即可插上U盘进行使用。</li>
				<li>3、 如果需要使用台式计算机以外的设备，如笔记本、展示台等，请按相应键。“扩展键”用于切换显示提前接入的DVD、VCD等扩展外设信号。</li>
				<li>4、 可使用面板按键进行演示设备音量的控制，音量大、小按键每按一次键增加或减少一级音量（一级为±4db），每三级为一个LED音量显示，一直按住音量大、小键，系统会连续控制音量，直至最大或最小。“静音键”无效。教室扩音设备音量控制在讲台内，控制面板下旋钮，顺时针为音量增。</li>
				<li>5、 使用完毕，关闭投影机和电脑，按“开关”按键，系统会自动收起电动幕，投影机进入散热状态，延时4分30秒后，自动断投影机电源。</li>
            </ol>
		</dd>
		<dt><h4>温馨提示</h4></dt>
        <dd>
              <p>
           	    1、请老师或同学使用完多媒体后，把自己的Ｕ盘等物品带走，并关闭多媒体设备。<br />
	            2、如在正常操作情况下出现异常情况，请通知管理员。<br />
                （使用黑板旁边的内部电即可。）<br />
	            3、多媒体课室电脑仅作为老师上课用，其他人员不得使用课室电脑。若有其它事务，请与多媒体服务室联系。<br /><br />
               </p>
        </dd>  
		</dl>
	</div>
</div>
<?php
	
	require_once($bottomDir); 
?>

</body>
</html>