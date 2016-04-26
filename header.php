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
		<?php
			if(isset($_SESSION['username']) && $_SESSION['username'] == "Vauff")
			{
				if(basename($_SERVER['PHP_SELF']) == "quotemanagement.php")
				{?>
					<a href="logout.php"><button id="qm" class="btn btn-danger"><span class="glyphicon glyphicon-log-out"></span> Logout</button></a>
		  <?php }
		  		else
		  		{?>
					<a href="quotemanagement.php"><button id="qm" class="btn btn-primary"><span class="glyphicon glyphicon-wrench"></span> Quote Management</button></a>
		  <?php }?>
	  <?php }
	  		else if(basename($_SERVER['PHP_SELF']) != "login.php")
	  		{?>
				<a href="login.php"><button id="qm" class="btn btn-primary"><span class="glyphicon glyphicon-log-in"></span> Login</button></a>
	  <?php }?>
		<a href="addquote.php"><button id="add" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Add Quote</button></a>
	</div>
	<hr><?php
}?>