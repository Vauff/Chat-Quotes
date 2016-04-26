<?php 
	session_start();
	require('api.php');
	
	if(!isset($_SESSION['username']))
	{
		header("Location: index.php");
	}
	
	$mysql = getMysql();
	$mysql->query("DELETE * FROM quotes WHERE id>=46");
	$mysql->query("ALTER TABLE quotes AUTO_INCREMENT=46");
	$_SESSION['pageTitle'] = "IRC Quotes: Unapproved quotes";
	$_SESSION['currentHeader'] = 1;?>
<!DOCTYPE html>
<html>
	<?php require('header.php');?>
    <body>
        <div class="container">
            <div class="jumbotron">
            	<?php $_SESSION['currentHeader'] = 2;
            		  require('header.php');?>
            	<?php if(isset($_GET['approved']) && $_GET['approved'] == "true"){?>
            		<div class="centered"><font color="green"><span class="glyphicon glyphicon-ok"></span> Quote accepted!</font></div>
            	<?php }?>
                <br>
                <?php
                	$quotes = getMysql()->query("SELECT * FROM quotes WHERE approved=0 ORDER BY id ASC");
                	
                	while($quote = $quotes->fetch_assoc())
                	{
                		$id = $quote['id'];
                		$time = $quote['time'];?>
                		<div class="quote">
	                	<h4><b><font color="337ab7">#<?php echo $id;?> - <?php echo $quote['title'];?></font></b></h4>
                			<h5><b>Submitter:</b> <?php echo $quote['submitter']?> - <b>Date:</b> <?php echo gmdate('l F jS, Y, g:i A T', $time);?></h5>
                			<h6><?php echo nl2br(htmlentities($quote['quote'], ENT_COMPAT, "CP1252"))?></h6>
                		</div>
                		<div class="btn-group">
		               		<button class="btn btn-success" onclick="location.href='approvequote.php?id=<?php echo $id;?>'"><span class="glyphicon glyphicon-ok"></span> Approve</button>
		               		<button class="btn btn-info" onclick="location.href='editquote.php?id=<?php echo $id;?>'"><span class="glyphicon glyphicon-pencil"></span> Edit</button>
		               	</div>
                		<hr width="50%">
                		<br>
                <?php }?>
                <br>
            </div>
        </div>
    </body>
</html>