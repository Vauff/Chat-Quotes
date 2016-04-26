<?php 
	session_start();
	require("api.php");
	$mysql = getMysql();
	
	if($_POST['title'] == null || $_POST['quote'] == null || $_POST['nick'] == null)
	{
		echo "You did not fill out everything.";
		return;
	}

	$mysql->query("INSERT INTO quotes (title, submitter, approved, quote, time) VALUES ('".$mysql->real_escape_string($_POST['title'])."', '".$mysql->real_escape_string($_POST['nick'])."', '0', '".$mysql->real_escape_string($_POST['quote'])."', '".$mysql->real_escape_string(time())."')");
	echo true;
?>