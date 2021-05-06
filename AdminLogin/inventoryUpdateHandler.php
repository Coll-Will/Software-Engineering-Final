<?php
  include_once "connection.php";

  $conn=connectDB();
    if(!$conn){
    echo "connecting failed, try again later!";
    die("failed on DB connection");
    }

  $warehouseID = $_POST["itemName"];
  $warehouseStock = $_POST["quantity"];
  $sql = "UPDATE inventory SET stock=$warehouseStock WHERE IID=$warehouseID";
  if($conn->query($sql) === TRUE){
  	header("Location:./adminpage.php?msg=Stock+updated");
  }
  else
  {
  	echo "Error updating record: " . $conn->error; 
  }

$conn->close()
?>