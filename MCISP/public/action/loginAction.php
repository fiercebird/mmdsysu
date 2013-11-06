<?php
session_start();

include_once $_SERVER['DOCUMENT_ROOT'] . '/mmdsysu/MCISP/config/globalconfig.php';
include $dbConnDir;

$data = $_POST['data'];
$data = json_decode($data);

$misdb_i = new misdb();
$misdb_i->DbConnect();
$result = $misdb_i->DbQuery('select * from Users where UserName="' . $data->username . '" and UserPwd="' . $data->password . '"');

$arr = array();
if ($row = $misdb_i->DbResult($result))
{
	$arr['result'] = 1;
	//$_SESSION['username'] = $data->username;
	$_SESSION['username'] = $row['UserName'];
	$_SESSION['userid'] = $row['UserId'];
	$_SESSION['authority'] = $row['Authority'];
}
else
	$arr['result'] = 0;
	
$misdb_i->DbFree($result);
$misdb_i->DbClose();
// mysql_free_result($result);

echo json_encode($arr);