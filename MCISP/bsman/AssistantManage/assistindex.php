<?php
session_start();
header("Content-Type:text/html; charset=UTF-8");
include_once $_SERVER['DOCUMENT_ROOT'] . '/MCISP/config/globalconfig.php';
//include_once $dbConnDir;
include_once $_SERVER['DOCUMENT_ROOT'] . "/MCISP/dbconn/DbConn.php";

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>助理管理-多媒体信息服务平台</title>
	<link href="../../css/layout.css" rel="stylesheet" type="text/css" />
	<link href="../../css/screen.css" rel="stylesheet" type="text/css" />
	<script language=javascript src="../../js/jquery-1.8.3.min.js"></script>
	<script language=javascript src="../../js/md5.js"></script>
	<script language=javascript src="../../js/Calendar3.js"></script>
	<script type="text/javascript" language="javascript" charset="utf-8">
	function	ImgUpload(i)
	{
		$('#ImgFile'+i).trigger('click');
	}
	
	function ImgReset(i)
	{
		$('#ImgFile'+i).attr('value','');
		document.getElementById("VieImg"+i).src='./photo/head.jpg';
	}
	
	function setImagePreview(i) {
		var docObj=document.getElementById("ImgFile"+i);
		var fileName ;
		if( !docObj || !docObj.value )return;
		else fileName = docObj.value;

		var patn = /\.jpg$|\.jpeg$|\.png$|\.gif$/i;
		if(!patn.test(fileName)){
			alert("您上传的图片格式不正确，请重新选择!");
			return ;
		} 
		var imgObjPreview=document.getElementById("VieImg"+i);
		if(docObj.files &&  docObj.files[0]){
		 //火狐下，直接设img属性          
		// imgObjPreview.src = docObj.files[0].getAsDataURL(); 7.0确实取消了 不能用这个接口了 		
		var objectURL = window.URL.createObjectURL(docObj.files[0]);
		 imgObjPreview.src = objectURL;
		}else{
		 //IE下，使用滤镜
		 docObj.select();
		 var imgSrc = document.selection.createRange().text;
		 var localImagId = document.getElementById("localImag"+i);
		 //必须设置初始大小

		 //图片异常的捕捉，防止用户修改后缀来伪造图片
		 try{
			 localImagId.style.filter="progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale)";
			 localImagId.filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = imgSrc;
		 }catch(e){
			 alert("您上传的图片格式不正确，请重新选择!");
			 return false;
		 }
		 imgObjPreview.style.display = 'none';
		 document.selection.empty();
		}
        return true;
     }
	 function AddDataCheck()
	 {
		var StuNum=document.getElementsByName("AsstNum")[0].value;
		if(StuNum==""){
			alert("学号不能为空！请输入学号！");
			return false;
		}
		var patn = /[0-9]{8}/;
		if(!patn.test(StuNum)){
			alert("学号错误！请输入正确学号！");
			return false;
		}
		return true;
	 }
	 

	</script>
</head>


<body class="bsman">
<?php
	if(!isset($_SESSION['username'])) exit;
	//require_once($topDir);
	//
?>

<div id="AssistMain">
<div id="LeftNavi">
	<h1>助理管理</h1>
	<div class="AssistLeftNav"><a id="AssistAdd" >新增助理</a></div>
	<div class="AssistLeftNav"><a id="AssistCheck" >查看助理</a></div>
	<div class="AssistLeftNav"><a id="PayMana" >工资导入</a></div>
</div>
	

<div id="RightPart">
	<div id="add" style="display:none" >	
	<form action="addAssistant.php" method="post" enctype="multipart/form-data"  onsubmit="return AddDataCheck()" >
	<div  style="height:210px;width:650px;border:2px solid #CCCCCC;">
		<div class="ImgBox" >
			<div  id="localImag0" style="height:150px;width:120px;">
				<img id="VieImg0" style="height:150px;width:120px;" src='./photo/head.jpg'></img>
			</div>
			<center><input type="button" value="上传"   onclick="ImgUpload('0')" >
			<input type="button" value="重置"   onclick="ImgReset('0')"></center>
			<input type="file" name="ImgFile" id="ImgFile0"  onchange="javascript:setImagePreview('0')" />
		</div>
		<div id="AsstInfo">
			<div class='divAI'>
				学号：<span><input name=AsstNum style="width:100px;"></span>&nbsp;&nbsp;
				姓名：<span><input name=AsstName ></span>&nbsp;&nbsp;
				性别：<span>
						<select name=AsstSex>
							<option value=3>不详</option>
							<option value=0>男</option>
							<option value=1>女</option>
						</select>		
				</span>		
			</div>		
			<div class='divAI'>
				出生日期：<span><input name=BirthDate style="width:120px;" onclick="new Calendar().show(this);" readonly="readonly" ></span>&nbsp;&nbsp;
				电话：<span><input name=Phone style="width:100px;"></span>
				短号：<span><input name=PhoneSNum style="width:60px;"></span>		
			</div>
			<div class='divAI'>
				院系专业：<span><input name=Major style="width:240px;"></span>	
				所属校区：<span>
						<select name=Campus>
							<option value=0>所有校区</option>
							<option value=20>南校区</option>
							<option value=10>东校区</option>
							<option value=40>珠海校区</option>
							<option value=30>北校区</option>
						</select>		
				</span>				
			</div>
			<div class='divAI'>
				详细地址：<span><input name=Address style="width:400px;"></span>	
			</div>		
			<div class='divAI'>
				身份证号：<span><input name=IdCardNum style="width:165px;"></span>
				入职日期：<span><input name=EnterDate onclick="new Calendar().show(this);" readonly="readonly" ></span>
			</div>	
			<div class='divAI'>
				银行账户：<span><input name=BankAccount style="width:165px;"></span>
				离职日期：<span><input name=LeaveDate onclick="new Calendar().show(this);" readonly="readonly" ></span>
			</div>
			<div class='divAI'>
				注册为管理员：<input name=IsAdmin type="radio" value=1 checked="checked"> 是 	<input name=IsAdmin type="radio" value=0> 否		
				<span style="float:right;margin:0px 20px 0px 0px;" ><input type="submit" name="submit" value="确定" /></span>
			</div>
		</div>
	</div>
	</form>
	</div>
	
	<div id="check" >
		<div id="AsstSelCon">
			<h1>数据筛选</h1>
			<form id="selectConFrom" name="selectConFrom" method="post" action="./assistindex.php"  >
				<div class='divAI'>
					<span>学号：<input name=AsstNum style="width:70px;"></span>&nbsp;
					<span>姓名：<input name=AsstName style="width:70px;"></span>&nbsp;
					<span>
						校区：<select name=Campus>
							<option value=0>所有校区</option>
							<option value=20>南校区</option>
							<option value=10>东校区</option>
							<option value=40>珠海校区</option>
							<option value=30>北校区</option>
						</select>		
					</span>	
						<span>院系专业：<input name=Major ></span>	
				</div>	
				<div class='divAI'>
					<span>入职日期：<input name=EnterDate onclick="new Calendar().show(this);" style="width:120px;"></span>&nbsp;
					<span>离职日期：<input name=LeaveDate onclick="new Calendar().show(this);" style="width:120px;"></span>		
					<span style="float:right;margin-right:100px;"><input type='submit' value='查询'  /></span>
				</div>	
			</form>
		</div>

<?php 
	if ( isset($_GET['page']) ) { 
		$page = (int)$_GET['page']; 
	} else { 
	    $page = 1; 
	}  

	
	$sql='select * from Assistant ';
		if (isset($_POST['Campus']) && $_POST['Campus']!=0 )	
			$sql.=' where Campus=' . $_POST['Campus'];
		else 
			$sql.='where Campus>=0';
		if (isset($_POST['AsstNum']) && $_POST['AsstNum']!="") 
			$sql.=' and AsstNum like "%'. $_POST['AsstNum'] .'%"';
		if (isset($_POST['AsstName']) && $_POST['AsstName']!="") 
			$sql.=' and AsstName like "%'. $_POST['AsstName'] .'%"';
		if (isset($_POST['Major']) && $_POST['Major']!="") 
			$sql.=' and Major like "%'. $_POST['Major'] .'%"';	
		if (isset($_POST['EnterDate']) && $_POST['EnterDate']!="") 
			$sql.=' and EnterDate like "%'. $_POST['EnterDate'] .'%"';	
		if (isset($_POST['LeaveDate']) && $_POST['LeaveDate']!="") 
			$sql.=' and LeaveDate like "%'. $_POST['LeaveDate'] .'%"';				

	$pager_option = array( 
		"sql" => $sql, 
		"PageSize" => AsstManaSizes, 
		"CurrentPageID" => $page 
	);  
	if ( isset($_GET['ItemNums']) ) { 
		$pager_option['ItemNums'] = (int)$_GET['ItemNums']; 
	}  
 	$dbs=new misdb();
	$dbs->DbConnect();
	$pager = new Pager($pager_option);   
	$data = $pager->getPageData(); 
	$dbs->DbClose();
	
	
	if($pager->ItemNums!=0){
		echo '<h1>助理列表</h1>
		<div id="AssistList">';	
		$i=1;
		foreach($data as $item)
		{
			CreateModel($item,$i);
			$i++;
		}
		echo '</div>';
	}else{
		echo '<h1>不存在满足查询条件的记录!!</h1>';
	
	}
	if ( $pager->isFirstPage ) { 
	   $turnover = '首页 | 上一页 |'; 
	}else{ 
	   $turnover = '<a href="?page=1&ItemNums=' . $pager->ItemNums . '"> 首页</a>
	   | <a href="?page='. $pager->PreviousPageID. '&ItemNums=' . $pager->ItemNums . '"> 上一页</a> |'; 
	}	
	if ( $pager->isLastPage ) { 
	   $turnover .= '下一页 | 尾页'; 
	} else { 
	  $turnover .= '<a href="?page=' . $pager->NextPageID . '&ItemNums=' . $pager->ItemNums . '"> 下一页</a> 
	  |<a href="?page=' . $pager->PageNums. '&ItemNums=' . $pager->ItemNums. '"> 尾页</a>'; 
	}
	echo '<div id="assistPage">
		<span>'.$pager->ItemNums.'个助理</span>&nbsp;&nbsp;
		<span>每页显示'.AsstManaSizes.'个</span>&nbsp;&nbsp;
		<span>'.$turnover .'</span>&nbsp;&nbsp;
		<span>当前:'. $page .'|'.$pager->PageNums.'页</span>
		跳转至<input id="AnyPage" type="text"/>页<input id="goBtn" type="button"  value="确定" onclick="javascript:GotoPage()" />
	</div>';
?>
	</div>
	
	<div id="insert" style="display:none"></div></div>

	<script type="text/javascript" language="javascript" charset="utf-8">
	function GotoPage()
	 {
		var PageNum=document.getElementById('AnyPage').value;
		var Items=<?php echo $pager->ItemNums ?>;
		var Pages=<?php echo $pager->PageNums ?>;
		if(PageNum!=""){
			if(PageNum<=0 || PageNum>Pages ) {alert("页面请求超出范围！");return}
			window.location.href= location.protocol+'//'+location.host+'/MCISP/admin/assistantmanage/assistindex.php?page='+PageNum+'&ItemNums='+Items;
		}
	 }
	 
	$('div#LeftNavi a#AssistAdd').click(function() {
		$('div#add').css('display', 'block');
		$('div#check').css('display', 'none');
		$('div#insert').css('display', 'none');
	});
	
	$('div#LeftNavi a#AssistCheck').click(function() {
		$('div#add').css('display', 'none');
		$('div#check').css('display', 'block');
		$('div#insert').css('display', 'none');
	});
	
	$('div#LeftNavi a#PayMana').click(function() {
		$('div#add').css('display', 'none');
		$('div#check').css('display', 'none');
		$('div#insert').css('display', 'block');
	});
	
	
	function bind()
	{
		$('div#check div#AssistList div.ModelRight input.changeA').click(function(){
			if($(this).attr('value')=='修改'){
				//$(this).parent().parent().parent().css({"color":"#0000FF"});
				var obj = $(this).parent().parent().parent().children().children('span');
				$(obj[0]).html('<input name=AsstNum style="width:100px;" value="'+$(obj[0]).html()+'">');
				$(obj[1]).html('<input name=AsstName  style="width:100px;" value="'+$(obj[1]).html()+'">');
				$(obj[2]).html('<select name=AsstSex><option value=3>不详</option><option value=0>男</option><option value=1>女</option></select>');
				$(obj[3]).html('<input name=BirthDate style="width:80px;" value="'+$(obj[3]).html()+'">');
				 $(obj[4]).html('<input name=Phone style="width:100px;" value="'+$(obj[4]).html()+'">');
				 $(obj[5]).html('<input name=PhoneSNum style="width:70px;" value="'+$(obj[5]).html()+'">');
				 $(obj[6]).html('<input name=Major style="width:220px;" value="'+$(obj[6]).html()+'">');
				 $(obj[7]).html('<select name=Campus><option value=0>所有校区</option><option value=20>南校区</option><option value=10>东校区</option><option value=40>珠海校区</option><option value=30>北校区</option></select>');
				 $(obj[8]).html('<input name=Address style="width:420px;" value="'+$(obj[8]).html()+'">');
				$(obj[9]).html('<input name=IdCardNum style="width:170px;" value="'+$(obj[9]).html()+'">');
				$(obj[10]).html('<input name=EnterDate onclick="new Calendar().show(this);" readonly="readonly" value="'+$(obj[10]).html()+'">');
				$(obj[11]).html('<input name=BankAccount style="width:170px;" value="'+$(obj[11]).html()+'">');
				$(obj[12]).html('<input name=LeaveDate onclick="new Calendar().show(this);" readonly="readonly" value="'+$(obj[12]).html()+'">');
				$(obj[13]).html('<input name=IsAdmin type="radio" value=1 checked="checked"> 是 	<input name=IsAdmin type="radio" value=0> 否');
				$(this).attr('value','确定');
				$(this).next().attr('value','取消');
				$(this).parent().parent().parent().parent().find('div span.ImgShow').css({"display":"block"});
			}else if($(this).attr('value')=='确定'){
				var origin = $(this);
				var obj = $(this).parent().parent().parent().children().children('span');
				
				// $.ajax({
					// url: './update.php',
					// dataType: 'json',
					// type: 'post',
					// data: 'data={"AsstId":"'+$(this).parent().children('span').children('input[name=AsstId]')[0].value+'",'
								// +'"AsstNum":"'+$(this).parent().children('span').children('input[name=AsstNum]')[0].value+'",'
								// +'"AsstName":"'+$(this).parent().children('span').children('input[name=AsstName]')[0].value+'",'
								// +'"AsstSex":"'+$(this).parent().children('span').children('input[name=AsstSex]')[0].value+'",'
								// +'"Campus":"'+$(this).parent().children('span').children('input[name=Campus]')[0].value+'",'
								// +'"IdCardNum":"'+$(this).parent().children('span').children('input[name=IdCardNum]')[0].value+'",'
								// +'"BankAccount":"'+$(this).parent().children('span').children('input[name=BankAccount]')[0].value+'",'
								// +'"Phone":"'+$(this).parent().children('span').children('input[name=Phone]')[0].value+'",'
								// +'"PhoneSNum":"'+$(this).parent().children('span').children('input[name=PhoneSNum]')[0].value+'",'
								// +'"Major":"'+$(this).parent().children('span').children('input[name=Major]')[0].value+'",'
								// +'"Address":"'+$(this).parent().children('span').children('input[name=Address]')[0].value+'",'
								// +'"BirthDate":"'+$(this).parent().children('span').children('input[name=BirthDate]')[0].value+'",'
								// +'"EnterDate":"'+$(this).parent().children('span').children('input[name=EnterDate]')[0].value+'",'
								// +'"LeaveDate":"'+$(this).parent().children('span').children('input[name=LeaveDate]')[0].value+'",'
								// +'"Photo":"'+$(this).parent().children('span').children('input[name=Photo]')[0].value+'"}',
					// success: function(data) {
						// alert(data['msg']);
						// for(var i=0; i<15; i++)
							// $(obj[i]).html($(obj[i]).children('input')[0].value);
						// $(obj[0]).parent().children('input#doche').attr('value','编辑');
						// $(obj[0]).parent().children('input#doclr').attr('value','删除');
					// },
					// error: function(jqXHR, textStatus, errorThrown) {
						// alert(textStatus);
					// }
				// });
					var i=0;
					while(i<=12){
							$(obj[i]).html($(obj[i]).children('input')[0].value);
							i++;
							if(i==2 || i==7) i++;
					}
					$(obj[2]).html($(obj[2]).children('select')[0].value);
					$(obj[7]).html($(obj[7]).children('select')[0].value);
					$(obj[13]).html($(obj[13]).children('input')[0].value);
				$(origin).parent().parent().parent().parent().find('div span.ImgShow').css({"display":"none"});
				$(origin).attr('value','修改');
				$(origin).next().attr('value','删除');
			}
		});
		
		
		$('div#check div#AssistList div.ModelRight input.deleteA').click(function(){
			if($(this).attr('value')=='删除'){			
			
				
			}else if($(this).attr('value')=='取消'){	
				var origin = $(this);
				var obj = $(this).parent().parent().parent().children().children('span');
				var i=0;
					while(i<=12){
							$(obj[i]).html($(obj[i]).children('input')[0].value);
							i++;
							if(i==2 || i==7) i++;
					}
					$(obj[2]).html($(obj[2]).children('select')[0].value);
					$(obj[7]).html($(obj[7]).children('select')[0].value);
					$(obj[13]).html($(obj[13]).children('input')[0].value);
			
				$(this).attr('value','删除');
				$(this).prev().attr('value','修改');
			}
		});
	}
	bind();
</script>

</div>	
	
<?php
	
	//require_once($bottomDir); 
?>

</body>
</html>