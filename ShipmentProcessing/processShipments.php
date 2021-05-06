<?php
    require_once("./delay.php");
    require_once("./setShipmentToInTransit.php");
    require_once("./moveToNextWarehouse.php");
    require_once("../config.php");

    $TO_IN_TRANSIT_DELAY = 30;
    $query = "SELECT SID, MID, status FROM shipments";
    $result = mysqli_query($db, $query);

    if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_assoc($result)){
        #echo "<br>Record: " . $row['SID'] . " " . $row['MID'] . " " . $row['status'] . "<br>";
        # if shipment status is 0 - processing
        if($row['status'] == 0){
          #delayByTime($TO_IN_TRANSIT_DELAY);
          setShipmentToInTransit($row['SID'], $db);
        }
        # if shipment status is 1 - in-transit
        else if($row['status'] == 1){
          #delayByDistance($row['SID'], $row['MID'], $db);
          moveToNextWarehouse($row['SID'], $db);
        }
      }
    }


 ?>
