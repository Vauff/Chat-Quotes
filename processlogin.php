<?php
	session_start();
	require("api.php");
	
	if(isset($_SESSION['username']))
	{
		header("Location: quotemanagement.php");
	}
	else
	{
		$username = $_GET['username'];
		$password = hash("sha256", $_GET['password']);
		echo $password."--".getSha();
		if($password == getSha())
		{	
			$_SESSION['username'] = $_GET['username'];
			header("Location: quotemanagement.php");
		}
		else
		{
			header("Location: login.php?invalid=true");
		}
	}
?>