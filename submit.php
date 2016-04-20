<?php 
	require("api.php");
	$mysql = getMysql();
	
	$mysql->query("INSERT INTO quotes (title, submitter, approved, quote, time) VALUES ('".$mysql->real_escape_string($_GET['title'])."', '".$mysql->real_escape_string($_GET['nick'])."', '0', '".$mysql->real_escape_string($_GET['quote'])."', '".$mysql->real_escape_string(time())."')");
	header("Location: index.php?submitted=true");
?>