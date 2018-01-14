<?php 
	session_start();
	
	if(!isset($_SESSION['username']))
	{
		header("Location: login.php");
	}
	
	require("api.php");
	$conn = getDatabase();

	$conn->prepare('UPDATE quotes SET approved=0 WHERE id=:id')->execute(['id' => $_GET['id']]);
	header("Location: quotemanagement.php?approved=false");
?>