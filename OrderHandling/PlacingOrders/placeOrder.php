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
    $order = json_decode($_POST['order'],true);
    foreach($order as $key => $item)
    {
        if($query=$db->prepare("INSERT INTO shipments (IID,CID,MID,WID,to_street,to_city,to_state,to_zip,cancel,refund)VALUES (?,?,?,?,?,?,?,?,?,?)"))
        {

            $invID = $key;
        	$warhID = rand(1,5);//temporarily hard coded
        	$manID = rand(1,5);
        	$N = "N";
            $query->bind_param('iiiisssiss', $invID,$custID,$manID,$warhID,$address,$city,$state,$zipcode,$N,$N);
            $result=$query->execute();
            if(!$result)
            {
                echo "$order";
                //header("Location:payment.php?msg=Error!+Order+Has+Not+Been+Processed:+Error+Code+1+|||$order|||");
            }
        }
        else
        {
            header("Location:payment.php?msg=Error!+Order+Has+Not+Been+Processed:+Error+Code+2");
        }
        $query->close();
    }
    
    mysqli_close($db);
}
?>
<!DOCTYPE html>
<html lang="en">
    <body>
        <script type="text/javascript" src="http://localhost/Software-Engineering-FinalV4/OrderHandling/javascript/jsfunctions.js"></script>
        <script type = "text/javascript">clearcartHTML();</script>
        <script type = "text/javascript">redirect("http://localhost/Software-Engineering-FinalV4/index.php", "clearcart");</script>
    </body>
</html>