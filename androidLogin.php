<?php
include("config.php");

$username=$_POST["username"];
$password=$_POST["password"];

$statement=mysqli_prepare($db,"SELECT * FROM dms_users WHERE username = ? AND password = ?");
mysqli_stmt_bind_param($statement, "ss", $username, $password);
mysqli_stmt_execute($statement);

mysqli_stmt_store_result($statement);
mysqli_stmt_bind_result($statement, $userID, $username,$password);

$response=array();
$response["success"]=false;

while(mysqli_stmt_fetch($statement)){
	$response["success"]=true;
	$response["username"]=$username;
	$response["password"]=$password;	
}

echo json_encode($response);
?> 