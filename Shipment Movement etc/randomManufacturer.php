<?php
  function randomManufacturer($db){
      # Get the number of manufacturers in the table
      if($query=$db->prepare("SELECT COUNT(DISTINCT MID) FROM manufacturer")){
          $query->execute();
          $query->bind_result($max);
          $query->fetch();
          $query->close();
      } else echo "Could not run query";
      # Randomly choose a MID between 1 and the number of manufacturers in the table
      $MID = rand(1, $max);
      # Retrieve that specific manufacturer
      if($query=$db->prepare("SELECT MID, street, city, state, zip, latitude, longitude
        FROM manufacturer WHERE MID = $MID")){
          $query->execute();
          $query->bind_result($mid, $street, $city, $state, $zip, $latitude, $longitude);
          $query->fetch();
          $record = array($mid, $street, $city, $state, $zip, $latitude, $longitude);
          $query->close();
      }else echo "Could not run query";
      return $record;
  }
 ?>
