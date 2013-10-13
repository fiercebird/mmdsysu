<?php
session_start();

include_once $_SERVER['DOCUMENT_ROOT'] . "/MCISP/dbconn/DbConn.php";

$misdb_i = new misdb();
$misdb_i->DbConnect();
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$data = $_POST['data'];
	$data = json_decode($data);
	$sql = 'delete from assistant where AsstId="' . $data->AsstId . '"';
	$arr = array();
	if($misdb_i->DbQuery($sql))
		$arr['msg'] = '成功';
	else
		$arr['msg'] = '失败' . $misdb_i->DbError();
	$misdb_i->DbClose();
	echo json_encode($arr);
}