<?php
require_once "../config.php";
require_once "../session.php";
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

 /*   if($locQuery =$db->prepare("SELECT WID, state, street, city, zip FROM warehouses"))
    {
        $places = $locQuery->execute();
        if(!$places)
        {
            die("Locations could not be determined");
        }
        $places = $query->get_result();
        $locationArr = array();
        while($place = $places->fetch_assoc())
        { 
            $warehouse = array($place['WID'], $place['state'], $place['street'], $place['city']$place['zip']);
            array_push($locationArr, $warehouse)
        }
    }*/

    //takes information from the customer table, inventory table, and warhouse table and adds it to the Shipments table to make the shipment in progress
    $order = json_decode($_POST['order'],true);
    foreach($order as $key => $item)
    {
        if($query=$db->prepare("INSERT INTO shipments (IID,CID,MID,WID,to_street,to_city,to_state,to_zip,cur_street,cur_city,cur_state,cur_zip,status,remaining_nodes)VALUES (?,?,?,?,?,?,?,?,'','','','',?,'')"))
        {
            $invID = $key;
            $rand = rand(1,24);
        	//$warhID = $locations[$rand][0];
            $warhID = $rand;
        	$manID = rand(1,5);
        	$status = 0;
            $query->bind_param('iiiisssii',$invID,$custID,$manID,$warhID,$address,$city,$state,$zipcode,$status);
            $result=$query->execute();
            if(!$result)
            {
                header("Location:payment.php?msg=Error!+Order+Has+Not+Been+Processed:+Error+Code+1");
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
            <script type="text/javascript" src="./javascript/jsfunctions.js"></script>
            <script type="text/javascript">clearcartHTML();</script>
            <script>alert(Order Complete!);</script>
            <script type = "text/javascript">redirect("http://localhost/DemoVersion/index.php", "clearcart");</script>
        </body>
    </html>
