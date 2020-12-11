<?php
function check_user($username, $passwd) {
	switch (1) {
		case strlen($username) > 18:
		case strlen($passwd) < 5:
		case strlen($passwd) > 18:
			return 0;
		default:
			return 1;
	}
}

function user_login ($username, $passwd) {

	if(!check_user($username, $passwd)) {
		$ret["{replace-title}"] = "WARNING";
		$ret["{replace-message}"] = "What're you doing now??!";
		return $ret;
	}

	include_once ("./connection/sql-connect.php");

	$passwd_md5 = md5($passwd);
	$sql = "SELECT * FROM users WHERE username='$username' and passwd='$passwd_md5'";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($result);

	$ret["{replace-href}"] = "index.php";
	if($row) {
		$ret["{replace-title}"] = "SUCCESS";
		$ret["{replace-message}"] = "login success";
	} else {
		$ret["{replace-title}"] = "WRONG";
		$ret["{replace-message}"] = "password wrong";
	}
	return $ret;
}
?>