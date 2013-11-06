<?php
session_start();
unset($_SESSION["username"]);
unset($_SESSION["userid"]);
unset($_SESSION['authority']);
echo json_encode(array("result"=>1));