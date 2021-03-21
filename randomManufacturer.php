<?php
  include_once('databaseConnection.php');
  function randomManufacturer(){
    $conn = connectDB();
    # Get the number of manufacturers in the table
    $query = $conn->query("SELECT COUNT(DISTINCT MID) FROM manufacturers");
    if(!$query) echo "Could not run query: " . $conn->error;
    $max = $query->fetch_row();
    # Randomly choose a MID between 1 and the number of manufacturers in the table
    $MID = rand(1, $max[0]);
    $query->close();
    # Retrieve that specific manufacturer
    $query = $conn->query("SELECT MID, street, city, state, zip
      FROM manufacturers WHERE MID = $MID");
    $record = $query->fetch_row();
    $conn->close();
    # Return MID + address if called from PHP
    return $record;
  }
 ?>
