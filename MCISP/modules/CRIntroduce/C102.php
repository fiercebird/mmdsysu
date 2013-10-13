<?php
session_start();
header("Content-Type:text/html; charset=UTF-8");
include_once $_SERVER['DOCUMENT_ROOT'] . '/MCISP/config/globalconfig.php';
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
	$campus=$_GET['campus'];
	$room = $_GET['room'];   
    $db = new misdb();
    $db->DbConnect();
	$select_sql = 'select * from Classroom where Campus='.$campus .' and RoomName="'. $room.'"' ;
    $res = $db->dbquery($select_sql);
	$resnum=$db->DbRowNum($res);
	$roomtype=0;
	$seat=0;
	$testseat=0;
	$picpath="";
	$row=$db->DbResult($res);
	if($resnum==1){
        $roomtype = $GetRoomType[ $row['RoomType'] ];
        $seat = $row['SeatNum'];
        $testseat = $row['TestseatNum'];
        $picpath = $row['PicPath'];
    }
	$picpath=$ClassRoomDir . $picpath;
	$db->DbFree($res);
	$db->DbClose();
?>
<div id="ClassMain">
        <center><h6>教室情况说明</h6></center>
        <div id="ClassUp" >
			<div id="classroomPic" >
            <div id="imgPlayer">
			<script type="text/javascript">
				var campus=<?php echo $campus ?>;
				var PicStr=new Array();
				PicStr[0]="多媒体中控面板";
				PicStr[1]="教室讲台";
				PicStr[2]="教室讲台";
				PicStr[3]="教室全景";
				PicStr[4]="教室全景";
				if(campus==40)
				{
					PicStr[0]="教室门牌";
				}
				PImgPlayer.addItem("<a href=# target=_blank style=color:#000;text-decoration:none;>"+PicStr[0] +"</a>", "#", "<?php echo $picpath.'01.jpg';?>");
				PImgPlayer.addItem("<a href=# target=_blank style=color:#000;text-decoration:none;>"+PicStr[1]+"</a>", "#", "<?php  echo $picpath . '02.jpg';?>");
				PImgPlayer.addItem("<a href=# target=_blank style=color:#000;text-decoration:none;>"+PicStr[2]+"</a>", "#", "<?php echo $picpath . '03.jpg';?>");
				PImgPlayer.addItem("<a href=# target=_blank style=color:#000;text-decoration:none;>"+PicStr[3]+"</a>", "#", "<?php echo $picpath . '04.jpg';?>");
				PImgPlayer.addItem("<a href=# target=_blank style=color:#000;text-decoration:none;>"+PicStr[4]+"</a>", "#", "<?php echo $picpath . '05.jpg';?>");
				PImgPlayer.init("imgPlayer", 500, 370);   
			</script>
			</div>
			</div>
			<div><dl>
				<dt><h4>教室说明:</h4></dt>
				<dd><ul>
				<li>教室类型：<?php echo $room.' | ' . $roomtype;?> </li>
				<li>教室座位数：<?php echo $seat;?></li>
				<li>教室考位：<?php echo $testseat;?></li>
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
				<dd><p> CPU:P4 2.6， 内存:1GB， 硬盘:160GB， OS:win 7<br />
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
		<dt><h4>教室主要设备</h4></dt>
        <dd>
			<ol>
			<li>1、 录播编辑控制台，用户通过该设备自动或手动控制附属设备协同工作，控制设备的切换、使用、参数调节；并通过该设备提供的显示、指示功能，直观的得到结果。</li>
			<li>2、 智能录播编辑机，智能剪辑，自动编辑；提供多类多组输入输出接口；自动图标、主题图像叠加；自动镜头切换、自动切换特技效果。</li>
			<li>3、 图形图像工作站，声音图像数据处理中心；对频数据编解码。</li>
			<li>4、 教师场景摄像机，拍摄主讲人的摄像机。</li>
			<li>5、 学生场景摄像机,拍摄现场听课学生全景的摄像机。</li>
			<li>6、 智能录播系统,内嵌SSV专利技术，实现1024*768分辨率、32位色流媒体编解码；音视频信号数字降噪处理；实时录制；实时直播；自动生成片头片尾；录播全程监控；提供画中画功能。支持远程语音、视频、文字交互，自动监看远程教室画面。</li>
			<li>7、 自动编辑策略系统,设定、编辑设备调度策略；可对系统输入输出设备设定自动操作模式；定义情景逻辑；根据授课课型的变化，设定相应自动编辑策略，调度协同控制系统设备工作。</li>
			<li>8、 板书摄像机组,拍摄教师的板书；</li>
			<li>9、 场景智能定位系统,自动跟踪区域内物体的移动，判别教师在区域的位置，移动的方向、速度，向主机传送位置信息。</li>
			<li>10、 多镜头覆盖系统,根据定位系统的信息，判别并调度摄像机组中的摄像机，协同工作；向智能录播编辑机传送板书摄像机信号。</li>
			<li>11、 高清晰专业采集模块（含软件）,支持视频信号1024*768分辨率采集；图像清晰度高，色彩还原好；支持笔记本XVGA信号直接介入。</li>
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