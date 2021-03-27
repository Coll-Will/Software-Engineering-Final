<?php
require_once "../../config.php";
require_once "../../session.php";
if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['submit'])) 
{	
    $fname=trim($_POST['f-name']);
    $lname=trim($_POST['l-name']);
    $address=trim($_POST['address']);
    $city=trim($_POST['city']);
    $state=trim($_POST['state']);
    $zipcode=$_POST['zip'];

    $ccnum=$_POST['card-num'];
    $expiration=trim($_POST['expire']);
    $ccv=$_POST['security'];
    

    $custID = $_SESSION['sessionID'];
    //adds address information to customer account table
	if($updateQuery=$db->prepare("UPDATE customers SET street = ?, city = ?, state = ?, zip = ? WHERE CID = ?"))
    {
        $updateQuery->bind_param("sssis", $address, $city, $state, $zipcode, $custID);
        $result=$updateQuery->execute();
	    if(!$result) 
        {
            header("Location:signup.php?msg=Something+Went+Wrong!");
	    }
	    $updateQuery->close();
    }
    else
    {
    	header("Location:payment.html?msg=Something+Went+Wrong!");
    }

    //takes information from the customer table, inventory table, and warhouse table and adds it to the Shipments table to make the shipment in progress
    if($query=$db->prepare("INSERT INTO shipments (IID,CID,MID,WID,to_street,to_city,to_state,to_zip,cancel,refund)VALUES (?,?,?,?,?,?,?,?,?,?)"))//This is the issue 
    {
    	$invID = 1;
    	$warhID = 1;//temporary hard coded
    	$manID = 1;
    	$N = "N";
        $query->bind_param('iiiisssiss', $invID,$custID,$manID,$warhID,$address,$city,$state,$zipcode,$N,$N);
        $result=$query->execute();
        if($result)
        {
            header("Location:../../index.php");
        }
        else
        {
            header("Location:payment.php?msg=Error!+Order+Has+Not+Been+Processed:+Error+Code+1");
        }
        $query->close();
    }
    else
    {
        header("Location:payment.php?msg=Error!+Order+Has+Not+Been+Processed:+Error+Code+2");
    }
    mysqli_close($db);
}
?>