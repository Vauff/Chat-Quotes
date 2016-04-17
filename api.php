<?php 
	require('password.php');

	function getMysql()
	{
		$mysql = new mysqli("geforcemods.net", "Vauff", getPass(), "ircquotes");
		
		if($mysql->connect_error)
		{
			return false;
		}
		
		return $mysql;
	}
	
	function getOrdinal($n)
	{
		if($n >= 11 && $n <= 13)
		{
			return 'th';
		}
		else
		{
			switch($n % 10)
			{
				case 1:
					return 'st';
				case 2:
					return 'nd';
				case 3:
					return 'rd';
				default:
					return 'th';
			}
		}
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