<?php
session_start();
header('Content-Type:text/html; charset=UTF-8');
include_once $_SERVER['DOCUMENT_ROOT'] . '/config/globalconfig.php';
include_once $dbConnDir;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>信息公告-多媒体信息服务平台</title>
	<link href="../../css/layout.css" rel="stylesheet" type="text/css" />
	<link href="../../css/screen.css" rel="stylesheet" type="text/css" />
	<script language=javascript src="../../js/jquery-1.8.3.min.js"></script>
	<script language=javascript src="../../js/md5.js"></script>
	<script type="text/javascript" language="javascript" charset="utf-8">
    window.onload = function () {
        var aA = document.getElementById('InfoLeftMenu').getElementsByTagName('a');
        var i = 0;

        for (i = 0; i < aA.length; i++) {
            aA[i].iTime = null;
            aA[i].iSpeed = 6;
            aA[i].onmouseover = function () {
                goTime(this, 30, 1);
            }
            aA[i].onmouseout = function () {
                goTime(this, 6, -1);
            }
        }
    }
    function goTime(obj, iTarget, toggle) {
        if (obj.iTime) {
            clearInterval(obj.iTime);
        }
        obj.iTime = setInterval(function () {
            if (obj.iSpeed === iTarget) {
                clearInterval(obj.iTime);
                obj.iTime = null;
            }
            else {
                obj.iSpeed += 2 * toggle;
                obj.style.paddingLeft = obj.iSpeed + 'px';
                obj.style.paddingRight = obj.iSpeed + 'px';
            }

        }, 30);
    }
	function KeywordCheck(){
		var res=document.getElementById("Keyword").value;
		if(res=="" ||  res==undefined)
			return false;	
		return true;
	}
	
	
</script>
</head>


<body>
<?php
	//if(!isset($_GET['CateId'])) exit; //访问此页面必须在URL中传递CateId参数，否则禁止访问
	require_once($topDir);
	$misdb_i = new misdb();
	$misdb_i->DbConnect();
?>


<div id="infoIndexMain">
<div id="infoIndexLeft"> 
<h6 style="margin:10px 0px 10px 30px;">信息类别</h6>
<?php 
	$sql='select * from Category where CatyId>0';
	
	$res=$misdb_i->DbQuery($sql);
	echo '<ul id="InfoLeftMenu">';
	while($row=$misdb_i->DbResult($res))
	{
		echo '<li><center><a  href="./infoindex.php?CateId='. $row['CatyId'] .'&CatyName='. urlencode($row['CatyName']) .'">'. $row['CatyName'] .'</a></center></li>';
	}
	echo '</ul>';
?>
</div>

<div id="infoIndexRight">
<h6>搜索文章</h6>
<form action="" onsubmit="return KeywordCheck()" >
<input type="input" id="Keyword" name="Keyword" style="margin:0px 0px 0px 20px;" />
<input type="submit"  style="width:60px;" value="搜索"/>
</form>
<?php 

	if(isset($_GET['CateId']) ){
		$CateId=$_GET['CateId'];
		echo '<h6>'. urldecode($_GET['CatyName']) .'</h6>'; 
		$sql='select ArteId,ArteName,Campus,Publisher,PubTime from Article where CateId='.$CateId;
		
	}else {
		echo '<h6>搜索结果</h6>'; 
		$keyword=ch_word_segment($_GET['Keyword']);
		$keyword = str_replace("02b ","+",$keyword);
		$keyword = str_replace("02d ","-",$keyword);
		$keyword = str_replace("02a ","*",$keyword);
		$keyword = str_replace("028 ","(",$keyword);
		$keyword = str_replace(" 029",")",$keyword);
		$keyword = str_replace("03c ","<",$keyword);
		$keyword = str_replace("03e ",">",$keyword);
		for ($i=substr_count($keyword,"022");$i>0;$i-=2) {
			$keyword = str_replace_once("022 ","\"",$keyword);
			$keyword = str_replace_once(" 022","\"",$keyword);
		}
		$keyword=str_replace(" "," +",trim($keyword));
		$keyword="+".$keyword;
		$sql_getId = 'SELECT ArteId FROM article_index WHERE MATCH (ArteName,Content) AGAINST (\'' . $keyword . '\' IN BOOLEAN MODE)';
		$result = $misdb_i->DbQuery($sql_getId);
		$resNum=$misdb_i->DbRowNum($result);
		if($resNum==0)
		{
			echo '<h6 style="padding:50px 0px 0px 50px;">没有您要查找的结果！请重新输入关键词！</h6></div></div>';	
			require_once($bottomDir); 
			exit;
		}
		$AId="";
		while($row = $misdb_i->DbResult($result)) {
			$AId.= ' or ArteId=' . $row['ArteId'];
		}
		$AId=substr($AId,3);//去除首部的 or字符
		$sql = 'select ArteId,ArteName,Campus,Publisher,PubTime from Article where '.$AId;
		
	}
	$res=$misdb_i->DbQuery($sql);
	$RowNum = $misdb_i->DbRowNum($res);
	$PageNum = ceil($RowNum / InfoPageSizes); //页面数
	if($PageNum==0){
		echo '<h6 style="padding:50px 0px 0px 50px;">该类别下还没有发表任何文章！</h6></div></div>';	
		require_once($bottomDir); 
		exit;
	}
	
?>


<table class='spe' id='artInfoList'><tr><th  width=80>校区</th><th width=350>标题</th><th width=150>发布方</th><th width=165>发布时间</th></tr></table>
	<div id='page'>
		<span>共有<?php echo $RowNum ?>篇文章</span>&nbsp;&nbsp;&nbsp;
		<span>每页显示<?php echo InfoPageSizes ?>篇</span>&nbsp;&nbsp;&nbsp;
		<a id='first'>首页</a>
		<a id='pre'>上一页</a>
		<span id='pageNumList'> </span>
		<a id='next'>下一页</a>
		<a id='last'>尾页</a>&nbsp;&nbsp;&nbsp;
		当前页：<input id='any' type='text'/>
		<input id="gotoBtn" type="button"  value="跳转" />
	</div>
	
</div>
</div>

<script type="text/javascript" language="javascript" charset="utf-8">
	var rows = []; //每页的记录集
	var curPage = 1; //当前页面
	var PageSizes=<?php echo InfoPageSizes ?>; //每页记录数
	var PageNums=<?php echo $PageNum ?>; //页面数
<?php
	$i = 0;
	while ($row = $misdb_i->DbResult($res))
	{
		if($i%2)
			echo 'rows[' . $i . '] = "<tr name=' . $row['ArteId'] . '><td>'.$GetCampus[$row['Campus']]
			.'</td><td><a href=\'../../public/infoContent.php?ArteId='. $row['ArteId'] .'\'>' . $row['ArteName'] 
				. '</a></td><td >' . $row['Publisher'] . '</td><td >' . $row['PubTime'] . '</td></tr>";' . "\n";
		else  
			echo 'rows[' . $i . '] = "<tr class=altrow  name=' . $row['ArteId'] . '><td>'.$GetCampus[$row['Campus']]
			.'</td><td><a href=\'../../public/infoContent.php?ArteId='. $row['ArteId'] .'\'>' . $row['ArteName'] 
				. '</a></td><td >' . $row['Publisher'] . '</td><td >' . $row['PubTime'] . '</td></tr>";' . "\n";
		$i++;
	}
?>

	$('div#page a#first').click(function(){
		if(curPage != 1)
		{
			curPage = 1;
			loadPage(curPage);
		}
	});
	
	$('div#page a#pre').click(function(){
		if(curPage > 1)
		{
			curPage--;
			loadPage(curPage);
		}
	});
	
	$('div#page a#next').click(function(){
		if(curPage <  PageNums)
		{
			curPage++;
			loadPage(curPage);
		}
	});
	
	$('div#page a#last').click(function(){
		if(curPage !=  PageNums)
		{
			curPage =  PageNums;
			loadPage(curPage);
		}
	});
	
	$('div#page input#gotoBtn').click(function(){
		var any=document.getElementById('any').value;
		if(any!=undefined){//只有在any有实际值的时候才会跳转
			if(any < 1) 
				any=1;
			else if (any > PageNums) 
				any=PageNums;		
			if(curPage !=  any)
			{
				curPage =  any;
				loadPage(curPage);
			}
			document.getElementById('any').value=any;	
		}
	});
	
	function loadPage(p)
	{
		var str='';
		var left;
		if(p%10)
			left=p-p%10+1;
		else 
			left=p-9;
		var right=(left+9>PageNums)? PageNums:left+9;
		 for( i=left; i<=right; i++)
			str=str+'<a id="P'+i+'">'+i+'</a>&nbsp;';

			$('#pageNumList').html(str);
			$('div#page span#pageNumList a[id^=P]').click(function(){
				curPage = $(this).attr('id').substring(1);
				loadPage(curPage);
			});
		$('#artInfoList').children().html('<tr><th  width=80>校区</th><th width=350>标题</th><th width=150>发布方</th><th width=165>发布时间</th></tr>');
		for(var i=(p-1)*PageSizes; i<p*PageSizes; i++)
			$('#artInfoList').append(rows[i]);
		document.getElementById('any').value=p;
	}
	loadPage(1);

	document.getElementById('Tag4').onMouseOver=switchTag('Tag4','SubNav4');
</script>

<?php
	require_once($bottomDir); 
	$misdb_i->DbFree($res);
	$misdb_i->DbClose();
	
?>

</body>
</html>