<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/MCISP/config/globalconfig.php';



//文件上传
uploadfile();

function uploadfile()
{
	global $config;
	if(empty($_GET['CKEditorFuncNum']))   //判断是否是非法调用
		mkhtml(1,"","错误的功能调用请求");
	$fn=$_GET['CKEditorFuncNum'];
	if(!in_array($_GET['type'],$config['type']))
		mkhtml(1,"","错误的文件调用请求");


	$type=$_GET['type'];	
	if(is_uploaded_file($_FILES['upload']['tmp_name']))	//判断上传文件是否允许
	{
		$filearr=pathinfo($_FILES['upload']['name']);
		$filetype=$filearr["extension"]; //取得文件后缀
		$filename=$filearr["filename"] . time() . '.' .$filetype; //上传后的文件命名规则,原文件名加上一个unix时间戳来命名
		
		if(!in_array($filetype,$config[$type])){
			mkhtml($fn,"","错误的文件类型！");
		}

		if($_FILES['upload']['size']>$config[$type."_size"]*1024){	//判断文件大小是否符合要求
			mkhtml($fn,"","上传的文件不能超过".$config[$type."_size"]."KB！");
		}

		$file_abso=$config[$type."_dir"]."/".$filename;
		$file_host=$_SERVER['DOCUMENT_ROOT'].$file_abso;

		if(move_uploaded_file($_FILES['upload']['tmp_name'],$file_host))
		{
			mkhtml($fn,$config['site_url'].$file_abso,$config['message']);
		}
		else
		{
			mkhtml($fn,"","文件上传失败，请检查上传目录设置和目录读写权限");
		}
	}
}

function mkhtml($fn,$fileurl,$message)
{
	$str='<script type="text/javascript">window.parent.CKEDITOR.tools.callFunction('.$fn.', \''.$fileurl.'\', \''.$message.'\');</script>';
	exit($str);
}