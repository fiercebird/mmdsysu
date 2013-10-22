<?php
session_start();

include_once $_SERVER['DOCUMENT_ROOT'] . "/MCISP/dbconn/DbConn.php";

$misdb_i = new misdb();
$misdb_i->DbConnect();
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$data = $_POST['data'];
	$data = json_decode($data);
	$sql = 'select * from assistant where AsstId like "%' . $data->AsstId . '%" and ' .
										'AsstNum like "%' . $data->AsstNum . '%" and ' .
										'AsstName like "%' . $data->AsstName . '%" and ' .
										'AsstSex like "%' . $data->AsstSex . '%" and ' .
										'Campus like "%' . $data->Campus . '%" and ' .
										'IdCardNum like "%' . $data->IdCardNum . '%" and ' .
										'BankAccount like "%' . $data->BankAccount . '%" and ' .
										'Phone like "%' . $data->Phone . '%" and ' .
										'PhoneSNum like "%' . $data->PhoneSNum . '%" and ' .
										'Major like "%' . $data->Major . '%" and ' .
										'Address like "%' . $data->Address . '%" and ' .
										'BirthDate like "%' . $data->BirthDate . '%" and ' .
										'EnterDate like "%' . $data->EnterDate . '%" and ' .
										'LeaveDate like "%' . $data->LeaveDate . '%" and ' .
										'Photo like "%' . $data->Photo . '%"';
	$result = $misdb_i->DbQuery($sql);
	$arr = array();
	while ($row = $misdb_i->DbResult($result)) {
		array_push($arr, $row);
	}
	$misdb_i->DbClose();
	echo json_encode(array('assts'=>$arr));
}