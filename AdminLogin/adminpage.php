<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Inventory</title>
  </head>
<?php
	include_once "adminPageFormat.php";
	require_once "../pageformat.php";
    pagenavbar();
    echo "<div style = \"margin-top:50px\" class = \"container\">";
	pageheader();
    include_once('connection.php');
	$conn=connectDB();
	if(!$conn){
	echo "connecting failed, try again later!";
	die("failed on DB connection");
	}

	echo "<div class = \"row\"";
	$query="SELECT * FROM inventory";
		$result=$conn->query($query);
		if(!$result)
		{
			echo "query is not correct!";
			die("fatal error");
		}
		$rows=$result->num_rows;

		echo "<div class=\"col-xs-6 col-md-4\">";

		for($i=0; $i<$rows; $i++)
		{
			$count = $i+1;
			$row=$result->fetch_array(MYSQLI_ASSOC);
			$itemID=$row['IID'];
			$imgname=$row['imgName'];
			$cost=$row['cost'];
			$itemName=$row['package_name'];
			$stock=$row['stock'];
			echo "<div class=\"col col-sm-4\">";
			echo "<img src=\"./images/$imgname\" class=\"rounded\" alt=\"$imgname\" width=300px height=300px>";
			echo "<h4>PID: $itemID</h4>";
		    echo "<h4>Name: $itemName</h4>"; 
			echo "<h4>Count: $stock units</h4>";
			echo "<br></div>";
		}
?>
    </div>
    </div>
    <div class = \"row\">
    <?php 
        pagefooter(); 
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