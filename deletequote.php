<?php 
	session_start();
	
	if(!isset($_SESSION['username']))
	{
		header("Location: index.php");
	}
	
	require("api.php");
	$mysql = getMysql();
	$id = $mysql->real_escape_string($_GET['id']);

	$mysql->query("DELETE FROM quotes WHERE id=".$id);
	$ainc = $mysql->query("SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA='quotes' AND TABLE_NAME='quotes'")->fetch_assoc()['AUTO_INCREMENT'];
	$mysql->query("ALTER TABLE quotes AUTO_INCREMENT=".($ainc - 1));
	
	$quotes = $mysql->query("SELECT * FROM quotes WHERE id>".$id." ORDER BY id ASC");
	
	while($quote = $quotes->fetch_assoc())
	{
		$mysql->query("UPDATE quotes SET id=".$mysql->real_escape_string($quote['id'] - 1)." WHERE id=".$mysql->real_escape_string($quote['id']));
	}

	header("Location: quotemanagement.php");
?>