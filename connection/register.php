<?php
function user_register ($username, $passwd) {
	include_once ("./connection/sql-connect.php");

	$sql = "SELECT * FROM users WHERE username='$username'";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($result);

	$ret["{replace-href}"] = "register.php";
	if($row) {
		$ret["{replace-title}"] = "SUCCESS";
		$ret["{replace-message}"] = "User already exists";
	} else {
		$sql = "INSERT INTO users VALUE('$username','$passwd')";
		$result = mysqli_query($con, $sql);
		$ret["{replace-title}"] = "ERROR";
		$ret["{replace-message}"] = "Register success!";
	}
	return $ret;
}
?>