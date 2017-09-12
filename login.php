<?php
	session_start();
	require('api.php');
	$_SESSION['pageTitle'] = "Chat Quotes: Login";
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
                <?php if(isset($_GET['invalid']) && $_GET['invalid'] == "true"){?>
                	<div class="alert alert-danger">Invalid login credentials.</div>
                <?php }?>
                <br>
	            <form id="form" action="processlogin.php">
            		<label for="username">Username:</label>
					<input id="username" style="width: 50%" class="form-control" name="username" type="text" placeholder="Username"><br>
            		<label for="password">Password:</label>
					<input id="password" style="width: 50%" class="form-control" name="password" type="password" placeholder="Password"><br>
	                <button class="btn btn-success btn-md" type="submit"><span class="glyphicon glyphicon-log-in"></span> Login</button>
				</form>
            </div>
        </div>
    </body>
</html>