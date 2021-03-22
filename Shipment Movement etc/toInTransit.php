<?php
  # given a shipment ID and assuming MID is not initialized when the shipment is created
  function toInTransit($SID){
    require_once("environment/config.php");
    require_once("dismatrix.php");
    require_once("randomManufacturer.php");
    require_once("randomWarehouse.php");
    $err = "Could not run query: ";
    $success = " record updated successfully!";

    # Retrieve shipment status
    if($query=$db->prepare("SELECT inTransit FROM shipments WHERE SID = $SID")){
      $query->execute();
      $query->bind_result($status);
      $query->fetch();
      $query->close();
      echo "inTransit status retrieved:  " . $status;
    } else echo $err . " retrieve shipment status";

    #if not in transit: inTransit value of 0 is "ordered" and 1 is "in-transit" right?
    if($status === 0){
      # Call randomManufacturer(), update current address
      $manufacturer = randomManufacturer($db);
      if($updateManuf=$db->prepare("UPDATE shipments SET MID = '$manufacturer[0]',
          cur_street = '$manufacturer[1]', cur_city = '$manufacturer[2]',
          cur_state = '$manufacturer[3]', cur_zip = '$manufacturer[4]'")){
            $updateManuf->execute();
            $updateManuf->close();
            echo "<br>manufacturer" . $success;
      } else echo "<br>" . $err . " update manufacturer";

      # Call randomWarehouse(), update the to address
      $warehouse = randomWarehouse($db);
      if($updateWare=$db->prepare("UPDATE shipments SET WID = '$warehouse[0]',
          to_street = '$warehouse[1]', to_city = '$warehouse[2]',
          to_state = '$warehouse[3]', to_zip = '$warehouse[4]'")){
            $updateWare->execute();
            $updateWare->close();
            echo "<br>warehouse" . $success;
      } else echo "<br>" . $err . " update warehouse";

      # Call distance, update remaining_dist and inTransit
      $distance = distance($manufacturer[5], $manufacturer[6], $warehouse[5], $warehouse[6]);
      if($updateDist=$db->prepare("UPDATE shipments SET remaining_dist = '$distance',
          inTransit = '1'")){
          $updateDist->execute();
          $updateDist->close();
          echo "<br>remaining_dist, inTransit" . $success;
      } else echo "<br>" . $err . " remaining_dist, in-transit";
    } else echo "<br> Shipment already in-transit something weird happened";
  }
?>
