<?php
	session_start();

	if(!isset($_SESSION['username']))
	{
		header("Location: login.php");
	}

	require("api.php");
	$conn = getDatabase();

	if(isset($_GET['id']))
	{
	    $conn->prepare('UPDATE quotes SET approved=1 WHERE id=:id')->execute(['id'=>$_GET['id']]);
		header("Location: quotemanagement.php?approved=true");
	}
	else
	{
		$id = $_POST['id'];

        $conn->prepare('UPDATE quotes SET title=:title WHERE id=:id')->execute(['title'=>$_POST['title'],'id'=> $id]);
        $conn->prepare('UPDATE quotes SET submitter=:submitter WHERE id=:id')->execute(['submitter'=>$_POST['submitter'],'id'=> $id]);
        $conn->prepare('UPDATE quotes SET quote=:quote WHERE id=:id')->execute(['quote'=>$_POST['quote'],'id'=> $id]);
        $conn->prepare('UPDATE quotes SET approved=1 WHERE id=:id')->execute(['id'=> $id]);
		echo true;
	}