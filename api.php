<?php 
	require('password.php');

	function getMysql()
	{
		$mysql = new mysqli("vauff.me", "Vauff", getPass(), "ircquotes");
	
		if($mysql->connect_error)
		{
			return false;
		}
	
		return $mysql;
	}
	
	function formatQuote($quote, $array)
	{
		foreach($array as $element)
		{
			$quote = str_replace($element[0], $element[1], $quote);
		}
		
		return $quote;
	}
?>
