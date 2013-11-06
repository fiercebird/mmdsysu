<?php
//校区属性，默认值0
$GetCampus=array();
$GetCampus['0']='全部校区';
$GetCampus['10']='东校区';
$GetCampus['20']='南校区';
$GetCampus['21']='南校区第一教学楼';
$GetCampus['22']='南校区逸夫楼';
$GetCampus['23']='南校区第三教学楼';
$GetCampus['24']='南校区文科楼';
$GetCampus['30']='北校区';
$GetCampus['40']='珠海校区';
$GetCampus['100']='未设置';

//课室类型
$GetRoomType=array();
$GetRoomType['0']='未设置';
$GetRoomType['1']='多媒体教室';
$GetRoomType['2']='普通教室';
$GetRoomType['3']='语音教室';
$GetRoomType['4']='专用教室';
$GetRoomType['5']='自动录播多媒体课室';
$GetRoomType['6']='交互式白板的多媒体教室';

//性别属性，默认值3
$GetSex=array();
$GetSex['0']='男';
$GetSex['1']='女';
$GetSex['2']='不男不女';
$GetSex['3']='不详';

//失物状态
$LostState['0']='未认领';
$LostState['1']='移至失物招领中心';
$LostState['2']='已认领';

//0是默认类别，即缺省值
// $GetCateId=array();
// $GetCateId['1']='信息公告';
// $GetCateId['2']='服务指南';
// $GetCateId['3']='部门风采';
// $GetCateId['4']='规章制度';

define("NewNums",12); //首页最新发布显示栏目的条数
define("ServiceNums",9); //首页服务信息显示栏目的条数
define("PageSizes",10);//文章管理后台分页显示的每页条数
define("InfoPageSizes",10);//信息公告前台分页显示的每页条数
define("UserManaSizes",15);//用户管理后台分页显示的每页条数
define("AsstManaSizes",20);//助理管理后台分页显示的每页条数 
define("LostListNums",100);//失物招领前台每次加载显示的条数 

//服务器后台目录
$rootDir=$_SERVER['DOCUMENT_ROOT'];
$adminDir=$rootDir. '/bsman';
$adminHP=$adminDir . '/backStageMan.php';
$publicDir=$rootDir. '/public';
$publicHP=$publicDir. '/index.php';
$topDir=$publicDir. '/top.php';
$bottomDir=$publicDir. '/bottom.php';
$dbDir=$rootDir. '/dbconn';
$dbConnDir=$dbDir.'/DbConn.php'; 
$ArticleManDir=$adminDir. '/Article/articleiIndex.php';

//后台文章管理模块，上传参数设置
$upload_dir=$_SERVER['DOCUMENT_ROOT']."/data/upload";  //上传目录
$config=array();
$config['type']=array("Flash","Images","File"); //上传允许type值
$config['Images']=array("jpg","bmp","jpeg","gif","png"); //Images类型允许后缀
$config['Flash']=array("flv","swf"); //Flash类型允许后缀
$config['File']=array("docx","doc","xls","ppt","pdf","rar","txt",); //File类型允许后缀
$config['Flash_size']=5000; //上传Flash大小上限 单位：KB
$config['Images_size']=5000; //上传img大小上限 单位：KB
$config['File_size']=10000; //上传文件大小上限 单位：KB
$config['message']="上传成功"; //上传成功后显示的消息，若为空则不显示
$config['Flash_dir']=$upload_dir."/flash"; //上传flash文件地址 采用绝对地址 方便upload.php文件放在站内的任何位置 后面不加"/"
$config['Images_dir']=$upload_dir."/img"; //上传img文件地址 采用绝对地址 采用绝对地址 方便upload.php文件放在站内的任何位置 后面不加"/"
$config['File_dir']=$upload_dir."/file"; //上传file文件地址 采用绝对地址 采用绝对地址 方便upload.php文件放在站内的任何位置 后面不加"/"
$config['site_url']=curPageServer(); //网站的网址 这与图片上传后的地址有关 最后不加"/" 可留空


//公用函数
function curPageURL()
{
	$pageURL = 'http';
	if (!empty($_SERVER['HTTPS']))
	{
		$pageURL .= "s";
	}
	
	$pageURL .= "://";
	
	if ($_SERVER["SERVER_PORT"] != "80")
	{
		$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	}
	else
	{
		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	}
	
	return $pageURL;
}

function curPageServer()
{
	$pageURL = 'http';
	if (!empty($_SERVER['HTTPS']))
	{
		$pageURL .= "s";
	}
	
	$pageURL .= "://";
	
	if ($_SERVER["SERVER_PORT"] != "80")
	{
		$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"];
	}
	else 
	{
		$pageURL .= $_SERVER["SERVER_NAME"];
	}
	
	return $pageURL;
}

//用户前端超链接目录
/*
$HP = curPageServer() . '/mmdsysu/MCISP/public/index.php';
$ClassRoomDir=curPageServer() .'/mmdsysu/MCISP/images/classroom';
$InfoNoticeHP = curPageServer() . '/mmdsysu/MCISP/modules/InfoNotice/infoindex.php';
$FeatureHP= curPageServer() . '/mmdsysu/MCISP/modules/Feature/featureindex.php';
$ServiceHP= curPageServer() . '/mmdsysu/MCISP/modules/ServiceGuide/serviceindex.php';
$RegulationHP= curPageServer() . '/mmdsysu/MCISP/modules/Regulations/ruleindex.php';
$MmIntroHP= curPageServer() . '/mmdsysu/MCISP/modules/MMIntroduce/mmintroindex.php';
$CrIntroHP= curPageServer() . '/mmdsysu/MCISP/modules/CRIntroduce/crintroindex.php';
$LostHP= curPageServer() . '/mmdsysu/MCISP/modules/LostThings/lostfoundindex.php';
*/
$HP = '/public/index.php';
$ClassRoomDir='/images/classroom';
$InfoNoticeHP = '/modules/InfoNotice/infoindex.php';
$FeatureHP= '/modules/Feature/featureindex.php';
$ServiceHP= '/modules/ServiceGuide/serviceindex.php';
$RegulationHP= '/modules/Regulations/ruleindex.php';
$MmIntroHP= '/modules/MMIntroduce/mmintroindex.php';
$CrIntroHP= '/modules/CRIntroduce/crintroindex.php';
$LostHP= '/modules/LostThings/lostfoundindex.php';
$SuggestionHP= '/modules/Suggestion/suggestionindex.php';
//常用函数，index为从低位往高位数，从0开始数
	function IsOne($num,$index) //检测第index位是否为1
	{
		$val = 1;
		$val = $val << $index;
		return ($val & $num); 
	}

	function SetOne(&$num,$index)
	{
		$val = 1;
		$val = $val << $index;
		$num= $val | $num;
		return $num;
	}

	function SetZero(&$num,$index)
	{
		$val = 1;
		$val = ~($val << $index);
		$num= $val & $num;
		return $num;
	}
	

	function GetAuthStr($Aut)
	{
		$res='<span style=\'float:left;margin:5px 0px 3px 0px;\'>[前台权限]&nbsp;&nbsp;';	
		$res.='用户管理:';
		if(IsOne($Aut,1))
			$res.='是&nbsp;';
		else
			$res.='否&nbsp;';
		$res.='助理管理:';
		if(IsOne($Aut,2))
			$res.='是&nbsp;';
		else
			$res.='否&nbsp;';
		$res.='首页管理:';
		if(IsOne($Aut,3))
			$res.='是&nbsp;';
		else
			$res.='否&nbsp;';
		$res.='文章管理:';
		if(IsOne($Aut,4))
			$res.='是&nbsp;';
		else
			$res.='否&nbsp;';
		$res.='失物招领:';
		if(IsOne($Aut,5))
			$res.='是&nbsp;';
		else
			$res.='否&nbsp;';	
		$res.='</span><br /><span style=\'float:left;margin:3px 0px 5px 0px;\'>[设备权限]&nbsp;&nbsp;';	
		$res.='检查登记:';
		if(IsOne($Aut,16))
			$res.='是&nbsp;';
		else
			$res.='否&nbsp;';
		$res.='查询统计:';
		if(IsOne($Aut,17))
			$res.='是&nbsp;';
		else
			$res.='否&nbsp;';
		$res.='数据操作:';
		if(IsOne($Aut,18))
			$res.='是&nbsp;';
		else
			$res.='否&nbsp;';
		$res.='服务调查:';
		if(IsOne($Aut,19))
			$res.='是&nbsp;';
		else
			$res.='否&nbsp;';		
		$res.='超级管理员:';
		if(IsOne($Aut,0))
			$res.='是&nbsp;</span>';
		else
			$res.='否&nbsp;</span>';
		return $res;
	}
	
	
	function CreateModel($item,$i){
		global $GetSex;
		global $GetCampus;
		$Admin="否";
		if($item['AsstId']!=0){	
			$Admin="是";
		}
		$ImgSrc="./photo/head.jpg";
		if($item['Photo']!=""){
			$ImgSrc="./photo/".$item['Photo'];
		}
		echo 
		'<div class="Model">
			<div class="ImgBox" >
				<div  id="localImag'.$i.'" style="height:150px;width:120px;">
					<img id="VieImg'. $i .'" style="height:150px;width:120px;border:2px solid #CCCCCC;" src="'.$ImgSrc.'"></img>
				</div>
				<div style="margin:5px 10px;"><span class="ImgShow" style="display:none;"><input type="button" value="上传"   onclick="ImgUpload(\''.$i.'\')" >
					<input type="button" value="重置"   onclick="ImgReset(\''.$i.'\')"></span></div>
				<input type="file" name="ImgFile" id="ImgFile'.$i.'"  onchange="javascript:setImagePreview(\''.$i.'\')" />
			</div>
			<div class="ModelRight">
				<div class="divAI">
					学号：<span style="display:inline-block;width:130px;">'.$item['AsstNum'].'</span>
					姓名：<span style="display:inline-block;width:120px;">'. $item['AsstName'].'</span>
					性别：<span style="display:inline-block;width:70px;">'. $GetSex[ $item['AsstSex'] ] .'</span>		
				</div>		
				<div class="divAI">			
					出生日期：<span style="display:inline-block;width:100px;">'.$item['BirthDate'] .'</span>
					电话：<span style="display:inline-block;width:120px;">'.$item['Phone'].'</span>
					短号：<span style="display:inline-block;width:60px;">'.$item['PhoneSNum'].'</span>
				</div>
				<div class="divAI">
					院系专业：<span style="display:inline-block;width:240px;">'. $item['Major'].'</span>	
					所属校区：<span style="display:inline-block;width:80px;">'. $GetCampus[ $item['Campus'] ] .'</span >				
				</div>
				<div class="divAI">
					详细地址：<span style="display:inline-block;width:400px;">'. $item['Address'].'</span>	
				</div>		
				<div class="divAI">
					身份证号：<span style="display:inline-block;width:200px;">'. $item['IdCardNum'] .'</span>
					入职日期：<span style="display:inline-block;width:120px;">'. $item['EnterDate'] .'</span>
				</div>	
				<div class="divAI">
					银行账户：<span style="display:inline-block;width:200px;">'. $item['BankAccount'].'</span>
					离职日期：<span style="display:inline-block;width:120px;">'.$item['LeaveDate'].'</span>
				</div>
				<div class="divAI" >
					管理员权限：<span>'. $Admin .'</span>	
					<span style="display:inline-block;float:right;margin:10px 10px 0px 0px; "><input type="button" class="changeA" value="修改"/><input type="button" class="deleteA" value="删除"/></span>
				</div>
			</div>
		</div>';
	}
	
	
//分词函数，返回分词结果
function ch_word_segment($text) {  
	/*
    $so = scws_new();        //创建并返回一个SimpledCWS类操作对象  
    $so->set_charset('utf8');       //设定分词词典、规则集、欲分文本字符串的字符集  
    $so->set_multi(SCWS_MULTI_SHORT | SCWS_MULTI_DUALITY);    //设定分词返回结果时是否复式分割，这里设定短词和二元词  
	$so->set_rule('c:/wamp/scws/etc/rules.utf8.ini');
	$so->set_dict('c:/wamp/scws/etc/dict.utf8.xdb');
    $so->send_text($text);    //发送要分词的文本
	
    $first = true;
	$word="";
	while ($res = $so->get_result()) {
        foreach ($res as $tmp) {
            if ($tmp['len'] == 1 && $tmp['word'] == "\r")
                continue;
            if ($tmp['len'] == 1 && $tmp['word'] == "\n")
                $word .= unicode_encode($tmp['word']);
            else
                $word .= unicode_encode($tmp['word']) . " ";
        }
    }
	return $word;
	*/
}

function unicode_encode($word) {  
	$word=iconv('UTF-8','UCS-2LE',$word); //编码转换，假设PHP默认编码为UTF-8，将UTF-8转换为UCS-2LE  
	$len=strlen($word);
	$code="";
	for($i=0;$i<$len-1;$i=$i+2) { //UCS-2LE编码是一个汉字占用两个字节  
		$ch1=$word[$i];       //获取第一个字节的ASCII字符      
		$ch2=$word[$i+1];     //获取第二个字节的ASCII字符  
		$code.=base_convert(ord($ch2),10,16);
		$code.=base_convert(ord($ch1),10,16); //获取字符的ASCII码，再转换为十六进制  
	}
	return $code;  
} 

function str_replace_once($needle, $replace, $haystack) {
	//函数作用，只替换一个字符
	//$needle --- 需要替换的字符
	//$replace --- 替换成什么字符
	//$haystack --- 需要操作的字符串
	$pos = strpos($haystack, $needle);
	if ($pos === false) {
		return $haystack;
	}
	return substr_replace($haystack, $replace, $pos, strlen($needle));
}
	
function html_2_string($html) {
	$html = strip_tags($html);		//去掉 HTML 及 PHP 的标记
	$html = str_replace("\r\n"," ",$html);		//去掉换行符
	$html = str_replace("\n"," ",$html);		//去掉换行符
	$html = str_replace("&nbsp;"," ",$html);		//替换html的转义字符
	$html = str_replace("&lt;","<",$html);
	$html = str_replace("&gt;",">",$html);
	$html = str_replace("&amp;","&",$html);
	$html = str_replace("&quot;","\"",$html);
	$html = str_replace("&apos;","'",$html);
	$html = str_replace("&cent;","￠",$html);
	$html = str_replace("&pound;","£",$html);
	$html = str_replace("&yen;","¥",$html);
	$html = str_replace("&euro;","€",$html);
	$html = str_replace("&sect;","§",$html);
	$html = str_replace("&copy;","©",$html);
	$html = str_replace("&reg;","®",$html);
	$html = str_replace("&trade;","™",$html);
	$html = str_replace("&times;","×",$html);
	$html = str_replace("&divide;","÷",$html);
	return $html;
}



	

?>