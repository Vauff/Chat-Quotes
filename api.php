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

	function makeClickable($line)
	{
	    $result = "";
	    
	    $line = str_replace("<br />", " <br> ", $line);
	    
	    foreach(explode(" ", $line) as $word)
	    {
	        if(startsWith($word, "<br>"))
	        {
	            $result .= "<br> ";
	            continue;
	        }
	        
	        if(contains($word, "https://") || contains($word, "http://") || contains($word, "www."))
	        {
	            $word = "<a href='".$word."'>".$word."</a>";
	        }
	        
	        $result .= $word." ";
	    }
	    
	    return trim($result);
	}
	
	function startsWith($haystack, $needle)
	{
	    return (substr($haystack, 0, strlen($needle)) === $needle);
	}
	
	function contains($haystack, $needle)
	{
	    return strpos($haystack, $needle) !== false;
	} 