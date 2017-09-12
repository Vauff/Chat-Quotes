<?php 
	session_start();
	require('api.php');
	
	if(!isset($_GET['page']))
	{
		$_GET['page'] = 1;
	}
	
	$page = $_GET['page'];
	$_SESSION['pageTitle'] = "Chat Quotes: Page #".$page;
	$_SESSION['currentHeader'] = 1;
?>
<!DOCTYPE html>
<html>
	<?php require('header.php');?>
    <body>
        <div class="container">
            <div class="jumbotron">
            	<?php $_SESSION['currentHeader'] = 2;
            		  require('header.php');?>
            	<?php if(isset($_GET['submitted']) && $_GET['submitted'] == "true"){?>
            		<div class="centered"><font color="green"><span class="glyphicon glyphicon-ok"></span> Thank you for submitting! Your quote will be reviewed as soon as possible.</font></div>
            	<?php }
            		if(isset($_GET['exists']) && $_GET['exists'] == "false")
            		{
            			echo '<div class="centered"><font color="red"><span class="glyphicon glyphicon-remove"></span> This quote does not exist!</font></div>';
            		}
            		?>
                <div class="centered"><?php require('pageselector.php');?></div>
                <br>
                <?php
                	$firstQuoteID = 10 * ($pages - $page + 1);
                	$secondQuoteID = $firstQuoteID > 9 ? $firstQuoteID - 9 : 0;
                	$quotes = $mysql->query("SELECT * FROM quotes WHERE id>=".$secondQuoteID." AND id<=".$firstQuoteID." AND approved=1 ORDER BY id DESC");
                	
                	while($quote = $quotes->fetch_assoc())
                	{
                		$id = $quote['id'];
                		$time = $quote['time'];?>
                		<div class="quote">
                			<h4><a href="viewquote.php?id=<?php echo $page == 1 ? $id : $id."&page=".$page;?>"><b>#<?php echo $id;?> - <?php echo $quote['title'];?></b></a></h4>
                			<h5><b>Submitter:</b> <?php echo $quote['submitter']?> - <b>Date:</b> <?php echo gmdate('l F jS, Y, g:i A T', $time);?></h5>
                			<h6><?php echo nl2br(htmlentities($quote['quote'], ENT_COMPAT, "CP1252"))?></h6>
                		</div>
                		<br>
                <?php }?>
                <br>
                <div class="centered"><?php require('pageselector.php');?></div>
            </div>
        </div>
    </body>
</html>