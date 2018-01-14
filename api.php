<?php
	require('password.php');

	function getDatabase()
	{
		$dsn = 'mysql:host=158.69.59.239;dbname=ircquotes;charset=utf8';

        try
        {
            $conn = new PDO($dsn,'Vauff', getPass());
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e)
        {
            echo $e;
            return false;
        }

		return $conn;
	}

	function formatQuote($quote, $array)
	{
		foreach($array as $element)
		{
			$quote = str_replace($element[0], $element[1], $quote);
		}

		return $quote;
	}
