<?php
if($_SESSION['currentHeader'] == 1)
{?>
	<head>
		<meta charset="UTF-8">
		<title><?php echo $_SESSION['pageTitle']?></title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/bootstrap-theme.css">
		<link rel="stylesheet" href="css/quotes.css">
	</head><?php
}
else if($_SESSION['currentHeader'] == 2)
{?>
	<div id="link">
		<a href="index.php"><span id="linkSpan"></span></a>
		<h1><font face="Unicorn">IRC Quotes</font></h1>
		<h3 class="centered">By Vauff</h3>
		<a href="addquote.php"><button class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Add Quote</button></a>
	</div>
	<hr><?php
}?>