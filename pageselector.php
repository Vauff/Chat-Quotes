<h4>
	<?php echo $page > 1 ? "<a href=\"index.php".($page - 1 == 1 ? "" : "?page=".($page - 1))."\">" : ""?>
		<button class="btn btn-info<?php echo $page <= 1 ? " disabled" : "";?>"><span class="glyphicon glyphicon-arrow-left"></span></button>
	<?php echo $page > 1 ? "</a>" : "";
		
		$conn = getDatabase();
		$pages = $conn->query('SELECT COUNT(id) AS id FROM quotes')->fetch()['id'] / 10;
		$ceiled = ceil($pages);
		
		for($i = 1; $i <= $ceiled; $i++)
		{
			if($i == $page)
			{
				echo $i." ";
			}
			else if($i == 1)
			{
				echo "<a href=\"index.php\">".$i."</a> ";
			}
			else
			{
				echo "<a href=\"index.php?page=".$i."\">".$i."</a> ";
			}
		}
		?>
	<?php echo $page < $ceiled ? "<a href=\"index.php?page=".($page + 1)."\">" : ""?>
	<button class="btn btn-info<?php echo $page >= $ceiled ? " disabled" : "";?>"><span class="glyphicon glyphicon-arrow-right"></span></button>
	<?php echo $page < $ceiled ? "</a>" : "";?>
</h4>
