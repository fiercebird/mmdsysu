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
	<title>课室介绍-多媒体信息服务平台</title>
	<link href="../../css/layout.css" rel="stylesheet" type="text/css" />
	<link href="../../css/screen.css" rel="stylesheet" type="text/css" />
	<script language=javascript src="../../js/md5.js"></script>
</head>


<body>
<?php
	require_once($topDir);
?>
<div id="CrIntroMain">
<?PHP 
if(!isset($_GET['CampusId']))
{
?>
	<div style="margin:40px 70px;color:#000000;line-height:150%;">
	<h6 style="text-align:center">中山大学多媒体简介</h6>
	<div>&nbsp;&nbsp; &nbsp; &nbsp;截至2012年10月，我校四个校区公共教学楼的366间课室中，有323间为多媒体课室，其中南校区72间、北校区53间、珠海校区92间、东校区106间，多媒体课室百分比为88%，从周一到周日为老师和学生提供连续全方的使用，提高了教学质量和教学效率，还提供大学英语四六级听力考试、开学毕业典礼等重大活动的技术保障工作，成为现代化教学中不可或缺的组成部分。</div><br>
	<div>
	<div>多媒体课室服务指南:</div>
	<div>1、多媒体教室统一由学校教务部门安排使用，各单位应按教务部门审定的课程表授课。&nbsp;</div>
	<div>　　申请使用多媒体课室联系电话：&nbsp;</div>
	<div>　　南校区由南校区教务综合科安排 电话：84112574   联系人：许老师</div>
	<div>　　北校区由医学教务处安排 电话：87331247   联系人：谢老师&nbsp;</div>
	<div>　　珠海校区由珠海校区教务办安排 电话： 0756-3668126  联系人：洪老师 &nbsp;</div>
	<div>　　东校区由教务处安排 电话：39332173   联系人：李老师&nbsp;</div>
	<div>2、如确有需要变动上课时间、更改多媒体课室或临时性使用多媒体课室，需提前到教务部门办理有关手续并将学校教务部门的审批单交给多媒体课室值班室的工作人员。&nbsp;</div>
	<div>&nbsp;&nbsp;&nbsp;&nbsp;多媒体课室值班室联系电话：&nbsp;</div>
	<div>&nbsp;&nbsp;&nbsp;&nbsp;南校区第一教学楼、第二教学楼 电话：84110459 联系人：卜老师&nbsp;</div>
	<div>&nbsp;&nbsp;&nbsp;&nbsp;南校区逸夫楼 电话：84115148 联系人：张老师&nbsp;</div>
	<div>&nbsp;&nbsp;&nbsp;&nbsp;南校区第三教学楼、文科楼 电话：84113453 84115676 联系人：洪老师</div>
	<div>&nbsp;&nbsp;&nbsp;&nbsp;北校区教学楼 电话： 87331669 87331626 联系人：岑老师</div>
	<div>&nbsp;&nbsp;&nbsp;&nbsp;珠海校区教学楼 电话：0756－3668187 联系人：蔡家明　</div>
	<div>&nbsp;&nbsp;&nbsp;&nbsp;东校区教学楼 电话：39332701 39332702 联系人：郑晓坤、许斌杰</div>
	<div>3、多媒体课室设备由网络与信息技术中心集中统一管理。使用多媒体课室的老师最好能在上第一节课之前来熟悉多媒体设备的操作。多媒体设备在使用过程中如遇到问题可以拨打课室里的报故障电话（电话号码写在讲桌上或电话机旁）。&nbsp;</div>
	<div>4、如果老师确实需要在多媒体课室里的电脑上安装其他软件，应提前两天与多媒体技术管理人员提出要求，且需提供安装软件。&nbsp;</div>
	<div>5、如果老师自带光盘、U盘、软盘、移动硬盘等外部存储设备，应提前一天联系多媒体技术人员测试其兼容性、安装驱动程序并确证无病毒后方可使用。</div>
	</div>
	<br>
	<br>
	<center>
	<h3>中山大学公共教学楼多媒体课室统计表</h3>
	<img  src="../../images/dev.png" style="width:800px;height:270px;border-radius:3px;">
	</center>
	<p style="font-size:13px;text-align:right;padding-right:100px;">注：统计时间：2012年10月</p>
	</div>
<?php
}else if($_GET['CampusId']==10) {
?>
<div id="REast">
        <div >
            <table class="spe" id="East_a" >
                <caption><h6>东校区A栋</h6></caption> 
                <tbody>
				<tr><th scope="col">一楼</th><th scope="col">二楼</th><th scope="col">三楼</th><th scope="col">四楼</th><th scope="col">五楼</th></tr>
                <tr>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=A101">101</a></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=A201">201</a></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=A301">301</a></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=A401">401</a></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=A501">501</a></td>
                </tr>
                <tr>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=A102">102</a></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=A202">202</a></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=A302">302</a></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=A402">402</a></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=A502">502</a></td>
                </tr>
                <tr>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=A103">103</a></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=A203">203</a></td>
                    <td class="row"><a href="#">303</a></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=A403">403</a></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=A503">503</a></td>
                </tr>
                <tr>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=A104">104</a></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=A204">204</a></td>
                    <td class="row"><a href="#">304</a></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=A404">404</a></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=A504">504</a></td>
                </tr>
                <tr>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=A105">105</a></td>
                    <td class="row"><a href="#">205</a></td>
                    <td class="row"><a href="#">305</a></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=A405">405</a></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=A505">505</a></td>
                </tr>
                <tr>
                    <td class="row"></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=A207">207</a></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=A306">306</a></td>
                    <td class="row"></td>
                    <td class="row"></td>
                </tr>
            </tbody></table>       
            <table class="spe"  id="East_b">
                <caption><h6>东校区B栋</h6></caption> 
                <tbody><tr>
                    <th scope="col">一楼</th>
                    <th scope="col">二楼</th>
                    <th scope="col">三楼</th>
                    <th scope="col">四楼</th>
                    <th scope="col">五楼</th> 
                </tr>
                <tr>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=B101">101</a></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=B201">201</a></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=B301">301</a></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=B401">401</a></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=B501">501</a></td>
                </tr>
                <tr>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=B102">102</a></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=B202">202</a></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=B302">302</a></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=B402">402</a></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=B502">502</a></td>
                </tr>
                <tr>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=B103">103</a></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=B203">203</a></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=B303">303</a></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=B403">403</a></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=B503">503</a></td>
                </tr>
                <tr>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=B104">104</a></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=B204">204</a></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=B304">304</a></td>
                    <td class="row"></td>
                    <td class="row"></td>
                </tr>
                <tr>
                    <td class="row"></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=B205">205</a></td>
                    <td class="row"></td>
                    <td class="row"></td>
                    <td class="row"></td>
                </tr>
            </tbody></table> 
			<table class="spe" id="East_c">
                <caption><h6>东校区C栋</h6></caption> 
                <tbody><tr>
                    <th scope="col">一楼</th>
                    <th scope="col">二楼</th>
                    <th scope="col">三楼</th>
                    <th scope="col">四楼</th>
                    <th scope="col">五楼</th> 
                </tr>
                <tr>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=C101">101</a></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=C201">201</a></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=C301">301</a></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=C401">401</a></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=C501">501</a></td>
                </tr>
                <tr>
                    <td class="row"><a href="C102.php?campus=10&room=C102">102</a></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=C202">202</a></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=C302">302</a></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=C402">402</a></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=C402">502</a></td>
                </tr>
                <tr>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=C103">103</a></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=C203">203</a></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=C303">303</a></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=C403">403</a></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=C503">503</a></td>
                </tr>
                <tr>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=C104">104</a></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=C204">204</a></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=C304">304</a></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=C404">404</a></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=C504">504</a></td>
                </tr>
                <tr>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=C105">105</a></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=C205">205</a></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=C305">305</a></td>
                    <td class="row"></td>
                    <td class="row"></td>
                </tr>
                <tr>
                    <td class="row"></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=C206">206</a></td>
                    <td class="row"></td>
                    <td class="row"></td>
                    <td class="row"></td>
                </tr>
			</tbody></table>			
        </div>
        <div >
            <table class="spe" id="East_d">
                <caption><h6>东校区D栋</h6></caption> 
                <tbody><tr>
                    <th scope="col">一楼</th>
                    <th scope="col">二楼</th>
                    <th scope="col">三楼</th>
                    <th scope="col">四楼</th>
                    <th scope="col">五楼</th> 
                </tr>
                <tr>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=D101">101</a></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=D201">201</a></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=D301">301</a></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=D401">401</a></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=D501">501</a></td>
                </tr>
                <tr>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=D102">102</a></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=D202">202</a></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=D302">302</a></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=D402">402</a></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=D502">502</a></td>
                </tr>
                <tr>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=D103">103</a></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=D203">203</a></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=D303">303</a></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=D403">403</a></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=D503">503</a></td>
                </tr>
                <tr>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=D104">104</a></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=D204">204</a></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=D304">304</a></td>
                    <td class="row"></td>
                    <td class="row"></td>
                </tr>
                <tr>
                    <td class="row"></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=D205">205</a></td>
                    <td class="row"></td>
                    <td class="row"></td>
                    <td class="row"></td>
                </tr>
			</tbody></table>
			<table class="spe"  id="East_e">
                <caption><h6>东校区E栋</h6></caption> 
                <tbody><tr>
                    <th scope="col">一楼</th>
                    <th scope="col">二楼</th>
                    <th scope="col">三楼</th>
                    <th scope="col">四楼</th>
                    <th scope="col">五楼</th> 
                </tr>
                <tr>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=E101">101</a></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=E201">201</a></td>
                    <td class="row"></td>
                    <td class="row"></td>
                    <td class="row"></td>
                </tr>
                <tr>
                    <td class="row"><a href="#">102</a></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=E202">202</a></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=E302">302</a></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=E402">402</a></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=E502">502</a></td>
                </tr>
                <tr>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=a103">103</a></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=E203">203</a></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=E303">303</a></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=E403">403</a></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=E503">503</a></td>
                </tr>
                <tr>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=a104">104</a></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=E204">204</a></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=E304">304</a></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=E404">404</a></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=E504">504</a></td>
                </tr>
                <tr>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=a105">105</a></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=E205">205</a></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=E305">305</a></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=E405">405</a></td>
                    <td class="row"><a href="ClassDetail.php?campus=10&room=E505">505</a></td>
                </tr>
			</tbody></table>  
        </div>
</div>

<?php
}else if($_GET['CampusId']==20) {
?>
<div id="RSouth">
        <table class="spe" id="South_1" >
            <caption><h6>南校区逸夫楼<h6></caption>
            <tbody><tr>
                <th scope="col">二楼</th>
                <th scope="col">三楼</th>
                <th scope="col">四楼</th>
                <th scope="col">五楼</th>
            </tr>
            <tr>
            <td><a href="ClassDetail.php?campus=22&room=201">201</a></td>
            <td><a href="ClassDetail.php?campus=22&room=301">301</a></td>
            <td><a href="ClassDetail.php?campus=22&room=401">401</a></td>
            <td><a href="ClassDetail.php?campus=22&room=501">501</a></td>
            </tr>
            <tr>
            <td><a href="ClassDetail.php?campus=22&room=202">202</a></td>
            <td><a href="ClassDetail.php?campus=22&room=302">302</a></td>
            <td><a href="ClassDetail.php?campus=22&room=402">402</a></td>
            <td><a href="ClassDetail.php?campus=22&room=502">502</a></td>
            </tr>
            <tr>
            <td><a href="ClassDetail.php?campus=22&room=203">203</a></td>
            <td><a href="ClassDetail.php?campus=22&room=303">303</a></td>
            <td><a href="yuyin.php?campus=22&room=403">403</a></td>
            <td><a href="yuyin.php?campus=22&room=503">503</a></td>
            </tr>
            <tr>
            <td><a href="ClassDetail.php?campus=22&room=204">204</a></td>
            <td><a href="ClassDetail.php?campus=22&room=304">304</a></td>
            <td><a href="ClassDetail.php?campus=22&room=404">404</a></td>
            <td><a href="ClassDetail.php?campus=22&room=504">504</a></td>
            </tr>
            <tr>
            <td><a href="ClassDetail.php?campus=22&room=205">205</a></td>
            <td><a href="ClassDetail.php?campus=22&room=305">305</a></td>
            <td><a href="ClassDetail.php?campus=22&room=405">405</a></td>
            <td><a href="ClassDetail.php?campus=22&room=505">505</a></td>
            </tr>
            <tr>
            <td><a href="ClassDetail.php?campus=22&room=206">206</a></td>
            <td><a href="ClassDetail.php?campus=22&room=306">306</a></td>
            <td><a href="ClassDetail.php?campus=22&room=406">406</a></td>
            <td><a href="ClassDetail.php?campus=22&room=506">506</a></td>
            </tr>
            <tr>
            <td><a href="ClassDetail.php?campus=22&room=207">207</a></td>
            <td><a href="ClassDetail.php?campus=22&room=307">307</a></td>
            <td><a href="ClassDetail.php?campus=22&room=407">407</a></td>
            <td><a href="ClassDetail.php?campus=22&room=507">507</a></td>
            </tr>
            <tr>
            <td></td>
            <td><a href="ClassDetail.php?campus=22&room=308">308</a></td>
            <td><a href="ClassDetail.php?campus=22&room=408">408</a></td>
            <td></td>
            </tr>
        </tbody></table>
        <table class="spe" id="South_2">
            <caption><h6>第一教学楼</h6></caption>
            <tbody><tr>
                <th scope="col">一楼</th>
                <th scope="col">二楼</th>
                <th scope="col">三楼</th>
                <th scope="col">四楼</th>
                <th scope="col">五楼</th>
                <th scope="col">六楼</th>
            </tr>
            <tr>
                <td><a href="ClassDetail.php?campus=21&room=1101&amp;num1=107&amp;num2=64">1101</a></td>
                <td><a href="ClassDetail.php?campus=21&room=1201&amp;num1=107&amp;num2=64">1201</a></td>
                <td><a href="ClassDetail.php?campus=21&room=1301&amp;num1=107&amp;num2=64">1301</a></td>
                <td><a href="ClassDetail.php?campus=21&room=1401&amp;num1=107&amp;num2=64">1401</a></td>
                <td><a href="ClassDetail.php?campus=21&room=1501&amp;num1=107&amp;num2=64">1501</a></td>
                <td><a href="ClassDetail.php?campus=21&room=1601&amp;num1=107&amp;num2=64">1601</a></td>
            </tr>
            <tr>
                <td><a href="ClassDetail.php?campus=21&room=1102&amp;num1=107&amp;num2=64">1102</a></td>
                <td><a href="ClassDetail.php?campus=21&room=1202&amp;num1=107&amp;num2=64">1202</a></td>
                <td><a href="ClassDetail.php?campus=21&room=1302&amp;num1=107&amp;num2=64">1302</a></td>
                <td><a href="ClassDetail.php?campus=21&room=1402&amp;num1=107&amp;num2=64">1402</a></td>
                <td><a href="ClassDetail.php?campus=21&room=1502&amp;num1=107&amp;num2=64">1502</a></td>
                <td><a href="ClassDetail.php?campus=21&room=1602&amp;num1=107&amp;num2=64">1602</a></td>
            </tr>
            <tr>
                <td><a href="ClassDetail.php?campus=21&room=1103&amp;num1=107&amp;num2=64">1103</a></td>
                <td><a href="ClassDetail.php?campus=21&room=1203&amp;num1=107&amp;num2=64">1203</a></td>
                <td><a href="ClassDetail.php?campus=21&room=1303&amp;num1=107&amp;num2=64">1303</a></td>
                <td><a href="ClassDetail.php?campus=21&room=1403&amp;num1=107&amp;num2=64">1403</a></td>
                <td><a href="ClassDetail.php?campus=21&room=1503&amp;num1=107&amp;num2=64">1503</a></td>
                <td><a href="ClassDetail.php?campus=21&room=1603&amp;num1=107&amp;num2=64">1603</a></td>
            </tr>
            <tr>
                <td><a href="ClassDetail.php?campus=21&room=1104&amp;num1=51&amp;num2=34">1104</a></td>
                <td><a href="ClassDetail.php?campus=21&room=1204&amp;num1=187&amp;num2=90">1204</a></td>
                <td><a href="ClassDetail.php?campus=21&room=1304&amp;num1=189&amp;num2=90">1304</a></td>
                <td><a href="ClassDetail.php?campus=21&room=1404&amp;num1=51&amp;num2=34">1404</a></td>
                <td><a href="ClassDetail.php?campus=21&room=1504&amp;num1=51&amp;num2=34">1504</a></td>
                <td><a href="ClassDetail.php?campus=21&room=1604&amp;num1=51&amp;num2=34">1604</a></td>
            </tr>
            <tr>
                <td><a href="ClassDetail.php?campus=21&room=1105&amp;num1=87&amp;num2=60">1105</a></td>
                <td><a href="ClassDetail.php?campus=21&room=1205&amp;num1=51&amp;num2=34">1205</a></td>
                <td><a href="ClassDetail.php?campus=21&room=1305&amp;num1=51&amp;num2=34">1305</a></td>
                <td><a href="ClassDetail.php?campus=21&room=1405&amp;num1=87&amp;num2=60">1405</a></td>
                <td><a href="ClassDetail.php?campus=21&room=1505&amp;num1=87&amp;num2=60">1505</a></td>
                <td><a href="ClassDetail.php?campus=21&room=1605&amp;num1=87&amp;num2=60">1605</a></td>
            </tr>
            <tr>
                <td><a href="ClassDetail.php?campus=21&room=1106&amp;num1=87&amp;num2=60">1106</a></td>
                <td><a href="ClassDetail.php?campus=21&room=1206&amp;num1=87&amp;num2=60">1206</a></td>
                <td><a href="ClassDetail.php?campus=21&room=1306&amp;num1=87&amp;num2=60">1306</a></td>
                <td><a href="ClassDetail.php?campus=21&room=1406&amp;num1=87&amp;num2=60">1406</a></td>
                <td><a href="ClassDetail.php?campus=21&room=1506&amp;num1=87&amp;num2=60">1506</a></td>
                <td><a href="ClassDetail.php?campus=21&room=1606&amp;num1=87&amp;num2=60">1606</a></td>
            </tr>
            <tr>
                <td></td>
                <td><a href="ClassDetail.php?campus=21&room=1207&amp;num1=87&amp;num2=60">1207</a></td>
                <td><a href="ClassDetail.php?campus=21&room=1307&amp;num1=87&amp;num2=60">1307</a></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td><a href="ClassDetail.php?campus=21&room=1208&amp;num1=189&amp;num2=120">1208</a></td>
                <td><a href="ClassDetail.php?campus=21&room=1308&amp;num1=260&amp;num2=100">1308</a></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><a href="ClassDetail.php?campus=21&room=1309&amp;num1=114&amp;num2=160">1309</a></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody></table>
        <table class="spe" id="South_3">
            <caption><h6>文科楼</h6></caption>
            <tbody><tr>
                <td><a href="#">101</a></td>
                <td><a href="#">102</a></td>
                <td><a href="#">103</a></td>
				<td><a href="#">104</a></td>
                <td><a href="#">105</a></td>
                <td><a href="#">106</a></td>
				<td><a href="#">107</a></td>
                <td><a href="ClassDetail.php?campus=24&room=108&amp;num1=194&amp;num2=90">108</a></td>
                <td><a href="#">109</a></td>
				<td><a href="#">110</a></td>
                <td><a href="#">111</a></td>
            </tr>
        </tbody></table>
		 <table class="spe" id="South_4">
            <caption><h6>第二、三教学楼</h6></caption>
            <tbody><tr>
				<td><a href="ClassDetail.php?campus=23&room=2107&amp;num1=194&amp;num2=90">二教2107</a></td>
                <td><a href="#">3103</a></td>
                <td><a href="#">3104</a></td>
				<td><a href="#">3105</a></td>
                <td><a href="#">3106</a></td>
				<td><a href="#">3107</a></td>
                <td><a href="#">3108</a></td>
				<td><a href="ClassDetail.php?campus=23&room=3109&amp;num1=194&amp;num2=90">3109</a></td>
            </tr>
        </tbody></table>
</div>
<?php
}else if($_GET['CampusId']==30) {
?>
<div id="RNorth">
	<div >
        <table class="spe"  id="North_1">
        <caption><h6>北校区教学大楼</h6></caption>
            <tbody><tr>
                <th scope="col">一楼</th>
                <th scope="col">二楼</th>
                <th scope="col">三楼</th>
                <th scope="col">四楼</th>
                <th scope="col">五楼</th>
                <th scope="col">六楼</th>
                <th scope="col">七楼</th>
            </tr>
            <tr>
                <td><a href="ClassDetail.php?campus=30&room=101&amp;num1=270&amp;computer=联想启天M7150（Q9550/2G/500G/17）&amp;ty=EPSON液晶投影机&amp;zk=来同中控&amp;rj=WINXP/OFFICE2003或OFFICE2007/暴风影音/360安全卫士等">101</a></td>
                <td><a href="ClassDetail.php?campus=30&room=102&amp;num1=270&amp;computer=联想启天M7150（Q9550/2G/500G/17）&amp;ty=EPSON液晶投影机&amp;zk=来同中控&amp;rj=WINXP/OFFICE2003或OFFICE2007/暴风影音/360安全卫士等">201</a></td>
                <td><a href="ClassDetail.php?campus=30&room=301&amp;num1=270&amp;computer=联想启天M7150（Q9550/2G/500G/17）&amp;ty=EPSON液晶投影机&amp;zk=来同中控&amp;rj=WINXP/OFFICE2003或OFFICE2007/暴风影音/360安全卫士等">301</a></td>
                <td><a href="ClassDetail.php?campus=30&room=401&amp;num1=270&amp;computer=联想启天M7150（Q9550/2G/500G/17）&amp;ty=EPSON液晶投影机&amp;zk=来同中控&amp;rj=WINXP/OFFICE2003或OFFICE2007/暴风影音/360安全卫士等">401</a></td>
                <td><a href="ClassDetail.php?campus=30&room=501&amp;num1=270&amp;computer=联想启天M7150（Q9550/2G/500G/17）&amp;ty=EPSON液晶投影机&amp;zk=来同中控&amp;rj=WINXP/OFFICE2003或OFFICE2007/暴风影音/360安全卫士等">501</a></td>
                <td><a href="ClassDetail.php?campus=30&room=601&amp;num1=270&amp;computer=联想启天M7150（Q9550/2G/500G/17）&amp;ty=EPSON液晶投影机&amp;zk=来同中控&amp;rj=WINXP/OFFICE2003或OFFICE2007/暴风影音/360安全卫士等">601</a></td>
                <td></td>
            </tr>
            <tr>
                <td><a href="ClassDetail.php?campus=30&room=102&amp;num1=84&amp;computer=联想启天M7150（Q9550/2G/500G/19）&amp;ty=EPSON液晶投影机&amp;zk=来同中控&amp;rj=WINXP/OFFICE2003或OFFICE2007/暴风影音/360安全卫士等">102</a></td>
                <td><a href="ClassDetail.php?campus=30&room=202&amp;num1=84&amp;computer=联想启天M7150（Q9550/2G/500G/17）&amp;ty=EPSON液晶投影机&amp;zk=来同中控&amp;rj=WINXP/OFFICE2003或OFFICE2007/暴风影音/360安全卫士等">202</a></td>
                <td><a href="ClassDetail.php?campus=30&room=302&amp;num1=84&amp;computer=联想启天M7150（Q9550/2G/500G/17）&amp;ty=EPSON液晶投影机&amp;zk=来同中控&amp;rj=WINXP/OFFICE2003或OFFICE2007/暴风影音/360安全卫士等">302</a></td>
                <td><a href="ClassDetail.php?campus=30&room=402&amp;num1=84&amp;computer=联想启天M7150（Q9550/2G/500G/17）&amp;ty=EPSON液晶投影机&amp;zk=来同中控&amp;rj=WINXP/OFFICE2003或OFFICE2007/暴风影音/360安全卫士等">402</a></td>
                <td><a href="ClassDetail.php?campus=30&room=502&amp;num1=84&amp;computer=联想启天M7150（Q9550/2G/500G/17）&amp;ty=EPSON液晶投影机&amp;zk=来同中控&amp;rj=WINXP/OFFICE2003或OFFICE2007/暴风影音/360安全卫士等">502</a></td>
                <td><a href="ClassDetail.php?campus=30&room=602&amp;num1=84&amp;computer=联想启天M8000（E4600/1G/160G/19）&amp;ty=EPSON液晶投影机&amp;zk=来同中控&amp;rj=WINXP/OFFICE2003或OFFICE2007/暴风影音/360安全卫士等">602</a></td>
                <td><a href="ClassDetail.php?campus=30&room=702&amp;num1=84&amp;computer=联想启天M8000（E4600/1G/160G/19）&amp;ty=EPSON液晶投影机&amp;zk=来同中控&amp;rj=WINXP/OFFICE2003或OFFICE2007/暴风影音/360安全卫士等">702</a></td>
            </tr>
            <tr>
                <td></td>
                <td><a href="ClassDetail.php?campus=30&room=203&amp;num1=84&amp;computer=联想启天M7150（Q9550/2G/500G/17）&amp;ty=EPSON液晶投影机&amp;zk=来同中控&amp;rj=WINXP/OFFICE2003或OFFICE2007/暴风影音/360安全卫士等">203</a></td>
                <td><a href="ClassDetail.php?campus=30&room=303&amp;num1=84&amp;computer=联想启天M7150（Q9550/2G/500G/17）&amp;ty=EPSON液晶投影机&amp;zk=来同中控&amp;rj=WINXP/OFFICE2003或OFFICE2007/暴风影音/360安全卫士等">303</a></td>
                <td><a href="ClassDetail.php?campus=30&room=403&amp;num1=84&amp;computer=联想启天M7150（Q9550/2G/500G/17）&amp;ty=EPSON液晶投影机&amp;zk=来同中控&amp;rj=WINXP/OFFICE2003或OFFICE2007/暴风影音/360安全卫士等">403</a></td>
                <td><a href="ClassDetail.php?campus=30&room=503&amp;num1=84&amp;computer=联想启天M8000（E4600/1G/160G/19）&amp;ty=EPSON液晶投影机&amp;zk=来同中控&amp;rj=WINXP/OFFICE2003或OFFICE2007/暴风影音/360安全卫士等">503</a></td>
                <td><a href="ClassDetail.php?campus=30&room=603&amp;num1=84&amp;computer=联想启天M8000（E4600/1G/160G/19）&amp;ty=EPSON液晶投影机&amp;zk=来同中控&amp;rj=WINXP/OFFICE2003或OFFICE2007/暴风影音/360安全卫士等">603</a></td>
                <td><a href="ClassDetail.php?campus=30&room=703&amp;num1=84&amp;computer=联想启天M8000（E4600/1G/160G/19）&amp;ty=EPSON液晶投影机&amp;zk=来同中控&amp;rj=WINXP/OFFICE2003或OFFICE2007/暴风影音/360安全卫士等">703</a></td>
            </tr>
            <tr>
                <td><a href="ClassDetail.php?campus=30&room=104&amp;num1=84&amp;computer=联想启天M7150（Q9550/2G/500G/19）&amp;ty=EPSON液晶投影机&amp;zk=来同中控&amp;rj=WINXP/OFFICE2003或OFFICE2007/暴风影音/360安全卫士等">104</a></td>
                <td><a href="ClassDetail.php?campus=30&room=204&amp;num1=84&amp;computer=联想启天M7150（Q9550/2G/500G/17）&amp;ty=EPSON液晶投影机&amp;zk=来同中控&amp;rj=WINXP/OFFICE2003或OFFICE2007/暴风影音/360安全卫士等">204</a></td>
                <td><a href="ClassDetail.php?campus=30&room=304&amp;num1=84&amp;computer=联想启天M7150（Q9550/2G/500G/17）&amp;ty=EPSON液晶投影机&amp;zk=来同中控&amp;rj=WINXP/OFFICE2003或OFFICE2007/暴风影音/360安全卫士等">304</a></td>
                <td><a href="ClassDetail.php?campus=30&room=404&amp;num1=84&amp;computer=联想启天M7150（Q9550/2G/500G/17）&amp;ty=EPSON液晶投影机&amp;zk=来同中控&amp;rj=WINXP/OFFICE2003或OFFICE2007/暴风影音/360安全卫士等">404</a></td>
                <td><a href="ClassDetail.php?campus=30&room=504&amp;num1=84&amp;computer=联想启天M8000（E4600/1G/160G/19）&amp;ty=EPSON液晶投影机&amp;zk=来同中控&amp;rj=WINXP/OFFICE2003或OFFICE2007/暴风影音/360安全卫士等">504</a></td>
                <td><a href="ClassDetail.php?campus=30&room=604&amp;num1=84&amp;computer=联想启天M8000（E4600/1G/160G/19）&amp;ty=EPSON液晶投影机&amp;zk=来同中控&amp;rj=WINXP/OFFICE2003或OFFICE2007/暴风影音/360安全卫士等">604</a></td>
                <td><a href="ClassDetail.php?campus=30&room=704&amp;num1=84&amp;computer=联想启天M8000（E4600/1G/160G/19）&amp;ty=EPSON液晶投影机&amp;zk=来同中控&amp;rj=WINXP/OFFICE2003或OFFICE2007/暴风影音/360安全卫士等">704</a></td>
            </tr>
            <tr>
                <td></td>
                <td><a href="ClassDetail.php?campus=30&room=205&amp;num1=149&amp;computer=联想启天M7150（Q9550/2G/500G/17）&amp;ty=EPSON液晶投影机&amp;zk=来同中控&amp;rj=WINXP/OFFICE2003或OFFICE2007/暴风影音/360安全卫士等">205</a></td>
                <td><a href="ClassDetail.php?campus=30&room=305&amp;num1=149&amp;computer=联想启天M7150（Q9550/2G/500G/17）&amp;ty=EPSON液晶投影机&amp;zk=来同中控&amp;rj=WINXP/OFFICE2003或OFFICE2007/暴风影音/360安全卫士等">305</a></td>
                <td><a href="ClassDetail.php?campus=30&room=405&amp;num1=149&amp;computer=联想启天M7150（Q9550/2G/500G/17）&amp;ty=EPSON液晶投影机&amp;zk=来同中控&amp;rj=WINXP/OFFICE2003或OFFICE2007/暴风影音/360安全卫士等">405</a></td>
                <td><a href="ClassDetail.php?campus=30&room=505&amp;num1=149&amp;computer=联想启天M7150（Q9550/2G/500G/17）&amp;ty=EPSON液晶投影机&amp;zk=来同中控&amp;rj=WINXP/OFFICE2003或OFFICE2007/暴风影音/360安全卫士等">505</a></td>
                <td><a href="ClassDetail.php?campus=30&room=605&amp;num1=149&amp;computer=联想启天M7150（Q9550/2G/500G/17）&amp;ty=EPSON液晶投影机&amp;zk=来同中控&amp;rj=WINXP/OFFICE2003或OFFICE2007/暴风影音/360安全卫士等">605</a></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td><a href="ClassDetail.php?campus=30&room=206&amp;num1=90&amp;computer=联想启天M8000（E4600/1G/160G/19）&amp;ty=EPSON液晶投影机&amp;zk=来同中控&amp;rj=WINXP/OFFICE2003或OFFICE2007/暴风影音/360安全卫士等">206</a></td>
                <td><a href="ClassDetail.php?campus=30&room=306&amp;num1=90&amp;computer=HP DX2818（E8400/2G/250G/19）&amp;ty=EPSON液晶投影机&amp;zk=来同中控&amp;rj=WINXP/OFFICE2003或OFFICE2007/暴风影音/360安全卫士等">306</a></td>
                <td><a href="ClassDetail.php?campus=30&room=406&amp;num1=90&amp;computer=联想启天M8000（E4600/1G/160G/19）&amp;ty=EPSON液晶投影机&amp;zk=来同中控&amp;rj=WINXP/OFFICE2003或OFFICE2007/暴风影音/360安全卫士等">406</a></td>
                <td><a href="ClassDetail.php?campus=30&room=506&amp;num1=90&amp;computer=HP DX2818（E8400/2G/250G/19）&amp;ty=EPSON液晶投影机&amp;zk=来同中控&amp;rj=WINXP/OFFICE2003或OFFICE2007/暴风影音/360安全卫士等">506</a></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><a href="ClassDetail.php?campus=30&room=307&amp;num1=90&amp;computer=HP DX2818（E8400/2G/250G/19）&amp;ty=EPSON液晶投影机&amp;zk=来同中控&amp;rj=WINXP/OFFICE2003或OFFICE2007/暴风影音/360安全卫士等">307</a></td>
                <td><a href="ClassDetail.php?campus=30&room=407&amp;num1=90&amp;computer=联想启天M8000（E4600/1G/160G/19）&amp;ty=EPSON液晶投影机&amp;zk=来同中控&amp;rj=WINXP/OFFICE2003或OFFICE2007/暴风影音/360安全卫士等">407</a></td>
                <td><a href="ClassDetail.php?campus=30&room=507&amp;num1=90&amp;computer=HP DX2818（E8400/2G/250G/19）&amp;ty=EPSON液晶投影机&amp;zk=来同中控&amp;rj=WINXP/OFFICE2003或OFFICE2007/暴风影音/360安全卫士等">507</a></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><a href="ClassDetail.php?campus=30&room=308&amp;num1=90&amp;computer=HP DX2818（E8400/2G/250G/19）&amp;ty=EPSON液晶投影机&amp;zk=来同中控&amp;rj=WINXP/OFFICE2003或OFFICE2007/暴风影音/360安全卫士等">308</a></td>
                <td></td>
                <td><a href="ClassDetail.php?campus=30&room=508&amp;num1=90&amp;computer=HP DX2818（E8400/2G/250G/19）&amp;ty=EPSON液晶投影机&amp;zk=来同中控&amp;rj=WINXP/OFFICE2003或OFFICE2007/暴风影音/360安全卫士等">508</a></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><a href="ClassDetail.php?campus=30&room=309&amp;num1=91&amp;computer=HP DX2818（E8400/2G/250G/19）&amp;ty=EPSON液晶投影机&amp;zk=来同中控&amp;rj=WINXP/OFFICE2003或OFFICE2007/暴风影音/360安全卫士等">309</a></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody></table>
        <table class="spe" id="North_2">
            <caption><h6>北校区其他教室</h6></caption>
            <tbody><tr>
                <th>寄生虫楼</th>
                <th>何母楼</th>
                <th>永生楼</th>
                <th>南课室楼</th>
                <th>北课室楼</th>
                <th>法医楼</th>
            </tr>
            <tr>
                <td><a href="ClassDetail.php?campus=30&room=1&amp;flag=2&amp;num1=240&amp;computer=联想启天M8000（E4600/1G/160G/19）&amp;ty=爱琪液晶投影机&amp;zk=来同中控&amp;rj=WINXP/OFFICE2003或OFFICE2007/暴风影音/360安全卫士等">第1课室</a></td>
                <td><a href="ClassDetail.php?campus=30&room=3&amp;flag=2&amp;num1=213&amp;computer=联想启天M8000（E4600/1G/160G/19）&amp;ty=爱琪液晶投影机&amp;zk=来同中控&amp;rj=WINXP/OFFICE2003或OFFICE2007/暴风影音/360安全卫士等">第3课室</a></td>
                <td><a href="ClassDetail.php?campus=30&room=7&amp;flag=2&amp;num1=225&amp;computer=联想启天M7150（Q9550/2G/500G/19）&amp;ty=爱琪液晶投影机&amp;zk=来同中控&amp;rj=WINXP/OFFICE2003或OFFICE2007/暴风影音/360安全卫士等">第7课室</a></td>
                <td><a href="ClassDetail.php?campus=30&room=8&amp;flag=2&amp;num1=224&amp;computer=	联想启天M8000（E4600/1G/160G/19））&amp;ty=爱琪液晶投影机&amp;zk=来同中控&amp;rj=WINXP/OFFICE2003或OFFICE2007/暴风影音/360安全卫士等">第8课室</a></td>
                <td><a href="ClassDetail.php?campus=30&room=13&amp;flag=2&amp;num1=184&amp;computer=	联想启天M8000（E4600/1G/160G/19）&amp;ty=爱琪液晶投影机&amp;zk=来同中控&amp;rj=WINXP/OFFICE2003或OFFICE2007/暴风影音/360安全卫士等">第13课室</a></td>
                <td><a href="ClassDetail.php?campus=30&room=24&amp;flag=2&amp;num1=80&amp;computer=	联想启天M8000（E4600/1G/160G/19）&amp;ty=爱琪液晶投影机&amp;zk=来同中控&amp;rj=WINXP/OFFICE2003或OFFICE2007/暴风影音/360安全卫士等">第24课室</a></td>
            </tr>
            <tr>
                <td><a href="ClassDetail.php?campus=30&room=2&amp;flag=2&amp;num1=240&amp;computer=联想启天M8000（E4600/1G/160G/19）&amp;ty=爱琪液晶投影机&amp;zk=来同中控&amp;rj=WINXP/OFFICE2003或OFFICE2007/暴风影音/360安全卫士等">第2课室</a></td>
                <td></td>
                <td></td>
                <td><a href="ClassDetail.php?campus=30&room=9&amp;flag=2&amp;num1=224&amp;computer=	联想启天M8000（E4600/1G/160G/19）&amp;ty=爱琪液晶投影机&amp;zk=来同中控&amp;rj=WINXP/OFFICE2003或OFFICE2007/暴风影音/360安全卫士等">第9课室</a></td>
                <td><a href="ClassDetail.php?campus=30&room=14&amp;flag=2&amp;num1=184&amp;computer=	联想启天M8000（E4600/1G/160G/19）&amp;ty=爱琪液晶投影机&amp;zk=来同中控&amp;rj=WINXP/OFFICE2003或OFFICE2007/暴风影音/360安全卫士等">第14课室</a></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td><a href="ClassDetail.php?campus=30&room=11&amp;flag=2&amp;num1=270&amp;computer=	联想启天M8000（E4600/1G/160G/19）&amp;ty=爱琪液晶投影机&amp;zk=来同中控&amp;rj=WINXP/OFFICE2003或OFFICE2007/暴风影音/360安全卫士等">第11课室</a></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td><a href="ClassDetail.php?campus=30&room=12&amp;flag=2&amp;num1=198&amp;computer=	联想启天M8000（E4600/1G/160G/19）&amp;ty=爱琪液晶投影机&amp;zk=来同中控&amp;rj=WINXP/OFFICE2003或OFFICE2007/暴风影音/360安全卫士等">第12课室</a></td>
                <td></td>
                <td></td>
            </tr>
        </tbody></table>
    </div>

</div>
<?php
}else if($_GET['CampusId']==40) {
?>
<div id="RZhuHai">

	<div id="ZhuHaiLeft">
        <table class="spe"  id="ZhuHai_b">
                <caption><h6>珠海校区B栋</h6></caption>
                <tbody><tr>
                    <th>二楼</th>
                    <th>三楼</th>
                    <th>四楼</th>
                    <th>五楼</th>
                </tr>
                <tr>
                    <td><a href="ClassDetail.php?campus=40&room=B201&amp;num1=185&amp;num2=101&amp;computer=HP DX2818（配置E8400/2G/250G/19）&amp;ty=EPSON液晶投影机&amp;zk=MC820&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">B201</a></td>
                    <td><a href="ClassDetail.php?campus=40&room=B301&amp;num1=195&amp;num2=107&amp;computer=HP DX2818（配置E8400/2G/250G/19）&amp;ty=EPSON液晶投影机&amp;zk=MC820&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">B301</a></td>
                    <td><a href="ClassDetail.php?campus=40&room=B401&amp;num1=195&amp;num2=107&amp;computer=HP PRO 2080（配置Q9500/2G/500G）&amp;ty=EPSON液晶投影机&amp;zk=MC820&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">B401</a></td>
                    <td><a href="ClassDetail.php?campus=40&room=B503&amp;num1=267&amp;num2=141&amp;computer=联想M8000（配置E4600/1G/250G）&amp;ty=EPSON液晶投影机&amp;zk=MC820&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">B503</a></td>
                </tr>
                <tr>
                    <td><a href="ClassDetail.php?campus=40&room=B203&amp;num1=281&amp;num2=147&amp;computer= HP DX2818（配置E8400/2G/250G/19）&amp;ty=EPSON液晶投影机&amp;zk=MC820&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">B203</a></td>
                    <td><a href="ClassDetail.php?campus=40&room=B303&amp;num1=260&amp;num2=137&amp;computer=HP DX2818（配置E8400/2G/250G/19）&amp;ty=EPSON液晶投影机&amp;zk=MC820&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">B303</a></td>
                    <td><a href="ClassDetail.php?campus=40&room=B413&amp;num1=159&amp;num2=88&amp;computer=HP DX2818（配置E8400/2G/250G/19）&amp;ty=EPSON液晶投影机&amp;zk=MC820&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">B413</a></td>
                    <td><a href="ClassDetail.php?campus=40&room=B509&amp;num1=159&amp;num2=88&amp;computer=联想启天M7150（配置Q9500/2G/500G）&amp;ty=EPSON液晶投影机&amp;zk=MC820&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">B509</a></td>
                </tr>
                <tr>
                    <td><a href="ClassDetail.php?campus=40&room=B208&amp;num1=60&amp;num2=30&amp;computer=联想M7150（配置Q9500/2G/500G）&amp;ty=EPSON液晶投影机&amp;zk=YX100&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">B208</a></td>
                    <td><a href="ClassDetail.php?campus=40&room=B208&amp;num1=60&amp;num2=30&amp;computer=联想M7150（配置Q9500/2G/500G）&amp;ty=EPSON液晶投影机&amp;zk=YX100&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">B308</a></td>
                    <td></td>
                    <td><a href="ClassDetail.php?campus=40&room=B511&amp;num1=159&amp;num2=88&amp;computer=联想启天M7150（配置Q9500/2G/500G）&amp;ty=EPSON液晶投影机&amp;zk=MC820&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">B511</a></td>
                </tr>
                <tr>
                    <td><a href="ClassDetail.php?campus=40&room=B209&amp;num1=172&amp;num2=95&amp;computer= HP DX2818（配置E8400/2G/250G/19）&amp;ty=EPSON液晶投影机&amp;zk=MC820&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">B209</a></td>
                    <td><a href="ClassDetail.php?campus=40&room=B309&amp;num1=159&amp;num2=88&amp;computer=HP DX2818（配置E8400/2G/250G/19）&amp;ty=EPSON液晶投影机&amp;zk=MC820&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">B309</a></td>
                    <td></td>
                    <td><a href="ClassDetail.php?campus=40&room=B513&amp;num1=159&amp;num2=88&amp;computer=联想启天M7150（配置Q9500/2G/500G）&amp;ty=EPSON液晶投影机&amp;zk=YX5000&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">B513</a></td>
                </tr>
                <tr>
                    <td><a href="ClassDetail.php?campus=40&room=B210&amp;num1=60&amp;num2=30&amp;computer=联想M7150（配置Q9500/2G/500G）&amp;ty=EPSON液晶投影机&amp;zk=YX100&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">B210</a></td>
                    <td><a href="ClassDetail.php?campus=40&room=B310&amp;num1=60&amp;num2=30&amp;computer=联想M7150（配置Q9500/2G/500G）&amp;ty=EPSON液晶投影机&amp;zk=YX100&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">B310</a></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><a href="ClassDetail.php?campus=40&room=B211&amp;num1=172&amp;num2=95&amp;computer= HP DX2818（配置E8400/2G/250G/19）&amp;ty=EPSON液晶投影机&amp;zk=MC820&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">B211</a></td>
                    <td><a href="ClassDetail.php?campus=40&room=B311&amp;num1=159&amp;num2=88&amp;computer=HP DX2818（配置E8400/2G/250G/19）&amp;ty=EPSON液晶投影机&amp;zk=MC820&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">B311</a></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><a href="ClassDetail.php?campus=40&room=B212&amp;num1=60&amp;num2=30&amp;computer=联想M7150（配置Q9500/2G/500G）&amp;ty=EPSON液晶投影机&amp;zk=YX100&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">B212</a></td>
                    <td><a href="ClassDetail.php?campus=40&room=B312&amp;num1=60&amp;num2=30&amp;computer=联想M7150（配置Q9500/2G/500G）&amp;ty=EPSON液晶投影机&amp;zk=YX100&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">B312</a></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><a href="ClassDetail.php?campus=40&room=B213&amp;num1=172&amp;num2=95&amp;computer= HP DX2818（配置E8400/2G/250G/19）&amp;ty=EPSON液晶投影机&amp;zk=MC820&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">B213</a></td>
                    <td><a href="ClassDetail.php?campus=40&room=B313&amp;num1=159&amp;num2=88&amp;computer=HP DX2818（配置E8400/2G/250G/19）&amp;ty=EPSON液晶投影机&amp;zk=MC820&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">B313</a></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><a href="ClassDetail.php?campus=40&room=B214&amp;num1=60&amp;num2=30&amp;computer=联想M7150（配置Q9500/2G/500G）&amp;ty=EPSON液晶投影机&amp;zk=YX100&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">B214</a></td>
                    <td><a href="ClassDetail.php?campus=40&room=B314&amp;num1=60&amp;num2=30&amp;computer=联想M7150（配置Q9500/2G/500G）&amp;ty=EPSON液晶投影机&amp;zk=YX100&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">B314</a></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><a href="ClassDetail.php?campus=40&room=B216&amp;num1=60&amp;num2=30&amp;computer=联想M7150（配置Q9500/2G/500G）&amp;ty=EPSON液晶投影机&amp;zk=YX100&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">B216</a></td>
                    <td><a href="ClassDetail.php?campus=40&room=B316&amp;num1=60&amp;num2=30&amp;computer=联想M7150（配置Q9500/2G/500G）&amp;ty=EPSON液晶投影机&amp;zk=YX100&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">B316</a></td>
                    <td></td>
                    <td></td>
                </tr>
         </tbody></table>
		  <table class="spe"  id="ZhuHai_d">
                <caption><h6>珠海校区D栋</h6></caption>
                <tbody><tr>
                    <th>二楼</th>
                    <th>三楼</th>
                    <th>四楼</th>
                    <th>五楼</th>
                </tr>
                <tr>
                    <td><a href="ClassDetail.php?campus=40&room=D201&amp;num1=281&amp;num2=147&amp;computer=联想启天M7150（配置Q9500/2G/500G））&amp;ty=EPSON液晶投影机&amp;zk=MC820&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">D201</a></td>
                    <td><a href="ClassDetail.php?campus=40&room=D301&amp;num1=267&amp;num2=141&amp;computer=联想M7150（配置Q9500/2G/500G）&amp;ty=EPSON液晶投影机&amp;zk=MC820&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">D301</a></td>
                    <td><a href="ClassDetail.php?campus=40&room=D407&amp;num1=195&amp;num2=107&amp;computer=联想M8000（配置E4600/1G/250G）&amp;ty=EPSON液晶投影机&amp;zk=MC820&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">D407</a></td>
                    <td><a href="ClassDetail.php?campus=40&room=D501&amp;num1=267&amp;num2=141&amp;computer=联想M7150（配置Q9500/2G/500G）&amp;ty=EPSON液晶投影机&amp;zk=MC820&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">D501</a></td>
                </tr>
                <tr>
                    <td><a href="ClassDetail.php?campus=40&room=D204&amp;num1=60&amp;num2=30&amp;computer=联想M7150（配置Q9500/2G/500G）&amp;ty=数字投影机&amp;zk=YX100&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">D204</a></td>
                    <td><a href="ClassDetail.php?campus=40&room=D304&amp;num1=60&amp;num2=30&amp;computer=联想M7150（配置Q9500/2G/500G）&amp;ty=数字投影机&amp;zk=YX100&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">D304</a></td>
                    <td><a href="ClassDetail.php?campus=40&room=D409&amp;num1=185&amp;num2=99&amp;computer=联想M7150（配置Q9500/2G/500G&amp;ty=EPSON液晶投影机&amp;zk=MC820&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">D409</a></td>
                    <td></td>
                </tr>
                <tr>
                    <td><a href="ClassDetail.php?campus=40&room=D206&amp;num1=60&amp;num2=30&amp;computer=联想M7150（配置Q9500/2G/500G）&amp;ty=数字投影机&amp;zk=YX100&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">D206</a></td>
                    <td><a href="ClassDetail.php?campus=40&room=D306&amp;num1=60&amp;num2=30&amp;computer=联想M7150（配置Q9500/2G/500G）&amp;ty=数字投影机&amp;zk=YX100&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">D306</a></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><a href="ClassDetail.php?campus=40&room=D207&amp;num1=185&amp;num2=101&amp;computer=联想启天M8000（配置 E4600/1G/250G）&amp;ty=EPSON液晶投影机&amp;zk=MC820&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">D207</a></td>
                    <td><a href="ClassDetail.php?campus=40&room=D307&amp;num1=195&amp;num2=107&amp;computer=联想启天M7150（配置Q9500/2G/500G）&amp;ty=EPSON液晶投影机&amp;zk=MC820&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">D307</a></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><a href="ClassDetail.php?campus=40&room=D208&amp;num1=60&amp;num2=30&amp;computer=联想M7150（配置Q9500/2G/500G）&amp;ty=EPSON液晶投影机&amp;zk=YX100&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">D208</a></td>
                    <td><a href="ClassDetail.php?campus=40&room=D308&amp;num1=60&amp;num2=30&amp;computer=联想M7150（配置Q9500/2G/500G）&amp;ty=EPSON液晶投影机&amp;zk=YX100&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">D308</a></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><a href="ClassDetail.php?campus=40&room=D209&amp;num1=185&amp;num2=101&amp;computer=联想启天 M7150（配置Q9500/2G/500G）&amp;ty=EPSON液晶投影机&amp;zk=MC820&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">D209</a></td>
                    <td><a href="ClassDetail.php?campus=40&room=D309">D309</a></td>
                    <td></td>
                    <td></td>
                </tr>
         </tbody></table>
		 </div>
		 
		 
		<div  id="ZhuHaiRight">
		 <table class="spe" id="ZhuHai_c">
                <caption><h6>珠海校区C栋</h6></caption>
                <tbody><tr>
                    <th>二楼</th>
                    <th>三楼</th>
                    <th>四楼</th>
                    <th>五楼</th>
                </tr>
                <tr>
                    <td><a href="ClassDetail.php?campus=40&room=C201&amp;num1=281&amp;num2=147&amp;computer=联想启天M7150（配置Q9500/2G/500G) &amp;ty=EPSON液晶投影机&amp;zk=MC820&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">C201</a></td>
                    <td><a href="ClassDetail.php?campus=40&room=C301&amp;num1=267&amp;num2=141&amp;computer=联想M7150（配置Q9500/2G/500G）&amp;ty=EPSON液晶投影机&amp;zk=MC820&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">C301</a></td>
                    <td><a href="ClassDetail.php?campus=40&room=C402&amp;num1=60&amp;num2=30&amp;computer=联想M8000（配置E4600/1G/250G）&amp;ty=EPSON液晶投影机&amp;zk=YX5000&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">C402</a></td>
                    <td><a href="ClassDetail.php?campus=40&room=C501&amp;num1=267&amp;num2=141&amp;computer=联想M7150（配置Q9500/2G/500G）&amp;ty=EPSON液晶投影机&amp;zk=MC820&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">C501</a></td>
                </tr>
                <tr>
                    <td><a href="ClassDetail.php?campus=40&room=C202&amp;num1=60&amp;num2=30&amp;computer=联想M8000（配置E4600/1G/250G）&amp;ty=数字投影机&amp;zk=YX5000&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">C202</a></td>
                    <td><a href="ClassDetail.php?campus=40&room=C302&amp;num1=60&amp;num2=30&amp;computer=联想M8000（配置E4600/1G/250G）&amp;ty=EPSON液晶投影机&amp;zk=YX5000&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">C302</a></td>
                    <td><a href="ClassDetail.php?campus=40&room=C403&amp;num1=159&amp;num2=88&amp;computer=联想启天M7150（配置Q9500/2G/500G）&amp;ty=EPSON液晶投影机&amp;zk=MC820&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">C403</a></td>
                    <td><a href="ClassDetail.php?campus=40&room=C502&amp;num1=60&amp;num2=30&amp;computer=联想M8000（配置E4600/1G/250G）&amp;ty=EPSON液晶投影机&amp;zk=YX5000&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">C502</a></td>
                </tr>
                <tr>
                    <td><a href="ClassDetail.php?campus=40&room=C203&amp;num1=172&amp;num2=95&amp;computer=联想启天M7150（配置Q9500/2G/500G）&amp;ty=EPSON液晶投影机&amp;zk=MC820&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">C203</a></td>
                    <td><a href="ClassDetail.php?campus=40&room=C303&amp;num1=172&amp;num2=95&amp;computer=联想启天M7150（配置Q9500/2G/500G）&amp;ty=EPSON液晶投影机&amp;zk=MC820&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">C303</a></td>
                    <td><a href="ClassDetail.php?campus=40&room=C405&amp;num1=159&amp;num2=88&amp;computer=联想启天M7150（配置Q9500/2G/500G）&amp;ty=EPSON液晶投影机&amp;zk=MC820&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">C405</a></td>
                    <td><a href="ClassDetail.php?campus=40&room=C503&amp;num1=159&amp;num2=88&amp;computer=联想启天M7150（配置Q9500/2G/500G）&amp;ty=EPSON液晶投影机&amp;zk=YX5000&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">C503</a></td>
                </tr>
                <tr>
                    <td><a href="ClassDetail.php?campus=40&room=C205&amp;num1=159&amp;num2=88&amp;computer=联想启天M7150（配置Q9500/2G/500G）&amp;ty=EPSON液晶投影机&amp;zk=MC820&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">C205</a></td>
                    <td><a href="ClassDetail.php?campus=40&room=C305&amp;num1=159&amp;num2=88&amp;computer=联想启天M7150（配置Q9500/2G/500G）&amp;ty=EPSON液晶投影机&amp;zk=MC820&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">C305</a></td>
                    <td><a href="ClassDetail.php?campus=40&room=C407&amp;num1=159&amp;num2=88&amp;computer=联想启天M7150（配置Q9500/2G/500G）&amp;ty=EPSON液晶投影机&amp;zk=MC820&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">C407</a></td>
                    <td><a href="ClassDetail.php?campus=40&room=C505&amp;num1=159&amp;num2=88&amp;computer=联想启天M7150（配置Q9500/2G/500G）&amp;ty=EPSON液晶投影机&amp;zk=YX5000&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">C505</a></td>
                </tr>
                <tr>
                    <td><a href="ClassDetail.php?campus=40&room=C207&amp;num1=172&amp;num2=95&amp;computer=联想启天M7150（配置Q9500/2G/500G）&amp;ty=EPSON液晶投影机&amp;zk=MC820&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">C207</a></td>
                    <td><a href="ClassDetail.php?campus=40&room=C307&amp;num1=172&amp;num2=95&amp;computer=联想启天M7150（配置Q9500/2G/500G）&amp;ty=EPSON液晶投影机&amp;zk=MC820&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">C307</a></td>
                    <td><a href="ClassDetail.php?campus=40&room=C408&amp;num1=60&amp;num2=30&amp;computer=联想M8000（配置E4600/1G/250G）&amp;ty=EPSON液晶投影机&amp;zk=YX5000&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">C408</a></td>
                    <td><a href="ClassDetail.php?campus=40&room=C507&amp;num1=159&amp;num2=88&amp;computer=联想启天M7150（配置Q9500/2G/500G）&amp;ty=EPSON液晶投影机&amp;zk=YX5000&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">C507</a></td>
                </tr>
                <tr>
                    <td><a href="ClassDetail.php?campus=40&room=C208&amp;num1=60&amp;num2=30&amp;computer=联想M8000（配置E4600/1G/250G）&amp;ty=数字投影机&amp;zk=YX5000&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">C208</a></td>
                    <td><a href="ClassDetail.php?campus=40&room=C310&amp;num1=60&amp;num2=30&amp;computer=联想M8000（配置E4600/1G/250G）&amp;ty=EPSON液晶投影机&amp;zk=YX5000&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">C310</a></td>
                    <td><a href="ClassDetail.php?campus=40&room=C410&amp;num1=60&amp;num2=30&amp;computer=联想M8000（配置E4600/1G/250G）&amp;ty=EPSON液晶投影机&amp;zk=YX5000&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">C410</a></td>
                    <td><a href="ClassDetail.php?campus=40&room=C508&amp;num1=60&amp;num2=30&amp;computer=联想M8000（配置E4600/1G/250G）&amp;ty=EPSON液晶投影机&amp;zk=YX5000&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">C508</a></td>
                </tr>
                <tr>
                    <td><a href="ClassDetail.php?campus=40&room=C210&amp;num1=60&amp;num2=30&amp;computer=联想M8000（配置E4600/1G/250G）&amp;ty=EPSON液晶投影机&amp;zk=YX5000&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">C210</a></td>
                    <td><a href="ClassDetail.php?campus=40&room=C312&amp;num1=60&amp;num2=30&amp;computer=联想M8000（配置E4600/1G/250G）&amp;ty=EPSON液晶投影机&amp;zk=YX5000&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">C312</a></td>
                    <td><a href="ClassDetail.php?campus=40&room=C412&amp;num1=60&amp;num2=30&amp;computer=联想M8000（配置E4600/1G/250G）&amp;ty=EPSON液晶投影机&amp;zk=YX5000&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">C412</a></td>
                    <td><a href="ClassDetail.php?campus=40&room=C510&amp;num1=60&amp;num2=30&amp;computer=联想M8000（配置E4600/1G/250G）&amp;ty=EPSON液晶投影机&amp;zk=YX5000&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">C510</a></td>
                </tr>
                <tr>
                    <td><a href="ClassDetail.php?campus=40&room=C212&amp;num1=60&amp;num2=30&amp;computer=联想M8000（配置E4600/1G/250G）&amp;ty=数字投影机&amp;zk=YX5000&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">C212</a></td>
                    <td></td>
                    <td></td>
                    <td><a href="ClassDetail.php?campus=40&room=C512&amp;num1=60&amp;num2=30&amp;computer=联想M8000（配置E4600/1G/250G）&amp;ty=EPSON液晶投影机&amp;zk=YX5000&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">C512</a></td>
                </tr>
         </tbody></table>
       
        
        <table class="spe" id="ZhuHai_e">
                <caption><h6>珠海校区E栋</h6></caption>
                <tbody><tr>
                    <th>二楼</th>
                    <th>三楼</th>
                    <th>四楼</th>
                    <th>五楼</th>
                </tr>
                <tr>
                    <td><a href="ClassDetail.php?campus=40&room=E201&amp;num1=281&amp;num2=147&amp;computer=联想启天M7150（配置Q9500/2G/500G））&amp;ty=EPSON液晶投影机&amp;zk=MC820&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">E201</a></td>
                    <td><a href="ClassDetail.php?campus=40&room=E301&amp;num1=267&amp;num2=141&amp;computer=联想M7150（配置Q9500/2G/500G）&amp;ty=EPSON液晶投影机&amp;zk=MC820&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">E301</a></td>
                    <td><a href="#">E401</a></td>
                    <td><a href="ClassDetail.php?campus=40&room=E501&amp;num1=267&amp;num2=141&amp;computer=联想M7150（配置Q9500/2G/500G）&amp;ty=EPSON液晶投影机&amp;zk=MC820&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">E501</a></td>
                </tr>
                <tr>
                    <td><a href="ClassDetail.php?campus=40&room=E202">E202</a></td>
                    <td><a href="ClassDetail.php?campus=40&room=E303&amp;num1=195&amp;num2=107&amp;computer=联想启天M7150（配置Q9500/2G/500G）&amp;ty=EPSON液晶投影机&amp;zk=MC820&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">E303</a></td>
                    <td><a href="ClassDetail.php?campus=40&room=E403&amp;num1=195&amp;num2=107&amp;computer=联想启天M7150（配置Q9500/2G/500G）&amp;ty=EPSON液晶投影机&amp;zk=MC820&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">E403</a></td>
                    <td><a href="">E503</a></td>
                </tr>
                <tr>
                    <td></td>
                    <td><a href="ClassDetail.php?campus=40&room=E305">E305</a></td>
                    <td><a href="ClassDetail.php?campus=40&room=E405&amp;num1=185&amp;num2=99&amp;computer=联想M7150（配置Q9500/2G/500G&amp;ty=EPSON液晶投影机&amp;zk=MC820&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">E405</a></td>
                    <td></td>
                </tr>
         </tbody></table>
        <table class="spe"  id="ZhuHai_f">
                <caption><h6>珠海校区F栋</h6></caption>
                <tbody><tr>
                    <th>二楼</th>
                    <th>三楼</th>
                    <th>五楼</th>
                </tr>
                <tr>
                    <td><a href="ClassDetail.php?campus=40&room=F201&amp;num1=281&amp;num2=147&amp;computer=联想启天M7150（配置Q9500/2G/500G））&amp;ty=EPSON液晶投影机&amp;zk=MC820&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">F201</a></td>
                    <td><a href="ClassDetail.php?campus=40&room=F301&amp;num1=267&amp;num2=141&amp;computer=联想M7150（配置Q9500/2G/500G) &amp;ty=EPSON液晶投影机&amp;zk=MC820&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">F301</a></td>
                    <td><a href="ClassDetail.php?campus=40&room=F501&amp;num1=271&amp;num2=135&amp;computer=联想M480E（配置P4/512MB/80G）&amp;ty=EPSON液晶投影机&amp;zk=MC820&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">F501</a></td>
                </tr>
                <tr>
                    <td></td>
                    <td><a href="ClassDetail.php?campus=40&room=F317&amp;num1=354&amp;num2=187&amp;computer=联想 M8000（配置E4600/1G/250G）&amp;ty=EPSON液晶投影机&amp;zk=MC820&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">F317</a></td>
                    <td><a href="ClassDetail.php?campus=40&room=F519&amp;num1=341&amp;num2=170&amp;computer=联想M480E（配置P4/512MB/80G）&amp;ty=EPSON液晶投影机&amp;zk=MC820&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">F519</a></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><a href="ClassDetail.php?campus=40&room=F520&amp;num1=343&amp;num2=172&amp;computer=HP（配置AMD 4核/2G/500G）&amp;ty=EPSON液晶投影机&amp;zk=MC820&amp;rj=XP/OFFICE2007/QQ影音/360安全卫士等">F520</a></td>
                </tr>
         </tbody></table>
        
    </div>

</div>
<?php
}
?>

</div>

<script type="text/javascript">
	document.getElementById(Tag2).onMouseOver=switchTag('Tag2','SubNav2');
</script>

<?php
	require_once($bottomDir); 
?>

</body>
</html>