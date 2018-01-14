<?php
	session_start();
	require("api.php");
	$conn = getDatabase();

	if($_POST['title'] == null || $_POST['quote'] == null || $_POST['nick'] == null)
	{
		echo "You did not fill out everything.";
		return;
	}

	$conn->prepare('INSERT INTO quotes (title, submitter, approved, quote, time) VALUES (:title, :nick, 0, :quote, :time)')
        ->execute(['title'=>$_POST['title'], 'nick'=> $_POST['nick'],'quote'=>$_POST['quote'],'time'=>time()]);
	echo true;