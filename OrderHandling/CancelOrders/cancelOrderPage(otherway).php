<?php
    require_once "../config.php";
    require_once "../pageformat.php";
    pagenavbar();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <style type="text/css">
    .nav a{
    	color: black !important;
    	font-size: 100px !important;
    }
    </style>
    <style>
    .footer {
  	position: fixed;
  	left: 0;
  	bottom: 0;
  	width: 100%;
  	background-color: red;
  	color: white;
  	text-align: center;
	}
	</style>
    <title>Reports</title>
  </head>
  <body>
      <br>
      <br>
      <br>
  	<div class="container">

 	<?php
		echo "<div class=\"row\">";
		echo "</div>";

        //$custID = $_SESSION['sessionID'];
        $custID = 123456;
		if($query = $db->prepare("SELECT SID, customers.email, inventory.package_name FROM shipments JOIN inventory ON shipments.IID=inventory.IID JOIN customers ON shipments.CID=customers.CID WHERE inTransit=1"))
		{
    		$query->execute();
    		$query->store_result();
    		if($query->num_rows < 1)
    		{
    			echo "query is not correct!";
    			die("fatal error");
    		}
    		$rows=$query->num_rows;
    		echo<<<_END
    
    		<table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">Shipment Number</th>
                  <th scope="col">Email Address</th>
                  <th scope="col">Package Name</th>
                  <th scope="col">Cancel Order</th>
                </tr>
              </thead>
              <tbody>
_END;
    		for($i=0; $i<$rows; $i++)
    		{
    		    $query->bind_result($SID, $customerEmail, $packagename);
    		    $query->fetch();
    			echo "<tr><td>$SID</td><td>$customerEmail</td><td>$packagename</td><td><button id = \"cancelBtn\" onclick=\"updateQuery()\">Cancel</button></td></tr>";
    		}
		}
		else{
		    echo "query is not correct!";
    		die("fatal error");
		}
		echo "</div>";

function updateQuery(){
    $updateQuery = "UPDATE shipments SET inTransit=0, cancel=1, refund=1 WHERE SID=123456 OR 654321";
    if($conn->query($updateQuery) === TRUE){
	    echo "Order canceled successfully";
	    $conn->close();
	    header("Location:./canelOrderPage(otherway).php");
    }
    else{
	    echo "Error canceling order: " . $conn->error;
    }
$conn->close();
header("Location:./canelOrderPage(otherway).php?msg=Querry Incorrect");
}
	?>
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