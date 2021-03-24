<?php
    require_once "../pageformat.php";
    pagenavbar();
?>
<h2 style = "margin-top:50px">Admin Warehouse Stock</h2>

<?php

    include_once('connection.php');
	$conn=connectDB();
	if(!$conn){
	echo "connecting failed, try again later!";
	die("failed on DB connection");
	}

	$query="SELECT * FROM stock";
		$result=$conn->query($query);
		if(!$result)
		{
			echo "query is not correct!";
			die("fatal error");
		}
		$rows=$result->num_rows;

		echo "<div class=\"row\">";

		for($i=0; $i<$rows; $i++)
		{
			$count = $i+1;
			$row=$result->fetch_array(MYSQLI_ASSOC);
			$imgname=$row['imgName'];
			$stock=$row['stock'];
			$itemName=$row['itemName'];
			echo "<div class=\"col col-sm-4\">";
			echo "<img src=\"./images/$imgname\" class=\"rounded\" alt=\"$imgname\">";
			echo "<h4> id:$count - $itemName stock: $stock units</h4>";

		}

?>
<h1>UPDATE STOCK:</h1>

<form action="./inventoryUpdateHandler.php" method="POST">
  <label for="quantity">Stock ID:</label>
  <input type="number" id="itemName" name="itemName" min="1" max="5">
  <label for="quantity">Updated Stock:</label>
  <input type="number" id="quantity" name="quantity" min="0">
  <input type="submit">
</form>
<?php pagefooter() ?>