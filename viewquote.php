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

	$conn = getDatabase();
	$id = $_GET['id'];

    $existsQuery = $conn->prepare("SELECT EXISTS(SELECT 1 FROM quotes WHERE id=:id) AS id");
    $existsQuery->execute(['id' => $id]);

	if($existsQuery->fetch()['id'] == 0)
	{
		header("Location: index.php?exists=false");
		return;
	}

	$quoteQuery = $conn->prepare("SELECT * FROM quotes WHERE id=:id");

	$quoteQuery->execute(['id' => $id]);

	
	$quote = $quoteQuery->fetch();

	if($quote['approved'] == 0)
	{
		header("Location: index.php?exists=false");
		return;
	}

	$_SESSION['pageTitle'] = "Chat Quotes: #".$id." - ".$quote['title'];
	$_SESSION['currentHeader'] = 1;
	$_SESSION['type'] = "view";?>
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
		            <button class="btn btn-warning btn-md" onclick="location.href='index.php<?php echo $_GET['page'] == 1 ? "" : "?page=".$_GET['page']?>'"><span class="glyphicon glyphicon-arrow-left"></span> Back</button>
	                <?php if(isset($_SESSION['username']) && $_SESSION['username'] == "Vauff")
	                	  {?>
		            		<button class="btn btn-info" onclick="location.href='editquote.php?id=<?php echo $id;?>'"><span class="glyphicon glyphicon-pencil"></span> Edit</button>
	               			<button class="btn btn-danger" onclick="location.href='unapprovequote.php?id=<?php echo $id;?>'"><span class="glyphicon glyphicon-remove"></span> Unapprove</button>
		            <?php }?>
	                <br><br>
	                <div class="quote">
	                	<h4><b><font color="337ab7">#<?php echo $id;?> - <?php echo htmlspecialchars($quote['title']); ?></font></b></h4>
	                	<h5><b>Submitter:</b> <?php echo htmlspecialchars($quote['submitter']); ?> - <b>Date:</b> <?php echo gmdate('l F jS, Y, g:i A T', $time);?></h5>
	                	<h6><?php echo makeClickable(nl2br(htmlspecialchars($quote['quote'], ENT_COMPAT, "utf-8")));?>
	                </h6>
                </div>
            </div>
        </div>
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>