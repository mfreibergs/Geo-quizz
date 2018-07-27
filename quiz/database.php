<?php
//Create connection credentials
$db_host = '127.0.0.1';
$db_name = 'quiz';
$db_user = 'root';
$db_pass = 'newpassword';

//Create mysqli object
$mysqli = new MySQLi($db_host, $db_user, $db_pass, $db_name);


//Error Handler
if($mysqli->connect_error){
	printf("Connect failed: %s\n", $mysqli->connect_error);
	exit();
}
