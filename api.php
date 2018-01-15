<?php
	require('password.php');

	function getDatabase()
	{
        try
       {
            $conn = new PDO('mysql:host=158.69.59.239;dbname=ircquotes;charset=utf8mb4','Vauff', getPass());
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
	        if(contains($word, "https://") || contains($word, "http://") || contains($word, "www."))
	        {
	            $croppedLink = "";
	            $carry = "";
	            
	            if(startsWith($word, "<br>"))
	            {
	                $result .= "<br> ";
	                continue;
	            }
	            
	            if(endsWith($word, ")"))
	            {
	                $carry = ")";
	            }
	            else if(endsWith($word, "]"))
	            {
	                $carry = "]";
	            }
	            else if(endsWith($word, "}"))
	            {
	                $carry = "}";
	            }
	            else if(endsWith($word, ">"))
	            {
	                $carry = ">";
	            }
	            
	            if($carry !== "")
	            {
	                $croppedLink = substr($word, 0, strlen($word) - 1);
	            }
	            
	            $word = "<a href='".($croppedLink !== "" ? $croppedLink : $word)."'>".($croppedLink !== "" ? $croppedLink : $word)."</a>".$carry;
	        }
	        
	        $result .= $word." ";
	    }
	    
	    return trim($result);
	}
	
	function startsWith($haystack, $needle)
	{
	    return (substr($haystack, 0, strlen($needle)) === $needle);
	}
	
	function endsWith($haystack, $needle)
	{
	    $length = strlen($needle);
	    
	    return $length === 0 || (substr($haystack, -$length) === $needle);
	}
	
	function contains($haystack, $needle)
	{
	    return strpos($haystack, $needle) !== false;
	} 