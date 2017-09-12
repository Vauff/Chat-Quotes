<?php
	session_start();
	require('api.php');

	if(!isset($_SESSION['username']))
	{
		header("Location: index.php");
	}
	
	if(!isset($_GET['id']))
	{
		header("Location: quotemanagement.php");
		return;
	}
	
	$id = $_GET['id'];
	$quote = getMysql()->query("SELECT * FROM quotes WHERE id=".$id)->fetch_assoc();
	$_SESSION['pageTitle'] = "Chat Quotes: Edit quote #".$id;
	$_SESSION['currentHeader'] = 1;
	
	if($_SESSION['type'] == "view")
	{
		$_SESSION['editType'] = "viewquote.php?id=".$id;
	}
	else if($_SESSION['type'] == "qman")
	{
		$_SESSION['editType'] = "quotemanagement.php";
	}?>
<!DOCTYPE html>
<html>
	<?php require('header.php');?>
    <body>
        <div class="container">
            <div class="jumbotron">
            	<?php $_SESSION['currentHeader'] = 2;
            		  require('header.php');
               		  $time = $quote['time'];?>
	               <button class="btn btn-warning btn-md" onclick="location.href='<?php echo $_SESSION['editType']?>'"><span class="glyphicon glyphicon-arrow-left"></span> Back</button>
                <br><br>
	            <form id="form">
            		<label for="id">ID:</label><label style="padding-left: 30px;" for="title">Title:</label><br>
					<input id="id" style="width: 44px; display: inline-block;" class="form-control" name="id" type="text" placeholder="ID" disabled="disabled" value="<?php echo $quote['id']?>">
					<input id="title" style="width: 45.25%; display: inline-block;" class="form-control" name="title" type="text" placeholder="Title" value="<?php echo $quote['title']?>"><br><br>
					<label>Quote:</label><br>
					<textarea id="quote" style="width: 50%; display: inline-block;" class="form-control" name="quote" placeholder="Quote" rows="10"><?php echo $quote['quote'];?></textarea><br><br>
					<label>Submitter:</label><br>
					<input id="submitter" style="width: 50%; display: inline-block;" class="form-control" name="submitter" placeholder="Submitter" value="<?php echo $quote['submitter'];?>"><br><br>
	                <button class="btn btn-success btn-md" type="submit"><span class="glyphicon glyphicon-ok"></span> Save</button>
				</form>
            </div>
        </div>
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script>
		$(document).ready(function(){
			$("#form").submit(function(e){
				e.preventDefault();

				$.post("approvequote.php", {id: $("#id").val(), title: $("#title").val(), quote: $("#quote").val(), submitter: $("#submitter").val()}, function(data){
					if(data == true)
					{
						<?php $_SESSION['edited'] = true;?>
						location.href = "quotemanagement.php?approved=true";
					}
				});
			});
		});
	</script>
</html>