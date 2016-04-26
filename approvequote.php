<?php 
	session_start();
	
	if(!isset($_SESSION['username']))
	{
		header("Location: index.php");
	}
	
	require("api.php");
	$mysql = getMysql();

	if(isset($_GET['id']))
	{
		$mysql->query("UPDATE quotes SET approved=1 WHERE id=".$mysql->real_escape_string($_GET['id']));
		header("Location: quotemanagement.php?approved=true");
	}
	else
	{
		$id = $mysql->real_escape_string($_POST['id']);
		
		$mysql->query("UPDATE quotes SET title='".$mysql->real_escape_string($_POST['title'])."' WHERE id=".$id);
		$mysql->query("UPDATE quotes SET nick='".$mysql->real_escape_string($_POST['submitter'])."' WHERE id=".$id);
		$mysql->query("UPDATE quotes SET quote='".$mysql->real_escape_string($_POST['quote'])."' WHERE id=".$id);
		$mysql->query("UPDATE quotes SET approved=1 WHERE id=".$id);
		echo true;
	}
?>