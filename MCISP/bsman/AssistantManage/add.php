<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/mmdsysu/MCISP/config/globalconfig.php';
include_once $dbConnDir;

print_r($_FILES["Photo"]);
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{	
	if (($_FILES["Photo"]["type"] == "image/jpeg")
		&& ($_FILES["Photo"]["size"] < 200000)) {
		if ($_FILES["Photo"]["error"] > 0)
		{
			echo json_encode(array('msg'=>"Return Code: " . $_FILES["Phone"]["error"]));
			exit;
		}
		else
		{
			move_uploaded_file($_FILES["Photo"]["tmp_name"], "photo/" . $_POST["AsstNum"] . ".jpg");
		}
	}
	else
	{
		echo json_encode(array('msg'=>"Invalid file"));
		exit;
	}

	$misdb_i = new misdb();
	$misdb_i->DbConnect();
	$sql = 'insert into assistant values("' . $_POST['AsstId'] . '",' .
										'"' . $_POST['AsstNum'] . '",' .
										'"' . $_POST['AsstName'] . '",' .
										'"' . $_POST['AsstSex'] . '",' .
										'"' . $_POST['Campus'] . '",' .
										'"' . $_POST['IdCardNum'] . '",' .
										'"' . $_POST['BankAccount'] . '",' .
										'"' . $_POST['Phone'] . '",' .
										'"' . $_POST['PhoneSNum'] . '",' .
										'"' . $_POST['Major'] . '",' .
										'"' . $_POST['Address'] . '",' .
										'"' . $_POST['BirthDate'] . '",' .
										'"' . $_POST['EnterDate'] . '",' .
										'"' . $_POST['LeaveDate'] . '",' .
										'"' . $_POST['AsstNum'] . '.jpg")';
	if($misdb_i->DbQuery($sql))
		$arr['msg'] = '成功';
	else
		$arr['msg'] = '失败' . $misdb_i->DbError();
	$misdb_i->DbClose();
	echo json_encode($arr);
}