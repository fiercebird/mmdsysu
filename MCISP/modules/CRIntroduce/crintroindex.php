<?php
session_start();
header("Content-Type:text/html; charset=UTF-8");
include_once  '../../config/globalconfig.php';
//echo $dbConnDir;
include_once("../../dbconn/DbConn.php")
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
if(!isset($_GET['CampusId'])) //若没有校区ID，则显示课室介绍页面
{
	$misdb_i = new misdb();
	$misdb_i->DbConnect();
	$sql='select * from Article where PubTime like "1234-01-01%"' ;
	$result = $misdb_i->DbQuery($sql);
	$row = $misdb_i->DbResult($result);
	$misdb_i->DbFree($result);
	$misdb_i->DbClose();

?>

	<div Class="Article">
			<div Class="ArteName">
				<h6><?php echo $row['ArteName']; ?></h6>
			</div>
			</br>
			</br>
			<div Class="ArteText" style="word-wrap:break-word;"> 
				<?php echo $row['Content']; ?>
			</div>
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
                    <td class="row"><a href="ClassDetail.php?bid=1&className=A101">101</a></td>
                    <td class="row"><a href="ClassDetail.php?bid=1&className=A201">201</a></td>
                    <td class="row"><a href="ClassDetail.php?bid=1&className=A301">301</a></td>
                    <td class="row"><a href="ClassDetail.php?bid=1&className=A401">401</a></td>
                    <td class="row"><a href="ClassDetail.php?bid=1&className=A501">501</a></td>
                </tr>
                <tr>
                    <td class="row"><a href="ClassDetail.php?bid=1&className=A102">102</a></td>
                    <td class="row"><a href="ClassDetail.php?bid=1&className=A202">202</a></td>
                    <td class="row"><a href="ClassDetail.php?bid=1&className=A302">302</a></td>
                    <td class="row"><a href="ClassDetail.php?bid=1&className=A402">402</a></td>
                    <td class="row"><a href="ClassDetail.php?bid=1&className=A502">502</a></td>
                </tr>
                <tr>
                    <td class="row"><a href="ClassDetail.php?bid=1&className=A103">103</a></td>
                    <td class="row"><a href="ClassDetail.php?bid=1&className=A203">203</a></td>
                    <td class="row"><a href="#">303</a></td>
                    <td class="row"><a href="ClassDetail.php?bid=1&className=A403">403</a></td>
                    <td class="row"><a href="ClassDetail.php?bid=1&className=A503">503</a></td>
                </tr>
                <tr>
                    <td class="row"><a href="ClassDetail.php?bid=1&className=A104">104</a></td>
                    <td class="row"><a href="ClassDetail.php?bid=1&className=A204">204</a></td>
                    <td class="row"><a href="#">304</a></td>
                    <td class="row"><a href="ClassDetail.php?bid=1&className=A404">404</a></td>
                    <td class="row"><a href="ClassDetail.php?bid=1&className=A504">504</a></td>
                </tr>
                <tr>
                    <td class="row"><a href="ClassDetail.php?bid=1&className=A105">105</a></td>
                    <td class="row"><a href="#">205</a></td>
                    <td class="row"><a href="#">305</a></td>
                    <td class="row"><a href="ClassDetail.php?bid=1&className=A405">405</a></td>
                    <td class="row"><a href="ClassDetail.php?bid=1&className=A505">505</a></td>
                </tr>
                <tr>
                    <td class="row"></td>
                    <td class="row"><a href="ClassDetail.php?bid=1&className=A207">207</a></td>
                    <td class="row"><a href="ClassDetail.php?bid=1&className=A306">306</a></td>
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
                    <td class="row"><a href="ClassDetail.php?bid=2&className=B101">101</a></td>
                    <td class="row"><a href="ClassDetail.php?bid=2&className=B201">201</a></td>
                    <td class="row"><a href="ClassDetail.php?bid=2&className=B301">301</a></td>
                    <td class="row"><a href="ClassDetail.php?bid=2&className=B401">401</a></td>
                    <td class="row"><a href="ClassDetail.php?bid=2&className=B501">501</a></td>
                </tr>
                <tr>
                    <td class="row"><a href="ClassDetail.php?bid=2&className=B102">102</a></td>
                    <td class="row"><a href="ClassDetail.php?bid=2&className=B202">202</a></td>
                    <td class="row"><a href="ClassDetail.php?bid=2&className=B302">302</a></td>
                    <td class="row"><a href="ClassDetail.php?bid=2&className=B402">402</a></td>
                    <td class="row"><a href="ClassDetail.php?bid=2&className=B502">502</a></td>
                </tr>
                <tr>
                    <td class="row"><a href="ClassDetail.php?bid=2&className=B103">103</a></td>
                    <td class="row"><a href="ClassDetail.php?bid=2&className=B203">203</a></td>
                    <td class="row"><a href="ClassDetail.php?bid=2&className=B303">303</a></td>
                    <td class="row"><a href="ClassDetail.php?bid=2&className=B403">403</a></td>
                    <td class="row"><a href="ClassDetail.php?bid=2&className=B503">503</a></td>
                </tr>
                <tr>
                    <td class="row"><a href="ClassDetail.php?bid=2&className=B104">104</a></td>
                    <td class="row"><a href="ClassDetail.php?bid=2&className=B204">204</a></td>
                    <td class="row"><a href="ClassDetail.php?bid=2&className=B304">304</a></td>
                    <td class="row"></td>
                    <td class="row"></td>
                </tr>
                <tr>
                    <td class="row"></td>
                    <td class="row"><a href="ClassDetail.php?bid=2&className=B205">205</a></td>
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
                    <td class="row"><a href="ClassDetail.php?bid=3&className=C101">101</a></td>
                    <td class="row"><a href="ClassDetail.php?bid=3&className=C201">201</a></td>
                    <td class="row"><a href="ClassDetail.php?bid=3&className=C301">301</a></td>
                    <td class="row"><a href="ClassDetail.php?bid=3&className=C401">401</a></td>
                    <td class="row"><a href="ClassDetail.php?bid=3&className=C501">501</a></td>
                </tr>
                <tr>
                    <td class="row"><a href="ClassDetail.php?bid=3&className=C102">102</a></td>
                    <td class="row"><a href="ClassDetail.php?bid=3&className=C202">202</a></td>
                    <td class="row"><a href="ClassDetail.php?bid=3&className=C302">302</a></td>
                    <td class="row"><a href="ClassDetail.php?bid=3&className=C402">402</a></td>
                    <td class="row"><a href="ClassDetail.php?bid=3&className=C402">502</a></td>
                </tr>
                <tr>
                    <td class="row"><a href="ClassDetail.php?bid=3&className=C103">103</a></td>
                    <td class="row"><a href="ClassDetail.php?bid=3&className=C203">203</a></td>
                    <td class="row"><a href="ClassDetail.php?bid=3&className=C303">303</a></td>
                    <td class="row"><a href="ClassDetail.php?bid=3&className=C403">403</a></td>
                    <td class="row"><a href="ClassDetail.php?bid=3&className=C503">503</a></td>
                </tr>
                <tr>
                    <td class="row"><a href="ClassDetail.php?bid=3&className=C104">104</a></td>
                    <td class="row"><a href="ClassDetail.php?bid=3&className=C204">204</a></td>
                    <td class="row"><a href="ClassDetail.php?bid=3&className=C304">304</a></td>
                    <td class="row"><a href="ClassDetail.php?bid=3&className=C404">404</a></td>
                    <td class="row"><a href="ClassDetail.php?bid=3&className=C504">504</a></td>
                </tr>
                <tr>
                    <td class="row"><a href="ClassDetail.php?bid=3&className=C105">105</a></td>
                    <td class="row"><a href="ClassDetail.php?bid=3&className=C205">205</a></td>
                    <td class="row"><a href="ClassDetail.php?bid=3&className=C305">305</a></td>
                    <td class="row"></td>
                    <td class="row"></td>
                </tr>
                <tr>
                    <td class="row"></td>
                    <td class="row"><a href="ClassDetail.php?bid=3&className=C206">206</a></td>
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
                    <td class="row"><a href="ClassDetail.php?bid=4&className=D101">101</a></td>
                    <td class="row"><a href="ClassDetail.php?bid=4&className=D201">201</a></td>
                    <td class="row"><a href="ClassDetail.php?bid=4&className=D301">301</a></td>
                    <td class="row"><a href="ClassDetail.php?bid=4&className=D401">401</a></td>
                    <td class="row"><a href="ClassDetail.php?bid=4&className=D501">501</a></td>
                </tr>
                <tr>
                    <td class="row"><a href="ClassDetail.php?bid=4&className=D102">102</a></td>
                    <td class="row"><a href="ClassDetail.php?bid=4&className=D202">202</a></td>
                    <td class="row"><a href="ClassDetail.php?bid=4&className=D302">302</a></td>
                    <td class="row"><a href="ClassDetail.php?bid=4&className=D402">402</a></td>
                    <td class="row"><a href="ClassDetail.php?bid=4&className=D502">502</a></td>
                </tr>
                <tr>
                    <td class="row"><a href="ClassDetail.php?bid=4&className=D103">103</a></td>
                    <td class="row"><a href="ClassDetail.php?bid=4&className=D203">203</a></td>
                    <td class="row"><a href="ClassDetail.php?bid=4&className=D303">303</a></td>
                    <td class="row"><a href="ClassDetail.php?bid=4&className=D403">403</a></td>
                    <td class="row"><a href="ClassDetail.php?bid=4&className=D503">503</a></td>
                </tr>
                <tr>
                    <td class="row"><a href="ClassDetail.php?bid=4&className=D104">104</a></td>
                    <td class="row"><a href="ClassDetail.php?bid=4&className=D204">204</a></td>
                    <td class="row"><a href="ClassDetail.php?bid=4&className=D304">304</a></td>
                    <td class="row"></td>
                    <td class="row"></td>
                </tr>
                <tr>
                    <td class="row"></td>
                    <td class="row"><a href="ClassDetail.php?bid=4&className=D205">205</a></td>
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
                    <td class="row"><a href="ClassDetail.php?bid=5&className=E101">101</a></td>
                    <td class="row"><a href="ClassDetail.php?bid=5&className=E201">201</a></td>
                    <td class="row"></td>
                    <td class="row"></td>
                    <td class="row"></td>
                </tr>
                <tr>
                    <td class="row"><a href="#">102</a></td>
                    <td class="row"><a href="ClassDetail.php?bid=5&className=E202">202</a></td>
                    <td class="row"><a href="ClassDetail.php?bid=5&className=E302">302</a></td>
                    <td class="row"><a href="ClassDetail.php?bid=5&className=E402">402</a></td>
                    <td class="row"><a href="ClassDetail.php?bid=5&className=E502">502</a></td>
                </tr>
                <tr>
                    <td class="row"><a href="ClassDetail.php?bid=5&className=a103">103</a></td>
                    <td class="row"><a href="ClassDetail.php?bid=5&className=E203">203</a></td>
                    <td class="row"><a href="ClassDetail.php?bid=5&className=E303">303</a></td>
                    <td class="row"><a href="ClassDetail.php?bid=5&className=E403">403</a></td>
                    <td class="row"><a href="ClassDetail.php?bid=5&className=E503">503</a></td>
                </tr>
                <tr>
                    <td class="row"><a href="ClassDetail.php?bid=5&className=a104">104</a></td>
                    <td class="row"><a href="ClassDetail.php?bid=5&className=E204">204</a></td>
                    <td class="row"><a href="ClassDetail.php?bid=5&className=E304">304</a></td>
                    <td class="row"><a href="ClassDetail.php?bid=5&className=E404">404</a></td>
                    <td class="row"><a href="ClassDetail.php?bid=5&className=E504">504</a></td>
                </tr>
                <tr>
                    <td class="row"><a href="ClassDetail.php?bid=5&className=a105">105</a></td>
                    <td class="row"><a href="ClassDetail.php?bid=5&className=E205">205</a></td>
                    <td class="row"><a href="ClassDetail.php?bid=5&className=E305">305</a></td>
                    <td class="row"><a href="ClassDetail.php?bid=5&className=E405">405</a></td>
                    <td class="row"><a href="ClassDetail.php?bid=5&className=E505">505</a></td>
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
            <td><a href="ClassDetail.php?bid=8&className=201">201</a></td>
            <td><a href="ClassDetail.php?bid=8&className=301">301</a></td>
            <td><a href="ClassDetail.php?bid=8&className=401">401</a></td>
            <td><a href="ClassDetail.php?bid=8&className=501">501</a></td>
            </tr>
            <tr>
            <td><a href="ClassDetail.php?bid=8&className=202">202</a></td>
            <td><a href="ClassDetail.php?bid=8&className=302">302</a></td>
            <td><a href="ClassDetail.php?bid=8&className=402">402</a></td>
            <td><a href="ClassDetail.php?bid=8&className=502">502</a></td>
            </tr>
            <tr>
            <td><a href="ClassDetail.php?bid=8&className=203">203</a></td>
            <td><a href="ClassDetail.php?bid=8&className=303">303</a></td>
            <td><a href="yuyin.php?bid=8&className=403">403</a></td>
            <td><a href="yuyin.php?bid=8&className=503">503</a></td>
            </tr>
            <tr>
            <td><a href="ClassDetail.php?bid=8&className=204">204</a></td>
            <td><a href="ClassDetail.php?bid=8&className=304">304</a></td>
            <td><a href="ClassDetail.php?bid=8&className=404">404</a></td>
            <td><a href="ClassDetail.php?bid=8&className=504">504</a></td>
            </tr>
            <tr>
            <td><a href="ClassDetail.php?bid=8&className=205">205</a></td>
            <td><a href="ClassDetail.php?bid=8&className=305">305</a></td>
            <td><a href="ClassDetail.php?bid=8&className=405">405</a></td>
            <td><a href="ClassDetail.php?bid=8&className=505">505</a></td>
            </tr>
            <tr>
            <td><a href="ClassDetail.php?bid=8&className=206">206</a></td>
            <td><a href="ClassDetail.php?bid=8&className=306">306</a></td>
            <td><a href="ClassDetail.php?bid=8&className=406">406</a></td>
            <td><a href="ClassDetail.php?bid=8&className=506">506</a></td>
            </tr>
            <tr>
            <td><a href="ClassDetail.php?bid=8&className=207">207</a></td>
            <td><a href="ClassDetail.php?bid=8&className=307">307</a></td>
            <td><a href="ClassDetail.php?bid=8&className=407">407</a></td>
            <td><a href="ClassDetail.php?bid=8&className=507">507</a></td>
            </tr>
            <tr>
            <td></td>
            <td><a href="ClassDetail.php?bid=8&className=308">308</a></td>
            <td><a href="ClassDetail.php?bid=8&className=408">408</a></td>
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
                <td><a href="ClassDetail.php?bid=16&className=1101">1101</a></td>
                <td><a href="ClassDetail.php?bid=16&className=1201">1201</a></td>
                <td><a href="ClassDetail.php?bid=16&className=1301">1301</a></td>
                <td><a href="ClassDetail.php?bid=16&className=1401">1401</a></td>
                <td><a href="ClassDetail.php?bid=16&className=1501">1501</a></td>
                <td><a href="ClassDetail.php?bid=16&className=1601">1601</a></td>
            </tr>
            <tr>
                <td><a href="ClassDetail.php?bid=16&className=1102">1102</a></td>
                <td><a href="ClassDetail.php?bid=16&className=1202">1202</a></td>
                <td><a href="ClassDetail.php?bid=16&className=1302">1302</a></td>
                <td><a href="ClassDetail.php?bid=16&className=1402">1402</a></td>
                <td><a href="ClassDetail.php?bid=16&className=1502">1502</a></td>
                <td><a href="ClassDetail.php?bid=16&className=1602">1602</a></td>
            </tr>
            <tr>
                <td><a href="ClassDetail.php?bid=16&className=1103">1103</a></td>
                <td><a href="ClassDetail.php?bid=16&className=1203">1203</a></td>
                <td><a href="ClassDetail.php?bid=16&className=1303">1303</a></td>
                <td><a href="ClassDetail.php?bid=16&className=1403">1403</a></td>
                <td><a href="ClassDetail.php?bid=16&className=1503">1503</a></td>
                <td><a href="ClassDetail.php?bid=16&className=1603">1603</a></td>
            </tr>
            <tr>
                <td><a href="ClassDetail.php?bid=16&className=1104">1104</a></td>
                <td><a href="ClassDetail.php?bid=16&className=1204">1204</a></td>
                <td><a href="ClassDetail.php?bid=16&className=1304">1304</a></td>
                <td><a href="ClassDetail.php?bid=16&className=1404">1404</a></td>
                <td><a href="ClassDetail.php?bid=16&className=1504">1504</a></td>
                <td><a href="ClassDetail.php?bid=16&className=1604">1604</a></td>
            </tr>
            <tr>
                <td><a href="ClassDetail.php?bid=16&className=1105">1105</a></td>
                <td><a href="ClassDetail.php?bid=16&className=1205">1205</a></td>
                <td><a href="ClassDetail.php?bid=16&className=1305">1305</a></td>
                <td><a href="ClassDetail.php?bid=16&className=1405">1405</a></td>
                <td><a href="ClassDetail.php?bid=16&className=1505">1505</a></td>
                <td><a href="ClassDetail.php?bid=16&className=1605">1605</a></td>
            </tr>
            <tr>
                <td><a href="ClassDetail.php?bid=16&className=1106">1106</a></td>
                <td><a href="ClassDetail.php?bid=16&className=1206">1206</a></td>
                <td><a href="ClassDetail.php?bid=16&className=1306">1306</a></td>
                <td><a href="ClassDetail.php?bid=16&className=1406">1406</a></td>
                <td><a href="ClassDetail.php?bid=16&className=1506">1506</a></td>
                <td><a href="ClassDetail.php?bid=16&className=1606">1606</a></td>
            </tr>
            <tr>
                <td></td>
                <td><a href="ClassDetail.php?bid=16&className=1207">1207</a></td>
                <td><a href="ClassDetail.php?bid=16&className=1307">1307</a></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td><a href="ClassDetail.php?bid=16&className=1208">1208</a></td>
                <td><a href="ClassDetail.php?bid=16&className=1308">1308</a></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><a href="ClassDetail.php?bid=16&className=1309">1309</a></td>
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
                <td><a href="ClassDetail.php?bid=6&className=108">108</a></td>
                <td><a href="#">109</a></td>
				<td><a href="#">110</a></td>
                <td><a href="#">111</a></td>
            </tr>
        </tbody></table>
		 <table class="spe" id="South_4">
            <caption><h6>第二、三教学楼</h6></caption>
            <tbody><tr>
				<td><a href="ClassDetail.php?bid=17&className=2107">二教2107</a></td>
                <td><a href="#">3103</a></td>
                <td><a href="#">3104</a></td>
				<td><a href="#">3105</a></td>
                <td><a href="#">3106</a></td>
				<td><a href="#">3107</a></td>
                <td><a href="#">3108</a></td>
				<td><a href="ClassDetail.php?bid=18&className=3109">3109</a></td>
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
                <td><a href="ClassDetail.php?bid=9&className=101">101</a></td>
                <td><a href="ClassDetail.php?bid=9&className=102">201</a></td>
                <td><a href="ClassDetail.php?bid=9&className=301">301</a></td>
                <td><a href="ClassDetail.php?bid=9&className=401">401</a></td>
                <td><a href="ClassDetail.php?bid=9&className=501">501</a></td>
                <td><a href="ClassDetail.php?bid=9&className=601">601</a></td>
                <td></td>
            </tr>
            <tr>
                <td><a href="ClassDetail.php?bid=9&className=102">102</a></td>
                <td><a href="ClassDetail.php?bid=9&className=202">202</a></td>
                <td><a href="ClassDetail.php?bid=9&className=302">302</a></td>
                <td><a href="ClassDetail.php?bid=9&className=402">402</a></td>
                <td><a href="ClassDetail.php?bid=9&className=502">502</a></td>
                <td><a href="ClassDetail.php?bid=9&className=602">602</a></td>
                <td><a href="ClassDetail.php?bid=9&className=702">702</a></td>
            </tr>
            <tr>
                <td></td>
                <td><a href="ClassDetail.php?bid=9&className=203">203</a></td>
                <td><a href="ClassDetail.php?bid=9&className=303">303</a></td>
                <td><a href="ClassDetail.php?bid=9&className=403">403</a></td>
                <td><a href="ClassDetail.php?bid=9&className=503">503</a></td>
                <td><a href="ClassDetail.php?bid=9&className=603">603</a></td>
                <td><a href="ClassDetail.php?bid=9&className=703">703</a></td>
            </tr>
            <tr>
                <td><a href="ClassDetail.php?bid=9&className=104">104</a></td>
                <td><a href="ClassDetail.php?bid=9&className=204">204</a></td>
                <td><a href="ClassDetail.php?bid=9&className=304">304</a></td>
                <td><a href="ClassDetail.php?bid=9&className=404">404</a></td>
                <td><a href="ClassDetail.php?bid=9&className=504">504</a></td>
                <td><a href="ClassDetail.php?bid=9&className=604">604</a></td>
                <td><a href="ClassDetail.php?bid=9&className=704">704</a></td>
            </tr>
            <tr>
                <td></td>
                <td><a href="ClassDetail.php?bid=9&className=205">205</a></td>
                <td><a href="ClassDetail.php?bid=9&className=305">305</a></td>
                <td><a href="ClassDetail.php?bid=9&className=405">405</a></td>
                <td><a href="ClassDetail.php?bid=9&className=505">505</a></td>
                <td><a href="ClassDetail.php?bid=9&className=605">605</a></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td><a href="ClassDetail.php?bid=9&className=206">206</a></td>
                <td><a href="ClassDetail.php?bid=9&className=306">306</a></td>
                <td><a href="ClassDetail.php?bid=9&className=406">406</a></td>
                <td><a href="ClassDetail.php?bid=9&className=506">506</a></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><a href="ClassDetail.php?bid=9&className=307">307</a></td>
                <td><a href="ClassDetail.php?bid=9&className=407">407</a></td>
                <td><a href="ClassDetail.php?bid=9&className=507">507</a></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><a href="ClassDetail.php?bid=9&className=308">308</a></td>
                <td></td>
                <td><a href="ClassDetail.php?bid=9&className=508">508</a></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><a href="ClassDetail.php?bid=9&className=309">309</a></td>
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
                <td><a href="ClassDetail.php?bid=9&className=1">第1课室</a></td>
                <td><a href="ClassDetail.php?bid=9&className=3">第3课室</a></td>
                <td><a href="ClassDetail.php?bid=9&className=7">第7课室</a></td>
                <td><a href="ClassDetail.php?bid=9&className=8">第8课室</a></td>
                <td><a href="ClassDetail.php?bid=9&className=13">第13课室</a></td>
                <td><a href="ClassDetail.php?bid=9&className=24">第24课室</a></td>
            </tr>
            <tr>
                <td><a href="ClassDetail.php?bid=9&className=2">第2课室</a></td>
                <td></td>
                <td></td>
                <td><a href="ClassDetail.php?bid=9&className=9">第9课室</a></td>
                <td><a href="ClassDetail.php?bid=9&className=14">第14课室</a></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td><a href="ClassDetail.php?bid=9&className=11">第11课室</a></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td><a href="ClassDetail.php?bid=9&className=12">第12课室</a></td>
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
                    <td><a href="ClassDetail.php?bid=10&className=B201">B201</a></td>
                    <td><a href="ClassDetail.php?bid=10&className=B301">B301</a></td>
                    <td><a href="ClassDetail.php?bid=10&className=B401">B401</a></td>
                    <td><a href="ClassDetail.php?bid=10&className=B503">B503</a></td>
                </tr>
                <tr>
                    <td><a href="ClassDetail.php?bid=10&className=B203">B203</a></td>
                    <td><a href="ClassDetail.php?bid=10&className=B303">B303</a></td>
                    <td><a href="ClassDetail.php?bid=10&className=B413">B413</a></td>
                    <td><a href="ClassDetail.php?bid=10&className=B509">B509</a></td>
                </tr>
                <tr>
                    <td><a href="ClassDetail.php?bid=10&className=B208">B208</a></td>
                    <td><a href="ClassDetail.php?bid=10&className=B208">B308</a></td>
                    <td></td>
                    <td><a href="ClassDetail.php?bid=10&className=B511">B511</a></td>
                </tr>
                <tr>
                    <td><a href="ClassDetail.php?bid=10&className=B209">B209</a></td>
                    <td><a href="ClassDetail.php?bid=10&className=B309">B309</a></td>
                    <td></td>
                    <td><a href="ClassDetail.php?bid=10&className=B513">B513</a></td>
                </tr>
                <tr>
                    <td><a href="ClassDetail.php?bid=10&className=B210">B210</a></td>
                    <td><a href="ClassDetail.php?bid=10&className=B310">B310</a></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><a href="ClassDetail.php?bid=10&className=B211">B211</a></td>
                    <td><a href="ClassDetail.php?bid=10&className=B311">B311</a></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><a href="ClassDetail.php?bid=10&className=B212">B212</a></td>
                    <td><a href="ClassDetail.php?bid=10&className=B312">B312</a></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><a href="ClassDetail.php?bid=10&className=B213">B213</a></td>
                    <td><a href="ClassDetail.php?bid=10&className=B313">B313</a></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><a href="ClassDetail.php?bid=10&className=B214">B214</a></td>
                    <td><a href="ClassDetail.php?bid=10&className=B314">B314</a></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><a href="ClassDetail.php?bid=10&className=B216">B216</a></td>
                    <td><a href="ClassDetail.php?bid=10&className=B316">B316</a></td>
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
                    <td><a href="ClassDetail.php?bid=13&className=D201">D201</a></td>
                    <td><a href="ClassDetail.php?bid=13&className=D301">D301</a></td>
                    <td><a href="ClassDetail.php?bid=13&className=D407">D407</a></td>
                    <td><a href="ClassDetail.php?bid=13&className=D501">D501</a></td>
                </tr>
                <tr>
                    <td><a href="ClassDetail.php?bid=13&className=D204">D204</a></td>
                    <td><a href="ClassDetail.php?bid=13&className=D304">D304</a></td>
                    <td><a href="ClassDetail.php?bid=13&className=D409">D409</a></td>
                    <td></td>
                </tr>
                <tr>
                    <td><a href="ClassDetail.php?bid=13&className=D206">D206</a></td>
                    <td><a href="ClassDetail.php?bid=13&className=D306">D306</a></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><a href="ClassDetail.php?bid=13&className=D207">D207</a></td>
                    <td><a href="ClassDetail.php?bid=13&className=D307">D307</a></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><a href="ClassDetail.php?bid=13&className=D208">D208</a></td>
                    <td><a href="ClassDetail.php?bid=13&className=D308">D308</a></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><a href="ClassDetail.php?bid=13&className=D209">D209</a></td>
                    <td><a href="ClassDetail.php?bid=13&className=D309">D309</a></td>
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
                    <td><a href="ClassDetail.php?bid=12&className=C201">C201</a></td>
                    <td><a href="ClassDetail.php?bid=12&className=C301">C301</a></td>
                    <td><a href="ClassDetail.php?bid=12&className=C402">C402</a></td>
                    <td><a href="ClassDetail.php?bid=12&className=C501">C501</a></td>
                </tr>
                <tr>
                    <td><a href="ClassDetail.php?bid=12&className=C202">C202</a></td>
                    <td><a href="ClassDetail.php?bid=12&className=C302">C302</a></td>
                    <td><a href="ClassDetail.php?bid=12&className=C403">C403</a></td>
                    <td><a href="ClassDetail.php?bid=12&className=C502">C502</a></td>
                </tr>
                <tr>
                    <td><a href="ClassDetail.php?bid=12&className=C203">C203</a></td>
                    <td><a href="ClassDetail.php?bid=12&className=C303">C303</a></td>
                    <td><a href="ClassDetail.php?bid=12&className=C405">C405</a></td>
                    <td><a href="ClassDetail.php?bid=12&className=C503">C503</a></td>
                </tr>
                <tr>
                    <td><a href="ClassDetail.php?bid=12&className=C205">C205</a></td>
                    <td><a href="ClassDetail.php?bid=12&className=C305">C305</a></td>
                    <td><a href="ClassDetail.php?bid=12&className=C407">C407</a></td>
                    <td><a href="ClassDetail.php?bid=12&className=C505">C505</a></td>
                </tr>
                <tr>
                    <td><a href="ClassDetail.php?bid=12&className=C207">C207</a></td>
                    <td><a href="ClassDetail.php?bid=12&className=C307">C307</a></td>
                    <td><a href="ClassDetail.php?bid=12&className=C408">C408</a></td>
                    <td><a href="ClassDetail.php?bid=12&className=C507">C507</a></td>
                </tr>
                <tr>
                    <td><a href="ClassDetail.php?bid=12&className=C208">C208</a></td>
                    <td><a href="ClassDetail.php?bid=12&className=C310">C310</a></td>
                    <td><a href="ClassDetail.php?bid=12&className=C410">C410</a></td>
                    <td><a href="ClassDetail.php?bid=12&className=C508">C508</a></td>
                </tr>
                <tr>
                    <td><a href="ClassDetail.php?bid=12&className=C210">C210</a></td>
                    <td><a href="ClassDetail.php?bid=12&className=C312">C312</a></td>
                    <td><a href="ClassDetail.php?bid=12&className=C412">C412</a></td>
                    <td><a href="ClassDetail.php?bid=12&className=C510">C510</a></td>
                </tr>
                <tr>
                    <td><a href="ClassDetail.php?bid=12&className=C212">C212</a></td>
                    <td></td>
                    <td></td>
                    <td><a href="ClassDetail.php?bid=12&className=C512">C512</a></td>
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
                    <td><a href="ClassDetail.php?bid=14&className=E201">E201</a></td>
                    <td><a href="ClassDetail.php?bid=14&className=E301">E301</a></td>
                    <td><a href="#">E401</a></td>
                    <td><a href="ClassDetail.php?bid=14&className=E501">E501</a></td>
                </tr>
                <tr>
                    <td><a href="ClassDetail.php?bid=14&className=E202">E202</a></td>
                    <td><a href="ClassDetail.php?bid=14&className=E303">E303</a></td>
                    <td><a href="ClassDetail.php?bid=14&className=E403">E403</a></td>
                    <td><a href="">E503</a></td>
                </tr>
                <tr>
                    <td></td>
                    <td><a href="ClassDetail.php?bid=14&className=E305">E305</a></td>
                    <td><a href="ClassDetail.php?bid=14&className=E405">E405</a></td>
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
                    <td><a href="ClassDetail.php?bid=15&className=F201">F201</a></td>
                    <td><a href="ClassDetail.php?bid=15&className=F301">F301</a></td>
                    <td><a href="ClassDetail.php?bid=15&className=F501">F501</a></td>
                </tr>
                <tr>
                    <td></td>
                    <td><a href="ClassDetail.php?bid=15&className=F317">F317</a></td>
                    <td><a href="ClassDetail.php?bid=15&className=F519">F519</a></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><a href="ClassDetail.php?bid=15&className=F520">F520</a></td>
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