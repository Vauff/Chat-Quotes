<?php 
	session_start();
	
	if(!isset($_SESSION['username']))
	{
		header("Location: index.php");
	}
	
	require("api.php");
	$mysql = getMysql();

	$mysql->query("UPDATE quotes SET approved=0 WHERE id=".$mysql->real_escape_string($_GET['id']));
	header("Location: quotemanagement.php?approved=false");
?>