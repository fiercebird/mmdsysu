<?php
session_start();
header("Content-Type:text/html; charset=UTF-8");
include_once $_SERVER['DOCUMENT_ROOT'] . '/mmdsysu/MCISP/config/globalconfig.php';
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
				}else if(campus==30 || campus==20)
				{
					PicStr[0]="教室讲台";
					PicStr[1]="中控面板";
					PicStr[2]="教室全景";
					PicStr[3]="教室全景";
					PicStr[4]="投影设备";
				}
				PImgPlayer.addItem("<a href=# target=_blank style=color:#000;text-decoration:none;>"+PicStr[0]+"</a>", "#", "<?php echo $picpath . '01.jpg';?>");
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
        <dt><h4>教室操作说明</h4></dt>
        <dd>
              <p>
              <strong>开启：</strong><br />
          	        打开墙上的电源开关—— 多媒体控制平台电源—— 电脑开机—— 打开学生机电源、外设电源和投影机—— 双击电脑桌面数字网络语音室—— 选择课堂教学—— 选择直接进入—— 确定<br />
              <br /><strong>关闭:</strong><br />
            	    点击退出系统或右上角的╳—— 点击电脑左下角开始—— 选择关闭计算机—— 关闭学生电源，外设和投影机电源—— UPS电源—— 关墙上总电源<br />
              <br /><strong>广播教学：</strong><br />
                    打开工具栏的广播工具（字体呈现红色就表示该工具打开），此时老师戴上耳机对着话咪直接讲话，全班学生就能听到老师的声音。<br />
              <br /><strong>与某位学生对讲：</strong><br />
                    在广播工具打开时—— 打开对讲—— 点击需要对讲的某学生位置（如A1学生位），此时全班学生能听到老师与A1学生对话。如只想与该生私下对话，只需关闭广播工具。<br />
              <br /><strong>与多位学生对讲：</strong><br />
                    在广播、对讲工具打开时—— 打开小组工具—— 选择指定分组（如老师要与A1、B1、C1、D1同时对话）—— 将鼠标移至A1位置—— 同时按下鼠标左右键拖至B1，然后同时松开左右键，用同样的方法再拖至C1、D1，再点击四位学生中的任一位（学生位上出现绿色的圆圈），此时全班其它学生能听到老师与四位学生讨论的声音。<br />
              <br /><strong>分组讨论:</strong><br />
                    打开小组工具—— 选取分组方式，全班就被分成多组进行讨论，如老师想加入某一组，打开对讲工具，点击该组任一学生即可。<br />
              <br /><strong>播放本地库资料：</strong><br />
                    点击本地库—— 听读资料—— 点击某一册—— 点击某课—— 选中—— 点击异步播放或变速广播—— 点击下方的发送，学生终端即可看到文字（点回收则学生只能听到声音看不到文本）。<br />
              <br /><strong>老师把自已的课件广播给学生：</strong><br />
                    打开工具栏的PC界面工具，然后将系统界面最小化，在电脑中打开课件，学生们就可以从投影上看到课件内容。<br />
              <br /><strong>自主录音：</strong><br />
                    教师端点击自主学习进入自主学习模式—— 学生端液晶屏上出现“欢迎请按确定或录音键”按下红色录音键—— 戴上耳机把话咪拨到嘴边开始录音—— 录音完毕再次点击录音键就停止了录音—— 点击播放键可以听到刚刚录的声音<br />
              <br /><strong>查阅录音情况：</strong><br />
                    教师端进入课堂教学模式—— 本地库—— 学生录音——选择相应的座位就可能把录音播出来，广播工具打开就能示范给全班学生<br />
              <br /><strong>自主点播：</strong><br />
                    当学生端液晶屏上出现“欢迎请按确定或录音键” —— 点击确定键进入点播界面—— 通过上下光标键来选择内容—— 通过确定键进入该内容—— 最后通过确定键将内容播放出来 <br />
              </p>
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