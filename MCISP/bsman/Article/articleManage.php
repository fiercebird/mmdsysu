<?php
session_start();	
include_once $_SERVER['DOCUMENT_ROOT'] . '/MCISP/config/globalconfig.php';
//include_once $dbConnDir;
include_once $_SERVER['DOCUMENT_ROOT'] . "/MCISP/dbconn/DbConn.php";

$misdb_i = new misdb();
$misdb_i->DbConnect();
//获取类别数组，存放在catyarr数组中
$result_caty = $misdb_i->DbQuery('select * from Category');	                              //category表
$catyarr=array();
$catyHtml=""; 
while ($row_caty = $misdb_i->DbResult($result_caty))
{
	$catyarr[$row_caty['CatyId']]=$row_caty['CatyName'];  //关联数组转成数字索引数组
	$catyHtml=$catyHtml.'<option value=' . $row_caty['CatyId'] . '>' . $row_caty['CatyName'] . '</option>';
}
$misdb_i->DbFree($result_caty);



if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	if (isset($_POST['ArteName']))	//更新文章
	{	
		$misdb_i->DbQuery("SET AUTOCOMMIT=0");	//事务开始，禁止自动提交（防止文章和文章索引变化不同步，不一致）
		$sql_pre='update Article set ArteName=\''.$_POST['ArteName']. '\',CateId='.$_POST['CateId'].',Campus='.$_POST['Campus']
		.',Publisher=\''.$_POST['Publisher'].'\',Content=\''.$_POST['Content'].'\',PubId='.$_POST['PubId'] .' where ArteId='.$_POST['ArteId'];                                                                   //article表
		$res1=$misdb_i->DbQuery($sql_pre);
		$ArteName = $_POST['ArteName'];
		$ArteName = html_2_string($ArteName);
		$Content = $_POST['Content'];
		$Content = html_2_string($Content);
		$res2=$misdb_i->DbQuery("UPDATE article_index SET ArteName= '" . ch_word_segment($ArteName) . "',Content= '" . ch_word_segment($Content) . "' WHERE ArteId=" . $_POST['ArteId']);      //article_index表
		if($res1 && $res2) {	//如果两个sql结果为真，则提交事务
			$misdb_i->DbQuery("COMMIT");
		}else { 
			$misdb_i->DbQuery("ROLLBACK");
		}
		$misdb_i->DbQuery("SET AUTOCOMMIT=1");	//事务结束，自动提交
		
	} 
	else 
	if(isset($_POST['data']))	//删除文章
	{
		$data = $_POST['data'];
		$data = json_decode($data);
		$arr = array();
		$misdb_i->DbQuery("SET AUTOCOMMIT=0");	//事务开始，禁止自动提交
		$sql = 'delete from Article where ArteId=' . $data->ArteId;
		$res1=$misdb_i->DbQuery($sql); 
		$sql = 'delete from Article_index where ArteId=' . $data->ArteId;
		$res2=$misdb_i->DbQuery($sql); 
		if($res1 && $res2) {	//如果两个sql结果为真，则提交事务
			$misdb_i->DbQuery("COMMIT");
			$arr['result'] = 1;
		}else { 
			$misdb_i->DbQuery("ROLLBACK");
			$arr['result'] = 0;
		}
		$misdb_i->DbQuery("SET AUTOCOMMIT=1");	//事务结束，自动提交
		echo json_encode($arr);
		exit;
	}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>中山大学多媒体信息服务平台</title>
	<script src='ckeditor/ckeditor.js'></script>
	<script language=javascript src="../../js/jquery-1.8.3.min.js"></script>
	<link href="../../css/iframelayout.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" language="javascript" charset="utf-8">
		function KeywordCheck(){
			var res=document.getElementById("Keyword").value;
			if(res==undefined)
				return false;	
			return true;
		}
		$(document).ready(
			function (){
				
			
			}
		);
		
	</script>
</head>

<body >
<!---->


<?php
if(!isset($_SESSION['username'])) exit;
if (!isset($_GET['ArteId']))//若没有设置文章ID，则显示文章分页浏览表
{
	echo '<h2 class="head2">搜索文章</h2>
	<form action="" onsubmit="return KeywordCheck()" >
	<label style="margin:0px 0px 0px 100px;" >类别：</label>
	<select class="CateIdSel"  name="CateId" id="CateId" style="margin:0px 50px 0px 0px;" ><option value=100 >所有类别</option>'.$catyHtml.'</select>
	标题|内容:
	<input type="input" id="Keyword" name="Keyword" />
	<input type="submit"  style="width:60px;" value="搜索"/>
	<form>
	<h2 class="head2">文章管理</h2>';


	$sql_getId = "";
	if(isset($_GET['CateId']) && $_GET['CateId']!=100 )
		$sql_cateId=" and CateId=".$_GET['CateId']." ";
	else
		$sql_cateId=" ";
	if(isset($_GET['Keyword']) && trim($_GET['Keyword'])!="")//若设置了关键词，显示当前用户权限下与关键词相关的文章
	{
		$keyword=ch_word_segment($_GET['Keyword']);	//关键词分词
		$keyword = str_replace("02b ","+",$keyword);	//还原关键词的特殊搜索符
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
		$keyword=str_replace(" "," +",trim($keyword));	//让多个关键词分词为+ 表示必须包含所有的关键词分词
		$keyword="+".$keyword;
		$sql_getId = 'SELECT ArteId FROM article_index WHERE MATCH (ArteName,Content) AGAINST (\'' . $keyword . '\' IN BOOLEAN MODE)';
	}
		$UserId = $_SESSION['userid'];
		$Authority = $_SESSION['authority'];
		if(IsOne($Authority ,0)){ //超级管理员，查看修改所有文章
			if($sql_getId != "" )	//设置的关键词
				$sql='select ArteId, ArteName,CateId from article where ArteId in ('. $sql_getId .') '.$sql_cateId.' order by PubTime desc';
			else
				$sql='select ArteId, ArteName,CateId from article where 1=1 '.$sql_cateId.' order by PubTime desc';
		}else{//一般管理员只能查看和修改自己的文章
			if($sql_getId != "" )	//设置的关键词
				$sql='select ArteId, ArteName,CateId from article where PubId='. $UserId .'and ArteId in ('. $sql_getId .') '.$sql_cateId.' order by PubTime desc';
			else
				$sql='select ArteId, ArteName,CateId from article where PubId='. $UserId .  $sql_cateId .' order by PubTime desc';
		}
		$result = $misdb_i->DbQuery($sql);		
		$row_num = $misdb_i->DbRowNum($result);
		$page_num = ceil($row_num / PageSizes); //页面数
		if($page_num==0 ){ 
			if($sql_getId == "" ){
				echo '<h2 style="margin:50px 0px 0px 50px; height:400px;">该用户还没有发表任何文章！权限不够，不能查看所有文章！</h2>';
				exit;
			}else{
				echo '<h2 style="margin:50px 0px 0px 50px; height:400px;">没有您要查找的文章！请重新输入关键词！</h2>';
				exit;
			}
		}
		
?>
	<table id='artManaList' class="spe"><tr><th>类别</th><th width=400>标题</th><th>修改</th><th>删除</th></tr></table>
	<div id='page' style="height:50px;">
		<span>共有<?php echo $row_num ?>篇文章</span>&nbsp;&nbsp;&nbsp;
		<span>每页显示<?php echo PageSizes ?>篇</span>&nbsp;&nbsp;&nbsp;
		<a id='first'>首页</a>
		<a id='pre'>上一页</a>
		<span id='pageNumList'> </span>
		<a id='next'>下一页</a>
		<a id='last'>尾页</a>&nbsp;&nbsp;&nbsp;
		当前页：<input id='any' type='text'/>
		<input id="gotoBtn" type="button"  value="跳转" />
	</div>
	
<script type="text/javascript" language="javascript" charset="utf-8">
	
	var rows = []; //每页的记录集
	var curPage = 1; //当前页面
	var PageSizes=<?php echo PageSizes ?>; //每页记录数
	var PageNums=<?php echo $page_num ?>; //页面数
<?php
	$i = 0;
	while ($row = $misdb_i->DbResult($result))
	{
		if($i%2)
			echo 'rows[' . $i . '] = "<tr name=' . $row['ArteId'] . '><td>'. $catyarr[$row['CateId']] .'</td><td><a href=\'http://mmc.sysu.edu.cn/public/infoContent.php?ArteId='.$row['ArteId'].'\' target=\'_blank\' >' . $row['ArteName'] . '<a></td><td><a>修改</a></td><td><a>删除</a></td></tr>";' . "\n";
		else
			echo 'rows[' . $i . '] = "<tr class=altrow  name=' . $row['ArteId'] . '><td>'. $catyarr[$row['CateId']] .'</td><td><a href=\'http://mmc.sysu.edu.cn/public/infoContent.php?ArteId='.$row['ArteId'].'\' target=\'_blank\' >' . $row['ArteName'] . '</a></td><td><a>修改</a></td><td><a>删除</a></td></tr>";' . "\n";
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
		$('table').children().html('<tr><th>类别</th><th width=400>标题</th><th>修改</th><th>删除</th></tr>');
		for(var i=(p-1)*PageSizes; i<p*PageSizes; i++)
			$('table').append(rows[i]);
		bind();
		document.getElementById('any').value=p;
	}

	function bind()
	{
		$('table tr td a').click(function(){
			var txt = $(this).html();
			if(txt=='修改')
			{
				$(location).attr('href','./ArticleManage.php?ArteId='+$(this).parent().parent().attr('name'));
			}
			else if(txt=='删除')
			{
				if(window.confirm("确定要删除此文章？")){
					var obj = $(this);
					$.ajax({					
						url: './articleManage.php',
						dataType: 'json',
						type: 'post',
						data: 'data={"ArteId":'+$(this).parent().parent().attr('name')+'}',
						success: function(data) {
							if(data['result']===1) {
								var val = $(obj).parent().parent().remove();
								alert("删除成功！");
							}else
								alert("删除失败！");
							
						},
						error: function(jqXHR, textStatus, errorThrown) {
							alert("删除请求错误:"+textStatus+ " " + errorThrown);
						}
					});
				}
			}
		});
	}
	
	loadPage(1);
</script>

<?php
}else{ //否则进入文章修改界面
?>
	<h2 class='head2'>修改文章</h2>
		<?php
			$result = $misdb_i->DbQuery('select * from article where ArteId=' . $_GET['ArteId']);
			$row = $misdb_i->DbResult($result);
			if(!$row )
				echo '<h1>文章加载失败!</h1>';
		?>
	<form class='articleAddForm' method='post' action='ArticleManage.php' >
		<div class='formRow'>文章标题：<input class='ArteNameInput' type='text' value='<?php  echo $row['ArteName']; ?>' name='ArteName'/></div>
		<div class='formRow'>
			文章分类：<select class="CateIdSel"  name='CateId' id='CateId'>
				<?php
						echo $catyHtml;		
				?>
			</select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			所属校区：<select name='Campus' id='Campus'>
							<option value=0>所有校区</option>
							<option value=20>南校区</option>
							<option value=10>东校区</option>
							<option value=40>珠海校区</option>
							<option value=30>北校区</option>
						</select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			发布方：<input class='PubInput' type='text' name='Publisher' value='<?php  echo $row['Publisher']; ?>' />
		</div>
		文章内容：
		<textarea id='ckeditor' name='Content' style="height:700px;width:750px;"></textarea>
		<script type="text/javascript">
			CKEDITOR.replace('ckeditor');
			CKEDITOR.instances.ckeditor.setData('<?php echo str_replace(PHP_EOL,'',$row['Content']); ?>');
			//CKEDITOR.instances.ckeditor.setData('<?php echo str_replace("\r\n","\\n",$row['Content']); ?>');
		</script>		
		<input type='hidden' value='<?php echo $row['ArteId']; ?>' name='ArteId'/>
		<input type='hidden' value=<?php echo $_SESSION['userid']; ?> name='PubId'/>
		<input class='addAriticleBtn' type='submit' value='完成修改'  />
	</form>
	<script type="text/javascript" language="javascript" charset="utf-8">		//读入文章类别和所述校区
		var Cateid=<?php echo $row['CateId'] ?>;
		var Campus=<?php echo $row['Campus'] ?>;
		var selCate=document.getElementById('CateId');
		var selCamp=document.getElementById('Campus');
		var i=0;
		for(i=0;i<selCate.length;i++){
			if(selCate.options[i].value==Cateid){
				selCate.options[i].selected=true;
				break;
			}
		}
		for(i=0;i<selCamp.length;i++){
			if(selCamp.options[i].value==Campus){
				selCamp.options[i].selected=true;
				break;
			}
		}
	</script>
</body>
<?php
}
$misdb_i->DbFree($result);
$misdb_i->DbClose();
?>