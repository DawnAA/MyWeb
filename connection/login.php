<?php
function user_login ($username, $passwd) {
	include_once ("./connection/sql-connect.php");

	$sql = "SELECT * FROM users WHERE username='$username' and passwd='$passwd'";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($result);

	$ret["{replace-href}"] = "index.php";
	if($row) {
		$ret["{replace-title}"] = "SUCCESS";
		$ret["{replace-message}"] = "login success";
	} else {
		$ret["{replace-title}"] = "ERROR";
		$ret["{replace-message}"] = "login fail";
	}
	return $ret;
}
?>