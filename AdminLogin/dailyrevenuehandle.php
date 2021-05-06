<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<?php
include_once "adminPageFormat.php";
include_once "connection.php";
    require_once "../pageformat.php";
    pagenavbar();
    echo "<div class = \"container\">";
    pageheader();
echo "<div class=\"row\">";
		$conn=connectDB();
		if(!$conn){
		echo "connecting failed, try again later!";
		die("failed on DB connection");
		}

		$d=$_GET['date'];
		$date =date("Y-m-d", strtotime($d));
		$query="SELECT orderID, totalCost, orderDate FROM orders WHERE date(orderDate)=\"$date\"";
		$result=$conn->query($query);
		if(!$result)
		{
			echo "query is not correct!";
			die("fatal error");
		}
		$rows=$result->num_rows;
		echo<<<_END

		<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Order ID</th>
      <th scope="col">Total Cost</th>
      <th scope="col">Updated Total</th>
    </tr>
  </thead>
  <tbody>
_END;
		$totalcost=0;
		for($i=0; $i<$rows; $i++)
		{
			$row=$result->fetch_array(MYSQLI_ASSOC);
			$id=$row['orderID'];
			$cost=$row['totalCost'];
			$totalcost += $cost;
			echo "<tr><td>$id</td><td>$cost</td><td>$totalcost</td></tr>";
		}
		echo "</div>";
?>
</div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
  </body>
</html>