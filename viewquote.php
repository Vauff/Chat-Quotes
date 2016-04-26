<?php
	session_start();
	require('api.php');

	if(!isset($_GET['id']))
	{
		header("Location: index.php");
		return;
	}
	
	if(!isset($_GET['page']))
	{
		$_GET['page'] = 1;
	}
	
	$id = $_GET['id'];
	$quote = getMysql()->query("SELECT * FROM quotes WHERE id=".$id)->fetch_assoc();
	$_SESSION['pageTitle'] = "IRC Quotes: #".$id." - ".$quote['title'];
	$_SESSION['currentHeader'] = 1;?>
<!DOCTYPE html>
<html>
	<?php require('header.php');?>
    <body>
        <div class="container">
            <div class="jumbotron">
            	<?php $_SESSION['currentHeader'] = 2;
            		  require('header.php');?>
               	<?php 
	                $time = $quote['time'];?>
	                <a href="index.php<?php echo $_GET['page'] == 1 ? "" : "?page=".$_GET['page']?>"><button class="btn btn-warning btn-md"><span class="glyphicon glyphicon-arrow-left"></span> Back</button></a>
	                <br><br>
	                <div class="quote">
	                	<h4><b><font color="337ab7">#<?php echo $id;?> - <?php echo $quote['title'];?></font></b></h4>
	                	<h5><b>Submitter:</b> <?php echo $quote['submitter']?> - <b>Date:</b> <?php echo gmdate('l F jS, Y, g:i A T', $time);?></h5>
	                	<h6><?php echo nl2br(htmlentities($quote['quote'], ENT_COMPAT, "CP1252"));?>
	                </h6>
                </div>
            </div>
        </div>
    </body>
</html>