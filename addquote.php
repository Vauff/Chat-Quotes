<?php 
	require('api.php');
	
	$_SESSION['pageTitle'] = "IRC Quotes: Add Quote";
	$_SESSION['currentHeader'] = 1;
	$_SESSION['submitting'] = "true";
?>
<!DOCTYPE html>
<html>
	<?php require('header.php');?>
    <body>
        <div class="container">
            <div class="jumbotron">
            	<?php $_SESSION['currentHeader'] = 2;
            		  require('header.php');?>
            	<h4><b>You can add a quote using the form below. Your quote will need to be approved by Vauff before it will show up, this generally won't take more than a day, though. Please keep the following rules in mind when submitting:</b></h4><br>
            	<h4><b>- Use your standard IRC nickname for the nickname option when submitting quotes.<br>
            	- Remove any messages from the quote that are an artifiact of another conversation going on at the same time or irrelevant.<br>
            	- Please fix any typos and remove any messages correcting typos.<br>
            	- Choose a title that is relevant to the quote.<br>
            	- Make sure your quote is funny :D</b></h4><br>
            	<h4><b>If I find that it is needed, I will edit your quote to be in line with the rules.</b></h4>
            	<hr>
            	<div class="centered">
            		<form action="submit.php">
	            		<label>Enter your name here:</label><br><br>
						<input class="form-control" name="nick" type="text" placeholder="Nickname"><br><br><br>
	            		<label>Enter the title of your quote here:</label><br><br>
						<input class="form-control" name="title" type="text" placeholder="Title"><br><br><br>
						<label>Enter the quote here:</label>
						<textarea class="form-control" name="quote" placeholder="Quote" rows="10"></textarea><br>
						<button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-ok"></span> Submit</button>
					</form>
				</div>
            </div>
        </div>
    </body>
</html>