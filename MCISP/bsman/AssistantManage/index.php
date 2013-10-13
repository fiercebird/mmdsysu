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
	<link href="../../css/layout.css" rel="stylesheet" type="text/css" />
	<link href="../../css/screen.css" rel="stylesheet" type="text/css" />
	<link href="../../css/jquery-ui.css" rel="stylesheet" type="text/css" />
	<script language=javascript src="../../js/jquery-1.8.3.min.js"></script>
	<script language=javascript src="../../js/jquery-ui.js"></script>
	<script language=javascript src="../../js/jquery.form.js"></script>
</head>

<body>

<div id="navi">
	<a id="2add">新增助理</a>
	<br>
	<a id="2check">查看旧助理</a>
	<br>
	<a id="2delete">删除助理</a>
	<br>
	<a id="2insert">插入工资</a>
</div>

<div id="add">
	<center>
		<form id="myForm" action="add.php" method="post" enctype="multipart/form-data"> 
		<table>
			<tr><th>id：</th><td><input name=AsstId></td></tr>
			<tr><th>学号：</th><td><input name=AsstNum></td></tr>
			<tr><th>姓名：</th><td><input name=AsstName></td></tr>
			<tr><th>性别：</th><td><input name=AsstSex></td></tr>
			<tr><th>校区：</th><td><input name=Campus></td></tr>
			<tr><th>Id卡号：</th><td><input name=IdCardNum></td></tr>
			<tr><th>银行账户：</th><td><input name=BankAccount></td></tr>
			<tr><th>电话：</th><td><input name=Phone></td></tr>
			<tr><th>短号：</th><td><input name=PhoneSNum></td></tr>
			<tr><th>专业：</th><td><input name=Major></td></tr>
			<tr><th>地址：</th><td><input name=Address></td></tr>
			<tr><th>出生日期：</th><td><input name=BirthDate></td></tr>
			<tr><th>进入日期：</th><td><input name=EnterDate></td></tr>
			<tr><th>离开日期：</th><td><input name=LeaveDate></td></tr>
			<tr><th>照片：</th><td><input type="file" name=Photo><br>
			<tr><td><input type="submit" value="添加"></td></tr>
		</table>
		</form>
	</center>

<script>
	var options = { 
        //target:        '#output1',   // target element(s) to be updated with server response 
        beforeSubmit:  showRequest,  // pre-submit callback 
        success:       showResponse  // post-submit callback 
 
        // other available options: 
        //url:       url         // override for form's 'action' attribute 
        //type:      type        // 'get' or 'post', override for form's 'method' attribute 
        //dataType:  null        // 'xml', 'script', or 'json' (expected server response type) 
        //clearForm: true        // clear all form fields after successful submit 
        //resetForm: true        // reset the form after successful submit 
 
        // $.ajax options can be used here too, for example: 
        //timeout:   3000 
    };
	
	// pre-submit callback 
	function showRequest(formData, jqForm, options) {
		// formData is an array; here we use $.param to convert it to a string to display it 
		// but the form plugin does this for you automatically when it submits the data 
		var queryString = $.param(formData); 
	 
		// jqForm is a jQuery object encapsulating the form element.  To access the 
		// DOM element for the form do this: 
		// var formElement = jqForm[0]; 
	 
		// alert('About to submit: \n\n' + queryString); 
	 
		// here we could return false to prevent the form from being submitted; 
		// returning anything other than false will allow the form submit to continue 
		return true; 
	}
	 
	// post-submit callback 
	function showResponse(responseText, statusText, xhr, $form) {
		// for normal html responses, the first argument to the success callback 
		// is the XMLHttpRequest object's responseText property 
	 
		// if the ajaxForm method was passed an Options Object with the dataType 
		// property set to 'xml' then the first argument to the success callback 
		// is the XMLHttpRequest object's responseXML property 
	 
		// if the ajaxForm method was passed an Options Object with the dataType 
		// property set to 'json' then the first argument to the success callback 
		// is the json data object returned by the server 
	 
		// alert('status: ' + statusText + '\n\nresponseText: \n' + responseText + 
			// '\n\nThe output div should have already been updated with the responseText.'); 
	}

	$('#myForm').ajaxForm(options); 

	// $('div#add #submit').click(function() {
		// $.ajax({
				// url: './add.php',
				// dataType: 'json',
				// type: 'post',
				// data: 'data={"AsstId":"'+$('div#add input[name=AsstId]')[0].value+'",'
							// +'"AsstNum":"'+$('div#add input[name=AsstNum]')[0].value+'",'
							// +'"AsstName":"'+$('div#add input[name=AsstName]')[0].value+'",'
							// +'"AsstSex":"'+$('div#add input[name=AsstSex]')[0].value+'",'
							// +'"Campus":"'+$('div#add input[name=Campus]')[0].value+'",'
							// +'"IdCardNum":"'+$('div#add input[name=IdCardNum]')[0].value+'",'
							// +'"BankAccount":"'+$('div#add input[name=BankAccount]')[0].value+'",'
							// +'"Phone":"'+$('div#add input[name=Phone]')[0].value+'",'
							// +'"PhoneSNum":"'+$('div#add input[name=PhoneSNum]')[0].value+'",'
							// +'"Major":"'+$('div#add input[name=Major]')[0].value+'",'
							// +'"Address":"'+$('div#add input[name=Address]')[0].value+'",'
							// +'"BirthDate":"'+$('div#add input[name=BirthDate]')[0].value+'",'
							// +'"EnterDate":"'+$('div#add input[name=EnterDate]')[0].value+'",'
							// +'"LeaveDate":"'+$('div#add input[name=LeaveDate]')[0].value+'",'
							// +'"Photo":"'+$('div#add input[name=Photo]')[0].value+'"}',
				// success: function(data) {
					// alert(data['msg']);
				// },
				// error: function(jqXHR, textStatus, errorThrown) {
					// alert(textStatus);
				// }
			// });
	// });
</script>

</div>

<div id="check" style="display:none">
</div>

<div id="delete" style="display:none">
	<div id="che">
		id：<span><input name=AsstId></span>
		学号：<span><input name=AsstNum></span>
		姓名：<span><input name=AsstName></span>
		性别：<span><input name=AsstSex></span>
		校区：<span><input name=Campus></span>
		Id卡号：<span><input name=IdCardNum></span>
		银行账户：<span><input name=BankAccount></span>
		电话：<span><input name=Phone></span>
		短号：<span><input name=PhoneSNum></span>
		专业：<span><input name=Major></span>
		地址：<span><input name=Address></span>
		出生日期：<span><input name=BirthDate></span>
		进入日期：<span><input name=EnterDate></span>
		离开日期：<span><input name=LeaveDate></span>
		照片：<span><input name=Photo></span>
		<input type="button" id="doche" value="查询">
		<input type="button" id="doclr" value="重置">
	</div>
	
<script>
	var ajaxIns;
	var assts;

	$('div#delete div#che input[type!="button"]').keyup(function(){check();});
	$('div#delete div#che input#doche').click(function(){check();});
	$('div#delete div#che input#doclr').click(function(){
		$('div#delete div#che input[type!="button"]').attr('value','');
		$('div#delete div#res').remove();
	});
	
	function check() {
		if(ajaxIns)
			ajaxIns.abort();

		ajaxIns = $.ajax({
			url: './get.php',
			dataType: 'json',
			type: 'post',
			data: 'data={"AsstId":"'+$('div#delete div#che input[name=AsstId]')[0].value+'",'
						+'"AsstNum":"'+$('div#delete div#che input[name=AsstNum]')[0].value+'",'
						+'"AsstName":"'+$('div#delete div#che input[name=AsstName]')[0].value+'",'
						+'"AsstSex":"'+$('div#delete div#che input[name=AsstSex]')[0].value+'",'
						+'"Campus":"'+$('div#delete div#che input[name=Campus]')[0].value+'",'
						+'"IdCardNum":"'+$('div#delete div#che input[name=IdCardNum]')[0].value+'",'
						+'"BankAccount":"'+$('div#delete div#che input[name=BankAccount]')[0].value+'",'
						+'"Phone":"'+$('div#delete div#che input[name=Phone]')[0].value+'",'
						+'"PhoneSNum":"'+$('div#delete div#che input[name=PhoneSNum]')[0].value+'",'
						+'"Major":"'+$('div#delete div#che input[name=Major]')[0].value+'",'
						+'"Address":"'+$('div#delete div#che input[name=Address]')[0].value+'",'
						+'"BirthDate":"'+$('div#delete div#che input[name=BirthDate]')[0].value+'",'
						+'"EnterDate":"'+$('div#delete div#che input[name=EnterDate]')[0].value+'",'
						+'"LeaveDate":"'+$('div#delete div#che input[name=LeaveDate]')[0].value+'",'
						+'"Photo":"'+$('div#delete div#che input[name=Photo]')[0].value+'"}',
						
			success: function(data) {
				$('div#delete div#res').remove();
				assts = data['assts'];
				for(var i=0; i<assts.length; i++) {
					if(i==5)
						break;
					var newDiv = $('<div id="res"></div>');
					newDiv.html($('div#delete div#che').html());
					newDiv.appendTo($('div#delete'));
					newDiv.children('span').children('input[name=AsstId]').parent().html(assts[i]['AsstId']);
					newDiv.children('span').children('input[name=AsstNum]').parent().html(assts[i]['AsstNum']);
					newDiv.children('span').children('input[name=AsstName]').parent().html(assts[i]['AsstName']);
					newDiv.children('span').children('input[name=AsstSex]').parent().html(assts[i]['AsstSex']);
					newDiv.children('span').children('input[name=Campus]').parent().html(assts[i]['Campus']);
					newDiv.children('span').children('input[name=IdCardNum]').parent().html(assts[i]['IdCardNum']);
					newDiv.children('span').children('input[name=BankAccount]').parent().html(assts[i]['BankAccount']);
					newDiv.children('span').children('input[name=Phone]').parent().html(assts[i]['Phone']);
					newDiv.children('span').children('input[name=PhoneSNum]').parent().html(assts[i]['PhoneSNum']);
					newDiv.children('span').children('input[name=Major]').parent().html(assts[i]['Major']);
					newDiv.children('span').children('input[name=Address]').parent().html(assts[i]['Address']);
					newDiv.children('span').children('input[name=BirthDate]').parent().html(assts[i]['BirthDate']);
					newDiv.children('span').children('input[name=EnterDate]').parent().html(assts[i]['EnterDate']);
					newDiv.children('span').children('input[name=LeaveDate]').parent().html(assts[i]['LeaveDate']);
					newDiv.children('span').children('input[name=Photo]').parent().html(assts[i]['Photo']);
					newDiv.children('input#doche').attr('value','编辑');
					newDiv.children('input#doclr').attr('value','删除');
				}
				bind();
			},
			error: function(jqXHR, textStatus, errorThrown) {
			}
		});
	}
	
	function bind(){
		$('div#delete div#res #doclr').click(function(){
			if($(this).attr('value')=='删除'){
				var obj = $(this).parent();
				$.ajax({
					url: './delete.php',
					dataType: 'json',
					type: 'post',
					data: 'data={"AsstId":"'+obj.children('span').html()+'"}',
					success: function(data) {
						alert(data['msg']);
						obj.remove();
					},
					error: function(jqXHR, textStatus, errorThrown) {
						alert(textStatus);
					}
				});
			}
			else if($(this).attr('value')=='取消'){
				var n = $('div#delete div#res #doclr').index(this);
				var obj = $(this).parent().children('span');
				$(obj[0]).html(assts[n]['AsstId']);
				$(obj[1]).html(assts[n]['AsstNum']);
				$(obj[2]).html(assts[n]['AsstName']);
				$(obj[3]).html(assts[n]['AsstSex']);
				$(obj[4]).html(assts[n]['Campus']);
				$(obj[5]).html(assts[n]['IdCardNum']);
				$(obj[6]).html(assts[n]['BankAccount']);
				$(obj[7]).html(assts[n]['Phone']);
				$(obj[8]).html(assts[n]['PhoneSNum']);
				$(obj[9]).html(assts[n]['Major']);
				$(obj[10]).html(assts[n]['Address']);
				$(obj[11]).html(assts[n]['BirthDate']);
				$(obj[12]).html(assts[n]['EnterDate']);
				$(obj[13]).html(assts[n]['LeaveDate']);
				$(obj[14]).html(assts[n]['Photo']);
				$(this).attr('value','删除');
				$(this).parent().children('input#doche').attr('value','编辑');
			}
		});
		
		$('div#delete div#res #doche').click(function(){
			if($(this).attr('value')=='编辑'){
				var obj = $(this).parent().children('span');
				$(obj[0]).html('<input name=AsstId value="'+$(obj[0]).html()+'">');
				$(obj[1]).html('<input name=AsstNum value="'+$(obj[1]).html()+'">');
				$(obj[2]).html('<input name=AsstName value="'+$(obj[2]).html()+'">');
				$(obj[3]).html('<input name=AsstSex value="'+$(obj[3]).html()+'">');
				$(obj[4]).html('<input name=Campus value="'+$(obj[4]).html()+'">');
				$(obj[5]).html('<input name=IdCardNum value="'+$(obj[5]).html()+'">');
				$(obj[6]).html('<input name=BankAccount value="'+$(obj[6]).html()+'">');
				$(obj[7]).html('<input name=Phone value="'+$(obj[7]).html()+'">');
				$(obj[8]).html('<input name=PhoneSNum value="'+$(obj[8]).html()+'">');
				$(obj[9]).html('<input name=Major value="'+$(obj[9]).html()+'">');
				$(obj[10]).html('<input name=Address value="'+$(obj[10]).html()+'">');
				$(obj[11]).html('<input name=BirthDate value="'+$(obj[11]).html()+'">');
				$(obj[12]).html('<input name=EnterDate value="'+$(obj[12]).html()+'">');
				$(obj[13]).html('<input name=LeaveDate value="'+$(obj[13]).html()+'">');
				$(obj[14]).html('<input name=Photo value="'+$(obj[14]).html()+'">');
				$(this).attr('value','确定');
				$(this).parent().children('input#doclr').attr('value','取消');
			}
			else if($(this).attr('value')=='确定'){
				var obj = $(this).parent().children('span');
				$.ajax({
					url: './update.php',
					dataType: 'json',
					type: 'post',
					data: 'data={"AsstId":"'+$(this).parent().children('span').children('input[name=AsstId]')[0].value+'",'
								+'"AsstNum":"'+$(this).parent().children('span').children('input[name=AsstNum]')[0].value+'",'
								+'"AsstName":"'+$(this).parent().children('span').children('input[name=AsstName]')[0].value+'",'
								+'"AsstSex":"'+$(this).parent().children('span').children('input[name=AsstSex]')[0].value+'",'
								+'"Campus":"'+$(this).parent().children('span').children('input[name=Campus]')[0].value+'",'
								+'"IdCardNum":"'+$(this).parent().children('span').children('input[name=IdCardNum]')[0].value+'",'
								+'"BankAccount":"'+$(this).parent().children('span').children('input[name=BankAccount]')[0].value+'",'
								+'"Phone":"'+$(this).parent().children('span').children('input[name=Phone]')[0].value+'",'
								+'"PhoneSNum":"'+$(this).parent().children('span').children('input[name=PhoneSNum]')[0].value+'",'
								+'"Major":"'+$(this).parent().children('span').children('input[name=Major]')[0].value+'",'
								+'"Address":"'+$(this).parent().children('span').children('input[name=Address]')[0].value+'",'
								+'"BirthDate":"'+$(this).parent().children('span').children('input[name=BirthDate]')[0].value+'",'
								+'"EnterDate":"'+$(this).parent().children('span').children('input[name=EnterDate]')[0].value+'",'
								+'"LeaveDate":"'+$(this).parent().children('span').children('input[name=LeaveDate]')[0].value+'",'
								+'"Photo":"'+$(this).parent().children('span').children('input[name=Photo]')[0].value+'"}',
					success: function(data) {
						alert(data['msg']);
						for(var i=0; i<15; i++)
							$(obj[i]).html($(obj[i]).children('input')[0].value);
						$(obj[0]).parent().children('input#doche').attr('value','编辑');
						$(obj[0]).parent().children('input#doclr').attr('value','删除');
					},
					error: function(jqXHR, textStatus, errorThrown) {
						alert(textStatus);
					}
				});
			}
		});
	}
	
</script>

</div>

<div id="insert" style="display:none">
</div>

<script>
	$('div#navi a#2add').click(function() {
		$('div#add').css('display', 'block');
		$('div#check').css('display', 'none');
		$('div#delete').css('display', 'none');
		$('div#insert').css('display', 'none');
	});
	
	$('div#navi a#2check').click(function() {
		$('div#add').css('display', 'none');
		$('div#check').css('display', 'block');
		$('div#delete').css('display', 'none');
		$('div#insert').css('display', 'none');
	});
	
	$('div#navi a#2delete').click(function() {
		$('div#add').css('display', 'none');
		$('div#check').css('display', 'none');
		$('div#delete').css('display', 'block');
		$('div#insert').css('display', 'none');
	});
	
	$('div#navi a#2insert').click(function() {
		$('div#add').css('display', 'none');
		$('div#check').css('display', 'none');
		$('div#delete').css('display', 'none');
		$('div#insert').css('display', 'block');
	});
</script>

</body>