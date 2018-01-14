<?php
	session_start();

	if(!isset($_SESSION['username']))
	{
		header("Location: login.php");
	}

	require("api.php");
	$conn = getDatabase();
	$id = $_GET['id'];

	// Not really using prepared statements in this file because we're only working with server-generated ids and the user is logged in.
	$conn->query('DELETE FROM quotes WHERE id='.$id);

    $ainc = $conn->query("SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA='quotes' AND TABLE_NAME='quotes'")->fetch()['AUTO_INCREMENT'];
    $conn->query("ALTER TABLE quotes AUTO_INCREMENT=".($ainc - 1));


	$quotes = $conn->query('SELECT * FROM quotes WHERE id>'.$id.' ORDER BY id ASC');

	while($quote = $quotes->fetch())
	{
	    $conn->prepare('UPDATE quotes SET id=:idMinusOne WHERE id=:id')->execute(['idMinusOne' => ($quote['id'] - 1),'id' => $quote['id']]);
	}

	header("Location: quotemanagement.php");
