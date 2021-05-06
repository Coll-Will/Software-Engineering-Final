<?php
require_once "../config.php";
require_once "../session.php";
if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['submit'])) 
{	
    $fname=trim($_POST['f-name']);
    //$lname=trim($_POST['l-name']);
    $address=trim($_POST['address']);
    $city=trim($_POST['city']);
    $state=trim($_POST['state']);
    $zipcode=$_POST['zip'];

    //$ccnum=$_POST['card-num'];
    //$expiration=trim($_POST['expire']);
    //$ccv=$_POST['security'];
    

    $custID = $_SESSION['sessionID'];
    //adds address information to customer account table
	if($updateQuery=$db->prepare("UPDATE customers SET street = ?, city = ?, state = ?, zip = ? WHERE CID = ?"))
    {
        $updateQuery->bind_param("sssis", $address, $city, $state, $zipcode, $custID);
        $result=$updateQuery->execute();
	    if(!$result) 
        {
            header("Location:payment.php?msg=Something+Went+Wrong!");
	    }
	    $updateQuery->close();
    }
    else
    {
    	header("Location:payment.php?msg=Something+Went+Wrong!");
    }

    if($locQuery = $db->prepare("SELECT MID, closest_WID, state, street, city, zip FROM manufacturer"))
    {
        $origin = $locQuery->execute();
        if(!$origin)
        {
            
        }
        else
        {
            $result = $locQuery->get_result();
            $locationArr = array();
            while($place = $result->fetch_assoc())
            { 
                $warehouse = array($place['MID'], $place['closest_WID'], $place['state'], $place['street'], $place['city'], $place['zip']);
                array_push($locationArr, $warehouse);
            }
        }
    }

    //takes information from the customer table, inventory table, and warhouse table and adds it to the Shipments table to make the shipment in progress
    $test = $_POST['order'];
    echo "";
    echo "Order: $test";
    $order = json_decode($_POST['order'],true);
    foreach($order as $key => $item)
    {
        if($query=$db->prepare("INSERT INTO shipments (IID,CID,MID,WID,to_street,to_city,to_state,to_zip,cur_street,cur_city,cur_state,cur_zip,status,remaining_nodes)VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,'')"))
        {
            $invID = $key;
            $rand = rand(0,4);
            $from = $locationArr[$rand];
            $manID = $from[0];
        	$warhID = $from[1];
            $originStreet = $from[3];
            $originCity = $from[4];
            $originState = $from[2];
            $originZip = $from[5];
        	$status = 0;

            echo "ManID: $manID \nWarID: $warhID\nStreet: $originStreet\nCity: $originCity";

            $query->bind_param('iiiisssisssii',$invID,$custID,$manID,$warhID,$address,$city,$state,$zipcode,$originStreet,$originCity,$originState,$originZip,$status);
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
            <script>alert('Order Has Been Placed And Is Now Being Processed!');</script>
            <script type="text/javascript">clearcartHTML();</script>
            <script type = "text/javascript">redirect("http://localhost/DemoVersion/index.php", "clearcart");</script>
        </body>
    </html>
