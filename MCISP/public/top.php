<?php
	header("Content-Type: text/html; charset=UTF-8");
	include_once $_SERVER['DOCUMENT_ROOT'].'/config/globalconfig.php';
?>

<script type="text/javascript" language="javascript" charset="utf-8">
	function switchTag(tag,subnav)
	{
		for(i=1; i <=8; i++)
		{
			if ("Tag"+i==tag)
			{
				document.getElementById("Tag"+i).className="NavSel";
				
			}else{
				document.getElementById("Tag"+i).className="NavShow";
				
			}
			if ("SubNav"+i==subnav)
			{
				document.getElementById(subnav).className="";
			}else{
				document.getElementById("SubNav"+i).className="Hidecontent";
			}
			//document.getElementById("subnav").className="";
		}
	}
	
	function loginAction()
	{
		if (UserLogin.username.value=="用户名" || UserLogin.username.value=="" || UserLogin.password.value=="密码" || UserLogin.password.value=="")
			return alert("用户名或密码不能为空！");
		$.ajax({
			url: location.protocol+'//'+location.host+'/mmdsysu/MCISP/public/action/loginAction.php',
			dataType: 'json',
			type: 'post',
			data: 'data={"username":"'+$('#username')[0].value+'","password":"'+hex_md5($('#password')[0].value)+'"}',
			success: function(data1) {
				if(data1['result']===1) {
					window.location.href= location.protocol+'//'+location.host+'/mmdsysu/MCISP/bsman/backStageMan.php';
				}else{
					alert("用户名或密码错误！");
				}
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert("登录请求错误:"+textStatus+ " " + errorThrown);
			}
		});
	}

	function logoutAction()
	{
		$.ajax({
			url: location.protocol+'//'+location.host+'/mmdsysu/MCISP/public/action/logoutAction.php',
			dataType: 'json',
			type: 'post',
			success: function(data) {
				if(data['result']===1) {
					window.location.href= location.protocol+'//'+location.host+'/mmdsysu/MCISP/public/index.php' ;
				}
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert("退出请求错误:"+textStatus+ " " + errorThrown);
			}
		});
	}
	
	function manageAction()
	{
		window.location.href= location.protocol+'//'+location.host+'/mmdsysu/MCISP/bsman/backStageMan.php';
	}
	
	function usernameFocus()
	{
		if (UserLogin.username.value =='用户名'){
			UserLogin.username.value ='';
			UserLogin.username.style.color='#000000';
		}
	}
	
	function usernameBlur()
	{
		if (UserLogin.username.value ==''){
			UserLogin.username.value='用户名';
			UserLogin.username.style.color='#CCC';
		}
	}
	
	function FakePwdFocus()
	{	
		if(UserLogin.fakepwd.value=="密码") {  
			UserLogin.fakepwd.style.display="none"; 
			UserLogin.password.style.display="";
			UserLogin.password.style.color="#000000";
			UserLogin.password.value="";
			UserLogin.password.focus();
			
		}
	}
	
	function RealPwdBlur()
	{
		if(UserLogin.password.value ==''){
			UserLogin.password.style.display="none";
			UserLogin.password.style.color="#CCCCCC";
			UserLogin.fakepwd.style.display=""; 
		}
	}
	
	function KeyShow(e)
	{
		var keynum;
		if(window.event) // IE
		{
			keynum = e.keyCode;
		}
		else if(e.which) // Netscape/Firefox/Opera
		{
			keynum = e.which;
		}
		//alert(keynum);
		if(keynum==13){ //按下回车键， 则触发登陆按钮
			document.getElementById("loginbtn").click(); 
		}
	}
</script>

<a name="AnchorTopNav"></a> 
<div id="Header">
<!-- 页面顶部的锚，用于快速定位同一页面的导航栏控件 -->
	<div class="Logo"></div>



</div>
<!-- header end -->
<!-- nav begin -->
<div id="Nav">
	<a href="<?php echo $HP ?>"><span class="NavShow" id="Tag1" onMouseOver="switchTag('Tag1','SubNav1');this.blur();">&nbsp;首页</span></a>
	<a href="<?php echo $CrIntroHP ?>"><span class="NavShow" id="Tag2" onMouseOver="switchTag('Tag2','SubNav2');this.blur();">&nbsp;课室介绍</span></a>
	<a href="<?php echo $ServiceHP.'?TypeId=1' ?>"><span class="NavShow" id="Tag3" onMouseOver="switchTag('Tag3','SubNav3');this.blur();">&nbsp;服务资讯</span></a>
	<a href="<?php echo  $InfoNoticeHP. '?CateId=1&CatyName=信息公告' ?>"><span class="NavShow" id="Tag4" onMouseOver="switchTag('Tag4','SubNav4');this.blur();">&nbsp;信息公告</span></a>
	<a href="<?php echo  $RegulationHP ?>"><span class="NavShow" id="Tag5" onMouseOver="switchTag('Tag5','SubNav5');this.blur();">&nbsp;规章制度</span></a>
	<a href="<?php echo  $MmIntroHP  ?>"><span class="NavShow" id="Tag6" onMouseOver="switchTag('Tag6','SubNav6');this.blur();">&nbsp;多媒体风采</span></a>
	<a href="<?php echo  $LostHP ?>"><span class="NavShow" id="Tag7" onMouseOver="switchTag('Tag7','SubNav7');this.blur();">&nbsp;失物招领</span></a>
	<a href="<?php echo $FeatureHP. '?CateId=1' ?>"><span class="NavShow" id="Tag8" onMouseOver="switchTag('Tag8','SubNav8');this.blur();">&nbsp;特色系统</span></a>
</div>
<!-- nav end -->
<!-- SubNav begin -->
<div id="SubNav">
	<div id="SubNav1" class="Hidecontent"></div> 	
	<div id="SubNav2" class="Hidecontent">
		<a href="<?php echo $CrIntroHP. '?CampusId=10' ?>">东校区</a>　|　
		<a href="<?php echo $CrIntroHP. '?CampusId=20' ?>">南校区</a>　|　
		<a href="<?php echo $CrIntroHP. '?CampusId=40' ?>">珠海校区</a>　|　
		<a href="<?php echo $CrIntroHP. '?CampusId=30' ?>">北校区</a>
	</div> 		
	<div id="SubNav3" class="Hidecontent">
		<a href="<?php echo $ServiceHP .'?TypeId=1'?>">校区地图</a>　|　
		<a href="<?php echo $ServiceHP .'?TypeId=2'?>">校车查询</a>　|　
		<a href="<?php echo $ServiceHP .'?TypeId=3'?>">课室借用</a>
	</div> 	
	<div id="SubNav4" class="Hidecontent">
		<a href="<?php echo $InfoNoticeHP . '?CateId=1&CatyName=信息公告' ?>">信息公告</a>　|　
		<a href="<?php echo $InfoNoticeHP . '?CateId=2&CatyName=服务指南' ?>">服务指南</a>　|　
		<a href="<?php echo $InfoNoticeHP . '?CateId=3&CatyName=部分风采' ?>">部分风采</a>　|　
		<a href="<?php echo $InfoNoticeHP . '?CateId=4&CatyName=规章制度' ?>">规章制度</a>
	</div> 	
	<div id="SubNav5" class="Hidecontent">
	</div> 	
	<!--
	<div id="SubNav6" class="Hidecontent">
		<a href="#">东校区</a> 　|　
		<a href="#">南校区</a>　|　
		<a href="#">珠海校区</a>　|　
		<a href="#">北校区</a>
	</div> 	
	-->
	<div id="SubNav7" class="Hidecontent">   
		<a href="<?php echo $LostHP. '?CampusId=10' ?>">东校区</a>　|　
		<a href="<?php echo $LostHP. '?CampusId=20' ?>">南校区</a>　|　
		<a href="<?php echo $LostHP. '?CampusId=40' ?>">珠海校区</a>　|　
		<a href="<?php echo $LostHP. '?CampusId=30' ?>">北校区</a>
	</div> 		
	<div id="SubNav8" class="Hidecontent">
		<a href="<?php echo $FeatureHP. '?CateId=1' ?>">卓越全自动录播技术</a>　|　
		<a href="<?php echo $FeatureHP. '?CateId=2' ?>">普罗米休斯互动教学方案</a>	
	</div> 
</div>
<!-- SubNav end -->