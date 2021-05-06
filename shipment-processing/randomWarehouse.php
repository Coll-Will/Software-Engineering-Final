<?php
    function randomWarehouse($db){
        # Get the number of warehouses in the table
        if($query=$db->prepare("SELECT COUNT(DISTINCT WID) FROM warehouses")){
            $query->execute();
            $query->bind_result($max);
            $query->fetch();
            $query->close();
        } else echo "Could not run query";
        # Randomly choose a WID between 1 and the number of manufacturers in the table
        $WID = rand(1, $max);
        # Retrieve that specific warehouse
        if($query=$db->prepare("SELECT WID, street, city, state, zip, latitude, longitude
          FROM warehouses WHERE WID = $WID")){
            $query->execute();
            $query->bind_result($wid, $street, $city, $state, $zip, $latitude, $longitude);
            $query->fetch();
            $record = array($wid, $street, $city, $state, $zip, $latitude, $longitude);
            $query->close();
        } else echo "Could not run query";

        return $record;
    }
 ?>
