<?php 
	session_start();
	require('api.php');
	
	if(!isset($_SESSION['username']))
	{
		header("Location: login.php");
	}
	
	$_SESSION['pageTitle'] = "Chat Quotes: Unapproved quotes";
	$_SESSION['currentHeader'] = 1;
	$_SESSION['type'] = "qman";?>
<!DOCTYPE html>
<html>
	<?php require('header.php');?>
    <body>
        <div class="container">
            <div class="jumbotron">
            	<?php $_SESSION['currentHeader'] = 2;
            		  require('header.php');?>
            	<?php if(isset($_SESSION['edited'])){?>
            		<div class="centered"><font color="green"><span class="glyphicon glyphicon-ok"></span> Quote edited!</font></div>
            	<?php $_SESSION['edited'] = null;
            		  }
            		  else if(isset($_GET['approved'])){?>
            		<div class="centered"><font color="green"><span class="glyphicon glyphicon-ok"></span> Quote <?php if($_GET['approved'] == "true"){echo "approved";}else if($_GET['approved'] == "false"){echo "unapproved";}?>!</font></div>
            	<?php }?>
                <br>
                <?php
                	$conn = getDatabase();
                	
                	if(isset($_GET['deleted']) && $_GET['deleted'] == "true")
                	{
                		echo '<div class="centered"><font color="green"><span class="glyphicon glyphicon-ok"></span> Quote deleted!</font></div>';
                	}
                	
                	if($conn->query("SELECT COUNT(id) AS id FROM quotes WHERE approved=0 ORDER BY id ASC")->fetch()['id'] == 0)
                	{
                		echo '<div class="centered"><font color="red"><span class="glyphicon glyphicon-remove"></span> There are no pending quotes!</font></div>';
                		return;
                	}
                	
                	$quotes = $conn->query("SELECT * FROM quotes WHERE approved=0 ORDER BY id ASC");
                	
                	while($quote = $quotes->fetch())
                	{
                		$id = $quote['id'];
                		$time = $quote['time'];?>
                		<div class="quote">
	                	<h4><b><font color="337ab7">#<?php echo $id;?> - <?php echo $quote['title'];?></font></b></h4>
                			<h5><b>Submitter:</b> <?php echo $quote['submitter']?> - <b>Date:</b> <?php echo gmdate('l F jS, Y, g:i A T', $time);?></h5>
                			<h6><?php echo nl2br(htmlentities($quote['quote'], ENT_COMPAT, "CP1252"))?></h6>
                		</div>
	               		<button class="btn btn-success" onclick="location.href='approvequote.php?id=<?php echo $id;?>'"><span class="glyphicon glyphicon-ok"></span> Approve</button>
	               		<button class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete"><span class="glyphicon glyphicon-remove"></span> Delete</button>
	               		<button class="btn btn-info" onclick="location.href='editquote.php?id=<?php echo $id;?>'"><span class="glyphicon glyphicon-pencil"></span> Edit</button>
	               		<div class="modal fade" id="confirmDelete" tabindex="-1" role="dialog">
				        	<div class="modal-dialog">
				        		<div class="modal-content">
				        			<div class="modal-header">
				        				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        				<h4 class="modal-title">Are you sure that you want to delete this quote?</h4>
				        			</div>
				        			<div class="modal-body">
				        				<button class="btn btn-success btn-block" onclick="location.href='deletequote.php?id=<?php echo $id;?>'">Yes</button>
				        				<button class="btn btn-danger btn-block" data-dismiss="modal">No</button>
				        			</div>
				        		</div>
				        	</div>
				        </div>
                		<hr width="50%">
                		<br>
                <?php }?>
                <br>
            </div>
        </div>
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
    </body>
</html>