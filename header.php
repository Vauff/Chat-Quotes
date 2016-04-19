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
		<h3>By Vauff</h3>
		<br>
	</div>
	<button class="btn btn-success pull-right"><span class="glyphicon glyphicon-plus"></span> Add Quote</button>
	<form action="search.php">
		<input class="cstm-form-control" name="quotesearch" type="search" placeholder="Search for a Quote">
		<button class="btn btn-primary btn-sm" type="submit"><span class="glyphicon glyphicon-search"></span>  Search</button>
	</form>
	<hr><?php
}?>