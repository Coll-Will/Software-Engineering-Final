<?php
include_once "warehouseConnection.php";
$conn=connectDB();
if(!$conn){
	echo "connecting failed, try again later!";
	die("failed on DB connection");
}
//////////////////
$updateQuery = "UPDATE shipments SET inTransit=0, cancel=1, refund=1 WHERE SID=123456 OR 654321";
if($conn->query($updateQuery) === TRUE){
	echo "Order canceled successfully";
}
else
	echo "Error canceling order: " . $conn->error;

$conn->close();
?>