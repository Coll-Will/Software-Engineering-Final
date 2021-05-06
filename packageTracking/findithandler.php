<?php
  require_once '../pageformat.php';
  pagenavbar();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">


    <title>Tracking Orders</title>
    <style>
        .pad{
            margin-left: 10%;
            margin-right:10%;
            margin-top:50%;
        }
        table {
          border-collapse: separate;
          border-spacing: 70px 0;
        }
        
        td {
          padding: 10px 0;
          text-align:center;
        }
    </style>
  </head>
  <body>
    <div class="container">

<?php

      require_once('../connection.php');
      $conn=connectDB();
      if(!$conn){
      echo "connecting failed, try again later!";
      die("failed on DB connection");
     }
      $tracking_number = $_POST["tracking_number"];
      $query="SELECT cur_street, cur_city, cur_state, cur_zip, status FROM shipments WHERE SID= \"$tracking_number\"";
     $result=$conn->query($query);
     if(!$result)
      {
         echo "query is not correct!";
         die("fatal error");
      }
      $rows=$result->num_rows;

      echo<<<_END

        <div class="w3-container w3-red pad">
         <table>
         <thead>
         <tr>
            <th scope="col">Street</th>
            <th scope="col">City</th>
            <th scope="col">State</th>
            <th scope="col">Zip</th>
         </tr>
         </thead>  
_END;

      for($i=0; $i<$rows; $i++)
      {
         $count = $i+1;
         $row=$result->fetch_array(MYSQLI_ASSOC);
         $cur_street=$row['cur_street'];
         $cur_city=$row['cur_city'];
         $cur_state=$row['cur_state'];
         $cur_zip=$row['cur_zip'];
         $shipmentStatus=$row['status'];
         echo "<tr><td>$cur_street</td><td>$cur_city</td><td>$cur_state</td><td>$cur_zip</td></tr>";
      }

      echo "</table>";
      echo "</div>";
      
      if($shipmentStatus == 0)
        include_once "./status0.php";
        
        else if($shipmentStatus == 1)
        include_once "./status1.php";
        
        else if($shipmentStatus == 2)
        include_once "./status2.php";
        
        else if($shipmentStatus == 3)
        include_once "./status3.php";
        
        
        $query="SELECT SID, inventory.package_name, inventory.cost FROM shipments JOIN inventory ON shipments.IID=inventory.IID WHERE SID=\"$tracking_number\"";
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
      <th scope="col">Shipment ID</th>
      <th scope="col">Purchased Item</th>
      <th scope="col">Total Cost</th>
    </tr>
  </thead>
  <tbody>
_END;
		for($i=0; $i<$rows; $i++)
		{
			$row=$result->fetch_array(MYSQLI_ASSOC);
			$shipmentID=$row['SID'];
			$pname=$row['package_name'];
            $cost=$row['cost'];
			echo "<tr><td>$shipmentID</td><td>$pname</td><td>$cost</td></tr>";
		}
		echo "</table>";
		echo "</div>";
?>
</div>
</div>
<?php
  pagefooter();
?>
</body>
</html>