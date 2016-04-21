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
            		<form id="form">
	            		<label>Enter your name here:</label><br>
						<input id="nick" style="width: 50%; display: inline-block;" class="form-control" name="nick" type="text" placeholder="Nickname"><br><br><br>
	            		<label>Enter the title of your quote here:</label><br>
						<input id="title" style="width: 50%; display: inline-block;" class="form-control" name="title" type="text" placeholder="Title"><br><br><br>
						<label>Enter the quote here:</label><br>
						<textarea id="quote" style="width: 50%; display: inline-block;" class="form-control" name="quote" placeholder="Quote" rows="10"></textarea><br><br>
						<div id="errorLabel"></div><br>
						<button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-ok"></span> Submit</button>
					</form>
				</div>
            </div>
        </div>
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script>
		$(document).ready(function(){
			$("#form").submit(function(e){
				e.preventDefault();

				$.post("submit.php", {nick: $("#nick").val(), title: $("#title").val(), quote: $("#quote").val()}, function(data){
					if(data == true)
					{
						location.href = "index.php?submitted=true";
					}
					else
					{
							document.getElementById("errorLabel").innerHTML = "<span class=\"label label-danger\">" + data + "</span>";
					}
				});
			});
		});
	</script>
</html>