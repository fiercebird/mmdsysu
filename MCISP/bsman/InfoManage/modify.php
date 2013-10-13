<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/mmdsysu/MCISP/config/globalconfig.php';
include_once $dbConnDir;

include_once dirname(__FILE__) . '/../../dbconn/DbConn.php';

$misdb_i = new misdb();
$misdb_i->DbConnect();
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$data = $_POST['data'];
	$data = json_decode($data);
	$sql = 'update assistant set AsstNum="' . $data->AsstNum . '",' .
								'AsstName="' . $data->AsstName . '",' .
								'AsstSex="' . $data->AsstSex . '",' .
								'Campus="' . $data->Campus . '",' .
								'IdCardNum="' . $data->IdCardNum . '",' .
								'BankAccount="' . $data->BankAccount . '",' .
								'Phone="' . $data->Phone . '",' .
								'PhoneSNum="' . $data->PhoneSNum . '",' .
								'Major="' . $data->Major . '",' .
								'Address="' . $data->Address . '",' .
								'BirthDate="' . $data->BirthDate . '",' .
								'EnterDate="' . $data->EnterDate . '",' .
								'LeaveDate="' . $data->LeaveDate . '",' .
								'Photo="' . $data->Photo . '"' .
								' where AsstId=' . $_SESSION['userid'];
	$misdb_i->DbQuery($sql); 
	$misdb_i->DbClose();
	echo json_encode(array('result'=>1));
}