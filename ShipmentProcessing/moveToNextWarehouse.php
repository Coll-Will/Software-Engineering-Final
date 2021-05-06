<?php

  function moveToNextWarehouse($SID, $db){
    # Initial setup
    $err = "Could not run query: ";
    $success = " record updated successfully!";

    # Retrieve shipments remaining_nodes
    if($query=$db->prepare("SELECT remaining_nodes FROM shipments WHERE SID = $SID")){
      $query->execute();
      $query->bind_result($remaining_nodes);
      $query->fetch();
      $query->close();
    } else echo $err . " retrieve shipment status and remaining_nodes";

    $currentNode = explode(" ", $remaining_nodes);
    # get the address of the next warehouse
    if($getNode=$db->prepare("SELECT street, city, state, zip FROM warehouses WHERE WID = '$currentNode[0]'")){
        $getNode->execute();
        $getNode->bind_result($street, $city, $state, $zip);
        $getNode->fetch();
        $getNode->close();
        echo "<br>record accessed";
    } else echo $err . " get next warehouse address";

    $remaining_nodes = trim($remaining_nodes, " " . $currentNode[0]);
    # if there are no more nodes, status is delivered, else remain intransit
    if($remaining_nodes == "") $newStatus = 2;
    else $newStatus = 1;

    # set the shipment current address to the address of the next warehouse
    if($updateShipment=$db->prepare("UPDATE shipments SET WID = '$currentNode[0]', cur_street = '$street', cur_city = '$city',
          cur_state = '$state', cur_zip = '$zip', status = '$newStatus', remaining_nodes = '$remaining_nodes'  WHERE SID = $SID")){
        $updateShipment->execute();
        $updateShipment->close();
        echo "<br>shipment" . $success;
    } else echo $err . " update shipment record";
}
?>
