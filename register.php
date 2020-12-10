<?php

$username = $_GET['username'];
$passwd = $_GET['passwd'];

if($username && $passwd) {
	include_once("connection/user-register.php");
	$result = user_register($username, $passwd);
	$fp = fopen("demo/demo.html", "r");
	$text = fread($fp, filesize("demo/demo.html"));
	foreach ($result as $name=>$value) {
		$text = str_replace($name, $value, $text);
	}
	echo $text;
	fclose($fp);

} else {
	$fp = fopen("demo/register.html", "r");
	$text = fread($fp, filesize("demo/register.html"));
	echo $text;
	fclose($fp);
}
?>