<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/MCISP/config/globalconfig.php';
//include_once $dbConnDir;
include_once $_SERVER['DOCUMENT_ROOT'] . "/MCISP/dbconn/DbConn.php";

//照片字段应该存服务器完整路径，以免个人资料模块找不到图片
//助理表的Department字段缺省中
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{	
echo $_FILES["ImgFile"]["type"];
echo $_FILES["ImgFile"]["size"];
echo ($_FILES["ImgFile"]["type"] == "image/jpeg");
echo ($_FILES["ImgFile"]["size"] < 20000);
echo "</br>";
	$photoname="";
	echo "错误: " . $_FILES["ImgFile"]["error"] . "<br />";
	
	if ((($_FILES["ImgFile"]["type"] == "image/gif")
	|| ($_FILES["ImgFile"]["type"] == "image/jpeg")
	|| ($_FILES["ImgFile"]["type"] == "image/png")
	|| ($_FILES["ImgFile"]["type"] == "image/pjpeg"))
	&& ($_FILES["ImgFile"]["size"] < 20000))
	{     
		$filearr=pathinfo($_FILES['ImgFile']['name']);
		$filetype=$filearr["extension"]; //取得文件后缀
		$photoname=$_POST["AsstNum"].'.'. $filetype;
		if ($_FILES["ImgFile"]["error"] > 0)
		{
			echo "错误: " . $_FILES["ImgFile"]["error"] . "<br />";
		}else{
			echo "文件名: " . $_FILES["ImgFile"]["name"] . "<br />";
			echo "文件类型: " . $_FILES["ImgFile"]["type"] . "<br />";
			echo "文件大小: " . ($_FILES["ImgFile"]["size"] / 1024) . " Kb<br />";
			echo "临时副本路径: " . $_FILES["ImgFile"]["tmp_name"];
			
			if (file_exists("photo/" . $photoname))
			{
				echo $photoname . " 文件已存在. ";
			}else{
				move_uploaded_file($_FILES["ImgFile"]["tmp_name"],"photo/" .$photoname);
				echo "最终存储路径: " . "photo/" . $photoname;
			}
		}
	}else if($_FILES["ImgFile"]["name"]==""){
		$photoname="";
	}else{
		echo "上传文件失败！";
		//echo '<script>alert("上传文件失败！");history.go(-1);</script>';
	}

	$misdb_i = new misdb();
	$misdb_i->DbConnect();
	$AsstId=0;
	if($_POST['IsAdmin']==1){
		$sql='insert into Users (UserName,UserPwd,Campus,Authority) values("'. 
		$_POST['AsstNum'] .'","'. md5($_POST['AsstNum']) .'",'. $_POST['Campus'] .',1792)';
		$misdb_i->DbQuery($sql);
		$AsstId=$misdb_i->DbInsId();
		echo $sql;
		echo '</br>';
	}
	
	$sql = 'insert into assistant values('.$AsstId.',"' 
										. $_POST['AsstNum'] . '","'
										. $_POST['AsstName'] . '",' 
										. $_POST['AsstSex'] . ',"",' 
										. $_POST['Campus'] . ',"'
										. $_POST['IdCardNum'] . '","'
										. $_POST['BankAccount'] . '","'
										. $_POST['Phone'] . '","'
										. $_POST['PhoneSNum'] . '","'
										. $_POST['Major'] . '","'
										. $_POST['Address'] . '","'
										. $_POST['BirthDate'] . '","'
										. $_POST['EnterDate'] . '","'
										. $_POST['LeaveDate'] . '","'
										. $photoname.'")';
	$misdb_i->DbQuery($sql);
	echo  $sql;
	echo '</br>';

	$misdb_i->DbClose();
}



?>

<script>
//alert("tes");
</script>